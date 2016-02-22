<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>山西省博物馆</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    body{
        width:100%;
        height:100%;
        background:url("/assets/images/backgroudImg6.jpg");
    }
    .loginArea{
        width:300px;
        height:320px;
        background:#fff;
        float:right;
        margin-right:10%;
        margin-top:10%;
    }
</style>
</head>
<body>
    <div class="loginArea panel panel-default">
        <p class="panel-heading no-collapse"><strong>请登录</strong></p>
        <div class="panel-body">
            <form action="/user/login" method="post">
                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" name="username" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" name="password" class="form-control span12 form-control">
                </div>
                <div style="color:red;" class="clearfix"><span><?php if(!empty($errMsg)){echo $errMsg;}?></span></div>
                <br>
                <input type="submit" class="btn btn-primary pull-right" value="登陆">
                <!--<label class="remember-me"><input type="checkbox"> 记住密码</label>-->
                
            </form>
        </div>
    </div>
</body>
</html>