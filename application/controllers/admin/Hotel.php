<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hotel extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/hotel";
        $this->module_title       = "Hotel";
        $this->module_url_slug    = "hotel";
        $this->module_view_folder = "hotel/";    
        $this->load->library('upload');
	}

	public function index()
	{	    
        $fields = "hotel.*";
        // $this->db->order_by('agent.arrange_id','asc');        
        $this->db->where('hotel.is_deleted','no');        
        // $this->db->join("department", 'agent.department=department.id','left');
        $arr_data = $this->master_model->getRecords('hotel',array('hotel.is_deleted'=>'no'),$fields);

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
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

            $this->form_validation->set_rules('state', 'state', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('hotel_name', 'hotel_name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required');
            $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
            $this->form_validation->set_rules('hotel_address', 'Hotel Address', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() == TRUE)
            {
                if($_FILES['image_name']['name']!=''){

                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');
                $file_name = $_FILES['image_name'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['image_name']['name']);
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }

                }  
                $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

                $config['upload_path']   = './uploads/hotel/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);

                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path); 
                }

                if($file_name['name']!="")
                {  
                    $file_name = $this->upload->data();
                    $image_name_filename = $file_name_to_dispaly_pdf;
                }
                else
                {
                    $image_name_filename = $this->input->post('image_name',TRUE);
                }
                 } 
                 else{
                    $image_name_filename  = '';
                 }

                // ---------------------------------------------------------------------
                
                if($_FILES['image_name2']['name']!=''){

                $file_name     = $_FILES['image_name2']['name'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                $file_name = $_FILES['image_name2'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['image_name2']['name']);
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }

                }  
                $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

                $config['upload_path']   = './uploads/hotel/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);

                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('image_name2'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path); 
                }

                if($file_name['name']!="")
                {  
                    $file_name = $this->upload->data();
                    $image_name2_filename = $file_name_to_dispaly_pdf;
                }
                else
                {
                    $image_name2_filename = $this->input->post('image_name2',TRUE);
                }
            } 
            else{
                $image_name2_filename  = '';
            }

                // ------------------=-------------------------------------------------------------

                if($_FILES['image_name3']['name']!=''){

                $file_name     = $_FILES['image_name3']['name'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                $file_name = $_FILES['image_name3'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['image_name3']['name']);
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }

                }  
                $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

                $config['upload_path']   = './uploads/hotel/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);

                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('image_name3'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path); 
                }

                if($file_name['name']!="")
                {  
                    $file_name = $this->upload->data();
                    $image_name3_filename = $file_name_to_dispaly_pdf;
                }
                else
                {
                    $image_name3_filename = $this->input->post('image_name3',TRUE);
                }
            } 
            else{
                $image_name3_filename  = '';
            }

