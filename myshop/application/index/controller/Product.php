<?php
namespace app\index\controller;
use \page\AjaxPage;
use think\request;
class Product extends Common
{   //商品详情页
    public function productDetail(Request $request ) {
        //属性没查出来
        $this->getIndexCateInfo();//分类展示  搜索用
        $this->getIndexCateNavInfo();//导航栏展示
        $allId=input('param.');//全接goods_id type_id
       //dump($allId);die;
        if(empty($allId['goods_id'])){
            fail('非法操作');
        }
        //查询商品信息
        $where=[
            'shop_goods.goods_id'=>$allId['goods_id'],
            'shop_goods.type_id'=>$allId['type_id']
        ];
        $goodsModel=model('goods');
        $goodsInfo=$goodsModel->where($where)->find();

        $this->assign('goodsInfo',$goodsInfo);

        if(empty($goodsInfo)){
            $this->error('此商品不存在，请重新选择');exit;
        }
        if($goodsInfo['is_on_sale'] !=1 ){
            $this->error('此商品已下架');exit;
        }
        $goodsInfo['goods_thumb']=explode('|',ltrim($goodsInfo['goods_thumb'],'|')); //print_r($goodsInfo['goods_thumb']);exit;

        //商品分类查询
       $goodsCateInfo = $this->getGoodsCateInfo($goodsInfo['cate_id']);//print_r($goodsCateInfo);exit;




//                 $attrModel=model('GoodsAttr');
//                    $attrInfo=$attrModel
//                            ->where('goods_id',$allId['goods_id'])
//                            ->select();
//                    print_r($attrInfo);die;
//                    foreach($attrInfo as $k=>$v){
//                        $attr=$v;
//                    }
//
//                    $attributeModel=model('Attribute');
//                    $attributeInfo=$attributeModel->where('attr_id',$attr['attr_id'])->select();
//                    dump($attributeInfo);die;
//        //查询商品属性和规格
        $attrWhere=[
            'shop_goods.goods_id'=>$allId['goods_id'],
            'attr_type'=>$allId['type_id']
        ];
        //商品所对应的属性
        $allAttrInfo = $goodsModel
                    //->field('goods_attr_id','shop_goods_attr.goods_id','attr_name','attr_value','attr_price','attr_input_type','attr_values')
                    ->where($where)
                    ->join('shop_goods_attr','shop_goods_attr.goods_id=shop_goods.goods_id')
                    ->join('shop_attribute','shop_attribute.attr_id=shop_goods_attr.attr_id')
                    ->select();
        //echo $goodsModel->getLastSql();die;


        //print_r($allAttrInfo);die;
        if(empty($allAttrInfo)){
            //$this->error('此商品无属性');
            return view();
        }else{
            $attrInfo=[];
            foreach($allAttrInfo as $k=>$v){
                $attrInfo[$v['attr_id']]['name']=$v['attr_name'];
                $attrInfo[$v['attr_id']]['value'][$v['goods_attr_id']]=$v['attr_value'];
            }
        }
        //dump($attrInfo);die;
//       $attr=array_chunk($attrInfo,2);//dump($attr);die;
//        $sale_attr=$attr[0];//dump($sale_attr);die;
//
//        if(!$attr[1] || !$attr[2]){
//            return $this->error('此商品无基本属性');
//        }else{
//            $base_attr=array_merge($attr[1],$attr[2]);//dump($base_attr);die;
//        }

        /*<!--{volist name="saleAttr" id="v"}
          <div class="des_choice">
              <span class="fl" sale_id="{$v.value}">{$v.name}：</span>
              <ul>
                  {volist name="$v.son" id="vv"}
                  <?php
                          if(in_array($key,$check)){
                              echo '<li value_id='.$key.' class="checked">'.$vv.'<div class="ch_img"></div></li>';
                  }else{
                  echo '<li value_id='.$key.'>'.$vv.'<div class="ch_img"></div></li>';
                  }
                  ?>
                  {/volist}
              </ul>
          </div>
          {/volist}-->*/

        //历史记录
       if($this->getLogin()){
            //存数据库
            $this->saveHistoryDb($allId['goods_id']);
        }else{
            //存cookie
            $this->saveHistoryCookie($allId['goods_id']);
        }
        //print_r(unserialize(base64_decode(cookie('history'))));exit;
//        $this->assign('saleAttr',$saleAttr);
//        $this->assign('baseAttr',$base_attr);
        return view();
    }
    //商品上级分类查询
    public function getGoodsCateInfo($cate_id){
        $cate=model('category');
        $cateWhere=[
            'cate_show'=>1,
            'cate_id'=>$cate_id
        ];
        $cateInfo=collection($cate->where($cateWhere)->select())->toArray();
        //dump($cateInfo);die;
        $info=getGoodsCateInfo($cateInfo,$cate_id);
        return $this->assign('goodsCateInfo',$info);
    }
    //历史记录存数据库
    public function saveHistoryDb($goods_id){
        $history=model('history');
        $arr=[
            'user_id'=>$this->getUserId(),
            'goods_id'=>$goods_id,
            'ctime'=>time()
        ];
        $history->save($arr);
    }
    //历史记录存cookie
    public function saveHistoryCookie($goods_id){
        $now=time();
        $prevhistory=cookie('history');//dump($prevhistory);die;
        if(!empty($prevhistory)){
            //解开2维数组
            $history=unserialize(base64_decode($prevhistory));
        }
        //加入本次数据
        $history[]=[
            'goods_id'=>$goods_id,
            'ctime'=>$now,
        ];
        $str=base64_encode(serialize($history));
        cookie('history',$str);
    }

