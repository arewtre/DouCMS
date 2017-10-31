<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<style>
.account-basicinformation span{font-weight:700;}
.account-stat-num > div{width:25%; float:left; font-size:16px; text-align:center;}
.account-stat-num > div span{display:block; font-size:30px; font-weight:bold;}
</style>
<ol class="breadcrumb">
	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
	<li><a href="<?php  echo url('account/display');?>">公众号列表</a></li>
	<li class="active">当前公众号</li>
</ol>
<div class="panel panel-default">
	<div class="panel-heading">
		基本信息
		<span class="pull-right">
			<a href="<?php  echo url('account/post', array('acid' => $account['acid'], 'uniacid' => $account['uniacid']))?>" class="img-rounded edit">编辑</a>&nbsp;&nbsp;
			<a href="<?php  echo url('account/delete', array('acid' => $account['acid'], 'uniacid' => $account['uniacid']))?>" class="img-rounded delete" onclick="return confirm('此操作不可恢复，确认吗？'); return false;">删除</a>
		</span>
	</div>
	<div class="panel-body account-basicinformation">
		<div class="row">
			<div class="col-md-6"><span>公众号名称 : </span><?php  echo $account['name'];?>（<?php  if($account['type'] == 1) { ?>微信<?php  } else { ?>易信<?php  } ?>）</div>
			<div class="col-md-6"><span>接入状态 : </span><?php  if($account['isconnect'] == 1) { ?>接入成功<?php  } else { ?>未接入<?php  } ?></div>
		</div>
		<div class="row" style="border-top:1px #DDD dotted; margin-top:10px; padding-top:10px;">
			<div class="col-md-6"><span>接口地址 : </span><?php  echo $_W['siteroot'];?>api.php?id=<?php  echo $account['acid'];?></div>
			<div class="col-md-6"><span>token : </span><?php  echo $account['token'];?></div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		昨日关键指标
	</div>
	<div class="panel-body">
		<div class="account-stat-num row">
			<div>昨日新关注<span><?php  echo $yesterday_stat['new'];?></span></div>
			<div>昨日取消关注<span><?php  echo $yesterday_stat['cancel'];?></span></div>
			<div>昨日净增关注<span><?php  echo intval($yesterday_stat['new']) - intval($yesterday_stat['cancel'])?></span></div>
			<div>累积关注<span><?php  echo $yesterday_stat['cumulate'];?></span></div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		今日关键指标
	</div>
	<div class="panel-body">
		<div class="account-stat-num row">
			<div>今日新关注<span><?php  echo intval($today_stat['new'])?></span></div>
			<div>今日取消关注<span><?php  echo intval($today_stat['cancel'])?></span></div>
			<div>今日净增关注<span><?php  echo intval($today_stat['new']) - intval($today_stat['cancel'])?></span></div>
			<div>累积关注<span><?php  echo $today_stat['cumulate'];?></span></div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		关键指标详解
	</div>
	<div class="panel-body" id="scroll">
		<div class="pull-left">
			<form action="" id="form1">
				<input name="c" value="account" type="hidden" />
				<input name="a" value="summary" type="hidden" />
				<input name="acid" value="<?php  echo $acid;?>" type="hidden" />
				<input name="uniacid" value="<?php  echo $uniacid;?>" type="hidden" />
				<?php  echo tpl_form_field_daterange('datelimit', array('start' => date('Y-m-d', $starttime),'end' => date('Y-m-d', $endtime)), '')?>
				<input type="hidden" value="" name="scroll">
			</form>
		</div>
		<div class="pull-right">
			<div class="checkbox">
				<label style="color:#57B9E6;"><input checked type="checkbox"> 新关注人数</label>&nbsp;
				<label style="color:rgba(203,48,48,1)"><input checked type="checkbox"> 取消关注人数</label>&nbsp;
				<label style="color:rgba(149,192,0,1);;"><input checked type="checkbox"> 净增人数</label>&nbsp;
				<label style="color:#e7a017;"><input type="checkbox"> 累积关注人数</label>
			</div>
		</div>
		<div style="margin-top:20px">
			<canvas id="myChart" width="1200" height="300"></canvas>
		</div>
	</div>
</div>
	<script>
		require(['chart', 'daterangepicker'], function(c) {
			$('.daterange').on('apply.daterangepicker', function(ev, picker) {
				$('input[name="scroll"]').val($(document).scrollTop());
				$('#form1')[0].submit();
			});
			<?php  if($scroll) { ?> 
				var scroll = "<?php  echo $scroll;?>";
				$("html,body").animate({scrollTop: scroll}, 300);
			<?php  } ?>
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
					pointHighlightStroke : "rgba(231,160,23,1)",
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

			var url = './index.php?c=account&a=summary&acid=<?php  echo $_W['acid'];?>&uniacid=<?php  echo $_W['uniacid'];?>&starttime=<?php  echo $starttime;?>&endtime=<?php  echo $endtime;?>#aaaa';
			$.post(url, function(data){
				var data = $.parseJSON(data);
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

					var ctx = document.getElementById("myChart").getContext("2d");
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
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>