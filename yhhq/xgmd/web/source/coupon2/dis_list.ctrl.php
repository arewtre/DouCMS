<?php
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
load ()->model ( 'coupon-o' );
if ($do == "post") {
	if ($_GPC ['add'] == 1) {
	    //echo"<pre>";print_r($_GPC);die;
		$coupon = array ();
		$coupon ['name'] = $_GPC ['coupon_name'];
		$coupon ['coupon_desc'] = $_GPC ['coupon_desc'];
		$coupon ['type'] = $_GPC ['coupon_type'];
		//$coupon ['dis_type'] = $_GPC ['dis_type'];
		$coupon ['dis_type'] =2;
		$coupon ['dis_value'] = $_GPC ['dis_value'];
		//$coupon ['dis_value'] = $_GPC ['dis_value'];
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
		$coupon ['photo_list'] = json_encode($_GPC['photo_list']);
		// $coupon ['reg_admin'] = 1;
		$coupon ['check_state'] = 0;
	   if(!checkint($coupon['sum_total'])){
		    message("请用大于0的整数填写数量");
		}
		if(!checkmoney($coupon['dis_value'])){
		    message("请用大于0的数字填写折扣价格");
		}
		if(!checkratio($coupon['ratio_pay'])){
		    message("请用0~100的数字填写成本比例");
		}
		if((strtotime($coupon ['issue_time_end'])+86399)<time()){
		    message("发放限制时间不能早于当前时间");
		}
		if($coupon ['use_time_type']==1){
		    if(strtotime($coupon ['use_time_end'])<strtotime($coupon ['issue_time_start'])){
		        message("兑换有效期不能早于发放开始时间");
		    }
		}
		if($coupon ['use_time_type']==2){
		    if(!checkint($coupon ['use_time_hour'])){
		        message("请用大于0的整数填写有效的小时数");
		    }
		}
		pdo_apk_insert ( 'coupon', $coupon );
		$couid = pdo_apk_insertid();
		for ($i=0; $i<$coupon['sum_total']; $i++) {
		    //     		    $cod[$i]['coupon_id']=$couid;
		    //     		    $cod[$i]['code']=code();
		    //     		    $cod[$i]['reg_time']=date("Y-m-d H:i:s");
		    //     		    $cod[$i]['state']=-1;
		    $cod['coupon_id']=$couid;
		    $cod['code']=code();
		    $cod['reg_time']=date("Y-m-d H:i:s");
		    $cod['state']=-1;
		    //echo"<pre>";print_r($cod);die;
		    pdo_apk_insert ('coupon_code', $cod);
		}
		    message ( '抵用券添加成功！', url ('coupon/dis_list', array ('do' => 'display') ), 'success' );
		    exit ();
	} else {
		template ( 'coupon/dis_list' );
		exit ();
	}
	$do = "display";
}

$pindex = max ( 1, intval ( $_GPC ['page'] ) );
$psize = 15;
if ($do == "display") {
	$condition = ' WHERE dis_type = 2';
	$params = array ();
	$limit = ' LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$total = pdo_apk_fetchcolumn ( "SELECT COUNT(*) FROM ls_coupon " . $condition, $params );
	$coupons = pdo_apk_fetchall ( 'SELECT * FROM ls_coupon ' . $condition . '  ORDER BY reg_time DESC  ' . $limit, $params, 'id' );
	//echo"<pre>";print_r($coupons);die;
	$coupons = array (
			'total' => $total,
			'coupons' => $coupons 
	);
}
if ($do == "view") {
    $id = intval ( $_GPC ['id'] );
    $item = pdo_apk_fetch ( "SELECT * FROM ls_coupon WHERE coupon_id = :coupon_id", array (':coupon_id' => $id));
    // echo"<pre>";print_r($item);die;
}
if ($do == "check") {
    $id = explode(",", $_GPC ['id']);
	//echo"<pre>";print_r($id);die;
	$num= count($id);
	if ($_GPC ['m'] == "pass") {
	    foreach($id as $v){
		      pdo_apk_update( 'coupon', array ('check_state' =>1), array ('coupon_id' => $v ) );		      
		}
		message ( '共'. $num .'条抵用券审核通过！', url ('coupon/dis_list', array ('do' => 'display') ), 'success' );
	}
	if ($_GPC ['m'] == "unPass") {
	   foreach($id as $v){
		      pdo_apk_update( 'coupon', array ('check_state' =>-1), array ('coupon_id' => $v ) );		     
	    }
	    message ( '共'. $num .'条抵用券被拒绝！', url ( 'coupon/dis_list', array ('do' => 'display') ), 'success' );
	}
}

$total = intval ( $coupons ['total'] );
$list = $coupons ['coupons'];
foreach ( $list as $k => $coupon ) {
	switch ($coupon ['use_time_type']) {
		case 1 :
			$use_time = $coupon['use_time_end'];
			break;
		case 2 :
			$use_time = '领取后'.$coupon['use_time_hour'].'小时';
			break;
		case 3 :
			$use_time = '领取当天';
			break;
	}
	$list [$k] ['use_time'] = $use_time;
}
function checkint($int){
    if(preg_match("/^[1-9]\d*$/",$int)){
        return true;
    }else{
        return false;
    }
}
function checkmoney($num){
    if(is_numeric($num) &&  $num>=0){
        return true;
    }else{
        return false;
    }
}
function checkratio($v){
    if(is_numeric($v) && $v>=0 && $v<=100){
        return true;
    }else{
        return false;
    }
}
function code(){
   	$a = range(0,9);
    for($i=0;$i<=10;$i++){
        $b[] = array_rand($a);
    }
    return join("",$b);
}
$pager = pagination ( $total, $pindex, $psize );
template ( 'coupon/dis_list' );