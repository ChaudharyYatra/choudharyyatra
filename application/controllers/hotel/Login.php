<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        
        $this->module_url_path    =  base_url().$this->config->item('hotel_panel_slug')."hotel/login";
		$this->module_url_path_dashboard    =  base_url().$this->config->item('hotel_panel_slug')."hotel/dashboard";
        $this->module_title       = "Login";
        $this->module_url_slug    = "login";
        $this->module_view_folder = "login/";
	}

    public function index()
    {   
        if($this->input->post('submit'))
        { 
            $this->form_validation->set_rules('mobile_number1', 'mobile_number1', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $mobile_number1 = $this->input->post('mobile_number1');
                $password = $this->input->post('password');   
                
              $this->db->where('mobile_number1',$mobile_number1);
              $this->db->where('password',$password);
              $arr_data = $this->master_model->getRecords('hotel');      
            //   print_r($arr_data); die;

                if(empty($arr_data))
                {    
                    $this->session->set_flashdata('error_message1',"Email Or Password Is Wrong.");
                }
                else
                {
                    foreach($arr_data as $hotel_data)
                    {
                        $this->session->set_userdata('hotel_mobile_number1',$hotel_data['mobile_number1']);
                        $this->session->set_userdata('hotel_sess_id',$hotel_data['id']);
                        $this->session->set_userdata('hotel_name',$hotel_data['hotel_name']);
                    }
                    
                    redirect($this->module_url_path_dashboard.'/index');
                }
            }   
        }

        $this->arr_view_data['action']          = 'login';
        $this->arr_view_data['page_title']      = " Login ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->load->view('hotel/login/index',$this->arr_view_data);
    }

    public function logout()
    {
        $this->session->unset_userdata('hotel_sess_id');
        $this->session->unset_userdata('hotel_mobile_number1');
        $this->session->unset_userdata('hotel_name');
        $this->session->sess_destroy();
        redirect($this->module_url_path.'/index');  
    }

   
}