<?php
//(include $this->template ( "", TEMPLATE_INCLUDEPATH ));
defined ( 'IN_IA' ) or exit ( 'Access Denied' );
load ()->model ( 'banner' );
$do = ! empty ( $do ) ? $do : 'display';
$do = in_array ( $do, array (
		'display',
		'post',
		'delete' 
) ) ? $do : 'display';
$type = 4;

if ($do == 'display') {
	$_W ['page'] ['title'] = 'banner管理';
	if (checksubmit ( 'submit' )) {
		if (! empty ( $_GPC ['displayorder'] )) {
			foreach ( $_GPC ['displayorder'] as $id => $displayorder ) {
				pdo_update ( 'banner', array (
						'sort' => $displayorder 
				), array (
						'banner_id' => $id 
				) );
			}
		}
		message ( '更新排序成功！', referer (), 'success' );
	}
	$pindex = max ( 1, intval ( $_GPC ['page'] ) );
	$psize = 20;
	$params = array ();
	$params ['type'] = $type;
	if (! empty ( $_GPC ['keyword'] )) {
		$params ['text'] = $_GPC ['keyword'];
	}
	$banners = banner_all ( $pindex, $psize, $params );
	$total = $banners ['total'];
	$list = $banners ["banners"];
	$pager = pagination ( $total, $pindex, $psize );
}

if ($do == 'post') {
	$id = intval ( $_GPC ['id'] );
	if (! empty ( $id )) {
		$item = pdo_apk_fetch ( "SELECT * FROM ls_banner WHERE banner_id = :id", array (
				':id' => $id 
		) );
	}
	if (! empty ( $item )) {
		$type = intval ( $item ['banner_type'] );
		$logo = tomedia ( $item ['pic_name'] );
	}
	
	if (checksubmit ( "submit" )) {
		$data = array (
				"banner_type" => $type,
				'pic_name' => $_GPC ['logo'],
				'text' => $_GPC ['text'],
				'banner_desc' => $_GPC ['banner_desc'],
				'link_type' => $_GPC ['link_type'],
				'link_id' => $_GPC ['link_id'],
				'enable' => 1,
				'link_url' => $_GPC ['link_url'],
				'sort' => $_GPC ['displayorder'] 
		);
		if (empty ( $data ['text'] )) {
			message ( '请输入标题！' );
		}
		if (empty ( $id )) {
			pdo_apk_insert ( "banner", $data );
			$id = pdo_apk_insertid ();
		} else {
			pdo_apk_update ( "banner", $data, array (
					'banner_id' => $id 
			) );
		}
		message ( '数据更新成功！', url ( 'banner/list', array (
				'do' => 'display',
				"type" => $type 
		) ), 'success' );
	}
}

if ($do == 'delete') {
	$id = intval ( $_GPC ['id'] );
	if (! empty ( $id )) {
		$item = pdo_apk_fetch ( "SELECT * FROM ls_banner WHERE banner_id = :id", array (
				':id' => $id 
		) );
	}
	if (empty ( $item )) {
		message ( '广告不存在' );
	}
	$data = array (
			'enable' => 0 
	);
	pdo_apk_update ( "banner", $data, array (
			'banner_id' => $id 
	) );
	message ( '删除成功！', url ( 'banner/park', array (
			'do' => 'display',
	) ), 'success' );
}
template ( "banner/slide" );