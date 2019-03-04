<?php
namespace app\admin\model;
use \think\Model;
class Admin extends Model
{
    //开启时间戳
    //protected $autoWriteTimestamp = true;
    //定义字段名
    //protected $createTime = 'create_time';
    protected $updateTime = false;
    protected $salt;
    //自动完成
    protected $insert=['salt'];
    //密码修改器
    public function setAdminPwdAttr($value){
        //生成盐值
        $this->salt=$salt=createSalt();
        //生成密码
        $pwd=createPwd($value,$salt);
        return $pwd;
    }
    //自动完成
    public function setSaltAttr(){
        return $this->salt;
    }

}