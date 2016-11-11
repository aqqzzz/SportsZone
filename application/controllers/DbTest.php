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
        $this->load->model('Db_model');
        $news = $this->Db_model->get_data();
        $data['users'] = $news;
        $this->load->view('show',$data);
    }
}