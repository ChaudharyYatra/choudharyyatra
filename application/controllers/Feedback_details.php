<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_details extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];

        if($this->session->userdata('cust_sess_id')=="") 
        { 
                redirect(base_url().'home'); 
        }

        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
	 }

	 
     public function index($id,$did)
     {
        $cust_sess_name = $this->session->userdata('cust_fname');
        $cust_sess_lname = $this->session->userdata('cust_lname');
        $iid=$this->session->userdata('cust_sess_id');

        $id=base64_decode($id);
        $did=base64_decode($did);
        
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

        $fields = "customer_feedback.*,packages.tour_title,package_date.journey_date,role_type.role_name";
        $this->db->where('customer_feedback.is_deleted','no');
        $this->db->where('customer_feedback.is_active','yes');
        $this->db->where('customer_feedback.traveler_id',$iid); //check session id & traverl id match
        $this->db->where('customer_feedback.package_id',$id);
        $this->db->where('customer_feedback.package_date_id',$did);
        $this->db->join("packages", 'customer_feedback.package_id=packages.id','left');
        $this->db->join("package_date", 'customer_feedback.package_date_id=package_date.id','left');
        $this->db->join("role_type", 'customer_feedback.category=role_type.id','left');
        $arr_data_tour_details = $this->master_model->getRecords('customer_feedback',array('customer_feedback.is_deleted'=>'no'),$fields);
        // print_r($arr_data_tour_details); die;      
                
         
         $data = array('middle_content' => 'feedback_details',
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
                                                'arr_data'               => $arr_data,
                                                'arr_data_tour_details'               => $arr_data_tour_details,
                                                'cust_sess_name'        => $cust_sess_name,
                                                'cust_sess_lname'        => $cust_sess_lname,
						// 'packages_data'       => $packages_data,
						'page_title'    => 'Feedback Details'
						);
        $this->arr_view_data['page_title']     =  "Feedback Details";
        $this->arr_view_data['middle_content'] =  "feedback_details";
        $this->load->view('front/common_view',$data);
     }


	

}