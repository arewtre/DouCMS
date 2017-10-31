<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
uni_user_permission_check('site_category');
$do = !empty($do) ? $do : 'display';
$do = in_array($do, array('display', 'post', 'delete', 'fetch', 'check')) ? $do : 'display';

if ($do == 'display') {
	if (!empty($_GPC['displayorder'])) {
		foreach ($_GPC['displayorder'] as $id => $displayorder) {
			$update = array('displayorder' => $displayorder['displayorder']);
			pdo_update('site_category', $update, array('id' => $id));
						pdo_update('site_nav', $update, array('uniacid' => $_W['uniacid'], 'id' => $displayorder['nid']));
		}
		message('分类排序更新成功！', 'refresh', 'success');
	}
	$children = array();
	$category = pdo_fetchall("SELECT * FROM ".tablename('site_category')." WHERE uniacid = '{$_W['uniacid']}' ORDER BY parentid, displayorder DESC, id");
	foreach ($category as $index => $row) {
		if (!empty($row['parentid'])){
			$children[$row['parentid']][] = $row;
			unset($category[$index]);
		}
	}
	template('site/category');
} elseif ($do == 'post') {
	$parentid = intval($_GPC['parentid']);
	$id = intval($_GPC['id']);
		$setting = uni_setting($_W['uniacid'], array('default_site'));
	$site_styleid = pdo_fetchcolumn('SELECT styleid FROM ' . tablename('site_multi') . ' WHERE id = :id', array(':id' => $setting['default_site']));
	if($site_styleid) {
		$site_template = pdo_fetch("SELECT a.*,b.name,b.sections FROM ".tablename('site_styles').' AS a LEFT JOIN ' . tablename('site_templates') . ' AS b ON a.templateid = b.id WHERE a.uniacid = :uniacid AND a.id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $site_styleid));
	}

		$styles = pdo_fetchall("SELECT a.*, b.name AS tname, b.title FROM ".tablename('site_styles').' AS a LEFT JOIN ' . tablename('site_templates') . ' AS b ON a.templateid = b.id WHERE a.uniacid = :uniacid', array(':uniacid' => $_W['uniacid']), 'id');
	if(!empty($id)) {
		$category = pdo_fetch("SELECT * FROM ".tablename('site_category')." WHERE id = '$id' AND uniacid = {$_W['uniacid']}");
		if(empty($category)) {
			message('分类不存在或已删除', '', 'error');
		}
		if (!empty($category['css'])) {
			$category['css'] = iunserializer($category['css']);
		} else {
			$category['css'] = array();
		}
	} else {
		$category = array(
			'displayorder' => 0,
			'css' => array(),
		);
	}
	if (!empty($parentid)) {
		$parent = pdo_fetch("SELECT id, name FROM ".tablename('site_category')." WHERE id = '$parentid'");
		if (empty($parent)) {
			message('抱歉，上级分类不存在或是已经被删除！', url('site/category/display'), 'error');
		}
	}
	$category['style'] = $styles[$category['styleid']];
	$category['style']['tname'] = empty($category['style']['tname'])? 'default' : $category['style']['tname'];
	if(!empty($category['nid'])) {
		$category['nav'] = pdo_get('site_nav', array('id' => $category['nid']));
	} else {
		$category['nav'] = array();
	}
	$multis = pdo_getall('site_multi', array('uniacid' => $_W['uniacid']), array(), 'id');
	
	if (checksubmit('submit')) {
		if (empty($_GPC['cname'])) {
			message('抱歉，请输入分类名称！');
		}
		$data = array(
			'uniacid' => $_W['uniacid'],
			'name' => $_GPC['cname'],
			'displayorder' => intval($_GPC['displayorder']),
			'parentid' => intval($parentid),
			'description' => $_GPC['description'],
			'styleid' => intval($_GPC['styleid']),
			'linkurl' => $_GPC['linkurl'],
			'ishomepage' => intval($_GPC['ishomepage']),
			'enabled' => intval($_GPC['enabled'])
		);
		
		$data['icontype'] = intval($_GPC['icontype']);
		if($data['icontype'] == 1) {
			$data['icon'] = '';
			$data['css'] = serialize(array(
				'icon' => array(
					'font-size' => $_GPC['icon']['size'],
					'color' => $_GPC['icon']['color'],
					'width' => $_GPC['icon']['size'],
					'icon' => empty($_GPC['icon']['icon']) ? 'fa fa-external-link' : $_GPC['icon']['icon'],
				),
			));
		} else {
			$data['css'] = '';
			$data['icon'] = $_GPC['iconfile'];
		}
		
		$isnav = intval($_GPC['isnav']);
		if($isnav) {
			$nav = array(
				'uniacid' => $_W['uniacid'],
				'categoryid' => $id,
				'displayorder' => $_GPC['displayorder'],
				'name' => $_GPC['cname'],
				'description' => $_GPC['description'],
				'url' => "./index.php?c=site&a=site&cid={$category['id']}&i={$_W['uniacid']}",
				'status' => 1,
				'position' => 1,
				'multiid' => intval($_GPC['multiid']),
			);
			if ($data['icontype'] == 1) {
				$nav['icon'] = '';
				$nav['css'] = serialize(array(
					'icon' => array(
						'font-size' => $_GPC['icon']['size'],
						'color' => $_GPC['icon']['color'],
						'width' => $_GPC['icon']['size'],
						'icon' => empty($_GPC['icon']['icon']) ? 'fa fa-external-link' : $_GPC['icon']['icon'],
					),
					'name' => array(
						'color' => $_GPC['icon']['color'],
					),
				));
			} else {
				$nav['css'] = '';
				$nav['icon'] = $_GPC['iconfile'];
			}
			if($category['nid']) {
				$nav_exist = pdo_fetch('SELECT id FROM ' . tablename('site_nav') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $category['nid'], ':uniacid' => $_W['uniacid']));
			} else {
				$nav_exist = '';
			}
			if(!empty($nav_exist)) {
				pdo_update('site_nav', $nav, array('id' => $category['nid'], 'uniacid' => $_W['uniacid']));
			} else {
				pdo_insert('site_nav', $nav);
				$nid = pdo_insertid();
				$data['nid'] = $nid;
			}
		} else {
			if($category['nid']) {
				$data['nid'] = 0;
				pdo_delete('site_nav', array('id' => $category['nid'], 'uniacid' => $_W['uniacid']));
			}
		}
		if (!empty($id)) {
			unset($data['parentid']);
			pdo_update('site_category', $data, array('id' => $id));
		} else {
			pdo_insert('site_category', $data);
			$id = pdo_insertid();
			$nav_url['url'] = "./index.php?c=site&a=site&cid={$id}&i={$_W['uniacid']}";
			pdo_update('site_nav', $nav_url, array('id' => $data['nid'], 'uniacid' => $_W['uniacid']));
		}
		message('更新分类成功！', url('site/category'), 'success');

	}
	template('site/category');
} elseif ($do == 'fetch') {
	$category = pdo_fetchall("SELECT id, name FROM ".tablename('site_category')." WHERE parentid = '".intval($_GPC['parentid'])."' ORDER BY id ASC, displayorder ASC, id ASC ");
	message($category, '', 'ajax');
} elseif ($do == 'delete') {
	load()->func('file');
	$id = intval($_GPC['id']);
	$category = pdo_fetch("SELECT id, parentid, nid FROM ".tablename('site_category')." WHERE id = '$id'");
	if (empty($category)) {
		message('抱歉，分类不存在或是已经被删除！', url('site/category/display'), 'error');
	}
	$navs = pdo_fetchall("SELECT icon, id FROM ".tablename('site_nav')." WHERE id IN (SELECT nid FROM ".tablename('site_category')." WHERE id = {$id} OR parentid = '$id')", array(), 'id');
	if (!empty($navs)) {
		foreach ($navs as $row) {
			file_delete($row['icon']);
		}
		pdo_query("DELETE FROM ".tablename('site_nav')." WHERE id IN (".implode(',', array_keys($navs)).")");
	}
	pdo_delete('site_category', array('id' => $id, 'parentid' => $id), 'OR');
	message('分类删除成功！', url('site/category'), 'success');
} elseif($do == 'check') {
	$styleid = intval($_GPC['styleid']);

	if($styleid > 0) {
		$styles = pdo_fetch("SELECT a.*,b.name,b.sections FROM ".tablename('site_styles').' AS a LEFT JOIN ' . tablename('site_templates') . ' AS b ON a.templateid = b.id WHERE a.uniacid = :uniacid AND a.id = :id', array(':uniacid' => $_W['uniacid'], ':id' => $styleid));
		if(empty($styles) || $styles['sections'] !=0) {
			exit('error');
		} else {
			exit('success');
		}
	}
	exit('error');
}