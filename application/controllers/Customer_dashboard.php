<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_dashboard extends CI_Controller {
	 
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

        $today= date('Y-m-d');

        $fields = "confirm_booking.*,packages.tour_title,package_date.journey_date,agent.booking_center,cust_instraction.*,cust_instraction_attachment.image_name";
        $this->db->where('confirm_booking.is_deleted','no');
        $this->db->where('confirm_booking.is_active','yes');
        // $this->db->where('package_date.journey_date >',$today); //comparision grater than or less
        $this->db->where('confirm_booking.traveler_id',$id); //check session id & traverl id match
        $this->db->join("packages", 'confirm_booking.package_id=packages.id','left');
        $this->db->join("package_date", 'confirm_booking.package_date_id=package_date.id','left');
        $this->db->join("booking_basic_info", 'confirm_booking.enquiry_id=booking_basic_info.domestic_enquiry_id','left');
        $this->db->join("agent", 'booking_basic_info.boarding_office_location=agent.id','left');
        $this->db->join("cust_instraction", 'confirm_booking.package_id=cust_instraction.tour_no','left');
        $this->db->join("cust_instraction_attachment", 'confirm_booking.package_id=cust_instraction_attachment.tour_no','left');
        // $this->db->group_by('tour_no');
        $arr_data = $this->master_model->getRecords('confirm_booking',array('confirm_booking.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        // foreach ($arr_data as &$data) {
        //     // Calculate remaining time for the tour
        //     $journeyDateTime = new DateTime($data['journey_date']);
        //     // print_r($journeyDateTime); die;
        //     $currentDateTime = new DateTime();
        
        //     $interval = $journeyDateTime->diff($currentDateTime);
        
        //     $data['remaining_days'] = $interval->format('%a');
        //     // print_r($data['remaining_days']);
        //     $data['remaining_hours'] = $interval->format('%h');
        //     // print_r($data['remaining_hours']); die;

        //     $data['remaining_minutes'] = $interval->format('%i');
        //     // print_r($data['remaining_minutes']); die;

        //     $data['remaining_seconds'] = $interval->format('%s');
        //     // print_r($data['remaining_seconds']); die;

        // }


        $fields = "confirm_booking.*,packages.tour_title,package_date.journey_date,agent.booking_center";
        $this->db->where('confirm_booking.is_deleted','no');
        $this->db->where('confirm_booking.is_active','yes');
        // $this->db->where('package_date.journey_date >',$today); //comparision grater than or less
        $this->db->where('confirm_booking.traveler_id',$id); //check session id & traverl id match
        $this->db->where('confirm_booking.tour_status','confirm');
        $this->db->join("packages", 'confirm_booking.package_id=packages.id','left');
        $this->db->join("package_date", 'confirm_booking.package_date_id=package_date.id','left');
        $this->db->join("booking_basic_info", 'confirm_booking.enquiry_id=booking_basic_info.domestic_enquiry_id','left');
        $this->db->join("agent", 'booking_basic_info.boarding_office_location=agent.id','left');
        $arr_data_tour = $this->master_model->getRecords('confirm_booking',array('confirm_booking.is_deleted'=>'no'),$fields);
        // print_r($arr_data_tour); die;

        $tour_count = count($arr_data_tour);
        // print_r($tour_count); die;

        $record = array();
        $fields = "tm_instraction.*,tm_instraction_attachment.image_name";
        $this->db->where('tm_instraction.is_deleted','no');
        $this->db->where('tm_instraction.tour_no',$id);
        $this->db->group_by('tour_no');
        $this->db->join("tm_instraction_attachment", 'tm_instraction.tm_instraction_attachment_id=tm_instraction_attachment.id','left');
        $arr_data_top = $this->master_model->getRecords('tm_instraction',array('tm_instraction.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        $fields = "final_booking.*,packages.tour_title";
        $this->db->where('final_booking.is_deleted','no');
        $this->db->where('final_booking.is_active','yes');
        // $this->db->where('final_booking.tour_status','1');
        // $this->db->OR_where('final_booking.tour_status','2');
        $this->db->where('final_booking.id',$id); //check session id & traverl id match
        $this->db->join("packages", 'final_booking.package_id=packages.id','left');
        $arr_data2 = $this->master_model->getRecords('final_booking',array('final_booking.is_deleted'=>'no'),$fields);    

         
        $data = array('middle_content' => 'customer_dashboard',
                        'website_basic_structure'       => $website_basic_structure,
                        'social_media_link'       => $social_media_link,
                        'arr_data'               => $arr_data,
                        'tour_count'               => $tour_count,
                        'arr_data_tour'               => $arr_data_tour,
                        'arr_data2'               => $arr_data2,
                        'cust_sess_name'        => $cust_sess_name,
                        'cust_sess_lname'        => $cust_sess_lname,
                        'page_title'    => 'Customer Dashboard');

        $this->arr_view_data['page_title']     =  "Customer Dashboard";
        $this->arr_view_data['middle_content'] =  "customer_dashoboard";
        $this->load->view('front/common_view',$data);
     }





}