<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
			<input type="hidden" name="c" value="site">
			<input type="hidden" name="a" value="entry">
			<input type="hidden" name="m" value="custom">
			<input type="hidden" name="do" value="chatlog">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
			<input type="hidden" name="page" value="1" id="page">
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">粉丝昵称</label>
				<div class="col-sm-6 col-md-8 col-lg-8">
					<input type="text" class="form-control" name="nickname" id="nickname" placeholder="请输入粉丝昵称" value="<?php  echo $_GPC['nickname'];?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">粉丝openid</label>
				<div class="col-sm-6 col-md-8 col-lg-8">
					<input type="text" class="form-control" name="openid" id="openid" placeholder="请输入粉丝openid" value="<?php  echo $_GPC['openid'];?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">时间</label>
				<div class="col-sm-6 col-md-8 col-lg-8">
					<?php  echo tpl_form_field_date('starttime', $starttime, false)?>
					<div class="help-block">公众平台不支持跨日查询</div>
				</div>
				<div class="pull-right col-xs-12 col-sm-3 col-md-2 col-lg-2">
					<button class="btn btn-default" id="search"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
		</form>
	</div>
</div>
<style>
	.infol{margin-left:35px;padding:5px;max-width:60%;}
	.infor{margin-right:35px;padding:5px;max-width:60%;}
	.pull-left,.pull-right{position:relative;}
	.spanabsolute{position:absolute;top:50px;left:0;}
	.spanrabsolute{position:absolute;top:50px;right:10px;}
