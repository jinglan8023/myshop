<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:86:"/data/wwwroot/default/myshop/public/../application/index/view/product/productlist.html";i:1547547924;s:73:"/data/wwwroot/default/myshop/public/../application/index/view/layout.html";i:1543994395;s:80:"/data/wwwroot/default/myshop/public/../application/index/view/public/header.html";i:1547468142;s:77:"/data/wwwroot/default/myshop/public/../application/index/view/public/top.html";i:1547120665;s:80:"/data/wwwroot/default/myshop/public/../application/index/view/public/footer.html";i:1547209798;}*/ ?>
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

<!--End Menu End-->
<div class="i_bg">
    <div class="postion">
        <span class="fl">全部 > 美妆个护 > 香水 > </span>
        <span class="n_ch" style="display: none" id="brand_select">
            <span class="fl">品牌：<font></font></span>
            <a href="javascript:;" class="del"><img src="__STATIC__/index/images/s_close.gif" /></a>
        </span>
        <span class="n_ch" style="display: none" id="price_select">
            <span class="fl">价格：<font></font></span>
            <a href="javascript:;" class="del"><img src="__STATIC__/index/images/s_close.gif" /></a>
        </span>
    </div>
    <!--Begin 筛选条件 Begin-->
    <div class="content mar_10">
        <table border="0" class="choice" style="width:100%; font-family:'宋体'; margin:0 auto;" cellspacing="0" cellpadding="0">
            <tr valign="top">
                <td width="70">&nbsp; 品牌：</td>
                <td class="td_a brandall">
                    <?php if(is_array($brandInfo) || $brandInfo instanceof \think\Collection || $brandInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $brandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <a href="javascript:;" class="brand" brand_id="<?php echo $v['brand_id']; ?>"><?php echo $v['brand_name']; ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </td>
            </tr>
            <tr valign="top">
                <td>&nbsp; 价格：</td>
                <td class="td_a priceall" id="price">
                    <?php if(is_array($priceInfo) || $priceInfo instanceof \think\Collection || $priceInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $priceInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <a href="javascript:;" class="price"><?php echo $v; ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </td>
            </tr>
        </table>
    </div>
    <!--End 筛选条件 End-->
    <!--浏览历史展示-->
    <div class="content mar_20">
        <div class="l_history">
            <div class="his_t">
                <span class="fl">浏览历史</span>
                <span class="fr"><a href="#">清空</a></span>
            </div>
            <ul>
                <?php if(!empty($historyInfo)): if(is_array($historyInfo) || $historyInfo instanceof \think\Collection || $historyInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $historyInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <li>
                            <div class="img"><a href="#"><img src="__ROOT__/uploads/goodsimg/<?php echo $v['goods_img']; ?>" width="185" height="162" /></a></div>
                            <div class="name"><a href="<?php echo url('product/productdetail',['goods_id'=>$v['goods_id'],'type_id'=>$v['type_id']]); ?>"><?php echo $v['goods_name']; ?></a></div>
                            <div class="price">
                                <font>￥<span><?php echo $v['market_price']; ?></span></font> &nbsp;
                            </div>
                        </li>
                    <?php endforeach; endif; else: echo "" ;endif; else: endif; ?>
            </ul>
        </div>
        <div class="l_list">
            <div class="list_t">
            	<span class="fl list_or">
                	<a href="javascript:;" class="type now" flag="1">默认</a>
                    <a href="javascript:;" class="type" flag="2">
                    	<span class="fl">销量</span>
                        <span order="desc">↓</span>
                    </a>
                    <a href="javascript:;" class="type" flag="3">
                    	<span class="fl">价格</span>
                        <span order="asc">↑</span>
                    </a>
                    <a href="javascript:;" class="type" flag="4">新品</a>
                </span>
                <span class="fr" id="getcount">共发现<?php echo $count; ?>件</span>
            </div>
            <div class="list_c">
                <ul class="cate_list">
                    <?php if(is_array($goodsInfo) || $goodsInfo instanceof \think\Collection || $goodsInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li>
                        <div class="img">
                            <a href="<?php echo url('product/productdetail',['goods_id'=>$v['goods_id'],'type_id'=>$v['type_id']]); ?>">
                                <img src="__ROOT__/uploads/goodsimg/<?php echo $v['goods_img']; ?>" width="210" height="185" />
                            </a>
                        </div>
                        <div class="price">
                            <font>￥<span><?php echo $v['market_price']; ?></span></font> &nbsp;
                            <font style="float: right;color:#a9a9a9;font-size: 12px;">
                                销量:<span style="font-size: 14px;color:#ff4e00"><?php echo $v['click_count']; ?></span>
                            </font>
                        </div>
                        <div class="name">
                            <a href="<?php echo url('product/productdetail',['goods_id'=>$v['goods_id'],'type_id'=>$v['type_id']]); ?>">
                                <?php echo $v['goods_name']; ?>
                            </a>
                            <br>
                        </div>
                        <div class="carbg">
                            <a href="#" class="ss">收藏</a>
                            <a href="#" class="j_car">加入购物车</a>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="pages">
                    <?php echo $page_str; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        //点击品牌
        $(document).on('click','.brand',function(){
            //显示在搜索栏 选中样式
            var _this=$(this);
            //console.log(_this);
            var brand=_this.text();
            //console.log(brand);
            $('#brand_select').find('font').text(brand);
            $('#brand_select').css('display','block');
            _this.addClass('now');
            _this.siblings('a').removeClass('now');
            //修改价格区间
            var brand_id=_this.attr('brand_id');
            var _a="";
            $.post(
                "<?php echo url('product/getPrice'); ?>",
                {brand_id:brand_id},
                function(res) {
                    if (res.code == 2) {
                        alert('该品牌下没有商品');
                    } else {

                        for (var i in res) {
                            _a += "<a href='javascript:;' class='price'>" + res[i] + "</a>";
                        }
                        $('#price').html(_a);
                    }
                },
                'json'
            );
            //关闭价格栏
            $('#price_select').css('display','none');
            $('.price').removeClass('now');
            //获取商品数据
            getGoodsInfo(1);
        });
        //点击价格
        $(document).on('click','.price',function(){
            var _this=$(this);
            var price=_this.text();
            $('#price_select').find('font').text(price);
            $('#price_select').css('display','block');
            _this.addClass('now');
            _this.siblings('a').removeClass('now');
            //获取商品数据
            getGoodsInfo(1);
        });
        //点击排序
        $(document).on('click','.type',function(){
            var _this=$(this);
            _this.addClass('now');
            _this.siblings('a').removeClass('now');
            //升降序改变
            var flag=$('.fl').find("a[class='type now']").attr('flag');
            //var order=$('.fl').find("a[class='type now']").find('span[order]').attr('order');
            if(flag==2||flag==3){
                var order=$('.fl').find("a[class='type now']").find('span[order]');
                if(order.attr('order')=='desc'){
                    order.attr('order','asc');
                    order.text('↑');
                }else{
                    order.attr('order','desc');
                    order.text('↓');
                }
            }
            //获取商品数据
            getGoodsInfo(1);

        });
        //点击分页
        $(document).on('click','.page',function(){
            var _this=$(this);
            _this.css('background-color','#ff4e00');
            _this.parent('li').siblings('li').children('a').css('background-color','#ffffff');
            //获取分页
            var p=_this.attr('p');
            //获取商品数据
            getGoodsInfo(p);
        });
        //点击关闭
        $(document).on('click','.del',function(){
            var _this=$(this);
            var _span=_this.parent('span').prop('id');
            if(_span=='brand_select'){
                $('#brand_select').css('display','none');
                $('.brand').removeClass('now');
                //修改价格区间
                var _a="";
                $.post(
                    "<?php echo url('product/getPrice'); ?>",
                    {brand_id:0},
                    function(res) {
                        if (res.code == 2) {
                            alert('该品牌下没有商品');
                        } else {

                            for (var i in res) {
                                _a += "<a href='javascript:;' class='price'>" + res[i] + "</a>";
                            }
                            $('#price').html(_a);
                        }
                    },
                    'json'
                );
            }
            $('#price_select').css('display','none');
            $('.price').removeClass('now');
            getGoodsInfo(1);
        });
        //获取商品数据
        function getGoodsInfo(p=1){
            //条件
            var brand_id=$('.brandall').find("a[class='brand now']").attr('brand_id');
            var price_area=$('.priceall').find("a[class='price now']").text();
            var flag=$('.fl').find("a[class='type now']").attr('flag');
            var order=$('.fl').find("a[class='type now']").find('span[order]').attr('order');
            //页码
            $.post(
                "<?php echo url('product/getgoodsinfo'); ?>",
                {p:p,brand_id:brand_id,price_area:price_area,flag:flag,order:order},
                function(res) {
                    if (res == 'no') {
                        $('.list_c').html("商品数据为空");
                        $('#getcount').text("共发现0件");
                    }else{
                        $('.list_c').html(res);
                        //接收div中的count
                        var count=$('#count').val();
                        //console.log(count);
                        $('#getcount').text("共发现"+count+"件");
                    }
                }
            )


        }
    });
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

