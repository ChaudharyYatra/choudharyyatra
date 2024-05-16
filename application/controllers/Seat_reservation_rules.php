<?php 
//   Controller for: home page
// Author: Nandkishor Wagh
// Start Date: 29-08-2022
// last updated: 29-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Seat_reservation_rules extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
	 }

	 
     public function index()
     {
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $seat_reservation_rules = $this->master_model->getRecords('seat_reservation_rules');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
         $data = array('middle_content' => 'seat_reservation_rules',
						'seat_reservation_rules'       => $seat_reservation_rules,
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
						'page_title'       => "Seat Reservation Rules",
						);
        $this->arr_view_data['page_title']     =  "Seat Reservation Rules";
        $this->arr_view_data['middle_content'] =  "seat_reservation_rules";
        $this->load->view('front/common_view',$data);
     }


	

}