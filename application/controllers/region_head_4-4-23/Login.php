<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        
        $this->module_url_path    =  base_url().$this->config->item('region_head_panel_slug')."region_head/login";
		$this->module_url_path_dashboard    =  base_url().$this->config->item('region_head_panel_slug')."region_head/dashboard";
        $this->module_title       = "Login";
        $this->module_url_slug    = "login";
        $this->module_view_folder = "login/";
	}

    public function index()
    {   
        if($this->input->post('submit'))
        {

            // $this->form_validation->set_rules('email_login', 'Email Login', 'required');
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            //echo 'pppp';
            if($this->form_validation->run() == TRUE)
            {
                // echo 'jjjj';
                // die;
                // $Email_login = $this->input->post('email_login');
                $mobile_number = $this->input->post('mobile_number');
                $password = $this->input->post('password');   
                
            //   $this->db->where('email',$Email_login);
              $this->db->where('mobile_number',$mobile_number);
              $this->db->where('password',$password);
              $this->db->where('is_active','yes');
              $this->db->where('is_deleted','no');
              $arr_data = $this->master_model->getRecords('region_head');       
                     
                if(empty($arr_data))
                {    
                    $this->session->set_flashdata('error_message1',"Email Or Password Is Wrong.");
                }
                else
                {
                    foreach($arr_data as $region_head_data)
                    {
                        // $this->session->set_userdata('region_head_email',$region_head_data['email']);
                        $this->session->set_userdata('region_head_mobile',$region_head_data['mobile_number']);
                        $this->session->set_userdata('region_head_sess_id',$region_head_data['id']);
                        $this->session->set_userdata('region_head_name',$region_head_data['agent_name']);
                        $this->session->set_userdata('region_head_region',$region_head_data['agent_region']);
                    }
                    
                    redirect($this->module_url_path_dashboard.'/index');
                }
            }   
        }

        $this->arr_view_data['action']          = 'login';
        $this->arr_view_data['page_title']      = " Login ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->load->view('region_head/login/index',$this->arr_view_data);
    }

    public function logout()
    {
        $this->session->unset_userdata('region_head_sess_id');
        $this->session->unset_userdata('region_head_mobile');
        $this->session->unset_userdata('region_head_name');
        $this->session->sess_destroy();
        redirect($this->module_url_path.'/index');  
    }

   
}