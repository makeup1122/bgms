<?php 
require_once("base.php");
class User extends Base{
    public static $statusVal = array(0=>"正常",1=>"停用");
    function __construct(){
        parent::__construct();
        $this->load->model('User_model','model');
    }
    //用户首页
    public function index(){
        $this->load->view("user/login");
    }
    //用户登录
    public function login(){
        if ( ! empty($_POST)){
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            if($this->model->login($username,$password)){//登录成功
                $uid = $this->model->getUserID($username);
                set_cookie("bgms-userid",$uid, 3600);
                $this->session->set_userdata(array("uid"=>$uid,"username"=>$username));
                redirect("index/content");
            }else{
                $this->load->view("user/login",array("errMsg"=>"账户名或密码错误!"));
            }
        }else{
            $this->load->view("user/login");
        }
    }
    //登出
    public function logout(){
        delete_cookie("bgms-userid");
        $this->load->view("user/login");
    }
    //展现和修改当前用户信息
    public function userinfo(){
        if( ! empty($_POST)){
            $userinfo = $this->input->post();
            if(!$this->model->update($userinfo)){
                echo "更新错误!";
            }
        }
        else{
            $userinfo = $this->user->userinfo(get_cookie("bgms-userid"));
        }
        $data['userinfo'] = $userinfo;
        $data['statusVal'] = self::$statusVal;
        $this->load->view("user/userinfo",$data);
    }  
}
?>