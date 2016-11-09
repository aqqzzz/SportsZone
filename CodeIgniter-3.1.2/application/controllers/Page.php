<?php
/**
 * Created by PhpStorm.
 * User: 张文玘
 * Date: 2016/11/8
 * Time: 23:14
 */
class Page extends CI_Controller {

    public function view($page='home'){
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        $data['title'] = ucfirst($page);

        $this->load->view('templates/header',$data);
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer',$data);
    }
}