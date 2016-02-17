<?php
class Devices_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getContent(){
        $result = $this->db->get('print_log');
        return $result->result();
    }
    //获取当前表记录总数
    function count_all(){
        return $this->db->count_all_results('print_log');
    }
}
?>