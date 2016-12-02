<?php

class upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("sport_model");
    }

    public function index(){
        $this->sport_model->insert_test();

    }
}
?>