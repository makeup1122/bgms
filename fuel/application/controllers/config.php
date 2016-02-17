<?php
require_once("base.php");
class Config extends Base{
     function __construct(){
        parent::__construct();
        $this->load->model('Config_model');
    }
    public function index(){
        $this->load->view("common/_head");
        $this->load->view("common/_top");
        $this->load->view("common/_left");
        $this->load->view("config/index");
        $this->load->view("common/_footer");
    }
    public function items(){
        $where = $this->input->get();
        $total_rows = $this->Config_model->count_all();
        // echo $
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
        $result = $this->Config_model->getContent($config['per_page'],$this->uri->segment(3));
        echo json_encode(array("result"=>$result,"pageinfo"=>$pageinfo));
    }
}
?>
