<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Traveller_details extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];

        if($this->session->userdata('cust_sess_id')=="") 
        { 
                redirect(base_url().'home'); 
        }

        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
	 }

	 
     public function index($pid,$pd_id,$enqid)
     {
        // print_r($pid); 
        // print_r($pd_id); 
        // print_r($enqid); die;
        $cust_sess_name = $this->session->userdata('cust_fname');
        $cust_sess_lname = $this->session->userdata('cust_lname');
        $id=$this->session->userdata('cust_sess_id');
        
        $where_in_packages_ids = array();
         
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');

        $today= date('Y-m-d');

        // $fields = "confirm_booking.*,packages.tour_title,package_date.journey_date,agent.booking_center";
        // $this->db->where('confirm_booking.is_deleted','no');
        // $this->db->where('confirm_booking.is_active','yes');
        // $this->db->where('package_date.journey_date >',$today); //comparision grater than or less
        // $this->db->where('confirm_booking.traveler_id',$id); //check session id & traverl id match
        // $this->db->join("packages", 'confirm_booking.package_id=packages.id','left');
        // $this->db->join("package_date", 'confirm_booking.package_date_id=package_date.id','left');
        // $this->db->join("booking_basic_info", 'confirm_booking.enquiry_id=booking_basic_info.domestic_enquiry_id','left');
        // $this->db->join("agent", 'booking_basic_info.boarding_office_location=agent.id','left');
        // $arr_data = $this->master_model->getRecords('confirm_booking',array('confirm_booking.is_deleted'=>'no'),$fields);
        // // print_r($arr_data); die;

        $fields = "confirm_booking.*,packages.tour_title";
        $this->db->where('confirm_booking.is_deleted','no');
        $this->db->where('confirm_booking.is_active','yes');
        $this->db->where('confirm_booking.traveler_id',$id); //check session id & traverl id match
        $this->db->join("packages", 'confirm_booking.package_id=packages.id','left');
        $arr_data2 = $this->master_model->getRecords('confirm_booking',array('confirm_booking.is_deleted'=>'no'),$fields);    
                
        $fields = "all_traveller_info.*";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$enqid); //check session id & traverl id match
        $traveller_info = $this->master_model->getRecords('all_traveller_info');
        // $traveller_info = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);  
        // print_r($traveller_info); die;  
        
        

         
         $data = array('middle_content' => 'traveller_details',
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
                        // 'arr_data'               => $arr_data,
                        'arr_data2'               => $arr_data2,
                        'traveller_info'               => $traveller_info,
                        'cust_sess_name'        => $cust_sess_name,
                        'cust_sess_lname'        => $cust_sess_lname,
						// 'packages_data'       => $packages_data,
						'page_title'    => 'Traveller Details'
						);
        $this->arr_view_data['page_title']     =  "Traveller Details";
        $this->arr_view_data['middle_content'] =  "traveller_details";
        $this->load->view('front/common_view',$data);
     }


	

}