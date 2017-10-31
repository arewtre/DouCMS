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
        <legend>用户管理 - 用户列表</legend>
        <div class="layui-field-box">
            <span class="layui-btn layui-btn-normal api-add"><i class="layui-icon">&#xe608;</i> 新增</span>
            <table class="layui-table" lay-even>
                <thead>
                <tr>
                    <th>#</th>
                    <th>头像</th>
                    <th>用户账号</th>
                    <th>用户昵称</th>
                    <th>登录次数</th>
                    <th>最后登录时间</th>
                    <th>最后登录IP</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($i); ?></td>
                        <td>
                            <?php if($vo['image'] != ''): ?><img style="width:100%"src="/yhhq/Public/upload/<?php echo ($vo['image']); ?>">
                            <?php else: ?>
                                <img style="width:100%"src="/yhhq/Public/images/face.jpg"><?php endif; ?>
                        </td>
                        <td><?php echo ($vo['username']); ?></td>
                        <td><?php echo ($vo['nickname']); ?></td>
                        <td><?php echo intval($vo['loginTimes']);?></td>
                        <td><?php echo (empty($vo['lastLoginTime'])?'该用户未曾登录过':$vo['lastLoginTime']);?></td>
                        <td><?php echo (empty($vo['lastLoginIp'])?'该用户未曾登录过':$vo['lastLoginIp']);?></td>
                        <td>
                            <?php if($vo['status']): ?><span style="border-radius: 2px;background-color: #5FB878;padding:5px 10px;color: #ffffff">启用</span>
                                <?php else: ?>
                                <span style="border-radius: 2px;background-color: #FF5722;padding:5px 10px;color: #ffffff">禁用</span><?php endif; ?>
                        </td>
                        <td>
                            <?php if($vo['status']): ?><span class="layui-btn layui-btn-danger layui-btn-small confirm" data-info="你确定禁用当前用户么？" data-id="<?php echo ($vo['id']); ?>" data-url="<?php echo U('close');?>">禁用</span>
                                <?php else: ?>
                                <span class="layui-btn layui-btn-small confirm" data-info="你确定启用当前用户么？" data-id="<?php echo ($vo['id']); ?>" data-url="<?php echo U('open');?>">启用</span><?php endif; ?>
                            <span data-url="<?php echo U('Permission/group', array('uid' => $vo['id']));?>" class="layui-btn auth layui-btn-small">授权</span>
                            <span data-url="<?php echo U('edit', array('id' => $vo['id']));?>" class="layui-btn edit layui-btn-small">编辑</span>
                            <span class="layui-btn layui-btn-danger layui-btn-small confirm" data-id="<?php echo ($vo['id']); ?>" data-info="你确定删除当前菜单么？" data-url="<?php echo U('del');?>">删除</span>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div id="page"></div>
        </div>

    </fieldset>

</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

    <script>
    
        layui.use(['layer','laypage'], function() {
        	laypage = layui.laypage;//分页
            //以上模块根据需要引入
            laypage({
        	        cont : $('#page'),
        	        pages : "<?php echo ($count); ?>",
        	        curr : "<?php echo ($pageindex); ?>",
        	        skip : true,
        	        jump : function(obj, first) {
        	            if (!first)
        	                window.location.href = "<?php echo U('User/index');?>&page="+ obj.curr ;		
        	        }
        	    });
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