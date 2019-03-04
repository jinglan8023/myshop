<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/data/wwwroot/default/myshop/public/../application/admin/view/category/catelist.html";i:1542361450;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1541749144;s:80:"/data/wwwroot/default/myshop/public/../application/admin/view/public/header.html";i:1542884525;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545631575;}*/ ?>
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
        <div style="padding: 15px;width:900px;">
    <table class="layui-table">
        <thead>
        <tr>
            <th>编号</th>
            <th>分类名称</th>
            <th>是否展示</th>
            <th>是否导航展示</th>
            <th>添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr pid="<?php echo $v['pid']; ?>" cate_id="<?php echo $v['cate_id']; ?>">
            <td style="cursor:pointer">
                <?php echo str_repeat('&nbsp;&nbsp;',$v['level']*2); ?>
                <a href="javascript:;" class="flag">+</a>
                <?php echo $v['cate_id']; ?>
            </td>
            <td style="cursor:pointer">
                <?php echo str_repeat('&nbsp;&nbsp;',$v['level']*2); ?>
                <span class="span_test"><?php echo $v['cate_name']; ?></span>
                <input type="text" class="inp" field="cate_name" value="<?php echo $v['cate_name']; ?>" style="width:120px;display:none;">
            </td>
            <td class="show" status="<?php echo $v['cate_show']; ?>" field="cate_show" style="cursor:pointer">
                <?php if($v['cate_show'] == 1): ?>√
                <?php else: ?>×
                <?php endif; ?>
            </td>
            <td class="show" status="<?php echo $v['cate_navshow']; ?>" field="cate_navshow" style="cursor:pointer">
                <?php if($v['cate_navshow'] == 1): ?>√
                <?php else: ?>×
                <?php endif; ?>
            </td>
            <td><?php echo $v['create_time']; ?></td>
            <td><a href="javascript:;" class="del">删除</a>&nbsp;&nbsp;<a href="<?php echo url('category/cateUpdate'); ?>?cate_id=<?php echo $v['cate_id']; ?>">修改</a></td>
        </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<script>
    $(function(){
        layui.use('layer',function(){
            //隐藏2  3级
            $("tbody>tr[pid!=0]").hide();
            //展示  隐藏
            $('.flag').click(function(){
                var _this=$(this);
                var flag=_this.text();
                var cate_id=_this.parents('tr').attr('cate_id');//当前点击的分类id
                if(flag=='+'){
                    //展示
                    var son=$("tbody>tr[pid="+cate_id+"]");
                    if(son.length>0){
                        son.show();
                        _this.text('-');
                    }
                }else{
                    trHide(cate_id);
                    _this.text('+');
                }
            });
            //递归隐藏
            function trHide(cate_id){
                var _tr=$("tbody>tr[pid="+cate_id+"]");
                _tr.find('td').find("a[class='flag']").text('+');
                _tr.hide();
                for(var i=0;i<_tr.length;i++){
                    var c_id=_tr.eq(i).attr('cate_id');
                    trHide(c_id);
                }
            }
            //分类名称即点即改
            $('.span_test').click(function(){
                var _this=$(this);
                _this.hide();
                _this.next('input').prop('autofocus',true);
                _this.next('input').show();
            });
            $('.inp').blur(function(){
                var _this=$(this);
                var value=_this.val();
                var field=_this.attr('field');
                var cate_id=_this.parents('tr').attr('cate_id');
                $.post(
                        "<?php echo url('category/cateUpdateField'); ?>",
                        {value:value,field:field,cate_id:cate_id},
                        function(result){
                            layer.msg(result.font,{icon:result.code});
                            if(result.code==1){
                                _this.hide();
                                _this.prev('span').text(value);
                                _this.prev('span').show();
                            }
                        },
                        'json'
                )
            })
            //展示即点即改
            $('.show').click(function(){
                var _this=$(this);
                var field=_this.attr('field');
                var status=_this.attr('status');
                var cate_id=_this.parent().attr('cate_id');
                if(status==1){
                    status=2;
                }else{
                    status=1;
                }
                $.post(
                    "<?php echo url('category/cateUpdateField'); ?>",
                    {value:status,field:field,cate_id:cate_id},
                    function(result){
                        layer.msg(result.font,{icon:result.code});
                        if(status==2){
                            _this.text('×');
                            _this.attr('status',2);
                        }else{
                            _this.text('√');
                            _this.attr('status',1);
                        }
                    },
                    'json'
                )
            })
            //删除
            $('.del').click(function(){
                var _this=$(this);
                var cate_id=_this.parents('tr').attr('cate_id');
                $.post(
                     "<?php echo url('category/cateDel'); ?>",
                     {cate_id:cate_id},
                     function(result){
                         layer.msg(result.font,{icon:result.code});
                         if(result.code==1){
                             _this.parents('tr').remove();
                         }
                     },
                      'json'
                )
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