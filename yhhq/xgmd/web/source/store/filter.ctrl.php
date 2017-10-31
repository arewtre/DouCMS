<?php
checklogin();
load()->func('tpl');
$action = 'filter';
$title = '筛选条件管理';
$do = ! empty($_GPC['do']) ? $_GPC['do'] : 'display';
if ($do == 'display') {
    if (! empty($_GPC['displayorder'])) {
        foreach ($_GPC['displayorder'] as $id => $displayorder) {
            pdo_update("businesscenter_filter", array(
                'displayorder' => $displayorder
            ), array(
                'id' => $id
            ));
        }
        message('更新排序成功！', url('store/filter', array(
            'do' => 'display'
        )), 'success');
    }
    
    $children = array();
    $floor = pdo_fetchall("SELECT * FROM ls_businesscenter_filter  ORDER BY displayorder DESC");
} elseif ($do == 'post') {
    $id = intval($_GPC['id']);
    if (! empty($id)) {
        $item = pdo_fetch("select * from ls_businesscenter_filter where id = '$id'");
    } else {
        $item = array(
            'displayorder' => 0
        );
    }
    if (! empty($item)) {
        if (! empty($item['logo'])) {
            $logo = $item['logo'];
            if (strpos($item['logo'], 'http') || strstr($item['logo'], '../addons/')) {
            $logo = $item['logo'];
            } else {
            $logo = $item['logo'];
            }
        }
    }
    if (checksubmit('submit')) {
        if (empty($_GPC['name'])) {
            message('抱歉，请输入筛选条件名称！');
        }
        $data = array(
            'name' => $_GPC['name'],
            'logo' => $_GPC['logo'],
            'displayorder' => intval($_GPC['displayorder']),
            'enable' => 1
        );
        if (! empty($id)) {
            pdo_update("businesscenter_filter", $data, array(
                'id' => $id
            ));
        } else {
            pdo_insert("businesscenter_filter", $data);
            $id = pdo_insertid();
        }
        message('更新筛选条件成功！', url('store/filter', array(
            'do' => 'display'
        )), 'success');
    }
}elseif ($do == "setStoresProperty") {
    $id = intval($_GPC['id']);
    $type = $_GPC['type'];
    $data = intval($_GPC['data']);
    empty($data) ? ($data = 1) : $data = 0;
    if (! in_array($type, array(
        'enable',
    ))) {
        die(json_encode(array(
            "result" => 0
        )));
    }
    pdo_update("businesscenter_filter", array(
        $type => $data
    ), array(
        "id" => $id
    ));
    die(json_encode(array(
        "result" => 1,
        "data" => $data
    )));
}

template('store/filter');    