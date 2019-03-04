<?php
namespace app\admin\controller;
use think\Request;
//use think\facade\Log;
//use page\AjaxPage;
class Goods extends Common
{
    //分类递归展示
    public function getCateInfo()
    {
        $model = model('Category');
        $data = collection($model->select())->toArray();
        //dump($data);
        $data = getCateInfo($data);
        return $data;
    }

    //商品类型添加
    public function goodsTypeAdd(){
            return view('goodstype/typeadd');
    }
    //商品类型执行添加
    public function  goodsTypeAddTo(){
        $type_name=input('post.');
        $goodsType_model=model('GoodsType');
        $goodsType_model->insert($type_name);
        successly('添加成功');
    }

    //商品类型展示
    public function goodsType(){
        $goodsType_model = model('GoodsType');
        $typeObj = $goodsType_model->paginate(6);
        $this->assign('typeInfo', $typeObj);
        return view('goodstype/index');
    }
    //根据商品类型获取属性
    //点击第四个时查属性 及值商品属性展示
    public function attrShow()
    {
        if (request()->isAjax()) {
            $tid = input('post.tid');
            $attribute_model = model('Attribute');
            $data = $attribute_model->where('type_id', $tid)->select();
            if ($data) {
                foreach ($data as $k => $v) {
                    $data[$k]['attr_values'] = explode("\r\n", trim($v['attr_values']));
                }
            }
            return view('type_attr', ['data' => $data]);
        }
    }


   #商品添加
    public function goodsAdd(){
        //品牌下拉
        $model=model('brand');
        $where=[
            'is_show'=>1
        ];
        $brandInfo=$model->where($where)->select();
        //分类下拉
        $cateInfo=$this->getCateInfo();
        //查询商品类性
        $goods_type_model=model('GoodsType');
        $typeInfo=$goods_type_model->select();
        $this->assign('typeInfo',$typeInfo);
        $this->assign('brandInfo',$brandInfo);
        $this->assign('cateInfo',$cateInfo);
        return view('goods/goodsadd');
    }

    //处理货号goods_sn  分为  自己创建   系统生成
    //系统生成货号
    public function createGoodsSn($goods_id){
        return $goods_sn='myshop'.date('YmdHis',time()).'0000'.$goods_id;
    }

