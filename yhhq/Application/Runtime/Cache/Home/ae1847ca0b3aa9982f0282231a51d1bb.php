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
  
  <script type="text/javascript" src="/yhhq/Public/Home/js/064187.js"></script>
  <link rel="stylesheet" type="text/css" href="/yhhq/Public/Home/css/064187.css?ver=1.0" /> 
   <div id="layout_1493878003111" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents">
        <div id="image_style_01_1493878003113" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="image" class="view_contents">
            <div class="imgStyle CompatibleImg">
              <a href='javascript:;' target="">
                <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_banner.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_banner.jpg" title="" alt="描述" id="imageModeShow" /></a>
            </div>
            <!-- 新加的js --></div>
        </div>
        <div id="div_includeBlock_1493878003126" class="view includeBlock div  none includeView" data-wow-duration='1s' data-wow-delay='0.3s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="div" class="view_contents">
            <div id="text_style_02_1493878003406" class="view style_02 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="text" class="view_contents">项目案例</div></div>
            <div id="homelink_style_01_1493878003416" class="view style_01 homelink  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
              <div names="homelink" class="view_contents">
                <ol class="breadcrumb location_style01">
                  <li>
                    <a class="textSet" href="../index.htm" tppabs="http://demo.nicebox.cn/" onclick="">首页</a></li>
                  <li class="active textSet">项目案例</li></ol>
                <script>
                $(document).ready(function(){  
                	  $('.solution').addClass('hot');  
                  }); 
                
                $(function() {
                    var viewid = "homelink_style_01_1493878003416";
                    var sys_url = "viewid=homelink_style_01_1493878003416&name=homelink&style=style_01&langid=0&pageid=64187&viewCtrl=default&isfb=1";
                    var moreParams = '';
                    if (typeof(history.pushState) != 'undefined') {
                      var hstate = JSON.stringify(history.state);
                      if (hstate != 'null' && hstate != null) {
                        eval('var hjson = ' + hstate);
                        moreParams = hjson.moreParamshomelink_style_01_1493878003416;
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
    <div id="layout_1493798380049" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents">
        <div id="text_style_02_1493798380052" class="view style_02 text  none lockHeightView" data-wow-duration='1.2s' data-wow-delay='0.5s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="text" class="view_contents">案例展示</div></div>
        <div id="image_style_01_1493798380065" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="image" class="view_contents">
            <div class="imgStyle CompatibleImg">
              <a href='javascript:;' target="">
                <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" title="" alt="描述" id="imageModeShow" /></a>
            </div>
            <!-- 新加的js --></div>
        </div>
      </div>
    </div>
    <div id="layout_1493209404729" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents">
        <div id="image_style_04_1493209404735" class="view style_04 image  none lockHeightView" data-wow-duration='1.5s' data-wow-delay='0.5s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="image" class="view_contents">
            <div class="imgStyle_4">
              <input type='hidden' id='current_page_1493209404735' value="10" />
              <input type='hidden' id='show_per_page_1493209404735' value="8" />
              <ul id="content_1493209404735">
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_1.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_1.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
                </li>
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_2.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_2.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
                </li>
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_3.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_3.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
                </li>
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_4.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_4.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
                </li>
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_10.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_10.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
                </li>
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_9.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_9.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
                </li>
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_8.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_8.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
                </li>
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_7.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_7.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
                </li>
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_6.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_6.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
                </li>
                <li class="imgItems">
                  <a href="javascript:;">
                    <img src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/case_5.jpg" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/case_5.jpg" alt=""></a>
                  <div class="ratio" style="margin-top:100%"></div>
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
                <a class="page_link_1493209404735" href="javascript:go_to_page_1493209404735(0,8)" longdesc="0">1</a>
                <a class="page_link_1493209404735" href="javascript:go_to_page_1493209404735(1,8)" longdesc="1">2</a></div>
            </div>
            <script>$(document).ready(function() {
                $('.page_link[longdesc=0]').css("border", "1px solid #4c4c4c");
                $('#content_1493209404735').children().slice(0, $("#current_page_1493209404735").attr("value")).css('display', 'none');
                $('#content_1493209404735').children().slice(0, $("#show_per_page_1493209404735").attr("value")).css('display', 'block');
              });
              function go_to_page_1493209404735(page_num, prodNum) {
                start_from = page_num * prodNum;
                end_on = start_from + prodNum;
                $('#content_1493209404735').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
                $('.page_link_1493209404735').css('border', '');
                $('.page_link_1493209404735[longdesc=' + page_num + ']').css("border", "1px solid #4c4c4c");
                phSize();
              }

              function phSize() {
                $("#{viewId} li").each(function() {
                  var img_W = $(this).find("img").width();
                  var img_H = $(this).find("img").height();
                  if (img_W < img_H) {
                    $(this).find("img").css({
                      "width": "100%",
                      "height": "auto"
                    })
                  } else {
                    $(this).find("img").css({
                      "width": "auto",
                      "height": "100%"
                    })
                  }
                });
              }</script>
            <script>$(function() {
                var obj = $("#image_style_04_1493209404735");
                var picItems = obj.find("li.imgItems");
                var num = 0;
                var picBox;
                picItems.click(function() {
                  var topH = $(window).scrollTop();
                  var index = $(this).index();
                  var curPic = $(this).find("img").attr("src");
                  num = index;
                  var picBoxhtml = $("<div class='imgShowBox'><im" + "" + "g src='" + curPic + "' alt=''><div class='imgButton'><span class='prevImg'><i class='fa fa-angle-left'></i></span><span class='closeShowPic'>×</span><span class='nextImg'><i class='fa fa-angle-right'></i></span></div></div>");
                  //"+""+"为了躲开图片延时加载的代码替换
                  $("body").append(picBoxhtml);

                  picBox = $(".imgShowBox");

                  pdSize();

                  //判断下一张和上一张按钮的显示
                  if (picItems.length == 1) {
                    $("body").find(".imgButton>.nextImg,.imgButton>.prevImg").css("visibility", "hidden")
                  }
                  if (picItems.length - 1 == $(this).index()) {
                    $("body").find(".imgButton>.nextImg").css("visibility", "hidden")
                  }
                  if ($(this).index() == 0) {
                    $("body").find(".imgButton>.prevImg").css("visibility", "hidden")
                  }

                  //关闭
                  $("body").find(".imgButton>.closeShowPic").click(function() {
                    $(".imgShowBox").remove();
                    $("body").removeClass("pos_fixed");
                    $(window).scrollTop(topH);
                  });
                  //下一张
                  $("body").find(".imgButton>.nextImg").click(function() {
                    $(".imgShowBox img").css("max-height", "none");
                    var len = obj.find("li:has('img')").length;
                    $(this).siblings().css("visibility", "visible");
                    num++;
                    if (num >= len) {
                      num = len - 1;
                    }
                    if (num == len - 1) {
                      $(this).css("visibility", "hidden");
                    }
                    curPics();
                    pdSize();
                  });
                  //上一张
                  $("body").find(".imgButton>.prevImg").click(function() {
                    $(".imgShowBox img").css("max-height", "none");
                    $(this).siblings().css("visibility", "visible");
                    num--;
                    if (num <= 0) {
                      num = 0;
                      $(this).css("visibility", "hidden");
                    }
                    curPics();
                    pdSize();
                  });
                });
                //切换大图
                function curPics() {
                  var newImg = obj.find("li").eq(num).find("img").attr("src");
                  picBox.find("img").attr("src", newImg);
                }
                //判断展开显示效果
                function pdSize() {
                  var imgH = picBox.find("img").height();
                  var winH = $(window).height();
                  if (imgH > winH) {
                    $("body").addClass("pos_fixed");
                    picBox.addClass("scroll");
                    picBox.animate({
                      "scrollTop": "0px"
                    },
                    200);
                  } else {
                    $("body").removeClass("pos_fixed");
                    picBox.removeClass("scroll");
                    $(".imgShowBox img").css("max-height", "80%");
                  }
                }
                //遍历所有图片宽高定位
                picItems.each(function() {
                  var img_W = $(this).find("img").width();
                  var img_H = $(this).find("img").height();
                  if (img_W < img_H) {
                    $(this).find("img").css({
                      "width": "100%",
                      "height": "auto"
                    })
                  } else {
                    $(this).find("img").css({
                      "width": "auto",
                      "height": "100%"
                    })
                  }
                });
              });</script>
          </div>
        </div>
      </div>
    </div>
    <div id="layout_1493257196196" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents"></div>
    </div>
    <div id="layout_1493799451627" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
      <div class="view_contents">
        <div id="text_style_02_1493799451631" class="view style_02 text  none lockHeightView" data-wow-duration='1.2s' data-wow-delay='0.5s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="text" class="view_contents">客户好评</div></div>
        <div id="image_style_01_1493799451646" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="image" class="view_contents">
            <div class="imgStyle CompatibleImg">
              <a href='javascript:;' target="">
                <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/title_line.png" title="" alt="描述" id="imageModeShow" /></a>
            </div>
            <!-- 新加的js --></div>
        </div>
        <div id="text_style_01_1493799451654" class="view style_01 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="text" class="view_contents">感谢您对CP婚庆策划的认可，我们会继续努力，为客户提供更好的服务。</div></div>
        <div id="tab_style_03_1493209421183" class="view style_03 tab  none includeView" data-wow-duration='1s' data-wow-delay='0.25s' data-wow-offset='0' data-wow-iteration='1'>
          <div names="tab" class="view_contents">
            <script></script>
            <div id="div_tab_style_03_1493209421183" class="niceTab tabStyle_3">
              <div class="tab_nav tab_nav_bottom">
                <div class="tab_scroll tab_scroll_bottom">
                  <ul class="tab_ul tab_ul_bottom">
                    <li class="tab_li tabItemSet tab_li_bottom tabCurItem">
                      <div class="tab_pos_r">
                        <div class="tab_img tabImgSet">
                          <img src="../sysTools/Model/views/tab/z_08/v9Res/d19538d87045a6a5924b93370b3eb228.png" tppabs="http://demo.nicebox.cn/sysTools/Model/views/tab/z_08/v9Res/d19538d87045a6a5924b93370b3eb228.png" ondragstart="return false;" /></div>
                        <div class="tab_txt" onselectstart="return false">
                          <p>1</p>
                        </div>
                      </div>
                    </li>
                    <li class="tab_li tabItemSet tab_li_bottom">
                      <div class="tab_pos_r">
                        <div class="tab_img tabImgSet">
                          <img src="../sysTools/View/img/diy/tabImg.png" tppabs="http://demo.nicebox.cn/sysTools/View/img/diy/tabImg.png" ondragstart="return false;" /></div>
                        <div class="tab_txt" onselectstart="return false">
                          <p>2</p>
                        </div>
                      </div>
                    </li>
                    <li class="tab_li tabItemSet tab_li_bottom">
                      <div class="tab_pos_r">
                        <div class="tab_img tabImgSet">
                          <img src="../sysTools/View/img/diy/tabImg.png" tppabs="http://demo.nicebox.cn/sysTools/View/img/diy/tabImg.png" ondragstart="return false;" /></div>
                        <div class="tab_txt" onselectstart="return false">
                          <p>3</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="tab_box tab_box_bottom" style="">
                <div class="tab_content">
                  <div class="tab_main niceTabContent tabconSet">
                    <div class="tab_div niceTabShow">
                      <div id="image_style_01_1493209424430" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
                        <div names="image" class="view_contents">
                          <div class="imgStyle CompatibleImg">
                            <a href='javascript:;' target="">
                              <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/client_1.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/client_1.png" title="" alt="描述" id="imageModeShow" /></a>
                          </div>
                          <!-- 新加的js --></div>
                      </div>
                      <div id="text_style_01_1493209424449" class="view style_01 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
                        <div names="text" class="view_contents">丽莎</div></div>
                      <div id="text_style_02_1493209424439" class="view style_02 text  none lockHeightView" data-wow-duration='1.5s' data-wow-delay='0.3s' data-wow-offset='0' data-wow-iteration='1'>
                        <div names="text" class="view_contents">如果您来自欧洲大陆并计划在中国、在武汉、在东湖新技术开发区开辟或拓展您的业务； 如果您的企业在这里有项目要完成；或者您的企业遇到与此相关的难题需要解决；如果您的企业有意去欧洲大陆，去德国、瑞士、奥地利、比利时投资、洽谈、参展、访问、拓展业务领域，我们将成为您理想的向导和助力。</div></div>
                    </div>
                    <div class="tab_div">
                      <div id="image_style_01_1493209424455" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
                        <div names="image" class="view_contents">
                          <div class="imgStyle CompatibleImg">
                            <a href='javascript:;' target="">
                              <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/client_2.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/client_2.png" title="" alt="描述" id="imageModeShow" /></a>
                          </div>
                          <!-- 新加的js --></div>
                      </div>
                      <div id="text_style_01_1493209424463" class="view style_01 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
                        <div names="text" class="view_contents">比特</div></div>
                      <div id="text_style_02_1493209424468" class="view style_02 text  none lockHeightView" data-wow-duration='1.5s' data-wow-delay='0.3s' data-wow-offset='0' data-wow-iteration='1'>
                        <div names="text" class="view_contents">我们深刻意识到，我们身处在这个世界，面向这个世界，并向这个世界开放对于人类独特的文化与习俗，思想与创意，教育和可持续性发展，以及健康、气候与环境，我们均给予高度的价值和尊重。我们意在稳步地、可持续性地学习与成长，我们意在成长为跨国投资、商贸促进与企业管理领域中国最具智能的综合构建与解决方案系统。</div></div>
                    </div>
                    <div class="tab_div">
                      <div id="image_style_01_1493209424479" class="view style_01 image  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
                        <div names="image" class="view_contents">
                          <div class="imgStyle CompatibleImg">
                            <a href='javascript:;' target="">
                              <img class="picSet link-type-" src="/yhhq/Public/Home/img/upimages/pkgimg/pkgimg/pkgimg/client_3.png" tppabs="http://demo.nicebox.cn/7543019a292ad748/img/upimages/pkgimg/pkgimg/pkgimg/client_3.png" title="" alt="描述" id="imageModeShow" /></a>
                          </div>
                          <!-- 新加的js --></div>
                      </div>
                      <div id="text_style_02_1493209424485" class="view style_02 text  none lockHeightView" data-wow-duration='1.5s' data-wow-delay='0.3s' data-wow-offset='0' data-wow-iteration='1'>
                        <div names="text" class="view_contents">这一切鼓舞着我们继续心怀“服务社会、服务大众，促进社会和谐与进步“的基本任务，以“以人为本，不断学习，可持续发展“为基本经营理念，不断学习、不断成长，不断发展，使得武汉市逐渐成欧洲工业人文发达国家地区最具吸引力的商贸科研交流投资地，以期为武汉市的经济建设与发展贡献一份绵薄之力，为国内外广大热衷于学习与成长的优秀人士提供一个国际化的发展空间与平台。</div></div>
                      <div id="text_style_01_1493209424491" class="view style_01 text  none lockHeightView" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
                        <div names="text" class="view_contents">史密斯</div></div>
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
            <script>$(function() {
                tab_style03_init("div_tab_style_03_1493209421183");
                setClick_Choice("div_tab_style_03_1493209421183");

                setAnimat_int("div_tab_style_03_1493209421183", 3);

                $(".tab_nav").hide();
                $(".tab_box").css({
                  top: '0px',
                  bottom: '0px',
                  right: '0px',
                  left: '0px',
                  height: '100%',
                  width: '100%'
                });
              });</script>
          </div>
        </div>
      </div>
    </div>
    <div id="layout_1493799503756" class="layout  none" data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
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