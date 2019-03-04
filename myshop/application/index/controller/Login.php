<?php
namespace app\index\controller;
//use think\Controller;
use app\index\model\UserSession;
class Login extends Common{
    //登录
    public function login(){
        if(checkRequest()){
            $account=input('post.account');
            $user_pwd=input('post.user_pwd');
            $remember_me=input('post.remember_me');
            //验证
            if(empty($account)){
                fail('账号不能为空');
            }
            if(empty($user_pwd)){
                fail('密码不能为空');
            }
            //处理条件
            if(substr_count($account,'@')){
                $where=[
                    'user_email'=>$account
                ];
            }else{
                $where=[
                    'user_tel'=>$account
                ];
            }
            //根据账号查询数据
            $model=model('user');
            $info=$model->where($where)->find();
            $time=time();
            $error_num=$info['error_num'];
            $last_error_time=$info['last_error_time'];
            $update_where=[
                'user_id'=>$info['user_id']
            ];
            if(!empty($info)){
                if(md5($user_pwd)==$info['user_pwd']){
                //密码正确
                    if($error_num>=5&&$time-$last_error_time<3600){
                        //1小时内 错误次数超过5次
                        $open_time=60-ceil(($time-$last_error_time)/60);
                        fail("当前账号已锁定,".$open_time."分钟后可登录");
                    }
                    //次数清零 时间清空
                    $updateData=[
                        'error_num'=>0,
                        'last_error_time'=>null
                    ];
                    $res=$model->where($where)->update($updateData);
                    //用户信息存session
                    $userInfo=[
                        'user_id'=>$info['user_id'],
                        'account'=>$account
                    ];

                    session('userInfo',$userInfo);
                    //用户不能在不同浏览器同时登录
                    #将用户id   session_id  存入数据库
                     $session_id=session_id();

                    $user_session_model=model('UserSession');
                    $sessionInfo=[
                        'user_id'=>$info['user_id'],
                        'session_id'=>$session_id,
                    ];
                    //dump($sessionInfo);die;
                    #先删除sessionInfo表内用户为user_id的记录
                    UserSession::where('user_id',$userInfo['user_id'])->delete();

                    #再添加session 入库
                   UserSession::create($sessionInfo);


                    //判断是否记住密码  是的话cookie存10天
                    #登录时自动保存账号密码
                    if($remember_me=='true'){
//                        $data=['account'=>$account,'user_pwd'=>base64_encode($user_pwd)];
//                        $data=serialize($data);
//                        cookie('user',$data,60*60*24*10);
                        cookie('account',$account,60*60*24*10);
                        cookie('user_pwd',$user_pwd,60*60*24*10);
                    }
                    //$user=unserialize($data);
                    //$user['user_pwd']=base64_decode($user['user_pwd']);
                    //$this->assign('user',$user);
                    //return view();

                    //同步浏览历史数据
                    $this->asyncHistory();
                    //同步购物车数据
                    $this->asyncBuyCar();

                    successly('登陆成功');

                }else{
                    //密码错误
                    if($time-$last_error_time>3600){
                        $updateData=[
                            'error_num'=>1,
                            'last_error_time'=>$time
                        ];
                        $res=$model->where($where)->update($updateData);
                        fail('您还可以输入4次');
                    }else{
                        if($error_num>=5){
                            fail('账号已锁定');
                        }else{
                            $error_num++;
                            $updateData=[
                                'error_num'=>$error_num,
                                'last_error_time'=>$time
                            ];
                            $res=$model->where($where)->update($updateData);
                            $num=5-$error_num;
                            if($num!=0){
                                fail("您还可以输入".$num.'次');
                            }else{
                                fail('账号已锁定,60分钟后登录');
                            }

                        }
                    }
                }
            }else{
                fail('您还没有注册!去注册');
            }
        }else{
            $this->view->engine->layout(false);
            return view();
        }
    }



