<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
load()->func('communication');
set_time_limit(0);
$dos = array('ticket', 'forward', 'test', 'confirm');
$do = in_array($do, $dos) ? $do : 'forward';

load()->classs('weixin.platform');
$account_platform = new WeiXinPlatform();

$setting = setting_load('platform');
if ($do == 'forward') {
	if (empty($_GPC['auth_code'])) {
		message('授权登录失败，请重试', url('account/display'), 'error');
	}
	$auth_info = $account_platform->getAuthInfo($_GPC['auth_code']);
	$auth_refresh_token = $auth_info['authorization_info']['authorizer_refresh_token'];
	$auth_appid = $auth_info['authorization_info']['authorizer_appid'];

	$account_info = $account_platform->getAccountInfo($auth_appid);
	if (is_error($account_info)) {
		message('授权登录新建公众号失败，请重试', url('account/display'), 'error');
	}
	if (!empty($_GPC['test'])) {
		echo "此为测试平台接入返回结果：<br/> 公众号名称：{$account_info['authorizer_info']['nick_name']} <br/> 接入状态：成功";
		exit;
	}
	if ($account_info['authorizer_info']['service_type_info'] = '0' || $account_info['authorizer_info']['service_type_info'] == '1') {
		if ($account_info['authorizer_info']['verify_type_info']['id'] > '-1') {
			$level = '3';
		} else {
			$level = '1';
		}
	} elseif ($account_info['authorizer_info']['service_type_info'] = '2') {
		if ($account_info['authorizer_info']['verify_type_info']['id'] > '-1') {
			$level = '4';
		} else {
			$level = '2';
		}
	}
	if (!empty($account_info['authorizer_info']['alias'])) {
		$account_found = pdo_get('account_wechats', array('account' => $account_info['authorizer_info']['alias']));
		if (!empty($account_found)) {
			message('公众号已经在系统中接入，是否要更改为授权接入方式？ <div><a class="btn btn-primary" href="' . url('account/auth/confirm', array('level' => $level, 'auth_refresh_token' => $auth_refresh_token, 'auth_appid' => $auth_appid, 'acid' => $account_found['acid'], 'uniacid' => $account_found['uniacid'])) . '">是</a> &nbsp;&nbsp;<a class="btn btn-default" href="index.php">否</a></div>', '', 'tips');
		}
	}
	$account_insert = array(
			'name' => $account_info['authorizer_info']['nick_name'],
			'description' => '',
			'groupid' => 0,
	);
	if(!pdo_insert('uni_account', $account_insert)) {
		message('授权登录新建公众号失败，请重试', url('account/display'), 'error');
	}
	$uniacid = pdo_insertid();
	$template = pdo_fetch('SELECT id,title FROM ' . tablename('site_templates') . " WHERE name = 'default'");
	$style_insert = array(
		'uniacid' => $uniacid,
		'templateid' => $template['id'],
		'name' => $template['title'] . '_' . random(4),
	);
	pdo_insert('site_styles', $style_insert);
	$styleid = pdo_insertid();

	$multi_insert = array(
		'uniacid' => $uniacid,
		'title' => $account_insert['name'],
		'styleid' => $styleid,
	);
	pdo_insert('site_multi', $multi_insert);
	$multi_id = pdo_insertid();

	$unisetting_insert = array(
		'creditnames' => iserializer(array(
			'credit1' => array('title' => '积分', 'enabled' => 1),
			'credit2' => array('title' => '余额', 'enabled' => 1)
		)),
		'creditbehaviors' => iserializer(array(
			'activity' => 'credit1',
			'currency' => 'credit2'
		)),
		'uniacid' => $uniacid,
		'default_site' => $multi_id,
		'sync' => iserializer(array('switch' => 0, 'acid' => '')),
	);
	pdo_insert('uni_settings', $unisetting_insert);
	pdo_insert('mc_groups', array('uniacid' => $uniacid, 'title' => '默认会员组', 'isdefault' => 1));

	load()->model('module');
	module_build_privileges();

	$account_index_insert = array(
		'uniacid' => $uniacid,
		'type' => 3,
		'hash' => random(8),
		'isconnect' => 1
	);
	pdo_insert('account', $account_index_insert);
	$acid = pdo_insertid();

	$subaccount_insert = array(
		'acid' => $acid,
		'uniacid' => $uniacid,
		'name' => $account_insert['name'],
		'account' => $account_info['authorizer_info']['alias'],
		'original' => $account_info['authorizer_info']['user_name'],
		'level' => $level,
		'key' => $auth_appid,
		'auth_refresh_token' => $auth_refresh_token,
		'encodingaeskey' => $account_platform->encodingaeskey,
		'token' => $account_platform->token,
	);
	pdo_insert('account_wechats', $subaccount_insert);
	if(is_error($acid)) {
		message('授权登录新建公众号失败，请重试', url('account/display'), 'error');
	}
	if (empty($_W['isfounder'])) {
		pdo_insert('uni_account_users', array('uniacid' => $uniacid, 'uid' => $_W['uid'], 'role' => 'owner'));
	}
	pdo_update('uni_account', array('default_acid' => $acid), array('uniacid' => $uniacid));
	$headimg = ihttp_request($account_info['authorizer_info']['head_img']);
	$qrcode = ihttp_request($account_info['authorizer_info']['qrcode_url']);
	file_put_contents(IA_ROOT . '/attachment/headimg_'.$acid.'.jpg', $headimg['content']);
	file_put_contents(IA_ROOT . '/attachment/qrcode_'.$acid.'.jpg', $qrcode['content']);
	message('授权登录成功', url('account/display', array('type' => '3')), 'success');
} elseif ($do == 'confirm') {
	$auth_refresh_token = $_GPC['auth_refresh_token'];
	$auth_appid = $_GPC['auth_appid'];
	$level = intval($_GPC['level']);
	$acid = intval($_GPC['acid']);
	$uniacid = intval($_GPC['uniacid']);
	
	pdo_update('account_wechats', array(
		'auth_refresh_token' => $auth_refresh_token,
		'encodingaeskey' => $account_platform->encodingaeskey,
		'token' => $account_platform->token,
		'level' => $level,
		'key' => $auth_appid,
	), array('acid' => $acid));
	pdo_update('account', array('isconnect' => '1', 'type' => '3', 'isdeleted' => 0), array('acid' => $acid));
	cache_delete("uniaccount:{$uniacid}");
	cache_delete("unisetting:{$uniacid}");
	cache_delete("accesstoken:{$acid}");
	cache_delete("jsticket:{$acid}");
	cache_delete("cardticket:{$acid}");
	cache_delete("account:auth:refreshtoken:{$acid}");
	message('更改公众号授权接入成功', url('account/display', array('type' => '3')), 'success');
} elseif ($do == 'ticket') {
	$post = file_get_contents('php://input');
	WeUtility::logging('debug', 'account-ticket' . $post);
	$encode_ticket = isimplexml_load_string($post, 'SimpleXMLElement', LIBXML_NOCDATA);
	if (empty($post) || empty($encode_ticket)) {
		exit('fail');
	}
	$decode_ticket = aes_decode($encode_ticket->Encrypt, $setting['platform']['encodingaeskey']);
	$ticket_xml = isimplexml_load_string($decode_ticket, 'SimpleXMLElement', LIBXML_NOCDATA);
	if (empty($ticket_xml)) {
		exit('fail');
	}
	if (!empty($ticket_xml->ComponentVerifyTicket) && $ticket_xml->InfoType == 'component_verify_ticket') {
		cache_write('account:ticket', strval($ticket_xml->ComponentVerifyTicket));
	}
	exit('success');
} elseif ($do == 'test') {
	$authurl = $account_platform->getAuthLoginUrl();
	echo '<a href="'.$authurl.'%26test=1"><img src="https://open.weixin.qq.com/zh_CN/htmledition/res/assets/res-design-download/icon_button3_2.png" /></a>';
}