    //执行添加 接值
    public function goodsAddTo(){
        //接值
        $goodsInfo=input('post.');
        //dump($goodsInfo);die;
        //dump($_FILES);die;
        $goodsModel = model('Goods');
        $goodsModel->startTrans();
        try{
            //用户输入货号进行唯一性判断
            if($goodsInfo['goods_sn']){
                //手动添加的 就要去数据库查询有没有相同的货号
                $data_id_num=$goodsModel->where('goods_sn',$goodsInfo['goods_sn'])->count();
                if($data_id_num == true){
                    //货号已存在
                    //echo "<script>alert('货号已存在,请重新输入');history.go(-1)</script>"; die;
                    throw new \Exception('货号已存在!请重新输入');//抛出异常
                }
            }

             //普通文件上传缩略图
                if( $_FILES['goods_img']['error'] == 0 ){
                    $goodsInfo['goods_img'] = upload( 'goods_img' );
                }
            //生成商品缩略图
            if( $goodsInfo[ 'auto_thumb' ] == 1 ){
                //勾选自动生成商品缩略图
                //原图路径
                $url_img =  './uploads/'.$goodsInfo['goods_img'];
                //原图不连后缀名的长度
                $length = stripos( $goodsInfo[ 'goods_img' ],'.' );
                //点+ 后缀名 截取下来
                $end = substr( $goodsInfo[ 'goods_img' ] , -4 , 4 );
                //缩略图路径 = 截下来的长度 . _thumb. 后缀名
                $thumb_img = substr( $goodsInfo[ 'goods_img' ] , 0 , $length ) .'_thumb'.$end;
                //入库的时候的值
                $thumb_img_url = './uploads/' . $thumb_img;
                //下两行  手册里的
                $image = \think\Image::open($url_img);
               // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
               $image->thumb(150, 150)->save($thumb_img_url);
            }else{
                //没有勾选 就是上传生成好的缩略图
                if( $_FILES['goods_thumb']['error'] ==0 ){
                    $thumb_img = upload('goods_thumb');
                }
            }
            $goodsInfo['goods_thumb'] = isset($thumb_img)?$thumb_img:'';
            $goodsInfo['content']= isset($goodsInfo['editorValue'])?$goodsInfo['editorValue']:'';
            //商品表goods添加
            $goods_id = $goodsModel->strict(false)->insertGetId($goodsInfo);
            //用户未填写货号 系统生成货号更新商品表
                if( !$goodsInfo['goods_sn']){
                    //系统生成货号
                    $goods_sn = $this->createGoodsSn( $goods_id );
                    //重新更新货号
                    $goodsModel->where('goods_id',$goods_id)->update(['goods_sn'=>$goods_sn]);
                }
            //dump($goodsInfo);die;
            //商品属性表添加
            $this->goodsAttributeAdd($goods_id,$goodsInfo['attr_value_list'],$goodsInfo['attr_price_list']);

             //商品相册添加
            $this->addGoodsPhoto( 'img_url',$goods_id,$goodsInfo['goods_img_desc'],$goodsInfo['goods_link']);
            $goodsModel->commit();
        }catch(\Exception $exc){
            //添加失败  回滚
            $goodsModel->rollback();
            fail( $exc->getMessage() );
            //Log::info('添加商品失败：'.$exc->getMessage()) ;//不能用
        }
        $this->redirect('goodsList');
    }

    /**
     * 添加商品属性
     * @param $goods_id 商品自增id
     * @param $attr_value_list 数组 商品属性 和规格
     * @param $attr_price_list 数组 商品价格
     */
    public function goodsAttributeAdd($goods_id,$attr_value_list,$attr_price_list){
        if( !$goods_id || !$attr_value_list){
            return;
        }
        $attrInfo1=$attrInfo2=[];
        foreach($attr_value_list as $k=>$v){
            if(!$v){
               continue;
            }
            //规格
            if(is_array($v)){
               foreach($v as $kk=>$vv){
                   $attrInfo2[]=[
                       'goods_id'=>$goods_id,
                       'attr_id'=>$k,
                       'attr_value'=>$vv,
                       'attr_price'=>$attr_price_list[$k][$kk]
                   ];
               }
            }else{
                //普通属性
                $attrInfo1[]=[
                    'goods_id'=>$goods_id,
                    'attr_id'=>$k,
                    'attr_value'=>$v,
                    'attr_price'=>''
                ];
            }
        }
        $attrInfo=array_merge($attrInfo1,$attrInfo2);
        $goodsAttr=model('GoodsAttr');
        $goodsAttr->insertAll($attrInfo);
    }

    /**
     * 多文件上传
     * 处理外链及图片描述等信息
     * @param type $img
     */
    public function addGoodsPhoto( $img,$goods_id,$desc,$link ){
        if( !$_FILES[$img]){
            return;
        }
        for( $i=0;$i<count( $_FILES[$img]['name'] );$i++){
            if( $_FILES[$img]['error'][$i]==4){
                $img_url = $link[$i];
            }else{
                $destination = './uploads/'.date('Ymd').'/'.uniqid().'.jpg';
                $img_url = substr($destination,10);
                $res = move_uploaded_file($_FILES[$img]['tmp_name'][$i], $destination);
            }
            $data[] = [
                'goods_id'=>$goods_id,
                'img_url'=>$img_url,
                'img_desc'=>$desc[$i]
            ];
        }
        //批量添加商品相册
        $goodsGallery_model=model('GoodsGallery');
       $goodsGallery_model->insertAll($data);

    }

