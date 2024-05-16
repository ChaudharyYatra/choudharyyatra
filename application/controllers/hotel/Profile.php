<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('hotel_sess_id')=="") 
        { 
                redirect(base_url().'hotel/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('hotel_panel_slug')."hotel/profile";
        $this->module_title       = "Profile";
        $this->module_url_slug    = "profile";
        $this->module_view_folder = "profile/";
        $this->arr_view_data = [];
	 }


     public function index()
     {
        $hotel_sess_name = $this->session->userdata('hotel_name');
        $id = $this->session->userdata('hotel_sess_id');
         
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         
         $this->db->where('id',$id);         
         $arr_data = $this->master_model->getRecords('hotel');

         
         $this->arr_view_data['hotel_sess_name'] = $hotel_sess_name;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = "Hotel Profile Details";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
     }


     // Edit - 

     public function edit($id)
     {

        $hotel_sess_name = $this->session->userdata('hotel_name');
        $iid = $this->session->userdata('hotel_sess_id');

         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
 
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('hotel');
            //   print_r($arr_data); die;
             

             if($this->input->post('submit'))
             {
                
                $this->form_validation->set_rules('hotel_name', 'hotel_name', 'required');
                $this->form_validation->set_rules('email', 'Email Address', 'required');
                $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
                $this->form_validation->set_rules('hotel_address', 'Hotel Address', 'required');
                 
                 if($this->form_validation->run() == TRUE)
                 {             
                    

                    $hotel_name  = trim($this->input->post('hotel_name'));
                    $email = trim($this->input->post('email'));
                    $mobile_number1 = trim($this->input->post('mobile_number1'));
                    $mobile_number2 = trim($this->input->post('mobile_number2'));
                    $landline = trim($this->input->post('landline'));
                    $hotel_address = trim($this->input->post('hotel_address'));
                 
                 
                        $arr_update = array(
                            'hotel_name' => $hotel_name,
                            'mobile_number1'   => $mobile_number1,
                            'mobile_number2'   => $mobile_number2,
                            'landline'   => $landline,
                            'email'            => $email,
                            'hotel_address'    => $hotel_address
                        );

                     $arr_where     = array("id" => $id);
                     $inserted_id = $this->master_model->updateRecord('hotel',$arr_update,$arr_where);
                    
    
                     if($inserted_id > 0)
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

         

         
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['hotel_sess_name'] = $hotel_sess_name;
         $this->arr_view_data['page_title']      = "Edit Profile ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
     }
    


}


