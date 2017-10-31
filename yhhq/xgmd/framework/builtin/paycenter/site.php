<?php
/**
 * Winner
 * Winner
 */
defined('IN_IA') or exit('Access Denied');
class PaycenterModuleSite extends WeModuleSite {
	public function __construct() {
		global $_W, $_GPC;
		load()->model('paycenter');
		if($_GPC['do'] != 'pay') {
			$session = json_decode(base64_decode($_GPC['_pc_session']), true);
			if(is_array($session)) {
				load()->model('user');
				$user = user_single(array('uid'=>$session['uid']));
				if(is_array($user) && $session['hash'] == md5($user['password'] . $user['salt'])) {
					$clerk = pdo_get('activity_clerks', array('uniacid' => $_W['uniacid'], 'uid' => $user['uid']));
					if(empty($clerk)) {
						message('您没有管理该店铺的权限', referer(), 'error');
					}
					$_W['uid'] = $user['uid'];
					$_W['username'] = $user['username'];
					$_W['user'] = $user;
				} else {
					isetcookie('_pc_session', false, -100);
				}
				unset($user);
			}
			if(empty($_W['user']) && $_W['openid'] && $_GPC['_wechat_logout'] != '1') {
				$clerk = pdo_get('activity_clerks', array('openid' => $_W['openid'], 'uniacid' => $_W['uniacid']));
				if(!empty($clerk)) {
					$user = pdo_get('users', array('uid' => $clerk['uid']));
					if(!empty($user)) {
						$cookie = array();
						$cookie['uid'] = $user['uid'];
						$cookie['username'] = $user['username'];
						$cookie['hash'] = md5($user['password'] . $user['salt']);
						$session = base64_encode(json_encode($cookie));
						isetcookie('_pc_session', $session, !empty($_GPC['rember']) ? 7 * 86400 : 0, true);
						$_W['uid'] = $user['uid'];
						$_W['username'] = $user['username'];
						$_W['user'] = $user;
					}
				}
			}
		}
	}

	public function doMobileLogin() {
		global $_W, $_GPC;
		if(!empty($_W['user'])) {
			header('Location:' . $this->createMobileUrl('home'));
			die;
		}
		if($_W['isajax']) {
			load()->model('user');
			$user['username'] = trim($_GPC['username']);
			$user['password'] = trim($_GPC['password']);

			$user = user_single($user);
			if(empty($user)) {
				message(error(-1, '账号或密码错误'), '', 'ajax');
			}
			if($user['status'] == 1) {
				message(error(-1, '您的账号正在审核或是已经被系统禁止，请联系网站管理员解决'), '', 'ajax');
			}
			$clerk = pdo_get('activity_clerks', array('uniacid' => $_W['uniacid'], 'uid' => $user['uid']));
			if(empty($clerk)) {
				message(error(-1, '您没有管理该店铺的权限'), '', 'ajax');
			}
			$cookie = array();
			$cookie['uid'] = $user['uid'];
			$cookie['hash'] = md5($user['password'] . $user['salt']);
			$session = base64_encode(json_encode($cookie));
			isetcookie('_pc_session', $session, !empty($_GPC['rember']) ? 7 * 86400 : 0, true);
			message(error(0, ''), '', 'ajax');
		}
		include $this->template('login');
	}

	public function doMobileLogout() {
		isetcookie('_pc_session', '', -10000);
		isetcookie('_wechat_logout', '1', 180);
		$forward = $_GPC['forward'];
		if(empty($forward)) {
			$forward = './?refersh';
		}
		header('Location:' . $this->createMobileUrl('login'));
		die;
	}

	public function doMobileHome() {
		global $_W, $_GPC;
		paycenter_check_login();
		$user_permission = uni_user_permission('system');
		$today_revenue = $this->revenue(0);
		$yesterday_revenue = $this->revenue(-1);
		$seven_revenue = $this->revenue(-7);
		include $this->template('home');
	}
	
	
	public function revenue($period) {
		global $_W;
		if($period == '0') {
			$starttime = strtotime(date('Y-m-d'));
			$endtime = $starttime + 86400;
		} else {
			$starttime = strtotime(date('Y-m-d',strtotime($period . 'day')));
			$endtime = strtotime(date('Y-m-d'));
		}
		$condition = "WHERE uniacid = :uniacid AND status = 1 AND paytime >= :starttime AND paytime <= :endtime";
		$params = array(':starttime' => $starttime, ':endtime' => $endtime, ':uniacid' => $_W['uniacid']);
		$revenue = pdo_fetchcolumn("SELECT SUM(final_fee) FROM" . tablename('paycenter_order') . $condition, $params);
		return floatval($revenue);
	}

