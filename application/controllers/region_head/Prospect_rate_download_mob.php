<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prospect_rate_download_mob extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('region_head_sess_id')=="") 
        { 
                redirect(base_url().'region_head/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('region_head_panel_slug')."region_head/prospect_rate_download_mob";
        $this->module_title       = "Prospect and Rate Chart Downloaded Mobile no list";
        $this->module_url_slug    = "prospect_rate_download_mob";
        $this->module_view_folder = "prospect_rate_download_mob/";    
        
	}

	public function index()
	{  
        $region_head_sess_name = $this->session->userdata('region_head_name');
        $id = $this->session->userdata('region_head_sess_id');
        $region_id = $this->session->userdata('region_head_region');
        $agent_region_id = $this->session->userdata('agent_region_id');

        $fields = "prospect_downloaded.*,agent.agent_name";
        $this->db->order_by('prospect_downloaded.id','desc');
        $this->db->where('prospect_downloaded.is_deleted','no');
        $this->db->where('prospect_downloaded.region_office_location',$region_id);
        $this->db->join("agent", 'prospect_downloaded.assign_agent_id=agent.id','left');
        $arr_data = $this->master_model->getRecords('prospect_downloaded',array('prospect_downloaded.is_deleted'=>'no','prospect_downloaded.is_active'=>'yes'),$fields);
        // print_r($arr_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('department',$region_id);
        $agent_data = $this->master_model->getRecords('agent');
        // print_r($agent_data); die;

        $this->arr_view_data['region_head_sess_name']        = $region_head_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['agent_data']        = $agent_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('region_head/layout/region_head_combo',$this->arr_view_data);
	}
    


        public function assign_agent()
        {
                $region_head_sess_name = $this->session->userdata('region_head_name');
                $id = $this->session->userdata('region_head_sess_id');
                $region_id = $this->session->userdata('region_head_region');
                $agent_region_id = $this->session->userdata('agent_region_id');
             
             if($this->input->post('submit'))
             {
                 $this->form_validation->set_rules('agent_name', 'agent_name', 'required');
                 
                 if($this->form_validation->run() == TRUE)
                 { 
                        // print_r($_REQUEST); die;
                     $agent_name  = $this->input->post('agent_name'); 
                     $prospect_id  = $this->input->post('prospect_id'); 
                     
                     $arr_insert = array(
                         'assign_agent_id'   =>   $agent_name,
                         'agent_assign_status' => 'yes'
     
                     );
                        $arr_where     = array("id" => $prospect_id);
                        $inserted_id = $this->master_model->updateRecord('prospect_downloaded',$arr_insert,$arr_where);
     
                      if($inserted_id > 0)
                      {
                          $this->session->set_flashdata('success_message',"Agent Assign Successfully.");
                          redirect($this->module_url_path.'/index');
                      }
      
                      else
                      {
                          $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                      }
                      redirect($this->module_url_path.'/index');

                     }
     
                     else
                     {
                         $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                     }
                     redirect($this->module_url_path.'/index');
                 }  
                 else{
                    redirect($this->module_url_path.'/index');
                } 
             
     
     
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