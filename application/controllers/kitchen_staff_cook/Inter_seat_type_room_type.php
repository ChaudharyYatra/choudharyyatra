<?php 
//   Controller for: home page
// Author: Mahesh Mhaske
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Inter_seat_type_room_type extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/inter_seat_type_room_type";
        // $this->module_url_path_final_booking    =  base_url().$this->config->item('agent_panel_slug')."/final_bookings";
        $this->module_inter_booking_enquiry    =  base_url().$this->config->item('agent_panel_slug')."/international_booking_enquiry";
        $this->inter_module_url_booking_process    =  base_url().$this->config->item('agent_panel_slug')."/inter_booking_process";
        // $this->module_booking_enquiry    =  base_url().$this->config->item('agent_panel_slug')."/booking_enquiry";
        $this->module_title       = "International Seat Type and Room Type Selection";
        $this->module_url_slug    = "Inter_seat_type_room_type";
        $this->module_view_folder = "Inter_seat_type_room_type/";
        $this->arr_view_data = [];
	 }

        public function index()
        {
        // if($this->input->post('submit'))
        //  {
        //     redirect($this->module_url_path_final_booking.'/index');
        //  }
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');
         
         $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
        //  $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['inter_module_url_booking_process']    = $this->inter_module_url_booking_process;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
        //  $this->arr_view_data['module_url_path_final_booking'] = $this->module_url_path_final_booking;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
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

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('international_packages');
        // print_r($packages_data); die;   

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $package_id = $this->master_model->getRecord('inter_bus_seat_selection');
        // print_r($package_id); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $inter_booking_basic_info_data = $this->master_model->getRecord('inter_booking_basic_info');
        // print_r($inter_booking_basic_info_data); die;

        $record = array();
        $fields = "inter_all_traveller_info.*,international_packages.cost";
        // $this->db->order_by('id','desc');
        $this->db->where('inter_all_traveller_info.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $this->db->join("international_packages", 'inter_all_traveller_info.package_id=international_packages.id','left');
        $arr_package_info = $this->master_model->getRecord('inter_all_traveller_info');
        // print_r($arr_package_info); die;


        // if($this->input->post('submit'))
        // {
        //      //print_r($_REQUEST);
        //      $this->form_validation->set_rules('domestic_enquiry_id', 'domestic enquiry id', 'required');

        //      $this->form_validation->set_rules('seat_count', 'seat count', 'required');
 
        //      $this->form_validation->set_rules('seperate_seat', 'seperate seat', 'required');
        //      $this->form_validation->set_rules('total_seperate_seat', 'total seperate seat', 'required');
 
        //      $this->form_validation->set_rules('child_seperate_seat', 'child seperate seat', 'required');
        //      $this->form_validation->set_rules('total_child_seperate_seat', 'total child seperate seat', 'required');
 
        //      $this->form_validation->set_rules('two_child_share_one_seat', 'two child share one seat', 'required');
        //      $this->form_validation->set_rules('total_two_child_share_one_seat', 'total two child share one seat', 'required');
 
        //      $this->form_validation->set_rules('child_no_seat_needed', 'child no seat needed', 'required');
        //      $this->form_validation->set_rules('total_child_no_seat_needed', 'total child no seat needed', 'required');
 
        //      $this->form_validation->set_rules('onebed_oneroom_cost', 'onebed oneroom cost', 'required');
        //      $this->form_validation->set_rules('onebed_oneroom_count', 'onebed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_onebed_oneroom', 'total onebed oneroom', 'required');
 
        //      $this->form_validation->set_rules('twobed_oneroom_cost', 'twobed oneroom cost', 'required');
        //      $this->form_validation->set_rules('twobed_oneroom_count', 'twobed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_twobed_oneroom', 'total twobed oneroom', 'required');
 
        //      $this->form_validation->set_rules('threebed_oneroom_cost', 'threebed oneroom cost', 'required');
        //      $this->form_validation->set_rules('threebed_oneroom_count', 'threebed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_threebed_oneroom', 'total threebed oneroom', 'required');
 
        //      $this->form_validation->set_rules('fourbed_oneroom_cost', 'fourbed oneroom cost', 'required');
        //      $this->form_validation->set_rules('fourbed_oneroom_count', 'fourbed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_fourbed_oneroom', 'total fourbed oneroom', 'required');
 
        //      $this->form_validation->set_rules('fivebed_oneroom_cost', 'fivebed oneroom cost', 'required');
        //      $this->form_validation->set_rules('fivebed_oneroom_count', 'fivebed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_fivebed_oneroom', 'total fivebed oneroom', 'required');
 
        //      $this->form_validation->set_rules('sixbed_oneroom_cost', 'sixbed oneroom cost', 'required');
        //      $this->form_validation->set_rules('sixbed_oneroom_count', 'sixbed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_sixbed_oneroom', 'total sixbed oneroom', 'required');
 
        //      $this->form_validation->set_rules('shared_common_room_cost', 'shared common room cost', 'required');
        //      $this->form_validation->set_rules('shared_common_room_count', 'shared common room count', 'required');
        //      $this->form_validation->set_rules('total_shared_common_room', 'total shared common room', 'required');
 
        //      $this->form_validation->set_rules('total_fare_amount', 'total_fare_amount', 'required');
             
        //      if($this->form_validation->run() == TRUE)
        //      { 
        //         //echo 'ppppppp';
        //         //die;
        //         $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');

        //         $seat_count  = $this->input->post('seat_count');

        //         $seperate_seat  = $this->input->post('seperate_seat'); 
        //         $total_seperate_seat  = $this->input->post('total_seperate_seat');

        //         $child_seperate_seat  = $this->input->post('child_seperate_seat'); 
        //         $total_child_seperate_seat  = $this->input->post('total_child_seperate_seat'); 

        //         $two_child_share_one_seat  = $this->input->post('two_child_share_one_seat'); 
        //         $total_two_child_share_one_seat  = $this->input->post('total_two_child_share_one_seat'); 

        //         $child_no_seat_needed  = $this->input->post('child_no_seat_needed'); 
        //         $total_child_no_seat_needed  = $this->input->post('total_child_no_seat_needed'); 

        //         $onebed_oneroom_cost  = $this->input->post('onebed_oneroom_cost'); 
        //         $onebed_oneroom_count  = $this->input->post('onebed_oneroom_count'); 
        //         $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

        //         $twobed_oneroom_cost  = $this->input->post('twobed_oneroom_cost'); 
        //         $twobed_oneroom_count  = $this->input->post('twobed_oneroom_count'); 
        //         $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom'); 

        //         $threebed_oneroom_cost  = $this->input->post('threebed_oneroom_cost'); 
        //         $threebed_oneroom_count  = $this->input->post('threebed_oneroom_count'); 
        //         $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

        //         $fourbed_oneroom_cost  = $this->input->post('fourbed_oneroom_cost'); 
        //         $fourbed_oneroom_count  = $this->input->post('fourbed_oneroom_count'); 
        //         $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

        //         $fivebed_oneroom_cost  = $this->input->post('fivebed_oneroom_cost'); 
        //         $fivebed_oneroom_count  = $this->input->post('fivebed_oneroom_count'); 
        //         $total_fivebed_oneroom  = $this->input->post('total_fivebed_oneroom'); 

        //         $sixbed_oneroom_cost  = $this->input->post('sixbed_oneroom_cost'); 
        //         $sixbed_oneroom_count  = $this->input->post('sixbed_oneroom_count'); 
        //         $total_sixbed_oneroom  = $this->input->post('total_sixbed_oneroom'); 

        //         $shared_common_room_cost  = $this->input->post('shared_common_room_cost'); 
        //         $shared_common_room_count  = $this->input->post('shared_common_room_count'); 
        //         $total_shared_common_room  = $this->input->post('total_shared_common_room'); 

        //         $total_fare_amount  = $this->input->post('total_fare_amount'); 
        //         //  $today=date("Y-m-d");
        //         //  $packages  = $this->input->post('packages'); 

        //          $arr_insert = array(
        //             'domestic_enquiry_id' =>   $domestic_enquiry_id,

        //             'seat_count' =>   $seat_count,

        //             'seperate_seat' =>   $seperate_seat,
        //             'total_seperate_seat' =>   $total_seperate_seat,

        //             'child_seperate_seat'   =>   $child_seperate_seat, 
        //             'total_child_seperate_seat'   =>   $total_child_seperate_seat, 

        //             'two_child_share_one_seat'   =>   $two_child_share_one_seat, 
        //             'total_two_child_share_one_seat'   =>   $total_two_child_share_one_seat, 

        //             'child_no_seat_needed'=>$child_no_seat_needed,
        //             'total_child_no_seat_needed'   =>   $total_child_no_seat_needed, 

        //             'onebed_oneroom_cost'   =>   $onebed_oneroom_cost, 
        //             'onebed_oneroom_count'   =>   $onebed_oneroom_count, 
        //             'total_onebed_oneroom'=>$total_onebed_oneroom,

        //             'twobed_oneroom_cost'   =>   $twobed_oneroom_cost, 
        //             'twobed_oneroom_count'   =>   $twobed_oneroom_count, 
        //             'total_twobed_oneroom'=>$total_twobed_oneroom,

        //             'threebed_oneroom_cost'   =>   $threebed_oneroom_cost, 
        //             'threebed_oneroom_count'   =>   $threebed_oneroom_count, 
        //             'total_threebed_oneroom'=>$total_threebed_oneroom,

        //             'fourbed_oneroom_cost'   =>   $fourbed_oneroom_cost, 
        //             'fourbed_oneroom_count'   =>   $fourbed_oneroom_count, 
        //             'total_fourbed_oneroom'=>$total_fourbed_oneroom,
                    
        //             'fivebed_oneroom_cost'   =>   $fivebed_oneroom_cost, 
        //             'fivebed_oneroom_count'   =>   $fivebed_oneroom_count, 
        //             'total_fivebed_oneroom'=>$total_fivebed_oneroom,

        //             'sixbed_oneroom_cost'   =>   $sixbed_oneroom_cost, 
        //             'sixbed_oneroom_count'   =>   $sixbed_oneroom_count, 
        //             'total_sixbed_oneroom'=>$total_sixbed_oneroom,

        //             'shared_common_room_cost'   =>   $shared_common_room_cost, 
        //             'shared_common_room_count'   =>   $shared_common_room_count, 
        //             'total_shared_common_room'=>$total_shared_common_room,

        //             'total_fare_amount'=>$total_fare_amount
        //          );
        //         //  print_r($arr_insert); die;
        //          $inserted_id = $this->master_model->insertRecord('inter_seat_type_room_type',$arr_insert,true);
                               
        //          if($inserted_id > 0)
        //          {
        //              $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
        //              redirect($this->module_inter_booking_enquiry.'/index');
        //          }
 
        //          else
        //          {
        //              $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
        //          }
        //          redirect($this->module_url_path.'/index');
        //      }   
        // }

        if($this->input->post('submit'))
        {
             //print_r($_REQUEST);

            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic enquiry id', 'required');

            $this->form_validation->set_rules('seat_count', 'seat count', 'required');

            $this->form_validation->set_rules('seperate_seat', 'seperate seat', 'required');
            $this->form_validation->set_rules('total_seperate_seat', 'total seperate seat', 'required');

            $this->form_validation->set_rules('child_seperate_seat', 'child seperate seat', 'required');
            $this->form_validation->set_rules('total_child_seperate_seat', 'total child seperate seat', 'required');

            $this->form_validation->set_rules('two_child_share_one_seat', 'two child share one seat', 'required');
            $this->form_validation->set_rules('total_two_child_share_one_seat', 'total two child share one seat', 'required');

            $this->form_validation->set_rules('child_no_seat_needed', 'child no seat needed', 'required');
            $this->form_validation->set_rules('total_child_no_seat_needed', 'total child no seat needed', 'required');

            $this->form_validation->set_rules('total_busseattype', 'total_busseattype', 'required');
            $this->form_validation->set_rules('total_amt_seattype', 'total_amt_seattype', 'required');

            $this->form_validation->set_rules('onebed_oneroom_cost', 'onebed oneroom cost', 'required');
            $this->form_validation->set_rules('onebed_oneroom_count', 'onebed oneroom count', 'required');
            $this->form_validation->set_rules('total_onebed_oneroom', 'total onebed oneroom', 'required');

            $this->form_validation->set_rules('twobed_oneroom_cost', 'twobed oneroom cost', 'required');
            $this->form_validation->set_rules('twobed_oneroom_count', 'twobed oneroom count', 'required');
            $this->form_validation->set_rules('total_twobed_oneroom', 'total twobed oneroom', 'required');

            $this->form_validation->set_rules('threebed_oneroom_cost', 'threebed oneroom cost', 'required');
            $this->form_validation->set_rules('threebed_oneroom_count', 'threebed oneroom count', 'required');
            $this->form_validation->set_rules('total_threebed_oneroom', 'total threebed oneroom', 'required');

            $this->form_validation->set_rules('fourbed_oneroom_cost', 'fourbed oneroom cost', 'required');
            $this->form_validation->set_rules('fourbed_oneroom_count', 'fourbed oneroom count', 'required');
            $this->form_validation->set_rules('total_fourbed_oneroom', 'total fourbed oneroom', 'required');

            $this->form_validation->set_rules('fivebed_oneroom_cost', 'fivebed oneroom cost', 'required');
            $this->form_validation->set_rules('fivebed_oneroom_count', 'fivebed oneroom count', 'required');
            $this->form_validation->set_rules('total_fivebed_oneroom', 'total fivebed oneroom', 'required');

            $this->form_validation->set_rules('sixbed_oneroom_cost', 'sixbed oneroom cost', 'required');
            $this->form_validation->set_rules('sixbed_oneroom_count', 'sixbed oneroom count', 'required');
            $this->form_validation->set_rules('total_sixbed_oneroom', 'total sixbed oneroom', 'required');

            $this->form_validation->set_rules('shared_common_room_cost', 'shared common room cost', 'required');
            $this->form_validation->set_rules('shared_common_room_count', 'shared common room count', 'required');
            $this->form_validation->set_rules('total_shared_common_room', 'total shared common room', 'required');

            $this->form_validation->set_rules('total_seat_bedtype_roomtype', 'total_seat_bedtype_roomtype', 'required');
            $this->form_validation->set_rules('total_amount_bedtype_roomtype', 'total_amount_bedtype_roomtype', 'required');

            $this->form_validation->set_rules('total_fare_amount', 'total_fare_amount', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                //echo 'ppppppp';
                //die;
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');

                $package_id  = $this->input->post('package_id');

                $seat_count  = $this->input->post('seat_count');

                $seperate_seat  = $this->input->post('seperate_seat'); 
                $total_seperate_seat  = $this->input->post('total_seperate_seat');

                $child_seperate_seat  = $this->input->post('child_seperate_seat'); 
                $total_child_seperate_seat  = $this->input->post('total_child_seperate_seat'); 

                $two_child_share_one_seat  = $this->input->post('two_child_share_one_seat'); 
                $total_two_child_share_one_seat  = $this->input->post('total_two_child_share_one_seat'); 

                $child_no_seat_needed  = $this->input->post('child_no_seat_needed'); 
                $total_child_no_seat_needed  = $this->input->post('total_child_no_seat_needed'); 

                $total_busseattype  = $this->input->post('total_busseattype'); 
                $total_amt_seattype  = $this->input->post('total_amt_seattype'); 

                $onebed_oneroom_cost  = $this->input->post('onebed_oneroom_cost'); 
                $onebed_oneroom_count  = $this->input->post('onebed_oneroom_count'); 
                $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

                $twobed_oneroom_cost  = $this->input->post('twobed_oneroom_cost'); 
                $twobed_oneroom_count  = $this->input->post('twobed_oneroom_count'); 
                $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom'); 

                $threebed_oneroom_cost  = $this->input->post('threebed_oneroom_cost'); 
                $threebed_oneroom_count  = $this->input->post('threebed_oneroom_count'); 
                $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

                $fourbed_oneroom_cost  = $this->input->post('fourbed_oneroom_cost'); 
                $fourbed_oneroom_count  = $this->input->post('fourbed_oneroom_count'); 
                $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

                $fivebed_oneroom_cost  = $this->input->post('fivebed_oneroom_cost'); 
                $fivebed_oneroom_count  = $this->input->post('fivebed_oneroom_count'); 
                $total_fivebed_oneroom  = $this->input->post('total_fivebed_oneroom'); 

                $sixbed_oneroom_cost  = $this->input->post('sixbed_oneroom_cost'); 
                $sixbed_oneroom_count  = $this->input->post('sixbed_oneroom_count'); 
                $total_sixbed_oneroom  = $this->input->post('total_sixbed_oneroom'); 

                $shared_common_room_cost  = $this->input->post('shared_common_room_cost'); 
                $shared_common_room_count  = $this->input->post('shared_common_room_count'); 
                $total_shared_common_room  = $this->input->post('total_shared_common_room'); 

                $total_seat_bedtype_roomtype  = $this->input->post('total_seat_bedtype_roomtype'); 
                $total_amount_bedtype_roomtype  = $this->input->post('total_amount_bedtype_roomtype');

                $total_fare_amount  = $this->input->post('total_fare_amount'); 
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                     'domestic_enquiry_id' =>   $domestic_enquiry_id,

                     'package_id' =>   $package_id,

                     'seat_count' =>   $seat_count,

                     'seperate_seat' =>   $seperate_seat,
                     'total_seperate_seat' =>   $total_seperate_seat,

                     'child_seperate_seat'   =>   $child_seperate_seat, 
                     'total_child_seperate_seat'   =>   $total_child_seperate_seat, 

                     'two_child_share_one_seat'   =>   $two_child_share_one_seat, 
                     'total_two_child_share_one_seat'   =>   $total_two_child_share_one_seat, 

                     'child_no_seat_needed'=>$child_no_seat_needed,
                     'total_child_no_seat_needed'   =>   $total_child_no_seat_needed, 

                     'total_bus_seat_count'=>$total_busseattype,
                     'total_bus_seat_amount'   =>   $total_amt_seattype, 

                     'onebed_oneroom_cost'   =>   $onebed_oneroom_cost, 
                     'onebed_oneroom_count'   =>   $onebed_oneroom_count, 
                     'total_onebed_oneroom'=>$total_onebed_oneroom,

                     'twobed_oneroom_cost'   =>   $twobed_oneroom_cost, 
                     'twobed_oneroom_count'   =>   $twobed_oneroom_count, 
                     'total_twobed_oneroom'=>$total_twobed_oneroom,

                     'threebed_oneroom_cost'   =>   $threebed_oneroom_cost, 
                     'threebed_oneroom_count'   =>   $threebed_oneroom_count, 
                     'total_threebed_oneroom'=>$total_threebed_oneroom,

                     'fourbed_oneroom_cost'   =>   $fourbed_oneroom_cost, 
                     'fourbed_oneroom_count'   =>   $fourbed_oneroom_count, 
                     'total_fourbed_oneroom'=>$total_fourbed_oneroom,
                     
                     'fivebed_oneroom_cost'   =>   $fivebed_oneroom_cost, 
                     'fivebed_oneroom_count'   =>   $fivebed_oneroom_count, 
                     'total_fivebed_oneroom'=>$total_fivebed_oneroom,

                     'sixbed_oneroom_cost'   =>   $sixbed_oneroom_cost, 
                     'sixbed_oneroom_count'   =>   $sixbed_oneroom_count, 
                     'total_sixbed_oneroom'=>$total_sixbed_oneroom,

                     'shared_common_room_cost'   =>   $shared_common_room_cost, 
                     'shared_common_room_count'   =>   $shared_common_room_count, 
                     'total_shared_common_room'=>$total_shared_common_room,

                     'total_seat_bedtype_roomtype'   =>   $total_seat_bedtype_roomtype, 
                     'total_amount_bedtype_roomtype'=>$total_amount_bedtype_roomtype,

                     'total_fare_amount'=>$total_fare_amount

                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('inter_seat_type_room_type',$arr_insert,true);
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->inter_module_url_booking_process.'/index');  
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
        }

        //booking basic info  book now btn functinality 
        // if($this->input->post('booknow_submit'))
        // {
        //      //print_r($_REQUEST);
        //      $this->form_validation->set_rules('domestic_enquiry_id', 'domestic enquiry id', 'required');

        //      $this->form_validation->set_rules('seat_count', 'seat count', 'required');
 
        //      $this->form_validation->set_rules('seperate_seat', 'seperate seat', 'required');
        //      $this->form_validation->set_rules('total_seperate_seat', 'total seperate seat', 'required');
 
        //      $this->form_validation->set_rules('child_seperate_seat', 'child seperate seat', 'required');
        //      $this->form_validation->set_rules('total_child_seperate_seat', 'total child seperate seat', 'required');
 
        //      $this->form_validation->set_rules('two_child_share_one_seat', 'two child share one seat', 'required');
        //      $this->form_validation->set_rules('total_two_child_share_one_seat', 'total two child share one seat', 'required');
 
        //      $this->form_validation->set_rules('child_no_seat_needed', 'child no seat needed', 'required');
        //      $this->form_validation->set_rules('total_child_no_seat_needed', 'total child no seat needed', 'required');
 
        //      $this->form_validation->set_rules('onebed_oneroom_cost', 'onebed oneroom cost', 'required');
        //      $this->form_validation->set_rules('onebed_oneroom_count', 'onebed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_onebed_oneroom', 'total onebed oneroom', 'required');
 
        //      $this->form_validation->set_rules('twobed_oneroom_cost', 'twobed oneroom cost', 'required');
        //      $this->form_validation->set_rules('twobed_oneroom_count', 'twobed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_twobed_oneroom', 'total twobed oneroom', 'required');
 
        //      $this->form_validation->set_rules('threebed_oneroom_cost', 'threebed oneroom cost', 'required');
        //      $this->form_validation->set_rules('threebed_oneroom_count', 'threebed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_threebed_oneroom', 'total threebed oneroom', 'required');
 
        //      $this->form_validation->set_rules('fourbed_oneroom_cost', 'fourbed oneroom cost', 'required');
        //      $this->form_validation->set_rules('fourbed_oneroom_count', 'fourbed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_fourbed_oneroom', 'total fourbed oneroom', 'required');
 
        //      $this->form_validation->set_rules('fivebed_oneroom_cost', 'fivebed oneroom cost', 'required');
        //      $this->form_validation->set_rules('fivebed_oneroom_count', 'fivebed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_fivebed_oneroom', 'total fivebed oneroom', 'required');
 
        //      $this->form_validation->set_rules('sixbed_oneroom_cost', 'sixbed oneroom cost', 'required');
        //      $this->form_validation->set_rules('sixbed_oneroom_count', 'sixbed oneroom count', 'required');
        //      $this->form_validation->set_rules('total_sixbed_oneroom', 'total sixbed oneroom', 'required');
 
        //      $this->form_validation->set_rules('shared_common_room_cost', 'shared common room cost', 'required');
        //      $this->form_validation->set_rules('shared_common_room_count', 'shared common room count', 'required');
        //      $this->form_validation->set_rules('total_shared_common_room', 'total shared common room', 'required');
 
        //      $this->form_validation->set_rules('total_fare_amount', 'total_fare_amount', 'required');
             
        //      if($this->form_validation->run() == TRUE)
        //      { 
        //         //echo 'ppppppp';
        //         //die;
        //         $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');

        //         $seat_count  = $this->input->post('seat_count');

        //         $seperate_seat  = $this->input->post('seperate_seat'); 
        //         $total_seperate_seat  = $this->input->post('total_seperate_seat');

        //         $child_seperate_seat  = $this->input->post('child_seperate_seat'); 
        //         $total_child_seperate_seat  = $this->input->post('total_child_seperate_seat'); 

        //         $two_child_share_one_seat  = $this->input->post('two_child_share_one_seat'); 
        //         $total_two_child_share_one_seat  = $this->input->post('total_two_child_share_one_seat'); 

        //         $child_no_seat_needed  = $this->input->post('child_no_seat_needed'); 
        //         $total_child_no_seat_needed  = $this->input->post('total_child_no_seat_needed'); 

        //         $onebed_oneroom_cost  = $this->input->post('onebed_oneroom_cost'); 
        //         $onebed_oneroom_count  = $this->input->post('onebed_oneroom_count'); 
        //         $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

        //         $twobed_oneroom_cost  = $this->input->post('twobed_oneroom_cost'); 
        //         $twobed_oneroom_count  = $this->input->post('twobed_oneroom_count'); 
        //         $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom'); 

        //         $threebed_oneroom_cost  = $this->input->post('threebed_oneroom_cost'); 
        //         $threebed_oneroom_count  = $this->input->post('threebed_oneroom_count'); 
        //         $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

        //         $fourbed_oneroom_cost  = $this->input->post('fourbed_oneroom_cost'); 
        //         $fourbed_oneroom_count  = $this->input->post('fourbed_oneroom_count'); 
        //         $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

        //         $fivebed_oneroom_cost  = $this->input->post('fivebed_oneroom_cost'); 
        //         $fivebed_oneroom_count  = $this->input->post('fivebed_oneroom_count'); 
        //         $total_fivebed_oneroom  = $this->input->post('total_fivebed_oneroom'); 

        //         $sixbed_oneroom_cost  = $this->input->post('sixbed_oneroom_cost'); 
        //         $sixbed_oneroom_count  = $this->input->post('sixbed_oneroom_count'); 
        //         $total_sixbed_oneroom  = $this->input->post('total_sixbed_oneroom'); 

        //         $shared_common_room_cost  = $this->input->post('shared_common_room_cost'); 
        //         $shared_common_room_count  = $this->input->post('shared_common_room_count'); 
        //         $total_shared_common_room  = $this->input->post('total_shared_common_room'); 

        //         $total_fare_amount  = $this->input->post('total_fare_amount'); 
        //         //  $today=date("Y-m-d");
        //         //  $packages  = $this->input->post('packages'); 

        //          $arr_insert = array(
        //             'domestic_enquiry_id' =>   $domestic_enquiry_id,

        //             'seat_count' =>   $seat_count,

        //             'seperate_seat' =>   $seperate_seat,
        //             'total_seperate_seat' =>   $total_seperate_seat,

        //             'child_seperate_seat'   =>   $child_seperate_seat, 
        //             'total_child_seperate_seat'   =>   $total_child_seperate_seat, 

        //             'two_child_share_one_seat'   =>   $two_child_share_one_seat, 
        //             'total_two_child_share_one_seat'   =>   $total_two_child_share_one_seat, 

        //             'child_no_seat_needed'=>$child_no_seat_needed,
        //             'total_child_no_seat_needed'   =>   $total_child_no_seat_needed, 

        //             'onebed_oneroom_cost'   =>   $onebed_oneroom_cost, 
        //             'onebed_oneroom_count'   =>   $onebed_oneroom_count, 
        //             'total_onebed_oneroom'=>$total_onebed_oneroom,

        //             'twobed_oneroom_cost'   =>   $twobed_oneroom_cost, 
        //             'twobed_oneroom_count'   =>   $twobed_oneroom_count, 
        //             'total_twobed_oneroom'=>$total_twobed_oneroom,

        //             'threebed_oneroom_cost'   =>   $threebed_oneroom_cost, 
        //             'threebed_oneroom_count'   =>   $threebed_oneroom_count, 
        //             'total_threebed_oneroom'=>$total_threebed_oneroom,

        //             'fourbed_oneroom_cost'   =>   $fourbed_oneroom_cost, 
        //             'fourbed_oneroom_count'   =>   $fourbed_oneroom_count, 
        //             'total_fourbed_oneroom'=>$total_fourbed_oneroom,
                    
        //             'fivebed_oneroom_cost'   =>   $fivebed_oneroom_cost, 
        //             'fivebed_oneroom_count'   =>   $fivebed_oneroom_count, 
        //             'total_fivebed_oneroom'=>$total_fivebed_oneroom,

        //             'sixbed_oneroom_cost'   =>   $sixbed_oneroom_cost, 
        //             'sixbed_oneroom_count'   =>   $sixbed_oneroom_count, 
        //             'total_sixbed_oneroom'=>$total_sixbed_oneroom,

        //             'shared_common_room_cost'   =>   $shared_common_room_cost, 
        //             'shared_common_room_count'   =>   $shared_common_room_count, 
        //             'total_shared_common_room'=>$total_shared_common_room,

        //             'total_fare_amount'=>$total_fare_amount
        //          );
        //         //  print_r($arr_insert); die;
        //          $inserted_id = $this->master_model->insertRecord('inter_seat_type_room_type',$arr_insert,true);
                               
        //          if($inserted_id > 0)
        //          {
        //              $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
        //              redirect($this->module_url_path.'/add');
        //          }
 
        //          else
        //          {
        //              $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
        //          }
        //          redirect($this->module_url_path.'/index');
        //      }   
        // }


        if($this->input->post('booknow_submit'))
        {
             //print_r($_REQUEST);
             $this->form_validation->set_rules('domestic_enquiry_id', 'domestic enquiry id', 'required');

             $this->form_validation->set_rules('seat_count', 'seat count', 'required');
 
             $this->form_validation->set_rules('seperate_seat', 'seperate seat', 'required');
             $this->form_validation->set_rules('total_seperate_seat', 'total seperate seat', 'required');
 
             $this->form_validation->set_rules('child_seperate_seat', 'child seperate seat', 'required');
             $this->form_validation->set_rules('total_child_seperate_seat', 'total child seperate seat', 'required');
 
             $this->form_validation->set_rules('two_child_share_one_seat', 'two child share one seat', 'required');
             $this->form_validation->set_rules('total_two_child_share_one_seat', 'total two child share one seat', 'required');
 
             $this->form_validation->set_rules('child_no_seat_needed', 'child no seat needed', 'required');
             $this->form_validation->set_rules('total_child_no_seat_needed', 'total child no seat needed', 'required');

             $this->form_validation->set_rules('total_busseattype', 'total_busseattype', 'required');
             $this->form_validation->set_rules('total_amt_seattype', 'total_amt_seattype', 'required');
 
             $this->form_validation->set_rules('onebed_oneroom_cost', 'onebed oneroom cost', 'required');
             $this->form_validation->set_rules('onebed_oneroom_count', 'onebed oneroom count', 'required');
             $this->form_validation->set_rules('total_onebed_oneroom', 'total onebed oneroom', 'required');
 
             $this->form_validation->set_rules('twobed_oneroom_cost', 'twobed oneroom cost', 'required');
             $this->form_validation->set_rules('twobed_oneroom_count', 'twobed oneroom count', 'required');
             $this->form_validation->set_rules('total_twobed_oneroom', 'total twobed oneroom', 'required');
 
             $this->form_validation->set_rules('threebed_oneroom_cost', 'threebed oneroom cost', 'required');
             $this->form_validation->set_rules('threebed_oneroom_count', 'threebed oneroom count', 'required');
             $this->form_validation->set_rules('total_threebed_oneroom', 'total threebed oneroom', 'required');
 
             $this->form_validation->set_rules('fourbed_oneroom_cost', 'fourbed oneroom cost', 'required');
             $this->form_validation->set_rules('fourbed_oneroom_count', 'fourbed oneroom count', 'required');
             $this->form_validation->set_rules('total_fourbed_oneroom', 'total fourbed oneroom', 'required');
 
             $this->form_validation->set_rules('fivebed_oneroom_cost', 'fivebed oneroom cost', 'required');
             $this->form_validation->set_rules('fivebed_oneroom_count', 'fivebed oneroom count', 'required');
             $this->form_validation->set_rules('total_fivebed_oneroom', 'total fivebed oneroom', 'required');
 
             $this->form_validation->set_rules('sixbed_oneroom_cost', 'sixbed oneroom cost', 'required');
             $this->form_validation->set_rules('sixbed_oneroom_count', 'sixbed oneroom count', 'required');
             $this->form_validation->set_rules('total_sixbed_oneroom', 'total sixbed oneroom', 'required');
 
             $this->form_validation->set_rules('shared_common_room_cost', 'shared common room cost', 'required');
             $this->form_validation->set_rules('shared_common_room_count', 'shared common room count', 'required');
             $this->form_validation->set_rules('total_shared_common_room', 'total shared common room', 'required');

             $this->form_validation->set_rules('total_seat_bedtype_roomtype', 'total_seat_bedtype_roomtype', 'required');
             $this->form_validation->set_rules('total_amount_bedtype_roomtype', 'total_amount_bedtype_roomtype', 'required');
 
             $this->form_validation->set_rules('total_fare_amount', 'total_fare_amount', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                //echo 'ppppppp';
                //die;
                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');

                $package_id  = $this->input->post('package_id');

                $seat_count  = $this->input->post('seat_count');

                $seperate_seat  = $this->input->post('seperate_seat'); 
                $total_seperate_seat  = $this->input->post('total_seperate_seat');

                $child_seperate_seat  = $this->input->post('child_seperate_seat'); 
                $total_child_seperate_seat  = $this->input->post('total_child_seperate_seat'); 

                $two_child_share_one_seat  = $this->input->post('two_child_share_one_seat'); 
                $total_two_child_share_one_seat  = $this->input->post('total_two_child_share_one_seat'); 
                
                $child_no_seat_needed  = $this->input->post('child_no_seat_needed'); 
                $total_child_no_seat_needed  = $this->input->post('total_child_no_seat_needed'); 

                $total_busseattype  = $this->input->post('total_busseattype'); 
                $total_amt_seattype  = $this->input->post('total_amt_seattype'); 

                $onebed_oneroom_cost  = $this->input->post('onebed_oneroom_cost'); 
                $onebed_oneroom_count  = $this->input->post('onebed_oneroom_count'); 
                $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

                $twobed_oneroom_cost  = $this->input->post('twobed_oneroom_cost'); 
                $twobed_oneroom_count  = $this->input->post('twobed_oneroom_count'); 
                $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom'); 

                $threebed_oneroom_cost  = $this->input->post('threebed_oneroom_cost'); 
                $threebed_oneroom_count  = $this->input->post('threebed_oneroom_count'); 
                $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

                $fourbed_oneroom_cost  = $this->input->post('fourbed_oneroom_cost'); 
                $fourbed_oneroom_count  = $this->input->post('fourbed_oneroom_count'); 
                $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

                $fivebed_oneroom_cost  = $this->input->post('fivebed_oneroom_cost'); 
                $fivebed_oneroom_count  = $this->input->post('fivebed_oneroom_count'); 
                $total_fivebed_oneroom  = $this->input->post('total_fivebed_oneroom'); 

                $sixbed_oneroom_cost  = $this->input->post('sixbed_oneroom_cost'); 
                $sixbed_oneroom_count  = $this->input->post('sixbed_oneroom_count'); 
                $total_sixbed_oneroom  = $this->input->post('total_sixbed_oneroom'); 

                $shared_common_room_cost  = $this->input->post('shared_common_room_cost'); 
                $shared_common_room_count  = $this->input->post('shared_common_room_count'); 
                $total_shared_common_room  = $this->input->post('total_shared_common_room'); 

                $total_seat_bedtype_roomtype  = $this->input->post('total_seat_bedtype_roomtype'); 
                $total_amount_bedtype_roomtype  = $this->input->post('total_amount_bedtype_roomtype'); 

                $total_fare_amount  = $this->input->post('total_fare_amount'); 
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                    'domestic_enquiry_id' =>   $domestic_enquiry_id,

                    'package_id' =>   $package_id,

                    'seat_count' =>   $seat_count,

                    'seperate_seat' =>   $seperate_seat,
                    'total_seperate_seat' =>   $total_seperate_seat,

                    'child_seperate_seat'   =>   $child_seperate_seat, 
                    'total_child_seperate_seat'   =>   $total_child_seperate_seat, 

                    'two_child_share_one_seat'   =>   $two_child_share_one_seat, 
                    'total_two_child_share_one_seat'   =>   $total_two_child_share_one_seat, 

                    'child_no_seat_needed'=>$child_no_seat_needed,
                    'total_child_no_seat_needed'   =>   $total_child_no_seat_needed,
                    
                    'total_bus_seat_count'=>$total_busseattype,
                    'total_bus_seat_amount'   =>   $total_amt_seattype, 

                    'onebed_oneroom_cost'   =>   $onebed_oneroom_cost, 
                    'onebed_oneroom_count'   =>   $onebed_oneroom_count, 
                    'total_onebed_oneroom'=>$total_onebed_oneroom,

                    'twobed_oneroom_cost'   =>   $twobed_oneroom_cost, 
                    'twobed_oneroom_count'   =>   $twobed_oneroom_count, 
                    'total_twobed_oneroom'=>$total_twobed_oneroom,

                    'threebed_oneroom_cost'   =>   $threebed_oneroom_cost, 
                    'threebed_oneroom_count'   =>   $threebed_oneroom_count, 
                    'total_threebed_oneroom'=>$total_threebed_oneroom,

                    'fourbed_oneroom_cost'   =>   $fourbed_oneroom_cost, 
                    'fourbed_oneroom_count'   =>   $fourbed_oneroom_count, 
                    'total_fourbed_oneroom'=>$total_fourbed_oneroom,
                    
                    'fivebed_oneroom_cost'   =>   $fivebed_oneroom_cost, 
                    'fivebed_oneroom_count'   =>   $fivebed_oneroom_count, 
                    'total_fivebed_oneroom'=>$total_fivebed_oneroom,

                    'sixbed_oneroom_cost'   =>   $sixbed_oneroom_cost, 
                    'sixbed_oneroom_count'   =>   $sixbed_oneroom_count, 
                    'total_sixbed_oneroom'=>$total_sixbed_oneroom,

                    'shared_common_room_cost'   =>   $shared_common_room_cost, 
                    'shared_common_room_count'   =>   $shared_common_room_count, 
                    'total_shared_common_room'=>$total_shared_common_room,

                    'total_seat_bedtype_roomtype'   =>   $total_seat_bedtype_roomtype, 
                    'total_amount_bedtype_roomtype'=>$total_amount_bedtype_roomtype,

                    'total_fare_amount'=>$total_fare_amount
                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('inter_seat_type_room_type',$arr_insert,true);
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',"Booking Successfully Done. <br> Thank you for booking..");
                     redirect($this->inter_module_url_booking_process.'/index');
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
        }
    // ==========================================

            

        
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['agent_data']        = $agent_data;
         $this->arr_view_data['arr_package_info']        = $arr_package_info;
         $this->arr_view_data['agent_booking_enquiry_data']        = $agent_booking_enquiry_data;
         $this->arr_view_data['agent_department']        = $agent_department;
         $this->arr_view_data['package_id']        = $package_id;
         $this->arr_view_data['inter_booking_basic_info_data']        = $inter_booking_basic_info_data;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['inter_module_url_booking_process']    = $this->inter_module_url_booking_process;
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
       $fields = "agent.*,department.department,international_booking_enquiry.seat_count,international_booking_enquiry.id as enq_id";
       $this->db->where('agent.is_deleted','no');
       $this->db->where('agent.id',$id);
       $this->db->where('international_booking_enquiry.id',$iid);
       $this->db->join("department", 'agent.department=department.id','left');
       $this->db->join("international_booking_enquiry", 'agent.id=international_booking_enquiry.agent_id','left');
       $agent_department = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
       // print_r($agent_department); die;

       $this->db->where('is_deleted','no');
       $this->db->where('is_active','yes');
       $this->db->order_by('tour_number','ASC');
       $packages_data_booking = $this->master_model->getRecords('international_packages');
       // print_r($packages_data); die;   

       $this->db->where('is_deleted','no');
       $this->db->where('is_active','yes');
       $this->db->where('domestic_enquiry_id',$iid);
       $seattype_roomtype = $this->master_model->getRecord('inter_seat_type_room_type');
       // print_r($seattype_roomtype); die;


        if($this->input->post('submit'))
       {
            //print_r($_REQUEST);

           $this->form_validation->set_rules('domestic_enquiry_id', 'domestic enquiry id', 'required');

           $this->form_validation->set_rules('seat_count', 'seat count', 'required');

           $this->form_validation->set_rules('seperate_seat', 'seperate seat', 'required');
           $this->form_validation->set_rules('total_seperate_seat', 'total seperate seat', 'required');

           $this->form_validation->set_rules('child_seperate_seat', 'child seperate seat', 'required');
           $this->form_validation->set_rules('total_child_seperate_seat', 'total child seperate seat', 'required');

           $this->form_validation->set_rules('two_child_share_one_seat', 'two child share one seat', 'required');
           $this->form_validation->set_rules('total_two_child_share_one_seat', 'total two child share one seat', 'required');

           $this->form_validation->set_rules('child_no_seat_needed', 'child no seat needed', 'required');
           $this->form_validation->set_rules('total_child_no_seat_needed', 'total child no seat needed', 'required');

           $this->form_validation->set_rules('onebed_oneroom_cost', 'onebed oneroom cost', 'required');
           $this->form_validation->set_rules('onebed_oneroom_count', 'onebed oneroom count', 'required');
           $this->form_validation->set_rules('total_onebed_oneroom', 'total onebed oneroom', 'required');

           $this->form_validation->set_rules('twobed_oneroom_cost', 'twobed oneroom cost', 'required');
           $this->form_validation->set_rules('twobed_oneroom_count', 'twobed oneroom count', 'required');
           $this->form_validation->set_rules('total_twobed_oneroom', 'total twobed oneroom', 'required');

           $this->form_validation->set_rules('threebed_oneroom_cost', 'threebed oneroom cost', 'required');
           $this->form_validation->set_rules('threebed_oneroom_count', 'threebed oneroom count', 'required');
           $this->form_validation->set_rules('total_threebed_oneroom', 'total threebed oneroom', 'required');

           $this->form_validation->set_rules('fourbed_oneroom_cost', 'fourbed oneroom cost', 'required');
           $this->form_validation->set_rules('fourbed_oneroom_count', 'fourbed oneroom count', 'required');
           $this->form_validation->set_rules('total_fourbed_oneroom', 'total fourbed oneroom', 'required');

           $this->form_validation->set_rules('fivebed_oneroom_cost', 'fivebed oneroom cost', 'required');
           $this->form_validation->set_rules('fivebed_oneroom_count', 'fivebed oneroom count', 'required');
           $this->form_validation->set_rules('total_fivebed_oneroom', 'total fivebed oneroom', 'required');

           $this->form_validation->set_rules('sixbed_oneroom_cost', 'sixbed oneroom cost', 'required');
           $this->form_validation->set_rules('sixbed_oneroom_count', 'sixbed oneroom count', 'required');
           $this->form_validation->set_rules('total_sixbed_oneroom', 'total sixbed oneroom', 'required');

           $this->form_validation->set_rules('shared_common_room_cost', 'shared common room cost', 'required');
           $this->form_validation->set_rules('shared_common_room_count', 'shared common room count', 'required');
           $this->form_validation->set_rules('total_shared_common_room', 'total shared common room', 'required');

           $this->form_validation->set_rules('total_fare_amount', 'total_fare_amount', 'required');
            
            if($this->form_validation->run() == TRUE)
            { 
               //echo 'ppppppp';
               //die;
               $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');

               $seat_count  = $this->input->post('seat_count');

               $seperate_seat  = $this->input->post('seperate_seat'); 
               $total_seperate_seat  = $this->input->post('total_seperate_seat');

               $child_seperate_seat  = $this->input->post('child_seperate_seat'); 
               $total_child_seperate_seat  = $this->input->post('total_child_seperate_seat'); 

               $two_child_share_one_seat  = $this->input->post('two_child_share_one_seat'); 
               $total_two_child_share_one_seat  = $this->input->post('total_two_child_share_one_seat'); 

               $child_no_seat_needed  = $this->input->post('child_no_seat_needed'); 
               $total_child_no_seat_needed  = $this->input->post('total_child_no_seat_needed'); 

               $onebed_oneroom_cost  = $this->input->post('onebed_oneroom_cost'); 
               $onebed_oneroom_count  = $this->input->post('onebed_oneroom_count'); 
               $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

               $twobed_oneroom_cost  = $this->input->post('twobed_oneroom_cost'); 
               $twobed_oneroom_count  = $this->input->post('twobed_oneroom_count'); 
               $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom'); 

               $threebed_oneroom_cost  = $this->input->post('threebed_oneroom_cost'); 
               $threebed_oneroom_count  = $this->input->post('threebed_oneroom_count'); 
               $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

               $fourbed_oneroom_cost  = $this->input->post('fourbed_oneroom_cost'); 
               $fourbed_oneroom_count  = $this->input->post('fourbed_oneroom_count'); 
               $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

               $fivebed_oneroom_cost  = $this->input->post('fivebed_oneroom_cost'); 
               $fivebed_oneroom_count  = $this->input->post('fivebed_oneroom_count'); 
               $total_fivebed_oneroom  = $this->input->post('total_fivebed_oneroom'); 

               $sixbed_oneroom_cost  = $this->input->post('sixbed_oneroom_cost'); 
               $sixbed_oneroom_count  = $this->input->post('sixbed_oneroom_count'); 
               $total_sixbed_oneroom  = $this->input->post('total_sixbed_oneroom'); 

               $shared_common_room_cost  = $this->input->post('shared_common_room_cost'); 
               $shared_common_room_count  = $this->input->post('shared_common_room_count'); 
               $total_shared_common_room  = $this->input->post('total_shared_common_room'); 

               $total_fare_amount  = $this->input->post('total_fare_amount'); 
               //  $today=date("Y-m-d");
               //  $packages  = $this->input->post('packages'); 

                $arr_insert = array(
                    'domestic_enquiry_id' =>   $domestic_enquiry_id,

                    'seat_count' =>   $seat_count,

                    'seperate_seat' =>   $seperate_seat,
                    'total_seperate_seat' =>   $total_seperate_seat,

                    'child_seperate_seat'   =>   $child_seperate_seat, 
                    'total_child_seperate_seat'   =>   $total_child_seperate_seat, 

                    'two_child_share_one_seat'   =>   $two_child_share_one_seat, 
                    'total_two_child_share_one_seat'   =>   $total_two_child_share_one_seat, 

                    'child_no_seat_needed'=>$child_no_seat_needed,
                    'total_child_no_seat_needed'   =>   $total_child_no_seat_needed, 

                    'onebed_oneroom_cost'   =>   $onebed_oneroom_cost, 
                    'onebed_oneroom_count'   =>   $onebed_oneroom_count, 
                    'total_onebed_oneroom'=>$total_onebed_oneroom,

                    'twobed_oneroom_cost'   =>   $twobed_oneroom_cost, 
                    'twobed_oneroom_count'   =>   $twobed_oneroom_count, 
                    'total_twobed_oneroom'=>$total_twobed_oneroom,

                    'threebed_oneroom_cost'   =>   $threebed_oneroom_cost, 
                    'threebed_oneroom_count'   =>   $threebed_oneroom_count, 
                    'total_threebed_oneroom'=>$total_threebed_oneroom,

                    'fourbed_oneroom_cost'   =>   $fourbed_oneroom_cost, 
                    'fourbed_oneroom_count'   =>   $fourbed_oneroom_count, 
                    'total_fourbed_oneroom'=>$total_fourbed_oneroom,
                    
                    'fivebed_oneroom_cost'   =>   $fivebed_oneroom_cost, 
                    'fivebed_oneroom_count'   =>   $fivebed_oneroom_count, 
                    'total_fivebed_oneroom'=>$total_fivebed_oneroom,

                    'sixbed_oneroom_cost'   =>   $sixbed_oneroom_cost, 
                    'sixbed_oneroom_count'   =>   $sixbed_oneroom_count, 
                    'total_sixbed_oneroom'=>$total_sixbed_oneroom,

                    'shared_common_room_cost'   =>   $shared_common_room_cost, 
                    'shared_common_room_count'   =>   $shared_common_room_count, 
                    'total_shared_common_room'=>$total_shared_common_room,

                    'total_fare_amount'=>$total_fare_amount

                );
               //  print_r($arr_insert); die;
                $inserted_id = $this->master_model->insertRecord('inter_seat_type_room_type',$arr_insert,true);
                              
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_booking_enquiry.'/index');  
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
            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic enquiry id', 'required');

            $this->form_validation->set_rules('seat_count', 'seat count', 'required');

            $this->form_validation->set_rules('seperate_seat', 'seperate seat', 'required');
            $this->form_validation->set_rules('total_seperate_seat', 'total seperate seat', 'required');

            $this->form_validation->set_rules('child_seperate_seat', 'child seperate seat', 'required');
            $this->form_validation->set_rules('total_child_seperate_seat', 'total child seperate seat', 'required');

            $this->form_validation->set_rules('two_child_share_one_seat', 'two child share one seat', 'required');
            $this->form_validation->set_rules('total_two_child_share_one_seat', 'total two child share one seat', 'required');

            $this->form_validation->set_rules('child_no_seat_needed', 'child no seat needed', 'required');
            $this->form_validation->set_rules('total_child_no_seat_needed', 'total child no seat needed', 'required');

            $this->form_validation->set_rules('onebed_oneroom_cost', 'onebed oneroom cost', 'required');
            $this->form_validation->set_rules('onebed_oneroom_count', 'onebed oneroom count', 'required');
            $this->form_validation->set_rules('total_onebed_oneroom', 'total onebed oneroom', 'required');

            $this->form_validation->set_rules('twobed_oneroom_cost', 'twobed oneroom cost', 'required');
            $this->form_validation->set_rules('twobed_oneroom_count', 'twobed oneroom count', 'required');
            $this->form_validation->set_rules('total_twobed_oneroom', 'total twobed oneroom', 'required');

            $this->form_validation->set_rules('threebed_oneroom_cost', 'threebed oneroom cost', 'required');
            $this->form_validation->set_rules('threebed_oneroom_count', 'threebed oneroom count', 'required');
            $this->form_validation->set_rules('total_threebed_oneroom', 'total threebed oneroom', 'required');

            $this->form_validation->set_rules('fourbed_oneroom_cost', 'fourbed oneroom cost', 'required');
            $this->form_validation->set_rules('fourbed_oneroom_count', 'fourbed oneroom count', 'required');
            $this->form_validation->set_rules('total_fourbed_oneroom', 'total fourbed oneroom', 'required');

            $this->form_validation->set_rules('fivebed_oneroom_cost', 'fivebed oneroom cost', 'required');
            $this->form_validation->set_rules('fivebed_oneroom_count', 'fivebed oneroom count', 'required');
            $this->form_validation->set_rules('total_fivebed_oneroom', 'total fivebed oneroom', 'required');

            $this->form_validation->set_rules('sixbed_oneroom_cost', 'sixbed oneroom cost', 'required');
            $this->form_validation->set_rules('sixbed_oneroom_count', 'sixbed oneroom count', 'required');
            $this->form_validation->set_rules('total_sixbed_oneroom', 'total sixbed oneroom', 'required');

            $this->form_validation->set_rules('shared_common_room_cost', 'shared common room cost', 'required');
            $this->form_validation->set_rules('shared_common_room_count', 'shared common room count', 'required');
            $this->form_validation->set_rules('total_shared_common_room', 'total shared common room', 'required');

            $this->form_validation->set_rules('total_fare_amount', 'total_fare_amount', 'required');
            
            if($this->form_validation->run() == TRUE)
            { 
               //echo 'ppppppp';
               //die;
               $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');

               $seat_count  = $this->input->post('seat_count');

               $seperate_seat  = $this->input->post('seperate_seat'); 
               $total_seperate_seat  = $this->input->post('total_seperate_seat');

               $child_seperate_seat  = $this->input->post('child_seperate_seat'); 
               $total_child_seperate_seat  = $this->input->post('total_child_seperate_seat'); 

               $two_child_share_one_seat  = $this->input->post('two_child_share_one_seat'); 
               $total_two_child_share_one_seat  = $this->input->post('total_two_child_share_one_seat'); 

               $child_no_seat_needed  = $this->input->post('child_no_seat_needed'); 
               $total_child_no_seat_needed  = $this->input->post('total_child_no_seat_needed'); 

               $onebed_oneroom_cost  = $this->input->post('onebed_oneroom_cost'); 
               $onebed_oneroom_count  = $this->input->post('onebed_oneroom_count'); 
               $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

               $twobed_oneroom_cost  = $this->input->post('twobed_oneroom_cost'); 
               $twobed_oneroom_count  = $this->input->post('twobed_oneroom_count'); 
               $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom'); 

               $threebed_oneroom_cost  = $this->input->post('threebed_oneroom_cost'); 
               $threebed_oneroom_count  = $this->input->post('threebed_oneroom_count'); 
               $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

               $fourbed_oneroom_cost  = $this->input->post('fourbed_oneroom_cost'); 
               $fourbed_oneroom_count  = $this->input->post('fourbed_oneroom_count'); 
               $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

               $fivebed_oneroom_cost  = $this->input->post('fivebed_oneroom_cost'); 
               $fivebed_oneroom_count  = $this->input->post('fivebed_oneroom_count'); 
               $total_fivebed_oneroom  = $this->input->post('total_fivebed_oneroom'); 

               $sixbed_oneroom_cost  = $this->input->post('sixbed_oneroom_cost'); 
               $sixbed_oneroom_count  = $this->input->post('sixbed_oneroom_count'); 
               $total_sixbed_oneroom  = $this->input->post('total_sixbed_oneroom'); 

               $shared_common_room_cost  = $this->input->post('shared_common_room_cost'); 
               $shared_common_room_count  = $this->input->post('shared_common_room_count'); 
               $total_shared_common_room  = $this->input->post('total_shared_common_room'); 

               $total_fare_amount  = $this->input->post('total_fare_amount'); 
               //  $today=date("Y-m-d");
               //  $packages  = $this->input->post('packages'); 

                $arr_update = array(
                   'domestic_enquiry_id' =>   $domestic_enquiry_id,

                   'seat_count' =>   $seat_count,

                   'seperate_seat' =>   $seperate_seat,
                   'total_seperate_seat' =>   $total_seperate_seat,

                   'child_seperate_seat'   =>   $child_seperate_seat, 
                   'total_child_seperate_seat'   =>   $total_child_seperate_seat, 

                   'two_child_share_one_seat'   =>   $two_child_share_one_seat, 
                   'total_two_child_share_one_seat'   =>   $total_two_child_share_one_seat, 

                   'child_no_seat_needed'=>$child_no_seat_needed,
                   'total_child_no_seat_needed'   =>   $total_child_no_seat_needed, 

                   'onebed_oneroom_cost'   =>   $onebed_oneroom_cost, 
                   'onebed_oneroom_count'   =>   $onebed_oneroom_count, 
                   'total_onebed_oneroom'=>$total_onebed_oneroom,

                   'twobed_oneroom_cost'   =>   $twobed_oneroom_cost, 
                   'twobed_oneroom_count'   =>   $twobed_oneroom_count, 
                   'total_twobed_oneroom'=>$total_twobed_oneroom,

                   'threebed_oneroom_cost'   =>   $threebed_oneroom_cost, 
                   'threebed_oneroom_count'   =>   $threebed_oneroom_count, 
                   'total_threebed_oneroom'=>$total_threebed_oneroom,

                   'fourbed_oneroom_cost'   =>   $fourbed_oneroom_cost, 
                   'fourbed_oneroom_count'   =>   $fourbed_oneroom_count, 
                   'total_fourbed_oneroom'=>$total_fourbed_oneroom,
                   
                   'fivebed_oneroom_cost'   =>   $fivebed_oneroom_cost, 
                   'fivebed_oneroom_count'   =>   $fivebed_oneroom_count, 
                   'total_fivebed_oneroom'=>$total_fivebed_oneroom,

                   'sixbed_oneroom_cost'   =>   $sixbed_oneroom_cost, 
                   'sixbed_oneroom_count'   =>   $sixbed_oneroom_count, 
                   'total_sixbed_oneroom'=>$total_sixbed_oneroom,

                   'shared_common_room_cost'   =>   $shared_common_room_cost, 
                   'shared_common_room_count'   =>   $shared_common_room_count, 
                   'total_shared_common_room'=>$total_shared_common_room,

                   'total_fare_amount'=>$total_fare_amount
                );

                if(!empty($seattype_roomtype)){
                   $arr_where     = array("domestic_enquiry_id" => $iid);
                    $inserted_id = $this->master_model->updateRecord('inter_seat_type_room_type',$arr_update,$arr_where);
                   }else{
                       $inserted_id = $this->master_model->insertRecord('inter_seat_type_room_type',$arr_update,true);
                   }
               //  print_r($arr_insert); die;
               //  $arr_where     = array("domestic_enquiry_id" => $iid);
               //  $inserted_id = $this->master_model->updateRecord('seat_type_room_type',$arr_update,$arr_where);
               // //  print_r($arr_insert); die;
                              
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/edit/'.$iid);
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
        $this->arr_view_data['seattype_roomtype']        = $seattype_roomtype;
        $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
        $this->arr_view_data['page_title']      = " Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_inter_booking_enquiry'] = $this->module_inter_booking_enquiry;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }

}