<?php 
//   Controller for: home page
// Author: Rupali / Vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra_services extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/extra_services";
        $this->module_url_booking_process    =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process";
        $this->module_url_path_back    =  base_url().$this->config->item('agent_panel_slug')."/seat_type_room_type";
        $this->module_url_path_index   =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_process/index";
        $this->module_url_path_payment_receipt   =  base_url().$this->config->item('agent_panel_slug')."/payment_receipt";
        $this->module_url_booking_preview   =  base_url().$this->config->item('agent_panel_slug')."/booking_preview";
        $this->module_title       = "Extra Services";
        $this->module_view_folder = "extra_services/";
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

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['mob_no_booking_payment'] = $mob_no_booking_payment;
        $this->arr_view_data['enquiry']        = $enquiry;
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
        $this->arr_view_data['module_url_path_back'] = $this->module_url_path_back;
        $this->arr_view_data['module_url_booking_process'] = $this->module_url_booking_process;
        $this->arr_view_data['module_url_path_payment_receipt'] = $this->module_url_path_payment_receipt;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);

    }
    public function extra_services($iid)
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        if($this->input->post('extra_services'))
        {
            $mobile_no = $this->input->post('mobile_no');
            $enquiry_id = $this->input->post('enquiry_id');

            $extra_sevices_id = $this->input->post('extra_sevices_id');

        // $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;
        //================================================================================================================== 
       
        $extra_services = $this->input->post('extra_services');
            // print_r($extra_services); die;
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
           'enquiry_id' => $enquiry_id
       );

        $this->db->where('is_deleted', 'no');
        $this->db->where('extra_services_details.enquiry_id', $enquiry_id);
        $existing_services_details = $this->master_model->getRecords('extra_services_details');
        if(!empty($existing_services_details)){
        foreach ($existing_services_details as $existing_service) {
        if (in_array($existing_service['select_services'], $selected_services)) {
            $arr_insert2 = array(
                'extra_services' => $extra_services
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
        }
   
        if($inserted_id > 0)
        {    
            $this->session->set_flashdata('success_message',"Final Booking Done Successfully.");
            redirect($this->module_url_booking_preview.'/index/'.$enquiry_id);
        }
        else
        {
            $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
        }
        redirect($this->module_url_path.'/index');
        }


        $record = array();
        $fields = "booking_basic_info.*,packages.id as pid,packages.tour_title,packages.tour_number,packages.tour_number,package_date.journey_date,package_hotel.package_id,package_hotel.hotel_name_id";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$iid);
        $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');
        $this->db->join("package_date", 'package_date.id=booking_basic_info.tour_date','left');
        $this->db->join("package_hotel", 'package_hotel.package_id=packages.id','left');
        $traveller_booking_info = $this->master_model->getRecords('booking_basic_info',array('booking_basic_info.is_deleted'=>'no'),$fields);

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

        $record = array();
        $fields = "all_traveller_info.*,relation.relation";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$iid);
        $this->db->join("relation", 'relation.id=all_traveller_info.all_traveller_relation','left');
        $arr_data = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        $this->db->where('is_deleted','no');
        $this->db->where('extra_services_details.enquiry_id',$iid);
        // $this->db->group_by('extra_services');
        $extra_services = $this->master_model->getRecord('extra_services_details');
        // print_r($extra_services); die;

        $record = array();
        $fields = "special_req_master.*";
        $this->db->where('special_req_master.is_deleted','no');
        $this->db->where('special_req_master.is_active','yes');
        $special_req_master_data = $this->master_model->getRecords('special_req_master',array('special_req_master.is_deleted'=>'no'),$fields);
        // print_r($special_req_master_data); die;

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['extra_services_details']        = $extra_services_details;
        $this->arr_view_data['extra_services']        = $extra_services;
        $this->arr_view_data['special_req_master_data']        = $special_req_master_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['action']          = 'extra_services';
        $this->arr_view_data['page_title']      = " extra_services ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_booking_preview'] = $this->module_url_booking_preview;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
                    
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

            $record = array();
            $fields = "final_booking.*";
            $this->db->where('is_deleted','no');
            $this->db->where('enquiry_id',$enquiry_id);
            $final_booking_details = $this->master_model->getRecord('final_booking');

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
              

                if(!empty($final_booking_details)){
                $arr_where     = array("enquiry_id" => $enquiry_id);
                $inserted_id = $this->master_model->updateRecord('final_booking',$arr_insert,$arr_where);
                } else{
                $inserted_id = $this->master_model->insertRecord('final_booking',$arr_insert,true);
                }

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


            public function booking_resend_otp()
        { 
            // echo 'hiiiii IN Controller'; die;
            $agent_sess_name = $this->session->userdata('agent_name');
            $id=$this->session->userdata('agent_sess_id');
                
                $booking_tm_mobile_no = $this->input->post('booking_tm_mobile_no');
                $crediential_mobile_no = $this->input->post('crediential_mobile_no');

                $enquiry_id = $this->input->post('enquiry_id');

                $alphabet = '1234567890';
                $otp = str_shuffle($alphabet);
                $traveler_otp = substr($otp, 0, '6'); 

                $from_email='test@choudharyyatra.co.in';
                
                $authKey = "1207168241267288907";
                
            $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
            $senderId  = "CYCPLN";
            
            $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$crediential_mobile_no&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
            
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
                        'booking_tm_mobile_no'   =>   $crediential_mobile_no,
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

            // print_r($_REQUEST);
            // die;
            $crediential_mobile_no = $this->input->post('crediential_mobile_no');
            // print_r($crediential_mobile_no); die;
            $enquiry_id = $this->input->post('enquiry_id');
            $traveller_id = $this->input->post('traveller_id');
            $package_id = $this->input->post('package_id');
            $journey_date = $this->input->post('journey_date');
            $package_date_id = $this->input->post('package_date_id');

            $booking_payment_details_id = $this->input->post('booking_payment_details_id');

            // $extra_services = $this->input->post('extra_services');
            // $select_services = $this->input->post('select_services');

            // if ($this->input->post('select_services')) {
            //     $select_services = implode(",", $this->input->post('select_services'));
            // } else {
            //     $select_services = '';
            // }
            
            // $extra_services = $this->input->post('extra_services'); // Make sure $extra_services is defined
            
            // $selected_services = explode(',', $select_services);

            // foreach ($selected_services as $selected_service) {
            //     $arr_insert2 = array(
            //         'select_services' => $selected_service,
            //         'extra_services' => $extra_services,
            //         'enquiry_id' => $enquiry_id,
            //     );

                
            //     $existing_service = $this->master_model->getRecord('extra_services_details', array('select_services' => $selected_service, 'enquiry_id' => $enquiry_id));

            //     // print_r($existing_service);
            //     // die;
            //     if (!empty($existing_service)) {
            //         // Update existing record
            //         // echo 'if';
            //         $arr_where = array("id" => $existing_service['id']);
            //         $inserted_id = $this->master_model->updateRecord('extra_services_details', $arr_insert2, $arr_where);
            //     } else {
            //         // Insert new record
            //         // echo 'else';
            //         $inserted_id = $this->master_model->insertRecord('extra_services_details', $arr_insert2, true);
            //     }
            // }
            
// die;
            $alphabet = '1234567890';
            $otp = str_shuffle($alphabet);
            $traveler_otp = substr($otp, 0, '6'); 

            $from_email='test@choudharyyatra.co.in';
            
            $authKey = "1207168241267288907";
            
        $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
        $senderId  = "CYCPLN";
        
        $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$crediential_mobile_no&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
        
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
                    'booking_tm_mobile_no'   =>   $crediential_mobile_no,
                    'booking_confirm_traveler_otp'   =>   $traveler_otp
                );
                // print_r($arr_insert); die;
                    $arr_where     = array("enquiry_id" => $enquiry_id);
                    $inserted_id = $this->master_model->updateRecord('booking_payment_details',$arr_insert,$arr_where);

            // -------------------------------------------------------------------------------------------------
                    // $extra_services = $this->input->post('extra_services');
                    // print_r($extra_services); die;

            //         if($this->input->post('select_services')!=''){
            //            $select_services = implode(",",$this->input->post('select_services'));
            //         }else{
            //            $select_services = '';
            //         }    
            
            //        $selected_services=explode(',',$select_services);
            
            //        // print_r($selected_services); 
            //        // $ccc=count($selected_services);
                   
            //        for($i=0;$i<count($selected_services);$i++){
                       
            //         $arr_insert2 = array(
            //            'select_services' => $selected_services[$i],
            //            'extra_services' => $extra_services[$i],
            //            // 'booking_reference_no'  =>  $booking_reference_no,
            //            // 'package_date_id' => $package_date_id,
            //            'enquiry_id' => $enquiry_id,
            //            // 'package_id' => $package_id,
            //            // 'traveller_id' => $traveller_id
            //        );
            
            //         $this->db->where('is_deleted', 'no');
            //         $this->db->where('extra_services_details.enquiry_id', $enquiry_id);
            //         $existing_services_details = $this->master_model->getRecords('extra_services_details');
            //     if(!empty($existing_services_details)){
            //         foreach ($existing_services_details as $existing_service) {
            //         if (in_array($existing_service['select_services'], $selected_services)) {
            //             $arr_insert2 = array(
            //                 'extra_services' => $extra_services,
            //             );
            
            //         $arr_where = array("id" => $existing_service['id']);
            //         $inserted_id = $this->master_model->updateRecord('extra_services_details', $arr_insert2, $arr_where);
            
            //         $key = array_search($existing_service['select_services'], $selected_services);
            //         unset($selected_services[$key]);
            //     } else {
            //         $arr_update = array(
            //             'select_services' => $selected_services[$i],
            //         );
            
            //         $arr_where = array("id" => $existing_service['id']);
            //         $this->master_model->updateRecord('extra_services_details', $arr_update, $arr_where);
            //     }
            // }
            //     }else{
            //         foreach ($selected_services as $selected_service) {
            //             $arr_insert2 = array(
            //                 'select_services' => $selected_service,
            //                 'extra_services'  => $extra_services,
            //                 'enquiry_id'      => $enquiry_id,
            //             );
            //         $inserted_id = $this->master_model->insertRecord('extra_services_details',$arr_insert2,true);
            //         }
            //     }
            // }
        if($inserted_id!=''){   
           echo true;

       }else {
           echo false;
       }

    
    }

    public function edit()
    {
            if($this->input->post('booking_submit_otp'))
            {
                print_r($_REQUEST); die;
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

            $crediential_mobile_no = $this->input->post('crediential_mobile_no');
		    $extra_services = $this->input->post('extra_services');
            $selected_services = $this->input->post('select_services');
            // print_r($select_services); die;


            $extra_services = $this->input->post('extra_services'); // Make sure $extra_services is defined
            
            // $selected_services = explode(',', $select_services);

            foreach ($selected_services as $selected_service) {
                $arr_insert2 = array(
                    'select_services' => $selected_service,
                    'extra_services' => $extra_services,
                    'enquiry_id' => $enquiry_id,
                );

                
                $existing_service = $this->master_model->getRecord('extra_services_details', array('select_services' => $selected_service, 'enquiry_id' => $enquiry_id));

                // print_r($existing_service);
                // die;
                if (!empty($existing_service)) {
                    // Update existing record
                    // echo 'if';
                    $arr_where = array("id" => $existing_service['id']);
                    $inserted_id = $this->master_model->updateRecord('extra_services_details', $arr_insert2, $arr_where);
                } else {
                    // Insert new record
                    // echo 'else';
                    $inserted_id = $this->master_model->insertRecord('extra_services_details', $arr_insert2, true);
                }
            }

            // echo $crediential_mobile_no; 
            // echo $enquiry_id;
            // echo $verify_otp; die;
            $record = array();
            $fields = "booking_payment_details.*";
            $this->db->where('is_deleted','no');
            $this->db->where('booking_confirm_traveler_otp',$verify_otp);
            $this->db->where('booking_tm_mobile_no',$crediential_mobile_no);
            $this->db->where('enquiry_id',$enquiry_id);
            $booking_payment_details_info = $this->master_model->getRecord('booking_payment_details');

            // print_r($booking_payment_details_info); die;

            if($booking_payment_details_info !=''){

                // print_r('hiiiiiiiiiiii'); die;
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
                // print_r($arr_insert); die;
                // $arr_where     = array("enquiry_id" => $enquiry_id);
                $inserted_id = $this->master_model->insertRecord('final_booking',$arr_insert, true);

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
}