<?php
header ( "Content-Type: text/html;charset=utf-8" );
require_once "example/WxPay.JsApiPay.php";
$jsApiPay = new JsApiPay ();
$openid = $jsApiPay->GetOpenid ();
$url = urldecode ( $_GET ['_redirecturl'] );
if (strpos ( $url, '?' ) === false) {
	$returnUrl = $url . "?openid=" . $openid . "&scope=snsapi_base";
} else {
	$returnUrl = $url . "&openid=" . $openid . "&scope=snsapi_base";
}
header ( "Location:" . $returnUrl );
exit ();