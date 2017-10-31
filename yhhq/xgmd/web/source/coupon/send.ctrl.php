<?php
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
// ini_set("display_errors", "On");
// error_reporting(E_ALL | E_STRICT);
$pindex = max ( 1, intval ( $_GPC ['page'] ) );
$psize = 15;
if ($do == "display") {
    $condition= "";       
    if(!empty($_GPC['code_id'])){       
        $aa  = implode(',', $_GPC['code_id']);
        $condition .= "  AND FIND_IN_SET (acc.code_id ,'{$aa}')";
    }
    if (!empty($_GPC['reg_time'])) {
        $starttime = $_GPC['reg_time']['start'];
        $end = strtotime($_GPC['reg_time']['end']) + 86399;
        $endtime = date("Y-m-d H:i:s",$end) ;
        $condition .= " AND ( acc.reg_time >= '{$starttime}'  AND acc.reg_time <= '{$endtime}') ";
    } else {
        $starttime = " 2017-01-01 ";
        $endtime = date("Y-m-d");
    }
    if(!empty($_GPC['codeid'])){
        $aa =$_GPC['codeid'];
        $condition .= "  AND FIND_IN_SET (acc.code_id ,'{$aa}')";
    }
    
    $keyword = $_GPC['keyword'];
	if(!empty($_GPC['keyword'])){
	   $condition .= " AND (ac.name LIKE '%{$_GPC['keyword']}%' OR acc.code LIKE '%{$_GPC['keyword']}%' OR s.store_name LIKE '%{$_GPC['keyword']}%') ";
	}	
	
	if(!empty($_GPC['dis_type'])){
	    $condition .= "  AND ac.dis_type =".$_GPC['dis_type'];
	}
	$params = array ();
	$limit = ' LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$totalnum = pdo_fetchcolumn( "SELECT COUNT(*) FROM ims_coupon_code");
	$total = pdo_fetchcolumn( "SELECT COUNT(*) FROM ims_coupon_code  acc join ims_coupon ac on acc.coupon_id=ac.coupon_id  join ims_coupon_info aci on ac.coupon_id=aci.id  join ims_store s on aci.store_id=s.store_id  where 1=1 " . $condition, $params );
// 	$list = pdo_fetchall( 'SELECT acc.user_id, s.store_name, ac.name, ac.dis_type, acc.code, acc.reg_time, ac.use_time_type,ac.use_time_end,ac.use_time_hour, acc.state,acc.use_time,acc.add_time FROM ims_coupon_code  acc join ims_coupon ac on acc.coupon_id=ac.coupon_id  join ims_coupon_info aci on ac.coupon_id=aci.id  join aq_store s on aci.store_id=s.store_id   where 1=1 ' . $condition . '  ORDER BY acc.code_id desc,acc.reg_time DESC ' . $limit, $params, 'acc.code_id' );
// 	foreach ( $list as $k => $v ) {
// 	    switch ($v ['use_time_type']) {
// 	        case 1 :
// 	            $use_time = $v['use_time_end'];
// 	            break;
// 	        case 2 :
// 	            $use_time = $v['use_end'];
// 	            break;
// 	        case 3 :
// 	            $use_time = $v['use_end'];
// 	            break;
// 	    }
	$list = pdo_fetchall( 'SELECT ac.use_time_hour,acc.user_id, s.store_name, ac.name, ac.dis_type, acc.code, acc.reg_time, ac.use_time_type,ac.use_time_end,ac.use_time_hour, acc.state,acc.use_time,acc.add_time FROM ims_coupon_code  acc join ims_coupon ac on acc.coupon_id=ac.coupon_id  join ims_coupon_info aci on ac.coupon_id=aci.id  join ims_store s on aci.store_id=s.store_id   where 1=1 ' . $condition . '  ORDER BY acc.code_id desc,acc.reg_time DESC ' . $limit, $params, 'acc.code_id' );
	foreach ( $list as $k => $v ) {
	    switch ($v ['use_time_type']) {
	        case 1 :
	            $use_time = $v['use_time_end'];
	            break;
	        case 2 :
	            if(!empty($v['add_time'])){
	                $use_time = $v['use_end'];
	            }else{
	                $use_time = '领取后'.$v['use_time_hour'].'小时';
	            }
	            break;
	        case 3 :
	            if(!empty($v['add_time'])){
	                $use_time = $v['use_end'];
	            }else{
	                $use_time = '领取后当天';
	            }
	            break;
	    }
	    $list [$k] ['use_end'] = $use_time;
	    $user = pdo_fetch("select * from ims_user where user_id='{$v['user_id']}'");
	    //pre($user);
	    $list [$k] ['user_name'] = $user['user_name'];
	}
	$coupons = array ('total' => $total,'coupons' => $list );
}

$pager = pagination ( $total, $pindex, $psize );
template ( 'coupon/send' );