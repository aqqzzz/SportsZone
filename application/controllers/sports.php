<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/11/30
 * Time: 1:31
 */

class Sports extends CI_Controller {
    public function __construct(){
        parent::__construct();

    }

    public function index(){
        $this->load->view('sports/statistics');
    }
}