	public function doMobilePay() {
		global $_W, $_GPC;
		$id = intval($_GPC['id']);
		$order = pdo_get('paycenter_order', array('uniacid' => $_W['uniacid'], 'id' => $id));
		if(empty($order)) {
			message('订单不存在或已删除', '', 'error');
		}
		if($order['status'] == 1) {
			message('该订单已付款', '', 'error');
		}
		if(!empty($_W['member']['uid']) || !empty($_W['fans'])) {
			$update = array(
				'uid' => $_W['member']['uid'],
				'openid' => $_W['openid'],
				'nickname' => $_W['fans']['nickname']
			);
			pdo_update('paycenter_order', $update, array('uniacid' => $_W['uniacid'], 'id' => $id));
			$order['uid'] = $_W['member']['uid'];
		}
		$params['module'] = "paycenter_order";
		$params['tid'] = $order['id'];
		$params['ordersn'] = $order['id'];
		$params['user'] = $order['uid'];
		$params['fee'] = $order['final_fee'];
		$params['title'] = $_W['account']['name'] . $order['body'] ? $order['body'] : '收银台收款';
		$this->pay($params);
	}

	public function payResult($params) {
		global $_W;
		if($params['result'] == 'success' && $params['from'] == 'notify') {
			$order = pdo_get('paycenter_order', array('id' => $params['tid'], 'uniacid' => $_W['uniacid']));
			if(!empty($order)) {
				if(!empty($params['tag'])) {
					$params['tag'] = iunserializer($params['tag']);
				}
				$data = array(
					'type' => $params['type'],
					'trade_type' => strtolower($params['trade_type']),
					'status' => 1,
					'paytime' => TIMESTAMP,
					'uniontid' => $params['tag']['uniontid'],
					'transaction_id' => $params['tag']['transaction_id'],
					'follow' => intval($params['follow']),
					'final_fee' => $params['card_fee'],
				);
				if($params['type'] == 'credit') {
					$data['credit2'] = $params['card_fee'];
				} else {
					$data['cash'] = $params['card_fee'];
				}
				if($params['is_usecard'] == 1) {
					$discount_fee = $order['fee'] - $params['card_fee'];
					$data['remark'] = "使用优惠券减免{$discount_fee}元";
				}
				pdo_update('paycenter_order', $data, array('id' => $params['tid'], 'uniacid' => $_W['uniacid']));
			}
		}
		if($params['result'] == 'success' && $params['from'] == 'return') {
			message('支付成功！', $this->createMobileUrl('paydetail', array('id' => $params['tid'])), 'success');
		}
	}

	public function doMobilePayDetail() {
		global $_W, $_GPC;
		$id = intval($_GPC['id']);
		$order = pdo_get('paycenter_order', array('id' => $id, 'uniacid' => $_W['uniacid']));
		if(empty($order)) {
			message('订单不存在或已删除', '', 'error');
		}
		if($order['store_id'] > 0) {
			$store = pdo_get('activity_stores', array('id' => $order['store_id']), array('business_name'));
		}
		include $this->template('paydetail');
	}

	public function doMobileSelfpay() {
		global $_W, $_GPC;
		if(checksubmit()) {
			$fee = trim($_GPC['fee']) ? trim($_GPC['fee']) : message('收款金额有误', '', 'error');
			$body = trim($_GPC['body']);
			$openid = trim($_GPC['openid']) ? trim($_GPC['openid']) : message('用户信息错误',  '', 'error');
			$clerk = pdo_get('activity_clerks', array('uniacid' => $_W['uniacid'], 'id' => intval($_GPC['clerk_id'])));
			$data = array(
				'uniacid' => $_W['uniacid'],
				'openid' => $openid,
				'nickname' => trim($_GPC['nickname']),
				'uid' => $_W['member']['uid'],
				'clerk_id' => $clerk['id'],
				'clerk_type' => 3,
				'store_id' => $clerk['storeid'],
				'body' => $body,
				'fee' => $fee,
				'final_fee' => $fee,
				'credit_status' => 1,
				'createtime' => TIMESTAMP,
			);
			pdo_insert('paycenter_order', $data);
			$id = pdo_insertid();
			header('location:' . $this->createMobileUrl('pay', array('id' => $id)));
			die;
		}
		$fans = mc_oauth_userinfo();
		if(is_error($fans) || empty($fans)) {
					}
		include $this->template('selfpay');
	}
}