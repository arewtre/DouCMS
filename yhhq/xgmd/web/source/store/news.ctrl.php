<?php
$action = 'news';
$storeid = intval($_GPC['storeid']);
if ($do == 'post') {
    $id = intval($_GPC['id']);
    $item = pdo_fetch("SELECT * FROM ls_businesscenter_news WHERE id = :id", array(':id' => $id));
    $stores = pdo_fetchall("select * from ls_businesscenter_stores ");
    if (!empty($item)) {
        $starttime = date('Y-m-d H:i', $item['start_time']);
        $endtime = date('Y-m-d H:i', $item['end_time']);
    } else {
        $item = array(
            'status' => 1,
            'top' => 1
        );
        $starttime = date('Y-m-d H:i');
        $endtime = date('Y-m-d H:i', TIMESTAMP + 86400 * 30);
    }

    if (!empty($item)) {
        $thumb = tomedia($item['thumb']);
    }

    if (checksubmit('submit')) {
        $data = array(
            'weid' => intval($_W['uniacid']),
            'storeid' => intval($_GPC['storeid']),
            'title' => trim($_GPC['title']),
            'summary' => trim($_GPC['summary']),
            'description' => trim($_GPC['description']),
            'url' => trim($_GPC['url']),
            'address' => trim($_GPC['address']),
            'start_time' => intval(strtotime($_GPC['start_time'])),
            'end_time' => intval(strtotime($_GPC['end_time'])),
            'isfirst' => intval($_GPC['isfirst']),
            'top' => intval($_GPC['top']),
            'status' => intval($_GPC['status']),
            'displayorder' => intval($_GPC['displayorder']),
            'dateline' => TIMESTAMP,
//             'old_price'=>$_GPC['oldprice'],
//             'new_price'=>$_GPC['newprice']
        );

        if (!empty($_GPC['thumb'])) {
            $data['thumb'] = $_GPC['thumb'];
            load()->func('file');
            file_delete($_GPC['thumb-old']);
        }

        if (empty($data['title'])) {
            message('请输入优惠标题');
        }

        if ($data['end_time'] <= $data['start_time']) {
            message('请输入正确的时间区间！');
        }

        if (empty($id)) {
            pdo_insert('businesscenter_news', $data);
        } else {
            unset($data['dateline']);
            pdo_update('businesscenter_news', $data, array('id' => $id));
        }
        message('数据更新成功！', url('store/news', array('do' => 'display', 'storeid' => $storeid)), 'success');
    }
} elseif ($do == 'display') {
    if (!empty($_GPC['displayorder'])) {
        foreach ($_GPC['displayorder'] as $id => $displayorder) {
            pdo_update('businesscenter_news', array('displayorder' => $displayorder), array('id' => $id));
        }
        message('排序更新成功！', url('store/news', array('op' => 'display', 'storeid' => $storeid)), 'success');
    }
    $pindex = max(1, intval($_GPC['page']));
    $psize = 10;
    $condition = " WHERE storeid={$storeid} ";
    if (!empty($_GPC['keyword'])) {
        $condition .= " AND title LIKE '%{$_GPC['keyword']}%'";
    }

    if (isset($_GPC['status'])) {
        $condition .= " AND status = '" . intval($_GPC['status']) . "'";
    }

    $list = pdo_fetchall("SELECT * FROM ls_businesscenter_news $condition ORDER BY status DESC, displayorder DESC, id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize);

    $total = pdo_fetchcolumn("SELECT COUNT(*) FROM ls_businesscenter_news $condition");
    $pager = pagination($total, $pindex, $psize);
} elseif ($do == 'delete') {
    $id = intval($_GPC['id']);
    $row = pdo_fetch("SELECT * FROM ls_businesscenter_news WHERE id = :id", array(':id' => $id));
    if (empty($row)) {
        message('抱歉，数据不存在或是已经被删除！');
    }
    if (!empty($row['logo'])) {
        file_delete($row['logo']);
    }
    pdo_delete('businesscenter_news', array('id' => $id));
    message('删除成功！', referer(), 'success');
} elseif ($do == 'check') {
    if (!empty($_GPC['displayorder'])) {
        foreach ($_GPC['displayorder'] as $id => $displayorder) {
            pdo_update($this->modulename . '_news', array('displayorder' => $displayorder), array('id' => $id));
        }
        message('排序更新成功！', $this->createWebUrl('news', array('op' => 'display', 'storeid' => $storeid)), 'success');
    }

    $pindex = max(1, intval($_GPC['page']));
    $psize = 10;
    $condition = " WHERE weid = '{$_W['uniacid']}' AND mode=1 ";
    if (!empty($_GPC['keyword'])) {
        $condition .= " AND title LIKE '%{$_GPC['keyword']}%'";
    }

    if (!empty($_GPC['category_id'])) {
        $cid = intval($_GPC['category_id']);
        $condition .= " AND pcate = '{$cid}'";
    }

    if (isset($_GPC['status'])) {
        $condition .= " AND status = '" . intval($_GPC['status']) . "'";
    }

    $list = pdo_fetchall("SELECT * FROM " . tablename($this->modulename . '_news') . " $condition ORDER BY status DESC, displayorder DESC, id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize);

    $total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename($this->modulename . '_news') . " $condition");

    $pager = pagination($total, $pindex, $psize);
} else if ($operation == 'checkdetail') {
    $id = intval($_GPC['id']);
    if (!empty($id)) {
        $item = pdo_fetch("SELECT * FROM " . tablename($this->modulename . '_news') . " WHERE id = :id", array(':id' => $id));
        if (empty($item)) {
            message('抱歉，商家不存在或是已经删除！', '', 'error');
        }
    }
    if (checksubmit('submit')) {
        $data = array(
            'checked' => intval($_GPC['checked']),
            'status' => intval($_GPC['status']),
        );
        pdo_update($this->modulename . '_news', $data, array('id' => $id));
        message('数据更新成功！', $this->createWebUrl('news', array('op' => 'check', 'storeid' => $storeid)), 'success');
    }
}
template('store/news');
