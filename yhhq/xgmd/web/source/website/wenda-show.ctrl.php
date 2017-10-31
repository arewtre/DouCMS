<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
$dos = array( 'detail', 'list');
$do = in_array($do, $dos) ? $do : 'list';
load()->model('article');
$links = article_link_home();
if($do == 'detail') {
	$id = intval($_GPC['id']);
	$categroys = article_categorys('wenda');
	$wenda = article_wenda_info($id);
	if(is_error($wenda)) {
		message('问题不存在或已删除', referer(), 'error');
	}
	$_W['page']['title'] = $wenda['title'];
	$cateid = intval($_GPC['cateid']);
	$filter = array('cateid' => $cateid);
	$pindex = max(1, intval($_GPC['page']));
	$psize = 20;
	$wendas = article_wenda_all($psize);
	$total = intval($wendas['total']);
	$data = $wendas['wendas'];
}

if($do == 'list') {
	$categroys = article_categorys('wenda');
	$categroys[0] = array('title' => '所有问题');
	$cateid = intval($_GPC['cateid']);
	$_W['page']['title'] = $categroys[$cateid]['title'];

	$filter = array('cateid' => $cateid);
	$pindex = max(1, intval($_GPC['page']));
	$psize = 20;
	$wendas = article_wenda_all($filter, $pindex, $psize);
	$total = intval($wendas['total']);
	$data = $wendas['wendas'];
	$pager = pagination($total, $pindex, $psize);
}

template('website/wenda/wenda-show');
