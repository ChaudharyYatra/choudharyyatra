<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Birthday_and_anniversary extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/birthday_and_anniversary";
        $this->module_title       = "Birthday  And Anniversary Module";
        $this->module_url_slug    = "birthday_and_anniversary";
        $this->module_view_folder = "birthday_and_anniversary/";    
        $this->load->library('upload');
	}

	public function index()
	{ 
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $record = array();
        $fields = "assign_staff.*,all_traveller_info.dob,all_traveller_info.anniversary_date,all_traveller_info.mobile_number,all_traveller_info.first_name,all_traveller_info.middle_name,all_traveller_info.last_name,all_traveller_info.age";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('all_traveller_info.tour_manager_id',$id);
        $this->db->join("all_traveller_info", 'assign_staff.package_id=all_traveller_info.package_id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
	}
    
}