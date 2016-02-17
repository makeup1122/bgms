<?php
/** 
*设备控制器
* @version     $Id$ 
* @since        1.0 
*/  
require_once("base.php");
class Devices extends Base{
    function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Devices_model','devices');
    }
    //设备首页
    public function index(){
        $this->load->view("devices/index");
    }
    //根据条件获取设备列表
    public function items(){
        $where = $this->input->get();
        $total_rows = $this->devices->count_all();
        // $config['base_url'] = '/devices/index';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->per_page; 
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3; 
        $config['num_links'] = 5;
        $config['first_link'] = '首页';
        $config['last_link'] = '尾页';
        $this->pagination->initialize($config);
        $pageinfo = $this->pagination->create_links();
        // echo $pageinfo;
        $result = $this->devices->getContent($config['per_page'],$this->uri->segment(3));
        echo json_encode(array("result"=>$result,"pageinfo"=>$pageinfo));
    }
    /** 
    * delete  
    * 删除设备记录  
    * @param $id  设备ID
    * @return bool
    */  
    public function delete(){
        echo $this->devices->delete($this->uri->segment(3));
    }
}
?>