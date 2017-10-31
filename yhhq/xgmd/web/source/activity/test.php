<?php
global $_W, $_GPC;
$weid = $_W['uniacid'];
checklogin();
$op = $_GPC['op'];
if (empty($op)) {
    $op = 'display';
    if (! empty($_GPC['keyword'])) {
        $condition .= " AND a.hdname LIKE '%{$_GPC['keyword']}%' OR a.province LIKE '%{$_GPC['keyword']}%' OR a.city LIKE '%{$_GPC['keyword']}%'";
    }
    $mendianid = $_GPC['mendianid'];
    if (! empty($mendianid)) {
        $condition .= " AND a.mendianid=" . $mendianid;
    }
    $list = pdo_fetchall("SELECT a.*,b.title as name FROM " . tablename('jy_signup_hd') . " as a  left join " . tablename('weisrc_businesscenter_stores') . " as b on a.mendianid=b.id WHERE a.weid=" . $weid . " AND a.enabled=1 $condition ORDER BY a.displayorder DESC,a.id ASC");
    if (checksubmit('submit')) {
        foreach ($_GPC['displayorder'] as $id => $displayorder) {
            pdo_update('jy_signup_hd', array(
                'displayorder' => $displayorder
            ), array(
                'id' => $id
            ));
        }
        message('活动排序更新成功！', $this->createWebUrl('huodong'), 'success');
    }
}
if ($op == 'add') {
    load()->func('tpl');
    $mendianid = $_GPC['mendianid'];
    $id = $_GPC['id'];
    if (! empty($id)) {
        $item = pdo_fetch("SELECT * FROM " . tablename('jy_signup_hd') . " WHERE id=" . $id);
        $item['thumb'] = unserialize($item['thumb']);
    } else {
        $item = array(
            'pl' => 0,
            'sc' => 0,
            'num' => 0,
            'pv' => 0,
            'deadline' => TIMESTAMP + 3600 * 24 * 30,
            'mendianid' => $mendianid,
            'starttime' => TIMESTAMP + 3600 * 24 * 7,
            'endtime' => TIMESTAMP + 3600 * 24 * 30
        );
    }
    $hdcate = pdo_fetchall("SELECT name,id FROM " . tablename('jy_signup_cate') . " WHERE enabled=1 AND weid=" . $weid . " ORDER BY displayorder DESC,id ASC");
    $mendian = pdo_fetchall("SELECT title,id FROM " . tablename('weisrc_businesscenter_stores') . " WHERE weid=" . $weid);
    if (! empty($id)) {
        $ziliao_arr = array();
        $ziliao_arr2 = array();
        $ziliao_array = array();
        $ziliao = pdo_fetchall('SELECT * FROM ' . tablename('jy_signup_hd_ziliao') . " WHERE weid=" . $weid . " AND hdid=" . $id . " ORDER BY id ASC");
        foreach ($ziliao as $key => $value) {
            if ($value['enabled'] == 0) {
                array_push($ziliao_arr, $value['ziliao']);
            } else {
                array_push($ziliao_arr2, $value['ziliao']);
            }
            array_push($ziliao_array, $value['ziliao']);
        }
        $zilaio_cs = array(
            'mail',
            'qq',
            'wechat',
            'company',
            'age',
            'sex',
            'education',
            'weibo'
        );
        $ziliao2 = array_diff($zilaio_cs, $ziliao_array);
    }
    if (checksubmit('submit')) {
        if (empty($_GPC['hdname'])) {
            message('请输入活动标题！');
        }
        if (empty($_GPC['hdcateid'])) {
            message('请选择活动类型！');
        }
        if (empty($_GPC['thumb'])) {
            message('请上传活动图片！');
        }
        if (empty($_GPC['address'])) {
            message('请填写活动地址！');
        }
        if (empty($_GPC['reside'])) {
            message('请选择活动地区！');
        }
        if (empty($_GPC['description'])) {
            message('请选择活动描述！');
        }
        $data = array(
            'weid' => $_W['weid'],
            'hdname' => $_GPC['hdname'],
            'mendianid' => $_GPC['mendianid'],
            'hdcateid' => $_GPC['hdcateid'],
            'renshu' => $_GPC['renshu'],
            'time' => $_GPC['time'],
            'deadline' => strtotime($_GPC['deadline']),
            'starttime' => strtotime($_GPC['time2']['start']),
            'endtime' => strtotime($_GPC['time2']['end']),
            'address' => $_GPC['address'],
            'province' => $_GPC['reside']['province'],
            'city' => $_GPC['reside']['city'],
            'dist' => $_GPC['reside']['district'],
            'price' => $_GPC['price'],
            'lng' => $_GPC['location']['lng'],
            'lat' => $_GPC['location']['lat'],
            'sc' => $_GPC['sc'],
            'pv' => $_GPC['pv'],
            'description' => $_GPC['description']
        );
        if (is_array($_GPC['thumb'])) {
            $data['thumb'] = serialize($_GPC['thumb']);
        }
        if (empty($id)) {
            $data['createtime'] = TIMESTAMP;
            pdo_insert('jy_signup_hd', $data);
            $id = pdo_insertid();
        } else {
            pdo_update('jy_signup_hd', $data, array(
                'id' => $id
            ));
        }
        pdo_delete('jy_signup_hd_ziliao', array(
            'hdid' => $id
        ));
        if (! empty($_GPC['ziliao'])) {
            $ziliao = $_GPC['ziliao'];
            foreach ($ziliao as $key => $value) {
                $enabled = substr($value, 0, 1);
                $ziliao = substr($value, 1);
                $data2 = array(
                    'weid' => $weid,
                    'ziliao' => $ziliao,
                    'hdid' => $id,
                    'enabled' => $enabled,
                    'createtime' => TIMESTAMP
                );
                pdo_insert('jy_signup_hd_ziliao', $data2);
            }
        }
        message('信息更新成功！', $this->createWebUrl('huodong'), 'success');
    }
}
if ($op == 'del') {
    $id = $_GPC['id'];
    pdo_update('jy_signup_hd', array(
        'enabled' => 0
    ), array(
        'id' => $id
    ));
    message('删除成功！', $this->createWebUrl('huodong'), 'success');
}
include $this->template('web/huodong');

