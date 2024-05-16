<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Supervision_request_completed extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('supervision_panel_slug')."supervision/supervision_request_completed";
        $this->module_title       = "Request Completed";
        $this->module_url_slug    = "supervision_request_completed";
        $this->module_view_folder = "supervision_request_completed/";
        $this->arr_view_data = [];
        date_default_timezone_set('Asia/Kolkata');
	 }

     public function index()
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        
        $record = array();
        $fields = "request_code_number.*,stationary.stationary_name,agent.agent_name,agent.booking_center,supervision.supervision_name";
        $this->db->where('request_code_number.is_deleted','no');
        $this->db->where('request_code_number.status','yes');
        $this->db->join("stationary", 'request_code_number.stationary_type=stationary.id','left');
        $this->db->join("agent", 'request_code_number.agent_id=agent.id','left');
        $this->db->join("supervision", 'request_code_number.superviser_id=supervision.id','left');
        $arr_data = $this->master_model->getRecords('request_code_number',array('request_code_number.is_deleted'=>'no'),$fields);

         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['iid'] = $iid;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('supervision/layout/supervision_combo',$this->arr_view_data);
        
     }

        


}