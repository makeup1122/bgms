<?php 
class Base extends CI_Controller{
    
    public $per_page = 2;
    
    function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->check_user_status();
        
        // $this->migrate();
    }
    public function check_user_status(){
        $id = get_cookie("bgms-userid");
        if(empty($id) || $id <=0){
          redirect("user/login");
        }
    }
    public function checkStatus(){
    }
    public function migration(){
        // $this->
    }
    public function migrate(){
        $this->load->library("migration");
        if ( ! $this->migration->current())
        {
            show_error($this->migration->error_string());
        }
    }
}
?>    