<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	 
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
        $sliders = $this->master_model->getRecords('sliders');
        
        $record = array();
        $fields = "packages.*,package_date.journey_date,package_date.single_seat_cost,package_date.twin_seat_cost,package_date.three_four_sharing_cost";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->group_by('package_date.package_id');
        $main_packages_all = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
    //    $test = $this->db->where('CAST(SUBSTR(tour_number, 2) AS UNSIGNED) as tour_number_new');
        // $this->db->order_by('tour_number','ASC');
        // $main_packages = $this->db->query("Select id, academic_year, tour_number, 
        // tour_title, destinations, rating, cost, twin_sharing_per_seat, 
        // three_or_four_sharing_per_seat, tour_number_of_days, image_name, short_description, full_description, iternary, inclusion, terms_conditions, contact_us, is_deleted, is_active, created_at,
        // CAST(tour_number as INT)  as tour_number_new from packages order by tour_number_new asc");
        // $main_packages = $main_packages->result_array();
        // print_r($main_packages);
        // die();
        //  $main_packages = $this->master_model->getRecords('packages');
        //   print_r($main_packages);
        // die();
        
       $record = array();
        $fields = "international_packages.*,international_packages_dates.journey_date,international_packages_dates.single_seat_cost,international_packages_dates.twin_seat_cost,international_packages_dates.three_four_sharing_cost";
        $this->db->where('international_packages.is_deleted','no');
        $this->db->where('international_packages.is_active','yes');
        $this->db->join("international_packages_dates", 'international_packages.id=international_packages_dates.package_id','left');
        $this->db->group_by('package_id');
        
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $international_packages_all = $this->master_model->getRecords('international_packages',array('international_packages.is_deleted'=>'no'),$fields);
        
        // $this->db->order_by('tour_number','ASC');
        // $international_packages = $this->master_model->getRecords('international_packages');
        // $international_packages = $this->db->query("Select id, academic_year, tour_number, 
        // tour_title, destinations, rating, cost, tour_number_of_days, image_name, short_description, 
        // full_description, iternary, inclusion, terms_conditions, contact_us, is_deleted, is_active, created_at,
        // CAST(tour_number as INT)  as tour_number_new from international_packages order by tour_number_new asc");
        // $international_packages = $international_packages->result_array();
        
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
        
        $this->db->limit(6);
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','DESC');
        $top_packages = $this->master_model->getRecords('packages');
        
        $this->db->limit(7);
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','RANDOM');
        $random_packages = $this->master_model->getRecords('packages');
		
		$this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','DESC');
        $package_mapping_data = $this->master_model->getRecords('package_mapping');
       
         $data = array('middle_content' => 'index',
						'sliders'       => $sliders,
						'main_packages'       => $main_packages_all,
						'international_packages'  => $international_packages_all,
						'top_packages'       => $top_packages,
						'random_packages'       => $random_packages,
						'core_features'       => $core_features,
						'client_reviews'       => $client_reviews,
						'tour_guides'       => $tour_guides,
						'website_basic_structure' => $website_basic_structure,
					    'package_mapping_data' => $package_mapping_data,
						'social_media_link' => $social_media_link
						);
        // $this->arr_view_data['page_title']     =  "Home Page";
        // $this->arr_view_data['middle_content'] =  "index";
        // $this->load->view('front/common_view',$data);

        $this->arr_view_data['page_title']     =  "Home Page";
        $this->arr_view_data['middle_content'] =  "index";
        $this->load->view('front/common_view_home',$data);
     }

    public function all_packages_search()
    {
       $destination_name = $this->input->post('destination_name');
       //$tour_date = $this->input->post('tour_date');
       $duration = $this->input->post('duration');
        $aData['msg'] = '';
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('tour_title',$destination_name);
        // $this->db->or_where('tour_number_of_days',$duration);
        $this->db->order_by('id','DESC');
        $main_packages = $this->master_model->getRecords('packages');
        $count= sizeof($main_packages);
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
         $data = array('middle_content' => 'all_packages',
						'main_packages'       => $main_packages,
						'website_basic_structure' => $website_basic_structure,
						'social_media_link' => $social_media_link,
                        'count'      => $count,
                        'page_title' => 'All Packages', 
						'alert_msg'       => $aData,
						);
						
        $this->arr_view_data['page_title']     =  "All Packages";
        $this->load->view('front/common_view',$data);
    }
	

}