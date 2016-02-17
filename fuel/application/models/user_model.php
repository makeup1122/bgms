<?php
class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function login($username,$passwd){
        $result = $this->db->get_where("user",array('username'=>$username,'password'=>$passwd));
        if(empty($result->result())){
           return false; 
        }
        return true;
    }
    function getUserID($username){
        $result =  $this->db->select("id")->get_where("user",array('username'=>$username));
        return $result->result()[0]->id;
    }
    function register(){
        
    }
    function userinfo($id){
        $result = $this->db->get_where("user",array("id"=>$id));
        return $result->row();
    }
    function update($userinfo){
        if(empty($userinfo) && $userinfo['id'] <=0){
            return false;
        }
        $this->db->where('id', $userinfo['id']);
        $this->db->update('user', $userinfo); 
        if(($this->db->affected_rows() == 1)||($this->db->affected_rows() == 0)){
            return true;
        }else{
            return false;
        }
    }
       //获取内容
    function getContent($limit="",$offset=""){
        $this->db->limit($limit,($offset-1)*($limit));
        $result = $this->db->get('user');
        return $result->result();
    }
    //获取当前表记录总数
    function count_all(){
        return $this->db->count_all_results('user');
    }
}
?>