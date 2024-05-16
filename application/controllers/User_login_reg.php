<?php 
//   Controller for: User login registration page
// Author: Nandkishor Wagh
// Start Date: 22-08-2022
// last updated: 22-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login_reg extends CI_Controller {
	 
	function __construct() {

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
        if($this->input->post('login'))
            {
                $this->form_validation->set_rules('email_login', 'Email Address', 'required');
                $this->form_validation->set_rules('pass_login', 'Passord', 'required');

                if($this->form_validation->run() == TRUE)
                {        
                   $email_login = trim($this->input->post('email_login'));
                   $pass_login = trim($this->input->post('pass_login'));
                
                   $this->db->where('is_deleted','no');
                   $this->db->where('email',$email_login);
                   $this->db->where('password',$pass_login);

                   $arr_data = $this->master_model->getRecords('travelers');

                   if(count($arr_data)>0)
                   {
                       
                    if($arr_data[0]['is_active']=='yes')
                        {   
                            // $this->session->set_userdata('traveler_front_id',$arr_data[0]['id']);
                            // $this->session->set_userdata('traveler_first_name',$arr_data[0]['first_name']);
                            // $this->session->set_userdata('traveler_last_name',$arr_data[0]['last_name']);

                            $this->session->set_userdata('user_email',$arr_data[0]['email']);
                            $this->session->set_userdata('user_mobile',$arr_data[0]['mobile_number1']);
                            $this->session->set_userdata('user_sess_id',$arr_data[0]['id']);
                            $this->session->set_userdata('user_name',$arr_data[0]['user_name']);
                        }
                        else
                        {   
                            $this->session->set_flashdata('error_message',"You are not alloed to login.");
                            redirect(base_url().'home');
                        }                        
                    }
                    else
                        {   
                            $this->session->set_flashdata('error_message',"Login credentials are wrong.");
                            redirect(base_url().'home');
                        }
                    redirect(base_url().'user/dashboard');
                }   
            }
            
        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $this->db->order_by('id','ASC');
        // $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $this->db->order_by('id','ASC');
        // $social_media_link = $this->master_model->getRecords('social_media_link');
        
        // $data = array('middle_content' => 'login',
        // 'website_basic_structure' => $website_basic_structure,
        // 'social_media_link' => $social_media_link,
        // 'page_title'       => "Login",
        // );
        // $this->arr_view_data['page_title']     =  "Login Page";
        // $this->arr_view_data['middle_content'] =  "login";
        // $this->load->view('front/common_view',$data);

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
        redirect(base_url().'home');  
    }
    
    // public function user_logout()
    // {
	// 	$this->session->unset_userdata('traveler_front_id');
	// 	$this->session->unset_userdata('traveler_first_name');
	// 	$this->session->unset_userdata('traveler_last_name');
	// 	redirect(base_url().'home');
	// }
    
    // public function add()
    //  { 
         
    //     if($this->input->post('submit'))
    //     {     
            
    //         $this->form_validation->set_rules('firstname', 'First Name', 'required');
    //         $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    //         $this->form_validation->set_rules('emailid', 'Email', 'required');
    //         $this->form_validation->set_rules('phoneno', 'Mobile', 'required');
    //         $this->form_validation->set_rules('password', 'Password', 'required');
            
    //         if($this->form_validation->run() == TRUE)
    //         {    
    //             $first_name   = $this->input->post('firstname'); 
    //             $last_name    = $this->input->post('lastname'); 
    //             $email        = trim($this->input->post('emailid'));
    //             $mobile       = trim($this->input->post('phoneno'));
    //             $password     = trim($this->input->post('password'));

    //             $arr_insert = array(
    //                 'first_name'   =>   $first_name,
    //                 'last_name'     => $last_name,
    //                 'email'          => $email,
    //                 'mobile'        => $mobile,
    //                 'password'        => $password
    //             );
                
    //             $inserted_id = $this->master_model->insertRecord('travelers',$arr_insert,true);
                               
    //             if($inserted_id > 0)
    //             {   
    //                 $this->session->set_flashdata('success_message',"You are registrered successfully.");
    //                 redirect(base_url().'user_login_reg');                   
    //             }
    //             else
    //             {
    //                 $this->session->set_flashdata('error_message'," Something went wrong while registration.");
    //             }
    //             redirect(base_url().'user_login_reg');
    //         }   
    //     }

    
    //     $data = array('middle_content' => 'login');
    //     $this->arr_view_data['page_title']     =  "User Registration";
    //     $this->load->view('front/common_view',$data);       
    //  }

	

}