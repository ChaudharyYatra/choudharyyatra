<?php 
//   Controller for: home page
// Author: Nandkishor Wagh
// Start Date: 01-09-2022
// last updated: 01-09-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_list extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
	 }

	 
     public function index()
     {
        $fields = "agent.*,department.department";
        $this->db->where('department.is_deleted','no');
        $this->db->where('department.is_active','yes');
        $this->db->order_by('agent.arrange_id','ASC');
        $this->db->join("department", 'agent.department=department.id','left');
        $agents_list = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no','agent.is_active'=>'yes'),$fields);
       
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
        $this->db->order_by('id','ASC');
        $this->db->group_by('id','ASC');
        $department_list = $this->master_model->getRecords('department');
        $data = array('middle_content' => 'agents_list',               
                        'agents_list'   => $agents_list,
                        'website_basic_structure'   => $website_basic_structure,
                        'social_media_link'   => $social_media_link,
					    'department_list'       => $department_list,
						'page_title'       => "Agents List",
						);
        $this->arr_view_data['page_title']     =  "Agents List";
        $this->arr_view_data['middle_content'] =  "agents_list";
        $this->load->view('front/common_view',$data);
     }


	

}