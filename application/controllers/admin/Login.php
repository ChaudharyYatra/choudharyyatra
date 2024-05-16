<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/login";
		$this->module_url_path_dashboard    =  base_url().$this->config->item('admin_panel_slug')."/dashboard";
        $this->module_title       = "Login";
        $this->module_url_slug    = "login";
        $this->module_view_folder = "login/";    
        
	}

    public function index()
    {   
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('email_login', 'Email Login', 'required');
            $this->form_validation->set_rules('pass_login', 'Password Login', 'required');
 
            if($this->form_validation->run() == TRUE)
            {
                $Email_login = $this->input->post('email_login');
                $Pass_login = $this->input->post('pass_login');   
                
              $this->db->where('email',$Email_login);
              $this->db->where('password',$Pass_login);
              $arr_data = $this->master_model->getRecords('admin');              
                if(empty($arr_data))
                {    
                    $this->session->set_flashdata('error_message1',"Mobile Number Or Password Is Wrong.");
                }
                else
                {
                    foreach($arr_data as $admin_data)
                    {
                        $email = $admin_data['email'];
                        $id = $admin_data['id'];
                        $name = $admin_data['name'];
                        $this->session->set_userdata('email',$email);
                        $this->session->set_userdata('chy_admin_id',$id);
                        $this->session->set_userdata('name',$name);
                    }

                    redirect($this->module_url_path_dashboard.'/index');
                }
            }   
        }

        $this->arr_view_data['action']          = 'login';
        $this->arr_view_data['page_title']      = " Login ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->load->view('admin/login/index',$this->arr_view_data);
    }

    public function logout()
    {
        
        $this->session->unset_userdata('chy_admin_id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('is_loggedin');
        $this->session->sess_destroy();

        redirect($this->module_url_path.'/index');  
    }

   
}