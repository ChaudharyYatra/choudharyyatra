<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('expences_checker_sess_id')=="") 
        { 
                redirect(base_url().'expences_checker/login'); 
        }


        $this->module_url_path    =  base_url().$this->config->item('expences_checker_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{
                $expences_checker_master_sess_name = $this->session->userdata('expences_checker_name');
                $id = $this->session->userdata('expences_checker_sess_id');
       
                

                $this->arr_view_data['expences_checker_master_sess_name']  = $expences_checker_master_sess_name;
                $this->arr_view_data['listing_page']    = 'yes';
                // $this->arr_view_data['arr_data']        = $arr_data;
                $this->arr_view_data['page_title']      = $this->module_title." List";
                $this->arr_view_data['module_title']    = $this->module_title;
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
                $this->load->view('expences_checker/layout/expences_checker_combo',$this->arr_view_data);
       
	}


   
}