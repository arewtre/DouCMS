<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */

define('FRAME', 'mc');
$frames = buildframes(array('mc'));
$frames = $frames['mc'];

if($controller == 'wechat') {
	if(in_array($action, array('location'))) {
		define('ACTIVE_FRAME_URL', url('activity/store/list'));
	} elseif(in_array($action, array('card'))) {
		define('ACTIVE_FRAME_URL', url('wechat/card/list'));
	}
}
