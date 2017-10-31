<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo C('APP_NAME');?></title>
	<meta name="keywords" content="豆宝网后台管理" />
    <meta name="description" content="DouCMS Version:1.09" />
	<meta name="Author" content="九月一十八" />
	<meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<link rel="Shortcut Icon" href="/favicon.ico" />
	<!-- load css #393D49;-->
	<link rel="stylesheet" type="text/css" href="/yhhq/Public/common/layui/css/layui2.css" media="all">
	<link rel="stylesheet" type="text/css" href="/yhhq/Public/common/css/global.css" media="all">
	<link rel="stylesheet" href="/yhhq/Public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_bmgv5kod196q1tt9.css">
	<link rel="stylesheet" type="text/css" href="/yhhq/Public/css/backstage.css?{TIMESTAMP}" media="all">
	<script src="/yhhq/Public/common/js/jquery-1.12.4.min.js"></script>
	<style>
	body{font-family:Arial,Helvetica,sans-serif}
/*	.header-menu .layui-main .layui-nav .layui-nav-item a:hover, .header-menu .layui-main .layui-nav .layui-this a {
    color: white;
    background:#009688;
}
.header-menu .layui-main ul.layui-nav .layui-this::after {
    background: #393D49;
}*/
 /*.header-menu .layui-main .layui-nav .layui-nav-item a {
    color: #D8D8D8;
    padding-left: 13px;
    padding-right: 13px;
    font-size: 18px;
    line-height: 60px;
    position: relative;
    cursor: pointer;
}*/
.layui-nav * {
    font-size: 16px; 
}
#larrySideNav .ffa{
	margin-top:15px
}
 .layui-nav-child .fa{
    margin-top:12px
}

.layui-tab-title fa{
    margin-bottom:10px;
}
	</style>
