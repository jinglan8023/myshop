<?php
namespace app\admin\controller;
//use \think\Controller;
class Admin extends Common
{
    public function adminAdd()
    {
        if(checkRequest()){
            $data=input('post.');
            //验证器
            $validate=validate('Admin');
            $result=$validate->scene('add')->check($data);
            if(!$result){
                $font=$validate->getError();
                fail($font);
            }
            //保存到数据库
            $model=model('Admin');
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
    //验证账号唯一性
    public function checkName()
    {
        $type=input('post.type');
        $admin_name=input('post.admin_name');
        if($type==1){
            $where=[
                'admin_name'=>$admin_name
            ];
        }else{
            $admin_id=input('post.admin_id');
            $where=[
                'admin_id'=>['neq',$admin_id],
                'admin_name'=>$admin_name
            ];
        }

        $model=model('Admin');
        $arr=$model->where($where)->find();
        if($arr){
            echo 'no';
        }else{
            echo 'ok';
        }
    }
    //列表展示
    public function adminList(){
        return view();
    }
    //列表展示ajax
    public function getAdminInfo(){
        $page=input('get.page');
        $limit=input('get.limit');
        $admin=model('Admin');
        $data=$admin->page($page,$limit)->select();
        $count=$admin->count();
        return [
            'code'=>0,
            'msg'=>'',
            'count'=>$count,
            'data'=>$data
        ];
    }
    //即删即改
    public function adminUpdateField(){
        //接收数据
        $data=input('post.');
        //dump($data);
        $info=[$data['field']=>$data['value']];
        //验证
        $validate=validate('admin');
        $res=$validate->scene($data['field'])->check($info);
        if(!$res){
            fail(validate('admin')->getError());
        }
        //修改
        $admin=model('Admin');
        $where=[
            'admin_id'=>$data['admin_id']
        ];
        $result=$admin->save($info,$where);
        if($result){
            successly('ok');
        }else{
            fail('no');
        }
    }
    //删除
    public function adminDel(){
        $admin_id=input('post.admin_id');
        if(empty($admin_id)){
            fail('非法操作');
        }
        $where=[
            'admin_id'=>$admin_id
        ];
        $admin=model('Admin');
        $admin->startTrans();
        try{
            $res1=$admin->where($where)->delete();
            if($res1===false){
                $admin->rollback();
                throw new \Exception('管理员删除失败');
            }
            $admin_role=model('AdminRole');
            $res2=$admin_role->where($where)->delete();
            if($res2===false){
                $admin->rollback();
                throw new \Exception('管理员角色派生表删除失败');
            }
            $admin->commit();
            successly('删除成功');
        }catch (\Exception $e){
            fail($e->getMessage());
        }
    }
    //修改
    public function adminUpdate(){
        if(checkRequest()){
            $data=input('post.');
            //验证器
            $validate=validate('Admin');
            $result=$validate->scene('edit')->check($data);
            if(!$result){
                $font=$validate->getError();
                fail($font);
            }
            //修改数据
            $where=[
                'admin_id'=>$data['admin_id']
            ];
            $model=model('Admin');
            $res=$model->save($data,$where);
            if($res===false){
                fail('修改失败');
            }else{
                successly('修改成功');
            }

        }else {
            $admin_id = input('get.admin_id');
            $where = [
                'admin_id' => $admin_id
            ];
            $admin = model('Admin');
            $data = $admin->where($where)->find();
            $this->assign('data', $data);
            return view();
        }
    }
    //修改密码
    public function adminUpdatePwd(){
        if(checkRequest()){
            $old_pwd=input('post.old_pwd');
            //echo $old_pwd;
            $new_pwd1=input('post.new_pwd1');
            $new_pwd2=input('post.new_pwd2');
            //验证原密码是否正确
            $model=model('admin');
            if(empty($old_pwd)){
                fail("原密码必填");
            }else{
                //获取用户正确信息
                $admin_id=session('adminInfo.admin_id');
                $where=[
                    'admin_id'=>$admin_id,
                ];
                $arr=$model->where($where)->find();
                $admin_pwd=createPwd($old_pwd,$arr['salt']);
                if($admin_pwd!=$arr['admin_pwd']){
                    fail('原密码错误');
                }
            }
            //验证密码
            $validate=validate('admin');
            $pwd=['admin_pwd'=>$new_pwd1];
            $res=$validate->scene('admin_pwd')->check($pwd);
            if(!$res){
                fail($validate->getError());
            }
            //验证密码与确认密码一致
            if($new_pwd2!=$new_pwd1){
                fail('密码与确认密码须保持一致');
            }
            //修改
            $updateInfo=[
                'admin_pwd'=>createPwd($new_pwd1,$arr['salt'])
            ];
            //print_r($updateInfo);exit;
            $res=$model->where($where)->update($updateInfo);
            if($res){
                successly('修改密码成功');
            }else{
                fail('修改密码失败');
            }

        }else{
            return view();
        }
    }
    //授与角色
    public function giveRole(){
        if(checkRequest()){
            $data=input('post.');
            //print_r($data);exit;
            if(empty($data['admin_id'])){
                fail('非法操作');
            }
            //删除
            $admin_role=model('AdminRole');
            $admin_role->startTrans();
            try{
                $where=[
                    'admin_id'=>$data['admin_id']
                ];
                $res1=$admin_role->where($where)->delete();
                if($res1===false){
                    $admin_role->rollback();
                    throw new \Exception('管理员角色派生表删除失败');
                }
                foreach($data['role_id'] as $k=>$v){
                    $info[]=[
                        'admin_id'=>$data['admin_id'],
                        'role_id'=>$v
                    ];
                }
                $res2=$admin_role->allowField(true)->saveAll($info);
                if($res2===false){
                    $admin_role->rollback();
                    throw new \Exception('管理员角色派生表操作失败');
                }
                $admin_role->commit();
                successly('操作成功');
            }catch (\Exception $e){
                fail($e->getMessage());
            }
        }else{
            $admin_id=input('get.admin_id',0,'intval');
            if(empty($admin_id)){
                $this->error('非法操作',url('admin/adminlist'));
            }
            //查询角色表数据
            $role=model('role');
            $roleInfo=$role->select();
            //查询管理员 授予角色信息
            $where=[
                'admin_id'=>$admin_id
            ];
            $admin_role=model('AdminRole');
            $selectRoleInfo=$admin_role->where($where)->column('role_id');
            $this->assign('admin_id',$admin_id);
            $this->assign('roleInfo',$roleInfo);
            $this->assign('selectRoleInfo',$selectRoleInfo);
            return view();
        }
    }
}
?>