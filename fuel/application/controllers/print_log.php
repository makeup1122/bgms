<?php
require_once("base.php");
class Print_log extends Base{
     function __construct(){
        parent::__construct();
        $this->load->model('Print_log_model','Print_log');
    }
    public function index(){
        $this->load->view("common/_head");
        $this->load->view("common/_top");
        $this->load->view("common/_left");
        $this->load->view("print_log/index");
        $this->load->view("common/_footer");
    }
    public function items(){
        $where = $this->input->get();
        $total_rows = $this->Print_log->count_all();
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->per_page; 
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3; 
        $config['num_links'] = 5;
        $config['first_link'] = '首页';
        $config['last_link'] = '尾页';
        $this->pagination->initialize($config);
        $pageinfo = $this->pagination->create_links();
        $pageinfo = str_replace("href"," href='#' data-href",$pageinfo);
        $result = $this->Print_log->getContent($config['per_page'],$this->uri->segment(3));
        echo json_encode(array("result"=>$result,"pageinfo"=>$pageinfo));
    }
}
?>
