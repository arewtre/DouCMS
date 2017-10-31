<?php
defined('IN_IA') or exit('Access Denied');
$dos = array(
    'display',
    'setProperty'
);
$do = in_array($do, $dos) ? $do : 'display';

if ($do == 'display') {
    $pindex = max(1, intval($_GPC['page']));
    $psize = 10;
    
    $id = $_GPC['id'];
    if (empty($id)) {
        message('抱歉，活动不存在或是已经删除！', '', 'error');
    }
    
    $condition = '';
    if (! empty($_GPC['keyword'])) {
        $key_attr = intval($_GPC['key_attr']);
        if ($key_attr > 0) {
            $keyword = $_GPC['keyword'];
            $condition .= " AND (a.attr_id=$key_attr and a.val LIKE '%{$keyword}%')";
        }
    }
    
    $type = intval($_GPC['type']);
    if ($type == 1) {
        $condition .= "and l.handle=1";
    }
    if ($type == 2) {
        $condition .= "and l.handle=0";
    }
    
    $list = pdo_fetchall("select distinct l.* from ls_activity_article_apply l left join ls_activity_article_apply_attr a on a.apply_id=l.id where l.act_id=$id $condition order by id desc limit " . ($pindex - 1) * $psize . "," . $psize);
    if (! empty($list)) {
        $total = pdo_fetchcolumn("select count(l.id) from ls_activity_article_apply l left join ls_activity_article_apply_attr a on a.apply_id=l.id where l.act_id=$id " . $condition);
        $pager = pagination($total, $pindex, $psize);
        foreach ($list as $ak => $apply) {
            $attr_vals = pdo_fetchall("select * from ls_activity_article_apply_attr where apply_id=" . $apply['id']);
            $i_attr = array();
            foreach ($attr_vals as $av) {
                $i_attr[$av['attr_id']] = $av['val'];
            }
            $list[$ak]['attr_val'] = $i_attr;
        }
    }
    
    $attr_keys = pdo_fetchall("select l.*,a.name from ls_activity_article_attr_link l left join ls_activity_article_attr a on l.attr_id=a.id where act_id=$id ");
}

if ($do == 'setProperty') {
    $id = intval($_GPC['id']);
    pdo_update("activity_article_apply", array(
        "handle" => 1
    ), array(
        "id" => $id
    ));
    die(json_encode(array(
        "result" => 1
    )));
}

template('activity/apply');