<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model{

    function login($data){
        $logindata = $this->db->query("
            select * from user where (uname = '". $data['identity'] ."' OR email = '" .$data['identity']. "') AND active = 1 AND password = '".$data['password']."' AND status = 1
        ")->result_array();
        return $logindata;
    }
}