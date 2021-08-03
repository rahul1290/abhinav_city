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
    
    function property_list(){
        
        $pro_type = $this->input->post('pro_type');
        $pro_facing = $this->input->post('pro_facing');
        $pro_booking = $this->input->post('pro_booking');
        $pro_hold = $this->input->post('pro_hold');
        $pro_block = $this->input->post('pro_block');
        
        $this->db->select('p.*, (select count(e.eid) from enquiry e where e.property_id = p.pid) as enquiry');
        if($pro_type != ''){
            $this->db->where('p.category',$pro_type);
        }
        if($pro_facing != ''){
            $this->db->where('p.facing',$pro_facing);
        }
        if($pro_booking != ''){
            $this->db->where('p.is_booked',$pro_booking);
        }
        if($pro_hold != ''){
            $this->db->where('p.hold',$pro_hold);
        }
        
        if($pro_block != ''){
            $this->db->like('p.block',$pro_block,'both');
        }
        $result = $this->db->get_where('properties p',array('p.status'=>1))->result_array();
      
        if(count($result)>0){
            echo json_encode(array('data'=>$result,'msg'=>'property list','status'=>200));
        } else {
            echo json_encode(array('data'=>$result,'msg'=>'property noy found.','status'=>200));
        }
    }
}