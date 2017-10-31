<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
global $_W,$_GPC;
if(!$_W['isfounder']) {
    message('不能访问, 需要创始人权限才能访问.');
}
$dos = array('auto');
$do = in_array($do, $dos) ? $do : 'display';

if($_W["ispost"] && $_W["isajax"]) {
    if($do == "auto") {
        die(json_encode(common_group_check()));
    }
}
template('member/test');