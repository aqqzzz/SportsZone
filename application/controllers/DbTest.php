<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/11 0011
 * Time: 16:36
 */
class Dbtest extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->load->model('db_model');
        $users = $this->db_model->get_data();
        foreach($users as $user){
            echo $user->username;

            $name = $user->username;
            $id = $user->userid;
            $password = $user->password;
            $avatar = $user->avatar;
            $sex = $user->sex;
            $city = $user->cityid;
        }

        $data = array(
            'username'=>'啊扣扣',
            'password'=>$password,
            'avatar'=>$avatar,
            'sex'=>$sex,
            'cityid'=>$city
        );

        $this->db_model->update($id,$data);
        $users = $this->db_model->get_data();
        foreach($users as $user){
            echo $user->username;
        }




    }

}