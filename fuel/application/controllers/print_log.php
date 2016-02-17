<?php
require_once("base.php");
class Print_log extends Base{
     function __construct(){
        parent::__construct();
        $this->load->model('Print_log_model','Print_log');
    }
    public function index(){
        $result = $this->Print_log->getContent();
        echo json_encode(array("result"=>$result,"total"=>$this->Print_log->count_all()));
    }
}
?>
