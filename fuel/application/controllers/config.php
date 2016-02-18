<?php
require_once("base.php");
class Config extends Base{
     function __construct(){
        parent::__construct();
        $this->load->model('Config_model','model');
    }
    public function index(){
        parent::_after_index();
        $this->load->view("config/index");
    }
}
?>
