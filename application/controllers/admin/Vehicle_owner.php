<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_owner extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/vehicle_owner";
        $this->module_title       = "Vehicle Owner";
        $this->module_url_slug    = "vehicle_owner";
        $this->module_view_folder = "vehicle_owner/";    
        $this->load->library('upload');
	}

	public function index()
	{	    
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $vehicle_owner = $this->master_model->getRecords('vehicle_owner');

        $this->arr_view_data['vehicle_owner']        = $vehicle_owner;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}



    public function add()
    {          
        if(isset($_POST['submit']))
        {
            $this->form_validation->set_rules('vehicle_owner_name', 'vehicle_owner_name', 'required');
            $this->form_validation->set_rules('mobile_number1', 'mobile_number1', 'required');
            // $this->form_validation->set_rules('email', 'email', 'required');
            // $this->form_validation->set_rules('home_address', 'home_address', 'required');
            // $this->form_validation->set_rules('office_address', 'office_address', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() == TRUE)
            {
                // ============================= aadhar card 1 ========================================
                $file_name     = $_FILES['aadhar_front_image']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['aadhar_front_image']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/add');  
                    }
                // }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/vehicle_owner_aadhar_img/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('aadhar_front_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                // if($file_name!="")
                // {
                    $file_name = $this->upload->data();
                    $front_filename = $file_name_to_dispaly;
                }

                else
                {
                    $front_filename = $this->input->post('aadhar_front_image',TRUE);
                }

                // ============================= aadhar card 1 ========================================

                // ============================= aadhar card 2 ========================================
                $file_name     = $_FILES['aadhar_back_image']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['aadhar_back_image']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/add');  
                    }
                // }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/vehicle_owner_aadhar_img/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('aadhar_back_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                // if($file_name!="")
                // {
                    $file_name = $this->upload->data();
                    $back_filename = $file_name_to_dispaly;
                }

                else
                {
                    $back_filename = $this->input->post('aadhar_back_image',TRUE);
                }
                
                // ============================= aadhar card 2 ========================================

                // =====================================profile photo=======================================
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['image_name']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/add');  
                    }
                // }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/vehicle_owner_profile/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                // if($file_name!="")
                // {
                    $file_name = $this->upload->data();
                    $filename = $file_name_to_dispaly;
                }

                else
                {
                    $filename = $this->input->post('image_name',TRUE);
                }
            
                          
                $vehicle_owner_name  = $this->input->post('vehicle_owner_name'); 
                $mobile_number1 = trim($this->input->post('mobile_number1'));
                $mobile_number2 = trim($this->input->post('mobile_number2'));
                $email = trim($this->input->post('email'));
                $home_address = trim($this->input->post('home_address'));
                $office_address = trim($this->input->post('office_address'));
				$password = trim($this->input->post('password'));

                $arr_insert = array(
                    'vehicle_owner_name'   =>   $vehicle_owner_name,
					'mobile_number1'   =>   $mobile_number1,
					'mobile_number2'   =>   $mobile_number2,
                    'email'          => $email,
                    'home_address'          => $home_address,
                    'office_address'          => $office_address,
                    'password'          => $password,
                    'aadhar_front_image'          => $front_filename,
                    'aadhar_back_image'          => $back_filename,
                    'profile_image'          => $filename
                );
                
                $inserted_id = $this->master_model->insertRecord('vehicle_owner',$arr_insert,true);
					
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

        $this->arr_view_data['action']          = 'add';       
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('vehicle_owner');
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
            
            if($this->master_model->updateRecord('vehicle_owner',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('vehicle_owner');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('vehicle_owner',$arr_update,$arr_where))
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
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }else{
           
            if($this->input->post('submit'))
            {
				$this->form_validation->set_rules('vehicle_owner_name', 'vehicle_owner_name', 'required');
                $this->form_validation->set_rules('mobile_number1', 'mobile_number1', 'required');
                // $this->form_validation->set_rules('email', 'email', 'required');
                // $this->form_validation->set_rules('home_address', 'home_address', 'required');
                // $this->form_validation->set_rules('office_address', 'office_address', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                    
                if($this->form_validation->run() == TRUE)
                { 

                    // ==================================Aadhar card image 1===============================

                    $old_aadhar_front_image = $this->input->post('old_aadhar_front_image');
                
                    if(!empty($_FILES['aadhar_front_image']) && $_FILES['aadhar_front_image']['name'] !='')
                    {
                    $file_name     = $_FILES['aadhar_front_image']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name = $_FILES['aadhar_front_image'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                    if($file_name['name']!="")
                    {
                        $ext = explode('.',$_FILES['aadhar_front_image']['name']); 
                        $config['file_name'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }   

                    $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                    
                    $config['upload_path']   = './uploads/vehicle_owner_aadhar_img/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                    $config['max_size']      = '10000';
                    $config['file_name']     = $file_name_to_dispaly;
                    $config['overwrite']     = TRUE;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
                    
                    if(!$this->upload->do_upload('aadhar_front_image'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name['name']!="")
                    {   
                        $file_name = $this->upload->data();
                        $front_filename = $file_name_to_dispaly;
                        if($old_aadhar_front_image!='') unlink('./uploads/vehicle_owner_aadhar_img/'.$old_aadhar_front_image);
                    }
                    else
                    {
                        $front_filename = $this->input->post('aadhar_front_image',TRUE);
                    }
                }
                else
                {
                    $front_filename = $old_aadhar_front_image;
                }
                // ==================================Aadhar card image 1===============================

                // ==================================Aadhar card image 2===============================

                $old_aadhar_back_image = $this->input->post('old_aadhar_back_image');
                
                    if(!empty($_FILES['aadhar_back_image']) && $_FILES['aadhar_back_image']['name'] !='')
                    {
                    $file_name     = $_FILES['aadhar_back_image']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name = $_FILES['aadhar_back_image'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                    if($file_name['name']!="")
                    {
                        $ext = explode('.',$_FILES['aadhar_back_image']['name']); 
                        $config['file_name'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }   

                    $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                    
                    $config['upload_path']   = './uploads/vehicle_owner_aadhar_img/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                    $config['max_size']      = '10000';
                    $config['file_name']     = $file_name_to_dispaly;
                    $config['overwrite']     = TRUE;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
                    
                    if(!$this->upload->do_upload('aadhar_back_image'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name['name']!="")
                    {   
                        $file_name = $this->upload->data();
                        $back_filename = $file_name_to_dispaly;
                        if($old_aadhar_back_image!='') unlink('./uploads/vehicle_owner_aadhar_img/'.$old_aadhar_back_image);
                    }
                    else
                    {
                        $back_filename = $this->input->post('aadhar_back_image',TRUE);
                    }
                }
                else
                {
                    $back_filename = $old_aadhar_back_image;
                }

                // =====================Aadhar image 2============================

                // ==================================profile photo===============================

                $old_image_name = $this->input->post('old_image_name');
                
                    if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                    {
                    $file_name     = $_FILES['image_name']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name = $_FILES['image_name'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

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
                    
                    $config['upload_path']   = './uploads/vehicle_owner_profile/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
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
                        $old_filename = $file_name_to_dispaly;
                        if($old_image_name!='') unlink('./uploads/vehicle_owner_profile/'.$old_image_name);
                    }
                    else
                    {
                        $old_filename = $this->input->post('image_name',TRUE);
                    }
                }
                else
                {
                    $old_filename = $old_image_name;
                }

                // =====================profile photo============================

                    $vehicle_owner_name  = $this->input->post('vehicle_owner_name'); 
                    $mobile_number1 = trim($this->input->post('mobile_number1'));
                    $mobile_number2 = trim($this->input->post('mobile_number2'));
                    $email = trim($this->input->post('email'));
                    $home_address = trim($this->input->post('home_address'));
                    $office_address = trim($this->input->post('office_address'));
                    $password = trim($this->input->post('password'));
                
                    $arr_update = array(
                        'vehicle_owner_name'   =>   $vehicle_owner_name,
                        'mobile_number1'   =>   $mobile_number1,
                        'mobile_number2'   =>   $mobile_number2,
                        'email'          => $email,
                        'home_address'          => $home_address,
                        'office_address'          => $office_address,
                        'password'          => $password,
                        'aadhar_front_image'          => $front_filename,
                        'aadhar_back_image'          => $back_filename,
                        'profile_image'          => $old_filename
                    );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('vehicle_owner',$arr_update,$arr_where);
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
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $vehicle_owner = $this->master_model->getRecords('vehicle_owner');
        // print_r($vehicle_owner); die;

        $this->arr_view_data['vehicle_owner']        = $vehicle_owner;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    // Get Details of Package
    public function details($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $vehicle_owner = $this->master_model->getRecords('vehicle_owner');
        // print_r($vehicle_owner); die;
        
        $this->arr_view_data['vehicle_owner']        = $vehicle_owner;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
	
	function check_email_add_avalibility()  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid email address</span></label>';  
           }  
           else  
           {  
               $email=$this->input->post('email');
                $this->db->where('email',$email);
                $arr_data = $this->master_model->getRecords('agent'); 
                $count=count($arr_data);
                if($count > 0)  
                {                     
                    echo true;
                }  
                else if($count == 0)
                {                     
                     echo false;
                }  
           }  
      }  
	
	
	
	function check_email_edit_avalibility()  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
               $email=$this->input->post('email');
               $agent_id=$this->input->post('agent_id');
               
                $this->db->where('id !=',$agent_id);
                $this->db->where('email',$email);
                $arr_data = $this->master_model->getRecords('agent');
             
                $count=count($arr_data);
                
              if($count > 0)
                {  
                     echo true;
                } 
                else if($count == 0)
                {   
                     echo false;
                }  
           }  
      }
   
}