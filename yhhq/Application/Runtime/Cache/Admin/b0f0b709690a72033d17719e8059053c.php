<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo C('APP_NAME');?></title>
	<meta name="keywords" content="" />
    <meta name="description" content="DouCMS Version:1.09" />
	<meta name="Author" content="doudoubao" />
	<meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<link rel="Shortcut Icon" href="/favicon.ico" />
	<!-- load css -->
    <link rel="stylesheet" type="text/css" href="/yhhq/Public/common/bootstrap/css/bootstrap.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="/yhhq/Public/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/yhhq/Public/common/css/larry.css" media="all"> <!--基于flex布局 未完待续-->
	<link rel="stylesheet" type="text/css" href="/yhhq/Public/common/css/global.css" media="all">
	<link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_bmgv5kod196q1tt9.css">
	<link rel="stylesheet" type="text/css" href="/yhhq/Public/css/common.css" media="all">
	<link rel="stylesheet" type="text/css" href="/yhhq/Public/css/gobal.css" media="all">
	<link rel="stylesheet" type="text/css" href="/yhhq/Public/css/main2.css" media="all">
	<script type="text/javascript" src="/yhhq/Public/common/layui1.09/layui.js"></script> 
	<script type="text/javascript" src="/yhhq/Public/common/js/jquery-3.2.0.min.js"></script>
	</head>
<body>

