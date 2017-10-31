<?php
/**
 * Winner
 * Winner
 */
defined('IN_IA') or exit('Access Denied');

function cloud_client_define() {
	return array(
		'/framework/function/communication.func.php',
		'/framework/model/cloud.mod.php',
		'/web/source/cloud/upgrade.ctrl.php',
		'/web/source/cloud/process.ctrl.php',
		'/web/source/cloud/dock.ctrl.php',
		'/web/themes/default/cloud/upgrade.html',
		'/web/themes/default/cloud/process.html'
	);
}

function cloud_prepare() {
	global $_W;
	setting_load();
//	if(empty($_W['setting']['site']['key']) || empty($_W['setting']['site']['token'])) {
//		return error('-1', "您的程序需要在汇纳云服务平台注册你的站点资料, 来接入云平台服务后才能使用相应功能.");
//	}
	return true;
}

function cloud_m_prepare($name) {
	$pars['method'] = 'module.check';
	$pars['module'] = $name;
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	if (is_error($dat)) {
		return $dat;
	}
//	if ($dat['content'] == 'install-module-protect') {
//		return error('-1', '此模块已设置版权保护，您只能通过云平台来安装。');
//	}
	return true;
}

function _cloud_build_params() {
	global $_W;
	$pars = array();
	$pars['host'] = $_SERVER['HTTP_HOST'];
	$pars['family'] = IMS_FAMILY;
	$pars['version'] = IMS_VERSION;
	$pars['release'] = IMS_RELEASE_DATE;
	$pars['key'] = $_W['setting']['site']['key'];
	$pars['password'] = md5($_W['setting']['site']['key'] . $_W['setting']['site']['token']);
	$clients = cloud_client_define();
	$string = '';
	foreach($clients as $cli) {
		$string .= md5_file(IA_ROOT . $cli);
	}
	$pars['client'] = md5($string);
	return $pars;
}

function cloud_m_build($modulename) {
	$sql = 'SELECT * FROM ' . tablename('modules') . ' WHERE `name`=:name';
	$module = pdo_fetch($sql, array(':name' => $modulename));
	$pars = _cloud_build_params();
	$pars['method'] = 'module.build';
	$pars['module'] = $modulename;
	if(!empty($module)) {
		$pars['module_version'] = $module['version'];
	}
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/module.build';
	$ret = _cloud_shipping_parse($dat, $file);
	if(!is_error($ret)) {
		$dir = IA_ROOT . '/addons/' . $modulename;
		$files = array();
		if(!empty($ret['files'])) {
			foreach($ret['files'] as $file) {
				$entry = $dir . $file['path'];
				if(!is_file($entry) || md5_file($entry) != $file['checksum']) {
					$files[] = '/'. $modulename . $file['path'];
				}
			}
		}
		$ret['files'] = $files;
		$schemas = array();
		if(!empty($ret['schemas'])) {
			load()->func('db');
			foreach($ret['schemas'] as $remote) {
				$name = substr($remote['tablename'], 4);
				$local = db_table_schema(pdo(), $name);
				unset($remote['increment']);
				unset($local['increment']);
				if(empty($local)) {
					$schemas[] = $remote;
				} else {
					$diffs = db_table_fix_sql($local, $remote);
					if(!empty($diffs)) {
						$schemas[] = $remote;
					}
				}
			}
		}
		$ret['upgrade'] = true;
		$ret['type'] = 'module';
		$ret['schemas'] = $schemas;
				if(empty($module)) {
			$ret['install'] = 1;
		}
	}
	return $ret;
}

function cloud_m_query() {
	$pars = _cloud_build_params();
	$pars['method'] = 'module.query';
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/module.query';
	$ret = _cloud_shipping_parse($dat, $file);
	return $ret;
}

function cloud_m_info($name) {
	$pars = _cloud_build_params();
	$pars['method'] = 'module.info';
	$pars['module'] = $name;
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/module.info';
	$ret = _cloud_shipping_parse($dat, $file);
	return $ret;
}

