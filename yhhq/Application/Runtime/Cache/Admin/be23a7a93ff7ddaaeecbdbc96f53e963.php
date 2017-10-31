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
        <legend>数据库管理 </legend>        
        <div class="layui-tab layui-tab-card">
			<ul class="layui-tab-title">
				<li class="layui-this">数据库备份</li>
				<li>数据库表</li>
			</ul>
			<div class="layui-tab-content">
				<div class="layui-tab-item layui-show">
				    <div class="layui-field-box">
			            <span class="layui-btn layui-btn-normal api-add" data-msg="备份" data-href="<?php echo U('Bak/index',array('Action'=>'backup'));?>"><i class="layui-icon">&#xe608;</i> 新建备份</span>
			            <table class="layui-table" lay-even>
			                <thead>
			                <tr>
			                    <th>序号</th>
			                    <th>文件名</th>
			                    <th>备份时间</th>
			                    <th>文件大小</th>
			                    <th>操作</th>
			                </tr>
			                </thead>
			                <tbody>
			                <?php if(!empty($lists)): if(is_array($lists)): foreach($lists as $key=>$row): if($key > 1): ?><tr>
			                                <td><?php echo ($key-1); ?></td>
			                                <td style="text-align: left"><a href="<?php echo U('Bak/index',array('Action'=>'download','file'=>$row));?>"><?php echo ($row); ?></a></td>
			                                <td><?php echo (getfiletime($row,$datadir)); ?></td>
			                                <td><?php echo (getfilesize($row,$datadir)); ?></td>
			                                <td>
			                                    <span class="layui-btn layui-btn-normal bak" data-msg="下载" data-href="<?php echo U('Bak/index',array('Action'=>'download','file'=>$row));?>">下载</span>
			                                    <span class="layui-btn bak" data-msg="还原备份" data-href="<?php echo U('Bak/index',array('Action'=>'RL','File'=>$row));?>">还原</span>
			                                    <span class="layui-btn layui-btn-danger bak" data-msg="删除" data-href="<?php echo U('Bak/index',array('Action'=>'Del','File'=>$row));?>">删除</span>
			                                </td>
			                            </tr><?php endif; endforeach; endif; ?>
			                    <?php else: ?>
			                    <tr>
			                        <td colspan="7">没有找到相关数据。</td>
			                    </tr><?php endif; ?>
			                </tbody>
			            </table>
			        </div>				
				</div>
				<div class="layui-tab-item">
					<div class="layui-field-box">
			            <span class="layui-btn layui-btn-normal add"><i class="layui-icon">&#xe608;</i> 新建表</span>
			            <table class="layui-table" lay-even>
			                <thead>
			                <tr>
			                    <th>序号</th>
			                    <th>表名称</th>
			                    <th>字段数</th>
			                    <th>数据(条)</th>
			                    <th>操作</th>
			                </tr>
			                </thead>
			                <tbody>
			                <?php if(!empty($tables)): if(is_array($tables)): foreach($tables as $key=>$row): if($key > 1): ?><tr>
			                                <td><?php echo ($key-1); ?></td>
			                                <td><?php echo ($row['table_name']); ?></td>
			                                <td><?php echo ($row['zdnum'][0]['count(*)']); ?></td>
			                                <td><?php echo ($row['table_rows']); ?></td>
			                                <td>
			                                    <span class="layui-btn layui-btn-normal edit" data-url="<?php echo U('edit', array('tablename' => $row['table_name']));?>">查看</span>
			                                    <span class="layui-btn layui-btn-danger del"  data-url="<?php echo U('del', array('tablename' => $row['table_name']));?>">删除</span>
			                                </td>
			                            </tr><?php endif; endforeach; endif; ?>
			                    <?php else: ?>
			                    <tr>
			                        <td colspan="7">没有找到相关数据。</td>
			                    </tr><?php endif; ?>
			                </tbody>
			            </table>
			        </div>
				</div>
			</div>
		</div>                
    </fieldset>

</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

    <script>
        layui.use(['layer','laypage','element'], function() {
            $('.api-add').on('click', function () {
            	var ownObj = $(this);
                $.ajax({
                    type: "POST",
                    url: ownObj.attr('data-href'),
                    data: {id:ownObj.attr('data-id')},
                    success: function(msg){
                        if( msg.code == 1 ){
                            location.reload();
                        }else{
                            layer.msg(msg.msg, {
                                icon: 1,
                                shade: [0.6, '#393D49'],
                                time:1500
                            });
                        }
                    }
                });
            });
            
            $('.add').on('click', function () {
                layer.open({
                    type: 2,
                    area: ['60%', '90%'],
                    maxmin: true,
                    content: '<?php echo U("add");?>'
                });
            });
            $('.edit').on('click', function () {
                var ownObj = $(this);
                layer.open({
                    type: 2,
                    area: ['100%', '100%'],
                    maxmin: true,
                    content: ownObj.attr('data-url')
                });
            });
            $('.bak').on('click', function () {
                var ownObj = $(this);
                layer.confirm(ownObj.attr('data-info'), {
                	title:"提示",
                	content: "您确定要" + ownObj.attr('data-msg') + "吗?",
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.ajax({
                        type: "POST",
                        url: ownObj.attr('data-href'),
                        data: {id:ownObj.attr('data-id')},
                        success: function(msg){
                            if( msg.code == 0 ){
                                location.reload();
                            }else{
                                layer.msg(msg.msg, {
                                    icon: 1,
                                    shade: [0.6, '#393D49'],
                                    time:1500
                                });
                                ownObj.parent().parent().remove();
                            }
                        }
                    });
                });
            });
        });
    </script>

</body>
</html>