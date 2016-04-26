<?php
require_once("base.php");
class Printlog extends Base{
     function __construct(){
        parent::__construct();
        $this->load->model('Print_log_model','model');
    }
    //打印统计
    public function index(){
        parent::_after_index();
        $this->load->view("print_log/index");
    }
    //统计查询
    public function statistics(){
        parent::_after_index();
        $this->load->view("print_log/statistics");
    }
    //扫描统计
    public function scaner(){
        parent::_after_index();
        $this->load->view("print_log/scaner");
    }
    //统计查询接口
    public function statis(){
        $data = $this->input->get();
        // var_dump($data);
        $where = $this->_procCondition($data);
        // var_dump($where);
        $result = $this->model->getSearch($where);
        echo json_encode($result);
        // echo "{'2016-03-03':23}";
    }
    //处理查询条件
    private function _procCondition($data){
        $where = array();
        //1. 时间范围
        // 1.1 开始时间
        if(isset($data['begin_time']) && empty($data['begin_time'])){
            $data['begin_time'] = '2016-01-01';
        }
        $where['stamp_time >='] = $data['begin_time'];
        // 1.2 结束时间
        if(isset($data['end_time']) && empty($data['end_time'])){
            $data['end_time']   = date("Y-m-d H:i:s",strtotime('now'));
        }
        $where['stamp_time <='] = $data['end_time'];
        //2.人数
        //3.其他条件
        // 3.1 性别
        if(!empty($data['sex'])){
            switch($data['sex']){
                case 1:$where['sex'] = "男";break;
                case 2:$where['sex'] = "女";break;
            }
        }
        // 3.2 证件类型
        if(!empty($data['idtype'])){
            $where['idtype'] = $data['idtype'];
        }
        // 3.3 打印结果
        if(isset($data['result']) && (($data['result']=="0") || (!empty($data['result'])))){
            $where['result'] = $data['result']; 
        }
        // 3.4 是否携带儿童
        if(isset($data['hasChild']) && (($data['hasChild']=="0") || (!empty($data['hasChild'])))){
            $where['hasChild'] = $data['hasChild']=="0"?"0":"1"; 
        }
        // 3.5 是否携带团队
        if(isset($data['hasGroup']) && (($data['hasGroup']=="0") || (!empty($data['hasGroup'])))){
            $where['hasGroup'] = $data['hasGroup']=="0"?"0":"1"; 
        }
        // 3.6 是否进馆
        if(isset($data['enter']) && !empty($data['enter'])){
            if($data['enter'] == '1'){
                $where['enter_time !='] ="0000-00-00 00:00:00";
            }else if($data['enter'] == '2'){
                $where['enter_time'] ="0000-00-00 00:00:00";
            }
        }
        // 3.7 地区范围
        if(isset($data['zone']) && !empty($data['zone'])){
            if($data['zone'] == '1'){//太原市
                $this->model->db->like("zone","1401", "after");
            }else if($data['zone'] == '2'){//省内
                $this->model->db->like("zone","14", "after");
            }else if($data['zone'] == '3'){//省外
                $this->model->db->not_like("zone","14", "after");
                $this->model->db->where("zone !=","");
            }else if($data['zone'] == '4'){
                $this->model->db->where("zone","");
            }
        }
        // 3.8 查询单位
        if(isset($data['unit']) && !empty($data['unit'])){
            if($data['unit'] == '1'){//日
                $this->db->select("DATE_FORMAT(stamp_time,'%Y-%m-%d') as day,sum(people_num) as num",false);
                $this->db->group_by("TO_DAYS(stamp_time)");
            }else if($data['unit'] == '2'){//月
                $this->db->select("CONCAT(DATE_FORMAT(stamp_time,'%Y-%m'),'月') as day,sum(people_num) as num",false);
                $this->db->group_by("CONCAT(YEAR(stamp_time),MONTH(stamp_time))");
            }else if($data['unit'] == '3'){//季度
                $this->db->select("CONCAT(DATE_FORMAT(stamp_time,'%Y'),'-',QUARTER(stamp_time),'季') as day,sum(people_num) as num",false);
                $this->db->group_by("CONCAT(YEAR(stamp_time),QUARTER(stamp_time))");
            }else if($data['unit'] == '4'){//年
                $this->db->select("CONCAT(DATE_FORMAT(stamp_time,'%Y'),'年') as day,sum(people_num) as num",false);
                $this->db->group_by("YEAR(stamp_time)");
            }else{//默认 日
                $this->db->select("DATE_FORMAT(stamp_time,'%Y-%m-%d') as day,sum(people_num) as num",false);
                $this->db->group_by("TO_DAYS(stamp_time)");
            }
        }
        // var_dump($where);
        return $where;
    }
}
?>
