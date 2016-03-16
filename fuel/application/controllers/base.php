<?php 
class Base extends CI_Controller{
    //分页的每页记录个数
    public $per_page = 10;
    //当前用户名称
    public $username = "";
    function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        // $this->load->helper('url');
        //通过Cookies检测是否登录
        $this->check_user_status();
        //读取Session中的用户名
        $this->username = $this->session->userdata('username');
        //设置时区
        date_default_timezone_set("Asia/Shanghai");
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
        $where = $this->search();
        // var_dump($where);
        $total_rows = $this->model->count_all($where);
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
        $result = $this->model->getContent($config['per_page'],$this->uri->segment(3),$where);
        echo json_encode(array("result"=>$result,"pageinfo"=>$pageinfo,"total_rows"=>$total_rows));
    }
    //组合搜索条件
    public function search(){
        $data = $this->input->get();
        if(empty($data)){return null;}
        $where = array();
        //select条件
        if(!empty($data['keyword'])){
        switch($data['condition']){
            case 1:$where['username'] = $data['keyword'];break;
            case 2:$where['id'] = $data['keyword'];break;
            case 3:$where['mobile'] = $data['keyword'];break;
            case 4:$where['email'] = $data['keyword'];break;
            case 5:$where['id_num'] = $data['keyword'];break;
            case 6:$where['name'] = $data['keyword'];break;
            case 7:$where['people_num'] = $data['keyword'];break;
        }
        }
        if(isset($data['sex'])){
            switch($data['sex']){
                case 1:$where['sex'] = "男";break;
                case 2:$where['sex'] = "女";break;
                // case 3:$where['sex'] = " ";break;
            }
        }
        if(isset($data['status'])){$where['status'] = $data['status'];}
        if(isset($data['idtype'])){$where['idtype'] = $data['idtype'];}
        if(isset($data['result'])){$where['result'] = $data['result'];}
        if(isset($data['print_type'])){$where['print_type'] = $data['print_type'];}
        // var_dump($where);
        return $where;
    }
    //状态检查
    public function checkStatus(){
    }
    //Ajax返回函数，返回json类型数据
    public function returnAjax($state,$msg=""){
        echo json_encode(array('state'=>$state,'errMsg'=>$msg));
        exit;
    }
    //数据迁移相关
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