    //商品展示页面
    public function goodsList()
    {
        //品牌下拉
        $model=model('brand');
        $where=[
            'is_show'=>1
        ];
        $brandInfo=$model->where($where)->select();
        //分类下拉
        $cateInfo=$this->getCateInfo();
        $this->assign('brandInfo',$brandInfo);
        $this->assign('cateInfo',$cateInfo);
        return view();
    }
    //商品列表展示
   public function getGoodsInfo(){
        $page=input('get.page');
        $limit=input('get.limit');
        $goods_name=input('get.goods_name');
        $cate_name=input('get.cate_name');
        $brand_name=input('get.brand_name');
        $where=[];
        if(!empty($goods_name)){
            $where['goods_name']=['like',"%$goods_name%"];
        }
        if(!empty($cate_name)){
            $where['cate_name']=$cate_name;
        }
        if(!empty($brand_name)){
            $where['brand_name']=$brand_name;
        }
        $goods=model('goods');
        $count=$goods->getGoodsCount($where);
        $page_count=ceil($count/$limit);
        if($page>$page_count&&$page!=1){
            $page=$page_count;
        }
        $data=$goods->getGoodsInfo($page,$limit,$where);
        return [
            'code'=>0,
            'msg'=>'',
            'count'=>$count,
            'data'=>$data
        ];
    }

    /**
     * 货品 展示页面
     * @return type
     */
    public function sku() {
       $goods_id=input('goods_id');
        $goodsModel=model('Goods');
        $goodsAttrModel=model('GoodsAttr');
        $goods = $goodsModel->field('goods_id,goods_name,goods_sn')->where('goods_id',$goods_id)->find();
        //dump($goods);die;
        $sql = "select goods_attr_id,shop_goods_attr.attr_id,attr_name,attr_value from shop_goods_attr  INNER JOIN shop_attribute on shop_goods_attr.attr_id=shop_attribute.attr_id where shop_goods_attr.goods_id=$goods_id and shop_attribute.attr_type=1";
        $data =$goodsAttrModel->query($sql);
        //dump($data);die;
        if( !$data){
            echo "<script>alert('此商品没有货品！');history.go(-1);</script>";
        }
        $names = $attr_values = [];
        foreach($data as $key=>$val){
            $names[$val['attr_id']] = $val['attr_name'];
            $attr_values[$val['attr_id']][$val['goods_attr_id']] = $val['attr_value'];
        }

        //dump($attr_values);die;
        //dump($names);die;
        $this->assign('names', $names);
        $this->assign('attr_values', $attr_values);
        $this->assign('goods', $goods);
        return view();
    }

    //添加货品
    public function saveSku(){
       $skuInfo=input('post.');//dump($skuInfo);die;
        if( is_array($skuInfo['attr']) ){
            $keys=array_keys($skuInfo['attr']);
            $count=count($skuInfo['attr'][$keys[0]]);
            for($i=0;$i<$count;$i++){
               $goods_attr=array_column($skuInfo['attr'],$i);
                $goods_attr_str=implode(',',$goods_attr);
                //判断手工录入的货品货号是否唯一
                if($skuInfo['product_sn'][$i]){
                    //货品货号存在
                    $product_model=model('GoodsProduct');
                    $is_have_pro=$product_model->where('pro_sn',$skuInfo['product_sn'][$i])->count();
                    if($is_have_pro){
                        $msg=$skuInfo['product_sn'][$i].'货品货号已存在,请重新输入';
                        echo "<script>alert('$msg');history.go(-1)</script>"; die;
                    }
                }

                $data[]=[
                   'goods_id'=>$skuInfo['goods_id'],
                   'goods_attr_id'=>$goods_attr_str,
                   'pro_number'=>$skuInfo['product_number'][$i],
                   'pro_sn'=>$skuInfo['product_sn'][$i]
               ];
            }
            $product_model=model('GoodsProduct');
            $res=$product_model->insertAll($data);
            if($res){
                //系统生成货品货号
                for($i=0;$i<$count;$i++){
                    if(!$skuInfo['product_sn'][$i]){
                        $goods_attr=array_column($skuInfo['attr'],$i);
                        $goods_attr_str=implode(',',$goods_attr);
                        $where=[
                            'goods_id'=>$skuInfo['goods_id'],
                            'goods_attr_id'=>$goods_attr_str
                        ];
                        $pro_id=$product_model->where($where)->column('pro_id');
                        $pro_sn=$skuInfo['goods_sn'].'_'.$pro_id[0];
                        $product_model->where($where)->update(['pro_sn'=>$pro_sn]);
                    }
                }
            }
            $this->redirect('goodsList');
            }

    }


















