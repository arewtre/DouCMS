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
    
    <script type="text/javascript" src="/yhhq/Public/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="/yhhq/Public/css/dataTable.css">
    <fieldset class="layui-elem-field">
        <legend>日志列表</legend>
        <div class="layui-field-box">
            <form class="layui-form" id="form-admin-add" action="">
                <div class="layui-form-item">
                <div class="layui-inline">
                    <select name="type">
                        <option value="">请选择查询方式</option>
                        <option value="1">操作URL</option>
                        <option value="2">用户昵称</option>
                        <option value="3">用户ID</option>
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
            </div>
            </form>
            <table class="layui-table" id="list-admin" lay-even>
                <thead>
                <tr>
                    <th>行为名称</th>
                    <th>用户ID</th>
                    <th>用户昵称</th>
                    <th>操作URL</th>
                    <th>执行时间</th>
                    <th>操作</th>
                </tr>
                </thead>
            </table>
        </div>
    </fieldset>

</div>
<script src="/yhhq/Public/kindeditor/kindeditor-all-min.js"></script>

    <script>
        /**
         * 格式化时间戳
         * @param fmt
         * @returns {*}
         * @constructor
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
                layer.confirm(ownObj.attr('data-info'), {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.ajax({
                        type: "POST",
                        url: ownObj.attr('data-url'),
                        data: {id:ownObj.attr('data-id')},
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

            $(document).on('click', '.edit', function () {
                var ownObj = $(this);
                layer.open({
                    type: 2,
                    area: ['60%', '100%'],
                    maxmin: true,
                    content: ownObj.attr('data-url'),
                });
            });

            var myFun = function (query) {
                query = query || '';
                return $('#list-admin').DataTable({
                    dom: 'rt<"bottom"ifpl><"clear">',
                    ordering: true,
                    autoWidth: true,
                    searching: true,
                    serverSide: true,
                    bSort : true,//是否允许排序
                    ajax: {
                        url:'<?php echo U("ajaxGetIndex");?>' + query,
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
                                return json.data;
                            }
                        }
                    },
                    columnDefs:[
                        {
                            "targets":4,
                            "render": function(data){
                                return new Date(data*1000).Format("yyyy-MM-dd hh:mm:ss");
                            }
                        },
                        {
                            "targets":5,
                            "render":function(data, type, row){
                                var returnStr = '';
                                returnStr += '<span class="layui-btn edit layui-btn-normal" ' +                              
                                'data-id="' + row.id +'" data-url="<?php echo U('showDetail?id=' + row.id + '');?>">查看</span>';
                                returnStr += '<span class="layui-btn layui-btn-danger confirm" ' +
                                    'data-id="' + row.id +'" data-info="你确定删除当前日志么？" data-url="<?php echo U('del');?>">删除</span>';
                                return returnStr;
                            }
                        }
                    ],
                    iDisplayLength : 20,
                    aLengthMenu : [20, 30, 50],
                    columns: [
                        {data: "actionname"},
                        {data: "uid"},
                        {data: "nickname" },
                        {data: "url" },
                        {data: "addtime" },
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