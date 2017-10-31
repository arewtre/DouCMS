<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
	<style>
		.account-rank img{width:20px; height:20px;}
		.alert{color:#666;padding:10px}
		.text-strong{font-size:14px;font-weight:bold;}
		.popover{max-width: 450px}
		.popover-content{padding-top: 0;line-height: 30px}
		.popover-content h5{padding-bottom: 5px}
	</style>
	<ol class="breadcrumb">
		<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
		<li class="active">公众号</li>
	</ol>
	<div class="clearfix" style="margin-bottom:5em;">
		<ul class="list-unstyled account">
			<?php  if(is_array($list)) { foreach($list as $uni) { ?>
			<?php  $subaccount = count($uni['details']);?>
			<li>
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row clearfix">
							<div class="col-xs-6" style="cursor:pointer; color:#999;">
								排序 : <span class="account-rank" data-account-id="<?php  echo $uni['uniacid'];?>" data-rank="<?php  echo $uni['rank'];?>"></span>
							</div>
							<div  class="pull-right" style="margin-right: 15px;">
								<a href="<?php  echo url('account/switch', array('uniacid' => $uni['uniacid']))?>" target="_blank" class="manage"><i class="fa fa-cog"></i>管理公众号</a>
							</div>
						</div>
					</div>
					<ul class="panel-body list-group">
						<?php  if(is_array($uni['details'])) { foreach($uni['details'] as $account) { ?>
						<li class="row list-group-item" style="line-height:60px;">
							<div class="col-xs-12 col-sm-12 col-md-2 col-lg-1">
								<img src="<?php  echo tomedia('headimg_'.$account['acid'].'.jpg');?>?time=<?php  echo time()?>" class="" width="50" height="50"  onerror="this.src='resource/images/gw-wx.gif'" />
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-5 item" style="font-size:16px;">
								<?php  echo $account['name'];?>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 item text-right">
								<span style="width:80px; text-align:center; display:inline-block;"><?php  if($account['isconnect'] == 1) { ?><i class="fa fa-2x fa-check-circle text-success" style="position:absolute; top:15px;" data-toggle="tooltip" data-placement="top" title='接入状态 : <?php  if($account['type'] == 3) { ?>登录授权<?php  } else { ?>成功接入<?php  } ?>'></i><?php  echo $types[$account['type']]['title'];?><?php  } else { ?><i class="fa fa-2x fa-times-circle text-warning" style="position:absolute; top:15px;" data-toggle="tooltip" data-placement="top" title='<?php  if($account['type'] == 3) { ?>登录授权失败<?php  } else { ?>公众号接入状态显示“未接入”解决方案：进入微信公众平台，依次选择: 开发者中心 -> 修改配置，然后将对应公众号在
								平台的url和token复制到微信公众平台对应的选项，公众平台会自动进行检测<?php  } ?>'></i><?php  echo $types[$account['type']]['title'];?><?php  } ?></span>
								
								<?php  if($subaccount > 1 && $uni['role'] <> 'operator') { ?>
									<div style="display:inline-block; border-left:1px #DDD solid; padding-left:20px; margin-left:20px;">
									<?php  if($account['acid'] != $uni['default_acid']) { ?>
										<a data-toggle="tooltip" data-placement="top" title='设置为默认后，主公号与此子号绑定，后台一切接口权限将从此子号获取' href="<?php  echo url('account/default',  array('acid' => $account['acid'], 'uniacid' => $account['uniacid']))?>" class="btn btn-sm btn-primary" style="color:#fff;"><i class="fa fa-pencil"></i> 设为默认</a>
									<?php  } ?>
									<a href="<?php  echo url('account/summary', array('acid' => $account['acid'], 'uniacid' => $account['uniacid']))?>" class="btn btn-sm btn-default"><i class="fa fa-bar-chart-o"></i>详情</a>
									<?php  if($account['acid'] == $uni['default_acid']) { ?>
										<a href="<?php  echo url('account/post', array('uniacid' => $account['uniacid']))?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i>编辑</a>
									<?php  } else { ?>
										<a href="<?php  echo url('account/post', array('acid' => $account['acid'], 'uniacid' => $account['uniacid']))?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i>编辑</a>
									<?php  } ?>
									<?php  if($account['acid'] != $uni['default_acid']) { ?>
									<a href="<?php  echo url('account/display/delete', array('acid' => $account['acid']))?>" onclick="return confirm('确认放入回收站吗？');return false;" class="btn btn-sm btn-default"><i class="fa fa-times"></i>删除</a>
									<?php  } ?>
									</div>
								<?php  } ?>
							</div>
						</li>
						<?php  } } ?>
					</ul>
<!-- 					<div class="list-group-bottom"> -->
<!-- 						<div class="col-xs-6 list-group-bottom-left"> -->
<!-- 							<span>服务有效期 : <?php  echo $uni['setmeal']['timelimit'];?></span> -->
<!-- 						</div> -->
<!-- 						<div class="col-xs-6 text-right list-group-bottom-right"> -->
<!-- 							<?php  if($uni['role'] == 'founder') { ?> -->
<!-- 							<a href="<?php  echo url('account/post-step', array('step' => '3', 'uniacid' => $uni['uniacid'], 'from' => 'list'))?>"><i class="fa fa-key"></i>设置权限</a> -->
<!-- 							<?php  } ?> -->
<!-- 							<?php  if($uni['role'] == 'founder' || $uni['role'] == 'manager') { ?> -->
<!-- 							<a href="<?php  echo url('account/permission', array('uniacid' => $uni['uniacid']))?>"><i class="fa fa-user"></i>操作员管理</a> -->
<!-- 							<?php  if($subaccount == 1) { ?><a href="<?php  echo url('account/post', array('uniacid' => $uni['uniacid']))?>"><i class="fa fa-edit"></i>编辑</a><?php  } ?> -->
<!-- 							<a href="<?php  echo url('account/display/delete', array('uniacid' => $uni['uniacid'], 'acid' => $uni['default_acid']))?>" onclick="return confirm('删除主公众号其所属的子公众号也会一起被放入回收站，确认吗？（可以在回收站中恢复公众号）');return false;"><i class="fa fa-times"></i>删除</a> -->
<!-- 							<?php  } ?> -->
<!-- 						</div> -->
<!-- 					</div> -->
				</div>
			</li>
			<?php  } } ?>
		</ul>
	<div class="pull-right"><?php  echo $pager;?></div>
	</div>
<script type="text/javascript">
	require(['raty'], function(raty) {
		$('.account-rank').each(function(){
			var account = $(this);
			var id = account.data("account-id");
			var rank = account.data("rank");
			account.raty({
				cancel:!0,
				cancelOn:"../images/cancel-custom-on.png",
				cancelOff:"../images/cancel-custom-off.png",
				cancelPlace:"left",
				cancelHint:"重置",
				hints:["1","2","3","4","5"],
				number:6,
				path:"./resource/images/",
				starOff:"star-off-big.png",
				starOn:"star-on-big.png",
				starType:"img",
				size:16,
				score:rank,
				targetKeep:!0,
				click:function(account){$.post("./index.php?c=account&a=display&do=rank",{id:id,rank:account}, function(data){location.reload();},"json")}
			})
		});
	});
	require(['bootstrap'],function($){
		$('[data-toggle="tooltip"]').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
		$('.setmeal-hover').hover(function(){
			var uid = $(this).data('uid');
			var groupid = $(this).data('groupid');
			var title = $(this).data('uniacid');
			var obj = $(this);
			if(groupid == -1) {
				obj.popover({
					'html':true,
					'placement':'right',
					'trigger':'manual',
					//'title':title,
					'content':'<h5>可用的服务套餐</h5><div style="margin-top: -15px"><span class="label label-success">所有服务</span></div>'
				});
				obj.popover('show');
			}else {
				$.post("<?php  echo url('account/display/package')?>", {uid:uid, groupid:groupid}, function(data){
					var data = $.parseJSON(data);
					var content = '';
					if(data.message.message.groupname.length > 0) {
						content += '<h5>可用的服务套餐</h5>';
						content += '<div style="margin-top: -15px">';
						$.each(data.message.message.groupname, function (i,val) {
								content += '<span class="label label-success">'+val.name+'</span> ';
						});
						content += '</div>';
					}
					if(data.message.message.modules && data.message.message.modules.length > 0) {
						content += '<h5>附加的模块权限</h5>';
						content += '<div style="margin-top: -15px">';
						$.each(data.message.message.modules, function (i,val) {
							content += '<span class="label label-success">'+val.title+'</span> ';
						});
						content += '</div>';
					}
					if(data.message.message.templates && data.message.message.templates.length > 0) {
						content += '<h5>附加的模板权限</h5>';
						content += '<div style="margin-top: -15px">';
						$.each(data.message.message.templates, function (i,val) {
							content += '<span class="label label-success">'+val.title+'</span> ';
						});
						content += '</div>';
					}
					obj.popover({
						'html':true,
						'placement':'right',
						'trigger':'manual',
						//'title':title,
						'content':content
					});
					obj.popover('show');
				});
			}
		}, function(){
			$(this).popover('hide');
		});
	});
</script>
