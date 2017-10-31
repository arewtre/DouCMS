<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
load()->model('user');
load()->func('tpl');
$_W['token'] = token();
$session = json_decode(base64_decode($_GPC['__session']), true);
if(is_array($session)) {
	$user = user_single(array('uid'=>$session['uid']));
	if(is_array($user) && $session['hash'] == md5($user['password'] . $user['salt'])) {
		$_W['uid'] = $user['uid'];
		$_W['username'] = $user['username'];
		$user['currentvisit'] = $user['lastvisit'];
		$user['currentip'] = $user['lastip'];
		$user['lastvisit'] = $session['lastvisit'];
		$user['lastip'] = $session['lastip'];
		$_W['user'] = $user;
		$founders = explode(',', $_W['config']['setting']['founder']);
		$_W['isfounder'] = in_array($_W['uid'], $founders);
		unset($founders);
	} else {
		isetcookie('__session', false, -100);
	}
	unset($user);
}
unset($session);

if(!empty($_GPC['__uniacid'])) {
	$_W['uniacid'] = intval($_GPC['__uniacid']);
	$_W['uniaccount'] = $_W['account'] = uni_fetch($_W['uniacid']);
	$_W['acid'] = $_W['account']['acid'];
	$_W['weid'] = $_W['uniacid'];
	if(!empty($_W['uid'])) {
		$_W['role'] = uni_permission($_W['uid'], $_W['uniacid']);
	}
}

$_W['template'] = 'default';
if(!empty($_W['setting']['basic']['template'])) {
	$_W['template'] = $_W['setting']['basic']['template'];
}
/*判断移动端访问*/
$agent = check_wap();
if(!empty($agent) )
{
  $_W['template'] = 'mobile';
}
function check_wap(){
  // 先检查是否为wap代理，准确度高
  if(stristr($_SERVER['HTTP_VIA'],"wap")){
    return true;
  }
  // 检查浏览器是否接受 WML.
  elseif(strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0){
    return true;
  }
  //检查USER_AGENT
  elseif(preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])){
    return true;       
  }
  else{
    return false;  
  }
}
/*判断移动端访问END*/
load()->func('compat.biz');
