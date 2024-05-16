<?php 
//   Controller for: home page
// Author: Rupali / Vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Seat_type_room_type extends CI_Controller {
	function __construct() {
        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/seat_type_room_type";
        $this->module_url_path_final_booking    =  base_url().$this->config->item('agent_panel_slug')."/final_bookings";
        $this->module_all_traveller_info   =  base_url().$this->config->item('agent_panel_slug')."/all_traveller_info";
        $this->module_url_booking_process    =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process";
        $this->module_booking_enquiry    =  base_url().$this->config->item('agent_panel_slug')."/booking_enquiry";
        $this->module_title       = "Seat Type and Room Type Selection";
        $this->module_url_slug    = "Seat Type and Room Type Selection";
        $this->module_view_folder = "seat_type_room_type/";
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
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_url_path_final_booking'] = $this->module_url_path_final_booking;
         $this->arr_view_data['module_url_booking_process'] = $this->module_url_booking_process;
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
        $this->db->where('booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');
        // print_r($agent_booking_enquiry_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $booking_basic_info_data = $this->master_model->getRecord('booking_basic_info');
        // print_r($booking_basic_info_data); die;

        $record = array();
        $fields = "agent.*,department.department,booking_enquiry.seat_count,booking_enquiry.id as enq_id";
        $this->db->where('agent.is_deleted','no');
        $this->db->where('agent.id',$id);
        $this->db->where('booking_enquiry.id',$iid);
        $this->db->join("department", 'agent.department=department.id','left');
        $this->db->join("booking_enquiry", 'agent.id=booking_enquiry.agent_id','left');
        $agent_department = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
        // print_r($agent_department); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('packages');
        // print_r($packages_data); die;   

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $agent_all_travaller_info = $this->master_model->getRecord('all_traveller_info');
        // print_r($agent_booking_enquiry_data); die;

        $record = array();
        $fields = "booking_basic_info.*,packages.id,packages.tour_title,packages.tour_number,packages.tour_number,package_date.journey_date";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');
        $this->db->join("package_date", 'package_date.id=booking_basic_info.tour_date','left');
        $traveller_booking_info = $this->master_model->getRecords('booking_basic_info',array('booking_basic_info.is_deleted'=>'no'),$fields);
        // print_r($traveller_booking_info); die;

        $record = array();
        $fields = "all_traveller_info.*, package_date.cost";
        // $this->db->order_by('id','desc');
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $this->db->join("package_date", 'all_traveller_info.package_id= package_date.package_id','left');
        $arr_package_info = $this->master_model->getRecord('all_traveller_info');
        // print_r($arr_package_info); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_costing = $this->master_model->getRecords('packages');
        // print_r($packages_costing); die;   

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $package_id = $this->master_model->getRecord('all_traveller_info');
        // print_r($package_id); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $seat_type_room_type = $this->master_model->getRecord('seat_type_room_type');
        // print_r($seat_type_room_type); die;


        
        if($this->input->post('submit'))
        {
             //print_r($_REQUEST);

            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic enquiry id', 'required');

            $this->form_validation->set_rules('seat_count', 'seat count', 'required');

            // $this->form_validation->set_rules('seperate_seat', 'seperate seat', 'required');
            // $this->form_validation->set_rules('total_seperate_seat', 'total seperate seat', 'required');

            // $this->form_validation->set_rules('child_seperate_seat', 'child seperate seat', 'required');
            // $this->form_validation->set_rules('total_child_seperate_seat', 'total child seperate seat', 'required');

            // $this->form_validation->set_rules('two_child_share_one_seat', 'two child share one seat', 'required');
            // $this->form_validation->set_rules('total_two_child_share_one_seat', 'total two child share one seat', 'required');

            // $this->form_validation->set_rules('child_no_seat_needed', 'child no seat needed', 'required');
            // $this->form_validation->set_rules('total_child_no_seat_needed', 'total child no seat needed', 'required');

            // $this->form_validation->set_rules('child_noo_seat_needed', 'total child no seat needed', 'required');
            // $this->form_validation->set_rules('total_child_noo_seat_needed', 'total child no seat needed', 'required');

            // $this->form_validation->set_rules('total_busseattype', 'total_busseattype', 'required');
            // $this->form_validation->set_rules('total_seat', 'total_seat', 'required');

            // $this->form_validation->set_rules('onebed_oneroom_cost_adult', 'onebed_oneroom_cost_adult', 'required');
            // $this->form_validation->set_rules('onebed_oneroom_cost_90', 'onebed_oneroom_cost_90', 'required');
            // $this->form_validation->set_rules('onebed_oneroom_count_60', 'onebed_oneroom_count_60', 'required');
            // $this->form_validation->set_rules('onebed_oneroom_40', 'onebed_oneroom_40', 'required');
            // $this->form_validation->set_rules('onebed_oneroom_0', 'onebed_oneroom_0', 'required');

            // $this->form_validation->set_rules('total_onebed_oneroom', 'total_onebed_oneroom', 'required');

            // $this->form_validation->set_rules('twobed_oneroom_cost_adult', 'twobed_oneroom_cost_adult', 'required');
            // $this->form_validation->set_rules('twobed_oneroom_count_90', 'twobed_oneroom_count_90', 'required');
            // $this->form_validation->set_rules('twobed_oneroom_count_60', 'twobed_oneroom_count_60', 'required');
            // $this->form_validation->set_rules('twobed_oneroom_count_40', 'twobed_oneroom_count_40', 'required');
            // $this->form_validation->set_rules('twobed_oneroom_count_0', 'twobed_oneroom_count_0', 'required');

            // $this->form_validation->set_rules('total_twobed_oneroom', 'total_twobed_oneroom', 'required');

            // $this->form_validation->set_rules('threebed_oneroom_cost_adult', 'threebed_oneroom_cost_adult', 'required');
            // $this->form_validation->set_rules('threebed_oneroom_count_90', 'threebed_oneroom_count_90', 'required');
            // $this->form_validation->set_rules('threebed_oneroom_count_60', 'threebed_oneroom_count_60', 'required');
            // $this->form_validation->set_rules('threebed_oneroom_count_40', 'threebed_oneroom_count_40', 'required');
            // $this->form_validation->set_rules('threebed_oneroom_count_0', 'threebed_oneroom_count_0', 'required');

            // $this->form_validation->set_rules('total_threebed_oneroom', 'total_threebed_oneroom', 'required');

            // $this->form_validation->set_rules('fourbed_oneroom_cost_adult', 'fourbed_oneroom_cost_adult', 'required');
            // $this->form_validation->set_rules('fourbed_oneroom_count_90', 'fourbed_oneroom_count_90', 'required');
            // $this->form_validation->set_rules('fourbed_oneroom_count_60', 'fourbed_oneroom_count_60', 'required');
            // $this->form_validation->set_rules('fourbed_oneroom_count_40', 'fourbed_oneroom_count_40', 'required');
            // $this->form_validation->set_rules('fourbed_oneroom_count_0', 'fourbed_oneroom_count_0', 'required');

            // $this->form_validation->set_rules('total_fourbed_oneroom', 'total_fourbed_oneroom', 'required');

            // $this->form_validation->set_rules('total_hotel_amount', 'total_hotel_amount', 'required');

             
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

                $child_noo_seat_needed  = $this->input->post('child_noo_seat_needed'); 
                $total_child_noo_seat_needed  = $this->input->post('total_child_noo_seat_needed');

                $total_busseattype  = $this->input->post('total_busseattype'); 
                $total_seat  = $this->input->post('total_seat'); 

                $onebed_oneroom_cost  = $this->input->post('onebed_oneroom_cost'); 
                $onebed_oneroom_cost_adult  = $this->input->post('onebed_oneroom_cost_adult'); 
                $onebed_oneroom_cost_90  = $this->input->post('onebed_oneroom_cost_90'); 
                $onebed_oneroom_count_60  = $this->input->post('onebed_oneroom_count_60'); 
                $onebed_oneroom_40  = $this->input->post('onebed_oneroom_40'); 
                $onebed_oneroom_0  = $this->input->post('onebed_oneroom_0'); 
                $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

                $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

                $twobed_oneroom_cost  = $this->input->post('twobed_oneroom_cost'); 
                $twobed_oneroom_cost_adult  = $this->input->post('twobed_oneroom_cost_adult'); 
                $twobed_oneroom_cost_adult  = $this->input->post('twobed_oneroom_cost_adult'); 
                $twobed_oneroom_count_90  = $this->input->post('twobed_oneroom_count_90'); 
                $twobed_oneroom_count_60  = $this->input->post('twobed_oneroom_count_60'); 
                $twobed_oneroom_count_40  = $this->input->post('twobed_oneroom_count_40'); 
                $twobed_oneroom_count_0  = $this->input->post('twobed_oneroom_count_0'); 
                $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom'); 

                $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom');  

                $threebed_oneroom_cost  = $this->input->post('threebed_oneroom_cost'); 
                $threebed_oneroom_cost_adult  = $this->input->post('threebed_oneroom_cost_adult'); 
                $threebed_oneroom_count_90  = $this->input->post('threebed_oneroom_count_90'); 
                $threebed_oneroom_count_60  = $this->input->post('threebed_oneroom_count_60'); 
                $threebed_oneroom_count_40  = $this->input->post('threebed_oneroom_count_40'); 
                $threebed_oneroom_count_0  = $this->input->post('threebed_oneroom_count_0');
                $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

                $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

                $fourbed_oneroom_cost  = $this->input->post('fourbed_oneroom_cost'); 
                $fourbed_oneroom_cost_adult  = $this->input->post('fourbed_oneroom_cost_adult'); 
                $fourbed_oneroom_count_90  = $this->input->post('fourbed_oneroom_count_90'); 
                $fourbed_oneroom_count_60  = $this->input->post('fourbed_oneroom_count_60'); 
                $fourbed_oneroom_count_40  = $this->input->post('fourbed_oneroom_count_40'); 
                $fourbed_oneroom_count_0  = $this->input->post('fourbed_oneroom_count_0'); 
                $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

                $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

                $total_hotel_amount  = $this->input->post('total_hotel_amount'); 
                $total_travaller_count  = $this->input->post('total_travaller_count'); 

                $total_allocated_rooms  = $this->input->post('total_allocated_rooms'); 

                $total_allocated_rooms_1  = $this->input->post('total_allocated_rooms_1'); 
                $total_allocated_rooms_2  = $this->input->post('total_allocated_rooms_2'); 
                $total_allocated_rooms_3  = $this->input->post('total_allocated_rooms_3'); 
                $total_allocated_rooms_4  = $this->input->post('total_allocated_rooms_4'); 

                $total_agewise_cal_adult  = $this->input->post('total_agewise_cal_adult'); 
                $total_agewise_cal_90  = $this->input->post('total_agewise_cal_90'); 
                $total_agewise_cal_60  = $this->input->post('total_agewise_cal_60'); 
                $total_agewise_cal_40  = $this->input->post('total_agewise_cal_40'); 
                $total_agewise_cal_0  = $this->input->post('total_agewise_cal_0'); 

                $total_adult_90  = $this->input->post('total_adult_90'); 

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

                     'child_noo_seat_needed'=>$child_noo_seat_needed,
                     'total_child_noo_seat_needed'   =>   $total_child_noo_seat_needed,

                     'total_busseattype'=>$total_busseattype,
                     'total_seat'   =>   $total_seat, 

                     'onebed_oneroom_cost'   =>   $onebed_oneroom_cost, 
                     'onebed_oneroom_cost_adult'   =>   $onebed_oneroom_cost_adult, 
                     'onebed_oneroom_cost_90'   =>   $onebed_oneroom_cost_90, 
                     'onebed_oneroom_count_60'=>$onebed_oneroom_count_60,
                     'onebed_oneroom_40'   =>   $onebed_oneroom_40, 
                     'onebed_oneroom_0'=>$onebed_oneroom_0,
                     'total_onebed_oneroom'=>$total_onebed_oneroom,

                     'total_onebed_oneroom'=>$total_onebed_oneroom,

                     'twobed_oneroom_cost'   =>   $twobed_oneroom_cost, 
                     'twobed_oneroom_cost_adult'   =>   $twobed_oneroom_cost_adult, 
                     'twobed_oneroom_count_90'   =>   $twobed_oneroom_count_90, 
                     'twobed_oneroom_count_60'=>$twobed_oneroom_count_60,
                     'twobed_oneroom_count_40'   =>   $twobed_oneroom_count_40, 
                     'twobed_oneroom_count_0'=>$twobed_oneroom_count_0,
                     'total_twobed_oneroom'=>$total_twobed_oneroom,

                     'total_twobed_oneroom'=>$total_twobed_oneroom,

                     'threebed_oneroom_cost'   =>   $threebed_oneroom_cost, 
                     'threebed_oneroom_cost_adult'   =>   $threebed_oneroom_cost_adult, 
                     'threebed_oneroom_count_90'   =>   $threebed_oneroom_count_90, 
                     'threebed_oneroom_count_60'=>$threebed_oneroom_count_60,
                     'threebed_oneroom_count_40'   =>   $threebed_oneroom_count_40, 
                     'threebed_oneroom_count_0'=>$threebed_oneroom_count_0,
                     'total_threebed_oneroom'=>$total_threebed_oneroom,

                     'total_threebed_oneroom'=>$total_threebed_oneroom,

                     'fourbed_oneroom_cost'   =>   $fourbed_oneroom_cost, 
                     'fourbed_oneroom_cost_adult'   =>   $fourbed_oneroom_cost_adult, 
                     'fourbed_oneroom_count_90'   =>   $fourbed_oneroom_count_90, 
                     'fourbed_oneroom_count_60'=>$fourbed_oneroom_count_60,
                     'fourbed_oneroom_count_40'   =>   $fourbed_oneroom_count_40, 
                     'fourbed_oneroom_count_0'=>$fourbed_oneroom_count_0,
                     'total_fourbed_oneroom'=>$total_fourbed_oneroom,

                     'total_fourbed_oneroom'=>$total_fourbed_oneroom,

                     'total_hotel_amount'   =>   $total_hotel_amount,
                     'total_travaller_count'   =>   $total_travaller_count,

                     'total_allocated_rooms'  => $total_allocated_rooms,

                     'total_allocated_rooms_1' => $total_allocated_rooms_1,
                     'total_allocated_rooms_2' => $total_allocated_rooms_2,
                     'total_allocated_rooms_3' => $total_allocated_rooms_3,
                     'total_allocated_rooms_4' => $total_allocated_rooms_4,

                     'total_agewise_cal_adult' => $total_agewise_cal_adult,
                     'total_agewise_cal_90' => $total_agewise_cal_90,
                     'total_agewise_cal_60' => $total_agewise_cal_60,
                     'total_agewise_cal_40' => $total_agewise_cal_40,
                     'total_agewise_cal_0' => $total_agewise_cal_0,

                     'total_adult_90' => $total_adult_90

                 );
                //  print_r($arr_insert); die;


                 $inserted_id = $this->master_model->insertRecord('seat_type_room_type',$arr_insert,true);
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_url_path.'/add_bus/'.$iid);  
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
            $this->form_validation->set_rules('domestic_enquiry_id', 'domestic enquiry id', 'required');

            $this->form_validation->set_rules('seat_count', 'seat count', 'required');

            // $this->form_validation->set_rules('seperate_seat', 'seperate seat', 'required');
            // $this->form_validation->set_rules('total_seperate_seat', 'total seperate seat', 'required');

            // $this->form_validation->set_rules('child_seperate_seat', 'child seperate seat', 'required');
            // $this->form_validation->set_rules('total_child_seperate_seat', 'total child seperate seat', 'required');

            // $this->form_validation->set_rules('two_child_share_one_seat', 'two child share one seat', 'required');
            // $this->form_validation->set_rules('total_two_child_share_one_seat', 'total two child share one seat', 'required');

            // $this->form_validation->set_rules('child_no_seat_needed', 'child no seat needed', 'required');
            // $this->form_validation->set_rules('total_child_no_seat_needed', 'total child no seat needed', 'required');

            // $this->form_validation->set_rules('child_noo_seat_needed', 'total child no seat needed', 'required');
            // $this->form_validation->set_rules('total_child_noo_seat_needed', 'total child no seat needed', 'required');

            // $this->form_validation->set_rules('total_busseattype', 'total_busseattype', 'required');
            // $this->form_validation->set_rules('total_seat', 'total_seat', 'required');

            // $this->form_validation->set_rules('onebed_oneroom_cost_adult', 'onebed_oneroom_cost_adult', 'required');
            // $this->form_validation->set_rules('onebed_oneroom_cost_90', 'onebed_oneroom_cost_90', 'required');
            // $this->form_validation->set_rules('onebed_oneroom_count_60', 'onebed_oneroom_count_60', 'required');
            // $this->form_validation->set_rules('onebed_oneroom_40', 'onebed_oneroom_40', 'required');
            // $this->form_validation->set_rules('onebed_oneroom_0', 'onebed_oneroom_0', 'required');

            // $this->form_validation->set_rules('total_onebed_oneroom', 'total_onebed_oneroom', 'required');

            // $this->form_validation->set_rules('twobed_oneroom_cost_adult', 'twobed_oneroom_cost_adult', 'required');
            // $this->form_validation->set_rules('twobed_oneroom_count_90', 'twobed_oneroom_count_90', 'required');
            // $this->form_validation->set_rules('twobed_oneroom_count_60', 'twobed_oneroom_count_60', 'required');
            // $this->form_validation->set_rules('twobed_oneroom_count_40', 'twobed_oneroom_count_40', 'required');
            // $this->form_validation->set_rules('twobed_oneroom_count_0', 'twobed_oneroom_count_0', 'required');

            // $this->form_validation->set_rules('total_twobed_oneroom', 'total_twobed_oneroom', 'required');

            // $this->form_validation->set_rules('threebed_oneroom_cost_adult', 'threebed_oneroom_cost_adult', 'required');
            // $this->form_validation->set_rules('threebed_oneroom_count_90', 'threebed_oneroom_count_90', 'required');
            // $this->form_validation->set_rules('threebed_oneroom_count_60', 'threebed_oneroom_count_60', 'required');
            // $this->form_validation->set_rules('threebed_oneroom_count_40', 'threebed_oneroom_count_40', 'required');
            // $this->form_validation->set_rules('threebed_oneroom_count_0', 'threebed_oneroom_count_0', 'required');

            // $this->form_validation->set_rules('total_threebed_oneroom', 'total_threebed_oneroom', 'required');

            // $this->form_validation->set_rules('fourbed_oneroom_cost_adult', 'fourbed_oneroom_cost_adult', 'required');
            // $this->form_validation->set_rules('fourbed_oneroom_count_90', 'fourbed_oneroom_count_90', 'required');
            // $this->form_validation->set_rules('fourbed_oneroom_count_60', 'fourbed_oneroom_count_60', 'required');
            // $this->form_validation->set_rules('fourbed_oneroom_count_40', 'fourbed_oneroom_count_40', 'required');
            // $this->form_validation->set_rules('fourbed_oneroom_count_0', 'fourbed_oneroom_count_0', 'required');

            // $this->form_validation->set_rules('total_fourbed_oneroom', 'total_fourbed_oneroom', 'required');

            // $this->form_validation->set_rules('total_hotel_amount', 'total_hotel_amount', 'required');
            // $this->form_validation->set_rules('total_travaller_count', 'total_travaller_count', 'required');

             
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

                $child_noo_seat_needed  = $this->input->post('child_noo_seat_needed'); 
                $total_child_noo_seat_needed  = $this->input->post('total_child_noo_seat_needed');

                $total_busseattype  = $this->input->post('total_busseattype'); 
                $total_seat  = $this->input->post('total_seat'); 

                $onebed_oneroom_cost  = $this->input->post('onebed_oneroom_cost'); 
                $onebed_oneroom_cost_adult  = $this->input->post('onebed_oneroom_cost_adult'); 
                $onebed_oneroom_cost_90  = $this->input->post('onebed_oneroom_cost_90'); 
                $onebed_oneroom_count_60  = $this->input->post('onebed_oneroom_count_60'); 
                $onebed_oneroom_40  = $this->input->post('onebed_oneroom_40'); 
                $onebed_oneroom_0  = $this->input->post('onebed_oneroom_0'); 
                $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

                $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

                $twobed_oneroom_cost  = $this->input->post('twobed_oneroom_cost'); 
                $twobed_oneroom_cost_adult  = $this->input->post('twobed_oneroom_cost_adult'); 
                $twobed_oneroom_cost_adult  = $this->input->post('twobed_oneroom_cost_adult'); 
                $twobed_oneroom_count_90  = $this->input->post('twobed_oneroom_count_90'); 
                $twobed_oneroom_count_60  = $this->input->post('twobed_oneroom_count_60'); 
                $twobed_oneroom_count_40  = $this->input->post('twobed_oneroom_count_40'); 
                $twobed_oneroom_count_0  = $this->input->post('twobed_oneroom_count_0'); 
                $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom'); 

                $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom');  

                $threebed_oneroom_cost  = $this->input->post('threebed_oneroom_cost'); 
                $threebed_oneroom_cost_adult  = $this->input->post('threebed_oneroom_cost_adult'); 
                $threebed_oneroom_count_90  = $this->input->post('threebed_oneroom_count_90'); 
                $threebed_oneroom_count_60  = $this->input->post('threebed_oneroom_count_60'); 
                $threebed_oneroom_count_40  = $this->input->post('threebed_oneroom_count_40'); 
                $threebed_oneroom_count_0  = $this->input->post('threebed_oneroom_count_0');
                $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

                $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

                $fourbed_oneroom_cost  = $this->input->post('fourbed_oneroom_cost'); 
                $fourbed_oneroom_cost_adult  = $this->input->post('fourbed_oneroom_cost_adult'); 
                $fourbed_oneroom_count_90  = $this->input->post('fourbed_oneroom_count_90'); 
                $fourbed_oneroom_count_60  = $this->input->post('fourbed_oneroom_count_60'); 
                $fourbed_oneroom_count_40  = $this->input->post('fourbed_oneroom_count_40'); 
                $fourbed_oneroom_count_0  = $this->input->post('fourbed_oneroom_count_0'); 
                $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

                $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

                $total_hotel_amount  = $this->input->post('total_hotel_amount'); 
                $total_travaller_count  = $this->input->post('total_travaller_count'); 

                $total_allocated_rooms  = $this->input->post('total_allocated_rooms'); 

                $total_allocated_rooms_1  = $this->input->post('total_allocated_rooms_1'); 
                $total_allocated_rooms_2  = $this->input->post('total_allocated_rooms_2'); 
                $total_allocated_rooms_3  = $this->input->post('total_allocated_rooms_3'); 
                $total_allocated_rooms_4  = $this->input->post('total_allocated_rooms_4'); 

                $total_agewise_cal_adult  = $this->input->post('total_agewise_cal_adult'); 
                $total_agewise_cal_90  = $this->input->post('total_agewise_cal_90'); 
                $total_agewise_cal_60  = $this->input->post('total_agewise_cal_60'); 
                $total_agewise_cal_40  = $this->input->post('total_agewise_cal_40'); 
                $total_agewise_cal_0  = $this->input->post('total_agewise_cal_0'); 

                $total_adult_90  = $this->input->post('total_adult_90');

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

                     'child_noo_seat_needed'=>$child_noo_seat_needed,
                     'total_child_noo_seat_needed'   =>   $total_child_noo_seat_needed,

                     'total_busseattype'=>$total_busseattype,
                     'total_seat'   =>   $total_seat, 

                     'onebed_oneroom_cost'   =>   $onebed_oneroom_cost, 
                     'onebed_oneroom_cost_adult'   =>   $onebed_oneroom_cost_adult, 
                     'onebed_oneroom_cost_90'   =>   $onebed_oneroom_cost_90, 
                     'onebed_oneroom_count_60'=>$onebed_oneroom_count_60,
                     'onebed_oneroom_40'   =>   $onebed_oneroom_40, 
                     'onebed_oneroom_0'=>$onebed_oneroom_0,
                     'total_onebed_oneroom'=>$total_onebed_oneroom,

                     'total_onebed_oneroom'=>$total_onebed_oneroom,

                     'twobed_oneroom_cost'   =>   $twobed_oneroom_cost, 
                     'twobed_oneroom_cost_adult'   =>   $twobed_oneroom_cost_adult, 
                     'twobed_oneroom_count_90'   =>   $twobed_oneroom_count_90, 
                     'twobed_oneroom_count_60'=>$twobed_oneroom_count_60,
                     'twobed_oneroom_count_40'   =>   $twobed_oneroom_count_40, 
                     'twobed_oneroom_count_0'=>$twobed_oneroom_count_0,
                     'total_twobed_oneroom'=>$total_twobed_oneroom,

                     'total_twobed_oneroom'=>$total_twobed_oneroom,

                     'threebed_oneroom_cost'   =>   $threebed_oneroom_cost, 
                     'threebed_oneroom_cost_adult'   =>   $threebed_oneroom_cost_adult, 
                     'threebed_oneroom_count_90'   =>   $threebed_oneroom_count_90, 
                     'threebed_oneroom_count_60'=>$threebed_oneroom_count_60,
                     'threebed_oneroom_count_40'   =>   $threebed_oneroom_count_40, 
                     'threebed_oneroom_count_0'=>$threebed_oneroom_count_0,
                     'total_threebed_oneroom'=>$total_threebed_oneroom,

                     'total_threebed_oneroom'=>$total_threebed_oneroom,

                     'fourbed_oneroom_cost'   =>   $fourbed_oneroom_cost, 
                     'fourbed_oneroom_cost_adult'   =>   $fourbed_oneroom_cost_adult, 
                     'fourbed_oneroom_count_90'   =>   $fourbed_oneroom_count_90, 
                     'fourbed_oneroom_count_60'=>$fourbed_oneroom_count_60,
                     'fourbed_oneroom_count_40'   =>   $fourbed_oneroom_count_40, 
                     'fourbed_oneroom_count_0'=>$fourbed_oneroom_count_0,
                     'total_fourbed_oneroom'=>$total_fourbed_oneroom,

                     'total_fourbed_oneroom'=>$total_fourbed_oneroom,

                     'total_hotel_amount'   =>   $total_hotel_amount,
                     'total_travaller_count'   =>   $total_travaller_count,

                     'total_allocated_rooms' => $total_allocated_rooms,

                     'total_allocated_rooms_1' => $total_allocated_rooms_1,
                     'total_allocated_rooms_2' => $total_allocated_rooms_2,
                     'total_allocated_rooms_3' => $total_allocated_rooms_3,
                     'total_allocated_rooms_4' => $total_allocated_rooms_4,

                     'total_agewise_cal_adult' => $total_agewise_cal_adult,
                     'total_agewise_cal_90' => $total_agewise_cal_90,
                     'total_agewise_cal_60' => $total_agewise_cal_60,
                     'total_agewise_cal_40' => $total_agewise_cal_40,
                     'total_agewise_cal_0' => $total_agewise_cal_0,

                     'total_adult_90' => $total_adult_90

                 );
                 if(!empty($seat_type_room_type)){
                    $arr_where     = array("domestic_enquiry_id" => $iid);
                    // print_r($arr_where); die;
                     $inserted_id = $this->master_model->updateRecord('seat_type_room_type',$arr_insert,$arr_where);
                    } else{
                        // $inserted_id = $this->master_model->insertRecord('all_traveller_info',$arr_insert,true);
                        $inserted_id = $this->master_model->insertRecord('seat_type_room_type',$arr_insert,true);

                    }
                //  print_r($arr_insert); die;
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',"Booking Successfully Done. <br> Thank you for booking..");
                     redirect($this->module_url_path.'/add_bus/'.$iid);
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
        }
        
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['agent_data']        = $agent_data;
         $this->arr_view_data['agent_booking_enquiry_data']        = $agent_booking_enquiry_data;
         $this->arr_view_data['seat_type_room_type']        = $seat_type_room_type;
         $this->arr_view_data['arr_package_info']        = $arr_package_info;
         $this->arr_view_data['package_id']        = $package_id;
         $this->arr_view_data['agent_all_travaller_info']        = $agent_all_travaller_info;
         $this->arr_view_data['agent_department']        = $agent_department;
         $this->arr_view_data['booking_basic_info_data']        = $booking_basic_info_data;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_url_booking_process'] = $this->module_url_booking_process;
         $this->arr_view_data['module_all_traveller_info'] = $this->module_all_traveller_info;
         $this->arr_view_data['module_booking_enquiry'] = $this->module_booking_enquiry;
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
        $booking_basic_info_data = $this->master_model->getRecord('booking_basic_info');
        // print_r($booking_basic_info_data); die;

        $record = array();
        $fields = "bus_seat_selection.*,packages.id,packages.cost";
        $this->db->order_by('id','desc');
        $this->db->where('bus_seat_selection.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        // $this->db->join("packages", 'bus_seat_selection.id=packages.id','left');
        $agent_booking_enquiry_seat = $this->master_model->getRecords('bus_seat_selection');
        // print_r($agent_booking_enquiry_seat); die;

        $record = array();
        $fields = "agent.*,department.department,booking_enquiry.seat_count,booking_enquiry.id as enq_id";
        $this->db->where('agent.is_deleted','no');
        $this->db->where('agent.id',$id);
        $this->db->where('booking_enquiry.id',$iid);
        $this->db->join("department", 'agent.department=department.id','left');
        $this->db->join("booking_enquiry", 'agent.id=booking_enquiry.agent_id','left');
        $agent_department = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
        // print_r($agent_department); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('packages');
        // print_r($packages_data); die;   

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('domestic_enquiry_id',$iid);
        $seattype_roomtype = $this->master_model->getRecord('seat_type_room_type');
        // print_r($seattype_roomtype); die;

        $record = array();
        $fields = "all_traveller_info.*, package_date.cost";
        // $this->db->order_by('id','desc');
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $this->db->join("package_date", 'all_traveller_info.package_id= package_date.package_id','left');
        $arr_package_info = $this->master_model->getRecord('all_traveller_info');
        // print_r($arr_package_info); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $agent_all_travaller_info = $this->master_model->getRecord('all_traveller_info');
        // print_r($agent_booking_enquiry_data); die;

        $record = array();
        $fields = "booking_basic_info.*,packages.id,packages.tour_title,packages.tour_number,packages.tour_number,package_date.journey_date";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');
        $this->db->join("package_date", 'package_date.id=booking_basic_info.tour_date','left');
        $traveller_booking_info = $this->master_model->getRecords('booking_basic_info',array('booking_basic_info.is_deleted'=>'no'),$fields);
        // print_r($traveller_booking_info); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $seat_type_room_type = $this->master_model->getRecord('seat_type_room_type');
        // print_r($seat_type_room_type); die;

        //  if($this->input->post('submit'))
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
 
        //      $this->form_validation->set_rules('child_noo_seat_needed', 'total child no seat needed', 'required');
        //      $this->form_validation->set_rules('total_child_noo_seat_needed', 'total child no seat needed', 'required');
 
        //      $this->form_validation->set_rules('total_busseattype', 'total_busseattype', 'required');
        //      $this->form_validation->set_rules('total_seat', 'total_seat', 'required');
 
        //      $this->form_validation->set_rules('onebed_oneroom_cost_adult', 'onebed_oneroom_cost_adult', 'required');
        //      $this->form_validation->set_rules('onebed_oneroom_cost_90', 'onebed_oneroom_cost_90', 'required');
        //      $this->form_validation->set_rules('onebed_oneroom_count_60', 'onebed_oneroom_count_60', 'required');
        //      $this->form_validation->set_rules('onebed_oneroom_40', 'onebed_oneroom_40', 'required');
        //      $this->form_validation->set_rules('onebed_oneroom_0', 'onebed_oneroom_0', 'required');
 
        //      $this->form_validation->set_rules('total_onebed_oneroom', 'total_onebed_oneroom', 'required');
 
        //      $this->form_validation->set_rules('twobed_oneroom_cost_adult', 'twobed_oneroom_cost_adult', 'required');
        //      $this->form_validation->set_rules('twobed_oneroom_count_90', 'twobed_oneroom_count_90', 'required');
        //      $this->form_validation->set_rules('twobed_oneroom_count_60', 'twobed_oneroom_count_60', 'required');
        //      $this->form_validation->set_rules('twobed_oneroom_count_40', 'twobed_oneroom_count_40', 'required');
        //      $this->form_validation->set_rules('twobed_oneroom_count_0', 'twobed_oneroom_count_0', 'required');
 
        //      $this->form_validation->set_rules('total_twobed_oneroom', 'total_twobed_oneroom', 'required');
 
        //      $this->form_validation->set_rules('threebed_oneroom_cost_adult', 'threebed_oneroom_cost_adult', 'required');
        //      $this->form_validation->set_rules('threebed_oneroom_count_90', 'threebed_oneroom_count_90', 'required');
        //      $this->form_validation->set_rules('threebed_oneroom_count_60', 'threebed_oneroom_count_60', 'required');
        //      $this->form_validation->set_rules('threebed_oneroom_count_40', 'threebed_oneroom_count_40', 'required');
        //      $this->form_validation->set_rules('threebed_oneroom_count_0', 'threebed_oneroom_count_0', 'required');
 
        //      $this->form_validation->set_rules('total_threebed_oneroom', 'total_threebed_oneroom', 'required');
 
        //      $this->form_validation->set_rules('fourbed_oneroom_cost_adult', 'fourbed_oneroom_cost_adult', 'required');
        //      $this->form_validation->set_rules('fourbed_oneroom_count_90', 'fourbed_oneroom_count_90', 'required');
        //      $this->form_validation->set_rules('fourbed_oneroom_count_60', 'fourbed_oneroom_count_60', 'required');
        //      $this->form_validation->set_rules('fourbed_oneroom_count_40', 'fourbed_oneroom_count_40', 'required');
        //      $this->form_validation->set_rules('fourbed_oneroom_count_0', 'fourbed_oneroom_count_0', 'required');
 
        //      $this->form_validation->set_rules('total_fourbed_oneroom', 'total_fourbed_oneroom', 'required');
 
        //      $this->form_validation->set_rules('total_hotel_amount', 'total_hotel_amount', 'required');
             
        //      if($this->form_validation->run() == TRUE)
        //      { 
        //         //echo 'ppppppp';
        //         //die;
        //         $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');

        //         $package_id  = $this->input->post('package_id');

        //         $seat_count  = $this->input->post('seat_count');

        //         $seperate_seat  = $this->input->post('seperate_seat'); 
        //         $total_seperate_seat  = $this->input->post('total_seperate_seat');

        //         $child_seperate_seat  = $this->input->post('child_seperate_seat'); 
        //         $total_child_seperate_seat  = $this->input->post('total_child_seperate_seat'); 

        //         $two_child_share_one_seat  = $this->input->post('two_child_share_one_seat'); 
        //         $total_two_child_share_one_seat  = $this->input->post('total_two_child_share_one_seat'); 

        //         $child_no_seat_needed  = $this->input->post('child_no_seat_needed'); 
        //         $total_child_no_seat_needed  = $this->input->post('total_child_no_seat_needed'); 

        //         $child_noo_seat_needed  = $this->input->post('child_noo_seat_needed'); 
        //         $total_child_noo_seat_needed  = $this->input->post('total_child_noo_seat_needed');

        //         $total_busseattype  = $this->input->post('total_busseattype'); 
        //         $total_seat  = $this->input->post('total_seat'); 

        //         $onebed_oneroom_cost_adult  = $this->input->post('onebed_oneroom_cost_adult'); 
        //         $onebed_oneroom_cost_90  = $this->input->post('onebed_oneroom_cost_90'); 
        //         $onebed_oneroom_count_60  = $this->input->post('onebed_oneroom_count_60'); 
        //         $onebed_oneroom_40  = $this->input->post('onebed_oneroom_40'); 
        //         $onebed_oneroom_0  = $this->input->post('onebed_oneroom_0'); 

        //         $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

        //         $twobed_oneroom_cost_adult  = $this->input->post('twobed_oneroom_cost_adult'); 
        //         $twobed_oneroom_count_90  = $this->input->post('twobed_oneroom_count_90'); 
        //         $twobed_oneroom_count_60  = $this->input->post('twobed_oneroom_count_60'); 
        //         $twobed_oneroom_count_40  = $this->input->post('twobed_oneroom_count_40'); 
        //         $twobed_oneroom_count_0  = $this->input->post('twobed_oneroom_count_0'); 

        //         $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom');  

        //         $threebed_oneroom_cost_adult  = $this->input->post('threebed_oneroom_cost_adult'); 
        //         $threebed_oneroom_count_90  = $this->input->post('threebed_oneroom_count_90'); 
        //         $threebed_oneroom_count_60  = $this->input->post('threebed_oneroom_count_60'); 
        //         $threebed_oneroom_count_40  = $this->input->post('threebed_oneroom_count_40'); 
        //         $threebed_oneroom_count_0  = $this->input->post('threebed_oneroom_count_0'); 

        //         $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

        //         $fourbed_oneroom_cost_adult  = $this->input->post('fourbed_oneroom_cost_adult'); 
        //         $fourbed_oneroom_count_90  = $this->input->post('fourbed_oneroom_count_90'); 
        //         $fourbed_oneroom_count_60  = $this->input->post('fourbed_oneroom_count_60'); 
        //         $fourbed_oneroom_count_40  = $this->input->post('fourbed_oneroom_count_40'); 
        //         $fourbed_oneroom_count_0  = $this->input->post('fourbed_oneroom_count_0'); 

        //         $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

        //         $total_hotel_amount  = $this->input->post('total_hotel_amount'); 

        //         //  $today=date("Y-m-d");
        //         //  $packages  = $this->input->post('packages'); 

        //          $arr_insert = array(
        //              'domestic_enquiry_id' =>   $domestic_enquiry_id,

        //              'package_id' =>   $package_id,

        //              'seat_count' =>   $seat_count,

        //              'seperate_seat' =>   $seperate_seat,
        //              'total_seperate_seat' =>   $total_seperate_seat,

        //              'child_seperate_seat'   =>   $child_seperate_seat, 
        //              'total_child_seperate_seat'   =>   $total_child_seperate_seat, 

        //              'two_child_share_one_seat'   =>   $two_child_share_one_seat, 
        //              'total_two_child_share_one_seat'   =>   $total_two_child_share_one_seat, 

        //              'child_no_seat_needed'=>$child_no_seat_needed,
        //              'total_child_no_seat_needed'   =>   $total_child_no_seat_needed, 

        //              'child_noo_seat_needed'=>$child_noo_seat_needed,
        //              'total_child_noo_seat_needed'   =>   $total_child_noo_seat_needed,

        //              'total_busseattype'=>$total_busseattype,
        //              'total_seat'   =>   $total_seat, 

        //              'onebed_oneroom_cost_adult'   =>   $onebed_oneroom_cost_adult, 
        //              'onebed_oneroom_cost_90'   =>   $onebed_oneroom_cost_90, 
        //              'onebed_oneroom_count_60'=>$onebed_oneroom_count_60,
        //              'onebed_oneroom_40'   =>   $onebed_oneroom_40, 
        //              'onebed_oneroom_0'=>$onebed_oneroom_0,

        //              'total_onebed_oneroom'=>$total_onebed_oneroom,

        //              'twobed_oneroom_cost_adult'   =>   $twobed_oneroom_cost_adult, 
        //              'twobed_oneroom_count_90'   =>   $twobed_oneroom_count_90, 
        //              'twobed_oneroom_count_60'=>$twobed_oneroom_count_60,
        //              'twobed_oneroom_count_40'   =>   $twobed_oneroom_count_40, 
        //              'twobed_oneroom_count_0'=>$twobed_oneroom_count_0,

        //              'total_twobed_oneroom'=>$total_twobed_oneroom,

        //              'threebed_oneroom_cost_adult'   =>   $threebed_oneroom_cost_adult, 
        //              'threebed_oneroom_count_90'   =>   $threebed_oneroom_count_90, 
        //              'threebed_oneroom_count_60'=>$threebed_oneroom_count_60,
        //              'threebed_oneroom_count_40'   =>   $threebed_oneroom_count_40, 
        //              'threebed_oneroom_count_0'=>$threebed_oneroom_count_0,

        //              'total_threebed_oneroom'=>$total_threebed_oneroom,

        //              'fourbed_oneroom_cost_adult'   =>   $fourbed_oneroom_cost_adult, 
        //              'fourbed_oneroom_count_90'   =>   $fourbed_oneroom_count_90, 
        //              'fourbed_oneroom_count_60'=>$fourbed_oneroom_count_60,
        //              'fourbed_oneroom_count_40'   =>   $fourbed_oneroom_count_40, 
        //              'fourbed_oneroom_count_0'=>$fourbed_oneroom_count_0,

        //              'total_fourbed_oneroom'=>$total_fourbed_oneroom,

        //              'total_hotel_amount'   =>   $total_hotel_amount

        //          );
        //         //  print_r($arr_insert); die;
        //          $inserted_id = $this->master_model->insertRecord('seat_type_room_type',$arr_insert,true);
                               
        //          if($inserted_id > 0)
        //          {
        //              $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
        //              redirect($this->module_booking_enquiry.'/index');  
        //          }
 
        //          else
        //          {
        //              $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
        //          }
        //          redirect($this->module_url_path.'/index');
        //      }   
        // }


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
 
             $this->form_validation->set_rules('child_noo_seat_needed', 'total child no seat needed', 'required');
             $this->form_validation->set_rules('total_child_noo_seat_needed', 'total child no seat needed', 'required');
 
             $this->form_validation->set_rules('total_busseattype', 'total_busseattype', 'required');
             $this->form_validation->set_rules('total_seat', 'total_seat', 'required');
 
             $this->form_validation->set_rules('onebed_oneroom_cost_adult', 'onebed_oneroom_cost_adult', 'required');
             $this->form_validation->set_rules('onebed_oneroom_cost_90', 'onebed_oneroom_cost_90', 'required');
             $this->form_validation->set_rules('onebed_oneroom_count_60', 'onebed_oneroom_count_60', 'required');
             $this->form_validation->set_rules('onebed_oneroom_40', 'onebed_oneroom_40', 'required');
             $this->form_validation->set_rules('onebed_oneroom_0', 'onebed_oneroom_0', 'required');
 
             $this->form_validation->set_rules('total_onebed_oneroom', 'total_onebed_oneroom', 'required');
 
             $this->form_validation->set_rules('twobed_oneroom_cost_adult', 'twobed_oneroom_cost_adult', 'required');
             $this->form_validation->set_rules('twobed_oneroom_count_90', 'twobed_oneroom_count_90', 'required');
             $this->form_validation->set_rules('twobed_oneroom_count_60', 'twobed_oneroom_count_60', 'required');
             $this->form_validation->set_rules('twobed_oneroom_count_40', 'twobed_oneroom_count_40', 'required');
             $this->form_validation->set_rules('twobed_oneroom_count_0', 'twobed_oneroom_count_0', 'required');
 
             $this->form_validation->set_rules('total_twobed_oneroom', 'total_twobed_oneroom', 'required');
 
             $this->form_validation->set_rules('threebed_oneroom_cost_adult', 'threebed_oneroom_cost_adult', 'required');
             $this->form_validation->set_rules('threebed_oneroom_count_90', 'threebed_oneroom_count_90', 'required');
             $this->form_validation->set_rules('threebed_oneroom_count_60', 'threebed_oneroom_count_60', 'required');
             $this->form_validation->set_rules('threebed_oneroom_count_40', 'threebed_oneroom_count_40', 'required');
             $this->form_validation->set_rules('threebed_oneroom_count_0', 'threebed_oneroom_count_0', 'required');
 
             $this->form_validation->set_rules('total_threebed_oneroom', 'total_threebed_oneroom', 'required');
 
             $this->form_validation->set_rules('fourbed_oneroom_cost_adult', 'fourbed_oneroom_cost_adult', 'required');
             $this->form_validation->set_rules('fourbed_oneroom_count_90', 'fourbed_oneroom_count_90', 'required');
             $this->form_validation->set_rules('fourbed_oneroom_count_60', 'fourbed_oneroom_count_60', 'required');
             $this->form_validation->set_rules('fourbed_oneroom_count_40', 'fourbed_oneroom_count_40', 'required');
             $this->form_validation->set_rules('fourbed_oneroom_count_0', 'fourbed_oneroom_count_0', 'required');
 
             $this->form_validation->set_rules('total_fourbed_oneroom', 'total_fourbed_oneroom', 'required');
 
             $this->form_validation->set_rules('total_hotel_amount', 'total_hotel_amount', 'required');
             
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

                $child_noo_seat_needed  = $this->input->post('child_noo_seat_needed'); 
                $total_child_noo_seat_needed  = $this->input->post('total_child_noo_seat_needed');

                $total_busseattype  = $this->input->post('total_busseattype'); 
                $total_seat  = $this->input->post('total_seat'); 

                $onebed_oneroom_cost  = $this->input->post('onebed_oneroom_cost'); 
                $onebed_oneroom_cost_adult  = $this->input->post('onebed_oneroom_cost_adult'); 
                $onebed_oneroom_cost_90  = $this->input->post('onebed_oneroom_cost_90'); 
                $onebed_oneroom_count_60  = $this->input->post('onebed_oneroom_count_60'); 
                $onebed_oneroom_40  = $this->input->post('onebed_oneroom_40'); 
                $onebed_oneroom_0  = $this->input->post('onebed_oneroom_0'); 
                $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

                $total_onebed_oneroom  = $this->input->post('total_onebed_oneroom'); 

                $twobed_oneroom_cost  = $this->input->post('twobed_oneroom_cost'); 
                $twobed_oneroom_cost_adult  = $this->input->post('twobed_oneroom_cost_adult'); 
                $twobed_oneroom_cost_adult  = $this->input->post('twobed_oneroom_cost_adult'); 
                $twobed_oneroom_count_90  = $this->input->post('twobed_oneroom_count_90'); 
                $twobed_oneroom_count_60  = $this->input->post('twobed_oneroom_count_60'); 
                $twobed_oneroom_count_40  = $this->input->post('twobed_oneroom_count_40'); 
                $twobed_oneroom_count_0  = $this->input->post('twobed_oneroom_count_0'); 
                $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom'); 

                $total_twobed_oneroom  = $this->input->post('total_twobed_oneroom');  

                $threebed_oneroom_cost  = $this->input->post('threebed_oneroom_cost'); 
                $threebed_oneroom_cost_adult  = $this->input->post('threebed_oneroom_cost_adult'); 
                $threebed_oneroom_count_90  = $this->input->post('threebed_oneroom_count_90'); 
                $threebed_oneroom_count_60  = $this->input->post('threebed_oneroom_count_60'); 
                $threebed_oneroom_count_40  = $this->input->post('threebed_oneroom_count_40'); 
                $threebed_oneroom_count_0  = $this->input->post('threebed_oneroom_count_0');
                $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

                $total_threebed_oneroom  = $this->input->post('total_threebed_oneroom'); 

                $fourbed_oneroom_cost  = $this->input->post('fourbed_oneroom_cost'); 
                $fourbed_oneroom_cost_adult  = $this->input->post('fourbed_oneroom_cost_adult'); 
                $fourbed_oneroom_count_90  = $this->input->post('fourbed_oneroom_count_90'); 
                $fourbed_oneroom_count_60  = $this->input->post('fourbed_oneroom_count_60'); 
                $fourbed_oneroom_count_40  = $this->input->post('fourbed_oneroom_count_40'); 
                $fourbed_oneroom_count_0  = $this->input->post('fourbed_oneroom_count_0'); 
                $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

                $total_fourbed_oneroom  = $this->input->post('total_fourbed_oneroom'); 

                $total_hotel_amount  = $this->input->post('total_hotel_amount'); 
                $total_travaller_count  = $this->input->post('total_travaller_count'); 

                $total_allocated_rooms_1  = $this->input->post('total_allocated_rooms_1'); 
                $total_allocated_rooms_2  = $this->input->post('total_allocated_rooms_2'); 
                $total_allocated_rooms_3  = $this->input->post('total_allocated_rooms_3'); 
                $total_allocated_rooms_4  = $this->input->post('total_allocated_rooms_4'); 

                $total_agewise_cal_adult  = $this->input->post('total_agewise_cal_adult'); 
                $total_agewise_cal_90  = $this->input->post('total_agewise_cal_90'); 
                $total_agewise_cal_60  = $this->input->post('total_agewise_cal_60'); 
                $total_agewise_cal_40  = $this->input->post('total_agewise_cal_40'); 
                $total_agewise_cal_0  = $this->input->post('total_agewise_cal_0'); 

                $total_adult_90  = $this->input->post('total_adult_90');


                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_update = array(
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

                     'child_noo_seat_needed'=>$child_noo_seat_needed,
                     'total_child_noo_seat_needed'   =>   $total_child_noo_seat_needed,

                     'total_busseattype'=>$total_busseattype,
                     'total_seat'   =>   $total_seat, 

                     'onebed_oneroom_cost'   =>   $onebed_oneroom_cost, 
                     'onebed_oneroom_cost_adult'   =>   $onebed_oneroom_cost_adult, 
                     'onebed_oneroom_cost_90'   =>   $onebed_oneroom_cost_90, 
                     'onebed_oneroom_count_60'=>$onebed_oneroom_count_60,
                     'onebed_oneroom_40'   =>   $onebed_oneroom_40, 
                     'onebed_oneroom_0'=>$onebed_oneroom_0,
                     'total_onebed_oneroom'=>$total_onebed_oneroom,

                     'total_onebed_oneroom'=>$total_onebed_oneroom,

                     'twobed_oneroom_cost'   =>   $twobed_oneroom_cost, 
                     'twobed_oneroom_cost_adult'   =>   $twobed_oneroom_cost_adult, 
                     'twobed_oneroom_count_90'   =>   $twobed_oneroom_count_90, 
                     'twobed_oneroom_count_60'=>$twobed_oneroom_count_60,
                     'twobed_oneroom_count_40'   =>   $twobed_oneroom_count_40, 
                     'twobed_oneroom_count_0'=>$twobed_oneroom_count_0,
                     'total_twobed_oneroom'=>$total_twobed_oneroom,

                     'total_twobed_oneroom'=>$total_twobed_oneroom,

                     'threebed_oneroom_cost'   =>   $threebed_oneroom_cost, 
                     'threebed_oneroom_cost_adult'   =>   $threebed_oneroom_cost_adult, 
                     'threebed_oneroom_count_90'   =>   $threebed_oneroom_count_90, 
                     'threebed_oneroom_count_60'=>$threebed_oneroom_count_60,
                     'threebed_oneroom_count_40'   =>   $threebed_oneroom_count_40, 
                     'threebed_oneroom_count_0'=>$threebed_oneroom_count_0,
                     'total_threebed_oneroom'=>$total_threebed_oneroom,

                     'total_threebed_oneroom'=>$total_threebed_oneroom,

                     'fourbed_oneroom_cost'   =>   $fourbed_oneroom_cost, 
                     'fourbed_oneroom_cost_adult'   =>   $fourbed_oneroom_cost_adult, 
                     'fourbed_oneroom_count_90'   =>   $fourbed_oneroom_count_90, 
                     'fourbed_oneroom_count_60'=>$fourbed_oneroom_count_60,
                     'fourbed_oneroom_count_40'   =>   $fourbed_oneroom_count_40, 
                     'fourbed_oneroom_count_0'=>$fourbed_oneroom_count_0,
                     'total_fourbed_oneroom'=>$total_fourbed_oneroom,

                     'total_fourbed_oneroom'=>$total_fourbed_oneroom,

                     'total_hotel_amount'   =>   $total_hotel_amount,
                     'total_travaller_count'   =>   $total_travaller_count,

                     'total_allocated_rooms_1' => $total_allocated_rooms_1,
                     'total_allocated_rooms_2' => $total_allocated_rooms_2,
                     'total_allocated_rooms_3' => $total_allocated_rooms_3,
                     'total_allocated_rooms_4' => $total_allocated_rooms_4,

                     'total_agewise_cal_adult' => $total_agewise_cal_adult,
                     'total_agewise_cal_90' => $total_agewise_cal_90,
                     'total_agewise_cal_60' => $total_agewise_cal_60,
                     'total_agewise_cal_40' => $total_agewise_cal_40,
                     'total_agewise_cal_0' => $total_agewise_cal_0,

                     'total_adult_90' => $total_adult_90
                 );

                 if(!empty($seattype_roomtype)){
                    $arr_where     = array("domestic_enquiry_id" => $iid);
                     $inserted_id = $this->master_model->updateRecord('seat_type_room_type',$arr_update,$arr_where);
                    }else{
                        $inserted_id = $this->master_model->insertRecord('seat_type_room_type',$arr_update,true);
                    }
                //  print_r($arr_insert); die;
                //  $arr_where     = array("domestic_enquiry_id" => $iid);
                //  $inserted_id = $this->master_model->updateRecord('seat_type_room_type',$arr_update,$arr_where);
                //  print_r($arr_insert); die;
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',"Booking Successfully Done. <br> Thank you for booking..");
                     redirect($this->module_url_path.'/add_bus/'.$iid);
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
         $this->arr_view_data['booking_basic_info_data']        = $booking_basic_info_data;
         $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
         $this->arr_view_data['agent_all_travaller_info']        = $agent_all_travaller_info;
         $this->arr_view_data['arr_package_info']        = $arr_package_info;
         $this->arr_view_data['seattype_roomtype']        = $seattype_roomtype;
         $this->arr_view_data['seat_type_room_type']        = $seat_type_room_type;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['page_title']      = " Edit ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_url_booking_process'] = $this->module_url_booking_process;
         $this->arr_view_data['module_booking_enquiry'] = $this->module_booking_enquiry;
         $this->arr_view_data['module_all_traveller_info'] = $this->module_all_traveller_info;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
     }



     public function add_bus($iid)

     {  

         $agent_sess_name = $this->session->userdata('agent_name');

         $id=$this->session->userdata('agent_sess_id');

        //  echo $iid;

        $this->db->order_by('id','desc');

        $this->db->where('is_deleted','no');

        $this->db->where('domestic_enquiry_id',$iid);

        $agent_all_travaller_info = $this->master_model->getRecord('all_traveller_info');



        $pack_main_id=$agent_all_travaller_info['package_id'];



        $fields = "bus_open.*,vehicle_seat_preference.total_seat_count,first_cls_seats,second_cls_seats,third_cls_seats,first_class_price,second_class_price,

                   third_class_price,window_class_price,vehicle_details.id,vehicle_seat_preference.vehicle_id,booking_basic_info.tour_no,booking_basic_info.domestic_enquiry_id,

                   booking_basic_info.tour_date";

        $this->db->where('booking_basic_info.domestic_enquiry_id',$iid);

        $this->db->join("vehicle_details", 'vehicle_details.id=bus_open.vehicle_rto_registration','left');

        $this->db->join("vehicle_seat_preference", 'vehicle_seat_preference.vehicle_id=bus_open.vehicle_rto_registration','left');

        $this->db->join("bus_seat_book", 'vehicle_seat_preference.vehicle_id=bus_open.vehicle_rto_registration','left');

        $this->db->join("booking_basic_info", 'booking_basic_info.tour_no=bus_open.package_id AND booking_basic_info.tour_date=bus_open.package_date_id','left');

        $this->db->group_by('booking_basic_info.domestic_enquiry_id');

        $bus_info = $this->master_model->getRecord('bus_open',array('bus_open.is_deleted'=>'no'),$fields);

       



        $pack_id=$bus_info['package_id'];

        $pack_date_id=$bus_info['tour_date'];



        $fields = "bus_seat_book.seat_orignal_id";

        $this->db->where('bus_seat_book.package_id',$pack_id);

        $this->db->where('bus_seat_book.is_book','yes');

        $this->db->where('bus_seat_book.tour_dates',$pack_date_id);

        $booked_seats_data = $this->master_model->getRecords('bus_seat_book','',$fields);

        $final_booked_data=array();

        foreach($booked_seats_data as $booked_data){

            array_push($final_booked_data, $booked_data['seat_orignal_id']);

        }



        $fields = "bus_seat_book.seat_orignal_id";

        $this->db->where('bus_seat_book.package_id',$pack_id);

        $this->db->where('bus_seat_book.enquiry_id',$iid);

        $this->db->where('bus_seat_book.agent_id',$id);

        $this->db->where('bus_seat_book.is_book','no');

        $this->db->where('bus_seat_book.tour_dates',$pack_date_id);

        $temp_booked_seats_data = $this->master_model->getRecords('bus_seat_book','',$fields);

        $temp_booking_data=array();

        foreach($temp_booked_seats_data as $temp_booked_data){

            array_push($temp_booking_data, $temp_booked_data['seat_orignal_id']);

        }



        // print_r($temp_booking_data);

        // die;



        $fields = "bus_seat_book.*";

        $this->db->where('bus_seat_book.package_id',$pack_id);

        $this->db->where('bus_seat_book.agent_id',$id);

        $this->db->where('bus_seat_book.is_book','no');

        $this->db->where('bus_seat_book.tour_dates',$pack_date_id);

        $cart_temp_booked_seats_data = $this->master_model->getRecords('bus_seat_book','',$fields);

        $cart_temp_booking_data=array();

        foreach($cart_temp_booked_seats_data as $cart_temp_booked_data){

            array_push($cart_temp_booking_data, $cart_temp_booked_data['seat_orignal_id']);

        }



        $fields = "bus_seat_book.seat_orignal_id";

        $this->db->where('bus_seat_book.package_id',$pack_id);

        $this->db->where('bus_seat_book.agent_id !=',$id);

        $this->db->where('bus_seat_book.is_book','no');

        $this->db->where('bus_seat_book.is_hold','yes');

        $this->db->where('bus_seat_book.tour_dates',$pack_date_id);

        $temp_hold_seats_data = $this->master_model->getRecords('bus_seat_book','',$fields);

        $temp_hold_data=array();

        foreach($temp_hold_seats_data as $seat_temp_hold_data){

            array_push($temp_hold_data, $seat_temp_hold_data['seat_orignal_id']);

        }

        // print_r($temp_hold_data);

        // die;

     

     

        $record = array();

        $fields = "booking_basic_info.*,packages.id,packages.tour_title,packages.tour_number,packages.tour_number,package_date.journey_date";

        $this->db->where('booking_basic_info.is_deleted','no');

        // $this->db->where('booking_basic_info.is_book','no');

        $this->db->where('domestic_enquiry_id',$iid);

        $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');

        $this->db->join("package_date", 'package_date.id=booking_basic_info.tour_date','left');

        $traveller_booking_info = $this->master_model->getRecords('booking_basic_info',array('booking_basic_info.is_deleted'=>'no'),$fields);





        if($this->input->post('booknow_submit'))

        {

        }

       

         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;

         $this->arr_view_data['bus_info'] = $bus_info;

         $this->arr_view_data['traveller_booking_info'] = $traveller_booking_info;

         $this->arr_view_data['temp_booking_data'] = $temp_booking_data;

         $this->arr_view_data['cart_temp_booking_data'] = $cart_temp_booking_data;

         $this->arr_view_data['temp_hold_data'] = $temp_hold_data;

         $this->arr_view_data['final_booked_data'] = $final_booked_data;

         $this->arr_view_data['action']          = 'add';

         $this->arr_view_data['page_title']      = " Add ".$this->module_title;

         $this->arr_view_data['agent_all_travaller_info']        = $agent_all_travaller_info;

         $this->arr_view_data['module_title']    = $this->module_title;

         $this->arr_view_data['module_url_path'] = $this->module_url_path;

         $this->arr_view_data['module_url_booking_process'] = $this->module_url_booking_process;

         $this->arr_view_data['middle_content']  = $this->module_view_folder."bus_add";

         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);

     }





     public function get_bus()

     {

        $bid=$this->input->post('');

        $this->db->where('is_deleted','no');

        $this->db->where('id','1');

        $bus_info = $this->master_model->getRecord('bus_master');

        print_r($bus_info); die;

        echo json_encode($bus_info);



     }





     public function selected_bus_seat()

     {  

        $agent_sess_name = $this->session->userdata('agent_name');

        $id=$this->session->userdata('agent_sess_id');



        $package_id_data  = $this->input->post('package_id');



        if($package_id_data!='')

        {

                $package_id  = $this->input->post('package_id');

                $enq_id  = $this->input->post('enq_id');

                $selected_seat  = $this->input->post('selected_seat');

                $seat_type  = $this->input->post('seat_type');

                $seat_price  = $this->input->post('seat_price');

                $tour_dates  = $this->input->post('tour_dates');

                $seat_orignal_id  = $this->input->post('seat_orignal_id');



                $fields = "bus_seat_book.seat_orignal_id";

        $this->db->where('bus_seat_book.package_id',$package_id);

        $this->db->where('bus_seat_book.is_book','no');

        $this->db->where('bus_seat_book.tour_dates',$tour_dates);

        $prev_selected_seat_data = $this->master_model->getRecords('bus_seat_book','',$fields);

        $prev_selected_seat_final_array=array();

        foreach($prev_selected_seat_data as $prev_selected_seats){

            array_push($prev_selected_seat_final_array, $prev_selected_seats['seat_orignal_id']);

        }



            $count = count($selected_seat);

            if(!empty($prev_selected_seat_final_array)){

                     

                $arr_where     = array("enquiry_id" => $enq_id);

             $this->master_model->deleteRecord('bus_seat_book',$arr_where);

         }

                 for($i=0;$i<$count;$i++)

                 {

                     $arr_insert = array(

                        'package_id' =>    $package_id,

                        'enquiry_id'     =>    $enq_id,

                        'tour_dates'     =>    $tour_dates,

                        'seat_id'    =>    $selected_seat[$i],

                        'seat_type'    =>    $seat_type[$i],  

                        'seat_price'    =>    $seat_price[$i],  

                        'seat_orignal_id'    =>    $seat_orignal_id[$i],  

                        'is_book'    =>  'no',

                        'booking_reference_no'=>''

                     );

                     $result = $this->master_model->insertRecord('bus_seat_book',$arr_insert);  

                 }    

                echo json_encode($result);

        }

   

     }





     public function seat_hold()

     {  

        $agent_sess_name = $this->session->userdata('agent_name');

        $id=$this->session->userdata('agent_sess_id');



        $package_id_data  = $this->input->post('package_id');

        // print_r($_REQUEST);

        // die;



        if($package_id_data!='')

        {

                $package_id  = $this->input->post('package_id');

                $enq_id  = $this->input->post('enq_id');

                $selected_seat  = $this->input->post('selected_seat');

                $seat_type  = $this->input->post('seat_type');

                $seat_price  = $this->input->post('seat_price');

                $tour_dates  = $this->input->post('tour_dates');

                $seat_orignal_id  = $this->input->post('seat_orignal_id');

                $btn_class  = $this->input->post('btn_class');



                $fields = "bus_seat_book.seat_orignal_id";

                $this->db->where('bus_seat_book.package_id',$package_id);

                $this->db->where('bus_seat_book.agent_id',$id);

                $this->db->where('bus_seat_book.is_book','no');

                $this->db->where('bus_seat_book.is_hold','yes');

                $this->db->where('bus_seat_book.tour_dates',$tour_dates);

                $temp_hold = $this->master_model->getRecords('bus_seat_book','',$fields);



                if(in_array("available", $btn_class)){

                    $arr_where     = array("enquiry_id" => $enq_id,'package_id'=>$package_id,'tour_dates'=>$tour_dates,

                    'seat_orignal_id'=>$seat_orignal_id);

                    $this->master_model->deleteRecord('bus_seat_book',$arr_where);

                }else{



                     $arr_insert = array(

                        'package_id' =>    $package_id,

                        'enquiry_id'     =>    $enq_id,

                        'tour_dates'     =>    $tour_dates,

                        'seat_id'    =>    $selected_seat,

                        'seat_type'    =>    $seat_type,  

                        'seat_price'    =>    $seat_price,  

                        'seat_orignal_id'    =>    $seat_orignal_id,  

                        'agent_id' => $id,

                        'is_hold'=>'yes',

                        'is_book'    =>  'no',

                        'booking_reference_no'=>''

                     );

                     $result = $this->master_model->insertRecord('bus_seat_book',$arr_insert);  

                    echo json_encode($result);

               }

        }

   

     }



     public function fetch_new_hold()

     {  

        $agent_sess_name = $this->session->userdata('agent_name');

        $id=$this->session->userdata('agent_sess_id');



        $package_id  = $this->input->post('package_id');

        // print_r($_REQUEST);

        // die;

        $temp_hold_data=array();

        if($package_id!='')

        {

                // $package_id  = $this->input->post('package_id');

                // $enq_id  = $this->input->post('enq_id');

                $tour_dates  = $this->input->post('tour_dates');



                $fields = "bus_seat_book.seat_orignal_id";

                $this->db->where('bus_seat_book.package_id',$package_id);

                $this->db->where('bus_seat_book.agent_id !=',$id);

                $this->db->where('bus_seat_book.is_book','no');

                $this->db->where('bus_seat_book.is_hold','yes');

                $this->db->where('bus_seat_book.tour_dates',$tour_dates);

                $temp_hold_seats_data = $this->master_model->getRecords('bus_seat_book','',$fields);

               

                foreach($temp_hold_seats_data as $seat_temp_hold_data){

                    array_push($temp_hold_data, $seat_temp_hold_data['seat_orignal_id']);

                }

                // print_r($temp_hold_data); die;

                echo json_encode($temp_hold_data);

        }

   

     }



     public function fetch_new_bus_data()

     {  

        $agent_sess_name = $this->session->userdata('agent_name');

        $id=$this->session->userdata('agent_sess_id');



        $package_id  = $this->input->post('package_id');

        // $temp_hold_data=array();

        if($package_id!='')

        {

                // $package_id  = $this->input->post('package_id');

                $enq_id  = $this->input->post('enq_id');

                $tour_dates  = $this->input->post('tour_dates');



                $fields = "bus_open.*,vehicle_seat_preference.total_seat_count,first_cls_seats,second_cls_seats,third_cls_seats,first_class_price,second_class_price,

                   third_class_price,window_class_price,vehicle_details.id,vehicle_seat_preference.vehicle_id,booking_basic_info.tour_no,booking_basic_info.domestic_enquiry_id,

                   booking_basic_info.tour_date";

        $this->db->where('booking_basic_info.domestic_enquiry_id',$enq_id);

        $this->db->join("vehicle_details", 'vehicle_details.id=bus_open.vehicle_rto_registration','left');

        $this->db->join("vehicle_seat_preference", 'vehicle_seat_preference.vehicle_id=bus_open.vehicle_rto_registration','left');

        $this->db->join("bus_seat_book", 'vehicle_seat_preference.vehicle_id=bus_open.vehicle_rto_registration','left');

        $this->db->join("booking_basic_info", 'booking_basic_info.tour_no=bus_open.package_id AND booking_basic_info.tour_date=bus_open.package_date_id','left');

        $this->db->group_by('booking_basic_info.domestic_enquiry_id');

        $bus_info = $this->master_model->getRecord('bus_open',array('bus_open.is_deleted'=>'no'),$fields);

               

                // foreach($temp_hold_seats_data as $seat_temp_hold_data){

                //     array_push($temp_hold_data, $seat_temp_hold_data['seat_orignal_id']);

                // }

                // print_r($bus_info); die;

                echo json_encode($bus_info);

        }

   

     }
     

} 
