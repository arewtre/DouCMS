<?php
defined('IN_IA') or exit('Access Denied');

function _tpl_form_field_date($name, $value = '', $withtime = false) {
	$s = '';
	$s = '
		<script type="text/javascript">
			require(["datetimepicker"], function(){
				$(function(){
						var option = {
							lang : "zh",
							step : 5,
							timepicker : ' . (!empty($withtime) ? "true" : "false") .',
							closeOnDateSelect : true,
							format : "Y-m-d' . (!empty($withtime) ? ' H:i"' : '"') .'
						};
					$(".datetimepicker[name = \'' . $name . '\']").datetimepicker(option);
				});
			});
		</script>';
	$withtime = empty($withtime) ? false : true;
	if (!empty($value)) {
		$value = strexists($value, '-') ? strtotime($value) : $value;
	} else {
		$value = TIMESTAMP;
	}
	$value = ($withtime ? date('Y-m-d H:i:s', $value) : date('Y-m-d', $value));
	$s .= '<input type="text" name="' . $name . '"  value="'.$value.'" placeholder="请选择日期时间" readonly="readonly" class="datetimepicker form-control" style="padding-left:12px;" />';
	return $s;
}


function tpl_form_field_audio($name, $value = '', $options = array()) {
	if (!is_array($options)) {
		$options = array();
	}
	$options['direct'] = true;
	$options['multiple'] = false;
	$s = '';
	if (!defined('TPL_INIT_AUDIO')) {
		$s = '
<script type="text/javascript">
	function showAudioDialog(elm, base64options, options) {
		require(["util"], function(util){
			var btn = $(elm);
			var ipt = btn.parent().prev();
			var val = ipt.val();
			util.audio(val, function(url){
				if(url && url.attachment && url.url){
					btn.prev().show();
					ipt.val(url.attachment);
					ipt.attr("filename",url.filename);
					ipt.attr("url",url.url);
					setAudioPlayer();
				}
				if(url && url.media_id){
					ipt.val(url.media_id);
				}
			}, "" , ' . json_encode($options) . ');
		});
	}

	function setAudioPlayer(){
		require(["jquery", "util", "jquery.jplayer"], function($, u){
			$(function(){
				$(".audio-player").each(function(){
					$(this).prev().find("button").eq(0).click(function(){
						var src = $(this).parent().prev().val();
						if($(this).find("i").hasClass("fa-stop")) {
							$(this).parent().parent().next().jPlayer("stop");
						} else {
							if(src) {
								$(this).parent().parent().next().jPlayer("setMedia", {mp3: u.tomedia(src)}).jPlayer("play");
							}
						}
					});
				});

				$(".audio-player").jPlayer({
					playing: function() {
						$(this).prev().find("i").removeClass("fa-play").addClass("fa-stop");
					},
					pause: function (event) {
						$(this).prev().find("i").removeClass("fa-stop").addClass("fa-play");
					},
					swfPath: "resource/components/jplayer",
					supplied: "mp3"
				});
				$(".audio-player-media").each(function(){
					$(this).next().find(".audio-player-play").css("display", $(this).val() == "" ? "none" : "");
				});
			});
		});
	}
	setAudioPlayer();
</script>';
		echo $s;
		define('TPL_INIT_AUDIO', true);
	}
	$s .= '
	<div class="input-group">
		<input type="text" value="' . $value . '" name="' . $name . '" class="form-control audio-player-media" autocomplete="off" ' . ($options['extras']['text'] ? $options['extras']['text'] : '') . '>
		<span class="input-group-btn">
			<button class="btn btn-default audio-player-play" type="button" style="display:none;"><i class="fa fa-play"></i></button>
			<button class="btn btn-default" type="button" onclick="showAudioDialog(this, \'' . base64_encode(iserializer($options)) . '\',' . str_replace('"', '\'', json_encode($options)) . ');">选择媒体文件</button>
		</span>
	</div>
	<div class="input-group audio-player"></div>';
	return $s;
}


