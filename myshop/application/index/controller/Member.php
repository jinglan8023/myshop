<?php
namespace app\index\controller;

class Member extends Common
{
    public function member()
    {
        if(checkRequest()){
            $info=input('post.');
            //验证
            $validate=validate('member');
        }else{
            if($this->getLogin()==false){
                $this->error('请先登录',"login/login");exit;
            }else{
                return view();
            }
        }
    }
    public function member_collect(){
        $user_id=$this->getUserId();
        $userGoodsModel=model('UserGoods');
        $goods_ids=$userGoodsModel
            ->where('user_id',$user_id)
            ->column('goods_id');
        $goodsModel=model('Goods');
        $collectInfo=$goodsModel->whereIn('goods_id',$goods_ids)->select();
        $this->assign('collectInfo',$collectInfo);
        return view('member/member_collection');
    }
}
