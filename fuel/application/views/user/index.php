<!doctype html>
<html lang="cn">

<body class=" theme-blue">
    <script type="text/javascript" src="/assets/js/highcharts.js"></script>
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
            <div class="search-well">
                    <form class="form-inline" style="margin-top:0px;">
                        <input class="input-xlarge form-control" placeholder="用户名" id="" type="text">
                        <input class="input-xlarge form-control" placeholder="状态" id="" type="text">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i> 查找</button>
                    </form>
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
            <div class="charts">
                <div class="chart1"></div>
                <div class="chart2"></div>
            </div>
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
                            <button class="btn btn-danger" id="deleteConfirm" data-dismiss="modal" data-configID>删除</button>
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
                      '<td>' +
                      '<a href="/user/modify/'+item.id+'"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;' +
                      '<a href="" class="deleteBtn" data-id="'+item.id+'" role="button"><i class="fa fa-trash-o"></i></a>' +
                      '</td>' +
                      '</tr>';
        }
        $(".result table tbody").html(dataHtml);
        $(".pagination").html(data.pageinfo);
        $(".deleteBtn").on("click",function(){
            var $this = $(this);
            $("#deleteConfirm").attr("data-configID",$this.attr("data-id"));
            $("#myModal").modal('toggle');
            return false;
        })
      }
    });
  }
  getUser("");
    //绑定页面跳转事件
    $(".pagination").on('click', 'a', function() {
        console.log($(this).attr("data-href"));
        getUser($(this).attr("data-href"));
    });
    //delete
    $("#deleteConfirm").on("click",function(){
        var $this = $(this),
            id = $this.attr("data-configID");
        $.ajax({
            url:"/user/delete/"+id,
            type:"GET",
            dataType:"json",
            success:function(data){
                
            }
        })
    });

    var chartconfig = {
        chart: {
            type: 'column'
        },
        title: {
            text: '用户所在城市占比'
        },
        subtitle: {
            text: 'what the fuck'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    }
    $('.chart1').highcharts(chartconfig);
    $('.chart2').highcharts(chartconfig);
</script>

</body>

</html>
