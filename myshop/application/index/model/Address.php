<?php
namespace app\index\model;
use \think\Model;
class Address extends Model{
    protected $updateTime=false;
    protected $table='shop_address';
    protected $insert = ['user_id'];
    protected function setUserIdAttr(){
        return session('userInfo.user_id');
    }
    public function getAddressInfo($where){
        $area=model('area');
        $addressInfo=$this->where($where)->select();
        foreach($addressInfo as $k=>$v){
            $areaWhere=[
                'id'=>['in',[$v['province'],$v['city'],$v['district']]]
            ];
            $field=$area->where($areaWhere)->column('name');
            $addressInfo[$k]['area']=implode('',$field);
        }
        return $addressInfo;
    }
}