<div class="larry-grid larry-wrapper">
    <div class="row" id="infoSwitch"> 
        <blockquote class="layui-elem-quote col-md-12 head-con">
            <div>尊敬的admin<span id="weather"></span></div>
			<i class="larry-icon larry-guanbi close" id="closeInfo"></i>
	    </blockquote>
    </div>
    <div class="row shortcut" id="shortcut">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 ">
        	<section class="panel clearfix">
        		<div class="symbol shortcut-bg1"> <i class="layui-icon">&#xe611;</i></div>
        		<div class="value">
        			<a data-href="<?php echo U('News/Index');?>">
						<h1 id="count1">10</h1>
					</a>
					<p>待审的文章</p>
        		</div>
        	</section>
        </div> 
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 ">
        	<section class="panel">
        		<div class="symbol shortcut-bg2"> <i class="layui-icon">&#xe60a;</i></div>
        		<div class="value">
        			<a data-href="<?php echo U('Article/index');?>">
						<h1 id="count2">26</h1>
					</a>
					<p>我发布的文章</p>
        		</div>
        	</section>
        </div> 
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 ">
        	<section class="panel">
        		<div class="symbol shortcut-bg3"> <i class="layui-icon">&#xe64a;</i></div>
        		<div class="value">
        			<a data-href="<?php echo U('Images/index');?>">
						<h1 id="count3">15</h1>
					</a>
					<p>我上传的照片</p>
        		</div>
        	</section>
        </div> 
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 ">
        	<section class="panel">
        		<div class="symbol shortcut-bg4"> <i class="layui-icon">&#xe613;</i></div>
        		<div class="value">
        			<a data-href="<?php echo U('Member/index');?>">
						<h1 id="count4">60</h1>
					</a>
					<p>会员最新注册</p>
        		</div>
        	</section>
        </div> 
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 ">
        	<section class="panel">
        		<div class="symbol shortcut-bg5"> <i class="layui-icon">&#xe611;</i></div>
        		<div class="value">
        			<a data-href="<?php echo U('Message/index');?>">
						<h1 id="count4">105</h1>
					</a>
					<p>会员最新留言</p>
        		</div>
        	</section>
        </div> 
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 ">
        	<section class="panel">
        		<div class="symbol shortcut-bg6"> <i class="layui-icon">&#xe6ed;</i></div>
        		<div class="value">
        			<a data-href="<?php echo U('Video/index');?>">
						<h1 id="count4">10</h1>
					</a>
					<p>我上传的视频</p>
        		</div>
        	</section>
        </div> 
    </div>
    <!-- 首页信息 -->
    <div class="row system">
    	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <section class="panel">
                <header class="panel-heading bm0">
                    <span class='span-title'>系统概览</span>
                    <span class="tools pull-right"><a href="javascript:;" class="iconpx-chevron-down"></a></span>
                </header>
                <div class="panel-body">
                    <div class="larry-table">
                        <table class="layui-table larry-table-info">
                            <colgroup>                
                                <col width="150">                
                                <col>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td><span class="tit">网站域名:</span></td>
                                    <td><a href="http://www.linxinran.cn" title="DouCMS官网" class="tit" target="_blank"><span class="info"><?php echo ($config["url"]); ?></span></a></td>
                                </tr>
                                <tr>
                                    <td><span class="tit">版本信息:</span></td>
                                    <td><span class="info iframe"> DouCMS_1.0</span><span class="info">  [作者:  九月一十八]</span></td>
                                </tr>
                                <tr>
                                    <td><span class="tit">服务器操作系统</span></td>
                                    <td><?php echo ($config["server_os"]); ?></td>
                                </tr>
                                <tr>
					                <td><span class="tit">服务器端口</span></td>
					                <td><?php echo ($config["server_port"]); ?></td>
					            </tr>
					            <tr>
					                <td><span class="tit">服务器IP</span></td>
					                <td><?php echo ($config["server_ip"]); ?></td>
					            </tr>
					            <tr>
					                <td><span class="tit">WEB运行环境</span></td>
					                <td><?php echo ($config["server_soft"]); ?></td>
					            </tr>
					            <tr>
					                <td><span class="tit">MySQL版本</span></td>
					                <td><?php echo ($config["mysql_version"]); ?></td>
					            </tr>
					            <tr>
					                <td><span class="tit">运行PHP版本</span></td>
					                <td><?php echo ($config["php_version"]); ?></td>
					            </tr>
					
					            <tr>
					                <td><span class="tit">最大上传限制</span></td>
					                <td><?php echo ($config["max_upload_size"]); ?></td>
					            </tr>
                                <!-- 
                                <tr>
                                    <td><span class="tit">网站域名:</span></td>
                                    <td>www.linxinran.cn</td>
                                </tr>
                                <tr>
                                    <td><span class="tit">当前登陆用户:</span></td>
                                    <td>admin</td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
                        <section class="panel">
                <header class="panel-heading bm0">
                    <span class='span-title'>最新留言</span>
                    <span class="tools pull-right"><a href="javascript:;" class="iconpx-chevron-down"></a></span>
                </header>
                <div class="panel-body">
                    <form class="layui-form larry-document" action="" method="post">
                        <table class="layui-table">
                            <colgroup>                
                                <col>
                                <col width="100">
                                <col width="120">
                                <col width="100">
                            </colgroup>
                            <thead>
                              <tr>
                                <th>头像</th>
                                <th>用户名</th>
                                <th>时间</th>
                                <th>状态</th>
                              </tr> 
                            </thead>
                            <tbody>
                            <?php if(is_array($re)): foreach($re as $key=>$v): ?><tr>
                                   <td><a href="#"><?php echo ($v["userface"]); ?></a></td> 
                                   <td><?php echo ($v["username"]); ?></td>
                                   <td><?php echo ($v["asktime"]); ?></td>
                                   <td class="layui-form-item">
                                        
                                   </td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>                        
                        </table>
                    </form>
                </div>
            </section>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
            <!-- <section class="panel">
                <header class="panel-heading bm0">
                    <span class='span-title'>系统公告</span>
                    <span class="tools pull-right"><a href="javascript:;" class="iconpx-chevron-down"></a></span>
                </header>
                <div class="panel-body">
                    <table class="table table-hover personal-task">
                            <tr>
                              <td class="top-top">
                                <p class="larry_github">
                                  
                                </p>
                              </td>
                            </tr>
                    </table>
                </div>
            </section> -->
                      
            <section class="panel">
                <header class="panel-heading bm0">
                    <span class='span-title'>数据统计</span>
                    <span class="tools pull-right"><a href="javascript:;" class="iconpx-chevron-down"></a></span>
                </header>
                <div class="panel-body larry-seo-box">
                    <div class="larry-seo-stats" id="larry-seo-stats"></div>
                </div>
            </section>

            <section class="panel">
                <header class="panel-heading bm0">
                    <span class='span-title'>最新文章</span>
                    <span class="tools pull-right"><a href="javascript:;" class="iconpx-chevron-down"></a></span>
                </header>
                <div class="panel-body">
                    <form class="layui-form larry-document" action="" method="post">
                        <table class="layui-table">
                            <colgroup>                
                                <col>
                                <col width="100">
                                <col width="120">
                                <col width="100">
                            </colgroup>
                            <thead>
                              <tr>
                                <th>文章标题</th>
                                <th>作者</th>
                                <th>发布时间</th>
                                <th>状态</th>
                              </tr> 
                            </thead>
                            <tbody>
                                <tr>
                                   <td><a href="#">网站优化需要分析哪些数据</a></td> 
                                   <td>larry</td>
                                   <td>2017-03-25</td>
                                   <td class="layui-form-item">
                                        <input type="checkbox" name="close" lay-skin="switch" lay-text="ON|OFF">
                                   </td>
                                </tr>
                            </tbody>                        
                        </table>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- 加载js文件 -->