</head>
<body>

	<div class="layui-layout layui-layout-admin" id="layui_layout">
		<!-- 顶部区域 -->
		<div class="layui-header header-menu">
			<div class="logo posb" id="log" style="line-height:65px;text-align:center;color:white;font-size:20px;font-family:Times New Roman,Georgia,Serif">
					<img style="margin-top:10px;margin-left:15px;height:45px" src="/yhhq/Public/img/logo11.png">
					<!--  <img style="width:450px;position:fixed;top:5px;left:70px"src="/yhhq/Public/img/log5.png">
					<img src="/yhhq/Public/common/images/logo.png">  -->    
			</div>
			<div class="layui-main posb"> 
			  	<!-- 左侧导航收缩开关 -->
			  	<div class="side-menu-switch posb" id="toggle"><span class="switch"  ara-hidden="true"></span></div>
	            <!-- 顶级菜单 -->
	            <div class="larry-top-menu posb">
	            	<ul class="layui-nav clearfix" id="menu">
	            	  <?php if(is_array($top)): foreach($top as $key=>$V): ?><li class="layui-nav-item" data-pid="<?php echo ($v["pid"]); ?>">
		            	  	<a>
		            	  		<i class="fa <?php echo ($v["icon"]); ?>" data-icon="<?php echo ($v["icon"]); ?>" aria-hidden="true"></i>
		            	  		<cite><?php echo ($v["title"]); ?></cite>
		            	  	</a>
	            	  	</li><?php endforeach; endif; ?>
	            	</ul>
	            </div>
	            <!-- 右侧常用菜单导航 -->
	            <div class="larry-right-menu posb">
	                <!-- <button class="layui-btn layui-btn-small" id="dianzhan">
	                	<i class="larry-icon larry-dianzan"></i>
	                	打赏作者
	                </button>-->
	                <ul class="layui-nav clearfix">
	                    <!--<li class="layui-nav-item">
	                        <a class="onFullScreen" id="FullScreen"><i class="larry-icon larry-quanping"></i>全屏</a>
	                    </li>
	                    <li class="layui-nav-item">
	                        <a id="lock"><i class="larry-icon larry-diannao5"></i>锁屏</a>
	                    </li>
	                     <li class="layui-nav-item">
	                        <a id="clearCached"><i class="larry-icon larry-qingchuhuancun"></i>清除缓存</a>
	                    </li>
	                    <li class="layui-nav-item">
	                        <a id="larryTheme"><i class="larry-icon larry-theme1"></i>设置主题</a>
	                    </li>-->
	                    <li class="layui-nav-item kjfs">
	                        <a class="kuaijiefangshi"><i class="larry-icon larry-kuaijie"></i><cite>快捷方式</cite></a>
	                        <dl class="layui-nav-child">
	                            <dd>
	                                <a href="#" target="_blank">网站主页</a>
	                            </dd>
	                            <dd>
	                                <a href="#" target="_blank">我的博客</a>
	                            </dd>
	                            <dd><a id="larryTheme">设置主题</a></dd>
	                            <dd><a id="clearCached">清除缓存</a></dd>
	                            <dd><a class="onFullScreen" id="FullScreen">全屏</a></dd>
	                            <dd><a id="lock">锁屏</a></dd>
	                        </dl>
	                    </li>         
	                    <li class="layui-nav-item exit">
	                        <a  id="logout"><i class="larry-icon larry-exit"></i><cite>退出</cite></a>
	                    </li>
	                </ul>
	            </div>
			</div>
		</div>
		<!-- 左侧导航 -->
		<div class="layui-side larrycms-left" id="larry-side">
			 <div class="layui-side-scroll" >
	              <!-- 管理员信息      -->
	              <div class="user-info">
	                   <div class="photo">
	                       <img class="userface" src="/yhhq/Public/upload/<?php echo (session('headimg')); ?>" alt="">
	                   </div>
	                   <p>您好 <?php echo (session('username')); ?>！欢迎登录</p>
	              </div>
	              <!-- 系统菜单 -->
	              <div class="sys-menu-box" >
	                   <ul class="layui-nav layui-nav-tree" id="larrySideNav" lay-filter="side" >
	                       
	                   </ul>
	              </div>
	         </div>
		</div>
	    <!-- 右侧主题内容 -->
	    <div class="layui-body" id="larry-body" style="padding-top:6px">
	        <div class="layui-tab" id="larry-tab" lay-filter="larryTab">
	             <div class="larry-title-box">
	                 <div class="go-left key-press pressKey" id="titleLeft" title="滚动至最右侧"><i class="larry-icon larry-weibiaoti6-copy"></i> </div>
	                 <ul class="layui-tab-title" lay-allowClose="true" id="layui-tab-title" lay-filter="subadd">
	                    <li class="layui-this" id="admin-home"  lay-id="0" fresh=1>
	                        <i class="larry-icon larry-houtaishouye"></i><em>后台首页</em>
	                    </li>
	                 </ul>
	                 <div class="title-right" id="titleRbox">
	                    <div class="go-right key-press pressKey" id="titleRight" title="滚动至最左侧"><i class="larry-icon larry-right"></i></div> 
	                    <div class="refresh key-press" id="refresh_iframe"><i class="larry-icon larry-shuaxin2"></i><cite>刷新</cite></div>
	                    <div class="often key-press" lay-filter='larryOperate' id="buttonRCtrl">
	                        <ul class="layui-nav posr">
	                            <li class="layui-nav-item posb">
	                              <a class="top"><i class="larry-icon larry-caozuo"></i><cite>常用操作</cite></a>
	                              <dl class="layui-nav-child">
	                                  <dd>
	                                      <a  data-eName="closeCurrent"><i class="larry-icon larry-guanbidangqianye"></i>关闭当前选项卡</a>
	                                  </dd>
	                                  <dd>
	                                      <a  data-eName="closeOther"><i class="larry-icon larry-guanbiqita"></i>关闭其他选项卡</a>
	                                  </dd>
	                                  <dd>
	                                      <a  data-eName="closeAll"><i class="larry-icon larry-guanbiquanbufenzu"></i>关闭全部选项卡</a>
	                                  </dd>
	                                  <dd>
	                                      <a  data-eName="refreshAdmin"><i class="larry-icon larry-kuangjia_daohang_shuaxin"></i>刷新最外层框架</a>
	                                  </dd>
	                                </dl>
	                            </li>
	                        </ul>
	                    </div>
	                    
	                 </div>
	             </div>
	             <div class="layui-tab-content">
	                  <div class="layui-tab-item layui-show">
	                      <iframe class="larry-iframe" data-id='0' name="ifr_0" id='ifr0' src="<?php echo U('Index/index',array('main'=>1));?>"></iframe>
	                  </div>
	             </div>
	        </div>
	    </div>
	    <!-- footer -->
	    <div class="layui-footer layui-larry-foot psob" id="larry-footer">
	    	   <div class="layui-main">
	               <div class="left-box" style="display:none;">
	                     DouCMS QQ：<a href="https://jq.qq.com/?_wv=1027&amp;k=42fC4vT" target="_blank"><img border="0" src="/yhhq/Public/images/group.png" title="DouCMS官方交流群"></a> 加群下载模板源码
	          
	               </div>
	               <p>2016-2017 © Write by 九月一十八,DouCMS. 版权所有,基于前端框架Layui</p> 
	         </div>
	    </div>
	    <!-- footer end -->
	    <!-- layui-layout-admin end -->
	</div>
	<!-- 主题配置 -->
	<div class="larryThemeContent" id="LarryThemeSet" style="display:none;">
	    <div class="larry-theme-form">
	        <h3>系统主题预设</h3>
	        <form action="" class="layui-form larry-theme-con">
	            <div class="layui-form-item select-theme">
	                <label class="layui-form-label">主题选择</label>
	                <div class="layui-input-block">
	                    <select lay-filter="larryTheme"  lay-verify="" id="themeName">
	                      <option value="larry">DouCMS默认主题</option>
	                      <option value="A">DouCMS深蓝主题</option>
	                      <option value="B">DouCMS墨绿主题</option>
	                      <option value="larry_">更多主题以后添加</option>
	                    </select>     
	                </div>
	            </div>
	            <div class="layui-form-item fullscreen">
	                <label class="layui-form-label">是否全屏</label>
	                <div class="layui-input-block">
	                    <input type="checkbox" lay-filter="fullscreen" lay-skin="switch"  value="1">
	                </div>
	            </div>
	            <div class="layui-form-item submit-form">
	                 <button class="layui-btn larry-button" lay-submit="" lay-filter="submitlocal">立即设置主题</button>
	                 <button type="reset" class="layui-btn layui-btn-primary">重置当前设置</button>
	            </div>
	        </form>
	    </div>
	</div>
	<!-- layui-body常用菜单定义 -->
	<div class="rightMenu" id="rightMenu" style="display: none;">
	   <ul>
	        <li data-target="refreshCur">
	            <i class="larry-icon " ></i>刷新当前页面
	        </li>
	        <li data-target="refreshKj">
	            <i class="larry-icon " ></i>刷新外层框架
	        </li>
	        <li data-target="closeCurrent">
	            <i class="larry-icon " ></i>关闭当前选项卡
	        </li>
	        <li data-target="closeOther">
	            <i class="larry-icon " ></i>关闭其他选项卡
	        </li>
	        <li data-target="closeAll">
	            <i class="larry-icon " ></i>全部关闭选项卡
	        </li>
	   </ul>
	</div>
	<!-- 屏幕锁屏 -->
	<div class="lock-screen" style="display: none;">
	   <div class="lock-wrapper" id="lock-screen">
	        <div id="time"></div>
	        <div class="lock-box">
	             <img src="/yhhq/Public/images/user.jpg" alt="">
	             <h1>admin</h1>
	             <form action="" class="layui-form lock-form">
	                  <div class="layui-form-item">
	                       <input type="password" name="lock_password" lay-verify="pass" placeholder="锁屏状态，请输入密码解锁" autocomplete="off" class="layui-input"  autofocus="">
	                  </div>
	                  <div class="layui-form-item">
	                       <button class="layui-btn larry-btn" id="unlock">立即解锁</button>
	                  </div>
	             </form>
	        </div>
	   </div>
	</div>
