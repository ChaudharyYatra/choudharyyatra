<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prospect_rate_download_mob extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/prospect_rate_download_mob";
        $this->module_title       = "Prospect and Rate Chart Downloaded Mobile no list";
        $this->module_url_slug    = "prospect_rate_download_mob";
        $this->module_view_folder = "prospect_rate_download_mob/";    
        
	}

	public function index()
	{  
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('prospect_downloaded');

        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $fields = "prospect_downloaded.*,agent.booking_center,agent.id as booking_center_id";
        $this->db->order_by('id','desc');
        $this->db->where('prospect_downloaded.is_deleted','no');
        $this->db->where('prospect_downloaded.is_active','yes');
        $this->db->where('prospect_downloaded.assign_agent_id',$id);
        $this->db->join("agent", 'agent.id=prospect_downloaded.region_office_location','left');
        $arr_data = $this->master_model->getRecords('prospect_downloaded',array('prospect_downloaded.is_deleted'=>'no'),$fields);

         $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
	}
    

    
    // Delete
    
    // public function delete($id)
    // {
    //     $id=base64_decode($id);
    //     if($id!='')
    //     {   
    //         $this->db->where('id',$id);
    //         $arr_data = $this->master_model->getRecords('prospect_add');

    //         if(empty($arr_data))
    //         {
    //             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //             redirect($this->module_url_path);
    //         }
    //         $arr_update = array('is_deleted' => 'yes');
    //         $arr_where = array("id" => $id);
                 
    //         if($this->master_model->updateRecord('prospect_add',$arr_update,$arr_where))
    //         {
    //             $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
    //         }
    //         else
    //         {
    //             $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
    //         }
    //     }
    //     else
    //     {
           
    //            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //     }
    //     redirect($this->module_url_path.'/index');  
    // }
   

}