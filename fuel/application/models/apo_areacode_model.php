<?php
class Apo_areacode_model extends CI_Model{
    private $errMsg = "";
    function __construct(){
        parent::__construct();
        //加密类
        $this->load->library('encrypt');
        //字符串辅助函数
        $this->load->helper('string');
    }
    //获取地区内容
    public function getName($zone){
        
    }
}
?>