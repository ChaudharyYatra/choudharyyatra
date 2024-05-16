<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/profile";
        $this->module_title       = "Change Password";
        $this->module_title2      = "Profile";
        $this->module_url_slug    = "profile";
        $this->module_view_folder = "change_password/";
        $this->arr_view_data = [];
	 }

     public function change_password()
     {
        if($this->input->post('submit'))
             {
                 $id=$this->session->userdata('chy_admin_id');
                 $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
                 $this->form_validation->set_rules('new_password', 'New password', 'required');
                 $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');
                 if($this->form_validation->run() == TRUE)
                 {                  
                    $old_pass = trim($this->input->post('old_pass'));
                    $new_password = trim($this->input->post('new_password'));
                    $confirm_pass = trim($this->input->post('confirm_pass'));
 
                    $this->db->where('id',$id);
                    $arr_data = $this->master_model->getRecords('admin');
                    
                    $existed_password = $arr_data[0]['password'];
                    
                    if($existed_password == $old_pass)
                    {
                         $arr_update = array(                       
                             'password' => $new_password                            
                         );
                         $arr_where     = array("id" => $id);
                         $this->master_model->updateRecord('admin',$arr_update,$arr_where);
                         if($id > 0)
                         {
                             $this->session->set_flashdata('success_message',$this->module_title." Successfully.");
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
                     redirect($this->module_url_path.'/change_password');
                 }   
             }
        
         $this->arr_view_data['listing_page']    = 'yes';        
         $this->arr_view_data['page_title']      = $this->module_title." ";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."change_password";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
     }

     public function index()
     {
         $id=$this->session->userdata('chy_admin_id');
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         
         $this->db->where('id',$id);         
         $arr_data = $this->master_model->getRecords('admin');
         
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = "Profile";
         $this->arr_view_data['module_title']    = "Profile";
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
     }


     public function edit($id)
     {

        $id=$this->session->userdata('chy_admin_id');

         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
 
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('admin');
             if($this->input->post('submit'))
             {
                 $this->form_validation->set_rules('admin_name', 'Admin Name', 'required');
                 $this->form_validation->set_rules('email_address', 'Email Address', 'required');
                 $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
                 if($this->form_validation->run() == TRUE)
                 {             
                            
                  $admin_name        = trim($this->input->post('admin_name'));
                  $email_address    = trim($this->input->post('email_address'));
                  $mobile_number = trim($this->input->post('mobile_number'));

                 $arr_update = array(
                     'name'          => $admin_name,
                     'email'          => $email_address,
                     'contact'          =>  $mobile_number
                 );
                 
                     $arr_where     = array("id" => $id);
                     $this->master_model->updateRecord('admin',$arr_update,$arr_where);
                     if($id > 0)
                     {
                         $this->session->set_flashdata('success_message',$this->module_title2." Information Updated Successfully.");
                     }
                     else
                     {
                         $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                     }
                     redirect($this->module_url_path.'/index');
                 }   
             }
         }
         else
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }

         
         $this->arr_view_data['arr_data']        = $arr_data;
        //  $this->arr_view_data['admin_sess_name'] = $admin_sess_name;
         $this->arr_view_data['page_title']      = "Edit Profile ";
         $this->arr_view_data['module_title']    = "Edit Profile ";
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
     }
    


}