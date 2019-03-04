<?php
namespace app\admin\validate;
use \think\Validate;
class Category extends Validate
{
    //验证规则
    protected $rule=[
        'cate_name'=>'require|checkName',
        'cate_show'=>'require',
        'cate_navshow'=>'require',
        'pid'=>'require',
        'is_show'=>'require',
    ];
    //提示
    protected $message=[
        'cate_name.require'=>'分类名称必填',
        'cate_show.require'=>'是否展示必选',
        'cate_navshow.require'=>'是否导航展示必选',
        'pid.require'=>'父类必选',
    ];
    //场景
    protected $scene=[
        'add'=>['cate_name','cate_show','cate_navshow','pid'],
        'edit'=>['cate_name','cate_show','cate_navshow','pid'],
        'cate_name'=>['cate_name'],
        'cate_show'=>['cate_show'],
        'cate_navshow'=>['cate_navshow'],
        'pid'=>['pid']
    ];
    //验证唯一

    //验证账号是否符合正则
    public function checkName($value,$rule,$data){
        $reg='/^.{1,}$/';
        if(!preg_match($reg,$value)){
            return '分类名称错误';
        }else{
            if(empty($data['cate_id'])){
                $where=[
                    'cate_name'=>$value
                ];
            }else{
                $where=[
                    'cate_id'=>['neq',$data['cate_id']],
                    'cate_name'=>$value
                ];
            }
            $model=model('category');
            $res=$model->where($where)->find();
            if(!empty($res)){
                return '分类名称已存在';
            }else{
                return true;
            }
        }
    }
}