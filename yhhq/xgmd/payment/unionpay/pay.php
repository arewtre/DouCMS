<?php
/**
 * Winner
 * Winner
 */
define('IN_MOBILE', true);
require '../../framework/bootstrap.inc.php';
require '../../app/common/bootstrap.app.inc.php';
load()->app('common');
load()->app('template');

$sl = $_GPC['ps'];
$params = @json_decode(base64_decode($sl), true);

$setting = uni_setting($_W['uniacid'], array('payment'));
if(!is_array($setting['payment'])) {
	exit('没有设定支付参数.');
}
$payment = $setting['payment']['unionpay'];
require '__init.php';

if (!empty($_POST) && verify($_POST) && $_POST['respMsg'] == 'success') {
	$sql = 'SELECT * FROM ' . tablename('core_paylog') . ' WHERE `uniontid`=:uniontid';
	$params = array();
	$params[':uniontid'] = $_POST['orderId'];
	$log = pdo_fetch($sql, $params);
	if(!empty($log) && $log['status'] == '0') {
		$log['tag'] = iunserializer($log['tag']);
		$log['tag']['queryId'] = $_POST['queryId'];

		$record = array();
		$record['status'] = 1;
		$record['tag'] = iserializer($log['tag']);
		pdo_update('core_paylog', $record, array('plid' => $log['plid']));
				if($log['is_usecard'] == 1 && $log['card_type'] == 1 &&  !empty($log['encrypt_code']) && $log['acid']) {
			load()->classs('coupon');
			$acc = new coupon($log['acid']);
			$codearr['encrypt_code'] = $log['encrypt_code'];
			$codearr['module'] = $log['module'];
			$codearr['card_id'] = $log['card_id'];
			$acc->PayConsumeCode($codearr);
		}
		if($log['is_usecard'] == 1 && $log['card_type'] == 2) {
			$now = time();
			$log['card_id'] = intval($log['card_id']);
			pdo_query('UPDATE ' . tablename('activity_coupon_record') . " SET status = 2, usetime = {$now}, usemodule = '{$log['module']}' WHERE uniacid = :aid AND couponid = :cid AND uid = :uid AND status = 1 LIMIT 1", array(':aid' => $_W['uniacid'], ':uid' => $log['openid'], ':cid' => $log['card_id']));
		}
	}
	$site = WeUtility::createModuleSite($log['module']);
	if(!is_error($site)) {
		$method = 'payResult';
		if (method_exists($site, $method)) {
			$ret = array();
			$ret['weid'] = $log['uniacid'];
			$ret['uniacid'] = $log['uniacid'];
			$ret['result'] = 'success';
			$ret['type'] = $log['type'];
			$ret['from'] = 'return';
			$ret['tid'] = $log['tid'];
			$ret['uniontid'] = $log['uniontid'];
			$ret['user'] = $log['openid'];
			$ret['fee'] = $log['fee'];
			$ret['tag'] = $log['tag'];
						$ret['is_usecard'] = $log['is_usecard'];
			$ret['card_fee'] = $log['card_fee'];
			$ret['card_id'] = $log['card_id'];
			$site->$method($ret);
			exit('success');
		}
	}
}
$sql = 'SELECT * FROM ' . tablename('core_paylog') . ' WHERE `plid`=:plid';
$paylog = pdo_fetch($sql, array(':plid' => $params['tid']));
if(!empty($paylog) && $paylog['status'] != '0') {
	exit('这个订单已经支付成功, 不需要重复支付.');
}
$auth = sha1($sl . $paylog['uniacid'] . $_W['config']['setting']['authkey']);
if($auth != $_GPC['auth']) {
	exit('参数传输错误.');
}
$_W['openid'] = intval($paylog['openid']);

$params = array(
	'version' => '5.0.0',
	'encoding' => 'utf-8',
	'certId' => getSignCertId(),
	'txnType' => '01',
	'txnSubType' => '01',
	'bizType' => '000201',
	'frontUrl' =>  SDK_FRONT_NOTIFY_URL . '?i='.$_W['uniacid'],
	'backUrl' => SDK_BACK_NOTIFY_URL . '?i='.$_W['uniacid'],
	'signMethod' => '01',
	'channelType' => '08',
	'accessType' => '0',
	'merId' => SDK_MERID,
	'orderId' => $paylog['uniontid'],
	'txnTime' => date('YmdHis'),
	'txnAmt' => $paylog['fee'] * 100,
	'currencyCode' => '156',
	'defaultPayType' => '0001',
	'reqReserved' => $_W['uniacid'],
);
sign($params);
$html_form = create_html($params, SDK_FRONT_TRANS_URL);
echo $html_form;