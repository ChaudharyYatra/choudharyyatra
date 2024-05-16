<?php 
//   Controller for: home page
// Author: Rupali / Vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_preview extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/booking_preview";
        $this->module_url_booking_process    =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process";
        $this->module_url_path_back    =  base_url().$this->config->item('agent_panel_slug')."/seat_type_room_type";
        $this->module_url_path_index   =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process/index";
        $this->module_url_path_payment_receipt   =  base_url().$this->config->item('agent_panel_slug')."/payment_receipt";
        $this->module_title       = "Booking Preview";
        $this->module_view_folder = "booking_preview/";
        $this->arr_view_data = [];
	 }

    public function index($iid)
    {

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
        // print_r($arr_data); die;


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

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['upi_qr_data']        = $upi_qr_data;
        $this->arr_view_data['special_req_master_data']        = $special_req_master_data;
        $this->arr_view_data['traveller_id_data']        = $traveller_id_data;
        $this->arr_view_data['seat_type_room_type_data']        = $seat_type_room_type_data;
        $this->arr_view_data['bus_seat_book_data']        = $bus_seat_book_data;
        $this->arr_view_data['arr_package_info']        = $arr_package_info;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_back'] = $this->module_url_path_back;
        $this->arr_view_data['module_url_booking_process'] = $this->module_url_booking_process;
        $this->arr_view_data['module_url_path_payment_receipt'] = $this->module_url_path_payment_receipt;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."booking_preview";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);

    }

    public function cust_otp()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');


            $booking_amt = $this->input->post('booking_amt');
            $final_amt = $this->input->post('final_amt');
            $payment_type = $this->input->post('payment_type');
            $mobile_no = $this->input->post('mobile_no');
            $pending_amt = $this->input->post('pending_amt');
            $select_transaction = $this->input->post('select_transaction');
            // print_r($select_transaction);
            
            $upi_holder_name = $this->input->post('upi_holder_name');
            $upi_payment_type = $this->input->post('upi_payment_type');
            // print_r($upi_holder_name); die;
            $upi_self_no = $this->input->post('upi_self_no');
            $upi_reason = $this->input->post('upi_reason');

            $qr_holder_name = $this->input->post('qr_holder_name');
            $qr_mobile_number = $this->input->post('qr_mobile_number');
            $qr_payment_type = $this->input->post('qr_payment_type');
            $qr_upi_no = $this->input->post('qr_upi_no');


            $upi_no = $this->input->post('upi_no');
            $cheque = $this->input->post('cheque');
            $bank_name = $this->input->post('bank_name');
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
                    'booking_tm_mobile_no'   =>   $mobile_no,
                    'select_transaction'   =>   $select_transaction,
                    
                    'UPI_holder_name'   =>   $upi_holder_name,
                    'upi_payment_type'   =>   $upi_payment_type,
                    'UPI_transaction_no'   =>   $upi_self_no,
                    'UPI_reason'   =>   $upi_reason,

                    'QR_holder_name'   =>   $qr_holder_name,
                    'QR_mobile_number'   =>   $qr_mobile_number,
                    'QR_payment_type'   =>   $qr_payment_type,
                    'QR_transaction_no'   =>   $qr_upi_no,

                    'upi_no'   =>   $upi_no,
                    'cheque'   =>   $cheque,
                    'bank_name'   =>   $bank_name,
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

                    'traveler_otp'   =>   $traveler_otp,
                    'booking_status'   =>  'confirm'
                );
                // print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('booking_payment_details',$arr_insert,true);
                 $insertid = $this->db->insert_id();
                
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
                    'booking_payment_details_id'   =>   $insertid
                );
                // print_r($arr_insert); die;
                $inserted_id = $this->master_model->insertRecord('return_customer_booking_payment_details',$arr_insert_return,true);

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
                    // 'enquiry_id' => $enquiry_id,
                    // 'package_id' => $package_id,
                    // 'traveller_id' => $traveller_id
                );

                $inserted_id2 = $this->master_model->insertRecord('extra_services_details',$arr_insert2,true);
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
                        'traveler_otp'   =>   $traveler_otp
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

    public function verify_otp()
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
            $this->db->where('traveler_otp',$verify_otp);
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
              
                
                $inserted_id = $this->master_model->insertRecord('final_booking',$arr_insert,true);

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
    
}