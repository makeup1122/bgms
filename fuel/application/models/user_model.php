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
        //判断账号是否存在
        $result = $this->db->get_where("user",array('username'=>$username));
        if(empty($result->result())){
           $this->errMsg = "账号不存在!";
           return false; 
        }else{//验证账号
            $userinfo = $result->result()[0];
            //验证密码
            $dbpasswd = $this->encrypt->decode($userinfo->password,$userinfo->verify);
            if(!($passwd === $dbpasswd)){
                $this->errMsg = "密码不正确!";
                return false;
            }
            //验证状态
            if($userinfo->status != "0"){
                $this->errMsg = "账号已被停用!";
                return false;
            }
        }
        //更新登陆状态
        $this->updateLoginInfo($userinfo);
        return true;
    }
    //更新登陆状态
    function  updateLoginInfo($userinfo){
        date_default_timezone_set("Asia/Shanghai");
        $Info['last_login_time'] = date("Y-m-d H:i:s",strtotime('now'));
        $Info['last_login_ip'] = $_SERVER["REMOTE_ADDR"];
        $this->db->where('id', $userinfo->id);
        $this->db->update('user', $Info); 
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
        //如果密码字段为空，则不更新密码
        if($userinfo['password'] == ""){
            unset($userinfo['password']);
            unset($userinfo['repassword']);
        }else{//否则更新电脑
            $this->db->select('verify');
            $verify = $this->db->get_where('user', array('id'=> $userinfo['id']));
            $userinfo['password'] = $this->encrypt->encode($userinfo['password'],$verify->result()[0]->verify);
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
    function getContent($limit="",$offset="",$where=""){
        if(!empty($where)){
            $this->db->like($where);
            // $this->db->where($where);
        }
        $this->db->limit($limit,($offset-1)*($limit));
        $result = $this->db->get('user');
        // echo $this->db->last_query();
        return $result->result();
    }
    //获取当前表记录总数
    function count_all($where=""){
        if(!empty($where)){
            $this->db->like($where);
            // $this->db->where($where);
        }
        return $this->db->count_all_results('user');
    }
    //获取错信息
    function getErrMsg(){
        return $this->errMsg;
    }
    //删除指定($id)记录
    function deleteOne($id){
        //判断指定内容是否存在
        if($this->isExist($id)){
            //删除指定内容
            $this->db->delete('user',array('id'=>$id)); 
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
        $result = $this->db->get_where('user',array('id' => $id));
        return $result->num_rows() == 1?true:false;
    }
    function errReturn($msg){
        $this->errMsg = $msg;
        return false;
    }
}
?>