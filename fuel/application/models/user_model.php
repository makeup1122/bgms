<?php
class User_model extends CI_Model{
    private $errMsg = "";
    function __construct(){
        parent::__construct();
        //加密类
        $this->load->library('encrypt');
        //字符串辅助函数
        $this->load->helper('string');
    }
    //登陆验证
    function login($username,$passwd){
        $result = $this->db->get_where("user",array('username'=>$username));
        if(empty($result->result())){
           $this->errMsg = "账号不存在!";
           return false; 
        }else{
            $userinfo = $result->result()[0];
            // echo $userinfo->verify;
            $dbpasswd = $this->encrypt->decode($userinfo->password,$userinfo->verify);
            echo $dbpasswd;
            echo $userinfo->verify;
            if(!($passwd === $dbpasswd)){
                $this->errMsg = "密码不正确!";
                return false;
            }
            if($userinfo->status != "0"){
                $this->errMsg = "账号已被停用!";
                return false;
            }
        }
        return true;
    }
    //获取用户ID
    function getUserID($username){
        $result =  $this->db->select("id")->get_where("user",array('username'=>$username));
        return $result->result()[0]->id;
    }
    //用户注册
    function register(){
        
    }
    //新增用户
    function add($userinfo){
        $userinfo['create_time'] = date("Y-m-d H:i:s",strtotime('now'));
        $userinfo['verify'] = random_string('alnum', 6);
        $userinfo['password'] = $this->encrypt->encode($userinfo['password'],$userinfo['verify']);
        $this->db->insert('user', $userinfo); 
        if($this->db->affected_rows() == 1){
            return true;
        }else{
            return false;
        }
        echo $this->db->last_query();
    }
    //获取用户数据
    function userinfo($id){
        $result = $this->db->get_where("user",array("id"=>$id));
        return $result->row();
    }
    //修改用户数据
    function update($userinfo){
        if(empty($userinfo) && $userinfo['id'] <=0){
            return false;
        }
        $userinfo['update_time'] = date("Y-m-d H:i:s",strtotime('now'));
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
    //获取错信息
    function getErrMsg(){
        return $this->errMsg;
    }
}
?>