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
                
    <link href="/yhhq/Public/css/theme.min.css" rel="stylesheet">
    <link href="/yhhq/Public/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/yhhq/Public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/yhhq/Public/css/font-style.css" rel="stylesheet">
    <style>
    .site-doc-icon{margin-bottom: 50px; font-size: 0;}
    .site-doc-icon li{display: inline-block; vertical-align: middle; width: 110px; line-height: 25px; padding: 20px 0; margin-right: -1px; margin-bottom: -1px; border: 1px solid #e2e2e2; font-size: 14px; text-align: center; color: #666; transition: all .3s; -webkit-transition: all .3s;}
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
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><li>
            <i class="fa <?php echo ($v['icon']); ?> fa-3x"></i>
            <div class="name"><?php echo ($v['icon']); ?></div>
            <div class="code"><?php echo ($v['icon']); ?></div>
          </li><?php endforeach; endif; ?>
        </ul>
    </div>
    </fieldset>

    <script src="/yhhq/Public/js/jquery.smooth-scroll.min.js"></script>
    <script src="/yhhq/Public/js/bootstrap.min.js"></script>
    <script>
       /* $(document).ready(function(){
         var arr = new Array();
         $(".media-heading").each(function(){
              //console.log($(this).text());return;
              arr.push($(this).text());
              
         }) 
         console.log(arr);
         $.ajax({
                type: "POST",
                url: '<?php echo U("tub2");?>',
                data: {arr:arr},
                //traditional: true,//这里设置为true,
                dataType:"json",
                async: true,
                cache: false,
                success: function(msg){
                    if( msg.code == 1 ){
                        //parent.location.reload();
                    }
                }
            });
     })*/
     
     $(".site-doc-icon li").each(function(){
         $(this).click(function(){
             var icon = $(this).children().eq(2).html();
             //console.log(icon);
             parent.layer.closeAll()
             parent.tubiao2(icon);
         })
     })
        
    </script>

</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

</body>
</html>