<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agent extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_inspector_sess_id')=="") 
        { 
                redirect(base_url().'agent_inspector/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('agent_inspector_panel_slug')."agent_inspector/agent";
        $this->module_agentwise_enquiry    =  base_url().$this->config->item('agent_inspector_panel_slug')."agent_inspector/agentwise_enquiry";
        $this->module_title       = "Agent";
        $this->module_url_slug    = "agent";
        $this->module_view_folder = "agent/";    
        $this->load->library('upload');
	}

	public function index()
	{	    
        $agent_inspector_sess_name = $this->session->userdata('agent_inspector_name');
        $id = $this->session->userdata('agent_inspector_sess_id');
        $region_id = $this->session->userdata('agent_inspector_region');
        // region means department

        $fields = "agent.*,department.department,agent.id as aid";
        $this->db->order_by('agent.arrange_id','asc');        
        $this->db->where('department.is_deleted','no');
        // $this->db->where('booking_process','no');  
        // $this->db->where('agent.department',$region_id);       
        $this->db->join("department", 'agent.department=department.id','left');
        // $this->db->join("booking_enquiry", 'agent.id=booking_enquiry.agent_id','left');
        $arr_data = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['agent_inspector_sess_name']        = $agent_inspector_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_agentwise_enquiry'] = $this->module_agentwise_enquiry;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent_inspector/layout/agent_inspector_combo',$this->arr_view_data);
       
	}

    // Get Details of Package
    public function details($id)
    {

		$aid=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        $agent_inspector_sess_name = $this->session->userdata('agent_inspector_name');
        $id = $this->session->userdata('agent_inspector_sess_id');
        $region_id = $this->session->userdata('agent_inspector_region');

        // $region_head_sess_name = $this->session->userdata('region_head_name');
        // $id = $this->session->userdata('region_head_sess_id');
        // $region_id = $this->session->userdata('region_head_region');
        // region means department

        $fields = "agent.*,department.department";
        $this->db->where('agent.id',$aid);
        $this->db->join("department", 'agent.department=department.id','left');
        $arr_data = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
       

        $this->arr_view_data['agent_inspector_sess_name']        = $agent_inspector_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('agent_inspector/layout/agent_inspector_combo',$this->arr_view_data);
    }
   

   
}