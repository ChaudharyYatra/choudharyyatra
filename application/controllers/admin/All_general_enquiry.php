<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class All_general_enquiry extends CI_Controller{

        public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/all_general_enquiry";
        $this->module_url_path_domestic_followup    =  base_url().$this->config->item('admin_panel_slug')."/domestic_booking_enquiry_followup";
	    $this->module_url_path_booking_basic_info    =  base_url().$this->config->item('admin_panel_slug')."/booking_basic_info";


        $this->module_title       = "Booking Enquiry";
        $this->general_module_title       = "General Enquiry";
        $this->module_url_slug    = "all_general_enquiry";
        $this->module_view_folder = "all_general_enquiry/";    
        $this->load->library('upload');
        $this->load->model('member');
	}

	public function index()
	{
        date_default_timezone_set('Asia/Kolkata');
        $twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-24 hours'));

        $record = array();
        $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name as a,packages.tour_number,agent.department";
        // $this->db->order_by('booking_enquiry.created_at','desc');
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('booking_enquiry.created_at <', $twentyFourHoursAgo);
        $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
        $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        // $this->db->join("agent a", 'booking_enquiry.ftaken_by=a.id','left');
        // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
        $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $record = array();
        $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number,agent.department";
        // $this->db->order_by('booking_enquiry.created_at','desc');
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('booking_enquiry.created_at <', $twentyFourHoursAgo);
        $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
        // $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        $this->db->join("agent", 'booking_enquiry.ftaken_by=agent.id','left');
        // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
        $arr_data_info = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($arr_data_info); die;

        // foreach($arr_data_info as $info){
        //     // $agent_name = $info['agent_name'];
        // }

        $this->db->where('is_deleted','no');
        $this->db->where('status','approved');
        $followup_reason_data = $this->master_model->getRecords('followup_reason');
        

        // $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data_info']        = $arr_data_info;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}

       
	
}