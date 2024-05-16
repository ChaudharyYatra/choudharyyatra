<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
        
        $this->module_url_path    =  base_url().$this->config->item('front_panel_slug')."dashboard/";
        $this->module_title       = "Dashboard";
        $this->module_view_folder = "dashboard/";
	 }

	 
    public function index()
    {
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $customer = $this->master_model->getRecords('customer');

        
       
         $data = array('middle_content' => 'dashboard',
						'customer'       => $customer
						);
        // $this->arr_view_data['page_title']     =  "Home Page";
        // $this->arr_view_data['middle_content'] =  "index";
        // $this->load->view('front/common_view',$data);

        // $this->arr_view_data['page_title']     =  "Home Page";
        // $this->arr_view_data['$website_visitor_data']  =  $website_visitor_data;
        $this->arr_view_data['middle_content'] =  $this->module_view_folder."dashboard";
        // $this->load->view('front/common_view_home',$data);
    }

	



}