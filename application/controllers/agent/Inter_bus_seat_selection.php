<?php 
//   Controller for: home page
// Author: Rupali Patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Inter_bus_seat_selection extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/inter_bus_seat_selection";
        $this->inter_all_traveller_info    =  base_url().$this->config->item('agent_panel_slug')."/inter_all_traveller_info";
        $this->module_inter_booking_enquiry    =  base_url().$this->config->item('agent_panel_slug')."/international_booking_enquiry";
        $this->module_title       = "International Bus Seat Selection";
        $this->module_url_slug    = "inter_bus_seat_selection";
        $this->module_view_folder = "inter_bus_seat_selection/";
        $this->arr_view_data = [];
	 }

        public function index()
        {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        //  $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
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

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        // $this->db->where('booking_enquiry.id',$iid);
        $booking_basic_info_data = $this->master_model->getRecord('inter_booking_basic_info');
        // print_r($booking_basic_info_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $inter_packages_data_booking = $this->master_model->getRecords('international_packages');
        // print_r($inter_packages_data_booking); die; 

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('international_booking_enquiry.id',$iid);
        $inter_agent_booking_enquiry_data = $this->master_model->getRecord('international_booking_enquiry');
        $inter_package_id=$inter_agent_booking_enquiry_data['package_id'];
        // print_r($inter_agent_booking_enquiry_data); die;
        // print_r($inter_package_id); die;
        
        $record = array();
        $fields = "international_packages.*,international_booking_enquiry.package_id";
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('international_packages.id',$inter_package_id);
        $inter_arr_packages_data_booking = $this->master_model->getRecord('international_packages');
        //  print_r($inter_arr_packages_data_booking); die; 
        
        $boarding_office_location=array();
        if(!empty($inter_arr_packages_data_booking)){
        $boffice=explode(',',$inter_arr_packages_data_booking['boarding_office']);
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
        
        $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        $hotel_type_info = $this->master_model->getRecords('hotel_type');
        // print_r($hotel_type_info); die;

        $record = array();
        $fields = "international_packages.*,international_packages_dates.journey_date";
        $this->db->where('international_packages.is_deleted','no');
        $this->db->join("international_packages_dates", 'international_packages.id=international_packages_dates.package_id','left');
        $inter_add_journey_date = $this->master_model->getRecords('international_packages',
        array('international_packages.is_deleted'=>'no'),$fields);
        // print_r($inter_add_journey_date); die;

         if($this->input->post('submit'))
         {
             //print_r($_REQUEST);
             $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
             $this->form_validation->set_rules('tour_no', 'Select tour', 'required');
             $this->form_validation->set_rules('boarding_office_location', 'Boarding office location', 'required');
             $this->form_validation->set_rules('tour_date', 'Select tour date', 'required');
             $this->form_validation->set_rules('hotel_type', 'Hotel date', 'required');
             $this->form_validation->set_rules('first_class_count', 'first class count', 'required');
             $this->form_validation->set_rules('first_class_costing', 'first class costing', 'required');
             $this->form_validation->set_rules('economy_class_count', 'economy class count', 'required');
             $this->form_validation->set_rules('economy_class_costing', 'economy class costing', 'required');
             $this->form_validation->set_rules('general_class_count', 'general class count', 'required');
             $this->form_validation->set_rules('general_class_costing', 'general class costing', 'required');
             $this->form_validation->set_rules('total_costing', 'total costing', 'required');

             
             if($this->form_validation->run() == TRUE)
             { 
                //echo 'ppppppp';
                //die;
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $tour_no  = $this->input->post('tour_no');
                $boarding_office_location  = $this->input->post('boarding_office_location');
                $tour_date  = $this->input->post('tour_date'); 
                $hotel_type  = $this->input->post('hotel_type'); 
                $first_class_count  = $this->input->post('first_class_count');
                $first_class_costing  = $this->input->post('first_class_costing');
                $economy_class_count  = $this->input->post('economy_class_count');
                $economy_class_costing  = $this->input->post('economy_class_costing'); 
                $general_class_count  = $this->input->post('general_class_count'); 
                $general_class_costing  = $this->input->post('general_class_costing');
                $total_costing  = $this->input->post('total_costing');
                
                 
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                        'domestic_enquiry_id' =>   $domestic_enquiry_id,
                        'tour_no'   =>   $tour_no,
                        'boarding_office_location'   =>   $boarding_office_location,   
                        'tour_date'    =>$tour_date,
                        'hotel_type'=>$hotel_type,
                        'first_class_count'   =>   $first_class_count,
                        'first_costing'   =>   $first_class_costing,   
                        'economy_class_count'    =>$economy_class_count,
                        'economy_costing'=>$economy_class_costing,
                        'general_class_count'   =>   $general_class_count,
                        'general_costing'   =>   $general_class_costing,   
                        'total_costing'    =>$total_costing

                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('inter_bus_seat_selection',$arr_insert,true);
                               
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

         if($this->input->post('booknow_submit'))
         {
             //print_r($_REQUEST);
             $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
             $this->form_validation->set_rules('tour_no', 'Select tour', 'required');
             $this->form_validation->set_rules('boarding_office_location', 'Boarding office location', 'required');
             $this->form_validation->set_rules('tour_date', 'Select tour date', 'required');
             $this->form_validation->set_rules('hotel_type', 'Hotel date', 'required');
             $this->form_validation->set_rules('first_class_count', 'first class count', 'required');
             $this->form_validation->set_rules('first_class_costing', 'first class costing', 'required');
             $this->form_validation->set_rules('economy_class_count', 'economy class count', 'required');
             $this->form_validation->set_rules('economy_class_costing', 'economy class costing', 'required');
             $this->form_validation->set_rules('general_class_count', 'general class count', 'required');
             $this->form_validation->set_rules('general_class_costing', 'general class costing', 'required');
             $this->form_validation->set_rules('total_costing', 'total costing', 'required');

             
             if($this->form_validation->run() == TRUE)
             { 
                //echo 'ppppppp';
                //die;
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $tour_no  = $this->input->post('tour_no');
                $boarding_office_location  = $this->input->post('boarding_office_location');
                $tour_date  = $this->input->post('tour_date'); 
                $hotel_type  = $this->input->post('hotel_type'); 
                $first_class_count  = $this->input->post('first_class_count');
                $first_class_costing  = $this->input->post('first_class_costing');
                $economy_class_count  = $this->input->post('economy_class_count');
                $economy_class_costing  = $this->input->post('economy_class_costing'); 
                $general_class_count  = $this->input->post('general_class_count'); 
                $general_class_costing  = $this->input->post('general_class_costing');
                $total_costing  = $this->input->post('total_costing');
                 
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                        'domestic_enquiry_id' =>   $domestic_enquiry_id,
                        'tour_no'   =>   $tour_no,
                        'boarding_office_location'   =>   $boarding_office_location,   
                        'tour_date'    =>$tour_date,
                        'hotel_type'=>$hotel_type ,
                        'first_class_count'   =>   $first_class_count,
                        'first_costing'   =>   $first_class_costing,   
                        'economy_class_count'    =>$economy_class_count,
                        'economy_costing'=>$economy_class_costing,
                        'general_class_count'   =>   $general_class_count,
                        'general_costing'   =>   $general_class_costing,   
                        'total_costing'    =>$total_costing
                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('inter_bus_seat_selection',$arr_insert,true);
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->inter_all_traveller_info.'/add/'.$iid);
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
         $this->arr_view_data['inter_packages_data_booking']        = $inter_packages_data_booking;
         $this->arr_view_data['inter_agent_booking_enquiry_data']        = $inter_agent_booking_enquiry_data;
         $this->arr_view_data['boarding_office_location']        = $boarding_office_location;
         $this->arr_view_data['hotel_type_info']        = $hotel_type_info;
         $this->arr_view_data['inter_add_journey_date']        = $inter_add_journey_date;
         $this->arr_view_data['inter_arr_packages_data_booking']        = $inter_arr_packages_data_booking;
         $this->arr_view_data['booking_basic_info_data']        = $booking_basic_info_data;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_inter_booking_enquiry']        = $this->module_inter_booking_enquiry;
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
       $agent_booking_enquiry_data = $this->master_model->getRecord('international_booking_enquiry');
       $package_id=$agent_booking_enquiry_data['package_id'];
       // print_r($agent_booking_enquiry_data); die;
       
       $record = array();
       $fields = "international_packages.*,international_booking_enquiry.package_id";
       $this->db->where('is_deleted','no');
       $this->db->where('is_active','yes');
       $this->db->where('international_packages.id',$package_id);
       $inter_arr_packages_data_booking = $this->master_model->getRecord('international_packages');
       //  print_r($arr_packages_data_booking); die;   

       $this->db->where('is_deleted','no');
       // $this->db->where('is_active','yes');
       // $this->db->order_by('tour_number','ASC');
       $packages_data_booking = $this->master_model->getRecords('international_packages');
       // print_r($packages_data_booking); die;   

       $this->db->order_by('id','desc');
       $this->db->where('is_deleted','no');
       // $this->db->where('booking_enquiry.id',$iid);
       $booking_basic_info_data = $this->master_model->getRecord('inter_booking_basic_info');
       // print_r($booking_basic_info_data); die;

       // echo $iid;   
       $record = array();
       $fields = "inter_bus_seat_selection.*,international_packages.tour_number,international_packages.tour_title,
       international_packages_dates.journey_date,agent.booking_center";
       $this->db->where('inter_bus_seat_selection.is_deleted','no');
       $this->db->where('inter_bus_seat_selection.domestic_enquiry_id',$iid);
       $this->db->join("international_packages_dates", 'inter_bus_seat_selection.tour_date=international_packages_dates.id','left');
       $this->db->join("international_packages", 'inter_bus_seat_selection.tour_no=international_packages.id','left');
       $this->db->join("agent", 'inter_bus_seat_selection.boarding_office_location=agent.id','left');
       $edit_bus_seat_selection = $this->master_model->getRecord('inter_bus_seat_selection',
       array('inter_bus_seat_selection.is_deleted'=>'no'),$fields);
    //    print_r($edit_bus_seat_selection); die;  

       $inter_boarding_office_location=array();
       if(!empty($inter_arr_packages_data_booking)){
       $boffice=explode(',',$inter_arr_packages_data_booking['boarding_office']);
       // die;
           // print_r($boffice);
           // die;
      
       for($i=0;$i<count($boffice);$i++){
           // echo $boffice[$i];
       $this->db->where('is_deleted','no');
       $this->db->where('is_active','yes');
       $this->db->where('agent.id',$boffice[$i]);
       $boarding_location_multi = $this->master_model->getRecord('agent');
       //     print_r($boarding_location_multi);
       // die;
           }
      
       array_push($inter_boarding_office_location,$boarding_location_multi);
   }
   // print_r($boarding_office_location);
   // die;
       $this->db->where('is_deleted','no');
       $this->db->where('is_active','yes');
       $packages_data = $this->master_model->getRecords('international_packages_dates');
       // print_r($packages_data); die;

       $this->db->where('is_deleted','no');
       // $this->db->where('is_active','yes');
       $hotel_type_info = $this->master_model->getRecords('hotel_type');
       // print_r($hotel_type_info); die;
       
       

        //  if($this->input->post('submit'))
        //  {
        //      $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
        //      $this->form_validation->set_rules('tour_no', 'Select tour', 'required');
        //      $this->form_validation->set_rules('boarding_office_location', 'Boarding office location', 'required');
        //      $this->form_validation->set_rules('tour_date', 'Select tour date', 'required');
        //      $this->form_validation->set_rules('hotel_type', 'Hotel date', 'required');
        //     //  $this->form_validation->set_rules('first_class_count', 'first class count', 'required');
        //     //  $this->form_validation->set_rules('first_class_costing', 'first class costing', 'required');
        //     //  $this->form_validation->set_rules('economy_class_count', 'economy class count', 'required');
        //     //  $this->form_validation->set_rules('economy_class_costing', 'economy class costing', 'required');
        //     //  $this->form_validation->set_rules('general_class_count', 'general class count', 'required');
        //     //  $this->form_validation->set_rules('general_class_costing', 'general class costing', 'required');
        //      $this->form_validation->set_rules('total_costing', 'total costing', 'required');

             
        //      if($this->form_validation->run() == TRUE)
        //      { 
        //         $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
        //         $tour_no  = $this->input->post('tour_no');
        //         $boarding_office_location  = $this->input->post('boarding_office_location');
        //         $tour_date  = $this->input->post('tour_date'); 
        //         $hotel_type  = $this->input->post('hotel_type'); 
        //         $first_class_count  = $this->input->post('first_class_count');
        //         $first_class_costing  = $this->input->post('first_class_costing');
        //         $economy_class_count  = $this->input->post('economy_class_count');
        //         $economy_class_costing  = $this->input->post('economy_class_costing'); 
        //         $general_class_count  = $this->input->post('general_class_count'); 
        //         $general_class_costing  = $this->input->post('general_class_costing');
        //         $total_costing  = $this->input->post('total_costing');
                
        //         $arr_update = array(
        //                 'domestic_enquiry_id' =>   $domestic_enquiry_id,
        //                 'tour_no'   =>   $tour_no,
        //                 'boarding_office_location'   =>   $boarding_office_location,   
        //                 'tour_date'    =>$tour_date,
        //                 'hotel_type'=>$hotel_type,
        //                 'first_class_count'   =>   $first_class_count,
        //                 'first_costing'   =>   $first_class_costing,   
        //                 'economy_class_count'    =>$economy_class_count,
        //                 'economy_costing'=>$economy_class_costing,
        //                 'general_class_count'   =>   $general_class_count,
        //                 'general_costing'   =>   $general_class_costing,   
        //                 'total_costing'    =>$total_costing

        //          );
        //          $arr_where     = array("domestic_enquiry_id" => $iid);
        //          if(!empty($edit_bus_seat_selection)){
        //             $arr_where     = array("domestic_enquiry_id" => $iid);
        //              $inserted_id = $this->master_model->updateRecord('inter_bus_seat_selection',$arr_update,$arr_where);
        //             }else{
        //                 $inserted_id = $this->master_model->insertRecord('inter_bus_seat_selection',$arr_update,true);
        //             }
              
        //          if($inserted_id > 0)
        //          {
        //              $this->session->set_flashdata('success_message',ucfirst($this->module_title)." update Successfully.");
        //              redirect($this->domestic_booking_process.'/index');
        //          }
 
        //          else
        //          {
        //              $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
        //          }
        //          redirect($this->module_url_path.'/index');
        //      }   
        //  }

        //  if($this->input->post('booknow_submit'))
        //  {
        //      //print_r($_REQUEST);
        //      $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
        //      $this->form_validation->set_rules('tour_no', 'Select tour', 'required');
        //      $this->form_validation->set_rules('boarding_office_location', 'Boarding office location', 'required');
        //      $this->form_validation->set_rules('tour_date', 'Select tour date', 'required');
        //      $this->form_validation->set_rules('hotel_type', 'Hotel date', 'required');
        //     //  $this->form_validation->set_rules('first_class_count', 'first class count', 'required');
        //     //  $this->form_validation->set_rules('first_class_costing', 'first class costing', 'required');
        //     //  $this->form_validation->set_rules('economy_class_count', 'economy class count', 'required');
        //     //  $this->form_validation->set_rules('economy_class_costing', 'economy class costing', 'required');
        //     //  $this->form_validation->set_rules('general_class_count', 'general class count', 'required');
        //     //  $this->form_validation->set_rules('general_class_costing', 'general class costing', 'required');
        //      $this->form_validation->set_rules('total_costing', 'total costing', 'required');

             
        //      if($this->form_validation->run() == TRUE)
        //      { 
        //         $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
        //         $tour_no  = $this->input->post('tour_no');
        //         $boarding_office_location  = $this->input->post('boarding_office_location');
        //         $tour_date  = $this->input->post('tour_date'); 
        //         $hotel_type  = $this->input->post('hotel_type'); 
        //         $first_class_count  = $this->input->post('first_class_count');
        //         $first_class_costing  = $this->input->post('first_class_costing');
        //         $economy_class_count  = $this->input->post('economy_class_count');
        //         $economy_class_costing  = $this->input->post('economy_class_costing'); 
        //         $general_class_count  = $this->input->post('general_class_count'); 
        //         $general_class_costing  = $this->input->post('general_class_costing');
        //         $total_costing  = $this->input->post('total_costing');
                 
        //         $arr_update = array(
        //                 'domestic_enquiry_id' =>   $domestic_enquiry_id,
        //                 'tour_no'   =>   $tour_no,
        //                 'boarding_office_location'   =>   $boarding_office_location,   
        //                 'tour_date'    =>$tour_date,
        //                 'hotel_type'=>$hotel_type ,
        //                 'first_class_count'   =>   $first_class_count,
        //                 'first_costing'   =>   $first_class_costing,   
        //                 'economy_class_count'    =>$economy_class_count,
        //                 'economy_costing'=>$economy_class_costing,
        //                 'general_class_count'   =>   $general_class_count,
        //                 'general_costing'   =>   $general_class_costing,   
        //                 'total_costing'    =>$total_costing
        //          );
        //         //  print_r($arr_insert); die;
        //         if(!empty($edit_bus_seat_selection)){
        //         $arr_where     = array("domestic_enquiry_id" => $iid);
        //          $inserted_id = $this->master_model->updateRecord('inter_bus_seat_selection',$arr_update,$arr_where);
        //         }else{
        //             $inserted_id = $this->master_model->insertRecord('inter_bus_seat_selection',$arr_update,true);
        //         }
        //         //  print_r($arr_insert); die;
              
        //          if($inserted_id > 0)
        //          {
        //              $this->session->set_flashdata('success_message',ucfirst($this->module_title)." update Successfully.");
        //             //  redirect($this->domestic_booking_process.'/index');
        //              redirect($this->inter_all_traveller_info.'/edit/'.$iid);
        //          }
 
        //          else
        //          {
        //              $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
        //          }
        //          redirect($this->module_url_path.'/index');
        //      }   
        //  }
 
        if($this->input->post('booknow_submit'))
        {
            //print_r($_REQUEST);
            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
            $this->form_validation->set_rules('tour_no', 'Select tour', 'required');
            $this->form_validation->set_rules('boarding_office_location', 'Boarding office location', 'required');
            $this->form_validation->set_rules('tour_date', 'Select tour date', 'required');
            $this->form_validation->set_rules('hotel_type', 'Hotel date', 'required');
           //  $this->form_validation->set_rules('first_class_count', 'first class count', 'required');
           //  $this->form_validation->set_rules('first_class_costing', 'first class costing', 'required');
           //  $this->form_validation->set_rules('economy_class_count', 'economy class count', 'required');
           //  $this->form_validation->set_rules('economy_class_costing', 'economy class costing', 'required');
           //  $this->form_validation->set_rules('general_class_count', 'general class count', 'required');
           //  $this->form_validation->set_rules('general_class_costing', 'general class costing', 'required');
            $this->form_validation->set_rules('total_costing', 'total costing', 'required');

            
            if($this->form_validation->run() == TRUE)
            { 
               $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
               $tour_no  = $this->input->post('tour_no');
               $boarding_office_location  = $this->input->post('boarding_office_location');
               $tour_date  = $this->input->post('tour_date'); 
               $hotel_type  = $this->input->post('hotel_type'); 
               $first_class_count  = $this->input->post('first_class_count');
               $first_class_costing  = $this->input->post('first_class_costing');
               $economy_class_count  = $this->input->post('economy_class_count');
               $economy_class_costing  = $this->input->post('economy_class_costing'); 
               $general_class_count  = $this->input->post('general_class_count'); 
               $general_class_costing  = $this->input->post('general_class_costing');
               $total_costing  = $this->input->post('total_costing');
                
               $arr_update = array(
                       'domestic_enquiry_id' =>   $domestic_enquiry_id,
                       'tour_no'   =>   $tour_no,
                       'boarding_office_location'   =>   $boarding_office_location,   
                       'tour_date'    =>$tour_date,
                       'hotel_type'=>$hotel_type ,
                       'first_class_count'   =>   $first_class_count,
                       'first_costing'   =>   $first_class_costing,   
                       'economy_class_count'    =>$economy_class_count,
                       'economy_costing'=>$economy_class_costing,
                       'general_class_count'   =>   $general_class_count,
                       'general_costing'   =>   $general_class_costing,   
                       'total_costing'    =>$total_costing
                );
               //  print_r($arr_insert); die;
               if(!empty($edit_bus_seat_selection)){
               $arr_where     = array("domestic_enquiry_id" => $iid);
                $inserted_id = $this->master_model->updateRecord('inter_bus_seat_selection',$arr_update,$arr_where);
               }else{
                   $inserted_id = $this->master_model->insertRecord('inter_bus_seat_selection',$arr_update,true);
               }
               //  print_r($arr_insert); die;
               
             
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." update Successfully.");
                   //  redirect($this->domestic_booking_process.'/index');
                    redirect($this->inter_all_traveller_info.'/edit/'.$iid);
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
         $this->arr_view_data['edit_bus_seat_selection']        = $edit_bus_seat_selection;
         $this->arr_view_data['booking_basic_info_data']        = $booking_basic_info_data;
         $this->arr_view_data['inter_arr_packages_data_booking']        = $inter_arr_packages_data_booking;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['packages_data']        = $packages_data;
         $this->arr_view_data['inter_boarding_office_location']        = $inter_boarding_office_location;
         $this->arr_view_data['hotel_type_info']        = $hotel_type_info;
         $this->arr_view_data['page_title']      = " Edit ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['inter_all_traveller_info'] = $this->inter_all_traveller_info;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }


    public function inter_getBlock(){ 
        // POST data 
        $all_b=array();
       $boarding_office_location = $this->input->post('did');
        
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->where('id',$boarding_office_location);
            $data = $this->master_model->getRecord('international_packages');
            $boarding = $data['boarding_office'];
            // print_r($data); die;
            
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
                $data1 = $this->master_model->getRecord('agent');
                // print_r($data1);
                //$bname=$data1;   
                array_push($all_b,$data1);
                    
            }
            // print_r($all_b); die;
                        
        echo json_encode($all_b); 
    }

    public function inter_get_tourdate(){ 
        // POST data 
        // $all_b=array();
       $boarding_office_location = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('package_id',$boarding_office_location);
                        $data = $this->master_model->getRecords('international_packages_dates');
                        // print_r($data); die;
        echo json_encode($data);
    }


}