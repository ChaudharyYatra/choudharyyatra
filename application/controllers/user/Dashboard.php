<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('user_sess_id')=="") 
        { 
                redirect(base_url().'user/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table


        $this->module_url_path    =  base_url().$this->config->item('user_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{

        
        // $this->arr_view_data['user_sess_name']        = $user_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['total_enquiry_count']  = $total_enquiry_count;
        // $this->arr_view_data['enquiry_count']  = $enquiry_count;
        // $this->arr_view_data['enquiry_count_total']  = $enquiry_count_total;
        // $this->arr_view_data['internatinal_enquiry_count']  = $internatinal_enquiry_count;
        // $this->arr_view_data['international_enquiry_data_total']  = $international_enquiry_data_total;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('user/layout/user_combo',$this->arr_view_data);
       
	}


   
}