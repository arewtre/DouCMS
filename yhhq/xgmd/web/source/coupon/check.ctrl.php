<?php
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
//load ()->model ( 'coupon-o' );
$pindex = max ( 1, intval ( $_GPC ['page'] ) );
$psize = 15;
if ($do == "display") {
   $condition = "";
   if(!empty($_GPC['keyword'])){
        $condition .= " AND (name LIKE '%{$_GPC['keyword']}%' OR coupon_desc LIKE '%{$_GPC['keyword']}%') ";
   }
	$params = array ();
	$limit = ' LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$total = pdo_fetchcolumn ( "SELECT COUNT(*) FROM ims_coupon  WHERE dis_type=1 AND check_state = 0 " . $condition, $params );
	$totalnum = pdo_fetchcolumn ( "SELECT COUNT(*) FROM ims_coupon  WHERE dis_type=1 AND check_state = 0 ");
	$coupons = pdo_fetchall ( 'SELECT * FROM ims_coupon  WHERE dis_type=1 AND check_state = 0 ' . $condition . ' ORDER BY reg_time DESC ' . $limit, $params, 'id' );
	$coupons = array ('total' => $total,'coupons' => $coupons);
}

$total = intval ( $coupons ['total'] );
$list = $coupons ['coupons'];
foreach ( $list as $k => $coupon ) {
	switch ($coupon ['use_time_type']) {
		case 1 :
			$use_time = $coupon['use_time_end'];
			break;
		case 2 :
			$use_time = '领取后'.$coupon['use_time_hour']."小时";
			break;
		case 3 :
			$use_time = '领取当天';
			break;
	}
	$list [$k] ['use_time'] = $use_time;
}

$pager = pagination ( $total, $pindex, $psize );
template ( 'coupon/check_ex' );