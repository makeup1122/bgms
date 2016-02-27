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
        $this->load->model('Devices_model','model');
    }
    //设备首页
    public function index(){
        parent::_after_index();
        $this->load->view("devices/index");
    }
    /** 
    * delete  
    * 删除设备记录  
    * @param $id  设备ID
    * @return bool
    */  
    public function deleteOne(){
        echo $this->model->delete($this->uri->segment(3));
    }
}
?>