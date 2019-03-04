<?php
namespace app\index\controller;
class UserOrder extends Common
{
    public function orderList(){
        //检测是否登录
        if(!$this->getLogin()){
            $this->error('请先登录',url('login/login'));
        }
        //获取订单信息
        $where=[
            'user_id'=>$this->getUserId()
        ];
        $order_model=model('order');
        $orderInfo=$order_model->where($where)->select();
        $this->assign('orderInfo',$orderInfo);
        return view();
    }
    //订单详情
    public function orderDetail(){
        $order_number=input('get.order_number');
        $order_number='73107557759983';
        $where=[
            'order_number'=>$order_number
        ];
        $order=model('order');
        $orderInfo=$order->where($where)->find();
        if($orderInfo['order_status']<5){
            //$this->error('该订单没有物流信息',url('order/orderderlist'));
        }
        $exInfo=$this->getExpress($order_number);
        //print_r($expressInfo);exit;
        foreach($exInfo as $k=>$v){
            $expressInfo[]=[
                'time'=>$v->time,
                'context'=>$v->context
            ];
        }
        $this->assign('order_number',$order_number);
        $this->assign('expressInfo',$expressInfo);
        return view();

    }
    public function getExpress($num){
        $showapi_appid = '83192';  //替换此值,在官网的"我的应用"中找到相关值
        $showapi_secret = '77a1194914074fada4456f74b6e03132';  //替换此值,在官网的"我的应用"中找到相关值
        $paramArr = array(
            'showapi_appid'=> $showapi_appid,
            'com'=> "zhongtong",
            'nu'=> "$num"
        //添加其他参数
        );

        //创建参数(包括签名的处理)
        function createParam ($paramArr,$showapi_secret) {
            $paraStr = "";
            $signStr = "";
            ksort($paramArr);
            foreach ($paramArr as $key => $val) {
                if ($key != '' && $val != '') {
                    $signStr .= $key.$val;
                    $paraStr .= $key.'='.urlencode($val).'&';
                }
            }
            $signStr .= $showapi_secret;//排好序的参数加上secret,进行md5
            $sign = strtolower(md5($signStr));
            $paraStr .= 'showapi_sign='.$sign;//将md5后的值作为参数,便于服务器的效验
            //echo "排好序的参数:".$signStr."\r\n";
            return $paraStr;
        }

        $param = createParam($paramArr,$showapi_secret);
        $url = 'http://route.showapi.com/64-19?'.$param;
        //echo "请求的url:".$url."\r\n";
        $result = file_get_contents($url);
        $result = json_decode($result);
        $data=$result->showapi_res_body->data;
        return $data;
    }
    public function yesOrder(){
        $order_number=input('post.order_number');
        $where=[
            'order_number'=>$order_number
        ];
        $order=model('order');
        $orderInfo=$order->where($where)->find();
        if(empty($orderInfo)){
            fail('此订单不存在');
        }
        if($orderInfo['pay_status']==1 && $orderInfo['order_status']<3){
            fail('此订单未付款，请付款后再确认');
        }
        $data=[
            'order_status'=>4,
            'utime'=>time(),
        ];
        $res=$order->where($where)->update($data);
        if($res){
            successly('确认订单成功');
        }else{
            fail('确认订单失败');
        }
    }
    public function orderRefund(){
        $order_number=input('get.order_number',0);
        $where=[
            'order_number'=>$order_number
        ];
        $order=model('order');
        $orderInfo=$order->where($where)->find();
        if(empty($orderInfo)){
            $this->error('该订单不存在',url('index/index'));
        }
        //查询订单详细商品信息
        $detailWhere=[
            'order_id'=>$orderInfo['order_id'],
            'user_id'=>$this->getUserId(),
            'goods_status'=>1
        ];
        $orderdetail=model('order_detail');
        $orderDetailInfo=$orderdetail->where($detailWhere)->select();
        if(empty($orderDetailInfo)){
            $this->error('该订单内没有商品信息',url('index/index'));
        }
        $this->assign('order_number',$order_number);
        $this->assign('orderDetailInfo',$orderDetailInfo);
        return view();
    }
}