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
        $this->load->model("news_model");
    }

    public function index(){
        $this->load->view("community/community");
    }

    public function show_com_page($userid){
        $result =  $this->user_model->read_user_info_byid($userid);
        $data['userInfo']= $result;
        $result = $this->news_model->find_all();
        $data['newsInfo'] = $result;

        $this->load->view("community/community",$data);

    }


    /*----------------------------动态-------------------------*/

    //发布动态，数据库插入操作，应该用ajax调用，插入成功后直接在当前的动态列表中显示
    public function create_news($userid,$content){
        $time=time();
        $content = urldecode($content);

        $data = array(
            'authorid'=>$userid,
            'time'=>$time,
            'content'=>$content,
        );

        $result = $this->news_model->insert($data);
        if($result!=false){
            $data = $this->news_model->find($result);
            echo json_encode($data);
        }else{
            $data['error_message'] = "发布失败";
            echo json_encode($data);
        }

    }

    public function read_news_by_user($userid){
        $result = $this->news_model->find_by_user($userid);
        if($result){
            $data['newsInfo'] = array(
                'newsid'=>$result->newsid,
                'authorid'=>$result->authorid,
                'reltime'=>$result->reltime,
                'content'=>$result->content,
                'username'=>$result->username,
                'avatar'=>$result->avatar,
            );
            echo $data;
        }else{
            $data['null_news'] = "这里还没有动态";
            echo $data;
        }
    }

    //获取关注和粉丝的动态列表（社区显示）
    public function read_news_by_friend($userid){
        $result = $this->news_model->find_by_friend($userid);
        if($result){
            $data['newsInfo'] = array(
                'newsid'=>$result->newsid,
                'authorid'=>$result->authorid,
                'reltime'=>$result->reltime,
                'content'=>$result->content,
            );
            echo $data;
        }else{
            $data['null_news'] = "这里还没有动态";
            echo $data;
        }
    }
    //获取现在全部的动态，并按时间顺序排序（社区显示）
    public function read_all_news(){
        $result = $this->news_model->find_all();
        if($result){
            $data['newsInfo'] = array(
                'newsid'=>$result->newsid,
                'authorid'=>$result->authorid,
                'reltime'=>$result->reltime,
                'content'=>$result->content,
                'username'=>$result->username,
                'avatar'=>$result->avatar
            );
            echo $data;
        }else{
            $data['null_news'] = "这里还没有动态";
            echo $data;
        }
    }
}