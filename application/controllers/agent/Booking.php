<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/booking";
        $this->module_title       = "Final Booking ";
        $this->module_url_slug    = "booking";
        $this->module_view_folder = "booking/";
        $this->arr_view_data = [];
	}


    public function index()
    {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        date_default_timezone_set('Asia/Kolkata');
        $twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-24 hours'));

       $record = array();
       $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number as tno,booking_enquiry.package_id as pid,sra_booking.booking_enquiry_id,sra_booking.sra_number,sra_booking.sra_date";
       $this->db->order_by('booking_enquiry.created_at','desc');
       $this->db->where('booking_enquiry.is_deleted','no');
       $this->db->where('booking_enquiry.booking_process','no');
       
       $this->db->where('booking_enquiry.booking_status','done');

       $this->db->where('booking_enquiry.agent_id',$id);
       $this->db->where('booking_enquiry.created_at >', $twentyFourHoursAgo);
       $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
       $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
       $this->db->join("sra_booking", 'booking_enquiry.id=sra_booking.booking_enquiry_id','left');
       $this->db->order_by("booking_enquiry.id", "desc");
       // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
       $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
       // print_r($arr_data); die;



        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
       
    }



}