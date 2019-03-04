<?php
namespace app\admin\validate;
use \think\Validate;
class Friend extends Validate
{
    //验证规则
    protected $rule=[
        'friend_name'=>'require|checkName',
        'friend_url'=>'require|checkUrl'
    ];
    //提示
    protected $message=[
        'friend_name.require'=>'友链名称必填',
        'friend_url.require'=>'友链地址必填',
    ];
    //场景
    protected $scene=[
        'add'=>['friend_name','friend_url'],
        'edit'=>['friend_name','friend_url'],
        'friend_name'=>['friend_name'],
        'friend_url'=>['friend_url']
    ];
    //验证唯一

    //验证账号是否符合正则
    public function checkName($value,$rule,$data){
        $reg='/^.{1,}$/';
        if(!preg_match($reg,$value)){
            return '友链名称错误';
        }else{
            if(empty($data['friend_id'])){
                $where=[
                    'friend_name'=>$value
                ];
            }else{
                $where=[
                    'friend_id'=>['neq',$data['friend_id']],
                    'friend_name'=>$value
                ];
            }
            $model=model('friend');
            $res=$model->where($where)->find();
            if(!empty($res)){
                return '友链名称已存在';
            }else{
                return true;
            }
        }
    }
    public function checkUrl($value,$rule,$data){
        $reg='/^www\..{1,}\.com$/';
        if(!preg_match($reg,$value)){
            return '友链地址格式错误';
        }else{
            return true;
        }
    }
}