<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Request_replace_bus extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/request_replace_bus";
        $this->module_url_path_asign_tour_to_manager    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/asign_tour_to_manager";
        $this->module_title       = "Request To TOM For Replace Bus";
        $this->module_url_slug    = "request_replace_bus";
        $this->module_view_folder = "request_replace_bus/";    
        $this->load->library('upload');
	}

	public function index()
	{ 
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $record = array();
        $fields = "request_to_tom_replace_bus.*,packages.tour_number,packages.tour_title,package_date.journey_date,
        vehicle_details.registration_number";
        $this->db->where('request_to_tom_replace_bus.is_deleted','no');
        $this->db->where('request_to_tom_replace_bus.is_active','yes');
        $this->db->where('request_to_tom_replace_bus.tour_manager_id',$iid);
        $this->db->join("packages", 'request_to_tom_replace_bus.package_id=packages.id','left');
        $this->db->join("package_date", 'request_to_tom_replace_bus.package_date_id=package_date.id','left');
        $this->db->join("vehicle_details", 'request_to_tom_replace_bus.vehicle_rto_registration=vehicle_details.id','left');
        $request_to_tom_replace_bus_data = $this->master_model->getRecords('request_to_tom_replace_bus',array('request_to_tom_replace_bus.is_deleted'=>'no'),$fields);
        // print_r($request_to_tom_replace_bus_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['request_to_tom_replace_bus_data']        = $request_to_tom_replace_bus_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}
        
    
    public function add($id,$did)
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id'); 

        $id=base64_decode($id);
        $did=base64_decode($did);
        if ($id=='') 
        {
            
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if($id!='')
        {   
            // echo 'hiiiiiiiiiii' ; die;
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');
            // print_r($arr_data); die;

        if($this->input->post('submit'))
        {
            // print_r($_REQUEST); die;
            $this->form_validation->set_rules('bus_replace_reason', 'bus_replace_reason', 'required');
            // $this->form_validation->set_rules('image_name', 'image_name', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $tour_number	  = $this->input->post('tour_number'); 
                $vehicle_owner_name	  = $this->input->post('vehicle_owner_name1'); 
                $rto_registration_no	  = $this->input->post('rto_registration_no1'); 
                $bus_replace_reason	  = $this->input->post('bus_replace_reason'); 

                $arr_insert = array(
                    'package_id'   =>   $id,
                    'vehicle_owner_id'   =>   $vehicle_owner_name,
                    'vehicle_rto_registration'   =>   $rto_registration_no,
                    'What_is_problem_of_bus'   =>   $bus_replace_reason,
                    'tour_manager_id'   =>   $iid,
                    'package_date_id'   =>   $did,
                    'status'   =>   'pending'

                );
                // print_r($arr_insert); die;
                $inserted_id = $this->master_model->insertRecord('request_to_tom_replace_bus',$arr_insert,true);

                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path_asign_tour_to_manager.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                    redirect($this->module_url_path_asign_tour_to_manager.'/index');
                }
                
            
            }
       
        }
     }
     else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }

        $record = array();
        $fields = "bus_open.*,packages.tour_number,packages.tour_title,vehicle_details.registration_number,vehicle_owner.vehicle_owner_name,
        vehicle_owner.id as vid";
        $this->db->where('bus_open.is_deleted','no');
        $this->db->where('bus_open.package_id',$id);
        $this->db->where('bus_open.package_date_id',$did);
        $this->db->join("vehicle_details", 'bus_open.vehicle_rto_registration=vehicle_details.id','left');
        $this->db->join("vehicle_owner", 'vehicle_details.vehicle_owner_id=vehicle_owner.id','left');
        $this->db->join("packages", 'bus_open.package_id=packages.id','left');
        $vehicle_arr_data = $this->master_model->getRecords('bus_open',array('bus_open.is_deleted'=>'no'),$fields);
        // print_r($vehicle_arr_data); die;

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['vehicle_arr_data']        = $vehicle_arr_data;
        $this->arr_view_data['page_title']      = "";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_asign_tour_to_manager'] = $this->module_url_path_asign_tour_to_manager;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }


    // Edit - Get data for edit
    
    public function edit($tid,$id,$did)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $tid=base64_decode($tid);
        $id=base64_decode($id);
        $did=base64_decode($did);
        // $did=base64_decode($did);
		if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if($id!='')
        {   
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('destinations', 'destinations', 'required');

                if($this->form_validation->run() == TRUE)
                {
// -------------------------------------upload image 1----------------------------------------------------------------
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
                    
                    $config['upload_path']   = './uploads/tour_photos/';
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
                        $filename = $file_name_to_dispaly;
                        if($old_img_name!='') unlink('./uploads/tour_photos/'.$old_img_name);
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
// -------------------------------------upload image 1----------------------------------------------------------------

// -------------------------------------upload image 2----------------------------------------------------------------
$old_img_name_two = $this->input->post('old_img_name_two');
                
if(!empty($_FILES['image_name_two']) && $_FILES['image_name_two']['name'] !='')
{
$file_name     = $_FILES['image_name_two']['name'];
$arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

$file_name = $_FILES['image_name_two'];
$arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

if($file_name['name']!="")
{
    $ext = explode('.',$_FILES['image_name_two']['name']); 
    $config['file_name'] = rand(1000,90000);

    if(!in_array($ext[1],$arr_extension))
    {
        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
        redirect($this->module_url_path.'/edit/'.$id);
    }
}   

$file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

$config['upload_path']   = './uploads/tour_photos/';
$config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
$config['max_size']      = '10000';
$config['file_name']     = $file_name_to_dispaly;
$config['overwrite']     = TRUE;
$this->load->library('upload',$config);
$this->upload->initialize($config); // Important

if(!$this->upload->do_upload('image_name_two'))
{  
    $data['error'] = $this->upload->display_errors();
    $this->session->set_flashdata('error_message',$this->upload->display_errors());
    redirect($this->module_url_path.'/edit/'.$id);
}
if($file_name['name']!="")
{   
    $file_name = $this->upload->data();
    $img_name_two_filename = $file_name_to_dispaly;
    if($old_img_name_two!='') unlink('./uploads/tour_photos/'.$old_img_name_two);
}
else
{
    $img_name_two_filename = $this->input->post('image_name_two',TRUE);
}
}
else
{
$img_name_two_filename = $old_img_name_two;
}
// -------------------------------------upload image 2----------------------------------------------------------------

// -------------------------------------upload image 3----------------------------------------------------------------
$old_img_name_three = $this->input->post('old_img_name_three');
                
if(!empty($_FILES['image_name_three']) && $_FILES['image_name_three']['name'] !='')
{
$file_name     = $_FILES['image_name_three']['name'];
$arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

$file_name = $_FILES['image_name_three'];
$arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

if($file_name['name']!="")
{
    $ext = explode('.',$_FILES['image_name_three']['name']); 
    $config['file_name'] = rand(1000,90000);

    if(!in_array($ext[1],$arr_extension))
    {
        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
        redirect($this->module_url_path.'/edit/'.$id);
    }
}   

$file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

$config['upload_path']   = './uploads/tour_photos/';
$config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
$config['max_size']      = '10000';
$config['file_name']     = $file_name_to_dispaly;
$config['overwrite']     = TRUE;
$this->load->library('upload',$config);
$this->upload->initialize($config); // Important

if(!$this->upload->do_upload('image_name_three'))
{  
    $data['error'] = $this->upload->display_errors();
    $this->session->set_flashdata('error_message',$this->upload->display_errors());
    redirect($this->module_url_path.'/edit/'.$id);
}
if($file_name['name']!="")
{   
    $file_name = $this->upload->data();
    $img_name_three_filename = $file_name_to_dispaly;
    if($old_img_name_three!='') unlink('./uploads/tour_photos/'.$old_img_name_three);
}
else
{
    $img_name_three_filename = $this->input->post('image_name_three',TRUE);
}
}
else
{
$img_name_three_filename = $old_img_name_three;
}
// -------------------------------------upload image 3----------------------------------------------------------------

                $destinations	  = $this->input->post('destinations'); 

                $arr_update = array(
                    'destination'   =>   $destinations,
                    'image_name'   =>   $filename,
                    'image_name_two'   =>   $img_name_two_filename,
                    'image_name_three'   =>   $img_name_three_filename
                );

                $arr_where     = array("id" => $id);
                $inserted_id = $this->master_model->updateRecord('tour_photos',$arr_update,$arr_where);
                
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
        
        // $this->db->where('package_id',$id);
        $this->db->where('package_date_id',$did);
        $this->db->where('package_id',$id);
        $this->db->where('id',$tid);
        $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('tour_photos');
        // print_r($arr_data); die;
    
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['arr_data_main']        = $arr_data_main;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

    //============

    public function details($id,$did)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id'); 

        $id=base64_decode($id);
        $did=base64_decode($did);
        
		// $id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $record = array();
        $fields = "tm_instraction.*,tm_instraction_attachment.image_name";
        $this->db->where('tm_instraction.is_deleted','no');
        $this->db->where('tm_instraction.tour_no',$id);
        $this->db->join("tm_instraction_attachment", 'tm_instraction.tm_instraction_attachment_id=tm_instraction_attachment.id','left');
        $arr_data = $this->master_model->getRecords('tm_instraction',array('tm_instraction.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $record = array();
        $fields = "tm_instraction.*,tm_instraction_attachment.image_name";
        $this->db->where('tm_instraction.is_deleted','no');
        $this->db->where('tm_instraction.tour_no',$id);
        $this->db->group_by('tour_no');
        $this->db->join("tm_instraction_attachment", 'tm_instraction.tm_instraction_attachment_id=tm_instraction_attachment.id','left');
        $arr_data_top = $this->master_model->getRecords('tm_instraction',array('tm_instraction.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['id']        = $id;
        $this->arr_view_data['did']        = $did;
        $this->arr_view_data['arr_data_top']        = $arr_data_top;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }
   
}