<?php
return array(
	//'配置项'=>'配置值'
	//数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => 'root', // 密码
	
    
	'DB_NAME'   => 'yhhq', // 数据库名
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'lin_', // 数据库表前缀
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG' => false,//数据库调试模式,开启后可以记录SQL日志 3.2.3新增
	//'TMPL_ENGINE_TYPE'=>Smarty,
	//'TMPL_L_DELIM'    =>    '{',
	//'TMPL_R_DELIM'    =>    '}',
    'SHOW_PAGE_TRACE'        => false,                           // 是否显示调试面板
//     'URL_CASE_INSENSITIVE'   => false,                           // url区分大小写
//     'TAGLIB_BUILD_IN'        => 'Cx,Common\Tag\My',              // 加载自定义标签
//     'LOAD_EXT_CONFIG'        => 'db,alipay,oauth',               // 加载网站设置文件
//     'TMPL_PARSE_STRING'      => array(                           // 定义常用路径
//         '__OSS__'            => OSS_URL,
//         '__PUBLIC__'         => OSS_URL.__ROOT__.'/Public',
//         '__HOME_CSS__'       => __ROOT__.trim(TMPL_PATH,'.').'Home/Public/css',
//     ),
	'URL_MODEL' => 3,
	'TMPL_CACHE_ON' => false,
	//'MODULE_ALLOW_LIST'  => array('Home','Admin'),
	'USER_ADMINISTRATOR' => array(1,2),
	'AUTH_KEY' => 'I&TC{pft>L,C`wFQ>&#ROW>k{Kxlt1>ryW(>r<#R',
    //***********************************URL设置**************************************
    'MODULE_ALLOW_LIST'      => array('Home','Admin','Api'), //允许访问列表
    //'URL_HTML_SUFFIX'        => '',  // URL伪静态后缀设置
    //'URL_MODEL'              => 1,  //启用rewrite
    //***********************************SESSION设置**********************************
    'SESSION_OPTIONS'        => array(
        'name'               => 'LIN',//设置session名
        'expire'             => 24*3600*15, //SESSION保存15天
        'use_trans_sid'      => 1,//跨页传递
        'use_only_cookies'   => 0,//是否只开启基于cookies的session的会话方式
    ),
	// 视图输出字符串内容替换
	'view_replace_str'       => array(
			//'__PUBLIC__' => __PUBLIC__,//public目录的全局变量，在/public/home.php中定义
			'__STATIC__'   => 'Public/static',
			'__ADMIN__'    => 'Public/static/admin',
			'__HOME__'     => 'Public/static/home',
	),
    //***********************************页面设置**************************************
    //'TMPL_EXCEPTION_FILE'    => APP_DEBUG ? THINK_PATH.'Tpl/think_exception.tpl' : './Template/default/Home/Public/404.html',
    //'TMPL_ACTION_ERROR'      => TMPL_PATH.'/Public/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    //'TMPL_ACTION_SUCCESS'    => TMPL_PATH.'/Public/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
    //***********************************auth设置**********************************
    'AUTH_CONFIG'            => array(
        'AUTH_USER'      => 'user'                         //用户信息表
    ),
   // 'DEFAULT_MODULE'        =>  'Admin',  // 默认模块
    //***********************************邮件服务器**********************************
    'EMAIL_FROM_NAME'        => '',   // 发件人
    'EMAIL_SMTP'             => '',   // smtp
    'EMAIL_USERNAME'         => '',   // 账号
    'EMAIL_PASSWORD'         => '',   // 密码  注意: 163和QQ邮箱是授权码；不是登录的密码
    'EMAIL_SMTP_SECURE'      => '',   // 链接方式 如果使用QQ邮箱；需要把此项改为  ssl
    'EMAIL_PORT'             => '25', // 端口 如果使用QQ邮箱；需要把此项改为  465
    //***********************************其他设置**********************************
    'RONG_IS_DEV'            => true,//是否是在开发中
    'RONG_DEV_APP_KEY'       => '', //融云开发环境下的key       仅供测试使用
    'RONG_DEV_APP_SECRET'    => '', //融云开发环境下的SECRET     仅供测试使用
    'GEETEST_ID'             => '',//极验id  仅供测试使用
    'GEETEST_KEY'            => '',//极验key 仅供测试使用
    'RONG_PRO_APP_KEY'       => '', //融云生产环境下的key
    'RONG_PRO_APP_SECRET'    => '', //融云生产环境下的SECRET
    'UMENG_IOS_APP_KEY'      => '', //友盟ios AppKey
    'UMENG_IOS_SECRET'       => '', //友盟ios App Master Secret
    'UMENG_ANDROID_APP_KEY'  => '', //友盟android AppKey
    'UMENG_ANDROID_SECRET'   => '', //友盟android App Master Secret
    'RONGLIAN_ACCOUNT_SID'   => '', //容联云通讯 主账号 accountSid
    'RONGLIAN_ACCOUNT_TOKEN' => '', //容联云通讯 主账号token accountToken
    'RONGLIAN_APPID'         => '', //容联云通讯 应用Id appid
    'RONGLIAN_TEMPLATE_ID'   => '', //容联云通讯 模板Id
    'QINIU_AK' =>'',//七牛key
	'QINIU_SK'=>'',//七牛secret
	'QINIU_IMAGE_BUCKET'=>'image',//七牛上传图片bucket
	'QINIU_IMAGE_DOMAIN'=>'',//七牛图片上传domain
	'QINIU_VIDEO_BUCKET'=>'video',//七牛上传视频bucket
	'QINIU_VIDEO_DOMAIN'=>'',//七牛视频上传domain    
	'QQ_CONTACT_APPID' => '',//QQ互联APPID
    'QQ_CONTACT_KEY' =>'',//QQ互联key
	
	'APP_VERSION' => 'v1.0',
	'APP_NAME'    => 'apiDouCMS',
    'DOU_NAME'    => '豆宝网',
	'URL_ROUTER_ON'   => true,
	'URL_ROUTE_RULES' => array(
	'wiki/:hash'  => 'Api/Wiki/apiField',
	'api/:hash'   => 'Api/Api/index',
	'wikiList'    => 'Api/Wiki/apiList',
	'errorList'   => 'Api/Wiki/errorCode',
	'calculation' => 'Api/Wiki/calculation'
	),
    
    //***********************************缓存设置**********************************

    //'DATA_CACHE_TIME'        => 1800,        // 数据缓存有效期s
    //'DATA_CACHE_PREFIX'      => 'mem_',      // 缓存前缀
   // 'DATA_CACHE_TYPE'        => 'Memcached', // 数据缓存类型,
   // 'MEMCACHED_SERVER'       => '127.0.0.1', // 服务器ip

    'ALIOSS_CONFIG'          => array(
        'KEY_ID'             => '', // 阿里云oss key_id
        'KEY_SECRET'         => '', // 阿里云oss key_secret
        'END_POINT'          => '', // 阿里云oss endpoint
        'BUCKET'             => ''  // bucken 名称
    ),
    'NEED_UPLOAD_OSS'        => array( // 需要上传的目录
        '/Upload/avatar',
        '/Upload/cover',
        '/Upload/image/webuploader',
        '/Upload/video',
    ),
    'ALIPAY_CONFIG'          => array(
        'partner'            => '', // partner 从支付宝商户版个人中心获取
        'seller_email'       => '', // email 从支付宝商户版个人中心获取
        'key'                => '', // key 从支付宝商户版个人中心获取
        'sign_type'          => strtoupper(trim('MD5')), // 可选md5  和 RSA
        'input_charset'      => 'utf-8', // 编码 (固定值不用改)
        'transport'          => 'http', // 协议  (固定值不用改)
        'cacert'             => VENDOR_PATH.'Alipay/cacert.pem',  // cacert.pem存放的位置 (固定值不用改)
        'notify_url'         => 'http://XXXXXX.com/Api/Alipay/alipay_notify', // 异步接收支付状态通知的链接
        'return_url'         => 'http://XXXXXX.com/Api/Alipay/alipay_return', // 页面跳转 同步通知 页面路径 支付宝处理完请求后,当前页面自 动跳转到商户网站里指定页面的 http 路径。 (扫码支付专用)
        'show_url'           => 'http://XXXXXX.com/User/Order/index', // 商品展示网址,收银台页面上,商品展示的超链接。 (扫码支付专用)
        'private_key_path'   => '', //移动端生成的私有key文件存放于服务器的 绝对路径 如果为MD5加密方式；此项可为空 (移动支付专用)
        'public_key_path'    => '', //移动端生成的公共key文件存放于服务器的 绝对路径 如果为MD5加密方式；此项可为空 (移动支付专用)
    ),
    'WEIXINPAY_CONFIG'       => array(
        'APPID'              => '', // 微信支付APPID
        'MCHID'              => '', // 微信支付MCHID 商户收款账号
        'KEY'                => '', // 微信支付KEY
        'APPSECRET'          => '',  //公众帐号secert
        'NOTIFY_URL'         => 'http://XXXXXX.com/Api/WeixPay/notify/order_number/', // 接收支付状态的连接
    ),
);
