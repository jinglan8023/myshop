<?php
namespace app\admin\controller;
use think\Db;
class Role extends Common{
    public function roleAdd(){
        if(checkRequest()){
            $data=input('post.');
            //echo $role_name;exit;
            if(empty($data['node_id'])){
                fail('节点必选');
            }
            $role=model('role');
            $role->startTrans();
            try{
                //角色添加
                $res1=$role->allowField(true)->save($data);
                if(empty($res1)){
                    $role->rollback();
                    throw new \Exception('角色添加失败');
                }
                //角色节点添加
                $role_id=$role->role_id;
                $role_node=model('RoleNode');
                foreach($data['node_id'] as $k=>$v){
                    $info[]=[
                        'role_id'=>$role_id,
                        'node_id'=>$v
                    ];
                }
                $res2=$role_node->saveAll($info);
                if(empty($res2)){
                    $role->rollback();
                    throw new \Exception('角色节点表添加失败');
                }
                $role->commit();
                echo json_encode(['font'=>'添加成功','code'=>1]);
            }catch (\Exception $e){
                fail($e->getMessage());
            }
        }else{
            //查询节点表数据
            $node=model('node');
            $data=collection($node->select())->toArray();
            //print_r($data);exit;
            $nodeInfo=getNodeSonInfo($data);
            //print_r($nodeInfo);exit;
            $this->assign('nodeInfo',$nodeInfo);
            return view();
        }
    }
    //展示
    public function roleList(){
        $role=model('role');
        $roleInfo=$role->select();
        $this->assign('roleInfo',$roleInfo);
        return view();
    }
    //修改
    public function roleUpdate(){
        if(checkRequest()){
            $data=input('post.');
            $role=model('role');
            $role->startTrans();
            try{
                //角色修改
                $where=[
                    'role_id'=>$data['role_id']
                ];
                $res1=$role->allowField(true)->save($data,$where);
                if($res1===false){
                    $role->rollback();
                    throw new \Exception('角色表修改失败');
                }
                $role_node=model('RoleNode');
                //派生表修改
                $res2=$role_node->where($where)->delete();
                if($res2===false){
                    $role->rollback();
                    throw new \Exception('角色节点派生表删除失败');
                }
                foreach($data['node_id'] as $k=>$v){
                    $info[]=[
                        'role_id'=>$data['role_id'],
                        'node_id'=>$v
                    ];
                }
                $res3=$role_node->saveAll($info);
                if($res3===false){
                    $role->rollback();
                    throw new \Exception('角色节点派生表添加失败');
                }
                $role->commit();
                echo json_encode(['font'=>'修改成功','code'=>1]);
            }catch (\Exception $e){
                fail($e->getMessage());
            }
        }else{
            $role_id=input('get.role_id',0);
            if(empty($role_id)){
                $this->error('非法操作',url('role/rolelist'));
            }
            //查询管理员单条数据
            $where=[
                'role_id'=>$role_id
            ];
            $role=model('role');
            $roleInfo=$role->where($where)->find();
            //查询派生表node_id
            $role_node=model('RoleNode');
            $selectNodeInfo=$role_node->where($where)->column('node_id');
            //查询全部节点数据
            $node=model('node');
            $data=collection($node->select())->toArray();
            $nodeInfo=getNodeSonInfo($data);
            $this->assign('roleInfo',$roleInfo);
            $this->assign('nodeInfo',$nodeInfo);
            $this->assign('selectNodeInfo',$selectNodeInfo);
            return view();
        }
    }
    //删除
    public function roleDel(){
        $role_id=input('post.role_id',0);
        if(empty($role_id)){
            fail('非法操作');
        }
        $where=[
            'role_id'=>$role_id
        ];
        $role=model('role');
        $role->startTrans();
        try{
            $res1=$role->where($where)->delete();
            if($res1===false){
                $role->rollback();
                throw new \Exception('角色表删除失败');
            }
            $role_node=model('RoleNode');
            $res2=$role_node->where($where)->delete();
            if($res2===false){
                $role->rollback();
                throw new \Exception('角色节点派生表删除失败');
            }
            $role->commit();
            echo json_encode(['font'=>'删除成功','code'=>1]);
        }catch (\Exception $e){
            fail($e->getMessage());
        }
    }
}