<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
include_once 'common/common.inc.php';
global $_W,$_GPC;
checklogin();
if($_W['ispost'] && $_W['isajax']) {
    $user = pdo_fetch("SELECT U.* FROM ".tablename("uni_account_users")." AS A LEFT JOIN ".tablename("users")." AS U ON A.uid=U.uid WHERE A.uniacid=:uniacid AND A.role='manager'",array(":uniacid"=>$_W['uniacid']));
    if(empty($user)) die(json_encode(array("code"=>1, "message"=>"该账号不允许变更套餐.")));
    $res = buy_package($user, $_GPC['pid'], $_GPC['total']);
    if(!is_error($res)){
        die(json_encode(array("code"=>1, "message"=>"购买成功.")));
    }
    die(json_encode(array("code"=>0, "message"=>$res["message"])));
}

$idList = pdo_fetchall("SELECT id FROM ".tablename("uni_group"));
$_items = array();
foreach($idList as $item){
    $_items[] = $item["id"];
}
$list = uni_groups($_items);
$curr_count = count($list[$_W["user"]["account"]["groupid"]]['modules']);
template('members/buypackage');