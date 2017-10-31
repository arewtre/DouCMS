<?php
/**
 * Winner
 * Winner
 */
defined('IN_IA') or exit('Access Denied');
abstract class Pay {
	public static function create($type = 'weixin') {
		if($type == 'weixin') {
			load()->classs('weixin.pay');
			return new WeiXinPay();
		}
		if($type == 'alipay') {
			load()->classs('ali.pay');
			return new AliPay();
		}
		return null;
	}

	
	public function buildPayLog($params) {
		global $_W;
		if(!is_array($params) || empty($params['module']) || empty($params['tid']) || empty($params['fee']) || empty($params['type'])) {
			return error(-1, '参数错误');
		}
		$log = pdo_get('core_paylog', array('tid' => $params['tid'], 'uniacid' => $_W['uniacid'], 'module' => $params['tid']));
		if(!empty($log)) {
			return $log['plid'];
		}
		$moduleid = pdo_fetchcolumn("SELECT mid FROM ".tablename('modules')." WHERE name = :name", array(':name' => $params['module']));
		$moduleid = empty($moduleid) ? '000000' : sprintf("%06d", $moduleid);
		$data = array(
			'uniacid' => $_W['uniacid'],
			'acid' => $_W['acid'],
			'openid' => $params['openid'],
			'module' => $params['module'],
			'fee' => $params['fee'],
			'card_fee' => $params['card_fee'],
			'tid' => $params['tid'],
			'type' => $params['type'],
			'uniontid' => date('YmdHis') . $moduleid . random(8,1),
			'status' => 0,
			'is_usecard' => 0,
			'card_id' => 0,
			'encrypt_code' => '',
		);
		pdo_insert('core_paylog', $data);
		return pdo_insertid();
	}
}