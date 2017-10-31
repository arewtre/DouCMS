<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  echo $_W['account']['name'];?>微信管理系统</title>
	<meta name="keywords" content="<?php  if(empty($_W['page']['copyright']['keywords'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信号营销平台,微信,微信公众平台<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['keywords'];?><?php  } ?>" />
	<meta name="description" content="<?php  if(empty($_W['page']['copyright']['description'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微小区是国内最完善移动网站及移动互联网技术解决方案。<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['description'];?><?php  } ?>" />
	<link rel="shortcut icon" href="<?php  echo $_W['siteroot'];?><?php  echo $_W['config']['upload']['attachdir'];?>/<?php  if(!empty($_W['setting']['copyright']['icon'])) { ?><?php  echo $_W['setting']['copyright']['icon'];?><?php  } else { ?>images/global/wechat.jpg<?php  } ?>" />
	<!--模板-->
	<link rel="stylesheet" type="text/css" href="./resource/mpqq/header.css">
	<link rel="stylesheet" type="text/css" href="./resource/mpqq/base.css">
	<link rel="stylesheet" type="text/css" href="./resource/mpqq/common.css">
	<link rel="stylesheet" type="text/css" href="./resource/mpqq/menu.css">
	<link rel="stylesheet" type="text/css" href="./resource/mpqq/ui-mes-select.css">
	<link href="./resource/js/xop/x0popup.min.css?ver=1.1" rel="stylesheet">
	<!--模板-->
	
	<!---默认-->
	<link href="./resource/css/bootstrap.min.css" rel="stylesheet">
	<link href="./resource/css/font-awesome.min.css" rel="stylesheet">
	<link href="./resource/css/common.css" rel="stylesheet">
	<script>var require = { urlArgs: 'v=<?php  echo date('YmdH');?>' };</script>
	<script src="./resource/js/lib/jquery-1.11.1.min.js"></script>
	<script src="./resource/js/app/util.js"></script>
	<script src="./resource/js/require.js?ver=1.0"></script>
	<script src="./resource/js/app/config.js"></script>
	<script src="./resource/js/xop/x0popup.min.js"></script> 
	<!--[if lt IE 9]>
		<script src="./resource/js/html5shiv.min.js"></script>
		<script src="./resource/js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
	if(navigator.appName == 'Microsoft Internet Explorer'){
		if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	
	window.sysinfo = {
<?php  if(!empty($_W['uniacid'])) { ?>
		'uniacid': '<?php  echo $_W['uniacid'];?>',
<?php  } ?>
<?php  if(!empty($_W['acid'])) { ?>
		'acid': '<?php  echo $_W['acid'];?>',
<?php  } ?>
<?php  if(!empty($_W['openid'])) { ?>
		'openid': '<?php  echo $_W['openid'];?>',
<?php  } ?>
<?php  if(!empty($_W['uid'])) { ?>
		'uid': '<?php  echo $_W['uid'];?>',
<?php  } ?>
		'siteroot': '<?php  echo $_W['siteroot'];?>',
		'siteurl': '<?php  echo $_W['siteurl'];?>',
		'attachurl': '<?php  echo $_W['attachurl'];?>',
		'attachurl_local': '<?php  echo $_W['attachurl_local'];?>',
<?php  if(defined('MODULE_URL')) { ?>
		'MODULE_URL': '<?php echo MODULE_URL;?>',
<?php  } ?>
		'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'}
	};
	</script>


	

	<script type="text/javascript">
	if(navigator.appName == 'Microsoft Internet Explorer'){
		if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	
	window.sysinfo = {
<?php  if(!empty($_W['uniacid'])) { ?>
		'uniacid': '<?php  echo $_W['uniacid'];?>',
<?php  } ?>
<?php  if(!empty($_W['acid'])) { ?>
		'acid': '<?php  echo $_W['acid'];?>',
<?php  } ?>
<?php  if(!empty($_W['openid'])) { ?>
		'openid': '<?php  echo $_W['openid'];?>',
<?php  } ?>
<?php  if(!empty($_W['uid'])) { ?>
		'uid': '<?php  echo $_W['uid'];?>',
<?php  } ?>
		'siteroot': '<?php  echo $_W['siteroot'];?>',
		'siteurl': '<?php  echo $_W['siteurl'];?>',
		'attachurl': '<?php  echo $_W['attachurl'];?>',
<?php  if(defined('MODULE_URL')) { ?>
		'MODULE_URL': '<?php echo MODULE_URL;?>',
<?php  } ?>
		'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'}
	};
	</script>
	<!---默认-->
	<style type="text/css">
body {
background-color: #edf1f5;
min-width: 1263px;
overflow: hidden;
}
.navbar-static-top {
background-color: #00a5e0;
border-color: #00a5e0;

}
a:hover, a:focus {
color: #3393a0;
text-decoration: none;
}
a {
color: #4c5161;
text-decoration: none;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
color: #45a9b5 ;
background-color: rgba(255, 255, 255, 0) ;
}
.nav.nav-tabs {
border-color: #dbdee5 ;
border-bottom: 1px solid #dbdee5 ;
font-size: 16px;
margin-bottom: 20px;
}
.nav-tabs>li {
margin-right: 50px ;
float: left;
margin-bottom: -1px;
}
.nav-tabs>li.active>a {
	margin-bottom: -1px;
border-bottom: 3px solid #00a5e0 ;
border: none ;
}
.nav-tabs>li.active {
border-bottom: 3px solid #45a9b5 ;
}
.nav-tabs>li>a:hover {
border: none !important;
}
.nav-tabs>li>a {
border: none !important;
}
.nav>li>a:hover, .nav>li>a:focus {
text-decoration: none;
background-color: rgba(255, 255, 255, 0) ;
}
.nav-tabs>li>a {
padding: 10px 0px ;
}

.btn-primary {
border: 1px solid #45a9b5;
background-color: #45a9b5;
color: #fff;
}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open>.dropdown-toggle.btn-primary {
color: #fff;
background-color: #3393a0;
border-color: #3393a0;
}
.btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default {
color: #2d3441;
border-color: #a6a6a6;
background-color: rgba(255, 255, 255, 0) ;
}
.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-default, .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-default {
border: none !important;
color: #757588 !important;

}
.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-primary, .bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-primary {
border: none !important;
color: #FFF !important;
background: #00a5e0 !important;
}
.alert-danger,.alert-info,.panel-info>.panel-heading{
		border-color:#faebcc;
		color:#8a6d3b;
		background-color:#fcf8e3;
	}
	.panel-info{
		border-color:#faebcc;
	}
	.text-danger{
		color:#FBC15E;
	}
.panel-default>.panel-heading {
background-color: #FFF;
}
.label-info {
background-color: #45a9b5;
}	
.well{
	background-color: #FFF;
margin: 0 30px 0 30px;
	}
.nav .open>a, .nav .open>a:hover, .nav .open>a:focus {
background-color: #3393a0;
border-color: #3393a0;
color: white;
}

.header_avatar{
max-width: 200px;
min-width: 160px;
height: 62px;
}
.topbar-notice .dropdown-menu {
width: 320px;
left: -120px;
padding: 0;
}
.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus {
color: #fff;
background-color: #0AB0EB;
}
.topbar-notice .topbar-notice-body ul li a h3 {

max-width: 240px;
line-height: 1.1;
}
	</style>


</head>
<body class="zh_CN">