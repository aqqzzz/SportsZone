<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/11/30
 * Time: 1:31
 */

class Sports extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('sport_model');

    }

    public function index(){

        $this->load->view('sports/statistics');
    }

    public function show_sports_page($userid){
        $result = $this->user_model->read_user_info_byid($userid);
        $data['userInfo'] = array(
            'userid'=>$result->userid,
            'username'=>$result->username,
            'avatar'=>$result->avatar,
            'sex'=>$result->sex,
            'cityid'=>$result->cityid
        );


        $sport = $this->sport_model->find_by_user($result->userid);
        $total_days = 0;
        $i = 0;
        foreach($sport as $item){
            $distance = round($item->distance,2);
            if($distance!=0) $total_days+=1;
            $calorie = round($item->calorie,2);
            $data['totalSportsInfo'][$i]=array(
                'date'=>$item->date,
                'distance'=>$distance,
                'calorie'=>$calorie
            );
            $i=$i+1;
        }
        $data['totalDays'] = $total_days;

        $sport = $this->sport_model->find_week_info($result->userid);
        $i = 0;
        $week_days=0;
        foreach($sport as $item){
            $distance = round($item->distance,2);
            if($distance!=0) $week_days+=1;
            $calorie = round($item->calorie,2);
            $data['weekSportsInfo'][$i]=array(
                'date'=>$item->date,
                'distance'=>$distance,
                'calorie'=>$calorie
            );
            $i = $i+1;
        }
        $data['weekDays']=$week_days;
        $this->load->view('sports/statistics',$data);
    }


}