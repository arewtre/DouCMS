<?php
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
load ()->model ( 'issueplan' );
$pindex = max ( 1, intval ( $_GPC ['page'] ) );
$psize = 15;
if ($do == null || $do == "")
	$do = 'display';
if ($do == "post") {
	if ($_GPC ['add'] == 1) {
		$plan = array ();
		$plan ['name'] = $_GPC ['name'];
		$plan ['issue_time'] = $_GPC['issue_time'];
		$plan ['reg_admin'] = 1;
		$plan ['reg_time'] = date('Y-m-d H:i:s');
		$plan ['state'] = 0;
		$plan ['check_state'] = 0;
		pdo_insert('cp_issue_plan',$plan);
		$do="display";
	}
}
if ($do == 'display') {
	$issueplan = issueplan_all ( $pindex, $psize );
	$total = intval ( $issueplan ['total'] );
	$list = $issueplan ['plans'];
	$pager = pagination ( $total, $pindex, $psize );
	template ( 'coupon/issue' );
	exit ();
}

if ($do == "check") {
	$id = intval ( $_GPC ['id'] );
	$step = intval ( $_GPC ['step'] );
	if ($_GPC ['m'] == "pass") {
		pdo_update ( 'cp_issue_plan', array (
				'check_state' => $step + 1 
		), array (
				'plan_id' => $id 
		) );
	}
	if ($_GPC ['m'] == "unPass") {
		pdo_update ( 'cp_issue_plan', array (
				'check_state' => - 1 
		), array (
				'plan_id' => $id 
		) );
	}
	$filter = array (
			"check_state" => $step 
	);
	$issueplan = issueplan_all ( $pindex, $psize, $filter );
	$total = intval ( $issueplan ['total'] );
	$list = $issueplan ['plans'];
	$pager = pagination ( $total, $pindex, $psize );
}

template ( 'coupon/issue' );
