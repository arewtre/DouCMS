<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
 defined('IN_IA') or exit('Access Denied');
        global $_W, $_GPC;
		$dos = array('payset');
		$do = in_array($do, $dos) ? $do : 'payset';
        $op     = $_GPC['op'] ? $_GPC['op'] : 'payset';
        $weid   = $_GPC['weid'];
        $payset = pdo_fetch("SELECT * FROM " . tablename('buymod_payset') . " where weid=:weid", array(
            ':weid' => 0
        ));
        if (checksubmit('submit')) {
            $data = array(
                'weid' => 0,
                'uid' => $_W['uid'],
                'alipayaccount' => $_GPC['alipayaccount'],
                'alipaypartner' => $_GPC['alipaypartner'],
                'alipaykey' => $_GPC['alipaykey'],
                'yunpid' => $_GPC['yunpid'],
                'yunkey' => $_GPC['yunkey'],
                'yunaccount' => $_GPC['yunaccount']
            );
            if (empty($payset)) {
                pdo_insert('buymod_payset', $data);
            } else {
                pdo_update('buymod_payset', $data, array(
                    'id' => $payset['id']
                ));
            }
        }
        template('members/plug/pay');