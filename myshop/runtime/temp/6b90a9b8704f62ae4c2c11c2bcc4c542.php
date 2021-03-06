<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"/data/wwwroot/default/myshop/public/../application/admin/view/goods/goodsadd.html";i:1547039278;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1541749144;s:80:"/data/wwwroot/default/myshop/public/../application/admin/view/public/header.html";i:1542884525;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545631575;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>myshop后台管理</title>
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <script src="__STATIC__/layui/layui.js"></script>
    <script src="__STATIC__/jquery-3.2.1.min.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <!-- 头部-->
    <div class="layui-header">
    <div class="layui-logo">layui后台管理</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;">
                <img src="__STATIC__/admin/d.png" class="layui-nav-img">
                <?php echo \think\Session::get('adminInfo.admin_name'); ?>
            </a>
            <dl class="layui-nav-child">
                <dd><a href="">基本资料</a></dd>
                <dd><a href="">安全设置</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="<?php echo url('login/quit'); ?>">退出</a></li>
    </ul>
</div>
    <!-- 左侧-->
    <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            <?php if(is_array($leftNodeInfo) || $leftNodeInfo instanceof \think\Collection || $leftNodeInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $leftNodeInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li class="layui-nav-item">
                    <a href="javascript:;"><?php echo $v['node_name']; ?></a>
                    <dl class="layui-nav-child">
                        <?php if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                            <dd><a href='<?php echo url("$vv[controller_name]/$vv[action_name]"); ?>'><?php echo $vv['node_name']; ?></a></dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <link rel="stylesheet" type="text/css" href="__STATIC__/goods.css" />
<script type="text/javascript" charset="utf-8" src="/utf8-php/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/utf8-php/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/utf8-php/lang/zh-cn/zh-cn.js"></script>
<div class="layui-body" >
    <!-- 内容主体区域 -->
    <!--  <div style="padding: 15px;"><h3>商品管理</h3></div> -->
    <hr/>
    <script type="text/javascript">
        $(function () {
            window.onload = function ()
            {
                var $li = $('#tab li');
                var $ul = $('.condiv');

                $li.click(function () {
                    var $this = $(this);
                    var $t = $this.index();
                    //	alert($t);
                    $li.removeClass();
                    $this.addClass('current');
                    $ul.css('display', 'none');
                    $ul.eq($t).css('display', 'block');
                    if( $t==1 ){
                        $('#editordiv div').css('display', 'block');
                        $('#edui1_toolbarmsg').css('display','none');
                    }
                });
            }
        });
        //console.log($("span").parents().text());

    </script>
    <style>

        .label {color:#333;}
    </style>

    <div id="pageAll">

        <div class="page ">
            <!-- 会员注册页面样式 -->
            <form class="form-inline" action="<?php echo url('Goods/goodsAddTo'); ?>" method="post"  enctype="multipart/form-data" >
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
                <div class="banneradd bor">
                    <ul id="tab">
                        <li class="current">商品基本信息</li>
                        <li>详细描述</li>
                        <li>其他信息</li>
                        <li>商品属性</li>
                        <li>商品相册</li>
                    </ul>
                    <div id="content">
                        <!-- 通用信息 start-->
                        <div class="condiv" style="display:block">
                            <div class="layui-form-item">
                                <table width="90%" id="general-table" align="center" >
                                    <tbody>
                                    <tr>
                                        <td class="label">商品名称：</td>
                                        <td><input type="text" name="goods_name" value="诺基亚N85" size="30" class="layui-input"><span class="require-field">*</span></td>
                                    </tr>
                                    <tr>
                                        <td class="label">商品货号： </td>
                                        <td><input type="text" name="goods_sn" value="" size="20" class="layui-input" ><br>
                                            <span class="notice-span" style="display:block" id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span></td>
                                    </tr>
                                    <tr>
                                        <td class="label">商品分类：</td>
                                        <td>
                                            <select name="cate_id" class="form-control">
                                                <?php if(is_array($cateInfo) || $cateInfo instanceof \think\Collection || $cateInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $v['cate_id']; ?>"><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3); ?><?php echo $v['cate_name']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">商品品牌：</td>
                                        <td>
                                            <select name="brand_id" class="form-control">
                                                <?php if(is_array($brandInfo) || $brandInfo instanceof \think\Collection || $brandInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $brandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $v['brand_id']; ?>"><?php echo $v['brand_name']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="label">本店售价：</td>
                                        <td><input type="text" name="shop_price" value="3010.00" size="20"  class="layui-input">

                                            <span class="require-field">*</span></td>
                                    </tr>
                                    <tr>
                                        <td class="label">会员价格：</td>
                                        <td><input type="text" name="user_price" value="3010.00" size="20" class="layui-input"></td>
                                    </tr>

                                    <tr>
                                        <td class="label">市场售价：</td>
                                        <td><input type="text" name="market_price" value="3612.00" size="20" class="layui-input">

                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="label"><label for="is_promote"><input type="checkbox" id="is_promote" name="is_promote" value="1" checked="checked" onclick="handlePromote(this.checked);"> 促销价：</label></td>
                                        <td id="promote_3">
                                            <input type="text" id="promote_1" class="layui-input" name="promote_price" value="2750.00" size="20"></td>
                                    </tr>
                                    <tr id="promote_4">
                                        <td class="label" id="promote_5">促销日期：</td>
                                        <td id="promote_6">
                                            <input name="promote_start_date" type="text" id="promote_start_date" size="12" value="2009-06-01" readonly="readonly"><input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('promote_start_date', '%Y-%m-%d', false, false, 'selbtn1');" value="选择" class="button"> - <input name="promote_end_date" type="text" id="promote_end_date" size="12" value="2014-11-30" readonly="readonly"><input name="selbtn2" type="button" id="selbtn2"  onclick="return showCalendar('promote_end_date', '%Y-%m-%d', false, false, 'selbtn2');" value="选择" class="button">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">上传商品图片：</td>
                                        <td>
                                            <input type="file" name="goods_img" size="35" >
                                            <input type="text" class="layui-input" size="40" value="商品图片外部URL" style="color:#aaa;" onfocus="if (this.value == '商品图片外部URL'){this.value='http://';this.style.color='#000';}" name="goods_img_url">
                                        </td>
                                    </tr>
                                    <tr id="auto_thumb_1">
                                        <td class="label"> 上传商品缩略图：</td>
                                        <td id="auto_thumb_3">
                                            <input type="file" name="goods_thumb" size="35" >
                                            <input type="text" class="layui-input" size="40" value="商品缩略图外部URL" style="color:#aaa;" onfocus="if (this.value == '商品缩略图外部URL'){this.value='http://';this.style.color='#000';}" name="goods_thumb_url" >
                                            <label for="auto_thumb"><input type="checkbox" id="auto_thumb" name="auto_thumb" checked="true" value="1" onclick="handleAutoThumb(this.checked)">自动生成商品缩略图</label>            </td>
                                    </tr>
                                    </tbody></table>

                            </div>
                        </div>
                        <!-- 通用信息 end-->
                        <!-- 编辑器详细信息 start-->
                        <div class="condiv" id="editordiv" style="display: none">

                            <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
                        </div>
                        <!-- 编辑器详细信息 end-->
                        <!-- 其他信息 start-->
                        <div  class="condiv" style="display: none">

                            <!-- 其他信息 -->
                            <table width="90%" id="mix-table"  align="center">
                                <tbody>
                                <tr>
                                    <td class="label">商品重量：</td>
                                    <td><input type="text" name="goods_weight" value="" size="20" class="layui-input"> <select name="weight_unit"><option value="1">千克</option><option value="0.001" selected="">克</option></select></td>
                                </tr>
                                <tr>
                                    <td class="label">商品库存数量：</td>
                                    <!--            <td><input type="text" name="goods_number" value="4" size="20" readonly="readonly" /><br />-->
                                    <td><input type="text" name="goods_number" value="100" size="20" class="layui-input"><br>
                                        <span class="notice-span" style="display:block" id="noticeStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
                                </tr>
                                <tr>
                                    <td class="label">库存警告数量：</td>
                                    <td><input type="text" name="warn_number" value="8" size="20" class="layui-input"></td>
                                </tr>
                                <tr>
                                    <td class="label">加入推荐：</td>
                                    <td>
                                        <input type="checkbox" name="is_best" value="1" checked="checked">精品
                                        <input type="checkbox" name="is_new" value="1" checked="checked">新品
                                        <input type="checkbox" name="is_hot" value="1" checked="checked">热销
                                    </td>
                                </tr>
                                <tr id="alone_sale_1">
                                    <td class="label" id="alone_sale_2">上架：</td>
                                    <td id="alone_sale_3">
                                        <input type="checkbox" name="is_on_sale" value="1" checked="checked"> 打勾表示允许销售，否则不允许销售。
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">能作为普通商品销售：</td>
                                    <td><input type="checkbox" name="is_alone_sale" value="1" checked="checked"> 打勾表示能作为普通商品销售，否则只能作为配件或赠品销售。</td>
                                </tr>
                                <tr>
                                    <td class="label">是否为免运费商品</td>
                                    <td><input type="checkbox" name="is_shipping" value="1"> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。</td>
                                </tr>
                                <tr>
                                    <td class="label">商品关键词：</td>
                                    <td><input type="text" name="keywords" value="2018年10月 GSM,850,900,1800,1900 黑色" size="40" class="layui-input"> 用空格分隔</td>
                                </tr>
                                <tr>
                                    <td class="label">商品简单描述：</td>
                                    <td><textarea name="description" cols="40" rows="3" class="layui-textarea"></textarea></td>
                                </tr>
                                <tr>
                                    <td class="label">商家备注： </td>
                                    <td><textarea name="seller_note" cols="40" rows="3" class="layui-textarea"></textarea><br>
                                        <span class="notice-span" style="display:block" id="noticeSellerNote">仅供商家自己看的信息</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- 其他信息 end-->
                        <!-- 商品属性start -->
                        <div class="condiv" style="display: none">

                            <!-- 商品属性 -->
                            <table width="90%" id="properties-table"  align="center">
                                <tbody>
                                <tr>
                                    <td class="label">商品类型：</td>
                                    <td>
                                        <select class='form-control goods_type' name="goods_type" >
                                            <?php if(is_array($typeInfo) || $typeInfo instanceof \think\Collection || $typeInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $typeInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $v['type_id']; ?>"><?php echo $v['type_name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select><br>
                                        <span class="notice-span" style="display:block" id="noticeGoodsType">请选择商品的所属类型，进而完善此商品的属性</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="tbody-goodsAttr" colspan="2" style="padding:0">

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <!-- 商品属性 end -->
                        <!-- 商品相册start -->
                        <div class="condiv" style="display: none">
                            <table width="90%" id="gallery-table" align="center">
                                <tbody>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td>

                                        <a href="javascript:;" onclick="addSpec(this)">[+]</a>
                                        <input type="text" name="goods_img_desc[]" size="20" placeholder="图片描述">
                                        <input type="file" name="img_url[]">
                                        <input type="text" size="40" value="或者输入外部图片链接地址" style="color:#aaa;" onfocus="if (this.value == '或者输入外部图片链接地址'){this.value='http://';this.style.color='#000';}" name="goods_link[]">

                                    </td>
                                </tr>

                                </tbody>
                            </table>


                        </div>
                        <!--商品相册 end-->
                    </div>


                    <p align="center">
                        <button class="button_ok" href="#">提交</button>
                        <button type="reset" class="button_ok button_no" >取消</button>
                    </p>

                </div>
            </form>
        </div>

        <!-- 会员注册页面样式end -->
    </div>
    <script type="text/javascript" charset="utf-8" src="UE/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="UE/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="UE/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
        //点击商品类型  变
        $(document).on('change','.goods_type',function(){
            var tid = $(this).val();
            if( tid ){
                $.ajax({
                    type: "POST",
                    url: "<?php echo url('Goods/attrShow'); ?>",
                    data: "tid="+tid,
                    success: function(msg){
                        $('#tbody-goodsAttr').html(msg);
                    }
                });
            }
        });

        //追加一行
        function addSpec(obj){
            //  alert('123');
            var nextnode = $(obj).parent().parent().clone();
            $(obj).parent().parent().after(nextnode);
            $(obj).parent().parent().next().find('a').text('[ - ]');
            $(obj).parent().parent().next().find('a').attr('onclick','lessSpec(this)');
        }
        //减一行
        function lessSpec(obj){
            $(obj).parent().parent().remove();
        }

    </script>
</div>

    </div>
</div>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>