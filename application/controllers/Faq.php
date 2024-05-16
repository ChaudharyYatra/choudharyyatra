<?php 
//   Controller for: home page
// Author: Vivek
// Start Date: 19-09-2022

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
        
	 }

	 
     public function index()
     {

         $this->db->where('is_deleted','no');
         $this->db->where('is_active','yes');
         $this->db->order_by('id','ASC');
         $faq_details_data = $this->master_model->getRecords('faq');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
         $data = array('middle_content' => 'faq',
                  'faq_details_data'    =>$faq_details_data,
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
						'page_title'    => 'FAQ'
						);
        $this->arr_view_data['page_title']     =  "FAQ";
        $this->arr_view_data['middle_content'] =  "faq";
        $this->load->view('front/common_view',$data);
     }


	

}