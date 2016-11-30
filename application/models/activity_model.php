<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/11/30
 * Time: 11:21
 */
class activity_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //插入活动信息
    public function insert($data){
        return $this->db->insert('activity',$data);
    }

    public function read_act_info($id){
        $result = $this->db->query("select * from activity WHERE activityid='".$id."'");
        if($result->num_rows()==1){
            return $result->row();
        }else{
            return false;
        }
    }

    public function get_activities($type,$pagenum){
        $start = ($pagenum-1)*6;
        $end = $start+6;
        if($type===-1){
            $result = $this->db->query("select * from activity WHERE activityid >'".$start."' and activityid <='".$end."'");

            echo $result->num_rows();

            return $result->result();
        }else{
            $result = $this->db->query("select * from activity WHERE type='".$type."' and activityid >'".$start."' and activityid <='".$end."'");

            echo $result->num_rows();

            return $result->result();
        }
    }

//    public function get_all_act($type){
//        $result = $this->db->query("select * from activity where type='".$type."'");
//        return $result;
//    }

//    public function get_activities($limit,$id,$type){
//        $this->db->limit($limit);
//        $start = ($id-1)*6;
//
//        if($type==null){
//            $result = $this->db->query("select * from activity WHERE activityid>'".$start."' limit ".$limit);
//        }else{
//            $result = $this->db->query("select * from activity WHERE type='".$type."' and activityid>'\".$start.\"' limit \".$limit");
//        }
//        return $result;
//    }

    public function get_pages($type){
        if($type===-1){
            $result = $this->db->query("select * from activity");
            return $result->num_rows();
        }else{
            $result = $this->db->query("select * from activity WHERE type='".$type."'");
            return $result->num_rows();
        }
    }

}