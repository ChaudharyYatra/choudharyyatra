<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Todays_birthdate_anniversary extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/todays_birthdate_anniversary";
        $this->module_title       = "Todays Birthdate";
        $this->module_title_anniversary       = "Todays Anniversary";
        $this->module_url_slug    = "todays_birthdate_anniversary";
        $this->module_view_folder = "todays_birthdate_anniversary/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

          $today= date('Y-m-d');

          $record = array();
          $fields = "all_traveller_info.*";
          $this->db->where('tour_manager_id',$id);
        //   $this->db->where('is_view','no');
          $this->db->where('dob',$today);
          $arr_data = $this->master_model->getRecords('all_traveller_info'); 
        //   print_r($arr_data); die;

        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}

        public function anniversary_index()
	{
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

          $today= date('Y-m-d');

          $record = array();
          $fields = "all_traveller_info.*";
          $this->db->where('tour_manager_id',$id);
        //   $this->db->where('is_view','no');
          $this->db->where('anniversary_date',$today);
          $arr_data = $this->master_model->getRecords('all_traveller_info'); 
        //   print_r($arr_data); die;

        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title_anniversary;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."anniversary_index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
	}
}