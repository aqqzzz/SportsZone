<?php

class upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('test/upload_form', array('error' => ' ' ));
    }

    public function do_upload()
    {
        $config['upload_path']      = './assets/images/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

//        echo $config['upload_path'];
//        die(var_dump(is_writable($config['upload_path'])));

        $this->load->library('upload',$config);
//        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('test/upload_form', $error);
        }
        else
        {
            $file_data = array('upload_data' => $this->upload->data());

            $data['img'] = base_url().'assets/images/'.$file_data['upload_data']['file_name'];

            $this->load->view('test/upload_success', $data);
        }
    }
}
?>