    /*
     * 浏览记录展示   登录后从数据库选
     *                登录前从cookie里取
     */
    public function getHistoryInfo(){
        $goods = model('goods');
        if($this->getLogin()){
            //已登录  数据库中取数据
            $history = model('history');
            $where = [
                'user_id' => $this->getUserId(),
            ];
            $goods_id = $history->where($where)->order('ctime', 'desc')->column('goods_id');
            //dump($goods_id);die;
            //从数组中取前5个
            $goods_id=array_slice(array_unique($goods_id),0,5);
            //print_r($goods_id);
            if(!empty($goods_id)){
                foreach ($goods_id as $k => $v) {
                    $historyInfo[] = $goods->where(['goods_id' => $v])->find();
                }

                if(!empty($historyInfo)){
                    return $this->assign('historyInfo', $historyInfo);
                }
            }

        }else{
            //cookie中取数据
            $cookie=cookie('history');
            //dump($cookie);die;
            if(!empty($cookie)){
                //倒序取数组
                $arr=array_reverse(unserialize(base64_decode($cookie)));
                $info=[];
                foreach($arr as $k=>$v){
                    if(empty($info[$v['goods_id']])){
                        $info[$v['goods_id']]=$v;
                        $historyInfo[]=$goods->where(['goods_id'=>$v['goods_id']])->find()->toArray();
                    }
                }
                if(!empty($historyInfo)){
                    //从数组中取出一段
                    $historyInfo=array_slice($historyInfo,0,5);
                    return $this->assign('historyInfo', $historyInfo);
                }
            }
        }

    }
    //全部商品展示列表
    public function productList(){
      //左侧及导航分类展示数据
        $this->getIndexCateInfo();
        $this->getIndexCateNavInfo();
        //查询所有品牌
        $cate=model('category');
        $brand=model('brand');
        $goods=model('goods');
        $cate_id=input('get.cate_id',0,'intval');
        //dump($cate_id);die;
        if(empty($cate_id)){
            $where=[
                'is_on_sale'=>1
            ];
            cookie('cate_id',null);
        }else{
            $cateInfo=$cate->where(['cate_show'=>1])->select();
            $cateId=getCateId($cateInfo,$cate_id);
            $cate_id=trim(implode(',',$cateId).",".$cate_id,',');
            //echo $cateId;exit;
            cookie('cate_id',$cate_id);
            $where=[
                'cate_id'=>['in',$cate_id],
                'is_on_sale'=>1
            ];
        }
        $brandInfo=$brand
            ->field('distinct(g.brand_id),brand_name')
            ->alias('b')
            ->join('shop_goods g','b.brand_id=g.brand_id')
            ->join('shop_goods_type gt','g.type_id=gt.type_id')
            ->where($where)
            ->select();
        //获得价格区间
        $maxPrice=$goods->where($where)->value("max(market_price)");

        $priceInfo=$this->getPriceArea($maxPrice);

        //获得商品数据
        $page=1;//第一页
        $page_num=12;//每页显示条数
        $goodsInfo=$goods
            ->where($where)
            ->order('warn_number','desc')
            ->page($page,$page_num)
            ->select();
        //dump($goodsInfo);die;
        //调用分类页 获取页码
        $count=$goods->where($where)->count();
        $page_str=AjaxPage::ajaxpager($page,$count,$page_num,url('product/productsearch'),'pages');
        //浏览记录展示
        $this->getHistoryInfo();
        //传数据
        //dump($goodsInfo);die;
        $this->assign('brandInfo',$brandInfo);
        $this->assign('priceInfo',$priceInfo);
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('page_str',$page_str);
        $this->assign('count',$count);
        return view();
    }

