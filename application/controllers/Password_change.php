<?php 
//   Controller for: home page
// Author: Nandkishor Wagh
// Start Date: 08-08-2022
// last updated: 08-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Password_change extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
	 }

	 
    //  public function index()
    //  {
    //      $data = array('middle_content' => 'index',
	// 			// 		'banner'       => $banner,
	// 			// 		'chairman_desk'=> $chairman_desk,
	// 			// 		'md_desk'      => $md_desk,
	// 			// 		'blog'         => $blog, 
	// 			// 		'testimonials' => $testimonials,
	// 			// 		'clients' 	   => $clients,
	// 			// 		'whtsnew'	   => $whtsnew
	// 					);
    //     $this->arr_view_data['page_title']     =  " Home Page";
    //     $this->arr_view_data['middle_content'] =  "index";
    //     // $this->load->view('front/common_view',$this->arr_view_data);
    //     $this->load->view('front/common_view',$data);
    //     // $this->load->view('front/index');
    //  }


    public function add()
     {    

        // $nabcons_emp_id = $this->session->userdata('nabcons_emp_id');
        // $user_role = $this->session->userdata('nabcons_user_role');

        if($this->input->post('submit'))
        {            
            // $language  = $this->input->post('language'); 

            $this->form_validation->set_rules('first_name', 'Name', 'required');
            $this->form_validation->set_rules('last_name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
            
            if($this->form_validation->run() == TRUE)
            {                
                $fname         = $this->input->post('first_name'); 
                $lname         = $this->input->post('last_name'); 
                $email        = trim($this->input->post('email'));
                $mobile       = trim($this->input->post('mobile'));
                $message      = trim($this->input->post('message'));

                $arr_insert = array(
                    'first_name'   =>   $fname,
                    'last_name'     => $lname,
                    'email'          => $email,
                    'mobile'        => $mobile,
                    'message'        => $message
                );
                
                $inserted_id = $this->master_model->insertRecord('enquiries',$arr_insert,true);
                               
                if($inserted_id > 0)
                {              
                    
                    /*Activity Log*/
                    $this->session->set_flashdata('success_message',"Slider Added Successfully.");
                    redirect($this->module_url_path.'/index');
                    
                }

                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
        }


        $data = array('middle_content' => 'password_change');
        $this->arr_view_data['page_title']     =  "Password Change Page";          
        $this->load->view('front/common_view',$data);       
     }

     public function password_change($id)
    {
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
                $this->form_validation->set_rules('new_password', 'New password', 'required');
                $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');
                if($this->form_validation->run() == TRUE)
                {         
                
                   $old_pass = trim($this->input->post('old_pass'));
                   $new_password = trim($this->input->post('new_password'));
                   $confirm_pass = trim($this->input->post('confirm_pass'));

                   $this->db->where('id',$id);
                   $arr_data = $this->master_model->getRecords('travelers');

                   $old_password_check = $arr_data['password'];
                   if($old_password_check = $old_pass)
                   {
                        $arr_update = array(                       
                            'password' => $new_password                            
                        );
                        $arr_where     = array("id" => $id);
                        $this->master_model->updateRecord('travelers',$arr_update,$arr_where);
                        if($id > 0)
                        {
                            $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                        }
                        else
                        {
                            $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                        }
                    }
                    else
                        {
                            $this->session->set_flashdata('error_message',"Old Password is Wrong".".");
                        }
                    redirect($this->module_url_path.'/index');
                }   
            }

        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." password_change ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."password_change";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

}