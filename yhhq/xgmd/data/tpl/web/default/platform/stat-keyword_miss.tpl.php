<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
	<div class="clearfix">
	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('platform/stat-keyword_search', TEMPLATE_INCLUDEPATH)) : (include template('platform/stat-keyword_search', TEMPLATE_INCLUDEPATH));?>
		<h4 class="sub-title">详细数据</h4>
		<form action="" method="post" onsubmit="">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="navbar-inner">
					<tr>
						<th style="width:150px;">关键字<i></i></th>
						<th>规则<i></i></th>
						<th style="width:160px;">模块<i></i></th>
						<th style="width:100px;">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td><?php  echo $row['content'];?></td>
						<td class="row-hover">
							<?php  if(empty($row['rid'])) { ?>
								N/A
							<?php  } else { ?>
								<a target="main" href="<?php  echo $rules[$row['rid']]['url'];?>"><?php  echo $rules[$row['rid']]['name'];?></a>
							<?php  } ?>
						</td>
						
						<td><?php  if($rules[$row['rid']]['module']) { ?><?php  echo $rules[$row['rid']]['module'];?><?php  } else { ?>default<?php  } ?></td>
						<td>
							<a target="main" href="<?php  echo url('platform/stat/trend', array('id' => $row['rid']))?>" title="使用率走势">使用率走势</a>
						</td>
					</tr>
					<?php  } } ?>
				</tbody>
			</table>
		</div>
		</form>
		<?php  echo $pager;?>
	</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
