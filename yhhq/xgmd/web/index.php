<?php
error_reporting (E_ALL & ~E_NOTICE);
define('IN_SYS', true);
require '../framework/bootstrap.inc.php';
require IA_ROOT . '/web/common/bootstrap.sys.inc.php';
load()->web('common');
load()->web('template');
if (empty($_W['isfounder']) && !empty($_W['user']) && $_W['user']['status'] == 1) {
	message('您的账号正在审核或是已经被系统禁止，请联系网站管理员解决！');
}

$acl = array(
	'account' => array(
		'default' => 'welcome',
		'direct' => array(
			'welcome',
			'auth'
		),
		'founder' => array(
			'groups'
		)
	),
	'home' => array(
		'default' => 'welcome',
		'founder' => array()
	),
	'cloud' => array(
		'default' => 'touch',
		'direct' => array(
			'touch',
			'dock',
			'download'
		),
		'founder' => array(
			'diagnose',
			'redirect',
			'upgrade',
			'process',
			'device'
		)
	),
	'extension' => array(
		'direct' => array(
			'subscribe',
		),
		'founder' => array(
			'module',
			'service',
			'theme',
		)
	),
	'site' => array(
		'direct' => array(
			'entry'
		)
	),
	'system' => array(
		'founder' => array(
			'site',
			'common',
			'attachment',
			'copyright',
			'database',
			'tools',
			'updatecache',
			'sysinfo'
		)
	),
	'user' => array(
		'default' => 'display',
		'direct' => array(
			'login',
			'register',
			'logout',
			'uclogin'
		),
		'founder' => array(		
			'edit',
			'fields',
			'group',
			'registerset',
		)
	),
	'utility' => array(
		'direct' => array(
			'verifycode',
			'code',
			'file',
			'emoji',
			'bindcall',
			'subscribe',
			'wxcode',
		)
	),
	'article' => array(
		'direct' => array(
			'notice-show',
			'news-show',
			'case-show',
			'plug-show',
			'link-show',
			'about-show',
			'agent-show',
			'agent-list',
			'product-show'
		),
		'founder' => array(
			'news',
			'notice',
			'case',
			'plug',
			'link',
			'about',
			'agent'
			
		)
	),
	'website' => array(
		'direct' => array(
			'sdp-show',
			'xiaoqu-show',
			'canting-show',
			'taocan-show',
			'wenda-show',
		),
		'founder' => array(
			'sdp',
			'xiaoqu',
			'canting',
			'taocan',
			'wenda'
			
		)
	),
	'agent' => array(
		'direct' => array(
			'agent_login',
			'agent',
			'agent_info',
			'agent_show',
			'agent_site',
			'agent_user',
			'logout',
				'uclogin'
		)
	),
	'fournet' => array(
		'direct' => array(
			'wxauth_api'
		)
	),
	'shop' => array(
		'direct' => array(
		),
		'founder' => array(
			'module',
			'muser',
			'mkdel',
			'mpayset',
			'maddmod',

			'mpayresult',
			'mgetpayresult',
			'mmodset',
		)
	),
	'cron' => array(
		'direct' => array(
			'entry',
		)
	)

);
if (($_W['setting']['copyright']['status'] == 1) && empty($_W['isfounder']) && $controller != 'cloud' && $controller != 'utility' && $controller != 'account') {
	$_W['siteclose'] = true;
	if ($controller == 'account' && $action == 'welcome') {
		template('account/welcome');
		exit;
	}
	if ($controller == 'user' && $action == 'login') {
		if (checksubmit()) {
			require _forward($controller, $action);
		}
		template('user/login');
		exit;
	}
	isetcookie('__session', '', -10000);
	message('站点已关闭，关闭原因：' . $_W['setting']['copyright']['reason'], url('account/welcome'), 'info');
}

$controllers = array();
$handle = opendir(IA_ROOT . '/web/source/');
if(!empty($handle)) {
	while($dir = readdir($handle)) {
		if($dir != '.' && $dir != '..') {
			$controllers[] = $dir;
		}
	}
}

if(!in_array($controller, $controllers)) {
	$controller = 'account';
}
$init = IA_ROOT . "/web/source/{$controller}/__init.php";
if(is_file($init)) {
	require $init;
}

$actions = array();
$handle = opendir(IA_ROOT . '/web/source/' . $controller);
if(!empty($handle)) {
	while($dir = readdir($handle)) {
		if($dir != '.' && $dir != '..' && strexists($dir, '.ctrl.php')) {
			$dir = str_replace('.ctrl.php', '', $dir);
			$actions[] = $dir;
		}
	}
}
if(empty($actions)) {
	header('location: ?refresh');
}
if(!in_array($action, $actions)) {
	$action = $acl[$controller]['default'];
}
if(!in_array($action, $actions)) {
	$action = $actions[0];
}

$_W['page'] = array();
$_W['page']['copyright'] = $_W['setting']['copyright'];

if(is_array($acl[$controller]['direct']) && in_array($action, $acl[$controller]['direct'])) {
		require _forward($controller, $action);
	exit;
}
if(is_array($acl[$controller]['founder']) && in_array($action, $acl[$controller]['founder'])) {
		if(!$_W['isfounder']) {
		message('不能访问, 需要创始人权限才能访问.');
	}
}

checklogin();

if(!defined('IN_GW')) {
	checkaccount();
	if(!in_array($_W['role'], array('manager', 'operator', 'founder', 'clerk'))) {
		message('您的账号没有访问此公众号的权限.');
	}
}
require _forward($controller, $action);

define('ENDTIME', microtime());
if (empty($_W['config']['setting']['maxtimeurl'])) {
	$_W['config']['setting']['maxtimeurl'] = 10;
}
if ((ENDTIME - STARTTIME) > $_W['config']['setting']['maxtimeurl']) {
	$data = array(
		'type' => '1',
		'runtime' => ENDTIME - STARTTIME,
		'runurl' => $_W['sitescheme'].$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
		'createtime' => TIMESTAMP
	);
	pdo_insert('core_performance', $data);
}

function _forward($c, $a) {
	$file = IA_ROOT . '/web/source/' . $c . '/' . $a . '.ctrl.php';
	return $file;
}

function _calc_current_frames(&$frames) {
	global $controller, $action;
	if(!empty($frames) && is_array($frames)) {
		foreach($frames as &$frame) {
			if(empty($frame['items'])) continue;
			foreach($frame['items'] as &$fr) {
				$query = parse_url($fr['url'], PHP_URL_QUERY);
				parse_str($query, $urls);
				if(empty($urls)) continue;
				if(defined('ACTIVE_FRAME_URL')) {
					$query = parse_url(ACTIVE_FRAME_URL, PHP_URL_QUERY);
					parse_str($query, $get);
				} else {
					$get = $_GET;
					$get['c'] = $controller;
					$get['a'] = $action;
				}
				if(!empty($do)) {
					$get['do'] = $do;
				}

				$diff = array_diff_assoc($urls, $get);
				if(empty($diff)) {
					$fr['active'] = ' active';
				}
			}
		}
	}
}
