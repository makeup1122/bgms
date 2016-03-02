    <div class="content">
        <div class="header">

            <h1 class="page-title">设备列表</h1>
            <ul class="breadcrumb">
                <li><a href="/">主页</a> </li>
                <li class="active">设备列表</li>
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
                        <th>设备ID</th>
                        <th>设备IP</th>
                        <th>打印状态</th>
                        <th>打印设备信息</th>
                        <th>扫描状态</th>
                        <th>扫描设备信息</th>
                        <th>设备状态</th>
                        <th>登录时间</th>
                        <th>登出时间</th>
                        <!--<th style="">操作</th>-->
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
  function getDevices(page){
    $.ajax({
      url : "/devices/items" +page,
      type : "GET",
      dataType : "json",
      success : function(data) {
        // console.log(data);
        var dataHtml = "";
        for (var i = 0; i < data.result.length; i++) {
          var item = data.result[i];
          dataHtml += '<tr>' +
                      '<td>'+item.id+'</td><td>'+item.ip+'</td><td>'+item.print_status+'</td><td>'+item.print_info+'</td><td>'+item.scan_status+'</td><td>'+item.scan_info+'</td><td>'+item.status+'</td><td>'+item.login_time+'</td><td>'+item.logout_time+'</td>'+
                      '</tr>';
        }
        // $(".result table thead").html("<tr><th>设备ID</th><th>设备IP</th><th>print_status</th><th>print_info</th><th>scan_status</th><th>scan_info</th><th>设备状态</th><th>登录时间</th><th>登出时间</th></tr>");
        $(".result table tbody").html(dataHtml);
        $(".pagination").html(data.pageinfo);
      }
    });
  }
  $(function(){
    getDevices("");    
  })
  
  
  //绑定页面跳转事件
            $(".pagination").on('click', 'a', function() {
                console.log($(this).attr("data-href"));
                getDevices($(this).attr("data-href"));
            });
</script>

