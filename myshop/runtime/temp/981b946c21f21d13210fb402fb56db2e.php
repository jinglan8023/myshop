<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"/data/wwwroot/default/myshop/public/../application/admin/view/goodstype/index.html";i:1547036634;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1541749144;s:80:"/data/wwwroot/default/myshop/public/../application/admin/view/public/header.html";i:1542884525;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545631575;}*/ ?>
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
        <link rel="stylesheet" href="__STATIC__/bootstrap.min.css">
<div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <span class="layui-breadcrumb" lay-separator="—">
                <a href="<?php echo url('Hou/show'); ?>">首页</a>
                <a href="">权限列表</a>
                <a href="">角色列表</a>
            </span>

            <a href="<?php echo url('goodsTypeAdd'); ?>" class="btn btn-default" style="margin-left:300px">添加商品类型</a>
            <table class="layui-table" lay-even="" lay-skin="row">
                    <colgroup>
                        <col width="150">
                        <col width="150">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>商品类型名</th>
                            <th>操作</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php foreach($typeInfo as $v): ?>
                            <tr myid="<?php echo $v['type_id']; ?>">
                                <td><?php echo $v['type_id']; ?></td>
                                <td><?php echo $v['type_name']; ?></td>
                                <td>
                                    <a href="<?php echo url('Attribute/attrAdd'); ?>?tid=<?php echo $v['type_id']; ?>" class="layui-btn layui-btn-xs">属性添加</a>
                                    <a href="<?php echo url('Attribute/edit'); ?>?tid=<?php echo $v['type_id']; ?>" class="layui-btn layui-btn-xs">编辑</a>
                                    <button class="layui-btn layui-btn-danger layui-btn-xs mydel"><i class="layui-icon">删除</i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>  
            <div  name="box" align="center"><?php echo $typeInfo->render();?></div>
        </div>
</div>
<script href="__STATIC__/jquery-3.2.1.min.js"></script>
<script>
    $(function(){
        layui.use(['table','layer'],function() {
            var table = layui.table;
            var layer = layui.layer;

          //删除
            $('.mydel').click(function(){
                var myParent = $(this).parent().parent();
                var tid = myParent.attr('myid');
                //alert(tid);
                layer.confirm('真的删除行么', function(index){
                    $.post("<?php echo url('Attribute/delete'); ?>",{id:tid},function(json_info){
                        if(json_info.code==1){
                            myParent.css('display','none');
                            layer.close(index);
                        }else(
                                alert('删除失败')
                        )
                    })
                })
            })

        })
    })



    //$(document).on('click','.mydel',delCla)
    //$(".mydel").click(this,delClass)

    
   $("[name='phone']").blur(function(){
        var key=$(this).val();
        //console.log(val);
        var sou=$("[name='tiaojian']").val();
        
        $.get("<?php echo url('index'); ?>",{val:key,sou:sou},function(data){
        //     //console.log(data);
            var aa=data.arr.data;
            var page=data.page;
            //console.log(page);
            var str='';
            //var page=$(".active span").text();
            $.each(aa,function(i,v){
                str+="<tr myid='"+v.admin_id+"'>"+
                    "<td>"+v.type_id+"</td>"+
                    "<td>"+v.type_name+"</td>"+
                    "<td>"+v.admin_email+"</td>"+
                    "<td>"+v.admin_tel+"</td>"+
                    "<td>"+v.add_time+"</td>"+
                    "<td>"+
                        "<a href='Attribute/attrAdd?id="+v.t_id+"' class='layui-btn layui-btn-xs'>属性添加</a>"+
                        "<a href='Attribute/edit?id="+v.t_id+"' class='layui-btn layui-btn-xs'>编辑</a>"+
                        "<button class='layui-btn layui-btn-danger layui-btn-xs mydel'><i class='layui-icon'>删除</i></button>"+
                    "</td>"+
                    "</tr>";
            })
            $("tbody").html(str);
            $("[name='box']").html(page);
            $(".mydel").on('click',delClass);
        })
    
   })
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