<body class="theme-blue">
        <div class="content">
        <div class="header">
            
        <h1 class="page-title">用户</h1>
        <ul class="breadcrumb">
            <li><a href="/">主页</a> </li>
            <li class="active">用户信息</li>
        </ul>

        </div>
        <div class="main-content">
            
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">编辑以下信息</a></li>
</ul>

<div class="row">
  <div class="col-md-4">
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <form  action="/user/userinfo" method="post">
        <div class="form-group">
        <label>角色</label>
    <input type="text" name="role_id" class="form-control" value="<?php if(isset($userinfo->role_id)){echo $userinfo->role_id;}?>" disabled>
        </div>
        <div class="form-group">
        <label>ID</label>
    <input type="text" name="id" class="form-control" value="<?php if(isset($userinfo->id)){echo $userinfo->id;}?>" disabled>
        </div>
        <div class="form-group">
        <label>用户名</label>
    <input type="text" name="username" class="form-control" value="<?php if(isset($userinfo->username)){echo $userinfo->username;}?>" required>
        </div>
        <div class="form-group">
        <label>输入密码</label>
    <input type="password" name="password" class="form-control" value="">
        </div>
        <div class="form-group">
        <label>确认密码</label>
    <input type="password" name="repassword" class="form-control" value="">
        </div>
        <div class="form-group">
        <label>手机号</label>
    <input type="text" name="mobile" class="form-control" value="<?php if(isset($userinfo->mobile)){echo $userinfo->mobile;}?>">
        </div>
        <div class="form-group">
        <label>电子邮箱</label>
    <input type="text" name="email" class="form-control" value="<?php if(isset($userinfo->email)){echo $userinfo->email;}?>">
        </div>

        <div class="form-group">
          <label>备注</label>
          <textarea name="remark" value="<?php if(isset($userinfo->remark)){echo $userinfo->remark;}?>" rows="3" class="form-control"><?php if(isset($userinfo->remark)){echo $userinfo->remark;}?></textarea>
        </div>

        <div class="form-group">
            <label>状态</label>
            <select name="status" class="form-control">
                <?php foreach ($statusVal as $key=>$item):
                  $selected = "";
                  if(isset($userinfo->status) && ($key == $userinfo->status)){
                      $selected="selected";
                   }
                   echo "<option value='".$key."'  ".$selected.">".$item."</option>";
                 endforeach?>
            </select>
          </div>
        <div class="btn-toolbar list-toolbar">
            <input type="text" name="id" value="<?php if(isset($userinfo->id)){echo $userinfo->id;}?>" hidden>
          <input type="submit" value="提交修改" class="btn btn-primary">
          <!--<a href="#myModal" data-toggle="modal" class="btn btn-danger">Delete</a>-->
        </div>
        </form>

      </div>
    </div>


  </div>
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
    </div>
</body>