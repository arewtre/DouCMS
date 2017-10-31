<?php
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
$pindex = max ( 1, intval ( $_GPC ['page'] ) );
$psize = 15;
if ($do == "display") {
    $condition= "";
    if(!empty($_GPC['dis_type'])){
        $condition .= "  AND ac.dis_type =".$_GPC['dis_type'];
    }
    
    $keyword = $_GPC['keyword'];
	if(!empty($_GPC['keyword'])){
	   $condition .= " AND (ac.name LIKE '%{$_GPC['keyword']}%' OR ash.uname LIKE '%{$_GPC['keyword']}%') ";
	}
	
	if (!empty($_GPC['add_time'])) {
	    $starttime = $_GPC['add_time']['start'];
	    $end = strtotime($_GPC['add_time']['end']) + 86399;
	    $endtime = date("Y-m-d H:i:s",$end) ;
	    $condition .= " AND ( ash.add_time >= '{$starttime}'  AND ash.add_time <= '{$endtime}') ";
	} else {
	    $starttime = " 2017-01-01 ";
	    $endtime = date("Y-m-d");
	}
	
	$params = array ();
	$limit = ' LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$total = pdo_fetchcolumn( "SELECT COUNT(*) FROM ims_coupon_send_history  ash join ims_coupon ac on ash.coupon_id=ac.coupon_id where 1=1 " . $condition, $params );
	$totalnum = pdo_fetchcolumn( "SELECT COUNT(*) FROM ims_coupon_send_history ");
	$list = pdo_fetchall( 'SELECT * FROM ims_coupon_send_history  ash join ims_coupon ac on ash.coupon_id=ac.coupon_id   where 1=1 ' . $condition . '  ORDER BY ash.hid desc,ash.add_time DESC ' . $limit, $params, 'ash.hid' );
	//pre($list);
    foreach($list as $k=>$v){
        $list[$k]['code_id'] = json_decode($list[$k]['code_id']);
    }
//pre($list);
}

if($do=="chart"){
     $page = $_GPC['page'];
    $j = 6;
    if(isset($_SESSION['userhistory_day_count'])){
        $j=$_SESSION['userhistory_day_count'];
    }
    if(isset($_GPC['daycount'])){
        $_SESSION['userhistory_day_count']=$_GPC['daycount'];
        $j=$_GPC['daycount'];
    }
    $search_time_end = date('Y-m-d');  //获取本月第一天时间戳
    if(isset($_SESSION['userhistory_search_time_end'])){
        $search_time_end = $_SESSION['userhistory_search_time_end'];  //获取本月第一天时间戳
    }
     
    if(isset($_GPC['search_time_end'])){
        $_SESSION['userhistory_search_time_end']=$_GPC['search_time_end'];
        $search_time_end=$_GPC['search_time_end'];
    }
    $start_time = strtotime($search_time_end);
    $array = array();
    $pn = array();
    $tn = array();
    for($i=$j;$i>=0;$i--){
        $array[] = date('Y-m-d',$start_time-$i*86400); //每隔一天赋值给数组
    }
    
    foreach($array as $k=>$v){
        $ts =  date("Y-m-d H:i:s",strtotime($v));
        $td = date("Y-m-d H:i:s",strtotime($v)+86399);
        $pn[]= intval(pdo_fetchcolumn("SELECT COUNT(*)  FROM ims_coupon_code  cc join ims_coupon c on cc.coupon_id=c.coupon_id where cc.reg_time between '{$ts}' and '{$td}'  AND c.dis_type=1"));
        $tn[] = intval(pdo_fetchcolumn("SELECT COUNT(*)  FROM ims_coupon_code cc join ims_coupon c on cc.coupon_id=c.coupon_id where cc.reg_time between '{$ts}' and '{$td}'  AND c.dis_type=2"));
    }
    
    $pn = json_encode($pn);
    $tn = json_encode($tn);
    $mou = json_encode($array);
    $pagecount=$j;
}

$pager = pagination ( $total, $pindex, $psize );
template ( 'coupon/sendhis' );