<script type="text/javascript" src="/yhhq/Public/common/bootstrap/js/bootstrap.min.js"></script>  
<script type="text/javascript" src="/yhhq/Public/common/jsplugin/jquery.leoweather.min.js"></script>
<script type="text/javascript" src="/yhhq/Public/common/jsplugin/echarts.min.js"></script>
<!-- 引入当前页面js文件 -->
<!--  <script type="text/javascript" src="/yhhq/Public/js/common.js"></script>
<script type="text/javascript" src="/yhhq/Public/js/main.js"></script>-->
<script>
layui.config({
	   base:'/yhhq/Public/js/lib/' //layui自定义layui组件目录
	}).extend({
		larry:'larry',
		navtab:'navtab',
		elemnts:'elements',
		common: 'common'
	});
	layui.use(['layer','elements','form'],function(){
	    var layer = layui.layer,
	        elements = layui.elements(),
	        form = layui.form();
	   
	    // header信息
	    $('#weather').leoweather({format:'，{时段}好！<span id="colock">现在时间是：<strong>{年}年{月}月{日}日 星期{周} {时}:{分}:{秒}</strong>，</span> <b>{城市}天气</b> {天气} {夜间气温}℃ ~ {白天气温}℃'});
	    $('#closeInfo').on('click',function(){$('#infoSwitch').hide();});


	    $('.panel .tools .iconpx-chevron-down').click(function(){
	       	   var el = $(this).parents(".panel").children(".panel-body");
	       	   if($(this).hasClass("iconpx-chevron-down")){
	       	   	   $(this).removeClass("iconpx-chevron-down").addClass("iconpx-chevron-up");
	       	   	   el.slideUp(200);
	       	   }else{
	       	   	   $(this).removeClass("iconpx-chevron-up").addClass("iconpx-chevron-down");
	       	   	   el.slideDown(200);
	       	   }
	    });
	    
	    // 快捷方式
	    $('#shortcut section').on('click',function(){
	           var title = $(this).children('.value').find('p').text();
	           var href = $(this).children('.value').find('a').data('href');
	           var icon = $(this).children('.symbol').find('i:first').data('icon');
	           var data = {
	                    href: href,
	                    icon: icon,
	                    title: title
	               };
	           parent.navtab.tabAdd(data); 
	    });

	/*$(window).on('resize',function(){
	  var myChart = echarts.init(document.getElementById('larry-seo-stats'));
	  option = {
	    title: {
	      text: '用户访问来源',
	      subtext: '纯属虚构',
	      x: 'center'
	    },
	    tooltip: {
	      trigger: 'item',
	      formatter: "{a} <br/>{b} : {c} ({d}%)"
	    },
	    legend: {
	      orient: 'vertical',
	      left: 'left',
	      data: ['直接访问', '邮件营销', '联盟广告', '视频广告', '搜索引擎']
	    },
	    series: [{
	      name: '访问来源',
	      type: 'pie',
	      radius: '55%',
	      center: ['50%', '60%'],
	      data: [{
	        value: 335,
	        name: '直接访问'
	      }, {
	        value: 310,
	        name: '邮件营销'
	      }, {
	        value: 234,
	        name: '联盟广告'
	      }, {
	        value: 135,
	        name: '视频广告'
	      }, {
	        value: 1548,
	        name: '搜索引擎'
	      }],
	      itemStyle: {
	        emphasis: {
	          shadowBlur: 10,
	          shadowOffsetX: 0,
	          shadowColor: 'rgba(0, 0, 0, 0.5)'
	        }
	      }
	    }]
	  };
	  myChart.setOption(option);
	}).resize();*/

	 form.render();
	});

</script>
</body>
</html>