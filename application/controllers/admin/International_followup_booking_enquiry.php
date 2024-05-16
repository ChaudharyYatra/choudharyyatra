<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class International_followup_booking_enquiry extends CI_Controller{

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
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/International_followup_booking_enquiry";
        $this->module_title       = "International Followup Booking Enquiry";
        $this->module_url_slug    = "International_followup_booking_enquiry";
        $this->module_view_folder = "international_followup_booking_enquiry/";    
        $this->load->library('upload');
	}

	public function index()
	{

        $record = array();
        $fields = "international_booking_enquiry.*,international_packages.tour_title,agent.agent_name,international_packages.tour_number";
        $this->db->order_by('international_booking_enquiry.id','desc');
        $this->db->where('international_booking_enquiry.is_deleted','no');
        $this->db->where('followup_status','yes');
        $this->db->join("international_packages", 'international_booking_enquiry.package_id=international_packages.id','left');
        $this->db->join("agent", 'international_booking_enquiry.agent_id=agent.id','left');
        $arr_data = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);

        
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}

        public function  international_followup_list($id)
	{
			
 				$i=base64_decode($id);
                $agent_sess_name = $this->session->userdata('agent_name');
                $id=$this->session->userdata('agent_sess_id');
               
       
        //        $this->db->where('is_deleted','no');
        //        $this->db->where('international_booking_enquiry_id',$i);
        //         $arr_data = $this->master_model->getRecords('international_followup');

                $record = array();
                $fields = "international_followup.*,followup_reason.create_followup_reason";
                $this->db->where('international_followup.is_deleted','no');
                $this->db->where('international_booking_enquiry_id',$i);
                $this->db->join("followup_reason", 'international_followup.followup_reason=followup_reason.id','left');
                $this->db->order_by('international_followup.id','ASC');
                $arr_data = $this->master_model->getRecords('international_followup');
                //  print_r($arr_data); die;

                $record = array();
                $fields = "international_booking_enquiry.*,agent.agent_name,agent.booking_center,agent.department,department.department,international_booking_enquiry.created_at c_date";
                $this->db->where('international_booking_enquiry.is_deleted','no');
                $this->db->where('international_booking_enquiry.id',$i);
                $this->db->join("agent", 'international_booking_enquiry.agent_id=agent.id','left');
                $this->db->join("department", 'department.id= agent.department','left');
                $arr_data_international_enquiry = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);
                
                $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
                $this->arr_view_data['listing_page']    = 'yes';
                $this->arr_view_data['arr_data']        = $arr_data;
                $this->arr_view_data['arr_data_international_enquiry']        = $arr_data_international_enquiry;
                $this->arr_view_data['page_title']      = $this->module_title." List";
                $this->arr_view_data['module_title']    = $this->module_title;
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."international_followup_list";
                $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}

   
   
}