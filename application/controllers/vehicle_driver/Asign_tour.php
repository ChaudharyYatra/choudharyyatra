<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asign_tour extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('vehicle_driver_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_driver/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_driver_panel_slug')."vehicle_driver/asign_tour";
        $this->module_url_kilometer_update =  base_url().$this->config->item('vehicle_driver_panel_slug')."vehicle_driver/kilometer_update";
		$this->module_url_path_iternary    =  base_url().$this->config->item('vehicle_driver_panel_slug')."/package_iternary";
		$this->module_url_asign_driver    =  base_url().$this->config->item('vehicle_driver_panel_slug')."vehicle_driver/asign_driver";
		$this->module_url_disel_expenses    =  base_url().$this->config->item('vehicle_driver_panel_slug')."vehicle_driver/disel_tour_expenses";
        $this->module_title       = "Asign Tour";
        $this->module_url_slug    = "asign_tour";
        $this->module_view_folder = "asign_tour/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
            $id = $this->session->userdata('vehicle_driver_sess_id');

        // $fields = "packages.*,package_date.journey_date,agent.booking_center,vehicle_details.registration_number,package_date.id as did";
        // // $this->db->order_by('id','ASC');
        // $this->db->where('packages.is_deleted','no');
        // $this->db->where('asign_tour_manager.driver_id',$id);
        // $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        // $this->db->join("asign_tour_manager", 'packages.id=asign_tour_manager.package_id','left');
        // $this->db->join("vehicle_driver", 'asign_tour_manager.driver_id=vehicle_driver.id','left');
        // $this->db->join("agent", 'packages.boarding_office=agent.id','left');
        // $this->db->join("vehicle_details", 'asign_tour_manager.vehicle_id=vehicle_details.id','left');
        // $asigned_tour = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // // print_r($asigned_tour); die;

        $fields = "bus_open.*,vehicle_driver.driver_name,vehicle_details.registration_number,packages.tour_number,packages.tour_title,
        package_date.journey_date,agent.booking_center,packages.tour_number_of_days,package_date.id as did";
        $this->db->where('bus_open.is_deleted','no');
        $this->db->where('bus_open.asign_driver_name',$id);
        $this->db->join("packages", 'bus_open.package_id=packages.id','left');
         $this->db->join("package_date", 'bus_open.package_date_id=package_date.id','left');
         $this->db->join("agent", 'packages.boarding_office=agent.id','left');
        $this->db->join("vehicle_driver", 'bus_open.asign_driver_name=vehicle_driver.id','left');
        $this->db->join("vehicle_details", 'bus_open.vehicle_rto_registration=vehicle_details.id','left');
        $asigned_tour = $this->master_model->getRecords('bus_open',array('bus_open.is_deleted'=>'no'),$fields);
        // print_r($asigned_tour); die;

        
        $this->arr_view_data['vehicle_ssession_driver_name']= $vehicle_ssession_driver_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['asigned_tour']        = $asigned_tour;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_kilometer_update'] = $this->module_url_kilometer_update;
		$this->arr_view_data['module_url_disel_expenses'] = $this->module_url_disel_expenses;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_asign_driver'] = $this->module_url_asign_driver;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);
       
	}
	
	// Get Details of Package
    public function iternary_details($id,$did)
    {
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $session_id = $this->session->userdata('vehicle_driver_sess_id');
    
		$id=base64_decode($id); 
        $did=base64_decode($did); 
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "bus_open.*,packages.tour_number,packages.tour_title,package_date.journey_date,package_date.id";
        $this->db->where('bus_open.is_deleted','no');
        // $this->db->where('asign_tour_manager.is_active','yes');
        $this->db->where('bus_open.package_id',$id);
        $this->db->where('package_date.id',$did);
        $this->db->join("packages", 'bus_open.package_id=packages.id','left');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $package_data = $this->master_model->getRecords('bus_open',array('bus_open.is_deleted'=>'no'),$fields);
        // print_r($package_data); die;

        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_title,package_iternary.day_number,package_iternary.iternary_desc,package_iternary.image_name";
        $this->db->where('asign_tour_manager.is_deleted','no');
        // $this->db->where('asign_tour_manager.is_active','yes');
        $this->db->where('asign_tour_manager.package_id',$id);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_iternary", 'packages.id=package_iternary.package_id','left');
        $arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['vehicle_ssession_driver_name']        = $vehicle_ssession_driver_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['package_data']        = $package_data;
        $this->arr_view_data['page_title']      = $this->module_title." Iternary Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."iternary_details";
        $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);


    }
   
}