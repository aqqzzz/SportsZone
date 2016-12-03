<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/12/3
 * Time: 17:21
 */
class Report_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        $result = $this->db->insert('report_audit',$data);
        return $result;
    }

    public function delete($reportid){
        $result = $this->db->delete('report_audit',array('reportid'=>$reportid));
        return $result;
    }

    public function read_all_report(){
        $result = $this->db->query("select user.username,activity.activityname, ra.* from user, report_audit as ra,activity
                                    where user.userid=ra.userid and activity.activityid=ra.activityid");
        return $result->result();
    }
}