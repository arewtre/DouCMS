<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
$eid = intval($_GPC['eid']);
if(!empty($eid)) {
	$sql = 'SELECT * FROM ' . tablename('modules_bindings') . ' WHERE `eid`=:eid';
	$entry = pdo_fetch($sql, array(':eid' => $eid));
} else {
	$sql = 'SELECT * FROM ' . tablename('modules_bindings') . ' WHERE module = :module AND do = :do';
	$entry = pdo_fetch($sql, array(':module' => trim($_GPC['m']), ':do' => trim($_GPC['do'])));
	if (empty($entry)) {
		$entry = array(
			'module' => $_GPC['m'],
			'do' => $_GPC['do'],
			'state' => $_GPC['state'],
			'direct' => $_GPC['direct']
		);
	}
}
if(empty($entry) || empty($entry['do'])) {
	message('非法访问.');
}
if(!$entry['direct']) {
	checklogin();
	load()->model('module');
	$module = module_fetch($entry['module']);
	if(empty($module)) {
		message("访问非法, 没有操作权限. (module: {$entry['module']})");
	}
	if(!uni_user_module_permission_check($entry['module'] . '_menu_' . $entry['do'], $entry['module'])) {
		message('您没有权限进行该操作');
	}
	define('FRAME', 'ext');
	define('CRUMBS_NAV', 1);
	$ptr_title = $entry['title'];
	$module_types = module_types();
	if($_COOKIE['ext_type'] == 1) {
		define('ACTIVE_FRAME_URL', url('fournet/pcentry/', array('eid' => $entry['eid'])));
	} else {
		define('ACTIVE_FRAME_URL', url('home/welcome/ext', array('m' => $entry['module'])));
	}
	$frames = buildframes(array(FRAME));
	$frames = $frames[FRAME];
}

if(!empty($entry['module']) && !empty($_W['founder'])) {
	load()->model('extension');
	if(ext_module_checkupdate($entry['module'])) {
		message('系统检测到该模块有更新，请点击“<a href="' . url('extension/module/upgrade', array('m' => $entry['module'])) . '">更新模块</a>”后继续使用！', '', 'error');
	}
}

$_GPC['__entry'] = $entry['title'];
$_GPC['__state'] = $entry['state'];

if(!empty($_W['modules'][$entry['module']]['handles']) && (count($_W['modules'][$entry['module']]['handles']) > 1 || !in_array('text', $_W['modules'][$entry['module']]['handles']))) {
	$handlestips = true;
}
$site = WeUtility::createModuleSite($entry['module']);
define('IN_MODULE', $entry['module']);

if(!is_error($site)) {
	$sysmodule = system_modules();
	if(in_array($m, $sysmodule)) {
		$site_urls = $site->getTabUrls();
	}
	$method = 'doWeb' . ucfirst($entry['do']);
	exit($site->$method());
}

exit("访问的方法 {$method} 不存在.");
