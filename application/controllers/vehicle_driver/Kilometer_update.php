<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kilometer_update extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('vehicle_driver_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_driver/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_driver_panel_slug')."vehicle_driver/kilometer_update";
        $this->module_url_path_dates    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/domestic_package_review";
        $this->module_title       = "Kilometer Update";
        $this->module_url_slug    = "kilometer_update";
        $this->module_view_folder = "kilometer_update/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $id = $this->session->userdata('vehicle_driver_sess_id');

        $fields = "driver_kilometer_update.*,city.city_name";
        // $this->db->order_by('id','ASC');
        $this->db->where('driver_kilometer_update.is_deleted','no');
        $this->db->where('driver_kilometer_update.driver_id',$id);
        $this->db->join("city", 'driver_kilometer_update.city_id=city.id','left');
        $driver_kilometer = $this->master_model->getRecords('driver_kilometer_update',array('driver_kilometer_update.is_deleted'=>'no'),$fields);
        // print_r($asigned_tour); die;

        

        $this->arr_view_data['vehicle_ssession_driver_name']= $vehicle_ssession_driver_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['driver_kilometer']        = $driver_kilometer;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);

       
	}
	
	
    public function add($pid,$p_date_id)
    {   
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $id = $this->session->userdata('vehicle_driver_sess_id');

        $pid=base64_decode($pid); 
        $p_date_id=base64_decode($p_date_id); 

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('vehicle_driver.id',$id);
        $arr_data = $this->master_model->getRecords('vehicle_driver');

        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('city_id', 'city_id', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                // =========================Upload licence Image(front)===================================================
                $file_name     = $_FILES['kilometer_image']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['kilometer_image']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/add');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/driver_kilometer_update_photo/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('kilometer_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                if($file_name!="")
                {
                    $file_name = $this->upload->data();
                    $kilometer_filename = $file_name_to_dispaly;
                }

                else
                {
                    $kilometer_filename = $this->input->post('kilometer_image',TRUE);
                }
                // =========================Upload licence Image(front)===================================================
                
                $city_id  = $this->input->post('city_id');
                $driver_id  = $this->input->post('driver_id');
                
                $arr_insert = array(
                    'driver_id'   =>   $driver_id,
                    'city_id'   =>   $city_id,
                    'image_name'        => $kilometer_filename,
                    'package_id'        => $pid,
                    'package_date_id'        => $p_date_id
                );
                
                $inserted_id = $this->master_model->insertRecord('driver_kilometer_update',$arr_insert,true);
                               
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

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $city_info = $this->master_model->getRecords('city');

        
        $this->arr_view_data['vehicle_ssession_driver_name'] = $vehicle_ssession_driver_name;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['city_info'] = $city_info;
        $this->arr_view_data['arr_data'] = $arr_data;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);

    }

  // Active/Inactive
  public function active_inactive($id,$type)
    {
	  	$id=base64_decode($id);
        if($id!="" && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('driver_kilometer_update');
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
            
            if($this->master_model->updateRecord('driver_kilometer_update',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('driver_kilometer_update');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('driver_kilometer_update',$arr_update,$arr_where))
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
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $iid = $this->session->userdata('vehicle_driver_sess_id');

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
                
                $this->form_validation->set_rules('city_id', 'city_id', 'required');
                
                if($this->form_validation->run() == TRUE)
                {

// =======================================upload kilometer image============================================================
$old_kilometer_image = $this->input->post('old_kilometer_image');
                
if(!empty($_FILES['kilometer_image']) && $_FILES['kilometer_image']['name'] !='')
{
$file_name     = $_FILES['kilometer_image']['name'];
$arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

$file_name = $_FILES['kilometer_image'];
$arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

if($file_name['name']!="")
{
    $ext = explode('.',$_FILES['kilometer_image']['name']); 
    $config['file_name'] = rand(1000,90000);

    if(!in_array($ext[1],$arr_extension))
    {
        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
        redirect($this->module_url_path.'/edit/'.$id);
    }
}   

$file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

$config['upload_path']   = './uploads/driver_kilometer_update_photo/';
$config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
$config['max_size']      = '10000';
$config['file_name']     = $file_name_to_dispaly;
$config['overwrite']     = TRUE;
$this->load->library('upload',$config);
$this->upload->initialize($config); // Important

if(!$this->upload->do_upload('kilometer_image'))
{  
    $data['error'] = $this->upload->display_errors();
    $this->session->set_flashdata('error_message',$this->upload->display_errors());
    redirect($this->module_url_path.'/edit/'.$id);
}
if($file_name['name']!="")
{   
    $file_name = $this->upload->data();
    $licence_front_filename = $file_name_to_dispaly;
    if($old_kilometer_image!='') unlink('./uploads/driver_kilometer_update_photo/'.$old_kilometer_image);
}
else
{
    $licence_front_filename = $this->input->post('kilometer_image',TRUE);
}
}
else
{
$licence_front_filename = $old_kilometer_image;
}
// =======================================upload kilometer image============================================================

                $city_id  = $this->input->post('city_id'); 

                $arr_update = array(
                    'city_id'   =>   $city_id,
                    'image_name'        => $licence_front_filename
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('driver_kilometer_update',$arr_update,$arr_where);
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
        $city_info = $this->master_model->getRecords('city');
        
        $fields = "driver_kilometer_update.*,city.city_name";
        // $this->db->order_by('id','ASC');
        $this->db->where('driver_kilometer_update.is_deleted','no');
        $this->db->where('driver_kilometer_update.id',$id);
        $this->db->join("city",'driver_kilometer_update.city_id=city.id','left');
        $driver_kilometer = $this->master_model->getRecords('driver_kilometer_update',array('driver_kilometer_update.is_deleted'=>'no'),$fields);
        // print_r($driver_kilometer); die;

        $this->arr_view_data['vehicle_ssession_driver_name']        = $vehicle_ssession_driver_name;
        $this->arr_view_data['city_info']        = $city_info;
        $this->arr_view_data['driver_kilometer']        = $driver_kilometer;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);
    }

    // Get Details of Package
    public function details($id)
    {
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $id = $this->session->userdata('vehicle_driver_sess_id');

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
        
        $this->arr_view_data['vehicle_ssession_driver_name']        = $vehicle_ssession_driver_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);
    }
   
   
}