<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asign_driver extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('vehicle_driver_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_driver/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_driver_panel_slug')."vehicle_driver/asign_driver";
        $this->module_url_path_dates    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/domestic_package_review";
        $this->module_title       = "Asign Vehicle";
        $this->module_url_slug    = "asign_driver";
        $this->module_view_folder = "asign_driver/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $id = $this->session->userdata('vehicle_driver_sess_id');

        $fields = "bus_open.*,vehicle_driver.driver_name,vehicle_details.registration_number";
        // $this->db->order_by('id','ASC');
        $this->db->where('bus_open.is_deleted','no');
        // $this->db->where('vehicle_driver.id',$id);
        $this->db->join("vehicle_driver", 'bus_open.asign_driver_name=vehicle_driver.id','left');
        $this->db->join("vehicle_details", 'bus_open.vehicle_rto_registration=vehicle_details.id','left');
        $asigned_driver = $this->master_model->getRecords('bus_open',array('bus_open.is_deleted'=>'no'),$fields);
        // print_r($asigned_driver); die;

        
        $this->arr_view_data['vehicle_ssession_driver_name']= $vehicle_ssession_driver_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['asigned_driver']        = $asigned_driver;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);
       
	}
	
	
   
  // Active/Inactive
  public function active_inactive($id,$type)
    {
	  	$id=base64_decode($id);
        if($id!="" && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('bus_open');  
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
            
            if($this->master_model->updateRecord('bus_open',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('bus_open');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('bus_open',$arr_update,$arr_where))
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
   
}