<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo C('APP_NAME');?>管理后台</title>
    <link rel="stylesheet" href="/htdocs/Public/common/layui/css/layui.css">
    <link rel="stylesheet" href="/htdocs/Public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/htdocs/Public/kindeditor/themes/default/default.css" type="text/css">
    <link rel="stylesheet" href="/htdocs/Public/kindeditor/themes/default/upload.css?{TIMESTAMP}" type="text/css">
    <script type="text/javascript" src="/htdocs/Public/common/layui1.09/layui.js"></script>
    <script src="/htdocs/Public/common/js/jquery-1.12.4.min.js"></script>
    <script src="/htdocs/Public/js/address.js"></script>
    <script src="/htdocs/Public/jsplug/jparticle.jquery.js"></script>
    <!--<script src="/htdocs/Public/js/login.js"></script> -->
    <script type="text/javascript" src="/htdocs/Public/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/htdocs/Public/dataTable/dataTable.css">
    
</head>
<body>
<div style="margin: 15px;">
    
	<style>
    .ibox {
        margin-bottom: 30px;
        background-color: #fff;
        border: 1px solid #dee5e7;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    } 
    
    .ibox.collapsed .ibox-content {
        display: none;
    }
    
    .ibox.collapsed .fa.fa-chevron-up:before {
        content: "\f078";
    }
    
    .ibox.collapsed .fa.fa-chevron-down:before {
        content: "\f077";
    }
    
    .ibox:after,
    .ibox:before {
        display: table;
    }
    
    .ibox-title {
        height: 41px;
        border-color: #edf1f2;
        background-color: #f6f8f8;
        color: #333;
        font-weight: 700;
        border-radius: 2px 2px 0 0;
        padding: 15px 15px 3px 15px;
        border-bottom: 1px solid transparent;
        display: block;
        clear: both;
        text-align:left;
    }
    
    .ibox-content {
        background-color: #ffffff;
        color: inherit; 
        padding: 15px 20px 20px 20px;
        border-color: #e7eaec;
        -webkit-border-image: none;
        -o-border-image: none;
        border-image: none;
        border-style: solid solid none; 
        border-width: 1px 0px;
    }  
    .zz{width:100%;height:100%;position:fixed;left:0;top:0;z-index:1;display:none;background-color:#000000; opacity:0.5; -moz-opacity:0.5; filter:alpha(opacity=50);
        
    }

    .vio{
        position:relative;
        width:150px;
    }
    
    
    .vio span{
        top: 50%;
        position: absolute;
        left: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index:1;
        width:10px;
    }
    
    .vio span:hover{
        cursor:pointer;
    }
    
    .layui-table img {
        max-width: 160px;
        margin-left:15px;
    }
    .layui-table td, .layui-table th{
        padding:15px;
        text-align:center;
    }
</style>
	<fieldset class="layui-elem-field">
        <legend>视频列表</legend>
        <div class="layui-field-box">
			<form class="layui-form" id="form-admin-add">
				<blockquote class="layui-elem-quote news_search">
					<div class="layui-inline">
						<input type="checkbox" name="selectAll" id="selectAll" lay-filter="selectAll" lay-skin="primary" title="全选">
					</div>
					<div class="layui-inline">
						<a class="layui-btn layui-btn-danger batchDel">批量删除</a>
					</div>
					<div class="layui-inline">    						  			
		      			<span class="layui-btn videoadd"><i class="layui-icon">&#xe608;</i>上传视频</span>
		   			</div>
				    <div class="layui-input-inline" style="width:100px">
				      <input class="layui-input" name="time[]" placeholder="开始日" id="LAY_demorange_s">
				    </div>
				    <div class="layui-input-inline" style="width:100px">
				      <input class="layui-input" name="time[]" placeholder="截止日" id="LAY_demorange_e">
				    </div>
			      <div class="layui-input-inline">
		          <select name="cid" lay-verify="" style="height:38px">
		              <option value="">全部分类</option>
		              <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["res"] == 0): ?><option value="<?php echo ($vo["pid"]); ?>" <?php echo ($cat_id == $vo['pid']?'selected':'');?>><?php echo ($vo['showName']); echo ($vo['title']); ?></option>
		              <?php else: ?>
		              	  <optgroup label="<?php echo ($vo['title']); ?>"></optgroup><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		          </select>
			      </div>
			      <div class="layui-inline">
				      <span class="layui-btn sub">搜索</span>
				    </div>
				     <div class="layui-inline">
				      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
				    </div>
				    <div class="layui-inline">
				      <a class="layui-btn num"></a>
				    </div>
				    <div class="layui-inline">
		    		<a class="layui-btn"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
		  			</div>
				</blockquote>
				<ul id="Images"></ul>
			</form>
          <table class="layui-table" id="list-admin" lay-even>
             <thead>
             <tr>
                 <th>选择</th>
                 <th>缩略图</th>
                 <th>标题</th>
                 <th>上传时间</th>
                 <th>上传者</th>
                 <th>点击数</th>
                 <th>大小</th>
                 <th>状态</th>
                 <th>操作</th>
             </tr>             
             </thead>
         </table>
        </div>

           <div class="zz"></div> 
        </fieldset>

	<script type="text/javascript" src="/htdocs/Public/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/htdocs/Public/css/dataTable.css">
	<script>
	$(document).ready(function(){
	    function close(){
	    	$(".zz").hide();
	    	$(".ibox").hide();
	    	 playPause(); 
	    };
	})
	layui.config({
		base : "/htdocs/Public/js/lib/"
	}).use(['flow','form','layer','laydate'],function(){
	    var flow = layui.flow,
	        form = layui.form(),
	        //layer = parent.layer === undefined ? layui.layer : parent.layer,
	        $ = layui.jquery;

	    //流加载图片
	    /*var imgNums = 15;  //单页显示图片数量
	    flow.load({
	        elem: '#Images', //流加载容器
	        done: function(page, next){ //加载下一页
	            $.get("<?php echo ('index');?>",function(data){
	                //模拟插入
	                var imgList = [];
	                var maxPage = imgNums*page < data.length ? imgNums*page : data.length;
	                setTimeout(function(){
	                    for(var i=imgNums*(page-1); i<maxPage; i++){
	                        imgList.push('<li class="col-sm-6 col-md-4 es-course-list" style="float:left;padding:0 15px 0 0"><div class="row"><div class="ibox float-e-margins"><div class="ibox-title"><div style="height:8px">"'+ data[i].v_desc + '"</div>&nbsp;<div style="height:8px"></div></div><div class="ibox-content" ><div class="player" ><video id="videoPlay1" width="360" height="270" poster="'+ data[i].v_url + '?vframe/jpg/offset/2" x-webkit-airplay="true" webkit-playsinline="true" controls="controls"><source src="'+ data[i].v_url +'" type="video/mp4"><source src="'+ data[i].v_url +'" type="video/MOV"></video></div></div></div></div></li>')
	                    }
	                    next(imgList.join(''), page < (data.length/imgNums));
	                    form.render();
	                }, 500);
	            }); 
	        }
	    });*/
	    
	    
	    var laydate = layui.laydate;
		  
		  var start = {
		    min: '2017-01-01 23:59:59'
		    ,max: '2099-06-16 23:59:59'
		    ,istoday: false
		    ,choose: function(datas){
		      end.min = datas; //开始日选好后，重置结束日的最小日期
		      end.start = datas //将结束日的初始值设定为开始日
		    }
		  };
		  
		  var end = {
		    //min: laydate.now()
		    min: '2017-01-01 23:59:59'
		    ,max: '2099-06-16 23:59:59'
		    ,istoday: false
		    ,choose: function(datas){
		      start.max = datas; //结束日选好后，重置开始日的最大日期
		    }
		  };
		  
		  document.getElementById('LAY_demorange_s').onclick = function(){
		    start.elem = this;
		    laydate(start);
		  }
		  document.getElementById('LAY_demorange_e').onclick = function(){
		    end.elem = this
		    laydate(end);
		  }
        /**
         * 格式化时间戳
         */
        Date.prototype.Format = function (fmt) {
            var o = {
                "M+": this.getMonth() + 1, //月份
                "d+": this.getDate(), //日
                "h+": this.getHours(), //小时
                "m+": this.getMinutes(), //分
                "s+": this.getSeconds(), //秒
                "q+": Math.floor((this.getMonth() + 3) / 3), //季度
                "S": this.getMilliseconds() //毫秒
            };
            if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
            for (var k in o)
                if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
            return fmt;
        };
	    $(document).on('click', '.confirm', function () {
            var ownObj = $(this);
            var id = ownObj.attr('data-id');
            var key = ownObj.attr('data-key');
            layer.confirm(ownObj.attr('data-info'), {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.ajax({
                    type: "POST",
                    url: "<?php echo U('Admin/Video/del/id/" + id + "');?>",
                    data:{file:key},
                    success: function(msg){
                        if( msg.code == 1 ){
                            location.reload();
                        }else{
                            layer.msg(msg.msg, {
                                icon: 5,
                                shade: [0.6, '#393D49'],
                                time:1500
                            });
                        }
                    }
                });
            });
        });
        
        
        $(document).on('click', '.toclose', function () {
            $(".zz").hide();
	    	$(".ibox").hide();
	    	playPause(); 
        });
        
	    $(document).on('click', '.show', function () {
	    	$(".zz").show();
	    	$(this).next().next().show();
	    });
	    
	   $(document).on('click', '.toedit', function () {
            var ownObj = $(this);
            var id = ownObj.attr('data-id');
            layer.open({
                type: 2,
                area: ['60%', '80%'],
                maxmin: true,
                content: "<?php echo U('Admin/Video/edit/id/" + id + "');?>",
            });
        });
	     
        
	    $(".zz").click(function(){
	    	$(".zz").hide();
	    	$(".ibox").hide();
	    	playPause();
	    });
	    
	    $(".close").click(function(){
	    	$(".zz").hide();
	    	$(".ibox").hide();
	    	 playPause(); 
	    });
	    
	    $("#video").click(function(){
		    if($(this).paused){
		        $(this).play();
		    }else{
		        $(this).pause();
		    }
		});
	function playPause() {	 
	    var myVideo = document.getElementsByTagName('video')[0];
	    if (myVideo.paused){
	        myVideo.play();
		}
	    else{
	        myVideo.pause();
		}
	 }
        var myFun = function (query) {
            query = query || '';
            return $('#list-admin').DataTable({
                dom: 'rt<"bottom"ifpl><"clear">',
               // autoWidth: false,
               // bSort : true,//是否允许排序
               // bFilter: false, //列筛序功能
                searching: true,//本地搜索
               // ordering: true, //排序功能
                serverSide: true,
                //aoColumnDefs: [ { "bSortable": false, "aTargets": [ 0 ] }],
                ajax: {
                    url:'<?php echo U("index");?>' + query,
                    type: 'POST',
                    dataSrc: function ( json ) {
                        if( json.code == 0 ){
                            parent.layer.msg(json.msg, {
                                icon: 5,
                                shade: [0.6, '#393D49'],
                                time:1500
                            });
                        }else{
                            //console.log(json.data);
                            $(".num").html("共有视频 "+json.recordsTotal+" 个");
                            return json.data;
                        }
                    }
                },
                columnDefs:[
					{
					    "targets":0,
					    "render": function(data, type, row){
					    	var returnStr = '';
                            	returnStr += '<input type="checkbox" name="ch" lay-skin="primary">';
                            return returnStr;
					    }
					},
					{
					    "targets":1,
					    "render": function(data, type, row){ 
					    	var returnStr = '';
                            	returnStr += '<div class="vio" ><img style="width:150px;height:100px" class="slt" src="' + row.v_pic +' " ><span ><i class="fa fa-play-circle-o fa-2x" style="color: #fff"></i></span></div>';
                            return returnStr;
					    }
					},
                    {
                        "targets":3,
                        "render": function(data, type, row){
                            return new Date(row.v_create_time*1000).Format("yyyy-MM-dd hh:mm:ss");
                        }
                    },
                    {
                        "targets":7,
                        "render": function(data, type, row){
                        	var returnStr = '';
                        	if(row.v_status==1){
					    		returnStr += '<span class="layui-btn edit layui-btn-small" >下线</span> ';
					    	}else{
                            	returnStr += '<span class="layui-btn edit layui-btn-small" >上线</span>';
					    	}
                        	return returnStr;
                        }
                    },
                    {
                        "targets":8,
                        "render":function(data, type, row){
                            var addtime = new Date(row.v_create_time*1000).Format("yyyy-MM-dd hh:mm:ss");
                        	console.log(addtime);
                        	var returnStr = '';
                            returnStr += '<span class="layui-btn toedit layui-btn-normal layui-btn-small" ' +                              
                            'data-id="' + row.v_id +'">编辑</span>';
                            returnStr += '<span class="layui-btn show layui-btn-normal layui-btn-small" ' +                              
                            'data-id="' + row.v_id +'" data-poster="'+ row.v_pic + '" data-url="' + row.v_url +'" data-name="' + row.v_author +'" data-time="'+row.addtime+'"-data-href="<?php echo U('show');?>">查看</span>';
                            returnStr += '<span class="layui-btn layui-btn-danger layui-btn-small confirm" ' +
                                'data-id="' + row.v_id +'" data-key="' + row.v_url +'" data-info="你确定删除当前视频？" data-url="<?php echo U('del');?>">删除</span><div class="ibox float-e-margins " style="display:none;position:fixed;top:10%;left:20%;z-index:9999"><div class="ibox-title"><span>上传者 ' + row.v_author +': <span class="author"></span></span>&nbsp;<span>上传时间 : '+addtime+'<span class="addtime"></span></span><a class="pull-right toclose" style="cursor:pointer">关闭</a></div><div class="ibox-content"><div class="player"><video id="video" width="800px" height="400px" poster="'+ row.v_pic + '"  controls="controls"><source class="so" src="' + row.v_url +'" type="video/mp4"></video></div></div></div>';
                            return returnStr;
                        }
                    }
                ],
                iDisplayLength : 5,
                aLengthMenu : [20, 30, 50],
                columns: [
					{data: null },
                    {data: "v_img"},
                    {data: "v_name"},
                    {data: "v_create_time" },
                    {data: "v_author" },
                    {data: "v_view_num" },
                    {data: "v_size" },
                    {data: "v_status" },
                    {data: null }
                ]
            });
    	};

        var myTable = myFun();
        $('.sub').on("click", function(){
            myTable.destroy();
            console.log($('#form-admin-add').serialize());
            myTable = myFun('&'+ $('#form-admin-add').serialize());
        });

	    
	    $('.videoadd').on('click', function () {
            layer.open({
                type: 2,
                area: ['60%', '65%'],
                maxmin: true,
                content: '<?php echo U("add");?>'
            });
        });
        
	    
	    //删除单张图片
	    $("body").on("click",".img_del",function(){
	        var _this = $(this);
	        layer.confirm('确定删除视频"'+_this.siblings().find("input").attr("title")+'"吗？',{icon:3, title:'提示信息'},function(index){
	            _this.parents("li").hide(1000);
	            setTimeout(function(){_this.parents("li").remove();},950);
	            layer.close(index);
	        });
	    })
        
        $(".zz").click(function(){
	    	$(".zz").hide();
	    	$(".ibox").hide();
	    });
	    
	    
	    $("#video").click(function(){
		    if($(this).paused){
		        $(this).play();
		    }else{
		        $(this).pause();
		    }
		});
	    //全选
	    form.on('checkbox(selectAll)', function(data){
	        var child = $("#Images li input[type='checkbox']");
	        child.each(function(index, item){
	            item.checked = data.elem.checked;
	        });
	        form.render('checkbox');
	    });

	    //通过判断文章是否全部选中来确定全选按钮是否选中
	    form.on("checkbox(choose)",function(data){
	        var child = $(data.elem).parents('#Images').find('li input[type="checkbox"]');
	        var childChecked = $(data.elem).parents('#Images').find('li input[type="checkbox"]:checked');
	        if(childChecked.length == child.length){
	            $(data.elem).parents('#Images').siblings("blockquote").find('input#selectAll').get(0).checked = true;
	        }else{
	            $(data.elem).parents('#Images').siblings("blockquote").find('input#selectAll').get(0).checked = false;
	        }
	        form.render('checkbox');
	    })

	    //批量删除
	    $(".batchDel").click(function(){
	        var $checkbox = $('#Images li input[type="checkbox"]');
	        var $checked = $('#Images li input[type="checkbox"]:checked');
	        if($checkbox.is(":checked")){
	            layer.confirm('确定删除选中的视频？',{icon:3, title:'提示信息'},function(index){
	                var index = layer.msg('删除中，请稍候',{icon: 16,time:false,shade:0.8});
	                setTimeout(function(){
	                    //删除数据
	                    $checked.each(function(){
	                        $(this).parents("li").hide(1000);
	                        setTimeout(function(){$(this).parents("li").remove();},950);
	                    })
	                    $('#Images li input[type="checkbox"]').prop("checked",false);
	                    form.render();
	                    layer.close(index);
	                    layer.msg("删除成功");
	                },2000);
	            })
	        }else{
	            layer.msg("请选择需要删除的视频");
	        }
	    })

	})
	
	</script>

</div>
<script src="/htdocs/Public/kindeditor/kindeditor-all-min.js"></script>

</body>
</html>