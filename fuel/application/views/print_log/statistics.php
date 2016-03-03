    <div class="content print_log">
        <div class="header">

            <h1 class="page-title">统计查询</h1>
            <ul class="breadcrumb">
                <li><a href="/">主页</a> </li>
                <li class="active">统计查询</li>
            </ul>
             
           
        </div>
        <div class="search-well">
           
        </div>
        <div class="search-well">
            <!--暂时不要这个人数了，因为逻辑上想不通!!!!!!-->
             <!--<label for="">人数</label><input type="text" name="mix_people_num"> - <input type="text" name="max_people_num">-->

                    <form class="form-inline form_search" style="margin-top:0px;" action="/print_log/statis" method="get">
                        <label for="">统计日期：</label><input type="text" value="2016-01-01" class="form-control" id="begin_time" name="begin_time"> 至 <input type="text" class="form-control" id="end_time" name="end_time">
                        <!--<label for="">条件：</label>-->
                        <!--<select name="condition" class="form-control">-->
                            <!--<option value="1">用户名</option>-->
                            <!--<option value="2">ID</option>-->
                            <!--<option value="3">手机号</option>-->
                            <!--<option value="4">邮箱</option>-->
                            <!--<option value="5">证件号码</option>-->
                            <!--<option value="6">姓名</option>-->
                            <!--<option value="7">人数</option>-->
                        <!--</select>-->
                        <!--<lable>关键字：</lable>-->
                        <!--<input name="keyword" class="input-xlarge form-control" placeholder="关键字" id="" type="text" value="<?php echo isset($_GET['keyword'])?$_GET['keyword']:""; ?>">-->
                        <!--<input class="input-xlarge form-control" placeholder="状态" id="" type="text">-->
                        <br><br>
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
                        <label for="resultCondition">打印结果：</label>
                        <select name="result" id="idresultConditiontypeCondition" class="form-control">
                            <option value="">无</option>
                            <option value="1">成功</option>
                            <option value="0">失败</option>
                            <!--<option value="3">3</option>-->
                            <!--<option value="4">4</option>-->
                        </select>
                        <label for="resultCondition">携带儿童：</label>
                        <select name="hasChild" id="idresultConditiontypeCondition" class="form-control">
                            <option value="">不限</option>
                            <option value="0">否</option>
                            <option value="1">是</option>
                        </select>
                        <label for="resultCondition">携带团队：</label>
                        <select name="hasGroup" id="idresultConditiontypeCondition" class="form-control">
                            <option value="">不限</option>
                            <option value="0">否</option>
                            <option value="1">是</option>
                        </select>
                        <!--<input type="text" data-search="1" class="search" hidden>-->
                        &nbsp;&nbsp;&nbsp;
                        <button class="btn btn-success " type="button" onclick="javascript:renderChart();"><i class="fa fa-search"></i> 查看</button>
                        <button class="btn btn-default" type="button" onclick="javascript:$('.form_search')[0].reset();"><i class="fa fa-refresh"></i> 清除</button>
                    </form>
                </div>
        <div class="main-content result">
            <div class="btn-toolbar list-toolbar">
                <div class="btn-group">
                </div>
            </div>
            <div class="chartsArea" style="width:700px;height:400px;">
                
            </div>
            <!--<table class="table">-->
            <!--    <thead>-->
            <!--       <tr>-->
                       <!--<th>ID</th>-->
            <!--           <th>打印时间</th>-->
                       <!--<th>一维码</th>-->
            <!--           <th>打印类型</th>-->
            <!--           <th>证件类型</th>-->
            <!--           <th>人数</th>-->
            <!--           <th>性别</th>-->
            <!--           <th>证件号码</th>-->
            <!--           <th>姓名</th>-->
            <!--           <th>携带儿童</th>-->
            <!--           <th>团队携带者</th>-->
            <!--           <th>打印结果</th>-->
            <!--           <th>错误信息</th>-->
                       <!--<th>时间</th>-->
            <!--        </tr>-->
            <!--    </thead>-->
            <!--    <tbody>-->
            <!--    </tbody>-->
            <!--</table>-->

            <!--<ul class="pagination">-->
            <!--</ul>-->


            <footer>
                <hr>
                <p>© 2016 BGMS</p>
            </footer>
        </div>
        <script type="text/javascript" src="/assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap-datepicker.zh-CN.min.js"></script>
        <script type="text/javascript" src="/assets/js/highcharts.js"></script>

        <script type="text/javascript">
            var today = new Date(),
                year = today.getFullYear(),
                month = today.getMonth()+1<10?"0"+(today.getMonth()+1):today.getMonth()+1;
                day = today.getDate()<10?("0"+(today.getDate())):(today.getDate());
            $('#end_time').val(year+"-"+month+"-"+day);
            $('#begin_time').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                language: 'zh-CN',
                clearBtn: true,
                todayHighlight: true
            });
            $('#end_time').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                language: 'zh-CN',
                clearBtn: true,
                todayHighlight: true
            });
            function renderChart(page) {
                $.ajax({
                    url: "/print_log/statis",
                    type: "GET",
                    data : $(".form_search").serialize(),
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        var result = [];
                        for(var i=0;i<data.length;i++){
                            result.push([data[i].day,Number(data[i].num)]);
                        }
                        $('.chartsArea').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: '打印日志统计'
                            },
                            subtitle: {
                                text: $("#begin_time").val()+'至'+ $("#end_time").val() +'数据'
                            },
                            xAxis: {
                                type: 'category',
                                labels: {
                                    rotation: -45,
                                    style: {
                                        fontSize: '10px',
                                        fontFamily: '微软雅黑'
                                    }
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: '单位（人次）'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            tooltip: {
                                pointFormat: '<b>{point.y} 人次</b>'
                            },
                            series: [{
                                name: 'Population',
                                data: result,
                                dataLabels: {
                                    enabled: true,
                                    rotation: -90,
                                    color: '#FFFFFF',
                                    align: 'right',
                                    // format: '{point.y:.1f}', // one decimal
                                    y: 10, // 10 pixels down from the top
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: '微软雅黑'
                                    }
                                }
                            }]
                        });
                    }
                });
            }
            renderChart();
        </script>

