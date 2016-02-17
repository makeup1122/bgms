<!doctype html>
<html lang="cn">
<body class=" theme-blue">
   
    <div class="content">
        <div class="header">

            <h1 class="page-title">配置管理</h1>
            <ul class="breadcrumb">
                <li><a href="index.html">主页</a> </li>
                <li class="active">配置信息列表</li>
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
                        <th>配置ID</th>
                        <th>配置名</th>
                        <th>配置值</th>
                        <th>配置说明</th>
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
  function getUser(){
    $.ajax({
      url : "/config/items",
      type : "GET",
      dataType : "json",
      success : function(data) {
        // console.log(data);
        var dataHtml = "";
        for (var i = 0; i < data.result.length; i++) {
          var item = data.result[i];
          dataHtml += '<tr>' +
                      '<td>'+item.id+'</td><td>'+item.name+'</td><td>'+item.value+'</td><td>'+item.remark+'</td>'+
                      '</tr>';
        }
        $(".result table tbody").html(dataHtml);
        $(".pagination").html(data.pageinfo);
      }
    });
  }
  getUser();
</script>

</body>

</html>
