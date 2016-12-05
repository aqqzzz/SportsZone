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

        $result = $this->db->insert('activity',$data);
        $activityid = $this->db->insert_id();
        $parti_data = array(
            'participantid'=>$data['authorid'],
            'activityid'=>$activityid
        );
        $this->db->insert('parti_activity',$parti_data);
        return $activityid;

    }

    public function read_act_info($id){
        $result = $this->db->query("select * from activity WHERE activityid='".$id."'");
        if($result->num_rows()==1){
            return $result->row();
        }else{
            return false;
        }
    }

    public function get_activities($type,$pagenum,$per_page){

        $start = ($pagenum-1)*$per_page;
        $end = $start+$per_page;
        $total_records = $this->get_pages($type);

        if($end>$total_records){
            $end = $total_records;
        }

        if($type==-1){
            $result = $this->db->query("select * from activity limit ".$start.",".$end);


            return $result->result();
        }else{
            $result = $this->db->query("select * from activity WHERE type=".$type." limit ".$start.",".$end);

            return $result->result();
        }
    }

    public function get_act_by_author($id,$pagenum,$per_page){
        $start = ($pagenum-1)*$per_page;
        $end = $start+$per_page;


        $total = $this->db->query("select * from activity where authorid=".$id);
        $total_records = $total->num_rows();

        if($end>$total_records){
            $end = $total_records;
        }


        $result = $this->db->query("select * from activity where authorid=".$id." limit ".$start.",".$end);
        if($result->num_rows()!=0){
            return $result->result();
        }else{
            return false;
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
        if($type==-1){
            $result = $this->db->query("select * from activity");
            return $result->num_rows();
        }else{
            $result = $this->db->query("select * from activity WHERE type='".$type."'");
            return $result->num_rows();
        }
    }

    public function get_search_num($activityname){
        $result = $this->db->query("select * from activity where activityname LIKE '%".$activityname."%'");
        return $result->num_rows();
    }

    public function delete($id){
        $this->db->delete('activity',array('activityid'=>$id));

        $this->db->delete('report_audit',array('activityid'=>$id));
    }

    public function find($activityname){

        $result = $this->db->query("select * from activity where activityname LIKE '%".$activityname."%'");

        return $result->result();
    }



}