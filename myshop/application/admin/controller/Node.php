<?php
namespace app\admin\controller;
class Node extends Common{
    //节点添加
    public function nodeAdd(){
        if(checkRequest()){
            $info=input('post.');
            //print_r($info);
            $node_model=model('node');
            $res=$node_model->save($info);
            if($res){
                successly('添加成功');
            }else{
                fail('添加失败');
            }
        }else{
            $nodeWhere=[
                'pid'=>0
            ];
            $node_model=model('node');
            $data=$node_model->where($nodeWhere)->select();
            $this->assign('data',$data);
            return view();
        }
    }
    //节点展示
    public function nodeList(){
        $data=$this->getNodeInfo();
        $this->assign('data',$data);
        return view();
    }
    //查询全部节点数据
    public function getNodeInfo(){
        $node_model=model('node');
        $data=collection($node_model->select())->toArray();
        $data=getNodeInfo($data);
        return $data;
    }
    //即点即改
    public function nodeUpdateField(){
        $value=input('post.value');
        $field=input('post.field');
        //echo $field;
        $node_id=input('post.node_id');
        $info=['node_id'=>$node_id,$field=>$value];
        //修改
        $node=model('node');
        $where=[
            'node_id'=>$node_id
        ];
        $result=$node->save($info,$where);
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
        $node_id=input('post.node_id');
        $model=model('node');
        $where=['node_id'=>$node_id];
        $data=[$field=>$status];
        $res=$model->save($data,$where);
        if($res){
            successly('ok');
        }else{
            fail('no');
        }
    }
    //删除
    public function nodeDel(){
        $node_id=input('post.node_id');
        //此节点下是否有子类
        $cate=model('node');
        $cateWhere=[
            'pid'=>$node_id
        ];
        $count=$cate->where($cateWhere)->count();
        if($count>0){
            fail('此节点下有子节点,不能删除');
        }
        //查询此分类下是否有商品
        //$goods=model('goods');
        $where=['node_id'=>$node_id];
        //$cou=$goods->where($where)->count();
        //if($cou>0){
        //    fail('此分类下有子类或商品,不能删除');
        //}
        //删除
        $res=$cate->where($where)->delete();
        if($res){
            successly('删除成功');
        }else{
            fail('删除失败');
        }
    }
    //修改
    public function nodeUpdate(){
        if(checkRequest()){
            //接数据
            $data=input('post.');
            //修改
            $model=model('node');
            $where=['node_id'=>$data['node_id']];
            $res=$model->save($data,$where);
            if($res===false){
                fail('修改失败');
            }else{
                successly('修改成功');
            }

        }else{
            //接数据
            $node_id=input('get.node_id');
            //查单条
            $model=model('node');
            $where=['node_id'=>$node_id];
            $arr=$model->where($where)->find();
            //dump($arr);
            $nodeWhere=[
                'pid'=>0
            ];
            $node_model=model('node');
            $data=$node_model->where($nodeWhere)->select();
            $this->assign('data',$data);
            $this->assign('arr',$arr);
            return view();
        }
    }
}