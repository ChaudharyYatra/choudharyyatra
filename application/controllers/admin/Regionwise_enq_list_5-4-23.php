<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Regionwise_enq_list extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }

	   
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/regionwise_enq_list";
        $this->module_url_path_back    =  base_url().$this->config->item('admin_panel_slug')."/region_head";
        $this->module_title       = "All Enquiries List";
        $this->module_url_slug    = "regionwise_enq_list";
        $this->module_view_folder = "regionwise_enq_list/";    
        // $this->load->library('upload');
	}

	public function index($id)
	{  
        $fields = "booking_enquiry.*,agent.booking_center,agent.id,packages.tour_number,packages.tour_title,agent.agent_name";
        $this->db->order_by('booking_enquiry.id','desc');      
        $this->db->where('agent.department',$id);         
        $this->db->join("agent", 'agent.id=booking_enquiry.agent_id','left');
        $this->db->join("packages", 'packages.id=booking_enquiry.package_id','left');
        $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
    //    print_r($arr_data); die;

       $fields = "international_booking_enquiry.*,agent.booking_center,agent.id,international_packages.tour_number,international_packages.tour_title,agent.agent_name";
       $this->db->order_by('international_booking_enquiry.id','desc');   
       $this->db->where('agent.department',$id);   
       $this->db->join("agent", 'agent.id=international_booking_enquiry.agent_id','left');
       $this->db->join("international_packages", 'international_packages.id=international_booking_enquiry.package_id','left');
       $inter_arr_data = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);
    //   print_r($arr_data); die;

    $add_attributes = array_merge($arr_data, $inter_arr_data);
    // print_r($add_attributes); die;


        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['add_attributes']        = $add_attributes;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_back'] = $this->module_url_path_back;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}


}