function tpl_form_field_multi_audio($name, $value = array(), $options = array()) {
	$s = '';
	$options['direct'] = false;
	$options['multiple'] = true;

	if (!defined('TPL_INIT_MULTI_AUDIO')) {
		$s .= '
<script type="text/javascript">
	function showMultiAudioDialog(elm, name) {
		require(["util"], function(util){
			var btn = $(elm);
			var ipt = btn.parent().prev();
			var val = ipt.val();

			util.audio(val, function(urls){
				$.each(urls, function(idx, url){
					var obj = $(\'<div class="multi-audio-item" style="height: 40px; position:relative; float: left; margin-right: 18px;"><div class="multi-audio-player"></div><div class="input-group"><input type="text" class="form-control" readonly value="\' + url.attachment + \'" /><div class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-play"></i></button><button class="btn btn-default" onclick="deleteMultiAudio(this)" type="button"><i class="fa fa-remove"></i></button></div></div><input type="hidden" name="\'+name+\'[]" value="\'+url.attachment+\'"></div>\');
					$(elm).parent().parent().next().append(obj);
					setMultiAudioPlayer(obj);
				});
			}, "" , ' . json_encode($options) . ');
		});
	}
	function deleteMultiAudio(elm){
		require([\'jquery\'], function($){
			$(elm).parent().parent().parent().remove();
		});
	}
	function setMultiAudioPlayer(elm){
		require(["jquery", "util", "jquery.jplayer"], function($, u){
			$(".multi-audio-player",$(elm)).next().find("button").eq(0).click(function(){
				var src = $(this).parent().prev().val();
				if($(this).find("i").hasClass("fa-stop")) {
					$(this).parent().parent().prev().jPlayer("stop");
				} else {
					if(src) {
						$(this).parent().parent().prev().jPlayer("setMedia", {mp3: u.tomedia(src)}).jPlayer("play");
					}
				}
			});
			$(".multi-audio-player",$(elm)).jPlayer({
				playing: function() {
					$(this).next().find("i").eq(0).removeClass("fa-play").addClass("fa-stop");
				},
				pause: function (event) {
					$(this).next().find("i").eq(0).removeClass("fa-stop").addClass("fa-play");
				},
				swfPath: "resource/components/jplayer",
				supplied: "mp3"
			});
		});
	}
</script>';
		define('TPL_INIT_MULTI_AUDIO', true);
	}

	$s .= '
<div class="input-group">
	<input type="text" class="form-control" readonly="readonly" value="" placeholder="批量上传音乐" autocomplete="off">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button" onclick="showMultiAudioDialog(this,\'' . $name . '\');">选择音乐</button>
	</span>
</div>
<div class="input-group multi-audio-details clear-fix" style="margin-top:.5em;">';
	if (!empty($value) && !is_array($value)) {
		$value = array($value);
	}
	if (is_array($value) && count($value) > 0) {
		$n = 0;
		foreach ($value as $row) {
			$m = random(8);
			$s .= '
	<div class="multi-audio-item multi-audio-item-' . $n . '-' . $m . '" style="height: 40px; position:relative; float: left; margin-right: 18px;">
		<div class="multi-audio-player"></div>
		<div class="input-group">
			<input type="text" class="form-control" value="' . $row . '" readonly/>
			<div class="input-group-btn">
				<button class="btn btn-default" type="button"><i class="fa fa-play"></i></button>
				<button class="btn btn-default" onclick="deleteMultiAudio(this)" type="button"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<input type="hidden" name="' . $name . '[]" value="' . $row . '">
	</div>
	<script language="javascript">setMultiAudioPlayer($(".multi-audio-item-' . $n . '-' . $m . '"));</script>';
			$n++;
		}
	}
	$s .= '
</div>';

	return $s;
}


function tpl_form_field_link_url_type($name, $value = '', $typeName, $typeValue='', $idName, $idValue='', $options = array()) {
	global $_GPC;
	$s = '';
	if (!defined('TPL_INIT_LINK')) {
		$s = '
		<script type="text/javascript">
			function showLinkDialog(elm) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.linkBrowser(function(href){
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					});
				});
			}
			function newsLinkDialog(elm, page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.newsBrowser(function(href, page){
						if (page != "" && page != undefined) {
							newsLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					}, page);
				});
			}
		function webLinkDialog(elm) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.weblinkBrowser(function(href){
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					});
				});
			}
			function pageLinkDialog(elm, page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.pageBrowser(function(href, page){
						if (page != "" && page != undefined) {
							pageLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						$("#'.$typeName.'").val(1);
            			$("#'.$idName.'").val(null);
						ipt.val(href);
					}, page);
				});
			}
			function articleLinkDialog(elm, page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.articleBrowser(function(href, page){
						if (page != "" && page != undefined) {
							articleLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					}, page);
				});
			}
			function phoneLinkDialog(elm, page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.phoneBrowser(function(href, page){
						if (page != "" && page != undefined) {
							phoneLinkDialog(elm, page);
							return false;
						}
						ipt.val(href);
					}, page);
				});
			}
			function mapLinkDialog(elm) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.map(elm, function(val){
						var href = \'http://api.map.baidu.com/marker?location=\'+val.lat+\',\'+val.lng+\'&output=html&src=we7\';
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					});
				});
			}
			/*function storeDialog (elm, page) {
    			require(["util","jquery"], function(u, $){
        			var ipt = $(elm).parent().parent().parent().prev();
        			u.storeBrowser(function(id, page){
            			if (page != "" && page != undefined) {
            				storeDialog(elm, page);
                			return false;
            			}
            			var multiid = "";
						$("#'.$typeName.'").val(2);
            			$("#'.$idName.'").val(id);
            			ipt.val("跳转商户ID:"+id);
        			}, page);
    			});
			}*/
            function storeDialog(elm,page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					//console.log(ipt);
						u.storeBrowser(function(href,page){
					    if (page != "" && page != undefined) {
							storeLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						 console.log(href);   
						ipt.val(href);
					},page);
				});
			}
            	
			function activeDialog(elm,page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					//console.log(ipt);
						u.activeBrowser(function(href,page){
					    if (page != "" && page != undefined) {
							activeDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						 console.log(href);   
						ipt.val(href);
					},page);
				});
			}
            function hotActivityDialog(elm, page){
    			require(["util","jquery"], function(u, $){
        			var ipt = $(elm).parent().parent().parent().prev();
        			u.hotActivityBrowser(function(id, page){
            			if (page != "" && page != undefined) {
            				hotActivityDialog(elm, page);
                			return false;
            			}
            			var multiid = "";
						$("#'.$typeName.'").val(2);
            			$("#'.$idName.'").val(id);
            			ipt.val("跳转热门活动ID:"+id);
        			}, page);
    			});
            }
            					
           	function linkNull(elm){
				var ipt = $(elm).parent().parent().parent().prev();
            	ipt.val("无跳转");
            	//$(elm).append("<input type="hidden" name="link_type"  value="0" />");
            	$("#link_type").val("");
			}
            function stageActiviyDialog(elm, page){
    			require(["util","jquery"], function(u, $){
        			var ipt = $(elm).parent().parent().parent().prev();
        			u.stageActiviyBrowser(function(id, page){
            			if (page != "" && page != undefined) {
            				stageActiviyDialog(elm, page);
                			return false;
            			}
            			var multiid = "";
						$("#'.$typeName.'").val(2);
            			$("#'.$idName.'").val(id);
            			ipt.val("跳转秀场活动ID:"+id);
        			}, page);
    			});
            }
		</script>';
		define('TPL_INIT_LINK', true);
	}
	$s .= '
		<input type="hidden" value="'.$typeValue.'"name="'.$typeName.'" id="'.$typeName.'" />
		<input type="hidden" value="'.$idValue.'" name="'.$idName.'" id="'.$idName.'" />
	<div class="input-group">
		<input type="text" value="'.$value.'" name="'.$name.'" class="form-control" readonly autocomplete="off">
		<span class="input-group-btn">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">选择链接 <span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li><a href="javascript:" data-type="null" onclick="linkNull(this);">不跳转</a></li>
				<li><a href="javascript:" data-type="web" onclick="webLinkDialog(this);">网页</a></li>
		        <li><a href="javascript:" data-type="store" onclick="storeDialog(this);">店铺详情</a></li>
				<li><a href="javascript:" data-type="active" onclick="activeDialog(this)">活动详情</a></li>
				<!--<li><a href="javascript:" data-type="map" onclick="stageActiviyDialog(this)">舞台活动详情</a></li>-->
			</ul>
		</span>
	</div>
	';
	return $s;
}


