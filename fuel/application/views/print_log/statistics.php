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

                    <form class="form-inline form_search" style="margin-top:0px;" action="/printlog/statis" method="get">
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
                        &nbsp;&nbsp;&nbsp;<label for="unit">统计单位：</label>
                        <select name="unit" id="unit"  class="form-control">
                            <option value="1">日</option>
                            <option value="2">月</option>
                            <option value="3">季度</option>
                            <option value="4">年</option>
                        </select>
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
                        <label for="resultCondition">儿童票：</label>
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
                        <label for="enter">是否进馆</label>
                        <select name="enter" id="enter" class="form-control">
                            <option value="">不限</option>
                            <option value="1">是</option>
                            <option value="2">否</option>
                        </select>
                        <label for="zone">区域</label>
                        <select name="zone" id="zone" class="form-control">
                            <option value="">不限</option>
                            <option value="1">本地</option>
                            <option value="2">省内</option>
                            <option value="3">省外</option>
                            <option value="4">未知</option>
                        </select>
                        <!--<input type="text" data-search="1" class="search" hidden>-->
                        &nbsp;&nbsp;&nbsp;
                        <button class="btn btn-success " type="button" onclick="javascript:renderChart();"><i class="fa fa-search"></i> 查看</button>
                        <button class="btn btn-default" type="button" onclick="javascript:$('.form_search')[0].reset();"><i class="fa fa-refresh"></i> 清除</button>
                        <button class="btn btn-default" type="button" onclick="javascript:downloadCSV()"><i class="fa fa-download"></i> 数据导出</button>
                    </form>
                </div>
            <div class="main-content result">
            <div class="btn-toolbar list-toolbar">
                <div class="btn-group"></div>
            </div>
            <div class="chartsArea" style="width:700px;height:400px;">
            </div>
            <label class="countAll">总数：<span></span></label>
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
            function downloadCSV(){
                // $.ajax({
                    // url: "/printlog/download",
                    // type: "GET",
                    // data : $(".form_search").serialize()
                // })
                window.location.href="/printlog/download?"+$(".form_search").serialize();
                
            }
            function renderChart(page) {
                $.ajax({
                    url: "/printlog/statis",
                    type: "GET",
                    data : $(".form_search").serialize(),
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        var result = [];
                        var countAll = 0;
                        for(var i=0;i<data.length;i++){
                            result.push([data[i].day,Number(data[i].num)]);
                            countAll = countAll + Number(data[i].num);
                        }
                        $(".countAll span").html(countAll);
                        $('.chartsArea').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: '参观人数统计'
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

