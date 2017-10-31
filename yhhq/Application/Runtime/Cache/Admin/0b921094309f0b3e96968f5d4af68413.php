<?php if (!defined('THINK_PATH')) exit();?> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>elFinder 2.0</title>
		<link rel="stylesheet" href="/yhhq/Public/common/layui/css/layui.css">
		<link rel="stylesheet" href="/yhhq/Public/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="http://apps.bdimg.com/libs/jqueryui/1.8.18/themes/base/jquery-ui.css">
		<script type="text/javascript" src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="/yhhq/Public/elfinder2.0/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/yhhq/Public/elfinder2.0/css/theme.css">
		<script type="text/javascript" src="/yhhq/Public/elfinder2.0/js/elfinder.min.js"></script>
		<script type="text/javascript" src="/yhhq/Public/elfinder2.0/js/i18n/elfinder.zh_CN.js"></script>
		<script type="text/javascript" src="/yhhq/Public/common/layui/layui.js"></script>
		<style>
 		#elfinder{
			width:100% !important;
 			height:90% !important;
 		}
 		</style>
		<script type="text/javascript" charset="utf-8">
			$().ready(function() {
				var elf = $('#elfinder').elfinder({
					url : "<?php echo U('Filemanage/connect');?>",  // connector URL (REQUIRED)
				    lang: 'zh_CN',             // language (OPTIONAL)
				}).elfinder('instance');
			});
		</script>

	<fieldset class="layui-elem-field" style="padding:10px">
        <legend></legend> 
		<div id="elfinder"></div>
	</fieldset>
	

		<!--  <script data-main="/yhhq/Public/elFinder2.1.28/main.default.js" src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.2/require.min.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="/yhhq/Public/jqueryui/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/yhhq/Public/elFinder2.1.28/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/yhhq/Public/elFinder2.1.28/css/theme.css">
		<script src="/yhhq/Public/common/js/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="/yhhq/Public/jqueryui/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/yhhq/Public/elFinder2.1.28/js/elfinder.min.js"></script>
		<script type="text/javascript" src="/yhhq/Public/elFinder2.1.28/js/extras/editors.default.min.js"></script>
		<script type="text/javascript" src="/yhhq/Public/elFinder2.1.28/js/i18n/elfinder.zh_CN.js"></script>
		<script type="text/javascript" charset="utf-8">
			$().ready(function() {
				var elf = $('#elfinder').elfinder({
					url : "<?php echo U('Filemanage/connect');?>",  // connector URL (REQUIRED)
				    lang: 'zh_CN',             // language (OPTIONAL)
				}).elfinder('instance');
			});
		</script>
		<div id="elfinder"></div>-->