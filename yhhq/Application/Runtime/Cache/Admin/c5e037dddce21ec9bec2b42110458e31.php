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
    
<link rel="stylesheet" href="/yhhq/Public/common/layui/css/layui2.css">
<style>
.site-doc-icon{margin-bottom: 50px; font-size: 0;}
.site-doc-icon li{display: inline-block; vertical-align: middle; width: 127px; line-height: 25px; padding: 20px 0; margin-right: -1px; margin-bottom: -1px; border: 1px solid #e2e2e2; font-size: 14px; text-align: center; color: #666; transition: all .3s; -webkit-transition: all .3s;}
.site-doc-icon li .layui-icon{display: inline-block; font-size: 36px;}
.site-doc-icon li .fontclass{display: none;}
.site-doc-icon li .name{color: #c2c2c2;}
.site-doc-icon li:hover{background-color: #f2f2f2; color: #000;cursor: pointer;}

li {
    list-style: none;
}
.code{display:none};
</style>
 <fieldset class="layui-elem-field">
 <legend>图标列表</legend>
 <div class="layui-field-box">
    <ul class="site-doc-icon">
      <li>
        <i class="layui-icon">&#xe68e;</i>
        <div class="name">主页</div>
        <div class="code">xe68e</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe6c6;</i>
        <div class="name">赞</div>
        <div class="code">xe6c6</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe6c5;</i>
        <div class="name">踩</div>
        <div class="code">xe6c5</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe662;</i>
        <div class="name">男</div>
        <div class="code">xe662</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe661;</i>
        <div class="name">女</div>
        <div class="code">xe661</div>
      </li>
    
      <li>
        <i class="layui-icon">&#xe660;</i>
        <div class="name">相机-空心</div>
        <div class="code">xe660</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe65d;</i>
        <div class="name">相机-实心</div>
        <div class="code">xe65d</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe65f;</i>
        <div class="name">菜单-水平</div>
        <div class="code">xe65f</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe671;</i>
        <div class="name">菜单-竖直</div>
        <div class="code">xe671</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe65c;</i>
        <div class="name">返回</div>
        <div class="code">xe65c</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe756;</i>
        <div class="name">Hot</div>
        <div class="code">xe756</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe735;</i>
        <div class="name">等级</div>
        <div class="code">xe735</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe65e;</i>
        <div class="name">金额-人民币</div>
        <div class="code">xe65e</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe659;</i>
        <div class="name">金额-美元</div>
        <div class="code">xe659</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe715;</i>
        <div class="name">位置</div>
        <div class="code">xe715</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe705;</i>
        <div class="name">文档</div>
        <div class="code">xe705</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe6b2;</i>
        <div class="name">检验</div>
        <div class="code">xe6b2</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe6af;</i>
        <div class="name">笑脸</div>
        <div class="code">xe6af</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe69c;</i>
        <div class="name">哭脸</div>
        <div class="code">xe69c</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe698;</i>
        <div class="name">购物车1</div>
        <div class="code">xe698</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe657;</i>
        <div class="name">购物车2</div>
        <div class="code">xe657</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe658;</i>
        <div class="name">星级</div>
        <div class="code">xe658</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe65a;</i>
        <div class="name">上一页</div>
        <div class="code">xe65a</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe65b;</i>
        <div class="name">下一页</div>
        <div class="code">xe65b</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe681;</i>
        <div class="name">上传-空心</div>
        <div class="code">xe681</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe67c;</i>
        <div class="name">上传-实心</div>
        <div class="code">xe67c</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe7a0;</i>
        <div class="name">文件夹</div>
        <div class="code">xe7a0</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe857;</i>
        <div class="name">应用</div>
        <div class="code">xe857</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe652;</i>
        <div class="name">播放</div>
        <div class="code">xe652</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe651;</i>
        <div class="name">播放暂停</div>
        <div class="code">xe651</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe6fc;</i>
        <div class="name">音乐</div>
        <div class="code">xe6fc</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe6ed;</i>
        <div class="name">视频</div>
        <div class="code">xe6ed</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe688;</i>
        <div class="name">语音</div>
        <div class="code">xe688</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe645;</i>
        <div class="name">喇叭</div>
        <div class="code">xe645</div>
      </li>
    
      <li>
        <i class="layui-icon">&#xe611;</i>
        <div class="name">对话</div>
        <div class="code">xe611</div>
        <div class="fontclass">.duihua</div>
      </li>
      <li>
      <i class="layui-icon">&#xe614;</i>
      <div class="name">设置</div>
      <div class="code">xe614</div>
      <div class="fontclass">.shezhi</div>
      </li>
      
      <li>
      <i class="layui-icon">&#xe60f;</i>
      <div class="name">隐身-im</div>
      <div class="code">xe60f</div>
      <div class="fontclass">.yinshenim</div>
      </li>
      <li>
      <i class="layui-icon">&#xe615;</i>
      <div class="name">搜索</div>
      <div class="code">xe615</div>
      <div class="fontclass">.search</div>
      </li>
      <li>
      <i class="layui-icon">&#xe641;</i>
      <div class="name">分享</div>
      <div class="code">xe641</div>
      <div class="fontclass">.fenxiang1</div>
      </li>
      
      <li>
        <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop">&#x1002;</i>
        <div class="name">刷新</div>
        <div class="code">x1002</div>
      </li>
      
      <li>
        <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop">&#xe63d;</i>
        <div class="name">loading</div>
        <div class="code">xe63d</div>
      </li>
      
      <li>
        <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop">&#xe63e;</i>
        <div class="name">loading</div>
        <div class="code">xe63e</div>
      </li>
      <li>
      <i class="layui-icon">&#xe620;</i>
      <div class="name">设置</div>
      <div class="code">xe620</div>
      <div class="fontclass">.shezhi1</div>
      </li>
      <li>
      <i class="layui-icon">&#xe628;</i>
      <div class="name">引擎</div>
      <div class="code">xe628</div>
      <div class="fontclass">.yinqing</div>
      </li>
      <li>
      <i class="layui-icon">&#x1006;</i>
      <div class="name">阅卷错号</div>
      <div class="code">x1006</div>
      <div class="fontclass">.yuejuancuohao</div>
      </li>
      <li>
      <i class="layui-icon">&#x1007;</i>
      <div class="name">错-</div>
      <div class="code">x1007</div>
      <div class="fontclass">.cuo</div>
      </li>
      <li>
      <i class="layui-icon">&#xe629;</i>
      <div class="name">报表</div>
      <div class="code">xe629</div>
      <div class="fontclass">.baobiao</div>
      </li>
      <li>
      <i class="layui-icon">&#xe600;</i>
      <div class="name">star</div>
      <div class="code">xe600</div>
      <div class="fontclass">.star</div>
      </li>
      <li>
      <i class="layui-icon">&#xe617;</i>
      <div class="name">圆点</div>
      <div class="code">xe617</div>
      <div class="fontclass">.yuandian</div>
      </li>
      <li>
      <i class="layui-icon">&#xe606;</i>
      <div class="name">客服</div>
      <div class="code">xe606</div>
      <div class="fontclass">.kefu</div>
      </li>
      <li>
      <i class="layui-icon">&#xe609;</i>
      <div class="name">发布</div>
      <div class="code">xe609</div>
      <div class="fontclass">.logo</div>
      </li>
      <li>
      <i class="layui-icon">&#xe60a;</i>
      <div class="name">21cake_list</div>
      <div class="code">xe60a</div>
      <div class="fontclass">.list</div>
      </li>
      <li>
      <i class="layui-icon">&#xe62c;</i>
      <div class="name">图表</div>
      <div class="code">xe62c</div>
      <div class="fontclass">.tubiao</div>
      </li>
      <li>
      <i class="layui-icon">&#x1005;</i>
      <div class="name">正确</div>
      <div class="code">x1005</div>
      <div class="fontclass">.right</div>
      </li>
      <li>
      <i class="layui-icon">&#xe61b;</i>
      <div class="name">换肤2</div>
      <div class="code">xe61b</div>
      <div class="fontclass">.huanfu2</div>
      </li>
      <li>
      <i class="layui-icon">&#xe610;</i>
      <div class="name">在线</div>
      <div class="code">xe610</div>
      <div class="fontclass">.On-line</div>
      </li>
      <li>
      <i class="layui-icon">&#xe602;</i>
      <div class="name">右右</div>
      <div class="code">xe602</div>
      <div class="fontclass">.youyou</div>
      </li>
      <li>
      <i class="layui-icon">&#xe603;</i>
      <div class="name">左左</div>
      <div class="code">xe603</div>
      <div class="fontclass">.zuozuo</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe62d;</i>
        <div class="name">表格</div>
        <div class="code">xe62d</div>
      </li>
      <li>
      <i class="layui-icon">&#xe62e;</i>
      <div class="name">icon_树</div>
      <div class="code">xe62e</div>
      <div class="fontclass">.icon5</div>
      </li>
      <li>
      <i class="layui-icon">&#xe62f;</i>
      <div class="name">上传</div>
      <div class="code">xe62f</div>
      <div class="fontclass">.iconfont17</div>
      </li>
      <li>
      <i class="layui-icon">&#xe61f;</i>
      <div class="name">添加</div>
      <div class="code">xe61f</div>
      <div class="fontclass">.tianjia</div>
      </li>
      <li>
      <i class="layui-icon">&#xe601;</i>
      <div class="name">下载</div>
      <div class="code">xe601</div>
      <div class="fontclass">.xiazai</div>
      </li>
      <li>
      <i class="layui-icon">&#xe630;</i>
      <div class="name">选择模版48</div>
      <div class="code">xe630</div>
      <div class="fontclass">.xuanzemoban48</div>
      </li>
      <li>
      <i class="layui-icon">&#xe631;</i>
      <div class="name">工具</div>
      <div class="code">xe631</div>
      <div class="fontclass">.gongju</div>
      </li>
      
      <li>
        <i class="layui-icon">&#xe654;</i>
        <div class="name">添加</div>
        <div class="code">xe654</div>
      </li>
      <li>
        <i class="layui-icon">&#xe642;</i>
        <div class="name">编辑</div>
        <div class="code">xe642</div>
      </li>
      <li>
        <i class="layui-icon">&#xe640;</i>
        <div class="name">删除</div>
        <div class="code">xe640</div>
      </li>
      <li>
      <i class="layui-icon">&#xe61a;</i>
      <div class="name">向下</div>
      <div class="code">xe61a</div>
      <div class="fontclass">.xiangxia</div>
      </li>
      <li>
      <i class="layui-icon">&#xe621;</i>
      <div class="name">文件</div>
      <div class="code">xe621</div>
      <div class="fontclass">.wenjian</div>
      </li>
      <li>
      <i class="layui-icon">&#xe632;</i>
      <div class="name">布局</div>
      <div class="code">xe632</div>
      <div class="fontclass">.layouts</div>
      </li>
      <li>
      <i class="layui-icon">&#xe618;</i>
      <div class="name">对勾</div>
      <div class="code">xe618</div>
      <div class="fontclass">.duigou</div>
      </li>
      <li>
      <i class="layui-icon">&#xe608;</i>
      <div class="name">添加</div>
      <div class="code">xe608</div>
      <div class="fontclass">.tianjia1</div>
      </li>
      <li>
      <i class="layui-icon">&#xe633;</i>
      <div class="name">么么直播－翻页</div>
      <div class="code">xe633</div>
      <div class="fontclass">.yaoyaozhibofanye</div>
      </li>
      <li>
      <i class="layui-icon">&#xe61c;</i>
      <div class="name">404</div>
      <div class="code">xe61c</div>
      <div class="fontclass">.404</div>
      </li>
      <li>
      <i class="layui-icon">&#xe634;</i>
      <div class="name">轮播组图</div>
      <div class="code">xe634</div>
      <div class="fontclass">.lunbozutu</div>
      </li>
      <li>
      <i class="layui-icon">&#xe607;</i>
      <div class="name">help</div>
      <div class="code">xe607</div>
      <div class="fontclass">.help</div>
      </li>
      <li>
      <i class="layui-icon">&#xe635;</i>
      <div class="name">代码1</div>
      <div class="code">xe635</div>
      <div class="fontclass">.daima1</div>
      </li>
      <li>
      <i class="layui-icon">&#xe636;</i>
      <div class="name">进水</div>
      <div class="code">xe636</div>
      <div class="fontclass">.jinshui</div>
      </li>
      <li>
      <i class="layui-icon">&#xe60b;</i>
      <div class="name">关于</div>
      <div class="code">xe60b</div>
      <div class="fontclass">.guanyu</div>
      </li>
      <li>
      <i class="layui-icon">&#xe619;</i>
      <div class="name">向上</div>
      <div class="code">xe619</div>
      <div class="fontclass">.xiangshang</div>
      </li>
      <li>
      <i class="layui-icon">&#xe637;</i>
      <div class="name">日期</div>
      <div class="code">xe637</div>
      <div class="fontclass">.riqi</div>
      </li>
      <li>
      <i class="layui-icon">&#xe61d;</i>
      <div class="name">文件</div>
      <div class="code">xe61d</div>
      <div class="fontclass">.wenjian1</div>
      </li>
      <li>
      <i class="layui-icon">&#xe604;</i>
      <div class="name">top</div>
      <div class="code">xe604</div>
      <div class="fontclass">.top</div>
      </li>
      <li>
      <i class="layui-icon">&#xe612;</i>
      <div class="name">好友请求</div>
      <div class="code">xe612</div>
      <div class="fontclass">.haoyouqingqiu</div>
      </li>
      <li>
      <i class="layui-icon">&#xe605;</i>
      <div class="name">对</div>
      <div class="code">xe605</div>
      <div class="fontclass">.weibiaoti1</div>
      </li>
      <li>
      <i class="layui-icon">&#xe638;</i>
      <div class="name">窗口</div>
      <div class="code">xe638</div>
      <div class="fontclass">.chuangkou</div>
      </li>
      <li>
      <i class="layui-icon">&#xe60c;</i>
      <div class="name">表情</div>
      <div class="code">xe60c</div>
      <div class="fontclass">.comiisbiaoqing</div>
      </li>
      <li>
      <i class="layui-icon">&#xe616;</i>
      <div class="name">正确</div>
      <div class="code">xe616</div>
      <div class="fontclass">.zhengque</div>
      </li>
      <li>
      <i class="layui-icon">&#xe613;</i>
      <div class="name">我的好友</div>
      <div class="code">xe613</div>
      <div class="fontclass">.iconfontwodehaoyou</div>
      </li>
      <li>
      <i class="layui-icon">&#xe61e;</i>
      <div class="name">文件下载</div>
      <div class="code">xe61e</div>
      <div class="fontclass">.wenjianxiazai</div>
      </li>
      <li>
      <i class="layui-icon">&#xe60d;</i>
      <div class="name">图片</div>
      <div class="code">xe60d</div>
      <div class="fontclass">.tupian</div>
      </li>
      <li>
      <i class="layui-icon">&#xe64c;</i>
      <div class="name">链接</div>
      <div class="code">xe64c</div>
      <div class="fontclass">.lianjie</div>
      </li>
      <li>
      <i class="layui-icon">&#xe60e;</i>
      <div class="name">记录</div>
      <div class="code">xe60e</div>
      <div class="fontclass">.jilu</div>
      </li>
      <li>
      <i class="layui-icon">&#xe622;</i>
      <div class="name">文件夹</div>
      <div class="code">xe622</div>
      <div class="fontclass">.liucheng</div>
      </li>
      <li>
      <i class="layui-icon">&#xe64f;</i>
      <div class="name">font-strikethrough</div>
      <div class="code">xe64f</div>
      <div class="fontclass">.fontstrikethrough</div>
      </li>
      <li>
      <i class="layui-icon">&#xe64d;</i>
      <div class="name">unlink</div>
      <div class="code">xe64d</div>
      <div class="fontclass">.unlink</div>
      </li>
      <li>
      <i class="layui-icon">&#xe639;</i>
      <div class="name">编辑_文字</div>
      <div class="code">xe639</div>
      <div class="fontclass">.bianjiwenzi</div>
      </li>
      <li>
      <i class="layui-icon">&#xe623;</i>
      <div class="name">三角</div>
      <div class="code">xe623</div>
      <div class="fontclass">.sanjiao</div>
      </li>
      <li>
      <i class="layui-icon">&#xe63f;</i>
      <div class="name">单选框-候选</div>
      <div class="code">xe63f</div>
      <div class="fontclass">.danxuankuanghouxuan</div>
      </li>
      <li>
      <i class="layui-icon">&#xe643;</i>
      <div class="name">单选框-选中</div>
      <div class="code">xe643</div>
      <div class="fontclass">.danxuankuangxuanzhong</div>
      </li>
      <li>
      <i class="layui-icon">&#xe647;</i>
      <div class="name">居中对齐</div>
      <div class="code">xe647</div>
      <div class="fontclass">.juzhongduiqi</div>
      </li>
      <li>
      <i class="layui-icon">&#xe648;</i>
      <div class="name">右对齐</div>
      <div class="code">xe648</div>
      <div class="fontclass">.youduiqi</div>
      </li>
      <li>
      <i class="layui-icon">&#xe649;</i>
      <div class="name">左对齐</div>
      <div class="code">xe649</div>
      <div class="fontclass">.zuoduiqi</div>
      </li>
      <li>
      <i class="layui-icon">&#xe626;</i>
      <div class="name">勾选框（未打勾）</div>
      <div class="code">xe626</div>
      <div class="fontclass">.gongsisvgtubiaozongji22</div>
      </li>
      <li>
      <i class="layui-icon">&#xe627;</i>
      <div class="name">勾选框（已打勾）</div>
      <div class="code">xe627</div>
      <div class="fontclass">.gongsisvgtubiaozongji23</div>
      </li>
      <li>
      <i class="layui-icon">&#xe62b;</i>
      <div class="name">加粗</div>
      <div class="code">xe62b</div>
      <div class="fontclass">.jiacu</div>
      </li>
      <li>
      <i class="layui-icon">&#xe63a;</i>
      <div class="name">聊天 对话 IM 沟通</div>
      <div class="code">xe63a</div>
      <div class="fontclass">.liaotianduihuaimgoutong</div>
      </li>
      <li>
      <i class="layui-icon">&#xe624;</i>
      <div class="name">文件夹_反</div>
      <div class="code">xe624</div>
      <div class="fontclass">.wenjianjiafan</div>
      </li>
      <li>
      <i class="layui-icon">&#xe63b;</i>
      <div class="name">手机</div>
      <div class="code">xe63b</div>
      <div class="fontclass">.shouji</div>
      </li>
      <li>
      <i class="layui-icon">&#xe650;</i>
      <div class="name">表情</div>
      <div class="code">xe650</div>
      <div class="fontclass">.biaoqing</div>
      </li>
      <li>
      <i class="layui-icon">&#xe64b;</i>
      <div class="name">html</div>
      <div class="code">xe64b</div>
      <div class="fontclass">.html</div>
      </li>
      <li>
      <i class="layui-icon">&#xe63c;</i>
      <div class="name">表单</div>
      <div class="code">xe63c</div>
      <div class="fontclass">.biaodan</div>
      </li>
      <li>
      <i class="layui-icon">&#xe62a;</i>
      <div class="name">tab</div>
      <div class="code">xe62a</div>
      <div class="fontclass">.25</div>
      </li>
      <li>
      <i class="layui-icon">&#xe64e;</i>
      <div class="name">emw_代码</div>
      <div class="code">xe64e</div>
      <div class="fontclass">.emwdaima</div>
      </li>
      <li>
      <i class="layui-icon">&#xe646;</i>
      <div class="name">字体-下划线</div>
      <div class="code">xe646</div>
      <div class="fontclass">.zitixiahuaxian</div>
      </li>
      <li>
      <i class="layui-icon">&#xe625;</i>
      <div class="name">三角</div>
      <div class="code">xe625</div>
      <div class="fontclass">.sanjiao1</div>
      </li>
      <li>
      <i class="layui-icon">&#xe64a;</i>
      <div class="name">图片</div>
      <div class="code">xe64a</div>
      <div class="fontclass">.tupian-copy-copy</div>
      </li>
      <li>
      <i class="layui-icon">&#xe644;</i>
      <div class="name">斜体</div>
      <div class="code">xe644</div>
      <div class="fontclass">.xieti</div>
      </li>
    </ul>
 	</div>
 </fieldset>
 <script>
     
     $(".site-doc-icon li").each(function(){
         $(this).click(function(){
             var icon = $(this).children().eq(2).html();
             //console.log(icon);
             parent.layer.closeAll()
             parent.tubiao1(icon);
         })
     })
     
 </script>
 
</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

</body>
</html>