<?php 
/**
 * [OO System] Copyright (c) 2015 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */

defined('IN_IA') or exit('Access Denied');
$modulename = $_GPC['modulename'];
$callname = $_GPC['callname'];
$uniacid = $_GPC['uniacid'];
$_W['uniacid'] = $_GPC['uniacid'];
$args = $_GPC['args'];
$site = WeUtility::createModuleSite($modulename);
if (empty($site)) {
	message(array(), '', 'ajax');
}
$ret = @$site->$callname($args);
message($ret, '', 'ajax');