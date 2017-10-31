<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head> 
  <!-- 启用极速模式(webkit) --> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" /> 
  <!--  --> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="KeyWords" content="首页" /> 
  <meta name="description" content="首页" /> 
  <title>首页</title> 
  <link rel="shortcut icon" type="image/x-icon" href="/yhhq/Public/Home/img/upimages/favicon.ico" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="apple-touch-fullscreen" content="yes" /> 
  <meta name="full-screen" content="yes" /> 
  <!-- SEO友好提示 --> 
  <meta name="applicable-device" content="pc,mobile" /> 
  <!--[if lt IE 9]>
<script type="text/javascript" src="../js/comm/html5shiv.js" tppabs="http://demo.nicebox.cn/js/comm/html5shiv.js"></script>
<script type="text/javascript" src="../js/comm/respond.min.js" tppabs="http://demo.nicebox.cn/js/comm/respond.min.js"></script>
<![endif]--> 
  <script type="text/javascript" src="/yhhq/Public/Home/js/comm/jquery-1.11.1.min.js"></script> 
  <script type="text/javascript" src="/yhhq/Public/Home/js/comm/jquery.lazyload.min.js"></script> 
  <script type="text/javascript" src="/yhhq/Public/Home/js/comm/jquery.nicescroll.min.js" ></script> 
  <script type="text/javascript" src="/yhhq/Public/Home/js/comm/ubox.js"></script> 
  <script type="text/javascript" src="/yhhq/Public/Home/js/comm/wow.js"></script> 
  <script type="text/javascript" src="/yhhq/Public/Home/js/comm/alert.js" ></script> 
  <link rel="stylesheet" type="text/css" href="/yhhq/Public/Home/css/comm/font/css/font-awesome.min.css" /> 
  <link rel="stylesheet" type="text/css" href="/yhhq/Public/Home/css/comm/animate.min.css" /> 
  <link rel="stylesheet" type="text/css" href="/yhhq/Public/Home/css/comm/box.css" /> 
  <link rel="stylesheet" type="text/css" href="/yhhq/Public/Home/css/comm/alert.css"/> 
  <link rel="stylesheet" type="text/css" href="/yhhq/Public/Home/css/064189.css?ver=1.0" /> 
  <script>
//是否手机端判断
var ua = navigator.userAgent;
var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
isIphone =!ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
isAndroid = ua.match(/(Android)\s+([\d.]+)/),
isMobile = isIphone || isAndroid;
if(isMobile){
	$("head").append("<meta content='width=320,user-scalable=no' name='viewport'>");
}else{
	$("head").append("<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' name='viewport' />");
}

if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
	new WOW().init();
};
</script>  
 </head> 
 <body> 
  <div id="comm_layout_header" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="div_includeBlock_1493085289858" class="view includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="qqol_style_01_1493171865277" class="view style_01 qqol  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="qqol" class="view_contents"> 
        <script>
/*
 * ***************************************************************
 * 片段列表类
 */
function FragmentList(config) {
    this._default = {
        'prefix':'fragment-',
        'css':{}
    };
    config = $.extend(true, this._default, config);
    this.config = config;
    this.list = [];
    this.object = $('<div></div>');
    // 执行配置
    this.init(config);
}
/*
 * 初始化
 */
FragmentList.prototype.init = function(config) {
    config.css && this.object.css(config.css);
};
/*
 * 添加
 */
FragmentList.prototype.append = function (fragment) {
    this.list.push(fragment);
};
/*
 * 获取jquery对象
 */
FragmentList.prototype.get = function () {
    this.object.addClass(this.config.prefix + 'list').children().remove();
    for(var i = 0, len = this.list.length, html = ''; i < len; ++i) {
        html += this.list[i].html();
    }
    return this.object.html(html);
};
/*
 * 输出
 */
FragmentList.prototype.html = function () {
    return this.get().prop('outerHTML');
};

/*
 * ***************************************************************
 * 片段类
 */
Fragment.prototype.prefix = 'fragment-';
function Fragment(config) {
    (!config.init || Util.prototype.type(config.init) != 'function') && (config.init = function () {});
    !config.html && (config.html = '<div></div>');
    this._default = {
        'name':'item'
    };
    config = $.extend(true, this._default, config);
    // 创建jquery对象
    config.data && (config.html = Util.prototype.replace(config.html, Util.prototype.toArray(config.data)));
    this.object = $(config.html).addClass((config.name != 'item' ? this.prefix + 'item': '') + ' ' + this.prefix + config.name);
    config.init(this.object);
    delete config.html; // jquery对象创建后, config.html 不再使用
    this.config = config;
    // 执行配置
    this.init(config);
}
/*
 * 复制
 */
Fragment.prototype.clone = function () {
    return new Fragment($.extend(true, {}, this.config));
};
/*
 * 初始化
 */
Fragment.prototype.init = function(config) {
    config.css && this.object.css(config.css);
};
/*
 * 修改样式
 */
Fragment.prototype.css = function(css) {
    css && this.object.css(css);
    return this;
};
/*
 * 输出
 */
Fragment.prototype.html = function () {
    return this.object.prop('outerHTML');
};
/*
 * 使用指定数据更新自己
 */
Fragment.prototype.data = function (data) {
    this.object.html(Util.prototype.replace(this.html(), Util.prototype.toArray(data)));
    return this;
};

/*
 * ***************************************************************
 * 边栏类
 */
function Sidebar(config) {
    this._default = {
        // 默认配置, 常量, 不应该修改, 对象初始化时可覆盖
        'template':'sidebar',
        'expand':true,    // 默认展开还是隐藏
        'css':undefined,
        'main':{'width':'120px', 'position':'right'},
        'border':{'width':'1px', 'color':'#ccc', 'radius':'2px'},
        'button':{'width':'26px', 'color':'#333', 'font-size':'12px', 'background-color':'#ececec', 'radius':'5px'},
        'close':{'hide':false, 'height':'25px', 'font-size':'12px', 'padding':'0 .6em 0 .3em'},
        'show':{'start':undefined, 'end':undefined},   // 显示开始和结束时要执行的函数
        'end':{'start':undefined, 'end':undefined}   // 隐藏开始和结束时要执行的函数
    };
    config = $.extend(true, this._default, config);
    this.config = config;
    // dom 结构
    var temp = $('.'+config.template+':first');
    temp.hide();
    this.main = temp.clone().removeClass(config.template).show();
    this.main.data('instance', this);    // dom 结构的 data 中保存类对象
    config.css && this.main.addClass(config.css);
    // 主要属性
    this.width = config.main.width;
    this.position = config.main.position;
    this.main.addClass(this.position);
    this.position_rev = this.position == 'right' ? 'left' : 'right';
    this.wrapper = this.main.children('.wrapper');
    this._close = this.wrapper.children('.close');
    this.button = this.main.children('.button');
    // 子元素的 dom 结构的 data 中保存类对象
    this._close.data('parent', this);
    this.button.data('parent', this);
    // 执行配置
    this.init(config);
}
/*
 * 初始化
 */
Sidebar.prototype.init = function(config) {
    this.initMain();
    this.initWrapper(config);
    this.initButton(config);
    // 垂直居中后, 移动到body最后
    this.verticalCenter().appendTo('body');
    config.expand ? this.show(false) : this.hide(false);
    this.main.show();
    // 存储所有的对象到window中 (后期会使用)
    !window.online_service_list && (window.online_service_list = []);
    window.online_service_list.push(this);
    $(window).resize(this.onWindowResize);
};
/*
 * 初始化 - main
 */
Sidebar.prototype.initMain = function() {
    this.main.hide().css({
        'height':'auto',
        'position':'fixed',
        'z-index':'100000000',
        'top':'0px',
        'width':this.width
    });
    this.main.css(this.position, '0px');
    // 移入移出时
    this.main.hover(
        function () {
            $(this).data('instance').show();
        },
        function () {
            if(!$(this).hasClass('animate-showing')) {
                $(this).data('instance').hide();
            }
        }
    );
};
/*
 * 初始化 - wrapper
 */
