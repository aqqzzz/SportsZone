<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/11/30
 * Time: 9:17
 */

class activity extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->view('activity/create_activity');
    }

    public function show_create_act(){
        $this->load->view('activity/create_activity');
    }

    //发布活动
    public function create_act($authorid, $data){
        $config = array(
            array(
              'field'=>'act-name',
              'label'=>'act-name',
              'rules'=>'trim|required|xss_clean',
              'errors'=>array(
                  'required'=>'请填写活动名称'
              ),
            ),
            array(
              'field'=>'act-type',
              'label'=>'act-type',
            ),
            array(
                'field'=>'start-time',
                'label'=>'start-time',
                'rules'=>'trim|required|xss_clean',
                'errors'=>array(
                    'required'=>'请选择开始时间',
                ),
            ),
            array(
                'field'=>'end-time',
                'label'=>'end-time',
                'rules'=>'trim|required|xss_clean',
                'errors'=>array(
                    'required'=>'请选择结束时间',
                ),
            ),
            array(
                'field'=>'bonus',
                'label'=>'bonus',
                'rules'=>'required|callback_check_digital',
            ),
            array(
                'field'=>'act-description',
                'label'=>'act-description',
                'rules'=>'required|min_length[8]|max_length[100]',
                'errors'=>array(
                  'required'=>'请添加活动简介',
                    'min_length'=>'多说几句吧',
                    'max_length'=>'最多100个字，您超字数啦',
                ),
            ),
        );
    }

    public function check_digital($str){
        if(is_numeric($str)){
            return true;
        }else{
            $this->form_validation->set_message('check_digital','请再奖励域输入数字！');
            return false;
        }
    }
}