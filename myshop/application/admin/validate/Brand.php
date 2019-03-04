<?php
namespace app\admin\validate;
use \think\Validate;
class Brand extends Validate
{
    //验证规则
    protected $rule=[
        'brand_name'=>'require|checkName',
        'brand_url'=>'require|checkUrl',
        'brand_logo'=>'require',
        'brand_describe'=>'require',
        'is_show'=>'require',
    ];
    //提示
    protected $message=[
        'brand_name.require'=>'品牌名称必填',
        'brand_url.require'=>'品牌地址必填',
        'brand_logo.require'=>'品牌图片上传失败',
        'brand_describe.require'=>'品牌简介必填',
        'is_show.require'=>'是否上架必选'
    ];
    //场景
    protected $scene=[
        'add'=>['brand_name','brand_url','brand_logo','brand_describe','is_show'],
        'edit'=>['brand_name','brand_url','brand_describe','is_show'],
        'brand_name'=>['brand_name'],
        'brand_url'=>['brand_url'],
        'brand_describe'=>['brand_describe'],
        'is_show'=>['is_show']
    ];
    //验证唯一

    //验证账号是否符合正则
    public function checkName($value,$rule,$data){
        $reg='/^.{1,}$/';
        if(!preg_match($reg,$value)){
            return '品牌名称错误';
        }else{
            if(empty($data['brand_id'])){
                $where=[
                    'brand_name'=>$value
                ];
            }else{
                $where=[
                    'brand_id'=>['neq',$data['brand_id']],
                    'brand_name'=>$value
                ];
            }
            $model=model('brand');
            $res=$model->where($where)->find();
            if(!empty($res)){
                return '品牌名称已存在';
            }else{
                return true;
            }
        }
    }
    public function checkUrl($value,$rule,$data){
        $reg='/^www\..{1,}\.com$/';
        if(!preg_match($reg,$value)){
            return '品牌地址格式错误';
        }else{
            return true;
        }
    }
}