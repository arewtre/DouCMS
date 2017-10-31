var _env = (function() {
	var f = navigator.userAgent,
	b = null,
	c = function(h, i) {
		var g = h.split(i);
		g = g.shift() + "." + g.join("");
		return g * 1
	},
	d = {
		ua: f,
		version: null,
		ios: false,
		android: false,
		windows: false,
		blackberry: false,
		meizu: false,
		weixin: false,
		wVersion: null,
		touchSupport: ("createTouch" in document),
		hashSupport: !!("onhashchange" in window)
	};
	b = f.match(/MicroMessenger\/([\.0-9]+)/);
	if (b != null) {
		d.weixin = true;
		d.wVersion = c(b[1], ".")
	}
	b = f.match(/Android\s([\.0-9]+)/);
	if (b != null) {
		d.android = true;
		d.version = c(b[1], ".");
		d.meizu = /M030|M031|M032|MEIZU/.test(f);
		return d
	}
	b = f.match(/i(Pod|Pad|Phone)\;.*\sOS\s([\_0-9]+)/);
	if (b != null) {
		d.ios = true;
		d.version = c(b[2], "_");
		return d
	}
	b = f.match(/Windows\sPhone\sOS\s([\.0-9]+)/);
	if (b != null) {
		d.windows = true;
		d.version = c(b[1], ".");
		return d
	}
	var e = {
		a: f.match(/\(BB1\d+\;\s.*\sVersion\/([\.0-9]+)\s/),
		b: f.match(/\(BlackBerry\;\s.*\sVersion\/([\.0-9]+)\s/),
		c: f.match(/^BlackBerry\d+\/([\.0-9]+)\s/),
		d: f.match(/\(PlayBook\;\s.*\sVersion\/([\.0-9]+)\s/)
	};
	for (var a in e) {
		if (e[a] != null) {
			b = e[a];
			d.blackberry = true;
			d.version = c(b[1], ".");
			return d
		}
	}
	return d
} ()),
_ua = _env.ua,
_touchSupport = _env.touchSupport,
_hashSupport = _env.hashSupport,
_isIOS = _env.ios,
_isOldIOS = _env.ios && (_env.version < 4.5),
_isAndroid = _env.android,
_isMeizu = _env.meizu,
_isOldAndroid22 = _env.android && (_env.version < 2.3),
_isOldAndroid23 = _env.android && (_env.version < 2.4),
_clkEvtType = _touchSupport ? "touchstart": "click",
_movestartEvt = _touchSupport ? "touchstart": "mousedown",
_moveEvt = _touchSupport ? "touchmove": "mousemove",
_moveendEvt = _touchSupport ? "touchend": "mouseup";

//��ת
function viewSource(url){
	location.href = url;
}
//�õ�Ƭ
function slidePic(a){
	var img = new Image();
	img.src = $(a).find("img").attr("src");
	var percent = ($(document).width()-img.width)/img.width;
	$(a).find("img").each(function() {
		$(this).css({"width": $(document).width(), "height":img.height+img.height*percent});
	});
	var sWidth = $(document).width(); //��ȡ����ͼ�Ŀ�ȣ���ʾ�����
	var sHeight = $(a).find("img").eq(0).height(); //��ȡ����ͼ�Ŀ�ȣ���ʾ�����
	var len = $(a).find("ul li").length; //��ȡ����ͼ����
	var index = 0;
	var picTimer;
	$(a).css({"width": sWidth, "height": sHeight});
	//���´���������ְ�ť�Ͱ�ť��İ�͸������������һҳ����һҳ������ť
	var btn = "<div class='btnBg'></div><div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><!--div class='preNext pre'></div><div class='preNext next'></div-->";
	$(a).append(btn);
	$(a).find(".btnBg").css("opacity",0.5);

	//ΪС��ť�����껬���¼�������ʾ��Ӧ������
	$(a).find(".btn span").css("opacity",0.4).mouseover(function() {
		index = $(a).find(".btn span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseover");

	//��һҳ����һҳ��ť͸���ȴ���
	$(a).find(".preNext").css("opacity",0.2).hover(function() {
		$(this).stop(true,false).animate({"opacity":"0.5"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0.2"},300);
	});

	//��һҳ��ť
	$(a).find(".pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});

	//��һҳ��ť
	$(a).find(".next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//����
	$(a).bind('swiperight', function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	}).bind('swipeleft', function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//����Ϊ���ҹ�����������liԪ�ض�����ͬһ�����󸡶�������������Ҫ�������ΧulԪ�صĿ��
	$(a).find("ul").css("width",sWidth * (len));

	//��껬�Ͻ���ͼʱֹͣ�Զ����ţ�����ʱ��ʼ�Զ�����
	$(a).hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); //��4000�����Զ����ŵļ������λ������
	}).trigger("mouseleave");

	//��ʾͼƬ���������ݽ��յ�indexֵ��ʾ��Ӧ������
	function showPics(index) { //��ͨ�л�
		var nowLeft = -index*sWidth; //����indexֵ����ulԪ�ص�leftֵ
		$(a).find("ul").stop(true,false).animate({"left":nowLeft},300); //ͨ��animate()����ulԪ�ع������������position
		//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //Ϊ��ǰ�İ�ť�л���ѡ�е�Ч��
		$(a).find(".btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //Ϊ��ǰ�İ�ť�л���ѡ�е�Ч��
	}
}

$(function() {
	$(window).load(function(){slidePic("#focus")});
	$("#nav a:eq(4)").before("<a href='#' class='more'>����&nbsp;&nbsp;<i class='icon_more icon_more_down'></i></a>");
	$("#nav .more").click(function() {
		if($("#nav").css("height") != "29px") {
			$(this).html("����&nbsp;&nbsp;<i class='icon_more icon_more_down'></i>");
			$("#nav").css("height", "29px");
		} else {
			$(this).html("����&nbsp;&nbsp;<i class='icon_more icon_more_up'></i>");
			$("#nav").css("height", "auto");
		}
	});
});