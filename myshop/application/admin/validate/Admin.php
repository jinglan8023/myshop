<?php
namespace app\admin\validate;
use \think\Validate;
class Admin extends Validate
{
    //验证规则
    protected $rule=[
        'admin_name'=>'require|checkName',
        'admin_pwd'=>'require|checkPwd',
        'admin_email'=>'require|email',
        'admin_tel'=>'require|checkTel'
    ];
    //提示
    protected $message=[
        'admin_name.require'=>'账号不能为空',
        'admin_name.unique'=>'账号已存在',
        'admin_pwd.require'=>'密码不能为空',
        'admin_email.require'=>'邮箱不能为空',
        'admin_email.email'=>'邮箱格式错误',
        'admin_tel.require'=>'手机不能为空',
    ];
    //场景
    protected $scene=[
        'add'=>['admin_name','admin_pwd','admin_email','admin_tel'],
        'edit'=>['admin_name','admin_email','admin_tel'],
        'admin_name'=>['admin_name'],
        'admin_pwd'=>['admin_pwd'],
        'admin_email'=>['admin_email'],
        'admin_tel'=>['admin_tel'],
    ];
    //验证唯一

    //验证账号是否符合正则
    public function checkName($value,$rule,$data){
        $reg='/^[a-z_]\w{3,11}$/i';
        if(!preg_match($reg,$value)){
            return '账号数字字母下划线组成，且数字不能开头';
        }else{
            if(empty($data['admin_id'])){
                $where=[
                    'admin_name'=>$value
                ];
            }else{
                $where=[
                    'admin_id'=>['neq',$data['admin_id']],
                    'admin_name'=>$value
                ];
            }
            $model=model('Admin');
            $res=$model->where($where)->find();
            if(!empty($res)){
                return '账号已存在';
            }else{
                return true;
            }
        }
    }
    public function checkPwd($value,$rule,$data){
        $reg='/^.{6,16}$/';
        if(!preg_match($reg,$value)){
            return '密码必须在6-16位之间';
        }else{
            return true;
        }
    }
    public function checkTel($value,$rule,$data){
        $reg='/^1[3-9]\d{9}$/';
        if(!preg_match($reg,$value)){
            return '手机号必须为11位数字';
        }else{
            return true;
        }
    }


}