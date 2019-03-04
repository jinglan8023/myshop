<?php
namespace app\admin\controller;
class System extends Common{
    public function system(){
        if(checkRequest()){
            $data=input('post.');
            //print_r($data);
            foreach($data as $k=>$v){
                $info[]=[
                    'name'=>$k,
                    'value'=>$v
                ];
            }
            $model=model('config');
            $model->query("delete from shop_config");
            $res=$model->saveAll($info);
            if($res){
                session('configInfo',null);
                successly('保存成功');
            }else{
                fail('保存失败');
            }
        }else{
            $model=model('config');
            $data=collection($model->select())->toArray();
            if(!empty($data)){
                foreach($data as $k=>$v){
                    $info[$v['name']]=$v['value'];
                }
                $this->assign('info',$info);
            }
            return view();
        }
    }
}