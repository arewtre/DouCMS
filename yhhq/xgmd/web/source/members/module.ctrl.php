<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
		global $_W, $_GPC;
		load()->func('tpl');
		load()->model('module');
        $dos = array('list', 'post');
		$do = in_array($do, $dos) ? $do : 'list';
        $mid    = $_GPC['mid'];
        $id     = $_GPC['id'];
        $pindex = max(1, intval($_GPC['page']));
        $psize  = 2;
        if (!empty($_GPC['keyword'])) {
            $condition .= " and title LIKE '%" . $_GPC['keyword'] . "%'";
        }
        if ($do == 'list') {
           	load()->model('module');
			load()->model('extension');
			load()->model('cloud');
			load()->model('cache');
			load()->func('file');
			$modtypes = module_types();
			$modules = pdo_fetchall("SELECT * FROM " . tablename('modules') .'WHERE mid > 10 ORDER BY `issystem` DESC, `mid` ASC', array(), 'mid');
				if (!empty($modules)) {
				foreach ($modules as $mid => $module) {
				$manifest = ext_module_manifest($module['name']);
				$modules[$mid]['official'] = empty($module['issystem']) && (strexists($module['author'], 'OO Team') || strexists($module['author'], '圈圈团队'));
				$modules[$mid]['description'] = strip_tags($module['description']);
				$owner   = pdo_get('uni_account_users',array('uniacid' =>$_W['uniacid'],'role' =>'owner'),'uid');
				$ownerg  = pdo_get('users',array('uid' =>$owner['uid']),'groupid');
				$taocmd  =getgroupmodules($ownerg['groupid']);
				$buymodule = pdo_fetch("SELECT * FROM " . tablename('uni_group') . " WHERE uniacid = :uniacid", array(':uniacid' => $_W['uniacid']));
			    $moduletime=unserialize($buymodule['moduletime']);
				
				if(is_array($manifest) && ver_compare($module['version'], $manifest['application']['version']) == '-1') {
					$modules[$mid]['upgrade'] = true;
				}
				if(in_array($module['name'], $sysmodules)) {
					$modules[$mid]['imgsrc'] = '../framework/builtin/' . $module['name'] . '/icon-custom.jpg';
					if(!file_exists($modules[$mid]['imgsrc'])) {
						$modules[$mid]['imgsrc'] = '../framework/builtin/' . $module['name'] . '/icon.jpg';
					}
				} else {
					$modules[$mid]['imgsrc'] = '../addons/' . $module['name'] . '/icon-custom.jpg';
					if(!file_exists($modules[$mid]['imgsrc'])) {
						$modules[$mid]['imgsrc'] = '../addons/' . $module['name'] . '/icon.jpg';
					}
				}
			}
		}
		$sysmodules = implode("', '", $sysmodules);
        }
        template('members/plug/module');
	