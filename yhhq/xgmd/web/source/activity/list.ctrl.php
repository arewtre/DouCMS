<?php
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
$dos = array (
		'display',
		'post',
		'del',
		'setProperty' 
);
$do = in_array ( $do, $dos ) ? $do : 'display';
if ($do == 'display') {
	$type = intval ( $_GPC ['type'] );
	if (! empty ( $_GPC ['displayorder'] )) {
		foreach ( $_GPC ['displayorder'] as $id => $displayorder ) {
			pdo_update ( "activity_article", array (
					'sort' => $displayorder 
			), array (
					'id' => $id 
			) );
		}
		message ( '排序更新成功！', url ( 'activity/hot', array (
				'do' => 'display' 
		) ), 'success' );
	}
	
	$pindex = max ( 1, intval ( $_GPC ['page'] ) );
	$psize = 10;
	
	$condition = '';
	if (! empty ( $_GPC ['keyword'] )) {
		$condition .= " AND name LIKE '%{$_GPC['keyword']}%'";
	}
	
	$list = pdo_fetchall ( "SELECT * FROM ims_promotion WHERE 1=1 $condition ORDER BY promotion_id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize );
	if (! empty ( $list )) {
		$total = pdo_fetchcolumn ( 'SELECT COUNT(1) FROM ims_promotion WHERE 1=1 ' . $condition );
		$pager = pagination ( $total, $pindex, $psize );
	}
}

if ($do == 'post') {
	$id = intval ( $_GPC ['id'] );
	if (! empty ( $id )) {
		$item = pdo_fetch ( "SELECT * FROM ims_promotion WHERE promotion_id = :id", array (
				':id' => $id 
		) );
	}
	
    if (! empty ( $item )) {
		$logo = tomedia ( $item ['pro_img'] );
	}
	$store_desc = pdo_fetch ( "SELECT * FROM ims_store WHERE store_id = :id", array (
	    ':id' => $item['store_id']
	) );
    if(!empty($item['store_id'])){
	   $item['store_id'] = "关联到商户  ".$store_desc['store_name'] ." ID:".$item['store_id'];
    }
	
	if (checksubmit ( 'submit' )) {
	   // echo"<pre>";print_r($_GPC);die;
	    $res = explode(":",$_GPC ['store_id']);//tpl_form_field_daterange();
	    $sid=$res[1];
		$data = array (
				'promotion_name' => $_GPC ['promotion_name'],
				'pro_img' => $_GPC ['logo'],
				'html' => $_GPC ['content'],
				'start_time' => strtotime ( $_GPC ['datelimit'] ['start'] ),
				'end_time' => strtotime ( $_GPC ['datelimit'] ['end'] ),
				'desc' => $_GPC ['desc'],
				'state' => $_GPC ['enable'],
				'store_id' => $sid 
		);
		if (empty ( $data ['promotion_name'] )) {
			message ( '请输入活动名称！' );
		}
		
		if (empty ( $data ['desc'] )) {
			message ( '请输入活动简介！' );
		}
		
		if (empty ( $id )) {
			pdo_insert ( "promotion", $data );
			$id = pdo_insertid ();
		} else {
			pdo_update ( "promotion", $data, array (
					'promotion_id' => $id 
			) );
		}
		message ( '数据更新成功！', url ( 'activity/list', array (
				'do' => 'display' 
		) ), 'success' );
	}
}

if ($do == 'setProperty') {
	$id = intval ( $_GPC ['id'] );
    if(!empty($_GPC['type'])){
        $type = $_GPC['type'];
    }else{
        $type ="state";
    }
	$data = intval ( $_GPC ['data'] );
	($data == 1)? $data = 0:$data = 1;
	pdo_update ( "promotion", array ($type => $data), array ("promotion_id" => $id ));
	die (json_encode ( array ("result" => 1,"data" => $data)));
}





template ( 'activity/list' );