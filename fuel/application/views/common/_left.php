<body class="theme-blue">
    <div class="sidebar-nav">
    <ul>
        <li><a href="#" data-target=".dashboard-menu" class="nav-header <?php echo (isset($controller)&&($controller =='devices'))?"":"collapsed" ?>" data-toggle="collapse"><i class="fa fa-fw fa-laptop"></i> <strong class="sidebar-title">设备管理</strong><i class="fa fa-collapse"></i></a></li>
        <li>
            <ul class="dashboard-menu nav nav-list collapse <?php echo (isset($controller)&&($controller =='devices'))?"in":"" ?>">
                <li class="<?php echo (isset($controller)&&($controller =='devices')&&(null!==$this->uri->segment(2))&&($this->uri->segment(2) =='index'))?"active":"" ?>"><a href="/devices/index"><span class="fa fa-caret-right"></span> 设备列表</a></li>
                <!--<li><a href="users.html"><span class="fa fa-caret-right"></span> 添加设备</a></li>-->
            </ul>
        </li>

        <li><a href="#" data-target=".accounts-menu" class="nav-header <?php echo (isset($controller)&&($controller =='print_log'))?"":"collapsed" ?>" data-toggle="collapse"><i class="fa fa-fw fa-print"></i> <strong class="sidebar-title">打印日志</strong> <i class="fa fa-collapse"></i></a></li>
        <li>
            <ul class="accounts-menu nav nav-list collapse <?php echo (isset($controller)&&($controller =='print_log'))?"in":"" ?>">
                <li class="<?php echo (isset($controller)&&($controller =='print_log')&&(null!==$this->uri->segment(2))&&($this->uri->segment(2) =='index'))?"active":"" ?>">
                    <a href="/print_log/index"><span class="fa fa-caret-right"></span> 日志列表</a>
                </li>
                <!--<li ><a href="sign-up.html"><span class="fa fa-caret-right"></span> 添加打印日志</a></li>-->
            <!--</ul>-->
            <!--<ul class="accounts-menu nav nav-list collapse <?php echo (isset($controller)&&($controller =='print_log'))?"in":"" ?>">-->
                <li class="<?php echo (isset($controller)&&($controller =='print_log')&&(null!==$this->uri->segment(2))&&($this->uri->segment(2) =='statistics'))?"active":"" ?>">
                    <a href="/print_log/statistics"><span class="fa fa-caret-right"></span> 统计查询</a>
                </li>
                <!--<li ><a href="sign-up.html"><span class="fa fa-caret-right"></span> 添加打印日志</a></li>-->
            </ul>
        </li>

        <li><a href="#" data-target=".legal-menu" class="nav-header <?php echo (isset($controller)&&($controller =='user'))?"":"collapsed" ?>" data-toggle="collapse"><i class="fa fa-fw fa-user"></i> <strong class="sidebar-title">用户管理</strong><i class="fa fa-collapse"></i></a></li>
        <li>
            <ul class="legal-menu nav nav-list collapse <?php echo (isset($controller)&&($controller =='user'))?"in":"" ?>">
                <li class="<?php echo (isset($controller)&&($controller =='user')&&(null!==$this->uri->segment(2))&&($this->uri->segment(2) =='index'))?"active":"" ?>">
                    <a href="/user/index"><span class="fa fa-caret-right"></span> 用户列表</a>
                </li>
                <li class="<?php echo (isset($controller)&&($controller =='user')&&(null!==$this->uri->segment(2))&&($this->uri->segment(2) =='add'))?"active":"" ?>">
                    <a href="/user/add"><span class="fa fa-caret-right"></span> 添加用户</a>
                </li>
            </ul>
        </li>
        <li><a href="#" data-target=".premium-menu" class="nav-header <?php echo (isset($controller)&&($controller =='config'))?"":"collapsed" ?>" data-toggle="collapse"><i class="fa fa-fw fa-table"></i> <strong class="sidebar-title">配置管理</strong><i class="fa fa-collapse"></i></a></li>
        <li>
            <ul class="premium-menu nav nav-list collapse <?php echo (isset($controller)&&($controller =='config'))?"in":"" ?>">
                <li class="<?php echo (isset($controller)&&($controller =='config')&&(null!==$this->uri->segment(2))&&($this->uri->segment(2) =='index'))?"active":"" ?>">
                    <a href="/config/index"><span class="fa fa-caret-right"></span> 配置列表</a>
                </li>
                <li class="<?php echo (isset($controller)&&($controller =='config')&&(null!==$this->uri->segment(2))&&($this->uri->segment(2) =='add'))?"active":"" ?>">
                    <a href="/config/add"><span class="fa fa-caret-right"></span> 添加配置</a>
                </li>
            </ul>
        </li>
        <li><a href="" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> 帮助</a></li>
        <li><a href="" class="nav-header"><i class="fa fa-fw fa-comment"></i> 咨询</a></li>
        <!--<li><a href="" class="nav-header" target="blank"><i class="fa fa-fw fa-heart"></i> 我喜欢</a></li>-->
    </ul>
</div>
