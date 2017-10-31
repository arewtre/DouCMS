<?php
function pre($data){
	// 定义样式
	$str='<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid #CCC;border-radius: 4px;">';
	// 如果是boolean或者null直接显示文字；否则print
	if (is_bool($data)) {
		$show_data=$data ? 'true' : 'false';
	}elseif (is_null($data)) {
		$show_data='null';
	}else{
		$show_data=print_r($data,true);
	}
	$str.=$show_data;
	$str.='</pre>';
	echo $str;die;
}

/**
 * 简单对称加密算法之加密
 * @param String $string 需要加密的字串
 * @param String $skey 加密EKY
 * @author Anyon Zou <zoujingli@qq.com>
 * @date 2013-08-13 19:30
 * @update 2014-10-10 10:10
 * @return String
 */
function encode($string = '', $skey = 'yourkey') {
    $strArr = str_split(base64_encode($string));
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key < $strCount && $strArr[$key].=$value;
    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}
/**
 * 简单对称加密算法之解密
 * @param String $string 需要解密的字串
 * @param String $skey 解密KEY
 * @author Anyon Zou <zoujingli@qq.com>
 * @date 2013-08-13 19:30
 * @update 2014-10-10 10:10
 * @return String
 */
function decode($string = '', $skey = 'yourkey') {
    $strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key <= $strCount && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
    return base64_decode(join('', $strArr));
}

/**
将以上两个函数。
用法：常用语get传参
	前端：<a href="<{:U('Index/view',array('id'=>encode($data['id']),'name'=>encode($data['title'])))}>"><{$data.title}></a>
	后台：view方法中：$id = decode(trim(I("get.id")));即可还原
	view模板中：<font color="red"><{$Think.get.name|decode}></font>
**/

/*建议将key自行修改，尽量不要太长，不然url很长，适当即可，加密性能很好，亲测*/


//图像合并 二维码推广合并
		//bigImgPath 背景图路径
		//qCodePath 图片路径
		// dst_x 目标图像开始 x 坐标
		// dst_y 目标图像开始 y 坐标，x,y同为 0 则从左上角开始
		// src_x 拷贝图像开始 x 坐标
		// src_y 拷贝图像开始 y 坐标，x,y同为 0 则从左上角开始拷贝
	function backqcode($bigImgPath,$qCodePath,$dst_x = 0,$dst_y = 0,$src_x = 0,$src_y = 0){
		$bigImg = imagecreatefromstring(file_get_contents($bigImgPath));
		$qCodeImg = imagecreatefromstring(file_get_contents($qCodePath));
		list($qCodeWidth, $qCodeHight, $qCodeType) = getimagesize($qCodePath);
		// imagecopymerge使用注解
		imagecopymerge($bigImg, $qCodeImg, $dst_x, $dst_y,$src_x, $src_y, $qCodeWidth, $qCodeHight, 100);
		list($bigWidth, $bigHight, $bigType) = getimagesize($bigImgPath);
		switch ($bigType) {
		case '1': //gif
			header('Content-Type:image/gif');
			imagegif($bigImg);
			break;
		case '2': //jpg
			header('Content-Type:image/jpg');
			imagejpeg($bigImg);
			break;
		case '3': 
			header('Content-Type:image/png');
			imagepng($bigImg);
			break;
			
		}
		imagedestroy($bigImg);
		imagedestroy($qcodeImg);
	}
	  function qrcode(){//php二维码生成
        error_reporting(E_ERROR);
        vendor('Qrcode.Qrcode');
        $url = urldecode($_GET["data"]);
        \QRcode::png($url,false,'L',5);
    }

     function payphone(){//php二维码支付合成
        //支付链接 
        $url = $_GET["data"];
        $bigImgPath = './public/images/wenbg.png';
        $qCodePath = 'http://'.$_SERVER['HTTP_HOST'].U('api/wen/qrcode').'?data='.$url;
        $dst_x = 130;
        $dst_y = 430;
        $src_x = $src_y = 0;
        backqcode($bigImgPath,$qCodePath,$dst_x = 0,$dst_y = 0,$src_x = 0,$src_y = 0);       
    }
    
/**
 * 传入时间戳,计算距离现在的时间
 * @param  number $time 时间戳
 * @return string     返回多少以前
 */
function word_time($time) {
    $time = (int) substr($time, 0, 10);
    $int = time() - $time;
    $str = '';
    if ($int <= 2){
        $str = sprintf('刚刚', $int);
    }elseif ($int < 60){
        $str = sprintf('%d秒前', $int);
    }elseif ($int < 3600){
        $str = sprintf('%d分钟前', floor($int / 60));
    }elseif ($int < 86400){
        $str = sprintf('%d小时前', floor($int / 3600));
    }elseif ($int < 1728000){
        $str = sprintf('%d天前', floor($int / 86400));
    }else{
        $str = date('Y-m-d H:i:s', $time);
    }
    return $str;
}
/**
 * 生成Excel
 */
function create_xls($data,$filename='simple.xls'){
    ini_set('max_execution_time', '0');
    Vendor('PHPExcel.PHPExcel');
    $filename=str_replace('.xls', '', $filename).'.xls';
    $phpexcel = new PHPExcel();
    $phpexcel->getProperties()
    ->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");
    $phpexcel->getActiveSheet()->fromArray($data);
    $phpexcel->getActiveSheet()->setTitle('Sheet1');
    $phpexcel->setActiveSheetIndex(0);
    header('Content-Type: application/vnd.ms-excel');
    header("Content-Disposition: attachment;filename=$filename");
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0
    $objwriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel5');
    $objwriter->save('php://output');
    exit;
}
/**
 * 获取HTTP全部头信息
 */
