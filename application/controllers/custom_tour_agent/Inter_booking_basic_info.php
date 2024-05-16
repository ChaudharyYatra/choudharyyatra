<?php 
//   Controller for: home page
// Author: Mahesh Mhaske
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Inter_booking_basic_info extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/inter_booking_basic_info";
        $this->inter_bus_seat_sel    =  base_url().$this->config->item('agent_panel_slug')."/inter_bus_seat_selection";
        $this->module_inter_booking_enquiry    =  base_url().$this->config->item('agent_panel_slug')."/international_booking_enquiry";
        $this->module_title       = "International Booking Basic Info";
        $this->module_ursl_slug    = "inter_booking_basic_info";
        $this->module_view_folder = "inter_booking_basic_info/";
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
         $this->arr_view_data['international_bus_seat_sel'] = $this->international_bus_seat_sel;
         $this->arr_view_data['module_inter_booking_enquiry'] = $this->module_inter_booking_enquiry;
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
        $this->db->where('international_booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('international_booking_enquiry');
        // print_r($agent_booking_enquiry_data); die;

        $record = array();
        $fields = "agent.*,department.department,international_booking_enquiry.seat_count,international_booking_enquiry.id as enq_id";
        $this->db->where('agent.is_deleted','no');
        $this->db->where('agent.id',$id);
        $this->db->where('international_booking_enquiry.id',$iid);
        $this->db->join("department", 'agent.department=department.id','left');
        $this->db->join("international_booking_enquiry", 'agent.id=international_booking_enquiry.agent_id','left');
        $agent_department = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
        // print_r($agent_department); die;

        $record = array();
        $fields = "international_booking_enquiry.*,media_source.media_source_name";
        $this->db->where('international_booking_enquiry.is_deleted','no');
        // $this->db->where('booking_enquiry.id',$id);
        $this->db->where('international_booking_enquiry.id',$iid);
        $this->db->join("media_source", 'international_booking_enquiry.media_source_name=media_source.id','left');
        $media_source_data = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($media_source_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('packages');
        // print_r($packages_data); die; 
        
        // $this->db->where('is_deleted','no');
        // $media_source_data = $this->master_model->getRecords('media_source');
        // print_r($media_source_data);


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
                     'gender'=>$gender
                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('inter_booking_basic_info',$arr_insert,true);

                 $arr_update = array(
                    'booking_process'   =>   'yes'
                 );
                 $arr_where     = array("id" => $domestic_enquiry_id);
                 $this->master_model->updateRecord('international_booking_enquiry',$arr_update,$arr_where);

                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_inter_booking_enquiry.'/index');
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
                     'gender'=>$gender
                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('inter_booking_basic_info',$arr_insert,true);
                 $arr_update = array(
                    'booking_process'   =>   'yes'
                 );
                 $arr_where     = array("id" => $domestic_enquiry_id);
                 $this->master_model->updateRecord('international_booking_enquiry',$arr_update,$arr_where);

                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->inter_bus_seat_sel.'/add/'.$iid);
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
         $this->arr_view_data['agent_department']        = $agent_department;
         $this->arr_view_data['media_source_data']        = $media_source_data;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_inter_booking_enquiry'] = $this->module_inter_booking_enquiry;
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
        $this->db->where('international_booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('international_booking_enquiry');
        // print_r($agent_booking_enquiry_data); die;

        $record = array();
        $fields = "agent.*,department.department,international_booking_enquiry.seat_count,international_booking_enquiry.id as enq_id,inter_booking_basic_info.middle_name";
        $this->db->where('agent.is_deleted','no');
        $this->db->where('agent.id',$id);
        $this->db->where('international_booking_enquiry.id',$iid);
        $this->db->where('inter_booking_basic_info.domestic_enquiry_id',$iid);
        $this->db->join("department", 'agent.department=department.id','left');
        $this->db->join("international_booking_enquiry", 'agent.id=international_booking_enquiry.agent_id','left');
        $this->db->join("inter_booking_basic_info", 'international_booking_enquiry.id=inter_booking_basic_info.domestic_enquiry_id','left');
        $agent_department = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
        // print_r($agent_department); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('packages');
        // print_r($packages_data); die; 
        
        $this->db->where('is_deleted','no');
        $media_source_data = $this->master_model->getRecords('media_source');
        // print_r($media_source_data);

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $inter_booking_basic_info = $this->master_model->getRecords('inter_booking_basic_info');
        // print_r($inter_booking_basic_info); die;


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
                 $inserted_id = $this->master_model->updateRecord('inter_booking_basic_info',$arr_update,$arr_where);
              
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
                 $inserted_id = $this->master_model->updateRecord('inter_booking_basic_info',$arr_update,$arr_where);
              
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." update Successfully.");
                     redirect($this->inter_bus_seat_sel.'/edit/'.$iid);
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
         $this->arr_view_data['agent_department']        = $agent_department;
         $this->arr_view_data['media_source_data']        = $media_source_data;
         $this->arr_view_data['inter_booking_basic_info']        = $inter_booking_basic_info;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['page_title']      = " Edit ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['inter_bus_seat_sel'] = $this->inter_bus_seat_sel;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_inter_booking_enquiry'] = $this->module_inter_booking_enquiry;
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
                        $data = $this->master_model->getRecord('packages');
                        $boarding = $data['boarding_office'];
                        $ids = explode(',', $boarding);
                        // print_r($ids); die;
                        $count=sizeof($ids);
                       
                        for($i=0; $i<$count; $i++)
                        {
                             $p=$ids[$i];   
                            $this->db->where('is_deleted','no');
                            $this->db->where('is_active','yes');
                            $this->db->where('id',$p);
                            $data1 = $this->master_model->getRecord('agent');
                           // print_r($data1);
                            //$bname=$data1;   
                            array_push($all_b,$data1);
                             
                        }
                        //print_r($all_b); die;
                        
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
                        
        echo json_encode($data); 
  }

   

}