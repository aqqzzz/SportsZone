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
        $this->load->model('activity_model');
        $this->load->model('parti_act_model');
        $this->load->model('login_database');
        $this->load->library('pagination');
    }

    public function index(){
        $this->load->view('activity/create_activity');
    }

    public function show_create_act(){
        $this->load->view('activity/create_activity');
    }

    private function do_upload(){
        $config['upload_path']      = './assets/images/portfolio/thumbnail/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';

//        echo $config['upload_path'];
//        die(var_dump(is_writable($config['upload_path'])));

        $this->load->library('upload',$config);
//        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('inputfile'))
        {
            $data['img'] = base_url().'assets/images/default-activity-pic.jpg';

        }
        else
        {
            $file_data = array('upload_data' => $this->upload->data());

            $data['img'] = base_url().'assets/images/portfolio/thumbnail/'.$file_data['upload_data']['file_name'];


        }
        return $data;

    }

    //发布活动
    public function create_activity(){

        $result = $this->do_upload();

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

            $this->form_validation->set_rules($config);




            if($this->form_validation->run()==false){
                $this->load->view('activity/create_activity');
            }else{

                $des_image = $result['img'];

                $authorid = $this->session->userdata['logged_in']['userid'];
                $activityname = $this->input->post('act-name');
                $type = $this->input->post('act-type');
                $stime = $this->input->post('start-time');
                $etime = $this->input->post('end-time');
                $bonus = $this->input->post('bonus');
                $description = $this->input->post('act-description');

                $type_data=array('单人PK'=>0,'多人竞赛'=>1,'小组活动'=>2);

                $insert_data = array(
                    'authorid'=>$authorid,
                    'activityname'=>$activityname,
                    'type'=>$type_data[$type],
                    'start_time'=>$stime,
                    'end_time'=>$etime,
                    'bonus'=>$bonus,
                    'description'=>$description,
                    'des_image'=>$des_image,
                );

                $activityid=$this->activity_model->insert($insert_data);

                $data['actInfo'] = $insert_data;
                $data['partiInfo'] = $this->parti_act_model->get_by_activity($activityid);

                $this->load->view('activity/single_activity',$data);
            }



    }

    public function check_digital($str){
        if(is_numeric($str)){
            return true;
        }else{
            $this->form_validation->set_message('check_digital','请再奖励域输入数字！');
            return false;
        }
    }

    //获取某一活动的详细信息
    public function get_single_act($id){
        $result = $this->activity_model->read_act_info($id);

        if($result!=false){
            $data['actInfo'] = array(
              'actid'=>$result->activityid,
                'activityname'=>$result->activityname,
                'authorid'=>$result->authorid,
                'type'=>$result->type,
                'start_time'=>$result->start_time,
                'end_time'=>$result->end_time,
                'bonus'=>$result->bonus,
                'description'=>$result->description,
                'des_image'=>$result->des_image
            );
            $data['partiInfo'] = $this->parti_act_model->get_by_activity($result->activityid);

            $this->load->view('activity/single_activity',$data);
        }
    }

    public function get_all_act($type=-1,$page_num=1){
        $per_page = 6;

        $data['actInfo'] = $this->activity_model->get_activities($type,$page_num,$per_page);
        if(empty($data['actInfo'])){
            echo "empty";
            return false;
        }

        $data['total_nums']=$this->page_seg($type);

        echo json_encode($data);
    }

    public function show_all_act($type=-1,$page_num=1){

//        $config = array();
//        $config["base_url"] = base_url()."activity/show_all_act";
//        $total_row = $this->activity_model->get_all_act($type)->num_rows();
//        $config['total_rows'] = $total_row;
//        $config['per_page'] = 6;
//        $config['use_page_numbers'] = TRUE;
//        $config['num_links'] = $total_row;
//        $config['cur_tag_open'] = '&nbsp;<a class="current">';
//        $config['cur_tag_close'] = '</a>';
//        $config['next_link'] = '&raquo;';
//        $config['prev_link'] = '&laquo;';
//
//        $this->pagination->initialize($config);
//        if($this->uri->segment(3)){
//            echo $this->uri->segment(3);
//            $page = ($this->uri->segment(3));
//        }else{
//            $page=1;
//        }
//        $data['actItem'] = $this->activity_model->get_activities($config["per_page"],$page,$type);
//        $str_links = $this->pagination->create_links();
//        $data['links'] = explode('&nbsp',$str_links);
//        $data['actType'] = $type;
//        $data['page_num'] = $this->page_seg($type);
        $per_page = 6;

        $data['actItem'] = $this->activity_model->get_activities($type,$page_num,$per_page);
        if(empty($data['actItem'])){
            return false;
        }
        $data['actType']=$type;
        $data['page_num'] = $this->page_seg($type);
        $data['current_page'] = $page_num;



        $this->load->view('activity/activity',$data);
    }

    public function page_seg($type=-1){
        $result_num = $this->activity_model->get_pages($type);
        $pages = ceil($result_num/6);

//        echo json_encode($pages);
        return $pages;
    }

    public function delete_act($activityid){
        $this->activity_model->delete($activityid);
        $this->parti_act_model->delete_by_act($activityid);

        $this->show_all_act();
    }

    //获取活动的全部参与者信息
    public function get_parti($activityid){
        $data = $this->parti_act_model->get_by_activity($activityid);

        return $data;
    }
    //退出活动
    public function exit_activity($userid,$activityid){
        $this->parti_act_model->delete($userid,$activityid);
        $this->show_all_act();
    }

    //参加活动
    public function parti_activity($userid,$activityid){
        $data = array(
            'participantid'=>$userid,
            'activityid'=>$activityid
        );
        $this->parti_act_model->insert($data);

        $this->get_single_act($activityid);
    }

    //获取某个用户参加的全部活动
    public function get_act_by_user($userid,$page,$per_page){
        $data['actInfo'] = $this->parti_act_model->get_by_user($userid,$page,$per_page);
        $data['total_nums']=ceil(count($data['actInfo'])/6);
        echo json_encode($data);
    }

    //获取某个用户创建的全部活动
    public function get_act_by_author($userid,$page,$per_page){
        $data['actInfo'] = $this->activity_model->get_act_by_author($userid,$page,$per_page);
        $data['total_nums']=ceil(count($data['actInfo'])/6);
        echo json_encode($data);
    }
}