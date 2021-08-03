<?php 
class Property_ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('User_model'));
    }

    public function index(){
        $data['title'] = $data['title'] = $this->config->item('project_title'). ' | Property';
        $data['header']  = $this->load->view('common/header',$data,true);
        $data['topbar']  = $this->load->view('common/topbar',$data,true);
        $data['sidebar'] = $this->load->view('common/sidebar',$data,true);
        $data['footer']  = $this->load->view('common/footer',$data,true);
        $this->load->view('property',$data);
    }
    
    function property_list(){
        $data['title'] = $data['title'] = $this->config->item('project_title'). ' | Property';
        $data['header']  = $this->load->view('common/header',$data,true);
        $data['topbar']  = $this->load->view('common/topbar',$data,true);
        $data['sidebar'] = $this->load->view('common/sidebar',$data,true);
        $data['footer']  = $this->load->view('common/footer',$data,true);
        $this->load->view('property',$data);
    }
    
    
    function create(){
        if($this->input->post('category') == 'plot'){
            $data['category'] = $this->input->post('category');
            $data['block'] = trim($this->input->post('block'));
            $data['facing'] = $this->input->post('facing');
            $data['area'] = trim($this->input->post('area'));
            $data['rate_plot'] = trim($this->input->post('rate_of_plot'));
            $data['corner'] = trim($this->input->post('corner'));
            $data['garden'] = trim($this->input->post('garden'));
            $data['maintenance'] = trim($this->input->post('maintenance'));
            $data['club_house'] = trim($this->input->post('club_house'));
            $data['transformer'] = trim($this->input->post('trans_elec'));
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('userid');
        } else {
            $data['category'] = $this->input->post('category');
            $data['block'] = trim($this->input->post('block'));
            $data['area'] = trim($this->input->post('area'));
            $data['rate_plot'] = trim($this->input->post('rate_of_plot'));
            $data['facing'] = $this->input->post('facing');
            $data['transformer'] = trim($this->input->post('trans_elec'));
            $data['maintenance'] = trim($this->input->post('maintenance'));
            $data['club_house'] = trim($this->input->post('club_house'));
            $data['area'] = trim($this->input->post('construction_area'));
            $data['property_type'] = $this->input->post('property_type');
            $data['corner'] = trim($this->input->post('corner'));
            $data['garden'] = trim($this->input->post('garden'));
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('userid');   
        }
        
        if($this->input->post('pid') != ''){
            $this->db->where('pid',$this->input->post('pid'));
            $this->db->update('properties',$data);
            
            echo json_encode(array('msg'=>'Properties updated successfully.','status'=>201));
            
        } else {
            if($this->db->insert('properties',$data)){
                echo json_encode(array('msg'=>'Properties submitted successfully.','status'=>200));
            } else {
                echo json_encode(array('msg'=>'Something wrong.','status'=>500));
            }
        }
    }
    
    
    function hold(){
        $pid = $this->input->post('pid');
        $status = $this->input->post('status');
        
        $this->db->where('pid',$pid);
        $this->db->update('properties',array('hold'=>$status));
        
        if($this->db->affected_rows()){
            echo json_encode(array('msg'=>'record updated successfully.','status'=>200));
        } else {
            echo json_encode(array('msg'=>'Record not updated.','status'=>500));
        }
    }
    
    function delete(){
        $pid = $this->input->post('pid');
        
        $this->db->where('pid',$pid);
        $this->db->update('properties',array('status'=>0));
        
        if($this->db->affected_rows()){
            echo json_encode(array('msg'=>'record deleted successfully.','status'=>200));
        } else {
            echo json_encode(array('msg'=>'something wrong.','status'=>500));
        }
    }
    
    
    function edit($propertyId){
        $this->db->select('*');
        $data['property_detail'] = $this->db->get_where('properties',array('pid'=>$propertyId,'status'=>1))->result_array();
        
        $data['title'] = $data['title'] = $this->config->item('project_title'). ' | Property Edit';
        $data['header']  = $this->load->view('common/header',$data,true);
        $data['topbar']  = $this->load->view('common/topbar',$data,true);
        $data['sidebar'] = $this->load->view('common/sidebar',$data,true);
        $data['footer']  = $this->load->view('common/footer',$data,true);
        $this->load->view('property',$data);
    }
    
    function property_detail(){
        $pid = $this->input->post('pid');
        
        $this->db->select('*');
        $result = $this->db->get_where('properties',array('pid'=>$pid))->result_array();
        if(count($result)>0){
            echo json_encode(array('data'=>$result,'status'=>200));
        } else {
            echo json_encode(array('status'=>500));
        }
    }
    
    function property_cancel_book(){
        $pid = $this->input->post('pid');
        
        $this->db->where('pid',$pid);
        $this->db->update('properties',array('is_booked'=>0));
        
        $this->db->where('property_id',$pid);
        $this->db->update('property_transections',array('status'=>0));
        
        echo json_encode(array('msg'=>'booking canceled.','status'=>200));
    }
}