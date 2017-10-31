<?php 
require_once "jssdk.php";
$jssdk = new JSSDK ( "wx2f25c11821d36399", "e3edfa7ae459a9a68ef3fd740de8c216" );
if($_GET['_act']=="ticket"){
	echo json_encode($jssdk->getJsApiTicket());
	exit();
}

if($_GET['_act']=='accessToken'){
	echo json_encode( $jssdk->getAccessToken());
	exit();
}

if($_GET['_act']=='accessTokenRefresh'){
	echo json_encode( $jssdk->getAccessTokenRefresh());
	exit();
}

?>