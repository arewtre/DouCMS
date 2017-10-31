<?php


defined('IN_IA') or exit('Access Denied');
load()->model('banner');
$do = !empty($do) ? $do : 'display';
$do = in_array($do, array('display', 'post', 'setproperty', 'delete')) ? $do : 'display';
if ($do == 'display') {
    $_W['page']['title'] = 'banner管理';
    if (checksubmit('submit')) {
        if (!empty($_GPC['displayorder'])) {
            foreach ($_GPC['displayorder'] as $id => $displayorder) {
                pdo_update('banner', array('sort' => $displayorder), array('banner_id' => $id));
            }
        }
        message('更新排序成功！', referer(), 'success');
    }
    $pindex = max(1, intval($_GPC['page']));
    $psize = 20;
    $filter = array();
    $filter['type']=1;
    if (!empty($_GPC['keyword'])) {
        $filter['text']=$_GPC['keyword'];
    }
    $banners= banner_all($pindex,$psize,$filter);
    $total=$banners['total'];
    $list=$banners["banners"];
    $pager = pagination($total, $pindex, $psize);
}

if ($do == 'post') {
    $id = intval($_GPC['id']);
    if (!empty ( $id )) {
    		$item = pdo_fetch ( "SELECT * FROM ims_banner WHERE banner_id = :id", array (
    				':id' => $id 
    		) );
    }
	if (! empty ( $item )) {
		$type = 1;
		$item ['pic_name'] = tomedia ( $item ['pic_name'] );
	}
	//echo"<pre>";print_r($item);die;
	if (checksubmit ( "submit" )) {
	    //echo"<pre>";print_r($_GPC);die;
		$data = array (
				"banner_type" => $type,
				'pic_name' => tomedia($_GPC ['pic_name']),
				'text' => $_GPC ['text'],
				'banner_desc' => $_GPC ['banner_desc'],
				'link_type' => $_GPC ['link_type'],
			    'banner_type'=>1,
		        'content'=>$_GPC ['content'],
				'enable' => 1,
				'link_url' => $_GPC ['link_url'],
				'sort' => $_GPC ['displayorder'] 
		);
		if($data['link_type']==10 || $data['link_type']==4){
        		$res = explode(":",$_GPC ['link_url']);
        		$data['link_id']=$res[1];
		}else{
		        $data['link_id']="";
		}

		if (empty ( $data ['text'] )) {
			message ( '请输入标题！' );
		}
		if (empty ( $id )) {
			pdo_insert ( "banner", $data );
			$id = pdo_insertid ();
		} else {
			pdo_update ( "banner", $data, array (
					'banner_id' => $id 
			) );
		}
		message ( '数据更新成功！', url ( 'banner/indextop', array (
				'do' => 'display',
				"type" => $type 
		) ), 'success' );
	}
	
}

if ($do == 'delete') {
	$id = intval ( $_GPC ['id'] );
	if (! empty ( $id )) {
		$item = pdo_fetch ( "SELECT * FROM ims_banner WHERE banner_id = :id", array (
				':id' => $id 
		) );
	}
	if (empty ( $item )) {
		message ( '广告不存在' );
	}
	pdo_delete( "banner", array (
			'banner_id' => $id 
	) );
	message ( '删除成功！', url ( 'banner/indextop', array (
			'do' => 'display',
	) ), 'success' );
}
if ($do == "setproperty") {
    $id = intval($_GPC['id']);
    if(!empty($_GPC['type'])){
        $type = $_GPC['type'];
    }else{
        $type ="enable";
    }
    $data = intval($_GPC['data']);
    ($data == 1)? $data = 0:$data = 1;
    pdo_update("banner", array(
        $type => $data
    ), array(
        "banner_id" => $id
    ));
    die(json_encode(array(
        "result" => 1,
        "data" => $data
    )));
}

template("banner/slide");