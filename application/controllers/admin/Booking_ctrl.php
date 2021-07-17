<?php 
class Booking_ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        // $this->load->database();
        // $this->load->model(array('Auth_model'));
    }

    public function index(){
        $data['title'] = $data['title'] = $this->config->item('project_title'). ' | dashboard';
        $data['header']  =$this->load->view('common/header',$data,true);
        $data['sidebar'] = $this->load->view('common/sidebar',$data,true);
        $data['footer']  =$this->load->view('common/footer',$data,true);
        $this->load->view('admin/booking',$data);
    }
}