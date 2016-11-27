<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/12 0012
 * Time: 20:31
 */

class user_authentication extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->helper('security');

        $this->load->model('login_database');

    }

    public function index(){
        $this->load->view('login/login_form');
    }

    //加载注册的界面
    public function show_registration(){
        $this->load->view('login/registration_form');
    }

    //处理注册过程的逻辑
    public function register_process(){
        $this->form_validation->set_rules('username','Username','trim|required|xss_clean',
            array('required'=>'<i class="fa fa-exclamation-triangle"></i>用户名不能为空'));
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean',
            array('required'=>'<i class="fa fa-exclamation-triangle"></i>密码不能为空'));

        if($this->form_validation->run()==FALSE){
            $this->load->view('login/registration_form');
        }else{
            $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password')
            );
            $result = $this->login_database->registration_insert($data);
            if($result==TRUE){
                $data['message_display'] = '注册成功！';
                $this->load->view('login/login_form',$data);
            }else{
                $data['message_display'] = '用户名已存在';
                $this->load->view('login/registration_form',$data);
            }
        }
    }

    //处理登录过程的逻辑
    public function login_process(){
        $this->session->unset_userdata['logged_in'];

        $this->form_validation->set_rules('username','Username','trim|required|xss_clean',
            array('required'=>'<i class="fa fa-exclamation-triangle"></i>用户名不能为空'));
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean',
            array('required'=>'<i class="fa fa-exclamation-triangle"></i>密码不能为空'));

       // $this->form_validation->set_rules('username','Username','neccessary_input_check');
        //$this->form_validation->set_rules('password','Password','neccessary_input_check');

        if($this->form_validation->run() == FALSE) {

            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('admin/admin_page');
            }else {
                $this->load->view('login/login_form');
            }
        }else {
            $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password')
            );

            $result = $this->login_database->login($data);

            if($result==TRUE){
                $username = $this->input->post('username');

                $result = $this->login_database->read_user_information($username);

                    $session_data = array(
                        'username'=>$result->username,
                        'avatar'=>$result->avatar,
                        'sex'=>$result->sex,
                        'cityid'=>$result->cityid
                    );
                    $this->session->set_userdata('logged_in',$session_data);
                    $this->load->view('admin/admin_page');

            }else{
                $data = array(
                    'error_message' => '用户名或密码无效！'
                );
                $this->load->view('login/login_form', $data);

            }
        }
    }



    //注销登录
    public function logout(){
        $this->session->unset_userdata('logged_in');
        $data['message_display'] = '成功登出！';
        $this->load->view('login/login_form',$data);
    }

    //个人信息设置
    public function user_info_setting(){
        $this->load->view('admin/user_setting');
    }
}