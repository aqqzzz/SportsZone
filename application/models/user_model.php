<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/12 0012
 * Time: 20:35
 */
class User_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //登录model，需要验证用户名密码
    public function login($data){
        $query = $this->db->query('SELECT * FROM user where username="'.$data['username'].
            '" AND password="'.$data['password'].'"');

        if($query->num_rows()==1){
            return true;
        }else{
            return false;
        }
    }

    //读取用户信息
    public function read_user_information($username){
        $username = urldecode($username);
        $query = $this->db->query('SELECT * FROM user WHERE username="'.$username.'"');


        if($query->num_rows()==1){
            $row = $query->row();
            return $row;
        }else{
            return false;
        }
    }

    //读取用户信息byid
    public function read_user_info_byid($userid){
        $query = $this->db->query('SELECT * FROM user WHERE userid="'.$userid.'"');


        if($query->num_rows()==1){
            $row = $query->row();
            return $row;
        }else{
            return false;
        }
    }



    //注册插入用户信息（注意查重）
    public function registration_insert($data){
        $query = $this->db->query('SELECT * FROM user WHERE username="'.$data['username'].'"');
        if($query->num_rows()==0){
            $insert_data = array(
                'username'=>$data['username'],
                'password'=>$data['password'],
                'avatar'=>$data['avatar']
            );
            return $result = $this->db->insert('user',$insert_data);
        }
    }

    //更新用户信息
    public function update_user_information($userid,$data)
    {
        $query = $this->db->where('userid',$userid);
        $query = $this->db->query('SELECT * FROM user WHERE username="'.$data['username'].'" and userid <> "'.$userid.'"');
        if($query->num_rows()==0) {
            return $this->db->update('user', $data);
        }
//        return $this->db->replace('user', $data);
    }
}