<script>
$(document).ready(function(){
	var angle = 0;
	setInterval(function(){
	    angle +=3;
	    $('.userface').rotate(angle);
	}, 50);
})

</script>

<!-- 加载js文件-->
<script type="text/javascript" src="/yhhq/Public/common/layui1.09/layui.js"></script> 
<script type="text/javascript" src="/yhhq/Public/js/jquery.rotate.min.js"></script> 
<!-- <script type="text/javascript" src="/yhhq/Public/js/larrycms.js"></script> -->
<script>
var navtab;
layui.config({
   base:'/yhhq/Public/js/lib/' //layui自定义layui组件目录
}).extend({
	larry:'larr',
	navtab:'navtab3',
	elemnts:'elements',
	common: 'common'
});
layui.use(['elements','jquery','layer','larry','navtab','form','common'],function(){
	var $ = layui.jquery,
	    layer = layui.layer,
	    device = layui.device(),
	    elements = layui.elements(),
	    larry = layui.larry(),
	    form = layui.form(),
	    common = layui.common;
      	navtab = layui.navtab({
        elem: '#larry-tab'
      });
	    
    // 页面禁止双击选中
    $('body').bind("selectstart", function() {return false;});

    $(document).ready(function(){
		// 浏览器兼容检查
		if (device.ie && device.ie < 9) {
			layer.alert('最低支持ie9，您当前使用的是古老的 IE' + device.ie + '！');
		}
		// 001界面初始化
		AdminInit();
		//绑定导航数据
		$.ajaxSettings.async = false;
		$.getJSON("<?php echo U('Index/index');?>",{
		//$.getJSON('/yhhq/Public/datas/menu.php?t='+new Date(), {
			Param: 'index_menu'
		}, function(result) {
			//console.log(result.left);
			larry.set({
				elem: '#menu',
				data: result.top,
				cached: false
			});
			larry.render();
			larry.set({
				elem: '#larrySideNav',
				data: result.left,
				spreadOne: true
			});
			larry.render();
			larry.on('click(side)', function(data){
				navtab.tabAdd(data.field);
			});
		});

		var $menu = $('#menu');
		$menu.find('li.layui-nav-item').each(function() {
			var $that = $(this);
			console.log($that);			
			//绑定一级导航的点击事件
			$that.on('click', function() {
				var id = $that.data('pid');
				//console.log(id);
				$that.removeClass("layui-nav-itemed");
				$.ajaxSettings.async = false;
				$.getJSON("<?php echo U('Index/index');?>", {
				//$.getJSON("/yhhq/Public/datas/menu.php", {
					pid: id,					
					Param: 'index_menu'
				}, function(result) {
					//console.log(result);
					larry.set({
						elem: '#larrySideNav',
						data: result,
						spreadOne: true
					});
					larry.render();
                    //监听左侧导航点击事件
					larry.on('click(side)', function(data){
						navtab.tabAdd(data.field);
					});
				});
			});

		});
		// 左侧导航点击事件			
		// 左侧导航点击事件			
		$menu.find('li[data-fid=0]').click();
		$("#larrySideNav").find("li").eq(0).addClass('layui-this');
        $.ajaxSettings.async = true;        
    }); 

    $('#larry-tab').bind("contextmenu", function () { return false; });
    
    // 常用操作
	$('#buttonRCtrl').find('dd').each(function() {
		$(this).on('click', function() {
			var eName = $(this).children('a').attr('data-eName');
			navtab.tabCtrl(eName);
		});
	});
    // 窗口自适应    
    $(window).on('resize', function() {
        AdminInit();
        // iframe窗口自适应
        var $content = $('#larry-tab .layui-tab-content');
        $content.height($(this).height() - 153);
        $content.find('iframe').each(function () {
            $(this).height($content.height());
        });
    }).resize();
    
    // 刷新iframe
    $("#refresh_iframe").click(function(){
       $(".layui-tab-content .layui-tab-item").each(function(){
          if($(this).hasClass('layui-show')){
             $(this).children('iframe')[0].contentWindow.location.reload(true);
          }
       });
    });
   
	function AdminInit(){
		$('.layui-layout-admin').height($(window).height());
		$('body').height($(window).height());
		$('#larry-body').width($('.layui-layout-admin').width() - $('#larry-side').width());
		$('#larry-footer').width($('.layui-layout-admin').width() - $('#larry-side').width());
	}
	
    //清除缓存
    $('#clearCached').on('click', function () {
        larry.cleanCached();
        layer.alert('缓存清除完成!本地存储数据也清理成功！', { icon: 1, title: '系统提示' }, function () {
            location.reload();//刷新
        });
    });

    // 设置主题
    var fScreen = localStorage.getItem("fullscreen_info");
    var themeName = localStorage.getItem('themeName');
	if (themeName) {
		$("body").attr("class", "");
		$("body").addClass("larryTheme-" + themeName);
	}
	if(fScreen && fScreen != 'false'){
		var fScreenIndex = layer.alert('按ESC退出全屏',{
            title:'进入全屏提示信息',
            skin: 'layui-layer-lan',
            closeBtn: 0,
            anim: 4 ,
            offset: '100px'
		},function(){
            entryFullScreen();
            $('#FullScreen').html('<i class="larry-icon larry-quanping"></i>退出全屏');
            layer.close(fScreenIndex);
		});
	}
    $('#larryTheme').on('click',function(){
        var fScreen = localStorage.getItem('fullscreen_info');
        var themeName  = localStorage.getItem('themeName');
        layer.open({
               type: 1,
			   title: false,
			   closeBtn: true,
			   shadeClose: false,
			   shade: 0.35,
			   area: ['450px', '300px'],
			   isOutAnim: true,
			   resize:false,
			   anim: Math.ceil(Math.random() * 6),
			   content: $('#LarryThemeSet').html(),
			   success: function(layero,index){
			   	   if(fScreen && fScreen != 'false'){
			   	   	   $("input[lay-filter='fullscreen']").attr("checked", "checked");
			   	   }
			   	   if(themeName){
			   	   	   $("#themeName option[value='"+themeName+"']").attr("selected","selected");
			   	   }
			   	   form.render();
			   }
        });
       
        // 全屏开启
        form.on('switch(fullscreen)',function(data){
            var fValue = data.elem.checked;
            localStorage.setItem('fullscreen_info',fValue); //fullscreen_info:fValue

        });
        // 主题设置
        form.on('select(larryTheme)',function(data){
            var themeValue = data.value;
            localStorage.setItem('themeName',themeValue);//themeName:themeValue
            if(themeName){
            	$("body").attr("class", "");
            	$("body").addClass("larryTheme-" + themeName);
            }
            form.render('select');
        });
        
        // form.on('submit(submitlocal)',function(data){
        	
        // })
    });
   
   
   // 全屏切换
   $('#FullScreen').bind('click',function(){
       var fullscreenElement =
            document.fullscreenElement ||
            document.mozFullScreenElement ||
            document.webkitFullscreenElement;
        if (fullscreenElement == null) {
            entryFullScreen();
            $(this).html('<i class="larry-icon larry-quanping"></i>退出全屏');
        } else {
            exitFullScreen();
             $(this).html('<i class="larry-icon larry-quanping"></i>全屏');
        }
   });

   // 进入全屏：
   function entryFullScreen(){
   	   var docE = document.documentElement;
   	   if(docE.requestFullScreen){
   	   	  docE.requestFullScreen();
   	   }else if(docE.mozRequestFullScreen){
   	   	  docE.mozRequestFullScreen();
   	   }else if(docE.webkitRequestFullScreen){
   	   	  docE.webkitRequestFullScreen();
   	   }
   }

   // 退出全屏
	function exitFullScreen() {
		var docE = document;
		if (docE.exitFullscreen) {
			docE.exitFullscreen();
		} else if (docE.mozCancelFullScreen) {
			docE.mozCancelFullScreen();
		} else if (docE.webkitCancelFullScreen) {
			docE.webkitCancelFullScreen();
		}
	}

    // 顶部左侧导航控制开关
	$('#toggle').click(function() {
		  var sideWidth = $('#larry-side').width();
		  var bodyW = $('#larry-body').width();
		  if(sideWidth === 200){
               bodyW += 203;
			   $('#larry-body').animate({
			   	  left: '0',
			   	  width: bodyW
			   });
			   $('#larry-footer').animate({
			   	  left: '0',
			   	  width: bodyW
			   });
			   $('#larry-side').animate({
			   	  width: '0'
			   });
		  }else{
		  	   bodyW -=203;
			   $('#larry-body').animate({
			   	  left: '203px',
			   	  width: bodyW
			   });
               $('#larry-footer').animate({
                  left: '203px',
                  width: bodyW
               });
               $('#larry-side').animate({
                  width: '200px'
               });
		  }
	});
	// 锁屏控制
    $('#lock').mouseover(function(){
   	   layer.tips('请按Alt+L快速锁屏！', '#lock', {
             tips: [1, '#FF5722'],
             time: 2000
       });
    });
    // 快捷键锁屏设置
    $(document).keydown(function(e){
         if(e.altKey && e.which == 76){
         	 lockSystem();
         }
    });
    checkLockStatus('0');
    // 锁定屏幕
   function lockSystem(){
   		
   	   var url = '../Public/datas/lock.php';
   	   $.post(
   	   	   url,
   	   	   function(data){
   	   	   if(data=='1'){
   	   	   	  checkLockStatus(1);
   	   	   }else{
              layer.alert('锁屏失败，请稍后再试！');
   	   	   }
   	   });
   	   startTimer();
   }
   //解锁屏幕
   function unlockSystem(){
        // 与后台交互代码已移除，根据需求定义或删除此功能
        
   	    checkLockStatus(0);
    }
   // 点击锁屏
   $('#lock').click(function(){
   	    lockSystem();
   });
   // 解锁进入系统
   $('#unlock').click(function(){
        unlockSystem();
   });
   // 监控lock_password 键盘事件
   $('#lock_password').keypress(function(e){
        var key = e.which;
        if (key == 13) {
            unlockSystem();
        }
    });

    function startTimer(){
   	    var today=new Date();
        var h=today.getHours();
        var m=today.getMinutes();
        var s=today.getSeconds();
        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        $('#time').html(h+":"+m+":"+s);
        t=setTimeout(function(){startTimer()},500);
   }
   // 锁屏状态检测
   function checkLockStatus(locked){
        // 锁屏
        if(locked == 1){
        	$('.lock-screen').show();
            $('#locker').show();
            $('#layui_layout').hide();
            $('#lock_password').val('');
        }else{
        	$('.lock-screen').hide();
            $('#locker').hide();
            $('#layui_layout').show();
        }
    }

   


	$('#dianzhan').click(function(event) {
		layer.open({
			type: 1,
			title: false,
			closeBtn: true,
			shadeClose: false,
			shade: 0.15,
			area: ['505px', '288px'],
			content: '<img src="../Public/images/dianzhan.jpg"/>'
		})
	});

	// 登出系统
	$('#logout').on('click',function(){
		var url ="<?php echo U('Login/logOut');?>";
		common.logOut('退出登陆提示！','你真的确定要退出系统吗？',url);
	})
     // 左侧导航菜单控制

})

</script>
</body>
</html>