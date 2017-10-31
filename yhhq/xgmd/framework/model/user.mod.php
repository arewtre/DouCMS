<?php
/**
 * Winner
 * Winner
 */
defined('IN_IA') or exit('Access Denied');

function agent_add($user){
	if (empty($user) || !is_array($user)) {
		return 0;
	}
	$user['salt'] = random(8);
	$user['password'] = user_hash($user['password'], $user['salt']);
	$result = pdo_insert('agent', $user);
	if (!empty($result)) {
		$user['id'] = pdo_insertid();
	}
	return intval($user['id']);
}


function user_register($user) {
	if (empty($user) || !is_array($user)) {
		return 0;
	}
	if (isset($user['uid'])) {
		unset($user['uid']);
	}
	$user['salt'] = random(8);
	$user['password'] = user_hash($user['password'], $user['salt']);
	$user['joinip'] = CLIENT_IP;
	$user['joindate'] = TIMESTAMP;
	$user['lastip'] = CLIENT_IP;
	$user['lastvisit'] = TIMESTAMP;
	if (empty($user['status'])) {
		$user['status'] = 2;
	}
	$now = time();
	if(empty($user['endtime'])){
		$user['endtime'] = $now + 7 * 24 * 3600;
	}
	$result = pdo_insert('users', $user);
	if (!empty($result)) {
		$user['uid'] = pdo_insertid();
	}
	return intval($user['uid']);
}


function user_check($user) {
	if (empty($user) || !is_array($user)) {
		return false;
	}
	$where = ' WHERE 1 ';
	$params = array();
	if (!empty($user['uid'])) {
		$where .= ' AND `uid`=:uid';
		$params[':uid'] = intval($user['uid']);
	}
	if (!empty($user['username'])) {
		$where .= ' AND `username`=:username';
		$params[':username'] = $user['username'];
	}
	if (!empty($user['status'])) {
		$where .= " AND `status`=:status";
		$params[':status'] = intval($user['status']);
	}
	if (empty($params)) {
		return false;
	}
	$sql = 'SELECT `password`,`salt` FROM ' . tablename('users') . "$where LIMIT 1";
	$record = pdo_fetch($sql, $params);
	if (empty($record) || empty($record['password']) || empty($record['salt'])) {
		return false;
	}
	if (!empty($user['password'])) {
		$password = user_hash($user['password'], $record['salt']);
		return $password == $record['password'];
	}
	return true;
}

function agent_single($user_or_uid){
	$user = $user_or_uid;
	if (empty($user)) {
		return false;
	}
	if (is_numeric($user)) {
		$user = array('id' => $user);
	}
	if (!is_array($user)) {
		return false;
	}
	$where = ' WHERE 1 ';
	$params = array();
	if (!empty($user['name'])) {
		$where .= ' AND `name`=:username';
		$params[':username'] = $user['name'];
	}
	
	
	if (!empty($user['id'])) {
		$where .= ' AND `id`=:id';
		$params[':id'] = intval($user['id']);
	}
	$sql = 'SELECT * FROM ' . tablename('agent') . " $where LIMIT 1";
	$record = pdo_fetch($sql, $params);
	
	if (!empty($user['password'])) {
		$password = user_hash($user['password'], $record['salt']);
		
		if ($password != $record['password']) {
			return false;
		}
	}
	return $record;
}

function user_single($user_or_uid) {
	$user = $user_or_uid;
	if (empty($user)) {
		return false;
	}
	if (is_numeric($user)) {
		$user = array('uid' => $user);
	}
	if (!is_array($user)) {
		return false;
	}
	$where = ' WHERE 1 ';
	$params = array();
	if (!empty($user['uid'])) {
		$where .= ' AND `uid`=:uid';
		$params[':uid'] = intval($user['uid']);
	}
	if (!empty($user['username'])) {
		$where .= ' AND `username`=:username';
		$params[':username'] = $user['username'];
	}
	if (!empty($user['email'])) {
		$where .= ' AND `email`=:email';
		$params[':email'] = $user['email'];
	}
	if (!empty($user['status'])) {
		$where .= " AND `status`=:status";
		$params[':status'] = intval($user['status']);
	}
	if (empty($params)) {
		return false;
	}
	$sql = 'SELECT * FROM ' . tablename('users') . " $where LIMIT 1";
	$record = pdo_fetch($sql, $params);

	if (empty($record)) {
		return false;
	}
	if (!empty($user['password'])) {
		$password = user_hash($user['password'], $record['salt']);
		if ($password != $record['password']) {
			return false;
		}
	}
//	if(!empty($record['agentid'])){
//		$url=$_SERVER['SERVER_NAME'];
//		$record1 = pdo_get('agent_copyright', array('uid'=>$record['agentid']));
//		if($record1['yuming']!=$url){
//			message('登录失败，账户不存在或者密码错误！');
//		}
//	}
	if($record['type'] == ACCOUNT_OPERATE_CLERK) {
		$clerk = pdo_get('activity_clerks', array('uid' => $record['uid']));
		if(!empty($clerk)) {
			$record['name'] = $clerk['name'];
			$record['clerk_id'] = $clerk['id'];
			$record['store_id'] = $clerk['storeid'];
			$record['store_name'] = pdo_fetchcolumn('SELECT business_name FROM ' . tablename('activity_stores') . ' WHERE id = :id', array(':id' => $clerk['storeid']));
			$record['clerk_type'] = '3';
			$record['uniacid'] = $clerk['uniacid'];
		}
	} else {
				$record['name'] = $user['username'];
		$record['clerk_id'] = $user['uid'];
		$record['store_id'] = 0;
		$record['clerk_type'] = '2';
	}
	return $record;
}

