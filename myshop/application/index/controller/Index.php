<?php
namespace app\index\controller;
class Index extends Common
{
    public function index()
    {
        $this->getIndexCateInfo();
        $this->getIndexCateNavInfo();
        $info=$this->getFloorInfo(1);
        $this->assign('info',$info);
        return view();
    }
    //查询楼层数据
    public function getFloorInfo($cate_id){
        $cate=model('category');
        //顶级分类
        $info=[];
        $oneWhere=[
            'cate_id'=>$cate_id,
            'cate_show'=>1
        ];

        $info['oneData']=$cate->field('cate_id,cate_name')->where($oneWhere)->find();
        //二级分类
        $twoWhere=[
            'pid'=>$cate_id,
            'cate_show'=>1
        ];
        $info['twoData']=$cate->field('cate_id,cate_name')->where($twoWhere)->select();

        //商品
        $cateInfo=$cate->where(['cate_show'=>1])->select();
        //dump($cateInfo);die;
        $cateId=getCateId($cateInfo,$cate_id);
        //dump($cateId);die;
        $cateId=implode(',',$cateId);
        $goodsWhere=[
            'is_on_sale'=>1,
            'cate_id'=>['IN',$cateId]
        ];

        //dump($goodsWhere);die;
        $goods=model('Goods');
        $info['goodsData']=$goods
            ->field('goods_id,goods_name,market_price,goods_img,type_id')
            ->where($goodsWhere)
            ->select();
        //dump($info['goodsData']);die;
        return $info;
    }



    //更多楼层数据
    public function moreFloor(){
        $cate_id=input('post.cate_id');
        $floor_num=input('post.floor_num')+1;
        $cate=model('category');
        $where=[
            'cate_id'=>['gt',$cate_id],
            'pid'=>0,
            'cate_show'=>1
        ];
        $cate_id=$cate->field('cate_id')->where($where)->order('cate_id','asc')->find();
        $cate_id=$cate_id['cate_id'];
        if(!empty($cate_id)){
            $info=$this->getFloorInfo($cate_id);
            //print_r($info);exit;
            $this->assign('info',$info);
            //dump($info);exit;
            $this->assign('floor_num',$floor_num);
            //关闭layout
            $this->view->engine->layout(false);
            echo  $this->fetch('div');
        }

    }
}
