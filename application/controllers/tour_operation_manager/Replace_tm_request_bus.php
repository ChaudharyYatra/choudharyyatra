<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Replace_tm_request_bus extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/replace_tm_request_bus";
        $this->module_url_path_change_bus    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/change_bus";
        $this->module_title       = "Request From TM For Replace Bus";
        $this->module_url_slug    = "replace_tm_request_bus";
        $this->module_view_folder = "replace_tm_request_bus/";    
        $this->load->library('upload');
	}

    
	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('assign_staff');
        // print_r($arr_data); die;

        $fields = "request_to_tom_replace_bus.*,packages.tour_number,packages.tour_title,supervision.supervision_name,
        vehicle_owner.vehicle_owner_name,vehicle_details.registration_number,vehicle_details.seat_capacity";
        $this->db->where('request_to_tom_replace_bus.is_deleted','no');
        $this->db->join("packages", 'request_to_tom_replace_bus.package_id=packages.id','left');
        $this->db->join("supervision", 'request_to_tom_replace_bus.tour_manager_id=supervision.id','left');
        $this->db->join("vehicle_owner", 'request_to_tom_replace_bus.vehicle_owner_id=vehicle_owner.id','left');
        $this->db->join("vehicle_details", 'request_to_tom_replace_bus.vehicle_rto_registration=vehicle_details.id','left');
        $arr_data = $this->master_model->getRecords('request_to_tom_replace_bus',array('request_to_tom_replace_bus.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['id']        = $id;
        // $this->arr_view_data['pid']        = $pid;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_change_bus'] = $this->module_url_path_change_bus;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}
	
    public function show_replace_bus_record($bus_request_id,$id,$did)
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        // echo $bus_request_id;
        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('assign_staff');
        // print_r($arr_data); die;

        // $fields = "change_bus.*,packages.tour_number,packages.tour_title,vehicle_owner.vehicle_owner_name,vehicle_details.registration_number,vehicle_details.seat_capacity";
        // $this->db->where('change_bus.is_deleted','no'); 
        // $this->db->where('change_bus.package_date_id',$did);
        // $this->db->where('change_bus.request_to_tom_replace_bus_id',$bus_request_id);
        // $this->db->join("packages", 'change_bus.package_id=packages.id','left');
        // $this->db->join("request_to_tom_replace_bus", 'change_bus.package_id=request_to_tom_replace_bus.package_id','left');
        // $this->db->join("package_date", 'change_bus.package_date_id=package_date.id','left');
        // $this->db->join("vehicle_owner", 'change_bus.vehicle_owner_id=vehicle_owner.id','left');
        // $this->db->join("vehicle_details", 'change_bus.vehicle_rto_registration=vehicle_details.id','left');
        // $arr_data = $this->master_model->getRecords('change_bus',array('change_bus.is_deleted'=>'no'),$fields);
        // // print_r($arr_data); die;

        $fields = "change_bus.*,packages.tour_number,packages.tour_title,vehicle_owner.vehicle_owner_name,vehicle_details.registration_number,vehicle_details.seat_capacity";
        $this->db->where('change_bus.is_deleted','no'); 
        $this->db->where('change_bus.package_date_id',$did);
        $this->db->where('change_bus.request_to_tom_replace_bus_id',$bus_request_id);
        $this->db->join("packages", 'change_bus.package_id=packages.id','left');
        // $this->db->join("request_to_tom_replace_bus", 'change_bus.package_id=request_to_tom_replace_bus.package_id','left');
        $this->db->join("package_date", 'change_bus.package_date_id=package_date.id','left');
        $this->db->join("vehicle_owner", 'change_bus.vehicle_owner_id=vehicle_owner.id','left');
        $this->db->join("vehicle_details", 'change_bus.vehicle_rto_registration=vehicle_details.id','left');
        $arr_data = $this->master_model->getRecords('change_bus',array('change_bus.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $fields = "request_to_tom_replace_bus.*,vehicle_details.registration_number,vehicle_details.seat_capacity";
        $this->db->where('request_to_tom_replace_bus.is_deleted','no'); 
        $this->db->where('request_to_tom_replace_bus.id',$bus_request_id);
        $this->db->join("vehicle_details", 'request_to_tom_replace_bus.vehicle_rto_registration=vehicle_details.id','left');
        $rto_arr_data = $this->master_model->getRecord('request_to_tom_replace_bus',array('request_to_tom_replace_bus.is_deleted'=>'no'),$fields);
        // print_r($rto_arr_data); die;
        $RTO_no_data = $rto_arr_data['registration_number'];

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['RTO_no_data']        = $RTO_no_data;
        // $this->arr_view_data['pid']        = $pid;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_change_bus'] = $this->module_url_path_change_bus;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."show_replace_bus_record";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}
   
}