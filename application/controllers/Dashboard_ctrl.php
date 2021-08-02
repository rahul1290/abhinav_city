<?php 
class Dashboard_ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        $this->db->select('p.*, (select count(e.eid) from enquiry e where e.property_id = p.pid) as enquiry');
        $data['property_list'] = $this->db->get_where('properties p',array('p.status'=>1))->result_array();
        
        $data['title'] = $data['title'] = $this->config->item('project_title'). ' | dashboard';
        $data['header']  =$this->load->view('common/header',$data,true);
        $data['topbar']  =$this->load->view('common/topbar',$data,true);
        $data['sidebar'] = $this->load->view('common/sidebar',$data,true);
        $data['footer']  =$this->load->view('common/footer',$data,true);
        $this->load->view('dashboard',$data);
    }
    
    function json_test(){
        print_r($this->input->post());
    }
}