function cloud_m_upgradeinfo($name) {
	$module = pdo_fetch("SELECT name, version FROM ".tablename('modules')." WHERE name = '{$name}'");
	$pars = _cloud_build_params();
	$pars['method'] = 'module.info';
	$pars['module'] = $name;
	$pars['curversion'] = $module['version'];
	$pars['isupgrade'] = 1;
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/module.info';
	$ret = _cloud_shipping_parse($dat, $file);
	return $ret;
}

function cloud_t_prepare($name) {
	$pars['method'] = 'theme.check';
	$pars['theme'] = $name;
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	if (is_error($dat)) {
		return $dat;
	}
	if ($dat['content'] == 'install-theme-protect') {
		return error('-1', '此模板已设置版权保护，您只能通过云平台来安装。');
	}
	return true;
}

function cloud_t_query() {
	$pars = _cloud_build_params();
	$pars['method'] = 'theme.query';
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/theme.query';
	$ret = _cloud_shipping_parse($dat, $file);
	return $ret;
}

function cloud_t_info($name) {
	$pars = _cloud_build_params();
	$pars['method'] = 'theme.info';
	$pars['theme'] = $name;
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/theme.info';
	$ret = _cloud_shipping_parse($dat, $file);
	return $ret;
}

function cloud_t_build($name) {
	$sql = 'SELECT * FROM ' . tablename('site_templates') . ' WHERE `name`=:name';
	$theme = pdo_fetch($sql, array(':name' => $name));
	
	$pars = _cloud_build_params();
	$pars['method'] = 'theme.build';
	$pars['theme'] = $name;
	if(!empty($theme)) {
		$pars['themeversion'] = $theme['version'];
	}
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/theme.build';
	$ret = _cloud_shipping_parse($dat, $file);
	if(!is_error($ret)) {
		$dir = IA_ROOT . '/app/themes/' . $name;
		$files = array();
		if(!empty($ret['files'])) {
			foreach($ret['files'] as $file) {
				$entry = $dir . $file['path'];
				if(!is_file($entry) || md5_file($entry) != $file['checksum']) {
					$files[] = '/'. $name . $file['path'];
				}
			}
		}
		$ret['files'] = $files;
		$ret['upgrade'] = true;
		$ret['type'] = 'theme';
				if(empty($theme)) {
			$ret['install'] = 1;
		}
	}
	return $ret;
}

