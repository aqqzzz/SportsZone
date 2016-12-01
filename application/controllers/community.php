<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/12/1
 * Time: 8:25
 */

class community extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
    }

    public function index(){
        $this->load->view("community/community");
    }

    public function show_com_page($userid){
        $result =  $this->user_model->read_user_info_byid($userid);
        $data['userInfo']= array(
            'userid'=>$result->userid,
            'username'=>$result->username,
            'avatar'=>$result->avatar,
            'sex'=>$result->sex,
            'cityid'=>$result->cityid
        );
        $this->load->view("community/community",$data);

    }
}