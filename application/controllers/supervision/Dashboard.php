<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
		// hasemployeepanelaccess();
		// Check supervision Permission
		//hasModuleAccess(6);//set same module id as in module_master table


        $this->module_url_path    =  base_url().$this->config->item('supervision_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{
                $supervision_sess_name = $this->session->userdata('supervision_name');
                $id = $this->session->userdata('supervision_sess_id');
                $supervision_role = $this->session->userdata('supervision_role');
                $supervision_role_name = $this->session->userdata('supervision_role_name');

                $record = array();
                $fields = "request_code_number.*,stationary.stationary_name,agent.agent_name,agent.booking_center,supervision.supervision_name";
                $this->db->where('request_code_number.is_deleted','no');
                $this->db->where('request_code_number.status','no');
                $this->db->join("stationary", 'request_code_number.stationary_type=stationary.id','left');
                $this->db->join("agent", 'request_code_number.agent_id=agent.id','left');
                $this->db->join("supervision", 'request_code_number.superviser_id=supervision.id','left');
                $request_code_number = $this->master_model->getRecords('request_code_number',array('request_code_number.is_deleted'=>'no'),$fields);
                $arr_data['request_code_number'] = count($request_code_number);

                $record = array();
                $fields = "request_code_number.*,stationary.stationary_name,agent.agent_name,agent.booking_center,supervision.supervision_name";
                $this->db->where('request_code_number.is_deleted','no');
                $this->db->where('request_code_number.status','yes');
                $this->db->join("stationary", 'request_code_number.stationary_type=stationary.id','left');
                $this->db->join("agent", 'request_code_number.agent_id=agent.id','left');
                $this->db->join("supervision", 'request_code_number.superviser_id=supervision.id','left');
                $request_code_completed = $this->master_model->getRecords('request_code_number',array('request_code_number.is_deleted'=>'no'),$fields);
                $arr_data['request_code_completed'] = count($request_code_completed);

                $this->db->select("stationary.stationary_name, COUNT(stationary_order_details.id) AS request_count");
                $this->db->from('stationary_order_details');
                $this->db->where('stationary_order_details.is_deleted', 'no');
                $this->db->where('stationary_order_details.order_status', 'completed');
                $this->db->join("stationary", 'stationary_order_details.stationary_name = stationary.id', 'left');
                $this->db->group_by('stationary.stationary_name');
                $this->db->order_by('request_count', 'desc'); // Order by request_count in descending order
                $this->db->limit(5); // Limit the result to the top 5 stationary names

                $top_s_product = $this->db->get()->result_array();
        
        $this->arr_view_data['supervision_role_name']        = $supervision_role_name;
        $this->arr_view_data['supervision_sess_name']        = $supervision_sess_name;
        $this->arr_view_data['supervision_role']        = $supervision_role;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['top_s_product']        = $top_s_product;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('supervision/layout/supervision_combo',$this->arr_view_data);
       
	}


   
}