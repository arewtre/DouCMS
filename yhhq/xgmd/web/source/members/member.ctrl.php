<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
include_once 'common/common.inc.php';
global $_W,$_GPC;
		//这个操作被定义用来呈现 管理中心导航菜单
        if($_W['ispost'] && $_W['isajax']) {
            $setting = uni_setting($_W['uniacid'], array('groupdata'));
            $setting["groupdata"]["is_auto"] = $_GPC["is_auto"];
            pdo_update("uni_settings",array("groupdata"=>iserializer($setting["groupdata"])),array("uniacid"=>$_W['uniacid']));
            die(json_encode(array("code"=>1, "message"=>"操作成功.")));
        }
        $settings = get_settings();
        $service = explode("|",$settings["service_qqs"]);
        $qqs = array();
        foreach($service as $ser) {
            list($name,$qq) = explode("-",$ser);
            $qqs[] = array(
                "name"=>$name,
                "qq"=>$qq
            );
        }
template('members/center');
	