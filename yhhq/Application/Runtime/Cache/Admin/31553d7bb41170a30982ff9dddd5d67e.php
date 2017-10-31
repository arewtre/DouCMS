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
    
    <fieldset class="layui-elem-field">
        <legend>菜单管理 - <?php echo (isset($detail['pid'])?'编辑':'新增');?>菜单</legend>
        <div class="layui-field-box">
            <form class="layui-form" action="">
                <?php if(isset($detail['pid'])): ?><input type="hidden" name="pid" value="<?php echo ($detail['pid']); ?>"><?php endif; ?>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color:red">*</span> 菜单名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" required value="<?php echo (isset($detail['title'])?$detail['title']:'');?>" lay-verify="required" placeholder="请输入菜单名称" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color:red">*</span> 父级菜单</label>
                    <div class="layui-input-block">
                        <select name="parentid" lay-verify="">
                            <option value="0">顶级菜单</option>
                            <?php if(is_array($options)): $i = 0; $__LIST__ = $options;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["pid"]); ?>" <?php echo ($detail['pid'] == $vo['pid']?'disabled':''); echo ($parentid == $vo['pid']?'selected':''); echo ($detail['parentid'] == $vo['pid']?'selected':'');?>><?php echo ($vo['showName']); echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span style="color:red">*</span> 是否显示</label>
                    <div class="layui-input-block">
                        <input type="checkbox" style="width:50px" name="is_display" lay-skin="switch" lay-text="是|否" <?php echo ((isset($detail['is_display']) && $detail['is_display']==0)?'':'checked');?>>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">菜单URL</label>
                    <div class="layui-input-block">
                        <input type="text" name="href" value="<?php echo (isset($detail['href'])?$detail['href']:'');?>" placeholder="请输入菜单URL 例:Admin/Index/index" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">菜单排序</label>
                    <div class="layui-input-block">
                        <input type="text" name="displayorder" value="<?php echo (isset($detail['displayorder'])?$detail['displayorder']:'');?>" placeholder="请输入正整数，越大排名越靠前" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">菜单图标</label>
                    <div class="layui-input-inline">
                        <input type="text" name="icon" placeholder="请选择图标" value="<?php echo (isset($detail['icon'])?$detail['icon']:'');?>"  class="icon layui-input">
                    </div>
                    <div class="layui-input-inline">
                    	<span class="tub layui-btn layui-btn-small">选择layui图标</span>
                    </div>
                    <div class="layui-input-inline">
                    	<span class="tub2 layui-btn layui-btn-small">选择fontawesome图标</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="admin-form">立即提交</button>
                        <!--<button type="reset" class="layui-btn layui-btn-primary">重置</button>-->
                    </div>
                </div>
            </form>
        </div>
    </fieldset>

</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

<script>
layui.use(['layer'], function() {
    $('.tub').on('click', function () {
        layer.open({
            type: 2,
            area: ['100%', '100%'],
            maxmin: true,
            content: '<?php echo U("tub");?>'
        });
    });
    $('.tub2').on('click', function () {
        layer.open({
            type: 2,
            area: ['100%', '100%'],
            maxmin: true,
            content: '<?php echo U("tub2");?>'
        });
    });
}); 

function tubiao1(icon){
    $(".icon").val("&#"+icon+";");
}

function tubiao2(icon){
    $(".icon").val(icon);
}

</script>
    <?php if(isset($detail['pid'])): ?><script>
            layui.use('form', function(){
                var form = layui.form();
                form.on('submit(admin-form)', function(data){
                	//console.log(data);return;
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