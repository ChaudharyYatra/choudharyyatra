<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_driver extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('vehicle_owner_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_owner/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_owner_panel_slug')."vehicle_owner/vehicle_driver";
        $this->module_url_path_dates    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/domestic_package_review";
        $this->module_title       = "Vehicle Driver";
        $this->module_url_slug    = "vehicle_driver";
        $this->module_view_folder = "vehicle_driver/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $id = $this->session->userdata('vehicle_owner_sess_id');

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('vehicle_driver.vehicle_owner_id',$id);
        $vehicle_driver = $this->master_model->getRecords('vehicle_driver');
        // print_r($vehicle_driver); die;

        $this->arr_view_data['vehicle_ssession_owner_name']= $vehicle_ssession_owner_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['vehicle_driver']        = $vehicle_driver;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
       
	}
	
	
    public function add()
    {   
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $id = $this->session->userdata('vehicle_owner_sess_id');

        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('driver_name', 'driver_name', 'required');
            $this->form_validation->set_rules('mobile_number1', 'mobile_number1', 'required');
            $this->form_validation->set_rules('year_experience', 'year_experience', 'required');
            $this->form_validation->set_rules('marital_status', 'marital_status', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                // =========================Upload licence Image(front)===================================================
                $file_name     = $_FILES['licence_image_front']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['licence_image_front']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/add');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/driver_licence_image/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|pdf|PDF'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('licence_image_front'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                if($file_name!="")
                {
                    $file_name = $this->upload->data();
                    $licence_front_filename = $file_name_to_dispaly;
                }

                else
                {
                    $licence_front_filename = $this->input->post('licence_image_front',TRUE);
                }
                // =========================Upload licence Image(front)===================================================
        
                 // ====================Upload licence Image(back) ============================================
                 $file_name     = $_FILES['licence_image_back']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['licence_image_back'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['licence_image_back']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/driver_licence_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
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
                }
                else
                {
                    $licence_back_filename = $this->input->post('licence_image_back',TRUE);
                    
                }

                // ====================Upload licence Image(back)============================================

                // ====================Upload Aadhaar Image(front)============================================

                $file_name     = $_FILES['aadhaar_image_front']['name'];

                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['aadhaar_image_front'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['aadhaar_image_front']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

                $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/driver_aadhaar_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
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
                }
                else
                {
                    $aadhaar_front_filename = $this->input->post('aadhaar_image_front',TRUE);
                    
                }

                // ====================Upload Aadhaar Image(front)============================================

                // ====================Upload Aadhaar Image(back)============================================

                 $file_name     = $_FILES['aadhaar_image_back']['name'];

                 $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');
 
                 $file_name = $_FILES['aadhaar_image_back'];
                 $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');
 
                 if($file_name['name']!="")
                 {
                     $ext = explode('.',$_FILES['aadhaar_image_back']['name']); 
                     $config['file_name'] = rand(1000,90000);
 
                     if(!in_array($ext[1],$arr_extension))
                     {
                         $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                     }
                 }   
 
                 $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
             
                 $config['upload_path']   = './uploads/driver_aadhaar_image/';
                 $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
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
                 }
                 else
                 {
                     $aadhaar_back_filename = $this->input->post('aadhaar_image_back',TRUE);
                     
                 }
                // ===================Upload Aadhaar Image(back)============================================

                // ===================Upload Profile Image============================================

                $file_name     = $_FILES['profile_image']['name'];

                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['profile_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['profile_image']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

                $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/driver_profile_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
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
                }
                else
                {
                    $driver_profile_filename = $this->input->post('profile_image',TRUE);
                    
                }
               // ====================Upload Profile Image============================================

                $driver_name  = $this->input->post('driver_name'); 
                $mobile_number1        = trim($this->input->post('mobile_number1'));
                $mobile_number2        = trim($this->input->post('mobile_number2'));
                $year_experience = trim($this->input->post('year_experience'));
                $marital_status = trim($this->input->post('marital_status'));
                $licence_type=implode(',',$this->input->post('licence_type'));
                $address = trim($this->input->post('address'));
                $password = trim($this->input->post('password'));
                $pancard_no = trim($this->input->post('pancard_no'));
                $gst_no = trim($this->input->post('gst_no'));
                $licence_valid_date = trim($this->input->post('licence_valid_date'));
                
                $arr_insert = array(
                    'driver_name'   =>   $driver_name,
                    'mobile_number1'          => $mobile_number1,
                    'mobile_number2'          => $mobile_number2,
                    'year_experience'          => $year_experience,
                    'marital_status'          => $marital_status,
                    'licence_type'          => $licence_type,
                    'address'          => $address,
                    'password'          => $password,
                    'pan_card_no'          => $pancard_no,
                    'gst_no'          => $gst_no,
                    'licence_valid_date'          => $licence_valid_date,
                    'licence_image_front'        => $licence_front_filename,
                    'licence_image_back'        => $licence_back_filename, 
                    'aadhaar_image_front'    => $aadhaar_front_filename,
                    'aadhaar_image_back'    => $aadhaar_back_filename,
                    'profile_image'    => $driver_profile_filename,
                    'vehicle_owner_id'    => $id,
                    'status'                  => 'pending'
                    
                );
                
                $inserted_id = $this->master_model->insertRecord('vehicle_driver',$arr_insert,true);
                               
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            
        }
       
        }

        
        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $vehicle_type = $this->master_model->getRecords('vehicle_type');

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $vehicle_fuel = $this->master_model->getRecords('vehicle_fuel');
        // print_r($package_type); die;

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $vehicle_brand = $this->master_model->getRecords('vehicle_brand');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $zone_info = $this->master_model->getRecords('zone_master');

        
        $this->arr_view_data['vehicle_ssession_owner_name'] = $vehicle_ssession_owner_name;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['vehicle_type'] = $vehicle_type;
        $this->arr_view_data['vehicle_fuel'] = $vehicle_fuel;
        $this->arr_view_data['vehicle_brand'] = $vehicle_brand;
        $this->arr_view_data['zone_info'] = $zone_info;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
    }

  // Active/Inactive
  public function active_inactive($id,$type)
    {
	  	$id=base64_decode($id);
        if($id!="" && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('vehicle_driver');
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index');
            }   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['is_active'] = "no";
            }
            else
            {
                $arr_update['is_active'] = "yes";
            }
            
            if($this->master_model->updateRecord('vehicle_driver',$arr_update,array('id' => $id)))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
            }
            else
            {
             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
            }
        }
        else
        {
           $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');   
    }
  

    // Delete
    
    public function delete($id)
    {
        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('vehicle_driver');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('vehicle_driver',$arr_update,$arr_where))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
            }
            else
            {
                $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
            }
        }
        else
        {
           
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');  
    }
   
    // Edit - Get data for edit
    
    public function edit($id)
    {
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $iid = $this->session->userdata('vehicle_owner_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        else
        {   
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
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['licence_image_back'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

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
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
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

            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

            $file_name = $_FILES['aadhaar_image_front'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

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
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
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
            
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

            $file_name = $_FILES['aadhaar_image_back'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

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
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
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
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['profile_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

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
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
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
                $pancard_no = trim($this->input->post('pancard_no'));
                $gst_no = trim($this->input->post('gst_no'));
                $licence_valid_date = trim($this->input->post('licence_valid_date'));

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
                    'pan_card_no'          => $pancard_no,
                    'gst_no'          => $gst_no,
                    'licence_valid_date'          => $licence_valid_date,
                    'password'          => $password,
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('vehicle_driver',$arr_update,$arr_where);
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
        

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('vehicle_driver');

        $this->arr_view_data['vehicle_ssession_owner_name']        = $vehicle_ssession_owner_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
    }

    // Get Details of Package
    public function details($id)
    {
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $iid = $this->session->userdata('vehicle_owner_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('vehicle_driver');
        
        $this->arr_view_data['vehicle_ssession_owner_name']        = $vehicle_ssession_owner_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
    }
   
   
}