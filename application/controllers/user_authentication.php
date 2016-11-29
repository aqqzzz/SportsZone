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
                        'userid'=>$result->userid,
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
        //echo $username;
        $username = $this->session->userdata['logged_in']['username'];
        $username=urldecode($username);
        echo($username);
        $result = $this->login_database->read_user_information($username);

        if($result!=false){
            $data['userInfo'] = array(
                'userid'=>$result->userid,
                'username'=>$result->username,
                'avatar'=>$result->avatar,
                'sex'=>$result->sex,
                'cityid'=>$result->cityid
            );
            $this->load->view('admin/user_setting',$data);

        }

    }

    public function user_info_get($username){
        $username=urldecode($username);
        $result = $this->login_database->read_user_information($username);

        if($result!=false){
            $data = array(
                'userid'=>$result->userid,
                'username'=>$result->username,
                'avatar'=>$result->avatar,
                'sex'=>$result->sex,
                'cityid'=>$result->cityid
            );

            $this->session->set_userdata('logged_in',$data);

            echo json_encode($data);
        }
    }

    public function show_edit(){
        $this->load->view('admin/user_setting_edit');
    }

    //修改个人信息
    public function user_info_edit($id){


        $sex = $this->input->post('sex');
        if($sex=='男'){
            $sex=1;
        }else if($sex=='女'){
            $sex=0;
        }else{
            $sex=null;
        }

        $data = array(
            'userid'=>$id,
            'username' => $this->input->post('username'),
            'sex'=> $sex,
            'cityid'=>$this->input->post('city')
        );

        $updateSuccess=$this->login_database->update_user_information($id,$data);
        if($updateSuccess==FALSE){
            echo "update falied";
        }else if($updateSuccess==TRUE){

            $username=$this->input->post('username');

            $result = $this->login_database->read_user_information($username);

            $session_data = array(
                'userid'=>$id,
                'username'=>$result->username,
                'avatar'=>$result->avatar,
                'sex'=>$result->sex,
                'cityid'=>$result->cityid
            );

            $this->session->set_userdata('logged_in',$session_data);

//            $this->user_info_setting($data['username']);
            echo json_encode($data);
        }
    }

    public function show_reset_pwd(){
        $this->load->view('admin/user_reset_pwd');
    }

    //修改密码
    public function reset_pwd(){
//        $id = ($this->session->userdata['logged_in']['userid']);
//        $username = ($this->session->userdata['logged_in']['username']);

        $config = array(
                array(
                    'field'=>'old_pwd',
                    'label'=>'old_pwd',
                    'rules'=>'trim|required|xss_clean',
                    'errors'=>array(
                        'required'=>'请填写原密码',
                    ),
                ),
                array(
                    'field'=>'new_pwd',
                    'label'=>'new_pwd',
                    'rules'=>'trim|required|xss_clean',
                    'errors'=>array(
                        'required'=>'请填写新密码',
                    ),
                ),
                array(
                    'field'=>'new_pwd_affirm',
                    'label'=>'new_pwd_affirm',
                    'rules'=>'required|matches[new_pwd]',
                    'errors'=>array(
                        'required'=>'请填写确认密码',
                        'matches'=>'确认密码与原密码不匹配！',
                    ),
                ),
        );


        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/user_reset_pwd');
        }else{
//            $id = $this->input->post('userid');
//            $username = $this->input->post('username');
            $id = ($this->session->userdata['logged_in']['userid']);
            $username = ($this->session->userdata['logged_in']['username']);


            $old_pwd = $this->input->post('old_pwd');
            $new_pwd = $this->input->post('new_pwd');

            $result = $this->login_database->read_user_information($username);
            if($result->password == $old_pwd){
                $data = array(
                    'userid'=>$id,
                    'username'=>$username,
                    'password'=>$new_pwd
                );


                $this->login_database->update_user_information($id,$data);

                $this->logout();

            }else {
                $data = array(
                    'error_message'=>'原密码错误'
                );
                $this->load->view('admin/user_reset_pwd',$data);
                return false;
            }

        }
    }



}