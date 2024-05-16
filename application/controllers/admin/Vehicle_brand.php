<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_brand extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/vehicle_brand";
        $this->module_title       = "Vehicle Brand";
        $this->module_url_slug    = "vehicle_brand";
        $this->module_view_folder = "vehicle_brand/";
	}

	public function index()
	{  
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('vehicle_brand');

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

        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('vehicle_brand_name', 'Vehicle Brand', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $vehicle_brand_name = $this->input->post('vehicle_brand_name');
                $arr_insert = array(
                    'vehicle_brand_name'   =>   $vehicle_brand_name
                    
                );
                

                $this->db->where('vehicle_brand_name',$vehicle_brand_name);
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $vehicle_brand_exist_data = $this->master_model->getRecords('vehicle_brand');
                if(count($vehicle_brand_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"Vehicle Brand"." ".$vehicle_brand_name." Already Exist.");
                    redirect($this->module_url_path.'/add');
                }
                
                $inserted_id = $this->master_model->insertRecord('vehicle_brand',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Vehicle Brand Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
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
        if(is_numeric($id) && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('vehicle_brand');
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
            
            if($this->master_model->updateRecord('vehicle_brand',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('vehicle_brand');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            
            $arr_where = array("id" => $id);
                 
            if($this->master_model->deleteRecord('vehicle_brand',$arr_where))
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
            $arr_data = $this->master_model->getRecords('vehicle_brand');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('vehicle_brand_name', 'Vehicle Brand', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                   $vehicle_brand_name = trim($this->input->post('vehicle_brand_name'));
                   
                   $this->db->where('vehicle_brand_name',$vehicle_brand_name);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $bus_master_exist_data = $this->master_model->getRecords('vehicle_brand');
                    if(count($bus_master_exist_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"Vehicle Brand".$vehicle_brand_name." Already Exist.");
                        redirect($this->module_url_path.'/add');
                    }

                   $arr_update = array(
                        'vehicle_brand_name' => $vehicle_brand_name,
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('vehicle_brand',$arr_update,$arr_where);
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