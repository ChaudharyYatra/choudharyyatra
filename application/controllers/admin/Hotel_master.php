<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hotel_master extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table

	   
        // $this->user_id            =  $this->session->userdata('nabcons_id');
        // $this->name               =  $this->session->userdata('nabcons_username');
        // $this->ip                 =  $this->input->ip_address();
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/hotel_master";
        $this->module_title       = "Hotel Master";
        $this->module_url_slug    = "hotel_master";
        $this->module_view_folder = "hotel_master/";    
        // $this->load->library('upload');
	}

	public function index()
	{  
       
        //$user_role = $this->session->userdata('nabcons_user_role');
        //$front_id = $this->session->userdata('nabcons_emp_id');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('hotel_master');

        // $this->arr_view_data['user_role']       = $user_role;
        // $this->arr_view_data['front_id']        = $front_id;
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

        // $nabcons_emp_id = $this->session->userdata('nabcons_emp_id');
        // $user_role = $this->session->userdata('nabcons_user_role');
       
        if($this->input->post('submit'))
        {
            
            $this->form_validation->set_rules('hotel_name', 'Hotel Name', 'required');
            $this->form_validation->set_rules('hotel_location', 'Hotel Location', 'required');
            $this->form_validation->set_rules('hotel_address', 'Hotel Address', 'required');
            $this->form_validation->set_rules('hotel_mobile_number', 'Hotel Mobile Number', 'required');
            $this->form_validation->set_rules('hotel_email_address', 'Hotel Email Address', 'required');
            $this->form_validation->set_rules('hotel_password', 'Hotel Password', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $hotel_name = $this->input->post('hotel_name'); 
                $hotel_location = $this->input->post('hotel_location'); 
                $hotel_address = $this->input->post('hotel_address'); 
                $hotel_mobile_number = $this->input->post('hotel_mobile_number'); 
                $hotel_email_address = $this->input->post('hotel_email_address'); 
                $hotel_password = $this->input->post('hotel_password'); 

                $arr_insert = array(
                    'hotel_name'   =>   $hotel_name,
                    'hotel_location'   =>   $hotel_location,
                    'hotel_address'   =>   $hotel_address,
                    'hotel_mobile_number'   =>   $hotel_mobile_number,
                    'hotel_email_address'   =>   $hotel_email_address,
                    'hotel_password'   =>   $hotel_password
                );
                
                $this->db->where('hotel_name',$hotel_name);
                $this->db->where('is_deleted','no');
                $department_exist_data = $this->master_model->getRecords('hotel_master');
                if(count($department_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"Hotel".$department." Already Exist.");
                    redirect($this->module_url_path.'/add');
                }
                
                $inserted_id = $this->master_model->insertRecord('hotel_master',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Hotel Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
        }

        //$img_id = $this->master_model->next_id("id", "nabcons_blogs");
        //$this->arr_view_data['img']          = $img_id;

        $this->arr_view_data['action']          = 'add';
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    

    

    

    
   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
        if(is_numeric($id) && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('hotel_master');
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
            
            if($this->master_model->updateRecord('hotel_master',$arr_update,array('id' => $id)))
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
        
        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('hotel_master');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('hotel_master',$arr_update,$arr_where))
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
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('hotel_master');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('hotel_name', 'Hotel Name', 'required');
                $this->form_validation->set_rules('hotel_location', 'Hotel Location', 'required');
                $this->form_validation->set_rules('hotel_address', 'Hotel Address', 'required');
                $this->form_validation->set_rules('hotel_mobile_number', 'Hotel Mobile Number', 'required');
                $this->form_validation->set_rules('hotel_email_address', 'Hotel Email Address', 'required');
                $this->form_validation->set_rules('hotel_password', 'Hotel Password', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                    $hotel_name = $this->input->post('hotel_name'); 
                    $hotel_location = $this->input->post('hotel_location'); 
                    $hotel_address = $this->input->post('hotel_address'); 
                    $hotel_mobile_number = $this->input->post('hotel_mobile_number'); 
                    $hotel_email_address = $this->input->post('hotel_email_address'); 
                    $hotel_password = $this->input->post('hotel_password');
                   
                    $this->db->where('hotel_name',$hotel_name);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $bus_master_exist_data = $this->master_model->getRecords('hotel_master');
                    if(count($bus_master_exist_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"Bus".$department." Already Exist.");
                        redirect($this->module_url_path.'/add');
                    }
                    
                    
                    $arr_update = array(
                        'hotel_name'   =>   $hotel_name,
                        'hotel_location'   =>   $hotel_location,
                        'hotel_address'   =>   $hotel_address,
                        'hotel_mobile_number'   =>   $hotel_mobile_number,
                        'hotel_email_address'   =>   $hotel_email_address,
                        'hotel_password'   =>   $hotel_password
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('hotel_master',$arr_update,$arr_where);
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
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }
         
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
}