</style>
<div class="panel panel-default" style="margin-bottom:0">
	<div class="panel-heading">聊天记录</div>
	<div class="panel-body">
		<?php  if(is_error($logs)) { ?>
			<div class="text-center text-danger"><i class="fa fa-info-circle"></i> 搜索消息记录时出错，错误详情：<?php  echo $logs['message'];?></div>
		<?php  } else if(empty($logs['recordlist'])) { ?>
			<div class="text-center"><i class="fa fa-info-circle"> 没有符合条件的记录</i></div>
		<?php  } else { ?>
			<?php  if(is_array($logs['recordlist'])) { foreach($logs['recordlist'] as $log) { ?>
				<?php  if($log['opercode'] == 1000) { ?>
					<div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="pull-left">
							<img src="<?php  if(!empty($avatar)) { ?><?php  echo $avatar;?><?php  } else { ?>resource/images/noavatar_middle.gif<?php  } ?>" width="48"><br>
							<span class="spanabsolute"><?php  if(!empty($nickname)) { ?><?php  echo $nickname;?><?php  } else { ?><?php  echo $log['openid'];?><?php  } ?></span>
						</div>
						<div class="alert alert-info pull-left infol">
							<?php  echo $codedata[$log['opercode']];?><br>
							<small class="text-danger"><?php  echo date('m-d H:i:s', $log['time']);?> --- <?php  echo $codedata[$log['opercode']];?></small>
						</div>
						<div style="clear:both"></div>
					</div>
				<?php  } else if($log['opercode'] == 1001) { ?>
				<div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="pull-right">
						<img src="resource/images/noavatar_middle.gif" width="48"><br>
						<span class="spanrabsolute"><?php  echo $log['worker'];?></span>
					</div>
					<div class="alert alert-danger pull-right infor">
						<?php  echo $codedata[$log['opercode']];?> <br>
						<small class="text-danger"><?php  echo date('m-d H:i:s', $log['time']);?> --- <?php  echo $codedata[$log['opercode']];?></small>
					</div>
				</div>
				<?php  } else if($log['opercode'] == 1002) { ?>
				<div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="pull-right">
						<img src="resource/images/noavatar_middle.gif" width="48"><br>
						<span class="spanrabsolute"><?php  echo $log['worker'];?></span>
					</div>
					<div class="alert alert-danger pull-right infor">
						<?php  echo $log['text'];?><br>
						<small class="text-danger"><?php  echo date('m-d H:i:s', $log['time']);?> --- <?php  echo $codedata[$log['opercode']];?></small>
					</div>
				</div>
				<?php  } else if($log['opercode'] == 1004) { ?>
				<div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="pull-right">
						<img src="resource/images/noavatar_middle.gif" width="48"><br>
						<span class="spanrabsolute"><?php  echo $log['worker'];?></span>
					</div>
					<div class="alert alert-danger pull-right infor">
						<?php  echo $codedata[$log['opercode']];?><br>
						<small class="text-danger"><?php  echo date('m-d H:i:s', $log['time']);?> --- <?php  echo $codedata[$log['opercode']];?></small>
					</div>
				</div>
				<?php  } else if($log['opercode'] == 1005) { ?>
				<div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="pull-right">
						<img src="resource/images/noavatar_middle.gif" width="48"><br>
						<span class="spanrabsolute"><?php  echo $log['worker'];?></span>
					</div>
					<div class="alert alert-danger pull-right infor">
						<?php  echo $codedata[$log['opercode']];?><br>
						<small class="text-danger"><?php  echo date('m-d H:i:s', $log['time']);?> --- <?php  echo $codedata[$log['opercode']];?></small>
					</div>
				</div>
				<?php  } else if($log['opercode'] == 2001) { ?>
				<div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="pull-left">
						<img src="<?php  if(!empty($avatar)) { ?><?php  echo $avatar;?><?php  } else { ?>resource/images/noavatar_middle.gif<?php  } ?>" width="48"><br>
						<span class="spanabsolute"><?php  if(!empty($nickname)) { ?><?php  echo $nickname;?><?php  } else { ?><?php  echo $log['openid'];?><?php  } ?></span>
					</div>
					<div class="alert alert-info pull-left infol">
						<?php  echo $log['text'];?><br>
						<small class="text-danger"><?php  echo date('m-d H:i:s', $log['time']);?> --- <?php  echo $codedata[$log['opercode']];?></small>
					</div>
				</div>
				<?php  } else if($log['opercode'] == 2002) { ?>
				<div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="pull-right">
						<img src="resource/images/noavatar_middle.gif" width="48"><br>
						<span class="spanrabsolute"><?php  echo $log['worker'];?></span>
					</div>
					<div class="alert alert-danger pull-right infor">
						<?php  echo $log['text'];?><br>
						<small class="text-danger"><?php  echo date('m-d H:i:s', $log['time']);?> --- <?php  echo $codedata[$log['opercode']];?></small>
					</div>
				</div>
				<?php  } else if($log['opercode'] == 2003) { ?>
				<div class="pull-left col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="pull-left">
						<img src="<?php  if(!empty($avatar)) { ?><?php  echo $avatar;?><?php  } else { ?>resource/images/noavatar_middle.gif<?php  } ?>" width="48"><br>
						<span class="spanabsolute"><?php  if(!empty($nickname)) { ?><?php  echo $nickname;?><?php  } else { ?><?php  echo $log['openid'];?><?php  } ?></span>
					</div>
					<div class="alert alert-info pull-left infol">
						<?php  echo $log['text'];?><br>
						<small class="text-danger"><?php  echo date('m-d H:i:s', $log['time']);?> --- <?php  echo $codedata[$log['opercode']];?></small>
					</div>
				</div>
				<?php  } ?>
			<?php  } } ?>
		<?php  } ?>
	</div>
</div>
<form class="form-horizontal" role="form" style="margin-top:10px">
	<div class="form-group">
		<div class="col-sm-12">
			<?php  if($pindex > 1) { ?>
				<a href="javascript:;" onclick="$('#page').val($(this).attr('page'));$('#form1').submit();return;" id="prev" page="<?php  echo ($pindex - 1)?>"  class="btn btn-default"><i class="fa fa-angle-double-left"></i></a>
			<?php  } ?>
			<?php  if(!empty($next)) { ?>
				<a href="javascript:;" onclick="$('#page').val($(this).attr('page'));$('#form1').submit();return;" id="next" page="<?php  echo ($pindex + 1)?>"class="btn btn-primary"><i class="fa fa-angle-double-right"></i></a>
			<?php  } ?>
		</div>
	</div>
</form>
<script>
	require(['util'], function(u) {
		$('#form1').submit(function(){
			var nickname = $('#nickname').val().trim();
			var openid = $('#openid').val().trim();
			var starttime = $('input[name="starttime"]').val();
			if(nickname == '' && openid == '') {
				u.message('粉丝openid和粉丝昵称必须填写一项');
				return false;
			}
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>