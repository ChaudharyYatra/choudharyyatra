<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];

        if($this->session->userdata('cust_sess_id')=="") 
        { 
                redirect(base_url().'home'); 
        }

        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
	 }

	 
     public function index()
     {
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

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('traveler_id',$id);
        $arr_data = $this->master_model->getRecords('customer_feedback');
        // print_r($arr_data); die;

        $fields = "final_booking.*,packages.tour_title,package_date.journey_date";
        $this->db->where('final_booking.is_deleted','no');
        $this->db->where('final_booking.is_active','yes');
        $this->db->where('final_booking.traveller_id',$id); //check session id & traverl id match
        $this->db->join("packages", 'final_booking.package_id=packages.id','left');
        $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','left');
        // $this->db->join("all_traveller_info", 'final_booking.booking_reference_no=all_traveller_info.booking_reference_no','left');
        $arr_data_tour_details = $this->master_model->getRecords('final_booking',array('final_booking.is_deleted'=>'no'),$fields);
        // print_r($arr_data_tour_details); die;      
                
         
         $data = array('middle_content' => 'feedback',
                        'website_basic_structure'       => $website_basic_structure,
                        'social_media_link'       => $social_media_link,
                        'arr_data'               => $arr_data,
                        'arr_data_tour_details'               => $arr_data_tour_details,
                        'cust_sess_name'        => $cust_sess_name,
                        'cust_sess_lname'        => $cust_sess_lname,
                        // 'packages_data'       => $packages_data,
                        'page_title'    => 'Feedback'
                        );
        $this->arr_view_data['page_title']     =  "Feedback";
        $this->arr_view_data['middle_content'] =  "feedback";
        $this->load->view('front/common_view',$data);
     }


	

}