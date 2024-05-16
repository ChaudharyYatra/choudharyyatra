<?php 
//   Controller for: home page
// Author: Rupali patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        
        $this->arr_view_data = [];
	 }


	 
     public function index($id)
     {
        if ($id=='') 
        {
            redirect(base_url.'/home');
        }   

        if(is_numeric($id))
        {
            $this->db->where('id',$id);
            $packages_details_data = $this->master_model->getRecords('packages');
        }
        else
        {
            redirect(base_url().'home');
        }

        if(is_numeric($id))
        {
            $this->db->where('id',$id);
            $traveler_details_data = $this->master_model->getRecords('travelers');
        }

        if(is_numeric($id))
        {
            $this->db->where('package_id',$id);
            $package_date_details_data = $this->master_model->getRecords('package_date');
        }
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
         $data = array('middle_content' => 'booking',
						'packages_details_data'       => $packages_details_data,
                        'traveler_details_data'       => $traveler_details_data,
                        'package_date_details_data'       => $package_date_details_data,
                        'website_basic_structure'       => $website_basic_structure,
						);
        $this->arr_view_data['page_title']     =  " Booking Page";
        $this->arr_view_data['middle_content'] =  "booking";
        $this->load->view('front/common_view',$data);
     }


}
