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
        $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean');

        if($this->form_validation->run()==FALSE){
            $this->load->view('login/registration_form');
        }else{
            $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password')
            );
            $result = $this->login_database->registration_insert($data);
            if($result==TRUE){
                $data['message_display'] = 'Registration Successfully!';
                $this->load->view('login/login_form',$data);
            }else{
                $data['message_display'] = 'Username already exist!';
                $this->load->view('login/registration_form',$data);
            }
        }
    }

    //处理登录过程的逻辑
    public function login_process(){
        $this->session->unset_userdata['logged_in'];

        $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean');

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
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login/login_form', $data);

            }
        }
    }

    //注销登录
    public function logout(){
        $this->session->unset_userdata('logged_in');
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login/login_form',$data);
    }
}