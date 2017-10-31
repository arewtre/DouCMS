<?php defined('IN_IA') or exit('Access Denied');?><div class="page-header">
	<h4><i class="fa fa-comments"></i> 公众号信息</h4>
</div>
<div class="account">
	<?php  if(is_array($accounts)) { foreach($accounts as $account) { ?>
	<div class="panel panel-default row">
		<div class="panel-body">
			<div class="clearfix">
				<div class="col-sm-7">
					<p>
						<strong><?php  echo $account['name'];?></strong>
						<span class="label label-success" style="display:inline-block; margin-right:10px;">
						<?php  if($account['level'] == 1) { ?>订阅号<?php  } ?>
						<?php  if($account['level'] == 2) { ?>普通服务号<?php  } ?>
						<?php  if($account['level'] == 3) { ?>认证订阅号<?php  } ?>
						<?php  if($account['level'] == 4) { ?>认证服务号/认证媒体/政府订阅号<?php  } ?>
						</span>
						<?php  if($account['type'] == ACCOUNT_OAUTH_LOGIN) { ?>
						<span class="text-success"><i class="fa fa-check-circle"></i> 登录授权</span>
						<?php  } else { ?>
						<?php  if($account['isconnect'] == 1) { ?>
						<span class="text-success"><i class="fa fa-check-circle"></i> 成功接入<?php  echo $accounttypes[$account['type']]['title'];?></span>
						<?php  } else { ?>
						<span class="text-warning"><i class="fa fa-times-circle"></i> 未接入<?php  echo $accounttypes[$account['type']]['title'];?></span>
						<?php  } ?>
						<?php  } ?>
					</p>
					<?php  if($account['type'] == ACCOUNT_NORMAL_LOGIN) { ?>
					<p><strong>接口地址： </strong> <a href="javascript:;" style="color:#66667C;"><?php  echo $_W['siteroot'];?>api.php?id=<?php  echo $account['acid'];?></a></p>
					<p><strong>Token： </strong> <a href="javascript:;" title="点击复制Token" style="color:#66667C;"><?php  echo $account['token'];?></a></p>
					<?php  } ?>
				</div>
				<div class="col-sm-5 text-right">
					<img src="<?php  echo tomedia('qrcode_'.$account['acid'].'.jpg')?>?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="150" onerror="this.src='resource/images/gw-wx.gif'" />
					<img src="<?php  echo tomedia('headimg_'.$account['acid'].'.jpg')?>?time=<?php  echo time()?>" class="img-responsive img-thumbnail" width="150" onerror="this.src='resource/images/gw-wx.gif'"/>
				</div>
			</div>
		</div>
	</div>
	<?php  } } ?>
</div>
<script>
	$('.account p a').each(function(){
		util.clip(this, $(this).text());
	});
