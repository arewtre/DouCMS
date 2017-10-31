<?php
$do = ! empty ( $_GPC ['do'] ) ? $_GPC ['do'] : 'display';
//ini_set("display_errors", "On");
// error_reporting(E_ALL | E_STRICT);
load ()->func ( 'tpl' );
$children = array ();

$category = pdo_fetchall ( "SELECT * FROM ims_scategory where parent_id>0  ORDER BY sort_order DESC", array (
		':id' => 1 
) );

if (! empty ( $category )) {
	$children = array ();
	foreach ( $category as $cid => $cate ) {
		if (! empty ( $cate ['parent_id'] )) {
			$children [$cate ['parent_id']] [$cate ['cate_id']] = array (
					$cate ['cate_id'],
					$cate ['cate_name'] 
			);
		}
	}
} 
// else {
// 	message ( '请先添加分类！', url ( 'store/category', array (
// 			'do' => 'post' 
// 	) ), 'success' );
// }

$floors = pdo_fetchall ( "SELECT * FROM ims_floor  ORDER BY  floor_id DESC", array (), 'id' );
$category = pdo_fetchall ( "SELECT * FROM ims_scategory  ORDER BY  cate_id DESC", array (), 'id' );
if ($do == 'post') {
	$id = intval ( $_GPC ['id'] );
	
	if (! empty ( $id )) {
		$item = pdo_fetch ( "SELECT * FROM " . 'ims_store ' . " WHERE store_id = :id", array (
				':id' => $id 
		) );
		if (empty ( $item )) {
			message ( '抱歉，商家不存在或是已经删除！', '', 'error' );
		}
	}
	
	if (! empty ( $item )) {
		$logo = tomedia ($item ['store_logo'] );
		$background = tomedia ( $item ['background'] );
		$plist = json_decode($item['thumb']);
	}
	
	if (checksubmit ( 'submit' )) {
		$data = array (
				'sort_order' => intval ( $_GPC ['displayorder'] ),
				'store_name' => trim ( $_GPC ['store_name'] ),
				'description' => trim ( $_GPC ['content'] ),
				'floor_id' => intval ( $_GPC ['fid'] ),
				'cate_id' => intval ( $_GPC ['cate_id'] ),
				'starttime' => $_GPC ['starttime'],
				'endtime' => $_GPC ['endtime'],
		        'store_logo' => $_GPC ['store_logo'],
		        'background' => $_GPC ['background'],
		       'thumb'=>json_encode($_GPC['thumbs']),
				//'services' => trim ( $_GPC ['services'] ),
				//'discount' => trim ( $_GPC ['discount'] ),
				//'discounts' => trim ( $_GPC ['discounts'] ),
				//'qrcode_url' => trim ( $_GPC ['qrcode_url'] ),
				//'qrcode_description' => trim ( $_GPC ['qrcode_description'] ),
				//'consume' => trim ( $_GPC ['consume'] ),
				//'level' => intval ( $_GPC ['level'] ),
				'tel' => trim ( $_GPC ['tel'] ),
				'address' => trim ( $_GPC ['address'] ),
				'state' => intval ( $_GPC ['status'] ),
				'isfirst' => intval ( $_GPC ['isfirst'] ),
				//'top' => intval ( $_GPC ['top'] ),
				'add_time' => TIMESTAMP,
				//'shop_url' => trim ( $_GPC ['shop_url'] ),
				//'shop_name' => trim ( $_GPC ['shop_name'] ),
				//'isvip' => intval ( $_GPC ['isvip'] ),
				//'vip_start' => strtotime ( $_GPC ['datelimit'] ['start'] ),
				//'vip_end' => strtotime ( $_GPC ['datelimit'] ['end'] ),
		);
		if (! empty ( $_GPC ['logo'] )) {
			$data ['store_logo'] = $_GPC ['logo'];
		}
		if (! empty ( $_GPC ['background'] )) {
			$data ['background'] = $_GPC ['background'];
		}
		//$data ['qrcode'] = $_GPC ['qrcode'];
		
		if (empty ($data ['store_name'] )) {
			message ( '请输入商家名称！' );
		}
		if (empty ( $data ['cate_id'] )) {
			message ( '请选择商家分类！' );
		}
		if (! checkDatetime ( $data['starttime'] )) {
			message ( '请输入正确的时间格式！' );
		}
		if (! checkDatetime ( $data ['endtime'] )) {
			message ( '请输入正确的时间格式！' );
		}
		$pa = pdo_fetch ( "SELECT * FROM " . 'ims_scategory ' . " WHERE cate_id = :id", array (
		    ':id' => $_GPC['cate_id']
		) );
		$data['type'] = $pa['parent_id'];
		if (empty ( $id )) {
			pdo_insert ( "store", $data );
			$re['store_id'] = pdo_insertid();
			$re['cate_id'] = $_GPC['cate_id'];
			pdo_insert ("category_store", $re );
		} else {
			unset ( $data ['add_time'] );
			pdo_update ( "store", $data, array (
					'store_id' => $id 
			) );
		}
		message ( '数据更新成功！', url ( 'store/list', array (
				'do' => 'display' 
		) ), 'success' );
	}
} elseif ($do == 'display') {
	$type = intval ( $_GPC ['type'] );
	if (! empty ( $_GPC ['displayorder'] )) {
		foreach ( $_GPC ['displayorder'] as $id => $displayorder ) {
			pdo_update ( "store", array (
					'sort_order' => $displayorder 
			), array (
					'store_id' => $id 
			) );
		}
		message ( '排序更新成功！', url ( 'store/list', array (
				'do' => 'display' 
		) ), 'success' );
	}
	$totalcount = pdo_fetchcolumn ( 'SELECT COUNT(1) FROM ims_store where type<4' );
	$pindex = max ( 1, intval ( $_GPC ['page'] ) );
	$psize = 10;
	$condition = '';
	if (! empty ( $_GPC ['keyword'] )) {
		$condition .= " AND s.store_name LIKE '%{$_GPC['keyword']}%'";
	}
	
	if (! empty ( $_GPC ['ccate'] )) {
		$ccateid = intval ( $_GPC ['ccate'] );
		$condition .= " AND cs.cate_id = '{$ccateid}'";
	}
	
	if (! empty ( $_GPC ['pcate'] )) {
	    $pcateid = intval ( $_GPC ['pcate'] );
	    $condition .= " AND sc.parent_id = '{$pcateid}'";
	}
	
	$list = pdo_fetchall ( "SELECT * FROM ims_store s  join ims_category_store cs on s.store_id=cs.store_id join ims_scategory sc on sc.cate_id=cs.cate_id  WHERE 1=1 AND s.type<4 ".$condition." ORDER BY  s.sort_order DESC, s.store_id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize );
	foreach($list as $k=>$v){
	    $item =  pdo_fetch ( "SELECT * FROM " . 'ims_scategory ' . " WHERE cate_id = :cate_id", array (':cate_id' => $v['cate_id']) );
	    $list[$k]['ccate'] = $item['cate_name'];
	    $item2 = pdo_fetch ( "SELECT * FROM " . 'ims_scategory ' . " WHERE cate_id = :cate_id", array (':cate_id' => $item['parent_id']) );
	    $list[$k]['pcate'] = $item2['cate_name'];
	}
	if (! empty ( $list )) {
		$total = pdo_fetchcolumn ( 'SELECT COUNT(1) FROM ims_store s left join ims_category_store cs on s.store_id=cs.store_id join ims_scategory sc on sc.cate_id=cs.cate_id WHERE 1=1 AND s.state=1 AND s.type<4 ' . $condition );
		$pager = pagination ( $total, $pindex, $psize );
	}
} elseif ($do == 'delete') {
	$id = explode(",", $_GPC ['id']);
	$num = count($id);
	foreach($id as $v){
    	$row = pdo_fetch ( "SELECT * FROM " . 'ims_store' . " WHERE store_id = :store_id", array (
    			':store_id' => $v 
    	) );
    	if (empty ($row)) {
    		message ( '抱歉，数据不存在或是已经被删除！' );
    	} 
    	if($row['state']>0)
    		pdo_update ("store", array ("state" => $data), array ("store_id" => $v));
//     	pdo_delete ( "ims_store", array (
//     			'store_id' => $v
//     	) );
	}
	message ( '删除成功！', url ( 'store/list', array (
			'do' => 'display' 
	) ), 'success' );
} elseif ($do == 'check') {
	if (! empty ( $_GPC ['displayorder'] )) {
		foreach ( $_GPC ['displayorder'] as $id => $displayorder ) {
			pdo_update ( "ims_store", array (
					'sort_order' => $displayorder 
			), array (
					'store_id' => $id 
			) );
		}
		message ( '排序更新成功！', url ( 'store/list', array (
				'do' => 'display' 
		) ), 'success' );
	}
	
	$pindex = max ( 1, intval ( $_GPC ['page'] ) );
	$psize = 10;
	$condition = '';
	if (! empty ( $_GPC ['keyword'] )) {
		$condition .= " AND store_name LIKE '%{$_GPC['keyword']}%'";
	}
	
	if (! empty ( $_GPC ['category_id'] )) {
		$cid = intval ( $_GPC ['category_id'] );
		$condition .= " AND pcate = '{$cid}'";
	}
	if (isset ( $_GPC ['status'] )) {
		$condition .= " AND status = '" . intval ( $_GPC ['status'] ) . "'";
	}
	$list = pdo_fetchall ( "SELECT * FROM " . 'ims_store' . " WHERE weid = '{$_W['uniacid']}' AND mode=1 $condition ORDER BY checked, displayorder DESC, id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize );
	if (! empty ( $list )) {
		$total = pdo_fetchcolumn ( 'SELECT COUNT(1) FROM ' . 'ims_store' . " WHERE weid = '{$_W['uniacid']}' AND mode=1 $condition" );
		$pager = pagination ( $total, $pindex, $psize );
	}
} elseif ($do == 'checkdetail') 
{
	$id = intval ( $_GPC ['id'] );
	if (! empty ( $id )) {
		$item = pdo_fetch ( "SELECT * FROM " . 'ims_store' . " WHERE id = :id", array (
				':id' => $id 
		) );
		if (empty ( $item )) {
			message ( '抱歉，商家不存在或是已经删除！', '', 'error' );
		}
	}
	if (checksubmit ( 'submit' )) {
		$data = array (
				'checked' => intval ( $_GPC ['checked'] ),
				'status' => intval ( $_GPC ['status'] ) 
		);
		pdo_update ( "ims_store", $data, array (
				'id' => $id 
		) );
		message ( '数据更新成功！', url ( 'store/list', array (
				'do' => 'check' 
		) ), 'success' );
	}
} elseif ($do == "setStoresProperty") {
	$id = intval ($_GPC['id'] );
	if(!empty($_GPC['type']))
	{
	   $type = $_GPC['type'];
	}else{
	   $type ="state";
	}
	$data = intval ($_GPC['data'] );
	($data == 1)? $data = 0:$data = 1;
	pdo_update ("store", array ($type => $data), array ("store_id" => $id)); 
	die (json_encode (array ("result" => 1,"data" => $data)));
}elseif($do =="view"){
    if(!empty($_GPC['view'])){
        $id = explode(",", $_GPC ['id']);
        $num = count($id);
        if ($_GPC ['m'] == "view") {
            foreach($id as $v){
                pdo_update( 'ims_store', array ('state' =>1), array ('store_id' => $v ) );
            }
            message ( '共显示'. $num .'家商户！', url ('store/list', array ('do' => 'display') ), 'success' );
        }
        if ($_GPC ['m'] == "noview") {
            foreach($id as $v){
                pdo_update( 'ims_store', array ('state' =>0), array ('store_id' => $v ) );
            }
            message ( '共屏蔽'. $num .'家商户！', url ( 'store/list', array ('do' => 'display') ), 'success' );
        }
        if ($_GPC ['m'] == "noview") {
            foreach($id as $v){
                pdo_update( 'ims_store', array ('state' =>0), array ('store_id' => $v ) );
            }
            message ( '共屏蔽'. $num .'家商户！', url ( 'store/list', array ('do' => 'display') ), 'success' );
        }
    }
    
}

template ( 'store/stores' );
function checkDatetime($str, $format = "H:i") {
	$str_tmp = date ( 'Y-m-d' ) . ' ' . $str;
	$unixTime = strtotime ( $str_tmp );
	$checkDate = date ( $format, $unixTime );
	if ($checkDate == $str) {
		return true;
	} else {
		return false;
	}
}
