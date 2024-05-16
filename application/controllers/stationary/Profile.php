<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('stationary_sess_id')=="") 
        { 
                redirect(base_url().'stationary/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('stationary_panel_slug')."stationary/profile";
        $this->module_title       = "Profile";
        $this->module_url_slug    = "profile";
        $this->module_view_folder = "profile/";
        $this->arr_view_data = [];
	 }


     public function index()
     {
         $id = $this->session->userdata('stationary_sess_id');
         
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         
         $this->db->where('id',$id);         
         $arr_data = $this->master_model->getRecords('stationary_login');

         $stationary_sess_name = $this->session->userdata('stationary_name');
         
         $this->arr_view_data['stationary_sess_name']        = $stationary_sess_name;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = "Stationary User Profile Details";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('stationary/layout/stationary_combo',$this->arr_view_data);
     }


     // Edit - 

     public function edit($id)
     {

        $stationary_sess_name = $this->session->userdata('stationary_name');
        $id=$this->session->userdata('stationary_sess_id');

         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
 
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('stationary_login');
             if($this->input->post('submit'))
             {
                
                 
                 $this->form_validation->set_rules('user_name', 'user Name', 'required');
                 $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
                 
                 if($this->form_validation->run() == TRUE)
                 {             
                  $user_name    = trim($this->input->post('user_name'));
                  $mobile_number1 = trim($this->input->post('mobile_number1'));
                 
                  $arr_update = array(
                     'user_name'          => $user_name,
                     'mobile_number1'          =>  $mobile_number1
                 );
                 
                     $arr_where     = array("id" => $id);
                     $this->master_model->updateRecord('stationary_login',$arr_update,$arr_where);
                     if($id > 0)
                     {
                         $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
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

        //  $this->db->order_by('id','desc');
        //  $this->db->where('is_deleted','no');
        //  $department_data = $this->master_model->getRecords('department');
         
         $this->db->order_by('id','desc');
         $this->db->where('is_deleted','no');
         $stationary_data = $this->master_model->getRecords('stationary_login');

         
         $this->arr_view_data['stationary_data']        = $stationary_data;
        //  $this->arr_view_data['department_data']        = $department_data;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['stationary_sess_name'] = $stationary_sess_name;
         $this->arr_view_data['page_title']      = "Edit Profile ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('stationary/layout/stationary_combo',$this->arr_view_data);
     }
    


}