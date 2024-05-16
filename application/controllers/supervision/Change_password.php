<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('supervision_panel_slug')."supervision/change_password";
        $this->module_title       = "Password Change";
        $this->module_url_slug    = "change_password";
        $this->module_view_folder = "change_password/";
        $this->arr_view_data = [];
	 }

     public function change_password()
     {

        if($this->input->post('submit'))
             {
                $id=$this->session->userdata('supervision_sess_id');
                
                 $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
                 $this->form_validation->set_rules('new_password', 'New password', 'required');
                 $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');
                 if($this->form_validation->run() == TRUE)
                 {                  
                    $old_pass = trim($this->input->post('old_pass'));
                    $new_password = trim($this->input->post('new_password'));
                    $confirm_pass = trim($this->input->post('confirm_pass'));
 
                    $this->db->where('id',$id);
                    $arr_data = $this->master_model->getRecords('supervision');
                    
                    $existed_password = $arr_data[0]['password'];
                    
                    if($existed_password == $old_pass)
                    {
                         $arr_update = array(                       
                             'password' => $new_password                            
                         );
                         $arr_where     = array("id" => $id);
                         $this->master_model->updateRecord('supervision',$arr_update,$arr_where);
                         if($id > 0)
                         {
                             $this->session->set_flashdata('success_message',$this->module_title." Successfully.");
                              redirect('supervision/login/logout');
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
         $supervision_sess_name = $this->session->userdata('supervision_name');
         $this->arr_view_data['supervision_sess_name']        = $supervision_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';        
         $this->arr_view_data['page_title']      = $this->module_title." ";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."change_password";
         $this->load->view('supervision/layout/supervision_combo',$this->arr_view_data);
        
     }

     public function index()
     {
         $id = $this->session->userdata('supervision_sess_id');
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         
         $this->db->where('id',$id);         
         $arr_data = $this->master_model->getRecords('supervision');

         $supervision_sess_name = $this->session->userdata('supervision_name');
         $this->arr_view_data['supervision_sess_name']        = $supervision_sess_name;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = "Details";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('supervision/layout/supervision_combo',$this->arr_view_data);
     }
    


}