<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Running_tour extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
            redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/running_tour";
        $this->module_url_path_instruction    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/instruction_module";
        $this->module_url_tour_photos    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_photos";
		$this->module_url_path_tour_expenses    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_expenses";
		$this->module_url_path_request_more_fund   =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tm_request_more_fund";
		$this->module_url_path_customer_feedback   =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/customer_feedback";
        $this->module_back   =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/asign_tour_to_manager";
		$this->module_url_path_request_replace_bus   =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/request_replace_bus";
        $this->module_title       = "Running Tour";
        $this->module_url_slug    = "running_tour";
        $this->module_view_folder = "running_tour/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $today= date('Y-m-d');

        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,packages.package_type,
        package_type.package_type,supervision.supervision_name,package_date.journey_date,package_date.id as did";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('assign_staff.name',$id);
        $this->db->where('package_date.journey_date >=',$today);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
        $this->db->join("supervision", 'assign_staff.role_name=supervision.id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['module_url_tour_photos'] = $this->module_url_tour_photos;
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['module_url_tour_photos'] = $this->module_url_tour_photos;
        $this->arr_view_data['module_url_path_customer_feedback'] = $this->module_url_path_customer_feedback;
        $this->arr_view_data['module_url_path_instruction'] = $this->module_url_path_instruction;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_tour_expenses'] = $this->module_url_path_tour_expenses;
        $this->arr_view_data['module_url_path_request_replace_bus'] = $this->module_url_path_request_replace_bus;
        $this->arr_view_data['module_url_path_request_more_fund'] = $this->module_url_path_request_more_fund;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}
	
    public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('assign_staff');
            // print_r($arr_data); die;
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index');
            }   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['tour_status'] = "no";
            }
            else
            {
                $arr_update['tour_status'] = "yes";
            }
            
            if($this->master_model->updateRecord('assign_staff',$arr_update,array('id' => $id)))
            {
                $this->session->set_flashdata('success_message','Completed Tour Successfully.');
            }
            else
            {
             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
            }
        }
        else
        {
           $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');   
    }

   
   
}
