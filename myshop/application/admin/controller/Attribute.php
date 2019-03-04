<?php
namespace app\admin\controller;
use think\Request;
use think\Db;
use page\AjaxPage;
class Attribute extends Common{
    //属性添加
    public  function attrAdd(){
        //接受传过来的tid
        $type_id=input('get.tid');
        $goodsType_model=model('GoodsType');
        $typeObj=$goodsType_model->select();
        $typeData=collection($typeObj);
        $this->assign('tid',$type_id);
        $this->assign('typeData',$typeData);
        return view('attribute/create');
    }

    //属性添加成功
    public function save(Request $request)
    {
        $attrInfo=$request->post();
        // 关闭字段严格检查
        $res=Db::name('attribute')->strict(false)->insert($attrInfo);
        if($res){
            //添加成功后直接跳转展示页面
            $goodsType_model=model('GoodsType');
            $typeInfo=$goodsType_model->select();
            $attrObj=$goodsType_model
                ->join('shop_attribute','shop_goods_type.type_id=shop_attribute.type_id')
                ->paginate(8);
            $this->assign('typeInfo',$typeInfo);
            $this->assign('attrInfo',$attrObj);
            return view('attribute/index');
        }else{
            $this->error('添加失败!');
        }
    }
    //商品属性编辑  没写成
    public function edit(){
        $type_id=input('get.tid');
        //查询goods_type 表
        $goodsType_model=model('GoodsType');
        $goods_typeObj=$goodsType_model->select();
        $goods_type=collection($goods_typeObj);
       dump($goods_type);die;

//        $dataObj=$goodsType_model
//            ->join('shop_attribute','shop_goods_type.type_id=shop_attribute.type_id')
//            ->select();
        //$data=collection($dataObj);
        //$this->assign('data',$data);
        $this->assign('goodsTypeInfo',$goodsTypeInfo);
        $this->assign('tid',$type_id);
        return view('attribute/edit');
    }
    //删除
    public function delete(){
        if(request()->isAjax()){
            $tid=input('post.');
            $res=Db::table('shop_goods_type')->delete($tid);
            if($res){
              return  successly('删除成功');
            }else{
              return  fail('no');
            }
        }
    }


}