<?php

load()->func('file');
load()->model('cloud');
load()->func('communication');
if ($do == 'check') {
	$filetree = file_tree(IA_ROOT);
	$modify = array();
	$unknown = array();
	$lose = array();
	$pars = _cloud_build_params();
	$pars['method'] = 'application.build';
	$pars['extra'] = cloud_extra_data();
	$dat = cloud_request(ADDONS_URL.'/gateway.php', $pars);
	$file = IA_ROOT . '/data/application.build';
	$ret = _cloud_shipping_parse($dat, $file);
	foreach ($ret['files'] as $value) {
		$clouds[$value['path']]['path'] = $value['path'];
		$clouds[$value['path']]['checksum'] = $value['checksum'];
	}

	foreach ($filetree as $filename) {
		$file = str_replace(IA_ROOT, '', $filename);
		if (strpos($file, '/data/logs') === 0 || strpos($file, '/data/tpl') === 0 || strpos($file, '/attachment') === 0) {
			continue;
		}
		if (preg_match('/\/addons\/([a-zA-Z_0-9\-]+)\/.*/', $file, $match)) {
			$module = IA_ROOT . '/addons/' . $match[1];

			if (file_exists($module . '/map.json')) {
				$maps = file_get_contents($module . '/map.json');
				$maps = json_decode($maps, true);
				if (!empty($maps)) {
					$checksum_found = false;
					foreach ($maps as $map) {
						if (!is_array($map) || empty($map['checksum'])) {
							continue;
						} else {
							$checksum_found = true;
							$clouds['/addons/'.$match[1].$map['path']] = array('path' => '/addons/'.$match[1].$map['path'], 'checksum' => $map['checksum']);
						}
					}
					if (empty($checksum_found)) {
						continue;
					}
				}
			} else {
				continue;
			}
		}
		if (!empty($clouds[$file])) {
			if (!is_file($filename) || md5_file($filename) != $clouds[$file]['checksum']) {
				$modify[] = $file;
			}
		} else {
			$unknown[] = $file;
		}
	}
	foreach ($clouds as $value) {
		$cloud = IA_ROOT.$value['path'];
		if (!in_array($cloud, $filetree)) {
			$cloud = str_replace(IA_ROOT, '', $cloud);
			$lose[] = $cloud;
		}
	}
	$count_unknown = count($unknown);
	$count_lose = count($lose);
	$count_modify = count($modify);
}
template('system/filecheck');
