<?php 

require_once('base.php');
class Index extends Base{
    function __construct(){
        parent::__construct();
        // $this->load->
    }
    public function index(){
        $this->load->view("common/_head");
        $this->load->view("common/_top");
        $this->load->view("common/_left");
        $this->load->view("index/index");
        $this->load->view("common/_footer");
    }
    public function error_404(){
    }
}
?>