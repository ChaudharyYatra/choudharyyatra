<?php 
//   Controller for: home page
// Author: Rupali / Vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_confirm_page extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/booking_confirm_page";
        $this->module_url_booking_process    =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process";
        $this->module_url_path_back    =  base_url().$this->config->item('agent_panel_slug')."/seat_type_room_type";
        $this->module_url_path_index   =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process/index";
        $this->module_url_path_payment_receipt   =  base_url().$this->config->item('agent_panel_slug')."/payment_receipt";
        $this->module_final_booking   =  base_url().$this->config->item('agent_panel_slug')."/final_booking_details";
        $this->module_booking_payment_details   =  base_url().$this->config->item('agent_panel_slug')."/booking_payment_details";
        $this->module_title       = "Booking Confirmation";
        $this->module_view_folder = "booking_confirm_page/";
        $this->arr_view_data = [];
	 }

    public function index($iid)
    {
        // echo $iid;

        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $record = array();
        $fields = "booking_basic_info.*,packages.id as pid,packages.tour_title,packages.tour_number,packages.tour_number,package_date.journey_date,package_hotel.package_id,package_hotel.hotel_name_id";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');
        $this->db->join("package_date", 'package_date.id=booking_basic_info.tour_date','left');
        $this->db->join("package_hotel", 'package_hotel.package_id=packages.id','left');
        $traveller_booking_info = $this->master_model->getRecords('booking_basic_info',array('booking_basic_info.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "all_traveller_info.*,relation.relation";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$iid);
        $this->db->join("relation", 'relation.id=all_traveller_info.all_traveller_relation','left');
        $arr_data = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $record = array();
        $fields = "special_req_master.*";
        $this->db->where('special_req_master.is_deleted','no');
        $this->db->where('special_req_master.is_active','yes');
        $special_req_master_data = $this->master_model->getRecords('special_req_master',array('special_req_master.is_deleted'=>'no'),$fields);
        // print_r($special_req_master_data); die;


        $record = array();
        $fields = "all_traveller_info.*";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$iid);
        $this->db->where('all_traveller_info.for_credentials','yes');
        $traveller_id_data = $this->master_model->getRecord('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);
        // print_r($traveller_id_data); die;
        
        $record = array();
        $fields = "seat_type_room_type.*";
        $this->db->where('seat_type_room_type.is_deleted','no');
        $this->db->where('seat_type_room_type.domestic_enquiry_id',$iid);
        $seat_type_room_type_data = $this->master_model->getRecords('seat_type_room_type',array('seat_type_room_type.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "all_traveller_info.*, package_date.cost";
        // $this->db->order_by('id','desc');
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$iid);
        $this->db->join("package_date", 'all_traveller_info.package_id= package_date.package_id','left');
        $arr_package_info = $this->master_model->getRecord('all_traveller_info');

        $record = array();
        $fields = "bus_seat_book.*";
        $this->db->where('bus_seat_book.is_deleted','no');
        $this->db->where('bus_seat_book.enquiry_id',$iid);
        $bus_seat_book_data = $this->master_model->getRecords('bus_seat_book',array('bus_seat_book.is_deleted'=>'no'),$fields);
        // print_r($bus_seat_book_data); die; 


        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $upi_qr_data = $this->master_model->getRecords('qr_code_master');
        // print_r($upi_qr_data); die;


        // $fields = "booking_payment_details.*,booking_payment_details.id as book_pay_details_id,return_customer_booking_payment_details.*,return_customer_booking_payment_details.id as return_custom_details_id,extra_services_details.*,extra_services_details.id as extra_services_details_id";
        // $this->db->where('booking_payment_details.is_deleted','no');
        // $this->db->where('booking_payment_details.enquiry_id',$iid);
        // $this->db->join("return_customer_booking_payment_details", 'booking_payment_details.id=return_customer_booking_payment_details.booking_payment_details_id','left');
        // $this->db->join("extra_services_details", 'booking_payment_details.enquiry_id=extra_services_details.enquiry_id','left');
        // $booking_preview_fetch_data = $this->master_model->getRecords('booking_payment_details',array('booking_payment_details.is_deleted'=>'no'),$fields);
        // // print_r($booking_preview_fetch_data); die;
        
        $this->db->where('is_deleted','no');
        $this->db->where('extra_services_details.enquiry_id',$iid);
        // $this->db->group_by('extra_services');
        $extra_services = $this->master_model->getRecord('extra_services_details');
        // print_r($extra_services); die;

        $fields = "extra_services_details.*,special_req_master.id as special_req_id,special_req_master.service_name";
        $this->db->where('extra_services_details.is_deleted','no');
        $this->db->where('extra_services_details.enquiry_id',$iid);
        // $this->db->group_by('extra_services');
        $this->db->join("special_req_master", 'extra_services_details.select_services= special_req_master.id','left');
        $extra_services_details = $this->master_model->getRecords('extra_services_details',array('extra_services_details.is_deleted'=>'no'),$fields);
        // print_r($extra_services_details); die;

        $extra=array();
        foreach($extra_services_details as $special_req_master_data_value) 
        { 
            array_push($extra,$special_req_master_data_value);
            // print_r($extra);
        }
            // print_r($extra);

        $this->db->where('is_deleted','no');
        $this->db->where('booking_payment_details.enquiry_id',$iid);
        $booking_payment_details = $this->master_model->getRecord('booking_payment_details');
        // print_r($booking_payment_details); die;

        $enquiry = isset($booking_payment_details['enquiry_id']);
        // print_r($enquiry); die;

        $this->db->where('is_deleted','no');
        $this->db->where('return_customer_booking_payment_details.enquiry_id',$iid);
        $return_customer_booking_payment_details = $this->master_model->getRecord('return_customer_booking_payment_details');
        // print_r($return_customer_booking_payment_details); die;

        $fields = "booking_payment_details.*,qr_code_master.qr_code_image";
        $this->db->where('booking_payment_details.is_deleted','no');
        // $this->db->where('booking_payment_details.QR_holder_name',$iid);
        $this->db->join("qr_code_master", 'booking_payment_details.QR_holder_name=qr_code_master.id','left');
        $qr_image_details = $this->master_model->getRecord('booking_payment_details');
        // print_r($qr_image_details); die;   

        $this->db->where('is_deleted','no');
        $this->db->where('booking_payment_details.enquiry_id',$iid);
        $mob_no_booking_payment = $this->master_model->getRecord('booking_payment_details');
        // print_r($mob_no_booking_payment); die;


        $this->db->where('is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');
        // print_r($agent_booking_enquiry_data); die;

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['mob_no_booking_payment']        = $mob_no_booking_payment;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['mob_no_booking_payment'] = $mob_no_booking_payment;
        $this->arr_view_data['enquiry']        = $enquiry;
        $this->arr_view_data['agent_booking_enquiry_data']        = $agent_booking_enquiry_data;
        $this->arr_view_data['qr_image_details']        = $qr_image_details;
        $this->arr_view_data['return_customer_booking_payment_details']        = $return_customer_booking_payment_details;
        $this->arr_view_data['booking_payment_details']        = $booking_payment_details;
        $this->arr_view_data['extra_services_details']        = $extra_services_details;
        $this->arr_view_data['extra']        = $extra;
        $this->arr_view_data['extra_services']        = $extra_services;
        $this->arr_view_data['upi_qr_data']        = $upi_qr_data;
        $this->arr_view_data['special_req_master_data']        = $special_req_master_data;
        $this->arr_view_data['traveller_id_data']        = $traveller_id_data;
        $this->arr_view_data['seat_type_room_type_data']        = $seat_type_room_type_data;
        $this->arr_view_data['bus_seat_book_data']        = $bus_seat_book_data;
        $this->arr_view_data['arr_package_info']        = $arr_package_info;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_booking_payment_details'] = $this->module_booking_payment_details;
        $this->arr_view_data['module_url_path_back'] = $this->module_url_path_back;
        $this->arr_view_data['module_final_booking'] = $this->module_final_booking;
        $this->arr_view_data['module_url_booking_process'] = $this->module_url_booking_process;
        $this->arr_view_data['module_url_path_payment_receipt'] = $this->module_url_path_payment_receipt;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);

    }

    public function reason_submit_proceed()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $record = array();
        $fields = "booking_basic_info.*,packages.id as pid,packages.tour_title,packages.tour_number,packages.tour_number,package_date.journey_date,package_hotel.package_id,package_hotel.hotel_name_id";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');
        $this->db->join("package_date", 'package_date.id=booking_basic_info.tour_date','left');
        $this->db->join("package_hotel", 'package_hotel.package_id=packages.id','left');
        $traveller_booking_info = $this->master_model->getRecords('booking_basic_info',array('booking_basic_info.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "all_traveller_info.*,relation.relation";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$iid);
        $this->db->join("relation", 'relation.id=all_traveller_info.all_traveller_relation','left');
        $arr_data = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;


            $booking_amt = $this->input->post('booking_amt');
            // $final_amt = $this->input->post('final_amt');
            $later_payment_reason = $this->input->post('later_payment_reason');
            // $payment_type = $this->input->post('payment_type');
            // $mobile_no = $this->input->post('mobile_no');
            // $pending_amt = $this->input->post('pending_amt');
            $payment_now_later = $this->input->post('payment_now_later');
            $enquiry_id = $this->input->post('enquiry_id');
            $traveller_id = $this->input->post('traveller_id');
            $package_id = $this->input->post('package_id');
            // $journey_date = $this->input->post('journey_date');
            $package_date_id = $this->input->post('package_date_id');
            // $booking_payment_details_id = $this->input->post('booking_payment_details_id');
            // $return_customer_booking_payment_id = $this->input->post('return_customer_booking_payment_id');
            $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

            
            
                // $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

                
                    $arr_insert = array(
                        'booking_reference_no'  =>  $booking_reference_no,
                        // 'final_amt'   =>   $final_amt,
                        // 'pending_amt'   =>   $pending_amt,
                        // 'run_pending_amt'   =>   $pending_amt,
                        'payment_now_later'   =>   'Later',
                        // 'booking_tm_mobile_no'   =>   $mobile_no,
                        'package_date_id' => $package_date_id,
                        'enquiry_id' => $enquiry_id,
                        'package_id' => $package_id,
                        'traveller_id' => $traveller_id,
                        'payment_reason' => $later_payment_reason,
                        'payment_confirmed_status'   =>  'Payment Not Paid'
                    );
                    // print_r($arr_insert); die;
    
                    $this->db->where('is_deleted','no');
                    $this->db->where('booking_payment_details.enquiry_id',$enquiry_id);
                    $booking_payment_details = $this->master_model->getRecord('booking_payment_details');
                    // print_r($booking_payment_details); die;
                    
                    // print_r($arr_insert); die;
                    if(!empty($booking_payment_details)){
                        $arr_where     = array("id" => $booking_payment_details_id);
                        $inserted_id = $this->master_model->updateRecord('booking_payment_details',$arr_insert,$arr_where);
                    }else{
                     $inserted_id = $this->master_model->insertRecord('booking_payment_details',$arr_insert,true);
                     $insertid = $this->db->insert_id();
                    }
                

                $arr_insert = array(
                    'payment_confirmed_status'   =>  'Payment Not Paid'
                );
                $record = array();
                $fields = "final_booking.*";
                $this->db->where('is_deleted','no');
                $this->db->where('enquiry_id',$enquiry_id);
                $final_booking_details = $this->master_model->getRecord('final_booking');

                if(!empty($final_booking_details)){
                    $arr_where     = array("enquiry_id" => $enquiry_id);
                    $inserted_id = $this->master_model->updateRecord('final_booking',$arr_insert,$arr_where);
                }else{
                 $inserted_id = $this->master_model->insertRecord('booking_payment_details',$arr_insert,true);
                 $insertid = $this->db->insert_id();
                }

        if($inserted_id!=''){
           echo true;

       }else {
           echo false;
       }

       $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
       $this->arr_view_data['arr_data']        = $arr_data;

    }
    
}