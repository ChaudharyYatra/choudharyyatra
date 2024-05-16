<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_cancel_tour extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/customer_cancel_tour";
        $this->module_title       = "Customer Cancel Tour";
        $this->module_url_slug    = "customer_cancel_tour";
        $this->module_view_folder = "customer_cancel_tour/";
        $this->arr_view_data = [];
	}


    public function index()
    {
       $agent_sess_name = $this->session->userdata('agent_name');
       $id = $this->session->userdata('agent_sess_id');

       $fields = "customer_cancel_tour.*,packages.tour_title,packages.id as pid,package_date.journey_date,agent.agent_name";
       $this->db->where('customer_cancel_tour.is_deleted','no');
       $this->db->where('customer_cancel_tour.is_active','yes');
    //    $this->db->where('customer_cancel_tour.traveler_id',$id); //check session id & traverl id match
    //    $this->db->where('customer_cancel_tour.package_id',$pid);
    //    $this->db->where('customer_cancel_tour.package_date_id',$pd_id);
    //    $this->db->where('customer_cancel_tour.enquiry_id',$enquiry_id);
       $this->db->join("packages", 'customer_cancel_tour.package_id=packages.id','left');
       $this->db->join("package_date", 'customer_cancel_tour.package_date_id=package_date.id','left');
       $this->db->join("agent", 'customer_cancel_tour.take_enquiry_by_agent_id=agent.id','left');
       $tour_details_view = $this->master_model->getRecords('customer_cancel_tour',array('customer_cancel_tour.is_deleted'=>'no'),$fields);
    //    print_r($tour_details_view); die;

        $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['tour_details_view']        = $tour_details_view;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
       
    }
}