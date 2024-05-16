<?php 
//   Controller for: home page
// Author: Nandkishor Wagh
// Start Date: 29-08-2022
// last updated: 29-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CI_Controller {
	 
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
        $privacy_policy = $this->master_model->getRecords('privacy_policy');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $core_features = $this->master_model->getRecords('core_features');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $client_reviews = $this->master_model->getRecords('client_reviews');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $tour_guides = $this->master_model->getRecords('tour_guides');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
         $data = array('middle_content' => 'privacy_policy',
						'privacy_policy'       => $privacy_policy,
						'core_features'       => $core_features,
						'client_reviews'       => $client_reviews,
						'tour_guides'       => $tour_guides,
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
						'page_title'       => "Privacy Policy",
						);
        $this->arr_view_data['page_title']     =  "Privacy Policy";
        $this->arr_view_data['middle_content'] =  "privacy_policy";
        $this->load->view('front/common_view',$data);
     }


	

}