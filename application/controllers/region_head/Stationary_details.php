<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Stationary_details extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('region_head_sess_id')=="") 
        { 
                redirect(base_url().'region_head/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('region_head_panel_slug')."region_head/stationary_details";
        $this->module_title       = "Stationary Completed Orders ";
        $this->module_url_slug    = "stationary_details";
        $this->module_view_folder = "stationary_details/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
        $region_head_sess_name = $this->session->userdata('region_head_name');
        $id = $this->session->userdata('region_head_sess_id');
        $region_id = $this->session->userdata('region_head_region');
        // region means department

         $record = array();
         $fields = "stationary_order.*,agent.agent_name,agent.booking_center,department.department";
         $this->db->order_by('stationary_order.created_at','desc');
         $this->db->where('agent.department',$region_id);
         $this->db->where('stationary_order.order_status','completed');
         $this->db->join("agent", 'stationary_order.agent_id=agent.id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $arr_data = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);

        //  $this->db->where('is_deleted','no');
        //  $arr_data = $this->master_model->getRecords('stationary_order');
        
        $this->arr_view_data['region_head_sess_name'] = $region_head_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." ";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('region_head/layout/region_head_combo',$this->arr_view_data);
        
     }

    // Get Details 
    public function details($id)
    {
        
		 $id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   


         $record = array();
         $fields = "stationary_order_details.*,stationary.stationary_name,agent.agent_name,agent.booking_center,department.department";
         $this->db->order_by('stationary_order_details.created_at','desc');
         $this->db->where('stationary_order_details.is_deleted','no');
        //  $this->db->where('stationary_order_details.agent_id',$id);
         $this->db->where('stationary_order_details.order_id',$id);
         $this->db->join("stationary", 'stationary_order_details.stationary_name=stationary.id','left');
         $this->db->join("agent", 'stationary_order_details.agent_id=agent.id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $arr_data = $this->master_model->getRecords('stationary_order_details',array('stationary_order_details.is_deleted'=>'no'),$fields);
        
         $record = array();
         $fields = "stationary_order.*,agent.agent_name,agent.booking_center,department.department";
         $this->db->order_by('stationary_order.created_at','desc');
         $this->db->where('stationary_order.is_deleted','no');
         $this->db->where('stationary_order.id',$id);
         $this->db->join("agent", 'stationary_order.agent_id=agent.id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $arr_data_s_order = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);

         
        $region_head_sess_name = $this->session->userdata('region_head_name');
        $id = $this->session->userdata('region_head_sess_id');
        $region_id = $this->session->userdata('region_head_region');
        // region means department

        $this->arr_view_data['region_head_sess_name'] = $region_head_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data_s_order'] = $arr_data_s_order;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('region_head/layout/region_head_combo',$this->arr_view_data);
    }



}