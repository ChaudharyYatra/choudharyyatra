<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agentwise_enquiry extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('region_head_sess_id')=="") 
        { 
                redirect(base_url().'region_head/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('region_head_panel_slug')."region_head/agentwise_enquiry";
        $this->module_url_path_booking_basic_info    =  base_url().$this->config->item('region_head_panel_slug')."region_head/booking_basic_info";
        $this->module_title       = "Agent Enquiry";
        $this->module_url_slug    = "agentwise_enquiry";
        $this->module_view_folder = "agentwise_enquiry/";    
        $this->module_view_folder_process = "domestic_booking_process/"; 
        $this->load->library('upload');
	}

	public function index($aid)
	{	    
        $region_head_sess_name = $this->session->userdata('region_head_name');
        $rid = $this->session->userdata('region_head_sess_id');
        //$region_id = $this->session->userdata('region_head_region');
        // region means department

        $fields = "booking_enquiry.*,agent.booking_center,agent.id,packages.tour_number,packages.tour_title,agent.agent_name";
        $this->db->order_by('booking_enquiry.id','desc');      
        $this->db->where('agent.id',$aid);         
        $this->db->join("agent", 'agent.id=booking_enquiry.agent_id','left');
        $this->db->join("packages", 'packages.id=booking_enquiry.package_id','left');
        $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        //    print_r($arr_data); die;

       $fields = "international_booking_enquiry.*,agent.booking_center,agent.id,international_packages.tour_number,international_packages.tour_title,agent.agent_name";
       $this->db->order_by('international_booking_enquiry.id','desc');   
       $this->db->where('agent.id',$aid);   
       $this->db->join("agent", 'agent.id=international_booking_enquiry.agent_id','left');
       $this->db->join("international_packages", 'international_packages.id=international_booking_enquiry.package_id','left');
       $inter_arr_data = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);
           //print_r($inter_arr_data); die;

        $add_attributes = array_merge($arr_data, $inter_arr_data);
        // print_r($add_attributes); die;

        $this->arr_view_data['region_head_sess_name']        = $region_head_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['add_attributes']        = $add_attributes;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('region_head/layout/region_head_combo',$this->arr_view_data);
       
	}
	
	public function all_booking_process($aid)
	{	    
        $region_head_sess_name = $this->session->userdata('region_head_name');
        $rid = $this->session->userdata('region_head_sess_id');

        // $fields = "booking_enquiry.*,agent.booking_center,agent.id,packages.tour_number,packages.tour_title,agent.agent_name";
        // $this->db->order_by('booking_enquiry.id','desc');      
        // $this->db->where('agent.id',$aid);         
        // $this->db->join("agent", 'agent.id=booking_enquiry.agent_id','left');
        // $this->db->join("packages", 'packages.id=booking_enquiry.package_id','left');
        // $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        
        
         $record = array();
        $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number as tno,booking_enquiry.package_id as pid";
        $this->db->order_by('booking_enquiry.created_at','desc');
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('booking_enquiry.booking_process','yes');
        $this->db->where('booking_enquiry.agent_id',$aid);
        $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
        $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        $this->db->order_by("booking_enquiry.created_at", "desc");
        // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
        $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        //print_r($arr_data); die;


      //  $add_attributes = array_merge($arr_data, $inter_arr_data);
        // print_r($add_attributes); die;

        $this->arr_view_data['region_head_sess_name']        = $region_head_sess_name;
                $this->arr_view_data['module_url_path_booking_basic_info'] = $this->module_url_path_booking_basic_info;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        //$this->arr_view_data['add_attributes']        = $add_attributes;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder_process."index";
        $this->load->view('region_head/layout/region_head_combo',$this->arr_view_data);
       
	}

}