    //查询价格区间
    public function getPriceArea($maxPrice){
        $price=[];
        for($i=0;$i<6;$i++){
            $start=$maxPrice/7*$i;
            //echo $start;
            $end=$maxPrice/7*($i+1)-0.01;
            $price[]=number_format($start,2,'.',',').'-'.number_format($end,2,'.',',');
        }
        //$end=$end+0.01;
        $price[]=number_format($end+0.01,2,'.',',').'以上';
        return $price;
    }
    //点击品牌ajax替换价格区间
    public function getPrice(){
        $brand_id=input('post.brand_id',0,'intval');
        //echo $brand_id;exit;
        $goods=model('goods');
        $where['goods_up']=1;
        if(!empty($brand_id)){
            $where['brand_id']=$brand_id;
        }
        $maxPrice=$goods->where($where)->value("max(market_price)");
        //echo $goods->getLastSql();exit;
        //echo $maxPrice;
        if(!empty($maxPrice)){
            $priceInfo=$this->getPriceArea($maxPrice);
            //dump($priceInfo);
            echo json_encode($priceInfo);
        }else{
            fail('此品牌下没有商品');
        }
    }
    //ajax 分页+搜索商品信息查询
    public function getGoodsInfo(){
        //接收页码+条件
        $page=input('post.p','');
        $brand_id=input('post.brand_id','');
        $price_area=input('post.price_area','');
        $flag=input('post.flag','');
        $order=input('post.order','desc');
        $cate_id=cookie('cate_id');
        //echo $price_area;exit;
        //处理条件
        $where=[];
        if(!empty($cate_id)){
            $where['cate_id']=['in',$cate_id];
        }
        if(!empty($brand_id)){
            $where['brand_id']=$brand_id;
        }
        if(!empty($price_area)){
            $price_area=str_replace(',', '', $price_area);
            if(substr_count($price_area,'-')>0){
                $arr=explode('-',$price_area);
                $where['market_price']=['between',$arr];
            }else{
                $str=substr($price_area,0,strpos($price_area,'.')+3);
                //echo $str;
                $where['market_price']=['>=',$str];
            }
        }
        $field='click_count';
        if($flag==2){
            $field='click_count';
        }else if($flag==3){
            $field='market_price';
        }else if($flag==4){
            $where['goods_new']=1;
        }
        //print_r($where);exit;
        //获得商品数据
        $goods=model('goods');
        $page_num=20;
        $goodsInfo=$goods
            ->where($where)
            ->order($field,$order)
            ->page($page,$page_num)
            ->select();
        //echo $goods->getLastsql();exit;
        if(!empty($goodsInfo)){
            //调用分类页 获取页码
            $count=$goods->where($where)->count();
            //echo $count;exit;
            $page_str=AjaxPage::ajaxpager($page,$count,$page_num,url('product/productsearch'),'pages');
            $this->assign('goodsInfo',$goodsInfo);
            $this->assign('count',$count);
            $this->assign('page_str',$page_str);
            $this->view->engine->layout(false);
            echo  $this->fetch('div');
        }else{
            echo 'no';
        }
    }
}
