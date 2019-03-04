<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:81:"/data/wwwroot/default/myshop/public/../application/index/view/cart/buycarone.html";i:1547858526;s:73:"/data/wwwroot/default/myshop/public/../application/index/view/layout.html";i:1543994395;s:80:"/data/wwwroot/default/myshop/public/../application/index/view/public/header.html";i:1547468142;s:77:"/data/wwwroot/default/myshop/public/../application/index/view/public/top.html";i:1547120665;s:80:"/data/wwwroot/default/myshop/public/../application/index/view/public/footer.html";i:1547209798;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="__STATIC__/layui/css/layui.css" rel="stylesheet" type="text/css">
    <script src="__STATIC__/layui/layui.js"></script>
    <link type="text/css" rel="stylesheet" href="__STATIC__/index/css/style.css" />
    <!--[if IE 6]>
    <script src="__STATIC__/index/js/iepng.js" type="text/javascript"></script>
    <script type="text/javascript">
        EvPNG.fix('div, ul, img, li, input, a');
    </script>
    <![endif]-->

    <script type="text/javascript" src="__STATIC__/index/js/jquery-1.11.1.min_044d0927.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/jquery.bxslider_e88acd1b.js"></script>

    <script type="text/javascript" src="__STATIC__/index/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/menu.js"></script>

    <script type="text/javascript" src="__STATIC__/index/js/select.js"></script>

    <script type="text/javascript" src="__STATIC__/index/js/lrscroll.js"></script>

    <script type="text/javascript" src="__STATIC__/index/js/iban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/fban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/f_ban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/mban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/bban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/hban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/tban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/ShopShow.js"></script>

    <script type="text/javascript" src="__STATIC__/index/js/lrscroll_1.js"></script>
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/MagicZoom.css" />
    <script type="text/javascript" src="__STATIC__/index/js/MagicZoom.js"></script>

    <script type="text/javascript" src="__STATIC__/index/js/num.js">
        var jq = jQuery.noConflict();
    </script>
    <script type="text/javascript" src="__STATIC__/index/js/p_tab.js"></script>

    <script type="text/javascript" src="__STATIC__/index/js/shade.js"></script>
    <title><?php echo $config['WEB_NAME']; ?></title>
</head>
<body>
<!-- 头部-->
<!--头部 -->
<div class="soubg">
    <div class="sou">
        <!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                    <div class="s_city_t"></div>
                    <div class="s_city_c">
                        <h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                            <tr>
                                <th>A</th>
                                <td class="c_h"><span>安徽</span><span>澳门</span></td>
                            </tr>
                            <tr>
                                <th>B</th>
                                <td class="c_h"><span>北京</span></td>
                            </tr>
                            <tr>
                                <th>C</th>
                                <td class="c_h"><span>重庆</span></td>
                            </tr>
                            <tr>
                                <th>F</th>
                                <td class="c_h"><span>福建</span></td>
                            </tr>
                            <tr>
                                <th>G</th>
                                <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                            </tr>
                            <tr>
                                <th>H</th>
                                <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                            </tr>
                            <tr>
                                <th>J</th>
                                <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                            </tr>
                            <tr>
                                <th>L</th>
                                <td class="c_h"><span>辽宁</span></td>
                            </tr>
                            <tr>
                                <th>N</th>
                                <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                            </tr>
                            <tr>
                                <th>Q</th>
                                <td class="c_h"><span>青海</span></td>
                            </tr>
                            <tr>
                                <th>S</th>
                                <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                            </tr>
                            <tr>
                                <th>T</th>
                                <td class="c_h"><span>台湾</span><span>天津</span></td>
                            </tr>
                            <tr>
                                <th>X</th>
                                <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                            </tr>
                            <tr>
                                <th>Y</th>
                                <td class="c_h"><span>云南</span></td>
                            </tr>
                            <tr>
                                <th>Z</th>
                                <td class="c_h"><span>浙江</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
            <?php if(\think\Session::get('userInfo.account') == ''): ?>
        	<span class="fl">
                你好，请&nbsp;<a href="<?php echo url('Login/login'); ?>" style="color:#ff4e00;">登录</a>&nbsp;
                <a href="<?php echo url('Login/register'); ?>" style="color:#ff4e00;">免费注册
                </a>&nbsp;</span>
            <?php else: ?>
            <span class="fl">
                欢迎用户 <font color="red"><?php echo \think\Session::get('userInfo.account'); ?></font> ！！！
            </span>
        	<span class="ss">
                <div class="ss_list">
                    <a href="<?php echo url('member/member'); ?>">个人中心</a>
                    <div class="ss_list_bg">
                        <div class="s_city_t"></div>
                        <div class="ss_list_c">
                            <ul>
                                <li><a href="<?php echo url('login/quit'); ?>">退出</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </span>
            <?php endif; ?>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="__STATIC__/index/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<script type="text/javascript" src="__STATIC__/index/js/n_nav.js"></script>
