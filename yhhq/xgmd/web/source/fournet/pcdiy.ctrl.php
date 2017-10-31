<?php
/**
 * [OO System] Copyright (c) 2014 lejiplaza.COM
 * OO is NOT a free software, it under the license terms, visited http://www.lejiplaza.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
$do = in_array($do, array('display', 'post', 'delete')) ? $do : 'display';

if($do == 'display') {
} elseif($do == 'post') {
} elseif($do == 'delete') {
}
template('fournet/pcdiy');

