<?php 
//   Controller for: home page
// Author: Rupali / Vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Sra_partial_payment_details extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/sra_partial_payment_details";
        $this->module_url_booking_process    =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process";
        $this->module_url_path_back    =  base_url().$this->config->item('agent_panel_slug')."/seat_type_room_type";
        $this->module_url_path_index   =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process/index";
        $this->module_url_path_payment_receipt   =  base_url().$this->config->item('agent_panel_slug')."/payment_receipt";
        $this->module_url_pending_payment   =  base_url().$this->config->item('agent_panel_slug')."/pending_booking_details";
        $this->module_url_final_booking_details   =  base_url().$this->config->item('agent_panel_slug')."/final_booking_details";
        $this->module_url_path_add_sra    =  base_url().$this->config->item('agent_panel_slug')."/add_sra_form";
        $this->module_title_extra_services       = "Extra Services ";
        $this->module_title       = "SRA Partial Payment Details";
        $this->module_view_folder = "sra_partial_payment_details/";
        $this->arr_view_data = [];
	 }

    public function index($iid)
    {
        // echo $iid;
        // die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $record = array();
        $fields = "sra_payment.*,package_date.journey_date,sra_payment.id as sra_payment_id";
        $this->db->where('sra_payment.is_deleted','no');
        $this->db->where('sra_payment.is_active','yes');
        $this->db->join("package_date", 'package_date.id=sra_payment.tour_date','left');
        // $this->db->group_start();
        $this->db->where('sra_payment.id', $iid);
        // $this->db->where('sra_payment.academic_year', $academic_year);
        // $this->db->group_end();
        // $traveller_booking_info_header = $this->master_model->getRecords('sra_payment','',$fields);
        $traveller_booking_info_header = $this->master_model->getRecords('sra_payment',array('sra_payment.is_deleted'=>'no'),$fields);

        $fields = "sra_payment.*,sra_booking_payment_details.run_pending_amt,sra_booking_payment_details.final_amt";
        $this->db->where('sra_booking_payment_details.is_deleted','no');
        $this->db->where('sra_payment.is_active','yes');
        $this->db->where('sra_booking_payment_details.sra_payment_id',$iid);
        $this->db->join("sra_payment", 'sra_booking_payment_details.sra_payment_id=sra_payment.id','left');
        $traveller_booking_info_amt = $this->master_model->getRecord('sra_booking_payment_details',array('sra_booking_payment_details.is_deleted'=>'no'),$fields);

        $fields = "sra_payment.*,sra_booking_payment_details.run_pending_amt";
        $this->db->where('sra_booking_payment_details.is_deleted','no');
        $this->db->where('sra_payment.is_active','yes');
        $this->db->where('sra_booking_payment_details.sra_payment_id',$iid);
        $this->db->join("sra_payment", 'sra_booking_payment_details.sra_payment_id=sra_payment.id','left');
        $traveller_booking_info = $this->master_model->getRecords('sra_booking_payment_details',array('sra_booking_payment_details.is_deleted'=>'no'),$fields);

        foreach($traveller_booking_info  as $traveller_booking_pdate){
            $p_id = $traveller_booking_pdate['tour_number'];
            $p_date_id = $traveller_booking_pdate['tour_date'];
        }

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


        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $upi_qr_data = $this->master_model->getRecords('qr_code_master');
        // // print_r($upi_qr_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $upi_qr__add_more_data = $this->master_model->getRecords('qr_code_add_more');
        // print_r($upi_qr__add_more_data); die;


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
        $this->db->where('sra_booking_payment_details.sra_payment_id',$iid);
        $booking_payment_details = $this->master_model->getRecord('sra_booking_payment_details');
        // print_r($booking_payment_details); die;

        $sra_no = isset($booking_payment_details['sra_no']);
        // $enquiry_id = $booking_payment_details['package_date_id'];
        // print_r($enquiry_id); die;

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
        $booking_payment_details_all = $this->master_model->getRecords('booking_payment_details');
        // print_r($booking_payment_details_all); die;

        $this->db->where('is_deleted','no');
        $relation_data = $this->master_model->getRecords('relation');
        // print_r($relation_data); die;


        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $this->db->where('qr_code_master.is_agent','No');
        // $upi_qr_data = $this->master_model->getRecords('qr_code_master');
        // print_r($upi_qr_data); die;

        $record = array();
        $fields = "qr_code_master.*,qr_code_add_more.nick_name";
        $this->db->where('qr_code_master.is_deleted','no');
        $this->db->where('qr_code_master.is_active','yes');
        $this->db->where('qr_code_master.is_agent','No');
        $this->db->join("qr_code_add_more", 'qr_code_add_more.qr_code_master_id=qr_code_master.id','left');
        $upi_qr_data = $this->master_model->getRecords('qr_code_master',array('qr_code_master.is_deleted'=>'no'),$fields);
        // print_r($upi_qr_data); die;

        foreach($upi_qr_data as $upi_qr_data_id) 
        { 
            $upi_qr_master_id = $upi_qr_data_id['agent_id'];
        }

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['p_id']        = $p_id;
        $this->arr_view_data['p_date_id']        = $p_date_id;
        $this->arr_view_data['traveller_booking_info_amt']        = $traveller_booking_info_amt;
        $this->arr_view_data['traveller_booking_info_header']        = $traveller_booking_info_header;
        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['relation_data']        = $relation_data;
        // $this->arr_view_data['enquiry']        = $enquiry;
        $this->arr_view_data['upi_qr_data']        = $upi_qr_data;
        $this->arr_view_data['upi_qr_master_id']        = $upi_qr_master_id; 
        $this->arr_view_data['sra_no']        = $sra_no;
        $this->arr_view_data['qr_image_details']        = $qr_image_details;
        $this->arr_view_data['booking_payment_details_all']        = $booking_payment_details_all;
        $this->arr_view_data['return_customer_booking_payment_details']        = $return_customer_booking_payment_details;
        $this->arr_view_data['booking_payment_details']        = $booking_payment_details;
        $this->arr_view_data['extra_services_details']        = $extra_services_details;
        $this->arr_view_data['extra']        = $extra;
        $this->arr_view_data['extra_services']        = $extra_services;
        $this->arr_view_data['upi_qr_data']        = $upi_qr_data;
        $this->arr_view_data['upi_qr__add_more_data']        = $upi_qr__add_more_data;
        $this->arr_view_data['special_req_master_data']        = $special_req_master_data;
        $this->arr_view_data['traveller_id_data']        = $traveller_id_data;
        $this->arr_view_data['seat_type_room_type_data']        = $seat_type_room_type_data;
        $this->arr_view_data['bus_seat_book_data']        = $bus_seat_book_data;
        $this->arr_view_data['arr_package_info']        = $arr_package_info;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_back'] = $this->module_url_path_back;
        $this->arr_view_data['module_url_pending_payment'] = $this->module_url_pending_payment;
        $this->arr_view_data['module_url_booking_process'] = $this->module_url_booking_process;
        $this->arr_view_data['module_url_path_payment_receipt'] = $this->module_url_path_payment_receipt;
        $this->arr_view_data['module_url_final_booking_details'] = $this->module_url_final_booking_details;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);

    }



    public function cust_otp()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $mobile_no = $this->input->post('mobile_no');
        $final_amt = $this->input->post('final_amt');
        $sra_no = $this->input->post('sra_no');
        $package_id = $this->input->post('package_id');
        $package_date_id = $this->input->post('package_date_id');
        $sra_payment_id = $this->input->post('sra_payment_id');
        $academic_year = $this->input->post('academic_year');
        $today = date('y-m-d');

            $alphabet = '1234567890';
            $otp = str_shuffle($alphabet);
            $traveler_otp = substr($otp, 0, '6'); 

            $from_email='test@choudharyyatra.co.in';
            
            $authKey = "1207168241267288907";
            
        $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
        $senderId  = "CYCPLN";
        
        $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$mobile_no&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
        
         $apiurl = str_replace(" ", '%20', $apiurl); 
            
            
            $ch = curl_init($apiurl);
                    $get_url = $apiurl;
                    curl_setopt($ch, CURLOPT_POST,0);
                    curl_setopt($ch, CURLOPT_URL, $get_url);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
                    curl_setopt($ch, CURLOPT_HEADER,0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $return_val = curl_exec($ch); 
               
            
                // $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

                $arr_insert = array(
                    'booking_tm_mobile_no'  =>  $mobile_no,
                    'sra_payment_id'  =>  $sra_payment_id,
                    'academic_year'  =>  $academic_year,
                    'sra_no'  =>  $sra_no,
                    'package_id'  =>  $package_id,
                    'package_date_id'  =>  $package_date_id,
                    'agent_id'  =>  $id,
                    'traveler_otp'  =>  $traveler_otp
                );
                // print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('sra_booking_payment_details',$arr_insert,true);
                 $insertid = $this->db->insert_id();


                 $arr_insert = array(
                    // 'booking_tm_mobile_no'  =>  $mobile_no,
                    'sra_payment_id'  =>  $sra_payment_id,
                    'sra_no'  =>  $sra_no,
                    'package_id'  =>  $package_id,
                    'package_date_id'  =>  $package_date_id,
                    'sra_booking_payment_details_id'  =>  $insertid,
                    'booking_date'   =>   $today,
                    'agent_id'  =>  $id
                );
                // print_r($arr_insert); die;

                $inserted_id = $this->master_model->insertRecord('sra_final_booking',$arr_insert,true);
                
                
        if($inserted_id!=''){
           echo $insertid;
       }else {
           echo false;
       }

    }


    public function reason_submit_proceed()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

            $booking_amt = $this->input->post('booking_amt');
            $final_amt = $this->input->post('final_amt');
            $later_payment_reason = $this->input->post('later_payment_reason');
            $payment_type = $this->input->post('payment_type');
            $mobile_no = $this->input->post('mobile_no');
            $pending_amt = $this->input->post('pending_amt');
            $payment_now_later = $this->input->post('payment_now_later');
            $enquiry_id = $this->input->post('enquiry_id');
            $traveller_id = $this->input->post('traveller_id');
            $package_id = $this->input->post('package_id');
            $journey_date = $this->input->post('journey_date');
            $package_date_id = $this->input->post('package_date_id');
            $booking_payment_details_id = $this->input->post('booking_payment_details_id');
            $return_customer_booking_payment_id = $this->input->post('return_customer_booking_payment_id');
            $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

            $alphabet = '1234567890';
            $otp = str_shuffle($alphabet);
            $traveler_otp = substr($otp, 0, '6'); 

            $from_email='test@choudharyyatra.co.in';
            
            $authKey = "1207168241267288907";
            
        $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
        $senderId  = "CYCPLN";
        
        $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$mobile_no&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
        
         $apiurl = str_replace(" ", '%20', $apiurl); 
            
            
            $ch = curl_init($apiurl);
                    $get_url = $apiurl;
                    curl_setopt($ch, CURLOPT_POST,0);
                    curl_setopt($ch, CURLOPT_URL, $get_url);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
                    curl_setopt($ch, CURLOPT_HEADER,0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $return_val = curl_exec($ch); 
               
            
                $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

                $arr_insert = array(
                    // 'booking_reference_no'  =>  $booking_reference_no,
                    'final_amt'   =>   $final_amt,
                    'payment_type'   =>   $payment_type,
                    'booking_amt'   =>   $booking_amt,
                    'pending_amt'   =>   $pending_amt,
                    'payment_now_later'   =>   $payment_now_later,
                    'booking_tm_mobile_no'   =>   $mobile_no,

                    'booking_reference_no'  =>  $booking_reference_no,
                    'package_date_id' => $package_date_id,
                    'enquiry_id' => $enquiry_id,
                    'package_id' => $package_id,
                    'traveller_id' => $traveller_id,
                    'payment_reason' => $later_payment_reason,
                    'payment_confirmed_status'   =>  'Pending'
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
                    'payment_confirmed_status'   =>  'Pending'
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

    }

    public function extra_services_add($iid)
    {  
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $record = array();
        $fields = "sra_payment.*,package_date.journey_date,sra_payment.id as sra_payment_id";
        $this->db->where('sra_payment.is_deleted','no');
        $this->db->where('sra_payment.is_active','yes');
        $this->db->join("package_date", 'package_date.id=sra_payment.tour_date','left');
        // $this->db->group_start();
        $this->db->where('sra_payment.id', $iid);
        // $this->db->where('sra_payment.academic_year', $academic_year);
        // $this->db->group_end();
        // $traveller_booking_info_header = $this->master_model->getRecords('sra_payment','',$fields);
        $traveller_booking_info_header = $this->master_model->getRecords('sra_payment',array('sra_payment.is_deleted'=>'no'),$fields);

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $expense_type_data = $this->master_model->getRecords('expense_type');
        // print_r($expense_type_data); die;  

        if($this->input->post('extra_services_submit'))
        {
                $add_on_services_payment  = $this->input->post('add_on_services_payment');
                $sra_no  = $this->input->post('sra_no');
                $package_id  = $this->input->post('package_id');
                $package_date_id  = $this->input->post('package_date_id');
                $service_mobile_number  = $this->input->post('service_mobile_number');

                $sra_payment_id  = $this->input->post('sra_payment_id');
                $academic_year  = $this->input->post('academic_year');

                $other_services  = $this->input->post('other_services');
                $sra_extra_services  = $this->input->post('sra_extra_services');
                $services_quantity  = $this->input->post('services_quantity');
            
                if($add_on_services_payment == '2'){
                $count = count($sra_extra_services);
                // print_r($count); die;
                for($i=0;$i<$count;$i++)
                {
                $arr_insert = array(
                'extra_services'   =>   $_POST["sra_extra_services"][$i],
                'other_services'   =>   $_POST["other_services"][$i],
                'services_amt'   =>   $_POST["services_quantity"][$i],
                'payment_type' => $add_on_services_payment,
                'sra_no' => $sra_no,
                'tour_number' => $package_id,
                'tour_date' => $package_date_id,
                'mobile_number' => $service_mobile_number,
                'sra_payment_id' => $sra_payment_id,
                'academic_year' => $academic_year
                
                ); 
                $inserted_id = $this->master_model->insertRecord('sra_extra_services',$arr_insert,true);
                }
                }
                
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title_extra_services)." Added Successfully.");
                    redirect($this->module_url_path_add_sra.'/add');
                }
                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                //  redirect($this->module_seat_type_room_type.'/add/'.$iid);
                redirect($this->module_url_path.'/index');
                // }   
        }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('expense_category','ASC');
        $expense_category = $this->master_model->getRecords('expense_category');
        //  print_r($expense_category); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $measuring_unit = $this->master_model->getRecords('measuring_unit');
        //  print_r($measuring_unit); die;

        $this->db->where('is_deleted','no');
        // $this->db->where('extra_services_details.enquiry_id',$iid);
        // $this->db->group_by('extra_services');
        $special_req_master = $this->master_model->getRecords('special_req_master');
        // print_r($special_req_master); die;

        // $record = array();
        // $fields = "packages.*,package_date.journey_date,package_date.id as pd_id";
        // $this->db->where('packages.is_deleted','no');
        // // $this->db->order_by('packages.id','desc');
        // $this->db->where('packages.id',$id);
        // $this->db->where('package_date.id',$did);
        // $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        // $packages_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($packages_data); die;


        $this->arr_view_data['traveller_booking_info_header']        = $traveller_booking_info_header;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['expense_type_data']        = $expense_type_data;
        $this->arr_view_data['special_req_master'] = $special_req_master;
        // $this->arr_view_data['packages_data']        = $packages_data;
        $this->arr_view_data['expense_category']        = $expense_category;
        $this->arr_view_data['measuring_unit']        = $measuring_unit;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_add_sra'] = $this->module_url_path_add_sra;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."extra_services";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }

    public function cust_otp_back_btn()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

            $booking_amt = $this->input->post('booking_amt');
            $final_amt = $this->input->post('final_amt');
            $payment_type = $this->input->post('payment_type');
            $mobile_no = $this->input->post('mobile_no');
            $relation = $this->input->post('relation');
            $pending_amt = $this->input->post('pending_amt');
            $select_transaction = $this->input->post('select_transaction');
            // print_r($select_transaction);
            
            $upi_holder_name = $this->input->post('upi_holder_name');
            $upi_payment_type = $this->input->post('upi_payment_type');
            $upi_transaction_date = $this->input->post('upi_transaction_date');
            // print_r($upi_holder_name); die;
            $upi_self_no = $this->input->post('upi_self_no');
            $upi_reason = $this->input->post('upi_reason');

            $qr_holder_name = $this->input->post('qr_holder_name');
            $qr_mobile_number = $this->input->post('qr_mobile_number');
            $qr_payment_type = $this->input->post('qr_payment_type');
            $qr_transaction_date = $this->input->post('qr_transaction_date');
            $qr_upi_no = $this->input->post('qr_upi_no');


            $upi_no = $this->input->post('upi_no');
            $cheque = $this->input->post('cheque');
            $bank_name = $this->input->post('bank_name');
            $name_on_cheque = $this->input->post('name_on_cheque');
            $drawn_on_date = $this->input->post('drawn_on_date');

            $netbanking_payment_type = $this->input->post('netbanking_payment_type');
            $net_banking_acc_no = $this->input->post('net_banking_acc_no');
            $net_acc_holder_nm = $this->input->post('net_acc_holder_nm');
            $net_banking_branch_name = $this->input->post('net_banking_branch_name');
            $net_banking_utr_no = $this->input->post('net_banking_utr_no');
            $netbanking_bank_name = $this->input->post('netbanking_bank_name');
            $netbanking_date = $this->input->post('netbanking_date');

            // $cash_2000 = $this->input->post('cash_2000');
            // $total_cash_2000 = $this->input->post('total_cash_2000');
            $cash_500 = $this->input->post('cash_500');
            $total_cash_500 = $this->input->post('total_cash_500');
            $cash_200 = $this->input->post('cash_200');
            $total_cash_200 = $this->input->post('total_cash_200');
            $cash_100 = $this->input->post('cash_100');
            $total_cash_100 = $this->input->post('total_cash_100');
            $cash_50 = $this->input->post('cash_50');
            $total_cash_50 = $this->input->post('total_cash_50');
            $cash_20 = $this->input->post('cash_20');
            $total_cash_20 = $this->input->post('total_cash_20');
            $cash_10 = $this->input->post('cash_10');
            $total_cash_10 = $this->input->post('total_cash_10');
            $cash_5 = $this->input->post('cash_5');
            $total_cash_5 = $this->input->post('total_cash_5');
            $cash_2 = $this->input->post('cash_2');
            $total_cash_2 = $this->input->post('total_cash_2');
            $cash_1 = $this->input->post('cash_1');
            $total_cash_1 = $this->input->post('total_cash_1');
            $total_cash_amt = $this->input->post('total_cash_amt');


            $return_cash_500 = $this->input->post('return_cash_500');
            $return_total_cash_500 = $this->input->post('return_total_cash_500');
            $return_cash_200 = $this->input->post('return_cash_200');
            $return_total_cash_200 = $this->input->post('return_total_cash_200');
            $return_cash_100 = $this->input->post('return_cash_100');
            $return_total_cash_100 = $this->input->post('return_total_cash_100');
            $return_cash_50 = $this->input->post('return_cash_50');
            $return_total_cash_50 = $this->input->post('return_total_cash_50');
            $return_cash_20 = $this->input->post('return_cash_20');
            $return_total_cash_20 = $this->input->post('return_total_cash_20');
            $return_cash_10 = $this->input->post('return_cash_10');
            $return_total_cash_10 = $this->input->post('return_total_cash_10');
            $return_cash_5 = $this->input->post('return_cash_5');
            $return_total_cash_5 = $this->input->post('return_total_cash_5');
            $return_cash_2 = $this->input->post('return_cash_2');
            $return_total_cash_2 = $this->input->post('return_total_cash_2');
            $return_cash_1 = $this->input->post('return_cash_1');
            $return_total_cash_1 = $this->input->post('return_total_cash_1');
            $return_total_cash_amt = $this->input->post('return_total_cash_amt');

            

            $enquiry_id = $this->input->post('enquiry_id');
            $traveller_id = $this->input->post('traveller_id');
            $package_id = $this->input->post('package_id');
            $journey_date = $this->input->post('journey_date');
            $package_date_id = $this->input->post('package_date_id');
            

            $extra_sevices_id = $this->input->post('extra_sevices_id');
            $booking_payment_details_id = $this->input->post('booking_payment_details_id');
            $return_customer_booking_payment_id = $this->input->post('return_customer_booking_payment_id');


        //     $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

        //     $alphabet = '1234567890';
        //     $otp = str_shuffle($alphabet);
        //     $traveler_otp = substr($otp, 0, '6'); 

        //     $from_email='test@choudharyyatra.co.in';
            
        //     $authKey = "1207168241267288907";
            
        // $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
        // $senderId  = "CYCPLN";
        
        // $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$mobile_no&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
        
        //  $apiurl = str_replace(" ", '%20', $apiurl); 
            
            
        //     $ch = curl_init($apiurl);
        //             $get_url = $apiurl;
        //             curl_setopt($ch, CURLOPT_POST,0);
        //             curl_setopt($ch, CURLOPT_URL, $get_url);
        //             curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        //             curl_setopt($ch, CURLOPT_HEADER,0);
        //             curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        //     $return_val = curl_exec($ch); 
               
            
                $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

                $arr_insert = array(
                    // 'booking_reference_no'  =>  $booking_reference_no,
                    'final_amt'   =>   $final_amt,
                    'payment_type'   =>   $payment_type,
                    'booking_amt'   =>   $booking_amt,
                    'pending_amt'   =>   $pending_amt,
                    'booking_tm_mobile_no'   =>   $mobile_no,
                    'relation'   =>   $relation,
                    'select_transaction'   =>   $select_transaction,
                    
                    'UPI_holder_name'   =>   $upi_holder_name,
                    'upi_payment_type'   =>   $upi_payment_type,
                    'UPI_transaction_no'   =>   $upi_self_no,
                    'upi_transaction_date'   =>   $upi_transaction_date,
                    'UPI_reason'   =>   $upi_reason,

                    'QR_holder_name'   =>   $qr_holder_name,
                    'QR_mobile_number'   =>   $qr_mobile_number,
                    'QR_payment_type'   =>   $qr_payment_type,
                    'qr_transaction_date'   =>   $qr_transaction_date,
                    'QR_transaction_no'   =>   $qr_upi_no,

                    'upi_no'   =>   $upi_no,
                    'cheque'   =>   $cheque,
                    'bank_name'   =>   $bank_name,
                    'name_on_cheque'   =>   $name_on_cheque,
                    'drawn_on_date'   =>   $drawn_on_date,

                    'netbanking_payment_type'   =>   $netbanking_payment_type,
                    'net_banking_acc_no'   =>   $net_banking_acc_no,
                    'net_banking_acc_holder_nm'   =>   $net_acc_holder_nm,
                    'net_banking_branch_name'   =>   $net_banking_branch_name,
                    'net_banking'   =>   $net_banking_utr_no,
                    'netbanking_bank_name'   =>   $netbanking_bank_name,
                    'netbanking_date'   =>   $netbanking_date,

                    'booking_reference_no'  =>  $booking_reference_no,
                    'package_date_id' => $package_date_id,
                    'enquiry_id' => $enquiry_id,
                    'package_id' => $package_id,
                    'traveller_id' => $traveller_id,

                    // 'select_services' => $select_services,
                    // 'extra_services' => $extra_services,

                    // 'cash_2000'   =>   $cash_2000,
                    // 'total_cash_2000'   =>   $total_cash_2000,
                    'cash_500'   =>   $cash_500,
                    'total_cash_500'   =>   $total_cash_500,
                    'cash_200'   =>   $cash_200,
                    'total_cash_200'   =>   $total_cash_200,
                    'cash_100'   =>   $cash_100,
                    'total_cash_100'   =>   $total_cash_100,
                    'cash_50'   =>   $cash_50,
                    'total_cash_50'   =>   $total_cash_50,
                    'cash_20'   =>   $cash_20,
                    'total_cash_20'   =>   $total_cash_20,
                    'cash_10'   =>   $cash_10,
                    'total_cash_10'   =>   $total_cash_10,

                    'cash_5'   =>   $cash_5,
                    'total_cash_5'   =>   $total_cash_5,
                    'cash_2'   =>   $cash_2,
                    'total_cash_2'   =>   $total_cash_2,
                    'cash_1'   =>   $cash_1,
                    'total_cash_1'   =>   $total_cash_1,
                    'total_cash_amt'   =>   $total_cash_amt,

                    // 'traveler_otp'   =>   $traveler_otp,
                    // 'booking_status'   =>  'confirm'
                );

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
                
                if($select_transaction == 'CASH'){
                 $arr_insert_return = array(
                    'select_transaction'   =>   $select_transaction,

                    'return_cash_500'   =>   $return_cash_500,
                    'return_total_cash_500'   =>   $return_total_cash_500,
                    'return_cash_200'   =>   $return_cash_200,
                    'return_total_cash_200'   =>   $return_total_cash_200,
                    'return_cash_100'   =>   $return_cash_100,
                    'return_total_cash_100'   =>   $return_total_cash_100,
                    'return_cash_50'   =>   $return_cash_50,
                    'return_total_cash_50'   =>   $return_total_cash_50,
                    'return_cash_20'   =>   $return_cash_20,
                    'return_total_cash_20'   =>   $return_total_cash_20,
                    'return_cash_10'   =>   $return_cash_10,
                    'return_total_cash_10'   =>   $return_total_cash_10,

                    'return_cash_5'   =>   $return_cash_5,
                    'return_total_cash_5'   =>   $return_total_cash_5,
                    'return_cash_2'   =>   $return_cash_2,
                    'return_total_cash_2'   =>   $return_total_cash_2,
                    'return_cash_1'   =>   $return_cash_1,
                    'return_total_cash_1'   =>   $return_total_cash_1,
                    'return_total_cash_amt'   =>   $return_total_cash_amt,
                    'enquiry_id' => $enquiry_id,
                    'booking_payment_details_id'   =>   $insertid
                );
                // print_r($arr_insert); die;

                $this->db->where('is_deleted','no');
                $this->db->where('return_customer_booking_payment_details.enquiry_id',$enquiry_id);
                $return_customer_booking_payment_details = $this->master_model->getRecord('return_customer_booking_payment_details');
                // print_r($return_customer_booking_payment_details); die;

                if(!empty($return_customer_booking_payment_details)){
                    $arr_where     = array("id" => $return_customer_booking_payment_id);
                    $inserted_id = $this->master_model->updateRecord('return_customer_booking_payment_details',$arr_insert_return,$arr_where);
                } else{
                $inserted_id = $this->master_model->insertRecord('return_customer_booking_payment_details',$arr_insert_return,true);
                }
            }
                // $arr_update = array(
                //     'booking_reference_no'  =>  $booking_reference_no
                // );
                // $arr_where     = array("id" => $enquiry_id);
                // $this->master_model->updateRecord('booking_payment_details',$arr_update,$arr_where);

        //================================================================================================================== 
       
        $extra_services = $this->input->post('extra_services');

        if($this->input->post('select_services')!=''){
           $select_services = implode(",",$this->input->post('select_services'));
        }else{
           $select_services = '';
        }    

       $selected_services=explode(',',$select_services);

       // print_r($selected_services); 
       // $ccc=count($selected_services);
       
       for($i=0;$i<count($selected_services);$i++){
           
        $arr_insert2 = array(
           'select_services' => $selected_services[$i],
           'extra_services' => $extra_services,
           // 'booking_reference_no'  =>  $booking_reference_no,
           // 'package_date_id' => $package_date_id,
           'enquiry_id' => $enquiry_id,
           // 'package_id' => $package_id,
           // 'traveller_id' => $traveller_id
       );

        $this->db->where('is_deleted', 'no');
        $this->db->where('extra_services_details.enquiry_id', $enquiry_id);
        $existing_services_details = $this->master_model->getRecords('extra_services_details');
    if(!empty($existing_services_details)){
        foreach ($existing_services_details as $existing_service) {
        if (in_array($existing_service['select_services'], $selected_services)) {
            $arr_insert2 = array(
                'extra_services' => $extra_services,
            );

        $arr_where = array("id" => $existing_service['id']);
        $inserted_id = $this->master_model->updateRecord('extra_services_details', $arr_insert2, $arr_where);

        $key = array_search($existing_service['select_services'], $selected_services);
        unset($selected_services[$key]);
    } else {
        $arr_update = array(
            'select_services' => $selected_services[$i],
        );

        $arr_where = array("id" => $existing_service['id']);
        $this->master_model->updateRecord('extra_services_details', $arr_update, $arr_where);
    }
}
    }else{
        foreach ($selected_services as $selected_service) {
            $arr_insert2 = array(
                'select_services' => $selected_service,
                'extra_services'  => $extra_services,
                'enquiry_id'      => $enquiry_id,
            );
        $inserted_id = $this->master_model->insertRecord('extra_services_details',$arr_insert2,true);
        }
    }
        // $this->db->where('is_deleted','no');
        // $this->db->where('extra_services_details.enquiry_id',$enquiry_id);
        // $this->db->where('extra_services_details.select_services', $selected_services[$i]);
        // $extra_services_details = $this->master_model->getRecords('extra_services_details');
        // // print_r($extra_services_details); die;

        // if(!empty($extra_services_details)){
        //     $arr_where     = array("id" => $extra_services_details[0]['id']);
        //     $inserted_id = $this->master_model->updateRecord('extra_services_details',$arr_insert2,$arr_where);
        // } else{
        
        // }
   }
        if($inserted_id!=''){
           echo true;
       }else {
           echo false;
       }

                
    }


        public function send_otp()
        { 
            // echo 'hiiiii IN Controller'; die;
            $agent_sess_name = $this->session->userdata('agent_name');
            $id=$this->session->userdata('agent_sess_id');
                
                $booking_tm_mobile_no = $this->input->post('booking_tm_mobile_no');

                $inserted_id = $this->input->post('inserted_id');

                $alphabet = '1234567890';
                $otp = str_shuffle($alphabet);
                $traveler_otp = substr($otp, 0, '6'); 

                $from_email='test@choudharyyatra.co.in';
                
                $authKey = "1207168241267288907";
                
            $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
            $senderId  = "CYCPLN";
            
            $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$booking_tm_mobile_no&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
            
            $apiurl = str_replace(" ", '%20', $apiurl); 
                
                
                $ch = curl_init($apiurl);
                        $get_url = $apiurl;
                        curl_setopt($ch, CURLOPT_POST,0);
                        curl_setopt($ch, CURLOPT_URL, $get_url);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
                        curl_setopt($ch, CURLOPT_HEADER,0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                $return_val = curl_exec($ch); 
                
                    $arr_update = array(
                        'booking_tm_mobile_no'   =>   $booking_tm_mobile_no,
                        'traveler_otp'   =>   $traveler_otp
                    );
                    // print_r($arr_update); die;

                    $arr_where     = array("id" => $inserted_id);
                    $enquiry_id = $this->master_model->updateRecord('sra_booking_payment_details',$arr_update,$arr_where);
                    
                    //  $inserted_id = $this->master_model->insertRecord('booking_payment_details',$arr_insert,true);
                    if($enquiry_id!=''){
                        echo true;

                    }else {
                        echo false;
                    }
        }

    public function verify_otp()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

             $verify_otp = $this->input->post('verify_otp');
            //  print_r($verify_otp);
             $mobile_no = $this->input->post('mobile_no'); 
            //  print_r($mobile_no);
            $sra_no = $this->input->post('sra_no');  
            //  print_r($enquiry_id); die;

            // echo $booking_ref_no = $this->input->post('booking_ref_no');  die;

            $record = array();
            $fields = "sra_booking_payment_details.*";
            $this->db->where('is_deleted','no');
            $this->db->where('traveler_otp',$verify_otp);
            $this->db->where('booking_tm_mobile_no',$mobile_no);
            $this->db->where('sra_no',$sra_no);
            $booking_payment_details_info = $this->master_model->getRecord('sra_booking_payment_details');
            // print_r($booking_payment_details_info); die;

            // print_r($booking_payment_details_info); die;

            if($booking_payment_details_info !=''){

                $journey_date  = $this->input->post('journey_date');
                $traveller_id  = $this->input->post('traveller_id');
                $sra_no    = $this->input->post('sra_no'); 
                $hotel_name_id    = $this->input->post('hotel_name_id'); 
                $package_date_id    = $this->input->post('package_date_id'); 
                $package_id    = $this->input->post('package_id');
                $today = date('y-m-d');
                // $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

                $booking_amt = $this->input->post('booking_amt');
                $final_amt = $this->input->post('final_amt');
                $payment_type = $this->input->post('payment_type');
                // print_r($payment_type); die;
                $mobile_no = $this->input->post('mobile_no');
                $pending_amt = $this->input->post('pending_amt');
                $payment_now_later = $this->input->post('payment_now_later');
                $select_transaction = $this->input->post('select_transaction');
                // print_r($select_transaction);
                
                $upi_holder_name = $this->input->post('upi_holder_name');
                $upi_payment_type = $this->input->post('upi_payment_type');
                // print_r($upi_holder_name); die;
                $upi_self_no = $this->input->post('upi_self_no');
                $upi_transaction_date = $this->input->post('upi_transaction_date');
                $upi_reason = $this->input->post('upi_reason');

                $qr_holder_name = $this->input->post('qr_holder_name');
                $qr_mobile_number = $this->input->post('qr_mobile_number');
                $qr_payment_type = $this->input->post('qr_payment_type');
                $qr_upi_no = $this->input->post('qr_upi_no');
                $qr_transaction_date = $this->input->post('qr_transaction_date');
                $qr_reason_1 = $this->input->post('qr_reason_1');

                $upi_no = $this->input->post('upi_no');
                $cheque = $this->input->post('cheque');
                $bank_name = $this->input->post('bank_name');
                $name_on_cheque = $this->input->post('name_on_cheque');
                $drawn_on_date = $this->input->post('drawn_on_date');
                $cheque_bank_name = $this->input->post('cheque_bank_name');
                $cheque_reason_1 = $this->input->post('cheque_reason_1');

                $netbanking_payment_type = $this->input->post('netbanking_payment_type');
                $net_banking_acc_no = $this->input->post('net_banking_acc_no');
                $net_acc_holder_nm = $this->input->post('net_acc_holder_nm');
                $net_banking_branch_name = $this->input->post('net_banking_branch_name');
                $net_banking_utr_no = $this->input->post('net_banking_utr_no');
                $netbanking_bank_name = $this->input->post('netbanking_bank_name');
                $netbanking_date = $this->input->post('netbanking_date');
                $net_banking_reason_1 = $this->input->post('net_banking_reason_1');

                // $cash_2000 = $this->input->post('cash_2000');
                // $total_cash_2000 = $this->input->post('total_cash_2000');
                $cash_500 = $this->input->post('cash_500');
                $total_cash_500 = $this->input->post('total_cash_500');
                $cash_200 = $this->input->post('cash_200');
                $total_cash_200 = $this->input->post('total_cash_200');
                $cash_100 = $this->input->post('cash_100');
                $total_cash_100 = $this->input->post('total_cash_100');
                $cash_50 = $this->input->post('cash_50');
                $total_cash_50 = $this->input->post('total_cash_50');
                $cash_20 = $this->input->post('cash_20');
                $total_cash_20 = $this->input->post('total_cash_20');
                $cash_10 = $this->input->post('cash_10');
                $total_cash_10 = $this->input->post('total_cash_10');
                $cash_5 = $this->input->post('cash_5');
                $total_cash_5 = $this->input->post('total_cash_5');
                $cash_2 = $this->input->post('cash_2');
                $total_cash_2 = $this->input->post('total_cash_2');
                $cash_1 = $this->input->post('cash_1');
                $total_cash_1 = $this->input->post('total_cash_1');
                $total_cash_amt = $this->input->post('total_cash_amt');


                $return_cash_500 = $this->input->post('return_cash_500');
                $return_total_cash_500 = $this->input->post('return_total_cash_500');
                $return_cash_200 = $this->input->post('return_cash_200');
                $return_total_cash_200 = $this->input->post('return_total_cash_200');
                $return_cash_100 = $this->input->post('return_cash_100');
                $return_total_cash_100 = $this->input->post('return_total_cash_100');
                $return_cash_50 = $this->input->post('return_cash_50');
                $return_total_cash_50 = $this->input->post('return_total_cash_50');
                $return_cash_20 = $this->input->post('return_cash_20');
                $return_total_cash_20 = $this->input->post('return_total_cash_20');
                $return_cash_10 = $this->input->post('return_cash_10');
                $return_total_cash_10 = $this->input->post('return_total_cash_10');
                $return_cash_5 = $this->input->post('return_cash_5');
                $return_total_cash_5 = $this->input->post('return_total_cash_5');
                $return_cash_2 = $this->input->post('return_cash_2');
                $return_total_cash_2 = $this->input->post('return_total_cash_2');
                $return_cash_1 = $this->input->post('return_cash_1');
                $return_total_cash_1 = $this->input->post('return_total_cash_1');
                $return_total_cash_amt = $this->input->post('return_total_cash_amt');
                $extra_sevices_id = $this->input->post('extra_sevices_id');
                $booking_payment_details_id = $this->input->post('booking_payment_details_id');
                $return_customer_booking_payment_id = $this->input->post('return_customer_booking_payment_id');
                $inserted_id_prev = $this->input->post('inserted_id');
                // print_r($inserted_id); die;

                // if($pending_amt == '0'){
                // $arr_insert = array(
                //     'sra_no'   =>   $sra_no,
                //     'package_date_id'   =>   $package_date_id,
                //     'package_id'   =>   $package_id,
                //     'booking_date'   =>   $today,
                //     'sra_booking_payment_details_id'  =>  $inserted_id_prev,
                //     'agent_id'   =>   $id,
                //     'payment_confirmed_status'   =>  'Payment Completed'
                // );
                // }else{
                // $arr_insert = array(
                //     'sra_no'   =>   $sra_no,
                //     'package_date_id'   =>   $package_date_id,
                //     'package_id'   =>   $package_id,
                //     'booking_date'   =>   $today,
                //     'sra_booking_payment_details_id'  =>  $inserted_id_prev,
                //     'agent_id'   =>   $id,
                //     'payment_confirmed_status'   =>  'In Process'
                // );  
                // }
                // // print_r($arr_insert); die;
              
                // $record = array();
                // $fields = "sra_final_booking.*";
                // $this->db->where('is_deleted','no');
                // $this->db->where('sra_no',$sra_no);
                // $final_booking_details = $this->master_model->getRecord('sra_final_booking');

                // // print_r($final_booking_details); die;

                // // if(!empty($final_booking_details)){
                // // $arr_where     = array("enquiry_id" => $enquiry_id);
                // // $inserted_id = $this->master_model->updateRecord('final_booking',$arr_insert,$arr_where);
                // // } else{
                // // $inserted_id = $this->master_model->insertRecord('final_booking',$arr_insert,true);
                // // }
                // $inserted_id = $this->master_model->insertRecord('sra_final_booking',$arr_insert,true);
                
                //==================================================

                if($pending_amt == '0'){
                    $arr_update2 = array(
                        'payment_confirmed_status'   =>  'Payment Completed'
                    );
                }else{
                    $arr_update2 = array(
                        'payment_confirmed_status'   =>  'In Process'
                    );
                }
                $arr_where2     = array("sra_no" => $sra_no);
                $this->master_model->updateRecord('sra_booking_payment_details',$arr_update2,$arr_where2);

                //==================================================
                
                //==================================================

                if($pending_amt == '0'){
                    $arr_update2 = array(
                        'payment_confirmed_status'   =>  'Payment Completed'
                    );
                }else{
                    $arr_update2 = array(
                        'payment_confirmed_status'   =>  'In Process'
                    );
                }
                $arr_where2     = array("sra_no" => $sra_no);
                $this->master_model->updateRecord('sra_final_booking',$arr_update2,$arr_where2);

                //==================================================

                if($pending_amt == '0'){
                $arr_update = array(
                    'final_amt'   =>   $final_amt,
                    'payment_type'   =>   $payment_type,
                    'booking_amt'   =>   $booking_amt,
                    'pending_amt'   =>   $pending_amt,
                    'payment_now_later'   =>   $payment_now_later,
                    'booking_tm_mobile_no'   =>   $mobile_no,
                    'select_transaction'   =>   $select_transaction,
                    
                    'UPI_holder_name'   =>   $upi_holder_name,
                    'upi_payment_type'   =>   $upi_payment_type,
                    'UPI_transaction_no'   =>   $upi_self_no,
                    'UPI_reason'   =>   $upi_reason,
                    'upi_transaction_date'   =>   $upi_transaction_date,

                    'QR_holder_name'   =>   $qr_holder_name,
                    'QR_mobile_number'   =>   $qr_mobile_number,
                    'QR_payment_type'   =>   $qr_payment_type,
                    'QR_transaction_no'   =>   $qr_upi_no,
                    'qr_transaction_date'   =>   $qr_transaction_date,
                    'QR_reason'   =>   $qr_reason_1,

                    'upi_no'   =>   $upi_no,
                    'cheque'   =>   $cheque,
                    'bank_name'   =>   $bank_name,
                    'drawn_on_date'   =>   $drawn_on_date,
                    'cheque_select_bank_name'   =>   $cheque_bank_name,
                    'cheque_reason'   =>   $cheque_reason_1,

                    'netbanking_payment_type'   =>   $netbanking_payment_type,
                    'net_banking_acc_no'   =>   $net_banking_acc_no,
                    'net_banking_acc_holder_nm'   =>   $net_acc_holder_nm,
                    'net_banking_branch_name'   =>   $net_banking_branch_name,
                    'net_banking'   =>   $net_banking_utr_no,
                    'netbanking_bank_name'   =>   $netbanking_bank_name,
                    'netbanking_date'   =>   $netbanking_date,
                    'net_banking_reason'   =>   $net_banking_reason_1,

                    // 'booking_reference_no'  =>  $booking_reference_no,
                    'package_date_id' => $package_date_id,
                    'sra_no' => $sra_no,
                    'package_id' => $package_id,
                    'traveller_id' => $traveller_id,

                    // 'select_services' => $select_services,
                    // 'extra_services' => $extra_services,

                    // 'cash_2000'   =>   $cash_2000,
                    // 'total_cash_2000'   =>   $total_cash_2000,
                    'cash_500'   =>   $cash_500,
                    'total_cash_500'   =>   $total_cash_500,
                    'cash_200'   =>   $cash_200,
                    'total_cash_200'   =>   $total_cash_200,
                    'cash_100'   =>   $cash_100,
                    'total_cash_100'   =>   $total_cash_100,
                    'cash_50'   =>   $cash_50,
                    'total_cash_50'   =>   $total_cash_50,
                    'cash_20'   =>   $cash_20,
                    'total_cash_20'   =>   $total_cash_20,
                    'cash_10'   =>   $cash_10,
                    'total_cash_10'   =>   $total_cash_10,

                    'cash_5'   =>   $cash_5,
                    'total_cash_5'   =>   $total_cash_5,
                    'cash_2'   =>   $cash_2,
                    'total_cash_2'   =>   $total_cash_2,
                    'cash_1'   =>   $cash_1,
                    'total_cash_1'   =>   $total_cash_1,
                    'total_cash_amt'   =>   $total_cash_amt,
                    'agent_id'   =>   $id,
                    'payment_confirmed_status'   =>  'Payment Completed'
                );
                }else{
                $arr_update = array(
                    'final_amt'   =>   $final_amt,
                    'payment_type'   =>   $payment_type,
                    'booking_amt'   =>   $booking_amt,
                    'pending_amt'   =>   $pending_amt,
                    'payment_now_later'   =>   $payment_now_later,
                    'booking_tm_mobile_no'   =>   $mobile_no,
                    'select_transaction'   =>   $select_transaction,
                    
                    'UPI_holder_name'   =>   $upi_holder_name,
                    'upi_payment_type'   =>   $upi_payment_type,
                    'UPI_transaction_no'   =>   $upi_self_no,
                    'UPI_reason'   =>   $upi_reason,
                    'upi_transaction_date'   =>   $upi_transaction_date,

                    'QR_holder_name'   =>   $qr_holder_name,
                    'QR_mobile_number'   =>   $qr_mobile_number,
                    'QR_payment_type'   =>   $qr_payment_type,
                    'QR_transaction_no'   =>   $qr_upi_no,
                    'qr_transaction_date'   =>   $qr_transaction_date,
                    'QR_reason'   =>   $qr_reason_1,

                    'upi_no'   =>   $upi_no,
                    'cheque'   =>   $cheque,
                    'bank_name'   =>   $bank_name,
                    'drawn_on_date'   =>   $drawn_on_date,
                    'cheque_select_bank_name'   =>   $cheque_bank_name,
                    'cheque_reason'   =>   $cheque_reason_1,


                    'netbanking_payment_type'   =>   $netbanking_payment_type,
                    'net_banking_acc_no'   =>   $net_banking_acc_no,
                    'net_banking_acc_holder_nm'   =>   $net_acc_holder_nm,
                    'net_banking_branch_name'   =>   $net_banking_branch_name,
                    'net_banking'   =>   $net_banking_utr_no,
                    'netbanking_bank_name'   =>   $netbanking_bank_name,
                    'netbanking_date'   =>   $netbanking_date,
                    'net_banking_reason'   =>   $net_banking_reason_1,

                    // 'booking_reference_no'  =>  $booking_reference_no,
                    'package_date_id' => $package_date_id,
                    'sra_no' => $sra_no,
                    'package_id' => $package_id,
                    'traveller_id' => $traveller_id,

                    // 'select_services' => $select_services,
                    // 'extra_services' => $extra_services,

                    // 'cash_2000'   =>   $cash_2000,
                    // 'total_cash_2000'   =>   $total_cash_2000,
                    'cash_500'   =>   $cash_500,
                    'total_cash_500'   =>   $total_cash_500,
                    'cash_200'   =>   $cash_200,
                    'total_cash_200'   =>   $total_cash_200,
                    'cash_100'   =>   $cash_100,
                    'total_cash_100'   =>   $total_cash_100,
                    'cash_50'   =>   $cash_50,
                    'total_cash_50'   =>   $total_cash_50,
                    'cash_20'   =>   $cash_20,
                    'total_cash_20'   =>   $total_cash_20,
                    'cash_10'   =>   $cash_10,
                    'total_cash_10'   =>   $total_cash_10,

                    'cash_5'   =>   $cash_5,
                    'total_cash_5'   =>   $total_cash_5,
                    'cash_2'   =>   $cash_2,
                    'total_cash_2'   =>   $total_cash_2,
                    'cash_1'   =>   $cash_1,
                    'total_cash_1'   =>   $total_cash_1,
                    'total_cash_amt'   =>   $total_cash_amt,
                    'agent_id'   =>   $id,
                    'payment_confirmed_status'   =>  'In Process'
                );    
                }
                // print_r($arr_update); die;
                // echo $inserted_id; 
                $arr_where     = array("sra_no" => $sra_no,
                                        "id"=>$inserted_id_prev);
                $this->master_model->updateRecord('sra_booking_payment_details',$arr_update,$arr_where);

                $arr_update2 = array(
                    'run_pending_amt'   =>   $pending_amt
                );
                $arr_where2     = array("sra_no" => $sra_no);
                $this->master_model->updateRecord('sra_booking_payment_details',$arr_update2,$arr_where2);

                // die;
                if($select_transaction =='CASH'){
                $arr_insert = array(
                    'return_cash_500'   =>   $return_cash_500 ,
                    'return_total_cash_500'   =>   $return_total_cash_500  ,

                    'return_cash_200'   =>   $return_cash_200  ,
                    'return_total_cash_200'   =>   $return_total_cash_200  ,

                    'return_cash_100'   =>   $return_cash_100  ,
                    'return_total_cash_100'   =>   $return_total_cash_100  ,

                    'return_cash_50'   =>   $return_cash_50  ,
                    'return_total_cash_50'   =>   $return_total_cash_50  ,

                    'return_cash_20'   =>   $return_cash_20  ,
                    'return_total_cash_20'   =>   $return_total_cash_20  ,

                    'return_cash_10'   =>   $return_cash_10  ,
                    'return_total_cash_10'   =>   $return_total_cash_10  ,

                    'return_cash_5'   =>   $return_cash_5  ,
                    'return_total_cash_5'   =>   $return_total_cash_5  ,

                    'return_cash_2'   =>   $return_cash_2   ,
                    'return_total_cash_2'   =>   $return_total_cash_2   ,

                    'return_cash_1'   =>   $return_cash_1   ,
                    'return_total_cash_1'   =>   $return_total_cash_1   ,

                    'return_total_cash_amt'   =>   $return_total_cash_amt   ,
                    // 'enquiry_id'   =>   $enquiry_id  ,
                    'sra_booking_payment_details_id'   =>   $inserted_id_prev ,

                    'select_transaction'   =>   $select_transaction
                );
                $this->master_model->insertRecord('sra_return_customer_booking_payment_details',$arr_insert,true);
                }
                // $arr_update = array(
                //     'booking_done'   =>   'yes'
                // );
                // $arr_where     = array("id" => $enquiry_id);
                // $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);

                // $arr_update = array(
                //     'booking_done'   =>   'yes'
                // );
                // $arr_where     = array("domestic_enquiry_id" => $enquiry_id);
                // $this->master_model->updateRecord('booking_basic_info',$arr_update,$arr_where);

                // $arr_update1 = array(
                //     'is_book'    =>  'yes',
                //     'booking_reference_no'=>$booking_reference_no, 

                // );
                // $arr_where1     = array("enquiry_id" => $enquiry_id);
                // $this->master_model->updateRecord('bus_seat_book',$arr_update1,$arr_where1);
               

                echo true;
            }else {
                echo false;
            }
                
// die;
        
    }

    public function add()
    { 
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        if($this->input->post('submit'))
        {
            // print_r($_REQUEST); die;
            // $this->form_validation->set_rules('package_hotel', 'package_hotel', 'required');

                // print_r('hii'); die;
                $journey_date  = $this->input->post('journey_date');
                $journey_date  = $this->input->post('journey_date');

                $traveller_id  = $this->input->post('traveller_id');
                $enquiry_id    = $this->input->post('enquiry_id'); 
                $hotel_name_id    = $this->input->post('hotel_name_id'); 
                $package_date_id    = $this->input->post('package_date_id'); 
                $package_id    = $this->input->post('package_id'); 
                $today = date('y-m-d');
                
                $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

                $arr_insert = array(
                    'enquiry_id'   =>   $enquiry_id,
                    'hotel_name_id'   =>   $hotel_name_id,
                    'package_date_id'   =>   $package_date_id,
                    'package_id'   =>   $package_id,
                    'booking_date'   =>   $today,
                    'traveller_id'   =>   $traveller_id,
                    'booking_reference_no'  =>  $booking_reference_no,
                    'agent_id'   =>   $id,
                    'booking_status'   =>  'confirm'
                );
                
                $inserted_id = $this->master_model->insertRecord('final_booking',$arr_insert,true);
                
                // ==========================================================================================
                
                // $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

                // $arr_insert = array(
                //     'booking_reference_no'  =>  $booking_reference_no,
                //     'booking_status'   =>  'confirm'
                // );
                
                // $inserted_id = $this->master_model->insertRecord('booking_payment_details',$arr_insert,true);
            


                // ==========================================================================================

                $arr_update = array(
                    'booking_done'   =>   'yes'
                );
                $arr_where     = array("id" => $enquiry_id);
                $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);

                $arr_update1 = array(
                    'is_book'    =>  'yes',
                    'booking_reference_no'=>$booking_reference_no, 

                );
                $arr_where1     = array("enquiry_id" => $enquiry_id);
                $this->master_model->updateRecord('bus_seat_book',$arr_update1,$arr_where1);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Final Booking Done Successfully.");
                    redirect($this->module_url_path_payment_receipt.'/index/'.$enquiry_id);
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
              
        }

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        // $this->arr_view_data['module_url_path_index'] = $this->module_url_path_index;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }

    public function get_upi_qr_code(){ 
    $taluka_data = $this->input->post('did');
        // print_r($taluka_data); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('id',$taluka_data);   
                        $data = $this->master_model->getRecords('qr_code_master');
                        // print_r($data); die;
        echo json_encode($data); 
    }

    public function get_upi_code(){

        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $did_upi = $this->input->post('did');
        // print_r($did_upi); die;
        $taluka_data = $this->input->post('self_data');
        // print_r($taluka_data);
        // $taluka_data_1 = $this->input->post('other_data');
        // print_r($taluka_data_1); die;

        if($taluka_data == 'self'){
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->where('id',$id);   
            $data = $this->master_model->getRecords('agent');
            // print_r($data); die;
        }else{
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->where('id',$did_upi);   
            $data = $this->master_model->getRecords('qr_code_master');
            // print_r($data); die;
        }
            echo json_encode($data); 

        }

        public function get_QR_code(){ 

            $agent_sess_name = $this->session->userdata('agent_name');
            $id=$this->session->userdata('agent_sess_id');
    
            $did_upi = $this->input->post('qr_did');
            // print_r($did_upi); die;
            $taluka_data = $this->input->post('qr_self_data');
            // print_r($taluka_data);
            // $taluka_data_1 = $this->input->post('other_data');
            // print_r($taluka_data_1); die;
    
            if($taluka_data == 'self'){
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$id);   
                $data = $this->master_model->getRecords('agent');
                // print_r($data); die;
            }else{
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$did_upi);   
                $data = $this->master_model->getRecords('qr_code_master');
                // print_r($data); die;
            }
                echo json_encode($data); 
    
            }


            public function booking_resend_otp()
        { 
            // echo 'hiiiii IN Controller'; die;
            $agent_sess_name = $this->session->userdata('agent_name');
            $id=$this->session->userdata('agent_sess_id');
                
                $booking_tm_mobile_no = $this->input->post('booking_tm_mobile_no');

                $enquiry_id = $this->input->post('enquiry_id');

                $alphabet = '1234567890';
                $otp = str_shuffle($alphabet);
                $traveler_otp = substr($otp, 0, '6'); 

                $from_email='test@choudharyyatra.co.in';
                
                $authKey = "1207168241267288907";
                
            $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
            $senderId  = "CYCPLN";
            
            $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$booking_tm_mobile_no&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
            
            $apiurl = str_replace(" ", '%20', $apiurl); 
                
                
                $ch = curl_init($apiurl);
                        $get_url = $apiurl;
                        curl_setopt($ch, CURLOPT_POST,0);
                        curl_setopt($ch, CURLOPT_URL, $get_url);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
                        curl_setopt($ch, CURLOPT_HEADER,0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                $return_val = curl_exec($ch); 
                
                

                    $arr_update = array(
                        'booking_tm_mobile_no'   =>   $booking_tm_mobile_no,
                        'booking_confirm_traveler_otp'   =>   $traveler_otp
                    );
                    // print_r($arr_update); die;

                    $arr_where     = array("enquiry_id" => $enquiry_id);
                    $this->master_model->updateRecord('booking_payment_details',$arr_update,$arr_where);
                    
                    //  $inserted_id = $this->master_model->insertRecord('booking_payment_details',$arr_insert,true);
                    if($enquiry_id!=''){
                        echo true;

                    }else {
                        echo false;
                    }
        }


        
    public function booking_confirm_otp()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

            $booking_amt = $this->input->post('booking_amt');
            $final_amt = $this->input->post('final_amt');
            $mobile_no = $this->input->post('mobile_no');
            $pending_amt = $this->input->post('pending_amt');

            $enquiry_id = $this->input->post('enquiry_id');
            $traveller_id = $this->input->post('traveller_id');
            $package_id = $this->input->post('package_id');
            $journey_date = $this->input->post('journey_date');
            $package_date_id = $this->input->post('package_date_id');

            $booking_payment_details_id = $this->input->post('booking_payment_details_id');

            $alphabet = '1234567890';
            $otp = str_shuffle($alphabet);
            $traveler_otp = substr($otp, 0, '6'); 

            $from_email='test@choudharyyatra.co.in';
            
            $authKey = "1207168241267288907";
            
        $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
        $senderId  = "CYCPLN";
        
        $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$mobile_no&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
        
         $apiurl = str_replace(" ", '%20', $apiurl); 
            
            
            $ch = curl_init($apiurl);
                    $get_url = $apiurl;
                    curl_setopt($ch, CURLOPT_POST,0);
                    curl_setopt($ch, CURLOPT_URL, $get_url);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
                    curl_setopt($ch, CURLOPT_HEADER,0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $return_val = curl_exec($ch); 
               
                $arr_insert = array(
                    'booking_tm_mobile_no'   =>   $mobile_no,
                    'booking_confirm_traveler_otp'   =>   $traveler_otp
                );
                // print_r($arr_insert); die;
                    $arr_where     = array("enquiry_id" => $enquiry_id);
                    $inserted_id = $this->master_model->updateRecord('booking_payment_details',$arr_insert,$arr_where);

        if($inserted_id!=''){   
           echo true;

       }else {
           echo false;
       }
    }

    public function edit()
    {
            if($this->input->post('submit_doc'))
            {
                if($_FILES['image_name']['name']!=''){

                $file_name     = $_FILES['image_name']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['image_name'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['image_name']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

              $file_name_courier_receipt =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/srs_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_courier_receipt;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $new_img_filename = $file_name_courier_receipt;
                }
                else
                {
                    $new_img_filename = $this->input->post('image_name',TRUE);     
                }

            } 
            else{
                $new_img_filename  = '';
            }
            // ===============
            $enquiry_id  = $this->input->post('enquiry_id'); 
            $srs_remark  = $this->input->post('srs_remark'); 

                $arr_update = array(
                    'srs_image_name'    => $new_img_filename,
                    'srs_remark'    => $srs_remark

                );
                    $arr_where     = array("enquiry_id" => $enquiry_id);
                    $inserted_id= $this->master_model->updateRecord('booking_payment_details',$arr_update,$arr_where);
                    if($inserted_id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                        redirect($this->module_url_path_payment_receipt.'/index/'.$enquiry_id);
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index');

          
        }
        
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_payment_receipt'] = $this->module_url_path_payment_receipt;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }


    public function booking_confirm_verify_otp()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

             $verify_otp = $this->input->post('verify_otp');
             $mobile_no = $this->input->post('mobile_no'); 
             $enquiry_id = $this->input->post('enquiry_id'); 
            // echo $booking_ref_no = $this->input->post('booking_ref_no');  die;

            $record = array();
            $fields = "booking_payment_details.*";
            $this->db->where('is_deleted','no');
            $this->db->where('booking_confirm_traveler_otp',$verify_otp);
            $this->db->where('booking_tm_mobile_no',$mobile_no);
            $this->db->where('enquiry_id',$enquiry_id);
            $booking_payment_details_info = $this->master_model->getRecord('booking_payment_details');

            // print_r($booking_payment_details_info); die;

            if($booking_payment_details_info !=''){

                
                $journey_date  = $this->input->post('journey_date');

                $traveller_id  = $this->input->post('traveller_id');
                $enquiry_id    = $this->input->post('enquiry_id'); 
                $hotel_name_id    = $this->input->post('hotel_name_id'); 
                $package_date_id    = $this->input->post('package_date_id'); 
                $package_id    = $this->input->post('package_id'); 
                $today = date('y-m-d');
                
                $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

                $arr_insert = array(
                    'enquiry_id'   =>   $enquiry_id,
                    'hotel_name_id'   =>   $hotel_name_id,
                    'package_date_id'   =>   $package_date_id,
                    'package_id'   =>   $package_id,
                    'booking_date'   =>   $today,
                    'traveller_id'   =>   $traveller_id,
                    'booking_reference_no'  =>  $booking_reference_no,
                    'agent_id'   =>   $id,
                    'booking_status'   =>  'confirm'
                );
              
                $arr_where     = array("enquiry_id" => $enquiry_id);
                $inserted_id = $this->master_model->updateRecord('final_booking',$arr_insert,$arr_where);

                $arr_update = array(
                    'booking_done'   =>   'yes'
                );
                $arr_where     = array("id" => $enquiry_id);
                $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);

                $arr_update = array(
                    'booking_done'   =>   'yes'
                );
                $arr_where     = array("domestic_enquiry_id" => $enquiry_id);
                $this->master_model->updateRecord('booking_basic_info',$arr_update,$arr_where);

                $arr_update1 = array(
                    'is_book'    =>  'yes',
                    'booking_reference_no'=>$booking_reference_no, 

                );
                $arr_where1     = array("enquiry_id" => $enquiry_id);
                $this->master_model->updateRecord('bus_seat_book',$arr_update1,$arr_where1);
               

                echo 'true';
            }else {
                echo 'false';
            }
// die;
        
    }

    public function get_payment_type(){ 
        $today= date('Y-m-d');
        $sra_no = $this->input->post('sra_no');
         // print_r($boarding_office_location); die;

        //  if()
                         $this->db->where('is_deleted','no');
                         $this->db->where('payment_confirmed_status !=','Payment Not Paid');
                         $this->db->where('sra_no',$sra_no);
                         $data = $this->master_model->getRecords('sra_booking_payment_details');
                        //  print_r($data); die;
        echo json_encode($data);
    }
}