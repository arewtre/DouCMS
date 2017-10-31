<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	.label{line-height: 2}
	.popover{max-width:420px;}
</style>
<ul class="nav nav-tabs">
	<li <?php  if($_GPC['a'] == 'mass'  && $do == 'list') { ?>class="active"<?php  } ?>><a href="<?php  echo url('material/mass/')?>">定时群发</a></li>
	<li <?php  if($_GPC['a'] == 'mass' && $do == 'send') { ?>class="active"<?php  } ?>><a href="<?php  echo url('material/mass/send')?>">发送记录</a></li>
	<li <?php  if($type == 'image') { ?>class="active"<?php  } ?>><a href="<?php  echo url('material/display/list', array('type' => 'image'));?>">图片</a></li>
	<li <?php  if($type == 'voice') { ?>class="active"<?php  } ?>><a href="<?php  echo url('material/display/list', array('type' => 'voice'));?>">语音</a></li>
	<li <?php  if($type == 'video') { ?>class="active"<?php  } ?>><a href="<?php  echo url('material/display/list', array('type' => 'video'));?>">视频</a></li>
	<li <?php  if($type == 'news') { ?>class="active"<?php  } ?>><a href="<?php  echo url('material/display/list', array('type' => 'news'));?>">图文</a></li>
	<li <?php  if($action == 'post' && $do == 'news') { ?>class="active"<?php  } ?>><a href="<?php  echo url('material/post/edit');?>">新增图文素材</a></li>
</ul>

<v class="clearfix">
	<form action="?<?php  echo $_SERVER['QUERY_STRING'];?>" method="post" id="form1">
		<div class="panel panel-default">
			<div class="panel-body table-responsive">
				<table class="table table-hover" cellspacing="0" cellpadding="0">
					<thead class="navbar-inner">
					<tr>
						<th>消息详情</th>
						<th>发送用户组</th>
						<th>发送人数</th>
						<th>状态</th>
						<th width="250">发送时间</th>
						<th>添加时间</th>
						<th width="170"></th>
					</tr>
					</thead>
					<tbody>
					<?php  if(is_array($list)) { foreach($list as $li) { ?>
					<tr>
						<td>
							<?php  if($li['msgtype'] == 'wxcard') { ?>
								<a href="<?php  echo url('wechat/card/display');?>" target="_blank"><?php  echo $types[$li['msgtype']];?></a>
							<?php  } else { ?>
								<a href="<?php  echo url('material/display/list', array('type' => $li['msgtype'], 'id' => $li['attach_id']));?>" target="_blank"><?php  echo $types[$li['msgtype']];?></a>
							<?php  } ?>
						</td>
						<td><?php  echo $li['groupname'];?></td>
						<td><?php  if($li['groupid'] == '-1') { ?>全部粉丝<?php  } else { ?><?php  echo $li['fansnum'];?><?php  } ?></td>
						<td>
							<?php  if(!$li['status']) { ?>
								<span class="label label-success">已发送</span>
							<?php  } else if($li['status'] == 1) { ?>
								<span class="label label-warning">未发送</span>
							<?php  } else if($li['status'] == 2) { ?>
								<span class="label label-danger">发送失败</span>
							<?php  } ?>
						</td>
						<td>
							<?php  if(!$li['type']) { ?>
								<?php  echo date('Y-m-d H:i:s', $li['createtime']);?>
							<?php  } else { ?>
								<span class="label label-info">计划发送时间:<?php  echo date('Y-m-d H:i', $li['sendtime']);?></span> <br>
								<?php  if(!$li['status']) { ?>
									<span class="label label-success">实际发送时间:<?php  echo date('Y-m-d H:i', $li['finalsendtime']);?></span>
								<?php  } else if($li['status'] == 2) { ?>
									<span class="label label-danger">实际发送时间:<?php  echo date('Y-m-d H:i', $li['finalsendtime']);?></span>
								<?php  } ?>
							<?php  } ?>
						</td>
						<td><?php  echo date('Y-m-d H:i', $li['createtime']);?></td>
						<td align="right">
							<?php  if($li['type'] == 1) { ?>
								<?php  if(!$li['cron_id'] && $li['sendtime'] > TIMESTAMP) { ?>
								<a href="<?php  echo url('material/mass/cron', array('id' => $li['id']));?>" class="btn btn-danger btn-sm">同步到云服务</a>
								<?php  } ?>
								<a href="javascript:;" title="" data-tid="<?php  echo $li['id'];?>" data-type="mass" data-module="task" class="btn btn-default mass-log">日志</a>
							<?php  } ?>
						</td>
					</tr>
					<?php  } } ?>
					</tbody>
				</table>
			</div>
		</div>
	</form>
</div>

<script>
	require(['bootstrap'], function(){
		$('.tip').hover(function(){
			$(this).tooltip();
		});
		$('.mass-log').hover(function(){
			obj = $(this);
			$.post("<?php  echo url('utility/cron/log');?>", {tid: $(this).data('tid'), type: $(this).data('type'), module: $(this).data('module')}, function(data) {
				data = $.parseJSON(data);
				var html = '';
				if(data.message.items.length == 0) {
					html = '<tr><td class="text-center"><i class="fa fa-info-circle"></i> 暂无数据</td></tr>';
				} else{
					$.each(data.message.items, function(k, v){
						html += '<tr><td>' + v.createtime + ' ' + v.note + '</td></tr>';
					});
				}
				obj.popover({
					'html':true,
					'placement':'left',
					'trigger':'manual',
					'title':'触发日志',
					'content':'<table class="table-cron table">' + html + '</table>'
				});
				obj.popover('toggle');
			});
		}, function(){
			$(this).popover('toggle');
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>