<?php 
//   Controller for: home page
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Not_interested extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/not_interested";
        $this->module_url_path_booking_enq    =  base_url().$this->config->item('admin_panel_slug')."/booking_enquiry";
        $this->module_title       = "Not Interested Customers";
        $this->module_url_slug    = "not_interested";
        $this->module_view_folder = "not_interested/";
	 }

     public function index()
     {

        $record = array();
        $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number";
        $this->db->order_by('booking_enquiry.created_at','desc');
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('booking_enquiry.not_interested','no');
        // $this->db->where('booking_enquiry.agent_id',$id);
        $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
        $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
        $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        

         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." ";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
     }

     public function details($id)
    {
		$i=base64_decode($id); 

        $record = array();
        $fields = "domestic_followup.*,followup_reason.create_followup_reason";
        $this->db->where('domestic_followup.is_deleted','no');
        $this->db->where('booking_enquiry_id',$i);
        $this->db->join("followup_reason", 'domestic_followup.followup_reason=followup_reason.id','left');
		$this->db->order_by('id','ASC');
        $arr_data = $this->master_model->getRecords('domestic_followup',array('domestic_followup.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "booking_enquiry.*,agent.agent_name,agent.booking_center,agent.department,department.department,booking_enquiry.created_at c_date";
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('booking_enquiry.id',$i);
        $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        $this->db->join("department", 'department.id= agent.department','left');
        $arr_data_details = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);

        //  $this->db->where('is_deleted','no');
        //  $this->db->where('id',$i);
        //  $arr_data_details = $this->master_model->getRecords('booking_enquiry');
         
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['arr_data_details']        = $arr_data_details;
         $this->arr_view_data['page_title']      = "Not Interested Customer Followups";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_url_path_booking_enq'] = $this->module_url_path_booking_enq;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

}