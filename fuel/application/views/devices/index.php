<!doctype html>
<html lang="cn">

<head>
    <meta charset="utf-8">
    <title>后台管理系统</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="/assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/theme.css">
    <style type="text/css">
        body {
            font-family: "微软雅黑";
            height: 100%;
        }
        
        .sidebar-title {
            font-size: 20px;
            text-decoration: none;
        }
        
        .content {
            height: 100%;
        }
        
        #line-chart {
            height: 300px;
            width: 800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        
        .navbar-default .navbar-brand,
        .navbar-default .navbar-brand:hover {
            color: #fff;
        }
    </style>
</head>

<body class=" theme-blue">
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> 山西省博物馆后台管理系统</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
            <ul id="main-menu" class="nav navbar-nav navbar-right">
                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span>李冰&nbsp;<i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="/user/userinfo">我的账号</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="/user/logout">退出登录</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
    </div>


    <div class="sidebar-nav">
        <ul>
            <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> <strong class="sidebar-title">设备管理</strong><i class="fa fa-collapse"></i></a></li>
            <li>
                <ul class="dashboard-menu nav nav-list collapse in">
                    <li class="active"><a href="index"><span class="fa fa-caret-right"></span> 设备列表</a></li>
                    <!--<li><a href="users.html"><span class="fa fa-caret-right"></span> 添加设备</a></li>-->
                </ul>
            </li>

            <li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> <strong class="sidebar-title">打印日志</strong> <span class="label label-info">+3</span></a></li>
            <li>
                <ul class="accounts-menu nav nav-list collapse">
                    <li><a href="sign-in.html"><span class="fa fa-caret-right"></span> 打印日志列表</a></li>
                    <!--<li ><a href="sign-up.html"><span class="fa fa-caret-right"></span> 添加打印日志</a></li>-->
                </ul>
            </li>

            <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> <strong class="sidebar-title">用户管理</strong><i class="fa fa-collapse"></i></a></li>
            <li>
                <ul class="legal-menu nav nav-list collapse">
                    <li><a href="privacy-policy.html"><span class="fa fa-caret-right"></span> 用户列表</a></li>
                    <li><a href="terms-and-conditions.html"><span class="fa fa-caret-right"></span> 添加用户</a></li>
                </ul>
            </li>
            <li data-popover="true" data-content="Items in this group require a <strong><a href='http://portnine.com/bootstrap-themes/aircraft' target='blank'>premium license</a><strong>." rel="popover" data-placement="right"><a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-fighter-jet"></i> <strong class="sidebar-title">配置管理</strong><i class="fa fa-collapse"></i></a></li>
            <li>
                <ul class="premium-menu nav nav-list collapse">
                    <li><a href="premium-profile.html"><span class="fa fa-caret-right"></span> 配置列表</a></li>
                    <li><a href="premium-blog.html"><span class="fa fa-caret-right"></span> 添加配置</a></li>
                </ul>
            </li>
            <li><a href="" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> 帮助</a></li>
            <li><a href="" class="nav-header"><i class="fa fa-fw fa-comment"></i> 咨询</a></li>
            <!--<li><a href="" class="nav-header" target="blank"><i class="fa fa-fw fa-heart"></i> 我喜欢</a></li>-->
        </ul>
    </div>

    <div class="content">
        <div class="header">

            <h1 class="page-title">设备列表</h1>
            <ul class="breadcrumb">
                <li><a href="index.html">主页</a> </li>
                <li class="active">设备列表</li>
            </ul>

        </div>
        <div class="main-content">

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
                        <th>print_status</th>
                        <th>print_info</th>
                        <th>scan_status</th>
                        <th>scan_info</th>
                        <th>设备状态</th>
                        <th>登录时间</th>
                        <th>登出时间</th>
                        <th style="">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href="" title="编辑"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
                            <a href="#myModal" title="删除" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                            <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                            <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                            <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                            <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                            <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                            <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                            <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                            <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Mark</td>
                        <td>Tompson</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>the_mark7</td>
                        <td>
                            <a href=""><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                            <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>

            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
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
                <p>© 2016 大帅哥</p>
            </footer>
        </div>
    </div>


    <script src="/assets/js/bootstrap.min.js"></script>


</body>

</html>
