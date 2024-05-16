<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        
        $this->module_url_path    =  base_url().$this->config->item('user_panel_slug')."/login";
		$this->module_url_path_dashboard    =  base_url().$this->config->item('user_panel_slug')."/dashboard";
        $this->module_title       = "Login";
        $this->module_url_slug    = "login";
        $this->module_view_folder = "login/";
	}

    public function index()
    {   
        if($this->input->post('submit'))
        {
            // $this->form_validation->set_rules('email_login', 'Email Login', 'required');
            $this->form_validation->set_rules('mobile_number1', 'Mobile Number', 'required');
            $this->form_validation->set_rules('pass_login', 'Password Login', 'required');
 
            if($this->form_validation->run() == TRUE)
            {
                // $Email_login = $this->input->post('email_login');
                $mobile_number1 = $this->input->post('mobile_number1');
                $Pass_login = $this->input->post('pass_login');   
                
            //   $this->db->where('email',$Email_login);
              $this->db->where('mobile_number1',$mobile_number1);
              $this->db->where('password',$Pass_login);
              $this->db->where('is_active','yes');
              $arr_data = $this->master_model->getRecords('user');       
                     
                if(empty($arr_data))
                {    
                    $this->session->set_flashdata('error_message1',"Email Or Password Is Wrong.");
                }
                else
                {
                    foreach($arr_data as $user_data)
                    {
                        $this->session->set_userdata('user_email',$user_data['email']);
                        $this->session->set_userdata('user_mobile',$user_data['mobile_number1']);
                        $this->session->set_userdata('user_sess_id',$user_data['id']);
                        $this->session->set_userdata('user_name',$user_data['user_name']);
                    }
                    
                    redirect($this->module_url_path_dashboard.'/index');
                }
            }   
        }

        $this->arr_view_data['action']          = 'login';
        $this->arr_view_data['page_title']      = " Login ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->load->view('user/login/index',$this->arr_view_data);
    }

    public function logout()
    {
        $this->session->unset_userdata('user_sess_id');
        $this->session->unset_userdata('mobile_number1');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_name');
        $this->session->sess_destroy();
        redirect($this->module_url_path.'/index');  
    }

   
}