<?php
namespace app\admin\controller;
use \think\Controller;
class Friend extends Common
{
    public function friendAdd()
    {
        if(checkRequest()){
            $data=input('post.');
            //验证器
            $validate=validate('friend');
            $result=$validate->scene('add')->check($data);
            if(!$result){
                $font=$validate->getError();
                fail($font);
            }
            //保存到数据库
            $model=model('friend');
            $res=$model->save($data);
            if($res){
                successly('添加成功');
            }else{
                fail('添加失败');
            }
        }else {
            return view();
        }
    }
    //验证友链唯一性
    public function checkName()
    {
        $type=input('post.type');
        $friend_name=input('post.friend_name');
        if($type==1){
            $where=[
                'friend_name'=>$friend_name
            ];
        }else{
            $friend_id=input('post.friend_id');
            $where=[
                'friend_id'=>['neq',$friend_id],
                'friend_name'=>$friend_name
            ];
        }

        $model=model('friend');
        $arr=$model->where($where)->find();
        if($arr){
            echo 'no';
        }else{
            echo 'ok';
        }
    }
    //列表展示
    public function friendList(){
        return view();
    }
    //列表展示ajax
    public function getFriendInfo(){
        $page=input('get.page');
        $limit=input('get.limit');
        $friend=model('Friend');
        $data=$friend->page($page,$limit)->select();
        $count=$friend->count();
        return [
            'code'=>0,
            'msg'=>'',
            'count'=>$count,
            'data'=>$data
        ];
    }
    //即删即改
    public function friendUpdateField(){
        //接收数据
        $data=input('post.');
        //dump($data);
        $info=[$data['field']=>$data['value']];
        //验证
        $validate=validate('Friend');
        $res=$validate->scene($data['field'])->check($info);
        if(!$res){
            fail(validate('Friend')->getError());
        }
        //修改
        $friend=model('Friend');
        $where=[
            'friend_id'=>$data['friend_id']
        ];
        $result=$friend->save($info,$where);
        if($result){
            successly('ok');
        }else{
            fail('no');
        }
    }
    //删除
    public function friendDel(){
        $friend_id=input('post.friend_id');
        $where=[
            'friend_id'=>$friend_id
        ];
        $friend=model('friend');
        $res=$friend->where($where)->delete();
        if($res){
            successly('删除成功');
        }else{
            fail('删除失败');
        }
    }
    //修改
    public function friendUpdate(){
        if(checkRequest()){
            $data=input('post.');
            //验证器
            $validate=validate('friend');
            $result=$validate->scene('edit')->check($data);
            if(!$result){
                $font=$validate->getError();
                fail($font);
            }
            //修改数据
            $where=[
                'friend_id'=>$data['friend_id']
            ];
            $model=model('friend');
            $res=$model->save($data,$where);
            if($res===false){
                fail('修改失败');
            }else{
                successly('修改成功');
            }

        }else {
            $friend_id = input('get.friend_id');
            $where = [
                'friend_id' => $friend_id
            ];
            $friend = model('friend');
            $data = $friend->where($where)->find();
            $this->assign('data', $data);
            return view();
        }
    }
}
?>