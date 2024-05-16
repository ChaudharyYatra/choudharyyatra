<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
        parent::__construct();

		// if(!isset($this->session->userdata['nabcons_username']))
		// 	redirect(base_url().'webmanager/admin/login');
 
	 	// Check User Permission
		//set same module id as in module_master table
		
  
		$this->arr_view_data      = [];
		$this->user_id            =  $this->session->userdata('nabcons_id');
		$this->name               =  $this->session->userdata('nabcons_username');
		$this->ip                 =  $this->input->ip_address();
		$this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/dashboard";
		$this->module_title       = "Dashboard";
		$this->module_url_slug    = "dashboard";
		$this->module_view_folder = "admin.dashboard";    
    }
	
	public function dashboard(){ 
		// $aData['po_count'] = $this->master_model->getRecordCount('purchase_request');
		// $aData['po_active_count'] = $this->master_model->getRecordCount('purchase_request',array('po_status'=>'Working'));
		// $aData['vendor_count'] = $this->master_model->getRecordCount('vendor_master',array('status'=>'Active'));
		// $aData['po_count_pdf'] = $this->master_model->getRecordCount('purchase_order',array('is_deleted'=>'0'));
		$aData['middle_content'] = 'dashboard';
		$this->arr_view_data['active_tender_count']  = $this->master_model->getRecordCount('tenders',array('is_delete'=>'no','is_active'=>'yes'));
		$this->arr_view_data['empanelment_count']  = $this->master_model->getRecordCount('nes_basic_details',array('is_deleted'=>0));
		$this->arr_view_data['lead_count']  = $this->master_model->getRecordCount('leads');
		$this->arr_view_data['project_count']  = $this->master_model->getRecordCount('projects',array('status'=>'1'));
		
		   $advisories_info =$this->master_model->getRecords("nabcons_advisory",array('type'=>'Advisories'),array('id','title'),array('id'=>'desc'));
	        $policies_info =$this->master_model->getRecords("nabcons_advisory",array('type'=>'Policies'),array('id','title'),array('id'=>'desc'));
	        $guidelines_info =$this->master_model->getRecords("nabcons_advisory",array('type'=>'Guidelines'),array('id','title'),array('id'=>'desc'));
	        $publications_info =$this->master_model->getRecords("nabcons_advisory",array('type'=>'Publications'),array('id','title'),array('id'=>'desc'));
	        $otherresources_info =$this->master_model->getRecords("nabcons_advisory",array('type'=>'Other Resources'),array('id','title'),array('id'=>'desc'));
	        $circular_info =$this->master_model->getRecords("nabcons_circular",'',array('id','circular_title'),array('id'=>'desc'));



	            $this->db->order_by('id','desc');
        
        
	     $user_role = $this->session->userdata('nabcons_user_role');
        if($user_role == 'Admin')
        {
            $this->db->where('is_delete','no');
        }
        else
        {
           
            $this->db->where('is_delete','no');
            $this->db->where('is_active','yes');
            $this->db->where('is_admin_approve','yes');
            $this->db->where('type!=','external');
            //$this->db->where('type','internal');
              
        }
       	$this->db->limit(4);
        $arr_data_blog = $this->master_model->getRecords('blogs');



		$this->arr_view_data['page_title']          = "Common Information";
		$this->arr_view_data['user_role']    	    = $user_role;
		$this->arr_view_data['module_title']        = $this->module_title;
		$this->arr_view_data['module_url_path']     = $this->module_url_path;
		$this->arr_view_data['advisories_info']     = $advisories_info;
		$this->arr_view_data['arr_data_blog']       = $arr_data_blog;
		$this->arr_view_data['policies_info']       = $policies_info;
		$this->arr_view_data['guidelines_info']     = $guidelines_info;
		$this->arr_view_data['publications_info']   = $publications_info;
		$this->arr_view_data['otherresources_info'] = $otherresources_info;
		$this->arr_view_data['circular_info']       = $circular_info;
		$this->arr_view_data['page_title']          = $this->module_title." List";
		$this->arr_view_data['module_title']        = $this->module_title;
		$this->arr_view_data['module_url_path']     = $this->module_url_path.'/add';
		$this->arr_view_data['middle_content']      = "dashboard";
		$this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}

    public function blog_details($id)
    {
        $this->db->where('id',$id);

        $arr_data = $this->master_model->getRecords('blogs');
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Detail ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."page_details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
	

}