function agent_update($user){
	if (empty($user['id']) || !is_array($user)) {
		return false;
	}
	$record = array();
	if (!empty($user['password'])) {
		$record['password'] = user_hash($user['password'], $user['salt']);
	}
	if (isset($user['intro'])) {
		$record['intro'] = $user['intro'];
	}
	if (isset($user['endtime'])) {
		$record['endtime'] = $user['endtime'];
	}
	if (isset($user['siteurl'])) {
		$record['siteurl'] = $user['siteurl'];
	}
	if (isset($user['moneybalance'])) {
		$record['moneybalance'] = $user['moneybalance'];
	}
	if (isset($user['mp'])) {
		$record['mp'] = $user['mp'];
	}
	if (empty($record)) {
		return false;
	}
	return pdo_update('agent', $record, array('id' => intval($user['id'])));
}

function record($user){
	if (empty($user['id']) || !is_array($user)) {
		return false;
	}
	$record = array();
	if (isset($user['status'])) {
		$record['status'] = $user['status'];
	}
	return pdo_update('agent_expenserecords', $record, array('id' => intval($user['id'])));	
}
function user_update($user) {
	if (empty($user['uid']) || !is_array($user)) {
		return false;
	}
	$record = array();
	if (!empty($user['username'])) {
		$record['username'] = $user['username'];
	}
	if (!empty($user['password'])) {
		$record['password'] = user_hash($user['password'], $user['salt']);
	}
	if (!empty($user['lastvisit'])) {
		$record['lastvisit'] = (strlen($user['lastvisit']) == 10) ? $user['lastvisit'] : strtotime($user['lastvisit']);
	}
	if (!empty($user['lastip'])) {
		$record['lastip'] = $user['lastip'];
	}
	if (isset($user['joinip'])) {
		$record['joinip'] = $user['joinip'];
	}
	if (isset($user['remark'])) {
		$record['remark'] = $user['remark'];
	}
	if (isset($user['type'])) {
		$record['type'] = $user['type'];
	}
	if (isset($user['status'])) {
		$status = intval($user['status']);
		if (!in_array($status, array(1, 2))) {
			$status = 2;
		}
		$record['status'] = $status;
	}
	if (isset($user['groupid'])) {
		$record['groupid'] = $user['groupid'];
	}
	if (isset($user['starttime'])) {
		$record['starttime'] = $user['starttime'];
	}
	if (isset($user['endtime'])) {
		$record['endtime'] = $user['endtime'];
	}
	if (empty($record)) {
		return false;
	}
	return pdo_update('users', $record, array('uid' => intval($user['uid'])));
}


function user_hash($passwordinput, $salt) {
	global $_W;
	$passwordinput = "{$passwordinput}-{$salt}-{$_W['config']['setting']['authkey']}";
	return sha1($passwordinput);
}


function user_level() {
	static $level = array(
		'-3' => '锁定用户',
		'-2' => '禁止访问',
		'-1' => '禁止发言',
		'0' => '普通会员',
		'1' => '管理员',
	);
	return $level;
}

function user_permission($uid, $uniacid = '') {
	global $_W;
	$uniacid = !empty($uniacid) ? $uniacid : $_W['uniacid'];
	$data = pdo_fetch("SELECT * FROM " . tablename('users_permission') . ' WHERE uid = :uid AND uniacid = :uniacid', array(':uid' => $uid, ':uniacid' => $uniacid));
	$arr = array();
	if (!empty($data['system'])) {
		$data['system'] = explode(',', $data['system']);
	}
	if (!empty($data['module'])) {
		$data['module'] = iunserializer($data['module']);
	}
	return $data;
}


function user_account_permission() {
	global $_W;
	$group = pdo_fetch('SELECT * FROM ' . tablename('users_group') . ' WHERE id = :id', array(':id' => $_W['user']['groupid']));
	$uniacocunts = pdo_getall('uni_account_users', array('uid' => $_W['uid'], 'role' => 'owner'), array(), 'uniacid');
	if (empty($uniacocunts)) {
		$uniacid_num = 0;
	} else {
				$sql = "SELECT COUNT(*) FROM ". tablename('uni_account'). " AS u RIGHT JOIN " .
			tablename('account')." AS a on u.default_acid = a.acid WHERE u.uniacid IN(". implode(',', array_keys($uniacocunts)). ")";
		$uniacid_num = pdo_fetchcolumn($sql);
	}
	$data = array(
		'group_name' => $group['name'],
		'maxaccount' => $group['maxaccount'],
		'uniacid_num' => $uniacid_num,
		'uniacid_limit' => intval($group['maxaccount']) - $uniacid_num,
	);
	return $data;
}