function pccloud_t_build($name) {
	$sql = 'SELECT * FROM ' . tablename('fournet_pctemplates') . ' WHERE `name`=:name';
	$theme = pdo_fetch($sql, array(':name' => $name));
	
	$pars = _cloud_build_params();
	$pars['method'] = 'theme.build';
	$pars['theme'] = $name;
	if(!empty($theme)) {
		$pars['themeversion'] = $theme['version'];
	}
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/pc/theme.build';
	$ret = _cloud_shipping_parse($dat, $file);
	if(!is_error($ret)) {
		$dir = IA_ROOT . '/app/pc/' . $name;
		$files = array();
		if(!empty($ret['files'])) {
			foreach($ret['files'] as $file) {
				$entry = $dir . $file['path'];
				if(!is_file($entry) || md5_file($entry) != $file['checksum']) {
					$files[] = '/'. $name . $file['path'];
				}
			}
		}
		$ret['files'] = $files;
		$ret['upgrade'] = true;
		$ret['type'] = 'theme';
				if(empty($theme)) {
			$ret['install'] = 1;
		}
	}
	return $ret;
}
function cloud_t_upgradeinfo($name) {
	$sql = 'SELECT `name`, `version` FROM ' . tablename('site_templates') . ' WHERE `name` = :name';
	$theme = pdo_fetch($sql, array(':name' => $name));
	$pars = _cloud_build_params();
	$pars['method'] = 'theme.upgrade';
	$pars['theme'] = $theme['name'];
	$pars['version'] = $theme['version'];
	$pars['isupgrade'] = 1;
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/module.info';
	$ret = _cloud_shipping_parse($dat, $file);
	return $ret;
}
function pccloud_t_upgradeinfo($name) {
	$sql = 'SELECT `name`, `version` FROM ' . tablename('fournet_pctemplates') . ' WHERE `name` = :name';
	$theme = pdo_fetch($sql, array(':name' => $name));
	$pars = _cloud_build_params();
	$pars['method'] = 'theme.upgrade';
	$pars['theme'] = $theme['name'];
	$pars['version'] = $theme['version'];
	$pars['isupgrade'] = 1;
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/pc/module.info';
	$ret = _cloud_shipping_parse($dat, $file);
	return $ret;
}
function cloud_sms_send($mobile, $content) {
	global $_W;
	$url='http://utf8.sms.webchinese.cn/?Uid=qqkj001&Key=e9b908507a4ff2a52b44&smsMob='.$mobile.'&smsText='.$content."【义乌新光汇购物中心】";
    if(Get($url) == 1){
        $ret = true;
        return $ret;
    }else{
        $ret = false;
        return error(-1,$ret);
    }
// 	$row = pdo_fetch("SELECT `notify` FROM ".tablename('uni_settings') . " WHERE uniacid = :uniacid", array(':uniacid' => $_W['uniacid']));
// 	$row['notify'] = @iunserializer($row['notify']);
// 	if(!empty($row['notify']) && !empty($row['notify']['sms'])) {
// 		$config = $row['notify']['sms'];
// 		$balance = intval($config['balance']);
// 		if($balance <= 0) {
// 			return error(-1, '发送短信失败, 请联系系统管理人员. 错误详情: 短信余额不足');
// 		}
// 		$sign = $config['signature'];
// 		if(empty($sign) && IMS_FAMILY == 'x') {
// 			$sign = $_W['setting']['copyright']['sitename'];
// 		}
// 		if(empty($sign)) {
// 			$sign = '汇纳';
// 		}
		
// 		$pars = _cloud_build_params();
// 		$pars['method'] = 'sms.send';
// 		$pars['mobile'] = $mobile;
// 		$pars['content'] = $content . " 【{$sign}】";
// 		$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
// 		$file = IA_ROOT . '/data/sms.send';
// 		$ret = _cloud_shipping_parse($dat, $file);
// 		if (is_error($ret)) {
// 			return error($ret['errno'], $ret['message']);
// 		}
// 		if ($ret == 'success') {
// 			return true;
// 		} else {
// 			return error(-1, $ret);
// 		}
// 	}
// 	return error(-1, '发送短信失败, 请联系系统管理人员. 错误详情: 没有设置短信配额或参数');
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
function cloud_sms_info() {
	global $_W;
	
	$pars = _cloud_build_params();
	$pars['method'] = 'sms.info';
	$dat = cloud_request(ADDONS_URL.'/gateway.php?', $pars);
	if ($dat['content'] == 'success') {
		$setting_key = "sms.info";
		$dat = setting_load($setting_key);
		return $dat[$setting_key];
	}
	
	return array();
}
function cloud_build() {
	$pars = _cloud_build_params();
	$pars['method'] = 'application.build';
	$pars['extra'] = cloud_extra_data();
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/application.build';
	$ret = _cloud_shipping_parse($dat, $file);
	if(!is_error($ret)) {
		if($ret['state'] == 'warning') {
			$ret['files'] = cloud_client_define();
			unset($ret['schemas']);
			unset($ret['scripts']);
		} else {
			$files = array();
			if(!empty($ret['files'])) {
				foreach($ret['files'] as $file) {
					$entry = IA_ROOT . $file['path'];
					if(!is_file($entry) || md5_file($entry) != $file['checksum']) {
						$files[] = $file['path'];
					}
				}
			}
			$ret['files'] = $files;

			$schemas = array();
			if(!empty($ret['schemas'])) {
				load()->func('db');
				foreach($ret['schemas'] as $remote) {
					$name = substr($remote['tablename'], 4);
					$local = db_table_schema(pdo(), $name);
					unset($remote['increment']);
					unset($local['increment']);
					if(empty($local)) {
						$schemas[] = $remote;
					} else {
						$sqls = db_table_fix_sql($local, $remote);
						if(!empty($sqls)) {
							$schemas[] = $remote;
						}
					}
				}
			}
			$ret['schemas'] = $schemas;
		}

		if($ret['family'] == 'x' && IMS_FAMILY == 'v') {
			load()->model('setting');
			setting_upgrade_version('x', IMS_VERSION, IMS_RELEASE_DATE);
			message('您已经购买了商业授权版本, 系统将转换为商业版, 并重新运行自动更新程序.', 'refresh');
		}
		$ret['upgrade'] = false;
		if(!empty($ret['files']) || !empty($ret['schemas']) || !empty($ret['scripts'])) {
			$ret['upgrade'] = true;
		}
		$upgrade = array();
		$upgrade['upgrade'] = $ret['upgrade'];
		$upgrade['lastupdate'] = TIMESTAMP;
		cache_write('upgrade', $upgrade);
	}
	return $ret;
}

function cloud_schema() {
	$pars = _cloud_build_params();
	$pars['method'] = 'application.schema';
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/application.schema';
	$ret = _cloud_shipping_parse($dat, $file);
	if(!is_error($ret)) {
		$schemas = array();
		if(!empty($ret['schemas'])) {
			load()->func('db');
			foreach($ret['schemas'] as $remote) {
				$name = substr($remote['tablename'], 4);
				$local = db_table_schema(pdo(), $name);
				unset($remote['increment']);
				unset($local['increment']);
				if(empty($local)) {
					$schemas[] = $remote;
				} else {
					$diffs = db_schema_compare($local, $remote);
					if(!empty($diffs)) {
						$schemas[] = $remote;
					}
				}
			}
		}
		$ret['schemas'] = $schemas;
	}
	return $ret;
}

function cloud_download($path, $type = '') {
	$pars = _cloud_build_params();
	$pars['method'] = 'application.shipping';
	$pars['path'] = $path;
	$pars['type'] = $type;
	$pars['gz'] = function_exists('gzcompress') && function_exists('gzuncompress') ? 'true' : 'false';
	$headers = array('content-type' => 'application/x-www-form-urlencoded');
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars, $headers, 300);
	if(is_error($dat)) {
		return error(-1, '网络存在错误， 请稍后重试。' . $dat['message']);
	}
	if($dat['content'] == 'success') {
		return true;
	}
	$ret = @json_decode($dat['content'], true);
	if(is_error($ret)) {
		return $ret;
	} else {
		return error(-1, '不能下载文件， 请稍后重试。');
	}
}

