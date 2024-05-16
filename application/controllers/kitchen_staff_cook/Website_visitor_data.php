<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Website_visitor_data extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/website_visitor_data";
        $this->module_booking_enquiry    =  base_url().$this->config->item('agent_panel_slug')."/booking_enquiry";
        $this->module_title       = "Website Visitor Data";
        $this->module_url_slug    = "website_visitor_data";
        $this->module_view_folder = "website_visitor_data/";    
        $this->load->library('upload');
        $this->load->model('member');
	}

    public function index()
    {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');
        // print_r($id); die;

       $record = array();
       $fields = "website_visitor_data.*,agent.agent_name,agent.booking_center,department.department";
       $this->db->order_by('website_visitor_data.created_at','desc');
       $this->db->where('website_visitor_data.is_deleted','no');
       $this->db->where('website_visitor_data.interested_in','Domastic');
       $this->db->where('website_visitor_data.booking_center',$id);
       $this->db->join("agent", 'website_visitor_data.booking_center=agent.id','left');
       $this->db->join("department", 'website_visitor_data.department_id=department.id','left');
       $arr_data = $this->master_model->getRecords('website_visitor_data',array('website_visitor_data.is_deleted'=>'no'),$fields);
    //    print_r($arr_data); die;
       
    //    $this->db->where('is_deleted','no');
    //    $this->db->where('status','approved');
    //    $followup_reason_data = $this->master_model->getRecords('followup_reason');
       
        // $this->arr_view_data['followup_reason_data'] = $followup_reason_data;
        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        // $this->arr_view_data['module_url_path_domestic_followup'] = $this->module_url_path_domestic_followup;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        // $this->arr_view_data['module_title_followup']    = $this->module_title_followup;
        // $this->arr_view_data['module_url_path_booking_basic_info'] = $this->module_url_path_booking_basic_info;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_booking_enquiry'] = $this->module_booking_enquiry;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
       
    }
	
}