<?php
if(!defined('IN_ADMIN')) exit;
error_reporting(0); // Set E_ALL for debuging

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';
// Required for FTP connector support
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeFTP.class.php';


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}

// $opts = array(
// 	// 'debug' => true,
// 	'roots' => array(
// 		array(
// 			'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
// 			'path'          => '../files/',         // path to files (REQUIRED)
// 			'URL'           => dirname($_SERVER['PHP_SELF']) . '/../files/', // URL to files (REQUIRED)
// 			'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
// 		)
// 	)
// );

$opts = array(
		// 'debug' => true,
		'roots' => array(
				array(
						'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
						//'path'          => './Public/upload/',         // 上传文件目录的物理路径(必须)
						//'URL'           => __ROOT__.'/Public/upload/', // 上传文件目录的URL
						'path'          => IA_ROOT,         
						'URL'           => __ROOT__.'/Public/upload/',
						'accessControl' => 'access'             
				)
		)
);
// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

