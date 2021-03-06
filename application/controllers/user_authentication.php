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

        $this->load->model('user_model');
        $this->load->model('follow_model');

        $this->load->model('news_model');

        $this->load->model('sport_model');

    }

    public function index(){
        $this->load->view('login/login_form');
    }

    //加载注册的界面
    public function show_registration(){
        $this->load->view('login/registration_form');
    }

    //用户名验证规则
    public function check_username($str){
        $pattern="/^[\x{4E00}-\x{9FA5}A-Za-z0-9]+$/u";
        if(preg_match($pattern,$str)){
            return true;
        }else{
            $this->form_validation->set_message('check_username','<i class="fa fa-exclamation-triangle"></i>用户名中只能包含汉字、英文和数字');
            return false;
        }

    }

    //处理注册过程的逻辑
    public function register_process(){

        $config = array(
          array(
              'field'=>'username',
              'label'=>'Username',
              'rules'=>'required|callback_check_username',
              'errors'=>array(
                  'required'=>'<i class="fa fa-exclamation-triangle"></i>用户名不能为空'
              ),
          ),
          array(
              'field'=>'password',
              'label'=>'Password',
              'rules'=>'trim|required|xss_clean',
              'errors'=>array(
                  'required'=>'<i class="fa fa-exclamation-triangle"></i>密码不能为空'
              ),
          )
        );

        $this->form_validation->set_rules($config);
        if($this->form_validation->run()==FALSE){
            $this->load->view('login/registration_form');
        }else{
            $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'),
                'avatar'=>base_url()."assets/images/users/6.jpg"
            );
            $result = $this->user_model->registration_insert($data);
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
//        $this->session->unset_userdata['logged_in'];

        $config = array(
            array(
                'field'=>'username',
                'label'=>'Username',
                'rules'=>'required|callback_check_username',
                'errors'=>array(
                    'required'=>'<i class="fa fa-exclamation-triangle"></i>用户名不能为空'
                ),
            ),
            array(
                'field'=>'password',
                'label'=>'Password',
                'rules'=>'trim|required|xss_clean',
                'errors'=>array(
                    'required'=>'<i class="fa fa-exclamation-triangle"></i>密码不能为空'
                ),
            )
        );

        $this->form_validation->set_rules($config);
       // $this->form_validation->set_rules('username','Username','neccessary_input_check');
        //$this->form_validation->set_rules('password','Password','neccessary_input_check');

        if($this->form_validation->run() == FALSE) {

            if (isset($this->session->userdata['logged_in'])) {
                $userid = $this->session->userdata['logged_in']['userid'];
                $data['userInfo']=$this->session->userdata['logged_in'];

                $result = $this->news_model->find_by_user($userid);
                if($result){
                    $i=0;
                    foreach ($result as $item){
                        $data['newsInfo'][$i] = array(
                            'newsid'=>$item->newsid,
                            'authorid'=>$item->authorid,
                            'reltime'=>$item->reltime,
                            'content'=>$item->content,
                        );
                        $i = $i+1;
                    }

                }else{
                    $data['null_news'] = "这里还没有动态";
                }

                //周运动数据
                $user_week_sport = $this->sport_model->find_week_info($userid);
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
                    'days'=>$week_days,
                    'distance'=>$week_distance,
                    'calories'=>round($week_calories/1000,2)
                );

                $this->load->view('admin/admin_page',$data);
            }else {
                $this->load->view('login/login_form');
            }
        }else {
            $data = array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password')
            );

            $result = $this->user_model->login($data);

            if($result==TRUE){
                $username = $this->input->post('username');
                $result = $this->user_model->read_user_information($username);

                    $data = array(
                        'userid'=>$result->userid,
                        'username'=>$result->username,
                        'avatar'=>$result->avatar,
                        'sex'=>$result->sex,
                        'cityid'=>$result->cityid
                    );

                $result = $this->news_model->find_by_user($result->userid);
                if($result){
                    $i=0;
                    foreach ($result as $item){
                        $data['newsInfo'][$i] = array(
                            'newsid'=>$item->newsid,
                            'authorid'=>$item->authorid,
                            'reltime'=>$item->reltime,
                            'content'=>$item->content,
                        );
                        $i = $i+1;
                    }

                }else{
                    $data['null_news'] = "这里还没有动态";
                }

                //周运动数据
                $user_week_sport = $this->sport_model->find_week_info($data['userid']);
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
                    'days'=>$week_days,
                    'distance'=>$week_distance,
                    'calories'=>round($week_calories/1000,2)
                );

                $this->session->set_userdata('logged_in',$data);
                $data['userInfo'] = $this->session->userdata['logged_in'];

                if($data['userid']==0){
                    redirect("activity/show_admin_page/-1/1/6");
                }

                $this->load->view('admin/admin_page',$data);


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

        $result = $this->user_model->read_user_information($username);

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

    //加载个人界面（本人或其他人）
    public function show_admin_page($userid,$username){

        $sessionid = $this->session->userdata['logged_in']['userid'];
        if($userid==$sessionid){
            $data['userInfo'] = $this->session->userdata['logged_in'];

        }else{
            $result = $this->user_model->read_user_information($username);
            $data['userInfo'] = array(
                'userid'=>$result->userid,
                'username'=>$result->username,
                'avatar'=>$result->avatar,
                'sex'=>$result->sex,
                'cityid'=>$result->cityid
            );

        }
        $result = $this->news_model->find_by_user($userid);
        if($result){
            $i=0;
            foreach ($result as $item){
                $data['newsInfo'][$i] = array(
                    'newsid'=>$item->newsid,
                    'authorid'=>$item->authorid,
                    'reltime'=>$item->reltime,
                    'content'=>$item->content,
                );
                $i = $i+1;
            }
        }else{
            $data['null_news'] = "这里还没有动态";
        }

        //周运动数据
        $user_week_sport = $this->sport_model->find_week_info($userid);
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
            'days'=>$week_days,
            'distance'=>$week_distance,
            'calories'=>round($week_calories/1000,2)
        );

        $this->load->view('admin/admin_page',$data);
    }


    public function user_info_get($userid,$username){

        $result = $this->user_model->read_user_information($username);

        if($result!=false){
            $data = array(
                'userid'=>$result->userid,
                'username'=>$result->username,
                'avatar'=>$result->avatar,
                'sex'=>$result->sex,
                'cityid'=>$result->cityid
            );

            if($userid==$result->userid){
                $this->session->set_userdata('logged_in',$data);
            }

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

        $updateSuccess=$this->user_model->update_user_information($id,$data);
        if($updateSuccess==FALSE){
            echo "update falied";
        }else if($updateSuccess==TRUE){

            $username=$this->input->post('username');

            $result = $this->user_model->read_user_information($username);

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

            $result = $this->user_model->read_user_information($username);
            if($result->password == $old_pwd){
                $data = array(
                    'userid'=>$id,
                    'username'=>$username,
                    'password'=>$new_pwd
                );


                $this->user_model->update_user_information($id,$data);

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


    /*---------------------关注---------------------*/
    //关注用户 操作用户，被关注用户
    public function follow($userid, $followid){
        $data = array(
            'userid'=>$userid,
            'followid'=>$followid
        );
        $follow = $this->follow_model->insert($data);
        if($follow!=false){
            echo 1;
        }else{
            echo 0;
        }
    }

    //取关
    public function unfollow($userid, $unfollowid){
        $result = $this->follow_model->delete($userid,$unfollowid);

        if($result!=false) {
            echo 1;
        }else{
            echo 0;
        }
    }

    //加载关注列表界面
    public function show_follow_page($userid,$type){
        $user = $this->user_model->read_user_info_byid($userid);
        if($type==0){
            $result = $this->follow_model->get_all_following($userid);
            if($result==false){
                $data['null_message'] = "你还没有关注别人，去社区看看吧";
            }else{
                $data['following']=$result;

            }
        }else{
            $result = $this->follow_model->get_all_followers($userid);
            if($result==false){
                $data['null_message'] = "你还没有粉丝";
            }else{
                $data['followers']=$result;
            }
        }

        $data['userInfo']=array(
            'userid'=>$user->userid,
            'username'=>$user->username,
            'avatar'=>$user->avatar,
            'sex'=>$user->sex,
            'cityid'=>$user->cityid
        );
        $this->load->view("user/user_follow",$data);
    }

    //获取关注列表
    public function get_all_followings($userid){
        $result = $this->follow_model->get_all_following($userid);
        if($result==false){
            $data['null_message'] = "你还没有关注别人，去社区看看吧";
        }else{
            $data['following']=$result;
            $data['null_message']=null;
        }

        echo json_encode($data);

    }

    public function is_following($userid,$followingid){
        $result = $this->follow_model->get_all_following($userid);
        $is_following = 0;
        if($result==false){
            echo 0;
        }else{

            foreach($result as $item){
                if(($item->followid)==$followingid){
                    $is_following=1;

                }
            }
            echo $is_following;
        }

    }

    //获取粉丝列表
    public function get_all_followers($userid){
        $result = $this->follow_model->get_all_followers($userid);
        if($result==false){
            $data['null_message'] = "你还没有粉丝";
        }else{
            $data['followers']=$result;
        }

        echo json_encode($data);

    }

}