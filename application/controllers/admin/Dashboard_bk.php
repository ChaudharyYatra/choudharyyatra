<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";    
        $this->load->library('upload');
	}

	public function index()
	{
	   
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $agent_data = $this->master_model->getRecords('agent');
        $arr_data['agent_count'] = count($agent_data);
        
        $this->db->where('is_deleted','no');
        $enquiry_data = $this->master_model->getRecords('enquiries');
        $arr_data['enquiry_count'] = count($enquiry_data);
        
        $this->db->where('is_deleted','no');
        $package_data = $this->master_model->getRecords('packages');
        $arr_data['package_count'] = count($package_data);
        
        $this->db->where('is_deleted','no');
        $reviews_data = $this->master_model->getRecords('client_reviews');
        $arr_data['reviews_count'] = count($reviews_data);
		
	$this->db->where('is_deleted','no');
        $international_packages = $this->master_model->getRecords('international_packages');
        $arr_data['international_count'] = count($international_packages);

        $this->db->where('is_deleted','no');
        $package_mapping = $this->master_model->getRecords('package_mapping');
        $arr_data['package_mapping_count'] = count($package_mapping);
        // print_r($arr_data['package_mapping_count']); die;

        $this->db->where('is_deleted','no');
        $booking_enquiry = $this->master_model->getRecords('booking_enquiry');
        $booking_enquiry_count = count($booking_enquiry);

        $today= date('Y-m-d');
        $this->db->where('is_deleted','no');
        $this->db->where('created_at',$today);  
        $todays_new_domestic_enquiry = $this->master_model->getRecords('booking_enquiry');
                // print_r($todays_new_domestic_enquiry); die;
        $arr_data['todays_new_domestic_enquiry_count'] = count($todays_new_domestic_enquiry);
        // print_r($arr_data['todays_new_domestic_enquiry_count']); die;

        $this->db->where('is_deleted','no');
        $international_booking_enquiry = $this->master_model->getRecords('international_booking_enquiry');
        $internatinal_booking_enquiry_count = count($international_booking_enquiry);

        $total_enquiry_count = $booking_enquiry_count + $internatinal_booking_enquiry_count;
        $this->arr_view_data['total_enquiry_count']  = $total_enquiry_count;
		
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	} 
   
}