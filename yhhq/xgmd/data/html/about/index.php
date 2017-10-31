<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0,maximum-scale=1.0, user-scalable=no" />
<title>关于我们</title>
</head>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	html,body{
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		overflow: hidden;
		font-family: "微软雅黑";
	}
	img{
		width: 100%;
		margin: 0;
		padding: 0;
	}
	.version{
		position: absolute;
		width: 20vw;
		top: 50vw;
		left: 40vw;
		text-align: center;
		z-index: 99;
		color: #6F5A57;
		font-size: 4vw;
		line-height: 6vw;
		padding-top: 1vw;
		border-radius: 5px;
		border: 1px solid #6F5A57;
	}
</style>
<body style="padding:0; margin:0;width:100%;height:100%" ">
<div class="version">V<?php echo $_GET['v'];?></div>
<img src="img/about.jpg" style="width:100%;height:100%" >
</body>
</html>