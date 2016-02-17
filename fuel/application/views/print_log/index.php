<!doctype html>
<html lang="cn">

<body class=" theme-blue">

    <div class="content">
        <div class="header">

            <h1 class="page-title">打印日志</h1>
            <ul class="breadcrumb">
                <li><a href="/">主页</a> </li>
                <li class="active">打印日志列表</li>
            </ul>
        </div>
        <div class="main-content result">
            <div class="btn-toolbar list-toolbar">
                <div class="btn-group">
                </div>
            </div>
            <table class="table">
                <thead>
                   <tr>
                       <th>ID</th>
                       <th>打印时间</th>
                       <th>一维码内容</th>
                       <th>打印信息</th>
                       <th>打印类型</th>
                       <th>证件类型</th>
                       <th>图像路径</th>
                       <th>人数</th>
                       <th>性别</th>
                       <th>证件号码</th>
                       <th>姓名</th>
                       <th>携带儿童</th>
                       <th>团队携带者</th>
                       <th>打印结果</th>
                       <th>错误信息</th>
                       <!--<th>时间</th>-->
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <ul class="pagination">
            </ul>

            <div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">注意！</h3>
                        </div>
                        <div class="modal-body">
                            <p class="error-text"><i class="fa fa-warning modal-icon"></i>确定删除此设备？
                                <br>此操作不可逆！</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">取消</button>
                            <button class="btn btn-danger" data-dismiss="modal">删除</button>
                        </div>
                    </div>
                </div>
            </div>


            <footer>
                <hr>
                <p>© 2016 BGMS</p>
            </footer>
        </div>


        <script type="text/javascript">
            function getPrintLogs(page) {
                $.ajax({
                    url: "/print_log/items" + page,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        var dataHtml = "";
                        for (var i = 0; i < data.result.length; i++) {
                            var item = data.result[i];
                            dataHtml += '<tr>' +
                                '<td>' + item.id + '</td><td>' + item.print_time + '</td><td>' + item.print_barcode + '</td><td>' + item.print_info + '</td><td>' + item.print_type + '</td><td>' + item.idtype + '</td><td>' + item.scan_pic + '</td><td>' + item.people_num + '</td><td>' + item.sex + '</td>' + '</td><td>' + item.id_num + '</td><td>' + item.name + '</td><td>' + item.hasChild + '</td><td>' + item.hasGroup + '</td><td>' + item.result + '</td><td>' + item.error_msg + '</td>' +
                                '</tr>';
                        }
                        $(".result table tbody").html(dataHtml);
                        $(".pagination").html(data.pageinfo);
                    }
                });
            }
            //获取首页数据
            getPrintLogs("");
            //绑定页面跳转事件
            $(".pagination").on('click', 'a', function() {
                console.log($(this).attr("data-href"));
                getPrintLogs($(this).attr("data-href"));
            });
        </script>

</body>

</html>
