    <div class="content print_log">
        <div class="header">

            <h1 class="page-title">扫描日志</h1>
            <ul class="breadcrumb">
                <li><a href="/">主页</a> </li>
                <li class="active">扫描日志列表</li>
            </ul>
        </div>
        <div class="search-well">
                    <form class="form-inline form_search" style="margin-top:0px;" action="/user/items" method="get">
                        <label for="">进馆日期：</label><input type="text" class="form-control" id="end_time" name="enter_time">
                        <br/><br/>
                        <label for="">条件：</label>
                        <select name="condition" class="form-control">
                            <!--<option value="1">用户名</option>-->
                            <!--<option value="2">ID</option>-->
                            <!--<option value="3">手机号</option>-->
                            <!--<option value="4">邮箱</option>-->
                            <option value="5">证件号码</option>
                            <option value="6">姓名</option>
                            <option value="7">人数</option>
                            
                        </select>
                        <lable>关键字：</lable>
                        <input name="keyword" class="input-xlarge form-control" placeholder="关键字" id="" type="text" value="<?php echo isset($_GET['keyword'])?$_GET['keyword']:""; ?>">
                        <!--<input class="input-xlarge form-control" placeholder="状态" id="" type="text">-->
                        <br/><br/>
                        <label for="sexCondition">性别：</label>
                        <select name="sex" id="sexCondition" class="form-control">
                            <option value="">无</option>
                            <option value="1">男</option>
                            <option value="2">女</option>
                            <option value="3">其他</option>
                        </select>
                        <label for="idtypeCondition">证件类型：</label>
                        <select name="idtype" id="idtypeCondition" class="form-control">
                            <option value="">无</option>
                            <option value="身份证">身份证</option>
                            <option value="学生证">学生证</option>
                            <option value="其他">其他证件</option>
                        </select>
                        <!--<label for="printTypeCondition">打印类型：</label>-->
                        <!--<select name="print_type" id="printTypeCondition" class="form-control">-->
                        <!--    <option value="">无</option>-->
                        <!--    <option value="1">1</option>-->
                        <!--    <option value="2">2</option>-->
                        <!--    <option value="3">3</option>-->
                        <!--    <option value="4">4</option>-->
                        <!--    <option value="5">5</option>-->
                        <!--</select>-->
                        <label for="enterCondition">是否进馆：</label>
                        <select name="enter" id="enterCondition" class="form-control">
                            <option value="">全部</option>
                            <option value="1">是</option>
                            <option value="2">否</option>
                            <!--<option value="3">3</option>-->
                            <!--<option value="4">4</option>-->
                        </select>
                        <input type="text" data-search="1" class="search" hidden>
                        &nbsp;&nbsp;&nbsp;
                        <button class="btn btn-success" type="button" onclick="searchFunc()"><i class="fa fa-search"></i> 查找</button>
                        <button class="btn btn-default" type="button" onclick="unsearchFunc()"><i class="fa fa-refresh"></i> 清除</button>
                    </form>
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
                       <th>出票时间</th>
                       <th>进馆时间</th>
                       <!--<th>一维码</th>-->
                       <th>打印信息</th>
                       <!--<th>打印类型</th>-->
                       <th>证件类型</th>
                       <th>图像</th>
                       <th>人数</th>
                       <th>性别</th>
                       <th>证件号码</th>
                       <th>所在地区</th>
                       <th>姓名</th>
                       <th>儿童</th>
                       <th>携带团队</th>
                       <!--<th>打印结果</th>-->
                       <!--<th>错误信息</th>-->
                       <!--<th>时间</th>-->
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <label for="">共<i class="total_rows"></i>条记录</label>
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
        <script type="text/javascript" src="/assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap-datepicker.zh-CN.min.js"></script>

        <script type="text/javascript">
         $('#end_time').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                language: 'zh-CN',
                clearBtn: true,
                todayHighlight: true
            });
         function searchFunc() {
             $(".search").attr('data-search', '2');
             getPrintLogs('');
         }

         function unsearchFunc() {
             $(".form_search")[0].reset();
             $(".search").attr('data-search', '1');
             getPrintLogs('');
         }

         function getPrintLogs(page) {
             var data = "";
             if ($(".search").attr('data-search') === '2') {
                 //   console.log("D");
                 data = $(".form_search").serialize();
             }
             $.ajax({
                 url: "/printlog/items" + page,
                 type: "GET",
                 data: data,
                 dataType: "json",
                 success: function(data) {
                     // console.log(data);
                     var dataHtml = "";
                     for (var i = 0; i < data.result.length; i++) {
                         var item = data.result[i];
                         item.hasChild = (item.hasChild == 1) ? "是" : "否";
                         item.hasGroup = (item.hasGroup == 1) ? "是" : "否";
                         dataHtml += '<tr>' +
                             '<td>' + item.id + '</td><td>' + item.print_time + '</td><td>' + item.enter_time + '</td><td>' + item.print_info + '</td><td>' + item.idtype + '</td><td>' + item.scan_pic + '</td><td>' + item.people_num + '</td><td>' + item.sex + '</td>' + '</td><td>' + item.id_num + '</td><td>'+item.area_name+'</td><td>' + item.name + '</td><td>' + item.hasChild + '</td><td>' + item.hasGroup + '</td>' +
                             // <td>' + item.print_type + '</td>
                             '</tr>';
                     }
                     $(".result table tbody").html(dataHtml);
                     $(".pagination").html(data.pageinfo);
                     $(".total_rows").html(data.total_rows);
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

