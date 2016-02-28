<?php
require_once("base.php");
class Print_log extends Base{
     function __construct(){
        parent::__construct();
        $this->load->model('Print_log_model','model');
    }
    public function index(){
        parent::_after_index();
        $this->load->view("print_log/index");
    }
    //统计查询
    public function statistics(){
        parent::_after_index();
    }
}
?>
