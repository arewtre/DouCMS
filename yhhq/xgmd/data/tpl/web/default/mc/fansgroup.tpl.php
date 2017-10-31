<?php defined('IN_IA') or exit('Access Denied');?><?php  $newUI = true;?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{white-space:nowrap;}
</style>
<ul class="nav nav-tabs">
	<li <?php  if($do == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo url('mc/fangroup/display');?>">粉丝分组</a></li>
</ul>
<?php  if($do == 'display') { ?>
<div class="clearfix">
<form action="<?php  echo url('mc/fangroup/post');?>" method="post" id="form2">
	<input type="hidden" name="acid" value="<?php  echo $acid;?>">
	<div class="panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover" ng-controller="advAPI" style="width:100%;" cellspacing="0" cellpadding="0">
			<thead class="navbar-inner">
				<tr>
					<th width="20%">分组名称</th>
					<th width="20%"></th>
					<th width="20%">分组id</th>
					<th width="20%">分组内用户数量</th>
					<th width="20%">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(!empty($groups)) { ?>
					<?php  if(is_array($groups)) { foreach($groups as $item) { ?>
						<tr>
							<input type="hidden" name="groupid[]" value="<?php  echo $item['id'];?>">
							<input type="hidden" name="count[]" value="<?php  echo $item['count'];?>">
							<td><input type="text" class="form-control" style="width:250px;" name="groupname[]" value="<?php  echo $item['name'];?>" <?php  if(in_array($item['id'], array(0, 1, 2))) { ?>readonly<?php  } ?>></td>
							<td class="text-left"><?php  if(in_array($item['id'], array(0, 1, 2))) { ?><span class="label label-danger">系统分组,不能修改</span><?php  } ?></td>
							<td><?php  echo $item['id'];?></td>
							<td><?php  echo $item['count'];?></td>
							<td>
								<?php  if(!in_array($item['id'], array(0, 1, 2))) { ?>
									<a href="javascript:;" class="btn btn-danger del-group" data-id="<?php  echo $item['id'];?>">删除分组</a>
								<?php  } ?>
							</td>
						</tr>
					<?php  } } ?>
					<tr id="position">
						<td colspan="5"><a href="javascript:;" id="addgroup"><i class="fa fa-plus-circle"></i> 添加新分组</a></td>
					</tr>
					<tr>
						<td colspan="5">
							<input type="submit" class="btn btn-primary span2" name="submit" value="保存" /> &nbsp;
						</td>
					</tr>
				<?php  } ?>
			</tbody>
		</table>
	</div>
	</div>
</form>
</div>
<script>
	$('#addgroup').click(function(){
		var html = '<tr>' +
						'<td colspan="5">' +
					        '<input type="text" class="form-control" style="width:250px;display:inline-block" name="group_add[]" value="" placeholder="请填写分组名称">' +
							' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="$(this).parent().parent().remove()"><i class="fa fa-times-circle"></i></a>' +
						'</td>' +
					'</tr>';

		$('#position').before(html);
	});

	$('.del-group').click(function(){
		if(!confirm('删除分组后，所有该分组内的用户自动进入默认分组，确定删除该分组吗')) {
			return false;
		}
		var id = parseInt($(this).attr('data-id'));
		$.post("<?php  echo url('mc/fangroup/del');?>", {'id':id}, function(data){
			var data = $.parseJSON(data);
			if(data.errno < 0) {
				util.message(data.message, '', 'error');
				return false;
			} else {
				location.reload();
			}
		});
	});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
