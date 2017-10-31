<?php
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
if ($do == "post") {
	if ($_GPC ['add'] == 1) {
	    $res = explode(":",$_GPC ['store_id']);
	    $sid=$res[1];
		$coupon = array ();
		$coupon ['name'] = $_GPC ['coupon_name'];
		$coupon ['coupon_desc'] = $_GPC ['coupon_desc'];
		$coupon ['dis_type'] =2;
		$coupon ['dis_value'] = $_GPC ['dis_value'];
		$coupon ['min_amount'] = $_GPC ['min_amount'];
		$coupon ['use_time_type'] = $_GPC ['use_time_type'];
		$coupon ['use_time_end'] = $_GPC ['use_time_end'];
		$coupon ['use_time_hour'] = $_GPC ['use_time_hour'];
		$coupon ['ratio_pay'] = $_GPC ['ratio_pay'];
		$coupon ['reg_time'] = date ( "Y-m-d h:i:s" );
		$coupon ['check_state'] = 0;
		if(!checkmoney($coupon['dis_value'])){
		    message("请用大于0的数字填写折扣价格");
		}
		if(!checkratio($coupon['ratio_pay'])){
		    message("请用0~100的数字填写成本比例");
		}

		if($coupon ['use_time_type']==2){
		    if(!checkint($coupon['use_time_hour'])){
		        message("请用大于0的整数填写有效的小时数");
		    }
		}
		pdo_insert ( 'coupon', $coupon );
 		$couid = pdo_insertid();
 		$arr['id'] = $couid;
 		$arr['start_time'] = date ( "Y-m-d h:i:s" );
 		$arr['store_id'] = $sid;
 		$arr['coupon_info_pic'] = json_encode($_GPC ['photo_list']);
 		$arr['coupon_type'] = 1;
 		$arr['sort'] = $_GPC ['sort'];
 		pdo_insert ('coupon_info', $arr);
		message ( '优惠券添加成功！', url ('coupon/dis_list', array ('do' => 'display') ), 'success' );
		    
	} else {	    
		template ( 'coupon/dis_list' );
		exit ();
	}
	$do = "display";
}

$pindex = max ( 1, intval ( $_GPC ['page'] ) );
$psize = 15;
if ($do == "display") {
    $keyword = $_GPC['keyword'];
	$condition = ' WHERE dis_type =2';
	if(!empty($_GPC['keyword'])){
	   $condition .= " AND (name LIKE '%{$_GPC['keyword']}%' OR coupon_desc LIKE '%{$_GPC['keyword']}%') ";
	}
	
	if ($_GPC['ischeck']>=0 && !empty($_GPC['ischeck']!="")) {
	    $condition .= " AND check_state='{$_GPC['ischeck']}' ";
	}else{
	    $_GPC['ischeck'] =-1;
	}

	$params = array ();
	$limit = ' LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$total = pdo_fetchcolumn( "SELECT COUNT(*) FROM ims_coupon " . $condition, $params );
	$totalnum = pdo_fetchcolumn( "SELECT COUNT(*) FROM ims_coupon where dis_type=2");
	$coupons = pdo_fetchall( 'SELECT * FROM ims_coupon ' . $condition . ' ORDER BY coupon_id desc,reg_time DESC ' . $limit, $params, 'coupon_id' );
	foreach($coupons as $k=>$v){
	   $num= pdo_fetchcolumn("SELECT COUNT(*) FROM ims_coupon_code  where state=-1 AND coupon_id=".$v['coupon_id']);
	    if(empty($num)){
	        $num =0;
	    }
	    $sendd= pdo_fetchcolumn("SELECT COUNT(*) FROM ims_coupon_code  where  coupon_id=".$v['coupon_id']);
	    //pre($sendd);
	    if(empty($sendd)){
	        $send ="未发送";
	    }else{
	        $send ="已发送".$sendd."张";
	    }
	    $coupons[$k]['remain_total'] = $num;
	    $coupons[$k]['send'] = $send;
	    $coupons[$k]['sendd'] = $sendd;
	}
	$coupons = array ('total' => $total,'coupons' => $coupons );
}

