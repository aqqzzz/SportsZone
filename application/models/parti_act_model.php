<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/12/1
 * Time: 1:23
 */

class parti_act_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('parti_activity',$data);
    }

    public function get_by_activity($id){
        $result = $this->db->query('select user.userid,user.username,user.avatar from parti_activity,user WHERE parti_activity.activityid='.$id.' and parti_activity.participantid=user.userid');

        if($result->num_rows()!=0){
            return $result->result();
        }else{
            echo "no result!";
        }
    }

    public function get_by_user($id,$pagenum,$per_page){
        $start = ($pagenum-1)*$per_page;
        $end = $start+$per_page;

        $total = $this->db->query("select activity.* from parti_activity,activity WHERE parti_activity.participantid=".$id." and activity.activityid=parti_activity.activityid");
        $total_records = $total->num_rows();

        if($end<$total_records){
            $end = $total_records;
        }

        $result = $this->db->query("select activity.* from parti_activity,activity WHERE parti_activity.participantid=".$id." and activity.activityid=parti_activity.activityid limit ".$start.",".$end);
        if($result->num_rows()!=0){
            return $result->result();
        }
    }

    public function delete($userid,$actid){
        $this->db->delete('parti_activity',array('participantid'=>$userid, 'activityid'=>$actid));
    }

    public function delete_by_act($actid){
        $this->db->delete('parti_activity',array('activityid'=>$actid));
    }
}