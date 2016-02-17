<?php 
// require_once("base.php");
class User extends CI_Controller{
    public static $statusVal = array(0=>"正常",1=>"停用");
    function __construct(){
        parent::__construct();
        $this->load->model('User_model','user');
        $this->load->helper('cookie');
    }
    //用户首页
    public function index(){
        if($this->check_user_status()){
            $this->load->view("user/index");    
        }else{
            $this->view->load("user/login");
        }
    }
    public function login(){
        if ( ! empty($_POST)){
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            if($this->user->login($username,$password)){//登录成功
                set_cookie("bgms-userid",$this->user->getUserID($username), 86500);
                redirect("index/content");
            }else{
                echo "name or passwd is error!";
                $this->load->view("user/login");
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
    //检测用户是否登录
    public function check_user_status(){
        $id = get_cookie("bgms-userid");
        if(empty($id) || $id <=0){
          return false;
        }
        return true;
    }
    //展现和修改当前用户信息
    public function userinfo(){
        if( ! empty($_POST)){
            $userinfo = $this->input->post();
            if(!$this->user->update($userinfo)){
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