<?php
defined('IN_IA') or exit('Access Denied');
uni_user_permission_check('car_park_list');
$dos = array('display','discount');
$do = in_array($do, $dos) ? $do:'display';
load()->model('car');
if($do == 'display'){
    $_W['page']['title'] = '停车缴费记录-管理-停车场';
    $pindex = max(1,intval($_GPC['page']));
    $psize = 30;
    $condition = '';
    $starttime = empty($_GPC['pay_time']['start']) ? strtotime('-90 days') : strtotime($_GPC['pay_time']['start']);
    $endtime = empty($_GPC['pay_time']['end']) ? TIMESTAMP + 86399 : strtotime($_GPC['pay_time']['end']) + 86399;
    $condition .=" pay_time >= {$starttime} and pay_time <= {$endtime}";
    if(empty($_GPC['typeid']) || intval($_GPC['typeid']) == 1){
        if(!empty($_GPC['order_sn'])){
            $condition .= " and order_sn like '%{$_GPC['order_sn']}%'";
        }
    }else{
        if(!empty($_GPC['order_sn'])){
            $condition .= " and plate_number like '%{$_GPC['order_sn']}%'";
        }
    }
    if($_GPC['paytype'] == 1){
        $condition .= " and buyer_type = 1"; 
    }elseif ($_GPC['paytype'] == 2){
        $condition .= " and buyer_type = 2";
    }elseif ($_GPC['paytype'] == 3){
        $condition .= " and buyer_type = 4";
    }
    if($_GPC['orderstate'] == 1){
        $condition .= " and status = 1"; 
    }elseif ($_GPC['orderstate'] == 2){
        $condition .= " and status = 0";
    }
    if(checksubmit('export_submit', true)) {
        $sql = "SELECT order_sn, out_trade_no, plate_number, in_time, end_time, buyer_type, amount, payment_name, pro_name, pay_time, fee,status  FROM ".tablename('ecm_order_park')." WHERE ".$condition." ORDER BY in_time desc";
        $list = pdo_fetchall($sql);
        $header = array(
            'order_sn' => '订单号', 'out_trade_no' => '流水号', 'plate_number' => '车牌号', 'in_time' => '开始时间', 'end_time' => '结束时间',
            'buyer_type' => '收费方式', 'amount' => '订单总价', 'payment_name' => '支付方式','pro_name' => '折扣','pay_time' => '支付时间','fee' => '实付',
            'subFee'=>'优惠金额','status' => '订单状态',
        );
        $keys = array_keys($header);
        $html = "\xEF\xBB\xBF";
        foreach($header as $li) {
            $html .= $li . "\t ,";
        }
        $html .= "\n";
        if(!empty($list)) {
            $size = ceil(count($list) / 500);
            for($i = 0; $i < $size; $i++) {
                $buffer = array_slice($list, $i * 500, 500);
                foreach($buffer as $row) {
                    $row['in_time'] = date('Y-m-d H:i:s', $row['in_time']);
                    $row['end_time'] = date('Y-m-d H:i:s', $row['end_time']);
                    $row['pay_time'] = date('Y-m-d H:i:s', $row['pay_time']);
                    if($row['buyer_type'] == 1){
                        $row['buyer_type']='支付宝服务窗';
                    }elseif($row['buyer_type'] == 2){
                        $row['buyer_type']='微信';
                    }elseif($row['buyer_type'] == 4){
                        $row['buyer_type']='喵街';
                    }
                    if($row['status'] == 1){
                        $row['status'] = '支付成功';
                    }elseif($row['status']){
                        $row['status'] = '已取消';
                    }
                    $row['subFee'] = $row['amount'] - $row['fee'];
                    foreach($keys as $key) {
                        $data[] = $row[$key];
                    }
                    $user[] = implode("\t ,", $data) . "\t ,";
                    unset($data);
                }
            }
            $html .= implode("\n", $user);
        }
        header("Content-type:text/csv");
        header("Content-Disposition:attachment; filename=停车数据.csv");
        echo $html;
        exit();
    }
    $total = pdo_fetchcolumn('select count(*) from '.tablename('ecm_order_park'). ' where'.$condition);
    $countFee = pdo_fetchcolumn('select sum(fee) from '.tablename('ecm_order_park').' where status = 1');
    $sql = 'select * from '.tablename('ecm_order_park').' where'. $condition.' order by in_time desc limit '.($pindex-1)*$psize.','.$psize;
    $result = pdo_fetchall($sql);
    foreach ($result as $k=>$li){
        $in_time =  date('Y-m-d H:i:s',$li['in_time']);
        $result[$k]['in_time']=$in_time;
        $end_time = date('Y-m-d H:i:s',$li['end_time']);
        $result[$k]['end_time']=$end_time;
        $pay_time = date('Y-m-d H:i:s',$li['pay_time']);
        $result[$k]['pay_time'] = $pay_time;
        $subFee = $li['amount']-$li['fee'];
        if($subFee == 0){
            $result[$k]['subFee'] = '0.00';
        }else{
            $result[$k]['subFee'] = $subFee;
        }
    }
    $list = $result;
    $pager = pagination($total, $pindex,$psize);
}
template('car/parklist');
