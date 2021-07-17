<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
        parent::__construct();
        // $this->load->database();
        // $this->load->model(array('Auth_model'));
    }
	
	public function index(){
		$data['title'] = $this->config->item('project_title');
		$this->load->view('login',$data);
	}
}
