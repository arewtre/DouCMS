<?php defined('IN_IA') or exit('Access Denied');?><?php  $newUI = true;?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo url('platform/special/message');?>">特殊消息类型处理</a></li>
</ul>

<div class="clearfix">
	<form action="" method="post" class="form-horizontal" role="form">
		<div class="panel panel-default">
			<div class="panel-heading">
				特殊类型消息
			</div>
			<div class="panel-body">
				<input type="hidden" name="id" value="<?php  echo $rule['rule']['id'];?>">
				<div class="form-group">
					<label for="" class="col-xs-12 col-sm-3 col-md-2 control-label">说明信息</label>
					<div class="col-xs-12 col-sm-9 col-md-10 col-lg-21">
						<div class="alert alert-info" style="width:auto;">
							<p><b>文本以外的消息类型, 计算机很难自行理解. 因此除文本外的其他消息类型, 如果没有文本对话来确定对话语境, 将会将其分配至默认模块</b></p>
							<p>文本以外的消息类型, 没有语境很难确定其行为方式. 比如: 没有任何对话, 直接发送过来一张图片或者音频, 我们很难根据图片或者音频来判断对方的目的. 针对这种情况, 系统将这里的扩展操作交给第三方模块来实现. 例如: 对方发送过来一张图片, 并且不再任何对话上下文中, 我们会把这张图片的消息交给能够处理图片消息的默认模块中.</p>
							<p>注意: 这里的操作不会影响对话中的图片或者其他消息. (比如: 我们要求对方发送一张图片来作为头像之后, 对方发送了一张图片, 这样使用对话上下文处理时是不影响的. 这里的处理仅针对没有语境, 没有对话上下文的直接图片或其他类型消息.)</p>
						</div>
					</div>
				</div>
				<?php  if(is_array($ds)) { foreach($ds as $row) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><?php  echo $row['title'];?></label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<label class="radio-inline">
							<input type="radio" <?php  if($setting[$row['type']]['type'] == 'module') { ?>checked<?php  } ?> value="module" name="setting[<?php  echo $row['type'];?>][type]" onclick="$(this).parent().parent().parent().next().show();$(this).parent().parent().parent().next().next().hide();" autocomplete="off" />模块
						</label>
						<label class="radio-inline">
							<input type="radio" <?php  if($setting[$row['type']]['type'] == 'keyword' || empty($setting[$row['type']]['type'])) { ?>checked<?php  } ?> value="keyword" name="setting[<?php  echo $row['type'];?>][type]" onclick="$(this).parent().parent().parent().next().hide();$(this).parent().parent().parent().next().next().show();" autocomplete="off" />关键字
						</label>
					</div>
				</div>
				<div class="form-group" <?php  if($setting[$row['type']]['type'] != 'module') { ?>style="display: none"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<select name="setting[<?php  echo $row['type'];?>][module]" class="form-control">
							<option value="">不处理(使用系统默认回复)</option>
							<?php  if(is_array($row['handles'])) { foreach($row['handles'] as $item) { ?>
								<option value="<?php  echo $item['name'];?>" <?php  if($setting[$row['type']]['module'] == $item['name']) { ?>selected<?php  } ?>><?php  echo $item['title'];?></option>
							<?php  } } ?>
						</select>
						<div class="help-block">如果【<?php  echo $row['title'];?>】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
					</div>
				</div>
				<div class="form-group" <?php  if($setting[$row['type']]['type'] != 'keyword' && !empty($setting[$row['type']]['type'])) { ?>style="display: none"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-xs-12 col-sm-9 col-md-10">
						<input type="text" value="<?php  echo $setting[$row['type']]['keyword'];?>" name="setting[<?php  echo $row['type'];?>][keyword]" class="form-control">
						<div class="help-block">如果【<?php  echo $row['title'];?>】到达时, 并且此时并不在对话上下文中, 将会采用选中的模块来处理. 如果选择"不处理", 那么这个消息将会使用系统默认回复来回复</div>
					</div>
				</div>
				<?php  } } ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1" />
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
