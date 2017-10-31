<?php defined('IN_IA') or exit('Access Denied');?>	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="platform">
			<input type="hidden" name="a" value="stat">
			<input type="hidden" name="do" value="rule">
			<input type="hidden" name="m" value=<?php  echo $_GPC['m'];?>>
			<input type="hidden" name="foo" value=<?php  echo $foo;?>>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">规则类型</label>
					<div class="col-sm-8 col-lg-9 col-xs-12">
						<div class="btn-group">
							<a href="<?php  echo filter_url('foo:hit');?>"  class="btn <?php  if($_GPC['foo'] == 'hit' || $_GPC['foo'] == '') { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">已触发规则</a>
							<a href="<?php  echo filter_url('foo:miss');?>"  class="btn <?php  if($_GPC['foo']== 'miss') { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">未触发规则</a>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">日期范围</label>
					<div class="col-sm-6 col-lg-8 col-xs-6">
						<?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d', $starttime),'endtime'=>date('Y-m-d', $endtime)));?>
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>