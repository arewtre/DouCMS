<?php

/**
 * 判断是否是系统管理员
 * @param mixed $uid
 * @return bool
 */
function isAdministrator( $uid = '' ){
    if( empty($uid) ) $uid = session('uid');
    if( is_array(C('USER_ADMINISTRATOR')) ){
        if( is_array( $uid ) ){
            $m = array_intersect( C('USER_ADMINISTRATOR'), $uid );
            if( count($m) ){
                return TRUE;
            }
        }else{
            if( in_array( $uid, C('USER_ADMINISTRATOR') ) ){
                return TRUE;
            }
        }
    }else{
        if( is_array( $uid ) ){
            if( in_array(C('USER_ADMINISTRATOR'),$uid) ){
                return TRUE;
            }
        }else{
            if( $uid == C('USER_ADMINISTRATOR')){
                return TRUE;
            }
        }
    }
    return FALSE;
}

/**
 * 把返回的数据集转换成Tree
 * @param $list
 * @param string $pk
 * @param string $pid
 * @param string $child
 * @param string $root
 * @return array
 */
function listToTree($list, $pk='pid', $pid = 'parentid', $child = '_child', $root = '0') {
    $tree = array();
    if(is_array($list)) {
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] = &$list[$key];
        }
        foreach ($list as $key => $data) {
            $parentId =  $data[$pid];
            if ($root == $parentId) {
                $tree[] = &$list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent = &$refer[$parentId];
                    $parent[$child][] = &$list[$key];
                }
            }
        }
    }
    return $tree;
}

function formatTree($list, $lv = 0, $title = 'name'){
    $formatTree = array();
    foreach($list as $key => $val){
        $title_prefix = '';
        for( $i=0;$i<$lv;$i++ ){
            $title_prefix .= "|---";
        }
        $val['lv'] = $lv;
        $val['namePrefix'] = $lv == 0 ? '' : $title_prefix;
        $val['showName'] = $lv == 0 ? $val[$title] : $title_prefix.$val[$title];
        if(!array_key_exists('_child', $val)){
            array_push($formatTree, $val);
        }else{
            $child = $val['_child'];
            unset($val['_child']);
            array_push($formatTree, $val);
            $middle = formatTree($child, $lv+1, $title); //进行下一层递归
            $formatTree = array_merge($formatTree, $middle);
        }
    }
    return $formatTree;
}

if (!function_exists('array_column')) {
    function array_column($array, $val, $key = null){
        $newArr = array();
        if( is_null($key) ){
            foreach ($array as $index => $item) {
                $newArr[] = $item[$val];
            }
        }else{
            foreach ($array as $index => $item) {
                $newArr[$item[$key]] = $item[$val];
            }
        }
        return $newArr;
    }
}

//处理方法
function rmdirr($dirname) {
	if (!file_exists($dirname)) {
		return false;
	}
	if (is_file($dirname) || is_link($dirname)) {
		return unlink($dirname);
	}
	$dir = dir($dirname);
	if ($dir) {
		while (false !== $entry = $dir->read()) {
			if ($entry == '.' || $entry == '..') {
				continue;
			}
			//递归
			rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
		}
	}
}

//公共函数
//获取文件修改时间
function getfiletime($file, $DataDir) {
	$a = filemtime($DataDir . $file);
	$time = date("Y-m-d H:i:s", $a);
	return $time;
}

//获取文件的大小
function getfilesize($file, $DataDir) {
	$perms = stat($DataDir . $file);
	$size = $perms['size'];
	// 单位自动转换函数
	$kb = 1024;         // Kilobyte
	$mb = 1024 * $kb;   // Megabyte
	$gb = 1024 * $mb;   // Gigabyte
	$tb = 1024 * $gb;   // Terabyte

	if ($size < $kb) {
		return $size . " B";
	} else if ($size < $mb) {
		return round($size / $kb, 2) . " KB";
	} else if ($size < $gb) {
		return round($size / $mb, 2) . " MB";
	} else if ($size < $tb) {
		return round($size / $gb, 2) . " GB";
	} else {
		return round($size / $tb, 2) . " TB";
	}
}

//判断图片的类型从而设置图片路径
function imgUrl($img){
	if($img){
		if(substr($img,0,4)=='http'){
			$imgUrl = $img;
		}else{
			$imgUrl = '__PUBLIC__'.$img;
		}
	}else{
		$imgUrl = '__ADMIN__/images/tong.png';
	}
	return $imgUrl;
}
