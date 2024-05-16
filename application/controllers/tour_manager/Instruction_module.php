<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Instruction_module extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/instruction_module";
        $this->module_title       = "Instruction Module";
        $this->module_url_slug    = "instruction_module";
        $this->module_view_folder = "instruction_module/";    
        $this->load->library('upload');
	}

	public function index($id,$did)
	{ 
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $id=base64_decode($id);
        $did=base64_decode($did);

        $fields = "packages.*,package_type.package_type,package_type.id as pid, packages.id as pack_id,package_date.id as did";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('packages.id',$id);
        $this->db->where('package_date.id',$did);
        $this->db->where('packages.instraction_status','yes');
        // $this->db->OR_where('packages.cust_instraction_status','yes');
		$this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
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
        
    //============

    public function details($id,$did)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id'); 

        $id=base64_decode($id);
        $did=base64_decode($did);
        
		// $id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $record = array();
        $fields = "tm_instraction.*,tm_instraction_attachment.image_name";
        $this->db->where('tm_instraction.is_deleted','no');
        $this->db->where('tm_instraction.tour_no',$id);
        $this->db->join("tm_instraction_attachment", 'tm_instraction.tm_instraction_attachment_id=tm_instraction_attachment.id','left');
        $arr_data = $this->master_model->getRecords('tm_instraction',array('tm_instraction.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $record = array();
        $fields = "tm_instraction.*,tm_instraction_attachment.image_name";
        $this->db->where('tm_instraction.is_deleted','no');
        $this->db->where('tm_instraction.tour_no',$id);
        $this->db->group_by('tour_no');
        $this->db->join("tm_instraction_attachment", 'tm_instraction.tm_instraction_attachment_id=tm_instraction_attachment.id','left');
        $arr_data_top = $this->master_model->getRecords('tm_instraction',array('tm_instraction.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['id']        = $id;
        $this->arr_view_data['did']        = $did;
        $this->arr_view_data['arr_data_top']        = $arr_data_top;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }
   
}