Sidebar.prototype.initWrapper = function(config) {
    this.wrapper.css({
        'border': config.border.width +' solid ' + config.border.color,
        'border-radius':config.border.radius,
        '-moz-border-radius':config.border.radius
    });
    this._close.css({
        'display':config.close.hide ? 'none' : 'block',
        'position':'absolute',
        'top':'0px',
        'right':'0px',
        'height':config.close.height,
        'line-height':config.close.height,
        'font-size':config.close['font-size'],
        'padding':config.close.padding,
        'cursor':'pointer'
    }).click(function () {
        var instance = $(this).data('parent');
        Sidebar.prototype.hide.call(instance);
        if(typeof($("img").lazyload)=="function"){
            //异步加载图片
            setTimeout(function(){
                $("img").lazyload({effect: "fadeIn",threshold:0,failure_limit:20,skip_invisible:false});
            },500);
            
        }
    }).attr({'onselectstart':'return false', 'unselectable':'on'});   // [兼容]禁止选择文本
};
/*
 * 隐藏Sidebar
 * animate: 是否带动画
 */
Sidebar.prototype.hide = function (animate) {
    animate === undefined && (animate = true);
    var instance = this, width = '-'+this.width, end = this.position == 'right' ? {right :width} : {left :width},
        btn_width = '-'+instance.config.button.width, btn_end = instance.position == 'right' ? {left :btn_width} : {right :btn_width};
    instance.onHide('start');
    if(animate) {
        instance.main.animate(end, 'fast', function() {
            instance.button.show().animate(btn_end, 'fast');
            instance.onHide('end');
        });
    } else {
        instance.main.css(end);
        instance.button.show().css(btn_end);
        instance.onHide('end');
    }
};
/*
 * 隐藏Sidebar开始和结束时
 */
Sidebar.prototype.onHide = function (status) {
    var func;
    if(this.config.hide) {
        switch(status) {
            case 'start':
                Util.prototype.type(func = this.config.hide.start) == 'function' && func();  // 执行自定义函数
                break;
            case 'end':
                Util.prototype.type(func = this.config.hide.end) == 'function' && func();  // 执行自定义函数
                break;
        }
    }
};
/*
 * 初始化 - button
 */
Sidebar.prototype.initButton = function(config) {
    var width = config.button.width;
    this.button.hide().css({
        'position':'absolute',
        'top':'0%',
        'width':width,
        'line-height':'1.35em',
        'padding':'.5em 0',
        'font-size':config.close['font-size'],
        'color':config.button.color,
        'background-color':config.button['background-color'],
        'cursor':'pointer',
        'word-wrap':'break-word',
        'word-break':'break-all'
    });
    var radius = config.button.radius;
    if(this.position == 'right') {
        this.button.css({
            'border-top-left-radius':radius,
            'border-bottom-left-radius':radius
        });
    } else {
        this.button.css({
            'border-top-right-radius':radius,
            'border-bottom-right-radius':radius
        });
    }
    this.button.css(this.position_rev, '0px');
    // 点击时
    this.button.click(function () {
        var instance = $(this).data('parent');
        Sidebar.prototype.show.call(instance);
    }).attr({'onselectstart':'return false', 'unselectable':'on'});   // [兼容]禁止选择文本
};
/*
 * 显示Sidebar
 * animate: 是否带动画
 */
Sidebar.prototype.show = function (animate) {
    animate === undefined && (animate = true);
    var instance = this, end = instance.position == 'right' ? {right :0} : {left :0};
    instance.onShow('start');
    if(animate) {
        instance.onAnimate('showing');
        instance.main.animate(end, 'fast', function() {
            instance.onAnimate();
            instance.button.hide(); // Bug修复: 额外隐藏一次
            instance.onShow('end');
        });
    } else {
        instance.main.css(end);
        instance.onShow('end');
    }
    // 显示开始后, 不管是否有动画, 按钮应该马上隐藏
    instance.button.hide();
    instance.button.css(instance.position_rev,'0px');
};
/*
 * 显示Sidebar开始和结束时
 */
Sidebar.prototype.onShow = function (status) {
    var func;
    if(this.config.show) {
        switch (status) {
            case 'start':
                Util.prototype.type(func = this.config.show.start) == 'function' && func();  // 执行自定义函数
                break;
            case 'end':
                Util.prototype.type(func = this.config.show.end) == 'function' && func();  // 执行自定义函数
                break;
        }
    }
};
/*
 * 设置实时动画状态
 * status: 为空时表示动画结束
 */
Sidebar.prototype.onAnimate = function(status) {
    Util.prototype.removeClass(this.main, 'animate-');
    status && this.main.addClass('animate-'+status);
};
/*
 * 窗口大小改变时
 */
Sidebar.prototype.onWindowResize = function() {
    for(var i = 0, len = window.online_service_list.length; i < len; ++i) {
        window.online_service_list[i].verticalCenter();
    }
};
/*
 * 在窗口垂直居中
 */
Sidebar.prototype.verticalCenter = function() {
    var h1 = this.main.height(), h2 =$(window).height();
    if(h1 && h2) {
        this.main.css('top', ((h2 - h1) / 2) + 'px');
    }
    return this.main;
};
/*
 * 添加内容
 */
Sidebar.prototype.append = function(obj) {
    this.wrapper.append(obj);
    this.verticalCenter();
};

/*
 * ***************************************************************
 * 工具类
 */
function Util() {
}
/*
 * 返回对象类型
 */
Util.prototype.type = function(obj) {
    var type = obj === undefined ? 'undefined' : (obj === null ? 'null' : undefined);   // 兼容旧版js解析器
    return type ? type : Object.prototype.toString.call(obj).slice(8, -1).toLowerCase();
};
/*
 * 检测对象类型
 */
Util.prototype.is = function(obj, type) {
    var cls = this.type(obj);
    return obj !== undefined && obj !== null && cls.toLowerCase() === type.toLowerCase();
};
/*
 * 属性扩展( 增强版 )
 * 注意: 一般深度复制, 可直接使用 $.extend(true, target, source)
 */
Util.prototype.extend = function(target, source, is_deep, is_add) {
    is_deep === undefined && (is_deep = true);   // 如果值也是对象, 是否对值也调用extend
    is_add === undefined && (is_add = true);     // 如果目标对象中没有源对象的键, 是否允许新增键值
    for (var p in source) {
        if (source.hasOwnProperty(p) && (is_add || target.hasOwnProperty(p))) {
            // 执行extend
            if(is_deep && this.is(target[p], 'object') && this.is(source[p], 'object')) {
                this.extend(target[p], source[p]);
            } else {
                target[p] = source[p];
            }
        }
    }
    return target;
};
/*
 * 删除class( 删除指定名称的class和所有以指定名称开头的class )
 */
Util.prototype.removeClass = function(obj, rm) {
    obj.attr('class', function () {
        var regExp = new RegExp(rm + '\\S*', 'g');
        return Util.prototype.clear($(this).attr('class').replace(regExp, ''));
    });
    return obj;
};
/*
 * 删除前后空白
 */
Util.prototype.trim = function(s){
    return s.replace(/(^\s*)|(\s*$)/g,'');
};
/*
 * 合并中间多个空白为一个
 */
Util.prototype.clear = function(s){
    return s.replace(/(^\s*)|(\s*$)|(\s{2,})/g,'');
};
/*
 * 对象转数组
 */
Util.prototype.toArray = function(obj) {
    var array = [], p, item;
    for (p in obj) {
        if (obj.hasOwnProperty(p)) {
            item = [p];
            item.push(this.is(obj[p], 'object') ? this.toArray(obj[p]) : obj[p]);
            array.push(item);
        }
    }
    return array;
};
/*
 * 使用指定的键值数组替换一个字符串
 * 备注: 字符串中键以{{}}标记
 * 备注: data: 二维数组, 一维数组的每一项是一个长度为二的内层数组, 内层数组的第一项为键, 第二项为值
 */
