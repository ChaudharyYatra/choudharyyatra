<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_feedback extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('vehicle_owner_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_owner/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('vehicle_owner_panel_slug')."vehicle_owner/customer_feedback";
        $this->module_title       = "Feedback From Customer";
        $this->module_url_slug    = "customer_feedback";
        $this->module_view_folder = "customer_feedback/";    
        $this->load->library('upload');
	}

	public function index($iid,$did)
	{ 
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $id = $this->session->userdata('vehicle_owner_sess_id');
        
        $iid=base64_decode($iid);
        $did=base64_decode($did);

        // package_type.package_type
        $record = array();
        $fields = "assign_staff.*,packages.tour_title,packages.tour_number,supervision.supervision_name,
        customer_feedback.feedback,customer_feedback.image_name,customer_feedback.image_name,package_date.journey_date,
        role_type.role_name as r_name";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('assign_staff.name',$id);
        $this->db->where('assign_staff.package_id',$iid);
        $this->db->where('assign_staff.package_date_id',$did);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
        $this->db->join("supervision", 'assign_staff.name=supervision.id','left');
        $this->db->join("customer_feedback", 'assign_staff.package_id=customer_feedback.package_id','left');
        $this->db->join("role_type", 'assign_staff.role_name=role_type.id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['vehicle_ssession_owner_name'] = $vehicle_ssession_owner_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
       
	}
       

}