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
        parent::_after_index();
        $this->load->view("user/index");
    }
    //用户登录
    public function login(){
        if ( ! empty($_POST)){
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            // if($username == "admin" || $this->model->login($username,$password)){//登录成功
            if($this->model->login($username,$password)){//登录成功
                $uid = $this->model->getUserID($username);
                set_cookie("bgms-userid",$uid, 86400);
                $this->session->set_userdata(array("uid"=>$uid,"username"=>$username));
                redirect("index/content");
            }else{
                $this->load->view("user/login",array("errMsg"=>$this->model->getErrMsg()));
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
        $userinfo = $this->model->userinfo(get_cookie("bgms-userid"));
        $data['userinfo'] = $userinfo;
        $data['statusVal'] = self::$statusVal;
        parent::_after_index();
        $this->load->view("user/userinfo",$data);
    }  
    //新增用户
    public function add(){
        if(!empty($_POST)){
            $userinfo = $this->input->post();
            if($userinfo['password'] === $userinfo['repassword']){
                unset($userinfo['repassword']);
            }else{
                echo "密码不正确!";
            }
            if(!$this->model->add($userinfo)){
                echo "新增错误!";
            }
            redirect('user/index');
        }else{
            parent::_after_index();
            $this->load->view('user/add',array("statusVal"=>self::$statusVal));  
        }
    }
    //编辑用户
    public function edit(){
        $this->load->view('user/modfiy',array("statusVal"=>self::$statusVal));
    }
    //删除用户
    public function delete(){
        
    }
}
?>