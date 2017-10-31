<?php
/**
 * Winner Copyright (c) 2015 winnerinf.com
 * Winner
 */
defined('IN_IA') or exit('Access Denied');

function card_setting($uniacid = 0) {
	global $_W;
	$uniacid = intval($uniacid);
	if($uniacid <= 0) {
		$uniacid = $_W['uniacid'];
	}
	$data = pdo_get('mc_card', array('uniacid' =>$uniacid));
	if(empty($data)) {
		return error(-1, '会员卡不存在或已经被删除');
	}
	if(!empty($data['color'])) {
		$data['color'] = iunserializer($data['color']);
	}
	$data['color'] = iunserializer($data['color']);
	$data['background'] = iunserializer($data['background']);
	$data['fields'] = iunserializer($data['fields']);
	$data['discount'] = iunserializer($data['discount']);
	if(!empty($data['discount']) && $data['discount_type'] != 0) {
		$discount = array();
		foreach($data['discount'] as $key=>$val) {
			$key_condition = 'condition_'.$data['discount_type'];
			$key_discount = 'discount_'.$data['discount_type'];
			$discount[$key] = array(
				'condition' => $val[$key_condition],
				'discount' => ($data['discount_type'] == 1 ? $val[$key_discount] : ($val[$key_discount]/10)),
			);
		}
		$data['discount'] = $discount;
	}
	$data['grant'] = iunserializer($data['grant']);
	return $data;
}

function card_member($uid = 0) {
	global $_W;
	$uid = intval($uid);
	if($uid <= 0) {
		$uid = $_W['member']['uid'];
	}
	$data = pdo_get('mc_card_members', array('uniacid' => $_W['uniacid'], 'uid' => $uid));
	if(empty($data)) {
		return error(-1, '会员还没有领取会员卡');
	}
	return $data;
}

function card_credit_set() {
	global $_W;
	$set = array();
	$set = pdo_get('mc_card_credit_set', array('uniacid' => $_W['uniacid']));
	if(!empty($set)) {
		$set['sign'] = iunserializer($set['sign']);
		$set['share'] = iunserializer($set['share']);
	}
	return $set;
}


function card_notice_stat() {
	global $_W;
	$new_id = pdo_fetchcolumn('SELECT notice_id FROM ' . tablename('mc_card_notices_unread') . ' WHERE uniacid = :uniacid AND uid = :uid AND type = 1 ORDER BY notice_id DESC LIMIT 1', array(':uid' => $_W['member']['uid'], ':uniacid' => $_W['uniacid']));
	$new_id = intval($new_id);

	$notices = pdo_fetchall('SELECT id FROM ' . tablename('mc_card_notices') . ' WHERE uniacid = :uniacid AND type = 1 AND (groupid = 0 OR groupid = :groupid) AND id > :id', array(':uniacid' => $_W['uniacid'], ':groupid' => $_W['member']['groupid'], ':id' => $new_id));
	if(!empty($notices)) {
		foreach($notices as &$notice) {
			$insert = array(
				'uniacid' => $_W['uniacid'],
				'uid' => $_W['member']['uid'],
				'notice_id' => $notice['id'],
				'is_new' => 1,
				'type' => 1,
			);
			pdo_insert('mc_card_notices_unread', $insert);
		}
	}
	$total = 0;
	$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_card_notices_unread') . ' WHERE uniacid = :uniacid AND uid = :uid AND is_new = 1', array(':uniacid' => $_W['uniacid'], ':uid' => $_W['member']['uid']));
	return $total;
}
