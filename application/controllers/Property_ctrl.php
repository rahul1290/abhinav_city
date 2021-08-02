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
        print_r($this->input->post()); die;
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('block', 'Block', 'required|trim');
        $this->form_validation->set_rules('area', 'Area', 'required|trim');
        $this->form_validation->set_rules('facing', 'Facing', 'required|trim');
        $this->form_validation->set_rules('premium', 'Premium', 'trim');
        $this->form_validation->set_rules('trans_elec', 'trans elec', 'trim');
        $this->form_validation->set_rules('maintenance', 'Maintenance', 'trim');
        $this->form_validation->set_rules('club_house', 'Club house', 'trim');
        $this->form_validation->set_rules('amenities', 'Amenities', 'trim');
        $this->form_validation->set_rules('rate_of_plot', 'Rate of plot', 'trim');
        $this->form_validation->set_rules('plot_grand_total', 'Plot grand total', 'trim');
        $this->form_validation->set_rules('cost_of_land_premium', 'Cost of land premium', 'trim');
        $this->form_validation->set_rules('construction_area', 'Construction area', 'trim');
        $this->form_validation->set_rules('2BHKduplex', 'Construction area', 'trim');
        $this->form_validation->set_rules('2BHKgrand_total', '2BHK total', 'trim');
        $this->form_validation->set_rules('3BHKduplex', '3BHKduplex', 'trim');
        $this->form_validation->set_rules('3BHKgrand_total', '3BHK grand total', 'trim');
        $this->form_validation->set_rules('bank_rate', 'Bank rate', 'trim');
        $this->form_validation->set_rules('vicinity', 'Vicinity', 'trim');
        
        
        
        $this->form_validation->set_error_delimiters('<span class="custom_error text-danger text-center">', '</span>');
        if ($this->form_validation->run() == FALSE){
             $this->index();
        } else {
            $data['category'] = $this->input->post('category');
            $data['block'] = $this->input->post('block');
            $data['area'] = $this->input->post('area');
            $data['facing'] = $this->input->post('facing');
            $data['premium'] = $this->input->post('premium');
            $data['transformer'] = $this->input->post('trans_elec');
            $data['electricity'] = $this->input->post('electricity');
            $data['maintenance'] = $this->input->post('maintenance');
            $data['club_house'] = $this->input->post('club_house');
            $data['rate_plot'] = $this->input->post('rate_of_plot');
            $data['land_premium'] = $this->input->post('cost_of_land_premium');
            $data['construction_area'] = $this->input->post('construction_area');
            $data['2bhk_duplex'] = $this->input->post('2BHKduplex');
            $data['2bhk_duplex_grand_total'] = $this->input->post('2BHKgrand_total');
            $data['3bhk_duplex'] = $this->input->post('3BHKduplex');
            $data['3bhk_duplex_grand_total'] = $this->input->post('3BHKgrand_total');
            $data['bank_rate'] = $this->input->post('bank_rate');
            $data['vicinity'] = $this->input->post('vicinity');
            $data['corner'] = $this->input->post('corner');
            $data['garden'] = $this->input->post('garden');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->userdata('userid');
            
            
            if($this->db->insert('properties',$data)){
                $this->session->set_flashdata('msg', '<p class="bg-success p-2 text-light text-center">Entry submitted Successfully.</p>');
            } else {
                $this->session->set_flashdata('msg', '<p class="bg-danger p-2 text-light text-center">Something went wrong.</p>');
            }
            
            redirect('property','refresh');
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
}