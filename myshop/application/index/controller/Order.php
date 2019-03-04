<?php
namespace app\index\controller;
use \think\Db;
class Order extends Common
{
    //确认结算
    public function confirmorder(){
        //左侧导航栏分类
        $this->getIndexCateInfo();
        $this->getIndexCateNavInfo();
        //检测是否登陆
        if(!$this->getLogin()){
            $this->error('您还没有登录，请先登录',url('Login/login'));
        }
        //接收购物车id
        $cart_id=input('get.cart_id',0);
        //echo $cart_id;exit;
        if(empty($cart_id)){
            $this->error('您在购物车还没有进行结算请重新操作',url('Cart/cartlist'));
        }
        //根据购物车Id查询商品信息
        $user_id=$this->getUserId();
        $cartWhere=[
            'cart_id'=>['in',$cart_id],
            'user_id'=>$user_id,
        ];
        $cart=model('Cart');
        $cartInfo=$cart
            ->alias('c')
            ->join('shop_goods g',"c.goods_id=g.goods_id")
            ->where($cartWhere)
            ->select();
        $this->assign('cartInfo',$cartInfo);
        //收货地址信息
        $adressWhere=[
            'user_id'=>$user_id,
        ];
        $cartListInfo=$this->getAddressInfo($adressWhere);
        //print_r(collection($cartInfo)->toArray());exit;
        $this->assign('cartListInfo',$cartListInfo);
        return view();
    }
    //确认订单
    public function  confirmAdd(){
        //判断是否登陆
        if(!$this->getLogin()){
            $this->error('您还没有登录，请先登录',url('Login/login'));
        }
        //接收购物车id
        $cart_id=input('post.cart_id',0);
        //echo $cart_id;exit;
        if(empty($cart_id)){
            $this->error('您在购物车还没有进行结算请重新操作',url('Cart/buycarone'));
        }
        //根据购物车Id查询商品信息
        $user_id=$this->getUserId();
        $pay_type=input('param.pay_type');
        //echo $pay_type;exit;
        $cartWhere=[
            'cart_id'=>['in',$cart_id],
            'user_id'=>$user_id,
        ];
        $cart=model('Cart');
        $cartInfo=$cart
            ->alias('c')
            ->join('shop_goods g',"c.goods_id=g.goods_id")
            ->where($cartWhere)
            ->select();
        //循环检查商品库存
        foreach($cartInfo as $k=>$v){
            if($v['buy_number']>$v['goods_number']){
                unset($cartInfo[$k]);
            }
        }
        if(empty($cartInfo)){
            $this->error('购物车商品为空，不能下单',url('index/index'));
        }
        //print_r(collection($cartInfo)->toArray());exit;
        $order_model=model('Order');
        $order_model->startTrans();
        try{
            //订单表数据写入
            $order_message=input('param.order_message','');
            $order_random=$this->createRandomOrder($pay_type);//订单号
            $order_data=[];
            $order_data['order_number']=$order_random;
            $order_data['pay_type']=$pay_type;
            $order_data['user_id']=$user_id;
            $order_data['order_message']=$order_message;
            $order_amount=0;
           // $order_score=0;//积分
            foreach ($cartInfo as $k=>$v){
                $order_amount+=$v['buy_number']*$v['market_price'];
               // $order_score+=$v['buy_number']*$v['goods_score'];//积分
            }
           // $order_data['order_score']=$order_score;//积分
            $order_data['order_amount']=$order_amount;
            if($pay_type==2){
                $order_data['order_status']=4;
            }
            $res1=$order_model->save($order_data);
            //print_r($res1);
            if(empty($res1)){
                $order_model->rollback();
                throw new \Exception('订单写入失败');
            }
            //订单详情表 数据写入
            $order_id=$order_model->order_id;
            $order_detail=[];
            foreach ($cartInfo as $k=>$v){
                $order_detail[]=[
                    'user_id'=>$user_id,
                    'order_id'=>$order_id,
                    'goods_id'=>$v['goods_id'],
                    'goods_name'=>$v['goods_name'],
                    'goods_selfprice'=>$v['market_price'],
                    'goods_img'=>$v['goods_img'],
                    'buy_number'=>$v['buy_number'],
                ];
            }
            $order_detail_model=model('OrderDetail');
            $res2=$order_detail_model->saveAll($order_detail);
            if(empty($res2)){
                $order_model->rollback();
                throw new \Exception('订单写入失败');
            }
            //订单收货地址表 数据写入
            $adress_id=input('post.adress_id');
            $order_adress=[];
            $order_adress_model=model('OrderAdress');
            $order_adress_where=[
                'user_id'=>$user_id,
            ];
            $adressInfo=$this->getAddressInfo($order_adress_where,$adress_id);
            //print_r($adressInfo->toArray());exit;
            $order_adress['user_id']=$user_id;
            $order_adress['order_id']=$order_id;
            $order_adress['province']=$adressInfo['province'];
            $order_adress['city']=$adressInfo['city'];
            $order_adress['district']=$adressInfo['district'];
            $order_adress['adress_name']=$adressInfo['address_man'];
            $order_adress['adress_tel']=$adressInfo['address_tel'];
            $order_adress['adress_site']=$adressInfo['address_detail'];
            $order_adress_model=model('OrderAdress');
            $res3=$order_adress_model->save($order_adress);
            if(empty($res3)){
                $order_model->rollback();
                throw new \Exception('订单写入失败');
            }
            //购物车表 数据清空
            $cart_model=model('Cart');
            $cartWhere=[
                'user_id'=>$user_id,
                'cart_id'=>['in',$cart_id],
            ];
            $cartData=['buy_number'=>0];
            $res4=$cart_model->where($cartWhere)->update($cartData);
            if(empty($res4)){
                $order_model->rollback();
                throw new \Exception('订单写入失败');
            }
            //商品表 修改库存
            $goods_model=model('Goods');
            foreach($cartInfo as $k=>$v){
                $goodsWhere=[
                    'goods_id'=>$v['goods_id']
                ];
                $goodsData=[
                    'goods_number'=>$v['goods_number']-$v['buy_number'],
                ];
                $res5=$goods_model->where($goodsWhere)->update($goodsData);
                if(empty($res5)){
                    $order_model->rollback();
                    throw new \Exception('订单写入失败');
                }
            }
            $order_model->commit();
            echo json_encode(['font'=>'下单成功','code'=>1,'order_id'=>$order_id]);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
    //生成随机订单号
    public function createRandomOrder($pay_type){
        $user_id=$this->getUserId();
        $user_id=str_repeat(0,4-strlen($user_id)).$user_id;
        $order_random=$pay_type.date('ymd').$user_id.rand(1000,9999);
        return $order_random;
    }
    //下单成功
    public function orderSuccess(){
        //左侧分类数据
        $this->getIndexCateInfo();
        $this->getIndexCateNavInfo();
        //支付订单详情
        $order_model=model('Order');
        $order_id=input('get.order_id');
        //echo $order_id;exit;
        $user_id=$this->getUserId();
        $orderWhere=[
            'user_id'=>$user_id,
            'order_id'=>$order_id,
        ];
        $orderInfo=$order_model
            ->field('pay_type,order_amount,order_number')
            ->where($orderWhere)
            ->find();
        //print_r($orderInfo->toArray());exit;
        if($orderInfo['pay_type']==1){
            $orderInfo['pay_type']='支付宝';
        }
        if($orderInfo['pay_type']==2){
            $orderInfo['pay_type']='货到付款';
        }
        if($orderInfo['pay_type']==3){
            $orderInfo['pay_type']='银行转账';
        }
        $this->assign('orderInfo',$orderInfo);
        return view();
    }
    //支付宝支付
    public function alipay(){
        //获取订单号
        $order_number=input('get.order_number',0);
        //查询订单信息
        $orderWhere=[
            'order_number'=>$order_number
        ];
        $orderInfo=$this->getOrderInfo($orderWhere);
        if(empty($orderInfo)){
            $this->error('此订单不存在',url('index/index'));
        }
        //支付宝支付
        $config=config('alipay_config');
        require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';
        require_once EXTEND_PATH.'alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $orderInfo['order_number'];
        //订单名称，必填
        $subject = '电子商城支付';
        //付款金额，必填
        $total_amount = $orderInfo['order_amount'];
        //商品描述，可空
        $body = '';
        //构造参数
        $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $aop = new \AlipayTradeService($config);
        $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);
        //输出表单
        var_dump($response);
    }
    //同步通知地址
    public function paySuccess(){
        $param=input('get.');
        //验证订单信息
        $orderWhere=[
            'order_number'=>$param['out_trade_no']
        ];
        //echo $param['out_trade_no'];exit;
        $orderInfo=$this->getOrderInfo($orderWhere);
        if(empty($orderInfo)){
            $this->error('当前支付订单不存在',url('index/index'));
        }
        //验证订单金额
        if($orderInfo['order_amount']!=$param['total_amount']){
            $this->error('当前订单支付金额有误',url('index/index'));
        }
        //验证签名
        $config=config('alipay_config');
        require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';
        $alipaySevice = new \AlipayTradeService($config);
        $result = $alipaySevice->check($param);
        if($result) {
            //验证成功
            $this->getIndexCateNavInfo();
            $this->getIndexCateInfo();
            $this->assign('orderInfo',$orderInfo);
            return view();
        }
        else {
            //验证失败
            $this->error('验签失败',url('index/index'));
        }
    }
    //异步通知地址
    public function notifySuccess(){
        $param=input('post.');
        $filename='/data/wwwroot/default/myshop/notify.log';
        file_put_contents($filename,print_r($param,true),FILE_APPEND);
        //验证订单是否正确
        $order_number=$param['out_trade_no'];
        $orderWhere=[
            'order_number'=>$order_number
        ];
        $orderInfo=$this->getOrderInfo($orderWhere);
        if(empty($orderInfo)){
            file_put_contents($filename,'order_number not found',FILE_APPEND);
            echo 'order_number not found';
            exit;
        }
        //验证订单金额
        if($orderInfo['order_amount']!=$param['total_amount']){
            file_put_contents($filename,'order_amount error',FILE_APPEND);
            echo 'order_amount error';
            exit;
        };
        //验证签名
        $config=config('alipay_config');
        require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';
        $alipaySevice = new \AlipayTradeService($config);
        $result = $alipaySevice->check($param);
        if(empty($result)) {
            file_put_contents($filename,'sign errorr',FILE_APPEND);
            echo 'sign error';
            exit;
        }
        //验证应用id
        if($config['app_id']!=$param['app_id']){
            file_put_contents($filename,'app_id error',FILE_APPEND);
            echo 'app_id error';
            exit;
        };
        //验证支付状态是否为已支付
        if($orderInfo['pay_status']==2){
            file_put_contents($filename,'pay_status pass',FILE_APPEND);
            echo 'success';
            exit;
        }
        //修改支付状态 支付时间 订单状态
        if($orderInfo['pay_status']==1){
            $data=[
                'pay_status'=>2,
                'order_status'=>3,
                'pay_time'=>time(),
                'uptime'=>time()
            ];
            $where=[
                'order_number'=>$order_number
            ];
            $order=model('order');
            $res=$order->where($where)->update($data);
            if($res){
                file_put_contents($filename,'success',FILE_APPEND);
                echo 'success';
                exit;
            }else{
                file_put_contents($filename,'fail',FILE_APPEND);
                echo 'fail';
                exit;
            }
        }
    }
    //支付宝退款
    public function alirefund(){
        $id=input('post.id');
        $order_number=input('post.order_number');
        $refund_des=input('post.refund_des');
        //验证订单信息
        $orderWhere=[
            'order_number'=>$order_number
        ];
        //echo $param['out_trade_no'];exit;
        $orderInfo=$this->getOrderInfo($orderWhere);
        if(empty($orderInfo)){
            $this->error('当前支付订单不存在',url('index/index'));exit;
        }
        $orderdetail=model('order_detail');
        $detailWhere=[
            'id'=>$id
        ];
        $detailInfo=$orderdetail->where($detailWhere)->find();
        if(empty($detailInfo)){
            $this->error('当前订单内不存在该商品',url('index/index'));exit;
        }
        $config=config('alipay_config');
        require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';
        require_once EXTEND_PATH.'alipay/pagepay/buildermodel/AlipayTradeRefundContentBuilder.php';

        //商户订单号，商户网站订单系统中唯一订单号
        $out_trade_no = $order_number;

        //支付宝交易号
        $trade_no = '';
        //请二选一设置

        //需要退款的金额，该金额不能大于订单金额，必填
        $refund_amount = $detailInfo['market_price'];

        //退款的原因说明
        $refund_reason = $refund_des;

        //标识一次退款请求，同一笔交易多次退款需要保证唯一，如需部分退款，则此参数必传
        $out_request_no = $id;
        //构造参数
        $RequestBuilder=new \AlipayTradeRefundContentBuilder();
        $RequestBuilder->setOutTradeNo($out_trade_no);
        $RequestBuilder->setTradeNo($trade_no);
        $RequestBuilder->setRefundAmount($refund_amount);
        $RequestBuilder->setOutRequestNo($out_request_no);
        $RequestBuilder->setRefundReason($refund_reason);

        $aop = new \AlipayTradeService($config);

        /**
         * alipay.trade.refund (统一收单交易退款接口)
         * @param $builder 业务参数，使用buildmodel中的对象生成。
         * @return $response 支付宝返回的信息
         */
        $response = $aop->Refund($RequestBuilder);
        //var_dump($response);;
        //dump($response->msg);
        if($response->out_trade_no!=$order_number){
            fail('订单号与退款订单不符');
        }
        if($response->refund_fee!=$detailInfo['goods_selfprice']){
            fail('退款金额有误');
        }
        if($response->msg=="Success"){
            //开启事务
            Db::startTrans();
            $order_model=model('order');
            $orderWhere=[
                'order_number'=>$order_number
            ];
            $orderUpdate=[
                'order_status'=>2,
                'order_amount'=>$orderInfo['order_amount']-$detailInfo['goods_selfprice'],
                'utime'=>time()
            ];
            //修改订单表
            $res1=$order_model->where($orderWhere)->update($orderUpdate);
            //successly('退款成功');
            $detail_model=model('order_detail');
            $detailWhere=[
                'id'=>$id,
            ];
            $detailUpdate=[
                'goods_status'=>2,
            ];
            //修改订单详情表
            $res2=$detail_model->where($detailWhere)->update($detailUpdate);
            if($res1&&$res2){
                //提交
                Db::commit();
                successly('退款成功');
            }else{
                //回滚
                Db::rollback();
                fail('退款失败');
            }
        }else{
            fail('退款失败');
        }
    }
}