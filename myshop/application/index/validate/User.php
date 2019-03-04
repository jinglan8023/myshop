<?php
namespace app\index\validate;
use think\Validate;
class User extends Validate{
    //规则
    protected $rule=[
        'user_email'=>'require|email|checkEmail|unique:user',
        'user_code'=>'require|checkCode',
        'user_tel'=>'require|checkTel|unique:user',
        'user_pwd'=>'require|checkPwd',
        'user_pwd1'=>'require|confirm:user_pwd',
    ];
    protected $message=[
        'user_tel.require'=>'手机号必填',
        'user_tel.unique'=>'手机号已被注册，请直接登录',
        'user_pwd.require'=>'密码必填',
        'user_pwd1.require'=>'确认密码必填',
        'user_pwd1.confirm'=>'确认密码必须和密码保持一致',
        'user_email.require'=>'邮箱必填',
        'user_email.email'=>'请输入正确的邮箱格式',
        'user_email.unique'=>'该邮箱已被注册,请直接登录',
        'user_code.require'=>'验证码不能为空',
    ];
    //环境
    protected  $scene=[
        'registerTel'=>['user_tel','user_pwd','user_pwd1'],
        'registerEmail'=>['user_email','user_pwd','user_pwd1'],
    ];
    //验证手机号
    public function checkTel($value,$rule,$data){
        $tel=session('codeInfo.tel');
       $reg='/^1[1-9]\d{9}$/';
        if(!preg_match($reg,$value)) {
            return '请输入正确手机号';
        }else if($value!=$tel){
            return '当前手机号与发送验证码手机号不一致';
        }else{
            return true;
        }
    }
    //验证验证码
    function checkCode($value,$rule,$data){
        $code=session('codeInfo.code');
        $time=session('codeInfo.time');
        if($code!=$value){
            return '验证码有误';
        }else if(time()-$time>300){
            return '验证码已过期,五分钟内输入';
        }else{
            return true;
        }
    }
    //验证邮箱
    function checkEmail($value,$rule,$data){
        $email=session('codeInfo.email');
        if($value!=$email){
            return  '当前邮箱与发送验证码邮箱不一致';
        }else{
            return true;
        }
    }
    //验证密码
    public function checkPwd($value,$rule,$data){
        $reg='/^.{6,}$/';
        if(!preg_match($reg,$value)){
            return '密码必须6位以上';
        }else{
            return true;
        }
    }
}