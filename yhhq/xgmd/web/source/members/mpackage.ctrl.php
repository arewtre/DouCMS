<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
 defined('IN_IA') or exit('Access Denied');
        global $_W, $_GPC;
       $dos = array('list');
		$do = in_array($do, $dos) ? $do : 'list';
        $id = $_GPC['id'];
        if (!empty($_GPC['keyword'])) {
            $condition .= " and name LIKE '%" . $_GPC['keyword'] . "%'";
        }
        if ($do == 'list') {
            $list = pdo_fetchall("SELECT * FROM " . tablename('uni_group') . ' WHERE uniacid = 0' . $condition);
        } else {
            $list  = pdo_fetch("SELECT * FROM " . tablename('uni_group') . ' WHERE id = :id', array(
                ':id' => $id
            ));
            $items = pdo_fetch("SELECT * FROM " . tablename('buymod_modules') . "where mid=:mid", array(
                ':mid' => $id
            ));
        }
        if (!empty($list)) {
            foreach ($list as &$row) {
                if (!empty($row['modules'])) {
                    $modules = iunserializer($row['modules']);
                    if (is_array($modules)) {
                        $row['modules'] = pdo_fetchall("SELECT name, title FROM " . tablename('modules') . " WHERE `name` IN ('" . implode("','", $modules) . "')");
                    }
                }
                if (!empty($row['templates'])) {
                    $templates = iunserializer($row['templates']);
                    if (is_array($templates)) {
                        $row['templates'] = pdo_fetchall("SELECT name, title FROM " . tablename('site_templates') . " WHERE id IN ('" . implode("','", $templates) . "')");
                    }
                }
            }
        }
        if (checksubmit('submit')) {
            $data = array(
                'weid' => $_W['uniacid'],
                'mid' => $id,
                'name' => $_GPC['name'],
                'price' => $_GPC['price'],
                'outLink' => $_GPC['outLink']
            );
            if (empty($items)) {
                pdo_insert('buymod_modules', $data);
            } else {
                pdo_update('buymod_modules', $data, array(
                    'mid' => $id
                ));
            }
            message('设置成功！', url('members/mPackage', array(
                'op' => 'list'
            )), 'success');
        }
        template('members/plug/package');