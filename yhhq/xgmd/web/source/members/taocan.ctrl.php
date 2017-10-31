<?php 
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
load()->model('setting');
$settings = $_W['setting']['taocan'];
$_W['page']['title'] = '套餐信息设置 - 系统管理';
	if (checksubmit('submit')) {
		$data = array(
			'jichuid' => intval($_GPC['jichuid']),
			'shangyeid' => intval($_GPC['shangyeid']),
			'hangyeid' => intval($_GPC['hangyeid'])
		);
		setting_save($data, 'taocan');
		message('更新设置成功！', url('shop/taocan'));
	}
	$grouplist = pdo_fetchall("SELECT id, name FROM ".tablename('uni_group'));


template('shop/taocan');