// ===================================================================
            
                $state  = trim($this->input->post('state'));
                $city  = trim($this->input->post('city'));
                $hotel_name  = trim($this->input->post('hotel_name'));
                $email = trim($this->input->post('email'));
                $mobile_number1 = trim($this->input->post('mobile_number1'));
                $mobile_number2 = trim($this->input->post('mobile_number2'));
                $landline = trim($this->input->post('landline'));
                $hotel_address = trim($this->input->post('hotel_address'));
				$password = trim($this->input->post('password'));

                $arr_insert = array(
                    'state'         => $state,
                    'city'          => $city,
                    'hotel_name' => $hotel_name,
                    'mobile_number1'   => $mobile_number1,
                    'mobile_number2'   => $mobile_number2,
                    'landline'   => $landline,
                    'email'            => $email,
                    'hotel_address'    => $hotel_address,
                    'image_name'    => $image_name_filename,
                    'image_name2'    => $image_name2_filename,
                    'image_name3'    => $image_name3_filename,
                    'password'         => $password
                );
                
                $inserted_id = $this->master_model->insertRecord('hotel',$arr_insert,true);
            }
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," Hotel Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }

                redirect($this->module_url_path.'/index');
            
        }   

            $this->db->order_by('id','desc');
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $state_data = $this->master_model->getRecords('state');

            $this->arr_view_data['state_data']        = $state_data;
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
            $arr_data = $this->master_model->getRecords('hotel');
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
            
            if($this->master_model->updateRecord('hotel',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('hotel');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('hotel',$arr_update,$arr_where))
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
           
            $this->db->where('id',$id);
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $arr_data = $this->master_model->getRecords('hotel');

            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('state', 'state', 'required');
                $this->form_validation->set_rules('city', 'city', 'required');
                $this->form_validation->set_rules('hotel_name', 'hotel_name', 'required');
                $this->form_validation->set_rules('email', 'Email Address', 'required');
                $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
                $this->form_validation->set_rules('hotel_address', 'Hotel Address', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
				
                if($this->form_validation->run() == TRUE)
                { 
                    $old_img_name = $this->input->post('old_img_name');

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
                   
                    $config['upload_path']   = './uploads/hotel/';
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
                        $old_img_name_filename = $file_name_to_dispaly;
                        if($old_img_name!='') unlink('./uploads/hotel/'.$old_img_name);
                    }
                    else
                    {
                        $old_img_name_filename = $this->input->post('image_name',TRUE);
                    }
                }
                else
                {
                    $old_img_name_filename = $old_img_name;
                }
    
                    // -------------------------------------------------------------------------

                    // if($_FILES['image_name2']['name']!=''){

                        $old_img_name2 = $this->input->post('old_img_name2');

                    if(!empty($_FILES['image_name2']) && $_FILES['image_name2']['name'] !='')
                    {
                    $file_name     = $_FILES['image_name2']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name = $_FILES['image_name2'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                    if($file_name['name']!="")
                    {
                        $ext = explode('.',$_FILES['image_name2']['name']);
                        $config['file_name'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }  
                    $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                   
                    $config['upload_path']   = './uploads/hotel/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                    $config['max_size']      = '10000';
                    $config['file_name']     = $file_name_to_dispaly;
                    $config['overwrite']     = TRUE;

                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important

                    if(!$this->upload->do_upload('image_name2'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name['name']!="")
                    {  
                        $file_name = $this->upload->data();
                        $old_img_name2_filename = $file_name_to_dispaly;
                        if($old_img_name2!='') unlink('./uploads/hotel/'.$old_img_name2);
                    }
                    else
                    {
                        $old_img_name2_filename = $this->input->post('image_name2',TRUE);
                    }
                }
                else
                {
                    $old_img_name2_filename = $old_img_name2;
                }
                    // } 
                    // else{
                    //     $old_img_name2_filename  = '';
                    // }
    
                    // ------------------------------------------------------------------------

                    // if($_FILES['image_name3']['name']!=''){

                        $old_img_name3 = $this->input->post('old_img_name3');

                    if(!empty($_FILES['image_name3']) && $_FILES['image_name3']['name'] !='')
                    {
                    $file_name     = $_FILES['image_name3']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name = $_FILES['image_name3'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                    if($file_name['name']!="")
                    {
                        $ext = explode('.',$_FILES['image_name3']['name']);
                        $config['file_name'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }  
                    $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                   
                    $config['upload_path']   = './uploads/hotel/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                    $config['max_size']      = '10000';
                    $config['file_name']     = $file_name_to_dispaly;
                    $config['overwrite']     = TRUE;

                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important

                    if(!$this->upload->do_upload('image_name3'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name['name']!="")
                    {  
                        $file_name = $this->upload->data();
                        $old_img_name3_filename = $file_name_to_dispaly;
                        if($old_img_name3!='') unlink('./uploads/hotel/'.$old_img_name3);
                    }
                    else
                    {
                        $old_img_name3_filename = $this->input->post('image_name3',TRUE);
                    }
                }
                else
                {
                    $old_img_name3_filename = $old_img_name3;
                }
                    // } 
                    // else{
                    //     $old_img_name3_filename  = '';
                    // }

// -----------------------------------------------------------------------------------

                    $state  = $this->input->post('state');
                    $city  = $this->input->post('city');
                    $hotel_name  = trim($this->input->post('hotel_name'));
                    $email = trim($this->input->post('email'));
                    $mobile_number1 = trim($this->input->post('mobile_number1'));
                    $mobile_number2 = trim($this->input->post('mobile_number2'));
                    $landline = trim($this->input->post('landline'));
                    $hotel_address = trim($this->input->post('hotel_address'));
                    $password = trim($this->input->post('password'));
                
                $arr_update = array(
                    'state'         => $state,
                    'city'          => $city,
                    'hotel_name' => $hotel_name,
                    'mobile_number1'   => $mobile_number1,
                    'mobile_number2'   => $mobile_number2,
                    'landline'   => $landline,
                    'email'            => $email,
                    'hotel_address'    => $hotel_address,
                    'image_name'    => $old_img_name_filename,
                    'image_name2'    => $old_img_name2_filename,
                    'image_name3'    => $old_img_name3_filename,
                    'password'         => $password
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('hotel',$arr_update,$arr_where);
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
        $this->db->where('is_active','yes');
        $state_data = $this->master_model->getRecords('state');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $city_name_data = $this->master_model->getRecords('district_table');

        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['state_data']        = $state_data;
        $this->arr_view_data['city_name_data']        = $city_name_data;
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
        
        $fields = "hotel.*";
        $this->db->where('id',$id);   
        $this->db->where('hotel.is_deleted','no');        
        // $this->db->join("department", 'agent.department=department.id','left');
        $arr_data = $this->master_model->getRecords('hotel',array('hotel.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
    
	

    public function getcity(){ 
        // POST data 
        // $all_b=array();
       $city_data = $this->input->post('did');
        // print_r($city_data); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('state_id',$city_data);   
                        $data = $this->master_model->getRecords('district_table');
        echo json_encode($data);
    }
   
}