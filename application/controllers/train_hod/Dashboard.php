<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table


        $this->module_url_path    =  base_url().$this->config->item('train_hod_slug')."/dashboard";
        $this->module_url_path_followup_list    =  base_url().$this->config->item('train_hod_slug')."/todays_domestic_followup_list";
        $this->module_url_path_inter_followup_list    =  base_url().$this->config->item('train_hod_slug')."/todays_international_followup_list";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{

        // $today= date('Y-m-d');

	$supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');
        $supervision_role = $this->session->userdata('supervision_role');
        $supervision_role_name = $this->session->userdata('supervision_role_name');

        $this->db->where('tour_expenses.tour_manager_id',$id);  
        $this->db->where('is_deleted','no'); 
        $tour_expenses = $this->master_model->getRecords('tour_expenses');
        $arr_data['tour_expenses_count'] = count($tour_expenses);
        // print_r($tour_expenses); die;

        $this->db->where('suggestion_module.tour_manager_id',$id);  
        $this->db->where('is_deleted','no'); 
        $suggestion_data = $this->master_model->getRecords('suggestion_module');
        $arr_data['suggestion_data_count'] = count($suggestion_data);
        // print_r($suggestion_data); die;
        
        
        $this->arr_view_data['supervision_role_name']        = $supervision_role_name;
        $this->arr_view_data['supervision_sess_name']        = $supervision_sess_name;
        $this->arr_view_data['supervision_role']        = $supervision_role;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('train_hod/layout/agent_combo',$this->arr_view_data);
       
	}

  

}