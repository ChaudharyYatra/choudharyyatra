<?php 
//   Controller for: gallery page
// Author: Vivek
// Start Date: 30-08-2022
// last updated: 30-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
	 }

	 
     public function index()
     {
        $aData['msg'] = '';
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $gallery = $this->master_model->getRecords('gallery');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
         $data = array('middle_content' => 'gallery',
						'gallery'       => $gallery,
						'website_basic_structure'   => $website_basic_structure,
						'social_media_link'   => $social_media_link,
						'page_title'       => 'Gallery',
						);
        $this->arr_view_data['page_title']     =  "Gallery";
        $this->arr_view_data['middle_content'] =  "gallery";
        $this->load->view('front/common_view',$data);
     }


	

}