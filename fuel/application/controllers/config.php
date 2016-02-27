<?php
require_once("base.php");
class Config extends Base{
     function __construct(){
        parent::__construct();
        $this->load->model('Config_model','model');
    }
    public function index(){
        parent::_after_index();
        $this->load->view("config/index");
    }
    
    //修改
    public function edit(){
        if(!empty($_POST)){
            $config = $this->input->post();
            var_dump($config);
            $this->model->update($config);
            redirect('config/index');
        }else{
            //获取ID参数
            $id = $this->uri->segment(3);
            //获取用户数据
            $data['config'] = $this->model->config($id);
            parent::_after_index();
            $this->load->view('config/edit',$data);
        }
    }
    //新增
    public function add(){
        if(!empty($_POST)){
            $config = $this->input->post();
            $this->model->add($config);
            redirect('config/index');
        }else{
            parent::_after_index();
            $this->load->view('config/add');   
        }
    }
    //删除配置项
    public function delete(){
        $id = $this->uri->segment(3);
        if(empty($id)){
            $this->returnAjax(false,"未指定ID！");
        }
        if($this->model->deleteOne($id)){
            $this->returnAjax(true);
        }else{
            $this->returnAjax(false,$this->model->getErrMsg());
        }
    }
}
?>
