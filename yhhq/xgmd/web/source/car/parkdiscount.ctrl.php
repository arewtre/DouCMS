<?php
defined('IN_IA') or exit('Access Denied');
uni_user_permission_check('car_park_list');
$dos = array(
    'display',
    'discount'
);
$uid = $_GPC['__uid'];
$user = pdo_fetch("select * from ".tablename("users")." where uid=:uid",array(':uid' => $uid));
$Db = new DB();
$do = in_array($do, $dos) ? $do : 'display';
load()->model('car');
if ($do == 'display') {
    if(checksubmit('end_submit',true)){
        $discounts = $_GPC['discounts'];
        foreach ($discounts as $discount_type => $discount_1){
            foreach ($discount_1 as $week => $discount_2){
                $conditions =" discount_type = {$discount_type} and week = {$week}";
                $d = pdo_fetchall("select * from ".tablename('ecm_park_discount')." where ".$conditions);
                $data = array(
                    'discount_type' => $discount_type,
                    'week' => $week,
                    'discount' => $discount_2[0],
                    'reduce' => $discount_2[1]
                );
                if (empty($d)){
                    pdo_insert('ecm_park_discount',$data);
                }else{
                    pdo_update('ecm_park_discount',$data,array('discount_id'=>$d[0]['discount_id']));
                }
            }
        }
    }
    $sql = "select * from " . tablename('ecm_park_discount');
    $list = pdo_fetchall($sql);
    $discounts = formatPorData($list);
}
template('car/parkdiscount');

function formatPorData($discounts)
{
    $data = array();
    foreach ($discounts as $discount) {
        $data[$discount['discount_type']][$discount["week"]][0] = $discount["discount"];
        $data[$discount['discount_type']][$discount["week"]][1] = $discount["reduce"];
    }
    return $data;
}
// Array ( 
//     [1] => Array ( 
//         [1] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [2] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [3] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [4] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [5] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [6] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [0] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         ) 
//     [2] => Array ( 
//         [1] => Array ( [0] => 10.0 [1] => 0.00 ) 
//         [2] => Array ( [0] => 10.0 [1] => 0.00 ) 
//         [3] => Array ( [0] => 10.0 [1] => 0.00 ) 
//         [4] => Array ( [0] => 10.0 [1] => 0.00 ) 
//         [5] => Array ( [0] => 10.0 [1] => 0.00 ) 
//         [6] => Array ( [0] => 10.0 [1] => 0.00 ) 
//         [0] => Array ( [0] => 10.0 [1] => 0.00 ) 
//         ) 
//     [3] => Array ( 
//         [1] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [2] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [3] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [4] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [5] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [6] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         [0] => Array ( [0] => 5.0 [1] => 0.00 ) 
//         ) 
//     )