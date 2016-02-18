<?php 

require_once('base.php');
class Index extends Base{
    function __construct(){
        parent::__construct();
        // $this->load->
    }
    public function index(){
        $this->load->view("index/index");
        parent::_after_index();
    }
    public function error_404(){
    }
}
?>