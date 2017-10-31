<?php
defined('IN_IA') or exit('Access Denied');
$dos = array(
    'display',
    'post',
    'del',
    'setProperty'
);
$do = in_array($do, $dos) ? $do : 'display';
$aType = 1;
if ($do == 'display') {
    $type = intval($_GPC['type']);
    if (! empty($_GPC['displayorder'])) {
        foreach ($_GPC['displayorder'] as $id => $displayorder) {
            pdo_update("activity_article", array(
                'sort' => $displayorder
            ), array(
                'id' => $id
            ));
        }
        message('排序更新成功！', url('activity/hot', array(
            'do' => 'display'
        )), 'success');
    }
    
    $pindex = max(1, intval($_GPC['page']));
    $psize = 10;
    
    $condition = '';
    if (! empty($_GPC['keyword'])) {
        $condition .= " AND name LIKE '%{$_GPC['keyword']}%'";
    }
    
    if ($type == 1) {
        $condition .= " AND enable=1 ";
    }
    
    if ($type == 2) {
        $condition .= " AND time_limit = 1  AND to_days(from_UNIXTIME(`start_time`,'%Y-%m-%d %H:%i:%S'))<to_days(now()) ";
    }
    
    if ($type == 3) {
        $condition .= " AND time_limit = 1  AND to_days(from_UNIXTIME(`end_time`,'%Y-%m-%d %H:%i:%S'))<to_days(now()) ";
    }
    
    $list = pdo_fetchall("SELECT * FROM ls_activity_article WHERE type=$aType $condition ORDER BY enable DESC, sort DESC, id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize);
    if (! empty($list)) {
        $total = pdo_fetchcolumn('SELECT COUNT(1) FROM ls_activity_article WHERE 1=1 ' . $condition);
        $pager = pagination($total, $pindex, $psize);
    }
}

if ($do == 'post') {
    $attrs = pdo_fetchall("SELECT * FROM ls_activity_article_attr ORDER BY id ", array(), 'id');
    $id = intval($_GPC['id']);
    if (! empty($id)) {
        $item = pdo_fetch("SELECT * FROM " . 'ls_activity_article ' . " WHERE id = :id", array(
            ':id' => $id
        ));
        if (empty($item)) {
            $item['start_time'] = TIMESTAMP;
            $item['end_time'] = TIMESTAMP;
            message('抱歉，商家不存在或是已经删除！', '', 'error');
        } else {
            if (empty($item['start_time'])) {
                $item['start_time'] = TIMESTAMP;
            }
            if (empty($item['end_time'])) {
                $item['end_time'] = TIMESTAMP;
            }
        }
        $attrlinkdata = pdo_fetchall("select * from ls_activity_article_attr_link where act_id=:id", array(
            ":id" => $id
        ));
    } else {
        $item['start_time'] = TIMESTAMP;
        $item['end_time'] = TIMESTAMP;
    }
    if (! empty($item)) {
        $logo = tomedia($item['logo']);
    }
    
    if (checksubmit('submit')) {
        $data = array(
            'name' => $_GPC['name'],
            'logo' => $_GPC['logo'],
            'content' => $_GPC['content'],
            'time_limit' => $_GPC['time_limit'],
            'start_time' => strtotime($_GPC['datelimit']['start']),
            'end_time' => strtotime($_GPC['datelimit']['end']),
            'title' => $_GPC['name'],
            'enable' => $_GPC['enable'],
            'sort' => $_GPC['sort'],
            'type' => $aType,
            'applyable' => $_GPC['applyable']
        );
        if (empty($data['name'])) {
            message('请输入活动名称！');
        }
        $attrlinks = $_GPC['attrlink'];
        if ($data['applyable'] == 1 && empty($attrlinks)) {
            message("请选择预定提交资料");
        }
        if (empty($id)) {
            pdo_insert("activity_article", $data);
            $id = pdo_insertid();
        } else {
            pdo_update("activity_article", $data, array(
                'id' => $id
            ));
        }
        pdo_delete("activity_article_attr_link", array(
            "act_id" => $id
        ));
        
        $date = date('Y-m-d H:i:s');
        foreach ($attrlinks as $aid => $able) {
            $attrdata = array(
                'act_id' => $id,
                'attr_id' => $aid,
                'not_null' => $able,
                'reg_time' => $date
            );
            pdo_insert("activity_article_attr_link", $attrdata);
        }
        message('数据更新成功！', url('activity/hot', array(
            'do' => 'display'
        )), 'success');
    }
}

if($do=='setProperty'){
    $id = intval($_GPC['id']);
    $type = $_GPC['type'];
    $data = intval($_GPC['data']);
    empty($data) ? ($data = 1) : $data = 0;
    if (! in_array($type, array(
        'enable'
    ))) {
        die(json_encode(array(
            "result" => 0
        )));
    }
    pdo_update("activity_article", array(
        $type => $data
    ), array(
        "id" => $id
    ));
    die(json_encode(array(
        "result" => 1,
        "data" => $data
    )));
}

template('activity/hot');