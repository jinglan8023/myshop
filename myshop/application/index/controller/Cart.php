<?php
namespace app\index\controller;
class Cart extends Common
{
    //加入购物车
    public function cartAdd(){
        $goods_id=input('post.goods_id',0,'intval');
        $buy_number=input('post.buy_number',0,'intval');
        if(empty($goods_id)){
            fail('请选择商品');
        }
        if(empty($buy_number)){
            fail('请选择购买的数量');
        }
        $goodsWhere=[
            'goods_id'=>$goods_id
        ];
        $goods=model('goods');
        $goodsInfo=$goods->where($goodsWhere)->find();
        if(empty($goodsInfo)){
            fail('请选择购买的商品');
        }
        //判断登录前还是登陆后
        if($this->getLogin()){
            //登陆后存数据库
            $res=$this->cartAddDb($goodsInfo,$buy_number);
        }else{
            //登录前存cookie
            $res=$this->cartAddCookie($goodsInfo,$buy_number);
        }
        //print_r($this->getCartCookie());
        if($res){
            successly('加入购物车成功，是否进入购物车列表');
        }else{
            fail('加入购物车失败');
        }
    }
    //购物车信息存入cookie中
    public function cartAddCookie($goodsInfo,$buy_number){
        $goods_id=$goodsInfo['goods_id'];
        $now=time();
        //取出cookie信息
        $cartInfo=$this->getCartCookie();
        if(!empty($cartInfo[$goods_id])){
            //数量作累加
            $cartInfo[$goods_id]['buy_number']=$cartInfo[$goods_id]['buy_number']+$buy_number;
            $cartInfo[$goods_id]['uptime']=$now;
            $this->checkNumber($goodsInfo,$cartInfo[$goods_id]['buy_number']);
            $cart=base64_encode(serialize($cartInfo));
            cookie('cart',$cart,24*60*60);
            return true;
        }else{
            $cartInfo[$goods_id]=[
                'goods_id'=>$goods_id,
                'buy_number'=>$buy_number,
                'add_time'=>$now,
                'uptime'=>$now,
            ];
            $this->checkNumber($goodsInfo,$buy_number);
            $cart=base64_encode(serialize($cartInfo));
            cookie('cart',$cart,24*60*60);
            return true;
        }
    }
    //取出购物车cookie信息
    public function getCartCookie()
    {
        $cart = cookie('cart');
        $cartInfo = [];
        if (empty($cart)) {
            return $cartInfo;
        } else {
            //倒序取cookie数据
            $cartInfo =array_reverse(unserialize(base64_decode($cart))) ;
            return $cartInfo;
        }
    }
    //购物车信息存数据库
    public function cartAddDb($goodsInfo,$buy_number){
        //游客登陆后 将cookie里的购物车数据 一并入数据库   根据user_id  注意注意


        $goods_id=$goodsInfo['goods_id'];
        //根据商品id查购物车表是否有重复的商品
        $cart=model('cart');
        $cartWhere=[
            'goods_id'=>$goods_id,
            'user_id'=>$this->getUserId()
        ];
        $cartInfo=$cart->where($cartWhere)->find();
        if($cartInfo){
            //购物车有数据的话  就改购买数量  进购物车时间
            $update=[
                'buy_number'=>$cartInfo['buy_number']+$buy_number,
                'uptime'=>time(),
            ];
            // 与此同时 检查库存
            $this->checkNumber($goodsInfo,$update['buy_number']);
            $res=$cart->where($cartWhere)->update($update);
        }else{
            //购物车没有数据的话   就填进数据库
            $insert=[
                'goods_id'=>$goods_id,
                'shop_price'=>$goodsInfo['market_price'],
                'buy_number'=>$buy_number,
                'user_id'=>$this->getUserId()
            ];
            //同样也要检查   库存
            $this->checkNumber($goodsInfo,$buy_number);
            $res=$cart->save($insert);
        }
        if($res){
            return true;
        }else{
            return false;
        }
    }
    //购物车第一步购物车列表
    public function buyCarOne(){
        //左侧头部导航
        $this->getIndexCateInfo();
        $this->getIndexCateNavInfo();
        //查询购物车数据
        if(!$this->getLogin()){
            $cartcookie=cookie('cart');//从cookie取购物车数据
            //echo $cartcookie;exit;
            if(empty($cartcookie)){
                $this->error('您的购物车中没有商品，请添加','product/productlist');
            }
        }
        return view();
    }
    //修改购物车商品数量
    public function getBuyNumber(){
        $goods_id=input('post.goods_id',0,'intval');
        $cart_id=input('post.cart_id',0,'intval');
        $buy_number=input('post.buy_number',0,'intval');
        $goods=model('goods');
        $goodsInfo=$goods->where(['goods_id'=>$goods_id])->find();
        //echo $cart_id;exit;
        if(empty($goodsInfo)){
            fail('请选择购买的商品');
        }
        $this->checkNumber($goodsInfo,$buy_number);
        if($this->getLogin()){
            //修改数据库
            $cart=model('cart');
            $user_id=$this->getUserId();
            $where=[
                'cart_id'=>$cart_id,
            ];
            $update=[
                'buy_number'=>$buy_number,
                'uptime'=>time()
            ];
            $res=$cart->where($where)->update($update);
        }else{
            //修改cookie
            $cookie=cookie('cart');
            if(empty($cookie)){
                fail('购物车中没有商品');
            }
            $cartInfo=unserialize(base64_decode($cookie));
            $cartInfo[$goods_id]['buy_number']=$buy_number;
            $cartInfo[$goods_id]['uptime']=time();
            $cart=base64_encode(serialize($cartInfo));
            cookie('cart',$cart,24*60*60);
        }
    }

