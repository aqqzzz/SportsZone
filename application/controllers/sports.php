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

        //总运动数据
        $user_total_sport = $this->sport_model->find_by_user($result->userid);
        $total_days = 0;
        $total_distance=0;
        $total_calories = 0;
        $i = 0;
        foreach($user_total_sport as $item){

            $distance = round($item->distance,2);
            if($distance!=0) $total_days+=1;
            $calorie = round($item->calorie,2);
            $data['totalSportsInfo'][$i]=array(
                'date'=>$item->date,
                'distance'=>$distance,
                'calorie'=>$calorie
            );

            $total_distance+=$distance;
            $total_calories+=$calorie;
            $i=$i+1;
        }
        $data['totalOverview']=array(
            'total_days'=>$total_days,
            'total_distance'=>$total_distance,
            'total_calories'=>$total_calories/1000
        );
        //周运动数据
        $user_week_sport = $this->sport_model->find_week_info($result->userid);
        $i = 0;
        $week_days=0;
        $week_distance = 0;
        $week_calories = 0;
        foreach($user_week_sport as $item){

            $distance = round($item->distance,2);
            if($distance!=0) $week_days+=1;
            $calorie = round($item->calorie,2);
            $data['weekSportsInfo'][$i]=array(
                'date'=>$item->date,
                'distance'=>$distance,
                'calorie'=>$calorie
            );

            $week_distance+=$distance;
            $week_calories+=$calorie;
            $i = $i+1;
        }
        $data['weekOverview']=array(
            'week_days'=>$week_days,
            'week_distance'=>$week_distance,
            'week_calories'=>round($week_calories,2)
        );

        //排行榜数据
        $sport = $this->sport_model->find_top_calorie();
        $i = 0;
        foreach($sport as $item){
            $data['topSportsInfo'][$i]=array(
                'userid'=>$item->userid,
                'username'=>$item->username,
                'avatar'=>$item->avatar,
                'calories'=>round($item->total/1000,2)
            );
            $i = $i+1;
        }

        $body = $this->sport_model->find_body_info($userid);
        $data['bodyInfo'] = array(
          'weight'=>$body->weight,
            'height'=>$body->height,
            'BMI'=>$body->BMI,
            'body_fat'=>$body->body_fat,
        );

        //代换数据
        $run_circle=ceil($data['totalOverview']['total_distance']/0.4);
        $run_meat=ceil($data['totalOverview']['total_calories']*1000/807/10);
        $run_gasoline=ceil($data['totalOverview']['total_calories']*1000/8022);
        $data['scalling'] = array(
          'run_circle'=>$run_circle,
            'run_meat'=>$run_meat,
            'run_gasoline'=>$run_gasoline
        );
        $this->load->view('sports/statistics',$data);
    }

    public function set_body_data($userid,$weight,$height,$body_fat){
        $result = $this->sport_model->set_body_message($userid,$weight,$height,$body_fat);
        if($result){
            $result = $this->sport_model->find_body_info($userid);
            $data = array(
              'height'=>$result->height,
                'weight'=>$result->weight,
                'BMI'=>round($result->BMI,2),
                'body_fat'=>$result->body_fat
            );
            echo json_encode($data);
        }
    }


}