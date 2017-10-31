<?php
/**
 * Winner
 * Winner
 */
defined('IN_IA') or exit('Access Denied');

function paycenter_order_status() {
	
	return array(
		'0' => array(
			'text' => '未支付',
			'class' => 'text-danger',
		),
		'1' => array(
			'text' => '已支付',
			'class' => 'text-success',
		),
		'2' => array(
			'text' => '已支付,退款中...',
			'class' => 'text-default',
		),
	);
}

function paycenter_order_types() {
	return array(
		'wechat' => '微信支付',
		'alipay' => '支付宝支付',
		'credit' => '余额支付',
		'baifubao' => '百付宝'
	);
}

function paycenter_order_trade_types() {
	return array(
		'native' => '扫码支付',
		'jsapi' => '公众号支付',
		'micropay' => '刷卡支付'
	);
}

function paycenter_check_login() {
	global $_W, $_GPC;
	if(empty($_W['uid']) && $_GPC['do'] != 'login') {
		message('抱歉，您无权进行该操作，请先登录', murl('entry', array('m' => 'paycenter', 'do' => 'login'), true, true), 'error');
	}
	if($_W['user']['type'] == ACCOUNT_OPERATE_CLERK) {
		isetcookie('__uniacid', $_W['user']['uniacid'], 7 * 86400);
		isetcookie('__uid', $_W['uid'], 7 * 86400);
	} else {
		message('非法访问', '', 'error');
	}
}
