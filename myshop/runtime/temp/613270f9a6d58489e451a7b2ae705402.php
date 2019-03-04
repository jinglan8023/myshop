<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/data/wwwroot/default/myshop/public/../application/admin/view/friend/friendlist.html";i:1547032950;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1541749144;s:80:"/data/wwwroot/default/myshop/public/../application/admin/view/public/header.html";i:1542884525;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545631575;}*/ ?>
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
    <table id="test" lay-filter="table_edit" class="layui-hide"></table>
    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
</div>
<script>
    $(function(){
        layui.use(['table','layer'],function(){
            var table=layui.table;
            var layer=layui.layer;
            table.render({
                elem:'#test',
                url:"<?php echo url('Friend/getFriendInfo'); ?>",
                page:true,
                limit:3,
                limits:[1,3,5,7,9],
                cols:[[
                    {field: 'friend_id', title: '编号', width:100,sort: true, fixed: 'left'},
                    {field: 'friend_name', title: '友链名称', width:150,edit: 'text'},
                    {field: 'friend_url', title: '友链地址', width:170,edit: 'text'},
                    {field: 'create_time', title: '添加时间', width:180},
                    {fixed: 'right', title:'操作', toolbar: '#barDemo', width:130}
                ]]
            });
            //即点即改
            table.on('edit(table_edit)',function(obj){
                //获得修改后的值
                var value=obj.value;
                var field=obj.field;
                var friend_id=obj.data.friend_id;
                //console.log(value);
                $.post(
                        "<?php echo url('Friend/friendUpdateField'); ?>",
                        {value:value,field:field,friend_id:friend_id},
                        function(msg){
                            layer.msg(msg.font,{icon:msg.code});
                            if(msg.code==2){
                                table.reload('test');
                            }
                        },
                        'json'
                )
            });
            table.on('tool(table_edit)',function(obj){
                var friend_id=obj.data.friend_id;
                var layEvent=obj.event;
                //console.log()
                if(layEvent==='del'){
                    //删除
                    $.post(
                            "<?php echo url('friend/friendDel'); ?>",
                            {friend_id:friend_id},
                            function(res){
                                layer.msg(res.font,{icon:res.code});
                                if(res.code==1){
                                    table.reload('test');
                                }
                            },
                            'json'
                    )
                }else if(layEvent==='edit'){
                    //编辑  修改
                    location.href="<?php echo url('friend/friendUpdate'); ?>?friend_id="+friend_id;
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