    /**
     * 删除购物车数据
     * 因购物车分为登录前和登录后so
     *单删和批删功能也要考虑DB和Cookie操作
     *因走一个方法所以找其共同元素 goods_id 和属性id
     */
    public function carDel(){
        if($this->getLogin()){
            //登录后  从数据库取
            $cart_id=input('post.cart_id');
            if(empty($cart_id)){
                fail('操作失败');
            }
            $cart_id=explode(',',$cart_id);
            $where=[
                'cart_id'=>['in',$cart_id]
            ];
            $cart=model('cart');
            $res=$cart->where($where)->delete();
            if($res){
                successly('删除成功');
            }else{
                fail('删除失败');
            }
        }else{
            //登录前从cookie里取
            $goods_id=input('post.goods_id');
            if(empty($goods_id)){
                fail('操作失败');
            }
            $goods_id=explode(',',$goods_id);
            $cart=cookie('cart');
            if(empty($cart)){
                $this->error('您的购物车中没有商品，请先添加','product/productlist');
            }
            $cartInfo=unserialize(base64_decode($cart));
            foreach($goods_id as $k=>$v){
                unset($cartInfo[$v]);
            }
            if(!empty($cartInfo)){
                $cart=base64_encode(serialize($cartInfo));
                cookie('cart',$cart,24*60*60);
            }else{
                cookie('cart',null);
            }
            successly('删除成功');
        }
    }

    /**
     * 商品收藏
     */
    public function addCollection(){
        if(!checkRequest()){
            fail('请按正确流程操作');
        }
        if(!$this->getLogin()){
            fail('请先登录');
        }
        $type=input('post.type',0);
        $goods_id=input('post.goods_id',0);
        if(empty($goods_id)){
            fail('请选择需要收藏的商品');
        }
        $model=model('User_goods');
        if($type==1){
            $data=[
                'user_id'=>$this->getUserId(),
                'goods_id'=>$goods_id
            ];
            $count=$model->where($data)->count();
            if($count>0){
                fail('此商品已收藏');
            }
            $res=$model->insert($data);
            if($res){
                successly('收藏成功');
            }else{
                fail('收藏失败');
            }
        }else{
            $goods_id=explode(',',$goods_id);
            //print_r($goods_id);exit;
            $num=0;
            foreach($goods_id as $k=>$v) {
                $data = [
                    'user_id' => $this->getUserId(),
                    'goods_id' => $v
                ];
                //print_r($data);
                $count = $model->where($data)->count();
                //$num = 0;
                if ($count == 0) {
                    $res = $model->insert($data);
                } else {
                    $num += 1;
                }
            }
            //exit;
            if(!empty($res)){
                if($num>0){
                    fail("您有{$num}件商品已加入收藏");
                }
                successly('加入收藏成功');
            }else{
                fail('所有商品都已收藏');
            }
        }
    }
}
