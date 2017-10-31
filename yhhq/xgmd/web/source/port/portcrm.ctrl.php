<?php
defined('IN_IA') or exit('Access Denied');
uni_user_permission_check('port_crm');
$dos = array('display','portcrm','ajax');
$weid = $_W['uniacid'];
$Db = new DB();
$do = in_array($do, $dos) ? $do : 'display';
$a = $_GPC['a'];
load()->model('port');
if ($do == 'display') {
    if($_W['ispost']){
        if($_GPC['check_type'] == 1){
           $id = intval($_GPC['id']);
           if(false === pdo_update('port',array('is_open'=>intval($_GPC['status'])),array('id'=>$id))){
               exit('error');
           }
           exit('success');
        }elseif ($_GPC['check_type'] == 2){
            $id = intval($_GPC['id']);
            if(false === pdo_update('port_list',array('is_open'=>intval($_GPC['status'])),array('id'=>$id))){
                exit('error');
            }
            exit('success');
        }
    }
}
if($a == 'portcrm'){
    $type = 1;
}elseif ($a == 'portcar'){
    $type = 2;
}
$sql = "select * from ".tablename('port')." where type = :type and weid = :weid";
$port = pdo()->fetch($sql,array(':type'=>$type,':weid'=>$weid));
$port_list = pdo()->fetchall("select * from ".tablename('port_list')." where pid=:pid",array(':pid'=>$port['id']));
template('port/portmanager');

