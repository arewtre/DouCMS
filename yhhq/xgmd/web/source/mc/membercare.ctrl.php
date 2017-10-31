<?php
defined('IN_IA') or exit('Access Denied');
define('TIMESTAMP', time());
uni_user_permission_check('mc_member');
$dos = array('display', 'post','del', 'add', 'group', 'credit_record', 'credit_stat','system_edit');
$do = in_array($do, $dos) ? $do : 'display';
load()->model('mc');
if($do == 'display') {
	$_W['page']['title'] = '会员列表 - 会员关怀 - 会员中心';
	$groups = mc_groups();
	$pindex = max(1, intval($_GPC['page']));
	$psize = 50;
	$condition = '';
	$starttime = empty($_GPC['createtime']['start']) ? strtotime('-90 days') : strtotime($_GPC['createtime']['start']);
	$endtime = empty($_GPC['createtime']['end']) ? TIMESTAMP + 86399 : strtotime($_GPC['createtime']['end']) + 86399;
	$condition .= " AND createtime >= {$starttime} AND createtime <= {$endtime}";
	$condition .= empty($_GPC['username']) ? '' : " AND (( `realname` LIKE '%".trim($_GPC['username'])."%' ) OR ( `nickname` LIKE '%".trim($_GPC['username'])."%' ) OR ( `mobile` LIKE '%".trim($_GPC['username'])."%' )";
	if (!empty($_GPC['username'])) {
		if (!is_numeric(trim($_GPC['username']))) {
			$uid = pdo_fetchcolumn('SELECT `uid` FROM'. tablename('mc_mapping_fans')." WHERE openid = :openid", array(':openid' => trim($_GPC['username'])));
			$condition .= " OR ( `uid` = '$uid'))";
		} else {
			$condition .= ")";
		}
	}
	$condition .= intval($_GPC['groupid']) > 0 ?  " AND `groupid` = '".intval($_GPC['groupid'])."'" : '';
	if(checksubmit('export_submit', true)) {
		$sql = "SELECT uid, uniacid, groupid, realname, nickname, email, mobile, credit1, credit2, credit6, createtime  FROM ".tablename('mc_members')." WHERE uniacid = '{$_W['uniacid']}' ".$condition." ORDER BY createtime";
		$list = pdo_fetchall($sql);
		$header = array(
			'uid' => 'UID', 'realname' => '姓名', 'groupid' => '会员组', 'mobile' => '手机', 'email' => '邮箱',
			'credit1' => '积分', 'credit2' => '余额', 'createtime' => '注册时间',
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
					if(strexists($row['email'], 'lejiplaza.com')) {
						$row['email'] = '';
					}
					$row['createtime'] = date('Y-m-d H:i:s', $row['createtime']);
					$row['groupid'] = $groups[$row['groupid']]['title'];
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
		header("Content-Disposition:attachment; filename=会员数据.csv");
		echo $html;
		exit();
	}
	$sql = "SELECT uid, uniacid, groupid, realname, nickname,email,birthyear,birthmonth,birthday, mobile, credit1, credit2, credit6, createtime  FROM ".tablename('mc_members')." WHERE mobile != '' and uniacid = '{$_W['uniacid']}' ".$condition." ORDER BY createtime DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize;
	$list = pdo_fetchall($sql);
	if(!empty($list)) {
		foreach($list as &$li) {
			if(empty($li['email'])) {
				$li['email_effective'] = 0;
			} else {
				$li['email_effective'] = 1;
			}
		}
	}
	$total = pdo_fetchcolumn("SELECT COUNT(*) FROM ".tablename('mc_members')." WHERE uniacid = '{$_W['uniacid']}' ".$condition);
	$pager = pagination($total, $pindex, $psize);
	$stat['total'] = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_members') . ' WHERE uniacid = :uniacid', array(':uniacid' => $_W['uniacid']));
	$stat['today'] = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_members') . ' WHERE uniacid = :uniacid AND createtime >= :starttime AND createtime <= :endtime', array(':uniacid' => $_W['uniacid'], ':starttime' => strtotime('today'), ':endtime' => strtotime('today') + 86399));
	$stat['yesterday'] = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_members') . ' WHERE uniacid = :uniacid AND createtime >= :starttime AND createtime <= :endtime', array(':uniacid' => $_W['uniacid'], ':starttime' => strtotime('today')-86399, ':endtime' => strtotime('today')));
}
if($do == 'post') {
	$_W['page']['title'] = '编辑短信 - 会员关怀 - 会员中心';
	$weid = intval($_W['uniacid']);
	$uid = intval($_GPC['uid']);
	$realname = $_GPC['realname'];
	$sendtime = TIMESTAMP;
	if(!empty($_GPC['type']) && $_GPC[type]==='form'){
	    $operatoruid = $_COOKIE['xiaoo___uid'];
	    if(empty($operatoruid)){
	       message('页面长时间未响应，将退回登录页面！',url('user/login'),'success'); 
	    }
	    $smstext = $_GPC['smstext'];
	    if(!empty($smstext)){
	        $user = pdo_fetch('select * from '.tablename('mc_members').' where uid='.$uid);
	        if(empty($user)){
	            message('用户信息不存在',url('mc/membercare'),'success');
	        }
	        $url='http://utf8.sms.webchinese.cn/?Uid=qqkj001&Key=e9b908507a4ff2a52b44&smsMob='.$user['mobile'].'&smsText='.$smstext.'【南京乐基广场】';
	        if (Get($url)>0){
    	        pdo_insert('send_member_sms',array('weid' => $weid,'uid' => $uid,'smstext' => $smstext,'sendtime' => $sendtime,'operuid'=>$operatoruid));
    	        $id = pdo_insertid();
    	        if(!empty($id)){
    	            message('短信发送成功', url('mc/membercare'), 'success');
    	        }else{
    	            message('短信发送失败', referer(), 'success');
    	        }
	        }else{
	            message('短信发送失败，错误码：'.Get($url),url('mc/membercare'), 'success');
	        }
	    }else{
	        message('短信内容还未填写...',referer(),'success');
	    }
	}
}
function Get($url)
{
    if(function_exists('file_get_contents'))
    {
        $file_contents = file_get_contents($url);
    }
    else
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
    }
    return $file_contents;
}
if($do == 'system_edit') {
	$_W['page']['title'] = '功能设置-会员关怀-会员中心';
	$weid = intval($_W['uniacid']);
	if($_GPC['type'] == 'form'){
    	$settled = intval($_GPC['settled']);
    	$smstext = $_GPC['smstext'];
    	if(!empty($smstext)){
    	    $status = pdo_update('mc_member_care_system_edit', array('settled' => $settled, 'smstext' => $smstext), array('weid' => $weid));
    	}
    	if($status === false){
    	    message('数据更新失败，将进入功能设置页面', url('mc/membercare/system_edit', array('weid' => $weid)), 'success');
    	}
	}
	$setting = pdo_fetch("select * from" . tablename("mc_member_care_system_edit") . " where weid = ".$weid);
}
template('mc/membercare');