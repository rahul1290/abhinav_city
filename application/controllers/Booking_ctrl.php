<?php 
class Booking_ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Auth_model'));
    }

    function index(){
        $this->db->select('*');
        $data['properties'] = $this->db->get_where('properties',array('status'=>1))->result_array();
        
        $data['title'] = $data['title'] = $this->config->item('project_title'). ' | Booking';
        $data['header']  =$this->load->view('common/header',$data,true);
        $data['topbar']  = $this->load->view('common/topbar',$data,true);
        $data['sidebar'] = $this->load->view('common/sidebar',$data,true);
        $data['footer']  =$this->load->view('common/footer',$data,true);
        $this->load->view('booking',$data);
    }
    
    function get_property_detail(){
        $data['category'] = $this->input->post('category');
        $data['str'] =  $this->input->post('search_text');
        
        $this->db->select('*');
        $result = $this->db->get_where('properties',array('category'=>$data['category'],'block'=>$data['str'],'status'=>1))->result_array();
        
        if(count($result)>0){
            echo json_encode(array('data'=>$result,'status'=>200));
        } else {
            echo json_encode(array('msg'=>'no record found.','status'=>500));
        }
    }
    
    
    function booking(){
        $data['property_id'] = $this->input->post('pid');
        $data['name'] = $this->input->post('name');
        $data['father_name']= $this->input->post('father');
        $data['contact_no'] = $this->input->post('mobile_no');
        $data['address'] = $this->input->post('address');
        $data['wife_name'] = $this->input->post('wife_name');
        $data['wife_contact'] = $this->input->post('wife_contact');
        $data['family_member'] = $this->input->post('family_members');
        $data['email'] = $this->input->post('emailid');
        $data['pan'] = $this->input->post('pan');
        $data['adhaar'] = $this->input->post('adhaar');
        $data['created_by'] = $this->session->userdata('userid');
        $data['created_at'] = date('d-m-Y H:i:s');
       
        if($this->db->insert('property_transections',$data)){
            $this->db->where('pid',$data['property_id']);
            $this->db->update('properties',array('is_booked'=>1));
            
            echo json_encode(array('msg'=>'success','status'=>200));
        } else {
            echo json_encode(array('msg'=>'failed','status'=>500));
        }
    }
    
    function booking_detail(){
        $pid = $this->input->post('pid');
        
        $this->db->select('pt.*,p.*');
        $this->db->join('properties p','p.pid = pt.property_id');
        $result = $this->db->get_where('property_transections pt',array('pt.property_id'=>$pid,'pt.status'=>1))->result_array();
        
        if(count($result)>0){
            echo json_encode(array('data'=>$result,'status'=>200));
        } else {
            echo json_encode(array('status'=>500));
        }
    }
    
    function category_wise_block(){
        $category = $this->input->post('category');
        
        $this->db->select('*');
        $result = $this->db->get_where('properties',array('category'=>$category,'hold'=>0,'status'=>1))->result_array();
        
        if(count($result)>0){
            echo json_encode(array('data'=>$result,'status'=>200));
        } else {
            echo json_encode(array('status'=>500));
        }
    }
    
    function name_wise_search(){
        $category = $this->input->post('category');
        $str  = $this->input->post('search_str');
        
        
        $this->db->select('*');
        $this->db->like('block',$str,'both');
        $result = $this->db->get_where('properties',array('category'=>$category,'hold'=>0,'is_booked'=>0,'status'=>1))->result_array();
        
        if(count($result)>0){
            echo json_encode(array('data'=>$result,'status'=>200));
        } else {
            echo json_encode(array('status'=>500));
        }
    }
    
    function enquiry(){
        $data['property_id'] = $this->input->post('plot_id');
        $data['client_name'] = trim($this->input->post('client_name'));
        $data['client_number'] = trim($this->input->post('client_contact'));
        $data['discount'] = trim($this->input->post('client_discount'));
        $data['remark'] = trim($this->input->post('client_remark'));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->session->userdata('userid');
     
        if($this->db->insert('enquiry',$data)){
            echo json_encode(array('msg'=>'enquiry submitted successfully.','status'=>200));
        } else {
            echo json_encode(array('msg'=>'enquiry not submitted.','status'=>500));
        }
    }
    
    
    function enquiery_detail(){
        $pid = $this->input->post('pid');
        
        $this->db->select('e.*,p.*');
        $this->db->join('properties p','p.pid = e.property_id AND p.status = 1');
        $result = $this->db->get_where('enquiry e',array('p.pid'=>$pid,'p.status'=>1))->result_array();
        
        echo json_encode(array('data'=>$result,'status'=>200));
    }
    
}