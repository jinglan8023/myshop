<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"/data/wwwroot/default/myshop/public/../application/admin/view/role/roleadd.html";i:1545380324;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1541749144;s:80:"/data/wwwroot/default/myshop/public/../application/admin/view/public/header.html";i:1542884525;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545631575;}*/ ?>
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
        <div style="padding: 15px;width:800px">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">角色名称</label>
            <div class="layui-input-block">
                <input type="text" name="role_name" required  lay-verify="required" placeholder="请输入角色名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <!--<div class="layui-form-item">
            <label class="layui-form-label">是否启用</label>
            <div class="layui-input-block">
                <input type="checkbox" name="is_yes" lay-skin="switch">
            </div>
        </div>-->
        <div class="layui-form-item">
            <label class="layui-form-label">权限节点</label>
            <div class="layui-input-block">
                <?php if(is_array($nodeInfo) || $nodeInfo instanceof \think\Collection || $nodeInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $nodeInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <fieldset class="layui-elem-field">
                    <legend>
                        <input type="checkbox" name="node_id[]" lay-filter="oneNode" title="<?php echo $v['node_name']; ?>" lay-skin="primary" value="<?php echo $v['node_id']; ?>">
                    </legend>
                    <div class="layui-field-box">
                        <?php if(!empty($v['son'])): if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                <input type="checkbox" name="node_id[]" title="<?php echo $vv['node_name']; ?>" class="twoNode" lay-filter="twoNode" lay-skin="primary" value="<?php echo $vv['node_id']; ?>">
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div>
                </fieldset>
                <?php endforeach; endif; else: echo "" ;endif; ?>
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
            //点击顶级节点
            form.on('checkbox(oneNode)', function(data){
                var _this=data.othis;
                var _input=_this.parent('legend').next().children("input[class='twoNode']");
                //console.log(_input)
                _input.each(function(index){
                    if(data.elem.checked==true){
                        $(this).prop('checked',true);
                        layui.form.render('checkbox');
                    }else{
                        $(this).prop('checked',false);
                        layui.form.render('checkbox');
                    }
                })
                //console.log(data.elem); //得到checkbox原始DOM对象
                //console.log(data.elem.checked); //是否被选中，true或者false
                //console.log(data.value); //复选框value值，也可以通过data.elem.value得到
                //console.log(data.othis); //得到美化后的DOM对象
            });
            //点击子级节点
            form.on('checkbox(twoNode)',function(data){
                var _this=data.othis;
                var _input=_this.parent('div').prev().children('input');
                //console.log(_input);
                if(data.elem.checked){
                    _input.prop('checked',true);
                }else{
                    var num=0;
                    var allinput=_this.siblings('input');
                    allinput.each(function(index){
                        if($(this).prop('checked')==false){
                            num+=1;
                        }
                    });
                    if(num==allinput.length){
                        _input.prop('checked',false);
                    }
                }
                layui.form.render('checkbox');
            });
            //提交
            form.on('submit(formDemo)', function(data){
                $.post(
                    "<?php echo url('role/roleadd'); ?>",
                    data.field,
                    function(result){
                        layer.msg(result.font,{icon:result.code});
                        if(result.code==1){
                            layer.open({
                                type:0,
                                content:'添加成功',
                                btn:['展示页面','继续添加'],
                                yes:function(index,layero){
                                    location.href="<?php echo url('role/rolelist'); ?>";
                                },
                                btn2:function(index,layero){
                                    location.href="<?php echo url('role/roleadd'); ?>";
                                }
                            })
                        }
                    },
                    'json'
                )
                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });
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