    //注册
    public function register(){
        if(checkRequest()){
            $data=input('post.');
            $type=input('get.type');
            //验证器验证
            $validate=validate('User');
            if($type==1){
                $res=$validate->scene('registerEmail')->check($data);
                $account=$data['user_email'];
            }else{
                $res=$validate->scene('registerTel')->check($data);
                $account=$data['user_tel'];
            }
            if($res){
                $model=model('user');
                $res=$model->allowField(true)->save($data);
                if($res){
                    $userInfo=[
                        'user_id'=>$model->user_id,
                        'account'=>$account,
                    ];
                    session('userInfo',$userInfo);
                    successly('注册成功');
                }else{
                    fail('注册失败');
                }
            }else{
                fail($validate->getError());
            }
        }
        $this->view->engine->layout(false);
        return view();
    }
    //接收验证码
    public function send(){
        $value=input('post.value');
        //随机生成发送的验证码
        $code=createCode();
        $model=model('user');
        //判断是邮箱还是手机号
        if(substr_count($value,'@')){
            $where=[
                'user_email'=>$value,
            ];
            $arr=$model->where($where)->find();
            if(!empty($arr)){
                fail('邮箱已被注册，请直接去登录');
            }
            $res=sendEmail($value,$code);
            if($res){
                $codeInfo=[
                    'email'=>$value,
                    'code'=>$code,
                    'time'=>time()
                ];
                session('codeInfo',$codeInfo);
                successly('发送成功');
            }else{
                fail('发送失败');
            }
        }else{
            $where=[
                'user_tel'=>$value,
            ];
            $arr=$model->where($where)->find();
            if(!empty($arr)){
                fail('邮箱已被注册，请直接去登录');
            }
            $res=sendSms($value,$code);
            if($res->Message=='OK'){
                $codeInfo=[
                    'code'=>$code,
                    'time'=>time(),
                    'tel'=>$value
                ];
                session('codeInfo',$codeInfo);
                successly('发送成功');
            }else{
                fail('发送失败');
            }
        }
    }
    //验证唯一
    public function check(){
        $value=input('post.value');
        $model=model('user');
        if(substr_count($value,'@')){
            $where=[
                'user_email'=>$value,
            ];
        }else{
            $where=[
                'user_tel'=>$value,
            ];
        }
        $arr=$model->where($where)->find();
        if(!empty($arr)){
            echo 'no';
        }else{
            echo 'yes';
        }
    }
    //退出登录
    public function quit(){
        session('userInfo',null);
        cookie('account',null);
        cookie('user_pwd',null);
        $this->redirect('Index/index');
    }
    //同步浏览历史数据
    public function asyncHistory(){
        $history=cookie('history');
        if(!empty($history)){
            $arr=unserialize(base64_decode($history));
            $user_id=$this->getUserId();
            foreach($arr as $k=>$v){
                $arr[$k]['user_id']=$user_id;
            }
            $model=model('history');
            $model->saveAll($arr);
            cookie('history',null);
        }
    }
    //同步购物车历史数据
    public function asyncbuyCar(){
        //把cookie数据添加到数据库
        $cart=cookie('cart');
        if(!empty($cart)){
            $arr=unserialize(base64_decode($cart));
            $user_id=$this->getUserId();
            $goods=model('Goods');
            $cart=model('Cart');
            foreach($arr as $k=>$v){
                //查询商品是否存在
                $goodsInfo=$goods->where(['goods_id'=>$v['goods_id']])->find();//dump($goodsInfo);
                if(empty($goodsInfo)){
                    fail('您选择的商品已下架');
                }
                if($goodsInfo['is_on_sale']!=1){
                    fail('部分商品下架');
                }
                //查询cart表中数据 是否重复
                $where=[
                    'goods_id'=>$v['goods_id'],
                    'user_id'=>$user_id
                ];
                $cartInfo=$cart->where($where)->find();
                if(empty($cartInfo)){
                    //添加
                    $shop_price=$goodsInfo['market_price'];
                    $v['user_id']=$user_id;
                    $v['shop_price']=$shop_price;
                    $this->checkNumber($goodsInfo,$v['buy_number']);
                   // dump($v);die;   取出来的是cookie里的数据
                    $cart->insert($v);
                }else {
                    //修改
                    $update = [
                        'buy_number' => $cartInfo['buy_number'] + $v['buy_number'],
                        'uptime' => time(),
                    ];
                    $this->checkNumber($goodsInfo,$update['buy_number']);
                    $cart->where($where)->update($update);
                }
            }
            cookie('cart',null);//清空购物车cookie
        }
    }
}