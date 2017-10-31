<?php
/**
 * [OO System] Copyright (c) 2014 OO.Com
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
if($action != 'entry') {
	define('FRAME', 'setting');
	$frames = buildframes(array(FRAME));
	$frames = $frames[FRAME];
}
