<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"/data/wwwroot/default/myshop/public/../application/admin/view/category/cateadd.html";i:1542348119;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1541749144;s:80:"/data/wwwroot/default/myshop/public/../application/admin/view/public/header.html";i:1542884525;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545631575;}*/ ?>
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
        <div style="padding: 15px;width:400px">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">分类名称</label>
            <div class="layui-input-block">
                <input type="text" name="cate_name" required  lay-verify="required|checkName" placeholder="请输入分类名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否展示</label>
            <div class="layui-input-block">
                <input type="radio" name="cate_show" value="1" title="是" checked>
                <input type="radio" name="cate_show" value="2" title="否">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否导<br>航展示</label>
            <div class="layui-input-block">
                <input type="radio" name="cate_navshow" value="1" title="是">
                <input type="radio" name="cate_navshow" value="2" title="否" checked>
            </div>
        </div>
        <div class="layui-form-item" style="width: 300px;">
            <label class="layui-form-label">父类</label>
            <div class="layui-input-block">
                <select name="pid" lay-verify="required">
                    <option value="0">--请选择--</option>
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $v['cate_id']; ?>"><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*2); ?><?php echo $v['cate_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(function(){
        layui.use(['layer','form'],function(){
            var layer=layui.layer;
            var form=layui.form;
            //验证
            form.verify({
                checkName: function (value, item) {
                    var reg = /^.{1,}$/i;
                    var info
                    //console.log(value);
                    if (!reg.test(value)) {
                        return '分类名称错误';
                    } else {
                        $.ajax({
                            url: "<?php echo url('Category/checkName'); ?>",
                            method: 'post',
                            data: {cate_name: value, type: 1},
                            async: false,
                            success: function (msg) {
                                if (msg == 'no') {
                                    info = '分类名称已存在';
                                }
                            }
                        });
                        return info;
                    }
                }
            })
            //阻止提交
            form.on('submit(formDemo)', function(data){
                console.log(data.field);
                $.post(
                        "<?php echo url('category/cateAdd'); ?>",
                        data.field,
                        function(result){
                            layer.msg(result.font,{icon:result.code});
                            if(result.code==1){
                                layer.open({
                                    type:0,
                                    content:'添加成功',
                                    btn:['展示页面','继续添加'],
                                    yes:function(index,layero){
                                        location.href='cateList';
                                    },
                                    btn2:function(index,layero){
                                        location.href='cateAdd';
                                    }
                                })
                            }
                        },
                        'json'
                )

                return false;
            });
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