<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/12/1
 * Time: 16:01
 */

class Follow_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('follow',$data);
    }

    //获取该用户所有的关注列表
    public function get_all_following($userid){
        $result = $this->db->query("select user.* from follow,user where follow.userid=".$userid." and follow.followid=user.userid");
        if($result->num_rows()==0){
            return false;
        }else{
            return $result->result();
        }

    }

    //获取该用户所有的粉丝列表
    public function get_all_followers($userid){
        $result = $this->db->query("select user.* from follow,user where follow.followid=".$userid." and follow.userid=user.userid");
        if($result->num_rows()==0){
            return false;
        }else{
            return $result->result();
        }
    }

    public function delete($userid,$followid){
        return $this->db->delete('follow',array('userid'=>$userid,'followid'=>$followid));
    }
}