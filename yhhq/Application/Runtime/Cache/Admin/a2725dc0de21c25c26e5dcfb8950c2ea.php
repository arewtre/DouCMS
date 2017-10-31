<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo C('APP_NAME');?>管理后台</title>
    <link rel="stylesheet" href="/yhhq/Public/common/layui/css/layui.css">
    <link rel="stylesheet" href="/yhhq/Public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/yhhq/Public/kindeditor/themes/default/default.css" type="text/css">
    <link rel="stylesheet" href="/yhhq/Public/kindeditor/themes/default/upload.css?{TIMESTAMP}" type="text/css">
    <script type="text/javascript" src="/yhhq/Public/common/layui1.09/layui.js"></script>
    <script src="/yhhq/Public/common/js/jquery-1.12.4.min.js"></script>
    <script src="/yhhq/Public/js/address.js"></script>
    <script src="/yhhq/Public/jsplug/jparticle.jquery.js"></script>
    <!--<script src="/yhhq/Public/js/login.js"></script> -->
    <script type="text/javascript" src="/yhhq/Public/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/yhhq/Public/dataTable/dataTable.css">
    
</head>
<body>
<div style="margin: 15px;">
    
    <fieldset class="layui-elem-field">
        <legend>系统管理 - 迷你工具</legend>
        <div class="layui-field-box">
        <link href="/yhhq/Public/tools/css/bootstrap.min.css" rel="stylesheet">
        <link href="/yhhq/Public/tools/css/flat-ui.min.css" rel="stylesheet">
        <link href="/yhhq/Public/tools/css/common.css" rel="stylesheet">
        <link rel="shortcut icon" href="/yhhq/Public/tools/img/favicon.ico">
            <form action="">
                <input type="hidden" name="url" id="url"/>
                <div class="form-group">

                    <label class="radio radio-inline">
                        <input type="radio" name="type" value="qrcode" data-select="auto|qrencode|qrdecode" data-toggle="radio" checked="checked" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                        二维码
                    </label>

                    <label class="radio radio-inline">
                        <input type="radio" name="type" value="timestamp" data-select="auto" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                        时间戳
                    </label>

                    <label class="radio radio-inline">
                        <input type="radio" name="type" value="translate" data-select="auto|auto-zh|zh-en|en-zh" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                        翻译
                    </label>

                    <label class="radio radio-inline">
                        <input type="radio" name="type" value="format" data-select="auto|json|javascript|html|xml|css|sql" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                        格式化
                    </label>

                    <label class="radio radio-inline">
                        <input type="radio" name="type" value="url" data-select="auto|urlencode|urldecode|uniencode|unidecode" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                        URL编码
                    </label>

                    <label class="radio radio-inline">
                        <input type="radio" name="type" value="base64" data-select="auto|base64encode|base64decode" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
                        Base64编码
                    </label>
                    <textarea name="input" id="inputtext" class="form-control" cols="30" rows="5" placeholder="输入"></textarea>
                    <div class="row" style="margin:20px -15px;">
                        <div class="col-xs-3">
                            <a href="javascript:;" id="exchange" class="btn btn-sm btn-block btn-primary col-sm-5">切换</a>
                        </div>
                        <div class="col-xs-3">
                            <select name="mode" id="mode" class="form-control select select-sm select-primary col-sm-4" data-toggle="select">
                                <option value="auto">auto</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <a href="javascript:;" id="truncate" class="btn btn-sm btn-block btn-default col-sm-5">清空</a>
                        </div>
                        <div class="col-xs-3">
                            <a href="javascript:;" id="copy" class="btn btn-sm btn-block btn-default col-sm-5">复制结果</a>
                        </div>
                    </div>
                    <textarea name="input" id="outputtext" class="form-control" cols="30" rows="5" placeholder="输出"></textarea>
                    <div id="qrcode"></div>
                </div>
                <textarea id="sandbox" maxlength="100"></textarea>
            </form>
        </div>
        <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
        <script src="/yhhq/Public/tools/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/yhhq/Public/tools/js/flat-ui.min.js"></script>
        <script src="/yhhq/Public/tools/js/jquery.endecode.js"></script>
        <script src="/yhhq/Public/tools/js/jquery.qrcode.js"></script>
        <script src="/yhhq/Public/tools/js/common.js"></script>
        <script src="/yhhq/Public/tools/js/jsbeautify.js"></script>
        <script src="/yhhq/Public/tools/js/cssbeautify.js"></script>
        <script src="/yhhq/Public/tools/js/popup.js"></script>
</fieldset>

</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

</body>
</html>