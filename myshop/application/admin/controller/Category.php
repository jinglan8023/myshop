<?php
namespace app\admin\controller;
header('content-type:text/html;charset=utf-8');
class Category extends Common
{
    public function cateAdd()
    {
        if(checkRequest()){
            $data=input('post.');
            //验证器
            $validate=validate('category');
            $result=$validate->scene('add')->check($data);
            if(!$result){
                $font=$validate->getError();
                fail($font);
            }
            //保存到数据库
            $model=model('category');
            $res=$model->save($data);
            if($res){
                successly('添加成功');
            }else{
                fail('添加失败');
            }
        }else{
            $data=$this->getCateInfo();
            $this->assign('data',$data);
            return view();
        }
    }
    public function cateList()
    {
        $data=$this->getCateInfo();
        //dump($data);exit;
        $this->assign('data',$data);
        return view();
    }
    //递归展示
    public function getCateInfo(){
        $model=model('Category');
        $data=collection($model->select())->toArray();
        //dump($data);
        $data=getCateInfo($data);
        return $data;
    }
    //分类名称唯一性验证
    public function checkName(){
        $type=input('post.type');
        $cate_name=input('post.cate_name');
        //echo $brand_name;exit;
        if($type==1){
            $where=[
                'cate_name'=>$cate_name
            ];
        }else{
            $cate_id=input('post.cate_id');
            $where=[
                'cate_id'=>['neq',$cate_id],
                'cate_name'=>$cate_name
            ];
        }
        $model=model('category');
        $arr=$model->where($where)->find();
        //dump($arr);
        if($arr){
            echo 'no';
        }else{
            echo 'ok';
        }
    }
    //即点即改
    public function cateUpdateField(){
        $value=input('post.value');
        $field=input('post.field');
        //echo $field;
        $cate_id=input('post.cate_id');
        $info=['cate_id'=>$cate_id,$field=>$value];
        //验证
        $validate=validate('category');
        $res=$validate->scene($field)->check($info);
        if(!$res){
            fail($validate->getError());
        }
        //修改
        $cate=model('category');
        $where=[
            'cate_id'=>$cate_id
        ];
        $result=$cate->save($info,$where);
        if(!$result===false){
            successly('ok');
        }else{
            fail('no');
        }
    }
    //是否展示 导航展示 即点即改
    public function updateField(){
        $status=input('post.status');
        $field=input('post.field');
        $cate_id=input('post.cate_id');
        $model=model('category');
        $where=['cate_id'=>$cate_id];
        $data=[$field=>$status];
        $res=$model->save($data,$where);
        if($res){
            successly('ok');
        }else{
            fail('no');
        }
    }
    //删除
    public function cateDel(){
        $cate_id=input('post.cate_id');
        //此分类下是否有子类
        $cate=model('category');
        $cateWhere=[
            'pid'=>$cate_id
        ];
        $count=$cate->where($cateWhere)->count();
        if($count>0){
            fail('此分类下有子类或商品,不能删除');
        }
        //查询此分类下是否有商品
        $goods=model('goods');
        $where=['cate_id'=>$cate_id];
        $cou=$goods->where($where)->count();
        if($cou>0){
            fail('此分类下有子类或商品,不能删除');
        }
        //删除
        $res=$cate->where($where)->delete();
        if($res){
            successly('删除成功');
        }else{
            fail('删除失败');
        }
    }
    //修改
    public function cateUpdate(){
        if(checkRequest()){
            //接数据
            $data=input('post.');
            //验证器
            $validate=validate('category');
            $result=$validate->scene('edit')->check($data);
            if(!$result){
                $font=$validate->getError();
                fail($font);
            }
            //修改
            $model=model('category');
            $where=['cate_id'=>$data['cate_id']];
            $res=$model->save($data,$where);
            if($res===false){
                fail('修改失败');
            }else{
                successly('修改成功');
            }

        }else{
            //接数据
            $cate_id=input('get.cate_id');
            //查单条
            $model=model('Category');
            $where=['cate_id'=>$cate_id];
            $arr=$model->where($where)->find();
            //dump($arr);
            //查下拉菜单
            $data=$this->getCateInfo();
            $this->assign('arr',$arr);
            $this->assign('data',$data);
            return view();
        }
    }
}
?>