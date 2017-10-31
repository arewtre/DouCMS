<?php
load()->func('tpl');
$action = 'slide';
$storeid = intval($_GPC['storeid']);
$condition = '';

$url = url('store/slide', array('do' => 'display'));
if ($storeid != 0) {
    $url = url('store/slide', array('do' => 'display', 'storeid' => $storeid));
    $store = pdo_fetch("SELECT * FROM ls_businesscenter_stores WHERE id = :id", array(':id' => $storeid));
}

$operation = !empty($_GPC['do']) ? $_GPC['do'] : 'display';
if ($operation == 'post') {
    $id = intval($_GPC['id']);
    if (!empty($id)) {
        $item = pdo_fetch("SELECT * FROM ls_businesscenter_slide WHERE id = :id", array(':id' => $id));
        if (empty($item)) {
            message('抱歉，广告不存在或是已经删除！', '', 'error');
        }
    }

    if (!empty($item)) {
        $thumb = tomedia($item['attachment']);
        if (empty($item['starttime'])) {
            $item["starttime"] = TIMESTAMP;
            $item["endtime"] = TIMESTAMP;
        }
    } else {
        $item = array(
            "status" => 1,
            "starttime" => TIMESTAMP,
            "endtime" => strtotime(date("Y-m-d H:i", TIMESTAMP + 30 * 86400))
        );
    }

    if (checksubmit('submit')) {
        $data = array(
            'weid' => 0,
            'storeid' => intval($_GPC['storeid']),
            'title' => trim($_GPC['title']),
            'attachment' => $_GPC['attachment'],
            'url' => $_GPC['url'],
            'position' => intval($_GPC['position']),
            'starttime' => strtotime($_GPC['datelimit']['start']),
            'endtime' => strtotime($_GPC['datelimit']['end']),
            'status' => intval($_GPC['status']),
            'displayorder' => intval($_GPC['displayorder']),
            'dateline' => TIMESTAMP,
        );

        if (empty($id)) {
            pdo_insert("businesscenter_slide", $data);
        } else {
            unset($data['dateline']);
            pdo_update("businesscenter_slide", $data, array('id' => $id));
        }
        message('数据更新成功！', $url, 'success');
    }
} elseif ($operation == 'display') {
    if (!empty($_GPC['displayorder'])) {
        foreach ($_GPC['displayorder'] as $id => $displayorder) {
            pdo_update("ls_businesscenter_slide", array('displayorder' => $displayorder), array('id' => $id));
        }
        message('排序更新成功！', $url, 'success');
    }

    $strwhere = '';

    $pindex = max(1, intval($_GPC['page']));
    $psize = 10;
    $list = pdo_fetchall("SELECT * FROM ls_businesscenter_slide WHERE  storeid=:storeid $strwhere ORDER BY status DESC, displayorder DESC, id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, array(':storeid' => $storeid));

    if (!empty($list)) {
        $total = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . "ls_businesscenter_slide" . " WHERE  storeid=:storeid $strwhere", array(':storeid' => $storeid));
        $pager = pagination($total, $pindex, $psize);
    }
} elseif ($operation == 'delete') {
    $id = intval($_GPC['id']);
    $row = pdo_fetch("SELECT * FROM ls_businesscenter_slide WHERE id = :id", array(':id' => $id));
    if (empty($row)) {
        message('抱歉，数据不存在或是已经被删除！');
    }

    pdo_delete("ls_businesscenter_slide", array('id' => $id));
    message('删除成功！', url('store/slide', array('do' => 'display')), 'success');
}

template('store/slide');
