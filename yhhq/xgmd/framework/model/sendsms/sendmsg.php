<?php
include "TopSdk.php"; date_default_timezone_set('Asia/Shanghai');
$settings = $_W['setting']['copyright'];
$appkey=$_REQUEST['appkey'];
$_SESSION['v_code']=rand(1000,9999);
$mobile=$_REQUEST['phone'];
//判断手机的正确格式
if(preg_match("/^1[34578]{1}\d{9}$/",$mobile)){  
   
}else{  
    message('请输入正确的手机号码！');
}
//计算时间，两次获取手机验证码的时间不能小于1分钟
if($_SESSION['newTime']!=''){
	if(time()-$_SESSION['newTime']<60){
		die('两次验证码相隔必须大于1分钟');
	}else{
		$_SESSION['newTime']=time();
	}
}else{
	$_SESSION['newTime']=time();
}
$secret=$_REQUEST['secret'];
 $c = new TopClient;
$c->appkey = $appkey;
$c->secretKey = $secret;
$req = new AlibabaAliqinFcSmsNumSendRequest;
$req->setExtend("123454");
$req->setSmsType("normal");
$req->setSmsFreeSignName($_REQUEST['qianming']);
$req->setSmsParam("{\"name\":\"".$_REQUEST['name']."\",\"phone\":\"".$_REQUEST['phonenum']."\",\"day\":\"".$_REQUEST['phonenum']."\"}");
$req->setRecNum($mobile);
$req->setSmsTemplateCode($_REQUEST['moban']);
$resp = $c->execute($req);
echo "发送成功，请注意查收";
var_dump($resp);
?>


