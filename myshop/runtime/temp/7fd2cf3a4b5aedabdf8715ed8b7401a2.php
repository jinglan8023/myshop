<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"/data/wwwroot/default/myshop/public/../application/admin/view/goods/goodslist.html";i:1546849199;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1541749144;s:80:"/data/wwwroot/default/myshop/public/../application/admin/view/public/header.html";i:1542884525;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545631575;}*/ ?>
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
        <div style="padding: 15px;">
    <div>
        <input type="text" id="goods_name" placeholder="商品名称">
        分类:
        <select id="cate_name">
            <option value="">--请选择--</option>
            <?php if(is_array($cateInfo) || $cateInfo instanceof \think\Collection || $cateInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $v['cate_name']; ?>"><?php echo $v['cate_name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        品牌
        <select id="brand_name">
            <option value="">--请选择--</option>
            <?php if(is_array($brandInfo) || $brandInfo instanceof \think\Collection || $brandInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $brandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $v['brand_name']; ?>"><?php echo $v['brand_name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <input type="button" value="搜索" id="btn">
    </div>
    <table id="test" lay-filter="table_edit" class="layui-hide"></table>
    <script type="text/html" id="barDemo">
        <a href="<?php echo url('Goods/sku'); ?>?goods_id={{d.goods_id}}" class="layui-btn layui-btn-xs">sku货品</a>
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
    <script type="text/html" id="upTpl">
        <input type="checkbox" name="is_on_sale" value="{{d.is_on_sale}}" data-field={{"is_on_sale"}} data-id="{{d.goods_id}}" lay-skin="switch" lay-text="上架|" lay-filter="switch" {{ d.goods_up == 1 ? 'checked' : '' }}>
    </script>
    <script type="text/html" id="newTpl">
        <input type="checkbox" name="is_new" value="{{d.is_new}}" data-field={{"is_new"}} data-id="{{d.goods_id}}" lay-skin="switch" lay-text="新品|" lay-filter="switch" {{ d.goods_new == 1 ? 'checked' : '' }}>
    </script>
    <script type="text/html" id="bestTpl">
        <input type="checkbox" name="is_best" value="{{d.is_best}}" data-field={{"is_best"}} data-id="{{d.goods_id}}" lay-skin="switch" lay-text="精品|" lay-filter="switch" {{ d.goods_best == 1 ? 'checked' : '' }}>
    </script>
    <script type="text/html" id="hotTpl">
        <input type="checkbox" name="is_hot" value="{{d.is_hot}}" data-field={{"is_hot"}} data-id="{{d.goods_id}}" lay-skin="switch" lay-text="热卖|" lay-filter="switch" {{ d.goods_hot == 1 ? 'checked' : '' }}>
    </script>
</div>
<script>
    $(function(){
        layui.use(['table','layer','form'],function(){
            var table=layui.table;
            var layer=layui.layer;
            var form=layui.form;
            table.render({
                elem:'#test',
                url:"<?php echo url('Goods/getGoodsInfo'); ?>",
                page:true,
                limit:8,
                limits:[1,3,5,7,9],
                cols:[[
                    {field: 'goods_id', title: '编号', width:70,sort: true, fixed: 'left'},
                    {field: 'goods_name', title: '商品名称', width:150,edit: 'text'},
                    {field: 'shop_price', title: '本店价格', width:90,edit: 'text'},
                    {field: 'market_price', title: '市场价', width:80,edit: 'text'},
                    {field: 'is_on_sale', title: '是否上架',templet: '#upTpl', width:80,unresize:true},
                    {field: 'is_new', title: '新品',templet: '#newTpl', width:80},
                    {field: 'is_best', title: '精品',templet: '#bestTpl', width:80},
                    {field: 'is_hot', title: '热卖',templet: '#hotTpl', width:80},
                    {field: 'goods_number', title: '库存', width:70,edit: 'text'},
                    {field: 'cate_name', title: '分类', width:80},
                    {field: 'brand_name', title: '品牌', width:80},
                    {field: 'add_time', title: '添加时间', width:100},
                    {fixed: 'right', title:'操作', toolbar: '#barDemo', width:180}
                ]]
            });
            //搜索
            $('#btn').click(function(){
                //alert(1);
                var goods_name=$("#goods_name").val();
                var cate_name=$("#cate_name").val();
                var brand_name=$("#brand_name").val();
                table.reload('test',{
                    where:{goods_name:goods_name,cate_name:cate_name,brand_name:brand_name}
                })
            })
            //即点即改
            table.on('edit(table_edit)',function(obj){
                //获得修改后的值
                var value=obj.value;
                var field=obj.field;
                var goods_id=obj.data.goods_id;
                //console.log(value);
                $.post(
                        "<?php echo url('Goods/goodsUpdateField'); ?>",
                        {value:value,field:field,goods_id:goods_id},
                        function(msg){
                            layer.msg(msg.font,{icon:msg.code});
                            if(msg.code==2){
                                table.reload('test');
                            }
                        },
                        'json'
                )
            });
            //开关即点即改
            form.on('switch(switch)',function(data){
                var _this=$(this);
                var goods_id=_this.data('id');
                var change=data.elem.checked;
                var field=data.elem.name;
                if(change){
                    change=1;
                }else{
                    change=2;
                }
                $.post(
                    "<?php echo url('goods/goodsUpdateField'); ?>",
                    {goods_id:goods_id,value:change,field:field},
                    function(res){
                        layer.msg(res.font,{icon:res.code});
                        //console.log(res.font);
                        if(res.code==2){
                            table.reload('test');
                        }
                    },
                        'json'
                )
            });
            table.on('tool(table_edit)',function(obj){
                var goods_id=obj.data.goods_id;
                var layEvent=obj.event;
                //console.log()
                if(layEvent==='del'){
                    //删除
                    $.post(
                            "<?php echo url('Goods/goodsDel'); ?>",
                            {goods_id:goods_id},
                            function(res){
                                layer.msg(res.font,{icon:res.code});
                                if(res.code==1){
                                    table.reload('test');
                                }
                            },
                            'json'
                    )
                }else if(layEvent==='edit'){
                    //修改  编辑
                    location.href="<?php echo url('goods/goodsUpdate'); ?>?goods_id="+goods_id;
                }
            })
        });
    });
</script>

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