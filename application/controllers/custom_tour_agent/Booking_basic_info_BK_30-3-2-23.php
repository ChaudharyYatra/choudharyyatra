<?php 
//   Controller for: home page
// Author: Mahesh Mhaske
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_basic_info extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/booking_basic_info";
        $this->module_all_traveller_info    =  base_url().$this->config->item('agent_panel_slug')."/all_traveller_info";
        $this->module_booking_enquiry    =  base_url().$this->config->item('agent_panel_slug')."/booking_enquiry";
        $this->domestic_booking_process    =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process";
        $this->module_title       = "Booking Basic Info";
        $this->module_ursl_slug    = "booking_basic_info";
        $this->module_view_folder = "booking_basic_info/";
        $this->arr_view_data = [];
	 }
         
     public function index()
     {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');
        // if($this->input->post('submit'))
        //  {
        //     redirect($this->module_url_path_bus_seat_sel.'/index');
        //  }
        
        
         $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
        //  $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_all_traveller_info'] = $this->module_all_traveller_info;
         $this->arr_view_data['module_booking_enquiry'] = $this->module_booking_enquiry;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        
     }

    public function add($iid="")
    {  
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');
         
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $agent_data = $this->master_model->getRecords('agent');
        // print_r($agent_data); die;
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');
        // print_r($agent_booking_enquiry_data); die;

        $record = array();
        $fields = "agent.*,department.department,booking_enquiry.seat_count,booking_enquiry.id as enq_id";
        $this->db->where('agent.is_deleted','no');
        $this->db->where('agent.id',$id);
        $this->db->where('booking_enquiry.id',$iid);
        $this->db->join("department", 'agent.department=department.id','left');
        $this->db->join("booking_enquiry", 'agent.id=booking_enquiry.agent_id','left');
        $agent_department = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
        // print_r($agent_department); die;

        $record = array();
        $fields = "booking_enquiry.*,media_source.media_source_name";
        $this->db->where('booking_enquiry.is_deleted','no');
        // $this->db->where('booking_enquiry.id',$id);
        $this->db->where('booking_enquiry.id',$iid);
        $this->db->join("media_source", 'booking_enquiry.media_source_name=media_source.id','left');
        $media_source_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($media_source_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('packages');
        // print_r($packages_data_booking); die; 
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $package_agent_booking_enquiry_data = $this->master_model->getRecord('booking_enquiry');
        $package_id=$package_agent_booking_enquiry_data['package_id'];
        // print_r($package_agent_booking_enquiry_data); die;

        $record = array();
        $fields = "packages.*,booking_enquiry.package_id,hotel_type.hotel_type_name";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('packages.id',$package_id);
        $this->db->join("hotel_type", 'packages.hotel_type=hotel_type.id','left');
        $arr_packages_data_booking = $this->master_model->getRecord('packages');
        //  print_r($arr_packages_data_booking); die;   

        $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        $hotel_type_info = $this->master_model->getRecords('packages');
        // print_r($hotel_type_info); die;

        $record = array();
        $fields = "packages.*,package_date.journey_date,package_date.id as p_date_id";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.id',$package_id);
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $add_journey_date = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($add_journey_date); die;  

        $boarding_office_location=array();
        if(!empty($arr_packages_data_booking)){
        $boffice=explode(',',$arr_packages_data_booking['boarding_office']);
        // die;
            // print_r($boffice);
            // die;
       
        for($i=0;$i<count($boffice);$i++){
            $boffice[$i];
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('agent.id',$boffice[$i]);
        $boarding_location_multi = $this->master_model->getRecord('agent');
        //     print_r($boarding_location_multi);
        // die;
        array_push($boarding_office_location,$boarding_location_multi);
            }
        }
    // print_r($boarding_office_location); die;

        $record = array();
        $fields = "booking_enquiry.*,packages.id,packages.tour_title,packages.tour_number";
        $this->db->order_by('booking_enquiry.id','desc');
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $this->db->join("packages", 'packages.id=booking_enquiry.package_id','left');
        $tour_no_title = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($tour_no_title); die;

        $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        $master_media_source = $this->master_model->getRecords('media_source');
        // print_r($master_media_source); die;

        // $record = array();
        // $fields = "booking_basic_info.*,packages.id,packages.tour_title,packages.tour_number";
        // $this->db->where('booking_basic_info.is_deleted','no');
        // $this->db->where('domestic_enquiry_id',$iid);
        // $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');
        // $booking_data = $this->master_model->getRecord('booking_basic_info');
        // print_r($booking_data); die;

        $record = array();
        $fields = "booking_basic_info.*,packages.tour_number,packages.tour_title,package_date.journey_date,agent.booking_center";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('booking_basic_info.domestic_enquiry_id',$iid);
        $this->db->join("package_date", 'booking_basic_info.tour_date=package_date.id','left');
        $this->db->join("packages", 'booking_basic_info.tour_no=packages.id','left');
        $this->db->join("agent", 'booking_basic_info.boarding_office_location=agent.id','left');
        $booking_data = $this->master_model->getRecord('booking_basic_info',
        array('booking_basic_info.is_deleted'=>'no'),$fields);
        // print_r($booking_data); die;
        
         if($this->input->post('submit'))
        {
             //print_r($_REQUEST);
            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
            $this->form_validation->set_rules('booking_office', 'Booking office', 'required');
            $this->form_validation->set_rules('regional_office', 'Regional office', 'required');
            $this->form_validation->set_rules('mrandmrs', 'Mr / Mrs', 'required');
            $this->form_validation->set_rules('surname', 'Srname', 'required');
            $this->form_validation->set_rules('first_name', 'First name', 'required');
            $this->form_validation->set_rules('middle_name', 'Middle name', 'required');
            $this->form_validation->set_rules('seat_count', 'Enter seat count', 'required');
            $this->form_validation->set_rules('mobile_number', 'mobile number', 'required');
            $this->form_validation->set_rules('media_source_name', 'media source name', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('tour_no', 'Select tour', 'required');
            $this->form_validation->set_rules('boarding_office_location', 'Boarding office location', 'required');
            $this->form_validation->set_rules('tour_date', 'Select tour date', 'required');
            $this->form_validation->set_rules('hotel_type', 'Hotel date', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                //echo 'ppppppp';
                //die;
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $booking_office  = $this->input->post('booking_office'); 
                $regional_office  = $this->input->post('regional_office');
                $mrandmrs  = $this->input->post('mrandmrs'); 
                $surname  = $this->input->post('surname'); 
                $first_name  = $this->input->post('first_name'); 
                $middle_name  = $this->input->post('middle_name'); 
                $seat_count  = $this->input->post('seat_count'); 
                $mobile_number  = $this->input->post('mobile_number'); 
                $media_source_name  = $this->input->post('media_source_name'); 
                $gender  = $this->input->post('gender'); 
                $tour_no  = $this->input->post('tour_no');
                $boarding_office_location  = $this->input->post('boarding_office_location');
                $tour_date  = $this->input->post('tour_date'); 
                $hotel_type  = $this->input->post('hotel_type'); 
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                    'domestic_enquiry_id' =>   $domestic_enquiry_id,
                    'booking_office' =>   $booking_office,
                    'regional_office' =>   $regional_office,
                    'mr/mrs'   =>   $mrandmrs, 
                    'srname'   =>   $surname, 
                    'first_name'   =>   $first_name, 
                    'middle_name'   =>   $middle_name, 
                    'seat_count'=>$seat_count,
                    'mobile_number'   =>   $mobile_number, 
                    'media_source_name'   =>   $media_source_name, 
                    'gender'=>$gender,
                    'tour_no'   =>   $tour_no,
                    'boarding_office_location'   =>   $boarding_office_location,   
                    'tour_date'    =>$tour_date,
                    'hotel_type'=>$hotel_type
                 );
                 
                if(!empty($booking_data)){
                    $arr_where     = array("domestic_enquiry_id" => $iid);
                     $inserted_id = $this->master_model->updateRecord('booking_basic_info',$arr_insert,$arr_where);
                    }else{
                        $inserted_id = $this->master_model->insertRecord('booking_basic_info',$arr_insert,true);
                    }
                    
                //  print_r($arr_insert); die;
                
                               
                 $arr_update = array(
                    'booking_process'   =>   'yes'
                 );
                 $arr_where     = array("id" => $domestic_enquiry_id);
                 $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);

                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->domestic_booking_process.'/index');
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
        }


        //booking basic info  book now btn functinality 
        if($this->input->post('booknow_submit'))
        {
             //print_r($_REQUEST);
            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
            $this->form_validation->set_rules('booking_office', 'Booking office', 'required');
            $this->form_validation->set_rules('regional_office', 'Regional office', 'required');
            $this->form_validation->set_rules('mrandmrs', 'Mr / Mrs', 'required');
            $this->form_validation->set_rules('surname', 'Srname', 'required');
            $this->form_validation->set_rules('first_name', 'First name', 'required');
            $this->form_validation->set_rules('middle_name', 'Middle name', 'required');
            $this->form_validation->set_rules('seat_count', 'Enter seat count', 'required');
            $this->form_validation->set_rules('mobile_number', 'mobile number', 'required');
            $this->form_validation->set_rules('media_source_name', 'media source name', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('tour_no', 'Select tour', 'required');
            $this->form_validation->set_rules('boarding_office_location', 'Boarding office location', 'required');
            $this->form_validation->set_rules('tour_date', 'Select tour date', 'required');
            $this->form_validation->set_rules('hotel_type', 'Hotel date', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                //echo 'ppppppp';
                //die;
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $booking_office  = $this->input->post('booking_office'); 
                $regional_office  = $this->input->post('regional_office');
                $mrandmrs  = $this->input->post('mrandmrs'); 
                $surname  = $this->input->post('surname'); 
                $first_name  = $this->input->post('first_name'); 
                $middle_name  = $this->input->post('middle_name'); 
                $seat_count  = $this->input->post('seat_count'); 
                $mobile_number  = $this->input->post('mobile_number'); 
                $media_source_name  = $this->input->post('media_source_name'); 
                $gender  = $this->input->post('gender'); 
                $tour_no  = $this->input->post('tour_no');
                $boarding_office_location  = $this->input->post('boarding_office_location');
                $tour_date  = $this->input->post('tour_date'); 
                $hotel_type  = $this->input->post('hotel_type');
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                     'domestic_enquiry_id' =>   $domestic_enquiry_id,
                     'booking_office' =>   $booking_office,
                     'regional_office' =>   $regional_office,
                     'mr/mrs'   =>   $mrandmrs, 
                     'srname'   =>   $surname, 
                     'first_name'   =>   $first_name, 
                     'middle_name'   =>   $middle_name, 
                     'seat_count'=>$seat_count,
                     'mobile_number'   =>   $mobile_number, 
                     'media_source_name'   =>   $media_source_name, 
                     'gender'=>$gender,
                     'tour_no'   =>   $tour_no,
                     'boarding_office_location'   =>   $boarding_office_location,   
                     'tour_date'    =>$tour_date,
                     'hotel_type'=>$hotel_type
                 );

                    if(!empty($booking_data)){
                    $arr_where     = array("domestic_enquiry_id" => $iid);
                     $inserted_id = $this->master_model->updateRecord('booking_basic_info',$arr_insert,$arr_where);
                    }else{
                        $inserted_id = $this->master_model->insertRecord('booking_basic_info',$arr_insert,true);
                    }
                //  print_r($arr_insert); die;
            
                               
                 $arr_update = array(
                    'booking_process'   =>   'yes'
                 );
                 $arr_where     = array("id" => $domestic_enquiry_id);
                 $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);
                 
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_all_traveller_info.'/add/'.$iid);
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
        }
 
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['agent_data']        = $agent_data;
         $this->arr_view_data['agent_booking_enquiry_data']        = $agent_booking_enquiry_data;
         $this->arr_view_data['package_agent_booking_enquiry_data']        = $package_agent_booking_enquiry_data;
         $this->arr_view_data['agent_department']        = $agent_department;
         $this->arr_view_data['media_source_data']        = $media_source_data;
         $this->arr_view_data['booking_data']        = $booking_data;
         $this->arr_view_data['master_media_source']        = $master_media_source;
         $this->arr_view_data['arr_packages_data_booking']        = $arr_packages_data_booking;
         $this->arr_view_data['tour_no_title']        = $tour_no_title;
         $this->arr_view_data['add_journey_date']        = $add_journey_date;
         $this->arr_view_data['boarding_office_location']        = $boarding_office_location;
         $this->arr_view_data['hotel_type_info']        = $hotel_type_info;
         $this->arr_view_data['arr_packages_data_booking']        = $arr_packages_data_booking;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['domestic_booking_process'] = $this->domestic_booking_process;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_booking_enquiry'] = $this->module_booking_enquiry;
         $this->arr_view_data['module_all_traveller_info'] = $this->module_all_traveller_info;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }


    public function edit($iid="")
    {  
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');
         
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $agent_data = $this->master_model->getRecords('agent');
        // print_r($agent_data); die;
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');
        // print_r($agent_booking_enquiry_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $booking_basic_data = $this->master_model->getRecords('booking_basic_info');
        // print_r($booking_basic_data); die;

        $record = array();
        $fields = "agent.*,department.department,booking_enquiry.seat_count,booking_enquiry.id as enq_id,booking_basic_info.middle_name";
        $this->db->where('agent.is_deleted','no');
        $this->db->where('agent.id',$id);
        $this->db->where('booking_enquiry.id',$iid);
        $this->db->where('booking_basic_info.domestic_enquiry_id',$iid);
        $this->db->join("department", 'agent.department=department.id','left');
        $this->db->join("booking_enquiry", 'agent.id=booking_enquiry.agent_id','left');
        $this->db->join("booking_basic_info", 'booking_enquiry.id=booking_basic_info.domestic_enquiry_id','left');
        $agent_department = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
        // print_r($agent_department); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('packages');
        // print_r($packages_data_booking); die; 
        
        $this->db->where('is_deleted','no');
        $media_source_data = $this->master_model->getRecords('media_source');
        // print_r($media_source_data);

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $package_agent_booking_enquiry_data = $this->master_model->getRecord('booking_enquiry');
        $package_id=$package_agent_booking_enquiry_data['package_id'];
        // print_r($package_agent_booking_enquiry_data); die;
        
        $record = array();
        $fields = "packages.*,booking_enquiry.package_id";
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('packages.id',$package_id);
        $arr_packages_data_booking = $this->master_model->getRecord('packages');
        //  print_r($arr_packages_data_booking); die;   

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('packages');
        // print_r($packages_data_booking); die;   

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $booking_basic_info_data = $this->master_model->getRecord('booking_basic_info');
        // print_r($booking_basic_info_data); die;

        // echo $iid;   
        $record = array();
        $fields = "booking_basic_info.*,packages.tour_number,packages.tour_title,package_date.journey_date,agent.booking_center";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('booking_basic_info.domestic_enquiry_id',$iid);
        $this->db->join("package_date", 'booking_basic_info.tour_date=package_date.id','left');
        $this->db->join("packages", 'booking_basic_info.tour_no=packages.id','left');
        $this->db->join("agent", 'booking_basic_info.boarding_office_location=agent.id','left');
        $edit_booking_basic_info = $this->master_model->getRecords('booking_basic_info',
        array('booking_basic_info.is_deleted'=>'no'),$fields);
        // print_r($edit_booking_basic_info); die;  

        $boarding_office_location=array();
        if(!empty($arr_packages_data_booking)){
        $boffice=explode(',',$arr_packages_data_booking['boarding_office']);
        // die;
            // print_r($boffice);
            // die;
       
        for($i=0;$i<count($boffice);$i++){
            $boffice[$i];
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('agent.id',$boffice[$i]);
        $boarding_location_multi = $this->master_model->getRecord('agent');
        //     print_r($boarding_location_multi);
        // die;
        array_push($boarding_office_location,$boarding_location_multi);
            }
       
        
    }
    // print_r($boarding_office_location);
    // die;
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $packages_data = $this->master_model->getRecords('package_date');
        // print_r($packages_data); die;

        $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        $hotel_type_info = $this->master_model->getRecords('hotel_type');
        // print_r($hotel_type_info); die;
       


         if($this->input->post('submit'))
        {
             //print_r($_REQUEST);
            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
            $this->form_validation->set_rules('booking_office', 'Booking office', 'required');
            $this->form_validation->set_rules('regional_office', 'Regional office', 'required');
            $this->form_validation->set_rules('mrandmrs', 'Mr / Mrs', 'required');
            $this->form_validation->set_rules('surname', 'Srname', 'required');
            $this->form_validation->set_rules('first_name', 'First name', 'required');
            $this->form_validation->set_rules('middle_name', 'Middle name', 'required');
            $this->form_validation->set_rules('seat_count', 'Enter seat count', 'required');
            $this->form_validation->set_rules('mobile_number', 'mobile number', 'required');
            $this->form_validation->set_rules('media_source_name', 'media source name', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            
             
             if($this->form_validation->run() == TRUE)
             { 
                //echo 'ppppppp';
                //die;
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $booking_office  = $this->input->post('booking_office'); 
                $regional_office  = $this->input->post('regional_office');
                $mrandmrs  = $this->input->post('mrandmrs'); 
                $surname  = $this->input->post('surname'); 
                $first_name  = $this->input->post('first_name'); 
                $middle_name  = $this->input->post('middle_name'); 
                $seat_count  = $this->input->post('seat_count'); 
                $mobile_number  = $this->input->post('mobile_number'); 
                $media_source_name  = $this->input->post('media_source_name'); 
                $gender  = $this->input->post('gender'); 
                $tour_no  = $this->input->post('tour_no');
                $boarding_office_location  = $this->input->post('boarding_office_location');
                $tour_date  = $this->input->post('tour_date'); 
                $hotel_type  = $this->input->post('hotel_type'); 

                $arr_update = array(
                     'domestic_enquiry_id' =>   $domestic_enquiry_id,
                     'booking_office' =>   $booking_office,
                     'regional_office' =>   $regional_office,
                     'mr/mrs'   =>   $mrandmrs, 
                     'srname'   =>   $surname, 
                     'first_name'   =>   $first_name, 
                     'middle_name'   =>   $middle_name, 
                     'seat_count'=>$seat_count,
                     'mobile_number'   =>   $mobile_number, 
                     'media_source_name'   =>   $media_source_name, 
                     'gender'=>$gender,
                     'tour_no'   =>   $tour_no,
                     'boarding_office_location'   =>   $boarding_office_location,   
                     'tour_date'    =>$tour_date,
                     'hotel_type'=>$hotel_type
                 );
                 $arr_where     = array("domestic_enquiry_id" => $iid);
                 $inserted_id = $this->master_model->updateRecord('booking_basic_info',$arr_update,$arr_where);
              
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." update Successfully.");
                     redirect($this->domestic_booking_process.'/index');
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
        }

        if($this->input->post('booknow_submit'))
        {
            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
            $this->form_validation->set_rules('booking_office', 'Booking office', 'required');
            $this->form_validation->set_rules('regional_office', 'Regional office', 'required');
            $this->form_validation->set_rules('mrandmrs', 'Mr / Mrs', 'required');
            $this->form_validation->set_rules('surname', 'Srname', 'required');
            $this->form_validation->set_rules('first_name', 'First name', 'required');
            $this->form_validation->set_rules('middle_name', 'Middle name', 'required');
            $this->form_validation->set_rules('seat_count', 'Enter seat count', 'required');
            $this->form_validation->set_rules('mobile_number', 'mobile number', 'required');
            $this->form_validation->set_rules('media_source_name', 'media source name', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $booking_office  = $this->input->post('booking_office'); 
                $regional_office  = $this->input->post('regional_office');
                $mrandmrs  = $this->input->post('mrandmrs'); 
                $surname  = $this->input->post('surname'); 
                $first_name  = $this->input->post('first_name'); 
                $middle_name  = $this->input->post('middle_name'); 
                $seat_count  = $this->input->post('seat_count'); 
                $mobile_number  = $this->input->post('mobile_number'); 
                $media_source_name  = $this->input->post('media_source_name'); 
                $gender  = $this->input->post('gender'); 

                $arr_update = array(
                     'domestic_enquiry_id' =>   $domestic_enquiry_id,
                     'booking_office' =>   $booking_office,
                     'regional_office' =>   $regional_office,
                     'mr/mrs'   =>   $mrandmrs, 
                     'srname'   =>   $surname, 
                     'first_name'   =>   $first_name, 
                     'middle_name'   =>   $middle_name, 
                     'seat_count'=>$seat_count,
                     'mobile_number'   =>   $mobile_number, 
                     'media_source_name'   =>   $media_source_name, 
                     'gender'=>$gender
                 );
                $arr_where     = array("domestic_enquiry_id" => $iid);
                 $inserted_id = $this->master_model->updateRecord('booking_basic_info',$arr_update,$arr_where);
              
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." update Successfully.");
                     redirect($this->module_url_path_bus_seat_sel.'/edit/'.$iid);
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
        }
 

        
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['agent_data']        = $agent_data;
         $this->arr_view_data['agent_booking_enquiry_data']        = $agent_booking_enquiry_data;
         $this->arr_view_data['package_agent_booking_enquiry_data']        = $package_agent_booking_enquiry_data;
         $this->arr_view_data['booking_basic_data']        = $booking_basic_data;
         $this->arr_view_data['agent_department']        = $agent_department;
         $this->arr_view_data['edit_booking_basic_info']        = $edit_booking_basic_info;
         $this->arr_view_data['media_source_data']        = $media_source_data;
         $this->arr_view_data['booking_basic_info_data']        = $booking_basic_info_data;
         $this->arr_view_data['packages_data']        = $packages_data;
         $this->arr_view_data['boarding_office_location']        = $boarding_office_location;
         $this->arr_view_data['hotel_type_info']        = $hotel_type_info;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['page_title']      = " Edit ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['domestic_booking_process'] = $this->domestic_booking_process;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_booking_enquiry'] = $this->module_booking_enquiry;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);

        
    }
    


    public function getBlock(){ 
        // POST data 
        $all_b=array();
       $boarding_office_location = $this->input->post('did');
        
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->where('id',$boarding_office_location);
            $data = $this->master_model->getRecords('packages');
            $boarding = $data['boarding_office'];
            // print_r($boarding); die;
            
            $ids = explode(',', $boarding);
            // print_r($ids);
            // die;
            // print_r($ids); die;
            $count=sizeof($ids);
            
            for($i=0; $i<$count; $i++)
            {
                    $p=$ids[$i];   
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$p);
                $data1 = $this->master_model->getRecords('agent');
                // print_r($data1);
                //$bname=$data1;   
                array_push($all_b,$data1);
                    
            }
            // print_r($all_b); die;
                        
        echo json_encode($all_b); 
    }

    public function get_tourdate(){ 
        // POST data 
        // $all_b=array();
       $boarding_office_location = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('package_id',$boarding_office_location);
                        $data = $this->master_model->getRecords('package_date');
                        // print_r($data); die;
        echo json_encode($data);
    }

    public function get_hotel_type(){ 
        // POST data 
        // $all_b=array();
        $tour_no = $this->input->post('did');
        // print_r($tour_no); die;
                        $record = array();
                        $fields = "packages.*,hotel_type.hotel_type_name";
                        $this->db->where('hotel_type.is_deleted','no');
                        $this->db->where('hotel_type.is_active','yes');
                        $this->db->where('packages.id',$tour_no);
                        $this->db->join("hotel_type", 'packages.hotel_type=hotel_type.id','left');
                        $data = $this->master_model->getRecord('packages');
                        // print_r($data); die;
        echo json_encode($data);
    }
}