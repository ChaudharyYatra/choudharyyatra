<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('stationary_sess_id')=="") 
        { 
                redirect(base_url().'stationary/login'); 
        }
		// hasemployeepanelaccess();
		// Check stationary Permission
		//hasModuleAccess(6);//set same module id as in module_master table


        $this->module_url_path    =  base_url().$this->config->item('stationary_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{
                $stationary_sess_name = $this->session->userdata('stationary_name');
                $id = $this->session->userdata('stationary_sess_id');
                
                $this->db->where('is_deleted','no');
                $this->db->where('order_status','pending');
                $stationary_order = $this->master_model->getRecords('stationary_order');
                $stationary_order_count = count($stationary_order);

                $today= date('Y-m-d');

                $this->db->where('is_deleted','no'); 
                $this->db->where('received_status','no'); 
                $this->db->where('created_at',$today);  
                $stationary_order_today = $this->master_model->getRecords('stationary_order');
                
                $stationary_order_today_count = count($stationary_order_today);

        
        $this->arr_view_data['stationary_sess_name']        = $stationary_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['stationary_order_count']        = $stationary_order_count;
        $this->arr_view_data['stationary_order_today_count']        = $stationary_order_today_count;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('stationary/layout/stationary_combo',$this->arr_view_data);
       
	}


   
}