Util.prototype.replace = function(s, data) {
    var i, len, reg_str = [], reg;
    for(i = 0, len = data.length; i < len; ++i) {
        reg_str.push('({{' + data[i][0] + '}})');
    }
    // 正则替换
    reg = new RegExp(reg_str.join('|'), 'g');
    return s.replace(reg, replace);
    // 执行替换的函数
    function replace(){
        // arguments 中包含的是: 字符串中当前位置匹配到的字符串, 第0个()匹配到的字符串, ..., 第n-1个()匹配到的字符串, 当前匹配的位置, 整个字符串
        // 从索引为1开始, 第一个不为undefined的项的索引值减一即为匹配到的键的索引
        for(var i = 1, len = arguments.length; i < len; ++i) {
            if(arguments[i] !== undefined) {
                return data[--i][1];
            }
        }
    }
};
</script> 
  <div class="online-service online-template"> 
   <div class="wrapper"> 
    <div class="close">
     &times;
    </div> 
   </div> 
   <div class="button"> 
    <div>
     <img style="margin-bottom:1px; width:12px" alt="&lt;" src="/yhhq/Public/Home/img/qqol/style_01/member-1-white.png"/>在线客服
     <img style="margin-top:3px; width:12px" alt="&lt;" src="/yhhq/Public/Home/img/qqol/style_01/links-6-white-rev.png"/>
    </div> 
   </div> 
  </div> 
  <script type="application/javascript">
	function remove_qqol_qqol_style_01_1493171865277(){
		$('body > .online-service.qqol-qqol_style_01_1493171865277').remove();
	}
    // 创建在线客服
    $(function () {
        // 清理旧的
        remove_qqol_qqol_style_01_1493171865277();

        // 创建边栏
        var sidebar = new Sidebar({
            'template': 'online-template',
            'css': 'qqol-qqol_style_01_1493171865277',
            'expand': false,
            'main': {'width':'170px', 'position': 'right'},
            'border': {'color': '#fc3158', 'width': '2px', 'radius': '10px'},
            'button': {'color': '#fff', 'background-color': '#fc3158', 'radius': '5px'},
            'close': {'hide': false}
        });

        // 片段模板
        var qqOnlineStr = '<div class="clearfix">' +
                '<a class="qq-btn" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={{qq}}&site=qq&menu=yes">' +
                '<img border="0" src="http://wpa.qq.com/pa?p=2:{{qq}}:{{style}}" alt="{{title}}" title="{{title}}"  ' +
                'onerror="javascript:this.src=\'../../wpa.qq.com/pa-p=2-123456789-{{style}}\'/*tpa=http://wpa.qq.com/pa?p=2:123456789:{{style}}*/;">' +
                '{{text}}</a></div>';	// 图标不能显示时, 更换QQ号码让其显示

        // 创建片段
        Fragment.prototype.prefix = 'ol-';

        // 创建片段列表
        var fragmentList = new FragmentList({
            'prefix':'ol-',
            'css':{'padding':'0 12px'}
        });
            fragmentList.append(new Fragment({
            'name':'qq-online',
            'html':qqOnlineStr,
            'data':{'qq':'123456', 'style':52, 'title':'QQ在线', 'text':'客服QQ'},
            'css':{'margin':'.5em 0'}
        }));
            fragmentList.append(new Fragment({
            'name': 'text',
            'html': '<div>服务热线:0756-3268XXX</div>',
            'css':{'margin':'.5em 0'}
        }));
	        fragmentList.append(new Fragment({
            'name': 'text',
            'html': '<div>Email：couple@qq.com</div>',
            'css':{'margin':'.5em 0'}
        }));
        	        // 添加到边栏
        var list = fragmentList.get();
        !list.children().length && list.html('<p>内容列表为空！</p>');
        sidebar.append(list);
        if(typeof($("img").lazyload)=="function"){
            $("img").lazyload({effect: "fadeIn",threshold:0,failure_limit:20,skip_invisible:false});
        }
    });
