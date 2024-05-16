<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/login";
		$this->module_url_path_dashboard    =  base_url().$this->config->item('agent_panel_slug')."/dashboard";
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
              $this->db->where('is_deleted','no');
              $arr_data = $this->master_model->getRecords('agent');       
                     
                if(empty($arr_data))
                {    
                    $this->session->set_flashdata('error_message1',"Email Or Password Is Wrong.");
                }
                else
                {
                    foreach($arr_data as $agent_data)
                    {
                        $this->session->set_userdata('agent_email',$agent_data['email']);
                        $this->session->set_userdata('agent_mobile',$agent_data['mobile_number1']);
                        $this->session->set_userdata('agent_sess_id',$agent_data['id']);
                        $this->session->set_userdata('agent_name',$agent_data['agent_name']);
                        $this->session->set_userdata('region_head',$agent_data['department']);
                        $this->session->set_userdata('agent_login_count',$agent_data['login_count']);

                        $agent = $agent_data['id'];
                        $var = $agent_data['login_count'];
                    }

                        $login_var = $var + 1;
                        $arr_update = array(
                         'login_count'   =>   $login_var
                            );
                        $arr_where     = array("id" => $agent);
                        $this->master_model->updateRecord('agent',$arr_update,$arr_where);
                    
                    redirect($this->module_url_path_dashboard.'/index');
                }
            }   
        }

        $this->arr_view_data['action']          = 'login';
        $this->arr_view_data['page_title']      = " Login ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->load->view('agent/login/index',$this->arr_view_data);
    }

    public function logout()
    {
        $this->session->unset_userdata('agent_sess_id');
        $this->session->unset_userdata('mobile_number1');
        $this->session->unset_userdata('agent_email');
        $this->session->unset_userdata('agent_name');
        $this->session->unset_userdata('region_head');
        $this->session->sess_destroy();
        redirect($this->module_url_path.'/index');  
    }

   
}