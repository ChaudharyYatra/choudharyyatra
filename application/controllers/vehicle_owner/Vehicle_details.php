<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_details extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('vehicle_owner_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_owner/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_owner_panel_slug')."vehicle_owner/vehicle_details";
        $this->module_url_path_dates    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/domestic_package_review";
        $this->module_title       = "Vehicle Details";
        $this->module_url_slug    = "vehicle_details";
        $this->module_view_folder = "vehicle_details/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $id = $this->session->userdata('vehicle_owner_sess_id');

        $fields = "vehicle_details.*,vehicle_type.vehicle_type_name,vehicle_fuel.vehicle_fuel_name,vehicle_brand.vehicle_brand_name,
        bus_type.bus_type";
        $this->db->where('vehicle_details.is_deleted','no');
        $this->db->where('vehicle_owner_id',$id);
        $this->db->where('added_by !=','admin');
        $this->db->order_by('id','DESC');
        $this->db->join("vehicle_type", 'vehicle_details.vehicle_type=vehicle_type.id','left');
        $this->db->join("vehicle_fuel", 'vehicle_details.fuel_type=vehicle_fuel.id','left');
        $this->db->join("vehicle_brand", 'vehicle_details.vehicle_brand=vehicle_brand.id','left');
        $this->db->join("bus_type", 'vehicle_details.vehicle_bus_type=bus_type.id','left');
        $arr_data = $this->master_model->getRecords('vehicle_details',array('vehicle_details.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['vehicle_ssession_owner_name']= $vehicle_ssession_owner_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
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
            $this->form_validation->set_rules('vehicle_bus_type', 'vehicle_bus_type', 'required');
            $this->form_validation->set_rules('vehicle_type', 'vehicle_type', 'required');
            $this->form_validation->set_rules('fuel_type', 'fuel_type', 'required');
            $this->form_validation->set_rules('vehicle_brand', 'vehicle_brand', 'required');
            $this->form_validation->set_rules('seat_capacity', 'seat_capacity', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                // =========================Upload insurance image===================================================
                $file_name     = $_FILES['insurance_image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['insurance_image_name']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/add');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/insurance_photo/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|pdf|PDF'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('insurance_image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                if($file_name!="")
                {
                    $file_name = $this->upload->data();
                    $insurance_filename = $file_name_to_dispaly;
                }

                else
                {
                    $insurance_filename = $this->input->post('insurance_image_name',TRUE);
                }
                // =========================Upload insurance image===================================================
        
                 // ====================Upload Permit  image ============================================
                 $file_name     = $_FILES['permit_image_name']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['permit_image_name'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['permit_image_name']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg/pdf Files.');
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/permit_photo/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('permit_image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $permit_filename = $file_name_to_dispaly_pdf;
                }
                else
                {
                    $permit_filename = $this->input->post('permit_image_name',TRUE);
                    
                }

                // ====================Upload Permit  image ============================================

                // ====================Upload Vehicle Image(Front)============================================

                $file_name     = $_FILES['vehicle_front_image']['name'];

                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['vehicle_front_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['vehicle_front_image']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

                $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/vehicle_photo/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('vehicle_front_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $vehicle_front_filename = $file_name_to_dispaly_pdf;
                }
                else
                {
                    $vehicle_front_filename = $this->input->post('vehicle_front_image',TRUE);
                    
                }

                // ====================Upload Vehicle Image(Front)============================================

                // ====================Upload Vehicle Image(Back)============================================

                 $file_name     = $_FILES['vehicle_back_image']['name'];

                 $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');
 
                 $file_name = $_FILES['vehicle_back_image'];
                 $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');
 
                 if($file_name['name']!="")
                 {
                     $ext = explode('.',$_FILES['vehicle_back_image']['name']); 
                     $config['file_name'] = rand(1000,90000);
 
                     if(!in_array($ext[1],$arr_extension))
                     {
                         $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                     }
                 }   
 
                 $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
             
                 $config['upload_path']   = './uploads/vehicle_photo/';
                 $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                 $config['max_size']      = '10000';
                 $config['file_name']     = $file_name_to_dispaly_pdf;
                 $config['overwrite']     = TRUE;
                 $this->load->library('upload',$config);
                 $this->upload->initialize($config); // Important
                 
                 if(!$this->upload->do_upload('vehicle_back_image'))
                 {  
                     $data['error'] = $this->upload->display_errors();
                     $this->session->set_flashdata('error_message',$this->upload->display_errors());
                     redirect($this->module_url_path.'/edit/'.$id);
                 }
                 if($file_name['name']!="")
                 {   
                     $file_name = $this->upload->data();
                     $vehicle_back_filename = $file_name_to_dispaly_pdf;
                 }
                 else
                 {
                     $vehicle_back_filename = $this->input->post('vehicle_back_image',TRUE);
                     
                 }
                // ====================Upload Vehicle Image(Back)============================================

                // ====================Upload Vehicle Image(left)============================================

                $file_name     = $_FILES['vehicle_left_image']['name'];

                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['vehicle_left_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['vehicle_left_image']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

                $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/vehicle_photo/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('vehicle_left_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $vehicle_left_filename = $file_name_to_dispaly_pdf;
                }
                else
                {
                    $vehicle_left_filename = $this->input->post('vehicle_left_image',TRUE);
                    
                }
               // ====================Upload Vehicle Image(left)============================================

               // ====================Upload Vehicle Image(right)============================================

               $file_name     = $_FILES['vehicle_right_image']['name'];

               $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

               $file_name = $_FILES['vehicle_right_image'];
               $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

               if($file_name['name']!="")
               {
                   $ext = explode('.',$_FILES['vehicle_right_image']['name']); 
                   $config['file_name'] = rand(1000,90000);

                   if(!in_array($ext[1],$arr_extension))
                   {
                       $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                   }
               }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
           
               $config['upload_path']   = './uploads/vehicle_photo/';
               $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
               $config['max_size']      = '10000';
               $config['file_name']     = $file_name_to_dispaly_pdf;
               $config['overwrite']     = TRUE;
               $this->load->library('upload',$config);
               $this->upload->initialize($config); // Important
               
               if(!$this->upload->do_upload('vehicle_right_image'))
               {  
                   $data['error'] = $this->upload->display_errors();
                   $this->session->set_flashdata('error_message',$this->upload->display_errors());
                   redirect($this->module_url_path.'/edit/'.$id);
               }
               if($file_name['name']!="")
               {   
                   $file_name = $this->upload->data();
                   $vehicle_right_filename = $file_name_to_dispaly_pdf;
               }
               else
               {
                   $vehicle_right_filename = $this->input->post('vehicle_right_image',TRUE);
                   
               }
              // ====================Upload Vehicle Image(right)============================================

              // ====================Upload Vehicle Image(inside one)============================================

              $file_name     = $_FILES['vehicle_insideone_image']['name'];

              $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

              $file_name = $_FILES['vehicle_insideone_image'];
              $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

              if($file_name['name']!="")
              {
                  $ext = explode('.',$_FILES['vehicle_insideone_image']['name']); 
                  $config['file_name'] = rand(1000,90000);

                  if(!in_array($ext[1],$arr_extension))
                  {
                      $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                  }
              }   

              $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
          
              $config['upload_path']   = './uploads/vehicle_photo/';
              $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
              $config['max_size']      = '10000';
              $config['file_name']     = $file_name_to_dispaly_pdf;
              $config['overwrite']     = TRUE;
              $this->load->library('upload',$config);
              $this->upload->initialize($config); // Important
              
              if(!$this->upload->do_upload('vehicle_insideone_image'))
              {  
                  $data['error'] = $this->upload->display_errors();
                  $this->session->set_flashdata('error_message',$this->upload->display_errors());
                  redirect($this->module_url_path.'/edit/'.$id);
              }
              if($file_name['name']!="")
              {   
                  $file_name = $this->upload->data();
                  $vehicle_insideone_filename = $file_name_to_dispaly_pdf;
              }
              else
              {
                  $vehicle_insideone_filename = $this->input->post('vehicle_insideone_image',TRUE);
                  
              }
             // ====================Upload Vehicle Image(inside one)============================================

             // ====================Upload Vehicle Image(inside two)============================================

             $file_name     = $_FILES['vehicle_insidetwo_image']['name'];

             $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

             $file_name = $_FILES['vehicle_insidetwo_image'];
             $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

             if($file_name['name']!="")
             {
                 $ext = explode('.',$_FILES['vehicle_insidetwo_image']['name']); 
                 $config['file_name'] = rand(1000,90000);

                 if(!in_array($ext[1],$arr_extension))
                 {
                     $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                 }
             }   

             $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
         
             $config['upload_path']   = './uploads/vehicle_photo/';
             $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
             $config['max_size']      = '10000';
             $config['file_name']     = $file_name_to_dispaly_pdf;
             $config['overwrite']     = TRUE;
             $this->load->library('upload',$config);
             $this->upload->initialize($config); // Important
             
             if(!$this->upload->do_upload('vehicle_insidetwo_image'))
             {  
                 $data['error'] = $this->upload->display_errors();
                 $this->session->set_flashdata('error_message',$this->upload->display_errors());
                 redirect($this->module_url_path.'/edit/'.$id);
             }
             if($file_name['name']!="")
             {   
                 $file_name = $this->upload->data();
                 $vehicle_insidetwo_filename = $file_name_to_dispaly_pdf;
             }
             else
             {
                 $vehicle_insidetwo_filename = $this->input->post('vehicle_insidetwo_image',TRUE);
                 
             }
            // ====================Upload Vehicle Image(inside two)============================================

                $vehicle_bus_type  = $this->input->post('vehicle_bus_type'); 
                $vehicle_type  = $this->input->post('vehicle_type'); 
                $fuel_type        = trim($this->input->post('fuel_type'));
                $vehicle_brand        = trim($this->input->post('vehicle_brand'));
                $seat_capacity = trim($this->input->post('seat_capacity'));
                $insurance_number = trim($this->input->post('insurance_number'));
                $insurance_valid_date = trim($this->input->post('insurance_valid_date'));
                $permit_number = trim($this->input->post('permit_number'));
                $permit_valid_date = trim($this->input->post('permit_valid_date'));
                $air_conditionar = trim($this->input->post('air_conditionar'));
                $vehicle_model = trim($this->input->post('vehicle_model'));
                $registration_number = trim($this->input->post('registration_number'));
                $luggage_capacity = trim($this->input->post('luggage_capacity'));
                $total_kilometer = trim($this->input->post('total_kilometer'));
                
                $arr_insert = array(
                    'vehicle_bus_type'   =>   $vehicle_bus_type,
                    'vehicle_type'   =>   $vehicle_type,
                    'fuel_type'          => $fuel_type,
                    'vehicle_brand'          => $vehicle_brand,
                    'seat_capacity'          => $seat_capacity,
                    'insurance_number'          => $insurance_number,
                    'insurance_valid_date'          => $insurance_valid_date,
                    'permit_number'          => $permit_number,
                    'permit_valid_date'          => $permit_valid_date,
                    'air_conditionar'          => $air_conditionar,
                    'vehicle_model'        => $vehicle_model,
                    'registration_number'        => $registration_number, 
                    'luggage_capacity'    => $luggage_capacity,
                    'total_kilometer'    => $total_kilometer,
                    'insurance_image_name'    => $insurance_filename,
                    'permit_image_name'    => $permit_filename,
                    'vehicle_front_image'    => $vehicle_front_filename,
                    'vehicle_back_image'    => $vehicle_back_filename,
                    'vehicle_left_image'    => $vehicle_left_filename,
                    'vehicle_right_image'    => $vehicle_right_filename,
                    'vehicle_insideone_image'    => $vehicle_insideone_filename,
                    'vehicle_insidetwo_image'    => $vehicle_insidetwo_filename,
                    'vehicle_owner_id'    => $id,
                    'status'                  => 'pending',
                    'added_by'                  => 'owner'
                );
                
                $inserted_id = $this->master_model->insertRecord('vehicle_details',$arr_insert,true);
                               
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully. <br> Now visit choudhary yatra office with your original document and one xerox copy.");
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
        $bus_type = $this->master_model->getRecords('bus_type');

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
        $this->arr_view_data['bus_type'] = $bus_type;
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
            $arr_data = $this->master_model->getRecords('vehicle_details');
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
            
            if($this->master_model->updateRecord('vehicle_details',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('vehicle_details');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('vehicle_details',$arr_update,$arr_where))
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
                $this->form_validation->set_rules('vehicle_bus_type', 'vehicle_bus_type', 'required');
                $this->form_validation->set_rules('vehicle_type', 'vehicle_type', 'required');
                $this->form_validation->set_rules('fuel_type', 'fuel_type', 'required');
                $this->form_validation->set_rules('vehicle_brand', 'vehicle_brand', 'required');
                $this->form_validation->set_rules('seat_capacity', 'seat_capacity', 'required');
            
                if($this->form_validation->run() == TRUE)
                {
// =======================================upload  insurance image============================================================
                 $old_insurance_img_name = $this->input->post('old_insurance_img_name');
                
                    if(!empty($_FILES['insurance_image_name']) && $_FILES['insurance_image_name']['name'] !='')
                    {
                    $file_name     = $_FILES['insurance_image_name']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name = $_FILES['insurance_image_name'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                    if($file_name['name']!="")
                    {
                        $ext = explode('.',$_FILES['insurance_image_name']['name']); 
                        $config['file_name'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }   

                    $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                    
                    $config['upload_path']   = './uploads/insurance_photo/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                    $config['max_size']      = '10000';
                    $config['file_name']     = $file_name_to_dispaly;
                    $config['overwrite']     = TRUE;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
                    
                    if(!$this->upload->do_upload('insurance_image_name'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name['name']!="")
                    {   
                        $file_name = $this->upload->data();
                        $insurance_filename = $file_name_to_dispaly;
                        if($old_insurance_img_name!='') unlink('./uploads/insurance_photo/'.$old_insurance_img_name);
                    }
                    else
                    {
                        $insurance_filename = $this->input->post('insurance_image_name',TRUE);
                    }
                }
                else
                {
                    $insurance_filename = $old_insurance_img_name;
                }
// =======================================upload  insurance image============================================================

//============================upload  permit image================================================================================
            $old_permit_img_name = $this->input->post('old_permit_img_name');
                
                if(!empty($_FILES['permit_image_name']) && $_FILES['permit_image_name']['name'] !='')
                {
               $file_name     = $_FILES['permit_image_name']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                $file_name = $_FILES['permit_image_name'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['permit_image_name']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/permit_photo/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('permit_image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $permit_filename = $file_name_to_dispaly_pdf;
                    if($old_permit_img_name!='') unlink('./uploads/permit_photo/'.$old_permit_img_name);
                }
                else
                {
                    $permit_filename = $this->input->post('permit_image_name',TRUE);
                    
                }
            }
            else
            {
                $permit_filename = $old_permit_img_name;
                
            }
//============================upload  permit image================================================================================
			
//============================upload  vehicle_front_image ================================================================================

            $old_vehicle_front_img_name = $this->input->post('old_vehicle_front_img_name');
                            
            if(!empty($_FILES['vehicle_front_image']) && $_FILES['vehicle_front_image']['name'] !='')
            {
            $file_name     = $_FILES['vehicle_front_image']['name'];

            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

            $file_name = $_FILES['vehicle_front_image'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

            if($file_name['name']!="")
            {
                $ext = explode('.',$_FILES['vehicle_front_image']['name']); 
                $config['file_name'] = rand(1000,90000);

                if(!in_array($ext[1],$arr_extension))
                {
                    $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    redirect($this->module_url_path.'/edit/'.$id);
                }
            }   

            $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

            $config['upload_path']   = './uploads/vehicle_photo/';
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
            $config['max_size']      = '10000';
            $config['file_name']     = $file_name_to_dispaly_pdf;
            $config['overwrite']     = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config); // Important

            if(!$this->upload->do_upload('vehicle_front_image'))
            {  
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error_message',$this->upload->display_errors());
                redirect($this->module_url_path.'/edit/'.$id);
            }
            if($file_name['name']!="")
            {   
                $file_name = $this->upload->data();
                $vehicle_front_filename = $file_name_to_dispaly_pdf;
                if($old_vehicle_front_img_name!='') unlink('./uploads/vehicle_photo/'.$old_vehicle_front_img_name);
            }
            else
            {
                $vehicle_front_filename = $this->input->post('vehicle_front_image',TRUE);
                
            }
            }
            else
            {
            $vehicle_front_filename = $old_vehicle_front_img_name;

            }
//============================upload  vehicle_front_image ================================================================================

 //============================upload  vehicle_back_image ================================================================================

            $old_vehicle_back_img_name = $this->input->post('old_vehicle_back_img_name');
                            
            if(!empty($_FILES['vehicle_back_image']) && $_FILES['vehicle_back_image']['name'] !='')
            {
            $file_name     = $_FILES['vehicle_back_image']['name'];
            
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

            $file_name = $_FILES['vehicle_back_image'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

            if($file_name['name']!="")
            {
                $ext = explode('.',$_FILES['vehicle_back_image']['name']); 
                $config['file_name'] = rand(1000,90000);

                if(!in_array($ext[1],$arr_extension))
                {
                    $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    redirect($this->module_url_path.'/edit/'.$id);
                }
            }   

            $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

            $config['upload_path']   = './uploads/vehicle_photo/';
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
            $config['max_size']      = '10000';
            $config['file_name']     = $file_name_to_dispaly_pdf;
            $config['overwrite']     = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config); // Important
            
            if(!$this->upload->do_upload('vehicle_back_image'))
            {  
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error_message',$this->upload->display_errors());
                redirect($this->module_url_path.'/edit/'.$id);
            }
            if($file_name['name']!="")
            {   
                $file_name = $this->upload->data();
                $vehicle_back_filename = $file_name_to_dispaly_pdf;
                if($old_vehicle_back_img_name!='') unlink('./uploads/vehicle_photo/'.$old_vehicle_back_img_name);
            }
            else
            {
                $vehicle_back_filename = $this->input->post('vehicle_back_image',TRUE);
                
            }
            }
            else
            {
            $vehicle_back_filename = $old_vehicle_back_img_name;
            
            }
 //============================upload  vehicle_back_image ================================================================================

 //============================upload  vehicle_left_image ================================================================================

 $old_vehicle_left_img_name = $this->input->post('old_vehicle_left_img_name');
                
                if(!empty($_FILES['vehicle_left_image']) && $_FILES['vehicle_left_image']['name'] !='')
                {
               $file_name     = $_FILES['vehicle_left_image']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['vehicle_left_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['vehicle_left_image']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/vehicle_photo/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('vehicle_left_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $vehicle_left_filename = $file_name_to_dispaly_pdf;
                    if($old_vehicle_left_img_name!='') unlink('./uploads/vehicle_photo/'.$old_vehicle_left_img_name);
                }
                else
                {
                    $vehicle_left_filename = $this->input->post('vehicle_left_image',TRUE);
                    
                }
            }
            else
            {
                $vehicle_left_filename = $old_vehicle_left_img_name;
                
            }
//============================upload  vehicle_left_image ================================================================================

//============================upload  vehicle_right_image ================================================================================

$old_vehicle_right_img_name = $this->input->post('old_vehicle_right_img_name');
                
                if(!empty($_FILES['vehicle_right_image']) && $_FILES['vehicle_right_image']['name'] !='')
                {
               $file_name     = $_FILES['vehicle_right_image']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['vehicle_right_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['vehicle_right_image']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/vehicle_photo/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('vehicle_right_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $vehicle_right_filename = $file_name_to_dispaly_pdf;
                    if($old_vehicle_right_img_name!='') unlink('./uploads/vehicle_photo/'.$old_vehicle_right_img_name);
                }
                else
                {
                    $vehicle_right_filename = $this->input->post('vehicle_right_image',TRUE);
                    
                }
            }
            else
            {
                $vehicle_right_filename = $old_vehicle_right_img_name;
                
            }
//============================upload  vehicle_right_image ========================================================

//============================upload  vehicle_insideone_image ================================================================================

$old_vehicle_insideone_img_name = $this->input->post('old_vehicle_insideone_img_name');
                
                if(!empty($_FILES['vehicle_insideone_image']) && $_FILES['vehicle_insideone_image']['name'] !='')
                {
               $file_name     = $_FILES['vehicle_insideone_image']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['vehicle_insideone_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['vehicle_insideone_image']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/vehicle_photo/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('vehicle_insideone_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $vehicle_insideone_filename = $file_name_to_dispaly_pdf;
                    if($old_vehicle_insideone_img_name!='') unlink('./uploads/vehicle_photo/'.$old_vehicle_insideone_img_name);
                }
                else
                {
                    $vehicle_insideone_filename = $this->input->post('vehicle_insideone_image',TRUE);
                    
                }
            }
            else
            {
                $vehicle_insideone_filename = $old_vehicle_insideone_img_name;
                
            }
//============================upload  vehicle_insideone_image ========================================================

//============================upload  vehicle_insidetwo_image ================================================================================

$old_vehicle_insidetwo_img_name = $this->input->post('old_vehicle_insidetwo_img_name');
                
                if(!empty($_FILES['vehicle_insidetwo_image']) && $_FILES['vehicle_insidetwo_image']['name'] !='')
                {
               $file_name     = $_FILES['vehicle_insidetwo_image']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['vehicle_insidetwo_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['vehicle_insidetwo_image']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/vehicle_photo/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('vehicle_insidetwo_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $vehicle_insidetwo_filename = $file_name_to_dispaly_pdf;
                    if($old_vehicle_insidetwo_img_name!='') unlink('./uploads/vehicle_photo/'.$old_vehicle_insidetwo_img_name);
                }
                else
                {
                    $vehicle_insidetwo_filename = $this->input->post('vehicle_insidetwo_image',TRUE);
                    
                }
            }
            else
            {
                $vehicle_insidetwo_filename = $old_vehicle_insidetwo_img_name;
                
            }
//============================upload  vehicle_insidetwo_image ========================================================


                $vehicle_bus_type  = $this->input->post('vehicle_bus_type'); 
                $vehicle_type  = $this->input->post('vehicle_type'); 
                $fuel_type        = trim($this->input->post('fuel_type'));
                $vehicle_brand        = trim($this->input->post('vehicle_brand'));
                $seat_capacity = trim($this->input->post('seat_capacity'));
                $insurance_number = trim($this->input->post('insurance_number'));
                $insurance_valid_date = trim($this->input->post('insurance_valid_date'));
                $permit_number = trim($this->input->post('permit_number'));
                $permit_valid_date = trim($this->input->post('permit_valid_date'));
                $air_conditionar = trim($this->input->post('air_conditionar'));
                $vehicle_model = trim($this->input->post('vehicle_model'));
                $registration_number = trim($this->input->post('registration_number'));
                $luggage_capacity = trim($this->input->post('luggage_capacity'));
                $total_kilometer = trim($this->input->post('total_kilometer'));

                $arr_update = array(
                    'vehicle_bus_type'   =>   $vehicle_bus_type,
                    'vehicle_type'   =>   $vehicle_type,
                    'fuel_type'          => $fuel_type,
                    'vehicle_brand'          => $vehicle_brand,
                    'seat_capacity'          => $seat_capacity,
                    'insurance_number'          => $insurance_number,
                    'insurance_valid_date'          => $insurance_valid_date,
                    'permit_number'          => $permit_number,
                    'permit_valid_date'          => $permit_valid_date,
                    'air_conditionar'          => $air_conditionar,
                    'vehicle_model'        => $vehicle_model,
                    'registration_number'        => $registration_number, 
                    'luggage_capacity'    => $luggage_capacity,
                    'total_kilometer'    => $total_kilometer,
                    'insurance_image_name'    => $insurance_filename,
                    'permit_image_name'    => $permit_filename,
                    'vehicle_front_image'    => $vehicle_front_filename,
                    'vehicle_back_image'    => $vehicle_back_filename,
                    'vehicle_left_image'    => $vehicle_left_filename,
                    'vehicle_right_image'    => $vehicle_right_filename,
                    'vehicle_insideone_image'    => $vehicle_insideone_filename,
                    'vehicle_insidetwo_image'    => $vehicle_insidetwo_filename
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('vehicle_details',$arr_update,$arr_where);
                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully. <br> Now visit choudhary yatra office with your original document and one xerox copy.");
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
        $this->db->where('is_active','yes');
        $bus_type = $this->master_model->getRecords('bus_type');
        
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

        $fields = "vehicle_details.*,vehicle_type.vehicle_type_name,vehicle_fuel.vehicle_fuel_name,vehicle_brand.vehicle_brand_name";
        $this->db->where('vehicle_details.is_deleted','no');
        $this->db->where('vehicle_details.id',$id);
        $this->db->join("vehicle_type", 'vehicle_details.vehicle_type=vehicle_type.id','left');
        $this->db->join("vehicle_fuel", 'vehicle_details.fuel_type=vehicle_fuel.id','left');
        $this->db->join("vehicle_brand", 'vehicle_details.vehicle_brand=vehicle_brand.id','left');
        $arr_data = $this->master_model->getRecords('vehicle_details',array('vehicle_details.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        

        $this->arr_view_data['vehicle_ssession_owner_name']        = $vehicle_ssession_owner_name;
        $this->arr_view_data['vehicle_type']        = $vehicle_type;
        $this->arr_view_data['vehicle_fuel']        = $vehicle_fuel;
        $this->arr_view_data['bus_type']        = $bus_type;
        $this->arr_view_data['vehicle_brand']        = $vehicle_brand;
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
        $this->db->where('is_active','yes');
        $vehicle_type = $this->master_model->getRecords('vehicle_type');

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $vehicle_fuel = $this->master_model->getRecords('vehicle_fuel');
        // print_r($package_type); die;

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $vehicle_brand = $this->master_model->getRecords('vehicle_brand');

        $fields = "vehicle_details.*,vehicle_type.vehicle_type_name,vehicle_fuel.vehicle_fuel_name,vehicle_brand.vehicle_brand_name,
        bus_type.bus_type";
        $this->db->where('vehicle_details.is_deleted','no');
        $this->db->where('vehicle_details.id',$id);
        $this->db->join("vehicle_type", 'vehicle_details.vehicle_type=vehicle_type.id','left');
        $this->db->join("vehicle_fuel", 'vehicle_details.fuel_type=vehicle_fuel.id','left');
        $this->db->join("vehicle_brand", 'vehicle_details.vehicle_brand=vehicle_brand.id','left');
        $this->db->join("bus_type", 'vehicle_details.vehicle_bus_type=bus_type.id','left');
        $arr_data = $this->master_model->getRecords('vehicle_details',array('vehicle_details.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        $this->arr_view_data['vehicle_ssession_owner_name']        = $vehicle_ssession_owner_name;
        $this->arr_view_data['vehicle_type']        = $vehicle_type;
        $this->arr_view_data['vehicle_fuel']        = $vehicle_fuel;
        $this->arr_view_data['vehicle_brand']        = $vehicle_brand;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
    }
   
   
}