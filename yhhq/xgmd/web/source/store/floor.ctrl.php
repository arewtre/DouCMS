<?php
checklogin();
load()->func('tpl');
$action = 'floor';
$title = '楼层管理';
$do = ! empty($_GPC['do']) ? $_GPC['do'] : 'display';
if ($do == 'display') {
//     echo"<pre>";print_r($_GPC['displayorder']);die;
    if (! empty($_GPC['displayorder'])) {
        foreach ($_GPC['displayorder'] as $id => $displayorder) {
            pdo_update("floor", array('sort' => $displayorder ), array( 'floor_id' => $id));
        }
        message('更新排序成功！', url('store/floor', array('do' => 'display')), 'success');
    }    
    $children = array();
    $floor = pdo_fetchall("SELECT * FROM ims_floor  ORDER BY sort DESC");
//     foreach ($floor as $k => $v) {
         
//         $floor[$k]["children"] = pdo_fetchall("SELECT * FROM ims_floor  where parentid=".$v['id']."  ORDER BY displayorder DESC");
//     }
}elseif ($do == "setProperty") {
    //echo"<pre>";print_r($_GPC);die;
	$id = intval ($_GPC['id'] );
	$type = $_GPC['type'];
	$data = intval ($_GPC['data'] );
	($data == 1)? $data = 0:$data = 1;
	pdo_update ("floor", array ($type => $data), array ("floor_id" => $id)); 
	die (json_encode (array ("result" => 1,"data" => $data)));
}elseif ($do == 'delete') {
    $id = intval($_GPC['id']);
    $item = pdo_fetch("SELECT *  FROM " . "ims_store" . " WHERE floor_id = '$id'");
    if (!empty($item)) {
        message('抱歉，抱歉该楼层下关联有商户，不允许删除！', url('store/floor', array(
            'do' => 'display',
        )), 'error');
    }
    pdo_delete('floor', array('floor_id' => $id,));
    message('区域删除成功！', url('store/floor', array( 'do' => 'display', )), 'success');
}elseif ($do == 'post') {
    $id = intval($_GPC['id']);
    $parentid = $_GPC['parent_id'];
    if (! empty($id)) {
        $item = pdo_fetch("select * from ims_floor where floor_id = '$id'");
    } else {
        $item = array(
            'displayorder' => 0
        );
    }
//     if (! empty($item)) {
//         if (! empty($item['logo'])) {
//             $logo = $item['logo'];
//             if (strpos($item['logo'], 'http') || strstr($item['logo'], '../addons/')) {
//             $logo = $item['logo'];
//             } else {
//             $logo = $item['logo'];
//             }
//         }
//     }
    if (checksubmit('submit')) {
        if (empty($_GPC['floorname'])) {
            message('抱歉，请输入楼层名称！');
        }
        $data = array(
            //'weid' => 0,
            'floor_name' => $_GPC['floorname'],
            //'logo' => $_GPC['logo'],
            'sort' => intval($_GPC['displayorder']),
            //'parentid' => 0
        );
        if (! empty($id)) {
            pdo_update("floor", $data, array(
                'floor_id' => $id
            ));
        } else {
//             if(!empty($parentid)){
//                 $data['parentid']= $parentid;
//             }
            pdo_insert("floor", $data);
            $id = pdo_insertid();
        }
        message('更新楼层成功！', url('store/floor', array(
            'do' => 'display'
        )), 'success');
    }
}
template('store/floor');    