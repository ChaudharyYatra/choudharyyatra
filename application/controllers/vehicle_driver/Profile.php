<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('vehicle_driver_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_driver/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_driver_panel_slug')."vehicle_driver/profile";
        $this->module_title       = "Profile";
        $this->module_url_slug    = "profile";
        $this->module_view_folder = "profile/";
        $this->arr_view_data = [];
	 }


     public function index()
     {
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $id = $this->session->userdata('vehicle_driver_sess_id');
         
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         
         $this->db->where('id',$id);         
         $arr_data = $this->master_model->getRecords('vehicle_driver');

         $this->arr_view_data['vehicle_ssession_driver_name']        = $vehicle_ssession_driver_name;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = "Vehicle Driver Profile Details";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);
     }


     // Edit - 

     public function edit($id)
     {

        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $id = $this->session->userdata('vehicle_driver_sess_id');

         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
 
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('vehicle_driver');

             if($this->input->post('submit'))
             {
                
                $this->form_validation->set_rules('driver_name', 'driver_name', 'required');
                $this->form_validation->set_rules('mobile_number1', 'mobile_number1', 'required');
                 
                 if($this->form_validation->run() == TRUE)
                 {             
                // =======================================upload licence_image_front image============================================================
                $old_licence_front_img_name = $this->input->post('old_licence_front_img_name');
                
                if(!empty($_FILES['licence_image_front']) && $_FILES['licence_image_front']['name'] !='')
                {
                $file_name     = $_FILES['licence_image_front']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                $file_name = $_FILES['licence_image_front'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['licence_image_front']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

                $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                
                $config['upload_path']   = './uploads/driver_licence_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('licence_image_front'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $licence_front_filename = $file_name_to_dispaly;
                    if($old_licence_front_img_name!='') unlink('./uploads/driver_licence_image/'.$old_licence_front_img_name);
                }
                else
                {
                    $licence_front_filename = $this->input->post('licence_image_front',TRUE);
                }
            }
            else
            {
                $licence_front_filename = $old_licence_front_img_name;
            }
// =======================================upload licence_image_front image============================================================

//============================upload licence_image_back image================================================================================
        $old_licence_back_img_name = $this->input->post('old_licence_back_img_name');
            
            if(!empty($_FILES['licence_image_back']) && $_FILES['licence_image_back']['name'] !='')
            {
           $file_name     = $_FILES['licence_image_back']['name'];
            
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            $file_name = $_FILES['licence_image_back'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            if($file_name['name']!="")
            {
                $ext = explode('.',$_FILES['licence_image_back']['name']); 
                $config['file_name'] = rand(1000,90000);

                if(!in_array($ext[1],$arr_extension))
                {
                    $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    redirect($this->module_url_path.'/edit/'.$id);
                }
            }   

           $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
        
            $config['upload_path']   = './uploads/driver_licence_image/';
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
            $config['max_size']      = '10000';
            $config['file_name']     = $file_name_to_dispaly_pdf;
            $config['overwrite']     = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config); // Important
            
            if(!$this->upload->do_upload('licence_image_back'))
            {  
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error_message',$this->upload->display_errors());
                redirect($this->module_url_path.'/edit/'.$id);
            }
            if($file_name['name']!="")
            {   
                $file_name = $this->upload->data();
                $licence_back_filename = $file_name_to_dispaly_pdf;
                if($old_licence_back_img_name!='') unlink('./uploads/driver_licence_image/'.$old_licence_back_img_name);
            }
            else
            {
                $licence_back_filename = $this->input->post('licence_image_back',TRUE);
                
            }
        }
        else
        {
            $licence_back_filename = $old_licence_back_img_name;
            
        }
//============================upload licence_image_back image================================================================================
        
//============================upload aadhaar_image_front ================================================================================

        $old_aadhaar_front_img_name = $this->input->post('old_aadhaar_front_img_name');
                        
        if(!empty($_FILES['aadhaar_image_front']) && $_FILES['aadhaar_image_front']['name'] !='')
        {
        $file_name     = $_FILES['aadhaar_image_front']['name'];

        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        $file_name = $_FILES['aadhaar_image_front'];
        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        if($file_name['name']!="")
        {
            $ext = explode('.',$_FILES['aadhaar_image_front']['name']); 
            $config['file_name'] = rand(1000,90000);

            if(!in_array($ext[1],$arr_extension))
            {
                $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                redirect($this->module_url_path.'/edit/'.$id);
            }
        }   

        $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

        $config['upload_path']   = './uploads/driver_aadhaar_image/';
        $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
        $config['max_size']      = '10000';
        $config['file_name']     = $file_name_to_dispaly_pdf;
        $config['overwrite']     = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config); // Important

        if(!$this->upload->do_upload('aadhaar_image_front'))
        {  
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error_message',$this->upload->display_errors());
            redirect($this->module_url_path.'/edit/'.$id);
        }
        if($file_name['name']!="")
        {   
            $file_name = $this->upload->data();
            $aadhaar_front_filename = $file_name_to_dispaly_pdf;
            if($old_aadhaar_front_img_name!='') unlink('./uploads/driver_aadhaar_image/'.$old_aadhaar_front_img_name);
        }
        else
        {
            $aadhaar_front_filename = $this->input->post('aadhaar_image_front',TRUE);
            
        }
        }
        else
        {
        $aadhaar_front_filename = $old_aadhaar_front_img_name;

        }
//============================upload aadhaar_image_front ================================================================================

//============================upload aadhaar_image_back ================================================================================

        $old_aadhaar_back_img_name = $this->input->post('old_aadhaar_back_img_name');
                        
        if(!empty($_FILES['aadhaar_image_back']) && $_FILES['aadhaar_image_back']['name'] !='')
        {
        $file_name     = $_FILES['aadhaar_image_back']['name'];
        
        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        $file_name = $_FILES['aadhaar_image_back'];
        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        if($file_name['name']!="")
        {
            $ext = explode('.',$_FILES['aadhaar_image_back']['name']); 
            $config['file_name'] = rand(1000,90000);

            if(!in_array($ext[1],$arr_extension))
            {
                $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                redirect($this->module_url_path.'/edit/'.$id);
            }
        }   

        $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

        $config['upload_path']   = './uploads/driver_aadhaar_image/';
        $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
        $config['max_size']      = '10000';
        $config['file_name']     = $file_name_to_dispaly_pdf;
        $config['overwrite']     = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config); // Important
        
        if(!$this->upload->do_upload('aadhaar_image_back'))
        {  
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error_message',$this->upload->display_errors());
            redirect($this->module_url_path.'/edit/'.$id);
        }
        if($file_name['name']!="")
        {   
            $file_name = $this->upload->data();
            $aadhaar_back_filename = $file_name_to_dispaly_pdf;
            if($old_aadhaar_back_img_name!='') unlink('./uploads/driver_aadhaar_image/'.$old_aadhaar_back_img_name);
        }
        else
        {
            $aadhaar_back_filename = $this->input->post('aadhaar_image_back',TRUE);
            
        }
        }
        else
        {
        $aadhaar_back_filename = $old_aadhaar_back_img_name;
        
        }
//============================upload  aadhaar_image_back ================================================================================

//============================upload profile_image ================================================================================

$old_profile_img_name = $this->input->post('old_profile_img_name');
            
            if(!empty($_FILES['profile_image']) && $_FILES['profile_image']['name'] !='')
            {
           $file_name     = $_FILES['profile_image']['name'];
            
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            $file_name = $_FILES['profile_image'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            if($file_name['name']!="")
            {
                $ext = explode('.',$_FILES['profile_image']['name']); 
                $config['file_name'] = rand(1000,90000);

                if(!in_array($ext[1],$arr_extension))
                {
                    $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    redirect($this->module_url_path.'/edit/'.$id);
                }
            }   

           $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
        
            $config['upload_path']   = './uploads/driver_profile_image/';
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
            $config['max_size']      = '10000';
            $config['file_name']     = $file_name_to_dispaly_pdf;
            $config['overwrite']     = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config); // Important
            
            if(!$this->upload->do_upload('profile_image'))
            {  
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error_message',$this->upload->display_errors());
                redirect($this->module_url_path.'/edit/'.$id);
            }
            if($file_name['name']!="")
            {   
                $file_name = $this->upload->data();
                $driver_profile_filename = $file_name_to_dispaly_pdf;
                if($old_profile_img_name!='') unlink('./uploads/driver_profile_image/'.$old_profile_img_name);
            }
            else
            {
                $driver_profile_filename = $this->input->post('profile_image',TRUE);
                
            }
        }
        else
        {
            $driver_profile_filename = $old_profile_img_name;
            
        }
//============================upload  profile_image================================================================================

            $driver_name  = $this->input->post('driver_name'); 
            $mobile_number1        = trim($this->input->post('mobile_number1'));
            $mobile_number2        = trim($this->input->post('mobile_number2'));
            $year_experience = trim($this->input->post('year_experience'));
            $marital_status = trim($this->input->post('marital_status'));
            $licence_type=implode(',',$this->input->post('licence_type'));
            $address = trim($this->input->post('address'));
            $password = trim($this->input->post('password'));

            $arr_update = array(
                'driver_name'   =>   $driver_name,
                'mobile_number1'          => $mobile_number1,
                'mobile_number2'          => $mobile_number2,
                'year_experience'          => $year_experience,
                'marital_status'          => $marital_status,
                'licence_type'          => $licence_type,
                'address'          => $address,
                'licence_image_front'        => $licence_front_filename,
                'licence_image_back'        => $licence_back_filename, 
                'aadhaar_image_front'    => $aadhaar_front_filename,
                'aadhaar_image_back'    => $aadhaar_back_filename,
                'profile_image'    => $driver_profile_filename,
                'password'          => $password
            );

                     $arr_where     = array("id" => $id);
                     $inserted_id = $this->master_model->updateRecord('vehicle_driver',$arr_update,$arr_where);
                    
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
         $this->arr_view_data['vehicle_ssession_driver_name'] = $vehicle_ssession_driver_name;
         $this->arr_view_data['page_title']      = "Edit Profile ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);
     }
    


}


