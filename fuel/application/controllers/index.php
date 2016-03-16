<?php 

require_once('base.php');
class Index extends Base{
    function __construct(){
        parent::__construct();
        $this->load->model('Print_log_model','model');
    }
    public function index(){
        
        parent::_after_index();
        $this->load->view("index/index");
    }
    //首页数据ajax接口
    public function today(){
        $data = $this->model->today();
        echo json_encode($data);
    }
    public function error_404(){
    }
}
?>