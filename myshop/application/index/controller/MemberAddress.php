<?php
namespace app\index\controller;
class MemberAddress extends Common
{
    //收货地址
    public function address()
    {
        if(checkRequest()){
            $info=input('post.');
            //echo $info['address_dafault'];exit;
            //验证
            $validate=validate('address');
            $res=$validate->scene('add')->check($info);
            if(!$res){
                fail($validate->getError());
            }
            $address=model('address');
            if($info['address_dafault']==1){
                $where=[
                    'user_id'=>session('userInfo.user_id')
                ];
                $address->where($where)->update(['address_dafault'=>2]);
            }
            //入库
            $res=$address->allowField(true)->save($info);
            if($res){
                successly('添加成功');
            }else{
                fail('添加失败');
            }
        }else{
            if($this->getLogin()==false){
                $this->error('请先登录',"login/login");exit;
            }else{
                //查询当前收货地址
                $where=[
                    'user_id'=>session('userInfo.user_id')
                ];
                $address=model('address');
                $addressInfo=$address->getAddressInfo($where);
                //获取省份
                $province=$this->getAreaInfo(0);
                $this->assign('province',$province);
                $this->assign('addressInfo',$addressInfo);
                return view();
            }
        }
    }
    //ajax返回省市区
    public function getArea(){
        $id=input('post.id');
        $info=$this->getAreaInfo($id);
        echo json_encode($info);
    }
    //三级联动查询
    public function getAreaInfo($id){
        $area=model('area');
        $where=[
            'pid'=>$id
        ];
        $info=$area->where($where)->select();
        return $info;
    }
    //删除收货地址
    public function addressDel(){
        $address_id=input('post.address_id');
        $where=[
            'address_id'=>$address_id
        ];
        $address=model('address');
        $res=$address->where($where)->delete();
        if($res){
            successly('删除成功');
        }else{
            fail('删除失败');
        }
    }
    //是否默认
    public function addressdafault(){
        $address_id=input('post.address_id');
        $address=model('address');
        $where=[
            'user_id'=>session('userInfo.user_id')
        ];
        $address->where($where)->update(['address_dafault'=>2]);
        $addressWhere=[
            'address_id'=>$address_id
        ];
        $res=$address->save(['address_dafault'=>1],$addressWhere);
        if($res){
            successly('已默认');
        }else{
            fail('默认失败');
        }
    }
    //修改收货地址
    public function addressUpdate(){
        if(checkRequest()){
            $info=input('post.');
            //echo $info['address_dafault'];exit;
            //验证
            $validate=validate('address');
            $res=$validate->scene('add')->check($info);
            if(!$res){
                fail($validate->getError());
            }
            $address=model('address');
            if($info['address_dafault']==1){
                $where=[
                    'user_id'=>session('userInfo.user_id')
                ];
                $address->where($where)->update(['address_dafault'=>2]);
            }
            //入库
            $updateWhere=[
                'address_id'=>$info['address_id']
            ];
            $res=$address->allowField(true)->where($updateWhere)->update($info);
            if($res!==false){
                successly('修改成功');
            }else{
                fail('修改失败');
            }
        }else{
            if($this->getLogin()==false){
                $this->error('请先登录',"login/login");exit;
            }else{
                $address_id=input('get.address_id',0,'intval');
                if(empty($address_id)){
                    fail('非法操作');
                };
                $address=model('address');
                $where=[
                    'address_id'=>$address_id,
                ];
                //查当前主键数据
                $info=$address->where($where)->find();
                //dump($info);
                //查当前省数据
                $province=$this->getAreaInfo(0);
                //查当前市数据
                $city=$this->getAreaInfo($info['province']);
                //查当前区数据
                $district=$this->getAreaInfo($info['city']);
                $this->assign('info',$info);
                $this->assign('province',$province);
                $this->assign('city',$city);
                $this->assign('district',$district);
                return view();
            }
        }
    }
}
