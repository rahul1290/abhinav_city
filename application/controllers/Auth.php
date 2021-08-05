<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Auth_model'=>'auth'));
    }
	
	function index(){
	    if($this->is_login()){
	        $this->session->userdata('role');
	        redirect('dashboard');
	        die;
	    }
		$data['title'] = $this->config->item('project_title');
		$this->load->view('login',$data);
	}
	
	
	function is_login(){
	    if($this->session->has_userdata('userid')){
	        return true;
	    } else {
	        return false;
	    }
	}
	
	function login(){
	    if($this->is_login()){
	        $this->session->userdata('role');
	        redirect('dashboard');
	        die;
	    }
	    $this->form_validation->set_rules('identity', 'identity', 'required|trim');
	    $this->form_validation->set_rules('password', 'password', 'required|trim');
	    $this->form_validation->set_error_delimiters('<span class="custom_error text-danger text-center">', '</span>');
	    if ($this->form_validation->run() == FALSE){
	        $this->session->set_flashdata('msg', 'Please try again.');
	        echo "error";
	    }
	    else {
	        $data['identity'] = $this->input->post('identity');
	        $data['password'] = $this->input->post('password');
	        $result = $this->auth->login($data);
	        if(count($result)>0){
	            
	            $this->db->select('*');
	            $permission_data = $this->db->get_where('user_permission',array('user_id'=>$result[0]['id'],'status'=>1))->result_array();
	            $newdata = array(
	                'userid' => $result[0]['id'],
	                'fname'  => $result[0]['fname'],
	                'lname'  => $result[0]['lname'],
	                'role'   => $result[0]['user_type'],
	                'uname' => $result[0]['uname'],
	                'email' => $result[0]['email'],
	                'permission' => $permission_data[0]
	            );
	            $this->session->set_userdata($newdata);
	            $this->session->set_flashdata('msg', '<span class="text-success">Login successfully.</span>');
	            if($this->session->userdata('role') == 'super_admin'){
	               redirect('/users');
	            }
	            else if($this->session->userdata('role') == 'admin'){
	                redirect('/users');
	            } else {
	                redirect('/booking');
	            }
	        } else {
	            $this->session->set_flashdata('msg', '<span class="text-danger">Please try again.</span>');
	            redirect('/');
	        }
	    }
	}
	
	function profile(){
	    $data['title'] = $data['title'] = $this->config->item('project_title'). ' | Profile';
	    
	    $this->db->select('*');
	    $data['userDetail'] = $this->db->get_where('user',array('id'=>$this->session->userdata('userid'),'status'=>1))->result_array();
	    
	    $data['header']  = $this->load->view('common/header',$data,true);
	    $data['topbar']  = $this->load->view('common/topbar',$data,true);
	    $data['sidebar'] = $this->load->view('common/sidebar',$data,true);
	    $data['footer']  = $this->load->view('common/footer',$data,true);
	    $this->load->view('profile',$data);
	}
	
	function profile_update(){
	    $data['fname'] = $this->input->post('fname');
	    $data['lname'] = $this->input->post('lname');
	    $data['email'] = $this->input->post('email');
	    $data['contact_no'] = $this->input->post('contact_no');
	    
	    $this->db->where('id',$this->session->userdata('userid'));
	    $this->db->update('user',$data);
	    
	    echo json_encode(array('status'=>200));
	}
	
	function change_password(){
	    $data['currpassword'] = trim($this->input->post('currpassword'));
	    $data['newpassword'] = trim($this->input->post('newpassword'));
	    
	    $this->db->select('*');
	    $result = $this->db->get_where('user',array(
	        'id'=>$this->session->userdata('userid'),
	        'password'=>$data['currpassword'],
	        'status'=>1))->result_array();
	   
	    if(count($result)>0){
	        $this->db->where('id',$this->session->userdata('userid'));
	        $this->db->update('user',array('password'=>$data['newpassword']));
	        
	        echo json_encode(array('msg'=>'password changed.','status'=>200));
	    } else {
	        echo json_encode(array('msg'=>'password not matched.','status'=>500));
	    }
	}
	
	function logout(){
	    $this->session->sess_destroy();
	    $this->session->set_flashdata('msg', '<span class="text-info">Logout successfully.</span>');
	    redirect('/');
	}
}
