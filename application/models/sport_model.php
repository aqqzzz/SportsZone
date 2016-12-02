<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/11/30
 * Time: 1:36
 */

class Sport_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function insert($data){
        $this->db->insert('sport',$data);
    }

    public function insert_test(){



        $date_arr = array(20,9,2016);
        $end_date = "161202";
        $userid = 2;
        do {
            $distance=$this->randomFloat(0,50);
            $body = ($this->find_body_info($userid));
            $weight = $body->weight;
            $calorie = $weight*$distance*1.036;
            $check_date = gmdate('ymd', gmmktime(0,0,0,$date_arr[1],$date_arr[0]++,$date_arr[2]));
            $data = array(
                'userid'=>$userid,
                'date'=>$check_date,
                'distance'=>$distance,
                'calorie'=>$calorie
            );
            $this->insert($data);
//            echo $check_date."\n";
        } while($end_date!=$check_date);

    }

    function randomFloat($min = 0, $max = 1) {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

    //体重/身高的平方 kg/m2
    public function set_body_message($weight,$height,$body_fat){
        $bmi = $weight/(pow($height,2));
    }

    public function find_body_info($userid){
        $result = $this->db->query("select * from body where userid=".$userid);
        if(isset($result))
        return $result->row();
    }

    public function find_by_user($userid){
        $result = $this->db->query("select * from sport where userid=".$userid);
        return $result->result();
    }

    public function find_week_info($userid){
        $result = $this->db->query("select * from sport where userid=".$userid." limit 1,7 order by date desc");
        return $result;
    }

}