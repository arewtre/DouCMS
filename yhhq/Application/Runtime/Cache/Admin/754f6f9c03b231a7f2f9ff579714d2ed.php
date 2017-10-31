<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo C('APP_NAME');?></title>
    <link rel="stylesheet" href="/yhhq/Public/common/layui/css/layui.css">
    <link rel="stylesheet" href="/yhhq/Public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/yhhq/Public/kindeditor/themes/default/default.css" type="text/css">
    <link rel="stylesheet" href="/yhhq/Public/kindeditor/themes/default/upload.css?{TIMESTAMP}" type="text/css">
    <script type="text/javascript" src="/yhhq/Public/common/layui1.09/layui.js"></script>
    <script src="/yhhq/Public/common/js/jquery-1.12.4.min.js"></script>
    <script src="/yhhq/Public/js/address.js"></script>
    <script src="/yhhq/Public/jsplug/jparticle.jquery.js"></script>
    <!--<script src="/yhhq/Public/js/login.js"></script> -->
    <script type="text/javascript" src="/yhhq/Public/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/yhhq/Public/dataTable/dataTable.css">
    
</head>
<body>
<div style="margin: 15px;">
    
<link rel="stylesheet" href="/yhhq/Public/css/user.css?{TIMESTAMP}">
    <fieldset class="layui-elem-field">
        <legend>表结构管理 - 查看表</legend>
        <div class="layui-field-box">            
            <table class="layui-table" lay-even>
                <thead>
                <tr>
                <?php if(is_array($dalist)): $i = 0; $__LIST__ = $dalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><th><?php echo ($vo["column_name"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	                    <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><td><?php echo ($v); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </fieldset>

</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

    <?php if(isset($detail['id'])): ?><script>
            layui.use('form', function(){
                var form = layui.form();
                form.on('submit(admin-form)', function(data){
                    $.ajax({
                        type: "POST",
                        url: '<?php echo U("edit");?>',
                        data: data.field,
                        success: function(msg){
                            if( msg.code == 1 ){
                                parent.location.reload();
                            }else{
                                parent.layer.msg(msg.msg, {
                                    icon: 5,
                                    shade: [0.6, '#393D49'],
                                    time:1500
                                });
                            }
                        }
                    });
                    return false;
                });

            });
        </script>
        <?php else: ?>
        <script>
            layui.use('form', function(){
                var form = layui.form();
                form.on('submit(admin-form)', function(data){
                    $.ajax({
                        type: "POST",
                        url: '<?php echo U("add");?>',
                        data: data.field,
                        success: function(msg){
                            if( msg.code == 1 ){
                                parent.location.reload();
                            }else{
                                parent.layer.msg(msg.msg, {
                                    icon: 5,
                                    shade: [0.6, '#393D49'],
                                    time:1500
                                });
                            }
                        }
                    });
                    return false;
                });

            });
        </script><?php endif; ?>

</body>
</html>