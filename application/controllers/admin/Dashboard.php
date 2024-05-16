<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

        
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $admin_name = $this->session->userdata('name');
        $chy_admin_id = $this->session->userdata('chy_admin_id');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $agent_data = $this->master_model->getRecords('agent');
        $arr_data['agent_count'] = count($agent_data);
        
        $this->db->where('is_deleted','no');
        $enquiry_data = $this->master_model->getRecords('enquiries');
        $arr_data['enquiry_count'] = count($enquiry_data);
        
        $record = array();
        $fields = "packages.*,package_type.package_type";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('package_type.package_type','Domestic Packages');
        $this->db->join("package_type",'packages.package_type=package_type.id','left');
        $package_data = $this->master_model->getRecords('packages');
        $arr_data['package_count'] = count($package_data);
        // print_r($package_data); die;
        
        $this->db->where('is_deleted','no');
        $reviews_data = $this->master_model->getRecords('client_reviews');
        $arr_data['reviews_count'] = count($reviews_data);
	
        $record = array();
        $fields = "packages.*,package_type.package_type";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('package_type.package_type','International Packages');
        $this->db->join("package_type",'packages.package_type=package_type.id','left');
        $international_packages = $this->master_model->getRecords('packages');
        $arr_data['international_count'] = count($international_packages);
        // print_r($international_packages); die;

	$record = array();
        $fields = "packages.*,package_type.package_type";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('package_type.package_type','Custom Domestic Package');
        $this->db->join("package_type",'packages.package_type=package_type.id','left');
        $custom_domestic_packages = $this->master_model->getRecords('packages');
        $arr_data['custom_domestic_packages_count'] = count($custom_domestic_packages);
        // print_r($custom_domestic_packages); die;

        $record = array();
        $fields = "packages.*,package_type.package_type";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('package_type.package_type','Custom International Package');
        $this->db->join("package_type",'packages.package_type=package_type.id','left');
        $custom_inter_packages = $this->master_model->getRecords('packages');
        $arr_data['custom_inter_packages_count'] = count($custom_inter_packages);
        // print_r($custom_inter_packages); die;

        $this->db->where('is_deleted','no');
        $bus_open = $this->master_model->getRecords('bus_open');
        $arr_data['bus_open_count'] = count($bus_open);
        // print_r($arr_data['bus_open_count']); die;

        $this->db->where('is_deleted','no');
        $final_booking = $this->master_model->getRecords('final_booking');
        $arr_data['final_booking_count'] = count($final_booking);
        // print_r($final_booking); die;

        $this->db->where('is_deleted','no');
        $vehicle_owner = $this->master_model->getRecords('vehicle_owner');
        $arr_data['vehicle_owner_count'] = count($vehicle_owner);
        // print_r($vehicle_owner); die;

        $this->db->where('is_deleted','no');
        $vehicle_data = $this->master_model->getRecords('vehicle_details');
        $arr_data['vehicle_data_count'] = count($vehicle_data);
        // print_r($vehicle_owner); die;

        $this->db->where('is_deleted','no');
        $vehicle_driver = $this->master_model->getRecords('vehicle_driver');
        $arr_data['vehicle_driver_count'] = count($vehicle_driver);
        // print_r($vehicle_driver); die;

        $this->db->where('is_deleted','no');
        $package_mapping = $this->master_model->getRecords('package_mapping');
        $arr_data['package_mapping_count'] = count($package_mapping);
        // print_r($arr_data['package_mapping_count']); die;

        $this->db->where('is_deleted','no');
        $booking_enquiry = $this->master_model->getRecords('booking_enquiry');
        $booking_enquiry_count = count($booking_enquiry);

        $today= date('Y-m-d');
        $this->db->where('is_deleted','no');
        $this->db->where('created_at',$today);  
        $todays_new_domestic_enquiry = $this->master_model->getRecords('booking_enquiry');
                // print_r($todays_new_domestic_enquiry); die;
        $arr_data['todays_new_domestic_enquiry_count'] = count($todays_new_domestic_enquiry);
        // print_r($arr_data['todays_new_domestic_enquiry_count']); die;

        // $this->db->where('is_deleted','no');
        // $international_booking_enquiry = $this->master_model->getRecords('international_booking_enquiry');
        // $internatinal_booking_enquiry_count = count($international_booking_enquiry);

        // $total_enquiry_count = $booking_enquiry_count + $internatinal_booking_enquiry_count;
        // $this->arr_view_data['total_enquiry_count']  = $total_enquiry_count;

        $this->db->where('is_deleted','no');
        $total_booking_enquiry = $this->master_model->getRecords('packages');
        $arr_data['total_enquiry_count'] = count($total_booking_enquiry);

        // $this->db->where('is_deleted','no');
        // $total_international_enquiry = $this->master_model->getRecords('international_packages');
        // $total_international_enquiry_count = count($total_international_enquiry);

        
        // $total_packages_count = $total_booking_enquiry_count + $total_international_enquiry_count;
        // $arr_data['total_enquiry_count']  = $total_packages_count;
        
        $fields = "sum(visiter_count) as vcount";
        $arr_data1 = $this->master_model->getRecord('visiter_data',array('visiter_data.is_deleted'=>'yes'),$fields);
        $visiter_c = $arr_data1['vcount'];


        // pie cart query
        // $record = array();
        // $fields = "packages.*,package_type.package_type";
        // $this->db->where('packages.is_deleted','no');
        // // $this->db->where('package_type.package_type','Domestic Packages');
        // $this->db->join("package_type",'packages.package_type=package_type.id','left');
        // $package_type_wise_data = $this->master_model->getRecords('packages');
        // $arr_data['package_count'] = count($package_type_wise_data);
        // print_r($package_type_wise_data); die;


        $record = array();
        $this->db->select("package_type.package_type, COUNT(packages.id) AS package_count");
        $this->db->from('packages');
        $this->db->where('packages.is_deleted', 'no');
        $this->db->join('package_type', 'packages.package_type = package_type.id', 'left');
        $this->db->group_by('package_type.package_type'); // Group by package type
        $package_type_wise_data = $this->db->get()->result_array();
        // print_r($package_type_wise_data); die;

        $record = array();
        $this->db->select("agent.agent_name, COUNT(booking_enquiry.id) AS enquiry_count");
        $this->db->from('agent');
        $this->db->where('agent.is_deleted', 'no');
        $this->db->join('booking_enquiry', 'agent.id = booking_enquiry.agent_id', 'left');
        $this->db->group_by('agent.id'); // Group by agent.id
        $agent_wise_data = $this->db->get()->result_array();

        $record = array();
        $this->db->select("DATE_FORMAT(package_date.journey_date, '%Y-%m') AS month, packages.tour_title, COUNT(packages.id) AS package_count");
        $this->db->from('packages');
        $this->db->where('packages.is_deleted', 'no');
        $this->db->join('package_date', 'packages.id = package_date.package_id', 'left');
        $this->db->group_by('month'); // Group by month and package type
        $month_wise_data = $this->db->get()->result_array();
        // print_r($month_wise_data); die;

        $record = array();
        $this->db->select("agent.agent_name, COUNT(booking_enquiry.id) AS enquiry_count");
        $this->db->from('agent');
        $this->db->where('agent.is_deleted', 'no');
        $this->db->where('booking_enquiry.booking_done', 'yes');
        $this->db->join('booking_enquiry', 'agent.id = booking_enquiry.agent_id', 'left');
        $this->db->group_by('agent.id'); // Group by agent.id
        $top_agent_wise_data = $this->db->get()->result_array();
        // print_r($agent_wise_data); die; 

        $record = array();
        $this->db->select("packages.tour_title, COUNT(packages.id) AS package_count");
        $this->db->from('packages');
        $this->db->where('packages.is_deleted', 'no');
        $this->db->where('booking_basic_info.booking_done', 'yes');
        $this->db->join('booking_basic_info', 'packages.id = booking_basic_info.tour_no', 'left');
        $this->db->group_by('packages.tour_title'); // Group by package name
        $this->db->order_by('package_count', 'desc'); // Order by package_count in descending order
        $this->db->limit(1); // Limit the result to the top rows

        $booking_max_package_data = $this->db->get()->row_array();
        // print_r($booking_max_package_data); die;

        $record = array();
        $this->db->select("vehicle_type.vehicle_type_name, COUNT(vehicle_details.id) AS vehicle_type_count");
        $this->db->from('vehicle_details');
        $this->db->where('vehicle_details.is_deleted', 'no');
        $this->db->join('vehicle_type', 'vehicle_type.id = vehicle_details.vehicle_type', 'left');
        $this->db->group_by('vehicle_details.vehicle_type'); // Group by agent.id
        $vehicle_type_data = $this->db->get()->result_array();
        // print_r($vehicle_type_data); die;


        
        $this->db->select("
        COUNT(booking_enquiry.id) AS total_enquiey_count,
        SUM(CASE WHEN booking_enquiry.followup_status = 'yes' THEN 1 ELSE 0 END) AS total_followup_count,
        SUM(CASE WHEN booking_enquiry.booking_done = 'yes' THEN 1 ELSE 0 END) AS total_booked_count,
        SUM(CASE WHEN booking_enquiry.not_interested = 'no' THEN 1 ELSE 0 END) AS total_notintersted_count
        ");

        $this->db->from('booking_enquiry');
        $this->db->where('booking_enquiry.is_deleted', 'no');

        $enquiry_status = $this->db->get()->row_array();

        // print_r($enquiry_status); die;


        $this->db->select("
        COUNT(agent.id) AS total_agent_count,
        SUM(CASE WHEN agent.is_active = 'yes' THEN 1 ELSE 0 END) AS total_isactive_count,
        SUM(CASE WHEN agent.is_deleted = 'yes' THEN 1 ELSE 0 END) AS total_isdeleted_count
        ");

        $this->db->from('agent');

        $agent_status = $this->db->get()->row_array();

        // print_r($agent_status); die;

        $this->db->select("stationary.stationary_name, COUNT(stationary_order_details.id) AS request_count");
        $this->db->from('stationary_order_details');
        $this->db->where('stationary_order_details.is_deleted', 'no');
        $this->db->where('stationary_order_details.order_status', 'completed');
        $this->db->join("stationary", 'stationary_order_details.stationary_name = stationary.id', 'left');
        $this->db->group_by('stationary.stationary_name');
        $this->db->order_by('request_count', 'desc'); // Order by request_count in descending order
        $this->db->limit(5); // Limit the result to the top 5 stationary names

        $top_s_product = $this->db->get()->result_array();

        // $this->db->where('agent_id',$id);  
        $this->db->where('is_deleted','no'); 
        $this->db->where('payment_confirmed_status','Payment Not Paid'); 
        $booking_payment_details_not_paid = $this->master_model->getRecords('booking_payment_details');
        $arr_data['booking_payment_details_not_paid_count'] = count($booking_payment_details_not_paid);
        // print_r($booking_payment_details_not_paid); die;

        // $this->db->where('agent_id',$id);  
        $this->db->where('is_deleted','no'); 
        $this->db->where('payment_confirmed_status','In Process');
        $this->db->group_by('booking_payment_details.enquiry_id'); 
        $booking_payment_details_in_process = $this->master_model->getRecords('booking_payment_details');
        $arr_data['booking_payment_details_in_process_count'] = count($booking_payment_details_in_process);
        // print_r($booking_payment_details_in_process); die;

        // $this->db->where('agent_id',$id);  
        $this->db->where('is_deleted','no'); 
        $this->db->where('payment_confirmed_status','Payment Completed'); 
        $this->db->group_by('booking_payment_details.enquiry_id'); 
        $booking_payment_details_completed = $this->master_model->getRecords('booking_payment_details');
        $arr_data['booking_payment_details_completed_count'] = count($booking_payment_details_completed);
        // print_r($arr_data['booking_payment_details_in_process_count']); die;
        // print_r($booking_payment_details_completed); die;
        
        $this->arr_view_data['admin_name']        = $admin_name;
        $this->arr_view_data['chy_admin_id']        = $chy_admin_id;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['top_s_product']        = $top_s_product;
        $this->arr_view_data['vehicle_type_data']        = $vehicle_type_data;
        $this->arr_view_data['enquiry_status']        = $enquiry_status;
        $this->arr_view_data['agent_status']        = $agent_status;
        $this->arr_view_data['package_type_wise_data']        = $package_type_wise_data;
        $this->arr_view_data['agent_wise_data']        = $agent_wise_data;
        $this->arr_view_data['month_wise_data']        = $month_wise_data;
        $this->arr_view_data['booking_max_package_data']        = $booking_max_package_data;
        $this->arr_view_data['top_agent_wise_data']        = $top_agent_wise_data;
        $this->arr_view_data['visiter_c']        = $visiter_c;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	} 

}