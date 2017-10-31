<?php
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
$pindex = max ( 1, intval ( $_GPC ['page'] ) );
$psize = 15;
if ($do == "use") {
	$codes = code_all ( $pindex, $psize );
	$total = intval ( $codes ['total'] );
	$list = $codes ['coupons'];
	$pager = pagination ( $total, $pindex, $psize );
	
}

function code_all($pindex = 1, $psize = 10,$filter = array()) {
	$condition = ' WHERE 1 = 1';
	$params = array();
	if(!empty($filter['type'])) {
		$condition .= ' AND type = :type';
		$params[':type'] = $filter['type'];
	}
	if($filter['dis_type'] > 0) {
		$condition .= ' AND dis_type = :dis_type';
		$params[':dis_type'] = $filter['dis_type'];
	}
	if(isset($filter['check_state'])) {
		$condition .= ' AND `check_state` = :check_state';
		$params[':check_state'] = $filter['check_state'];
	}
	$limit = ' LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('coupon_code') . $condition, $params);
	$coupons = pdo_fetchall('SELECT code.*, coupon.name coupon_name FROM ' . tablename('coupon_code') ." code left join ".tablename("coupon") ." coupon on code.coupon_id=coupon.coupon_id ". $condition . ' ORDER BY add_time DESC ' . $limit, $params,'id');
	return array('total' => $total, 'coupons' => $coupons);
}
template ( 'coupon/codes' );