<?php
/**
 * [OO System] Copyright (c) 2015 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
$_W['page']['title'] = '系统';

load()->model('cloud');

$cloud_registered = cloud_prepare();
$cloud_registered = $cloud_registered === true ? true : false;

template('system/welcome');
