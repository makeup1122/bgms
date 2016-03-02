    <div class="content">
        <div class="header">

            <h1 class="page-title">修改配置项</h1>
            <ul class="breadcrumb">
                <li><a href="/">主页</a> </li>
                <li class="active">修改配置项信息</li>
            </ul>

        </div>
        <div class="main-content">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">请填写以下信息</a></li>
            </ul>

            <div class="row">
                <div class="col-md-4">
                    <br>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="home">
                            <form action="/config/edit" method="post">
                                <!--    <div class="form-group">-->
                                <!--    <label>ID</label>-->
                                <!--<input type="text" name="id" class="form-control" value="" hidden>-->
                                <!--    </div>-->
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="id" class="form-control" value="<?php if(isset($config->id)){echo $config->id;} ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>配置名称</label>
                                    <input type="text" name="name" class="form-control" value="<?php if(isset($config->name)){echo $config->name;} ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>配置值</label>
                                    <input type="text" name="value" class="form-control" value="<?php if(isset($config->value)){echo $config->value;} ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>说明</label>
                                    <input type="text" name="remark" class="form-control" value="<?php if(isset($config->remark)){echo $config->remark;} ?>" required>
                                </div>
                                <div class="btn-toolbar list-toolbar">
                                    <input type="text" name="id" value="<?php if(isset($config->id)){echo $config->id;} ?>" hidden>
                                    <input type="submit" value="提交" class="btn btn-primary">
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
                            <p class="error-text"><i class="fa fa-warning modal-icon"></i>确定删除此配置项？
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