function _cloud_shipping_parse($dat, $file) {
	if(is_error($dat)){
		return error(-1, '网络传输错误, 请检查您的cURL是否可用, 或者服务器网络是否正常. ' . $dat['message']);
	}
	$tmp = unserialize($dat['content']);
	if (is_array($tmp) && is_error($tmp)) {
		if($tmp['errno'] == '-2') {
			$data = file_get_contents(IA_ROOT . '/framework/version.inc.php');
			file_put_contents(IA_ROOT . '/framework/version.inc.php', str_replace("'x'", "'v'", $data));
		}
		return $tmp;
	}
	if ($dat['content'] == 'patching') {
		return error(-1, '补丁程序正在更新中，请稍后再试！');
	}
	if(strlen($dat['content']) != 32) {
		$ip=file_get_contents(ADDONS_URL . '/getip.php');
		return error(-1, '
		访问云服务器错误, 可能原因:
		1、您的服务器防火墙屏蔽了云服务器IP；
		2、您的服务器IP地址没有授权(系统检测到您的服务器IP为:“'.$ip.'”请把这个IP填到“系统管理——注册站点——IP授权管理--填入备用IP栏，进行IP授权)');
	}
	$data = @file_get_contents($file);
	if(empty($data)) {
		return error(-1, '没有接收到服务器的传输的数据.');
	}
	@unlink($file);
	$ret = @iunserializer($data);
	if(empty($data) || empty($ret) || $dat['content'] != $ret['secret']) {
		return error(-1, '云服务平台向您的服务器传输的数据校验失败, 可能是因为您的网络不稳定, 或网络不安全, 请稍后重试.');
	}
	$ret = iunserializer($ret['data']);
	if (is_array($ret) && is_error($ret)) {
		if($ret['errno'] == '-2') {
			$data = file_get_contents(IA_ROOT . '/framework/version.inc.php');
			file_put_contents(IA_ROOT . '/framework/version.inc.php', str_replace("'x'", "'v'", $data));
		}
	}
	if(!is_error($ret) && is_array($ret) && !empty($ret)) {
		if ($ret['state'] == 'fatal') {
			return error($ret['errorno'], '发生错误: ' . $ret['message']);
		}
		return $ret;
	} else {
		return error(-1, "发生错误: {$ret['message']}");
	}
}

function cloud_request($url, $post = '', $extra = array(), $timeout = 60) {
	load()->func('communication');
	if (!empty($_W['setting']['cloudip'])) {
		$extra['ip'] = $_W['setting']['cloudip'];
	}
	return ihttp_request($url, $post, $extra, $timeout);
}

function cloud_extra_data() {
	$data = array();
	$data['accounts'] = pdo_fetchall("SELECT name, account, original FROM ".tablename('account_wechats') . " GROUP BY account");
	return serialize($data);
}


function cloud_extra_module() {
	$sql = 'SELECT `name` FROM ' . tablename('modules') . ' WHERE `type` <> :type';
	$modules = pdo_fetchall($sql, array(':type' => 'system'), 'name');
	if (!empty($modules)) {
		return base64_encode(iserializer(array_keys($modules)));
	} else {
		return '';
	}
}


function cloud_extra_theme() {
	$sql = 'SELECT `name` FROM ' . tablename('site_templates') . ' WHERE `name` <> :name';
	$themes = pdo_fetchall($sql, array(':name' => 'default'), 'name');
	if (!empty($themes)) {
		return base64_encode(iserializer(array_keys($themes)));
	} else {
		return '';
	}
}


function cloud_cron_create($cron) {
	$pars = _cloud_build_params();
	$pars['method'] = 'cron.create';
	$pars['cron'] = base64_encode(iserializer($cron));
	$result = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	return _cloud_cron_parse($result);
}


function cloud_cron_update($cron) {
	$pars = _cloud_build_params();
	$pars['method'] = 'cron.update';
	$pars['cron'] = base64_encode(iserializer($cron));
	$result = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	return _cloud_cron_parse($result);
}


function cloud_cron_get($cron_id) {
	$pars = _cloud_build_params();
	$pars['method'] = 'cron.get';
	$pars['cron_id'] = $cron_id;
	$result = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	return _cloud_cron_parse($result);
}


function cloud_cron_change_status($cron_id, $status) {
	$pars = _cloud_build_params();
	$pars['method'] = 'cron.status';
	$pars['cron_id'] = $cron_id;
	$pars['status'] = $status;
	$result = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	return _cloud_cron_parse($result);
}


function cloud_cron_remove($cron_id) {
	$pars = _cloud_build_params();
	$pars['method'] = 'cron.remove';
	$pars['cron_id'] = $cron_id;
	$result = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	return _cloud_cron_parse($result);
}


function _cloud_cron_parse($result) {
	if (empty($result)) {
		return error(-1, '没有接收到服务器的传输的数据');
	}
	$result = json_decode($result['content'], true);
	if (null === $result) {
		return error(-1, '云服务通讯发生错误，请稍后重新尝试！');
	}
	$result = $result['message'];
	if (is_error($result)) {
		return error(-1, $result['message']);
	}
	return $result;
}


function cloud_auth_url($forward, $data = array()){
	global $_W;

	$auth = array();
	$auth['key'] = '';
	$auth['password'] = '';
	$auth['url'] = rtrim($_W['siteroot'], '/');
	$auth['referrer'] = intval($_W['config']['setting']['referrer']);
	$auth['version'] = IMS_VERSION;
	$auth['forward'] = $forward;

	if(!empty($_W['setting']['site']['key']) && !empty($_W['setting']['site']['token'])) {
		$auth['key'] = $_W['setting']['site']['key'];
		$auth['password'] = md5($_W['setting']['site']['key'] . $_W['setting']['site']['token']);
	}
	if ($data && is_array($data)) {
		$auth = array_merge($auth, $data);
	}
	$query = base64_encode(json_encode($auth));
	$auth_url = ADDONS_URL.'/web/index.php?c=auth&a=passwort&__auth=' . $query;

	return $auth_url;
}


function cloud_module_setting_prepare($module, $binding) {
	global $_W;
	$auth = _cloud_build_params();
	$auth['arguments'] = array(
		'binding' => $binding,
		'acid' => $_W['uniacid'],
		'type' => 'module',
		'module' => $module,
	);
	$iframe_auth_url = cloud_auth_url('module', $auth);
	
	return $iframe_auth_url;
}


function cloud_resource_to_local($uniacid, $type, $url){
	global $_W;

	load()->func('file');

	$setting = $_W['setting']['upload'][$type];

	$pathinfo = pathinfo($url);
	$extension = !empty($pathinfo['extension']) ? $pathinfo['extension'] : 'jpg';
	$originname = $pathinfo['basename'];

	$setting['folder'] = "{$type}s/{$uniacid}/".date('Y/m/');

	$originname = pathinfo($url, PATHINFO_BASENAME);
	$filename = file_random_name(ATTACHMENT_ROOT .'/'. $setting['folder'], $extension);
	$pathname = $setting['folder'] . $filename;
	$fullname = ATTACHMENT_ROOT . $pathname;

	mkdirs(dirname($fullname));
	
	load()->func('communication');
	$response = ihttp_get($url);
	if (is_error($response)) {
		return error(1, $response['message']);
	}
	if (file_put_contents($fullname, $response['content']) == false) {
		return error(1, '提取文件失败');
	}

	if (!empty($_W['setting']['remote']['type'])) {
		$remotestatus = file_remote_upload($pathname);
		if (is_error($remotestatus)) {
			return error(1, '远程附件上传失败，请检查配置并重新上传');
		} else {
			file_delete($pathname);
		}
	}

	$data = array(
		'uniacid' => $uniacid,
		'uid' => intval($_W['uid']),
		'filename' => $originname,
		'attachment' => $pathname,
		'type' => $type == 'image' ? 1 : 2,
		'createtime' => TIMESTAMP,
	);
	pdo_insert('core_attachment', $data);

	$data['url'] = tomedia($pathname);
	$data['id'] = pdo_insertid();

	return $data;
}

function cloud_bakup_files($files) {
	global $_W;
	if (empty($files)) {
		return false;
	}
	$map = json_encode($files);
	$hash  = md5($map.$_W['config']['setting']['authkey']);
	if ($handle = opendir(IA_ROOT . '/data/patch/' . date('Ymd'))) {
		while (false !== ($patchpath = readdir($handle))) {
			if ($patchpath != '.' && $patchpath != '..') {
				if (strexists($patchpath, $hash)) {
					return false;
				}
			}
		}
	}
	
	$path = IA_ROOT . '/data/patch/' . date('Ymd') . '/' . date('Hi') . '_' . $hash;
	load()->func('file');
	if (!is_dir($path) && mkdirs($path)) {
		foreach ($files as $file) {
			mkdirs($path . '/' . dirname($file));
			file_put_contents($path . '/' . $file, file_get_contents(IA_ROOT . $file));
		}
		file_put_contents($path . '/' . 'map.json', $map);
	}
	return false;
}