if (!function_exists('apache_request_headers')) {
	function apache_request_headers(){
		$arh = array();
		$rx_http = '/\AHTTP_/';
		foreach ($_SERVER as $key => $val) {
			if (preg_match($rx_http, $key)) {
				$arh_key = preg_replace($rx_http, '', $key);
				$rx_matches = explode('_', $arh_key);
				if (count($rx_matches) > 0 and strlen($arh_key) > 2) {
					foreach ($rx_matches as $ak_key => $ak_val)
						$rx_matches[$ak_key] = ucfirst($ak_val);
					$arh_key = implode('-', $rx_matches);
				}
				$arh[$arh_key] = $val;
			}
		}

		return $arh;
	}
}

/**
 * 系统非常规MD5加密方法
 * @param  string $str 要加密的字符串
 * @param  string $auth_key 要加密的字符串
 * @return string
 * @author jry <598821125@qq.com>
 */
function user_md5($str, $auth_key = ''){
    if(!$auth_key){
        $auth_key = C('AUTH_KEY');
    }
    return '' === $str ? '' : md5(sha1($str) . $auth_key);
}

/**
 * @param     $url
 * @param int $timeOut
 * @return bool|mixed
 */
if (!function_exists('curlGet')) {
	function curlGet($url, $timeOut = 10){
		$oCurl = curl_init();
		if (stripos($url, "https://") !== false) {
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($oCurl, CURLOPT_SSLVERSION, 1);
		}
		curl_setopt($oCurl, CURLOPT_URL, $url);
		curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($oCurl, CURLOPT_TIMEOUT, $timeOut);
		$sContent = curl_exec($oCurl);
		$aStatus = curl_getinfo($oCurl);
		curl_close($oCurl);
		if (intval($aStatus["http_code"]) == 200) {
			return $sContent;
		} else {
			return false;
		}
	}
}

/**
 * geetest检测验证码
 */
function geetest_chcek_verify($data){
    $geetest_id=C('GEETEST_ID');
    $geetest_key=C('GEETEST_KEY');
    $geetest=new \Org\Xb\Geetest($geetest_id,$geetest_key);
    $user_id=$_SESSION['geetest']['user_id'];
    if ($_SESSION['geetest']['gtserver']==1) {
        $result=$geetest->success_validate($data['geetest_challenge'], $data['geetest_validate'], $data['geetest_seccode'], $user_id);
        if ($result) {
            return true;
        } else{
            return false;
        }
    }else{
        if ($geetest->fail_validate($data['geetest_challenge'],$data['geetest_validate'],$data['geetest_seccode'])) {
            return true;
        }else{
            return false;
        }
    }
}


////////////////////////时间选择器OK/////////////////////////////
function _tpl_form_field_time($name, $value = '') {
    $s = '';
    $s = '
	<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
        <script type="text/javascript">
			require(["datetimepicker"], function(){
				$(function(){
						var option = {
							lang : "zh",
							step : 10,
	                        datepicker:false,
							timepicker : true,
							closeOnDateSelect : true,
							format : "H:i"
						};
					$(".datetimepicker[name = \'' . $name . '\']").datetimepicker(option);
				});
			});
		</script>';
    if (!empty($value)) {
        $value = strexists($value, ':') ? strtotime($value) : $value;
    } else {
        $value = TIMESTAMP;
    }
    $value = date('H:i', $value);
    $s .= '<input type="text" name="' . $name . '"  value="'.$value.'" placeholder="请选择时间" readonly="readonly" class="datetimepicker form-control" style="padding-left:12px;" />';
    return $s;
}

///////////////////////////图片上传(单)OK//////////////////////////
function tpl_form_field_image($name, $value = '', $default = '', $options = array()) {
    global $_W;
    if (empty($default)) {
        $default = './Public/images/nopic.jpg';
    }
    $val = $default;
    if (!empty($value)) {
        $val = tomedia($value);
    }
    if (!empty($options['global'])) {
        $options['global'] = true;
    } else {
        $options['global'] = false;
    }
    if (empty($options['class_extra'])) {
        $options['class_extra'] = '';
    }
    if (isset($options['dest_dir']) && !empty($options['dest_dir'])) {
        if (!preg_match('/^\w+([\/]\w+)?$/i', $options['dest_dir'])) {
            exit('图片上传目录错误,只能指定最多两级目录,如: "WZ_store","WZ_store/d1"');
        }
    }
    $options['direct'] = true;
    $options['multiple'] = false;
    if (isset($options['thumb'])) {
        $options['thumb'] = !empty($options['thumb']);
    }
    $s = '';
    if (!defined('TPL_INIT_IMAGE')) {
        $s = '
		<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
			function showImageDialog(elm, opts, options) {
				require(["util"], function(util){
					var btn = $(elm);
					var ipt = btn.parent().prev();
					var val = ipt.val();
					var img = ipt.parent().next().children();
					options = '.str_replace('"', '\'', json_encode($options)).';
					util.image(val, function(url){
						if(url.url){
							if(img.length > 0){
								img.get(0).src = url.url;
							}
							ipt.val(url.attachment);
							ipt.attr("filename",url.filename);
							ipt.attr("url",url.url);
						}
						if(url.media_id){
							if(img.length > 0){
								img.get(0).src = "";
							}
							ipt.val(url.media_id);
						}
					}, null, options);
				});
			}
			function deleteImage(elm){
				require(["jquery"], function($){
					$(elm).prev().attr("src", "./Public/images/nopic.jpg");
					$(elm).parent().prev().find("input").val("");
				});
			}
		</script>';
        define('TPL_INIT_IMAGE', true);
    }

    $s .= '
		<div class="input-group ' . $options['class_extra'] . '">
			<input type="text" name="' . $name . '" value="' . $value . '"' . ($options['extras']['text'] ? $options['extras']['text'] : '') . ' class="form-control" autocomplete="off">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button" onclick="showImageDialog(this);">选择图片</button>
			</span>
		</div>
		<div class="input-group ' . $options['class_extra'] . '" style="margin-top:.5em;">
			<img src="' . $val . '" onerror="this.src=\'' . $default . '\'; this.title=\'图片未找到.\'" class="img-responsive img-thumbnail" ' . ($options['extras']['image'] ? $options['extras']['image'] : '') . ' width="150" />
			<em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
		</div>';
    return $s;
}

