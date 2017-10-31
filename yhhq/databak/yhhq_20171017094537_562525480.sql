/* This file is created by MySQLReback 2017-10-17 09:45:37 */
 /* 创建表结构 `lin_aosen` */
 DROP TABLE IF EXISTS `lin_aosen`;/* MySQLReback Separation */ CREATE TABLE `lin_aosen` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=548 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_aosen` */
 INSERT INTO `lin_aosen` VALUES ('1','fa-caret-square-o-down'),('2','fa-caret-square-o-left'),('3','fa-caret-square-o-right'),('4','fa-caret-square-o-up'),('5','fa-check-circle-o'),('6','fa-circle-thin'),('7','fa-code-fork'),('8','fa-dot-circle-o'),('9','fa-gavel'),('10','fa-gear'),('11','fa-gears'),('12','fa-heart'),('13','fa-heart-o'),('14','fa-image'),('15','fa-inbox'),('16','fa-info'),('17','fa-info-circle'),('18','fa-institution'),('19','fa-keyboard-o'),('20','fa-legal'),('21','fa-lemon-o'),('22','fa-level-up'),('23','fa-life-bouy'),('24','fa-life-ring'),('25','fa-life-saver'),('26','fa-magic'),('27','fa-mail-reply-all'),('28','fa-minus'),('29','fa-minus-circle'),('30','fa-minus-square'),('31','fa-minus-square-o'),('32','fa-moon-o'),('33','fa-mortar-board'),('34','fa-paper-plane'),('35','fa-paper-plane-o'),('36','fa-pencil'),('37','fa-pencil-square'),('38','fa-pencil-square-o'),('39','fa-phone'),('40','fa-phone-square'),('41','fa-photo'),('42','fa-picture-o'),('43','fa-plane'),('44','fa-plus-circle'),('45','fa-puzzle-piece'),('46','fa-reply'),('47','fa-reply-all'),('48','fa-sort-down'),('49','fa-suitcase'),('50','fa-tachometer'),('51','fa-taxi'),('52','fa-toggle-down'),('53','fa-toggle-left'),('54','fa-toggle-right'),('55','fa-toggle-up'),('56','fa-unsorted'),('57','fa-warning'),('58','fa-bitcoin'),('59','fa-btc'),('60','fa-cny'),('61','fa-rouble'),('62','fa-rub'),('63','fa-ruble'),('64','fa-rupee'),('65','fa-try'),('66','fa-turkish-lira'),('67','fa-won'),('68','fa-yen'),('69','fa-clipboard'),('70','fa-columns'),('71','fa-dedent'),('72','fa-link'),('73','fa-outdent'),('74','fa-paste'),('75','fa-repeat'),('76','fa-rotate-left'),('77','fa-rotate-right'),('78','fa-save'),('79','fa-scissors'),('80','fa-subscript'),('81','fa-superscript'),('82','fa-unlink'),('83','fa-angle-double-down'),('84','fa-angle-double-left'),('85','fa-angle-double-right'),('86','fa-angle-double-up'),('87','fa-angle-down'),('88','fa-angle-left'),('89','fa-angle-right'),('90','fa-angle-up'),('91','fa-arrow-circle-down'),('92','fa-arrow-circle-left'),('93','fa-arrow-circle-o-down'),('94','fa-arrow-circle-o-left'),('95','fa-arrow-circle-o-right'),('96','fa-arrow-circle-o-up'),('97','fa-arrow-circle-right'),('98','fa-arrow-circle-up'),('99','fa-arrow-down'),('100','fa-arrow-left'),('101','fa-arrow-right'),('102','fa-arrow-up'),('103','fa-caret-down'),('104','fa-caret-left'),('105','fa-caret-right'),('106','fa-caret-up'),('107','fa-chevron-circle-down'),('108','fa-chevron-circle-left'),('109','fa-chevron-circle-right'),('110','fa-chevron-circle-up'),('111','fa-chevron-down'),('112','fa-chevron-left'),('113','fa-chevron-right'),('114','fa-chevron-up'),('115','fa-hand-o-down'),('116','fa-hand-o-left'),('117','fa-hand-o-right'),('118','fa-hand-o-up'),('119','fa-long-arrow-down'),('120','fa-long-arrow-left'),('121','fa-long-arrow-right'),('122','fa-long-arrow-up'),('123','fa-compress'),('124','fa-eject'),('125','fa-expand'),('126','fa-fast-forward'),('127','fa-forward'),('128','fa-play-circle-o'),('129','fa-step-backward'),('130','fa-step-forward'),('131','fa-stop'),('132','fa-youtube-play'),('133','fa-adn'),('134','fa-behance'),('135','fa-behance-square'),('136','fa-bitbucket'),('137','fa-bitbucket-square'),('138','fa-codepen'),('139','fa-css3'),('140','fa-delicious'),('141','fa-deviantart'),('142','fa-digg'),('143','fa-dribbble'),('144','fa-dropbox'),('145','fa-drupal'),('146','fa-empire'),('147','fa-facebook'),('148','fa-facebook-square'),('149','fa-flickr'),('150','fa-foursquare'),('151','fa-ge'),('152','fa-git'),('153','fa-git-square'),('154','fa-github'),('155','fa-github-alt'),('156','fa-github-square'),('157','fa-gittip'),('158','fa-google'),('159','fa-google-plus'),('160','fa-google-plus-square'),('161','fa-html5'),('162','fa-instagram'),('163','fa-joomla'),('164','fa-jsfiddle'),('165','fa-linkedin'),('166','fa-linkedin-square'),('167','fa-linux'),('168','fa-maxcdn'),('169','fa-openid'),('170','fa-pagelines'),('171','fa-pied-piper'),('172','fa-pied-piper-alt'),('173','fa-pied-piper-square'),('174','fa-pinterest'),('175','fa-pinterest-square'),('176','fa-ra'),('177','fa-rebel'),('178','fa-reddit'),('179','fa-reddit-square'),('180','fa-skype'),('181','fa-slack'),('182','fa-soundcloud'),('183','fa-spotify'),('184','fa-stack-exchange'),('185','fa-stack-overflow'),('186','fa-steam'),('187','fa-steam-square'),('188','fa-stumbleupon'),('189','fa-stumbleupon-circle'),('190','fa-trello'),('191','fa-tumblr'),('192','fa-tumblr-square'),('193','fa-twitter'),('194','fa-twitter-square'),('195','fa-vimeo-square'),('196','fa-vine'),('197','fa-vk'),('198','fa-wechat'),('199','fa-windows'),('200','fa-wordpress'),('201','fa-xing'),('202','fa-xing-square'),('203','fa-yahoo'),('204','fa-youtube'),('205','fa-youtube-square'),('206','fa-h-square'),('207','fa-user-md'),('208','fa-weixin'),('209','fa-car'),('210','fa-code'),('211','fa-circle'),('212','fa-cloud'),('213','fa-coffee'),('214','fa-comment'),('215','fa-comment-o'),('216','fa-comments'),('217','fa-comments-o'),('218','fa-compass'),('219','fa-credit-card'),('220','fa-crop'),('221','fa-exchange'),('222','fa-exclamation'),('223','fa-exclamation-circle'),('224','fa-exclamation-triangle'),('225','fa-external-link'),('226','fa-external-link-square'),('227','fa-fax'),('228','fa-fighter-jet'),('229','fa-gift'),('230','fa-glass'),('231','fa-globe'),('232','fa-graduation-cap');/* MySQLReback Separation */
 /* 插入数据 `lin_aosen` */
 INSERT INTO `lin_aosen` VALUES ('233','fa-group');/* MySQLReback Separation */
 /* 插入数据 `lin_aosen` */
 INSERT INTO `lin_aosen` VALUES ('234','fa-hdd-o'),('235','fa-meh-o'),('236','fa-recycle'),('237','fa-mobile-phone'),('238','fa-share'),('239','fa-sort'),('240','fa-sort-alpha-asc'),('241','fa-sort-alpha-desc'),('242','fa-sort-amount-asc'),('243','fa-sort-amount-desc'),('244','fa-sort-asc'),('245','fa-sort-desc'),('246','fa-sort-numeric-asc'),('247','fa-sort-numeric-desc'),('248','fa-sort-up'),('249','fa-space-shuttle'),('250','fa-star'),('251','fa-star-half'),('252','fa-star-half-empty'),('253','fa-star-half-full'),('254','fa-star-half-o'),('255','fa-star-o'),('256','fa-tencent-weibo'),('257','fa-weibo'),('258','fa-file-archive-o'),('259','fa-file-audio-o'),('260','fa-file-code-o'),('261','fa-file-excel-o'),('262','fa-file-image-o'),('263','fa-file-movie-o'),('264','fa-file-pdf-o'),('265','fa-file-photo-o'),('266','fa-file-picture-o'),('267','fa-file-powerpoint-o'),('268','fa-file-sound-o'),('269','fa-file-video-o'),('270','fa-file-word-o'),('271','fa-file-zip-o'),('272','fa-film'),('273','fa-ellipsis-h'),('274','fa-ellipsis-v'),('275','fa-headphones'),('276','fa-navicon'),('277','fa-music'),('278','fa-paw'),('279','fa-folder-open'),('280','fa-folder-open-o'),('281','fa-folder'),('282','fa-folder-o'),('283','fa-dashboard'),('284','fa-database'),('285','fa-qq'),('286','fa-volume-down'),('287','fa-volume-off'),('288','fa-volume-up'),('289','fa-video-camera'),('290','fa-hacker-news'),('291','fa-camera'),('292','fa-camera-retro'),('293','fa-child'),('294','fa-ambulance'),('295','fa-hospital-o'),('296','fa-stethoscope'),('297','fa-header'),('298','fa-backward'),('299','fa-fast-backward'),('300','fa-pause'),('301','fa-play'),('302','fa-play-circle'),('303','fa-mail-forward'),('304','fa-mail-reply'),('305','fa-italic'),('306','fa-location-arrow'),('307','fa-lock'),('308','fa-magnet'),('309','fa-shopping-cart'),('310','fa-home'),('311','fa-key'),('312','fa-calendar-o'),('313','fa-map-marker'),('314','fa-eur'),('315','fa-dollar'),('316','fa-euro'),('317','fa-gbp'),('318','fa-inr'),('319','fa-jpy'),('320','fa-krw'),('321','fa-money'),('322','fa-rmb'),('323','fa-usd'),('324','fa-chain'),('325','fa-chain-broken'),('326','fa-copy'),('327','fa-cut'),('328','fa-file'),('329','fa-file-o'),('330','fa-files-o'),('331','fa-floppy-o'),('332','fa-font'),('333','fa-smile-o'),('334','fa-laptop'),('335','fa-qrcode'),('336','fa-search'),('337','fa-cloud-download'),('338','fa-cloud-upload'),('339','fa-bold'),('340','fa-certificate'),('341','fa-eraser'),('342','fa-rocket'),('343','fa-arrows-h'),('344','fa-plus-square-o'),('345','fa-plus'),('346','fa-plus-square'),('347','fa-print'),('348','fa-check-circle'),('349','fa-check-square'),('350','fa-check-square-o'),('351','fa-share-alt'),('352','fa-share-alt-square'),('353','fa-share-square'),('354','fa-share-square-o'),('355','fa-shield'),('356','fa-times'),('357','fa-times-circle'),('358','fa-times-circle-o'),('359','fa-tint'),('360','fa-trophy'),('361','fa-quote-left'),('362','fa-quote-right'),('363','fa-random'),('364','fa-reorder'),('365','fa-retweet'),('366','fa-road'),('367','fa-rss'),('368','fa-rss-square'),('369','fa-send-o'),('370','fa-send'),('371','fa-sliders'),('372','fa-spoon'),('373','fa-sun-o'),('374','fa-support'),('375','fa-tablet'),('376','fa-tag'),('377','fa-tags'),('378','fa-tasks'),('379','fa-terminal'),('380','fa-thumb-tack'),('381','fa-ticket'),('382','fa-truck'),('383','fa-umbrella'),('384','fa-university'),('385','fa-unlock'),('386','fa-unlock-alt'),('387','fa-upload'),('388','fa-users'),('389','fa-wrench'),('390','fa-sign-out'),('391','fa-thumbs-down'),('392','fa-thumbs-o-down'),('393','fa-thumbs-o-up'),('394','fa-thumbs-up'),('395','fa-mobile'),('396','fa-microphone'),('397','fa-filter'),('398','fa-crosshairs'),('399','fa-question'),('400','fa-question-circle'),('401','fa-circle-o'),('402','fa-circle-o-notch'),('403','fa-barcode'),('404','fa-arrows'),('405','fa-automobile'),('406','fa-th-list'),('407','fa-android'),('408','fa-apple'),('409','fa-lightbulb-o'),('410','fa-microphone-slash'),('411','fa-clock-o'),('412','fa-cutlery'),('413','fa-fire'),('414','fa-fire-extinguisher'),('415','fa-flash'),('416','fa-flask'),('417','fa-gamepad'),('418','fa-language'),('419','fa-cog'),('420','fa-cogs'),('421','fa-frown-o'),('422','fa-flag'),('423','fa-flag-checkered'),('424','fa-flag-o'),('425','fa-underline'),('426','fa-undo'),('427','fa-arrows-alt'),('428','fa-file-text'),('429','fa-file-text-o'),('430','fa-power-off'),('431','fa-check'),('432','fa-envelope'),('433','fa-envelope-o'),('434','fa-envelope-square'),('435','fa-tree'),('436','fa-align-center'),('437','fa-align-justify'),('438','fa-align-left'),('439','fa-align-right'),('440','fa-indent'),('441','fa-list'),('442','fa-list-ol'),('443','fa-list-ul'),('444','fa-list-alt'),('445','fa-paperclip'),('446','fa-paragraph'),('447','fa-strikethrough'),('448','fa-text-height'),('449','fa-text-width'),('450','fa-search-plus'),('451','fa-search-minus'),('452','fa-signal'),('453','fa-sitemap'),('454','fa-renren'),('455','fa-spinner'),('456','fa-male'),('457','fa-female'),('458','fa-cube'),('459','fa-cubes'),('460','fa-table'),('461','fa-th'),('462','fa-th-large'),('463','fa-square'),('464','fa-square-o'),('465','fa-archive'),('466','fa-medkit'),('467','fa-user'),('468','fa-desktop'),('469','fa-sign-in'),('470','fa-trash-o'),('471','fa-adjust'),('472','fa-anchor'),('473','fa-wheelchair'),('474','fa-arrows-v');/* MySQLReback Separation */
 /* 插入数据 `lin_aosen` */
 INSERT INTO `lin_aosen` VALUES ('475','fa-asterisk');/* MySQLReback Separation */
 /* 插入数据 `lin_aosen` */
 INSERT INTO `lin_aosen` VALUES ('476','fa-ban'),('477','fa-bank'),('478','fa-bar-chart-o'),('479','fa-bars'),('480','fa-beer'),('481','fa-bell'),('482','fa-bell-o'),('483','fa-bolt'),('484','fa-bomb'),('485','fa-book'),('486','fa-bookmark-o'),('487','fa-bookmark'),('488','fa-briefcase'),('489','fa-bug'),('490','fa-building'),('491','fa-building-o'),('492','fa-bullhorn'),('493','fa-bullseye'),('494','fa-cab'),('495','fa-calendar'),('496','fa-edit'),('497','fa-download'),('498','fa-history'),('499','fa-level-down'),('500','fa-refresh'),('501','fa-eye'),('502','fa-eye-slash'),('503','fa-test-test'),('504','fa-bell-slash'),('505','fa-bell-slash-o'),('506','fa-cc-amex'),('507','fa-cc-discover'),('508','fa-cc-paypal'),('509','fa-cc-stripe'),('510','fa-copyright'),('511','fa-google-wallet'),('512','fa-ils'),('513','fa-ioxhost'),('514','fa-lastfm'),('515','fa-lastfm-square'),('516','fa-meanpath'),('517','fa-paypal'),('518','fa-shekel'),('519','fa-sheqel'),('520','fa-slideshare'),('521','fa-tty'),('522','fa-twitch'),('523','fa-yelp'),('524','fa-wifi'),('525','fa-trash'),('526','fa-toggle-on'),('527','fa-toggle-off'),('528','fa-soccer-ball-o'),('529','fa-plug'),('530','fa-pie-chart'),('531','fa-paint-brush'),('532','fa-newspaper-o'),('533','fa-line-chart'),('534','fa-futbol-o'),('535','fa-eyedropper'),('536','fa-cc-visa'),('537','fa-cc'),('538','fa-calculator'),('539','fa-bus'),('540','fa-birthday-cake'),('541','fa-binoculars'),('542','fa-bicycle'),('543','fa-at'),('544','fa-area-chart'),('545','fa-angellist'),('546','fa-cc-mastercard'),('547','fa-leaf');/* MySQLReback Separation */
 /* 创建表结构 `lin_api_app` */
 DROP TABLE IF EXISTS `lin_api_app`;/* MySQLReback Separation */ CREATE TABLE `lin_api_app` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(50) NOT NULL DEFAULT '' COMMENT '应用id',
  `app_secret` varchar(50) NOT NULL DEFAULT '' COMMENT '应用密码',
  `app_name` varchar(50) NOT NULL DEFAULT '' COMMENT '应用名称',
  `app_status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '应用状态：0表示禁用，1表示启用',
  `app_info` tinytext NOT NULL COMMENT '应用说明',
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id` (`app_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='appId和appSecret表';/* MySQLReback Separation */
 /* 创建表结构 `lin_api_fields` */
 DROP TABLE IF EXISTS `lin_api_fields`;/* MySQLReback Separation */ CREATE TABLE `lin_api_fields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fieldName` varchar(50) NOT NULL DEFAULT '' COMMENT '字段名称',
  `hash` varchar(50) NOT NULL DEFAULT '' COMMENT '对应接口的唯一标识',
  `dataType` tinyint(2) NOT NULL DEFAULT '0' COMMENT '数据类型，来源于DataType类库',
  `default` varchar(500) NOT NULL DEFAULT '' COMMENT '默认值',
  `isMust` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否必须 0为不必须，1为必须',
  `range` varchar(500) NOT NULL DEFAULT '' COMMENT '范围，Json字符串，根据数据类型有不一样的含义',
  `info` varchar(500) NOT NULL DEFAULT '' COMMENT '字段说明',
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '字段用处：0为request，1为response',
  `showName` varchar(50) NOT NULL DEFAULT '' COMMENT 'wiki显示用字段',
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用于保存各个API的字段规则';/* MySQLReback Separation */
 /* 插入数据 `lin_api_fields` */
 INSERT INTO `lin_api_fields` VALUES ('1','openid','59525bcb1a61c','1','1','1','1e21','21r21r','0','openid'),('2','openid','59525bcb1a61c','2','','1','','','1','openid'),('3','12412','59525bcb1a61c','1','124','1','41241','14124','0','12412'),('4','12121412','596b6e31a4040','1','12412','1','124124214','1241','0','12121412'),('5','data','59525bcb1a61c','9','','1','','','1','data');/* MySQLReback Separation */
 /* 创建表结构 `lin_api_list` */
 DROP TABLE IF EXISTS `lin_api_list`;/* MySQLReback Separation */ CREATE TABLE `lin_api_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `apiName` varchar(50) NOT NULL DEFAULT '' COMMENT 'api索引，保存了类和方法',
  `hash` varchar(50) NOT NULL DEFAULT '' COMMENT 'api唯一标识',
  `accessToken` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否需要认证AccessToken 1：需要，0：不需要',
  `needLogin` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否需要认证用户token  1：需要 0：不需要',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT 'API状态：0表示禁用，1表示启用',
  `method` tinyint(2) NOT NULL DEFAULT '2' COMMENT '请求方式0：不限1：Post，2：Get',
  `info` varchar(500) NOT NULL DEFAULT '' COMMENT 'api中文说明',
  `isTest` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否是测试模式：0:生产模式，1：测试模式',
  `returnStr` text COMMENT '返回数据示例',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用于维护接口信息';/* MySQLReback Separation */
 /* 插入数据 `lin_api_list` */
 INSERT INTO `lin_api_list` VALUES ('1','124124','59525bcb1a61c','1','1','1','1','24124','1','null');/* MySQLReback Separation */
 /* 创建表结构 `lin_app` */
 DROP TABLE IF EXISTS `lin_app`;/* MySQLReback Separation */ CREATE TABLE `lin_app` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(50) NOT NULL DEFAULT '' COMMENT '应用id',
  `app_secret` varchar(50) NOT NULL DEFAULT '' COMMENT '应用密码',
  `app_name` varchar(50) NOT NULL DEFAULT '' COMMENT '应用名称',
  `app_status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '应用状态：0表示禁用，1表示启用',
  `app_info` tinytext NOT NULL COMMENT '应用说明',
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id` (`app_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='appId和appSecret表';/* MySQLReback Separation */
 /* 插入数据 `lin_app` */
 INSERT INTO `lin_app` VALUES ('2','06580104','eqjYltMkPoKmkSyyVuXeiXbzBeVVJPaK','1242141','1','1241241');/* MySQLReback Separation */
 /* 创建表结构 `lin_article` */
 DROP TABLE IF EXISTS `lin_article`;/* MySQLReback Separation */ CREATE TABLE `lin_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(128) NOT NULL COMMENT '文章标题',
  `art_img` varchar(128) NOT NULL COMMENT '缩略图',
  `art_remark` varchar(256) NOT NULL COMMENT '描述',
  `art_keyword` varchar(64) NOT NULL COMMENT '关键词',
  `art_pid` int(11) NOT NULL COMMENT '关联栏目ID',
  `art_down` tinyint(2) DEFAULT '0' COMMENT '1为附件 ',
  `art_file` varchar(255) DEFAULT NULL COMMENT '附件路径',
  `art_addtime` int(10) NOT NULL COMMENT '时间戳格式',
  `art_content` text NOT NULL COMMENT '内容',
  `art_view` tinyint(2) NOT NULL COMMENT '显示，0为草稿，1为显示，2为推荐，3,置顶, {-1为删除(逻辑)',
  `art_reback` int(11) NOT NULL DEFAULT '0' COMMENT '收藏|喜欢数量',
  `art_hit` int(11) NOT NULL COMMENT '点击量',
  `art_url` varchar(128) NOT NULL COMMENT '非原创的转载地址',
  `art_original` tinyint(2) NOT NULL COMMENT '是否原创，0为不是，1为是',
  `art_from` varchar(128) NOT NULL COMMENT '来自',
  `art_author` varchar(32) NOT NULL COMMENT '作者',
  `art_city` varchar(16) NOT NULL COMMENT '城市',
  `art_downloadnums` int(11) DEFAULT '0' COMMENT '下载次数',
  `art_status` int(1) DEFAULT '0' COMMENT '1:已审核 0:未审核 -1:未通过',
  `art_isshow` int(1) DEFAULT '0' COMMENT '0:开放浏览,1:会员浏览',
  `art_publish` int(1) DEFAULT '1' COMMENT '是否立即发表  0:否1:是',
  `art_istop` int(1) DEFAULT '0' COMMENT '是否置顶  0:否 1:是',
  `art_isdel` int(1) DEFAULT '0' COMMENT '0:未删 1:已删',
  `art_com_num` int(10) DEFAULT NULL,
  PRIMARY KEY (`art_id`),
  KEY `a_title` (`art_title`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='青春博客文章发布表';/* MySQLReback Separation */
 /* 插入数据 `lin_article` */
 INSERT INTO `lin_article` VALUES ('1','aos.js动态页面滚动特效简要教程','images/2017-08-23/20170823092838964.png','aos.js是一款效果超赞的页面滚动元素动画jQuery动画库插件。该动画库可以在页面滚动时提供28种不同的元素动画效果，以及多种easing效果。在页面往回滚动时，元素会恢复到原来的状态。','','1','0','','1504259248','&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	使用方法
&lt;/h4&gt;
&lt;h4 style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	在页面中引入aos.css文件,jquery和aos.js文件&lt;br /&gt;
&amp;lt;link&amp;nbsp;rel=&quot;stylesheet&quot;&amp;nbsp;href=&quot;dist/aos.css&quot;&amp;nbsp;/&amp;gt;&lt;br /&gt;
&amp;lt;script&amp;nbsp;src=&quot;js/jquery.min.js&quot;&amp;gt;&amp;lt;/script&amp;gt;&lt;br /&gt;
&amp;lt;script&amp;nbsp;src=&quot;dist/aos.js&quot;&amp;gt;&amp;lt;/script&amp;gt;&lt;br /&gt;
要使用aos动画库，你需要做的就是在需要动画的元素上添加aos属性，例如：&lt;br /&gt;
&lt;span style=&quot;font-family:Consolas;background-color:#FBFBFB;&quot;&gt;&amp;lt;div&amp;nbsp;aos=&quot;animation_name&quot;&amp;gt;&lt;/span&gt;&lt;br /&gt;
aos脚本将会在页面滚动时，在该元素上触发相应的动画。&lt;br /&gt;
在元素上还可以添加以下一些属性：
	&lt;table style=&quot;font-size:15px;color:#333333;font-family:微软雅黑;&quot;&gt;
		&lt;tbody&gt;
			&lt;tr class=&quot;firstRow&quot;&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;属性&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;属性&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;属性&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;默认值&lt;/span&gt; 
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-offset
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					是立刻触发动画还是在指定时间之后触发动画
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					200
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					120
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-duration
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					动画持续时间
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					600
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					400
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-easing
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					动画的easing动画效果
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					ease-in-sine
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					ease
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-delay
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					动画的延迟时间
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					300
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					0
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-anchor
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					锚元素。使用它的偏移来取代实际元素的偏移来触发动画
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					#selector
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					null
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-anchor-placement
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					锚位置，触发动画时元素位于屏幕的位置
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					top-center
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					top-bottom
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-once
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					动画是否只会触发一次，或者每次上下滚动都会触发
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					true
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					false
				&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
注意，aos-duration的动画持续时间的范围从50-3000毫秒，如果你想设置更大的值，可以在页面中添加下面的CSS代码：&lt;br /&gt;
body[aos-duration=\'4000\']&amp;nbsp;[aos],&amp;nbsp;[aos][aos][aos-duration=\'4000\']{&lt;br /&gt;
&amp;nbsp;&amp;nbsp;transition-duration:&amp;nbsp;4000ms;&lt;br /&gt;
}&lt;br /&gt;
上面的代码将动画的持续时间修改为4000毫秒。&lt;br /&gt;
如果你担心HTML5校验的问题，可以为上面的属性添加data-前缀。&lt;br /&gt;
&lt;span style=&quot;color:#333333;font-family:Consolas;font-size:16px;background-color:#FBFBFB;&quot;&gt;&amp;lt;div&amp;nbsp;data-aos=&quot;animation_name&quot;&amp;nbsp;data-aos-offset=&quot;200&quot;&amp;nbsp;data-aos-easing=&quot;ease-in-sine&quot;&amp;gt;&lt;/span&gt;&lt;br /&gt;
如果你不想单独每个元素做一个动画配置，你可以通过init()方法来统一配置所有元素的动画效果。&lt;br /&gt;
AOS.init({&lt;br /&gt;
&amp;nbsp;&amp;nbsp;offset:&amp;nbsp;200,&lt;br /&gt;
&amp;nbsp;&amp;nbsp;duration:&amp;nbsp;600,&lt;br /&gt;
&amp;nbsp;&amp;nbsp;easing:&amp;nbsp;\'ease-in-sine\',&lt;br /&gt;
&amp;nbsp;&amp;nbsp;delay:&amp;nbsp;100,&lt;br /&gt;
});&lt;br /&gt;
AOS提供了2个额外的配置方法，这些方法只能够在初始化时使用。
	&lt;table style=&quot;font-size:15px;color:#333333;font-family:微软雅黑;&quot;&gt;
		&lt;tbody&gt;
			&lt;tr class=&quot;firstRow&quot;&gt;
				&lt;td width=&quot;149&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;配置&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;385&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;描述&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;示例值&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;默认值&lt;/span&gt; 
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;149&quot; valign=&quot;top&quot;&gt;
					disable
				&lt;/td&gt;
				&lt;td width=&quot;385&quot; valign=&quot;top&quot;&gt;
					AOS被禁用的条件
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					mobile
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					false
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;149&quot; valign=&quot;top&quot;&gt;
					startEvent
				&lt;/td&gt;
				&lt;td width=&quot;385&quot; valign=&quot;top&quot;&gt;
					AOS被初始化的事件名称
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					exampleEvent
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					DOMContentLoaded
				&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
&lt;span style=&quot;font-weight:700;&quot;&gt;禁用AOS：&lt;/span&gt;&lt;br /&gt;
如果你项在小屏幕设备中禁用AOS，可以：&lt;br /&gt;
AOS.init({&lt;br /&gt;
&amp;nbsp;&amp;nbsp;disable:&amp;nbsp;\'mobile\'&lt;br /&gt;
});&lt;br /&gt;
你可以传入3种设备的类型：mobile、phone或tablet。&lt;br /&gt;
你也可以设置自己的禁用条件，例如在屏幕小于1024像素时禁用AOS：&lt;br /&gt;
或者传入一个函数，返回true或false。&lt;br /&gt;
disable:&amp;nbsp;function&amp;nbsp;()&amp;nbsp;{&lt;br /&gt;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;var&amp;nbsp;maxWidth&amp;nbsp;=&amp;nbsp;1024;&lt;br /&gt;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;window.innerWidth&amp;nbsp;&amp;lt;&amp;nbsp;maxWidth;&lt;br /&gt;
}&lt;br /&gt;
如果你不想滚动动画从页面加载（DOMContentLoaded）后就开始执行，可以使用startEvent来设置自己的事件，AOS会在document上监听这个事件：&lt;br /&gt;
AOS.init({&lt;br /&gt;
&amp;nbsp;&amp;nbsp;startEvent:&amp;nbsp;\'someCoolEvent\'&lt;br /&gt;
});&lt;br /&gt;
AOS对象有2个可用的方法：&lt;br /&gt;
init&lt;br /&gt;
refresh&lt;span&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;&lt;br /&gt;
&lt;/span&gt;&lt;/span&gt;上面的代码会重新计算元素的位置和偏移。&lt;br /&gt;
&lt;span style=&quot;font-weight:700;&quot;&gt;动画&lt;/span&gt;&lt;br /&gt;
淡入淡出动画：&lt;br /&gt;
fade-up&lt;br /&gt;
fade-down&lt;br /&gt;
fade-left&lt;br /&gt;
fade-right&lt;br /&gt;
fade-up-right&lt;br /&gt;
fade-up-left&lt;br /&gt;
fade-down-right&lt;br /&gt;
fade-down-left&lt;br /&gt;
翻转动画：&lt;br /&gt;
flip-up&lt;br /&gt;
flip-down&lt;br /&gt;
flip-left&lt;br /&gt;
flip-right&lt;br /&gt;
滑动动画：&lt;br /&gt;
slide-up&lt;br /&gt;
slide-down&lt;br /&gt;
slide-left&lt;br /&gt;
slide-right&lt;br /&gt;
缩放动画：&lt;br /&gt;
zoom-in&lt;br /&gt;
zoom-in-up&lt;br /&gt;
zoom-in-down&lt;br /&gt;
zoom-in-left&lt;br /&gt;
zoom-in-right&lt;br /&gt;
zoom-out&lt;br /&gt;
zoom-out-up&lt;br /&gt;
zoom-out-down&lt;br /&gt;
zoom-out-left&lt;br /&gt;
zoom-out-right&lt;br /&gt;
锚位置&lt;br /&gt;
top-bottom&lt;br /&gt;
top-center&lt;br /&gt;
top-top&lt;br /&gt;
center-bottom&lt;br /&gt;
center-center&lt;br /&gt;
center-top&lt;br /&gt;
bottom-bottom&lt;br /&gt;
bottom-center&lt;br /&gt;
bottom-top&lt;br /&gt;
easing动画&lt;br /&gt;
你可以使用以下的一些easing动画效果：&lt;br /&gt;
linear&lt;br /&gt;
ease&lt;br /&gt;
ease-in&lt;br /&gt;
ease-out&lt;br /&gt;
ease-in-out&lt;br /&gt;
ease-in-back&lt;br /&gt;
ease-out-back&lt;br /&gt;
ease-in-out-back&lt;br /&gt;
ease-in-sine&lt;br /&gt;
ease-out-sine&lt;br /&gt;
ease-in-out-sine&lt;br /&gt;
ease-in-quad&lt;br /&gt;
ease-out-quad&lt;br /&gt;
ease-in-out-quad&lt;br /&gt;
ease-in-cubic&lt;br /&gt;
ease-out-cubic&lt;br /&gt;
ease-in-out-cubic&lt;br /&gt;
ease-in-quart&lt;br /&gt;
ease-out-quart&lt;br /&gt;
ease-in-out-quart
&lt;/h4&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	HTML结构
&lt;/h4&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	示例代码：
&lt;/h4&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	全局配置
&lt;/h4&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	额外配置
&lt;/h4&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	开始动画的事件：
&lt;/h4&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	API
&lt;/h4&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	动画和锚位置
&lt;/h4&gt;','0','517','40','','0','','豆豆妈','','0','1','0','1','0','1','');/* MySQLReback Separation */
 /* 插入数据 `lin_article` */
 INSERT INTO `lin_article` VALUES ('3','layui上传头像图片等','images/2017-08-23/201708230945204038.png','本例介绍layui 的upload方法上传头像等','','126','0','','1505464738','&lt;pre&gt;&amp;lt;html&amp;gt;
&amp;nbsp;&amp;lt;head&amp;gt;&amp;lt;/head&amp;gt;
&amp;nbsp;&amp;lt;body&amp;gt;
&amp;nbsp; &amp;lt;div class=&quot;layui-form-item&quot;&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;nbsp;&amp;lt;label class=&quot;layui-form-label&quot;&amp;gt;上传头像&amp;lt;/label&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;nbsp;&amp;lt;div class=&quot;layui-input-block&quot;&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;nbsp; &amp;lt;div class=&quot;face-img&quot;&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;lt;img id=&quot;upload&quot; src=&quot;/uploads/20170217\\1290ff6d12ed787005b05a7c28b1bfa5.jpg&quot; /&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;lt;div class=&quot;site-demo-upload&quot;&amp;gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;input type=&quot;file&quot; name=&quot;file&quot; class=&quot;layui-upload-file&quot; /&amp;gt;
&amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;lt;/div&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;nbsp;&amp;lt;/div&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;lt;/div&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;lt;script type=&quot;text/javascript&quot; src=&quot;__PUBLIC__/common/layui/layui.js&quot;&amp;gt;&amp;lt;/script&amp;gt;&amp;nbsp;
&amp;nbsp; &amp;lt;script type=&quot;text/javascript&quot;&amp;gt; &lt;span&gt; &lt;/span&gt;layui.use([\'form\',\'upload\',\'jquery\'],function(){ &lt;span&gt; &lt;/span&gt;window.jQuery = window.$ = layui.jquery;
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;var form = layui.form();
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;layui.upload({&amp;nbsp;
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;url: \'{:url(\'upload/index\')}\' ,//上传接口&amp;nbsp;
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;success: function(res){
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; //上传成功后的回调&amp;nbsp;
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $(&quot;#upload&quot;).attr(&quot;src&quot;,res.src);
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; console.log(res.src);
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&amp;nbsp;
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;}); &lt;span&gt; &lt;/span&gt;});
&amp;lt;/script&amp;gt; 后台php的代码&amp;nbsp;
&amp;nbsp; &amp;lt;!--?php
/***
**layui上传的后台接口
&amp;nbsp;*/
namespace app\\admin\\controller;
use \\think\\Controller;

class Upload extends Controller
{

&amp;nbsp; &amp;nbsp; public function index(){
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $ret = array(); &amp;nbsp;//返回的上传文件状态数组
&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if ($_FILES[&quot;file&quot;][&quot;error&quot;] --&amp;gt; 0) { $ret[&amp;amp;quot;message&amp;amp;quot;] = $_FILES[&amp;amp;quot;file&amp;amp;quot;][&amp;amp;quot;error&amp;amp;quot;] ; $ret[&amp;amp;quot;status&amp;amp;quot;] = 0; $ret[&amp;amp;quot;src&amp;amp;quot;] = &amp;amp;quot;&amp;amp;quot;; return json($ret); }else{ $pic = $this-&amp;amp;gt;upload(); if($pic[\'info\']== 1){ $url = \'/uploads/\'.$pic[\'savename\']; } else { $ret[&amp;amp;quot;message&amp;amp;quot;] = $this-&amp;amp;gt;error($pic[\'err\']); $ret[&amp;amp;quot;status&amp;amp;quot;] = 0; } $ret[&amp;amp;quot;message&amp;amp;quot;]= &amp;amp;quot;图片上传成功！&amp;amp;quot;; $ret[&amp;amp;quot;status&amp;amp;quot;] = 1; $ret[&amp;amp;quot;src&amp;amp;quot;] = $url; return json($ret); } } //图片上传代码 private function upload(){ $file = request()-&amp;amp;gt;file(\'file\'); // 移动到框架应用根目录/public/uploads/ 目录下 $info = $file-&amp;amp;gt;move(ROOT_PATH . \'public\' . DS . \'uploads\'); $reubfo = array(); //定义一个返回的数组 if($info){ $reubfo[\'info\']= 1; $reubfo[\'savename\'] = $info-&amp;amp;gt;getSaveName(); }else{ // 上传失败获取错误信息 $reubfo[\'info\']= 0; $reubfo[\'err\'] = $file-&amp;amp;gt;getError();; } return $reubfo; } }&amp;nbsp;
&amp;nbsp;&amp;lt;/body&amp;gt;
&amp;lt;/html&amp;gt;
&lt;/pre&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;','0','0','78','','0','','豆豆妈','','0','1','0','1','0','0','');/* MySQLReback Separation */
 /* 插入数据 `lin_article` */
 INSERT INTO `lin_article` VALUES ('5','layui 结合JQuery.dataTables 渲染数据','images/2017-08-23/201708230945204038.png','thinkphp 框架下使用layui 和dataTable 渲染数据表格,包括layui.open的URL写法等','','126','0','','1503452725','&lt;p&gt;本例数据采用jQuery.dataTable渲染,直接上代码&lt;/p&gt;&lt;p&gt;&amp;lt;fieldset class=&amp;quot;layui-elem-field&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;legend&amp;gt;文章列表&amp;lt;/legend&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-field-box&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;form class=&amp;quot;layui-form&amp;quot; id=&amp;quot;form-admin-add&amp;quot; action=&amp;quot;&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-form-item&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-inline&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;select name=&amp;quot;type&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;&amp;quot;&amp;gt;请选择查询方式&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;1&amp;quot;&amp;gt;作者&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;2&amp;quot;&amp;gt;发布时间&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;3&amp;quot;&amp;gt;已发布&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;4&amp;quot;&amp;gt;未发布&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;5&amp;quot;&amp;gt;待回复&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/select&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-inline&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-input-inline&amp;quot; style=&amp;quot;width: 300px;&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;input type=&amp;quot;text&amp;quot; name=&amp;quot;keyword&amp;quot; placeholder=&amp;quot;请输入关键词&amp;quot; class=&amp;quot;layui-input&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-inline&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;span class=&amp;quot;layui-btn sub&amp;quot;&amp;gt;查询&amp;lt;/span&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-inline&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;&amp;lt;span class=&amp;quot;layui-btn layui-btn-normal art-add&amp;quot;&amp;gt;&amp;lt;i class=&amp;quot;layui-icon&amp;quot;&amp;gt;&amp;amp;#xe608;&amp;lt;/i&amp;gt; 新增&amp;lt;/span&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/form&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;table class=&amp;quot;layui-table&amp;quot; id=&amp;quot;list-admin&amp;quot; lay-even&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;thead&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;tr&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;缩略图&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;标题&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;发布时间&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;作者&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;状态&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;操作&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/tr&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/thead&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/table&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;/fieldset&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;lt;/block&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;lt;block name=&amp;quot;myScript&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;script type=&amp;quot;text/javascript&amp;quot; src=&amp;quot;__PUBLIC__/dataTable/jquery.dataTables.min.js&amp;quot;&amp;gt;&amp;lt;/script&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;link rel=&amp;quot;stylesheet&amp;quot; href=&amp;quot;__PUBLIC__/css/dataTable.css&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;script&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; /**&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;* 格式化时间戳&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;* @param fmt&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;* @returns {*}&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;* @constructor&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;*/&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Date.prototype.Format = function (fmt) {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var o = {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;M+&amp;quot;: this.getMonth() + 1, //月份&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;d+&amp;quot;: this.getDate(), //日&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;h+&amp;quot;: this.getHours(), //小时&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;m+&amp;quot;: this.getMinutes(), //分&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;s+&amp;quot;: this.getSeconds(), //秒&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;q+&amp;quot;: Math.floor((this.getMonth() + 3) / 3), //季度&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;S&amp;quot;: this.getMilliseconds() //毫秒&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; };&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + &amp;quot;&amp;quot;).substr(4 - RegExp.$1.length));&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; for (var k in o)&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if (new RegExp(&amp;quot;(&amp;quot; + k + &amp;quot;)&amp;quot;).test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : ((&amp;quot;00&amp;quot; + o[k]).substr((&amp;quot;&amp;quot; + o[k]).length)));&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return fmt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; };&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layui.use([&amp;#39;layer&amp;#39;, &amp;#39;form&amp;#39;], function() {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $(document).on(&amp;#39;click&amp;#39;, &amp;#39;.confirm&amp;#39;, function () {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var ownObj = $(this);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layer.confirm(ownObj.attr(&amp;#39;data-info&amp;#39;), {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; btn: [&amp;#39;确定&amp;#39;,&amp;#39;取消&amp;#39;] //按钮&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }, function(){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $.ajax({&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; type: &amp;quot;POST&amp;quot;,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; url: ownObj.attr(&amp;#39;data-url&amp;#39;),&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; data: {id:ownObj.attr(&amp;#39;data-id&amp;#39;)},&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; success: function(msg){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if( msg.code == 1 ){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; location.reload();&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }else{&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layer.msg(msg.msg, {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; icon: 5,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; shade: [0.6, &amp;#39;#393D49&amp;#39;],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; time:1500&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $(&amp;#39;.art-add&amp;#39;).on(&amp;#39;click&amp;#39;, function () {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layer.open({&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; type: 2,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; area: [&amp;#39;100%&amp;#39;, &amp;#39;100%&amp;#39;],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; maxmin: true,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; content: &amp;#39;{:U(&amp;quot;add&amp;quot;)}&amp;#39;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $(document).on(&amp;#39;click&amp;#39;, &amp;#39;.edit&amp;#39;, function () {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var ownObj = $(this);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var id = ownObj.attr(&amp;#39;data-id&amp;#39;);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layer.open({&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; type: 2,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; area: [&amp;#39;100%&amp;#39;, &amp;#39;100%&amp;#39;],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; maxmin: true,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; content: &amp;quot;{:U(&amp;#39;Admin/Article/edit/id/&amp;quot; + id + &amp;quot;&amp;#39;)}&amp;quot;,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var myFun = function (query) {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; query = query || &amp;#39;&amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return $(&amp;#39;#list-admin&amp;#39;).DataTable({&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; dom: &amp;#39;rt&amp;lt;&amp;quot;bottom&amp;quot;ifpl&amp;gt;&amp;lt;&amp;quot;clear&amp;quot;&amp;gt;&amp;#39;,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; ordering: false,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; autoWidth: false,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; searching: false,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; serverSide: true,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; ajax: {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; url:&amp;#39;{:U(&amp;quot;index&amp;quot;)}&amp;#39; + query,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; type: &amp;#39;POST&amp;#39;,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; dataSrc: function ( json ) {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;console.log(json);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if( json.code == 0 ){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; parent.layer.msg(json.msg, {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; icon: 5,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; shade: [0.6, &amp;#39;#393D49&amp;#39;],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; time:1500&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }else{&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;console.log(json.data);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return json.data;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; columnDefs:[&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;{&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;&amp;quot;targets&amp;quot;:0,&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;&amp;quot;render&amp;quot;: function(data, type, row){&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;var returnStr = &amp;#39;&amp;#39;;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;returnStr += &amp;#39;&amp;lt;img style=&amp;quot;width:120px&amp;quot; src=&amp;quot;__PUBLIC__/img/dou.png&amp;quot; &amp;gt; &amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return returnStr;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;}&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;},&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;targets&amp;quot;:2,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;render&amp;quot;: function(data, type, row){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return new Date(row.art_addtime*1000).Format(&amp;quot;yyyy-MM-dd hh:mm:ss&amp;quot;);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;targets&amp;quot;:5,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;render&amp;quot;:function(data, type, row){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var returnStr = &amp;#39;&amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; returnStr += &amp;#39;&amp;lt;span class=&amp;quot;layui-btn edit layui-btn-normal&amp;quot; &amp;#39; + &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;#39;data-id=&amp;quot;&amp;#39; + row.art_id +&amp;#39;&amp;quot; &amp;gt;编辑&amp;lt;/span&amp;gt;&amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; returnStr += &amp;#39;&amp;lt;span class=&amp;quot;layui-btn layui-btn-danger confirm&amp;quot; &amp;#39; +&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;#39;data-id=&amp;quot;&amp;#39; + row.art_id +&amp;#39;&amp;quot; data-info=&amp;quot;你确定删除当前文章？&amp;quot; data-url=&amp;quot;{:U(\\&amp;#39;del\\&amp;#39;)}&amp;quot;&amp;gt;删除&amp;lt;/span&amp;gt;&amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return returnStr;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; ],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; iDisplayLength : 20,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; aLengthMenu : [20, 30, 50],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; columns: [&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_img&amp;quot;},&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_title&amp;quot;},&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_addtime&amp;quot; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_author&amp;quot; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_status&amp;quot; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: null }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; ]&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; };&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var myTable = myFun();&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $(&amp;#39;.sub&amp;#39;).on(&amp;quot;click&amp;quot;, function(){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; myTable.destroy();&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; myTable = myFun(&amp;#39;&amp;amp;&amp;#39;+ $(&amp;#39;#form-admin-add&amp;#39;).serialize());&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;/script&amp;gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','0','0','67','','0','','豆豆妈','','0','1','0','1','0','0','');/* MySQLReback Separation */
 /* 插入数据 `lin_article` */
 INSERT INTO `lin_article` VALUES ('6','移动端 点击链接后显示加载中样式','images/2017-08-23/201708230924244312.png','本例介绍移动端网页点击链接时,显示加载中的样式,增强用户体验','','122','0','','1505047069','','0','0','30','','0','','豆豆妈','','0','0','0','1','0','0',''),('7','我QQ','','王天文','','1','0','','1501300091','&lt;p&gt;人情味若群无若&lt;br/&gt;&lt;/p&gt;','0','0','269','','0','','九月一十八','','0','0','0','1','0','1',''),('9','242141','','','','1','0','','1501167146','','0','0','9','','0','','九月一十八','','0','0','0','1','0','1','');/* MySQLReback Separation */
 /* 插入数据 `lin_article` */
 INSERT INTO `lin_article` VALUES ('10','ThinkPHP使用find_in_set查询数据','images/2017-08-23/201708230924141760.jpeg','mysql中find_in_set函数很有意思，它的功能是查找以英文逗号隔开的值，我们可以将数据存储类似为1,2,3,4格式。今天我们就来看看在thinkphp中怎样正确地使用find_in_set函数进行数据查询。','','1','0','','1505464664','&lt;p style=&quot;font-size:14px;text-align:justify;text-indent:2em;color:#555555;font-family:&amp;quot;background-color:#FFFFFF;&quot;&gt;
	mysql中&lt;a href=&quot;http://www.dawnfly.cn/&quot; target=&quot;_blank&quot;&gt;find_in_set函数&lt;span class=&quot;icon-link&quot; style=&quot;font-family:ality;line-height:1;&quot;&gt;&lt;/span&gt;&lt;/a&gt;很有意思，它的功能是查找以英文逗号隔开的值，我们可以将数据存储类似为1,2,3,4格式。今天我们就来看看在thinkphp中怎样正确地使用find_in_set函数进行数据查询。
&lt;/p&gt;
&lt;p style=&quot;font-size:14px;text-align:justify;text-indent:2em;color:#555555;font-family:&amp;quot;background-color:#FFFFFF;&quot;&gt;
	在ThinkPHP中， 我们可以使用数组的形式组合查询条件，对于组装find_in_set时，可以有如下写法：
&lt;/p&gt;
&lt;p style=&quot;font-size:14px;text-align:justify;text-indent:2em;color:#555555;font-family:&amp;quot;background-color:#FFFFFF;&quot;&gt;
	还可以组合多个find_in_set查询一起使用：
&lt;/p&gt;
&lt;p style=&quot;font-size:14px;text-align:justify;text-indent:2em;color:#555555;font-family:&amp;quot;background-color:#FFFFFF;&quot;&gt;
	&lt;span style=&quot;font-family:Monaco, Menlo, Consolas, &amp;quot;font-size:13px !important;background:none !important;vertical-align:baseline !important;&quot;&gt;$map[\'_string\']=&quot;FIND_IN_SET(1,tid)&quot;;//tid为表字段&lt;/span&gt; 
&lt;/p&gt;
&lt;p style=&quot;font-size:14px;text-align:justify;text-indent:2em;color:#555555;font-family:&amp;quot;background-color:#FFFFFF;&quot;&gt;
	&lt;span style=&quot;font-family:Monaco, Menlo, Consolas, &amp;quot;font-size:13px !important;background:none !important;vertical-align:baseline !important;&quot;&gt;$map[\'_string\']&amp;nbsp;=&amp;nbsp;&quot;FIND_IN_SET(1,tid)&amp;nbsp;OR&amp;nbsp;FIND_IN_SET(2,tid)&amp;nbsp;OR&amp;nbsp;FIND_IN_SET(3,tid)&amp;nbsp;OR&amp;nbsp;FIND_IN_SET(4,tid)&quot;;&lt;/span&gt;&lt;span style=&quot;font-family:&amp;quot;font-size:12px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/span&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;span style=&quot;color:#555555;font-family:&amp;quot;background-color:#FFFFFF;font-size:14px;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;最后生成的sql语句如下所示：&lt;/span&gt;
&lt;/p&gt;
&lt;div class=&quot;line number1 index0 alt2&quot; style=&quot;font-family:Monaco, Menlo, Consolas, &amp;quot;border:0px !important;font-size:13px !important;background:none !important;vertical-align:baseline !important;margin:0px !important;padding:0px 1em !important;&quot;&gt;
	&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;SELECT&amp;nbsp;`id`,`title`,`enname`,`futitle`,`picture`,`content`&amp;nbsp;FROM&amp;nbsp;`tp_content`&amp;nbsp;WHERE&amp;nbsp;`is_recover`&amp;nbsp;=&amp;nbsp;0&amp;nbsp;AND&amp;nbsp;`cityid`&amp;nbsp;=&amp;nbsp;2
&lt;/div&gt;
&lt;div class=&quot;line number2 index1 alt1&quot; style=&quot;font-family:Monaco, Menlo, Consolas, &amp;quot;border:0px !important;font-size:13px !important;background:none !important;vertical-align:baseline !important;margin:0px !important;padding:0px 1em !important;&quot;&gt;
	&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;AND&amp;nbsp;(&amp;nbsp;`cate_id`&amp;nbsp;=&amp;nbsp;\'1\'&amp;nbsp;OR&amp;nbsp;`cate_pid`&amp;nbsp;=&amp;nbsp;\'1\'&amp;nbsp;)&amp;nbsp;AND&amp;nbsp;(&amp;nbsp;FIND_IN_SET(1,tid)&amp;nbsp;OR&amp;nbsp;FIND_IN_SET(2,tid)&amp;nbsp;OR&amp;nbsp;FIND_IN_SET(3,tid)&amp;nbsp;OR&amp;nbsp;FIND_IN_SET(4,tid)&amp;nbsp;)&amp;nbsp;
&lt;/div&gt;
&lt;div class=&quot;line number3 index2 alt2&quot; style=&quot;font-family:Monaco, Menlo, Consolas, &amp;quot;border:0px !important;font-size:13px !important;background:none !important;vertical-align:baseline !important;margin:0px !important;padding:0px 1em !important;&quot;&gt;
	&amp;nbsp; &amp;nbsp; ORDER&amp;nbsp;BY&amp;nbsp;add_time&amp;nbsp;desc,id&amp;nbsp;desc&amp;nbsp;LIMIT&amp;nbsp;0,10
&lt;/div&gt;
&lt;p style=&quot;font-size:14px;text-align:justify;text-indent:2em;color:#555555;font-family:&amp;quot;background-color:#FFFFFF;&quot;&gt;
	&lt;br /&gt;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;总之，在特定的场合,find_in_set给我们带来了很多方便，反正博主就觉得数据的存储变得简单多了。
&lt;/p&gt;','0','0','22','','0','','豆豆妈','','0','0','0','1','0','0','');/* MySQLReback Separation */
 /* 创建表结构 `lin_article_category` */
 DROP TABLE IF EXISTS `lin_article_category`;/* MySQLReback Separation */ CREATE TABLE `lin_article_category` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `parentid` int(10) DEFAULT NULL,
  `spread` varchar(255) DEFAULT '1',
  `is_display` int(1) DEFAULT '1',
  `displayorder` int(10) DEFAULT '1',
  `level` int(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_article_category` */
 INSERT INTO `lin_article_category` VALUES ('1','PHP','fa-paypal','','0','1','1','1','0'),('121','CSS','fa-css3','','0','1','1','1','0'),('122','JQUERY','','','0','1','1','1','0'),('123','AJAX','','','0','1','1','1','0'),('124','MYSQL','fa-maxcdn','','0','1','1','1','0'),('125','HTML','fa-html5','','0','1','1','1','0'),('126','LAYUI','','','122','1','1','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lin_article_copy` */
 DROP TABLE IF EXISTS `lin_article_copy`;/* MySQLReback Separation */ CREATE TABLE `lin_article_copy` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(128) NOT NULL COMMENT '文章标题',
  `art_img` varchar(128) NOT NULL COMMENT '缩略图',
  `art_remark` varchar(256) NOT NULL COMMENT '描述',
  `art_keyword` varchar(64) NOT NULL COMMENT '关键词',
  `art_pid` int(11) NOT NULL COMMENT '关联栏目ID',
  `art_down` tinyint(2) DEFAULT '0' COMMENT '1为附件 ',
  `art_file` varchar(255) DEFAULT NULL COMMENT '附件路径',
  `art_addtime` int(10) NOT NULL COMMENT '时间戳格式',
  `art_content` text NOT NULL COMMENT '内容',
  `art_view` tinyint(2) NOT NULL COMMENT '显示，0为草稿，1为显示，2为推荐，3,置顶, {-1为删除(逻辑)',
  `art_reback` int(11) NOT NULL DEFAULT '0' COMMENT '收藏|喜欢数量',
  `art_hit` int(11) NOT NULL COMMENT '点击量',
  `art_url` varchar(128) NOT NULL COMMENT '非原创的转载地址',
  `art_original` tinyint(2) NOT NULL COMMENT '是否原创，0为不是，1为是',
  `art_from` varchar(128) NOT NULL COMMENT '来自',
  `art_author` varchar(32) NOT NULL COMMENT '作者',
  `art_city` varchar(16) NOT NULL COMMENT '城市',
  `art_downloadnums` int(11) DEFAULT '0' COMMENT '下载次数',
  `art_status` int(1) DEFAULT '0' COMMENT '1:已审核 0:未审核 -1:未通过',
  `art_isshow` int(1) DEFAULT '0' COMMENT '0:开放浏览,1:会员浏览',
  `art_publish` int(1) DEFAULT '1' COMMENT '是否立即发表  0:否1:是',
  `art_istop` int(1) DEFAULT '0' COMMENT '是否置顶  0:否 1:是',
  `art_isdel` int(1) DEFAULT '0' COMMENT '0:未删 1:已删',
  PRIMARY KEY (`art_id`),
  KEY `a_title` (`art_title`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='青春博客文章发布表';/* MySQLReback Separation */
 /* 插入数据 `lin_article_copy` */
 INSERT INTO `lin_article_copy` VALUES ('1','aos.js动态页面滚动特效简要教程','images/2017-08-23/20170823092838964.png','aos.js是一款效果超赞的页面滚动元素动画jQuery动画库插件。该动画库可以在页面滚动时提供28种不同的元素动画效果，以及多种easing效果。在页面往回滚动时，元素会恢复到原来的状态。','','1','0','','1504259248','&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	使用方法
&lt;/h4&gt;
&lt;h4 style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	在页面中引入aos.css文件,jquery和aos.js文件&lt;br /&gt;
&amp;lt;link&amp;nbsp;rel=&quot;stylesheet&quot;&amp;nbsp;href=&quot;dist/aos.css&quot;&amp;nbsp;/&amp;gt;&lt;br /&gt;
&amp;lt;script&amp;nbsp;src=&quot;js/jquery.min.js&quot;&amp;gt;&amp;lt;/script&amp;gt;&lt;br /&gt;
&amp;lt;script&amp;nbsp;src=&quot;dist/aos.js&quot;&amp;gt;&amp;lt;/script&amp;gt;&lt;br /&gt;
要使用aos动画库，你需要做的就是在需要动画的元素上添加aos属性，例如：&lt;br /&gt;
&lt;span style=&quot;font-family:Consolas;background-color:#FBFBFB;&quot;&gt;&amp;lt;div&amp;nbsp;aos=&quot;animation_name&quot;&amp;gt;&lt;/span&gt;&lt;br /&gt;
aos脚本将会在页面滚动时，在该元素上触发相应的动画。&lt;br /&gt;
在元素上还可以添加以下一些属性：
	&lt;table style=&quot;font-size:15px;color:#333333;font-family:微软雅黑;&quot;&gt;
		&lt;tbody&gt;
			&lt;tr class=&quot;firstRow&quot;&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;属性&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;属性&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;属性&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;默认值&lt;/span&gt; 
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-offset
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					是立刻触发动画还是在指定时间之后触发动画
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					200
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					120
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-duration
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					动画持续时间
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					600
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					400
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-easing
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					动画的easing动画效果
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					ease-in-sine
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					ease
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-delay
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					动画的延迟时间
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					300
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					0
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-anchor
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					锚元素。使用它的偏移来取代实际元素的偏移来触发动画
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					#selector
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					null
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-anchor-placement
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					锚位置，触发动画时元素位于屏幕的位置
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					top-center
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					top-bottom
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;171&quot; valign=&quot;top&quot;&gt;
					aos-once
				&lt;/td&gt;
				&lt;td width=&quot;573&quot; valign=&quot;top&quot;&gt;
					动画是否只会触发一次，或者每次上下滚动都会触发
				&lt;/td&gt;
				&lt;td width=&quot;154&quot; valign=&quot;top&quot;&gt;
					true
				&lt;/td&gt;
				&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt;
					false
				&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
注意，aos-duration的动画持续时间的范围从50-3000毫秒，如果你想设置更大的值，可以在页面中添加下面的CSS代码：&lt;br /&gt;
body[aos-duration=\'4000\']&amp;nbsp;[aos],&amp;nbsp;[aos][aos][aos-duration=\'4000\']{&lt;br /&gt;
&amp;nbsp;&amp;nbsp;transition-duration:&amp;nbsp;4000ms;&lt;br /&gt;
}&lt;br /&gt;
上面的代码将动画的持续时间修改为4000毫秒。&lt;br /&gt;
如果你担心HTML5校验的问题，可以为上面的属性添加data-前缀。&lt;br /&gt;
&lt;span style=&quot;color:#333333;font-family:Consolas;font-size:16px;background-color:#FBFBFB;&quot;&gt;&amp;lt;div&amp;nbsp;data-aos=&quot;animation_name&quot;&amp;nbsp;data-aos-offset=&quot;200&quot;&amp;nbsp;data-aos-easing=&quot;ease-in-sine&quot;&amp;gt;&lt;/span&gt;&lt;br /&gt;
如果你不想单独每个元素做一个动画配置，你可以通过init()方法来统一配置所有元素的动画效果。&lt;br /&gt;
AOS.init({&lt;br /&gt;
&amp;nbsp;&amp;nbsp;offset:&amp;nbsp;200,&lt;br /&gt;
&amp;nbsp;&amp;nbsp;duration:&amp;nbsp;600,&lt;br /&gt;
&amp;nbsp;&amp;nbsp;easing:&amp;nbsp;\'ease-in-sine\',&lt;br /&gt;
&amp;nbsp;&amp;nbsp;delay:&amp;nbsp;100,&lt;br /&gt;
});&lt;br /&gt;
AOS提供了2个额外的配置方法，这些方法只能够在初始化时使用。
	&lt;table style=&quot;font-size:15px;color:#333333;font-family:微软雅黑;&quot;&gt;
		&lt;tbody&gt;
			&lt;tr class=&quot;firstRow&quot;&gt;
				&lt;td width=&quot;149&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;配置&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;385&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;描述&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;示例值&lt;/span&gt; 
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					&lt;span style=&quot;font-weight:700;&quot;&gt;默认值&lt;/span&gt; 
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;149&quot; valign=&quot;top&quot;&gt;
					disable
				&lt;/td&gt;
				&lt;td width=&quot;385&quot; valign=&quot;top&quot;&gt;
					AOS被禁用的条件
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					mobile
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					false
				&lt;/td&gt;
			&lt;/tr&gt;
			&lt;tr&gt;
				&lt;td width=&quot;149&quot; valign=&quot;top&quot;&gt;
					startEvent
				&lt;/td&gt;
				&lt;td width=&quot;385&quot; valign=&quot;top&quot;&gt;
					AOS被初始化的事件名称
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					exampleEvent
				&lt;/td&gt;
				&lt;td width=&quot;267&quot; valign=&quot;top&quot;&gt;
					DOMContentLoaded
				&lt;/td&gt;
			&lt;/tr&gt;
		&lt;/tbody&gt;
	&lt;/table&gt;
&lt;span style=&quot;font-weight:700;&quot;&gt;禁用AOS：&lt;/span&gt;&lt;br /&gt;
如果你项在小屏幕设备中禁用AOS，可以：&lt;br /&gt;
AOS.init({&lt;br /&gt;
&amp;nbsp;&amp;nbsp;disable:&amp;nbsp;\'mobile\'&lt;br /&gt;
});&lt;br /&gt;
你可以传入3种设备的类型：mobile、phone或tablet。&lt;br /&gt;
你也可以设置自己的禁用条件，例如在屏幕小于1024像素时禁用AOS：&lt;br /&gt;
或者传入一个函数，返回true或false。&lt;br /&gt;
disable:&amp;nbsp;function&amp;nbsp;()&amp;nbsp;{&lt;br /&gt;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;var&amp;nbsp;maxWidth&amp;nbsp;=&amp;nbsp;1024;&lt;br /&gt;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;window.innerWidth&amp;nbsp;&amp;lt;&amp;nbsp;maxWidth;&lt;br /&gt;
}&lt;br /&gt;
如果你不想滚动动画从页面加载（DOMContentLoaded）后就开始执行，可以使用startEvent来设置自己的事件，AOS会在document上监听这个事件：&lt;br /&gt;
AOS.init({&lt;br /&gt;
&amp;nbsp;&amp;nbsp;startEvent:&amp;nbsp;\'someCoolEvent\'&lt;br /&gt;
});&lt;br /&gt;
AOS对象有2个可用的方法：&lt;br /&gt;
init&lt;br /&gt;
refresh&lt;span&gt;&lt;span style=&quot;font-size:16px;&quot;&gt;&lt;br /&gt;
&lt;/span&gt;&lt;/span&gt;上面的代码会重新计算元素的位置和偏移。&lt;br /&gt;
&lt;span style=&quot;font-weight:700;&quot;&gt;动画&lt;/span&gt;&lt;br /&gt;
淡入淡出动画：&lt;br /&gt;
fade-up&lt;br /&gt;
fade-down&lt;br /&gt;
fade-left&lt;br /&gt;
fade-right&lt;br /&gt;
fade-up-right&lt;br /&gt;
fade-up-left&lt;br /&gt;
fade-down-right&lt;br /&gt;
fade-down-left&lt;br /&gt;
翻转动画：&lt;br /&gt;
flip-up&lt;br /&gt;
flip-down&lt;br /&gt;
flip-left&lt;br /&gt;
flip-right&lt;br /&gt;
滑动动画：&lt;br /&gt;
slide-up&lt;br /&gt;
slide-down&lt;br /&gt;
slide-left&lt;br /&gt;
slide-right&lt;br /&gt;
缩放动画：&lt;br /&gt;
zoom-in&lt;br /&gt;
zoom-in-up&lt;br /&gt;
zoom-in-down&lt;br /&gt;
zoom-in-left&lt;br /&gt;
zoom-in-right&lt;br /&gt;
zoom-out&lt;br /&gt;
zoom-out-up&lt;br /&gt;
zoom-out-down&lt;br /&gt;
zoom-out-left&lt;br /&gt;
zoom-out-right&lt;br /&gt;
锚位置&lt;br /&gt;
top-bottom&lt;br /&gt;
top-center&lt;br /&gt;
top-top&lt;br /&gt;
center-bottom&lt;br /&gt;
center-center&lt;br /&gt;
center-top&lt;br /&gt;
bottom-bottom&lt;br /&gt;
bottom-center&lt;br /&gt;
bottom-top&lt;br /&gt;
easing动画&lt;br /&gt;
你可以使用以下的一些easing动画效果：&lt;br /&gt;
linear&lt;br /&gt;
ease&lt;br /&gt;
ease-in&lt;br /&gt;
ease-out&lt;br /&gt;
ease-in-out&lt;br /&gt;
ease-in-back&lt;br /&gt;
ease-out-back&lt;br /&gt;
ease-in-out-back&lt;br /&gt;
ease-in-sine&lt;br /&gt;
ease-out-sine&lt;br /&gt;
ease-in-out-sine&lt;br /&gt;
ease-in-quad&lt;br /&gt;
ease-out-quad&lt;br /&gt;
ease-in-out-quad&lt;br /&gt;
ease-in-cubic&lt;br /&gt;
ease-out-cubic&lt;br /&gt;
ease-in-out-cubic&lt;br /&gt;
ease-in-quart&lt;br /&gt;
ease-out-quart&lt;br /&gt;
ease-in-out-quart
&lt;/h4&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	HTML结构
&lt;/h4&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	示例代码：
&lt;/h4&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	全局配置
&lt;/h4&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	额外配置
&lt;/h4&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	开始动画的事件：
&lt;/h4&gt;
&lt;p style=&quot;color:#333333;font-family:微软雅黑;font-size:16px;&quot;&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	API
&lt;/h4&gt;
&lt;p&gt;
	&lt;br /&gt;
&lt;/p&gt;
&lt;h4 style=&quot;font-family:微软雅黑;font-weight:400;color:#333333;font-size:22px;&quot;&gt;
	动画和锚位置
&lt;/h4&gt;','0','517','36','','0','','豆豆妈','','0','1','0','1','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_article_copy` */
 INSERT INTO `lin_article_copy` VALUES ('3','layui上传头像图片等','','本例介绍layui 的upload方法上传头像等','','126','0','','1500733638','&lt;pre style=&quot;margin-top: 10px; margin-bottom: 10px; padding: 10px 15px; background-color: rgb(242, 242, 242); -webkit-tap-highlight-color: rgba(0, 0, 0, 0); white-space: pre-wrap; word-wrap: break-word; font-size: 12px; border-left: 6px solid rgb(0, 150, 136); font-family: &amp;quot;Courier New&amp;quot;; overflow: auto;&quot;&gt;&amp;lt;div&amp;nbsp;class=&amp;quot;layui-form-item&amp;quot;&amp;gt;
&amp;lt;label&amp;nbsp;class=&amp;quot;layui-form-label&amp;quot;&amp;gt;上传头像&amp;lt;/label&amp;gt;
&amp;nbsp;&amp;nbsp;&amp;lt;div&amp;nbsp;class=&amp;quot;layui-input-block&amp;quot;&amp;gt;						
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;div&amp;nbsp;class=&amp;quot;face-img&amp;quot;&amp;gt;
	&amp;nbsp;&amp;lt;img&amp;nbsp;id=&amp;quot;upload&amp;quot;&amp;nbsp;src=&amp;quot;/uploads/20170217\\1290ff6d12ed787005b05a7c28b1bfa5.jpg&amp;quot;&amp;gt;
	&amp;nbsp;&amp;lt;div&amp;nbsp;class=&amp;quot;site-demo-upload&amp;quot;&amp;gt;&amp;lt;input&amp;nbsp;type=&amp;quot;file&amp;quot;&amp;nbsp;name=&amp;quot;file&amp;quot;&amp;nbsp;class=&amp;quot;layui-upload-file&amp;quot;&amp;gt;&amp;lt;/div&amp;gt;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;lt;/div&amp;gt;
&amp;nbsp;&amp;nbsp;&amp;lt;/div&amp;gt;					
&amp;lt;/div&amp;gt;

&amp;lt;script&amp;nbsp;type=&amp;quot;text/javascript&amp;quot;&amp;nbsp;src=&amp;quot;__PUBLIC__/common/layui/layui.js&amp;quot;&amp;gt;&amp;lt;/script&amp;gt;
&amp;lt;script&amp;nbsp;type=&amp;quot;text/javascript&amp;quot;&amp;gt;
	layui.use([&amp;#39;form&amp;#39;,&amp;#39;upload&amp;#39;,&amp;#39;jquery&amp;#39;],function(){
		window.jQuery&amp;nbsp;=&amp;nbsp;window.$&amp;nbsp;=&amp;nbsp;layui.jquery;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;var&amp;nbsp;form&amp;nbsp;=&amp;nbsp;layui.form();
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;layui.upload({&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;url:&amp;nbsp;&amp;#39;{:url(&amp;#39;upload/index&amp;#39;)}&amp;#39;&amp;nbsp;,//上传接口&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;success:&amp;nbsp;function(res){
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//上传成功后的回调&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$(&amp;quot;#upload&amp;quot;).attr(&amp;quot;src&amp;quot;,res.src);
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;console.log(res.src);
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;});

	});
&amp;lt;/script&amp;gt;&lt;/pre&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, &amp;quot;PingFang SC&amp;quot;, 微软雅黑, Tahoma, Arial, sans-serif; background-color: rgb(255, 255, 255);&quot;&gt;后台php的代码&lt;/span&gt;&lt;/p&gt;&lt;pre style=&quot;margin-top: 10px; margin-bottom: 10px; padding: 10px 15px; background-color: rgb(242, 242, 242); -webkit-tap-highlight-color: rgba(0, 0, 0, 0); white-space: pre-wrap; word-wrap: break-word; font-size: 12px; border-left: 6px solid rgb(0, 150, 136); font-family: &amp;quot;Courier New&amp;quot;; overflow: auto;&quot;&gt;&amp;lt;?php
/***
**layui上传的后台接口
&amp;nbsp;*/
namespace&amp;nbsp;app\\admin\\controller;
use&amp;nbsp;\\think\\Controller;

class&amp;nbsp;Upload&amp;nbsp;extends&amp;nbsp;Controller
{

&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;public&amp;nbsp;function&amp;nbsp;index(){
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$ret&amp;nbsp;=&amp;nbsp;array();&amp;nbsp;&amp;nbsp;//返回的上传文件状态数组
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if&amp;nbsp;($_FILES[&amp;quot;file&amp;quot;][&amp;quot;error&amp;quot;]&amp;nbsp;&amp;gt;&amp;nbsp;0)
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;{
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$ret[&amp;quot;message&amp;quot;]&amp;nbsp;=&amp;nbsp;&amp;nbsp;$_FILES[&amp;quot;file&amp;quot;][&amp;quot;error&amp;quot;]&amp;nbsp;;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$ret[&amp;quot;status&amp;quot;]&amp;nbsp;=&amp;nbsp;0;&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$ret[&amp;quot;src&amp;quot;]&amp;nbsp;=&amp;nbsp;&amp;quot;&amp;quot;;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;json($ret);&amp;nbsp;&amp;nbsp;&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}else{
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$pic&amp;nbsp;=&amp;nbsp;&amp;nbsp;$this-&amp;gt;upload();
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if($pic[&amp;#39;info&amp;#39;]==&amp;nbsp;1){&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$url&amp;nbsp;=&amp;nbsp;&amp;#39;/uploads/&amp;#39;.$pic[&amp;#39;savename&amp;#39;];
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}&amp;nbsp;&amp;nbsp;else&amp;nbsp;{
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$ret[&amp;quot;message&amp;quot;]&amp;nbsp;=&amp;nbsp;$this-&amp;gt;error($pic[&amp;#39;err&amp;#39;]);
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$ret[&amp;quot;status&amp;quot;]&amp;nbsp;=&amp;nbsp;0;&amp;nbsp;&amp;nbsp;&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$ret[&amp;quot;message&amp;quot;]=&amp;nbsp;&amp;quot;图片上传成功！&amp;quot;;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$ret[&amp;quot;status&amp;quot;]&amp;nbsp;=&amp;nbsp;1;&amp;nbsp;&amp;nbsp;&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$ret[&amp;quot;src&amp;quot;]&amp;nbsp;=&amp;nbsp;$url;&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;json($ret);
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}&amp;nbsp;

&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}


&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//图片上传代码
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;private&amp;nbsp;&amp;nbsp;function&amp;nbsp;upload(){
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$file&amp;nbsp;=&amp;nbsp;request()-&amp;gt;file(&amp;#39;file&amp;#39;);&amp;nbsp;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//&amp;nbsp;移动到框架应用根目录/public/uploads/&amp;nbsp;目录下
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$info&amp;nbsp;=&amp;nbsp;$file-&amp;gt;move(ROOT_PATH&amp;nbsp;.&amp;nbsp;&amp;#39;public&amp;#39;&amp;nbsp;.&amp;nbsp;DS&amp;nbsp;.&amp;nbsp;&amp;#39;uploads&amp;#39;);
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$reubfo&amp;nbsp;=&amp;nbsp;array();&amp;nbsp;&amp;nbsp;//定义一个返回的数组
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if($info){
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$reubfo[&amp;#39;info&amp;#39;]=&amp;nbsp;1;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$reubfo[&amp;#39;savename&amp;#39;]&amp;nbsp;=&amp;nbsp;$info-&amp;gt;getSaveName();
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}else{
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//&amp;nbsp;上传失败获取错误信息
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$reubfo[&amp;#39;info&amp;#39;]=&amp;nbsp;0;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$reubfo[&amp;#39;err&amp;#39;]&amp;nbsp;=&amp;nbsp;$file-&amp;gt;getError();;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;$reubfo;
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}

}&lt;/pre&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','0','0','50','','0','','root','','0','1','0','1','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_article_copy` */
 INSERT INTO `lin_article_copy` VALUES ('5','layui 结合JQuery.dataTables 渲染数据','images/2017-08-23/201708230945204038.png','thinkphp 框架下使用layui 和dataTable 渲染数据表格,包括layui.open的URL写法等','','126','0','','1503452725','&lt;p&gt;本例数据采用jQuery.dataTable渲染,直接上代码&lt;/p&gt;&lt;p&gt;&amp;lt;fieldset class=&amp;quot;layui-elem-field&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;legend&amp;gt;文章列表&amp;lt;/legend&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-field-box&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;form class=&amp;quot;layui-form&amp;quot; id=&amp;quot;form-admin-add&amp;quot; action=&amp;quot;&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-form-item&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-inline&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;select name=&amp;quot;type&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;&amp;quot;&amp;gt;请选择查询方式&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;1&amp;quot;&amp;gt;作者&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;2&amp;quot;&amp;gt;发布时间&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;3&amp;quot;&amp;gt;已发布&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;4&amp;quot;&amp;gt;未发布&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;option value=&amp;quot;5&amp;quot;&amp;gt;待回复&amp;lt;/option&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/select&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-inline&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-input-inline&amp;quot; style=&amp;quot;width: 300px;&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;input type=&amp;quot;text&amp;quot; name=&amp;quot;keyword&amp;quot; placeholder=&amp;quot;请输入关键词&amp;quot; class=&amp;quot;layui-input&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-inline&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;span class=&amp;quot;layui-btn sub&amp;quot;&amp;gt;查询&amp;lt;/span&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;div class=&amp;quot;layui-inline&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;&amp;lt;span class=&amp;quot;layui-btn layui-btn-normal art-add&amp;quot;&amp;gt;&amp;lt;i class=&amp;quot;layui-icon&amp;quot;&amp;gt;&amp;amp;#xe608;&amp;lt;/i&amp;gt; 新增&amp;lt;/span&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/form&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;table class=&amp;quot;layui-table&amp;quot; id=&amp;quot;list-admin&amp;quot; lay-even&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;thead&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;tr&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;缩略图&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;标题&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;发布时间&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;作者&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;状态&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;th&amp;gt;操作&amp;lt;/th&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/tr&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/thead&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/table&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;lt;/div&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;/fieldset&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;lt;/block&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;lt;block name=&amp;quot;myScript&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;script type=&amp;quot;text/javascript&amp;quot; src=&amp;quot;__PUBLIC__/dataTable/jquery.dataTables.min.js&amp;quot;&amp;gt;&amp;lt;/script&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;link rel=&amp;quot;stylesheet&amp;quot; href=&amp;quot;__PUBLIC__/css/dataTable.css&amp;quot;&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;script&amp;gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; /**&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;* 格式化时间戳&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;* @param fmt&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;* @returns {*}&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;* @constructor&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;*/&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Date.prototype.Format = function (fmt) {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var o = {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;M+&amp;quot;: this.getMonth() + 1, //月份&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;d+&amp;quot;: this.getDate(), //日&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;h+&amp;quot;: this.getHours(), //小时&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;m+&amp;quot;: this.getMinutes(), //分&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;s+&amp;quot;: this.getSeconds(), //秒&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;q+&amp;quot;: Math.floor((this.getMonth() + 3) / 3), //季度&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;S&amp;quot;: this.getMilliseconds() //毫秒&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; };&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + &amp;quot;&amp;quot;).substr(4 - RegExp.$1.length));&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; for (var k in o)&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if (new RegExp(&amp;quot;(&amp;quot; + k + &amp;quot;)&amp;quot;).test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : ((&amp;quot;00&amp;quot; + o[k]).substr((&amp;quot;&amp;quot; + o[k]).length)));&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return fmt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; };&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layui.use([&amp;#39;layer&amp;#39;, &amp;#39;form&amp;#39;], function() {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $(document).on(&amp;#39;click&amp;#39;, &amp;#39;.confirm&amp;#39;, function () {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var ownObj = $(this);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layer.confirm(ownObj.attr(&amp;#39;data-info&amp;#39;), {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; btn: [&amp;#39;确定&amp;#39;,&amp;#39;取消&amp;#39;] //按钮&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }, function(){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $.ajax({&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; type: &amp;quot;POST&amp;quot;,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; url: ownObj.attr(&amp;#39;data-url&amp;#39;),&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; data: {id:ownObj.attr(&amp;#39;data-id&amp;#39;)},&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; success: function(msg){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if( msg.code == 1 ){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; location.reload();&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }else{&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layer.msg(msg.msg, {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; icon: 5,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; shade: [0.6, &amp;#39;#393D49&amp;#39;],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; time:1500&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $(&amp;#39;.art-add&amp;#39;).on(&amp;#39;click&amp;#39;, function () {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layer.open({&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; type: 2,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; area: [&amp;#39;100%&amp;#39;, &amp;#39;100%&amp;#39;],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; maxmin: true,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; content: &amp;#39;{:U(&amp;quot;add&amp;quot;)}&amp;#39;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $(document).on(&amp;#39;click&amp;#39;, &amp;#39;.edit&amp;#39;, function () {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var ownObj = $(this);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var id = ownObj.attr(&amp;#39;data-id&amp;#39;);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; layer.open({&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; type: 2,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; area: [&amp;#39;100%&amp;#39;, &amp;#39;100%&amp;#39;],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; maxmin: true,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; content: &amp;quot;{:U(&amp;#39;Admin/Article/edit/id/&amp;quot; + id + &amp;quot;&amp;#39;)}&amp;quot;,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var myFun = function (query) {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; query = query || &amp;#39;&amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return $(&amp;#39;#list-admin&amp;#39;).DataTable({&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; dom: &amp;#39;rt&amp;lt;&amp;quot;bottom&amp;quot;ifpl&amp;gt;&amp;lt;&amp;quot;clear&amp;quot;&amp;gt;&amp;#39;,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; ordering: false,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; autoWidth: false,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; searching: false,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; serverSide: true,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; ajax: {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; url:&amp;#39;{:U(&amp;quot;index&amp;quot;)}&amp;#39; + query,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; type: &amp;#39;POST&amp;#39;,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; dataSrc: function ( json ) {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;console.log(json);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; if( json.code == 0 ){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; parent.layer.msg(json.msg, {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; icon: 5,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; shade: [0.6, &amp;#39;#393D49&amp;#39;],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; time:1500&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }else{&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;console.log(json.data);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return json.data;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; columnDefs:[&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;{&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;&amp;quot;targets&amp;quot;:0,&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;&amp;quot;render&amp;quot;: function(data, type, row){&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;var returnStr = &amp;#39;&amp;#39;;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;returnStr += &amp;#39;&amp;lt;img style=&amp;quot;width:120px&amp;quot; src=&amp;quot;__PUBLIC__/img/dou.png&amp;quot; &amp;gt; &amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return returnStr;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp;}&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;white-space:pre&quot;&gt;&lt;/span&gt;},&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;targets&amp;quot;:2,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;render&amp;quot;: function(data, type, row){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return new Date(row.art_addtime*1000).Format(&amp;quot;yyyy-MM-dd hh:mm:ss&amp;quot;);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;targets&amp;quot;:5,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;quot;render&amp;quot;:function(data, type, row){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var returnStr = &amp;#39;&amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; returnStr += &amp;#39;&amp;lt;span class=&amp;quot;layui-btn edit layui-btn-normal&amp;quot; &amp;#39; + &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;#39;data-id=&amp;quot;&amp;#39; + row.art_id +&amp;#39;&amp;quot; &amp;gt;编辑&amp;lt;/span&amp;gt;&amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; returnStr += &amp;#39;&amp;lt;span class=&amp;quot;layui-btn layui-btn-danger confirm&amp;quot; &amp;#39; +&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;#39;data-id=&amp;quot;&amp;#39; + row.art_id +&amp;#39;&amp;quot; data-info=&amp;quot;你确定删除当前文章？&amp;quot; data-url=&amp;quot;{:U(\\&amp;#39;del\\&amp;#39;)}&amp;quot;&amp;gt;删除&amp;lt;/span&amp;gt;&amp;#39;;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; return returnStr;&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; ],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; iDisplayLength : 20,&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; aLengthMenu : [20, 30, 50],&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; columns: [&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_img&amp;quot;},&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_title&amp;quot;},&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_addtime&amp;quot; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_author&amp;quot; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: &amp;quot;art_status&amp;quot; },&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; {data: null }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; ]&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; };&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; var myTable = myFun();&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; $(&amp;#39;.sub&amp;#39;).on(&amp;quot;click&amp;quot;, function(){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; myTable.destroy();&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; myTable = myFun(&amp;#39;&amp;amp;&amp;#39;+ $(&amp;#39;#form-admin-add&amp;#39;).serialize());&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; });&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;lt;/script&amp;gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','0','0','35','','0','','豆豆妈','','0','1','0','1','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_article_copy` */
 INSERT INTO `lin_article_copy` VALUES ('6','移动端 点击链接后显示加载中样式','','本例介绍移动端网页点击链接时,显示加载中的样式,增强用户体验','','122','0','','1504259254','','0','0','13','','0','','豆豆妈','','0','0','0','1','0','0'),('7','我QQ','','王天文','','1','0','','1501300091','&lt;p&gt;人情味若群无若&lt;br/&gt;&lt;/p&gt;','0','0','48','','0','','九月一十八','','0','0','0','1','0','1'),('9','242141','','','','1','0','','1501167146','','0','0','6','','0','','九月一十八','','0','0','0','1','0','1');/* MySQLReback Separation */
 /* 创建表结构 `lin_auth_group` */
 DROP TABLE IF EXISTS `lin_auth_group`;/* MySQLReback Separation */ CREATE TABLE `lin_auth_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '组名称',
  `description` varchar(50) NOT NULL COMMENT '组描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '组状态：为1正常，为0禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='权限组';/* MySQLReback Separation */
 /* 插入数据 `lin_auth_group` */
 INSERT INTO `lin_auth_group` VALUES ('1','超级管理员','使用所有功能','1'),('2','一般管理员','管理一般功能','1');/* MySQLReback Separation */
 /* 创建表结构 `lin_auth_group_access` */
 DROP TABLE IF EXISTS `lin_auth_group_access`;/* MySQLReback Separation */ CREATE TABLE `lin_auth_group_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `groupId` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户和组的对应关系';/* MySQLReback Separation */
 /* 插入数据 `lin_auth_group_access` */
 INSERT INTO `lin_auth_group_access` VALUES ('1','1','1'),('2','3','2'),('3','2','1'),('4','4','2');/* MySQLReback Separation */
 /* 创建表结构 `lin_auth_rule` */
 DROP TABLE IF EXISTS `lin_auth_rule`;/* MySQLReback Separation */ CREATE TABLE `lin_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `url` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `groupId` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '权限所属组的ID',
  `auth` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '权限数值',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=utf8 COMMENT='权限细节';/* MySQLReback Separation */
 /* 插入数据 `lin_auth_rule` */
 INSERT INTO `lin_auth_rule` VALUES ('53','Admin/Index/index','1','0','1'),('56','Admin/Log/index','1','0','1'),('57','Admin/Log/ajaxGetIndex','1','0','1'),('58','Admin/Log/del','1','0','1'),('59','Admin/Log/showDetail','1','0','1'),('60','Admin/User/index','1','0','1'),('61','Admin/User/add','1','0','1'),('62','Admin/User/del','1','0','1'),('63','Admin/User/open','1','0','1'),('64','Admin/User/close','1','0','1'),('65','Admin/Permission/group','1','0','1'),('66','Admin/permission/index','1','0','1'),('67','Admin/Permission/add','1','0','1'),('68','Admin/Permission/del','1','0','1'),('69','Admin/Permission/edit','1','0','1'),('70','Admin/Permission/close','1','0','1'),('71','Admin/Permission/open','1','0','1'),('72','Admin/Permission/rule','1','0','1'),('73','Admin/Permission/member','1','0','1'),('74','Admin/Member/index','1','0','1'),('75','Admin/Member/message','1','0','1'),('76','Admin/Member/level','1','0','1'),('77','Admin/Menu/index','1','0','1'),('78','Admin/Menu/add','1','0','1'),('79','Admin/Menu/edit','1','0','1'),('80','Admin/Menu/del','1','0','1'),('81','Admin/Menu/open','1','0','1'),('82','Admin/Bak/index','1','0','1'),('83','Admin/Bak/add','1','0','1'),('84','Admin/Bak/edit','1','0','1'),('85','Admin/System/tools','1','0','1'),('87','Admin/Images/index','1','0','1'),('88','Admin/Images/index','1','0','1'),('89','Admin/Images/add','1','0','1'),('90','Admin/Images/del','1','0','1'),('92','Admin/ImagesCategory/index','1','0','1'),('93','Admin/ImagesCategory/add','1','0','1'),('94','Admin/ImagesCategory/edit','1','0','1'),('95','Admin/ImagesCategory/del','1','0','1'),('96','Admin/Video/index','1','0','1'),('97','Admin/Video/add','1','0','1'),('98','Admin/Video/edit','1','0','1'),('99','Admin/Video/del','1','0','1'),('100','Admin/VideoCategory/index','1','0','1'),('101','Admin/VideoCategory/add','1','0','1'),('102','Admin/VideoCategory/edit','1','0','1'),('103','Admin/VideoCategory/del','1','0','1'),('106','Admin/Wechat/pay','1','0','1'),('116','Admin/Index/index','2','0','1'),('117','Admin/User/index','2','0','1'),('118','Admin/permission/index','2','0','1'),('119','Admin/Member/index','2','0','1'),('120','Admin/Member/message','2','0','1'),('121','Admin/Member/level','2','0','1'),('122','Admin/Log/index','2','0','1'),('123','Admin/Menu/index','2','0','1'),('124','Admin/Bak/index','2','0','1'),('125','Admin/System/tools','2','0','1'),('129','Admin/Images/index','2','0','1'),('130','Admin/Images/index','2','0','1'),('131','Admin/ImagesCategory/index','2','0','1'),('132','Admin/Video/index','2','0','1'),('133','Admin/VideoCategory/index','2','0','1'),('135','Admin/Wechat/pay','2','0','1'),('139','Admin/Index/manage','1','0','1'),('140','Admin/Member/manage','1','0','1'),('141','Admin/Member/points','1','0','1'),('142','Admin/Sale/index','1','0','1'),('147','Admin/Store/index','1','0','1'),('148','Admin/Store/category','1','0','1'),('149','Admin/Store/floor','1','0','1'),('150','Admin/Content/manage','1','0','1'),('151','Admin/Web/manage','1','0','1'),('152','Admin/Article/index','1','0','1'),('153','Admin/Article/add','1','0','1'),('154','Admin/Article/edit','1','0','1'),('155','Admin/Article/del','1','0','1'),('156','Admin/ArticleCategory/index','1','0','1'),('157','Admin/ArticleCategory/add','1','0','1'),('158','Admin/ArticleCategory/edit','1','0','1'),('159','Admin/ArticleCategory/del','1','0','1'),('160','Admin/Article/show','1','0','1'),('161','Admin/Web/tags','1','0','1'),('163','Admin/Link/index','1','0','1'),('164','Admin/Web/index','1','0','1'),('165','Admin/Web/add','1','0','1'),('166','Admin/Web/edit','1','0','1'),('167','Admin/Web/del','1','0','1'),('168','Admin/Images/manage','1','0','1'),('170','Admin/Attachment/manage','1','0','1'),('171','Admin/Attachment/upload','1','0','1'),('172','Admin/Attachment/datamanage','1','0','1'),('173','Admin/Filemanage/index','1','0','1'),('174','Admin/Video/manage','1','0','1'),('175','Admin/Banner/manage','1','0','1'),('176','Admin/Banner/index','1','0','1'),('177','Admin/Banner/wangmeng','1','0','1'),('178','Admin/Renew/manage','1','0','1'),('179','Admin/Renew/map','1','0','1'),('180','Admin/Renew/keyword','1','0','1'),('181','Admin/Extend/manage','1','0','1'),('182','Admin/Wechat/manage','1','0','1'),('183','Admin/Wechat/api','1','0','1'),('184','Admin/Alipay/manage','1','0','1'),('185','Admin/Application/manage','1','0','1'),('186','Admin/App/index','1','0','1'),('187','Admin/ApiManage/index','1','0','1'),('188','Admin/System/manage','1','0','1'),('189','Admin/System/man','1','0','1'),('190','Admin/System/parameter','1','0','1'),('191','Admin/System/sqltool','1','0','1'),('192','Admin/System/safevolidate','1','0','1'),('193','Admin/System/watermark','1','0','1'),('194','Admin/System/safedictionary','1','0','1'),('195','Admin/System/smsapi','1','0','1'),('196','Admin/System/liandong','1','0','1'),('197','Admin/Icon/index','1','0','1'),('198','Admin/System/zdybd','1','0','1'),('200','Admin/Index/desktop','1','0','1'),('201','Admin/User/manage','1','0','1'),('202','Admin/User/edit','1','0','1'),('203','Admin/Banner/manage','1','0','1'),('204','Admin/FileUpload/ajax_upload','1','0','1'),('205','Admin/Upload/upload','1','0','1'),('206','Admin/Upload/manager','1','0','1'),('207','Admin/FileUpload/upload','1','0','1');/* MySQLReback Separation */
 /* 插入数据 `lin_auth_rule` */
 INSERT INTO `lin_auth_rule` VALUES ('208','Admin/Member/manage','2','0','1');/* MySQLReback Separation */
 /* 插入数据 `lin_auth_rule` */
 INSERT INTO `lin_auth_rule` VALUES ('209','Admin/Member/points','2','0','1'),('210','Admin/Store/index','2','0','1'),('211','Admin/Sale/index','2','0','1'),('212','Admin/Store/category','2','0','1'),('213','Admin/Store/floor','2','0','1'),('214','Admin/Store/storeList','2','0','1'),('215','Admin/Shop/manage','2','0','1'),('216','Admin/Shop/orderList','2','0','1'),('217','Admin/Shop/logistics','2','0','1'),('218','Admin/Shop/products','2','0','1'),('219','Admin/Shop/brand','2','0','1'),('220','Admin/Content/manage','2','0','1'),('221','Admin/Web/manage','2','0','1'),('222','Admin/Article/index','2','0','1'),('223','Admin/Article/add','2','0','1'),('224','Admin/ArticleCategory/index','2','0','1'),('225','Admin/ArticleCategory/add','2','0','1'),('226','Admin/Article/reback','2','0','1'),('227','Admin/Article/show','2','0','1'),('228','Admin/Web/tags','2','0','1'),('229','Admin/Link/index','2','0','1'),('230','Admin/Web/index','2','0','1'),('231','Admin/Web/add','2','0','1'),('232','Admin/Images/manage','2','0','1'),('233','Admin/Images/add','2','0','1'),('234','Admin/ImagesCategory/add','2','0','1'),('235','Admin/Filemanage/index','2','0','1'),('236','Admin/Video/manage','2','0','1'),('237','Admin/Video/add','2','0','1'),('238','Admin/VideoCategory/add','2','0','1'),('239','Admin/Banner/manage','2','0','1'),('240','Admin/Banner/index','2','0','1'),('241','Admin/Banner/wangmeng','2','0','1'),('242','Admin/Renew/manage','2','0','1'),('243','Admin/Renew/map','2','0','1'),('244','Admin/Renew/keyword','2','0','1'),('245','Admin/Icon/manage','2','0','1'),('246','Admin/Icon/fontAwesome','2','0','1'),('247','Admin/Icon/index','2','0','1'),('249','Admin/Attachment/manage','2','0','1'),('250','Admin/Attachment/upload','2','0','1'),('251','Admin/Attachment/datamanage','2','0','1'),('252','Admin/Extend/manage','2','0','1'),('253','Admin/Wechat/manage','2','0','1'),('254','Admin/Wechat/api','2','0','1'),('255','Admin/Alipay/manage','2','0','1'),('256','Admin/Application/manage','2','0','1'),('257','Admin/App/index','2','0','1'),('258','Admin/ApiManage/index','2','0','1'),('259','Admin/System/manage','2','0','1'),('260','Admin/System/man','2','0','1'),('261','Admin/Menu/add','2','0','1'),('262','Admin/Menu/open','2','0','1'),('263','Admin/Menu/tub','2','0','1'),('264','Admin/System/parameter','2','0','1'),('265','Admin/System/sqltool','2','0','1'),('266','Admin/System/safevolidate','2','0','1'),('267','Admin/System/watermark','2','0','1'),('268','Admin/System/safedictionary','2','0','1'),('269','Admin/System/smsapi','2','0','1'),('270','Admin/Bak/add','2','0','1'),('271','Admin/Bak/edit','2','0','1'),('272','Admin/System/liandong','2','0','1'),('273','Admin/System/zdybd','2','0','1'),('274','Admin/Index/manage','2','0','1'),('275','Admin/Index/desktop','2','0','1'),('277','Admin/Log/ajaxGetIndex','2','0','1'),('278','Admin/Log/showDetail','2','0','1'),('279','Admin/User/manage','2','0','1'),('280','Admin/User/add','2','0','1'),('281','Admin/Permission/group','2','0','1'),('282','Admin/Permission/add','2','0','1'),('283','Admin/Permission/rule','2','0','1'),('284','Admin/Permission/member','2','0','1'),('285','Admin/Banner/manage','2','0','1'),('286','Admin/FileUpload/ajax_upload','2','0','1'),('287','Admin/Upload/upload','2','0','1'),('288','Admin/Upload/manager','2','0','1'),('289','Admin/FileUpload/upload','2','0','1'),('290','Admin/Store/storeList','1','0','1'),('291','Admin/Shop/manage','1','0','1'),('292','Admin/Shop/orderList','1','0','1'),('293','Admin/Shop/logistics','1','0','1'),('294','Admin/Shop/products','1','0','1'),('295','Admin/Shop/brand','1','0','1'),('296','Admin/Article/reback','1','0','1'),('297','Admin/Icon/manage','1','0','1'),('298','Admin/Icon/fontAwesome','1','0','1'),('299','Admin/Filemanage/codeEdit','1','0','1');/* MySQLReback Separation */
 /* 创建表结构 `lin_auth_rule_copy1` */
 DROP TABLE IF EXISTS `lin_auth_rule_copy1`;/* MySQLReback Separation */ CREATE TABLE `lin_auth_rule_copy1` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COMMENT='规则表';/* MySQLReback Separation */
 /* 插入数据 `lin_auth_rule_copy1` */
 INSERT INTO `lin_auth_rule_copy1` VALUES ('1','20','Admin/ShowNav/nav','菜单管理','1','1',''),('2','1','Admin/Nav/index','菜单列表','1','1',''),('3','1','Admin/Nav/add','添加菜单','1','1',''),('4','1','Admin/Nav/edit','修改菜单','1','1',''),('5','1','Admin/Nav/delete','删除菜单','1','1',''),('21','0','Admin/ShowNav/rule','权限控制','1','1',''),('7','21','Admin/Rule/index','权限管理','1','1',''),('8','7','Admin/Rule/add','添加权限','1','1',''),('9','7','Admin/Rule/edit','修改权限','1','1',''),('10','7','Admin/Rule/delete','删除权限','1','1',''),('11','21','Admin/Rule/group','用户组管理','1','1',''),('12','11','Admin/Rule/add_group','添加用户组','1','1',''),('13','11','Admin/Rule/edit_group','修改用户组','1','1',''),('14','11','Admin/Rule/delete_group','删除用户组','1','1',''),('15','11','Admin/Rule/rule_group','分配权限','1','1',''),('16','11','Admin/Rule/check_user','添加成员','1','1',''),('19','21','Admin/Rule/admin_user_list','管理员列表','1','1',''),('20','0','Admin/ShowNav/config','系统设置','1','1',''),('6','0','Admin/Index/index','后台首页','1','1',''),('64','1','Admin/Nav/order','菜单排序','1','1',''),('96','6','Admin/Index/welcome','欢迎界面','1','1',''),('104','0','Admin/ShowNav/posts','文章管理','1','1',''),('105','104','Admin/Posts/index','文章列表','1','1',''),('106','105','Admin/Posts/add_posts','添加文章','1','1',''),('107','105','Admin/Posts/edit_posts','修改文章','1','1',''),('108','105','Admin/Posts/delete_posts','删除文章','1','1',''),('109','104','Admin/Posts/category_list','分类列表','1','1',''),('110','109','Admin/Posts/add_category','添加分类','1','1',''),('111','109','Admin/Posts/edit_category','修改分类','1','1',''),('112','109','Admin/Posts/delete_category','删除分类','1','1',''),('117','109','Admin/Posts/order_category','分类排序','1','1',''),('118','105','Admin/Posts/order_posts','文章排序','1','1',''),('123','11','Admin/Rule/add_user_to_group','设置为管理员','1','1',''),('124','11','Admin/Rule/add_admin','添加管理员','1','1',''),('125','11','Admin/Rule/edit_admin','修改管理员','1','1','');/* MySQLReback Separation */
 /* 创建表结构 `lin_banner` */
 DROP TABLE IF EXISTS `lin_banner`;/* MySQLReback Separation */ CREATE TABLE `lin_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `banner_type` int(11) DEFAULT NULL COMMENT '1:顶部大 2: 右侧小',
  `text` varchar(255) DEFAULT NULL,
  `content` longtext,
  `link_type` int(11) DEFAULT NULL COMMENT '1:文章 2:照片 3:视频 4网页 5文本',
  `link_url` varchar(255) DEFAULT NULL,
  `link_id` int(11) DEFAULT NULL,
  `class_date` int(11) DEFAULT NULL,
  `state` int(2) DEFAULT '0',
  `addtime` int(11) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `displayorder` int(11) DEFAULT '0',
  `istop` int(1) DEFAULT NULL,
  `isshow` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_banner` */
 INSERT INTO `lin_banner` VALUES ('2','1','豆宝满月写真','&lt;p&gt;123&lt;/p&gt;','2','已选择照片 地址:http://oiwban6zi.bkt.clouddn.com/15042500981992971745.jpg','110','0','1','1505228345','images/2017-09-11/201709110921305436.JPG','0','1','0'),('11','1','豆宝满月写真','&lt;p style=&quot;text-align: left;&quot;&gt;&lt;strong&gt;Design 明星导师&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;strong&gt;&lt;img src=&quot;http://academy.shanghaik11.com/attachment/images/40/2017/03/pH7U64NUN6QxV96N2x4zHVr0RSy2n2.jpg&quot; width=&quot;100%&quot; alt=&quot;Marry Shin.jpg&quot;/&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;strong&gt;Mary Shin&lt;/strong&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;list-style-type: disc;&quot;&gt;&lt;li&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;strong&gt;高级花艺师 Floral Design Master&lt;/strong&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;从事高级花艺工作十年之久，曾为Angelababy、高圆圆等多位明星定制过婚礼手捧花的花艺设计师。拥有百场婚礼、大型宴会、品牌发布会置办花艺造型经验。作品风格大气奢华、精致且不失优雅，花艺用材新鲜，成品灵气动人，娇艳欲滴。&lt;/p&gt;&lt;p&gt;&lt;strong&gt;指导课程：&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Mary Shin 花艺系列课&lt;/p&gt;&lt;p&gt;Mary Shin Floriculture Courses&lt;/p&gt;','1','','0','0','1','1505092880','images/2017-09-11/201709110920405653.JPG','5','1','0'),('13','2','老婆','','2','','44','0','1','1505093283','images/2017-09-11/201709110922472081.jpg','1','0','0'),('15','1','豆宝','&lt;p&gt;此介绍，不是一般人可看的明白的，想知道嘛，点击查看吧！&lt;br/&gt;&lt;/p&gt;','3','http://oo8ss07gi.bkt.clouddn.com/149598206924992.mp4','52','0','1','1505223808','images/2017-09-11/20170911092746768.jpg','0','0','1');/* MySQLReback Separation */
 /* 创建表结构 `lin_fontawesome` */
 DROP TABLE IF EXISTS `lin_fontawesome`;/* MySQLReback Separation */ CREATE TABLE `lin_fontawesome` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1399 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('1','fa-caret-square-o-down'),('2','fa-caret-square-o-left'),('3','fa-caret-square-o-right'),('4','fa-caret-square-o-up'),('5','fa-check-circle-o'),('6','fa-circle-thin'),('7','fa-code-fork'),('8','fa-dot-circle-o'),('9','fa-gavel'),('10','fa-gear'),('11','fa-gears'),('12','fa-heart'),('13','fa-heart-o'),('14','fa-image'),('15','fa-inbox'),('16','fa-info'),('17','fa-info-circle'),('18','fa-institution'),('19','fa-keyboard-o'),('20','fa-legal'),('21','fa-lemon-o'),('22','fa-level-up'),('23','fa-life-bouy'),('24','fa-life-ring'),('25','fa-life-saver'),('26','fa-magic'),('27','fa-mail-reply-all'),('28','fa-minus'),('29','fa-minus-circle'),('30','fa-minus-square'),('31','fa-minus-square-o'),('32','fa-moon-o'),('33','fa-mortar-board'),('34','fa-paper-plane'),('35','fa-paper-plane-o'),('36','fa-pencil'),('37','fa-pencil-square'),('38','fa-pencil-square-o'),('39','fa-phone'),('40','fa-phone-square'),('41','fa-photo'),('42','fa-picture-o'),('43','fa-plane'),('44','fa-plus-circle'),('45','fa-puzzle-piece'),('46','fa-reply'),('47','fa-reply-all'),('48','fa-sort-down'),('49','fa-suitcase'),('50','fa-tachometer'),('51','fa-taxi'),('52','fa-toggle-down'),('53','fa-toggle-left'),('54','fa-toggle-right'),('55','fa-toggle-up'),('56','fa-unsorted'),('57','fa-warning'),('58','fa-gear'),('59','fa-dot-circle-o'),('60','fa-minus-square'),('61','fa-minus-square-o'),('62','fa-bitcoin'),('63','fa-btc'),('64','fa-cny'),('65','fa-rouble'),('66','fa-rub'),('67','fa-ruble'),('68','fa-rupee'),('69','fa-try'),('70','fa-turkish-lira'),('71','fa-won'),('72','fa-yen'),('73','fa-clipboard'),('74','fa-columns'),('75','fa-dedent'),('76','fa-link'),('77','fa-outdent'),('78','fa-paste'),('79','fa-repeat'),('80','fa-rotate-left'),('81','fa-rotate-right'),('82','fa-save'),('83','fa-scissors'),('84','fa-subscript'),('85','fa-superscript'),('86','fa-unlink'),('87','fa-angle-double-down'),('88','fa-angle-double-left'),('89','fa-angle-double-right'),('90','fa-angle-double-up'),('91','fa-angle-down'),('92','fa-angle-left'),('93','fa-angle-right'),('94','fa-angle-up'),('95','fa-arrow-circle-down'),('96','fa-arrow-circle-left'),('97','fa-arrow-circle-o-down'),('98','fa-arrow-circle-o-left'),('99','fa-arrow-circle-o-right'),('100','fa-arrow-circle-o-up'),('101','fa-arrow-circle-right'),('102','fa-arrow-circle-up'),('103','fa-arrow-down'),('104','fa-arrow-left'),('105','fa-arrow-right'),('106','fa-arrow-up'),('107','fa-caret-down'),('108','fa-caret-left'),('109','fa-caret-right'),('110','fa-caret-square-o-down'),('111','fa-caret-square-o-left'),('112','fa-caret-square-o-right'),('113','fa-caret-square-o-up'),('114','fa-caret-up'),('115','fa-chevron-circle-down'),('116','fa-chevron-circle-left'),('117','fa-chevron-circle-right'),('118','fa-chevron-circle-up'),('119','fa-chevron-down'),('120','fa-chevron-left'),('121','fa-chevron-right'),('122','fa-chevron-up'),('123','fa-hand-o-down'),('124','fa-hand-o-left'),('125','fa-hand-o-right'),('126','fa-hand-o-up'),('127','fa-long-arrow-down'),('128','fa-long-arrow-left'),('129','fa-long-arrow-right'),('130','fa-long-arrow-up'),('131','fa-toggle-down'),('132','fa-toggle-left'),('133','fa-toggle-right'),('134','fa-toggle-up'),('135','fa-compress'),('136','fa-eject'),('137','fa-expand'),('138','fa-fast-forward'),('139','fa-forward'),('140','fa-play-circle-o'),('141','fa-step-backward'),('142','fa-step-forward'),('143','fa-stop'),('144','fa-youtube-play'),('145','fa-adn'),('146','fa-behance'),('147','fa-behance-square'),('148','fa-bitbucket'),('149','fa-bitbucket-square'),('150','fa-bitcoin'),('151','fa-btc'),('152','fa-codepen'),('153','fa-css3'),('154','fa-delicious'),('155','fa-deviantart'),('156','fa-digg'),('157','fa-dribbble'),('158','fa-dropbox'),('159','fa-drupal'),('160','fa-empire'),('161','fa-facebook'),('162','fa-facebook-square'),('163','fa-flickr'),('164','fa-foursquare'),('165','fa-ge'),('166','fa-git'),('167','fa-git-square'),('168','fa-github'),('169','fa-github-alt'),('170','fa-github-square'),('171','fa-gittip'),('172','fa-google'),('173','fa-google-plus'),('174','fa-google-plus-square'),('175','fa-html5'),('176','fa-instagram'),('177','fa-joomla'),('178','fa-jsfiddle'),('179','fa-linkedin'),('180','fa-linkedin-square'),('181','fa-linux'),('182','fa-maxcdn'),('183','fa-openid'),('184','fa-pagelines'),('185','fa-pied-piper'),('186','fa-pied-piper-alt'),('187','fa-pied-piper-square'),('188','fa-pinterest'),('189','fa-pinterest-square'),('190','fa-ra'),('191','fa-rebel'),('192','fa-reddit'),('193','fa-reddit-square'),('194','fa-skype'),('195','fa-slack'),('196','fa-soundcloud'),('197','fa-spotify'),('198','fa-stack-exchange'),('199','fa-stack-overflow'),('200','fa-steam'),('201','fa-steam-square'),('202','fa-stumbleupon'),('203','fa-stumbleupon-circle'),('204','fa-trello'),('205','fa-tumblr'),('206','fa-tumblr-square'),('207','fa-twitter'),('208','fa-twitter-square'),('209','fa-vimeo-square'),('210','fa-vine'),('211','fa-vk'),('212','fa-wechat'),('213','fa-windows'),('214','fa-wordpress'),('215','fa-xing'),('216','fa-xing-square'),('217','fa-yahoo'),('218','fa-youtube'),('219','fa-youtube-play'),('220','fa-youtube-square'),('221','fa-h-square'),('222','fa-user-md'),('223','fa-weixin'),('224','fa-weixin'),('225','fa-car'),('226','fa-car'),('227','fa-code'),('228','fa-code'),('229','fa-circle'),('230','fa-circle'),('231','fa-cloud');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('232','fa-cloud');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('233','fa-coffee'),('234','fa-coffee'),('235','fa-comment'),('236','fa-comment'),('237','fa-comment-o'),('238','fa-comment-o'),('239','fa-comments'),('240','fa-comments'),('241','fa-comments-o'),('242','fa-comments-o'),('243','fa-compass'),('244','fa-compass'),('245','fa-credit-card'),('246','fa-credit-card'),('247','fa-crop'),('248','fa-crop'),('249','fa-exchange'),('250','fa-exchange'),('251','fa-exchange'),('252','fa-exchange'),('253','fa-exclamation'),('254','fa-exclamation'),('255','fa-exclamation-circle'),('256','fa-exclamation-circle'),('257','fa-exclamation-circle'),('258','fa-exclamation-triangle'),('259','fa-exclamation-triangle'),('260','fa-exclamation-triangle'),('261','fa-external-link'),('262','fa-external-link'),('263','fa-external-link-square'),('264','fa-external-link-square'),('265','fa-fax'),('266','fa-fax'),('267','fa-fighter-jet'),('268','fa-fighter-jet'),('269','fa-gift'),('270','fa-gift'),('271','fa-glass'),('272','fa-glass'),('273','fa-globe'),('274','fa-globe'),('275','fa-graduation-cap'),('276','fa-graduation-cap'),('277','fa-graduation-cap'),('278','fa-graduation-cap'),('279','fa-group'),('280','fa-group'),('281','fa-hdd-o'),('282','fa-hdd-o'),('283','fa-hdd-o'),('284','fa-meh-o'),('285','fa-meh-o'),('286','fa-recycle'),('287','fa-recycle'),('288','fa-recycle'),('289','fa-mobile-phone'),('290','fa-mobile-phone'),('291','fa-mobile-phone'),('292','fa-share'),('293','fa-share'),('294','fa-sort'),('295','fa-sort'),('296','fa-sort-alpha-asc'),('297','fa-sort-alpha-asc'),('298','fa-sort-alpha-asc'),('299','fa-sort-alpha-desc'),('300','fa-sort-alpha-desc'),('301','fa-sort-alpha-desc'),('302','fa-sort-amount-asc'),('303','fa-sort-amount-asc'),('304','fa-sort-amount-asc'),('305','fa-sort-amount-desc'),('306','fa-sort-amount-desc'),('307','fa-sort-amount-desc'),('308','fa-sort-asc'),('309','fa-sort-asc'),('310','fa-sort-asc'),('311','fa-sort-desc'),('312','fa-sort-desc'),('313','fa-sort-desc'),('314','fa-sort-numeric-asc'),('315','fa-sort-numeric-asc'),('316','fa-sort-numeric-asc'),('317','fa-sort-numeric-desc'),('318','fa-sort-numeric-desc'),('319','fa-sort-numeric-desc'),('320','fa-sort-up'),('321','fa-sort-up'),('322','fa-sort-up'),('323','fa-space-shuttle'),('324','fa-space-shuttle'),('325','fa-star'),('326','fa-star'),('327','fa-star'),('328','fa-star-half'),('329','fa-star-half'),('330','fa-star-half'),('331','fa-star-half-empty'),('332','fa-star-half-empty'),('333','fa-star-half-empty'),('334','fa-star-half-full'),('335','fa-star-half-full'),('336','fa-star-half-full'),('337','fa-star-half-o'),('338','fa-star-half-o'),('339','fa-star-half-o'),('340','fa-star-o'),('341','fa-star-o'),('342','fa-star-o'),('343','fa-tencent-weibo'),('344','fa-tencent-weibo'),('345','fa-tencent-weibo'),('346','fa-weibo'),('347','fa-weibo'),('348','fa-weibo'),('349','fa-file-archive-o'),('350','fa-file-archive-o'),('351','fa-file-archive-o'),('352','fa-file-audio-o'),('353','fa-file-audio-o'),('354','fa-file-audio-o'),('355','fa-file-code-o'),('356','fa-file-code-o'),('357','fa-file-code-o'),('358','fa-file-excel-o'),('359','fa-file-excel-o'),('360','fa-file-excel-o'),('361','fa-file-excel-o'),('362','fa-file-image-o'),('363','fa-file-image-o'),('364','fa-file-image-o'),('365','fa-file-image-o'),('366','fa-file-movie-o'),('367','fa-file-movie-o'),('368','fa-file-movie-o'),('369','fa-file-movie-o'),('370','fa-file-pdf-o'),('371','fa-file-pdf-o'),('372','fa-file-pdf-o'),('373','fa-file-photo-o'),('374','fa-file-photo-o'),('375','fa-file-photo-o'),('376','fa-file-photo-o'),('377','fa-file-photo-o'),('378','fa-file-picture-o'),('379','fa-file-picture-o'),('380','fa-file-picture-o'),('381','fa-file-picture-o'),('382','fa-file-picture-o'),('383','fa-file-powerpoint-o'),('384','fa-file-powerpoint-o'),('385','fa-file-sound-o'),('386','fa-file-sound-o'),('387','fa-file-sound-o'),('388','fa-file-video-o'),('389','fa-file-video-o'),('390','fa-file-video-o'),('391','fa-file-word-o'),('392','fa-file-word-o'),('393','fa-file-word-o'),('394','fa-file-zip-o'),('395','fa-file-zip-o'),('396','fa-file-zip-o'),('397','fa-film'),('398','fa-film'),('399','fa-ellipsis-h'),('400','fa-ellipsis-h'),('401','fa-ellipsis-h'),('402','fa-ellipsis-v'),('403','fa-ellipsis-v'),('404','fa-ellipsis-v'),('405','fa-headphones'),('406','fa-headphones'),('407','fa-navicon'),('408','fa-navicon'),('409','fa-navicon'),('410','fa-music'),('411','fa-music'),('412','fa-paw'),('413','fa-paw'),('414','fa-folder-open'),('415','fa-folder-open'),('416','fa-folder-open'),('417','fa-folder-open-o'),('418','fa-folder-open-o'),('419','fa-folder-open-o'),('420','fa-folder'),('421','fa-folder'),('422','fa-folder-o'),('423','fa-folder-o'),('424','fa-dashboard'),('425','fa-dashboard'),('426','fa-dashboard'),('427','fa-database'),('428','fa-database'),('429','fa-qq'),('430','fa-qq'),('431','fa-qq'),('432','fa-volume-down'),('433','fa-volume-down'),('434','fa-volume-off'),('435','fa-volume-off'),('436','fa-volume-off'),('437','fa-volume-up'),('438','fa-volume-up'),('439','fa-video-camera'),('440','fa-video-camera'),('441','fa-video-camera'),('442','fa-video-camera'),('443','fa-video-camera'),('444','fa-hacker-news'),('445','fa-hacker-news'),('446','fa-camera'),('447','fa-camera'),('448','fa-camera'),('449','fa-camera-retro'),('450','fa-camera-retro'),('451','fa-camera-retro');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('452','fa-camera-retro');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('453','fa-child'),('454','fa-child'),('455','fa-child'),('456','fa-ambulance'),('457','fa-ambulance'),('458','fa-hospital-o'),('459','fa-hospital-o'),('460','fa-stethoscope'),('461','fa-stethoscope'),('462','fa-header'),('463','fa-header'),('464','fa-backward'),('465','fa-backward'),('466','fa-backward'),('467','fa-fast-backward'),('468','fa-fast-backward'),('469','fa-pause'),('470','fa-pause'),('471','fa-pause'),('472','fa-play'),('473','fa-play'),('474','fa-play-circle'),('475','fa-play-circle'),('476','fa-mail-forward'),('477','fa-mail-forward'),('478','fa-mail-reply'),('479','fa-mail-reply'),('480','fa-mail-reply'),('481','fa-italic'),('482','fa-italic'),('483','fa-location-arrow'),('484','fa-location-arrow'),('485','fa-location-arrow'),('486','fa-lock'),('487','fa-lock'),('488','fa-lock'),('489','fa-magnet'),('490','fa-magnet'),('491','fa-magnet'),('492','fa-shopping-cart'),('493','fa-shopping-cart'),('494','fa-home'),('495','fa-home'),('496','fa-home'),('497','fa-home'),('498','fa-key'),('499','fa-key'),('500','fa-key'),('501','fa-calendar-o'),('502','fa-calendar-o'),('503','fa-map-marker'),('504','fa-map-marker'),('505','fa-map-marker'),('506','fa-map-marker'),('507','fa-map-marker'),('508','fa-eur'),('509','fa-eur'),('510','fa-eur'),('511','fa-dollar'),('512','fa-dollar'),('513','fa-dollar'),('514','fa-dollar'),('515','fa-euro'),('516','fa-euro'),('517','fa-euro'),('518','fa-euro'),('519','fa-gbp'),('520','fa-gbp'),('521','fa-gbp'),('522','fa-gbp'),('523','fa-inr'),('524','fa-inr'),('525','fa-inr'),('526','fa-inr'),('527','fa-jpy'),('528','fa-jpy'),('529','fa-jpy'),('530','fa-jpy'),('531','fa-krw'),('532','fa-krw'),('533','fa-krw'),('534','fa-krw'),('535','fa-money'),('536','fa-money'),('537','fa-money'),('538','fa-money'),('539','fa-rmb'),('540','fa-rmb'),('541','fa-rmb'),('542','fa-rmb'),('543','fa-usd'),('544','fa-usd'),('545','fa-usd'),('546','fa-usd'),('547','fa-chain'),('548','fa-chain'),('549','fa-chain'),('550','fa-chain-broken'),('551','fa-chain-broken'),('552','fa-chain-broken'),('553','fa-copy'),('554','fa-copy'),('555','fa-cut'),('556','fa-cut'),('557','fa-file'),('558','fa-file'),('559','fa-file-o'),('560','fa-file-o'),('561','fa-files-o'),('562','fa-files-o'),('563','fa-floppy-o'),('564','fa-floppy-o'),('565','fa-font'),('566','fa-font'),('567','fa-smile-o'),('568','fa-smile-o'),('569','fa-smile-o'),('570','fa-smile-o'),('571','fa-laptop'),('572','fa-laptop'),('573','fa-laptop'),('574','fa-laptop'),('575','fa-qrcode'),('576','fa-qrcode'),('577','fa-search'),('578','fa-search'),('579','fa-search'),('580','fa-cloud-download'),('581','fa-cloud-download'),('582','fa-cloud-download'),('583','fa-cloud-upload'),('584','fa-cloud-upload'),('585','fa-cloud-upload'),('586','fa-bold'),('587','fa-bold'),('588','fa-bold'),('589','fa-certificate'),('590','fa-certificate'),('591','fa-certificate'),('592','fa-certificate'),('593','fa-eraser'),('594','fa-eraser'),('595','fa-eraser'),('596','fa-eraser'),('597','fa-eraser'),('598','fa-rocket'),('599','fa-rocket'),('600','fa-rocket'),('601','fa-arrows-h'),('602','fa-arrows-h'),('603','fa-plus-square-o'),('604','fa-plus-square-o'),('605','fa-plus-square-o'),('606','fa-plus-square-o'),('607','fa-plus-square-o'),('608','fa-plus-square-o'),('609','fa-plus'),('610','fa-plus'),('611','fa-plus'),('612','fa-plus'),('613','fa-plus'),('614','fa-plus'),('615','fa-plus-square'),('616','fa-plus-square'),('617','fa-plus-square'),('618','fa-plus-square'),('619','fa-plus-square'),('620','fa-plus-square'),('621','fa-print'),('622','fa-print'),('623','fa-print'),('624','fa-check-circle'),('625','fa-check-circle'),('626','fa-check-circle'),('627','fa-check-square'),('628','fa-check-square'),('629','fa-check-square'),('630','fa-check-square-o'),('631','fa-check-square-o'),('632','fa-check-square-o'),('633','fa-share-alt'),('634','fa-share-alt'),('635','fa-share-alt-square'),('636','fa-share-alt-square'),('637','fa-share-square'),('638','fa-share-square'),('639','fa-share-square-o'),('640','fa-share-square-o'),('641','fa-shield'),('642','fa-shield'),('643','fa-shield'),('644','fa-shield'),('645','fa-shield'),('646','fa-times'),('647','fa-times'),('648','fa-times'),('649','fa-times-circle'),('650','fa-times-circle'),('651','fa-times-circle'),('652','fa-times-circle-o'),('653','fa-times-circle-o'),('654','fa-times-circle-o'),('655','fa-tint'),('656','fa-tint'),('657','fa-tint'),('658','fa-trophy'),('659','fa-trophy'),('660','fa-trophy'),('661','fa-quote-left'),('662','fa-quote-left'),('663','fa-quote-right'),('664','fa-quote-right'),('665','fa-random'),('666','fa-random'),('667','fa-random'),('668','fa-reorder'),('669','fa-reorder'),('670','fa-reorder'),('671','fa-reorder'),('672','fa-reorder'),('673','fa-reorder'),('674','fa-retweet'),('675','fa-retweet'),('676','fa-retweet'),('677','fa-retweet'),('678','fa-road'),('679','fa-road'),('680','fa-road'),('681','fa-road'),('682','fa-rss'),('683','fa-rss'),('684','fa-rss'),('685','fa-rss-square'),('686','fa-rss-square'),('687','fa-rss-square'),('688','fa-send-o'),('689','fa-send-o'),('690','fa-send-o'),('691','fa-send'),('692','fa-send'),('693','fa-send'),('694','fa-sliders'),('695','fa-sliders'),('696','fa-spoon'),('697','fa-spoon'),('698','fa-spoon'),('699','fa-sun-o'),('700','fa-sun-o'),('701','fa-sun-o'),('702','fa-support'),('703','fa-support'),('704','fa-support'),('705','fa-support');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('706','fa-tablet');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('707','fa-tablet'),('708','fa-tablet'),('709','fa-tablet'),('710','fa-tablet'),('711','fa-tag'),('712','fa-tag'),('713','fa-tags'),('714','fa-tags'),('715','fa-tasks'),('716','fa-tasks'),('717','fa-terminal'),('718','fa-terminal'),('719','fa-terminal'),('720','fa-terminal'),('721','fa-thumb-tack'),('722','fa-thumb-tack'),('723','fa-ticket'),('724','fa-ticket'),('725','fa-ticket'),('726','fa-ticket'),('727','fa-truck'),('728','fa-truck'),('729','fa-truck'),('730','fa-umbrella'),('731','fa-umbrella'),('732','fa-umbrella'),('733','fa-umbrella'),('734','fa-university'),('735','fa-university'),('736','fa-university'),('737','fa-unlock'),('738','fa-unlock'),('739','fa-unlock'),('740','fa-unlock-alt'),('741','fa-unlock-alt'),('742','fa-unlock-alt'),('743','fa-upload'),('744','fa-upload'),('745','fa-users'),('746','fa-users'),('747','fa-users'),('748','fa-wrench'),('749','fa-wrench'),('750','fa-wrench'),('751','fa-wrench'),('752','fa-sign-out'),('753','fa-sign-out'),('754','fa-sign-out'),('755','fa-sign-out'),('756','fa-sign-out'),('757','fa-thumbs-down'),('758','fa-thumbs-down'),('759','fa-thumbs-down'),('760','fa-thumbs-down'),('761','fa-thumbs-o-down'),('762','fa-thumbs-o-down'),('763','fa-thumbs-o-down'),('764','fa-thumbs-o-down'),('765','fa-thumbs-o-up'),('766','fa-thumbs-o-up'),('767','fa-thumbs-o-up'),('768','fa-thumbs-o-up'),('769','fa-thumbs-o-up'),('770','fa-thumbs-o-up'),('771','fa-thumbs-up'),('772','fa-thumbs-up'),('773','fa-thumbs-up'),('774','fa-thumbs-up'),('775','fa-thumbs-up'),('776','fa-thumbs-up'),('777','fa-mobile'),('778','fa-mobile'),('779','fa-mobile'),('780','fa-mobile'),('781','fa-mobile'),('782','fa-mobile'),('783','fa-microphone'),('784','fa-microphone'),('785','fa-microphone'),('786','fa-filter'),('787','fa-filter'),('788','fa-filter'),('789','fa-crosshairs'),('790','fa-crosshairs'),('791','fa-crosshairs'),('792','fa-question'),('793','fa-question'),('794','fa-question'),('795','fa-question-circle'),('796','fa-question-circle'),('797','fa-question-circle'),('798','fa-circle-o'),('799','fa-circle-o'),('800','fa-circle-o'),('801','fa-circle-o'),('802','fa-circle-o-notch'),('803','fa-circle-o-notch'),('804','fa-circle-o-notch'),('805','fa-circle-o-notch'),('806','fa-barcode'),('807','fa-barcode'),('808','fa-barcode'),('809','fa-barcode'),('810','fa-barcode'),('811','fa-arrows'),('812','fa-arrows'),('813','fa-arrows'),('814','fa-arrows'),('815','fa-arrows'),('816','fa-automobile'),('817','fa-automobile'),('818','fa-automobile'),('819','fa-automobile'),('820','fa-automobile'),('821','fa-automobile'),('822','fa-automobile'),('823','fa-automobile'),('824','fa-automobile'),('825','fa-automobile'),('826','fa-automobile'),('827','fa-automobile'),('828','fa-automobile'),('829','fa-automobile'),('830','fa-th-list'),('831','fa-th-list'),('832','fa-android'),('833','fa-android'),('834','fa-apple'),('835','fa-apple'),('836','fa-apple'),('837','fa-lightbulb-o'),('838','fa-lightbulb-o'),('839','fa-lightbulb-o'),('840','fa-lightbulb-o'),('841','fa-microphone-slash'),('842','fa-microphone-slash'),('843','fa-clock-o'),('844','fa-clock-o'),('845','fa-clock-o'),('846','fa-clock-o'),('847','fa-clock-o'),('848','fa-cutlery'),('849','fa-cutlery'),('850','fa-cutlery'),('851','fa-cutlery'),('852','fa-cutlery'),('853','fa-fire'),('854','fa-fire'),('855','fa-fire-extinguisher'),('856','fa-fire-extinguisher'),('857','fa-flash'),('858','fa-flash'),('859','fa-flask'),('860','fa-flask'),('861','fa-flask'),('862','fa-flask'),('863','fa-flask'),('864','fa-flask'),('865','fa-flask'),('866','fa-flask'),('867','fa-flask'),('868','fa-flask'),('869','fa-flask'),('870','fa-flask'),('871','fa-gamepad'),('872','fa-gamepad'),('873','fa-gamepad'),('874','fa-gamepad'),('875','fa-language'),('876','fa-language'),('877','fa-language'),('878','fa-language'),('879','fa-cog'),('880','fa-cog'),('881','fa-cog'),('882','fa-cogs'),('883','fa-cogs'),('884','fa-cogs'),('885','fa-frown-o'),('886','fa-frown-o'),('887','fa-frown-o'),('888','fa-frown-o'),('889','fa-frown-o'),('890','fa-flag'),('891','fa-flag'),('892','fa-flag'),('893','fa-flag-checkered'),('894','fa-flag-checkered'),('895','fa-flag-checkered'),('896','fa-flag-o'),('897','fa-flag-o'),('898','fa-flag-o'),('899','fa-underline'),('900','fa-underline'),('901','fa-undo'),('902','fa-undo'),('903','fa-arrows-alt'),('904','fa-arrows-alt'),('905','fa-arrows-alt'),('906','fa-file-text'),('907','fa-file-text'),('908','fa-file-text'),('909','fa-file-text'),('910','fa-file-text-o'),('911','fa-file-text-o'),('912','fa-file-text-o'),('913','fa-file-text-o'),('914','fa-file-text-o'),('915','fa-power-off'),('916','fa-power-off'),('917','fa-power-off'),('918','fa-power-off'),('919','fa-check'),('920','fa-check'),('921','fa-check'),('922','fa-check'),('923','fa-check'),('924','fa-envelope'),('925','fa-envelope'),('926','fa-envelope'),('927','fa-envelope'),('928','fa-envelope'),('929','fa-envelope'),('930','fa-envelope-o'),('931','fa-envelope-o'),('932','fa-envelope-o'),('933','fa-envelope-o'),('934','fa-envelope-o'),('935','fa-envelope-o'),('936','fa-envelope-o'),('937','fa-envelope-square'),('938','fa-envelope-square'),('939','fa-envelope-square'),('940','fa-envelope-square'),('941','fa-envelope-square'),('942','fa-envelope-square'),('943','fa-envelope-square'),('944','fa-tree'),('945','fa-tree'),('946','fa-tree'),('947','fa-tree'),('948','fa-tree');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('949','fa-tree');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('950','fa-align-center'),('951','fa-align-center'),('952','fa-align-justify'),('953','fa-align-justify'),('954','fa-align-left'),('955','fa-align-left'),('956','fa-align-right'),('957','fa-align-right'),('958','fa-indent'),('959','fa-indent'),('960','fa-list'),('961','fa-list'),('962','fa-list'),('963','fa-list-ol'),('964','fa-list-ol'),('965','fa-list-ul'),('966','fa-list-ul'),('967','fa-list-alt'),('968','fa-list-alt'),('969','fa-list-alt'),('970','fa-paperclip'),('971','fa-paperclip'),('972','fa-paragraph'),('973','fa-paragraph'),('974','fa-strikethrough'),('975','fa-strikethrough'),('976','fa-text-height'),('977','fa-text-height'),('978','fa-text-width'),('979','fa-text-width'),('980','fa-search-plus'),('981','fa-search-plus'),('982','fa-search-plus'),('983','fa-search-plus'),('984','fa-search-plus'),('985','fa-search-minus'),('986','fa-search-minus'),('987','fa-search-minus'),('988','fa-search-minus'),('989','fa-signal'),('990','fa-signal'),('991','fa-signal'),('992','fa-sitemap'),('993','fa-sitemap'),('994','fa-sitemap'),('995','fa-sitemap'),('996','fa-sitemap'),('997','fa-renren'),('998','fa-renren'),('999','fa-renren'),('1000','fa-renren'),('1001','fa-spinner'),('1002','fa-spinner'),('1003','fa-spinner'),('1004','fa-spinner'),('1005','fa-spinner'),('1006','fa-spinner'),('1007','fa-spinner'),('1008','fa-male'),('1009','fa-male'),('1010','fa-male'),('1011','fa-male'),('1012','fa-male'),('1013','fa-female'),('1014','fa-female'),('1015','fa-female'),('1016','fa-female'),('1017','fa-female'),('1018','fa-female'),('1019','fa-female'),('1020','fa-cube'),('1021','fa-cube'),('1022','fa-cube'),('1023','fa-cube'),('1024','fa-cubes'),('1025','fa-cubes'),('1026','fa-cubes'),('1027','fa-cubes'),('1028','fa-table'),('1029','fa-table'),('1030','fa-table'),('1031','fa-table'),('1032','fa-th'),('1033','fa-th'),('1034','fa-th-large'),('1035','fa-th-large'),('1036','fa-square'),('1037','fa-square'),('1038','fa-square'),('1039','fa-square'),('1040','fa-square'),('1041','fa-square'),('1042','fa-square-o'),('1043','fa-square-o'),('1044','fa-square-o'),('1045','fa-square-o'),('1046','fa-square-o'),('1047','fa-square-o'),('1048','fa-archive'),('1049','fa-archive'),('1050','fa-archive'),('1051','fa-archive'),('1052','fa-archive'),('1053','fa-archive'),('1054','fa-medkit'),('1055','fa-medkit'),('1056','fa-medkit'),('1057','fa-medkit'),('1058','fa-medkit'),('1059','fa-user'),('1060','fa-user'),('1061','fa-user'),('1062','fa-user'),('1063','fa-user'),('1064','fa-desktop'),('1065','fa-desktop'),('1066','fa-desktop'),('1067','fa-desktop'),('1068','fa-sign-in'),('1069','fa-sign-in'),('1070','fa-sign-in'),('1071','fa-sign-in'),('1072','fa-sign-in'),('1073','fa-sign-in'),('1074','fa-trash-o'),('1075','fa-trash-o'),('1076','fa-trash-o'),('1077','fa-trash-o'),('1078','fa-trash-o'),('1079','fa-trash-o'),('1080','fa-trash-o'),('1081','fa-adjust'),('1082','fa-adjust'),('1083','fa-adjust'),('1084','fa-adjust'),('1085','fa-adjust'),('1086','fa-adjust'),('1087','fa-adjust'),('1088','fa-anchor'),('1089','fa-anchor'),('1090','fa-anchor'),('1091','fa-anchor'),('1092','fa-anchor'),('1093','fa-anchor'),('1094','fa-wheelchair'),('1095','fa-wheelchair'),('1096','fa-wheelchair'),('1097','fa-wheelchair'),('1098','fa-arrows-v'),('1099','fa-arrows-v'),('1100','fa-arrows-v'),('1101','fa-arrows-v'),('1102','fa-arrows-v'),('1103','fa-asterisk'),('1104','fa-asterisk'),('1105','fa-asterisk'),('1106','fa-asterisk'),('1107','fa-asterisk'),('1108','fa-asterisk'),('1109','fa-asterisk'),('1110','fa-ban'),('1111','fa-ban'),('1112','fa-ban'),('1113','fa-ban'),('1114','fa-ban'),('1115','fa-ban'),('1116','fa-ban'),('1117','fa-bank'),('1118','fa-bank'),('1119','fa-bank'),('1120','fa-bank'),('1121','fa-bank'),('1122','fa-bank'),('1123','fa-bank'),('1124','fa-bank'),('1125','fa-bank'),('1126','fa-bank'),('1127','fa-bank'),('1128','fa-bank'),('1129','fa-bank'),('1130','fa-bank'),('1131','fa-bank'),('1132','fa-bank'),('1133','fa-bar-chart-o'),('1134','fa-bar-chart-o'),('1135','fa-bar-chart-o'),('1136','fa-bar-chart-o'),('1137','fa-bar-chart-o'),('1138','fa-bar-chart-o'),('1139','fa-bar-chart-o'),('1140','fa-bars'),('1141','fa-bars'),('1142','fa-bars'),('1143','fa-bars'),('1144','fa-bars'),('1145','fa-bars'),('1146','fa-beer'),('1147','fa-beer'),('1148','fa-beer'),('1149','fa-beer'),('1150','fa-beer'),('1151','fa-beer'),('1152','fa-beer'),('1153','fa-beer'),('1154','fa-beer'),('1155','fa-beer'),('1156','fa-beer'),('1157','fa-beer'),('1158','fa-beer'),('1159','fa-beer'),('1160','fa-bell'),('1161','fa-bell'),('1162','fa-bell'),('1163','fa-bell'),('1164','fa-bell'),('1165','fa-bell'),('1166','fa-bell'),('1167','fa-bell'),('1168','fa-bell'),('1169','fa-bell-o'),('1170','fa-bell-o'),('1171','fa-bell-o'),('1172','fa-bell-o'),('1173','fa-bell-o'),('1174','fa-bell-o'),('1175','fa-bolt'),('1176','fa-bolt'),('1177','fa-bolt'),('1178','fa-bolt'),('1179','fa-bolt'),('1180','fa-bolt'),('1181','fa-bomb'),('1182','fa-bomb'),('1183','fa-bomb'),('1184','fa-bomb'),('1185','fa-bomb'),('1186','fa-book'),('1187','fa-book'),('1188','fa-book'),('1189','fa-book'),('1190','fa-book'),('1191','fa-book'),('1192','fa-book'),('1193','fa-book'),('1194','fa-book'),('1195','fa-book'),('1196','fa-bookmark-o'),('1197','fa-bookmark-o'),('1198','fa-bookmark-o'),('1199','fa-bookmark-o'),('1200','fa-bookmark'),('1201','fa-bookmark'),('1202','fa-bookmark');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('1203','fa-bookmark');/* MySQLReback Separation */
 /* 插入数据 `lin_fontawesome` */
 INSERT INTO `lin_fontawesome` VALUES ('1204','fa-briefcase'),('1205','fa-briefcase'),('1206','fa-briefcase'),('1207','fa-briefcase'),('1208','fa-briefcase'),('1209','fa-briefcase'),('1210','fa-briefcase'),('1211','fa-briefcase'),('1212','fa-briefcase'),('1213','fa-briefcase'),('1214','fa-briefcase'),('1215','fa-briefcase'),('1216','fa-bug'),('1217','fa-bug'),('1218','fa-bug'),('1219','fa-bug'),('1220','fa-bug'),('1221','fa-building'),('1222','fa-building'),('1223','fa-building'),('1224','fa-building'),('1225','fa-building'),('1226','fa-building'),('1227','fa-building'),('1228','fa-building'),('1229','fa-building'),('1230','fa-building'),('1231','fa-building-o'),('1232','fa-building-o'),('1233','fa-building-o'),('1234','fa-building-o'),('1235','fa-building-o'),('1236','fa-building-o'),('1237','fa-building-o'),('1238','fa-bullhorn'),('1239','fa-bullhorn'),('1240','fa-bullhorn'),('1241','fa-bullhorn'),('1242','fa-bullhorn'),('1243','fa-bullhorn'),('1244','fa-bullhorn'),('1245','fa-bullhorn'),('1246','fa-bullhorn'),('1247','fa-bullseye'),('1248','fa-bullseye'),('1249','fa-bullseye'),('1250','fa-bullseye'),('1251','fa-bullseye'),('1252','fa-bullseye'),('1253','fa-bullseye'),('1254','fa-bullseye'),('1255','fa-bullseye'),('1256','fa-bullseye'),('1257','fa-bullseye'),('1258','fa-bullseye'),('1259','fa-bullseye'),('1260','fa-cab'),('1261','fa-cab'),('1262','fa-cab'),('1263','fa-cab'),('1264','fa-cab'),('1265','fa-cab'),('1266','fa-cab'),('1267','fa-cab'),('1268','fa-cab'),('1269','fa-calendar'),('1270','fa-calendar'),('1271','fa-calendar'),('1272','fa-calendar'),('1273','fa-calendar'),('1274','fa-calendar'),('1275','fa-calendar'),('1276','fa-edit'),('1277','fa-edit'),('1278','fa-edit'),('1279','fa-edit'),('1280','fa-download'),('1281','fa-download'),('1282','fa-download'),('1283','fa-history'),('1284','fa-history'),('1285','fa-history'),('1286','fa-history'),('1287','fa-history'),('1288','fa-level-down'),('1289','fa-level-down'),('1290','fa-refresh'),('1291','fa-refresh'),('1292','fa-refresh'),('1293','fa-refresh'),('1294','fa-eye'),('1295','fa-eye'),('1296','fa-eye'),('1297','fa-eye'),('1298','fa-eye'),('1299','fa-eye'),('1300','fa-eye-slash'),('1301','fa-eye-slash'),('1302','fa-eye-slash'),('1303','fa-eye-slash'),('1304','fa-test-test'),('1305','fa-bell-slash'),('1306','fa-bell-slash-o'),('1307','fa-cc-amex'),('1308','fa-cc-discover'),('1309','fa-cc-paypal'),('1310','fa-cc-stripe'),('1311','fa-copyright'),('1312','fa-google-wallet'),('1313','fa-ils'),('1314','fa-ioxhost'),('1315','fa-lastfm'),('1316','fa-lastfm-square'),('1317','fa-meanpath'),('1318','fa-paypal'),('1319','fa-shekel'),('1320','fa-sheqel'),('1321','fa-slideshare'),('1322','fa-tty'),('1323','fa-twitch'),('1324','fa-yelp'),('1325','fa-wifi'),('1326','fa-wifi'),('1327','fa-wifi'),('1328','fa-trash'),('1329','fa-trash'),('1330','fa-trash'),('1331','fa-trash'),('1332','fa-trash'),('1333','fa-trash'),('1334','fa-trash'),('1335','fa-toggle-on'),('1336','fa-toggle-on'),('1337','fa-toggle-on'),('1338','fa-toggle-off'),('1339','fa-toggle-off'),('1340','fa-toggle-off'),('1341','fa-soccer-ball-o'),('1342','fa-soccer-ball-o'),('1343','fa-soccer-ball-o'),('1344','fa-plug'),('1345','fa-plug'),('1346','fa-plug'),('1347','fa-plug'),('1348','fa-pie-chart'),('1349','fa-pie-chart'),('1350','fa-pie-chart'),('1351','fa-paint-brush'),('1352','fa-paint-brush'),('1353','fa-paint-brush'),('1354','fa-newspaper-o'),('1355','fa-newspaper-o'),('1356','fa-newspaper-o'),('1357','fa-line-chart'),('1358','fa-line-chart'),('1359','fa-line-chart'),('1360','fa-line-chart'),('1361','fa-futbol-o'),('1362','fa-futbol-o'),('1363','fa-futbol-o'),('1364','fa-eyedropper'),('1365','fa-eyedropper'),('1366','fa-eyedropper'),('1367','fa-cc-visa'),('1368','fa-cc-visa'),('1369','fa-cc'),('1370','fa-cc'),('1371','fa-cc'),('1372','fa-calculator'),('1373','fa-calculator'),('1374','fa-bus'),('1375','fa-bus'),('1376','fa-bus'),('1377','fa-bus'),('1378','fa-birthday-cake'),('1379','fa-birthday-cake'),('1380','fa-birthday-cake'),('1381','fa-binoculars'),('1382','fa-binoculars'),('1383','fa-binoculars'),('1384','fa-binoculars'),('1385','fa-bicycle'),('1386','fa-bicycle'),('1387','fa-at'),('1388','fa-at'),('1389','fa-at'),('1390','fa-area-chart'),('1391','fa-area-chart'),('1392','fa-area-chart'),('1393','fa-angellist'),('1394','fa-angellist'),('1395','fa-cc-mastercard'),('1396','fa-cc-mastercard'),('1397','fa-leaf'),('1398','fa-leaf');/* MySQLReback Separation */
 /* 创建表结构 `lin_hobby` */
 DROP TABLE IF EXISTS `lin_hobby`;/* MySQLReback Separation */ CREATE TABLE `lin_hobby` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hobby` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_hobby` */
 INSERT INTO `lin_hobby` VALUES ('1','篮球','1'),('2','足球','1'),('3','象棋','1'),('4','跳舞','1'),('5','游戏','1'),('6','听歌','1'),('7','电影','1'),('8','自拍','1'),('9','游泳','1'),('10','旅游','1'),('11','KTV','1'),('12','美食','1'),('13','购物','1'),('14','垂钓','1'),('15','泡妞 ','1'),('16','烹饪','1');/* MySQLReback Separation */
 /* 创建表结构 `lin_image` */
 DROP TABLE IF EXISTS `lin_image`;/* MySQLReback Separation */ CREATE TABLE `lin_image` (
  `img_id` int(10) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) DEFAULT NULL,
  `image_url2` varchar(255) DEFAULT NULL,
  `image_url3` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `image_desc` varchar(255) DEFAULT NULL COMMENT '图片描述',
  `create_time` int(10) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `point_num` int(10) DEFAULT NULL,
  `com_num` int(10) DEFAULT NULL,
  `nice` int(10) DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0:显示 1:下线',
  `image_size` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_image` */
 INSERT INTO `lin_image` VALUES ('121','http://oiwban6zi.bkt.clouddn.com/15049713591678708234.jpg','','','','1504971360','','','','','','0','0B'),('110','http://oiwban6zi.bkt.clouddn.com/15042500981992971745.jpg','','','','1504250099','','','','','','0','1.94MB'),('111','http://oiwban6zi.bkt.clouddn.com/15047545391026956045.JPG','','','','1504754540','','','','','','0','55.64KB'),('112','http://oiwban6zi.bkt.clouddn.com/1504754540908258889.JPG','','','','1504754541','','','','','','0','238.48KB'),('113','http://oiwban6zi.bkt.clouddn.com/15049636012014707639.jpg','','','','1504963602','','','','','','0','4.33KB'),('114','http://oiwban6zi.bkt.clouddn.com/15049636101134229175.jpg','','','','1504963610','','','','','','0','60.33KB'),('115','http://oiwban6zi.bkt.clouddn.com/1504963632440706275.jpg','','','','1504963633','','','','','','0','145.33KB'),('116','http://oiwban6zi.bkt.clouddn.com/1504963640310319237.jpg','','','','1504963641','','','','','','0','410.71KB'),('117','http://oiwban6zi.bkt.clouddn.com/15049636971625149209.jpg','','','','1504963698','','','','','','0','1.61MB'),('118','http://oiwban6zi.bkt.clouddn.com/150496385164377863.jpg','','','','1504963853','','','','','','0','4.5MB'),('119','http://oiwban6zi.bkt.clouddn.com/15049638761559938245.jpg','','','','1504963878','','','','','','0','4.5MB'),('123','http://oiwban6zi.bkt.clouddn.com/15049715171919877403.jpg','','','王小艳进产房','1504971518','','','','','','0','3.91MB'),('124','http://oiwban6zi.bkt.clouddn.com/1504971558791236754.jpg','','','','1504971560','','','','','','0','6.89MB'),('125','http://oiwban6zi.bkt.clouddn.com/150530329765914740.jpg','','','','1505303299','','','','','','0','4.34MB'),('126','http://oiwban6zi.bkt.clouddn.com/15053035472144372298.jpg','','','','1505303548','0','','','','','0','3.87MB'),('127','http://oiwban6zi.bkt.clouddn.com/15053036531499418749.jpg','','','','1505303654','0','','','','','0','1.94MB'),('128','http://oiwban6zi.bkt.clouddn.com/15055313031701420428.jpg','','','','1505531304','','','','','','0','226.17KB'),('129','http://oiwban6zi.bkt.clouddn.com/15055313051088168839.jpg','','','','1505531305','','','','','','0','266.56KB'),('130','http://oiwban6zi.bkt.clouddn.com/15055313051881450832.jpg','','','','1505531306','','','','','','0','246.4KB'),('131','http://oiwban6zi.bkt.clouddn.com/1505531306835582850.jpg','','','','1505531307','','','','','','0','328.78KB'),('132','http://oiwban6zi.bkt.clouddn.com/15055313071991919514.jpg','','','','1505531307','','','','','','0','213.29KB'),('133','http://oiwban6zi.bkt.clouddn.com/15055313071077264517.jpg','','','','1505531308','','','','','','0','291.52KB'),('134','http://oiwban6zi.bkt.clouddn.com/1505531308662375683.jpg','','','','1505531308','','','','','','0','342.61KB'),('135','http://oiwban6zi.bkt.clouddn.com/15055313081697495352.jpg','','','','1505531309','','','','','','0','285.11KB'),('136','http://oiwban6zi.bkt.clouddn.com/1505531450270180512.jpg','','','','1505531450','','','','','','0','118.23KB'),('137','http://oiwban6zi.bkt.clouddn.com/1505531450457701115.jpg','','','','1505531451','','','','','','0','102.14KB'),('138','http://oiwban6zi.bkt.clouddn.com/15055314511868970562.jpg','','','','1505531451','','','','','','0','103.01KB'),('139','http://oiwban6zi.bkt.clouddn.com/1505531451824116183.jpg','','','','1505531451','','','','','','0','127.4KB'),('140','http://oiwban6zi.bkt.clouddn.com/1505531451233321406.jpg','','','','1505531452','','','','','','0','159.52KB'),('141','http://oiwban6zi.bkt.clouddn.com/1505531452631650954.jpg','','','','1505531452','','','','','','0','487.69KB'),('142','http://oiwban6zi.bkt.clouddn.com/1505531452923487586.jpg','','','','1505531452','','','','','','0','86.33KB'),('143','http://oiwban6zi.bkt.clouddn.com/15055314541064751494.jpg','','','','1505531454','','','','','','0','386.87KB'),('144','http://oiwban6zi.bkt.clouddn.com/15055314541249492707.jpg','','','','1505531455','','','','','','0','503.53KB'),('145','http://oiwban6zi.bkt.clouddn.com/1505531455752031670.jpg','','','','1505531455','','','','','','0','355.69KB'),('146','http://oiwban6zi.bkt.clouddn.com/1505531485549215380.jpg','','','','1505531486','','','','','','0','230.94KB'),('147','http://oiwban6zi.bkt.clouddn.com/1505531486452427481.jpg','','','','1505531486','','','','','','0','261.26KB'),('148','http://oiwban6zi.bkt.clouddn.com/1505531486789172794.jpg','','','','1505531487','','','','','','0','255.36KB'),('149','http://oiwban6zi.bkt.clouddn.com/1505531487580519480.jpg','','','','1505531487','','','','','','0','259.68KB'),('150','http://oiwban6zi.bkt.clouddn.com/15055314871075902517.jpg','','','','1505531487','','','','','','0','181.07KB'),('151','http://oiwban6zi.bkt.clouddn.com/150553148715926365.jpg','','','','1505531488','','','','','','0','155.56KB'),('152','http://oiwban6zi.bkt.clouddn.com/150553148858826457.jpg','','','','1505531488','','','','','','0','143.54KB'),('153','http://oiwban6zi.bkt.clouddn.com/15055314883556428.jpg','','','','1505531489','','','','','','0','282.93KB'),('154','http://oiwban6zi.bkt.clouddn.com/1505531489741582043.jpg','','','','1505531489','','','','','','0','150.85KB');/* MySQLReback Separation */
 /* 插入数据 `lin_image` */
 INSERT INTO `lin_image` VALUES ('155','http://oiwban6zi.bkt.clouddn.com/1505531489420994908.jpg','','','','1505531489','','','','','','0','136.35KB');/* MySQLReback Separation */
 /* 插入数据 `lin_image` */
 INSERT INTO `lin_image` VALUES ('156','http://oiwban6zi.bkt.clouddn.com/1505531489973635041.jpg','','','','1505531490','','','','','','0','246.32KB'),('157','http://oiwban6zi.bkt.clouddn.com/15055314901241360576.jpg','','','','1505531490','','','','','','0','220.03KB'),('158','http://oiwban6zi.bkt.clouddn.com/15055318601815925099.jpg','','','','1505531861','','','','','','0','234.54KB'),('159','http://oiwban6zi.bkt.clouddn.com/1505531861225251558.jpg','','','','1505531862','','','','','','0','266.56KB'),('160','http://oiwban6zi.bkt.clouddn.com/15055318622127103286.jpg','','','','1505531863','','','','','','0','254.52KB'),('161','http://oiwban6zi.bkt.clouddn.com/15055318631994274987.jpg','','','','1505531863','','','','','','0','519.14KB'),('162','http://oiwban6zi.bkt.clouddn.com/15055318641317850151.jpg','','','','1505531864','','','','','','0','319.93KB'),('163','http://oiwban6zi.bkt.clouddn.com/15055318641669534896.jpg','','','','1505531865','','','','','','0','285.11KB'),('164','http://oiwban6zi.bkt.clouddn.com/1505531865808777263.jpg','','','','1505531866','','','','','','0','519.57KB'),('165','http://oiwban6zi.bkt.clouddn.com/15055318661020637066.jpg','','','','1505531866','','','','','','0','222.79KB'),('166','http://oiwban6zi.bkt.clouddn.com/15055318661571631965.jpg','','','','1505531866','','','','','','0','213.29KB'),('167','http://oiwban6zi.bkt.clouddn.com/1505531866748126293.jpg','','','','1505531867','','','','','','0','226.17KB'),('168','http://oiwban6zi.bkt.clouddn.com/15055318671419089422.jpg','','','','1505531867','','','','','','0','317.62KB'),('169','http://oiwban6zi.bkt.clouddn.com/15055318671916760167.jpg','','','','1505531868','','','','','','0','281.07KB'),('170','http://oiwban6zi.bkt.clouddn.com/1505531868710178903.jpg','','','','1505531868','','','','','','0','159.75KB'),('171','http://oiwban6zi.bkt.clouddn.com/15055318681897393168.jpg','','','','1505531869','','','','','','0','148.98KB'),('172','http://oiwban6zi.bkt.clouddn.com/1505531869914244168.jpg','','','','1505531869','','','','','','0','280.82KB'),('173','http://oiwban6zi.bkt.clouddn.com/1505531869586438608.jpg','','','','1505531870','','','','','','0','397.82KB'),('174','http://oiwban6zi.bkt.clouddn.com/1505531870113700247.jpg','','','','1505531870','','','','','','0','155.27KB'),('175','http://oiwban6zi.bkt.clouddn.com/15055318701237169368.jpg','','','','1505531870','','','','','','0','132.87KB'),('176','http://oiwban6zi.bkt.clouddn.com/15055318701806742868.jpg','','','','1505531871','','','','','','0','328.78KB'),('177','http://oiwban6zi.bkt.clouddn.com/1505531871491678856.jpg','','','','1505531872','','','','','','0','529.1KB'),('178','http://oiwban6zi.bkt.clouddn.com/1505531872691873853.jpg','','','','1505531873','','','','','','0','551.22KB'),('179','http://oiwban6zi.bkt.clouddn.com/15055318731745505007.jpg','','','','1505531873','','','','','','0','257.17KB'),('180','http://oiwban6zi.bkt.clouddn.com/15055318741388389128.jpg','','','','1505531874','','','','','','0','574.32KB'),('181','http://oiwban6zi.bkt.clouddn.com/1505531874904112972.jpg','','','','1505531875','','','','','','0','214.9KB'),('182','http://oiwban6zi.bkt.clouddn.com/15055318751960542762.jpg','','','','1505531875','','','','','','0','246.4KB'),('183','http://oiwban6zi.bkt.clouddn.com/1505531875696099698.jpg','','','','1505531876','','','','','','0','576.55KB'),('184','http://oiwban6zi.bkt.clouddn.com/1505531876484426732.jpg','','','','1505531877','','','','','','0','205.32KB'),('185','http://oiwban6zi.bkt.clouddn.com/15055318771018520688.jpg','','','','1505531878','','','','','','0','616.3KB'),('186','http://oiwban6zi.bkt.clouddn.com/15055318781248148008.jpg','','','','1505531878','','','','','','0','454.41KB'),('187','http://oiwban6zi.bkt.clouddn.com/15055318781432345101.jpg','','','','1505531879','','','','','','0','342.61KB'),('188','http://oiwban6zi.bkt.clouddn.com/1505531879218440627.jpg','','','','1505531879','','','','','','0','248.85KB'),('189','http://oiwban6zi.bkt.clouddn.com/15055318791183328798.jpg','','','','1505531880','','','','','','0','291.52KB'),('190','http://oiwban6zi.bkt.clouddn.com/15055318801281367062.jpg','','','','1505531880','','','','','','0','322.54KB'),('191','http://oiwban6zi.bkt.clouddn.com/1505531880220206488.jpg','','','','1505531881','','','','','','0','472.56KB'),('229','http://oiwban6zi.bkt.clouddn.com/1505716174223140377.jpg','','','豆宝周岁写真','1505716175','114','','','','','0','519.57KB'),('226','http://oiwban6zi.bkt.clouddn.com/15055446131891855582.jpg','','','','1505544614','','','','','','0','226.17KB'),('224','http://oiwban6zi.bkt.clouddn.com/1505543653263244981.jpg','','','','1505543653','','','','','','0','155.27KB'),('225','http://oiwban6zi.bkt.clouddn.com/1505543724466552632.jpg','','','豆宝周岁写真','1505543724','0','','','','','0','280.82KB'),('222','http://oiwban6zi.bkt.clouddn.com/1505542536215237502.jpg','','','','1505542536','0','','','','','0','519.14KB'),('223','http://oiwban6zi.bkt.clouddn.com/15055434471728848733.jpg','','','豆宝周岁写真','1505543447','','','','','','0','281.07KB');/* MySQLReback Separation */
 /* 插入数据 `lin_image` */
 INSERT INTO `lin_image` VALUES ('221','http://oiwban6zi.bkt.clouddn.com/15055421391032544475.jpg','','','','1505542140','','','','','','0','155.27KB');/* MySQLReback Separation */
 /* 插入数据 `lin_image` */
 INSERT INTO `lin_image` VALUES ('216','http://oiwban6zi.bkt.clouddn.com/15055405451965520927.jpg','','','','1505540545','','','','','','0','148.98KB'),('217','http://oiwban6zi.bkt.clouddn.com/1505540680976329965.jpg','','','','1505540680','','','','','','0','155.27KB'),('220','http://oiwban6zi.bkt.clouddn.com/15055412341766160232.jpg','','','','1505541234','','','','','','0','280.82KB'),('230','http://oiwban6zi.bkt.clouddn.com/15057407831121606472.JPG','','','跟王小艳在玄武湖','1505740784','126','','','','','0','9.3KB'),('231','http://oiwban6zi.bkt.clouddn.com/15057407931743522613.JPG','','','跟王小艳在玄武湖','1505740793','126','','','','','0','301.65KB'),('232','http://oiwban6zi.bkt.clouddn.com/15057408141284951389.JPG','','','王小艳在玄武湖','1505740815','126','','','','','0','1.14MB'),('233','http://oiwban6zi.bkt.clouddn.com/1506147358133233892.gif','','','1212','1506147362','123','','','','','0','2.07MB'),('234','http://oiwban6zi.bkt.clouddn.com/15061475031113315831.gif','','','2141','1506147507','123','','','','','0','2.07MB'),('236','http://oiwban6zi.bkt.clouddn.com/1506148013177744316.jpg','','','5866547457','1506148013','123','','','','','0','99.63KB'),('237','http://oiwban6zi.bkt.clouddn.com/1506148013120268299.jpg','','','5866','1506148013','123','','','','','0','21.58KB');/* MySQLReback Separation */
 /* 创建表结构 `lin_images_category` */
 DROP TABLE IF EXISTS `lin_images_category`;/* MySQLReback Separation */ CREATE TABLE `lin_images_category` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'larry-moxingguanli',
  `href` varchar(255) DEFAULT NULL,
  `parentid` int(10) DEFAULT NULL,
  `spread` varchar(255) DEFAULT '1',
  `is_display` int(1) DEFAULT '1',
  `displayorder` int(10) DEFAULT '1',
  `level` int(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_images_category` */
 INSERT INTO `lin_images_category` VALUES ('114','2013年度','larry-moxingguanli','','0','1','1','0','0'),('115','2014年度','larry-moxingguanli','','0','1','1','0','0'),('116','2015年度','larry-moxingguanli','','0','1','1','0','0'),('117','2016年度','larry-moxingguanli','','0','1','1','0','0'),('118','豆宝周岁','larry-moxingguanli','','117','1','1','0','0'),('120','2017年度','larry-moxingguanli','','0','1','1','0','0'),('121','豆宝初生','larry-moxingguanli','','116','1','1','0','0'),('123','元宵节','larry-moxingguanli','','114','1','1','0','0'),('124','梅花山','larry-moxingguanli','','114','1','1','0','0'),('125','雨花台','larry-moxingguanli','','114','1','1','0','0'),('126','玄武湖','larry-moxingguanli','','114','1','1','0','0'),('127','午朝门公园','larry-moxingguanli','','115','1','1','0','0'),('128','南京博物院','larry-moxingguanli','','115','1','1','0','0'),('129','西塘','larry-moxingguanli','','115','1','1','0','0'),('130','南湖','larry-moxingguanli','','115','1','1','0','0'),('131','黄山','larry-moxingguanli','','115','1','1','0','0'),('132','豆宝两周岁','larry-moxingguanli','','120','1','1','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lin_level` */
 DROP TABLE IF EXISTS `lin_level`;/* MySQLReback Separation */ CREATE TABLE `lin_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` tinyint(1) DEFAULT '1',
  `name` varchar(255) DEFAULT '',
  `value` varchar(255) DEFAULT NULL,
  `point` decimal(10,2) DEFAULT '0.00',
  `level1_point` int(10) DEFAULT '0',
  `level1_value` decimal(10,2) DEFAULT '0.00',
  `level2_point` int(10) DEFAULT '0',
  `level2_value` decimal(10,2) DEFAULT '0.00',
  `level3_point` int(10) DEFAULT '0',
  `level3_value` decimal(10,2) DEFAULT '0.00',
  `other_point` int(10) DEFAULT '0',
  `other_value` decimal(10,2) DEFAULT '0.00',
  `image` varchar(255) DEFAULT NULL,
  `status` int(255) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_level` */
 INSERT INTO `lin_level` VALUES ('1','1','普通会员','100','200.00','80','220.00','110','150.00','50','300.00','0','0.00','','1');/* MySQLReback Separation */
 /* 创建表结构 `lin_link` */
 DROP TABLE IF EXISTS `lin_link`;/* MySQLReback Separation */ CREATE TABLE `lin_link` (
  `link_id` int(10) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1' COMMENT '0:禁用 1:启用',
  `link_sort` int(10) DEFAULT '0' COMMENT '排序',
  `addtime` int(10) DEFAULT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_link` */
 INSERT INTO `lin_link` VALUES ('1','百度','www.baidu.com','1','0','1505094985'),('2','搜狐','http://souhu.com','1','1','1503667541'),('7','3255','3255','1','235','1503668795'),('6','241','3252','1','2355','1503668791'),('8','32523','5235','1','3255','1503668799'),('9','32523','5235','1','3255','1503668801'),('10','3525','3252','1','2535','1503668805');/* MySQLReback Separation */
 /* 创建表结构 `lin_list` */
 DROP TABLE IF EXISTS `lin_list`;/* MySQLReback Separation */ CREATE TABLE `lin_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `apiName` varchar(50) NOT NULL DEFAULT '' COMMENT 'api索引，保存了类和方法',
  `hash` varchar(50) NOT NULL DEFAULT '' COMMENT 'api唯一标识',
  `accessToken` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否需要认证AccessToken 1：需要，0：不需要',
  `needLogin` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否需要认证用户token  1：需要 0：不需要',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT 'API状态：0表示禁用，1表示启用',
  `method` tinyint(2) NOT NULL DEFAULT '2' COMMENT '请求方式0：不限1：Post，2：Get',
  `info` varchar(500) NOT NULL DEFAULT '' COMMENT 'api中文说明',
  `isTest` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否是测试模式：0:生产模式，1：测试模式',
  `returnStr` text COMMENT '返回数据示例',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用于维护接口信息';/* MySQLReback Separation */
 /* 插入数据 `lin_list` */
 INSERT INTO `lin_list` VALUES ('1','getMember','59525bcb1a61c','1','1','1','1','获取用户列表','1',''),('2','getCategory','596b686320e7f','1','1','1','1','获取分类列表','0',''),('3','4141','596b6e31a4040','1','1','1','1','5125125','1','');/* MySQLReback Separation */
 /* 创建表结构 `lin_member` */
 DROP TABLE IF EXISTS `lin_member`;/* MySQLReback Separation */ CREATE TABLE `lin_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `realname` varchar(255) DEFAULT NULL,
  `salt` varchar(30) DEFAULT '' COMMENT '密码盐',
  `email` varchar(100) DEFAULT '' COMMENT '电子邮箱',
  `mobile` varchar(11) DEFAULT '' COMMENT '手机号',
  `userface` varchar(255) DEFAULT '' COMMENT '头像',
  `level` tinyint(1) unsigned DEFAULT '0' COMMENT '等级',
  `sex` tinyint(1) unsigned DEFAULT '1' COMMENT '性别 1:男 0:女 -1 未知',
  `address` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL COMMENT '生日',
  `score` int(10) unsigned DEFAULT '0' COMMENT '积分',
  `prevtime` int(10) unsigned DEFAULT '0' COMMENT '上次登录时间',
  `loginfailure` tinyint(1) unsigned DEFAULT '0' COMMENT '失败次数',
  `logintime` int(10) unsigned DEFAULT '0' COMMENT '登录时间',
  `loginip` varchar(50) DEFAULT '' COMMENT '登录IP',
  `joinip` varchar(50) DEFAULT '' COMMENT '加入时间',
  `jointime` int(10) unsigned DEFAULT '0' COMMENT '加入时间',
  `status` varchar(30) DEFAULT '1' COMMENT '状态 1启用 0 禁用',
  `openid` varchar(255) DEFAULT NULL,
  `sign` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `hobby` varchar(255) DEFAULT NULL COMMENT '爱好',
  `can_ask` int(1) DEFAULT '1' COMMENT '0:禁言',
  PRIMARY KEY (`id`),
  KEY `username` (`username`) USING BTREE,
  KEY `email` (`email`) USING BTREE,
  KEY `mobile` (`mobile`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='会员表';/* MySQLReback Separation */
 /* 插入数据 `lin_member` */
 INSERT INTO `lin_member` VALUES ('3','admin','九月一十八','c13f62012fd6a8fdf06b3452a94430e5','林强','rpR6Bv','2505451091@qq.com','18602509343','','0','1','内蒙古自治区 包头市 昆都仑区','1988-10-01','0','1491822015','0','1491822038','127.0.0.1','127.0.0.1','1491461418','1','','我是小强哥','1,7,10,14,15','1');/* MySQLReback Separation */
 /* 创建表结构 `lin_menu` */
 DROP TABLE IF EXISTS `lin_menu`;/* MySQLReback Separation */ CREATE TABLE `lin_menu` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'larry-moxingguanli',
  `parentid` int(10) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `spread` varchar(255) DEFAULT '1',
  `is_display` int(1) DEFAULT '1',
  `displayorder` int(10) DEFAULT '1',
  `level` int(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_menu` */
 INSERT INTO `lin_menu` VALUES ('1','B2C商城','&#xe657;','0','Admin/Index/manage','1','1','1','0'),('2','网站管理','&#xe756;','0','Admin/Content/manage','1','1','1','0'),('3','微信平台','fa-weixin','0','Admin/Wechat/manage','1','1','1','0'),('4','扩展模块','fa-arrows','0','Admin/Extend/manage','1','1','1','0'),('6','我的面板','fa-tachometer','154','Admin/Index/desktop','1','1','1','0'),('7','个人信息','fa-user','6','Admin/User/userInfo','1','1','0','0'),('155','后台首页','&#xe68e;','154','Admin/Index/index','1','1','2','0'),('9','日志信息','fa-pencil-square','6','Admin/Log/index','1','1','1','0'),('10','用户管理','fa-group','154','Admin/User/manage','1','1','1','0'),('11','用户列表','&#xe613;','10','Admin/User/index','1','1','1','0'),('12','角色列表','fa-mortar-board','10','Admin/permission/index','1','1','1','0'),('13','菜单设置','&#xe62a;','23','Admin/Menu/index','1','1','1','0'),('14','CRM管理','&#xe613;','1','Admin/Member/manage','1','1','1','0'),('15','会员注册列表','&#xe612;','14','Admin/Member/index','1','1','1','0'),('16','会员留言管理','&#xe63a;','14','Admin/Member/message','1','1','1','0'),('17','会员等级管理','fa-sitemap','14','Admin/Member/level','1','1','1','0'),('18','文章管理','fa-file-text','2','Admin/Web/manage','1','1','2','0'),('67','支付宝平台','larry-zhifubao','4','Admin/Alipay/manage','1','1','1','0'),('21','回复设置','fa-plug','3','Admin/Wechat/basicSetting','1','1','1','0'),('22','支付配置','fa-cc-paypal','190','Admin/WechatService/payment','1','1','1','0'),('23','系统管理','&#xe620;','138','Admin/System/man','1','1','1','0'),('24','系统参数','&#xe64d;','23','Admin/System/parameter','1','1','1','0'),('25','SQL工具','fa-skype','23','Admin/System/sqltool','1','1','1','0'),('27','验证安全','&#xe633;','23','Admin/System/safevolidate','1','1','1','0'),('28','图片水印','&#xe64a;','23','Admin/System/watermark','1','1','1','0'),('29','安全字典','&#xe61e;','23','Admin/System/safedictionary','1','1','1','0'),('30','短信接口','&#xe63a;','23','Admin/System/smsapi','1','1','1','0'),('32','数据库管理','fa-database','23','Admin/Bak/index','1','1','1','0'),('33','友链管理','larry-a157','2','Admin/Link/index','1','1','0','0'),('34','栏目管理','fa-bars','2','Admin/Web/index','1','1','0','0'),('35','文章列表','fa-list-alt','18','Admin/Article/index','1','1','1','0'),('36','文章分类','fa-bars','18','Admin/ArticleCategory/index','1','1','1','0'),('37','已发布文章','fa-send','18','Admin/Article/show','1','0','1','0'),('38','Tags管理','fa-bookmark-o','18','Admin/Web/tags','1','0','1','0'),('39','回收站','fa-trash','18','Admin/Article/reback','1','1','1','0'),('40','相册管理','&#xe64a;','2','Admin/Images/manage','1','1','2','0'),('41','相册列表','fa-image','40','Admin/Images/index','1','1','1','0'),('43','联动类别','&#xe628;','23','Admin/System/liandong','1','1','1','0'),('45','自定义表单','&#xe63c;','23','Admin/System/zdybd','1','0','1','0'),('46','附件管理','larry-fujianguanli','2','Admin/Attachment/manage','1','0','1','0'),('47','上传新文件','larry-shangchuanfujian','46','Admin/Attachment/upload','1','1','1','0'),('48','附件数据','larry-fujian','46','Admin/Attachment/datamanage','1','1','1','0'),('49','文件管理','larry-wenjianguanli2','2','Admin/Filemanage/index','1','1','0','0'),('50','视频管理','&#xe6ed;','2','Admin/Video/manage','1','1','2','0'),('51','视频列表','fa-toggle-right','50','Admin/Video/index','1','1','1','0'),('52','视频分类','fa-bars','50','Admin/VideoCategory/index','1','1','1','0'),('127','应用列表','fa-file-text-o','126','Admin/App/index','1','1','0','0'),('56','广告管理','larry-iconguanggaoguanli','2','Admin/Banner/manage','1','1','1','0'),('57','首页轮播图','&#xe634;','56','Admin/Banner/index','1','1','0','0'),('58','网站广告','larry-guanggaolianmeng','56','Admin/Banner/advert','1','1','1','0'),('59','批量维护','fa-gears','2','Admin/Renew/manage','1','1','1','0'),('63','更新网站地图','fa-map-marker','59','Admin/Renew/map','1','1','1','0'),('136','公共上传','larry-moxingguanli','132','Admin/FileUpload/upload','1','0','0','0'),('66','搜索关键词维护','fa-search-plus','59','Admin/Renew/keyword','1','1','1','0'),('137','会员积分管理','fa-file-powerpoint-o','14','Admin/Member/points','1','1','0','0'),('126','应用管理','&#xe857;','4','Admin/Application/manage','1','1','0','0'),('111','迷你工具箱','&#xe631;','23','Admin/System/tools','1','1','0','0'),('128','接口列表','fa-joomla','126','Admin/ApiManage/index','1','1','0','0'),('93','新增权限组','larry-moxingguanli','12','Admin/Permission/add','1','0','0','0'),('82','广告中心','larry-moxingguanli','0','Admin/Banner/manage','1','0','0','0'),('86','新建菜单','larry-moxingguanli','13','Admin/Menu/add','1','0','1','0'),('87','编辑菜单','larry-moxingguanli','13','Admin/Menu/edit','1','0','0','0'),('88','删除菜单','larry-moxingguanli','13','Admin/Menu/del','1','0','0','0'),('89','显示菜单','larry-moxingguanli','13','Admin/Menu/open','1','0','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_menu` */
 INSERT INTO `lin_menu` VALUES ('90','获取日志信息','larry-moxingguanli','9','Admin/Log/ajaxGetIndex','1','0','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_menu` */
 INSERT INTO `lin_menu` VALUES ('91','删除日志','larry-moxingguanli','9','Admin/Log/del','1','0','0','0'),('92','查看日志详情','larry-moxingguanli','9','Admin/Log/showDetail','1','0','0','0'),('94','删除权限组','larry-moxingguanli','12','Admin/Permission/del','1','0','0','0'),('95','编辑权限组','larry-moxingguanli','12','Admin/Permission/edit','1','0','0','0'),('96','禁用权限组','larry-moxingguanli','12','Admin/Permission/close','1','0','0','0'),('97','开启权限组','larry-moxingguanli','12','Admin/Permission/open','1','0','0','0'),('98','访问授权','larry-moxingguanli','12','Admin/Permission/rule','1','0','0','0'),('99','成员授权','larry-moxingguanli','12','Admin/Permission/member','1','0','0','0'),('100','新增用户','larry-moxingguanli','11','Admin/User/add','1','0','0','0'),('101','删除用户','larry-moxingguanli','11','Admin/User/del','1','0','0','0'),('102','启用用户','larry-moxingguanli','11','Admin/User/open','1','0','0','0'),('103','禁用用户','larry-moxingguanli','11','Admin/User/close','1','0','0','0'),('104','用户授权','larry-moxingguanli','11','Admin/Permission/group','1','0','0','0'),('129','新建文章','larry-moxingguanli','35','Admin/Article/add','1','0','0','0'),('108','新建表','larry-moxingguanli','32','Admin/Bak/add','1','0','0','0'),('109','查看表详情','larry-moxingguanli','32','Admin/Bak/edit','1','0','0','0'),('113','相册分类','fa-bars','40','Admin/ImagesCategory/index','1','1','0','0'),('114','新增相册分类','larry-moxingguanli','113','Admin/ImagesCategory/add','1','0','0','0'),('115','编辑相册分类','larry-moxingguanli','113','Admin/ImagesCategory/edit','1','0','0','0'),('116','删除相册分类','larry-moxingguanli','113','Admin/ImagesCategory/del','1','0','0','0'),('117','添加照片','larry-moxingguanli','41','Admin/Images/add','1','0','0','0'),('118','删除照片','larry-moxingguanli','41','Admin/Images/del','1','0','0','0'),('119','编辑照片','larry-moxingguanli','41','Admin/Images/edit','1','0','0','0'),('120','添加视频','larry-moxingguanli','51','Admin/Video/add','1','0','0','0'),('121','编辑视频','larry-moxingguanli','51','Admin/Video/edit','1','0','0','0'),('122','删除视频','larry-moxingguanli','51','Admin/Video/del','1','0','0','0'),('123','添加视频分类','larry-moxingguanli','52','Admin/VideoCategory/add','1','0','0','0'),('124','编辑视频分类','larry-moxingguanli','52','Admin/VideoCategory/edit','1','0','0','0'),('125','删除视频分类','larry-moxingguanli','52','Admin/VideoCategory/del','1','0','0','0'),('130','修改文章','larry-moxingguanli','35','Admin/Article/edit','1','0','0','0'),('131','删除文章','larry-moxingguanli','35','Admin/Article/del','1','0','0','0'),('132','文件上传','larry-moxingguanli','0','Admin/FileUpload/ajax_upload','1','0','0','0'),('133','添加分类','larry-moxingguanli','36','Admin/ArticleCategory/add','1','0','0','0'),('134','修改分类','larry-moxingguanli','36','Admin/ArticleCategory/edit','1','0','0','0'),('135','删除分类','larry-moxingguanli','36','Admin/ArticleCategory/del','1','0','0','0'),('138','常规设置','larry-moxingguanli','0','Admin/System/manage','1','1','0','0'),('139','添加栏目','larry-moxingguanli','34','Admin/Web/add','1','0','0','0'),('140','修改栏目','larry-moxingguanli','34','Admin/Web/edit','1','0','0','0'),('141','删除栏目','larry-moxingguanli','34','Admin/Web/del','1','0','0','0'),('142','编辑用户','larry-moxingguanli','11','Admin/User/edit','1','0','0','0'),('143','图标管理','fa-bookmark-o','2','Admin/Icon/manage','1','1','0','0'),('144','照片上传','larry-moxingguanli','132','Admin/Upload/upload','1','1','0','0'),('145','文件空间','larry-moxingguanli','132','Admin/Upload/manager','1','1','0','0'),('146','促销管理','fa-gift','147','Admin/Sale/index','1','1','0','0'),('147','商户中心','fa-building-o','1','Admin/Store/index','1','1','0','0'),('148','商户分类','fa-navicon','147','Admin/Store/category','1','1','0','0'),('149','楼层管理','fa-hospital-o','147','Admin/Store/floor','1','1','0','0'),('157','商户管理','fa-star-o','147','Admin/Store/storeList','1','1','0','0'),('158','商城管理','fa-shopping-cart','1','Admin/Shop/manage','1','1','0','0'),('159','订单管理','fa-list-alt','158','Admin/Shop/orderList','1','1','0','0'),('154','系统首页','fa-home','0','Admin/Index/manage','1','1','2','0'),('156','代码编辑','&#xe635;','2','Admin/Filemanage/codeEdit','1','1','0','0'),('181','测试菜单','fa-dot-circle-o','138','Admin/Test/manage','1','1','1','0'),('160','物流管理','fa-truck','158','Admin/Shop/logistics','1','1','0','0'),('161','商品管理','fa-paypal','158','Admin/Shop/products','1','1','0','0'),('162','品牌管理','fa-star-o','158','Admin/Shop/brand','1','1','0','0'),('163','获取图标','larry-moxingguanli','13','Admin/Menu/tub','1','0','0','0'),('164','奥森图标','fa-lastfm','143','Admin/Icon/fontAwesome','1','1','0','0'),('165','layui图标','&#xe609;','143','Admin/Icon/index','1','1','0','0'),('166','标签管理','fa-tags','59','Admin/Tags/index','1','1','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_menu` */
 INSERT INTO `lin_menu` VALUES ('167','新增轮播','larry-moxingguanli','57','Admin/Banner/add','1','0','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_menu` */
 INSERT INTO `lin_menu` VALUES ('168','删除轮播','larry-moxingguanli','57','Admin/Banner/del','1','0','0','0'),('169','编辑轮播','larry-moxingguanli','57','Admin/Banner/edit','1','0','0','0'),('170','选择链接类型','larry-moxingguanli','57','Admin/Banner/choselink','1','0','0','0'),('171','添加第三方参数','larry-moxingguanli','24','Admin/System/addthird','1','0','0','0'),('172','编辑第三方参数','larry-moxingguanli','24','Admin/System/editthird','1','0','0','0'),('173','删除第三方参数','larry-moxingguanli','24','Admin/System/delthird','1','0','0','0'),('174','编辑系统参数','larry-moxingguanli','24','Admin/System/editparameter','1','0','0','0'),('175','评论管理','fa-comments-o','18','Admin/Article/comment','1','1','0','0'),('176','编辑会员','larry-moxingguanli','15','Admin/Member/edit','1','0','0','0'),('177','添加会员','larry-moxingguanli','15','Admin/Member/add','1','0','0','0'),('178','删除会员','larry-moxingguanli','15','Admin/Member/del','1','0','0','0'),('179','禁用会员','larry-moxingguanli','15','Admin/Member/close','1','0','0','0'),('180','启用会员','larry-moxingguanli','15','Admin/Member/open','1','0','0','0'),('182','支付管理','fa-cc-paypal','158','Admin/Shop/payManage','1','1','0','0'),('183','活动管理','fa-slideshare','147','Admin/Store/active','1','1','0','0'),('184','停车缴费','fa-taxi','147','Admin/Store/park','1','1','0','0'),('185','文字回复','&#xe63a;','21','Admin/WechatReplay/basic','1','1','0','0'),('186','图文回复','fa-photo','21','Admin/WechatReplay/news','1','1','0','0'),('187','图片回复','fa-file-picture-o','21','Admin/WechatReplay/images','1','1','0','0'),('188','语音回复','&#xe688;','21','Admin/WechatReplay/audio','1','1','0','0'),('189','视频回复','&#xe652;','21','Admin/WechatReplay/video','1','1','0','0'),('190','高级功能','&#xe857;','3','Admin/WechatService/index','1','1','0','0'),('191','自定义菜单','&#xe63c;','190','Admin/WechatService/menu','1','1','0','0'),('192','账号概况','&#xe628;','3','Admin/WechatSetting/index','1','1','2','0'),('193','账号详情','&#xe60b;','192','Admin/WechatSetting/info','1','1','1','0'),('194','账号设置','&#xe620;','192','Admin/WechatSetting/setting','1','1','0','0'),('195','特殊消息回复','&#xe609;','190','Admin/WechatService/specialMsg','1','1','0','0'),('196','二维码管理','fa-qrcode','190','Admin/WechatService/qrcode','1','1','0','0'),('197','多客服接入','&#xe6af;','190','Admin/WechatService/replay','1','1','0','0'),('198','长连接二维码','fa-qrcode','190','Admin/WechatService/url2qr','1','1','0','0'),('199','数据统计','fa-area-chart','3','Admin/WechatStat/index','1','1','0','0'),('200','聊天记录','fa-weixin','199','Admin/WechatStat/history','1','1','0','0'),('201','回复规则使用情况','&#xe632;','199','Admin/WechatStat/rule','1','1','0','0'),('202','关键字命中情况','&#xe639;','199','Admin/WechatStat/keyword','1','1','0','0'),('203','参数','fa-gears','199','Admin/WechatStat/setting','1','1','0','0'),('204','粉丝管理','&#xe600;','3','Admin/WechatFans/index','1','1','0','0'),('205','粉丝分组','&#xe613;','204','Admin/WechatFans/fangroup','1','1','0','0'),('206','粉丝','fa-users','204','Admin/WechatFans/fans','1','1','0','0'),('207','素材&amp;群发','&#xe609;','3','Admin/WechatSendAll/index','1','1','0','0'),('208','素材管理','&#xe6b2;','207','Admin/WechatSendAll/manager','1','1','0','0'),('209','定时群发','fa-bomb','207','Admin/WechatSendAll/mass','1','1','0','0'),('210','邮件通知参数','fa-envelope-o','190','Admin/WechatService/notify','1','1','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lin_menu_copy` */
 DROP TABLE IF EXISTS `lin_menu_copy`;/* MySQLReback Separation */ CREATE TABLE `lin_menu_copy` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'larry-moxingguanli',
  `parentid` int(10) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `spread` varchar(255) DEFAULT '1',
  `is_display` int(1) DEFAULT '1',
  `displayorder` int(10) DEFAULT '1',
  `level` int(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_menu_copy` */
 INSERT INTO `lin_menu_copy` VALUES ('1','系统管理','larry-xitongshezhi1','0','','1','1','1','0'),('2','内容管理','larry-neirongguanli','0','','1','1','1','0'),('3','微信公众平台','larry-weixingongzhongpingtai','4','','1','1','1','0'),('4','扩展模块','larry-ht_expand','0','','1','1','1','0'),('5','后台首页','larry-houtaishouye','1','Admin/Index/index','1','1','1','0'),('6','我的面板','larry-gerenxinxi5','1','','1','0','1','0'),('7','个人信息','larry-gerenxinxi1','6','Admin/User/userinfo','1','1','1','0'),('8','修改密码','larry-xiugaimima2','6','Admin/User/updatePwd','1','1','1','0'),('9','系统日志管理','larry-rizhi2','23','Admin/Log/index','1','1','1','0'),('10','用户管理','larry-10103','1','','1','1','1','0'),('11','用户列表','larry-yonghuliebiao1','10','Admin/User/index','1','1','1','0'),('12','角色列表','larry-jiaoseguanli1','10','Admin/permission/index','1','1','1','0'),('13','系统菜单管理','larry-caidanguanli','23','Admin/Menu/index','1','1','1','0'),('14','会员管理','larry-huiyuanguanli2','1','','1','1','1','0'),('15','会员注册列表','larry-kehuliebiao','14','Admin/Member/index','1','1','1','0'),('16','会员留言管理','larry-liuyan','14','Admin/Member/message','1','1','1','0'),('17','会员等级管理','larry-fengxianbaozhang','14','Admin/Member/level','1','1','1','0'),('18','网站管理','larry-30wangzhanguanli','2','','1','1','2','0'),('67','支付宝平台','larry-zhifubao','4','','1','1','1','0'),('21','接口设置','larry-api1','3','Admin/WeChat/interface','1','1','1','0'),('22','支付配置','larry-iconzfb','3','Admin/Wechat/pay','1','1','1','0'),('23','系统管理','larry-xitongshezhi1','1','','1','1','1','0'),('24','系统基本参数','larry-circularxiangxi','23','','1','1','1','0'),('25','SQL命令行工具','larry-sql2','23','','1','1','1','0'),('27','验证安全管理','larry-yanzheng','23','','1','1','1','0'),('28','图片水印设置','larry-shuiyin','23','','1','1','1','0'),('29','安全字典设置','larry-zidian','23','','1','1','1','0'),('30','短信接口配置','larry-duanxin1','23','','1','1','1','0'),('31','系统错误修复','larry-xiufu','23','','1','1','1','0'),('32','数据库管理','larry-sql1','23','Admin/Bak/index','1','1','1','0'),('33','友链管理','larry-a157','1','','1','1','1','0'),('34','网站栏目管理','larry-lanmuguanli','18','Admin/Web/nav','1','1','1','0'),('35','所有文章列表','larry-iconfontfilesfill','18','','1','1','1','0'),('36','待审核的文章','larry-daishenhe1','18','','1','1','1','0'),('37','我发布的文章','larry-fabu2','18','','1','1','1','0'),('38','Tags管理','larry-tags','18','','1','1','1','0'),('39','内容回收站','larry-iconfonthuishouzhan','18','','1','1','1','0'),('40','相册管理','larry-moxingguanli','2','','1','1','2','0'),('41','相册列表','larry-moxing1','40','Admin/Images/index','1','1','1','0'),('42','单页文档管理','larry-danye','40','','1','0','1','0'),('43','联动类别管理','larry-liandong','40','','1','0','1','0'),('44','自由列表管理','larry-zidingyicaidan1','40','','1','0','1','0'),('45','自定义表单','larry-iconzidingyibiaodan','40','','1','0','1','0'),('46','附件管理','larry-fujianguanli','2','','1','1','1','0'),('47','上传新文件','larry-shangchuanfujian','46','','1','1','1','0'),('48','附件数据管理','larry-fujian','46','','1','1','1','0'),('49','文件管理器','larry-wenjianguanli2','2','','1','1','1','0'),('50','视频管理','larry-eee','2','','1','1','2','0'),('51','视频列表','larry-shujucaiji','50','Admin/Video/index','1','1','1','0'),('52','视频分类','larry-linshi1','50','Admin/VideoCategory/index','1','1','1','0'),('53','导入采集规则','larry-guize','50','','1','0','1','0'),('54','监控采集模式','larry-jiankong1','50','','1','0','1','0'),('55','采集未下载内容','larry-xiazai2','50','','1','0','1','0'),('56','广告管理','larry-iconguanggaoguanli','2','','1','1','1','0'),('57','自定义广告','larry-zidingyiguanggaolan','56','','1','1','1','0'),('58','网盟广告','larry-guanggaolianmeng','56','','1','1','1','0'),('59','批量维护','larry-piliang','2','','1','1','1','0'),('60','一键更新网站','larry-yijian','59','','1','1','1','0'),('61','更新系统缓存','larry-xitonghuancun','59','','1','1','1','0'),('62','更新主页HTML','larry-tubiaozitimoban','59','','1','1','1','0'),('63','更新网站地图','larry-wangzhanditu','59','','1','1','1','0'),('64','数据库内容替换','larry-tihuan1','59','','1','1','1','0'),('65','自动摘要','larry-zhaiyao','59','','1','1','1','0'),('66','搜索关键词维护','larry-guanjianci','59','','1','1','1','0'),('68','商户管理','larry-guanjianci','0','','1','0','2','0'),('69','商家管理','larry-guanjianci','68','http://www.baidu.com','1','0','1','0'),('78','124124','larry-moxingguanli','68','','1','1','0','0'),('111','迷你工具箱','larry-moxingguanli','23','Admin/System/tools','1','1','0','0'),('81','请确认','larry-moxingguanli','0','','1','0','0','0'),('93','新增权限组','larry-moxingguanli','12','Admin/Permission/add','1','0','0','0'),('82','广告中心','larry-moxingguanli','0','','1','0','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_menu_copy` */
 INSERT INTO `lin_menu_copy` VALUES ('86','新建菜单','larry-moxingguanli','13','Admin/Menu/add','1','0','1','0');/* MySQLReback Separation */
 /* 插入数据 `lin_menu_copy` */
 INSERT INTO `lin_menu_copy` VALUES ('87','编辑菜单','larry-moxingguanli','13','Admin/Menu/edit','1','0','0','0'),('88','删除菜单','larry-moxingguanli','13','Admin/Menu/del','1','0','0','0'),('89','显示菜单','larry-moxingguanli','13','Admin/Menu/open','1','0','0','0'),('90','获取日志信息','larry-moxingguanli','9','Admin/Log/ajaxGetIndex','1','0','0','0'),('91','删除日志','larry-moxingguanli','9','Admin/Log/del','1','0','0','0'),('92','查看日志详情','larry-moxingguanli','9','Admin/Log/showDetail','1','0','0','0'),('94','删除权限组','larry-moxingguanli','12','Admin/Permission/del','1','0','0','0'),('95','编辑权限组','larry-moxingguanli','12','Admin/Permission/edit','1','0','0','0'),('96','禁用权限组','larry-moxingguanli','12','Admin/Permission/close','1','0','0','0'),('97','开启权限组','larry-moxingguanli','12','Admin/Permission/open','1','0','0','0'),('98','访问授权','larry-moxingguanli','12','Admin/Permission/rule','1','0','0','0'),('99','成员授权','larry-moxingguanli','12','Admin/Permission/member','1','0','0','0'),('100','新增用户','larry-moxingguanli','11','Admin/User/add','1','0','0','0'),('101','删除用户','larry-moxingguanli','11','Admin/User/del','1','0','0','0'),('102','启用用户','larry-moxingguanli','11','Admin/User/open','1','0','0','0'),('103','禁用用户','larry-moxingguanli','11','Admin/User/close','1','0','0','0'),('104','用户授权','larry-moxingguanli','11','Admin/Permission/group','1','0','0','0'),('108','新建表','larry-moxingguanli','32','Admin/Bak/add','1','0','0','0'),('109','查看表详情','larry-moxingguanli','32','Admin/Bak/edit','1','0','0','0'),('112','相册管理','larry-moxingguanli','18','Admin/Images/index','1','1','0','0'),('113','相册分类','larry-moxingguanli','40','Admin/ImagesCategory/index','1','1','0','0'),('114','新增相册分类','larry-moxingguanli','113','Admin/ImagesCategory/add','1','0','0','0'),('115','编辑相册分类','larry-moxingguanli','113','Admin/ImagesCategory/edit','1','0','0','0'),('116','删除相册分类','larry-moxingguanli','113','Admin/ImagesCategory/del','1','0','0','0'),('117','添加照片','larry-moxingguanli','41','Admin/Images/add','1','0','0','0'),('118','删除照片','larry-moxingguanli','41','Admin/Images/del','1','0','0','0'),('119','编辑照片','larry-moxingguanli','41','Admin/images/edit','1','0','0','0'),('120','添加视频','larry-moxingguanli','51','Admin/Video/add','1','0','0','0'),('121','编辑视频','larry-moxingguanli','51','Admin/Video/edit','1','0','0','0'),('122','删除视频','larry-moxingguanli','51','Admin/Video/del','1','0','0','0'),('123','添加视频分类','larry-moxingguanli','52','Admin/VideoCategory/add','1','0','0','0'),('124','编辑视频分类','larry-moxingguanli','52','Admin/VideoCategory/edit','1','0','0','0'),('125','删除视频分类','larry-moxingguanli','52','Admin/VideoCategory/del','1','0','0','0'),('126','菜单设置','larry-moxingguanli','3','Admin/wechat/menu','1','1','0','0'),('127','自动回复','larry-moxingguanli','3','Admin/WeChat/response','1','1','0','0'),('128','应用管理','larry-moxingguanli','1','','1','1','0','0'),('129','应用列表','larry-moxingguanli','128','Admin/Application/index','1','1','0','0'),('130','接口列表','larry-moxingguanli','128','Admin/ApiManage/index','1','1','0','0'),('131','删除应用','larry-moxingguanli','129','Admin/Application/del','1','1','0','0'),('132','启用应用','larry-moxingguanli','129','Admin/Application/open','1','1','0','0'),('133','应用禁用','larry-moxingguanli','129','Admin/Application/close','1','1','0','0'),('134','编辑应用','larry-moxingguanli','129','Admin/Application/edit','1','1','0','0'),('135','新增应用','larry-moxingguanli','129','Admin/Application/add','1','1','0','0'),('136','批量上传返回字段','larry-moxingguanli','130','Admin/FieldsManage/upload','1','1','0','0'),('137','字段编辑','larry-moxingguanli','130','Admin/FieldsManage/edit','1','1','0','0'),('138','新增字段','larry-moxingguanli','130','Admin/FieldsManage/add','1','1','0','0'),('139','请求字段编辑','larry-moxingguanli','130','Admin/FieldsManage/request','1','1','0','0'),('140','返回字段编辑','larry-moxingguanli','130','Admin/FieldsManage/response','1','1','0','0'),('141','删除接口','larry-moxingguanli','130','Admin/ApiManage/del','1','1','0','0'),('142','新增接口','larry-moxingguanli','130','Admin/ApiManage/add','1','1','0','0'),('143','禁用接口','larry-moxingguanli','130','Admin/ApiManage/close','1','1','0','0'),('144','启用接口','larry-moxingguanli','130','Admin/ApiManage/open','1','1','0','0'),('145','编辑接口','larry-moxingguanli','130','Admin/ApiManage/edit','1','1','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lin_menu_copy1` */
 DROP TABLE IF EXISTS `lin_menu_copy1`;/* MySQLReback Separation */ CREATE TABLE `lin_menu_copy1` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'larry-moxingguanli',
  `parentid` int(10) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `spread` varchar(255) DEFAULT '1',
  `is_display` int(1) DEFAULT '1',
  `displayorder` int(10) DEFAULT '1',
  `level` int(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_menu_copy1` */
 INSERT INTO `lin_menu_copy1` VALUES ('1','系统管理','larry-xitongshezhi1','0','Admin/Nav/config','1','1','1','0'),('2','内容管理','larry-neirongguanli','0','Admin/Content/manage','1','1','1','0'),('3','微信公众平台','larry-weixingongzhongpingtai','4','','1','1','1','0'),('4','扩展模块','larry-ht_expand','0','','1','1','1','0'),('5','后台首页','larry-houtaishouye','1','Admin/Index/index','1','1','1','0'),('6','我的面板','larry-gerenxinxi5','1','Admin/Config/ban','1','0','1','0'),('7','个人信息','larry-gerenxinxi1','6','Admin/User/userinfo','1','1','1','0'),('8','修改密码','larry-xiugaimima2','6','Admin/User/updatePwd','1','1','1','0'),('9','系统日志管理','larry-rizhi2','23','Admin/Log/index','1','1','1','0'),('10','用户管理','larry-10103','1','Admin/User/manage','1','1','1','0'),('11','用户列表','larry-yonghuliebiao1','10','Admin/User/index','1','1','1','0'),('12','角色列表','larry-jiaoseguanli1','10','Admin/permission/index','1','1','1','0'),('13','系统菜单管理','larry-caidanguanli','23','Admin/Menu/index','1','1','1','0'),('14','会员管理','larry-huiyuanguanli2','1','Admin/member/manage','1','1','1','0'),('15','会员注册列表','larry-kehuliebiao','14','Admin/Member/index','1','1','1','0'),('16','会员留言管理','larry-liuyan','14','Admin/Member/message','1','1','1','0'),('17','会员等级管理','larry-fengxianbaozhang','14','Admin/Member/level','1','1','1','0'),('18','网站管理','larry-30wangzhanguanli','2','','1','1','2','0'),('67','支付宝平台','larry-zhifubao','4','','1','1','1','0'),('21','接口设置','larry-api1','3','Admin/WeChat/interface','1','1','1','0'),('22','支付配置','larry-iconzfb','3','Admin/Wechat/pay','1','1','1','0'),('23','系统工具','larry-xitongshezhi1','1','Admin/Config/manage','1','1','1','0'),('24','系统基本参数','larry-circularxiangxi','23','Admin/System/parameter','1','1','1','0'),('25','SQL命令行工具','larry-sql2','23','Admin/System/sqltool','1','1','1','0'),('27','验证安全管理','larry-yanzheng','23','Admin/System/safecheck','1','1','1','0'),('29','安全字典设置','larry-zidian','23','Admin/System/safedictionary','1','1','1','0'),('30','短信接口配置','larry-duanxin1','23','Admin/System/sms','1','1','1','0'),('32','数据库管理','larry-sql1','23','Admin/Bak/index','1','1','1','0'),('33','友链管理','larry-a157','1','Admin/Link/index','1','1','1','0'),('34','网站栏目管理','larry-lanmuguanli','18','Admin/Web/nav','1','1','1','0'),('35','所有文章列表','larry-iconfontfilesfill','18','','1','1','1','0'),('36','待审核的文章','larry-daishenhe1','18','','1','1','1','0'),('37','我发布的文章','larry-fabu2','18','','1','1','1','0'),('38','Tags管理','larry-tags','18','','1','1','1','0'),('39','内容回收站','larry-iconfonthuishouzhan','18','','1','1','1','0'),('40','相册管理','larry-moxingguanli','2','Admin/Images/manage','1','1','2','0'),('41','相册列表','larry-moxing1','40','Admin/Images/index','1','1','1','0'),('42','单页文档管理','larry-danye','40','','1','0','1','0'),('46','附件管理','larry-fujianguanli','2','','1','1','1','0'),('47','上传新文件','larry-shangchuanfujian','46','','1','1','1','0'),('48','附件数据管理','larry-fujian','46','','1','1','1','0'),('49','文件管理器','larry-wenjianguanli2','2','','1','1','1','0'),('50','视频管理','larry-eee','2','Admin/Video/manage','1','1','2','0'),('51','视频列表','larry-shujucaiji','50','Admin/Video/index','1','1','1','0'),('52','视频分类','larry-linshi1','50','Admin/VideoCategory/index','1','1','1','0'),('56','广告管理','larry-iconguanggaoguanli','2','','1','1','1','0'),('57','自定义广告','larry-zidingyiguanggaolan','56','','1','1','1','0'),('58','网盟广告','larry-guanggaolianmeng','56','','1','1','1','0'),('59','批量维护','larry-piliang','2','','1','1','1','0'),('60','一键更新网站','larry-yijian','59','','1','1','1','0'),('61','更新系统缓存','larry-xitonghuancun','59','','1','1','1','0'),('62','更新主页HTML','larry-tubiaozitimoban','59','','1','1','1','0'),('63','更新网站地图','larry-wangzhanditu','59','','1','1','1','0'),('64','数据库内容替换','larry-tihuan1','59','','1','1','1','0'),('65','自动摘要','larry-zhaiyao','59','','1','1','1','0'),('66','搜索关键词维护','larry-guanjianci','59','','1','1','1','0'),('111','迷你工具箱','larry-moxingguanli','23','Admin/System/tools','1','1','0','0'),('81','请确认','larry-moxingguanli','0','','1','0','0','0'),('93','新增权限组','larry-moxingguanli','12','Admin/Permission/add','1','0','0','0'),('82','广告中心','larry-moxingguanli','0','','1','0','0','0'),('86','新建菜单','larry-moxingguanli','13','Admin/Menu/add','1','0','1','0'),('87','编辑菜单','larry-moxingguanli','13','Admin/Menu/edit','1','0','0','0'),('88','删除菜单','larry-moxingguanli','13','Admin/Menu/del','1','0','0','0'),('89','显示菜单','larry-moxingguanli','13','Admin/Menu/open','1','0','0','0'),('90','获取日志信息','larry-moxingguanli','9','Admin/Log/ajaxGetIndex','1','0','0','0'),('91','删除日志','larry-moxingguanli','9','Admin/Log/del','1','0','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_menu_copy1` */
 INSERT INTO `lin_menu_copy1` VALUES ('92','查看日志详情','larry-moxingguanli','9','Admin/Log/showDetail','1','0','0','0');/* MySQLReback Separation */
 /* 插入数据 `lin_menu_copy1` */
 INSERT INTO `lin_menu_copy1` VALUES ('94','删除权限组','larry-moxingguanli','12','Admin/Permission/del','1','0','0','0'),('95','编辑权限组','larry-moxingguanli','12','Admin/Permission/edit','1','0','0','0'),('96','禁用权限组','larry-moxingguanli','12','Admin/Permission/close','1','0','0','0'),('97','开启权限组','larry-moxingguanli','12','Admin/Permission/open','1','0','0','0'),('98','访问授权','larry-moxingguanli','12','Admin/Permission/rule','1','0','0','0'),('99','成员授权','larry-moxingguanli','12','Admin/Permission/member','1','0','0','0'),('100','新增用户','larry-moxingguanli','11','Admin/User/add','1','0','0','0'),('101','删除用户','larry-moxingguanli','11','Admin/User/del','1','0','0','0'),('102','启用用户','larry-moxingguanli','11','Admin/User/open','1','0','0','0'),('103','禁用用户','larry-moxingguanli','11','Admin/User/close','1','0','0','0'),('104','用户授权','larry-moxingguanli','11','Admin/Permission/group','1','0','0','0'),('108','新建表','larry-moxingguanli','32','Admin/Bak/add','1','0','0','0'),('109','查看表详情','larry-moxingguanli','32','Admin/Bak/edit','1','0','0','0'),('112','相册管理','larry-moxingguanli','18','Admin/Images/index','1','1','0','0'),('113','相册分类','larry-moxingguanli','40','Admin/ImagesCategory/index','1','1','0','0'),('114','新增相册分类','larry-moxingguanli','113','Admin/ImagesCategory/add','1','0','0','0'),('115','编辑相册分类','larry-moxingguanli','113','Admin/ImagesCategory/edit','1','0','0','0'),('116','删除相册分类','larry-moxingguanli','113','Admin/ImagesCategory/del','1','0','0','0'),('117','添加照片','larry-moxingguanli','41','Admin/Images/add','1','0','0','0'),('118','删除照片','larry-moxingguanli','41','Admin/Images/del','1','0','0','0'),('119','编辑照片','larry-moxingguanli','41','Admin/images/edit','1','0','0','0'),('120','添加视频','larry-moxingguanli','51','Admin/Video/add','1','0','0','0'),('121','编辑视频','larry-moxingguanli','51','Admin/Video/edit','1','0','0','0'),('122','删除视频','larry-moxingguanli','51','Admin/Video/del','1','0','0','0'),('123','添加视频分类','larry-moxingguanli','52','Admin/VideoCategory/add','1','0','0','0'),('124','编辑视频分类','larry-moxingguanli','52','Admin/VideoCategory/edit','1','0','0','0'),('125','删除视频分类','larry-moxingguanli','52','Admin/VideoCategory/del','1','0','0','0'),('126','菜单设置','larry-moxingguanli','3','Admin/wechat/menu','1','1','0','0'),('127','自动回复','larry-moxingguanli','3','Admin/WeChat/response','1','1','0','0'),('128','应用管理','larry-moxingguanli','1','Admin/Applicaion/manage','1','1','0','0'),('129','应用列表','larry-moxingguanli','128','Admin/Application/index','1','1','0','0'),('130','接口列表','larry-moxingguanli','128','Admin/ApiManage/index','1','1','0','0'),('131','删除应用','larry-moxingguanli','129','Admin/Application/del','1','1','0','0'),('132','启用应用','larry-moxingguanli','129','Admin/Application/open','1','1','0','0'),('133','应用禁用','larry-moxingguanli','129','Admin/Application/close','1','1','0','0'),('134','编辑应用','larry-moxingguanli','129','Admin/Application/edit','1','1','0','0'),('135','新增应用','larry-moxingguanli','129','Admin/Application/add','1','1','0','0'),('136','批量上传返回字段','larry-moxingguanli','130','Admin/FieldsManage/upload','1','1','0','0'),('137','字段编辑','larry-moxingguanli','130','Admin/FieldsManage/edit','1','1','0','0'),('138','新增字段','larry-moxingguanli','130','Admin/FieldsManage/add','1','1','0','0'),('139','请求字段编辑','larry-moxingguanli','130','Admin/FieldsManage/request','1','1','0','0'),('140','返回字段编辑','larry-moxingguanli','130','Admin/FieldsManage/response','1','1','0','0'),('141','删除接口','larry-moxingguanli','130','Admin/ApiManage/del','1','1','0','0'),('142','新增接口','larry-moxingguanli','130','Admin/ApiManage/add','1','1','0','0'),('143','禁用接口','larry-moxingguanli','130','Admin/ApiManage/close','1','1','0','0'),('144','启用接口','larry-moxingguanli','130','Admin/ApiManage/open','1','1','0','0'),('145','编辑接口','larry-moxingguanli','130','Admin/ApiManage/edit','1','1','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lin_message` */
 DROP TABLE IF EXISTS `lin_message`;/* MySQLReback Separation */ CREATE TABLE `lin_message` (
  `msgid` int(10) NOT NULL AUTO_INCREMENT,
  `art_id` int(10) DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  `userask` varchar(255) DEFAULT NULL,
  `asktime` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1' COMMENT '1:审核通过,0 审核不通过',
  PRIMARY KEY (`msgid`)
) ENGINE=MyISAM AUTO_INCREMENT=1127 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_message` */
 INSERT INTO `lin_message` VALUES ('1','1','3','你好，请问你这个模版用的是什么框架啊？','2017-06-13 21:12:14','1'),('2','3','3','你好，请问你这个模版用的是什么框架啊？','2017-06-13 21:12:14','1'),('3','5','3','你好，请问你这个模版用的是什么框架啊？','2017-06-13 21:12:14','1'),('4','3','3','你好，请问你这个模版用的是什么框架啊？','2017-06-13 21:12:14','1'),('5','5','3','你好，请问你这个模版用的是什么框架啊？','2017-06-13 21:12:14','1'),('6','1','3','你好，请问你这个模版用的是什么框架啊？','2017-06-13 21:12:14','1'),('7','3','3','12人人访问服务','2017-07-22 23:35:14','1'),('8','3','3','QQ无法','2017-07-22 23:36:07','1'),('9','3','3','无功无过','2017-07-22 23:36:28','1'),('10','3','3','确认放弃无法','2017-07-22 23:38:05','1'),('11','3','3','确认放弃无法','2017-07-22 23:38:37','1'),('12','3','3','人望各位','2017-07-22 23:38:47','1'),('13','3','3','11111111111','2017-07-22 23:41:30','1'),('14','3','3','124124','2017-07-22 23:43:04','1'),('15','3','3','千万人群无若','2017-07-22 23:44:48','1'),('16','5','3','很好&lt;img src=&quot;http://localhost/svn/DouCMS/Public/common/layui/images/face/41.gif&quot; alt=&quot;[悲伤]&quot;&gt;','2017-07-22 23:48:03','1'),('17','5','3','&lt;img src=&quot;http://localhost/svn/DouCMS/Public/common/layui/images/face/57.gif&quot; alt=&quot;[来]&quot;&gt;问题问过','2017-07-22 23:50:47','1'),('18','5','3','&lt;img src=&quot;http://localhost/svn/DouCMS/Public/common/layui/images/face/15.gif&quot; alt=&quot;[生病]&quot;&gt;热污染','2017-07-22 23:53:18','1'),('19','5','3','&lt;a target=&quot;_blank&quot; href=&quot;http://www.linxinran.cn&quot;&gt;http://www.linxinran.cn&lt;/a&gt;','2017-07-22 23:54:31','1'),('20','5','3','412412&lt;img src=&quot;http://localhost/svn/DouCMS/Public/common/layui/images/face/46.gif&quot; alt=&quot;[互粉]&quot;&gt;','2017-08-06 20:58:56','1'),('21','5','3','&lt;img src=&quot;http://linxinran.cn/Public/common/layui/images/face/45.gif&quot; alt=&quot;[怒骂]&quot;&gt;twttw','2017-08-16 09:55:22','1');/* MySQLReback Separation */
 /* 创建表结构 `lin_msg` */
 DROP TABLE IF EXISTS `lin_msg`;/* MySQLReback Separation */ CREATE TABLE `lin_msg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `href` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT '#009688',
  `addtime` int(10) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_msg` */
 INSERT INTO `lin_msg` VALUES ('1','','#009688','1500537068','欢迎来到豆宝网，本博客的后台管理也正在制作 , 敬请期待！'),('2','','#009688','1500537068','网站新增留言回复啦！使用QQ登陆即可回复，人人都可以回复！'),('3','','#009688','1500537068','如果你觉得网站做得还不错，点个赞吧！'),('4','','#009688','1500537068','豆宝网 &nbsp;—— &nbsp;一个.PHP程序员的个人博客，网站采用Layui为前端框架，目前正在建设中！');/* MySQLReback Separation */
 /* 创建表结构 `lin_news` */
 DROP TABLE IF EXISTS `lin_news`;/* MySQLReback Separation */ CREATE TABLE `lin_news` (
  `newsId` int(10) NOT NULL AUTO_INCREMENT,
  `newsName` varchar(255) DEFAULT NULL,
  `newsAuthor` varchar(255) DEFAULT NULL,
  `newsStatus` int(1) DEFAULT NULL,
  `newsLook` varchar(255) DEFAULT NULL,
  `isshow` int(1) DEFAULT NULL,
  `newsTime` datetime DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`newsId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_news` */
 INSERT INTO `lin_news` VALUES ('1','124','4124','1','1','1','2017-07-03 20:58:52','1',''),('2','12124','124124','0','0','1','2017-07-19 20:09:43','1','');/* MySQLReback Separation */
 /* 创建表结构 `lin_parameter` */
 DROP TABLE IF EXISTS `lin_parameter`;/* MySQLReback Separation */ CREATE TABLE `lin_parameter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `webname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `webaddr` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `seotitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `seodesc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bacode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `addr` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `welcome` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `logo_home` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `logo_admin` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `background` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;/* MySQLReback Separation */
 /* 插入数据 `lin_parameter` */
 INSERT INTO `lin_parameter` VALUES ('1','豆宝网','http://www.linxinran.cn','doudoubao,doudou,豆豆宝,豆宝,豆宝网,豆宝的博客,林歆然','doudoubao,doudou,豆豆宝,豆宝,豆宝网,豆宝的博客,林歆然','苏ICP备16048545号','2016-2017','2505451091@qq.com','南京市玄武区中央路','13813813888','欢迎来到豆宝网','豆宝网是豆豆宝的专属网站		            						        						        						        						        						        						        						        						        						        ','images/2017-09-11/20170911092746768.jpg','images/2017-09-11/201709110921305436.JPG','images/2017-09-11/201709110920405653.JPG');/* MySQLReback Separation */
 /* 创建表结构 `lin_replay` */
 DROP TABLE IF EXISTS `lin_replay`;/* MySQLReback Separation */ CREATE TABLE `lin_replay` (
  `r_id` int(10) NOT NULL,
  `msg_id` int(10) DEFAULT NULL,
  `r_uid` int(10) DEFAULT NULL,
  `art_id` int(10) DEFAULT NULL,
  `r_addtime` datetime DEFAULT NULL,
  `r_msg` varchar(255) DEFAULT NULL,
  `r_status` int(1) DEFAULT '1' COMMENT '状态,1显示,0 不显示',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lin_site_menu` */
 DROP TABLE IF EXISTS `lin_site_menu`;/* MySQLReback Separation */ CREATE TABLE `lin_site_menu` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT '',
  `parentid` int(10) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `spread` varchar(255) DEFAULT '1',
  `is_display` int(1) DEFAULT '1',
  `displayorder` int(10) DEFAULT '1',
  `level` int(1) DEFAULT '0',
  `class` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_site_menu` */
 INSERT INTO `lin_site_menu` VALUES ('129','首页','fa-home','0','Home/Index/index','1','1','1','0','home'),('130','新闻资讯','fa-file-text','0','Home/News/index','1','1','1','0','news'),('131','项目案例','fa-tags','0','Home/Solution/index','1','1','1','0','solution'),('132','我们的服务','fa-hourglass-half','0','Home/OurService/index','1','1','1','0','ourService'),('133','关于我们','fa-info','0','Home/AboutUs/index','1','1','1','0','aboutUs'),('135','联系我们','fa-info','0','Home/ContactUs/index','1','1','1','0','contactUs');/* MySQLReback Separation */
 /* 创建表结构 `lin_tags` */
 DROP TABLE IF EXISTS `lin_tags`;/* MySQLReback Separation */ CREATE TABLE `lin_tags` (
  `t_id` int(10) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(255) DEFAULT NULL,
  `t_addtime` int(10) DEFAULT NULL,
  `t_status` int(1) DEFAULT NULL,
  `t_type` int(1) DEFAULT NULL COMMENT '标签类型 1:文章 2:视频 3图片',
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;/* MySQLReback Separation */
 /* 创建表结构 `lin_third_parameter` */
 DROP TABLE IF EXISTS `lin_third_parameter`;/* MySQLReback Separation */ CREATE TABLE `lin_third_parameter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `appid` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '1' COMMENT '0:禁用 1:启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_third_parameter` */
 INSERT INTO `lin_third_parameter` VALUES ('1','融云开发环境','','25wehl3u28y3w','qxtqT4Eg9W4dGE','1'),('2','融云生产环境','','','','1'),('3','友盟ios','','','','1'),('4','友盟android','','','','1'),('5','容联云通讯','8aaf07085d106c7f015d5a746b211f29','8aaf07085d106c7f015d5a7469b01f22','db699cf876174655a4339cffc3b36291','1'),('6','七牛','','S4VIexWbZ8QYEdFezqC3oywx-uqzhVB1Z2sXhTB5','-1LRNWrUwEFrlf9w922GUPb_52MgTzMHZhKT_xb3','1');/* MySQLReback Separation */
 /* 创建表结构 `lin_user` */
 DROP TABLE IF EXISTS `lin_user`;/* MySQLReback Separation */ CREATE TABLE `lin_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(64) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码',
  `regTime` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `regIp` varchar(11) NOT NULL DEFAULT '' COMMENT '注册IP',
  `updateTime` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '账号状态 0封号 1正常',
  `openId` varchar(100) DEFAULT NULL COMMENT '微信唯一ID',
  `image` varchar(255) DEFAULT NULL COMMENT '头像',
  `sex` int(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员认证信息';/* MySQLReback Separation */
 /* 插入数据 `lin_user` */
 INSERT INTO `lin_user` VALUES ('1','root','九月一十八','912601e4ad1b308c9ae41877cf6ca754','1500801967','0','1492236545','1','','images/2017-09-11/20170911092746768.jpg','','',''),('2','admin','豆豆妈','912601e4ad1b308c9ae41877cf6ca754','1499265896','0','0','1','','images/2017-09-11/20170911092746768.jpg','','',''),('3','abcd','豆豆宝','912601e4ad1b308c9ae41877cf6ca754','1499522259','0','0','1','','','','',''),('4','admin888','哈喽','912601e4ad1b308c9ae41877cf6ca754','1500802014','0','0','1','','','','','');/* MySQLReback Separation */
 /* 创建表结构 `lin_user_action` */
 DROP TABLE IF EXISTS `lin_user_action`;/* MySQLReback Separation */ CREATE TABLE `lin_user_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `actionName` varchar(50) NOT NULL DEFAULT '' COMMENT '行为名称',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '操作用户ID',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `data` text COMMENT '用户提交的数据',
  `url` varchar(200) NOT NULL DEFAULT '' COMMENT '操作URL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户操作日志';/* MySQLReback Separation */
 /* 创建表结构 `lin_user_data` */
 DROP TABLE IF EXISTS `lin_user_data`;/* MySQLReback Separation */ CREATE TABLE `lin_user_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `loginTimes` int(11) NOT NULL COMMENT '账号登录次数',
  `lastLoginIp` varchar(11) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `lastLoginTime` int(11) NOT NULL COMMENT '最后登录时间',
  `uid` varchar(11) NOT NULL DEFAULT '' COMMENT '用户ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员数据表';/* MySQLReback Separation */
 /* 插入数据 `lin_user_data` */
 INSERT INTO `lin_user_data` VALUES ('1','1','826358665','1505395045','1'),('2','1','0','1507882694','2'),('3','1','3027100225','1504596973','3');/* MySQLReback Separation */
 /* 创建表结构 `lin_video` */
 DROP TABLE IF EXISTS `lin_video`;/* MySQLReback Separation */ CREATE TABLE `lin_video` (
  `v_id` int(10) NOT NULL AUTO_INCREMENT,
  `v_desc` varchar(255) DEFAULT NULL,
  `v_pic` varchar(255) DEFAULT NULL,
  `v_url` varchar(255) DEFAULT NULL,
  `v_name` varchar(255) DEFAULT NULL,
  `v_create_time` int(10) DEFAULT NULL,
  `v_com_num` int(10) DEFAULT NULL,
  `v_view_num` int(10) DEFAULT '1',
  `v_cid` int(10) DEFAULT NULL,
  `v_type` int(10) DEFAULT '1',
  `v_status` int(1) DEFAULT '0' COMMENT '0上线 1:下线',
  `v_author` varchar(255) DEFAULT NULL,
  `is_top` int(1) DEFAULT '0' COMMENT '1:前台banner显示',
  `v_size` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_video` */
 INSERT INTO `lin_video` VALUES ('51','王小艳玩游戏','http://oo8ss07gi.bkt.clouddn.com/VID_20170723_210808.mp4?vframe/jpg/offset/2','http://oo8ss07gi.bkt.clouddn.com/VID_20170723_210808.mp4','王小艳玩游戏','1503563249','','1','125','1','0','九月一十八','0','93.34MB'),('52','小宝今天扶床学走路喽','http://oo8ss07gi.bkt.clouddn.com/149598206924992.mp4?vframe/jpg/offset/2','http://oo8ss07gi.bkt.clouddn.com/149598206924992.mp4','小宝学走路','1503563280','','1','124','1','0','九月一十八','0','304.04KB'),('53','','http://oo8ss07gi.bkt.clouddn.com/15052963432133986360.mp4?vframe/jpg/offset/2','http://oo8ss07gi.bkt.clouddn.com/15052963432133986360.mp4','','1505296347','','2','125','1','0','豆豆妈','0','3.16MB'),('58','','http://oo8ss07gi.bkt.clouddn.com/15053016851441508269.mp4?vframe/jpg/offset/2','http://oo8ss07gi.bkt.clouddn.com/15053016851441508269.mp4','豆宝在家','1505301687','','1','125','1','0','豆豆妈','0','1.99MB'),('55','','http://oo8ss07gi.bkt.clouddn.com/1505297346197287655.mp4?vframe/jpg/offset/2','http://oo8ss07gi.bkt.clouddn.com/1505297346197287655.mp4','豆宝在玄武湖','1505297348','','6','125','1','0','豆豆妈','0','2.4MB'),('56','','http://oo8ss07gi.bkt.clouddn.com/149598177111853.mp4?vframe/png/offset/1/w/1366/h/768','	
http://oo8ss07gi.bkt.clouddn.com/149598177111853.mp4','豆宝会走路喽','1505297348','','3','125','1','0','九月一十八','1','452.9KB'),('57','','http://oo8ss07gi.bkt.clouddn.com/doudoubao.mp4?vframe/png/offset/1/w/1366/h/768','http://oo8ss07gi.bkt.clouddn.com/doudoubao.mp4','豆宝唱歌 \" 摇啊摇 \"','1505297348','','1','124','1','0','九月一十八','1','2.02MB'),('59','','http://oo8ss07gi.bkt.clouddn.com/15055329121023566103.mp4?vframe/png/offset/1/w/1366/h/768','http://oo8ss07gi.bkt.clouddn.com/15055329121023566103.mp4','豆宝在玄武湖','1505532914','','1','125','1','0','豆豆妈','0','1.39MB'),('60','豆宝在玄武湖','http://oo8ss07gi.bkt.clouddn.com/1505532988317588665.mp4?vframe/png/offset/1/w/1366/h/768','http://oo8ss07gi.bkt.clouddn.com/1505532988317588665.mp4','豆宝在玄武湖','1505532989','','1','125','1','0','豆豆妈','0','2.09MB');/* MySQLReback Separation */
 /* 创建表结构 `lin_video_category` */
 DROP TABLE IF EXISTS `lin_video_category`;/* MySQLReback Separation */ CREATE TABLE `lin_video_category` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'larry-moxingguanli',
  `href` varchar(255) DEFAULT NULL,
  `parentid` int(10) DEFAULT NULL,
  `spread` varchar(255) DEFAULT '1',
  `is_display` int(1) DEFAULT '1',
  `displayorder` int(10) DEFAULT '1',
  `level` int(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_video_category` */
 INSERT INTO `lin_video_category` VALUES ('121','豆宝初生','larry-moxingguanli','','0','1','1','0','0'),('122','豆宝满月','larry-moxingguanli','','0','1','1','0','0'),('123','豆宝12天','larry-moxingguanli','','0','1','1','0','0'),('124','豆宝周岁','larry-moxingguanli','','0','1','1','0','0'),('125','豆宝两周岁','larry-moxingguanli','','0','1','1','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lin_web_nav` */
 DROP TABLE IF EXISTS `lin_web_nav`;/* MySQLReback Separation */ CREATE TABLE `lin_web_nav` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'larry-moxingguanli',
  `href` varchar(255) DEFAULT NULL,
  `parentid` int(10) DEFAULT NULL,
  `spread` varchar(255) DEFAULT '1',
  `is_display` int(1) DEFAULT '1',
  `displayorder` int(10) DEFAULT '1',
  `level` int(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_web_nav` */
 INSERT INTO `lin_web_nav` VALUES ('114','黄山','larry-moxingguanli','','0','1','1','0','0'),('115','西塘','larry-moxingguanli','','0','1','1','0','0'),('116','栖霞山','larry-moxingguanli','','0','1','1','0','0'),('117','玄武湖','larry-moxingguanli','','0','1','1','0','0'),('118','2016年','larry-moxingguanli','','117','1','1','0','0'),('119','2017年','larry-moxingguanli','','117','1','1','0','0'),('120','山东威海','larry-moxingguanli','','0','1','1','0','0'),('121','2014年','larry-moxingguanli','','116','1','1','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lin_wx_img` */
 DROP TABLE IF EXISTS `lin_wx_img`;/* MySQLReback Separation */ CREATE TABLE `lin_wx_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
  `keyword` char(255) NOT NULL COMMENT '关键词',
  `desc` text NOT NULL COMMENT '简介',
  `pic` char(255) NOT NULL COMMENT '封面图片',
  `url` char(255) NOT NULL COMMENT '图文外链地址',
  `createtime` varchar(13) NOT NULL COMMENT '创建时间',
  `uptatetime` varchar(13) NOT NULL COMMENT '更新时间',
  `title` varchar(60) NOT NULL COMMENT '标题',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='微信图文';/* MySQLReback Separation */
 /* 插入数据 `lin_wx_img` */
 INSERT INTO `lin_wx_img` VALUES ('3','手册','手册','/uploads/20170223/7d5c2a0b02176d0620f532765bd03c8a.png','https://www.kancloud.cn/chichu/cltphp','1487645725','','手册');/* MySQLReback Separation */
 /* 创建表结构 `lin_wx_keyword` */
 DROP TABLE IF EXISTS `lin_wx_keyword`;/* MySQLReback Separation */ CREATE TABLE `lin_wx_keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
  `keyword` char(255) NOT NULL COMMENT '关键词',
  `pid` int(11) NOT NULL COMMENT '对应表ID',
  `type` varchar(30) DEFAULT 'TEXT' COMMENT '关键词操作类型',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_wx_keyword` */
 INSERT INTO `lin_wx_keyword` VALUES ('5','早上好！','5','TEXT'),('4','你好','4','TEXT'),('8','手册','3','IMG');/* MySQLReback Separation */
 /* 创建表结构 `lin_wx_menu` */
 DROP TABLE IF EXISTS `lin_wx_menu`;/* MySQLReback Separation */ CREATE TABLE `lin_wx_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `open` tinyint(1) DEFAULT '1' COMMENT '状态',
  `pid` int(11) DEFAULT '0' COMMENT '上级菜单',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `listorder` int(5) DEFAULT '0' COMMENT '排序',
  `type` varchar(20) DEFAULT '' COMMENT 'view/click',
  `value` varchar(255) DEFAULT NULL COMMENT 'value',
  `token` varchar(50) NOT NULL COMMENT 'token',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lin_wx_menu` */
 INSERT INTO `lin_wx_menu` VALUES ('1','1','0','官网','1','view','http://www.cltphp.com','eesops1462769263'),('2','1','0','文档','2','click','文档','eesops1462769263'),('3','1','2','操作文档','1','view','https://www.kancloud.cn/chichu/cltphp','eesops1462769263'),('33','1','2','开发文档','2','view','http://www.kancloud.cn/chichu/cltphp','');/* MySQLReback Separation */
 /* 创建表结构 `lin_wx_text` */
 DROP TABLE IF EXISTS `lin_wx_text`;/* MySQLReback Separation */ CREATE TABLE `lin_wx_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `uname` varchar(90) NOT NULL COMMENT '用户名',
  `keyword` char(255) NOT NULL COMMENT '关键词',
  `precisions` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'precisions',
  `text` text NOT NULL COMMENT 'text',
  `createtime` varchar(13) NOT NULL COMMENT '创建时间',
  `updatetime` varchar(13) NOT NULL COMMENT '更新时间',
  `click` int(11) NOT NULL COMMENT '点击',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='文本回复表';/* MySQLReback Separation */
 /* 插入数据 `lin_wx_text` */
 INSERT INTO `lin_wx_text` VALUES ('5','0','','早上好！','0','早上好！','1487238755','1487317308','0'),('4','0','','你好','0','你好','1487238744','','0');/* MySQLReback Separation */
 /* 创建表结构 `lin_wx_user` */
 DROP TABLE IF EXISTS `lin_wx_user`;/* MySQLReback Separation */ CREATE TABLE `lin_wx_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
  `uid` int(11) NOT NULL COMMENT 'uid',
  `wxname` varchar(60) NOT NULL COMMENT '公众号名称',
  `aeskey` varchar(256) NOT NULL DEFAULT '' COMMENT 'aeskey',
  `encode` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'encode',
  `appid` varchar(50) NOT NULL DEFAULT '' COMMENT 'appid',
  `appsecret` varchar(50) NOT NULL DEFAULT '' COMMENT 'appsecret',
  `wxid` varchar(64) NOT NULL COMMENT '公众号原始ID',
  `weixin` char(64) NOT NULL COMMENT '微信号',
  `headerpic` char(255) NOT NULL COMMENT '头像地址',
  `token` char(255) NOT NULL COMMENT 'token',
  `w_token` varchar(150) NOT NULL DEFAULT '' COMMENT '微信对接token',
  `create_time` int(11) NOT NULL COMMENT 'create_time',
  `updatetime` int(11) NOT NULL COMMENT 'updatetime',
  `tplcontentid` varchar(2) NOT NULL COMMENT '内容模版ID',
  `share_ticket` varchar(150) NOT NULL COMMENT '分享ticket',
  `share_dated` char(15) NOT NULL COMMENT 'share_dated',
  `authorizer_access_token` varchar(200) NOT NULL COMMENT 'authorizer_access_token',
  `authorizer_refresh_token` varchar(200) NOT NULL COMMENT 'authorizer_refresh_token',
  `authorizer_expires` char(10) NOT NULL COMMENT 'authorizer_expires',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `web_access_token` varchar(200) NOT NULL COMMENT ' 网页授权token',
  `web_refresh_token` varchar(200) NOT NULL COMMENT 'web_refresh_token',
  `web_expires` int(11) NOT NULL COMMENT '过期时间',
  `qr` varchar(200) NOT NULL COMMENT 'qr',
  `menu_config` text COMMENT '菜单',
  `wait_access` tinyint(1) DEFAULT '0' COMMENT '微信接入状态,0待接入1已接入',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE,
  KEY `uid_2` (`uid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='微信公共帐号';/* MySQLReback Separation */
 /* 插入数据 `lin_wx_user` */
 INSERT INTO `lin_wx_user` VALUES ('1','0','dsfdsfdsf','','0','sdfsdfdsfsdfdf','dsfsdfsdfdsfsdfdfdsf','gh_b6f39fuakdudsfdsfds','sdfsf','/uploads/20170714/cf8780853b90ae8448fdabcf991cd389.jpg','sdfdsfdsfdsf','sdfsdf','0','0','','','','','','','1','','','1487583944','/uploads/20170714/f2c18d69ac934992c96d8f0a95eaf0ff.jpg','0','0');/* MySQLReback Separation */