if ($do == "view") {
    $id = intval ( $_GPC ['id'] );
    $item = pdo_fetch( "SELECT * FROM ims_coupon  ac join ims_coupon_info  aci on ac.coupon_id=aci.id WHERE ac.coupon_id='{$id}'"); 
    $photo=json_decode($item['coupon_info_pic']);
    $store =pdo_get("store",  array("store_id"=>$item['store_id']), "store_name");
    //pre($photo);
    if ($_GPC ['add'] == 1) {
        pdo_update( 'ims_coupon', array ('name' =>$_GPC['coupon_name'],'coupon_desc' =>$_GPC['coupon_desc']), array ('coupon_id' => $id ) );
        pdo_update( 'ims_coupon_info', array ('coupon_info_pic' =>json_encode($_GPC['photo_list'])), array ('id' => $id ) );
        message ( '优惠券更新成功！', url ('coupon/dis_list', array ('do' => 'display') ), 'success' );
    }
}

if ($do == "check") {
	$id = explode(",", $_GPC ['id']);
	$num = count($id);
	if ($_GPC ['m'] == "pass") {
	    foreach($id as $v){
		      pdo_update( 'coupon', array ('check_state' =>1), array ('coupon_id' => $v ) );
		}
		message ( '共'. $num .'条抵用券审核通过！', url ('coupon/dis_list', array ('do' => 'display') ), 'success' );
	}
	if ($_GPC ['m'] == "unPass") {
	   foreach($id as $v){		      
		      pdo_update( 'coupon', array ('check_state' =>2), array ('coupon_id' => $v ) );
	    }
	    message ( '共'. $num .'条抵用券被拒绝！', url ( 'coupon/dis_list', array ('do' => 'display') ), 'success' );
	}

}

if($do=="send"){
    $couponid = $_GPC['coupon_id'];
    $res = pdo_fetch( "SELECT * FROM ims_coupon  WHERE coupon_id='{$couponid}' AND (check_state=0 or check_state=2) "); 
    $re = pdo_fetch( "SELECT * FROM ims_coupon_info  WHERE id='{$couponid}'");
    if(!empty($res)){
            //message ( '此优惠券暂未审核,无法发放!', url ( 'coupon/list', array ('do' => 'display') ), 'error' );
            if($res['check_state']==0){
                die(json_encode(array("result"=>0,"msg"=>"此优惠券暂未审核,无法发放!")));
            }else{
                die(json_encode(array("result"=>0,"msg"=>"此优惠券未通过审核,无法发放!")));
            }
    }
    $num = $_GPC['num'];
    for ($i=0; $i<$num; $i++) {
        $cod['coupon_id']=$couponid;
        $cod['code']=code();
        $cod['reg_time']=date("Y-m-d H:i:s");
        $cod['state']=-1;
        pdo_insert ('coupon_code', $cod);
        $code[]=intval(pdo_insertid());
    }
    $arr['uname'] = $_W['user']['username'];
    $arr['add_time'] = date("Y-m-d H:i:s");
    $arr['coupon_id'] = $couponid;
    $arr['num'] = $num;
    $arr['code_id'] = json_encode($code);
    pdo_insert ('coupon_send_history', $arr);
    die(json_encode(array("result"=>1,"msg"=>"共".$num."张优惠券发放成功!","num"=>$num)));
}
if ($do == "setProperty") {
    //echo"<pre>";print_r($_GPC);die;
    $id = intval ($_GPC['id'] );
    $type = $_GPC['type'];
    $data = intval ($_GPC['data'] );
    ($data == 1)? $data = 0:$data = 1;
    pdo_update ("coupon", array ($type => $data), array ("coupon_id" => $id));
    die (json_encode (array ("result" => 1,"data" => $data)));
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