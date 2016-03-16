<?php
class Print_log_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    //获取内容
    function getContent($limit="",$offset="",$where=""){
        if(!empty($where)){
            $this->db->like($where);
            // $this->db->where($where);
        }
        $this->db->limit($limit,($offset-1)*($limit));
        $this->db->order_by('id','desc');
        $result = $this->db->get('print_log');
        // echo $this->db->last_query();
        return $result->result();
    }
    //获取当前表记录总数
    function count_all($where=""){
        if(!empty($where)){
            $this->db->like($where);
            // $this->db->where($where);
        }
        return $this->db->count_all_results('print_log');
    }
    // 获取统计数据
    function getSearch($where=""){
        if(!empty($where)){
            // $this->db->like($where);
            $this->db->where($where);
        }
        $this->db->select("DATE_FORMAT(stamp_time,'%Y-%m-%d') as day,sum(people_num) as num",false);
        $this->db->group_by("TO_DAYS(stamp_time)");
        $result = $this->db->get('print_log');
        // echo $this->db->last_query();
        return $result->result();
    }
    //组合内容
    function today(){
        $where = array();
        $where['stamp_time>'] = date("Y-m-d",strtotime('now'));
        $this->db->where("DATEDIFF(stamp_time,NOW()) = 0");
        $result = $this->db->get('print_log');
        return $result->result();
    }
}
?>