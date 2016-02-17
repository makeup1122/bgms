<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>后台管理系统</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
  .result table{
    margin:50px;
    width:60%;
  }
</style>
</head>
<body>
  <div class="header">
    
  </div>
  <ul>
      <li><a href="javascript:getContent('print_log')">统计分析<a/></li>
      <li><a href="javascript:getContent('user')">用户管理</a></li>
      <li><a href="/devices/index">设备管理</a></li>
      <li><a href="javascript:getContent('config')">配置管理</a></li>
  </ul>
  <div class="result">
      <table class="table table-striped">
        <thead></thead>
        <tbody></tbody>
      </table>
  </div>
  <div class="page"></div>
<div class="tabletype" hidden>
  <div class="print_log">
    <tbody><thead><tr><th>ID</th><th>打印的时间</th><th>一维码内容</th><th>打印的信息</th><th>打印类型</th><th>证件类型</th><th>扫描采集图像存放路径</th><th>人数</th><th>性别</th><th>证件号码</th><th>姓名</th><th>是否携带儿童</th><th>是否为团队携带者</th><th>打印结果</th><th>错误信息</th><th>时间</th></tr></thead></tbody>
  </div>
  <div class="user">
    <tbody><thead><tr><th>用户ID</th><th>用户名</th><th>邮箱</th><th>手机号码</th><th>状态</th><th>备注</th><th>创建时间</th><th>修改时间</th><th>最后登录时间</th><th>最后登录IP</th><th>角色ID</th></tr></thead></tbody>
  </div>
  <div class="devices">
    <table><thead><tr><th>设备ID</th><th>设备IP</th><th>print_status</th><th>print_info</th><th>scan_status</th><th>scan_info</th><th>设备状态</th><th>登录时间</th><th>登出时间</th></tr></thead></table>
  </div>
  <div class="config">
    <table><thead><tr><th>配置ID</th><th>配置名</th><th>配置值</th></tr></thead></table>
  </div>
</div>
<script type="text/javascript" src="/assets/js/jquery.js"></script>
<script type="text/javascript">
  function getDevices(){
    $.ajax({
      url : "/devices/items",
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
        $(".result table thead").html($('.tabletype .devices table thead').html());
        $(".result table tbody").html(dataHtml);
        $(".page").html(data.pageinfo);
      }
    });
  }
  getDevices();
</script>
</body>
</html>