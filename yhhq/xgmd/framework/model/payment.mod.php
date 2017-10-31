<?php

/**
 * Winner
 * Winner
 */

defined('IN_IA') or exit('Access Denied');

define('ALIPAY_GATEWAY', 'https://mapi.alipay.com/gateway.do');


function alipay_build($params, $alipay = array()) {
	global $_W;
	$tid = $params['uniontid'];
	$set = array();
	$set['service'] = 'alipay.wap.create.direct.pay.by.user';
	$set['partner'] = $alipay['partner'];
	$set['_input_charset'] = 'utf-8';
	$set['sign_type'] = 'MD5';
	$set['notify_url'] = $_W['siteroot'] . 'payment/alipay/notify.php';
	$set['return_url'] = $_W['siteroot'] . 'payment/alipay/return.php';
	$set['out_trade_no'] = $tid;
	$set['subject'] = $params['title'];
	$set['total_fee'] = $params['fee'];
	$set['seller_id'] = $alipay['account'];
	$set['payment_type'] = 1;
	$set['body'] = $_W['uniacid'];
	$prepares = array();
	foreach($set as $key => $value) {
		if($key != 'sign' && $key != 'sign_type') {
			$prepares[] = "{$key}={$value}";
		}
	}
	sort($prepares);
	$string = implode('&', $prepares);
	$string .= $alipay['secret'];
	$set['sign'] = md5($string);

	$response = ihttp_request(ALIPAY_GATEWAY . '?' . http_build_query($set, '', '&'), array(), array('CURLOPT_FOLLOWLOCATION' => 0));
	return array('url' => $response['headers']['Location']);
}


function wechat_build($params, $wechat) {
	global $_W;
	load()->func('communication');
	if (empty($wechat['version']) && !empty($wechat['signkey'])) {
		$wechat['version'] = 1;
	}
	$wOpt = array();
	if ($wechat['version'] == 1) {
		$wOpt['appId'] = $wechat['appid'];
		$wOpt['timeStamp'] = TIMESTAMP;
		$wOpt['nonceStr'] = random(8);
		$package = array();
		$package['bank_type'] = 'WX';
		$package['body'] = $params['title'];
		$package['attach'] = $_W['uniacid'];
		$package['partner'] = $wechat['partner'];
		$package['out_trade_no'] = $params['uniontid'];
		$package['total_fee'] = $params['fee'] * 100;
		$package['fee_type'] = '1';
		$package['notify_url'] = $_W['siteroot'] . 'payment/wechat/notify.php';
		$package['spbill_create_ip'] = CLIENT_IP;
		$package['time_start'] = date('YmdHis', TIMESTAMP);
		$package['time_expire'] = date('YmdHis', TIMESTAMP + 600);
		$package['input_charset'] = 'UTF-8';
		ksort($package);
		$string1 = '';
		foreach($package as $key => $v) {
			if (empty($v)) {
				continue;
			}
			$string1 .= "{$key}={$v}&";
		}
		$string1 .= "key={$wechat['key']}";
		$sign = strtoupper(md5($string1));

		$string2 = '';
		foreach($package as $key => $v) {
			$v = urlencode($v);
			$string2 .= "{$key}={$v}&";
		}
		$string2 .= "sign={$sign}";
		$wOpt['package'] = $string2;

		$string = '';
		$keys = array('appId', 'timeStamp', 'nonceStr', 'package', 'appKey');
		sort($keys);
		foreach($keys as $key) {
			$v = $wOpt[$key];
			if($key == 'appKey') {
				$v = $wechat['signkey'];
			}
			$key = strtolower($key);
			$string .= "{$key}={$v}&";
		}
		$string = rtrim($string, '&');

		$wOpt['signType'] = 'SHA1';
		$wOpt['paySign'] = sha1($string);
		return $wOpt;
	} else {
		$package = array();
		$package['appid'] = $wechat['appid'];
		$package['mch_id'] = $wechat['mchid'];
		$package['nonce_str'] = random(8);
		$package['body'] = $params['title'];
		$package['attach'] = $_W['uniacid'];
		$package['out_trade_no'] = $params['uniontid'];
		$package['total_fee'] = $params['fee'] * 100;
		$package['spbill_create_ip'] = CLIENT_IP;
		$package['time_start'] = date('YmdHis', TIMESTAMP);
		$package['time_expire'] = date('YmdHis', TIMESTAMP + 600);
		$package['notify_url'] = $_W['siteroot'] . 'payment/wechat/notify.php';
		$package['trade_type'] = 'JSAPI';
		$package['openid'] = $_W['fans']['from_user'];
		ksort($package, SORT_STRING);
		$string1 = '';
		foreach($package as $key => $v) {
			if (empty($v)) {
				continue;
			}
			$string1 .= "{$key}={$v}&";
		}
		$string1 .= "key={$wechat['signkey']}";
		$package['sign'] = strtoupper(md5($string1));
		$dat = array2xml($package);
		$response = ihttp_request('https://api.mch.weixin.qq.com/pay/unifiedorder', $dat);
		if (is_error($response)) {
			return $response;
		}
		$xml = @isimplexml_load_string($response['content'], 'SimpleXMLElement', LIBXML_NOCDATA);
		if (strval($xml->return_code) == 'FAIL') {
			return error(-1, strval($xml->return_msg));
		}
		if (strval($xml->result_code) == 'FAIL') {
			return error(-1, strval($xml->err_code).': '.strval($xml->err_code_des));
		}
		$prepayid = $xml->prepay_id;
		$wOpt['appId'] = $wechat['appid'];
		$wOpt['timeStamp'] = TIMESTAMP;
		$wOpt['nonceStr'] = random(8);
		$wOpt['package'] = 'prepay_id='.$prepayid;
		$wOpt['signType'] = 'MD5';
		ksort($wOpt, SORT_STRING);
		foreach($wOpt as $key => $v) {
			$string .= "{$key}={$v}&";
		}
		$string .= "key={$wechat['signkey']}";
		$wOpt['paySign'] = strtoupper(md5($string));
		return $wOpt;
	}
}