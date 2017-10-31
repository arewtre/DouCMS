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
  
  <script type="text/javascript" src="/yhhq/Public/Home/js/064190.js"></script>
  <link rel="stylesheet" type="text/css" href="/yhhq/Public/Home/css/064190.css?ver=1.0" /> 
   <div id="layout_1493878285543" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents">
        <div id="image_style_01_1493878285546" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="image" class="view_contents">
            <div class="imgStyle CompatibleImg">
              <a href='javascript:;' target="">
                <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/ourService_banner.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/ourService_banner.jpg" title="" alt="描述" id="imageModeShow" /></a>
            </div>
            <!-- 新加的js --></div>
        </div>
        <div id="div_includeBlock_1493878285561" class="view includeBlock div  none includeView" data-wow-duration='1s' data-wow-delay='0.3s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="text_style_02_1493878285978" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">我们的服务</div></div>
            <div id="homelink_style_01_1493878286008" class="view style_01 homelink  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="homelink" class="view_contents">
                <ol class="breadcrumb location_style01">
                  <li>
                    <a class="textSet" href="../index.htm" tppabs="http://demo.nicebox.cn/" onclick="">首页</a></li>
                  <li class="active textSet">我们的服务</li></ol>
                <script>
                $(document).ready(function(){  
              	  $('.ourService').addClass('hot');  
                });
                $(function() {
                    var viewid = "homelink_style_01_1493878286008";
                    var sys_url = "viewid=homelink_style_01_1493878286008&name=homelink&style=style_01&langid=0&pageid=64190&viewCtrl=default&isfb=1";
                    var moreParams = '';
                    if (typeof(history.pushState) != 'undefined') {
                      var hstate = JSON.stringify(history.state);
                      if (hstate != 'null' && hstate != null) {
                        eval('var hjson = ' + hstate);
                        moreParams = hjson.moreParamshomelink_style_01_1493878286008;
                      }
                    }
                    RequestURL(viewid, sys_url, moreParams);
                  })</script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="layout_1493790809769" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents">
        <div id="div_includeBlock_1493795440496" class="view includeBlock div  none includeView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="div_blank_1493795440720" class="view blank div  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="div" class="view_contents">
                <!-- <a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
                -->
              </div>
            </div>
            <div id="image_style_01_1493795440731" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg">
                  <a href='javascript:;' target="">
                    <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/ourService_cakes.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/ourService_cakes.png" title="" alt="描述" id="imageModeShow" /></a>
                </div>
                <!-- 新加的js --></div>
            </div>
            <div id="text_style_02_1493795440740" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">蛋糕</div></div>
            <div id="text_style_02_1493795440747" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">虽然还未正式进入酷暑，但是，作为市内最大的水上主题乐园——梦幻水城依然受到了不少游客的欢迎。</div></div>
          </div>
        </div>
        <div id="div_includeBlock_1493795452989" class="view includeBlock div  none includeView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="div_blank_1493795453183" class="view blank div  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="div" class="view_contents">
                <!-- <a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
                -->
              </div>
            </div>
            <div id="image_style_01_1493795453195" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg">
                  <a href='javascript:;' target="">
                    <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/ourService_cars.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/ourService_cars.png" title="" alt="描述" id="imageModeShow" /></a>
                </div>
                <!-- 新加的js --></div>
            </div>
            <div id="text_style_02_1493795453202" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">花车</div></div>
            <div id="text_style_02_1493795453209" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">继去年新增的“合家欢滑道”之后，今年再有“新成员”加入——全新双螺旋旋风滑道。其中封闭式螺旋滑道更具有流光溢彩效果。</div></div>
          </div>
        </div>
        <div id="div_includeBlock_1493795546195" class="view includeBlock div  none includeView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="div_blank_1493795546419" class="view blank div  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="div" class="view_contents">
                <!-- <a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
                -->
              </div>
            </div>
            <div id="image_style_01_1493795546434" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg">
                  <a href='javascript:;' target="">
                    <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/ourService_dresses.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/ourService_dresses.png" title="" alt="描述" id="imageModeShow" /></a>
                </div>
                <!-- 新加的js --></div>
            </div>
            <div id="text_style_02_1493795546446" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">婚庆礼服</div></div>
            <div id="text_style_02_1493795546453" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">海泉湾度假区一向以温泉项目著称，景区海洋温泉的恺撒皇宫全方位呈现古罗马大帝沐浴时的情景，珠海礼仪庆典公司让游客化身为恺撒。</div></div>
          </div>
        </div>
        <div id="div_includeBlock_1493795560752" class="view includeBlock div  none includeView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="div_blank_1493795561051" class="view blank div  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="div" class="view_contents">
                <!-- <a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
                -->
              </div>
            </div>
            <div id="image_style_01_1493795561064" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg">
                  <a href='javascript:;' target="">
                    <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/ourService_venue.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/ourService_venue.png" title="" alt="描述" id="imageModeShow" /></a>
                </div>
                <!-- 新加的js --></div>
            </div>
            <div id="text_style_02_1493795561069" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">婚庆场地</div></div>
            <div id="text_style_02_1493795561077" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">五一期间，在原有的温泉项目基础上，推出海洋冰泉。从温热的泉水出来，再跳进放入众多冰块的冰泉，让游客感受从热到冰冷的刺激。</div></div>
          </div>
        </div>
        <div id="div_includeBlock_1493795557410" class="view includeBlock div  none includeView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="div_blank_1493795557642" class="view blank div  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="div" class="view_contents">
                <!-- <a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
                -->
              </div>
            </div>
            <div id="image_style_01_1493795557655" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg">
                  <a href='javascript:;' target="">
                    <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/20170503145825726.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/20170503145825726.png" title="" alt="描述" id="imageModeShow" /></a>
                </div>
                <!-- 新加的js --></div>
            </div>
            <div id="text_style_02_1493795557665" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">首饰</div></div>
            <div id="text_style_02_1493795557672" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">还配备专业的教练团队，珠海会展策划公司能让游客快速学习到潜水的基础知识，不同深度的阶梯训练能使游客逐步适应水底漫步。</div></div>
          </div>
        </div>
        <div id="div_includeBlock_1493795616947" class="view includeBlock div  none includeView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="div_blank_1493795617194" class="view blank div  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="div" class="view_contents">
                <!-- <a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
                -->
              </div>
            </div>
            <div id="image_style_01_1493795617213" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg">
                  <a href='javascript:;' target="">
                    <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/ourService_makeup.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/ourService_makeup.png" title="" alt="描述" id="imageModeShow" /></a>
                </div>
                <!-- 新加的js --></div>
            </div>
            <div id="text_style_02_1493795617218" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">美容化妆</div></div>
            <div id="text_style_02_1493795617227" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">海洋王国方面表示，“海洋深潜”项目4月中下旬会先开放海豚岛潜水预订，在海洋王国的客服中心，以及长隆旅游各官方直销渠道均可预订。</div></div>
          </div>
        </div>
        <div id="div_includeBlock_1493795632046" class="view includeBlock div  none includeView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="div_blank_1493795632333" class="view blank div  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="div" class="view_contents">
                <!-- <a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
                -->
              </div>
            </div>
            <div id="image_style_01_1493795632348" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg">
                  <a href='javascript:;' target="">
                    <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/ourService_catering.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/ourService_catering.png" title="" alt="描述" id="imageModeShow" /></a>
                </div>
                <!-- 新加的js --></div>
            </div>
            <div id="text_style_02_1493795632353" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">宴会餐饮</div></div>
            <div id="text_style_02_1493795632361" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">此外，海洋王国随后将逐步探讨开放鲸鲨馆，那里海洋生物更丰富，将让游客尽享深海的自由，深度探秘海洋的奥妙。</div></div>
          </div>
        </div>
        <div id="div_includeBlock_1493795638580" class="view includeBlock div  none includeView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="div_blank_1493795638851" class="view blank div  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="div" class="view_contents">
                <!-- <a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
                -->
              </div>
            </div>
            <div id="image_style_01_1493795638862" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg">
                  <a href='javascript:;' target="">
                    <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/ourService_entertainment.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/ourService_entertainment.png" title="" alt="描述" id="imageModeShow" /></a>
                </div>
                <!-- 新加的js --></div>
            </div>
            <div id="text_style_02_1493795638869" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">娱乐节目</div></div>
            <div id="text_style_02_1493795638877" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">据珠海长隆海洋王国助理总经理李湛伟介绍，“海洋深潜”项目初步先开放海豚岛体验，海豚岛水温非常适宜，常年保持26度左右，而且这里有三种。</div></div>
          </div>
        </div>
        <div id="div_includeBlock_1493790823595" class="view includeBlock div  none includeView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="div_blank_1493794284981" class="view blank div  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="div" class="view_contents">
                <!-- <a href="javascript:;" style="display:block;width:100%;height:100%;" id="divnet"></a>
                -->
              </div>
            </div>
            <div id="image_style_01_1493790911277" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg">
                  <a href='javascript:;' target="">
                    <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/ourService_flowers.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/ourService_flowers.png" title="" alt="描述" id="imageModeShow" /></a>
                </div>
                <!-- 新加的js --></div>
            </div>
            <div id="text_style_02_1493791240332" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">鲜花</div></div>
            <div id="text_style_02_1493791315443" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">今年五一小长假，珠海作为国内游的十大热门城市自驾游依旧是旅游市场的主打产品。为了满足游客个性化需求。新增“旋风滑道”刺激玩水新体验。</div></div>
          </div>
        </div>
        <div id="text_style_02_1493790606029" class="view style_02 text  none lockHeightView" data-wow-duration='1.2s' data-wow-delay='0.5s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="text" class="view_contents">我们的服务</div></div>
        <div id="image_style_01_1493790606046" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="image" class="view_contents">
            <div class="imgStyle CompatibleImg">
              <a href='javascript:;' target="">
                <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" title="" alt="描述" id="imageModeShow" /></a>
            </div>
            <!-- 新加的js --></div>
        </div>
        <div id="text_style_01_1493790756691" class="view style_01 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="text" class="view_contents">婚礼从筹备到进行，CP都会一路的陪伴在您的身边，为您出谋划策。</div></div>
      </div>
    </div>
    <div id="layout_1493792013748" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents"></div>
    </div>
    <div id="layout_1493805667132" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents">
        <div id="text_style_02_1493805667136" class="view style_02 text  none lockHeightView" data-wow-duration='1.2s' data-wow-delay='0.5s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="text" class="view_contents">婚庆产品</div></div>
        <div id="image_style_01_1493805667157" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="image" class="view_contents">
            <div class="imgStyle CompatibleImg">
              <a href='javascript:;' target="">
                <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" title="" alt="描述" id="imageModeShow" /></a>
            </div>
            <!-- 新加的js --></div>
        </div>
      </div>
    </div>
    <div id="layout_1493868885087" class="layout " data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents">
        <div id="prodKind_style_03_1493869050322" class="view style_03 prodKind  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="prodKind" class="view_contents">
            <script></script>
            <script type="text/javascript" src="res/prodKind/style_03/default.js" tppabs="http://demo.nicebox.cn/7543019a292ad748/res/prodKind/style_03/default.js"></script>
            <script>function clickli() {
                var pid = "";
                var pgids = '';
                $(".level1[pid=" + pgids + "]").find("em").trigger("click");
                if ($(".level1[pid=" + pgids + "]").length == 0) $(".le2[pid=" + pgids + "]").parents(".level1").find("em").trigger("click");
              }

              window.onload = function() {
                var pid = "";
                var pgids = '';
                if (!pgids) pgids = Request('pgid');
                console.log("pid:" + pid);
                console.log("pgids:" + pgids);
                setTimeout('clickli()', 1000);
                $(".level1[pid=" + pgids + "]").find("em").trigger("click");
                if ($(".level1[pid=" + pgids + "]").length == 0) $(".le2[pid=" + pgids + "]").parents(".level1").find("em").trigger("click");

              }</script>
            <!---产品分类区域-->
            <div class="prodcateStyle_3">
              <ul class="oneBgSet">
                <li class="oneSet">
                  <a href="ourService.html-pgid=69824.htm" tppabs="http://demo.nicebox.cn/7543019a292ad748/ourService.html?pgid=69824" target="_self">礼品</a></li>
                <li class="oneSet">
                  <a href="ourService.html-pgid=69823.htm" tppabs="http://demo.nicebox.cn/7543019a292ad748/ourService.html?pgid=69823" target="_self">首饰</a></li>
                <li class="oneSet">
                  <a href="ourService.html-pgid=69822.htm" tppabs="http://demo.nicebox.cn/7543019a292ad748/ourService.html?pgid=69822" target="_self">礼服</a></li>
              </ul>
            </div>
            <!--产品分类区域 结束-->
            <script>$(function() {
                var viewid = "prodKind_style_03_1493869050322";
                var sys_url = "viewid=prodKind_style_03_1493869050322&name=prodKind&style=style_03&langid=0&pageid=64190&viewCtrl=prodKind&isfb=1";
                var moreParams = '';
                if (typeof(history.pushState) != 'undefined') {
                  var hstate = JSON.stringify(history.state);
                  if (hstate != 'null' && hstate != null) {
                    eval('var hjson = ' + hstate);
                    moreParams = hjson.moreParamsprodKind_style_03_1493869050322;
                  }
                }
                RequestURL(viewid, sys_url, moreParams);
              })</script>
          </div>
        </div>
      </div>
    </div>
    <div id="layout_1493196230217" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents">
        <div id="productList_style_07_1493868841245" class="view style_07 productList  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="productList" class="view_contents">
            <div class="prod_default7">
              <ul id="prod_Ulist">
                <li class="prod_Item modSet">
                  <div class="relative">
                    <!-- 产品图片 -->
                    <div class="prodImg_box imgSet">
                      <div class="prod_img">
                        <a href="productDetail_130242.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130242.html" target="_self">
                          <img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240071s.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/prodimg/201705/prod_240071s.jpg" /></a>
                      </div>
                      <div class="dummy" style="margin-top:100%"></div>
                    </div>
                    <!-- 内容 -->
                    <div class="prod_info twoBgSet">
                      <div class="prod_content">
                        <div class="prod_center">
                          <div class="p_name titleSet pc">
                            <a href="productDetail_130242.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130242.html" target="_self">白金24K钻石戒指</a></div>
                          <div class="p_name titleSet pad">
                            <a href="productDetail_130242.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130242.html" target="_self">白金24K钻石戒指</a></div>
                          <div class="p_name titleSet mobile">
                            <a href="productDetail_130242.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130242.html" target="_self">白金24K钻石戒指</a></div>
                          <div class="p_detail detailSet pc">如果是传统的仪式，选择古典而盛大的礼服一定没错；如果在乡村或花园中举行婚礼，礼服要选择适合在...</div>
                          <div class="p_detail detailSet pad">如果是传统的仪式，选择古典而盛大的礼服一定没错；如果在乡村或花园中举行...</div>
                          <div class="p_detail detailSet mobile">如果是传统的仪式，选择古典而盛大的礼服一定没错；如果在乡村或...</div>
                          <div class="p_line"></div>
                          <!-- <div class="p_line"></div> -->
                          <div class="p_line"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="prod_Item modSet">
                  <div class="relative">
                    <!-- 产品图片 -->
                    <div class="prodImg_box imgSet">
                      <div class="prod_img">
                        <a href="productDetail_130241.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130241.html" target="_self">
                          <img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240061s.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/prodimg/201705/prod_240061s.png" /></a>
                      </div>
                      <div class="dummy" style="margin-top:100%"></div>
                    </div>
                    <!-- 内容 -->
                    <div class="prod_info twoBgSet">
                      <div class="prod_content">
                        <div class="prod_center">
                          <div class="p_name titleSet pc">
                            <a href="productDetail_130241.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130241.html" target="_self">2017春夏新款韩版...</a></div>
                          <div class="p_name titleSet pad">
                            <a href="productDetail_130241.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130241.html" target="_self">2017春夏新款韩版...</a></div>
                          <div class="p_name titleSet mobile">
                            <a href="productDetail_130241.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130241.html" target="_self">2017春夏新款韩版...</a></div>
                          <div class="p_detail detailSet pc">如果年轻的女士你被邀请参加一场晚会，那你会穿什么呢？没错，答案就是晚礼服。</div>
                          <div class="p_detail detailSet pad">如果年轻的女士你被邀请参加一场晚会，那你会穿什么呢？没错，答案就是晚礼...</div>
                          <div class="p_detail detailSet mobile">如果年轻的女士你被邀请参加一场晚会，那你会穿什么呢？没错，答...</div>
                          <div class="p_line"></div>
                          <!-- <div class="p_line"></div> -->
                          <div class="p_line"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="prod_Item modSet">
                  <div class="relative">
                    <!-- 产品图片 -->
                    <div class="prodImg_box imgSet">
                      <div class="prod_img">
                        <a href="productDetail_130240.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130240.html" target="_self">
                          <img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240075s.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/prodimg/201705/prod_240075s.jpg" /></a>
                      </div>
                      <div class="dummy" style="margin-top:100%"></div>
                    </div>
                    <!-- 内容 -->
                    <div class="prod_info twoBgSet">
                      <div class="prod_content">
                        <div class="prod_center">
                          <div class="p_name titleSet pc">
                            <a href="productDetail_130240.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130240.html" target="_self">果味棒棒糖</a></div>
                          <div class="p_name titleSet pad">
                            <a href="productDetail_130240.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130240.html" target="_self">果味棒棒糖</a></div>
                          <div class="p_name titleSet mobile">
                            <a href="productDetail_130240.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130240.html" target="_self">果味棒棒糖</a></div>
                          <div class="p_detail detailSet pc">这样时间会比较充裕。因为设计制作一件婚纱大概需要2-4个月，而且最好能在婚礼前2个月送达你的...</div>
                          <div class="p_detail detailSet pad">这样时间会比较充裕。因为设计制作一件婚纱大概需要2-4个月，而且最好能...</div>
                          <div class="p_detail detailSet mobile">这样时间会比较充裕。因为设计制作一件婚纱大概需要2-4个月，...</div>
                          <div class="p_line"></div>
                          <!-- <div class="p_line"></div> -->
                          <div class="p_line"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="prod_Item modSet">
                  <div class="relative">
                    <!-- 产品图片 -->
                    <div class="prodImg_box imgSet">
                      <div class="prod_img">
                        <a href="productDetail_130239.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130239.html" target="_self">
                          <img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240062s.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/prodimg/201705/prod_240062s.png" /></a>
                      </div>
                      <div class="dummy" style="margin-top:100%"></div>
                    </div>
                    <!-- 内容 -->
                    <div class="prod_info twoBgSet">
                      <div class="prod_content">
                        <div class="prod_center">
                          <div class="p_name titleSet pc">
                            <a href="productDetail_130239.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130239.html" target="_self">男装宴会帅气皮靴</a></div>
                          <div class="p_name titleSet pad">
                            <a href="productDetail_130239.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130239.html" target="_self">男装宴会帅气皮靴</a></div>
                          <div class="p_name titleSet mobile">
                            <a href="productDetail_130239.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130239.html" target="_self">男装宴会帅气皮靴</a></div>
                          <div class="p_detail detailSet pc">定制晚礼服是一件很重要的事，庄重而正式的它以作为隆重场合上主要的服饰角色，对穿着者起着至高无...</div>
                          <div class="p_detail detailSet pad">定制晚礼服是一件很重要的事，庄重而正式的它以作为隆重场合上主要的服饰角...</div>
                          <div class="p_detail detailSet mobile">定制晚礼服是一件很重要的事，庄重而正式的它以作为隆重场合上主...</div>
                          <div class="p_line"></div>
                          <!-- <div class="p_line"></div> -->
                          <div class="p_line"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="prod_Item modSet">
                  <div class="relative">
                    <!-- 产品图片 -->
                    <div class="prodImg_box imgSet">
                      <div class="prod_img">
                        <a href="productDetail_130238.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130238.html" target="_self">
                          <img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240063s.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/prodimg/201705/prod_240063s.png" /></a>
                      </div>
                      <div class="dummy" style="margin-top:100%"></div>
                    </div>
                    <!-- 内容 -->
                    <div class="prod_info twoBgSet">
                      <div class="prod_content">
                        <div class="prod_center">
                          <div class="p_name titleSet pc">
                            <a href="productDetail_130238.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130238.html" target="_self">型男婚宴领带</a></div>
                          <div class="p_name titleSet pad">
                            <a href="productDetail_130238.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130238.html" target="_self">型男婚宴领带</a></div>
                          <div class="p_name titleSet mobile">
                            <a href="productDetail_130238.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130238.html" target="_self">型男婚宴领带</a></div>
                          <div class="p_detail detailSet pc">然而它是又根据不同的场所而划分。面对着多种多样的晚礼服，你是否已经束手无策了。</div>
                          <div class="p_detail detailSet pad">然而它是又根据不同的场所而划分。面对着多种多样的晚礼服，你是否已经束手...</div>
                          <div class="p_detail detailSet mobile">然而它是又根据不同的场所而划分。面对着多种多样的晚礼服，你是...</div>
                          <div class="p_line"></div>
                          <!-- <div class="p_line"></div> -->
                          <div class="p_line"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="prod_Item modSet">
                  <div class="relative">
                    <!-- 产品图片 -->
                    <div class="prodImg_box imgSet">
                      <div class="prod_img">
                        <a href="productDetail_130237.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130237.html" target="_self">
                          <img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240064s.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/prodimg/201705/prod_240064s.png" /></a>
                      </div>
                      <div class="dummy" style="margin-top:100%"></div>
                    </div>
                    <!-- 内容 -->
                    <div class="prod_info twoBgSet">
                      <div class="prod_content">
                        <div class="prod_center">
                          <div class="p_name titleSet pc">
                            <a href="productDetail_130237.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130237.html" target="_self">艳红性感高跟鞋</a></div>
                          <div class="p_name titleSet pad">
                            <a href="productDetail_130237.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130237.html" target="_self">艳红性感高跟鞋</a></div>
                          <div class="p_name titleSet mobile">
                            <a href="productDetail_130237.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130237.html" target="_self">艳红性感高跟鞋</a></div>
                          <div class="p_detail detailSet pc">挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服要与婚礼的风格协调一致。</div>
                          <div class="p_detail detailSet pad">挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服要与婚礼的...</div>
                          <div class="p_detail detailSet mobile">挑选礼服前，你必须确定婚礼的季节、准确时间、地点和风格。礼服...</div>
                          <div class="p_line"></div>
                          <!-- <div class="p_line"></div> -->
                          <div class="p_line"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="prod_Item modSet">
                  <div class="relative">
                    <!-- 产品图片 -->
                    <div class="prodImg_box imgSet">
                      <div class="prod_img">
                        <a href="productDetail_130252.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130252.html" target="_self">
                          <img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240069s.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/prodimg/201705/prod_240069s.jpg" /></a>
                      </div>
                      <div class="dummy" style="margin-top:100%"></div>
                    </div>
                    <!-- 内容 -->
                    <div class="prod_info twoBgSet">
                      <div class="prod_content">
                        <div class="prod_center">
                          <div class="p_name titleSet pc">
                            <a href="productDetail_130252.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130252.html" target="_self">珍珠白银项链</a></div>
                          <div class="p_name titleSet pad">
                            <a href="productDetail_130252.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130252.html" target="_self">珍珠白银项链</a></div>
                          <div class="p_name titleSet mobile">
                            <a href="productDetail_130252.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130252.html" target="_self">珍珠白银项链</a></div>
                          <div class="p_detail detailSet pc">婚纱可是新娘婚礼当天身份的象征哦，所以新娘一定要重视起来，可别因为麻烦就随便了事哦，新人在选...</div>
                          <div class="p_detail detailSet pad">婚纱可是新娘婚礼当天身份的象征哦，所以新娘一定要重视起来，可别因为麻烦...</div>
                          <div class="p_detail detailSet mobile">婚纱可是新娘婚礼当天身份的象征哦，所以新娘一定要重视起来，可...</div>
                          <div class="p_line"></div>
                          <!-- <div class="p_line"></div> -->
                          <div class="p_line"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="prod_Item modSet">
                  <div class="relative">
                    <!-- 产品图片 -->
                    <div class="prodImg_box imgSet">
                      <div class="prod_img">
                        <a href="productDetail_130251.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130251.html" target="_self">
                          <img class="pro_img horizontal" src="/yhhq/Public/Home/img/upimages/pkgimg/prodimg/201705/prod_240076s.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/prodimg/201705/prod_240076s.jpg" /></a>
                      </div>
                      <div class="dummy" style="margin-top:100%"></div>
                    </div>
                    <!-- 内容 -->
                    <div class="prod_info twoBgSet">
                      <div class="prod_content">
                        <div class="prod_center">
                          <div class="p_name titleSet pc">
                            <a href="productDetail_130251.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130251.html" target="_self">星空棒棒糖</a></div>
                          <div class="p_name titleSet pad">
                            <a href="productDetail_130251.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130251.html" target="_self">星空棒棒糖</a></div>
                          <div class="p_name titleSet mobile">
                            <a href="productDetail_130251.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/productDetail_130251.html" target="_self">星空棒棒糖</a></div>
                          <div class="p_detail detailSet pc">创意星空手工棒棒糖10支礼盒装零食球喜糖果男送女友生日表白礼物</div>
                          <div class="p_detail detailSet pad">创意星空手工棒棒糖10支礼盒装零食球喜糖果男送女友生日表白礼物</div>
                          <div class="p_detail detailSet mobile">创意星空手工棒棒糖10支礼盒装零食球喜糖果男送女友生日表白礼...</div>
                          <div class="p_line"></div>
                          <!-- <div class="p_line"></div> -->
                          <div class="p_line"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
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
                <a class="paging" href="ourService_P_2.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/ourService_P_2.html">2</a>
                <a class="next_btn" href="ourService_P_2.html" tppabs="http://demo.nicebox.cn/7543019a292ad748/ourService_P_2.html">></a></div>
            </div>
            <script>$(function() {
                var viewid = "productList_style_07_1493868841245";
                var sys_url = "viewid=productList_style_07_1493868841245&name=productList&style=style_07&langid=0&pageid=64190&viewCtrl=default&isfb=1";
                var moreParams = '';
                if (typeof(history.pushState) != 'undefined') {
                  var hstate = JSON.stringify(history.state);
                  if (hstate != 'null' && hstate != null) {
                    eval('var hjson = ' + hstate);
                    moreParams = hjson.moreParamsproductList_style_07_1493868841245;
                  }
                }
                RequestURL(viewid, sys_url, moreParams);
              })</script>
            <script type="text/javascript">if (typeof addcart !== 'function') {
                function addcart(pid) {
                  if (is_mobile()) {
                    var locationUrl = "http://s143js.nicebox.cn/exusers/u_cart.php?idweb=506&lang=0&pid=" + pid + "&act=add&ismobile=1";
                    window.location = locationUrl;
                  } else {
                    document.getElementById("boxName").innerHTML = "";
                    if (document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML = "×";
                    document.getElementById("showiframe").src = "http://s143js.nicebox.cn/exusers/u_cart.php?idweb=506&pid=" + pid + "&act=add&lang=0&ispc=1";
                    box.Show({
                      width: "840px",
                      height: "420px"
                    });
                  }
                }
              }
              $(function() { //有客户需求，点击分页之后回到顶部
                $(".paging").click(function() {
                  scrollTo(0, 0);
                })
              }) function is_mobile() {
                return window.screen.width < 767 || ($('body').width() > 0 && $('body').width() < 767);
              }</script>
          </div>
        </div>
      </div>
    </div>
    <div id="layout_1493792090532" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents"></div>
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