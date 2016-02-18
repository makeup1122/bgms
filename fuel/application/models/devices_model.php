<?php
class Devices_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    //获取内容
    function getContent($limit="",$offset=""){
        $this->db->limit($limit,($offset-1)*($limit));
        $this->db->order_by('login_time','desc');
        $result = $this->db->get('devices');
        return $result->result();
    }
    //获取当前表记录总数
    function count_all(){
        return $this->db->count_all_results('devices');
    }
    //删除设备
    function delete($id){
        $this->db->delete('devices', array('id' => $id)); 
        if($this->db->affected_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
}
?>