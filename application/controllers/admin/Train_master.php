<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Train_master extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/train_master";
        $this->module_title       = "Train Master";
        $this->module_url_slug    = "train_master";
        $this->module_view_folder = "train_master/";
	}

	public function index()
	{  
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('train_master');

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
            $this->form_validation->set_rules('train_name', 'train_name', 'required');
            $this->form_validation->set_rules('train_number', 'train_number', 'required');
            $this->form_validation->set_rules('train_boarding_station', 'train_boarding_station', 'required');
            $this->form_validation->set_rules('train_arrival_station', 'train_arrival_station', 'required');
            $this->form_validation->set_rules('other_stations', 'other_stations', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $train_name = $this->input->post('train_name');
                $train_number = $this->input->post('train_number');
                $train_boarding_station = $this->input->post('train_boarding_station');
                $train_arrival_station = $this->input->post('train_arrival_station');
                $other_stations = $this->input->post('other_stations');

                $train_coach = implode(",", $this->input->post('train_coach')); 
                $running_days = implode(",", $this->input->post('running_days'));

                $arr_insert = array(
                    'train_name'   =>   $train_name,
                    'train_number'   =>   $train_number,
                    'train_boarding_station'   =>   $train_boarding_station,
                    'train_arrival_station'   =>   $train_arrival_station,
                    'other_stations'   =>   $other_stations,
                    'train_coach'   =>   $train_coach,
                    'running_days'   =>   $running_days
                    
                );
                $this->db->where('train_number',$train_number);
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $train_exist_data = $this->master_model->getRecords('train_master');
                if(count($train_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"Train number".$train_number." Already Exist.");
                    redirect($this->module_url_path.'/add');
                }
                
                $inserted_id = $this->master_model->insertRecord('train_master',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Train Details Added Successfully.");
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
            $arr_data = $this->master_model->getRecords('train_master');
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
            
            if($this->master_model->updateRecord('train_master',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('train_master');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }

            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('train_master',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('train_master');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('train_name', 'train_name', 'required');
                $this->form_validation->set_rules('train_number', 'train_number', 'required');
                $this->form_validation->set_rules('train_boarding_station', 'train_boarding_station', 'required');
                $this->form_validation->set_rules('train_arrival_station', 'train_arrival_station', 'required');
                $this->form_validation->set_rules('other_stations', 'other_stations', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                    $train_name = $this->input->post('train_name');
                    $train_number = $this->input->post('train_number');
                    $train_boarding_station = $this->input->post('train_boarding_station');
                    $train_arrival_station = $this->input->post('train_arrival_station');
                    $other_stations = $this->input->post('other_stations');
    
                    $train_coach = implode(",", $this->input->post('train_coach')); 
                    $running_days = implode(",", $this->input->post('running_days'));
                   
                    $this->db->where('train_number',$train_number);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $bus_master_exist_data = $this->master_model->getRecords('train_master');
                    if(count($bus_master_exist_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"Train Number".$train_number." Already Exist.");
                        redirect($this->module_url_path.'/add');
                    }

                   $arr_update = array(
                        'train_name'   =>   $train_name,
                        'train_number'   =>   $train_number,
                        'train_boarding_station'   =>   $train_boarding_station,
                        'train_arrival_station'   =>   $train_arrival_station,
                        'other_stations'   =>   $other_stations,
                        'train_coach'   =>   $train_coach,
                        'running_days'   =>   $running_days
                    );

                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('train_master',$arr_update,$arr_where);

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