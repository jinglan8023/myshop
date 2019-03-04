<?php
namespace app\admin\model;
use \think\Model;
class Goods extends Model{
    protected $table='shop_goods';
    protected $updateTime = false;
    public function getGoodsInfo($page,$limit,$where){
        $data=$this->alias('g')
            ->field('g.*,cate_name,brand_name')
            ->join('shop_category c','g.cate_id=c.cate_id')
            ->join('shop_brand b','g.brand_id=b.brand_id')
            ->where($where)
            ->page($page,$limit)
            ->select();
        return $data;
    }
    public function getGoodsCount($where){
        $count=$this->alias('g')
            ->field('g.*,cate_name,brand_name')
            ->join('shop_category c','g.cate_id=c.cate_id')
            ->join('shop_brand b','g.brand_id=b.brand_id')
            ->where($where)
            ->count();
        return $count;
    }

}