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
        <legend>文章列表</legend>
        <div class="layui-field-box">
            <form class="layui-form" id="form-admin-add" action="">
                <div class="layui-form-item">
                <div class="layui-inline">
                    <select name="type">
                        <option value="">请选择查询方式</option>
                        <option value="1">作者</option>
                        <option value="2">发布时间</option>
                        <option value="3">已发布</option>
                        <option value="4">未发布</option>
                        <option value="5">待回复</option>
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
                    <th>缩略图</th>
                    <th>标题</th>
                    <th>发布时间</th>
                    <th>作者</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
            </table>
        </div>
    </fieldset>

</div>
<script src="/htdocs/Public/kindeditor/kindeditor-all-min.js"></script>


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
                        url: "<?php echo U('Admin/Article/del/id/" + id + "');?>",
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
                    content: '<?php echo U("addd");?>'
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
                    content: "<?php echo U('Admin/Article/edit/id/" + id + "');?>",
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
						    "targets":0,
						    "render": function(data, type, row){
						    	var returnStr = '';
						    	if(row.art_img==""){
						    		returnStr += '<img style="width:120px" src="/htdocs/Public/img/logo11.png" > ';
						    	}else{
                                	returnStr += '<img style="width:120px" class="slt" src="/htdocs/Public/upload/' + row.art_img +' " >';
						    	}
						    	
                                return returnStr;
						    }
						},
                        {
                            "targets":2,
                            "render": function(data, type, row){
                                return new Date(row.art_addtime*1000).Format("yyyy-MM-dd hh:mm:ss");
                            }
                        },
                        {
                            "targets":4,
                            "render": function(data, type, row){
                            	var returnStr = '';
                            	if(row.art_publish==1){
						    		returnStr += '<span class="layui-btn edit layui-btn-small" >已发布</span> ';
						    	}else{
                                	returnStr += '<span class="layui-btn edit layui-btn-small" >未发布</span> " >';
						    	}
                            	return returnStr;
                            }
                        },
                        {
                            "targets":5,
                            "render":function(data, type, row){
                                var returnStr = '';
                                returnStr += '<span class="layui-btn edit layui-btn-normal" ' +                              
                                'data-id="' + row.art_id +'" data-href="<?php echo U('edit?id='+ row.art_id +'');?>">编辑</span>';
                                returnStr += '<span class="layui-btn layui-btn-danger confirm" ' +
                                    'data-id="' + row.art_id +'" data-info="你确定删除当前文章？" data-url="<?php echo U('del');?>">删除</span>';
                                return returnStr;
                            }
                        }
                    ],
                    iDisplayLength : 20,
                    aLengthMenu : [20, 30, 50],
                    columns: [
                        {data: "art_img"},
                        {data: "art_title"},
                        {data: "art_addtime" },
                        {data: "art_author" },
                        {data: "art_publish" },
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