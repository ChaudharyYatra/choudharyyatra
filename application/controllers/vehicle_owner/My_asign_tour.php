<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class My_asign_tour extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('vehicle_owner_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_owner/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_owner_panel_slug')."vehicle_owner/my_asign_tour";
        $this->module_url_path_dates    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/domestic_package_review";
		$this->module_url_path_customer_feedback    =  base_url().$this->config->item('vehicle_owner_panel_slug')."vehicle_owner/customer_feedback";
        $this->module_title       = "My Asign Tour";
        $this->module_url_slug    = "my_asign_tour";
        $this->module_view_folder = "my_asign_tour/";    
        $this->load->library('upload');
	}

	public function index() 
	{
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $id = $this->session->userdata('vehicle_owner_sess_id');

        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,packages.package_type,agent.booking_center,
        packages.tour_number_of_days,package_type.package_type,package_date.journey_date,vehicle_owner.vehicle_owner_name,package_date.id as did";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('assign_staff.name',$id);
        $this->db->where('assign_staff.role_name','9');
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("agent", 'packages.boarding_office=agent.id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
        $this->db->join("vehicle_owner", 'assign_staff.name=vehicle_owner.id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        $this->arr_view_data['vehicle_ssession_owner_name']= $vehicle_ssession_owner_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
		$this->arr_view_data['module_url_path_customer_feedback'] = $this->module_url_path_customer_feedback;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
       
	}
	
    // Get Details of Package
    public function iternary_details($id,$did)
    {
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $session_id = $this->session->userdata('vehicle_owner_sess_id');
    
		$id=base64_decode($id); 
        $did=base64_decode($did); 
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_title,package_date.journey_date,package_date.id";
        $this->db->where('asign_tour_manager.is_deleted','no');
        // $this->db->where('asign_tour_manager.is_active','yes');
        $this->db->where('asign_tour_manager.id',$id);
        $this->db->where('package_date.id',$did);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $package_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($package_data); die;

        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_title,package_iternary.day_number,package_iternary.iternary_desc,package_iternary.image_name";
        $this->db->where('asign_tour_manager.is_deleted','no');
        // $this->db->where('asign_tour_manager.is_active','yes');
        $this->db->where('asign_tour_manager.id',$id);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_iternary", 'packages.id=package_iternary.package_id','left');
        $arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['vehicle_ssession_owner_name']        = $vehicle_ssession_owner_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['package_data']        = $package_data;
        $this->arr_view_data['page_title']      = $this->module_title." Iternary Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."iternary_details";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);

    }
   

}