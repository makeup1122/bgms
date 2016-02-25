<?php 
class Base extends CI_Controller{
    //分页的每页记录个数
    public $per_page = 10;
    //当前用户名称
    public $username = "";
    function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        //通过Cookies检测是否登录
        $this->check_user_status();
        //读取Session中的用户名
        $this->username = $this->session->userdata('username');
        // $this->migrate();
    }
    //加载公共区域内容
    public function _after_index(){
        $this->load->view("common/_head");
        $this->load->view("common/_top",array("username"=>$this->username));
        $this->load->view("common/_left",array("controller"=>$this->uri->segment(1)));
        $this->load->view("common/_footer");
    }
    //检测用户在线状态
    public function check_user_status(){
        if($this->uri->segment(2) == "login" && $this->uri->segment(1) == "user"){
            return true;
        }
        $id = get_cookie("bgms-userid");
        if(empty($id) || $id <=0){
          redirect("user/login");
        }
    }
    //获取对应表的数据记录
    public function items(){
        $where = $this->input->get();
        $total_rows = $this->model->count_all();
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
        $result = $this->model->getContent($config['per_page'],$this->uri->segment(3));
        echo json_encode(array("result"=>$result,"pageinfo"=>$pageinfo));
    }
    //组合搜索条件
    public function search(){
        $where = $this->input->get();
    }
    //状态检查
    public function checkStatus(){
    }
    public function returnAjax($state,$msg=""){
        echo json_encode(array('state'=>$state,'errMsg'=>$msg));
        exit;
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