/////////////////////图片路径格式化OK///////////////////////
function tomedia($src, $local_path = false){

    //     if (strexists($src, '/Public/')) {
    //         return __ROOT__ . substr($src, strpos($src, '/Public/'));
    //     }
    if (strexists($src, __ROOT__) && !strexists($src, '/Public/')) {
        $urls = parse_url($src);
        $src = $t = substr($urls['path'], strpos($urls['path'], 'images'));
    }
    //     $t = strtolower($src);
    //     if (strexists($t, 'https://mmbiz.qlogo.cn') || strexists($t, 'http://mmbiz.qpic.cn')) {
    //         return url('utility/wxcode/image', array('attach' => $src));
    //     }
    if (strexists($t, 'http://') || strexists($t, 'https://')) {
        return $src;
    }
    // 	if ($local_path || file_exists(__ROOT__ . '/Public/Upload/' . $src)) {
    // 		$src = __ROOT__  . '/Public/Upload/' . $src;
    // 	}
    if (empty($src)) {
        return '';
    }else{
        $src = "http://localhost".__ROOT__ . "/".$src;
    }
    return $src;
}

function strexists($string, $find) {
    return !(strpos($string, $find) === FALSE);
}

////////////////////////////批量上传图片OK/////////////////////////////////////
function tpl_form_field_multi_image($name, $value = array(), $options = array()) {
    global $_W;
    $options['multiple'] = true;
    $options['direct'] = false;
    $s = '';
    if (!defined('TPL_INIT_MULTI_IMAGE')) {
        $s = '
<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
	function uploadMultiImage(elm) {
		var name = $(elm).next().val();
            require(["jquery"], function($){
        		util.image( "", function(urls){
        			$.each(urls, function(idx, url){
        				$(elm).parent().parent().next().append(\'<div class="multi-item"><img onerror="this.src=\\\'./Public/images/nopic.jpg\\\'; this.title=\\\'图片未找到.\\\'" src="\'+url.url+\'" class="img-responsive img-thumbnail"><input type="hidden" name="\'+name+\'[]" value="\'+url.attachment+\'"><em class="close" title="删除这张图片" onclick="deleteMultiImage(this)">×</em></div>\');
        			});
        		}, "", ' . json_encode($options) . ');
		 });
	}
	function deleteMultiImage(elm){
		require(["jquery"], function($){
			$(elm).parent().remove();
		});
	}
</script>';
        define('TPL_INIT_MULTI_IMAGE', true);
    }

    $s .= <<<EOF
<div class="input-group">
	<input type="text" class="form-control" readonly="readonly" value="" placeholder="批量上传图片" autocomplete="off">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button" onclick="uploadMultiImage(this);">选择图片</button>
		<input type="hidden" value="{$name}" />
	</span>
</div>
<div class="input-group multi-img-details">
EOF;
    if (is_array($value) && count($value) > 0) {
        foreach ($value as $row) {
            $s .= '
<div class="multi-item">
	<img src="' . tomedia($row) . '" onerror="this.src=\'./Public/images/nopic.jpg\'; this.title=\'图片未找到.\'" class="img-responsive img-thumbnail">
	<input type="hidden" name="' . $name . '[]" value="' . $row . '" >
	<em class="close" title="删除这张图片" onclick="deleteMultiImage(this)">×</em>
</div>';
        }
    }
    $s .= '</div>';

    return $s;
}
///////////////////////////////表情OK////////////////////////////
function tpl_form_field_emoji($name, $value = '') {
    $s = '';
    if (!defined('TPL_INIT_EMOJI')) {
        $s = '
		<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
			function showEmojiDialog(elm) {
				require(["util", "jquery"], function(u, $){
					var btn = $(elm);
					var spview = btn.parent().prev();
					var ipt = spview.prev();
					if(!ipt.val()){
						spview.css("display","none");
					}
					u.emojiBrowser(function(emoji){
						ipt.val("\\\" + emoji.find("span").text().replace("+", "").toLowerCase());
						spview.show();
						spview.find("span").removeClass().addClass(emoji.find("span").attr("class"));
					});
				});
			}
		</script>';
        define('TPL_INIT_EMOJI', true);
    }
    $s .= '
	<div class="input-group" style="width: 500px;">
		<input type="text" value="' . $value . '" name="' . $name . '" class="form-control" autocomplete="off">
		<span class="input-group-addon" style="display:none"><span></span></span>
		<span class="input-group-btn">
			<button class="btn btn-default" type="button" onclick="showEmojiDialog(this);">选择表情</button>
		</span>
	</div>
	';
    return $s;
}
///////////////////////////////颜色OK////////////////////////////
function tpl_form_field_color($name, $value = '') {
    $s = '';
    if (!defined('TPL_INIT_COLOR')) {
        $s = '
		<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
        <script src="./Public/js/require.js"></script>  
        <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
			require(["jquery", "util"], function($, util){
				$(function(){
					$(".colorpicker").each(function(){
						var elm = this;
						util.colorpicker(elm, function(color){
							$(elm).parent().prev().prev().val(color.toHexString());
							$(elm).parent().prev().css("background-color", color.toHexString());
						});
					});
					$(".colorclean").click(function(){
						$(this).parent().prev().prev().val("");
						$(this).parent().prev().css("background-color", "#FFF");
					});
				});
			});
		</script>';
        define('TPL_INIT_COLOR', true);
    }
    $s .= '
		<div class="row row-fix">
			<div class="col-xs-8 col-sm-8" style="padding-right:0;">
				<div class="input-group">
					<input class="form-control" type="text" name="'.$name.'" placeholder="请选择颜色" value="'.$value.'">
					<span class="input-group-addon" style="width:35px;border-left:none;background-color:'.$value.'"></span>
					<span class="input-group-btn">
						<button class="btn btn-default colorpicker" type="button">选择颜色 <i class="fa fa-caret-down"></i></button>
						<button class="btn btn-default colorclean" type="button"><span><i class="fa fa-remove"></i></span></button>
					</span>
				</div>
			</div>
		</div>
		';
    return $s;
}

///////////////////////////////奥森图标OK////////////////////////////
function tpl_form_field_icon($name, $value='') {
    if(empty($value)){
        $value = 'fa fa-external-link';
    }
    $s = '';
    if (!defined('TPL_INIT_ICON')) {
        $s = '
		<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
			function showIconDialog(elm) {
				require(["util","jquery"], function(u, $){
					var btn = $(elm);
					var spview = btn.parent().prev();
					var ipt = spview.prev();
					if(!ipt.val()){
						spview.css("display","none");
					}
					u.iconBrowser(function(ico){
						ipt.val(ico);
						spview.show();
						spview.find("i").attr("class","");
						spview.find("i").addClass("fa").addClass(ico);
					});
				});
			}
		</script>';
        define('TPL_INIT_ICON', true);
    }
    $s .= '
	<div class="input-group" style="width: 300px;">
		<input type="text" value="'.$value.'" name="'.$name.'" class="form-control" autocomplete="off">
		<span class="input-group-addon"><i class="'.$value.' fa"></i></span>
		<span class="input-group-btn">
			<button class="btn btn-default" type="button" onclick="showIconDialog(this);">选择图标</button>
		</span>
	</div>
	';
    return $s;
}

/////////////////////////时钟OK////////////////////////////
function tpl_form_field_clock($name, $value = '') {
    $s = '';
    if(!defined('TPL_INIT_CLOCK_TIME')) {
        $s .= '
            <script type="text/javascript">
			require(["clockpicker"], function($){
				$(function(){
					$(".clockpicker").clockpicker({
						autoclose: true
					});
				});
			});
		</script>
		';
        define('TPL_INIT_CLOCK_TIME', 1);
    }
    $time = date('H:i');
    if(!empty($value)) {
        if(!strexists($value, ':')) {
            $time = date('H:i', $value);
        } else {
            $time = $value;
        }
    }
    $s .= '	<div class="input-group clockpicker">
				<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				<input type="text" name="'.$name.'" value="'.$time.'" class="form-control">
			</div>';
    return $s;
}

function tpl_form_field_date($name, $value = array(), $ishour = false) {
    $s = '';
    if (!defined('INCLUDE_DATE')) {
        $s = '
		<link type="text/css" rel="stylesheet" href="./Public/components/datetimepicker/jquery.datetimepicker.css" />
		<script type="text/javascript" src="./Public/components/datetimepicker/jquery.datetimepicker.js"></script>';
        define('INCLUDE_DATE', true);
    }
    if (strexists($name, '[')) {
        $id = str_replace(array('[', ']'), '_', $name);
    } else {
        $id = $name;
    }
    $value = empty($value) ? date('Y-m-d', TIMESTAMP) :  $value;
    $ishour = empty($ishour) ? 2 : 0;
    $s .= '
	<input type="text" class="datepicker" id="datepicker_'.$id.'" name="'.$name.'" value="'.$value.'" readonly="readonly" />
	<script type="text/javascript">
		$("#datepicker_'.$id.'").datetimepicker({
			format: "yyyy-mm-dd hh:ii",
			minView: "'.$ishour.'",
			//pickerPosition: "top-right",
			autoclose: true
		});
	</script>';
    return $s;
}

////////////////////////日期区间选择器//////////////////////////////
function tpl_form_field_daterange($name, $value = array(), $time = false) {
    $s = '';

    if (empty($time) && !defined('TPL_INIT_DATERANGE_DATE')) {
        $s = '
            <script type="text/javascript">
	require(["daterangepicker"], function($){
		$(function(){
			$(".daterange.daterange-date").each(function(){
				var elm = this;
				$(this).daterangepicker({
					startDate: $(elm).prev().prev().val(),
					endDate: $(elm).prev().val(),
					format: "YYYY-MM-DD"
				}, function(start, end){
					$(elm).find(".date-title").html(start.toDateStr() + " 至 " + end.toDateStr());
					$(elm).prev().prev().val(start.toDateStr());
					$(elm).prev().val(end.toDateStr());
				});
			});
		});
	});
</script>
';
        define('TPL_INIT_DATERANGE_DATE', true);
    }

    if (!empty($time) && !defined('TPL_INIT_DATERANGE_TIME')) {
        $s = '
<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
	require(["daterangepicker"], function($){
		$(function(){
			$(".daterange.daterange-time").each(function(){
				var elm = this;
				$(this).daterangepicker({
					startDate: $(elm).prev().prev().val(),
					endDate: $(elm).prev().val(),
					format: "YYYY-MM-DD HH:mm",
					timePicker: true,
					timePicker12Hour : false,
					timePickerIncrement: 1,
					minuteStep: 1
				}, function(start, end){
					$(elm).find(".date-title").html(start.toDateTimeStr() + " 至 " + end.toDateTimeStr());
					$(elm).prev().prev().val(start.toDateTimeStr());
					$(elm).prev().val(end.toDateTimeStr());
				});
			});
		});
	});
</script>
';
        define('TPL_INIT_DATERANGE_TIME', true);
    }

    if($value['start']) {
        $value['starttime'] = empty($time) ? date('Y-m-d',strtotime($value['start'])) : date('Y-m-d H:i',strtotime($value['start']));
    }
    if($value['end']) {
        $value['endtime'] = empty($time) ? date('Y-m-d',strtotime($value['end'])) : date('Y-m-d H:i',strtotime($value['end']));
    }
    $value['starttime'] = empty($value['starttime']) ? (empty($time) ? date('Y-m-d') : date('Y-m-d H:i') ): $value['starttime'];
    $value['endtime'] = empty($value['endtime']) ? $value['starttime'] : $value['endtime'];
    $s .= '
	<input name="'.$name . '[start]'.'" type="hidden" value="'. $value['starttime'].'" />
	<input name="'.$name . '[end]'.'" type="hidden" value="'. $value['endtime'].'" />
	<button class="btn btn-default daterange '.(!empty($time) ? 'daterange-time' : 'daterange-date').'" type="button"><span class="date-title">'.$value['starttime'].' 至 '.$value['endtime'].'</span> <i class="fa fa-calendar"></i></button>
	';
    return $s;
}

/////////////////////////////日历选择,三级联动///////////////////////////////
function tpl_form_field_calendar($name, $values = array()) {
    $html = '';
    if (!defined('TPL_INIT_CALENDAR')) {
        $html .= '
		<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
			function handlerCalendar(elm) {
				require(["jquery","moment"], function($, moment){
					var tpl = $(elm).parent().parent();
					var year = tpl.find("select.tpl-year").val();
					var month = tpl.find("select.tpl-month").val();
					var day = tpl.find("select.tpl-day");
					day[0].options.length = 1;
					if(year && month) {
						var date = moment(year + "-" + month, "YYYY-M");
						var days = date.daysInMonth();
						for(var i = 1; i <= days; i++) {
							var opt = new Option(i, i);
							day[0].options.add(opt);
						}
						if(day.attr("data-value")!=""){
							day.val(day.attr("data-value"));
						} else {
							day[0].options[0].selected = "selected";
						}
					}
				});
			}
			require(["jquery"], function($){
				$(".tpl-calendar").each(function(){
					handlerCalendar($(this).find("select.tpl-year")[0]);
				});
			});
		</script>';
        define('TPL_INIT_CALENDAR', true);
    }

    if (empty($values) || !is_array($values)) {
        $values = array(0,0,0);
    }
    $values['year'] = intval($values['year']);
    $values['month'] = intval($values['month']);
    $values['day'] = intval($values['day']);

    if (empty($values['year'])) {
        $values['year'] = '1980';
    }
    $year = array(date('Y'), '1914');
    $html .= '<div class="row row-fix tpl-calendar">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<select name="' . $name . '[year]" onchange="handlerCalendar(this)" class="form-control tpl-year">
				<option value="">年</option>';
    for ($i = $year[1]; $i <= $year[0]; $i++) {
        $html .= '<option value="' . $i . '"' . ($i == $values['year'] ? ' selected="selected"' : '') . '>' . $i . '</option>';
    }
    $html .= '	</select>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<select name="' . $name . '[month]" onchange="handlerCalendar(this)" class="form-control tpl-month">
				<option value="">月</option>';
    for ($i = 1; $i <= 12; $i++) {
        $html .= '<option value="' . $i . '"' . ($i == $values['month'] ? ' selected="selected"' : '') . '>' . $i . '</option>';
    }
    $html .= '	</select>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<select name="' . $name . '[day]" data-value="' . $values['day'] . '" class="form-control tpl-day">
				<option value="0">日</option>
			</select>
		</div>
	</div>';
    return $html;
}

////////////////////省市区三级联动///////////////////////////////
function tpl_form_field_district($name, $values = array()) {
    $html = '';
    if (!defined('TPL_INIT_DISTRICT')) {
        $html .= '
		<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
			require(["jquery", "district"], function($, dis){
				$(".tpl-district-container").each(function(){
					var elms = {};
					elms.province = $(this).find(".tpl-province")[0];
					elms.city = $(this).find(".tpl-city")[0];
					elms.district = $(this).find(".tpl-district")[0];
					var vals = {};
					vals.province = $(elms.province).attr("data-value");
					vals.city = $(elms.city).attr("data-value");
					vals.district = $(elms.district).attr("data-value");
					dis.render(elms, vals, {withTitle: true});
				});
			});
		</script>';
        define('TPL_INIT_DISTRICT', true);
    }
    if (empty($values) || !is_array($values)) {
        $values = array('province'=>'','city'=>'','district'=>'');
    }
    if(empty($values['province'])) {
        $values['province'] = '';
    }
    if(empty($values['city'])) {
        $values['city'] = '';
    }
    if(empty($values['district'])) {
        $values['district'] = '';
    }
    $html .= '
		<div class="row row-fix tpl-district-container">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<select name="' . $name . '[province]" data-value="' . $values['province'] . '" class="form-control tpl-province">
				</select>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<select name="' . $name . '[city]" data-value="' . $values['city'] . '" class="form-control tpl-city">
				</select>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<select name="' . $name . '[district]" data-value="' . $values['district'] . '" class="form-control tpl-district">
				</select>
			</div>
		</div>';
    return $html;
}

/////////////////////////////分类二级联动///////////////////////////////////
function tpl_form_field_category_2level($name, $parents, $children, $parentid, $childid){
    $html = '
		<script type="text/javascript">
			window._' . $name . ' = ' . json_encode($children) . ';
		</script>';
    if (!defined('TPL_INIT_CATEGORY')) {
        $html .= '
		<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
			function renderCategory(obj, name){
				var index = obj.options[obj.selectedIndex].value;
				require([\'jquery\', \'util\'], function($, u){
					$selectChild = $(\'#\'+name+\'_child\');
					var html = \'<option value="0">请选择二级分类</option>\';
					if (!window[\'_\'+name] || !window[\'_\'+name][index]) {
						$selectChild.html(html);
						return false;
					}
					for(var i=0; i< window[\'_\'+name][index].length; i++){
						html += \'<option value="\'+window[\'_\'+name][index][i][\'id\']+\'">\'+window[\'_\'+name][index][i][\'name\']+\'</option>\';
					}
					$selectChild.html(html);
				});
			}
		</script>
					';
        define('TPL_INIT_CATEGORY', true);
    }

    $html .=
    '<div class="row row-fix tpl-category-container">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<select class="form-control tpl-category-parent" id="' . $name . '_parent" name="' . $name . '[parentid]" onchange="renderCategory(this,\'' . $name . '\')">
					<option value="0">请选择一级分类</option>';
    $ops = '';
    foreach ($parents as $row) {
        $html .= '
					<option value="' . $row['id'] . '" ' . (($row['id'] == $parentid) ? 'selected="selected"' : '') . '>' . $row['name'] . '</option>';
    }
    $html .= '
				</select>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<select class="form-control tpl-category-child" id="' . $name . '_child" name="' . $name . '[childid]">
					<option value="0">请选择二级分类</option>';
    if (!empty($parentid) && !empty($children[$parentid])) {
        foreach ($children[$parentid] as $row) {
            $html .= '
					<option value="' . $row['id'] . '"' . (($row['id'] == $childid) ? 'selected="selected"' : '') . '>' . $row['name'] . '</option>';
        }
    }
    $html .= '
				</select>
			</div>
		</div>
	';
    return $html;
}

///////////////////////时尚休闲分类二级联动/////////////////////////////
function tpl_form_field_industry($name, $pvalue = '', $cvalue = '', $parentid = 'industry_1', $childid = 'industry_2'){
    $html = '
	<div class="row row-fix">
		<div class="col-sm-4">
			<select name="' . $name . '[parent]" id="' . $parentid . '" class="form-control" value="' . $pvalue . '"></select>
		</div>
		<div class="col-sm-4">
			<select name="' . $name . '[child]" id="' . $childid . '" class="form-control" value="' . $cvalue . '"></select>
		</div>
		<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
			    <script type="text/javascript">
			require([\'industry\'], function(industry){
				industry.init("'. $parentid . '","' . $childid . '");
			});
		</script>
	</div>';
    return $html;
}
//////////////////////////获取经纬度////////////////////////
function tpl_form_field_coordinate($field, $value = array()) {
    $s = '';
    if(!defined('TPL_INIT_COORDINATE')) {
        $s .= '
            <script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
            <script type="text/javascript">
				function showCoordinate(elm) {
					require(["util"], function(util){
						var val = {};
						val.lng = parseFloat($(elm).parent().prev().prev().find(":text").val());
						val.lat = parseFloat($(elm).parent().prev().find(":text").val());
						util.map(val, function(r){
							$(elm).parent().prev().prev().find(":text").val(r.lng);
							$(elm).parent().prev().find(":text").val(r.lat);
						});

					});
				}

			</script>';
        define('TPL_INIT_COORDINATE', true);
    }
    $s .= '
		<div class="row row-fix">
			<div class="col-xs-4 col-sm-4">
				<input type="text" name="' . $field . '[lng]" value="'.$value['lng'].'" placeholder="地理经度"  class="form-control" />
			</div>
			<div class="col-xs-4 col-sm-4">
				<input type="text" name="' . $field . '[lat]" value="'.$value['lat'].'" placeholder="地理纬度"  class="form-control" />
			</div>
			<div class="col-xs-4 col-sm-4">
				<button onclick="showCoordinate(this);" class="btn btn-default" type="button">选择坐标</button>
			</div>
		</div>';
    return $s;
}

function tpl_fans_form($field, $value = '') {
    switch ($field) {
        case 'avatar':
            $avatar_url = './Public/images/avatar/';
            $html = '';
            if (!defined('TPL_INIT_AVATAR')) {
                $html .= '
			<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
                    <script type="text/javascript">
				function showAvatarDialog(elm, opts) {
					require(["util"], function(util){
						var btn = $(elm);
						var ipt = btn.parent().prev();
						var img = ipt.parent().next().children();
						var content = \'<div class="avatar-browser clearfix">\';
						for(var i = 1; i <= 12; i++) {
							content +=
								\'<div title="头像\' + i + \'" class="thumbnail">\' +
									\'<em><img src="' . $avatar_url . 'avatar_\' + i + \'.jpg" class="img-responsive"></em>\' +
								\'</div>\';
						}
						content += "</div>";
						var dialog = util.dialog("请选择头像", content);
						dialog.modal("show");
						dialog.find(".thumbnail").on("click", function(){
							var url = $(this).find("img").attr("src");
							img.get(0).src = url;
							ipt.val(url.replace(/^\.\.\/attachment\//, ""));
							dialog.modal("hide");
						});
					});
				}
			</script>';
                define('TPL_INIT_AVATAR', true);
            }
            if (!defined('TPL_INIT_IMAGE')) {
                global $_W;
                if (defined('IN_MOBILE')) {
                    $html .= <<<EOF
				<script src="./Public/js/app/util.js?{TIMESTAMP}"></script>
    <script src="./Public/js/require.js"></script>  
    <script src="./Public/js/app/config.js?{TIMESTAMP}"></script>
                        <script type="text/javascript">
					// in mobile
					function showImageDialog(elm) {
						require(["jquery", "util"], function($, util){
							var btn = $(elm);
							var ipt = btn.parent().prev();
							var val = ipt.val();
							var img = ipt.parent().next().children();
							util.image(elm, function(url){
								img.get(0).src = url.url;
								ipt.val(url.attachment);
							});
						});
					}
				</script>
EOF;
                } else {
                    $html .= <<<EOF
				<script type="text/javascript">
					// in web
					function showImageDialog(elm, opts) {
						require(["util"], function(util){
							var btn = $(elm);
							var ipt = btn.parent().prev();
							var val = ipt.val();
							var img = ipt.parent().next().find('img');
							util.image(val, function(url){
								img.get(0).src = url.url;
								ipt.val(url.attachment);
							}, opts, {multiple:false,type:"image",direct:true});
						});
					}
				</script>
EOF;
                }
                define('TPL_INIT_IMAGE', true);
            }
            $val = './Public/images/nopic.jpg';
            if (!empty($value)) {
                $val = tomedia($value);
            }
            $options = array();
            $options['width'] = '200';
            $options['height'] = '200';

            if (defined('IN_MOBILE')) {
                $html .= <<<EOF
			<div class="input-group" style="">
				<img src="{$val}" class="img-responsive img-thumbnail" width="100" style="max-height: 150px;"/>
			</div>
			<div class="input-group">
				<input type="hidden" value="{$value}" name="{$field}" class="form-control" autocomplete="off">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" onclick="showImageDialog(this);">选择图片</button>
				</span>
			</div>
EOF;
            } else {
                $html .= '
			<div class="input-group">
				<input type="text" value="' . $value . '" name="' . $field . '" class="form-control" autocomplete="off">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" onclick="showImageDialog(this, \'' . base64_encode(iserializer($options)) . '\');">选择图片</button>
					<button class="btn btn-default" type="button" onclick="showAvatarDialog(this);">系统头像</button>
				</span>
			</div>
			<div class="input-group" style="margin-top:.5em;">
				<img src="' . $val . '" class="img-responsive img-thumbnail" width="150" />
			</div>';
            }

            break;
        case 'birth':
        case 'birthyear':
        case 'birthmonth':
        case 'birthday':
            $html = tpl_form_field_calendar('birth', $value);
            break;
        case 'reside':
        case 'resideprovince':
        case 'residecity':
        case 'residedist':
            $html = tpl_form_field_district('reside', $value);
            break;
        case 'bio':
        case 'interest':
            $html = '<textarea name="' . $field . '" class="form-control">' . $value . '</textarea>';
            break;
        case 'gender':
            $html = '
				<select name="gender" class="form-control">
					<option value="0" ' . ($value == 0 ? 'selected ' : '') . '>保密</option>
					<option value="1" ' . ($value == 1 ? 'selected ' : '') . '>男</option>
					<option value="2" ' . ($value == 2 ? 'selected ' : '') . '>女</option>
				</select>';
            break;
        case 'card_type':
            $html = '
				<select name="card_type" class="form-control">
					<option value="1" ' . ($value == 1 ? 'selected ' : '') . '>身份证</option>
					<option value="2" ' . ($value == 2 ? 'selected ' : '') . '>护照</option>
					<option value="3" ' . ($value == 3 ? 'selected ' : '') . '>军官证</option>
					<option value="4" ' . ($value == 4 ? 'selected ' : '') . '>其他</option>
				</select>';
            break;
        case 'education':
        case 'constellation':
        case 'zodiac':
        case 'bloodtype':
            if ($field == 'bloodtype') {
                $options = array('A', 'B', 'AB', 'O', '其它');
            } elseif ($field == 'zodiac') {
                $options = array('鼠', '牛', '虎', '兔', '龙', '蛇', '马', '羊', '猴', '鸡', '狗', '猪');
            } elseif ($field == 'constellation') {
                $options = array('水瓶座', '双鱼座', '白羊座', '金牛座', '双子座', '巨蟹座', '狮子座', '处女座', '天秤座', '天蝎座', '射手座', '摩羯座');
            } elseif ($field == 'education') {
                $options = array('博士', '硕士', '本科', '专科', '中学', '小学', '其它');
            }
            $html = '<select name="' . $field . '" class="form-control">';
            foreach ($options as $item) {
                $html .= '<option value="' . $item . '" ' . ($value == $item ? 'selected ' : '') . '>' . $item . '</option>';
            }
            $html .= '</select>';
            break;
        case 'nickname':
        case 'realname':
        case 'address':
        case 'mobile':
        case 'qq':
        case 'msn':
        case 'email':
        case 'telephone':
        case 'taobao':
        case 'alipay':
        case 'studentid':
        case 'grade':
        case 'graduateschool':
        case 'idcard':
        case 'zipcode':
        case 'site':
        case 'affectivestatus':
        case 'lookingfor':
        case 'nationality':
        case 'height':
        case 'weight':
        case 'company':
        case 'occupation':
        case 'position':
        case 'revenue':
        default:
            $html = '<input type="text" class="form-control" name="' . $field . '" value="' . $value . '" />';
            break;
    }
    return $html;

}


////////////////////////////富文本编辑器OK/////////////////////////////////
function tpl_ueditor($id, $value = '', $options = array()) {
	$s = '';
	if (!defined('TPL_INIT_UEDITOR')) {
		$s .= '	    
		    <script src="./Public/js/app/util.js?{TIMESTAMP}"></script><script src="./Public/js/require.js"></script> <script src="./Public/js/app/config.js?{TIMESTAMP}"></script><script type="text/javascript" src="./Public/components/ueditor/ueditor.config.js"></script><script type="text/javascript" src="./Public/components/ueditor/ueditor.all.min.js"></script><script type="text/javascript" src="./Public/components/ueditor/lang/zh-cn/zh-cn.js"></script>';
	}
	$options['height'] = empty($options['height']) ? 200 : $options['height'];
	$s .= !empty($id) ? "<textarea id=\"{$id}\" name=\"{$id}\" type=\"text/plain\" style=\"height:{$options['height']}px;\">{$value}</textarea>" : '';
	$s .= "   
	
	<script type=\"text/javascript\">
			var ueditoroption = {
				'autoClearinitialContent' : false,
				'toolbars' : [['fullscreen', 'source', 'preview', '|', 'bold', 'italic', 'underline', 'strikethrough', 'forecolor', 'backcolor', '|',
					'justifyleft', 'justifycenter', 'justifyright', '|', 'insertorderedlist', 'insertunorderedlist', 'blockquote', 'emotion', 'insertvideo',
					'link', 'removeformat', '|', 'rowspacingtop', 'rowspacingbottom', 'lineheight','indent', 'paragraph', 'fontsize', '|',
					'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol',
					'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', '|', 'anchor', 'map', 'print', 'drafts']],
				'elementPathEnabled' : false,
				'initialFrameHeight': {$options['height']},
				'focus' : false,
				'maximumWords' : 9999999999999
			};
			var opts = {
				type :'image',
				direct : false,
				multi : true,
				tabs : {
					'upload' : 'active',
					'browser' : '',
					'crawler' : ''
				},
				path : '',
				dest_dir : '',
				global : false,
				thumb : false,
				width : 0
			};
			UE.registerUI('myinsertimage',function(editor,uiName){
				editor.registerCommand(uiName, {
					execCommand:function(){
						require(['fileUploader'], function(uploader){
							uploader.show(function(imgs){
								if (imgs.length == 0) {
									return;
								} else if (imgs.length == 1) {
									editor.execCommand('insertimage', {
										'src' : imgs[0]['url'],
										'_src' : imgs[0]['attachment'],
										'width' : '100%',
										'alt' : imgs[0].filename
									});
								} else {
									var imglist = [];
									for (i in imgs) {
										imglist.push({
											'src' : imgs[i]['url'],
											'_src' : imgs[i]['attachment'],
											'width' : '100%',
											'alt' : imgs[i].filename
										});
									}
									editor.execCommand('insertimage', imglist);
								}
							}, opts);
						});
					}
				});
				var btn = new UE.ui.Button({
					name: '插入图片',
					title: '插入图片',
					cssRules :'background-position: -726px -77px',
					onclick:function () {
						editor.execCommand(uiName);
					}
				});
				editor.addListener('selectionchange', function () {
					var state = editor.queryCommandState(uiName);
					if (state == -1) {
						btn.setDisabled(true);
						btn.setChecked(false);
					} else {
						btn.setDisabled(false);
						btn.setChecked(state);
					}
				});
				return btn;
			}, 19);
			".(!empty($id) ? "
				$(function(){
					var ue = UE.getEditor('{$id}', ueditoroption);
					$('#{$id}').data('editor', ue);
					$('#{$id}').parents('form').submit(function() {
						if (ue.queryCommandState('source')) {
							ue.execCommand('source');
						}
					});
				});" : '')."
	</script>";
	return $s;

}