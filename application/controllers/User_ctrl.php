<?php 
class User_ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('User_model'));
        
        if(!$this->is_login()){
            redirect('/','refresh');
            die;
        }
    }
    
    function is_login(){
        if($this->session->has_userdata('userid')){
            return true;
        } else {
            return false;
        }
    }
    
    public function index(){
        $data['title'] = $data['title'] = $this->config->item('project_title'). ' | Users';
        
        $data['users'] = $this->User_model->list();
        $data['user_permission'] = $this->User_model->permissions();
        
        $user_with_permission = array();
        foreach($data['users'] as $user){
            $temp = $user;
            foreach($data['user_permission'] as $permission){
                if($user['id'] == $permission['user_Id']){
                    $temp['permission']['booking'] = $permission['booking'];
                    $temp['permission']['plot_entry'] = $permission['plot_entry'];
                    $temp['permission']['user_entry'] = $permission['user_entry'];
                }
            }
            $user_with_permission[] = $temp;
        }
        $data['users'] = $user_with_permission;
        $data['header']  =$this->load->view('common/header',$data,true);
        $data['topbar']  =$this->load->view('common/topbar',$data,true);
        $data['sidebar'] = $this->load->view('common/sidebar',$data,true);
        $data['footer']  =$this->load->view('common/footer',$data,true);
        $this->load->view('users',$data);
    }

    function create(){
        $data['uname'] = $this->input->post('fname').'_'.rand(1,100);
        $data['email'] = $this->input->post('email');
        $data['contact_no'] = $this->input->post('contact');
        $data['fname'] = $this->input->post('fname');
        $data['lname'] = $this->input->post('lname');
        $data['password'] = '123';
        $data['created_by'] = $this->session->userdata('userid');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['user_type'] = $this->input->post('role');

        $result = $this->User_model->create($data);
        if($result){
            echo json_encode(array('msg'=>'user created','status'=>200));
        } else {
            echo json_encode(array('msg'=>'something error','status'=>500));
        }
    }

    function update(){
        $uid = $this->input->post('user_id');
        $data['uname'] = $this->input->post('fname').'_'.rand(1,100);
        $data['email'] = $this->input->post('email');
        $data['contact_no'] = $this->input->post('contact');
        $data['fname'] = $this->input->post('fname');
        $data['lname'] = $this->input->post('lname');
        $data['password'] = '123';
        $data['created_by'] = $this->session->userdata('userid');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['user_type'] = $this->input->post('role');
        $data['status'] = $this->input->post('status');

        $result = $this->User_model->update($uid,$data);
        if($result){
            echo json_encode(array('msg'=>'user update','status'=>200));
        } else {
            echo json_encode(array('msg'=>'something error','status'=>500));
        }
    }

    function delete(){
        $uid = $this->input->post('user_id');
        $this->db->where('id',$uid);
        $this->db->update('user',array('status'=>0));

        echo json_encode(array('msg'=>'User deleted.','status'=>200));
    }

    function active(){
        $data['user_id'] = $this->input->post('user_id');
        $data['status'] = $this->input->post('status');

        if($data['status'] == 'true'){
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }

        $this->db->where('id',$data['user_id']);
        $this->db->update('user',array('active'=>$data['status']));

        if($data['status'] == 0){
            echo json_encode(array('msg'=>'user deactivate','status'=>200)); 
        } else {
            echo json_encode(array('msg'=>'user activate','status'=>200));
        }
    }

    function userdetail(){
        $user_id = $this->input->post('user_id');

        $result = $this->User_model->userdetail($user_id);
        if(count($result)>0){
            echo json_encode(array('data'=>$result,'status'=>200));
        } else {
            echo json_encode(array('status'=>500));
        }
    }
    
    function permission(){
        $user_id = $this->input->post('user_id');
        $peprmission = $this->input->post('permission');
        $status = $this->input->post('status');
        
        
        $this->db->select('*');
        $result = $this->db->get_where('user_permission',array('user_Id'=>$user_id,'status'=>1))->result_array();
        
        if(count($result)>0){
            $this->db->where('user_Id',$user_id);
            $this->db->update('user_permission',array($peprmission => $status));
        } else {
            $this->db->insert('user_permission',array('user_Id'=>$user_id,$peprmission => $status));
        }
        print_r($this->db->last_query()); die;
    }
}