</script>
<?php  if($_W['acid'] == $_W['uniaccount']['default_acid']) { ?>
<div class="panel panel-default" id="scroll">
	<div class="panel-heading">
		今日关键指标
	</div>
	<div class="account-stat">
		<div class="account-stat-btn">
			<div>今日新关注<span><?php  echo $today_add_num;?></span></div>
			<div>今日取消关注<span><?php  echo $today_cancel_num;?></span></div>
			<div>今日净增关注<span><?php  echo $today_jing_num;?></span></div>
			<div>累积关注<span><?php  echo $today_total_num;?></span></div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		昨日关键指标
	</div>
	<div class="account-stat">
		<div class="account-stat-btn">
			<div>昨日新关注<span><?php  echo $yesterday_stat['new'];?></span></div>
			<div>昨日取消关注<span><?php  echo $yesterday_stat['cancel'];?></span></div>
			<div>昨日净增关注<span><?php  echo intval($yesterday_stat['new']) - intval($yesterday_stat['cancel'])?></span></div>
			<div>累积关注<span><?php  echo $yesterday_stat['cumulate'];?></span></div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		关键指标详解
		<a class="text-danger" href="<?php  echo url('account/summary/', array('acid' => $_W['acid'], 'uniacid' => $_W['uniacid']));?>" target="_blank">查看更多</a>
	</div>
	<div class="panel-body">
		<div class="pull-right">
			<div class="checkbox">
				<label style="color:#57B9E6;"><input checked type="checkbox"> 新关注人数</label>&nbsp;
				<label style="color:rgba(203,48,48,1)"><input checked type="checkbox"> 取消关注人数</label>&nbsp;
				<label style="color:rgba(149,192,0,1);;"><input checked type="checkbox"> 净增人数</label>&nbsp;
				<label style="color:#e7a017;"><input type="checkbox"> 累积关注人数</label>
			</div>
		</div>
		<div style="margin-top:20px">
			<canvas id="myChart1" width="1200" height="300"></canvas>
		</div>
	</div>
</div>
<script>
	require(['chart', 'daterangepicker'], function(c) {
		var chart = null;
		var chartDatasets = null;
		var templates = {
			flow1: {
				label: '新关注人数',
				fillColor : "rgba(36,165,222,0.1)",
				strokeColor : "rgba(36,165,222,1)",
				pointColor : "rgba(36,165,222,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(36,165,222,1)",
			},
			flow2: {
				label: '取消关注人数',
				fillColor : "rgba(203,48,48,0.1)",
				strokeColor : "rgba(203,48,48,1)",
				pointColor : "rgba(203,48,48,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(203,48,48,1)",
			},
			flow3: {
				label: '净增人数',
				fillColor : "rgba(149,192,0,0.1)",
				strokeColor : "rgba(149,192,0,1)",
				pointColor : "rgba(149,192,0,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(149,192,0,1)",
			},
			flow4: {
				label: '累计人数',
				fillColor : "rgba(231,160,23,0.1)",
				strokeColor : "rgba(231,160,23,1)",
				pointColor : "rgba(231,160,23,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(231,160,23,1)"
			}
		};

		function refreshData() {
			if(!chart || !chartDatasets) {
				return;
			}
			var visables = [];
			var i = 0;
			$('.checkbox input[type="checkbox"]').each(function(){
				if($(this).attr('checked')) {
					visables.push(i);
				}
				i++;
			});
			var ds = [];
			$.each(visables, function(){
				var o = chartDatasets[this];
				ds.push(o);
			});
			chart.datasets = ds;
			chart.update();
		}

		var url = './index.php?c=account&a=summary&acid=<?php  echo $_W['acid'];?>&uniacid=<?php  echo $_W['uniacid'];?>&#aaaa';
		$.post(url, function(data){
			var data = $.parseJSON(data)
			var datasets = data.datasets;
			if(!chart) {
				var label = data.label;
				var ds = $.extend(true, {}, templates);
				ds.flow1.data = datasets.new;
				ds.flow2.data = datasets.cancel;
				ds.flow3.data = datasets.increase;
				ds.flow4.data = datasets.cumulate;
				var lineChartData = {
					labels : label,
					datasets : [ds.flow1, ds.flow2, ds.flow3, ds.flow4]
				};

				var ctx = document.getElementById("myChart1").getContext("2d");
				chart = new Chart(ctx).Line(lineChartData, {
					responsive: true
				});
				chartDatasets = $.extend(true, {}, chart.datasets);
			}
			refreshData();
		});

		$('.checkbox input[type="checkbox"]').on('click', function(){
			$(this).attr('checked', !$(this).attr('checked'))
			refreshData();
		});
	});
</script>
<?php  } ?>
<style>
	.account-stat{overflow:hidden; color:#666;}
	.account-stat .account-stat-btn{width:100%; overflow:hidden;}
	.account-stat .account-stat-btn > div{text-align:center; margin-bottom:5px;margin-right:2%; float:left;width:23%; height:80px; padding-top:10px;font-size:16px; border-left:1px #DDD solid;}
	.account-stat .account-stat-btn > div:first-child{border-left:0;}
	.account-stat .account-stat-btn > div span{display:block; font-size:30px; font-weight:bold}
</style>
<div class="page-header">
	<h4><i class="fa fa-android"></i> 基本回复统计情况</h4>
</div>
<div class="panel panel-default" style="padding:1em;">
	<nav role="navigation" class="navbar navbar-default navbar-static-top" id="clear" style="margin: -1em -1em 1em -1em;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="javascript:;" class="navbar-brand">模块命中次数趋势图</a>
			</div>
			<ul class="nav navbar-nav nav-btns">
				<li class="active" id="basic"><a href="javascript:;">文字回复</a></li>
				<li id="news"><a href="javascript:;">图文回复</a></li>
				<li id="music"><a href="javascript:;">音乐回复</a></li>
				<li id="images"><a href="javascript:;">图片回复</a></li>
				<li id="voice"><a href="javascript:;">语音回复</a></li>
				<li id="video"><a href="javascript:;">视频回复</a></li>
				<li id="userapi"><a href="javascript:;">自定义接口回复</a></li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">其他模块 <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
					<?php  if(is_array($modules_other)) { foreach($modules_other as $other) { ?>
						<?php  if($modules[$other]['isrulefields']) { ?>
							<li id="<?php  echo $modules[$other]['name'];?>"><a href="javascript:;"><?php  echo $modules[$other]['title'];?></a></li>
						<?php  } ?>
					<?php  } } ?>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	
	<div class="account-stat">
		<div class="account-stat-btn">
			<div>总回复规则数<span id="rule"></span></div>
			<div>今日命中次数<span id="today"></span></div>
			<div>本月命中次数<span id="month"></span></div>
			<div>
				<a href="" id="show"  style="display:block; margin:5px 0;"><i class="fa fa-search"></i> 查看回复规则</a>
				<a href="" id="add" style="display:block;"><i class="fa fa-plus"></i> 新增回复规则</a>
			</div>
		</div>
	</div>

	<div style="margin-top:20px;">
		<canvas id="myChart" height="80"></canvas>
	</div>
</div>

<script>
	require(['chart'], function(c) {
		$('.dropdown').click(function(){
			$('.nav.nav-btns>li').removeClass('active');
			$(this).toggleClass('active');
		});
		
		var myLine = new Chart(document.getElementById("myChart").getContext("2d"));
		var datasets = '';
		var label = '';
		var lineChartData = null;
		var obj = null;
		var day_num = "<?php  echo $day_num;?>";
		var show_url = "<?php  echo url('platform/reply/display')?>m=";
		var add_url = "<?php  echo url('platform/reply/post')?>m=";
		var data = null;
		var replystatistics_url = "<?php  echo url('home/welcome/replystatistics')?>";
		$.post(replystatistics_url, {'m_name' : 'basic'}, function(data){
			data = $.parseJSON(data);
			$("#rule").html(data.stat.rule);
			$("#today").html(data.stat.today);
			$("#month").html(data.stat.month);
			$('#show').attr('href', show_url + data.stat.m_name);
			$('#add').attr('href', add_url + data.stat.m_name);

			lineChartData = {
				labels : data.key,
				datasets : [
					{
						fillColor : "rgba(36,165,222,0.1)",
						strokeColor : "rgba(36,165,222,1)",
						pointColor : "rgba(36,165,222,1)",
						pointStrokeColor : "#fff",
						pointHighlightFill : "#fff",
						pointHighlightStroke : "rgba(36,165,222,1)",
						data : data.value
					}
				]
			}
			 obj = myLine.Line(lineChartData, {responsive: true});
		});
		
		$('.nav.nav-btns li[class!="dropdown"]').on('click', function(){
			$('.nav.nav-btns li').removeClass('active');
			$(this).toggleClass('active');
			var m_name = $(this).attr('id');

			$.post(replystatistics_url, {'m_name' : m_name}, function(data){
				data = $.parseJSON(data);
				$("#rule").html(data.stat.rule);
				$("#today").html(data.stat.today);
				$("#month").html(data.stat.month);
				$('#show').attr('href', show_url + data.stat.m_name);
				$('#add').attr('href', add_url + data.stat.m_name);
				lineChartData = {
					labels : data.key,
					datasets : [
						{
							fillColor : "rgba(36,165,222,0.1)",
							strokeColor : "rgba(36,165,222,1)",
							pointColor : "rgba(36,165,222,1)",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(36,165,222,1)",
							data : data.value
						}
					]
				}
				obj = myLine.Line(lineChartData, {responsive: true});
			});
		});
 	});
</script>
<div class="page-header">
	<h4><i class="fa fa-cogs"></i> 高级功能统计情况</h4>
</div>
<div class="panel panel-default">
	<div class="panel-body table-responsive">
	<table class="table">
		<thead>
		<tr>
			<th style="width:200px;">功能类别</th>
			<th>概况</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>常用服务</td>
			<td>
				<p>已启用：
					<?php  if(is_array($apis)) { foreach($apis as $row) { ?>
						<?php  if($row['switch']) { ?>
						<span class="label label-info"><?php  echo $row['title'];?></span>
						<?php  } ?>
					<?php  } } ?>
				</p>
				<p>未启用：
					<?php  if(is_array($apis)) { foreach($apis as $row) { ?>
					<?php  if(empty($row['switch'])) { ?>
					<span class="label label-warning"><?php  echo $row['title'];?></span>
					<?php  } ?>
				<?php  } } ?>
				</p>
			</td>
		</tr>
		<tr>
			<td>自定义菜单</td>
			<td>
				<p>已启用：
					<?php  if(is_array($accounts)) { foreach($accounts as $acc) { ?>
						<?php  if($acc['level'] > 1) { ?>
						<span class="label label-info"><?php  echo $acc['name'];?></span>&nbsp;
						<?php  } ?>
					<?php  } } ?>
				</p>
				<p>未启用：
					<?php  if(is_array($accounts)) { foreach($accounts as $acc) { ?>
						<?php  if($acc['level'] < 2) { ?>
						<span class="label label-warning"><?php  echo $acc['name'];?>&nbsp;(权限不足)</span>&nbsp;
						<?php  } ?>
					<?php  } } ?>
				</p>
			</td>
		</tr>
		<tr>
			<td>特殊回复</td>
			<td>
				<?php  if(is_array($ds)) { foreach($ds as $row) { ?>
				<?php  if(!empty($row['current'])) { ?>
				<p>
					<?php  echo $row['title'];?>：
					<span class="label label-info">
						<?php  if(is_array($row['handles'])) { foreach($row['handles'] as $item) { ?>
							<?php  if($row['current'] == $item['name']) { ?><?php  echo $item['title'];?><?php  } ?>
						<?php  } } ?>
					</span>&nbsp;
				</p>
				<?php  } ?>
				<?php  } } ?>
			</td>
		</tr>
		<tr>
			<td>二维码</td>
			<td>
				<?php  if(is_array($accounts)) { foreach($accounts as $acc) { ?>
					<?php  if($acc['level'] == 4) { ?>
					<p><?php  echo $acc['name'];?>：
						<span class="label label-info">临时（<?php  echo intval($acc['qr1num']);?>个）</span>&nbsp;
						<span class="label label-info">永久（<?php  echo intval($acc['qr2num']);?>个）</span>
					</p>
					<?php  } ?>
				<?php  } } ?>
				<p>总计：
					<span class="label label-info">临时（<?php  echo intval($tyqr['qr1num']);?>个）</span>&nbsp;
					<span class="label label-info">永久（<?php  echo intval($tyqr['qr2num']);?>个）</span>
				</p>
			</td>
		</tr>
		</tbody>
	</table>
	</div>
</div>
