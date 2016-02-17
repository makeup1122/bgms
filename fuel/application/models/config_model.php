<?php
class Config_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    //获取内容
    function getContent($limit="",$offset=""){
        $this->db->limit($limit,($offset-1)*($limit));
        $result = $this->db->get('config');
        return $result->result();
    }
    //获取当前表记录总数
    function count_all(){
        return $this->db->count_all_results('config');
    }
}
?>