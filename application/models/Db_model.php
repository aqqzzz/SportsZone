<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/11 0011
 * Time: 16:39
 */
class Db_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_data(){
        $query = $this->db->get('user');
        return $query->result();
    }

    public function update($id, $data){

        $query=$this->db->query("select * from user WHERE userid='".$id."'");
        echo "<br />";
        echo $query->num_rows();
        echo "<br />";
        $this->db->update('user',$data);
    }
}