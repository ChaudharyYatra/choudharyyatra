<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Day_to_day_program extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/day_to_day_program";
        $this->module_url_customer_attendance    =  base_url().$this->config->item('admin_panel_slug')."/customer_attendance";
		$this->module_daily_program_data    =  base_url().$this->config->item('admin_panel_slug')."/daily_program_data";
		// $this->module_url_path_review    =  base_url().$this->config->item('tour_manager_panel_slug')."/domestic_package_review";
        $this->module_title       = "Day To Day Program";
        $this->module_url_slug    = "day_to_day_program";
        $this->module_view_folder = "day_to_day_program/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,packages.package_type,
        package_type.package_type,tour_manager.name,package_date.journey_date,package_date.id as did,
        supervision.supervision_name";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('assign_staff.name',$id);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
        $this->db->join("supervision", 'assign_staff.name=supervision.id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['module_url_tour_photos'] = $this->module_url_tour_photos;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_daily_program_data'] = $this->module_daily_program_data;
        $this->arr_view_data['module_url_customer_attendance'] = $this->module_url_customer_attendance;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}
	
  
    // Get Details of Package
    public function take_days($id,$did)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

		$id=base64_decode($id);
        // print_r($id);
        $did=base64_decode($did);
        // print_r($did);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   


        $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $this->db->where('tour_number_of_days',$did);
        $arr_data = $this->master_model->getRecords('tour_creation');
        // print_r($arr_data); die;

        // $fields = "tour_creation.*,day_to_day_program.*,add_more_day_to_day_program.*";
        // $this->db->where('tour_creation.is_deleted','no');
        // $this->db->where('tour_creation.package_id',$id);
        // $this->db->where('tour_creation.package_date_id',$did);
        // $this->db->join("day_to_day_program", 'tour_creation.id=day_to_day_program.tour_creation_id','left');
        // $this->db->join("add_more_day_to_day_program", 'day_to_day_program.id=add_more_day_to_day_program.day_to_day_program_id','left');
        // $day_to_day_data = $this->master_model->getRecords('tour_creation',array('tour_creation.is_deleted'=>'no'),$fields);


        $fields = "assign_staff.*,packages.tour_number,packages.tour_number_of_days,packages.tour_title,packages.tour_number,packages.tour_title,package_date.journey_date";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('assign_staff.package_id',$id);
        $this->db->where('assign_staff.package_date_id',$did);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
        $tour_arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_arr_data']        = $tour_arr_data;
        $this->arr_view_data['page_title']      = $this->module_title."";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_customer_attendance'] = $this->module_url_customer_attendance;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_daily_program_data'] = $this->module_daily_program_data;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
   
}