function tpl_form_module_link($name) {
	$s = '';
	if (!defined('TPL_INIT_module')) {
		$s = '
		<script type="text/javascript">
			function showModuleLink(elm) {
				require(["util","jquery"], function(u, $){
					u.showModuleLink(function(href, permission) {
						var ipt = $(elm).parent().prev();
						var ipts = $(elm).parent().prev().prev();
						ipt.val(href);
						ipts.val(permission);
						});
					});
				}
		</script>';
		define('TPL_INIT_module', true);
	}
	$s .= '
	<div class="input-group">
		<input type="text" class="form-control" name="permission" style="display: none">
		<input type="text" class="form-control" name="'.$name.'">
			<span class="input-group-btn">
				<a href="javascript:"  class="btn btn-default" onclick="showModuleLink(this)">选择链接</a>
			</span>
	</div>
	';
	return $s;
}


function tpl_form_field_emoji($name, $value = '') {
	$s = '';
	if (!defined('TPL_INIT_EMOJI')) {
		$s = '
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


function tpl_form_field_color($name, $value = '') {
	$s = '';
	if (!defined('TPL_INIT_COLOR')) {
		$s = '
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


function tpl_form_field_icon($name, $value='') {
	if(empty($value)){
		$value = 'fa fa-external-link';
	}
	$s = '';
	if (!defined('TPL_INIT_ICON')) {
		$s = '
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


function tpl_form_field_image($name, $value = '', $default = '', $options = array()) {
	global $_W;
	if (empty($default)) {
		$default = './resource/images/nopic.jpg';
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
					$(elm).prev().attr("src", "./resource/images/nopic.jpg");
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


function tpl_form_field_multi_image($name, $value = array(), $options = array()) {
	global $_W;
	$options['multiple'] = true;
	$options['direct'] = false;
	$s = '';
	if (!defined('TPL_INIT_MULTI_IMAGE')) {
		$s = '
<script type="text/javascript">
	function uploadMultiImage(elm) {
		var name = $(elm).next().val();
		util.image( "", function(urls){
			$.each(urls, function(idx, url){
				$(elm).parent().parent().next().append(\'<div class="multi-item"><img onerror="this.src=\\\'./resource/images/nopic.jpg\\\'; this.title=\\\'图片未找到.\\\'" src="\'+url.url+\'" class="img-responsive img-thumbnail"><input type="hidden" name="\'+name+\'[]" value="\'+url.attachment+\'"><em class="close" title="删除这张图片" onclick="deleteMultiImage(this)">×</em></div>\');
			});
		}, "", ' . json_encode($options) . ');
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
	<img src="' . tomedia($row) . '" onerror="this.src=\'./resource/images/nopic.jpg\'; this.title=\'图片未找到.\'" class="img-responsive img-thumbnail">
	<input type="hidden" name="' . $name . '[]" value="' . $row . '" >
	<em class="close" title="删除这张图片" onclick="deleteMultiImage(this)">×</em>
</div>';
		}
	}
	$s .= '</div>';

	return $s;
}

function tpl_form_field_multi_image2($name, $value = array(), $options = array()) {
    global $_W;
    $options['multiple'] = true;
    $options['direct'] = false;
    $s = '';
    if (!defined('TPL_INIT_MULTI_IMAGE')) {
        $s = '
<script type="text/javascript">
	function uploadMultiImage(elm) {
		var name = $(elm).next().val();
		util.image( "", function(urls){
			$.each(urls, function(idx, url){
				$(elm).parent().parent().next().append(\'<div class="multi-item"><img onerror=" this.title=\\\'图片未找到.\\\'" src="\'+url.url+\'" class="img-responsive img-thumbnail"><input type="hidden" name="\'+name+\'[]" value="\'+url.attachment+\'"><em class="close" title="删除这张图片" onclick="deleteMultiImage(this)">×</em></div>\');
			});
		}, "", ' . json_encode($options) . ');
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
<div class="input-group multi-img-details">
EOF;
    if (is_array($value) && count($value) > 0) {
        foreach ($value as $row) {
            $s .= '
<div class="multi-item">
	<img src="' . tomedia($row) . '" onerror=" this.title=\'图片未找到.\'" class="img-responsive img-thumbnail">
	<input type="hidden" name="' . $name . '[]" value="' . $row . '" >
</div>';
        }
    }
    $s .= '</div>';

    return $s;
}

function tpl_form_field_wechat_image($name, $value = '', $default = '', $options = array()) {
	global $_W;
	if(!$_W['acid'] || $_W['account']['level'] < 3) {
		$options['account_error'] = 1;
	} else {
		$options['acid'] = $_W['acid'];
	}
	if(empty($default)) {
		$default = './resource/images/nopic.jpg';
	}
	$val = $default;
	if (!empty($value)) {
		$media_data = (array)media2local($value, true);
		$val = $media_data['attachment'];
	}
	if (empty($options['class_extra'])) {
		$options['class_extra'] = '';
	}
	$options['direct'] = true;
	$options['multiple'] = false;
	$options['type'] = empty($options['type']) ? 'image' : $options['type'];
	$s = '';
	if (!defined('TPL_INIT_WECHAT_IMAGE')) {
		$s = '
		<script type="text/javascript">
			function showWechatImageDialog(elm, options) {
				require(["util"], function(util){
					var btn = $(elm);
					var ipt = btn.parent().prev();
					var val = ipt.val();
					var img = ipt.parent().next().children();
					util.wechat_image(val, function(url){
						if(url.media_id){
							if(img.length > 0){
								img.get(0).src = url.url;
							}
							ipt.val(url.media_id);
						}
					}, options);
				});
			}
			function deleteImage(elm){
				require(["jquery"], function($){
					$(elm).prev().attr("src", "./resource/images/nopic.jpg");
					$(elm).parent().prev().find("input").val("");
				});
			}
		</script>';
		define('TPL_INIT_WECHAT_IMAGE', true);
	}

	$s .= '
<div class="input-group ' . $options['class_extra'] . '">
	<input type="text" name="' . $name . '" value="' . $value . '"' . ($options['extras']['text'] ? $options['extras']['text'] : '') . ' class="form-control" autocomplete="off">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button" onclick="showWechatImageDialog(this, ' . str_replace('"', '\'', json_encode($options)) . ');">选择图片</button>
	</span>
</div>';
	$s .=
		'<div class="input-group ' . $options['class_extra'] . '" style="margin-top:.5em;">
			<img src="' . $val . '" onerror="this.src=\'' . $default . '\'; this.title=\'图片未找到.\'" class="img-responsive img-thumbnail" ' . ($options['extras']['image'] ? $options['extras']['image'] : '') . ' width="150" />
			<em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
		</div>';
	if (!empty($media_data) && $media_data['model'] == 'temp' && (time() - $media_data['createtime'] > 259200)) {
		$s .= '<span class="help-block"><b class="text-danger">该素材已过期 [有效期为3天]，请及时更新素材</b></span>';
	}
	return $s;
}

function tpl_form_field_wechat_multi_image($name, $value = '', $default = '', $options = array()) {
	global $_W;
	if(!$_W['acid'] || $_W['account']['level'] < 3) {
		$options['account_error'] = 1;
	} else {
		$options['acid'] = $_W['acid'];
	}
	if(empty($default)) {
		$default = './resource/images/nopic.jpg';
	}
	if(empty($options['class_extra'])) {
		$options['class_extra'] = '';
	}

	$options['direct'] = false;
	$options['multiple'] = true;
	$options['type'] = empty($options['type']) ? 'image' : $options['type'];
	$s = '';
	if (!defined('TPL_INIT_WECHAT_MULTI_IMAGE')) {
		$s = '
<script type="text/javascript">
	function uploadWechatMultiImage(elm) {
		require(["jquery","util"], function($, util){
			var name = $(elm).next().val();
			util.wechat_image("", function(urls){
				$.each(urls, function(idx, url){
					$(elm).parent().parent().next().append(\'<div class="multi-item"><img onerror="this.src=\\\'./resource/images/nopic.jpg\\\'; this.title=\\\'图片未找到.\\\'" src="\'+url.url+\'" class="img-responsive img-thumbnail"><input type="hidden" name="\'+name+\'[]" value="\'+url.media_id+\'"><em class="close" title="删除这张图片" onclick="deleteWechatMultiImage(this)">×</em></div>\');
				});
			}, '.json_encode($options).');
		});
	}
	function deleteWechatMultiImage(elm){
		require(["jquery"], function($){
			$(elm).parent().remove();
		});
	}
</script>';
		define('TPL_INIT_WECHAT_MULTI_IMAGE', true);
	}

	$s .= <<<EOF
<div class="input-group">
	<input type="text" class="form-control" readonly="readonly" value="" placeholder="批量上传图片" autocomplete="off">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button" onclick="uploadWechatMultiImage(this);">选择图片</button>
		<input type="hidden" value="{$name}" />
	</span>
</div>
<div class="input-group multi-img-details">
EOF;
	if (is_array($value) && count($value)>0) {
		foreach ($value as $row) {
			$s .='
<div class="multi-item">
	<img src="'.media2local($row).'" onerror="this.src=\'./resource/images/nopic.jpg\'; this.title=\'图片未找到.\'" class="img-responsive img-thumbnail">
	<input type="hidden" name="'.$name.'[]" value="'.$row.'" >
	<em class="close" title="删除这张图片" onclick="deleteWechatMultiImage(this)">×</em>
</div>';
		}
	}
	$s .= '</div>';
	return $s;
}

function tpl_form_field_wechat_voice($name, $value = '', $options = array()) {
	global $_W;
	if(!$_W['acid'] || $_W['account']['level'] < 3) {
		$options['account_error'] = 1;
	} else {
		$options['acid'] = $_W['acid'];
	}
	if(!empty($value)) {
		$media_data = (array)media2local($value, true);
		$val = $media_data['attachment'];
	}
	if(!is_array($options)){
		$options = array();
	}
	$options['direct'] = true;
	$options['multiple'] = false;
	$options['type'] = 'voice';

	$s = '';
	if (!defined('TPL_INIT_WECHAT_VOICE')) {
		$s = '
<script type="text/javascript">
	function showWechatVoiceDialog(elm, options) {
		require(["util"], function(util){
			var btn = $(elm);
			var ipt = btn.parent().prev();
			var val = ipt.val();
			util.wechat_audio(val, function(url){
				if(url && url.media_id && url.url){
					btn.prev().show();
					ipt.val(url.media_id);
					ipt.attr("media_id",url.media_id);
					ipt.attr("url",url.url);
					setWechatAudioPlayer();
				}
				if(url && url.media_id){
					ipt.val(url.media_id);
				}
			} , '.json_encode($options).');
		});
	}

	function setWechatAudioPlayer(){
		require(["jquery", "util", "jquery.jplayer"], function($, u){
			$(function(){
				$(".audio-player").each(function(){
					$(this).prev().find("button").eq(0).click(function(){
						var src = $(this).parent().prev().attr("url");
						if($(this).find("i").hasClass("fa-stop")) {
							$(this).parent().parent().next().jPlayer("stop");
						} else {
							if(src) {
								$(this).parent().parent().next().jPlayer("setMedia", {mp3: u.tomedia(src)}).jPlayer("play");
							}
						}
					});
				});

				$(".audio-player").jPlayer({
					playing: function() {
						$(this).prev().find("i").removeClass("fa-play").addClass("fa-stop");
					},
					pause: function (event) {
						$(this).prev().find("i").removeClass("fa-stop").addClass("fa-play");
					},
					swfPath: "resource/components/jplayer",
					supplied: "mp3"
				});
				$(".audio-player-media").each(function(){
					$(this).next().find(".audio-player-play").css("display", $(this).val() == "" ? "none" : "");
				});
			});
		});
	}

	setWechatAudioPlayer();
</script>';
		echo $s;
		define('TPL_INIT_WECHAT_VOICE', true);
	}

	$s .= '
	<div class="input-group">
		<input type="text" value="'.$value.'" name="'.$name.'" class="form-control audio-player-media" autocomplete="off" '.($options['extras']['text'] ? $options['extras']['text'] : '').'>
		<span class="input-group-btn">
			<button class="btn btn-default audio-player-play" type="button" style="display:none"><i class="fa fa-play"></i></button>
			<button class="btn btn-default" type="button" onclick="showWechatVoiceDialog(this,'.str_replace('"','\'', json_encode($options)).');">选择媒体文件</button>
		</span>
	</div>
	<div class="input-group audio-player">
	</div>';
	if(!empty($media_data) && $media_data['model'] == 'temp' && (time() - $media_data['createtime'] > 259200)){
		$s .= '<span class="help-block"><b class="text-danger">该素材已过期 [有效期为3天]，请及时更新素材</b></span>';
	}
	return $s;
}

function tpl_form_field_wechat_video($name, $value = '', $options = array()) {
	global $_W;
	if(!$_W['acid'] || $_W['account']['level'] < 3) {
		$options['account_error'] = 1;
	} else {
		$options['acid'] = $_W['acid'];
	}
	if(!empty($value)) {
		$media_data = (array)media2local($value, true);
		$val = $media_data['attachment'];
	}
	if(!is_array($options)){
		$options = array();
	}
	if(empty($options['tabs'])){
		$options['tabs'] = array('video'=>'active', 'browser'=>'');
	}
	$options = array_elements(array('tabs','global','dest_dir', 'acid', 'error'), $options);
	$options['direct'] = true;
	$options['multi'] = false;
	$options['type'] = 'video';
	$s = '';
	if (!defined('TPL_INIT_WECHAT_VIDEO')) {
		$s = '
<script type="text/javascript">
	function showWechatVideoDialog(elm, options) {
		require(["util"], function(util){
			var btn = $(elm);
			var ipt = btn.parent().prev();
			var val = ipt.val();
			util.wechat_audio(val, function(url){
				if(url && url.media_id && url.url){
					btn.prev().show();
					ipt.val(url.media_id);
					ipt.attr("media_id",url.media_id);
					ipt.attr("url",url.url);
				}
				if(url && url.media_id){
					ipt.val(url.media_id);
				}
			}, '.json_encode($options).');
		});
	}

</script>';
		echo $s;
		define('TPL_INIT_WECHAT_VIDEO', true);
	}

	$s .= '
	<div class="input-group">
		<input type="text" value="'.$value.'" name="'.$name.'" class="form-control" autocomplete="off" '.($options['extras']['text'] ? $options['extras']['text'] : '').'>
		<span class="input-group-btn">
			<button class="btn btn-default" type="button" onclick="showWechatVideoDialog(this,'.str_replace('"','\'', json_encode($options)).');">选择媒体文件</button>
		</span>
	</div>
	<div class="input-group audio-player">
	</div>';
	if(!empty($media_data) && $media_data['model'] == 'temp' && (time() - $media_data['createtime'] > 259200)){
		$s .= '<span class="help-block"><b class="text-danger">该素材已过期 [有效期为3天]，请及时更新素材</b></span>';
	}
	return $s;
}


function tpl_form_field_location_category($name, $values = array(), $del = false) {
	$html = '';
	if (!defined('TPL_INIT_LOCATION_CATEGORY')) {
		$html .= '
		<script type="text/javascript">
			require(["jquery", "location"], function($, loc){
				$(".tpl-location-container").each(function(){

					var elms = {};
					elms.cate = $(this).find(".tpl-cate")[0];
					elms.sub = $(this).find(".tpl-sub")[0];
					elms.clas = $(this).find(".tpl-clas")[0];
					var vals = {};
					vals.cate = $(elms.cate).attr("data-value");
					vals.sub = $(elms.sub).attr("data-value");
					vals.clas = $(elms.clas).attr("data-value");
					loc.render(elms, vals, {withTitle: true});
				});
			});
		</script>';
		define('TPL_INIT_LOCATION_CATEGORY', true);
	}
	if (empty($values) || !is_array($values)) {
		$values = array('cate'=>'','sub'=>'','clas'=>'');
	}
	if(empty($values['cate'])) {
		$values['cate'] = '';
	}
	if(empty($values['sub'])) {
		$values['sub'] = '';
	}
	if(empty($values['clas'])) {
		$values['clas'] = '';
	}
	$html .= '
		<div class="row row-fix tpl-location-container">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<select name="' . $name . '[cate]" data-value="' . $values['cate'] . '" class="form-control tpl-cate">
				</select>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<select name="' . $name . '[sub]" data-value="' . $values['sub'] . '" class="form-control tpl-sub">
				</select>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<select name="' . $name . '[clas]" data-value="' . $values['clas'] . '" class="form-control tpl-clas">
				</select>
			</div>';
	if($del) {
		$html .='
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3" style="padding-top:5px">
				<a title="删除" onclick="$(this).parents(\'.tpl-location-container\').remove();return false;"><i class="fa fa-times-circle"></i></a>
			</div>
		</div>';
	} else {
		$html .= '</div>';
	}

	return $html;
}


function tpl_wappage_editor($editorparams = '', $editormodules = array()) {
	global $_GPC;
	$content = '';
	load()->func('file');
	$filetree = file_tree(IA_ROOT . '/web/themes/default/wapeditor');
	if (!empty($filetree)) {
		foreach ($filetree as $file) {
			if (strexists($file, 'widget-')) {
				$fileinfo = pathinfo($file);
				$_GPC['iseditor'] = false;
				$display = template('wapeditor/'.$fileinfo['filename'], TEMPLATE_FETCH);
				$_GPC['iseditor'] = true;
				$editor = template('wapeditor/'.$fileinfo['filename'], TEMPLATE_FETCH);
				$content .= "<script type=\"text/ng-template\" id=\"{$fileinfo['filename']}-display.html\">".str_replace(array("\r\n", "\n", "\t"), '', $display)."</script>";
				$content .= "<script type=\"text/ng-template\" id=\"{$fileinfo['filename']}-editor.html\">".str_replace(array("\r\n", "\n", "\t"), '', $editor)."</script>";
			}
		}
	}
	return $content;
}



function tpl_ueditor($id, $value = '', $options = array()) {
	$s = '';
	if (!defined('TPL_INIT_UEDITOR')) {
		$s .= '<script type="text/javascript" src="./resource/components/ueditor/ueditor.config.js"></script><script type="text/javascript" src="./resource/components/ueditor/ueditor.all.min.js"></script><script type="text/javascript" src="./resource/components/ueditor/lang/zh-cn/zh-cn.js"></script>';
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


function tpl_edit_sms($name, $value, $uniacid, $url, $num) {
	$s = '
				<div class="input-group">
					<input type="text" name="'.$name.'" id="balance" readonly value="'.$value.'" class="form-control" autocomplete="off">
					<span class="input-group-btn">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit_sms">编辑短信条数</button>
					</span>
				</div>
				<span class="help-block">请填写短信剩余条数,必须为整数。</span>

		<div class="modal fade" id="edit_sms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="">修改短信条数</h4>
					</div>
					<div class="modal-body" style="height: 100px;">
						<div class="form-group">
							<label class="col-xs-12 col-sm-5 col-md-6 col-lg-3 control-label">短信条数</label>
							<div class="col-sm-6 col-xs-12 col-md-7">
								<div class="input-group" style="width: 180px;">
									<div class="input-group-btn">
										<button type="button" class="btn btn-defaultt label-success" id="edit_add">+</button>
									</div>
									<!--<span class="input-group-addon label-danger"  id="edit_alert" style="width: 10px;">+ </span>-->
									<input type="text" class="form-control" id="edit_num" value="+">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default" id="edit_minus">-</button>
									</div>
								</div>

								<div class="help-block">点击加号或减号切换修改短信条数方式<br>最多可添加<span id="count_sms">'.$num.'</span>条短信</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="edit_sms_sub" class="btn btn-primary">保存</button>
					</div>
				</div>
			</div>
		</div>
		<script>
		var status = \'add\';
			$(\'#edit_add\').click(function() {
				status = \'add\';
				var sign = status == \'add\' ? \'+\' : \'-\';
				var edit_num = $(\'#edit_num\').val();
				if (edit_num == \'\') {
					$(\'#edit_num\').val(sign)
					return;
				}
				if (isNaN(edit_num.substr(1)) || edit_num.substr(1) == \'\') {
					edit_num = \'\';
				}
				$(\'#edit_num\').val(\'+\'+Math.abs(edit_num));
				if (edit_num == \'\') {
					$(\'#edit_num\').val(sign);
				}
				$(\'#edit_add\').attr(\'class\', \'btn btn-defaultt label-success\');
				$(\'#edit_minus\').attr(\'class\', \'btn btn-default\');
			});
			$(\'#edit_num\').keyup(function() {
				var sign = status == \'add\' ? \'+\' : \'-\';
				if ($(\'#edit_num\').val() == \'\') {
					return ;
				}
				if (isNaN($(\'#edit_num\').val()) && $(\'#edit_num\').val() != sign) {
					$(\'#edit_num\').val(\'\');
					return;
				}
				if ($(\'#edit_num\').val().indexOf(sign) < 0) {
				var val = parseInt(Math.abs($(\'#edit_num\').val()));
				if (val == 0) {
					$(\'#edit_num\').val(sign);
				} else {
					$(\'#edit_num\').val(sign + val);
				}
				}

			});
			$(\'#edit_minus\').click(function() {
				status = \'minus\';
				var sign = status == \'add\' ? \'+\' : \'-\';
				var edit_num = $(\'#edit_num\').val();
				if (edit_num == \'\') {
					$(\'#edit_num\').val(sign)
					return;
				}
				if (isNaN(edit_num.substr(1)) || edit_num.substr(1) == \'\') {
					edit_num = \'\';
				}
				$(\'#edit_num\').val(\'-\'+Math.abs(edit_num));
				if (edit_num == \'\') {
					$(\'#edit_num\').val(sign);
				}
				$(\'#edit_minus\').attr(\'class\', \'btn btn-defaultt label-danger\');
				$(\'#edit_add\').attr(\'class\', \'btn btn-default\');
			});
			$(\'#edit_sms_sub\').click(function () {
				var edit_num = $(\'#edit_num\').val() == \'\' ? 0 : Math.abs(parseInt($(\'#edit_num\').val()));
				var uniacid = '.$uniacid.';
				$.post(\''.$url.'\', {\'balance\' : edit_num, \'uniacid\' : uniacid, \'status\' : status}, function(data) {
					var data = $.parseJSON(data);

					$(\'#count_sms\').html(data.message.message.count);
					if (data.message.errno > 0) {
						$(\'#balance\').val(data.message.message.num);
						$(\'#edit_sms\').modal(\'toggle\');
					} else {
						util.message(\'您现有短信数量为0，请联系服务商购买短信\');
						$(\'#edit_sms\').modal(\'toggle\');
					}
					$(\'#edit_num\').val(\'\');
					$(\'#edit_add\').trigger(\'click\');
				});
			});
			</script>
	';
	return $s;
}


   function tpl_form_field_link2($name, $value = '', $options = array()) {
    global $_GPC;
    $s = '';
    if (!defined('TPL_INIT_LINK')) {
        $s = '
		<script type="text/javascript">
			function showLinkDialog(elm) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.linkBrowser(function(href){
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					});
				});
			}
						    
			function foodLinkDialog(elm,page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.foodBrowser(function(href,page){
					    if (page != "" && page != undefined) {
							foodLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					},page);
				});
			}
						    
			function storeLinkDialog(elm,page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().prev();
					//console.log(ipt);
						u.storeBrowser(function(href,page){
					    if (page != "" && page != undefined) {
							storeLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						 console.log(href);   
						ipt.val(href);
					},page);
				});
			}				    
			function enjoyLinkDialog(elm,page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.enjoyBrowser(function(href,page){
					    if (page != "" && page != undefined) {
							enjoyLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					},page);
				});
			}	
						    
		 function fashonLinkDialog(elm,page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.fashonBrowser(function(href,page){
					    if (page != "" && page != undefined) {
							fashonLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					},page);
				});
			}		
			function newsLinkDialog(elm, page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.newsBrowser(function(href, page){
						if (page != "" && page != undefined) {
							newsLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					}, page);
				});
			}
			function pageLinkDialog(elm, page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.pageBrowser(function(href, page){
						if (page != "" && page != undefined) {
							pageLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					}, page);
				});
			}
			function articleLinkDialog(elm, page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.articleBrowser(function(href, page){
						if (page != "" && page != undefined) {
							articleLinkDialog(elm, page);
							return false;
						}
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					}, page);
				});
			}
			function phoneLinkDialog(elm, page) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.phoneBrowser(function(href, page){
						if (page != "" && page != undefined) {
							phoneLinkDialog(elm, page);
							return false;
						}
						ipt.val(href);
					}, page);
				});
			}
			function mapLinkDialog(elm) {
				require(["util","jquery"], function(u, $){
					var ipt = $(elm).parent().parent().parent().prev();
					u.map(elm, function(val){
						var href = \'http://api.map.baidu.com/marker?location=\'+val.lat+\',\'+val.lng+\'&output=html&src=we7\';
						var multiid = "'. $_GPC['multiid'] .'";
						if (multiid) {
							href = /(&)?t=/.test(href) ? href : href + "&t=" + multiid;
						}
						ipt.val(href);
					});
				});
			}
		</script>';
        define('TPL_INIT_LINK', true);
    }
    $s .= '
	<div class="input-group">
		<input type="text" value="'.$value.'" name="'.$name.'" class="form-control" readonly autocomplete="off">
		<span class="input-group-btn">
			<button type="button" class="btn btn-default  type="button" onclick="storeLinkDialog(this);"aria-haspopup="true" aria-expanded="false">选择商户 <span class="caret"></span></button>
			<!--<ul class="dropdown-menu">
				<li><a href="javascript:" data-type="store" onclick="storeLinkDialog(this);">商户</a></li>
		        <li><a href="javascript:" data-type="food" onclick="foodLinkDialog(this);">美食</a></li>
				<li><a href="javascript:" data-type="fashon" onclick="fashonLinkDialog(this);">时尚</a></li>
				<li><a href="javascript:" data-type="enjoy" onclick="enjoyLinkDialog(this)">娱乐</a></li>
			</ul>-->
		</span>
	</div>
	';
    return $s;
}
