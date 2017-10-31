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
  
  <script type="text/javascript" src="/yhhq/Public/Home/js/064188.js"></script>
  <link rel="stylesheet" type="text/css" href="/yhhq/Public/Home/css/064188.css?ver=1.0" /> 
   <div id="layout_1493877921834" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="image_style_01_1493877921838" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/news_banner.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/news_banner.jpg" title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
    <div id="div_includeBlock_1493877921856" class="view includeBlock div  none includeView" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="div" class="view_contents"> 
      <div id="text_style_02_1493877922137" class="view style_02 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="text" class="view_contents">
         新闻资讯 
       </div> 
      </div> 
      <div id="homelink_style_01_1493877922152" class="view style_01 homelink  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
       <div names="homelink" class="view_contents"> 
        <ol class="breadcrumb location_style01"> 
         <li> <a class="textSet" href="../index.htm" tppabs="http://demo.nicebox.cn/" onclick=""> 首页</a> </li> 
         <li class="active textSet">新闻资讯 </li> 
        </ol>
        <script>
        $(document).ready(function(){  
      	  $('.news').addClass('hot');  
        }); 
        
        $(function(){
				var viewid="homelink_style_01_1493877922152";
				var sys_url="viewid=homelink_style_01_1493877922152&name=homelink&style=style_01&langid=0&pageid=64188&viewCtrl=default&isfb=1";
				var moreParams='';
				if(typeof(history.pushState) != 'undefined'){
					var hstate=JSON.stringify(history.state);
					if(hstate!='null'&& hstate!=null){
						eval('var hjson = ' + hstate);
						moreParams=hjson.moreParamshomelink_style_01_1493877922152;
					}
				}
				RequestURL(viewid,sys_url,moreParams);
			})
		</script> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493798264986" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_02_1493798264989" class="view style_02 text  none lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       热点动态 
     </div> 
    </div> 
    <div id="image_style_01_1493798265003" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493207561021" class="layout " data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="newsList_style_09_1493207592164" class="view style_09 newsList  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="newsList" class="view_contents"> 
      <!--新闻列表区域--> 
      <div class="boxNewsListStyle_9"> 
       <ul id="boxNewsList"> 
        <li class="sumary_list modSet"> 
         <div class="newPic imgSet"> 
          <img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_9.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/news_9.jpg" /> 
          <div class="zTm" style="margin-top:67%"></div> 
         </div> 
         <div class="newCont"> 
          <div class="newTitle "> 
           <div class="newName"> 
            <a class="titleSet" href="news_details_51376.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51376.html" target="_self">婚礼风向标【沈佳宜柯景腾婚礼】</a> 
           </div> 
           <div class="newB"> 
           </div> 
          </div> 
          <div class="newDetail detailSet pc">
           摩拜单车管理层介绍，过去一年间，以摩拜单车为代表的智能共享单车快速成长，使城市自行车出行占比从5.5%翻番至11.6%，成为继公交地铁、出租车之后的第三大城市出行方式。
          </div> 
          <div class="newDetail detailSet pad">
           摩拜单车管理层介绍，过去一年间，以摩拜单车为代表的智能共享单车快速成长，使城市自行车出行占比从5.5...
          </div> 
          <div class="newDetail detailSet mobile">
           摩拜单车管理层介绍，过去一年间，以摩拜单车为代表的智能共享单车快速成长，使城市自行车出行占...
          </div> 
         </div> 
         <div class="clear"></div> </li> 
       </ul> 
      </div> 
      <!--新闻列表区域 结束---> 
     </div> 
    </div> 
    <div id="newsList_style_04_1493208361714" class="view style_04 newsList  none lockHeightView" data-wow-duration="1.5s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="newsList" class="view_contents"> 
      <!--新闻列表区域--> 
      <div class="boxNewsListStyle_4"> 
       <ul id="boxNewsList"> 
        <li class="sumary_list modSet"> 
         <div class="newPic imgSet"> 
          <a href="news_details_51367.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51367.html" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_12.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/news_12.jpg" /></a> 
          <div class="zTm" style="margin-top:100%"></div> 
         </div> 
         <div class="newCont"> 
          <div class="newTitle"> 
          </div> 
          <div class="newB"> 
          </div> 
         </div> </li> 
        <li class="sumary_list modSet"> 
         <div class="newPic imgSet"> 
          <a href="news_details_51372.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51372.html" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/newsimg/201705/news_11.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/newsimg/201705/news_11.jpg" /></a> 
          <div class="zTm" style="margin-top:100%"></div> 
         </div> 
         <div class="newCont"> 
          <div class="newTitle"> 
          </div> 
          <div class="newB"> 
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
  <div id="layout_1493802993561" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="text_style_02_1493802993568" class="view style_02 text  none lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.5s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="text" class="view_contents">
       新闻资讯 
     </div> 
    </div> 
    <div id="image_style_01_1493802993583" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="image" class="view_contents"> 
      <div class="imgStyle CompatibleImg"> 
       <a href="javascript:;" target=""> <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" title="" alt="描述" id="imageModeShow" /> </a> 
      </div> 
      <!-- 新加的js  --> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493803650140" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="newsKind_style_02_1493803690414" class="view style_02 newsKind  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="newsKind" class="view_contents"> 
      <script></script>
      <div class="newscateStyle_2"> 
       <ul class="oneBgSet"> 
        <li class="oneSet"><a href="news.html-gid=14391.htm" tppabs="http://demo.nicebox.cn/7543019a292ad748/news.html?gid=14391" target="">行业动态</a></li> 
        <li class="oneSet"><a href="news.html-gid=14389.htm" tppabs="http://demo.nicebox.cn/7543019a292ad748/news.html?gid=14389" target="">热点新闻</a></li> 
       </ul> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493207783765" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
    <div id="newsList_style_04_1493802648746" class="view style_04 newsList  none lockHeightView" data-wow-duration="1.2s" data-wow-delay="0.6s" data-wow-offset="0" data-wow-iteration="1"> 
     <div names="newsList" class="view_contents"> 
      <!--新闻列表区域--> 
      <div class="boxNewsListStyle_4"> 
       <ul id="boxNewsList"> 
        <li class="sumary_list modSet"> 
         <div class="newPic imgSet"> 
          <a href="news_details_51378.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51378.html" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_1.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/news_1.jpg" /></a> 
          <div class="zTm" style="margin-top:67%"></div> 
         </div> 
         <div class="newCont"> 
          <div class="newTitle"> 
           <div class="newName"> 
            <a class="titleSet" href="news_details_51378.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51378.html" target="_self">2017「姐妹助力团」打造计划</a> 
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
          <a href="news_details_51377.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51377.html" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_7.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/news_7.jpg" /></a> 
          <div class="zTm" style="margin-top:67%"></div> 
         </div> 
         <div class="newCont"> 
          <div class="newTitle"> 
           <div class="newName"> 
            <a class="titleSet" href="news_details_51377.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51377.html" target="_self">2016CP社年终复古大Party</a> 
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
          <a href="news_details_51376.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51376.html" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_9.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/news_9.jpg" /></a> 
          <div class="zTm" style="margin-top:67%"></div> 
         </div> 
         <div class="newCont"> 
          <div class="newTitle"> 
           <div class="newName"> 
            <a class="titleSet" href="news_details_51376.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51376.html" target="_self">婚礼风向标【沈佳宜柯景腾婚礼】</a> 
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
          <a href="news_details_51375.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51375.html" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_4.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/news_4.jpg" /></a> 
          <div class="zTm" style="margin-top:67%"></div> 
         </div> 
         <div class="newCont"> 
          <div class="newTitle"> 
           <div class="newName"> 
            <a class="titleSet" href="news_details_51375.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51375.html" target="_self">吴晓锐handelababy1018世纪婚礼</a> 
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
        <li class="sumary_list modSet"> 
         <div class="newPic imgSet"> 
          <a href="news_details_51374.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51374.html" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_5.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/news_5.jpg" /></a> 
          <div class="zTm" style="margin-top:67%"></div> 
         </div> 
         <div class="newCont"> 
          <div class="newTitle"> 
           <div class="newName"> 
            <a class="titleSet" href="news_details_51374.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51374.html" target="_self">“佳人组团”疯狂来袭</a> 
           </div> 
           <div class="newDetail detailSet pc">
            近年来，深圳政府为吸引和扶持留学人员来深创业，人才政策层出不穷，越来越多的留学生将深圳作为回国发展的首选。2016年，深圳迎来最大规模海归潮...
           </div> 
           <div class="newDetail detailSet pad">
            近年来，深圳政府为吸引和扶持留学人员来深创业，人才政策层出不...
           </div> 
           <div class="newDetail detailSet mobile">
            近年来，深圳政府为吸引和扶持留学人员来深创业，人才政策层出不...
           </div> 
          </div> 
          <div class="newB"> 
           <span class="newSort sortSet">行业动态</span> 
           <span class="newsTime timesSet"><span class="nDate">2017-09-21</span> <span class="nTime">04:42:09</span></span> 
          </div> 
         </div> </li> 
        <li class="sumary_list modSet"> 
         <div class="newPic imgSet"> 
          <a href="news_details_51373.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51373.html" target="_self"><img class="News_img" src="/yhhq/Public/Home/img/upimages/pkgimg/news_6.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/news_6.jpg" /></a> 
          <div class="zTm" style="margin-top:67%"></div> 
         </div> 
         <div class="newCont"> 
          <div class="newTitle"> 
           <div class="newName"> 
            <a class="titleSet" href="news_details_51373.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_details_51373.html" target="_self">全新二期婚礼故事限量升级</a> 
           </div> 
           <div class="newDetail detailSet pc">
            城市、公园、商场及景区外语指示牌闹笑话的现象，不只是北京石景山八大处公园独有，在各地很普遍，因拼凑与中文直译，这些标牌被网友戏称为“中式英文...
           </div> 
           <div class="newDetail detailSet pad">
            城市、公园、商场及景区外语指示牌闹笑话的现象，不只是北京石景...
           </div> 
           <div class="newDetail detailSet mobile">
            城市、公园、商场及景区外语指示牌闹笑话的现象，不只是北京石景...
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
       <div class="page_btn"> 
        <a class="paging cur" href="javascript:;">1</a>
        <a class="paging" href="news_News_2.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_News_2.html">2</a>
        <a class="next_btn" href="news_News_2.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/news_News_2.html">&gt;</a> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div id="layout_1493260260148" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1"> 
   <div class="view_contents"> 
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