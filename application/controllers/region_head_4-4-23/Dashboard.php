<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('region_head_sess_id')=="") 
        { 
                redirect(base_url().'region_head/login'); 
        }


        $this->module_url_path    =  base_url().$this->config->item('region_head_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{
                $region_head_sess_name = $this->session->userdata('region_head_name');
                $id = $this->session->userdata('region_head_sess_id');
                $region_id = $this->session->userdata('region_head_region');
                // region means department
       
                // $record = array();
                // $fields = "booking_enquiry.*,agent.department";
                // $this->db->where('is_deleted','no');
                // $this->db->where('followup_status','no');
                // $this->db->where('agent.department',$region_id);
                // $booking_enquiry = $this->master_model->getRecords('booking_enquiry');
                // $arr_data['booking_enquiry_count'] = count($booking_enquiry);

                $record = array();
                $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number,agent.department";
                $this->db->order_by('booking_enquiry.created_at','desc');
                $this->db->where('booking_enquiry.is_deleted','no');
                $this->db->where('followup_status','no');
                $this->db->where('agent.department',$region_id);
                $this->db->join("packages", 'booking_enquiry.package_id=packages.tour_number','left');
                $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
                $booking_enquiry = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
                $arr_data['booking_enquiry_count'] = count($booking_enquiry);

                $record = array();
                $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number,agent.department";
                $this->db->order_by('booking_enquiry.created_at','desc');
                $this->db->where('booking_enquiry.is_deleted','no');
                $this->db->where('followup_status','yes');
                $this->db->where('agent.department',$region_id);
                $this->db->join("packages", 'booking_enquiry.package_id=packages.tour_number','left');
                $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
                $booking_enquiry_follow_up = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
                $arr_data['booking_enquiry_follow_up_count'] = count($booking_enquiry_follow_up);

                $record = array();
                $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number";
                $this->db->order_by('booking_enquiry.created_at','desc');
                $this->db->where('booking_enquiry.is_deleted','no');
                $this->db->where('booking_enquiry.not_interested','no');
                $this->db->where('agent.department',$region_id);
                // $this->db->where('booking_enquiry.agent_id',$id);
                $this->db->join("packages", 'booking_enquiry.package_id=packages.tour_number','left');
                $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
                // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
                $not_interested = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
                $arr_data['not_interested_count'] = count($not_interested);

                $record = array();
                $fields = "international_booking_enquiry.*,international_packages.tour_title,agent.agent_name,international_packages.tour_number";
                $this->db->order_by('international_booking_enquiry.id','desc');
                $this->db->where('international_booking_enquiry.is_deleted','no');
                $this->db->where('followup_status','no');
                $this->db->where('agent.department',$region_id);
                $this->db->join("international_packages", 'international_booking_enquiry.package_id=international_packages.tour_number','left');
                $this->db->join("agent", 'international_booking_enquiry.agent_id=agent.id','left');
                $international_booking_enquiry = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);
                $arr_data['international_booking_enquiry_count'] = count($international_booking_enquiry);

                $record = array();
                $fields = "international_booking_enquiry.*,international_packages.tour_title,agent.agent_name,international_packages.tour_number";
                $this->db->order_by('international_booking_enquiry.id','desc');
                $this->db->where('international_booking_enquiry.is_deleted','no');
                $this->db->where('followup_status','yes');
                $this->db->where('agent.department',$region_id);
                $this->db->join("international_packages", 'international_booking_enquiry.package_id=international_packages.tour_number','left');
                $this->db->join("agent", 'international_booking_enquiry.agent_id=agent.id','left');
                $international_booking_enquiry_followup = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);
                $arr_data['international_booking_enquiry_followup_count'] = count($international_booking_enquiry_followup);
                
                $record = array();
                $fields = "international_booking_enquiry.*,international_packages.tour_title,agent.agent_name,international_packages.tour_number as tno, international_booking_enquiry.package_id as pid";
                $this->db->order_by('international_booking_enquiry.created_at','desc');
                $this->db->where('international_booking_enquiry.is_deleted','no');
                $this->db->where('international_booking_enquiry.not_interested','no');
                $this->db->where('agent.department',$region_id);
                //  $this->db->where('international_booking_enquiry.agent_id',$id);
                $this->db->join("international_packages", 'international_booking_enquiry.package_id= international_packages.tour_number','left');
                $this->db->join("agent", 'international_booking_enquiry.agent_id=agent.id','left');
                // $this->db->join("domestic_followup", 'international_booking_enquiry.id=domestic_followup.international_booking_enquiry_id','left');
                $international_not_interested = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);
                $arr_data['international_not_interested_count'] = count($international_not_interested);

                $fields = "agent.*,department.department";
                $this->db->order_by('agent.arrange_id','asc');        
                $this->db->where('department.is_deleted','no'); 
                $this->db->where('agent.department',$region_id);       
                $this->db->join("department", 'agent.department=department.id','left');
                $total_agent = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
                $arr_data['total_agent_count'] = count($total_agent);

        
                $this->arr_view_data['region_head_sess_name']        = $region_head_sess_name;
                $this->arr_view_data['listing_page']    = 'yes';
                $this->arr_view_data['arr_data']        = $arr_data;
                $this->arr_view_data['page_title']      = $this->module_title." List";
                $this->arr_view_data['module_title']    = $this->module_title;
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
                $this->load->view('region_head/layout/region_head_combo',$this->arr_view_data);
       
	}


   
}