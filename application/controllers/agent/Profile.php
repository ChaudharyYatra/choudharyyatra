<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/profile";
        $this->module_title       = "Profile";
        $this->module_url_slug    = "profile";
        $this->module_view_folder = "profile/";
        $this->arr_view_data = [];
	 }


     public function index()
     {
         $id = $this->session->userdata('agent_sess_id');
         
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         
        //  $this->db->where('id',$id);         
        //  $arr_data = $this->master_model->getRecords('agent');

        $fields = "agent.*,department.department,taluka_table.taluka,district_table.district,state_table.state_name";
        $this->db->where('agent.id',$id);
        $this->db->join("department", 'agent.department=department.id','left');
        $this->db->join("taluka_table", 'agent.taluka_name=taluka_table.id','left');
        $this->db->join("district_table", 'agent.district_name=district_table.id','left');
        $this->db->join("state_table", 'agent.state_name=state_table.id','left');
        $arr_data = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);


         $agent_sess_name = $this->session->userdata('agent_name');
         
         $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = "Agent Profile Details";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
     }


     // Edit - 

     public function edit($id)
     {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
 
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('agent');
            //   print_r($arr_data); die;

            foreach($arr_data  as $arr_data_info){
                $state_id = $arr_data_info['state_name'];
                $district_id = $arr_data_info['taluka_name'];
            }
             
            $profile_update_count=$arr_data[0]['profile_update_count'];
            //  print_r($profile_update_count); die;

            $agent_id=$arr_data[0]['id'];
            $department_id=$arr_data[0]['department'];
             

             if($this->input->post('submit'))
             {
                 $this->form_validation->set_rules('city', 'City', 'required');
                 $this->form_validation->set_rules('booking_center', 'Booking Center', 'required');
                 $this->form_validation->set_rules('agent_name', 'Agent Name', 'required');
                 $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
                //  $this->form_validation->set_rules('mobile_number2', 'Mobile Number2', 'required');
                 $this->form_validation->set_rules('email', 'Email Address', 'required');
                 $this->form_validation->set_rules('pan_card', 'Pan card', 'required');
                 $this->form_validation->set_rules('company_gst_number', 'Company GST Number', 'required');
                //  $this->form_validation->set_rules('office_address', 'Office Address', 'required');

                 
                 if($this->form_validation->run() == TRUE)
                 {             
                    $old_img_name = $this->input->post('old_img_name');
                    if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                    {
                    $file_name     = $_FILES['image_name']['name'];
                    $arr_extension = array('png','jpg','jpeg','JPEG','PNG','JPG');

                    $file_name = $_FILES['image_name'];
                    $arr_extension = array('png','jpg','jpeg','JPEG','PNG','JPG');

                    if($file_name['name']!="")
                    {
                        $ext = explode('.',$_FILES['image_name']['name']); 
                        $config['file_name'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }   

                    $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                    
                    $config['upload_path']   = './uploads/agent_photo/';
                    $config['allowed_types'] = 'JPEG|PNG|JPG|png|jpg|jpeg';  
                    $config['max_size']      = '10000';
                    $config['file_name']     = $file_name_to_dispaly;
                    $config['overwrite']     = TRUE;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
                    
                    if(!$this->upload->do_upload('image_name'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                         redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name['name']!="")
                    {   
                        $file_name = $this->upload->data();
                        $filename = $file_name_to_dispaly;
                        if($old_img_name!='') unlink('./uploads/agent_photo/'.$old_img_name);
                    }

                    else
                    {
                        $filename = $this->input->post('image_name',TRUE);
                    }
                }
                else
                {
                    $filename = $old_img_name;
                }  
                //---------------------------------------------------------
                
                $old_qr_code_name = $this->input->post('old_qr_code_name');
                
                if(!empty($_FILES['qr_code']) && $_FILES['qr_code']['name'] !='')
                {
                $file_name     = $_FILES['qr_code']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');
        
                $file_name = $_FILES['qr_code'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');
        
                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['qr_code']['name']); 
                    $config['file_name'] = rand(1000,90000);
        
                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   
        
                $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                
                $config['upload_path']   = './uploads/QR_code_image/';
                $config['allowed_types'] = 'png|jpg|jpeg|PNG|JPEG|JPG';
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('qr_code'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $filename_qr_code = $file_name_to_dispaly;
                    if($old_qr_code_name!='') unlink('./uploads/QR_code_image/'.$old_qr_code_name);
                }
                else
                {
                    $filename_qr_code = $this->input->post('qr_code',TRUE);
                }
            }
            else
            {
                $filename_qr_code = $old_qr_code_name;
            }
                // ---------------------------------------------------------

                  $city  = $this->input->post('city'); 
                  $booking_center        = trim($this->input->post('booking_center'));
                  $agent_name    = trim($this->input->post('agent_name'));
                  $mobile_number1 = trim($this->input->post('mobile_number1'));
                  $mobile_number2 = trim($this->input->post('mobile_number2'));
                  $email = trim($this->input->post('email'));
                  $pan_card = trim($this->input->post('pan_card'));
                  $gst_number = trim($this->input->post('company_gst_number'));
                //   $office_aadress = trim($this->input->post('office_address'));
                  $fld_registration_date = $this->input->post('fld_registration_date');
                  $upi_id  = $this->input->post('upi_id');

                    $flat_no  = $this->input->post('flat_no');
                    $building_house_nm  = $this->input->post('building_house_nm');
                    $street_name  = $this->input->post('street_name');
                    $landmark  = $this->input->post('landmark'); 

                    $agent_state  = $this->input->post('agent_state'); 
                    $agent_district  = $this->input->post('agent_district');
                    $agent_taluka  = $this->input->post('agent_taluka');
                    $agent_city  = $this->input->post('agent_city');
                 
                 
               
                 
                    if($profile_update_count == 0)
                    {
                        $profile_count = $profile_update_count+1;
                        $arr_update = array(
                            'city'   =>    $city,
                            'booking_center'          => $booking_center,
                            'agent_name'          => $agent_name,
                            'mobile_number1'          =>  $mobile_number1,
                            'mobile_number2'          => $mobile_number2,
                            'email'          => $email,
                            'fld_pan_number'          => $pan_card,
                            'fld_GST_number'          => $gst_number,
                            // 'fld_office_address'          => $office_aadress,
                            'image_name' => $filename,
                            'profile_update_count' => $profile_count,
                            'fld_registration_date' => $fld_registration_date,

                            'qr_code_image'     =>   $filename_qr_code,
                            'upi_id'     =>   $upi_id,
                            'status_of_QR_UPI'     => 'Pending',

                            'flat_no' =>   $flat_no,
                            'building_house_nm'   =>   $building_house_nm,
                            'street_name'   =>   $street_name,   
                            'landmark'    =>$landmark,

                            'state_name'    =>$agent_state,
                            'district_name' =>   $agent_district,
                            'taluka_name'   =>   $agent_taluka,
                            'city_name'     =>   $agent_city
                        );

                     $arr_where     = array("id" => $id);
                     $inserted_id = $this->master_model->updateRecord('agent',$arr_update,$arr_where);
                    }
                    else
                    {
                        $arr_update = array(
                            'city'   =>    $city,
                            'booking_center'          => $booking_center,
                            'agent_name'          => $agent_name,
                            'mobile_number1'          =>  $mobile_number1,
                            'mobile_number2'          => $mobile_number2,
                            'email'          => $email,
                            'fld_pan_number'          => $pan_card,
                            'fld_GST_number'          => $gst_number,
                            // 'fld_office_address'          => $office_aadress,
                            'image_name' => $filename,
                            'agent_id'  => $agent_id,
                            'department' => $department_id,
                            'profile_update_request' => 'requested',
                            'fld_registration_date' => $fld_registration_date,
                            'qr_code_image'     =>   $filename_qr_code,
                            'upi_id'     =>   $upi_id,
                            'status_of_QR_UPI'     => 'Pending',
                            'flat_no' =>   $flat_no,
                            'building_house_nm'   =>   $building_house_nm,
                            'street_name'   =>   $street_name,   
                            'landmark'    =>$landmark,

                            'state_name'    =>$agent_state,
                            'district_name' =>   $agent_district,
                            'taluka_name'   =>   $agent_taluka,
                            'city_name'     =>   $agent_city
                        );

                        $arr_where2     = array("id" => $id);
                        $arr_update2 = array(
                            'profile_update_request' =>  'requested',
                            'status_of_QR_UPI' =>  'Pending'
                        );
                        $inserted_id = $this->master_model->updateRecord('agent',$arr_update2,$arr_where2);
                        $inserted_id = $this->master_model->insertRecord('agent_temp_tbl',$arr_update,true);
                        //$this->master_model->updateRecord('agent_temp_tbl',$arr_update,$arr_where);
                    }
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

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $state_data = $this->master_model->getRecords('state_table');
    
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->where('id',$state_id);
            $this->db->order_by('id','ASC');
            $district_data = $this->master_model->getRecords('district_table');
            // print_r($district_data); die;
    
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->where('id',$district_id);
            $this->db->order_by('id','ASC');
            $taluka_data = $this->master_model->getRecords('taluka_table');
            
            $this->db->order_by('id','desc');
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $department_data = $this->master_model->getRecords('department');

         
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['state_data']        = $state_data;
        $this->arr_view_data['district_data']        = $district_data;
        $this->arr_view_data['taluka_data']        = $taluka_data;
        $this->arr_view_data['department_data']        = $department_data;
         $this->arr_view_data['profile_update_count']  = $profile_update_count;
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['page_title']      = "Edit Profile ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
     }
    

        public function get_district(){ 
            // POST data 
            // $all_b=array();
            $district_data = $this->input->post('did');
                // print_r($boarding_office_location); die;
                                $this->db->where('is_deleted','no');
                                $this->db->where('is_active','yes');
                                $this->db->where('state_id',$district_data);   
                                $data = $this->master_model->getRecords('district_table');
                echo json_encode($data);
        }

        public function get_taluka(){ 
            
            // POST data 
            // $all_b=array();
            $taluka_data = $this->input->post('did');
            // print_r($taluka_data); die;
                            $this->db->where('is_deleted','no');
                            $this->db->where('is_active','yes');
                            $this->db->where('district_id',$taluka_data);   
                            $data = $this->master_model->getRecords('taluka_table');
                            // print_r($data); die;
            echo json_encode($data); 
        }


}


