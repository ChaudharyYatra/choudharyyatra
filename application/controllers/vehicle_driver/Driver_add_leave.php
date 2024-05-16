<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Driver_add_leave extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('vehicle_driver_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_driver/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_driver_panel_slug')."vehicle_driver/driver_add_leave";
        $this->module_url_path_dates    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/domestic_package_review";
        $this->module_title       = "Driver Add Leave";
        $this->module_url_slug    = "driver_add_leave";
        $this->module_view_folder = "driver_add_leave/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $id = $this->session->userdata('vehicle_driver_sess_id');

        // $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('driver_leave.driver_id',$id);
        $arr_data = $this->master_model->getRecords('driver_leave');
        // print_r($arr_data); die;
        
        $this->arr_view_data['vehicle_ssession_driver_name']= $vehicle_ssession_driver_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);
       
	}
	
	
    public function add()
    {   
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $id = $this->session->userdata('vehicle_driver_sess_id');

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('vehicle_driver.id',$id);
        $arr_data = $this->master_model->getRecords('vehicle_driver');
        // print_r($arr_data); die;

        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('from_date', 'from_date', 'required');
            $this->form_validation->set_rules('to_date', 'to_date', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $from_date  = $this->input->post('from_date'); 
                $to_date  = $this->input->post('to_date'); 
                $reason  = $this->input->post('reason'); 
                $driver_id  = $this->input->post('driver_id'); 
                
                $arr_insert = array(
                    'from_date'   =>   $from_date,
                    'to_date'  => $to_date,
                    'reason'  => $reason,
                    'driver_id'  => $driver_id
                    
                );
                $inserted_id = $this->master_model->insertRecord('driver_leave',$arr_insert,true);
                               
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
        
        
        $this->arr_view_data['vehicle_ssession_driver_name'] = $vehicle_ssession_driver_name;
        $this->arr_view_data['arr_data'] = $arr_data;
        $this->arr_view_data['action']          = 'add';
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
            $arr_data = $this->master_model->getRecords('driver_leave');
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
            
            if($this->master_model->updateRecord('driver_leave',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('driver_leave');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('driver_leave',$arr_update,$arr_where))
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
                $this->form_validation->set_rules('from_date', 'from_date', 'required');
                $this->form_validation->set_rules('to_date', 'to_date', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                $from_date  = $this->input->post('from_date'); 
                $to_date  = $this->input->post('to_date'); 
                $reason  = $this->input->post('reason'); 

                $arr_update = array(
                    'from_date'   =>   $from_date,
                    'to_date'  => $to_date,
                    'reason'  => $reason
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('driver_leave',$arr_update,$arr_where);
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

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('driver_leave');
        // print_r($arr_data); die;
        
        $this->arr_view_data['vehicle_ssession_driver_name']        = $vehicle_ssession_driver_name;
        $this->arr_view_data['arr_data']        = $arr_data;
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
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
    }
   
   
}