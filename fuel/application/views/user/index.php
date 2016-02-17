<!doctype html>
<html lang="cn">

<body class=" theme-blue">

    <div class="content">
        <div class="header">

            <h1 class="page-title">用户列表</h1>
            <ul class="breadcrumb">
                <li><a href="index.html">主页</a> </li>
                <li class="active">用户信息</li>
            </ul>

        </div>
        <div class="main-content result">

            <div class="btn-toolbar list-toolbar">
                <!--<button class="btn btn-primary"><i class="fa fa-plus"></i> 添加设备</button>-->
                <!--     <button class="btn btn-default">Import</button>
    <button class="btn btn-default">Export</button> -->
                <div class="btn-group">
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>用户ID</th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>手机号码</th>
                        <th>状态</th>
                        <th>备注</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th>最后登录时间</th>
                        <th>最后登录IP</th>
                        <th>角色ID</th>
                        <th style="">操作</th>
                    </tr>
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
  function getUser(page){
    $.ajax({
      url : "/user/items" + page,
      type : "GET",
      dataType : "json",
      success : function(data) {
        // console.log(data);
        var dataHtml = "";
        for (var i = 0; i < data.result.length; i++) {
          var item = data.result[i];
          dataHtml += '<tr>' +
                      '<td>'+item.id+'</td><td>'+item.username+'</td><td>'+item.email+'</td><td>'+item.mobile+'</td><td>'+item.status+'</td><td>'+item.remark+'</td><td>'+item.create_time+'</td><td>'+item.update_time+'</td><td>'+item.last_login_time+'</td><td>'+item.last_login_ip+'</td><td>'+item.role_id+'</td>'+
                      '</tr>';
        }
        $(".result table tbody").html(dataHtml);
        $(".pagination").html(data.pageinfo);
      }
    });
  }
  getUser("");
    //绑定页面跳转事件
            $(".pagination").on('click', 'a', function() {
                console.log($(this).attr("data-href"));
                getUser($(this).attr("data-href"));
            });
</script>

</body>

</html>
