<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

    function list(){
        $this->db->select('*');
        $this->db->where('status = 2');
        $this->db->or_where("status = '1'", NULL, FALSE);
        $result = $this->db->get('user')->result_array();
        return $result;
    }

    function create($data){
        $this->db->insert('user',$data);
        
        $permission_array = array();
        if($data['user_type'] == 'super_admin'){
            $permission_array['user_id'] = $this->db->insert_id();
            $permission_array['booking'] = 1;
            $permission_array['plot_entry'] = 1;
            $permission_array['user_entry'] = 1;
        }
        else if($data['user_type'] == 'super_admin'){
            $permission_array['user_id'] = $this->db->insert_id();
            $permission_array['booking'] = 1;
            $permission_array['plot_entry'] = 1;
            $permission_array['user_entry'] = 1;
        } else {
            $permission_array['user_id'] = $this->db->insert_id();
            $permission_array['booking'] = 1;
            $permission_array['plot_entry'] = 0;
            $permission_array['user_entry'] = 0;
        }
        $this->db->insert('user_permission',$permission_array);
        return true;
    }

    function update($uid,$data){
        $this->db->where('id',$uid);
        $this->db->update('user',$data);
        return true;
    }

    function userdetail($user_id){
        $this->db->select('*');
        $result = $this->db->get_where('user',array('id'=>$user_id))->result_array();
        return $result;
    }
    
    function permissions(){
        $this->db->select('*');
        $result = $this->db->get_where('user_permission',array('status'=>1))->result_array();
        return $result;
    }
}