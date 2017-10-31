<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DouCMS1.0后台登录界面</title>
	<meta name="keywords" content="DouCMS后台登录界面" />
    <meta name="description" content="DouCMS Version:1.09" />
	<meta name="Author" content="larry" />
	<meta name="renderer" content="webkit">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">	
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<meta name="format-detection" content="telephone=no">	
	<link rel="Shortcut Icon" href="/favicon.ico" />
	<!-- load css -->
	<link rel="stylesheet" type="text/css" href="/htdocs/Public/common/layui/css/layui.css" media="all">
	<link rel="stylesheet" type="text/css" href="/htdocs/Public/css/login.css" media="all">
</head>
<body>
<div class="larry-canvas" id="canvas"></div>
<div class="layui-layout layui-layout-login">
	<h1>
		 <strong>DouCMS后台管理系统</strong>
		 <em>Management System</em>
	</h1>
	<form class="layui-form layui-form-pane">
	<div class="layui-user-icon larry-login">
		 <input type="text" name="username" required class="login_txtbx" lay-verify="username" placeholder="账号"/>
	</div>
	<div class="layui-pwd-icon larry-login">
		 <input type="password" name="password" required class="login_txtbx" lay-verify="password" placeholder="密码" />
	</div>
    <div class="layui-val-icon larry-login">
    	<div class="layui-code-box">
    		<div style="width:90%;padding-right:0"class="verifyImg" id="captcha"></div>
    	</div>
    </div>
    <div class="layui-submit larry-login">
    	<input type="button" value="立即登陆" class="submit_btn" lay-submit="" lay-filter="sub"/>
    </div>
    <div class="layui-login-text">
    	<p>© 2016-2017 DouCMS 版权所有</p>
        <p>备案号 : 苏ICP备16048545号 . <a href="http://www.linxinran.cn" title="">http://www.linxinran.cn</a></p>
    </div>
    </form>
</div>
<script type="text/javascript" src="/htdocs/Public/common/layui1.09/layui.js"></script>
<script type="text/javascript" src="/htdocs/Public/common/js/jquery-1.12.4.min.js"></script>
<script src="http://static.geetest.com/static/tools/gt.js"></script>
<script type="text/javascript" src="/htdocs/Public/common/jsplugin/jparticle.jquery.js"></script>
<!-- <script type="text/javascript" src="/htdocs/Public/common/js/larry-canvs.js"></script> -->

<div style="display:none">
</div>
<script>
layui.use(['form', 'layer'], function () {
    var $ = layui.jquery,
    form = layui.form(),
    layer = layui.layer;

    // 登录表单验证
    form.verify({
        username: function (value) {
            if (value == "") {
                return "请输入用户名";
            }
        },
        password: function (value) {
            if (value == "") {
                return "请输入密码";
            }
        }
    });

	form.on('submit(sub)', function (data) {	
	    $.post("<?php echo U('Login/login');?>",data.field,function(res){
	        if(res.code > 0){
	            layer.msg(res.msg,{time:1800},function(){
	            	 window.top.location.href  = "<?php echo U('Index/index');?>";
	            });
	        }else{
	            layer.msg(res.msg,{time:1800});
	        }
	    });
	    return false;
	});

    window.jQuery = window.$ = layui.jquery;
    $(".layui-canvs").width($(window).width());
    $(".layui-canvs").height($(window).height());
    
    $(function(){
        $("#canvas").jParticle({
            background: "#141414",
            color: "#E5E5E5"
        });
    });
})

	var handler = function (captchaObj) {
        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#captcha");
        // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode    
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
     };
     
     $.get("<?php echo U('Login/geetest_show_verify');?>", function(data) {
    	    // 使用initGeetest接口
    	    // 参数1：配置参数，与创建Geetest实例时接受的参数一致
    	    // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
    	    initGeetest({
    	        gt: data.gt,
    	        challenge: data.challenge,
    	        product: "float", // 产品形式
    	        offline: !data.success
    	    }, handler);
    	},'json');

</script>
</body>
</html>