<?php
namespace app\index\controller;
use \think\Controller;
class Common extends Controller{
    public function _initialize()
    {   //一开始就看有没有在不同浏览器登录
        if(!$this->is_session()){
            session('userInfo',null);
            $this->redirect('Login/login');
        }
        parent::_initialize();
        //网站配置
        $this->getConfigInfo();
        //购物车数据
        $this->getCartInfo();
        if($this->getLogin()){
            $login=1;
        }else{
            $login=2;
        }
        $this->assign('login',$login);
    }
    //不同浏览器不能登同一账号
    public function is_session()
    {
        session('userInfo');
        $session_id = session_id();
        if ($session_id) {
            return true;
        }
        $userSession_model = model('UserSession');
        $data = $userSession_model->where(['user_id' => session('userInfo.user_id'), 'session_id' => $session_id])->find();
        if ($session_id == $data['session_id']) {
            return true;
        } else {
            return false;
        }
    }

    //方非法登录
    public function getLogin(){
        if(!session('?userInfo')){
            return false;
        }else{
            $userInfo=session('userInfo');
            return $userInfo;
        }
    }
    //左侧分类
    public function getIndexCateInfo(){
        $model=model('category');
        $where=[
            'cate_show'=>1
        ];
        $info=$model->where($where)->select();
        //$info=collection($info)->toArray();
        $cateInfo=getIndexCateInfo($info);
        return $this->assign('cateInfo',$cateInfo);
    }

    //导航分类
    public function getIndexCateNavInfo(){
        $model=model('category');
        $where=[
            'cate_navshow'=>1
        ];
        $cateNavInfo=$model->where($where)->select();
        return $this->assign('cateNavInfo',$cateNavInfo);
    }
    //配置信息
    public function getConfigInfo(){
        if(session('?configInfo')){
            $configInfo_str=session('configInfo');
            $configInfo=unserialize($configInfo_str);
        }
        $model=model('config');
        $data=$model->select();
        
        foreach($data as $v){
            $configInfo[$v['name']]=$v['value'];
        }
        //数组存储到session
        $str=serialize($configInfo);
        session('configInfo',$str);
        //print_r($info);exit;
        $this->assign('config',$configInfo);
    }
    //session中取user_id
    public function getUserId(){
        return session('userInfo')['user_id'];
    }
    //检测商品库存
    public function checkNumber($goodsInfo,$buy_number){
        $goods_number=$goodsInfo['goods_number'];
        if($buy_number>$goods_number){
            fail('此商品库存'.$goods_number.'件，您购买的商品数量已超过库存');
        }
    }
     //查询购物车数据
     public function getCartInfo(){
        $goods=model('goods');

        if($this->getLogin()){
            //$login=1;
            //登录
            $cart=model('cart');
            $where=[
                'user_id'=>$this->getUserId(),
                'is_on_sale'=>1
            ];

            $goodsInfo=$goods
                ->field('cart_id,c.goods_id,c.goods_name,buy_number,shop_goods.market_price,shop_goods.goods_img,goods_number')
                ->alias('g')
                ->join("shop_cart c","c.goods_id=g.goods_id")
                ->where($where)
                ->select();
           // $cart->getLastSql();die;
            //print_r($goodsInfo);exit;
        }else{
            //$login=2;
            //cookie
            $cookie=cookie('cart');
            if(empty($cookie)){
                //$this->error('您的购物车中没有商品，请先添加商品',"product/productlist");exit;
            }else{
                $cartInfo=unserialize(base64_decode($cookie));
                foreach($cartInfo as $k=>$v){
                    $info=$goods
                        ->field('goods_id,goods_name,market_price,goods_img,goods_number')
                        ->where(['goods_id'=>$v['goods_id'],'is_on_sale'=>1])
                        ->find()
                        ->toArray();
                    $goodsInfo[]=array_merge($info,$v);
                }

            }
            //print_r($goodsInfo);exit;
        }
        if(!empty($goodsInfo)){
            return $this->assign('cartGoodsInfo',$goodsInfo);
        }
        //$this->assign('login',$login);
        //return view();
    }
    //收货地址信息出路
    public function getAddressInfo($where,$adress_id=''){
        $adress_model=model('Address');
        $area_model=model('Area');
        if(empty($adress_id)){
            //展示所有收货地址
            $adressInfo=$adress_model->where($where)->select();
            if(!empty($adressInfo)){
                $id=[];
                //print_r($adressInfo);exit;
                foreach ($adressInfo as $k=>$v){
                    $id[]=$v['province'];
                    $id[]=$v['city'];
                    $id[]=$v['district'];
                }

                $id=array_unique($id);
                //print_r($id);exit;
                $areaWhere=[
                    'id'=>['in',$id],
                ];
                $areaInfo=$area_model->where($areaWhere)->select();
                $aera_name=[];
                foreach($areaInfo as $k=>$v){
                    $area_name[$v['id']]=$v['name'];
                }
                //print_r($area_name);exit;
                foreach($adressInfo as $k=>$v){
                    $v['province']=$area_name[$v['province']];
                    $v['city']=$area_name[$v['city']];
                    $v['district']=$area_name[$v['district']];
                }
                //print_r(collection($adressInfo)->toArray());exit;
                return $adressInfo;
            }else{
                return [];
            }
        }else{
            //修改收货地址单条
            $where['address_id']=$adress_id;
            $adressInfo=$adress_model->where($where)->find();
            if(!empty($adressInfo)){
                $id[]=$adressInfo['province'];
                $id[]=$adressInfo['city'];
                $id[]=$adressInfo['district'];
                $areaWhere=[
                    'id'=>['in',$id],
                ];
                $areaInfo=$area_model->where($areaWhere)->select();
                $area_name=[];
                foreach($areaInfo as $k=>$v){
                    $area_name[$v['id']]=$v['name'];
                }
                $areaInfo['province']=$area_name[$adressInfo['province']];
                $areaInfo['city']=$area_name[$adressInfo['city']];
                $areaInfo['district']=$area_name[$adressInfo['district']];
                return $adressInfo;
            }else{
                return [];
            }
        }
    }
    public function getOrderInfo($orderWhere){
        $order=model('order');
        $info=$order->where($orderWhere)->find();
        return $info;
    }
}