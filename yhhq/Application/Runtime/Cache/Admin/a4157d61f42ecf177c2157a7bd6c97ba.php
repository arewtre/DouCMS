<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo C('APP_NAME');?>管理后台</title>
    <link rel="stylesheet" href="/htdocs/Public/common/layui/css/layui.css">
    <link rel="stylesheet" href="/htdocs/Public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/htdocs/Public/kindeditor/themes/default/default.css" type="text/css">
    <link rel="stylesheet" href="/htdocs/Public/kindeditor/themes/default/upload.css?{TIMESTAMP}" type="text/css">
    <script type="text/javascript" src="/htdocs/Public/common/layui1.09/layui.js"></script>
    <script src="/htdocs/Public/common/js/jquery-1.12.4.min.js"></script>
    <script src="/htdocs/Public/js/address.js"></script>
    <script src="/htdocs/Public/jsplug/jparticle.jquery.js"></script>
    <!--<script src="/htdocs/Public/js/login.js"></script> -->
    <script type="text/javascript" src="/htdocs/Public/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/htdocs/Public/dataTable/dataTable.css">
    
</head>
<body>
<div style="margin: 15px;">
    
    <fieldset class="layui-elem-field">
        <legend>文章分类管理 - 分类列表</legend>
        <div class="layui-field-box">
            <span class="layui-btn layui-btn-normal api-add"><i class="layui-icon">&#xe608;</i> 新增</span>
            <table class="layui-table" lay-even>
                <thead>
                <tr>
                    <th>#</th>
                    <th>分类名称</th>
                    <th>排序</th>
                    <th>隐藏</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["pid"]); ?></td>
                        <td style="text-align:left"><?php echo ($vo['showName']); echo ($vo['title']); ?></td>
                        <td><?php echo ($vo['displayorder']); ?></td>
                        <td>
                            <?php if($vo['is_display']==0): ?><span style="border-radius: 2px;background-color: #FF5722;padding:5px 10px;color: #ffffff">隐藏</span>
                                <?php else: ?>
                                <span style="border-radius: 2px;background-color: #5FB878;padding:5px 10px;color: #ffffff">显示</span><?php endif; ?>
                        </td>
                        <td>
                            <!--<?php if($vo['is_display']==0): ?><span class="layui-btn confirm" data-info="你确定显示当前分类么？" data-id="<?php echo ($vo['pid']); ?>" data-url="<?php echo U('open');?>">显示</span>                               
                                <?php else: ?>
                                <span class="layui-btn layui-btn-danger confirm" data-info="你确定隐藏当前分类么？" data-id="<?php echo ($vo['pid']); ?>" data-url="<?php echo U('close');?>">隐藏</span><?php endif; ?>-->
                            <span class="layui-btn apii-add" data-url="<?php echo U('add', array('id' => $vo['pid']));?>"><i class="layui-icon">&#xe608;</i> 新增子分类</span>
                            <span data-url="<?php echo U('edit', array('id' => $vo['pid']));?>" class="layui-btn edit layui-btn-normal">编辑</span>
                            <span class="layui-btn layui-btn-danger confirm" data-id="<?php echo ($vo['pid']); ?>" data-info="你确定删除当前分类么？" data-url="<?php echo U('del');?>">删除</span>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </fieldset>

</div>
<script src="/htdocs/Public/kindeditor/kindeditor-all-min.js"></script>

    <script>
        layui.use(['layer'], function() {
            $('.api-add').on('click', function () {
                layer.open({
                    type: 2,
                    area: ['60%', '60%'],
                    maxmin: true,
                    content: '<?php echo U("add");?>'
                });
            });
            
            $('.apii-add').on('click', function () {
            	var ownObj = $(this);
                layer.open({
                    type: 2,
                    area: ['60%', '60%'],
                    maxmin: true,
                    content: ownObj.attr('data-url')
                });
            });
            
            $('.edit').on('click', function () {
                var ownObj = $(this);
                layer.open({
                    type: 2,
                    area: ['60%', '60%'],
                    maxmin: true,
                    content: ownObj.attr('data-url')
                });
            });
            $('.confirm').on('click', function () {
                var ownObj = $(this);
                layer.confirm(ownObj.attr('data-info'), {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.ajax({
                        type: "POST",
                        url: ownObj.attr('data-url'),
                        data: {id:ownObj.attr('data-id')},
                        success: function(msg){
                            if( msg.code == 1 ){
                                location.reload();
                            }else{
                                layer.msg(msg.msg, {
                                    icon: 5,
                                    shade: [0.6, '#393D49'],
                                    time:1500
                                });
                            }
                        }
                    });
                });
            });
        });
    </script>

</body>
</html>