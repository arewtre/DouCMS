<?php
defined('IN_IA') or exit('Access Denied');

$config = array();

// $config['db']['host'] = 'rm-8vbcwswqjmrlvt12u.mysql.zhangbei.rds.aliyuncs.com';
// $config['db']['username'] = 'tangdao';
// $config['db']['password'] = 'TangDao637';
// $config['db']['port'] = '3306';
// $config['db']['database'] = 'tangdao';

$config['db']['host'] = 'localhost';
$config['db']['username'] = 'root';
$config['db']['password'] = 'root';
$config['db']['port'] = '3306';
$config['db']['database'] = 'yhhqwechat';

$config['db']['charset'] = 'utf8';
$config['db']['pconnect'] = 0;
$config['db']['tablepre'] = 'ims_';

// --------------------------  CONFIG COOKIE  --------------------------- //
$config['cookie']['pre'] = 'xiaoo_';
$config['cookie']['domain'] ='';
$config['cookie']['path'] = '/';

// --------------------------  CONFIG SETTING  --------------------------- //
$config['setting']['charset'] = 'utf-8';
$config['setting']['cache'] = 'mysql';
$config['setting']['timezone'] = 'Asia/Shanghai';
$config['setting']['memory_limit'] = '256M';
$config['setting']['filemode'] = 0644;
$config['setting']['authkey'] = '1e61ba97';
$config['setting']['founder'] = '1';
$config['setting']['development'] = 0;
$config['setting']['referrer'] = 0;

// --------------------------  CONFIG UPLOAD  --------------------------- //
$config['upload']['image']['extentions'] = array('gif', 'jpg', 'jpeg', 'png');
$config['upload']['image']['limit'] = 500000;
$config['upload']['attachdir'] = 'attachment';
$config['upload']['audio']['extentions'] = array('mp3','wav');
$config['upload']['audio']['limit'] = 500000;

// --------------------------  HTTPS UP  --------------------------- //
$config['setting']['https'] = 0;