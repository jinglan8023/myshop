<?php
namespace app\admin\controller;
use \think\Controller;
class Common extends Controller
{
    public function _initialize(){
        if(!session('?adminInfo')){
            $this->error('请先登录',"login/login");
        }
        //查询左侧菜单
        $info=$this->getNodeInfo();
        //dump($info);exit;
        $leftNodeInfo=getLeftNodeInfo($info);
        $this->assign('leftNodeInfo',$leftNodeInfo);
        //查询管理员是否有此项操作权限
        foreach($info as $k=>$v){
            $node_id[]=$v['node_id'];
        }
        $node=model('node');
        $nodeWhere=[
          'controller_name'=>request()->controller(),
          //'action_name'=>request()->action()
        ];
        $my_node_id=$node->where($nodeWhere)->value('node_id');
        if(!in_array($my_node_id,$node_id)){
            $this->error('此操作权限不够',url('index/index'));
        }
    }
    public function getNodeInfo(){
        $admin_id=session('adminInfo.admin_id');
        //echo $admin_id;exit;
        $where=[
            'admin_id'=>$admin_id,
        ];
        $node=model('node');
        $data=$node
            ->alias('n')
            ->field("n.*")
            ->join("shop_role_node r_n","n.node_id=r_n.node_id")
            ->join("shop_role r","r_n.role_id=r.role_id")
            ->join('shop_admin_role a_r',"r.role_id=a_r.role_id")
            ->where($where)
            ->select();
        //递归数据
        return $data;
    }
}