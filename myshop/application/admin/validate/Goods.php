<?php
namespace app\admin\validate;
use \think\Validate;
class Goods extends Validate
{
    //验证规则
    protected $rule=[
        'goods_name'=>'require|checkName',
        'goods_selfprice'=>'require',
        'goods_marketprice'=>'require',
        'goods_up'=>'require',
        'goods_num'=>'require',
        'goods_score'=>'require',
        'goods_img'=>'require',
        'goods_imgs'=>'require',
        'cate_id'=>'require',
        'brand_id'=>'require',
    ];
    //提示
    protected $message=[
        'goods_name.require'=>'商品名称必填',
        'goods_selfprice.require'=>'本店价格必填',
        'goods_marketprice.require'=>'市场价必填',
        'goods_up.require'=>'是否上架必选',
        'goods_num.require'=>'库存必填',
        'goods_score.require'=>'积分必填',
        'goods_img.require'=>'商品图片必须上传',
        'goods_imgs.require'=>'轮播图必须上传',
        'cate_id.require'=>'商品分类必选',
        'brand_id.require'=>'商品品牌必选',
    ];
    protected $scene=[
        'add'=>['goods_name','goods_selfprice','goods_marketprice','goods_up','goods_num','goods_score','goods_img','goods_imgs','cate_id','brand_id'],
        'edit'=>['cate_name','cate_show','cate_navshow','pid'],
        'goods_name'=>['goods_name'],
        'goods_selfprice'=>['goods_selfprice'],
        'goods_marketprice'=>['goods_marketprice'],
        'goods_up'=>['goods_up'],
        'goods_num'=>['goods_num'],
        'goods_score'=>['goods_score'],
        'goods_img'=>['goods_img'],
        'goods_imgs'=>['goods_imgs'],
        'cate_id'=>['cate_id'],
        'brand_id'=>['brand_id'],
        'goods_new'=>['goods_new'],
        'goods_hot'=>['goods_hot'],
        'goods_best'=>['goods_best'],
    ];
    //验证商品名称是否符合正则
    public function checkName($value,$rule,$data){
        $reg='/^.{1,}$/';
        if(!preg_match($reg,$value)){
            return '商品名称错误';
        }else{
            if(empty($data['goods_id'])){
                $where=[
                    'goods_name'=>$value
                ];
            }else{
                $where=[
                    'goods_id'=>['neq',$data['goods_id']],
                    'goods_name'=>$value
                ];
            }
            $model=model('goods');
            $res=$model->where($where)->find();
            if(!empty($res)){
                return '商品名称已存在';
            }else{
                return true;
            }
        }
    }
}