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
		// Check supervision Permission
		//hasModuleAccess(6);//set same module id as in module_master table


        $this->module_url_path    =  base_url().$this->config->item('expences_checker_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{ 
                $supervision_sess_name = $this->session->userdata('supervision_name');
                $id = $this->session->userdata('supervision_sess_id');
                $supervision_role = $this->session->userdata('supervision_role');
                $supervision_role_name = $this->session->userdata('supervision_role_name');

                // $this->db->where('is_deleted','no');
                // $assign_staff = $this->master_model->getRecords('assign_staff');
                // $arr_data['assign_staff_count'] = count($assign_staff);
                // print_r($assign_staff); die;
                
        
        $this->arr_view_data['supervision_role']        = $supervision_role;
        $this->arr_view_data['supervision_role_name']        = $supervision_role_name;
        $this->arr_view_data['supervision_sess_name']        = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('expences_checker/layout/expences_checker_combo',$this->arr_view_data);
       
	}


   
}