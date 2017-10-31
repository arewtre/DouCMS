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
	.slt{width:100%}
	</style>
    <fieldset class="layui-elem-field">
        <legend>轮播图列表</legend>
        <div class="layui-field-box">
            <form class="layui-form" id="form-admin-add" action="">
                <div class="layui-form-item">
                <div class="layui-inline">
                    <select name="type">
                        <option value="">请选择链接类型</option>
                        <option value="1">文章</option>
                        <option value="2">照片</option>
                        <option value="3">视频</option>
                        <option value="4">网页</option>
                        <option value="5">文本</option>
                    </select>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 300px;">
                        <input type="text" name="keyword" placeholder="请输入关键词" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <span class="layui-btn sub">查询</span>
                </div>
                <div class="layui-inline">
                 	<span class="layui-btn layui-btn-normal art-add"><i class="layui-icon">&#xe608;</i> 新增</span>
                 </div>
            </div>
            </form>
            <table class="layui-table" id="list-admin" lay-even>
                <thead>
                <tr>
                    <th>编号</th>
                    <th>缩略图</th>
                    <th>标题</th>
                    <th>发布时间</th>
                    <th>链接类型</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
            </table>
        </div>
    </fieldset>

</div>
<script src="/htdocs/Public/kindeditor/kindeditor-all-min.js"></script>

    <script type="text/javascript" src="/htdocs/Public/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/htdocs/Public/css/dataTable.css">
    <script>
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

        layui.use(['layer', 'form'], function() {
            $(document).on('click', '.confirm', function () {
                var ownObj = $(this);
                var id = ownObj.attr('data-id');
                layer.confirm(ownObj.attr('data-info'), {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.ajax({
                        type: "POST",
                        url: "<?php echo U('Admin/Banner/del/id/" + id + "');?>",
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
            
            $('.art-add').on('click', function () {
                layer.open({
                    type: 2,
                    area: ['100%', '100%'],
                    maxmin: true,
                    content: '<?php echo U("add");?>'
                });
            });                     

            $(document).on('click', '.edit', function () {
                var ownObj = $(this);
                var url = ownObj.attr('data-url');
                var id = ownObj.attr('data-id');
                layer.open({
                    type: 2,
                    area: ['100%', '100%'],
                    maxmin: true,
                    content: "<?php echo U('Admin/Banner/edit/id/" + id + "');?>",
                });
            });

            var myFun = function (query) {
                query = query || '';
                return $('#list-admin').DataTable({
                    dom: 'rt<"bottom"ifpl><"clear">',
                    autoWidth: false,
                    bSort : true,//是否允许排序
                    bFilter: false, //列筛序功能
                    searching: true,//本地搜索
                    ordering: true, //排序功能
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
                                return json.data;
                            }
                        }
                    },
                    columnDefs:[
						{
						    "targets":1,
						    "render": function(data, type, row){
						    	var returnStr = '';
						    	if(row.thumb==""){
						    		returnStr += '<img style="width:120px" src="/htdocs/Public/img/logo11.png" > ';
						    	}else{
                                	returnStr += '<img style="width:120px" class="slt" src="/htdocs/Public/upload/' + row.thumb +' " >';
						    	}
						    	
                                return returnStr;
						    }
						},
                        {
                            "targets":3,
                            "render": function(data, type, row){
                                return new Date(row.addtime*1000).Format("yyyy-MM-dd hh:mm:ss");
                            }
                        },
                        {
                            "targets":4,
                            "render": function(data, type, row){
                            	var returnStr = '';
                            	if(row.link_type==1){
						    		returnStr += '<span class="layui-btn layui-btn-small" >文章</span> ';
						    	}else if(row.link_type==2){
                                	returnStr += '<span class="layui-btn layui-btn-normal layui-btn-small" >照片</span> ';
						    	}else if(row.link_type==3){
                                	returnStr += '<span class="layui-btn layui-btn-warm layui-btn-small" >视频</span> ';
						    	}else if(row.link_type==4){
                                	returnStr += '<span class="layui-btn layui-btn-danger layui-btn-small" >网页</span> ';
						    	}else if(row.link_type==5){
                                	returnStr += '<span class="layui-btn layui-btn-danger layui-btn-small" >文本</span> ';
						    	}
                            	return returnStr;
                            }
                        },
                        {
                            "targets":5,
                            "render": function(data, type, row){
                            	var returnStr = '';
                            	if(row.state==1){
						    		returnStr += '<span class="layui-btn  layui-btn-small" >上线</span> ';
						    	}else{
                                	returnStr += '<span class="layui-btn layui-btn-danger layui-btn-small" >下线</span> ';
						    	}
                            	return returnStr;
                            }
                        },
                        {
                            "targets":6,
                            "render":function(data, type, row){
                                var returnStr = '';
                                returnStr += '<span class="layui-btn edit layui-btn-normal" ' +                              
                                'data-id="' + row.id +'" data-href="<?php echo U('edit');?>">编辑</span>';
                                returnStr += '<span class="layui-btn layui-btn-danger confirm" ' +
                                    'data-id="' + row.id +'" data-info="你确定删除当前banner？" data-url="<?php echo U('del');?>">删除</span>';
                                return returnStr;
                            }
                        }
                    ],
                    iDisplayLength : 20,
                    aLengthMenu : [20, 30, 50],
                    columns: [
						{data: "id"},
                        {data: "thumb"},
                        {data: "text"},
                        {data: "addtime" },
                        {data: "link_type" },
                        {data: "state" },
                        {data: null }
                    ]
                });
        	};

            var myTable = myFun();
            $('.sub').on("click", function(){
                myTable.destroy();
                myTable = myFun('&'+ $('#form-admin-add').serialize());
            });
        });
    </script>

</body>
</html>