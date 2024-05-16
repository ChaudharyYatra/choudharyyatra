<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('hotel_sess_id')=="") 
        { 
                redirect(base_url().'hotel/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table


        $this->module_url_path    =  base_url().$this->config->item('hotel_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{
	    $hotel_sess_name = $this->session->userdata('hotel_name');
	    $id = $this->session->userdata('hotel_sess_id');
        $enquiry_data = $this->master_model->getRecords('enquiries');
        $arr_data['enquiry_count'] = count($enquiry_data);

        $this->db->where('hotel_room.hotel_id',$id);
        $this->db->where('hotel_room.is_deleted','no');
        $hotel_room = $this->master_model->getRecords('hotel_room');
        $arr_data['hotel_room'] = count($hotel_room);
        // print_r($arr_data['hotel_room']); die;

        $this->db->where('is_deleted','no');
        $final_booking = $this->master_model->getRecords('final_booking');
        $arr_data['final_booking_count'] = count($final_booking);
        // print_r($final_booking); die;
        
        $this->arr_view_data['hotel_sess_name']        = $hotel_sess_name;
        $this->arr_view_data['id']        = $id;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
       
	} 
   
}