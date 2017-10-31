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
    
<div style="margin: 15px;">
    <blockquote class="layui-elem-quote">
        <div class="layui-btn layui-btn-small add">
            <i class="fa fa-plus"></i>&nbsp;&nbsp;添加友链
        </div>
    </blockquote>
    <fieldset class="layui-elem-field">
        <legend>友情链接</legend>
        <div class="layui-field-box table-responsive">
            <table class="layui-table table-hover">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>链接名称</th>
                    <th>链接URL</th>
                    <th>添加时间</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <!--内容容器-->
                <tbody id="con">
                <?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="a_<?php echo ($v["link_id"]); ?>">
                    <td><?php echo ($v["link_id"]); ?></td>
                    <td><?php echo ($v["link_name"]); ?></td>
                    <td><a href="<?php echo ($v["link_url"]); ?>" target="_blank"><?php echo ($v["link_url"]); ?></a></td>
                    <td><?php echo date('Y-m-d H:i:s',$v['addtime']);?></td>
                    <td><?php echo ($v["link_sort"]); ?></td>
                    <td>
                        <?php if($v["status"] == 1): ?><a class="red" href="javascript:;" onclick="return stateyes('<?php echo ($v["link_id"]); ?>');" title="已开启">
                            <div id="zt<?php echo ($v["link_id"]); ?>">
                                <button class="layui-btn layui-btn-warm layui-btn-mini">状态开启</button>
                            </div>
                        </a>
                        <?php else: ?>
                        <a class="red" href="javascript:;" onclick="return stateyes('<?php echo ($v["link_id"]); ?>');" title="已禁用">
                            <div id="zt<?php echo ($v["link_id"]); ?>">
                                <button class="layui-btn layui-btn-danger layui-btn-mini">状态禁用</button>
                            </div>
                        </a><?php endif; ?>
                    </td>
                    <td>
                        <span data-id="<?php echo ($v["link_id"]); ?>" class="layui-btn layui-btn-mini edit">编辑</span>
                        <span onclick="return del('<?php echo ($v["link_id"]); ?>')" class="layui-btn layui-btn-mini layui-btn-danger">删除</span>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div id="page"></div>
        </div>
    </fieldset>
</div>
<script>
    layui.use(['form', 'layer','laypage'], function() {
        var form = layui.form(), layer = layui.layer;
    	laypage = layui.laypage;//分页
        //以上模块根据需要引入
        laypage({
    	        cont : $('#page'),
    	        pages : "<?php echo ($count); ?>",
    	        curr : "<?php echo ($pageindex); ?>",
    	        skip : true,
    	        jump : function(obj, first) {
    	            if (!first)
    	                window.location.href = "<?php echo U('Link/index');?>&page="+ obj.curr ;		
    	        }
    	    });
    });
    function stateyes(id) {
        $.post('<?php echo U("linkState");?>', {id: id}, function (data) {
            if (data.status) {
                if (data.info == '状态禁止') {
                    var a = '<button class="layui-btn layui-btn-danger layui-btn-mini">状态禁用</button>'
                    $('#zt' + id).html(a);
                    layer.msg(data.info, {icon: 5});
                    return false;
                } else {
                    var b = '<button class="layui-btn layui-btn-warm layui-btn-mini">状态开启</button>'
                    $('#zt' + id).html(b);
                    layer.msg(data.info, {icon: 6});
                    return false;
                }
            }
        });
        return false;
    }
    
    $('.add').on('click', function () {
        layer.open({
            type: 2,
            area: ['60%', '60%'],
            maxmin: true,
            content: "<?php echo U('add');?>",
        });
    });
    
    $('.edit').on('click', function () {
        var id = $(this).attr("data-id");
    	layer.open({
            type: 2,
            area: ['60%', '60%'],
            maxmin: true,
            content: "<?php echo U('Admin/Link/edit/id/" + id + "');?>",
        });
    }); 

    function del(id) {
        layer.confirm('你确定要删除吗？', {icon: 3}, function (index) {
            //layer.close(index);
            //window.location.href = "<?php echo U('del');?>?id=" + id;
            $.ajax({
                type: "POST",
                url: '<?php echo U("del");?>',
                data: {id:id},
                success: function(msg){
                    if( msg.code == 1 ){
                        //parent.location.reload();
                        $(".a_"+id).remove();
                        layer.close(index);
                    }else{
                        parent.layer.msg(msg.msg, {
                            icon: 5,
                            shade: [0.6, '#393D49'],
                            time:1500
                        });
                    }
                }
            });
        });
    }
</script>

</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

</body>
</html>