<?php
/**
 * Winner
 * Winner
 */
defined('IN_IA') or exit('Access Denied');

class CustomModuleSite extends WeModuleSite {
	public function getTabUrls(){
		$urls = array();
		$urls[] = array('title' => '客服聊天记录', 'url' => $this->createWebUrl('chatlog'), 'do' => 'chatlog');
		return $urls;
	}

	public function doWebChatlog(){
		global $_GPC, $_W;
		load()->func('tpl');
		$starttime = empty($_GPC['starttime']) ? strtotime(date('Y-m-d')) : strtotime($_GPC['starttime']);
		if(!empty($_GPC['token'])) {
			unset($_GPC['token']);
			$avatar = '';
			$endtime = $starttime + 23 * 3600 + 3599;
			$acid = $_W['acid'];
			if(!empty($_GPC['nickname']) && empty($_GPC['openid'])) {
				$user = pdo_fetch('SELECT b.openid,a.avatar,b.nickname FROM ' . tablename('mc_members') . ' AS a LEFT JOIN ' . tablename('mc_mapping_fans') . ' AS b ON a.uid = b.uid WHERE b.acid = :acid AND a.nickname = :nickname', array(':nickname' => trim($_GPC['nickname']), ':acid' => $_W['acid']));
				if(empty($user['openid'])) {
					message('没有找到昵称为 "'. $_GPC['nickname'] .'" 的用户', $this->createWebUrl('chatlog', array('acid' => $acid, 'nickname' => $_GPC['nickname'], 'openid' => $_GPC['openid'], 'starttime' => $_GPC['starttime'])), 'error');
				} else {
					if(!empty($user['avatar'])) {
						$avatar = tomedia($user['avatar']);
						$nickname = $user['nickname'];
					}
				}
			} else {
				$openid = trim($_GPC['openid']);
				$user = pdo_fetch('SELECT b.openid,a.avatar,b.nickname FROM ' . tablename('mc_members') . ' AS a LEFT JOIN ' . tablename('mc_mapping_fans') . ' AS b ON a.uid = b.uid WHERE b.acid = :acid AND b.openid = :openid', array(':openid' => trim($_GPC['openid']), ':acid' => $_W['acid']));
				if(!empty($user['avatar'])) {
					$avatar = tomedia($user['avatar']);
					$nickname = $user['nickname'];
				}
			}
			if(empty($user['openid'])) {
				message('请输入粉丝昵称或者粉丝openid', referer(), 'error');
			}
			if($acid > 0 && !empty($starttime) && !empty($endtime)) {
				$pindex = max(1, intval($_GPC['page']));
				$acc = WeAccount::create($acid);
				$params = array('openid' => trim($user['openid']), 'starttime' => $starttime, 'endtime' => $endtime, 'pageindex' => $pindex, 'pagesize' => 50);
				$logs = $acc->fetchChatLog($params);
				$next = 1;
				if(is_error($logs) || empty($logs['recordlist']) || (count($logs['recordlist']) < $params['pagesize'])) {
					$next = 0;
				}
				$codedata = array();
				$codedata[1000] = '创建未接入会话';
				$codedata[1001] = '接入会话';
				$codedata[1002] = '主动发起会话';
				$codedata[1004] = '关闭会话';
				$codedata[1005] = '抢接会话';
				$codedata[2001] = '公众号收到消息';
				$codedata[2002] = '客服发送消息';
				$codedata[2003] = '客服收到消息';
			}
		}
		include $this->template('chatlog');
	}
}
