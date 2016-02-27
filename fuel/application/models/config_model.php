<?php
class Config_model extends CI_Model{
    private $errMsg = "";
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
    
    function add($config){
        $this->db->insert('config',$config);
    }
    
    //获取错信息
    function getErrMsg(){
        return $this->errMsg;
    }
    function deleteOne($id){
        //判断指定内容是否存在
        if($this->isExist($id)){
            //删除指定内容
            $this->db->delete('config',array('id'=>$id)); 
            if($this->db->affected_rows() != 1){
                $this->errReturn("删除错误!");
            }else{
                return true;
            }
        }else{
            $this->errReturn("指定ID不存在!");
        }
    }
    //指定($id)记录是否存在
    function isExist($id){
        $result = $this->db->get_where('config',array('id' => $id));
        return $result->num_rows() == 1?true:false;
    }
    function update($config){
        if(empty($config) && $config['id'] <=0){
            return false;
        }
        $this->db->where('id', $config['id']);
        $this->db->update('config', $config); 
        if(($this->db->affected_rows() == 1)||($this->db->affected_rows() == 0)){
            return true;
        }else{
            return false;
        }
    }
    function config($id){
        $result = $this->db->get_where('config',array('id'=>$id));
        return $result->row();
    }
}
?>