<div class="top">
    <div class="logo"><a href="<?php echo url('index/index'); ?>"><img src="__STATIC__/index/images/dzsc.jpg" width="207px" height="55px" /></a></div>
    <div class="search">
        <form>
            <input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
    <div class="i_car">
        <div class="car_t">
            <a href="<?php echo url('cart/buycarone'); ?>">购物车 [ <span id="topnum"></span> ]</a>
        </div>
        <div class="car_bg">
            <?php if($login == 2): ?>
            <!--Begin 购物车未登录 Begin-->
            <div class="un_login">还未登录！<a href="<?php echo url('login/login'); ?>" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <?php endif; ?>
            <!--Begin 购物车已登录 Begin-->
            <?php if(!empty($cartGoodsInfo)): ?>
            <div style="height: 200px;overflow-y: auto;">
                <ul class="cars">
                    <?php if(is_array($cartGoodsInfo) || $cartGoodsInfo instanceof \think\Collection || $cartGoodsInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cartGoodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li class="aprice">
                        <input type="hidden" class="subtotal" value="<?php echo $v['market_price']*$v['buy_number']; ?>">
                        <div class="img"><a href="#"><img src="__ROOT__/uploads/goodsimg/<?php echo $v['goods_img']; ?>" width="58" height="58" /></a></div>
                        <div class="name"><a href="#"><?php echo $v['goods_name']; ?></a></div>
                        <div class="price"><font color="#ff4e00">￥<?php echo $v['market_price']; ?></font> X<?php echo $v['buy_number']; ?></div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span id="total"></span></div>
            <div class="price_a"><a href="<?php echo url('cart/buycarone'); ?>">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--Begin Menu Begin-->
<div class="menu_bg">
    <div class="menu">
        <!--Begin 商品分类详情 Begin-->
        <div class="nav">
            <div class="nav_t">全部商品分类</div>
            <?php if(request()->controller()=='Index'): ?>
            <div class="leftNav">
            <?php else: ?>
            <div class="leftNav none">
            <?php endif; ?>
                <ul>
                    <?php if(is_array($cateInfo) || $cateInfo instanceof \think\Collection || $cateInfo instanceof \think\Paginator): $k = 0; $__LIST__ = $cateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($k % 2 );++$k;?>
                    <li>
                        <div class="fj">
                            <span class="n_img"><span></span><img src="__STATIC__/index/images/nav1.png" /></span>
                            <span class="fl"><?php echo $v1['cate_name']; ?></span>
                        </div>
                        <?php $h = $key*40; ?>
                        <div class="zj" style="top:-<?php echo $h; ?>px">
                            <div class="zj_l">
                                <?php if(is_array($v1['son']) || $v1['son'] instanceof \think\Collection || $v1['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v1['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
                                <div class="zj_l_c">
                                    <h2><?php echo $v2['cate_name']; ?></h2>
                                    <?php if(is_array($v2['son']) || $v2['son'] instanceof \think\Collection || $v2['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v2['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i;?>
                                    <a href="#"><?php echo $v3['cate_name']; ?></a>|
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="__STATIC__/index/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="__STATIC__/index/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <!--End 商品分类详情 End-->
        <ul class="menu_r">
            <li><a href="<?php echo url('index/index'); ?>">首页</a></li>
            <li><a href="<?php echo url('product/productlist'); ?>">全部商品</a></li>
            <?php if(is_array($cateNavInfo) || $cateNavInfo instanceof \think\Collection || $cateNavInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cateNavInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li style="width:120px;"><a style="width:120px;" href="<?php echo url('product/productlist'); ?>?cate_id=<?php echo $v['cate_id']; ?>"><?php echo $v['cate_name']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>
</div>
<script>
    $(function(){
        var total=0;
        var num=$('.aprice').length;
        $('.aprice').each(function(index){
            var subtotal=parseInt($(this).find("input[class='subtotal']").val());
            //console.log(subtotal);
            total+=subtotal;
        });
        $('#total').text(total);//总的价钱
        $('#topnum').text(num);//购买商品种类
    })
</script>

<!--Begin 第一步：查看购物车 Begin -->
<div class="content mar_20">
    <img src="__STATIC__/index/images/img1.jpg" />
</div>
<div class="content mar_20">
    <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
        <tr>
            <td class="car_th" width="50">多选</td>
            <td class="car_th" width="440">商品名称及属性</td>
            <td class="car_th" width="140">单价</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
        </tr>
        <?php if(!empty($cartGoodsInfo)): if(is_array($cartGoodsInfo) || $cartGoodsInfo instanceof \think\Collection || $cartGoodsInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cartGoodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr goods_num="<?php echo $v['goods_number']; ?>" buy_number="<?php echo $v['buy_number']; ?>" goods_id="<?php echo $v['goods_id']; ?>">
                    <td>
                        <?php if($login == 1): ?>
                        <input type="checkbox" class="box" value="<?php echo $v['cart_id']; ?>">
                        <?php else: ?>
                        <input type="checkbox" class="box">
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="c_s_img"><img src="__ROOT__/uploads/goodsimg/<?php echo $v['goods_img']; ?>" width="73" height="73" /></div>
                        <?php echo $v['goods_name']; ?>
                        属性
                    </td>
                    <td align="center" id="selfprice">
                        <?php echo $v['market_price']; ?>
                    </td>
                    <td align="center">
                        <div class="c_num">
                            <input type="button" value=""  class="car_btn_1 reduce" />
                            <input type="text" value="<?php echo $v['buy_number']; ?>" class="car_ipt buy_number"  />
                            <input type="button" value=""  class="car_btn_2 add" />
                        </div>
                    </td>
                    <td align="center" style="color:#ff4e00;">￥<?php echo $v['market_price']*$v['buy_number']; ?></td>
                    <td align="center">
                        <a href="javascript:;" class="carDel">删除</a>&nbsp; &nbsp;
                        <a href="javascript:;" class="collection">加入收藏</a>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        <tr height="70">
            <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_rad"><input type="checkbox" name="clear" id="boxAll" /></label><label class="r_txt" id="boxAll">全选</label>
                <input type="button" value="批量删除" id="bothDel">
                <input type="button" value="批量收藏" id="allCollection">
                <span class="fr">
                    已选<b style="font-size:22px; color:#ff4e00;" id="allnum">0</b>件商品
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    商品总价：<b style="font-size:22px; color:#ff4e00;" id="allprice">￥0</b>
                </span>
            </td>
        </tr>
        <tr valign="top" height="150">
            <td colspan="6" align="right">
                <a href="<?php echo url('Product/productList'); ?>">
                    <img src="__STATIC__/index/images/buy1.gif" />
                </a>&nbsp; &nbsp;
                <a href="javascript:;" id="confirm">
                    <img src="__STATIC__/index/images/buy2.gif" />
                </a>
            </td>
        </tr>
    </table>
</div>
<!--End 第一步：查看购物车 End-->

<script>
    $(function(){
        layui.use(['layer'],function(){
            var layer=layui.layer;
            //加
            $('.add').click(function(){
                var _this=$(this);
                getChecked(_this);
                getNumber(1,_this);
                getPrice();
                getBuyNumber(_this);
            })
            //减
            $('.reduce').click(function(){
                var _this=$(this);
                getChecked(_this);
                getNumber(2,_this);
                getPrice();
                getBuyNumber(_this);
            })
            //改变数量
            function getNumber(type,_this){
                var _tr=_this.parents('tr');
                var buy_number=parseInt(_tr.attr('buy_number'));
                var goods_num=parseInt(_tr.attr('goods_num'));
                if(type==1){
                    //加
                    var _input=_this.prev();
                    _input.prev().prop('disabled',false);
                    if(buy_number>=goods_num){
                        //alert(4);
                        buy_number=goods_num;
                        _input.val(buy_number);
                        _this.prop('disabled',true);
                    }else{
                        buy_number+=1;
                        //console.log(buy_number);
                        _input.val(buy_number);
                        //console.log(_input.val());
                    }
                    _tr.attr('buy_number',buy_number);
                }else{
                    //减
                    var _input=_this.next();
                    _input.next().prop('disabled',false);
                    if(buy_number<=1){
                        buy_number=1;
                        _input.val(1);
                        _input.prop('disabled',true);
                    }else{
                        buy_number-=1;
                        _input.val(buy_number);
                    }
                    _tr.attr('buy_number',buy_number);
                }
                var _priceAll='￥'+parseInt(_input.val())*parseInt(_this.parents('td').prev().text());
                _this.parents('td').next().html(_priceAll);
            }
            //数量框失去焦点
            $('.buy_number').blur(function(){
                var _this=$(this);
                var _tr=_this.parents('tr');
                var goods_num=parseInt(_tr.attr('goods_num'));
                var buy_number=parseInt(_this.val());
                var reg=/^[1-9]\d{0,}$/;
                if(reg.test(buy_number)){
                    if(buy_number>=goods_num){
                        buy_number=goods_num;
                        _this.val(buy_number);
                    }else{
                        _this.val(buy_number);
                    }
                }else{
                    _this.val(1);
                }
                _tr.attr('buy_number',buy_number);
                var _priceAll='￥'+buy_number*parseInt(_this.parents('td').prev().text());
                _this.parents('td').next().html(_priceAll);
                getChecked(_this);
                getPrice();
                getBuyNumber(_this);
            });
            //多选
            $('.box').click(function(){
                getPrice();
            });
            //全部选中
            $('#boxAll').click(function(){
                //alert(1)
                var _this=$(this);
                //console.log(_this.prop('checked'));
                if(_this.prop('checked')==true){
                    //alert(1)
                    $('.box').prop('checked',true);
                }else{
                    $('.box').prop('checked',false);
                }
                getPrice();
            })
            //修改数量行默认选中
            function getChecked(_this){
                var _box=_this.parents('tr').find('td').eq(0).find('input');
                _box.prop('checked',true);
                //console.log(_box);
            }
            //计算总价
            function getPrice(){
                var _box=$('.box');
                var allprice=0;
                var num=0;
                for(var i in _box){
                    if(_box[i].checked==true){
                        var price=_box.eq(i).parents('tr').children('td').eq(4).text();
                        var price=parseInt(price.substr(1));
                        allprice+=price;
                        num+=1;
                    }
                }
                $('#allnum').text(num);
                $('#allprice').text(allprice);
            }
            //修改数据到数据库
            function getBuyNumber(_this){
                var _tr=_this.parents('tr');
                var buy_number=_tr.attr('buy_number');
                var goods_id=_tr.attr('goods_id');
                var cart_id=_tr.children('td').first().find('input').val();
                //console.log(cart_id);
                $.post(
                    "<?php echo url('cart/getbuynumber'); ?>",
                    {goods_id:goods_id,buy_number:buy_number,cart_id:cart_id},
                    function(res){
                        console.log(res);
                    }
                )
            }
            //删除单条数据
            $('.carDel').click(function(){
                var _this=$(this);
                var _tr=_this.parents('tr');
                var goods_id=_tr.attr('goods_id');
                var cart_id=_tr.children('td').first().find('input').val();
                $.post(
                    "<?php echo url('cart/cardel'); ?>",
                    {goods_id:goods_id,cart_id:cart_id},
                    function(res){
                        layer.msg(res.font,{icon:res.code});
                        if(res.code==1){
                            _tr.remove();
                        }
                    },
                    'json'
                )
            });
            //批量删除
            $('#bothDel').click(function(){
                var cart_id='';
                var goods_id='';
                $('.box').each(function(index){
                    if($(this).prop('checked')==true){
                        var cid=$(this).val();
                        cart_id+=','+cid;
                        var gid=$(this).parents('tr').attr('goods_id');
                        goods_id+=','+gid;
                    }
                })
                cart_id=cart_id.substr(1);
                goods_id=goods_id.substr(1);
                $.post(
                    "<?php echo url('cart/carDel'); ?>",
                    {goods_id:goods_id,cart_id:cart_id},
                    function(res){
                        layer.msg(res.font,{icon:res.code});
                        if(res.code==1){
                            $('.box').each(function(index){
                                if($(this).prop('checked')==true){
                                    $(this).parents('tr').remove();
                                }
                            });
                            if($('.box').length==0){
                                setTimeout(function(){
                                    location.href="<?php echo url('cart/buycarone'); ?>"},1000);
                            }
                        }
                    },
                    'json'
                );
                //console.log(cart_id);
            })
            //收藏
            $('.collection').click(function(){
                var _this=$(this);
                var goods_id=_this.parents('tr').attr('goods_id');
                $.post(
                    "<?php echo url('cart/addcollection'); ?>",
                    {goods_id:goods_id,type:1},
                    function(res){
                        layer.msg(res.font,{icon:res.code});
                    },
                    'json'
                );
            });
            //批量收藏
            $('#allCollection').click(function(){
                var goods_id='';
                $('.box').each(function(index){
                    if($(this).prop('checked')==true){
                        var id=$(this).parents('tr').attr('goods_id');
                        //console.log(id)
                        goods_id+=','+id;
                    }
                })
                goods_id=goods_id.substr(1);
                $.post(
                    "<?php echo url('cart/addcollection'); ?>",
                    {goods_id:goods_id,type:2},
                    function(res){
                        layer.msg(res.font,{icon:res.code});
                    },
                    'json'
                );
            })
            //点击确认计算时   判断是否登陆或者选择商品
            $('#confirm').click(function () {

                //获取购物车的数据
                var goods_id='';
                $('.box').each(function(index){
                    if($(this).prop('checked')==true){
                        var cid=$(this).val();
                        cart_id+=','+cid;
                        var gid=$(this).parents('tr').attr('goods_id');
                        goods_id+=','+gid;
                    }
                })
                goods_id=goods_id.substr(1);
                if(goods_id==''){
                    alert('必须选一件商品才能让结算');
                    return false;
                }

                //获取总价是否为0进而判断是否选择购物车商品
                var ptotal=$('#allprice').text();
                var ptotal=parseInt(ptotal.substr(1));
                if(ptotal==0){
                    layer.msg('您还没有选择任何一件商品，不能结算',{icon:2});
                    return false;
                }

                //判断是否登陆
                if(<?php echo $login; ?>==2){
                    layer.msg('您还没有登陆,请登录后结算',{icon:2});//跳转的太快了
                    window.location.href="<?php echo url('login/login'); ?>?refer="+window.location.href+"&goods_id="+goods_id;
                    return false;
                }

                var t_id='';
                $('.box').each(function (index) {
                    if($(this).prop('checked')==true){
                        var cart_id=$(this).val();
                        t_id+=','+cart_id;
                    }
                })
                var  cart_id=t_id.substr(1);
                //console.log(cart_id);
                location.href="<?php echo url('order/confirmorder'); ?>?cart_id="+cart_id;
            })
        })
    })
</script>
<!-- 底部-->
<!--Begin Footer Begin -->
<div class="b_btm_bg b_btm_c">
    <div class="b_btm">
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="__STATIC__/index/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="__STATIC__/index/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="__STATIC__/index/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
            </tr>
        </table>
        <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="72"><img src="__STATIC__/index/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
            </tr>
        </table>
    </div>
</div>
<div class="b_nav">
    <dl>
        <dt><a href="#">新手上路</a></dt>
        <dd><a href="#">售后流程</a></dd>
        <dd><a href="#">购物流程</a></dd>
        <dd><a href="#">订购方式</a></dd>
        <dd><a href="#">隐私声明</a></dd>
        <dd><a href="#">推荐分享说明</a></dd>
    </dl>
    <dl>
        <dt><a href="#">配送与支付</a></dt>
        <dd><a href="#">货到付款区域</a></dd>
        <dd><a href="#">配送支付查询</a></dd>
        <dd><a href="#">支付方式说明</a></dd>
    </dl>
    <dl>
        <dt><a href="#">会员中心</a></dt>
        <dd><a href="#">资金管理</a></dd>
        <dd><a href="#">我的收藏</a></dd>
        <dd><a href="#">我的订单</a></dd>
    </dl>
    <dl>
        <dt><a href="#">服务保证</a></dt>
        <dd><a href="#">退换货原则</a></dd>
        <dd><a href="#">售后服务保证</a></dd>
        <dd><a href="#">产品质量保证</a></dd>
    </dl>
    <dl>
        <dt><a href="#">联系我们</a></dt>
        <dd><a href="#">网站故障报告</a></dd>
        <dd><a href="#">购物咨询</a></dd>
        <dd><a href="#">投诉与建议</a></dd>
    </dl>
    <div class="b_tel_bg">
        <a href="#" class="b_sh1">新浪微博</a>
        <a href="#" class="b_sh2">腾讯微博</a>
        <p>
            服务热线：<br />
            <span>400-123-4567</span>
        </p>
    </div>
    <div class="b_er">
        <div class="b_er_c"><img src="__STATIC__/index/images/er.gif" width="118" height="118" /></div>
        <img src="__STATIC__/index/images/ss.png" />
    </div>
</div>
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：<?php echo $config['WEB_RECORD']; ?>-1-<?php echo $config['WEB_URL']; ?>   Copyright © <?php echo $config['WEB_COPYRIGHT']; ?>. 复制必究 , Technical Support: Dgg Group <br />
        <img src="__STATIC__/index/images/b_1.gif" width="98" height="33" />
        <img src="__STATIC__/index/images/b_2.gif" width="98" height="33" />
        <img src="__STATIC__/index/images/b_3.gif" width="98" height="33" />
        <img src="__STATIC__/index/images/b_4.gif" width="98" height="33" />
        <img src="__STATIC__/index/images/b_5.gif" width="98" height="33" />
        <img src="__STATIC__/index/images/b_6.gif" width="98" height="33" />
    </div>
</div>
<!--End Footer End -->
</div>





</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>