</script> 
        <script type="application/javascript">
    // 对输入内容中的尖括号、引号等进行转义
    function html_encode(str) {
        var s = "";
        if (str.length == 0) return "";
        s = str.replace(/&/g, "&amp;");
        s = s.replace(/</g, "&lt;");
        s = s.replace(/>/g, "&gt;");
        s = s.replace(/ /g, "&nbsp;");
        s = s.replace(/\'/g, "&#39;");
        s = s.replace(/\"/g, "&quot;");
        s = s.replace(/\n/g, "<br>");
        return s;
    }
    function html_decode(str) {
        var s = "";
        if (str.length == 0) return "";
        s = str.replace(/&amp;/g, "&");
        s = s.replace(/&lt;/g, "<");
        s = s.replace(/&gt;/g, ">");
        s = s.replace(/&nbsp;/g, " ");
        s = s.replace(/&#39;/g, "\'");
        s = s.replace(/&quot;/g, "\"");
        s = s.replace(/<br>/g, "\n");
        return s;
    }
</script> 
       </div> 
      </div> 
      <div id="image_logo_1493705330418" class="view logo image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="logoStyle modSet"> 
         <a href="{:U('Index/index')}"  target="_self"><img class="imgSet" src="/yhhq/Public/Home/img/logo.png-1505983911.png"  title="" alt="" style="width:auto; height:100%; margin-left:0px" /></a> 
        </div> 
       </div> 
      </div> 
      <div id="dh_style_01_1493174594932" class="view style_01 dh  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="dh" class="view_contents"> 
        <script></script> 
        <div id="menu" class="menu menuStyle_1"> 
         <div class="menuLayout"> 
          <ul class="miniMenu columnSet showmobile"> 
           <li class="leftBox"> 
            <div class="nav"></div> 
            <div class="sidebar icoMenuSet" onclick="setDhListen('style_01',this)">
             =
            </div> 
            <div class="menuScroll"> 
             <ul class="menuUlCopy">
             <?php if(is_array($menu)): foreach($menu as $k=>$v): ?><li class="rflex <?php echo ($v["class"]); ?>" pageid="<?php echo ($v["pid"]); ?>" showmobile=""> <a class="mainMenuSet" href="<?php echo U($v['href']);?>"><?php echo ($v["title"]); ?></a> </li> 
<!--               <li id="hot" class="rflex" pageid="64189" showmobile=""><a class="mainMenuSet" href="index.html">首页</a> </li>  -->
<!--               <li class="rflex" pageid="64188" showmobile=""><a class="mainMenuSet" href="news.html">新闻资讯</a> </li>  -->
<!--               <li class="rflex" pageid="64187" showmobile=""><a class="mainMenuSet" href="solution.html">项目案例</a> </li>  -->
<!--               <li class="rflex" pageid="64193" showmobile=""><a class="mainMenuSet" href="aboutUs.html">关于我们</a> </li>  -->
<!--               <li class="rflex" pageid="64190" showmobile=""><a class="mainMenuSet" href="ourService.html">我们的服务</a> </li>  -->
<!--               <li class="rflex" pageid="64194" showmobile=""><a class="mainMenuSet" href="contactUs.html">联系我们</a> </li>  --><?php endforeach; endif; ?>
             </ul> 
            </div> </li> 
          </ul> 
          <div class="menuUl_box columnSet showpc"> 
           <ul class="menuUl dflex"> 
            <!-- 164189 -->
            <?php if(is_array($menu)): foreach($menu as $k=>$v): ?><li class="rflex <?php echo ($v["class"]); ?>" pageid="<?php echo ($v["pid"]); ?>" showpc=""> <a class="mainMenuSet" href="<?php echo U($v['href']);?>"><?php echo ($v["title"]); ?></a> </li> 
<!--             <li id="hot" class="rflex" pageid="64189" showpc=""> <a class="mainMenuSet" href="index.html">首页</a> </li>  -->
<!--             <li class="rflex" pageid="64188" showpc=""> <a class="mainMenuSet" href="news.html">新闻资讯</a> </li>  -->
<!--             <li class="rflex" pageid="64187" showpc=""> <a class="mainMenuSet" href="solution.html">项目案例</a> </li>  -->
<!--             <li class="rflex" pageid="64193" showpc=""> <a class="mainMenuSet" href="aboutUs.html">关于我们</a> </li>  -->
<!--             <li class="rflex" pageid="64190" showpc=""> <a class="mainMenuSet" href="ourService.html">我们的服务</a> </li>  -->
<!--             <li class="rflex" pageid="64194" showpc=""> <a class="mainMenuSet" href="contactUs.html">联系我们</a> </li>  --><?php endforeach; endif; ?>
           </ul> 
          </div> 
         </div> 
        </div> 
        <!-- 菜单区域 End--> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  
  <link rel="stylesheet" type="text/css" href="/yhhq/Public/Home/css/064189.css?ver=1.0" />
  <style>
html,body {
    height:100%;
    width:100%;
    padding:0;
    margin:0;
	overflow:auto
}
.slider {
    overflow:hidden;
    cursor:move;
    position:absolute;
    left:0px;
    top:0px;
    width:100%;
}
.slider div {
    height:100%;
    width:100%
}
.slider img {
    width:100%;
}
.av {
    background-color:red !important;
}
.slidetip {
    position:fixed;
    z-index:99;
    bottom:20px;
    left:0;
	width:100%;
	text-align:center;
}

.slidetip div{
	width:12px; 
	height:12px; 
	background-color: rgb(167, 167, 167); 
	border-radius:12px; 
	position:absolute; 
	top:0px;
	left:40%
}
#slider1_container {
    position:relative;
    top:0px;
    left:0px;
    right:0;
    width:100vw;
    height:56.25vw;
}

.slidetip .i {position:absolute;cursor:pointer;}
.slidetip .i .b {fill:#fc3158;fill-opacity:0;}
.slidetip .i:hover .b {fill-opacity:0;}
.slidetip .iav .b {fill-opacity: 1;width:100%;height:100%;border-radius:50% 50%}
.slidetip .i.idn {opacity:0;}
</style> 
  <div id="layout_1493085228712" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 


<div class="slider margin1">
     <div id="slider1_container"  jssor-slider="true">    
      <div data-u="slides" class="slides">
               <div><a href="#"><img u="image" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_banner1.jpg" /></a></div>
               <div><a href="#"><img u="image" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_banner2.jpg" /></a></div>
               <div><a href="#"><img u="image" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_banner3.jpg" /></a></div>       
          </div>          
<!--           <div data-u="navigator" class="slidetip" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75"> -->
<!--             <div data-u="prototype" class="i" style="width:16px;height:16px;"> -->
<!--                 <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;"> -->
<!--                     <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path> -->
<!--                 </svg> -->
<!--             </div> -->
<!--         </div> -->
     </div>
  </div>

<script src="/yhhq/Public/Home/js/jssor.slider-22.0.15.min.js"></script>
<script>
   $(document).ready(function ($) {
   var _SlideshowTransitions = [
       {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
	   {$Duration:1000,y:4,$Zoom:11,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
	   {$Duration:1200,y:1,$Rows:2,$Zoom:1,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Assembly:2049,$Opacity:2},
	   {$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Assembly:260,$Round:{$Top:1.5}},
	   {$Duration:600,x:-1,y:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Assembly:1028,$Opacity:2},
	   {$Duration:1000,x:-0.5,y:0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
	   {$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Assembly:2050,$Round:{$Top:1.3}},
	   {$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Assembly:260,$Outside:true,$Round:{$Top:0.8}},
	   {$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Assembly:260,$Outside:true,$Round:{$Top:0.8}},
	   {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Assembly:260,$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
	   {$Duration:1200,x:2,y:1,$Cols:2,$Zoom:11,$Rotate:1,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Assembly:2049,$Opacity:2,$Round:{$Rotate:0.7}},
	   {$Duration:1000,$Rows:6,$Clip:4,$Move:true},
	   {$Duration:800,$Delay:150,$Cols:10,$Clip:1,$Move:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Easing:$JssorEasing$.$EaseInBounce,$Assembly:264},
	   {$Duration:600,x:-1,y:1,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInQuart,$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}
	   
                         ];
   var options = { 
       $AutoPlay: true,
	   $SlideshowOptions: {
                   $Class: $JssorSlideshowRunner$,
                   $Transitions: _SlideshowTransitions,
                   $TransitionsOrder: 1,
                   $ShowLink: true
        },
		$ArrowNavigatorOptions: {
                   $Class: $JssorArrowNavigator$
        },
        $BulletNavigatorOptions: {
                   $Class: $JssorBulletNavigator$
        }
    };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
    });
    </script>   





 
    <div id="div_includeBlock_1492658132965" class="view includeBlock div  none wow flipInX includeView" data-wow-duration="1.2s" data-wow-delay="0.3s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="text_style_02_1483925413345" class="view style_02 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         		想要一个让您终身难忘的梦幻婚礼？ 
       </div> 
      </div> 
      <div id="text_style_06_1483925660550" class="view style_06 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         		CP创意婚庆策划帮您达成梦想！ 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493179029752" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_02_1493179058959" class="view style_02 text  none wow fadeInDown lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       		我们的服务 
     </div> 
    </div> 
    <div id="image_style_01_1493709155037" class="view style_01 image  none wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png"  title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493714652653" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_01_1493714684460" class="view style_01 text  none wow zoomIn lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       		2015新式纪实风，首创美学新纪元！“色彩主题、婚礼纪实、美式清新”细致贴心的服务，
      <div>
       		全方位专业协CP为您准备一系列的结婚礼服首饰，用创意心灵为您设计梦幻婚礼。凭借资深行业经验为您组建一支属于您的婚礼梦之队。
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493088777731" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="div_includeBlock_1492672334480" class="view includeBlock div  none wow bounceInLeft includeView" data-wow-duration="1.2s" data-wow-delay="0.8s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="image_style_01_1493710669508" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_service_planning.png"  title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
      <div id="text_style_01_1492672600589" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         婚宴策划 
       </div> 
      </div> 
      <div id="div_blank_1493710753324" class="view blank div  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="div" class="view_contents"> 
        <!-- 
	<a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
 --> 
       </div> 
      </div> 
      <div id="text_style_01_1492672703274" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         细致贴心的服务，全方位专业协调。国际视野设计师团队，用创意心灵为您设计梦幻婚礼。凭借资深行业经验为您组建一支属于您的婚礼梦之队。
        <br /> 
       </div> 
      </div> 
      <div id="text_style_06_1493710979548" class="view style_06 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents"> 
        <a href="aboutUs.html-pageid=64193.htm" tppabs="http://demo.nicebox.cn/7543019a292ad748/aboutUs.html?pageid=64193" target="" style="color:inherit" class="link-type-1-">查看更多</a> 
       </div> 
      </div> 
     </div> 
    </div> 
    <div id="div_includeBlock_1493713593362" class="view includeBlock div  none wow bounceInLeft includeView" data-wow-duration="1.2s" data-wow-delay="0.7s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="text_style_01_1493713593793" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         婚礼套系 
       </div> 
      </div> 
      <div id="div_blank_1493713593808" class="view blank div  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="div" class="view_contents"> 
        <!-- 
	<a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
 --> 
       </div> 
      </div> 
      <div id="text_style_06_1493713593824" class="view style_06 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents"> 
        <a href="solution.html-pageid=64187.htm" tppabs="http://demo.nicebox.cn/7543019a292ad748/solution.html?pageid=64187" target="" style="color:inherit" class="link-type-1-">查看更多</a> 
       </div> 
      </div> 
      <div id="image_style_01_1493713593776" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_service_clothes.png"  title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
      <div id="text_style_01_1493713593814" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         CP为您准备一系列的结婚礼服首饰，并整合我们的宴会设计能力、精雕细琢道具制作、互联网优化供应链仓储管理，实现高性价比梦想婚礼！
        <br /> 
       </div> 
      </div> 
     </div> 
    </div> 
    <div id="div_includeBlock_1493713642067" class="view includeBlock div  none wow bounceInLeft includeView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="text_style_01_1493713642252" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         客服咨询 
       </div> 
      </div> 
      <div id="div_blank_1493713642257" class="view blank div  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="div" class="view_contents"> 
        <!-- 
	<a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
 --> 
       </div> 
      </div> 
      <div id="text_style_01_1493713642265" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         CP为您提供24小时的在线咨询客服，随时随地提问婚礼相关问题以及预约婚礼，我们会有专人为您解答，我们承诺以高质量的的服务赢得您的青睐。 
       </div> 
      </div> 
      <div id="text_style_06_1493713642271" class="view style_06 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents"> 
        <a href="contactUs.html-pageid=64194.htm" tppabs="http://demo.nicebox.cn/7543019a292ad748/contactUs.html?pageid=64194" target="" style="color:inherit" class="link-type-1-">查看更多</a> 
       </div> 
      </div> 
      <div id="image_style_01_1493713642247" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_service_chat.png"  title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493714899271" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
   </div> 
  </div> 
  <div id="layout_1493715692515" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_02_1493715692522" class="view style_02 text  none wow fadeInDown lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       关于我们 
     </div> 
    </div> 
    <div id="image_style_01_1493715692547" class="view style_01 image  none wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line_white.png"  title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
    <div id="text_style_01_1492670438163" class="view style_01 text  none wow zoomIn lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       CP婚庆策划公司隶属于美世代化妆品有限公司，成立于1999年中国北京，突破婚礼一对一服务，开创多对一服务模式，有婚礼业界奢侈品之称。2012年至今，CP婚礼已经成为全国最具时尚创意风格的婚礼品牌。作为人文艺术婚礼的倡导品牌，每年CP婚礼流行趋势发布，均成为整年婚礼行业的风向标，其作品与理念受各大高端专业杂志、电视台及一线网络媒体特约报道，荣获中国时尚行业颁发的“婚尚婚礼策划奖”。
      <div>
       CP婚礼整合了各个方面的资源，出色的策划、专业的道具和非凡的执行力是CP婚礼始终坚持的工作原则，因此受到很多商业界及演艺界名人青睐。“金马影后”郝蕾双胞胎宝宝百日宴、奥运冠军体操皇后刘轩“爱的味道”主题答谢宴、著名演员梅廷“婚后楼梯”主题婚礼、人气女星戚微和韩国艺人李承玄的美国拉斯维加斯跨国婚礼、《红太郎的幸福生活》“红太郎”饰演者王磊与童星李萌的爱情三部曲婚礼、韩国女神蔡卓琳和”京男郎”高梓其“麒麟相伴”主题婚礼、世界冠军王浩的巴洛克风格答谢宴、央视名嘴沙同及青年演员刘园的穆斯林风格婚礼，都带有强烈的新人个人风格和独特爱情体现。
       <div>
        <div>
         <div> 
         </div> 
        </div>
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493716281218" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_02_1493716281222" class="view style_02 text  none wow fadeInLeft lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       项目案例 
     </div> 
    </div> 
    <div id="image_style_01_1493716281241" class="view style_01 image  none wow fadeInRight" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png"  title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493716298455" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_01_1493716298457" class="view style_01 text  none wow bounceInDown lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       每个人都幻想着，幻想着将自己在婚礼那天变成一个光芒四射的公主，但是有人却充满迷茫，迷茫着自己该如何去操办自己的婚礼？
      <div>
       有限的资金该怎样面对巨大的婚礼开销？没关系，CP会会帮你解决所有问题！
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493716311658" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="image_style_04_1493190308035" class="view style_04 image  none wow bounceInUp lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle_4"> 
       <input type="hidden" id="current_page_1493190308035" value="4" /> 
       <input type="hidden" id="show_per_page_1493190308035" value="4" /> 
       <ul id="content_1493190308035"> 
        <li class="imgItems"> <a href="javascript:;"><img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_1.jpg" alt="" /></a> 
         <div class="ratio" style="margin-top:100%"></div> </li> 
        <li class="imgItems"> <a href="javascript:;"><img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_2.jpg" alt="" /></a> 
         <div class="ratio" style="margin-top:100%"></div> </li> 
        <li class="imgItems"> <a href="javascript:;"><img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_3.jpg" alt="" /></a> 
         <div class="ratio" style="margin-top:100%"></div> </li> 
        <li class="imgItems"> <a href="javascript:;"><img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_4.jpg" alt="" /></a> 
         <div class="ratio" style="margin-top:100%"></div> </li> 
        <li></li> 
        <li></li> 
        <li></li> 
        <li></li> 
        <li></li> 
        <li></li> 
        <li></li> 
        <li></li> 
       </ul> 
      </div> 

     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493716733700" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_06_1493717805760" class="view style_06 text  none wow rotateIn lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents"> 
      <a href="solution.html-pageid=64187.htm"  target="" style="color:inherit" class="link-type-1-">查看更多</a> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493717814068" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
   </div> 
  </div> 
  <div id="layout_1493718214061" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_02_1493718214065" class="view style_02 text  none wow fadeInRight lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       30年婚庆策划经验造就卓越品质 
     </div> 
    </div> 
    <div id="image_style_01_1493718214090" class="view style_01 image  none wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line_white.png"  title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
    <div id="div_includeBlock_1493719262350" class="view includeBlock div  none wow slideInUp includeView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="image_style_01_1493719262818" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_team.png"  title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
      <div id="text_style_01_1493719262841" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         拥有580+名CP员工 
       </div> 
      </div> 
      <div id="text_style_01_1493719262853" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         合作企业的活动会场布置会承包给CP策划布置，同时CP也会为其提供最优惠的价格。 
       </div> 
      </div> 
     </div> 
    </div> 
    <div id="div_includeBlock_1493724052007" class="view includeBlock div  none wow slideInDown includeView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="image_style_01_1493724052317" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_project.png"  title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
      <div id="text_style_01_1493724052332" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         完成290+个成功案例 
       </div> 
      </div> 
      <div id="text_style_01_1493724052350" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         这是一场四合院中的家庭式婚礼，玫红为主色调，配以暖黄，两大色系碰撞后竟然完美结合。 
       </div> 
      </div> 
     </div> 
    </div> 
    <div id="div_includeBlock_1493724063277" class="view includeBlock div  none wow slideInUp includeView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="image_style_01_1493724063707" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_cp.png"  title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
      <div id="text_style_01_1493724063725" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         见证230+对伴侣 
       </div> 
      </div> 
      <div id="text_style_01_1493724063733" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         她爱他的温文尔雅，他爱她的暖若骄阳，他们的爱情更是水到渠成。 
       </div> 
      </div> 
     </div> 
    </div> 
    <div id="div_includeBlock_1493724075503" class="view includeBlock div  none wow slideInDown includeView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="image_style_01_1493724077061" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_cooperation.png"  title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
      <div id="text_style_01_1493724077087" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         合作60+个公司企业 
       </div> 
      </div> 
      <div id="text_style_01_1493724077095" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         如果把人的一生比喻成一本书，那么他们便是：闯入彼此的书中做起了男女主角。 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493725252028" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_02_1493725252030" class="view style_02 text  none wow rotateInDownRight lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       礼服饰品 
     </div> 
    </div> 
    <div id="image_style_01_1493725252049" class="view style_01 image  none wow rotateInUpLeft" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png"  title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493725261516" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_01_1493725261518" class="view style_01 text  none wow lightSpeedIn lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       主舞台是两半相互依偎的心，在象征家庭的城堡下紧紧相拥。用串联的方式，
      <div>
       将脑中所有记忆中片段绘制成了五彩斑斓的情节趣事。整场婚礼给人以清新淳朴的感觉，签到台上趣味十足的玩具摆设打破了寂静。
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493190308003" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="tab_style_03_1493725591982" class="view style_03 tab  none wow bounceInRight includeView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="tab" class="view_contents"> 
      <script></script>
      <div id="div_tab_style_03_1493725591982" class="niceTab tabStyle_3"> 
       <div class="tab_nav tab_nav_top"> 
        <div class="tab_scroll tab_scroll_top"> 
         <ul class="tab_ul tab_ul_top"> 
          <li class="tab_li tabItemSet tab_li_top tabCurItem"> 
           <div class="tab_pos_r"> 
            <div class="tab_img tabImgSet">
             <img src="/yhhq/Public/Home/img/comm/tabImg.png"  ondragstart="return false;" />
            </div> 
            <div class="tab_txt" onselectstart="return false">
             <p>礼服</p>
            </div> 
           </div> </li>
          <li class="tab_li tabItemSet tab_li_top"> 
           <div class="tab_pos_r"> 
            <div class="tab_img tabImgSet">
             <img src="/yhhq/Public/Home/img/comm/tabImg.png"  ondragstart="return false;" />
            </div> 
            <div class="tab_txt" onselectstart="return false">
             <p>首饰</p>
            </div> 
           </div> </li> 
         </ul> 
        </div> 
       </div> 
       <div class="tab_box tab_box_top" style=""> 
        <div class="tab_content"> 
         <div class="tab_main niceTabContent tabconSet"> 
          <div class="tab_div niceTabShow"> 
           <div id="productList_style_07_1493866215909" class="view style_07 productList  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
            <div names="productList" class="view_contents"> 
             <div class="prod_default7"> 
              <ul id="prod_Ulist"> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130241.html"  target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240061s.png" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130241.html" target="_self">2017春夏新款韩版...</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130241.html"  target="_self">2017春夏新款韩版...</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130241.html" target="_self">2017春夏新款韩版...</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     如果年轻的女士你被邀请参加一场晚会，那你会穿什么呢？没错，答案就是晚礼服。
                    </div> 
                    <div class="p_detail detailSet pad">
                     如果年轻的女士你被邀请参加一场晚会，那你会穿什么呢？没错，答案就是晚礼...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     如果年轻的女士你被邀请参加一场晚会，那你会穿什么呢？没错，答...
                    </div> 
                    <div class="p_line"> 
                    </div>  
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130239.html"  target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240062s.png" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130239.html"  target="_self">男装宴会帅气皮靴</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130239.html"  target="_self">男装宴会帅气皮靴</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130239.html"  target="_self">男装宴会帅气皮靴</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     定制晚礼服是一件很重要的事，庄重而正式的它以作为隆重场合上主要的服饰角色，对穿着者起着至高无...
                    </div> 
                    <div class="p_detail detailSet pad">
                     定制晚礼服是一件很重要的事，庄重而正式的它以作为隆重场合上主要的服饰角...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     定制晚礼服是一件很重要的事，庄重而正式的它以作为隆重场合上主...
                    </div> 
                    <div class="p_line"> 
                    </div>  
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130238.html"  target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240063s.png" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130238.html"  target="_self">型男婚宴领带</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130238.html"  target="_self">型男婚宴领带</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130238.html" target="_self">型男婚宴领带</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     然而它是又根据不同的场所而划分。面对着多种多样的晚礼服，你是否已经束手无策了。
                    </div> 
                    <div class="p_detail detailSet pad">
                     然而它是又根据不同的场所而划分。面对着多种多样的晚礼服，你是否已经束手...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     然而它是又根据不同的场所而划分。面对着多种多样的晚礼服，你是...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
              </ul> 
             </div>
		<script type="text/javascript">
		$(document).ready(function(){  
	          /*$('.dflex li a').each(function(){
	          	$(this).closest('li').removeClass("hot");
	          	console.log($($(this))[0].href);
	          	console.log(String(window.location.href));
	              if($($(this))[0].href==String(window.location.href))
	              $(this).closest('li').addClass('hot');  
	          });*/
	    	  $('.home').addClass('hot');  
	      }); 
		function is_mobile(){
			return window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767);
		}
		</script> 
            </div> 
           </div> 
          </div> 
          <div class="tab_div"> 
           <div id="productList_style_07_1493867666330" class="view style_07 productList  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
            <div names="productList" class="view_contents"> 
             <div class="prod_default7"> 
              <ul id="prod_Ulist"> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130252.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130252.html" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240069s.jpg" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130252.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130252.html" target="_self">珍珠白银项链</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130252.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130252.html" target="_self">珍珠白银项链</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130252.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130252.html" target="_self">珍珠白银项链</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     婚纱可是新娘婚礼当天身份的象征哦，所以新娘一定要重视起来，可别因为麻烦就随便了事哦，新人在选...
                    </div> 
                    <div class="p_detail detailSet pad">
                     婚纱可是新娘婚礼当天身份的象征哦，所以新娘一定要重视起来，可别因为麻烦...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     婚纱可是新娘婚礼当天身份的象征哦，所以新娘一定要重视起来，可...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <!-- 						<div class="p_line">
							
						</div> --> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130250.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130250.html" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240070s.jpg" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130250.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130250.html" target="_self">深蓝宝石金戒指</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130250.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130250.html" target="_self">深蓝宝石金戒指</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130250.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130250.html" target="_self">深蓝宝石金戒指</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服要与婚礼的风格协调一致。如果你的...
                    </div> 
                    <div class="p_detail detailSet pad">
                     挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服要与婚礼的...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <!-- 						<div class="p_line">
							
						</div> --> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130249.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130249.html" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240066s.png" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130249.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130249.html" target="_self">丝滑洛世奇钻石项链</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130249.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130249.html" target="_self">丝滑洛世奇钻石项链</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130249.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130249.html" target="_self">丝滑洛世奇钻石项链</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     如果需要定制礼服，最好能够提前一年开始挑选，最短也不要少于6个月，这样时间会比较充裕。
                    </div> 
                    <div class="p_detail detailSet pad">
                     如果需要定制礼服，最好能够提前一年开始挑选，最短也不要少于6个月，这样...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     如果需要定制礼服，最好能够提前一年开始挑选，最短也不要少于6...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <!-- 						<div class="p_line">
							
						</div> --> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
              </ul> 
             </div> 
            </div> 
           </div> 
          </div> 
         </div> 
         <div class="tab_left_arrow arrowLeftSet">
          <a href="#"></a>
         </div> 
         <div class="tab_right_arrow arrowRightSet">
          <a href="#"></a>
         </div> 
        </div> 
       </div> 
      </div>  
     </div> 
    </div> 
    <div id="tab_style_03_1493867762002" class="view style_03 tab  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="tab" class="view_contents"> 
      <script></script>
      <div id="div_tab_style_03_1493867762002" class="niceTab tabStyle_3"> 
       <div class="tab_nav tab_nav_top"> 
        <div class="tab_scroll tab_scroll_top"> 
         <ul class="tab_ul tab_ul_top"> 
          <li class="tab_li tabItemSet tab_li_top tabCurItem"> 
           <div class="tab_pos_r"> 
            <div class="tab_img tabImgSet">
             <img src="/yhhq/Public/Home/img/comm/tabImg.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/comm/tabImg.png" ondragstart="return false;" />
            </div> 
            <div class="tab_txt" onselectstart="return false">
             <p>礼服</p>
            </div> 
           </div> </li>
          <li class="tab_li tabItemSet tab_li_top"> 
           <div class="tab_pos_r"> 
            <div class="tab_img tabImgSet">
             <img src="/yhhq/Public/Home/img/comm/tabImg.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/comm/tabImg.png" ondragstart="return false;" />
            </div> 
            <div class="tab_txt" onselectstart="return false">
             <p>首饰</p>
            </div> 
           </div> </li> 
         </ul> 
        </div> 
       </div> 
       <div class="tab_box tab_box_top" style=""> 
        <div class="tab_content"> 
         <div class="tab_main niceTabContent tabconSet"> 
          <div class="tab_div niceTabShow"> 
           <div id="productList_style_07_1493867762715" class="view style_07 productList  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
            <div names="productList" class="view_contents"> 
             <div class="prod_default7"> 
              <ul id="prod_Ulist"> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130241.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130241.html" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240061s.png" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130241.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130241.html" target="_self">2017春夏新款韩版...</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130241.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130241.html" target="_self">2017春夏新款韩版...</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130241.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130241.html" target="_self">2017春夏新款韩版...</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     如果年轻的女士你被邀请参加一场晚会，那你会穿什么呢？没错，答案就是晚礼服。
                    </div> 
                    <div class="p_detail detailSet pad">
                     如果年轻的女士你被邀请参加一场晚会，那你会穿什么呢？没错，答案就是晚礼...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     如果年轻的女士你被邀请参加一场晚会，那你会穿什么呢...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <!-- 						<div class="p_line">
							
						</div> --> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130239.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130239.html" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240062s.png" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130239.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130239.html" target="_self">男装宴会帅气皮靴</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130239.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130239.html" target="_self">男装宴会帅气皮靴</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130239.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130239.html" target="_self">男装宴会帅气皮靴</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     定制晚礼服是一件很重要的事，庄重而正式的它以作为隆重场合上主要的服饰角色，对穿着者起着至高无...
                    </div> 
                    <div class="p_detail detailSet pad">
                     定制晚礼服是一件很重要的事，庄重而正式的它以作为隆重场合上主要的服饰角...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     定制晚礼服是一件很重要的事，庄重而正式的它以作为隆...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <!-- 						<div class="p_line">
							
						</div> --> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130238.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130238.html" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240063s.png" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130238.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130238.html" target="_self">型男婚宴领带</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130238.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130238.html" target="_self">型男婚宴领带</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130238.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130238.html" target="_self">型男婚宴领带</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     然而它是又根据不同的场所而划分。面对着多种多样的晚礼服，你是否已经束手无策了。
                    </div> 
                    <div class="p_detail detailSet pad">
                     然而它是又根据不同的场所而划分。面对着多种多样的晚礼服，你是否已经束手...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     然而它是又根据不同的场所而划分。面对着多种多样的晚...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <!-- 						<div class="p_line">
							
						</div> --> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130237.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130237.html" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240064s.png" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130237.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130237.html" target="_self">艳红性感高跟鞋</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130237.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130237.html" target="_self">艳红性感高跟鞋</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130237.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130237.html" target="_self">艳红性感高跟鞋</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服要与婚礼的风格协调一致。
                    </div> 
                    <div class="p_detail detailSet pad">
                     挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服要与婚礼的...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     挑选礼服前，你必须确定婚礼的季节、准确时间、地点和...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <!-- 						<div class="p_line">
							
						</div> --> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
              </ul> 
             </div>
            </div> 
           </div> 
          </div> 
          <div class="tab_div"> 
           <div id="productList_style_07_1493867762735" class="view style_07 productList  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
            <div names="productList" class="view_contents"> 
             <div class="prod_default7"> 
              <ul id="prod_Ulist"> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130252.html" tppabs="" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240069s.jpg" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130252.html" tppabs="" target="_self">珍珠白银项链</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130252.html" tppabs="" target="_self">珍珠白银项链</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130252.html" tppabs="" target="_self">珍珠白银项链</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     婚纱可是新娘婚礼当天身份的象征哦，所以新娘一定要重视起来，可别因为麻烦就随便了事哦，新人在选...
                    </div> 
                    <div class="p_detail detailSet pad">
                     婚纱可是新娘婚礼当天身份的象征哦，所以新娘一定要重视起来，可别因为麻烦...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     婚纱可是新娘婚礼当天身份的象征哦，所以新娘一定要重视起来，可...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130250.html" tppabs="" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240070s.jpg" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130250.html" tppabs="" target="_self">深蓝宝石金戒指</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130250.html" tppabs="" target="_self">深蓝宝石金戒指</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130250.html" tppabs="" target="_self">深蓝宝石金戒指</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服要与婚礼的风格协调一致。如果你的...
                    </div> 
                    <div class="p_detail detailSet pad">
                     挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服要与婚礼的...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <!-- 						<div class="p_line">
							
						</div> --> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130249.html" tppabs="" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240066s.png" tppabs="" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130249.html" tppabs="" target="_self">丝滑洛世奇钻石项链</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130249.html" tppabs="" target="_self">丝滑洛世奇钻石项链</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130249.html" tppabs="" target="_self">丝滑洛世奇钻石项链</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     如果需要定制礼服，最好能够提前一年开始挑选，最短也不要少于6个月，这样时间会比较充裕。
                    </div> 
                    <div class="p_detail detailSet pad">
                     如果需要定制礼服，最好能够提前一年开始挑选，最短也不要少于6个月，这样...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     如果需要定制礼服，最好能够提前一年开始挑选，最短也不要少于6...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li class="prod_Item modSet"> 
                <div class="relative"> 
                 <!-- 产品图片 --> 
                 <div class="prodImg_box imgSet"> 
                  <div class="prod_img">
                   <a href="productDetail_130248.html" tppabs="" target="_self"><img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240067s.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/prodimg/201705/prod_240067s.png" /></a>
                  </div> 
                  <div class="dummy" style="margin-top:100%"></div> 
                 </div> 
                 <!-- 内容 --> 
                 <div class="prod_info twoBgSet"> 
                  <div class="prod_content"> 
                   <div class="prod_center"> 
                    <div class="p_name titleSet pc">
                     <a href="productDetail_130248.html" tppabs="" target="_self">晶莹粉红宝石耳环</a>
                    </div> 
                    <div class="p_name titleSet pad">
                     <a href="productDetail_130248.html" tppabs="" target="_self">晶莹粉红宝石耳环</a>
                    </div> 
                    <div class="p_name titleSet mobile">
                     <a href="productDetail_130248.html" tppabs="" target="_self">晶莹粉红宝石耳环</a>
                    </div> 
                    <div class="p_detail detailSet pc">
                     穿上婚纱礼服向着神圣的殿堂迈进，可以说是每位女性都必经历的路段，在这条充满爱情的道路上其实也...
                    </div> 
                    <div class="p_detail detailSet pad">
                     穿上婚纱礼服向着神圣的殿堂迈进，可以说是每位女性都必经历的路段，在这条...
                    </div> 
                    <div class="p_detail detailSet mobile">
                     穿上婚纱礼服向着神圣的殿堂迈进，可以说是每位女性都必经历的路...
                    </div> 
                    <div class="p_line"> 
                    </div> 
                    <div class="p_line"> 
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> </li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
               <li></li> 
              </ul> 
             </div> 
            </div> 
           </div> 
          </div> 
         </div> 
         <div class="tab_left_arrow arrowLeftSet">
          <a href="#"></a>
         </div> 
         <div class="tab_right_arrow arrowRightSet">
          <a href="#"></a>
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
    <div id="image_style_01_1493868280284" class="view style_01 image  none wow bounceInLeft" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/homepage_product.jpg" tppabs="" title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493868573981" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
   </div> 
  </div> 
  <div id="layout_1493726529234" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_02_1493726529238" class="view style_02 text  none wow fadeInUp lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       听我说手牵手 跟我一起走 创造幸福的生活 
     </div> 
    </div> 
    <div id="image_style_01_1493726915944" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/flower_left.png" tppabs="" title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
    <div id="image_style_01_1493726855442" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/flower_right.png" tppabs="" title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
    <div id="text_style_02_1493727001532" class="view style_02 text  none wow fadeInUp lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       昨天已来不及，明天就会可惜，
      <div>
       今天嫁给我好吗？ 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493726305698" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_02_1493726305703" class="view style_02 text  none wow rotateInUpLeft lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       新闻资讯 
     </div> 
    </div> 
    <div id="image_style_01_1493726305732" class="view style_01 image  none wow rotateInDownRight" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" tppabs="" title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493726318859" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_01_1493726318862" class="view style_01 text  none wow fadeInLeftBig lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       每个人都幻想着，幻想着将自己在婚礼那天变成一个光芒四射的公主，但是有人却充满迷茫，迷茫着自己该如何去操办自己的婚礼？
      <div>
       有限的资金该怎样面对巨大的婚礼开销？没关系，CP会会帮你解决所有问题！
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493726340769" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="div_includeBlock_1493800895211" class="view includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="newsList_style_04_1493726340772" class="view style_04 newsList  none wow fadeIn lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="newsList" class="view_contents"> 
        <!--新闻列表区域--> 
        <div class="boxNewsListStyle_4"> 
         <ul id="boxNewsList"> 
          <li class="sumary_list modSet"> 
           <div class="newPic imgSet"> 
            <a href="news_details_51378.html" tppabs="" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_1.jpg" tppabs="" /></a> 
            <div class="zTm" style="margin-top:67%"></div> 
           </div> 
           <div class="newCont"> 
            <div class="newTitle"> 
             <div class="newName"> 
              <a class="titleSet" href="news_details_51378.html" tppabs="" target="_self">2017「姐妹助力团」打造计划</a> 
             </div> 
             <div class="newDetail detailSet pc">
              4月25日，宝发物业管理集团与摩拜单车在深圳老街举行摩拜单车推荐停车点揭牌仪式。宝发物业作为中国物业行业领先的社区服务与资产管理整合运营商。
             </div> 
             <div class="newDetail detailSet pad">
              4月25日，宝发物业管理集团与摩拜单车在深圳老街举行摩拜单车...
             </div> 
             <div class="newDetail detailSet mobile">
              4月25日，宝发物业管理集团与摩拜单车在深圳老街举行摩拜单车推荐停车点...
             </div> 
            </div> 
            <div class="newB"> 
             <span class="newSort sortSet">公司资讯</span> 
             <span class="newsTime timesSet"><span class="nDate">2017-09-21</span> <span class="nTime">04:42:09</span></span> 
            </div> 
           </div> </li> 
          <li class="sumary_list modSet"> 
           <div class="newPic imgSet"> 
            <a href="news_details_51377.html" tppabs="" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_7.jpg" tppabs="" /></a> 
            <div class="zTm" style="margin-top:67%"></div> 
           </div> 
           <div class="newCont"> 
            <div class="newTitle"> 
             <div class="newName"> 
              <a class="titleSet" href="news_details_51377.html" tppabs="" target="_self">2016CP社年终复古大Party</a> 
             </div> 
             <div class="newDetail detailSet pc">
              据悉，宝发物业与摩拜单车的合作，双方优势互补。未来宝发物业将携手摩拜单车，将合作范围扩展至宝发物业在全国各大城市的社区，摩拜单车将定点投放单...
             </div> 
             <div class="newDetail detailSet pad">
              据悉，宝发物业与摩拜单车的合作，双方优势互补。未来宝发物业将...
             </div> 
             <div class="newDetail detailSet mobile">
              据悉，宝发物业与摩拜单车的合作，双方优势互补。未来宝发物业将携手摩拜单...
             </div> 
            </div> 
            <div class="newB"> 
             <span class="newSort sortSet">行业动态</span> 
             <span class="newsTime timesSet"><span class="nDate">2017-09-21</span> <span class="nTime">04:42:09</span></span> 
            </div> 
           </div> </li> 
          <li class="sumary_list modSet"> 
           <div class="newPic imgSet"> 
            <a href="news_details_51376.html" tppabs="" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_9.jpg" tppabs="" /></a> 
            <div class="zTm" style="margin-top:67%"></div> 
           </div> 
           <div class="newCont"> 
            <div class="newTitle"> 
             <div class="newName"> 
              <a class="titleSet" href="news_details_51376.html" tppabs="" target="_self">婚礼风向标【沈佳宜柯景腾婚礼】</a> 
             </div> 
             <div class="newDetail detailSet pc">
              摩拜单车管理层介绍，过去一年间，以摩拜单车为代表的智能共享单车快速成长，使城市自行车出行占比从5.5%翻番至11.6%，成为继公交地铁、出租...
             </div> 
             <div class="newDetail detailSet pad">
              摩拜单车管理层介绍，过去一年间，以摩拜单车为代表的智能共享单...
             </div> 
             <div class="newDetail detailSet mobile">
              摩拜单车管理层介绍，过去一年间，以摩拜单车为代表的智能共享单车快速成长...
             </div> 
            </div> 
            <div class="newB"> 
             <span class="newSort sortSet">热点新闻</span> 
             <span class="newsTime timesSet"><span class="nDate">2017-09-21</span> <span class="nTime">04:42:09</span></span> 
            </div> 
           </div> </li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
         </ul> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
    <div id="div_includeBlock_1493802336493" class="view includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="newsList_style_04_1493802336793" class="view style_04 newsList  none wow bounceInUp lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="newsList" class="view_contents"> 
        <!--新闻列表区域--> 
        <div class="boxNewsListStyle_4"> 
         <ul id="boxNewsList"> 
          <li class="sumary_list modSet"> 
           <div class="newPic imgSet"> 
            <a href="news_details_51378.html" tppabs="" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_1.jpg" tppabs="" /></a> 
            <div class="zTm" style="margin-top:67%"></div> 
           </div> 
           <div class="newCont"> 
            <div class="newTitle"> 
             <div class="newName"> 
              <a class="titleSet" href="news_details_51378.html" tppabs="" target="_self">2017「姐妹助力团」打造计划</a> 
             </div> 
             <div class="newDetail detailSet pc">
              4月25日，宝发物业管理集团与摩拜单车在深圳老街举行摩拜单车推荐停车点揭牌仪式。宝发物业作为中国物业行业领先的社区服务与资产管理整合运营商。
             </div> 
             <div class="newDetail detailSet pad">
              4月25日，宝发物业管理集团与摩拜单车在深圳老街举行摩拜单车...
             </div> 
             <div class="newDetail detailSet mobile">
              4月25日，宝发物业管理集团与摩拜单车在深圳老街举行摩拜单车...
             </div> 
            </div> 
            <div class="newB"> 
             <span class="newSort sortSet">公司资讯</span> 
             <span class="newsTime timesSet"><span class="nDate">2017-09-21</span> <span class="nTime">04:42:09</span></span> 
            </div> 
           </div> </li> 
          <li class="sumary_list modSet"> 
           <div class="newPic imgSet"> 
            <a href="news_details_51377.html" tppabs="" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_7.jpg" tppabs="" /></a> 
            <div class="zTm" style="margin-top:67%"></div> 
           </div> 
           <div class="newCont"> 
            <div class="newTitle"> 
             <div class="newName"> 
              <a class="titleSet" href="news_details_51377.html" tppabs="" target="_self">2016CP社年终复古大Party</a> 
             </div> 
             <div class="newDetail detailSet pc">
              据悉，宝发物业与摩拜单车的合作，双方优势互补。未来宝发物业将携手摩拜单车，将合作范围扩展至宝发物业在全国各大城市的社区，摩拜单车将定点投放单...
             </div> 
             <div class="newDetail detailSet pad">
              据悉，宝发物业与摩拜单车的合作，双方优势互补。未来宝发物业将...
             </div> 
             <div class="newDetail detailSet mobile">
              据悉，宝发物业与摩拜单车的合作，双方优势互补。未来宝发物业将...
             </div> 
            </div> 
            <div class="newB"> 
             <span class="newSort sortSet">行业动态</span> 
             <span class="newsTime timesSet"><span class="nDate">2017-09-21</span> <span class="nTime">04:42:09</span></span> 
            </div> 
           </div> </li> 
          <li class="sumary_list modSet"> 
           <div class="newPic imgSet"> 
            <a href="news_details_51376.html" tppabs="" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_9.jpg" tppabs="" /></a> 
            <div class="zTm" style="margin-top:67%"></div> 
           </div> 
           <div class="newCont"> 
            <div class="newTitle"> 
             <div class="newName"> 
              <a class="titleSet" href="news_details_51376.html" tppabs="" target="_self">婚礼风向标【沈佳宜柯景腾婚礼】</a> 
             </div> 
             <div class="newDetail detailSet pc">
              摩拜单车管理层介绍，过去一年间，以摩拜单车为代表的智能共享单车快速成长，使城市自行车出行占比从5.5%翻番至11.6%，成为继公交地铁、出租...
             </div> 
             <div class="newDetail detailSet pad">
              摩拜单车管理层介绍，过去一年间，以摩拜单车为代表的智能共享单...
             </div> 
             <div class="newDetail detailSet mobile">
              摩拜单车管理层介绍，过去一年间，以摩拜单车为代表的智能共享单...
             </div> 
            </div> 
            <div class="newB"> 
             <span class="newSort sortSet">热点新闻</span> 
             <span class="newsTime timesSet"><span class="nDate">2017-09-21</span> <span class="nTime">04:42:09</span></span> 
            </div> 
           </div> </li> 
          <li class="sumary_list modSet"> 
           <div class="newPic imgSet"> 
            <a href="news_details_51375.html" tppabs="" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_4.jpg" tppabs="" /></a> 
            <div class="zTm" style="margin-top:67%"></div> 
           </div> 
           <div class="newCont"> 
            <div class="newTitle"> 
             <div class="newName"> 
              <a class="titleSet" href="news_details_51375.html" tppabs="" target="_self">吴晓锐handelababy1018世纪婚礼</a> 
             </div> 
             <div class="newDetail detailSet pc">
              宝发物业1993年成立于深圳，经过20余年的快速发展，服务已遍及全国60余个大中城市，服务面积近1.7亿平米，服务客户累积达180余万人，服...
             </div> 
             <div class="newDetail detailSet pad">
              宝发物业1993年成立于深圳，经过20余年的快速发展，服务已...
             </div> 
             <div class="newDetail detailSet mobile">
              宝发物业1993年成立于深圳，经过20余年的快速发展，服务已...
             </div> 
            </div> 
            <div class="newB"> 
             <span class="newSort sortSet">公司资讯</span> 
             <span class="newsTime timesSet"><span class="nDate">2017-09-21</span> <span class="nTime">04:42:09</span></span> 
            </div> 
           </div> </li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
          <li></li> 
         </ul> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 

     
     
  <div id="layout_1493801536035" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
   </div> 
  </div> 
  <div id="comm_layout_footer" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="div_includeBlock_1493727507169" class="view includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="image_style_01_1493776665141" class="view style_01 image  none wow fadeInDown" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/phone.png" title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
      <div id="text_style_02_1493776882411" class="view style_02 text  none wow fadeInDown lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         0756-3268XXX 
       </div> 
      </div> 
      <div id="image_style_01_1493776504833" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/footer_logo.png"  title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
      <div id="image_style_01_1493776779709" class="view style_01 image  none wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="image" class="view_contents"> 
        <div class="imgStyle CompatibleImg"> 
         <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/email.png" title="" alt="描述" id="imageModeShow" /> </a> 
        </div> 
        <!-- 新加的js  --> 
       </div> 
      </div> 
      <div id="text_style_02_1493776936704" class="view style_02 text  none wow fadeInUp lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         couple@qq.com 
       </div> 
      </div> 
      <div id="text_style_02_1493777368799" class="view style_02 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         Copyright &copy; 2017.Couple&nbsp;All rights reserved. 
       </div> 
      </div> 
     </div> 
    </div> 
    <div id="div_blank_1493777271645" class="view blank div  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
     </div> 
    </div> 
   </div> 
  </div>  
 </body>
</html>