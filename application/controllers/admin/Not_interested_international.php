<?php 
//   Controller for: home page
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Not_interested_international extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/not_interested_international";
        $this->module_url_path_inter_booking_enq    =  base_url().$this->config->item('admin_panel_slug')."/international_booking_enquiry";
        $this->module_title       = "Not Interested Customers";
        $this->module_url_slug    = "not_interested_international";
        $this->module_view_folder = "not_interested_international/";
	 }

     public function index()
     {

         $record = array();
         $fields = "international_booking_enquiry.*,international_packages.tour_title,agent.agent_name,international_packages.tour_number as tno, international_booking_enquiry.package_id as pid";
         $this->db->order_by('international_booking_enquiry.created_at','desc');
         $this->db->where('international_booking_enquiry.is_deleted','no');
		 $this->db->where('international_booking_enquiry.not_interested','no');
         $this->db->join("international_packages", 'international_booking_enquiry.package_id= international_packages.id','left');
         $this->db->join("agent", 'international_booking_enquiry.agent_id=agent.id','left');
         $arr_data = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);
        

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
        $fields = "international_followup.*,followup_reason.create_followup_reason";
        $this->db->where('international_followup.is_deleted','no');
        $this->db->where('international_booking_enquiry_id',$i);
        $this->db->join("followup_reason", 'international_followup.followup_reason=followup_reason.id','left');
        $this->db->order_by('international_followup.id','ASC');
        $arr_data = $this->master_model->getRecords('international_followup');
        //  print_r($arr_data); die;

        //  $this->db->where('is_deleted','no');
        //  $this->db->where('international_booking_enquiry_id',$i);
        // //  $this->db->order_by('tour_number','ASC');
        //  $arr_data = $this->master_model->getRecords('international_followup');

         $record = array();
         $fields = "international_booking_enquiry.*,agent.agent_name,agent.booking_center,agent.department,department.department";
         $this->db->where('international_booking_enquiry.is_deleted','no');
         $this->db->where('international_booking_enquiry.id',$i);
         $this->db->join("agent", 'international_booking_enquiry.agent_id=agent.id','left');
         $this->db->join("department", 'department.id= agent.department','left');
         $arr_data_details = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);

        //  $this->db->where('is_deleted','no');
        //  $this->db->where('id',$i);
        //  $arr_data_details = $this->master_model->getRecords('international_booking_enquiry');
         
 
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['arr_data_details']        = $arr_data_details;
         $this->arr_view_data['page_title']      = "Not Interested Customer Followups";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_url_path_inter_booking_enq'] = $this->module_url_path_inter_booking_enq;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
     }

}