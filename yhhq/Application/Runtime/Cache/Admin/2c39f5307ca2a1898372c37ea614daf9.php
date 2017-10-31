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
    
    <link rel="stylesheet" href="/htdocs/Public/css/user.css?{TIMESTAMP}">
    <fieldset class="layui-elem-field">
        <legend>用户管理 - 用户列表</legend>
        <div class="layui-field-box">
            <span class="layui-btn layui-btn-normal api-add"><i class="layui-icon">&#xe608;</i> 新增</span>
            <table class="layui-table" lay-even style="table-layout:fixed;">
                <thead>
                <tr>
                    <th>会员头像</th>
                    <th>用户昵称</th>
                    <th style="width:200px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;">回复内容</th>
                    <th>回复时间</th>
                    <th>状态</th>
                    <th style="width:200px">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><img src="/htdocs/Public/images/<?php echo ($v["userface"]); ?>" width="50" height="50"></td>
                        <td><?php echo ($vo['username']); ?></td>
                        <td style="width:200px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo ($vo['userask']); ?></td>
                        <td><?php echo ($vo['asktime']); ?></td>
                        <td>
                            <?php if($vo['status']): ?><span style="border-radius: 2px;background-color: #5FB878;padding:5px 10px;color: #ffffff">审核通过</span>
                                <?php else: ?>
                                <span style="border-radius: 2px;background-color: #FF5722;padding:5px 10px;color: #ffffff">审核不通过</span><?php endif; ?>
                        </td>
                        <td style="width:200px">
                            <?php if($vo['status']): ?><span class="layui-btn layui-btn-danger layui-btn-small confirm" data-info="你确定禁用当前用户么？" data-id="<?php echo ($vo['id']); ?>" data-url="<?php echo U('close');?>">屏蔽</span>
                                <?php else: ?>
                                <span class="layui-btn layui-btn-small confirm" data-info="你确定启用当前用户么？" data-id="<?php echo ($vo['id']); ?>" data-url="<?php echo U('open');?>">通过</span><?php endif; ?>
                            <span data-url="<?php echo U('edit', array('id' => $vo['id']));?>" class="layui-btn edit layui-btn-small">回复</span>
                            <span class="layui-btn layui-btn-danger layui-btn-small confirm" data-id="<?php echo ($vo['id']); ?>" data-info="你确定删除当前留言么？" data-url="<?php echo U('del');?>">删除</span>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </fieldset>

</div>
<script src="/htdocs/Public/kindeditor/kindeditor-all-min.js"></script>

<script src="/htdocs/Public/js/user.js"></script>
    <script>
        layui.use(['layer'], function() {
            $('.api-add').on('click', function () {
                layer.open({
                    type: 2,
                    area: ['60%', '90%'],
                    maxmin: true,
                    content: '<?php echo U("add");?>'
                });
            });
            $('.auth').on('click', function () {
                var ownObj = $(this);
                layer.open({
                    type: 2,
                    area: ['60%', '90%'],
                    maxmin: true,
                    content: ownObj.attr('data-url')
                });
            });
            
            $('.edit').on('click', function () {
                var ownObj = $(this);
                layer.open({
                    type: 2,
                    area: ['60%', '90%'],
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