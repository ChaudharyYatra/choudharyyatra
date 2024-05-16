<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/profile";
        $this->module_title       = "Profile";
        $this->module_url_slug    = "profile";
        $this->module_view_folder = "profile/";
        $this->arr_view_data = [];
	 }


     public function index()
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');
         
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         
         $this->db->where('id',$id);         
         $arr_data = $this->master_model->getRecords('supervision');


         $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
         
         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = "Kitchen Staff Profile Details";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('kitchen_staff_cook/layout/agent_combo',$this->arr_view_data);
     }


     // Edit - 

     public function edit($id)
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
 
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('supervision');
            //   print_r($arr_data); die;
             
            // $profile_update_count=$arr_data[0]['profile_update_count'];
            // //  print_r($profile_update_count); die;

            // $agent_id=$arr_data[0]['id'];
            // $department_id=$arr_data[0]['department'];
             

             if($this->input->post('submit'))
             {
                
                 $this->form_validation->set_rules('name', 'name', 'required');
                 $this->form_validation->set_rules('email', 'email', 'required');
                 $this->form_validation->set_rules('contact', 'contact', 'required');
                //  $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
                //  $this->form_validation->set_rules('mobile_number2', 'Mobile Number2', 'required');
                //  $this->form_validation->set_rules('email', 'Email Address', 'required');
                //  $this->form_validation->set_rules('pan_card', 'Pan card', 'required');
                //  $this->form_validation->set_rules('company_gst_number', 'Company GST Number', 'required');
                //  $this->form_validation->set_rules('office_address', 'Office Address', 'required');
                 
                 if($this->form_validation->run() == TRUE)
                 {             
                //     $old_img_name = $this->input->post('old_img_name');
                //     if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                //     {
                //     $file_name     = $_FILES['image_name']['name'];
                //     $arr_extension = array('png','jpg','jpeg','JPEG','PNG','JPG');

                //     $file_name = $_FILES['image_name'];
                //     $arr_extension = array('png','jpg','jpeg','JPEG','PNG','JPG');

                //     if($file_name['name']!="")
                //     {
                //         $ext = explode('.',$_FILES['image_name']['name']); 
                //         $config['file_name'] = rand(1000,90000);

                //         if(!in_array($ext[1],$arr_extension))
                //         {
                //             $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                //             redirect($this->module_url_path.'/edit/'.$id);
                //         }
                //     }   

                //     $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                    
                //     $config['upload_path']   = './uploads/agent_photo/';
                //     $config['allowed_types'] = 'JPEG|PNG|JPG|png|jpg|jpeg';  
                //     $config['max_size']      = '10000';
                //     $config['file_name']     = $file_name_to_dispaly;
                //     $config['overwrite']     = TRUE;
                //     $this->load->library('upload',$config);
                //     $this->upload->initialize($config); // Important
                    
                //     if(!$this->upload->do_upload('image_name'))
                //     {  
                //         $data['error'] = $this->upload->display_errors();
                //         $this->session->set_flashdata('error_message',$this->upload->display_errors());
                //          redirect($this->module_url_path.'/edit/'.$id);
                //     }
                //     if($file_name['name']!="")
                //     {   
                //         $file_name = $this->upload->data();
                //         $filename = $file_name_to_dispaly;
                //         if($old_img_name!='') unlink('./uploads/agent_photo/'.$old_img_name);
                //     }

                //     else
                //     {
                //         $filename = $this->input->post('image_name',TRUE);
                //     }
                // }
                // else
                // {
                //     $filename = $old_img_name;
                // }  
                    

                  $name  = $this->input->post('name'); 
                  $email        = trim($this->input->post('email'));
                  $contact    = trim($this->input->post('contact'));
                //   $mobile_number1 = trim($this->input->post('mobile_number1'));
                //   $mobile_number2 = trim($this->input->post('mobile_number2'));
                //   $email = trim($this->input->post('email'));
                //   $pan_card = trim($this->input->post('pan_card'));
                //   $gst_number = trim($this->input->post('company_gst_number'));
                //   $office_aadress = trim($this->input->post('office_address'));
                //   $fld_registration_date = $this->input->post('fld_registration_date');
                 
                 
               
                 
                    // if($profile_update_count == 0)
                    // {
                    //     $profile_count = $profile_update_count+1;
                        $arr_update = array(
                            'supervision_name'   =>    $name,
                            'email'          => $email,
                            'mobile_number1'          => $contact
                            // 'mobile_number1'          =>  $mobile_number1,
                            // 'mobile_number2'          => $mobile_number2,
                            // 'email'          => $email,
                            // 'fld_pan_number'          => $pan_card,
                            // 'fld_GST_number'          => $gst_number,
                            // 'fld_office_address'          => $office_aadress,
                            // 'image_name' => $filename,
                            // 'profile_update_count' => $profile_count,
                            // 'fld_registration_date' => $fld_registration_date,
                        );

                     $arr_where     = array("id" => $id);
                     $inserted_id = $this->master_model->updateRecord('supervision',$arr_update,$arr_where);
                    // }
                    // else
                    // {
                    //     $arr_update = array(
                    //         'city'   =>    $city,
                    //         'booking_center'          => $booking_center,
                    //         'agent_name'          => $agent_name,
                    //         'mobile_number1'          =>  $mobile_number1,
                    //         'mobile_number2'          => $mobile_number2,
                    //         'email'          => $email,
                    //         'fld_pan_number'          => $pan_card,
                    //         'fld_GST_number'          => $gst_number,
                    //         'fld_office_address'          => $office_aadress,
                    //         'image_name' => $filename,
                    //         'agent_id'  => $agent_id,
                    //         'department' => $department_id,
                    //         'profile_update_request' => 'requested',
                    //         'fld_registration_date' => $fld_registration_date,
                    //     );

                    //     $arr_where2     = array("id" => $id);
                    //     $arr_update2 = array(
                    //         'profile_update_request' =>  'requested'
                    //     );
                    //     $inserted_id = $this->master_model->updateRecord('agent',$arr_update2,$arr_where2);
                    //     $inserted_id = $this->master_model->insertRecord('agent_temp_tbl',$arr_update,true);
                    //     //$this->master_model->updateRecord('agent_temp_tbl',$arr_update,$arr_where);
                    // }
                //--------------------------------------------------------------------------------------------------  
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
        //  $this->arr_view_data['profile_update_count']  = $profile_update_count;
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['page_title']      = "Edit Profile ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('kitchen_staff_cook/layout/agent_combo',$this->arr_view_data);
     }
    


}


