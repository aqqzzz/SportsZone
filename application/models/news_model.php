<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/12/2
 * Time: 10:09
 */

class News_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
//        $result = $this->news_model->set($data);

        $result=$this->db->insert('news',$data);
        if($result!=false){
            $insertid = $this->db->insert_id();
            return $insertid;
        }else{

            return false;
        }

    }

    public function delete($newsid){
        $result = $this->delete('news',array('newsid'=>$newsid));
        return $result;
    }

    public function find($newsid){
        $result = $this->db->query("select news.newsid, news.authorid, news.content, datetime(news.time,'unixepoch','localtime') as reltime,user.username, user.avatar
          from news,user
          where newsid=".$newsid." and user.userid=news.authorid");
        if($result->num_rows()!=0)
        return $result;
    }

    //查找某用户的所有动态
    public function find_by_user($userid){
        $query = $this->db->query("select news.newsid, news.authorid, news.content, datetime(news.time,'unixepoch','localtime') as reltime from news where authorid=".$userid." order by reltime desc");
        if($query->num_rows()!=0){
            return $query->result();
        }else{
            return false;
        }
    }

    //查找某用户所有好友（关注或粉丝，包括自己）的动态
    public function find_by_friend($userid){
        $result = $this->db->query(
            "select DISTINCT news.newsid, news.authorid, news.content, datetime(news.time,'unixepoch','localtime') as reltime, user.username, user.avatar from news,follow,user where user.userid=news.authorid and (follow.userid=".$userid." and follow.followid=news.authorid) 
            or (follow.followid=".$userid." and follow.userid=news.authorid) or news.authorid=".$userid.")
             order by time DESC");

        if($result->num_rows()!=0){
            return $result->result();
        }else{
            return false;
        }

    }

    //查找所有动态
    public function find_all(){
        $result = $this->db->query("select news.newsid, news.authorid, news.content, datetime(news.time,'unixepoch','localtime')as reltime, user.username, user.avatar from news, user where user.userid=news.authorid order by time DESC ");
        if($result->num_rows()!=0){
            return $result->result();
        }else{
            return false;
        }
    }
}