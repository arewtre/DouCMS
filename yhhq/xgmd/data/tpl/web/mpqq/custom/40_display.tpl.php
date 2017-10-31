<?php defined('IN_IA') or exit('Access Denied');?><div class="alert alert-info" style="margin-top:0;">
	如果你要使用腾讯提供的多客服系统, 请添加本条规则. <br>
	这个功能是配合微信公众平台的多客服功能使用的, <a href="http://wkd.qq.com/php/static/mp/html/guide.html" target="_blank">了解详情</a> <br>
	注意: 请添加关键字为 [高级] - [直接接管] <br>
	注意: <span style="color:red;">不要</span>设置为置顶规则. <br> <br>
	<p>
		直接接管说明: 直接接管功能是配合优先级使用的. <br>
		比如一条规则, 优先级是 10, 触发设置为直接接管. 那么当消息到达时, 优先处理优先级大于10的规则. 如果没有优先级大于10的规则, 或者优先级大于10的规则都没有任何有效回复. 那么直接使用这条规则.
	</p>
	<p>
		腾讯多客服功能说明: 如果粉丝发送了一条消息, 如果没有任何有效的规则能够处理. 那么将会把这条消息转发至腾讯多客服系统. 使用多客服客户端的客服人员如果接入了这条消息(接待本次客服对话)后, 以后的消息都将发送至多客服系统(<span style="color:red;">不会继续把消息发送至本系统</span>) <br>
		直到客服人员关闭本地对话, 公众平台官方才会继续把消息发送至本系统进行处理. <br>
		<span style="color:red;">因此, 客服人员接待完成后, 一定要点击关闭按钮来结束客服接待. 否则本平台不会生效.</span><br>
		<span style="color:red;">如果希望全天接入多客服,可将第一个时间段设置为：0~24时</span><br>
		<span style="color:green;">例如:3~5时。这个范围是从：3:00开始开始,4:59结束</span>
	</p>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		回复内容
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">第一个时间段</label>
			<div class="col-sm-4 col-xs-6">
				<select class="form-control" name="start1" id="start1">
					<option value="-1">请选择每天开始接入时间</option>
					<?php
						for($i = 0; $i < 25; $i ++) {
							echo '<option value="'. $i . '" ' . (($replies['start2'] != '' && $replies['start1'] == $i) ? ' selected ' : '') . '>'. $i .'时</option>';
						}
					?>
				</select>
			</div>
			<div class="col-sm-4 col-xs-6">
				<select class="form-control" name="end1" id="end1">
					<option value="-1">请选择每天开始接入时间</option>
					<?php
						for($i = 0; $i < 25; $i ++) {
							echo '<option value="'. $i . '" ' . (($replies['start2'] != '' && $replies['end1'] == $i) ? ' selected ' : '') . '>'. $i .'时</option>';
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">第二个时间段</label>
			<div class="col-sm-4 col-xs-6">
				<select class="form-control" name="start2" id="start2">
					<option value="-1">请选择每天开始接入时间</option>
					<?php
						for($i = 0; $i < 25; $i ++) {
							echo '<option value="'. $i . '" ' . (($replies['start2'] != '' && $replies['start2'] == $i) ? ' selected ' : '') . '>'. $i .'时</option>';
					}
					?>
				</select>
			</div>
			<div class="col-sm-4 col-xs-6">
				<select class="form-control" name="end2" id="end2">
					<option value="-1">请选择每天开始接入时间</option>
					<?php
						for($i = 0; $i < 25; $i ++) {
							echo '<option value="'. $i . '" ' . (($replies['start2'] != '' && $replies['end2'] == $i) ? ' selected ' : '') . '>'. $i .'时</option>';
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-8 col-xs-12">
				<div class="help-block">请选择每天接入时间段。您最多可以设置两个时间段,只有在这两个时间段的用户消息会转到多客服里。</div>
				<strong class="text-danger">如果您只有一个时间段,请将第二个时间段留空。</strong>
			</div>
		</div>
	</div>
	<script>
		window.validateReplyForm = function(form, $, _, util) {
			var start1 = parseInt($('#start1').val());
			var end1 = parseInt($('#end1').val());
			var start2 = parseInt($('#start2').val());
			var end2 = parseInt($('#end2').val());
			if(start1 == '-1' && end1 == '-1' && start2 == '-1' && end2 == '-1') {
				util.message('请选择有效的时间段');
				return false;
			}
			if(start1 > end1) {
				util.message('第一个时间段的开始接入时间大于结束时间');
				return false;
			}
			if(start2 != '-1' && (end1 > start2)) {
				util.message('第一个时间段的结束日期大于第二个时间段的开始时间');
				return false;
			}
			if(start2 != '-1' &&  (start2 > end2)) {
				util.message('第二个时间段的开始接入时间大于结束时间');
				return false;
			}
		};
	</script>