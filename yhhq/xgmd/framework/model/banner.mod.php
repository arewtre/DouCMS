<?php
defined('IN_IA') or exit('Access Denied');

function banner_all($pindex = 1, $psize = 10,$filter = array()) {
	$condition = ' ';
	$params = array();
	if(isset($filter['type'])) {
		$condition .= ' where banner_type = :type';
		$params[':type'] = $filter['type'];
	}
// 	if(isset($filter['timer'])) {
// 	    $condition .= ' AND timestart is not null';
// 	}else{
// 	    $condition .= ' AND timestart is null';
// 	}
	if(!empty($filter['text'])) {
		$condition .= ' AND `text` like  :text';
		$params[':text'] = "%{$filter['text']}%";
	}
	$limit = ' LIMIT ' . ($pindex - 1) * $psize . ',' . $psize;
	$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ims_banner'. $condition, $params);
	$banners = pdo_fetchall('SELECT * FROM ims_banner' . $condition . ' ORDER BY sort DESC ' . $limit, $params,'id');
	return array('total' => $total, 'banners' => $banners);
}
