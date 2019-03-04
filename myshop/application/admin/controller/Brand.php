<?php
 namespace app\admin\controller;
 class Brand extends Common
 {
     //品牌添加
     public function brandAdd()
     {
         if(checkRequest()){
             $data=input('post.');
             //验证器
             $validate=validate('brand');
             $result=$validate->scene('add')->check($data);
             if(!$result){
                 $font=$validate->getError();
                 fail($font);
             }
             //保存到数据库
             $model=model('brand');
             $res=$model->allowField(true)->save($data);
             if($res){
                 successly('添加成功');
             }else{
                 fail('添加失败');
             }
         }else{
             return view();
         }
     }
     //品牌名称唯一性验证
     public function checkName(){
         $type=input('post.type');
         $brand_name=input('post.brand_name');
         //echo $brand_name;exit;
         if($type==1){
             $where=[
                 'brand_name'=>$brand_name
             ];
         }else{
             $brand_id=input('post.brand_id');
             $where=[
                 'brand_id'=>['neq',$brand_id],
                 'brand_name'=>$brand_name
             ];
         }

         $model=model('Brand');
         $arr=$model->where($where)->find();
         if($arr){
             echo 'no';
         }else{
             echo 'ok';
         }
     }
     //logo上传
     public function brandLogo(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/brandlogo');
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
     //列表展示
     public function brandList()
     {
         return view();
     }
     //列表展示
     public function getBrandInfo(){
         $page=input('get.page');
         $limit=input('get.limit');
         $brand=model('brand');
         $data=$brand->page($page,$limit)->select();
         $count=$brand->count();
         return [
             'code'=>0,
             'msg'=>'',
             'count'=>$count,
             'data'=>$data
         ];
     }
     //即删即改
     public function brandUpdateField(){
         //接收数据
         $data=input('post.');
         //dump($data);
         $info=[$data['field']=>$data['value']];
         //验证
         $validate=validate('brand');
         $res=$validate->scene($data['field'])->check($info);
         if(!$res){
             fail(validate('brand')->getError());
         }
         //修改
         $admin=model('brand');
         $where=[
             'brand_id'=>$data['brand_id']
         ];
         $result=$admin->save($info,$where);
         if($result){
             successly('ok');
         }else{
             fail('no');
         }
     }
     //删除
     public function brandDel(){
         $brand_id=input('post.brand_id');
         //查询该品牌下是否有商品
         $goods=model('goods');
         $where=['brand_id'=>$brand_id];
         $cou=$goods->where($where)->count();
         if($cou>0){
             fail('此分类下有子类或商品,不能删除');
         }
         //删除
         $where=[
             'brand_id'=>$brand_id
         ];
         $brand=model('Brand');
         $res=$brand->where($where)->delete();
         if($res){
             successly('删除成功');
         }else{
             fail('删除失败');
         }
     }
     //修改
     public function brandUpdate(){
         if(checkRequest()){
             $data=input('post.');
             //验证器
             $validate=validate('Brand');
             $result=$validate->scene('edit')->check($data);
             if(!$result){
                 $font=$validate->getError();
                 fail($font);
             }
             //修改数据
             $where=[
                 'brand_id'=>$data['brand_id']
             ];
             $model=model('Brand');
             $res=$model->allowField(true)->save($data,$where);
             if($res===false){
                 fail('修改失败');
             }else{
                 successly('修改成功');
             }
         }else {
             $brand_id = input('get.brand_id');
             $where = [
                 'brand_id' => $brand_id
             ];
             $brand = model('Brand');
             $data = $brand->where($where)->find();
             $this->assign('data', $data);
             return view();
         }
     }
 }
 ?>