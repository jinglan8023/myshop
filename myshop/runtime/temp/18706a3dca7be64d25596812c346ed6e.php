<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:88:"/data/wwwroot/default/myshop/public/../application/index/view/product/productdetail.html";i:1547431684;s:73:"/data/wwwroot/default/myshop/public/../application/index/view/layout.html";i:1543994395;s:80:"/data/wwwroot/default/myshop/public/../application/index/view/public/header.html";i:1547468142;s:77:"/data/wwwroot/default/myshop/public/../application/index/view/public/top.html";i:1547120665;s:80:"/data/wwwroot/default/myshop/public/../application/index/view/public/footer.html";i:1547209798;}*/ ?>
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
        <span class="fl">
            全部 >
            <?php if(is_array($goodsCateInfo) || $goodsCateInfo instanceof \think\Collection || $goodsCateInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsCateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <a href="<?php echo url('product/productlist'); ?>?cate_id=<?php echo $v['cate_id']; ?>"><?php echo $v['cate_name']; ?></a> >
            <?php endforeach; endif; else: echo "" ;endif; ?>
                <?php echo $goodsInfo['goods_name']; ?>
        </span>
    </div>
    <div class="content">

        <div id="tsShopContainer">
            <div id="tsImgS">
                <a href="__ROOT__/uploads/goodsimg/<?php echo $goodsInfo['goods_img']; ?>" title="Images" class="MagicZoom" id="MagicZoom">
                    <img src="__ROOT__/uploads/goodsimg/<?php echo $goodsInfo['goods_img']; ?>" width="390" height="390" /></a>
            </div>
            <div id="tsPicContainer">
                <div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
                <div id="tsImgSCon" style="width:800px;">
                    <ul>
                        <!--<li onclick="showPic(0)" rel="MagicZoom"><img src="/public/uploads/goodsimg/<?php echo $goodsInfo['goods_img']; ?>" tsImgS="/public/uploads/goodsimg/<?php echo $goodsInfo['goods_img']; ?>" width="79" height="79" /></li>-->
                        <?php if(is_array($goodsInfo['goods_img']) || $goodsInfo['goods_img'] instanceof \think\Collection || $goodsInfo['goods_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsInfo['goods_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <li onclick="showPic(<?php echo $key; ?>)" rel="MagicZoom"><img src="__ROOT__/uploads/goodsimg/<?php echo $v; ?>" tsImgS="__ROOT__/uploads/goodsimgs/<?php echo $v; ?>" width="79" height="79" /></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
            </div>
            <img class="MagicZoomLoading" width="16" height="16" src="__STATIC__/index/images/loading.gif" alt="Loading..." />
        </div>

        <div class="pro_des">
            <div class="des_name">
                <p><?php echo $goodsInfo['goods_name']; ?></p>
                <!--    “开业巨惠，北京专柜直供”，不光低价，“真”才靠谱！-->
            </div>
            <div class="des_price">
                本店价格：<b>￥<?php echo $goodsInfo['market_price']; ?></b><br />
                消费积分：<span>547R</span>
            </div>

            <div class="lim_c">
                <div class="des_choice">
                    <span class="fl">型号：</span>
                    <ul>
                        <li class="checked">30ml<div class="ch_img"></div></li>
                        <li>50ml<div class="ch_img"></div></li>
                        <li>100ml<div class="ch_img"></div></li>
                    </ul>
                </div>
                <div class="des_choice">
                    <span class="fl">颜色：</span>
                    <ul>
                        <li>红色<div class="ch_img"></div></li>
                        <li class="checked">白色<div class="ch_img"></div></li>
                        <li>黑色<div class="ch_img"></div></li>
                    </ul>
                </div>
            </div>
            <div class="des_share">
                <div class="d_sh">
                    分享
                    <div class="d_sh_bg">
                        <a href="#"><img src="__STATIC__/index/images/sh_1.gif" /></a>
                        <a href="#"><img src="__STATIC__/index/images/sh_2.gif" /></a>
                        <a href="#"><img src="__STATIC__/index/images/sh_3.gif" /></a>
                        <a href="#"><img src="__STATIC__/index/images/sh_4.gif" /></a>
                        <a href="#"><img src="__STATIC__/index/images/sh_5.gif" /></a>
                    </div>
                </div>
                <div class="d_care"><a onclick="ShowDiv('MyDiv','fade')">关注商品</a></div>
            </div>
            <div class="des_join">
                <input type="hidden" id="goods_number
                " value="<?php echo $goodsInfo['goods_number']; ?>">
                <input type="hidden" id="goods_id" value="<?php echo $goodsInfo['goods_id']; ?>">
                <div class="j_nums">
                    <input type="text" value="1" name="" id="buy_number" class="n_ipt" />
                    <input type="button"  class="n_btn_1 add" />
                    <input type="button"  class="n_btn_2 reduce" />
                </div>
                <span class="fl"><a onclick="javascript:;" id="carbuy"><img src="__STATIC__/index/images/j_car.png" /></a></span>
            </div>
        </div>

        <div class="s_brand">
            <div class="s_brand_img"><img src="__STATIC__/index/images/sbrand.jpg" width="188" height="132" /></div>
            <div class="s_brand_c"><a href="#">进入品牌专区</a></div>
        </div>


    </div>
    <div class="content mar_20">
        <div class="l_history">
            <div class="fav_t">用户还喜欢</div>
            <ul>
                <li>
                    <div class="img"><a href="#"><img src="__STATIC__/index/images/his_1.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="__STATIC__/index/images/his_2.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>768.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="__STATIC__/index/images/his_3.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>680.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="__STATIC__/index/images/his_4.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="__STATIC__/index/images/his_5.jpg" width="185" height="162" /></a></div>
                    <div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                        <font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
            </ul>
        </div>
        <div class="l_list">
            <div class="des_border">
                <div class="des_tit">
                    <ul>
                        <li class="current">推荐搭配</li>
                    </ul>
                </div>
                <div class="team_list">
                    <div class="img"><a href="#"><img src="__STATIC__/index/images/mat_1.jpg" width="160" height="140" /></a></div>
                    <div class="name"><a href="#">倩碧补水组合套装8折促销</a></div>
                    <div class="price">
                        <div class="checkbox"><input type="checkbox" name="zuhe" checked="checked" /></div>
                        <font>￥<span>768.00</span></font> &nbsp; 18R
                    </div>
                </div>
                <div class="team_icon"><img src="__STATIC__/index/images/jia_b.gif" /></div>
                <div class="team_list">
                    <div class="img"><a href="#"><img src="__STATIC__/index/images/mat_2.jpg" width="160" height="140" /></a></div>
                    <div class="name"><a href="#">香奈儿邂逅清新淡香水50ml</a></div>
                    <div class="price">
                        <div class="checkbox"><input type="checkbox" name="zuhe" /></div>
                        <font>￥<span>749.00</span></font> &nbsp; 18R
                    </div>
                </div>
                <div class="team_icon"><img src="__STATIC__/index/images/jia_b.gif" /></div>
                <div class="team_list">
                    <div class="img"><a href="#"><img src="__STATIC__/index/images/mat_3.jpg" width="160" height="140" /></a></div>
                    <div class="name"><a href="#">香奈儿邂逅清新淡香水50ml</a></div>
                    <div class="price">
                        <div class="checkbox"><input type="checkbox" name="zuhe" checked="checked" /></div>
                        <font>￥<span>749.00</span></font> &nbsp; 18R
                    </div>
                </div>
                <div class="team_icon"><img src="__STATIC__/index/images/equl.gif" /></div>
                <div class="team_sum">
                    套餐价：￥<span>1517</span><br />
                    <input type="text" value="1" class="sum_ipt" /><br />
                    <a href="#"><img src="__STATIC__/index/images/z_buy.gif" /></a>
                </div>

            </div>
            <div class="des_border">
                <div class="des_tit">
                    <ul>
                        <li class="current"><a href="#p_attribute">商品属性</a></li>
                        <li><a href="#p_details">商品详情</a></li>
                        <li><a href="#p_comment">商品评论</a></li>
                    </ul>
                </div>
                <div class="des_con" id="p_attribute">

                    <table border="0" align="center" style="width:100%; font-family:'宋体'; margin:10px auto;" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>商品名称：迪奥香水</td>
                            <td>商品编号：1546211</td>
                            <td>品牌： 迪奥（Dior）</td>
                            <td>上架时间：2015-09-06 09:19:09 </td>
                        </tr>
                        <tr>
                            <td>商品毛重：160.00g</td>
                            <td>商品产地：法国</td>
                            <td>香调：果香调香型：淡香水/香露EDT</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>容量：1ml-15ml </td>
                            <td>类型：女士香水，Q版香水，组合套装</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>


                </div>
            </div>

            <div class="des_border" id="p_details">
                <div class="des_t">商品详情</div>
                <div class="des_con">
                    <?php echo $goodsInfo['seller_note']; ?>
                </div>
            </div>

            <div class="des_border" id="p_comment">
                <div class="des_t">商品评论</div>

                <table border="0" class="jud_tab" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="175" class="jud_per">
                            <p>80.0%</p>好评度
                        </td>
                        <td width="300">
                            <table border="0" style="width:100%;" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="90">好评<font color="#999999">（80%）</font></td>
                                    <td><img src="__STATIC__/index/images/pl.gif" align="absmiddle" /></td>
                                </tr>
                                <tr>
                                    <td>中评<font color="#999999">（20%）</font></td>
                                    <td><img src="__STATIC__/index/images/pl.gif" align="absmiddle" /></td>
                                </tr>
                                <tr>
                                    <td>差评<font color="#999999">（0%）</font></td>
                                    <td><img src="__STATIC__/index/images/pl.gif" align="absmiddle" /></td>
                                </tr>
                            </table>
                        </td>
                        <td width="185" class="jud_bg">
                            购买过雅诗兰黛第六代特润精华露50ml的顾客，在收到商品才可以对该商品发表评论
                        </td>
                        <td class="jud_bg">您可对已购买商品进行评价<br /><a href="#"><img src="__STATIC__/index/images/btn_jud.gif" /></a></td>
                    </tr>
                </table>



                <table border="0" class="jud_list" style="width:100%; margin-top:30px;" cellspacing="0" cellpadding="0">
                    <tr valign="top">
                        <td width="160"><img src="__STATIC__/index/images/peo1.jpg" width="20" height="20" align="absmiddle" />&nbsp;向死而生</td>
                        <td width="180">
                            颜色分类：<font color="#999999">粉色</font> <br />
                            型号：<font color="#999999">50ml</font>
                        </td>
                        <td>
                            产品很好，香味很喜欢，必须给赞。 <br />
                            <font color="#999999">2015-09-24</font>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td width="160"><img src="__STATIC__/index/images/peo2.jpg" width="20" height="20" align="absmiddle" />&nbsp;就是这么想的</td>
                        <td width="180">
                            颜色分类：<font color="#999999">粉色</font> <br />
                            型号：<font color="#999999">50ml</font>
                        </td>
                        <td>
                            送朋友，她很喜欢，大爱。 <br />
                            <font color="#999999">2015-09-24</font>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td width="160"><img src="__STATIC__/index/images/peo3.jpg" width="20" height="20" align="absmiddle" />&nbsp;墨镜墨镜</td>
                        <td width="180">
                            颜色分类：<font color="#999999">粉色</font> <br />
                            型号：<font color="#999999">50ml</font>
                        </td>
                        <td>
                            大家都说不错<br />
                            <font color="#999999">2015-09-24</font>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td width="160"><img src="__STATIC__/index/images/peo4.jpg" width="20" height="20" align="absmiddle" />&nbsp;那*****洋 <br /><font color="#999999">（匿名用户）</font></td>
                        <td width="180">
                            颜色分类：<font color="#999999">粉色</font> <br />
                            型号：<font color="#999999">50ml</font>
                        </td>
                        <td>
                            下次还会来买，推荐。<br />
                            <font color="#999999">2015-09-24</font>
                        </td>
                    </tr>
                </table>



                <div class="pages">
                    <a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
                </div>

            </div>


        </div>
    </div>


    <!--Begin 弹出层-收藏成功 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="__STATIC__/index/images/close.gif" /></span>
            </div>
            <div class="notice_c">

                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                    <tr valign="top">
                        <td width="40"><img src="__STATIC__/index/images/suc.png" /></td>
                        <td>
                            <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">您已成功收藏该商品</span><br />
                            <a href="#">查看我的关注 >></a>
                        </td>
                    </tr>
                    <tr height="50" valign="bottom">
                        <td>&nbsp;</td>
                        <td><a href="#" class="b_sure">确定</a></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    <!--End 弹出层-收藏成功 End-->


    <!--Begin 弹出层-加入购物车 Begin-->
    <div id="fade1" class="black_overlay"></div>
    <div id="MyDiv1" class="white_content">
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv_1('MyDiv1','fade1')"><img src="__STATIC__/index/images/close.gif" /></span>
            </div>
            <div class="notice_c">

                <table border="0" align="center" style="margin-top:;" cellspacing="0" cellpadding="0">
                    <tr valign="top">
                        <td width="40"><img src="__STATIC__/index/images/suc.png" /></td>
                        <td>
                            <span style="color:#3e3e3e; font-size:18px; font-weight:bold;">宝贝已成功添加到购物车</span><br />
                            购物车共有1种宝贝（n件） &nbsp; &nbsp; 合计：1120元
                        </td>
                    </tr>
                    <tr height="50" valign="bottom">
                        <td>&nbsp;</td>
                        <td><a href="#" class="b_sure">去购物车结算</a><a href="#" class="b_buy">继续购物</a></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>


    <script>
        $(function(){
            layui.use(['layer'],function(){
                var layer=layui.layer;
                //加
                $('.add').click(function(){
                    var _this=$(this);
                    getNumber(1,_this);
                });
                //减
                $('.reduce').click(function(){
                    var _this=$(this);
                    getNumber(2,_this);
                });
                //改变数量
                function getNumber(type,_this){
                    var _input=$('#buy_number');
                    var buy_number=parseInt(_input.val());
                    var goods_number=$('#goods_number').val();
                    if(type==1){
                        //加
                        _this.next().prop('disabled',false);
                        if(buy_number>=goods_number){
                            _input.val(goods_number);
                            _this.prop('disabled',true);
                        }else{
                            buy_number+=1;
                            _input.val(buy_number);
                        }
                    }else{
                        //减
                        _this.prev().prop('disabled',false);
                        if(buy_number<=1){
                            _input.val(1);
                            _this.prop('disabled',true);
                        }else{
                            buy_number-=1;
                            _input.val(buy_number);
                        }
                    }
                };
                //数量框失去焦点
                $('#buy_number').blur(function(){
                    var goods_number=parseInt($('#goods_number').val());
                    var _this=$(this);
                    var buy_number=parseInt(_this.val());
                    var reg=/^[1-9]\d{0,}$/;
                    if(reg.test(buy_number)){
                        if(buy_number>=goods_number){
                            _this.val(goods_number);
                        }else{
                            _this.val(buy_number);
                        }
                    }else{
                        _this.val(1);
                    }
                });




                 //属性值添加点击事件
                 $('.des_choice').find('li').click(function(){
                     $(this).siblings('li').removeClass('checked');
                     $(this).addClass('checked');
                     checkSku();
                 })
                 //切换属性
                function checkSku(){
                     var value_id='';
                     var goods_id="<?php echo $goodsInfo['goods_id'];?>";
                     var cate_id="<?php echo $goodsInfo['cate_id'];?>";
                     $('.des_choice').find('.checked').each(function(){
                        value_id += $(this).attr('value_id') + ',';
                     });
                     //console.log(goods_id);return false;
                     $.ajax({
                         url:"<?php echo url('Product/checkSku'); ?>",
                         data:'value_id='+value_id+'&goods_id='+goods_id,
                         type:'post',
                         dataType:'json',
                         success:function(json_info){
                             //layui.layer.msg(json_info.msg);
                             if(json_info.status==100){
                             var url="<?php echo url( 'Product/productDetail',[ 'goods_id'=>'__sku_id__','cate_id'=>'cate_id'] ); ?>";
                             url=url.replace( '__sku_id__',json_info.msg.sku_id);
                             //alert(url);return false;
                             location.href=url;
                             }else{
                                layui.layer.msg(json_info.msg);
                             }
                         }
                     })
                 }








                //添加到购物车
                $('#carbuy').click(function(){
                    var goods_id=$('#goods_id').val();
                    var buy_number=$('#buy_number').val();
                    $.post(
                        "<?php echo url('cart/cartadd'); ?>",
                        {goods_id:goods_id,buy_number:buy_number},
                        function(res){
                            if(res.code==1){
                                layer.confirm(res.font,function(){
                                    location.href="<?php echo url('cart/buycarone'); ?>";
                                })
                            }else{
                                layer.msg(res.font,{icon:res.code});
                            }
                        },
                        'json'
                    )
                });
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

