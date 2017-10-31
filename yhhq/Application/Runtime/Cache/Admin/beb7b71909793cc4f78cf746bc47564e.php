<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo C('APP_NAME');?>管理后台</title>
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
    
    <fieldset class="layui-elem-field">
        <legend>权限管理 - 权限组细节配置</legend>
        <div class="layui-field-box">
            <form class="layui-form" action="">
                <input type="hidden" name="groupId" value="<?php echo I('get.group_id');?>">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="layui-form-item">
                        <input lay-skin="primary" type="checkbox" lay-filter="admin-check" name="rule[<?php echo ($vo['pid']); ?>]" value="<?php echo ($vo['href']); ?>" title="<?php echo ($vo['title']); ?>" <?php echo (in_array($vo['href'], $hasRule)?'checked':'');?>>
                    </div>
                    <?php if(count($vo['_child'])): if(is_array($vo['_child'])): $i = 0; $__LIST__ = $vo['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><div class="layui-form-item">
                            <div style="margin-left: 50px;">
                                <input  lay-skin="primary" type="checkbox" lay-filter="admin-check" fid="<?php echo ($vo['href']); ?>" name="rule[<?php echo ($child['pid']); ?>]" value="<?php echo ($child['href']); ?>" title="<?php echo ($child['title']); ?>" <?php echo (in_array($child['href'], $hasRule)?'checked':'');?>>                                                         
                            </div>
                        </div>
                       <?php if(count($child['_child'])): if(is_array($child['_child'])): $i = 0; $__LIST__ = $child['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_child): $mod = ($i % 2 );++$i;?><div class="layui-form-item">
	                            <div style="margin-left: 100px;">
	                                <input  lay-skin="primary" type="checkbox" lay-filter="admin-check" pid="<?php echo ($vo['href']); ?>" fid="<?php echo ($child['href']); ?>" name="rule[<?php echo ($_child['pid']); ?>]" value="<?php echo ($_child['href']); ?>" title="<?php echo ($_child['title']); ?>" <?php echo (in_array($_child['href'], $hasRule)?'checked':'');?>>                                                         
	                            </div>
	                        </div>
	                         <?php if(count($_child['_child'])): ?><div class="layui-form-item">
		                            <div style="margin-left: 150px;">
	                            		<?php if(is_array($_child['_child'])): foreach($_child['_child'] as $key=>$_child2): ?><input  lay-skin="primary" type="checkbox" lay-filter="admin-check" mid="<?php echo ($vo['href']); ?>" pid="<?php echo ($child['href']); ?>" fid="<?php echo ($_child['href']); ?>" name="rule[<?php echo ($_child2['pid']); ?>]" value="<?php echo ($_child2['href']); ?>" title="<?php echo ($_child2['title']); ?>" <?php echo (in_array($_child2['href'], $hasRule)?'checked':'');?>><?php endforeach; endif; ?>
		                            </div>
		                        </div><?php endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit lay-filter="admin-form">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </form>
        </div>
    </fieldset>

</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

    <script>
        layui.use('form', function(){
            var form = layui.form();
            form.on('checkbox(admin-check)', function(data){
                var $el = data.elem;
                if( $el.checked ){
                    $('input[fid="'+$el.value+'"]').prop('checked','checked');
                    $('input[pid="'+$el.value+'"]').prop('checked','checked');
                    $('input[mid="'+$el.value+'"]').prop('checked','checked');
                }else{
                    $('input[fid="'+$el.value+'"]').prop('checked', false);
                    $('input[pid="'+$el.value+'"]').prop('checked', false);
                    $('input[mid="'+$el.value+'"]').prop('checked', false);
                }
                form.render();
            });
            
            function checkAll(obj){
        	    $(obj).parents('.b-group').eq(0).find("input[type='checkbox']").prop('checked', $(obj).prop('checked'));
        	}
            form.on('submit(admin-form)', function(data){
                $.ajax({
                    type: "POST",
                    url: '<?php echo U("rule");?>',
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

</body>
</html>