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
    }

    public function index(){
        $this->load->view("community/community");
    }
}