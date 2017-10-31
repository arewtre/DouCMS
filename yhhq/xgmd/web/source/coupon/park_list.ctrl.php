<?php
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
if ($do == "post") {
	if ($_GPC ['add'] == 1) {
		$coupon = array ();
		$coupon ['name'] = $_GPC ['coupon_name'];
		$coupon ['coupon_desc'] = $_GPC ['coupon_desc'];
		$coupon ['type'] = $_GPC ['coupon_type'];
		$coupon ['dis_type'] = $_GPC ['dis_type'];
		$coupon ['dis_value'] = $_GPC ['dis_value'];
		$coupon ['dis_value'] = $_GPC ['dis_value'];
		$coupon ['min_amount'] = $_GPC ['min_amount'];
		$coupon ['issue_time_start'] = $_GPC ['issue_time'] ['start'];
		$coupon ['issue_time_end'] = $_GPC ['issue_time'] ['end'];
		$coupon ['use_time_type'] = $_GPC ['use_time_type'];
		$coupon ['use_time_end'] = $_GPC ['use_time_end'];
		$coupon ['use_time_hour'] = $_GPC ['use_time_hour'];
		$coupon ['sum_total'] = $_GPC ['sum_total'];
		$coupon ['remain_total'] = $_GPC ['sum_total'];
		$coupon ['ratio_pay'] = $_GPC ['ratio_pay'];
		$coupon ['reg_time'] = date ( "Y-m-d h:i:s" );
		$coupon ['check_state'] = 0;
		pdo_insert ( 'cp_coupon', $coupon );
	} else {
		template ( 'coupon/park_list' );
		exit ();
	}
	$do = "display";
}

$pindex = max ( 1, intval ( $_GPC ['page'] ) );
$psize = 15;
if ($do == "display") {
	$condition = ' WHERE type = 4';
	$params = array ();
	$limit = ' LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$total = pdo_apk_fetchcolumn ( "SELECT COUNT(*) FROM ls_coupon " . $condition, $params );
	$coupons = pdo_apk_fetchall ( 'SELECT * FROM ls_coupon ' . $condition . ' ORDER BY reg_time DESC ' . $limit, $params, 'id' );
	$coupons = array (
			'total' => $total,
			'coupons' => $coupons 
	);
}

if ($do == "check") {
	$step = intval ( $_GPC ['step'] );
	$id = intval ( $_GPC ['id'] );
	if ($_GPC ['m'] == "pass") {
		pdo_update ( 'cp_coupon', array (
				'check_state' => $step + 1 
		), array (
				'coupon_id' => $id 
		) );
	}
	if ($_GPC ['m'] == "unPass") {
		pdo_update ( 'cp_coupon', array (
				'check_state' => - 1 
		), array (
				'coupon_id' => $id 
		) );
	}
	
	$filter = array (
			"check_state" => $step 
	);
	$condition = ' WHERE type = 4';
	$params = array ();
	if (! empty ( $filter ['type'] )) {
		$condition .= ' AND type = :type';
		$params [':type'] = $filter ['type'];
	}
	if ($filter ['dis_type'] > 0) {
		$condition .= ' AND dis_type = :dis_type';
		$params [':dis_type'] = $filter ['dis_type'];
	}
	if (isset ( $filter ['check_state'] )) {
		$condition .= ' AND `check_state` = :check_state';
		$params [':check_state'] = $filter ['check_state'];
	}
	$limit = ' LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$total = pdo_apk_fetchcolumn ( "SELECT COUNT(*) FROM ls_coupon " . $condition, $params );
	$coupons = pdo_apk_fetchall ( 'SELECT * FROM ls_coupon ' . $condition . ' ORDER BY reg_time DESC ' . $limit, $params, 'id' );
	$coupons = array (
			'total' => $total,
			'coupons' => $coupons 
	);
}

$total = intval ( $coupons ['total'] );
$list = $coupons ['coupons'];
foreach ( $list as $k => $coupon ) {
	switch ($coupon ['use_time_type']) {
		case 1 :
			$use_time = $coupon['use_time_end'];
			break;
		case 2 :
			$use_time = '领取后'.$coupon['use_time_hour'];
			break;
		case 3 :
			$use_time = '领取当天';
			break;
	}
	$list [$k] ['use_time'] = $use_time;
}
$pager = pagination ( $total, $pindex, $psize );
template ( 'coupon/park_list' );