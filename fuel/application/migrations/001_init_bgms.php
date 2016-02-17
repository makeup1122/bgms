<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Init_bgms extends CI_Migration{
    public function up(){
        $file_path = APPPATH.'migrations/001_init_bgms.sql';
		$this->db->load_sql($file_path);
    }
    public function down(){
        $this->db->load_sql("drop table config");
        $this->db->load_sql("drop table print_log");
        $this->db->load_sql("drop table user");
        $this->db->load_sql("drop table devices");
    }
}
?>