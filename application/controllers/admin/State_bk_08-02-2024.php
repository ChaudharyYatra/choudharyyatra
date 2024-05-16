<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class State extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/state";
        $this->module_title       = "State";
        $this->module_url_slug    = "state_master";
        $this->module_view_folder = "state_master/";
	}

	public function index()
	{  
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('state');

        $fields = "state_table.*,country.country_name";
        $this->db->order_by('state_table.country_id','asc');        
        $this->db->where('state_table.is_deleted','no');        
        $this->db->join("country", 'state_table.country_id=country.id','left');
        $arr_data = $this->master_model->getRecords('state_table',array('state_table.is_deleted'=>'no'),$fields);

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
            $this->form_validation->set_rules('state_name', 'State Name', 'required');
            $this->form_validation->set_rules('country_id', 'Country Name', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $state_name = $this->input->post('state_name');
                $country_id = $this->input->post('country_id');
                $arr_insert = array(
                    'state_name'   =>   $state_name,
                    'country_id'   =>   $country_id
                    
                );
                

                $this->db->where('state_name',$state_name);
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $state_exist_data = $this->master_model->getRecords('state_table');
                if(count($state_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"Hotel".$state_name." Already Exist.");
                    redirect($this->module_url_path.'/add');
                }
                
                $inserted_id = $this->master_model->insertRecord('state_table',$arr_insert,true);
                               
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
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $country_name_data = $this->master_model->getRecords('country');
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['country_name_data']    = $country_name_data;
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
            $arr_data = $this->master_model->getRecords('state_table');
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
            
            if($this->master_model->updateRecord('state_table',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('state_table');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }

            // $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->deleteRecord('state_table',$arr_where))
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
            $arr_data = $this->master_model->getRecords('state_table');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('state_name', 'Vehicle Brand', 'required');
                $this->form_validation->set_rules('country_id', 'Country Name', 'required');

                if($this->form_validation->run() == TRUE)
                {
                    $state_name = $this->input->post('state_name');
                     $country_id = $this->input->post('country_id');

                   $this->db->where('state_name',$state_name);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $bus_master_exist_data = $this->master_model->getRecords('state_table');

                    if(count($bus_master_exist_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"state".$state_name." Already Exist.");
                        redirect($this->module_url_path.'/add');
                    }

                   $arr_update = array(
                        'state_name' => $state_name,
                        'country_id'   =>   $country_id
                    
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('state_table',$arr_update,$arr_where);
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
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $country_data = $this->master_model->getRecords('country');
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['country_data']    = $country_data;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
}