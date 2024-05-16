<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking_enquiry extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('region_head_sess_id')=="") 
        { 
                redirect(base_url().'region_head/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('region_head_panel_slug')."/booking_enquiry";
        $this->module_title       = "Booking Enquiry";
        $this->module_url_slug    = "booking_enquiry";
        $this->module_view_folder = "booking_enquiry/";    
        $this->load->library('upload');
        $this->load->model('member');
	}

	public function index()
	{
        $region_head_sess_name = $this->session->userdata('region_head_name');
        $id = $this->session->userdata('region_head_sess_id');
        $region_id = $this->session->userdata('region_head_region');
        // region means department
        

        $record = array();
        $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number,agent.department";
        // $this->db->order_by('booking_enquiry.created_at','desc');
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('followup_status','no');
        $this->db->where('booking_process','no');
        $this->db->where('agent.department',$region_id);
        $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
        $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
        $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        

        $this->arr_view_data['region_head_sess_name']        = $region_head_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('region_head/layout/region_head_combo',$this->arr_view_data);
	}
	
}