    /*
    public function goodsAdd()
    {
        if(checkRequest()){
            $data=input('post.');
            //验证
            $validate=validate('goods');
            $result=$validate->scene('add')->check($data);
            if(!$result){
                $font=$validate->getError();
                fail($font);
            }
            //保存到数据库
            $model=model('goods');
            $res=$model->allowField(true)->save($data);
            if($res){
                successly('添加成功');
            }else{
                fail('添加失败');
            }
        }else{
            //品牌下拉
            $model=model('brand');
            $where=[
                'is_show'=>1
            ];
            $brandInfo=$model->where($where)->select();
            //分类下拉
            $cateInfo=$this->getCateInfo();
            //查询商品类性
            $goods_type_model=model('GoodsType');
            $typeInfo=$goods_type_model->select();
            $this->assign('typeInfo',$typeInfo);
            $this->assign('brandInfo',$brandInfo);
            $this->assign('cateInfo',$cateInfo);
            return view();
        }

    }
    //递归展示
    public function getCateInfo(){
        $model=model('Category');
        $data=collection($model->select())->toArray();
        //dump($data);
        $data=getCateInfo($data);
        return $data;
    }
    //图片上传
    public function goodsUpload(){
        $type=input('get.type');
        $dir=$type==1?'goodsimg':'goodsimgs';
        $this->uploadInfo($dir);
    }
    //图片信息获取
    public function uploadInfo($dir){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . "uploads/$dir");
        if($info){
            $arr=[
                'code'=>1,
                'font'=>'添加成功',
                'src'=>$info->getSaveName()
            ];
            echo json_encode($arr);
        }else{
            // 上传失败获取错误信息
            fail($file->getError());
        }
    }
    //富文本编辑器文件上传
    public function goodsSetditImg(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . "uploads/editimg");
        if($info){
            $arr=[
                'code'=>0,
                'font'=>'添加成功',
                'data'=>[
                    'src'=>"http://www.myshop.com/public/uploads/editimg/".$info->getSaveName(),
                    'title'=>'aaa'
                ]
            ];
            echo json_encode($arr);
        }else{
            // 上传失败获取错误信息
            fail($file->getError());
        }
    }
    //商品名称唯一性验证
    public function checkName(){
        $type=input('post.type');
        $goods_name=input('post.goods_name');
        //echo $brand_name;exit;
        if($type==1){
            $where=[
                'goods_name'=>$goods_name
            ];
        }else{
            $goods_id=input('post.goods_id');
            $where=[
                'goods_id'=>['neq',$goods_id],
                'goods_name'=>$goods_name
            ];
        }

        $model=model('Goods');
        $arr=$model->where($where)->find();
        if($arr){
            echo 'no';
        }else{
            echo 'ok';
        }
    }
    //展示页面
    public function goodsList()
    {
        //品牌下拉
        $model=model('brand');
        $where=[
            'is_show'=>1
        ];
        $brandInfo=$model->where($where)->select();
        //分类下拉
        $cateInfo=$this->getCateInfo();
        $this->assign('brandInfo',$brandInfo);
        $this->assign('cateInfo',$cateInfo);
        return view();
    }
    //商品列表展示带属性
    public function getGoodsInfo(){
        $page=input('get.page');
        $limit=input('get.limit');
        $goods_name=input('get.goods_name');
        $cate_name=input('get.cate_name');
        $brand_name=input('get.brand_name');
        $where=[];
        if(!empty($goods_name)){
            $where['goods_name']=['like',"%$goods_name%"];
        }
        if(!empty($cate_name)){
            $where['cate_name']=$cate_name;
        }
        if(!empty($brand_name)){
            $where['brand_name']=$brand_name;
        }
        $goods=model('goods');
        $count=$goods->getGoodsCount($where);
        $page_count=ceil($count/$limit);
        if($page>$page_count&&$page!=1){
            $page=$page_count;
        }
        $data=$goods->getGoodsInfo($page,$limit,$where);
        return [
            'code'=>0,
            'msg'=>'',
            'count'=>$count,
            'data'=>$data
        ];
    }
    //即删即改
    public function goodsUpdateField(){
        //接收数据
        $data=input('post.');
        //dump($data);
        $info=[$data['field']=>$data['value']];
        //验证
        $validate=validate('goods');
        $res=$validate->scene($data['field'])->check($info);
        if(!$res){
            fail($validate->getError());
        }
        //修改
        $goods=model('goods');
        $where=[
            'goods_id'=>$data['goods_id']
        ];
        $result=$goods->save($info,$where);
        if($result){
            successly('ok');
        }else{
            fail('no');
        }
    }
    //商品类型
    public function goodsType(){
        $page=input('get.page');
        $limit=input('get.limit');
        $goodsType_model=model('GoodsType');
       $data=$goodsType_model->page($page,$limit)->select();
        $data=collection($data);
        //dump($data);die;
        $this->assign('page',$page);
        $this->assign('data',$data);
        return view('goodsType/index');
    }
    //添加时查属性 及值商品属性展示
    public function attrShow(){
       if(request()->isAjax()){
           $tid=input('post.tid');
           $attribute_model=model('Attribute');
           $data=$attribute_model->where('type_id',$tid)->select();
           if($data){
               foreach($data as $k=>$v){
                   $data[$k]['attr_values']=explode("\r\n",trim($v['attr_values']));
               }
           }
           //dump($data[$k]['attr_values']);die;
          return view('type_attr',['data'=>$data]);
       }
    }
    //删除
    public function goodsDel(){
        $goods_id=input('post.goods_id');
        $where=[
            'goods_id'=>$goods_id
        ];
        $goods=model('goods');
        $res=$goods->where($where)->delete();
        if($res){
            successly('删除成功');
        }else{
            fail('删除失败');
        }
    }
    //修改
    public function goodsUpdate(){
        if(checkRequest()){
            $data=input('post.');
            if(empty($data['goods_new'])){
                $data['goods_new']=2;
            }
            if(empty($data['goods_best'])){
                $data['goods_best']=2;
            }
            if(empty($data['goods_hot'])){
                $data['goods_hot']=2;
            }
            //验证器
            $validate=validate('goods');
            $result=$validate->scene('add')->check($data);
            if(!$result){
                $font=$validate->getError();
                fail($font);
            }
            //修改数据
            $where=[
                'goods_id'=>$data['goods_id']
            ];
            $model=model('goods');
            $res=$model->allowField(true)->save($data,$where);
            if($res===false){
                fail('修改失败');
            }else{
                successly('修改成功');
            }
        }else {
            //品牌下拉
            $model=model('brand');
            $where=[
                'is_show'=>1
            ];
            $brandInfo=$model->where($where)->select();
            //分类下拉
            $cateInfo=$this->getCateInfo();
            $this->assign('brandInfo',$brandInfo);
            $this->assign('cateInfo',$cateInfo);
            //查询单条数据
            $goods_id = input('get.goods_id');
            $where = [
                'goods_id' => $goods_id
            ];
            $goods = model('goods');
            $data = $goods->where($where)->find();
            $this->assign('data', $data);
            return view();
        }
    }
    */

}