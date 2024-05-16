<?php 
//   Controller for: home page
// Author: Rupali / Vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class In_process_booking_details extends CI_Controller {
	 
	function __construct() {
        parent::__construct();
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login');
        }
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/in_process_booking_details";
        $this->module_pending_amt    =  base_url().$this->config->item('admin_panel_slug')."/pending_amount";
        $this->module_url_booking_process    =  base_url().$this->config->item('admin_panel_slug')."/domestic_booking_process";
        $this->module_url_path_back    =  base_url().$this->config->item('admin_panel_slug')."/seat_type_room_type";
        $this->module_url_path_index   =  base_url().$this->config->item('admin_panel_slug')."/domestic_booking_process/index";
        $this->module_url_path_payment_receipt   =  base_url().$this->config->item('admin_panel_slug')."/payment_receipt";
        $this->module_url_path_submit_next   =  base_url().$this->config->item('admin_panel_slug')."/srs_form";
        $this->module_title       = "In Process Booking Details";
        $this->module_view_folder = "in_process_booking_details/";
        $this->arr_view_data = [];
	 }

     public function index($id)
     {
        // $agent_sess_name = $this->session->userdata('agent_name');
        // $id = $this->session->userdata('agent_sess_id');
 
         $record = array();
         $fields = "packages.*,final_booking.agent_id,final_booking.package_id,final_booking.package_date_id,package_date.id as p_date_id,package_date.journey_date,booking_enquiry.id";
         $this->db->where('packages.is_deleted','no');
         $this->db->where('packages.is_active','yes');
         $this->db->where('final_booking.payment_confirmed_status','In Process');
         $this->db->group_by('package_date.id','package.id');
         $this->db->where('final_booking.agent_id',$id); 
         $this->db->join("final_booking", 'final_booking.package_id=packages.id','right');
         $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','right');
         $this->db->join("booking_enquiry", 'final_booking.enquiry_id=booking_enquiry.id','right');
        //  $this->db->where('booking_enquiry.agent_id',$id);
         $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
 
        //  $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
     }


     public function details($iid)
     {
        // echo $iid;

        // $agent_sess_name = $this->session->userdata('agent_name');
        // $id=$this->session->userdata('agent_sess_id');

        $record = array();
        $fields = "booking_basic_info.*,packages.id as pid,packages.tour_title,packages.tour_number,
        packages.tour_number,package_date.journey_date,package_hotel.package_id,package_hotel.hotel_name_id,
        package_date.id as p_date_id,booking_payment_details.package_id,booking_payment_details.package_date_id,booking_payment_details.agent_id";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('booking_payment_details.enquiry_id',$iid);
        $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');
        $this->db->join("package_date", 'package_date.id=booking_basic_info.tour_date','left');
        $this->db->join("package_hotel", 'package_hotel.package_id=packages.id','left');
        $this->db->join("booking_payment_details", 'booking_basic_info.domestic_enquiry_id=booking_payment_details.enquiry_id','left');
        $this->db->group_by('booking_payment_details.enquiry_id');
        $traveller_booking_info = $this->master_model->getRecords('booking_basic_info',array('booking_basic_info.is_deleted'=>'no'),$fields);

        // print_r($traveller_booking_info); die;
        foreach($traveller_booking_info  as $traveller_booking_pdate){
            $p_id = $traveller_booking_pdate['package_id'];
            $p_date_id = $traveller_booking_pdate['package_date_id'];
            $agent_id = $traveller_booking_pdate['agent_id'];
        }
        // print_r($p_date); die; 

        $record = array();
        $fields = "all_traveller_info.*,relation.relation,courtesy_titles.courtesy_titles_name";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$iid);
        $this->db->join("relation", 'relation.id=all_traveller_info.all_traveller_relation','left');
        $this->db->join("courtesy_titles", 'courtesy_titles.id=all_traveller_info.mr/mrs','left');
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
        $fields = "extra_services_details.*,special_req_master.service_name";
        $this->db->where('extra_services_details.is_deleted','no');
        $this->db->where('extra_services_details.enquiry_id',$iid);
        $this->db->join("special_req_master", 'extra_services_details.select_services=special_req_master.id','left');
        $extra_services_deatils = $this->master_model->getRecords('extra_services_details',array('extra_services_details.is_deleted'=>'no'),$fields);
        // print_r($extra_services_deatils); die;

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

        // print_r($booking_payment_details_all); die;
        // print_r($booking_payment_details_all); die;


        $this->db->where('is_deleted','no');
        $this->db->where('booking_payment_details.enquiry_id',$iid);
        $booking_payment_details_all = $this->master_model->getRecords('booking_payment_details');
        // print_r($booking_payment_details_all); die;

        $this->db->where('is_deleted','no');
        $this->db->where('booking_payment_details.enquiry_id',$iid);
        $booking_payment_details = $this->master_model->getRecord('booking_payment_details');
        // print_r($booking_payment_details); die;

        $enquiry = ($booking_payment_details['enquiry_id']);
        $package_date = ($booking_payment_details['package_date_id']); 
        // print_r($enquiry); die;

        $this->db->where('is_deleted','no');
        $this->db->where('return_customer_booking_payment_details.enquiry_id',$iid);
        $return_customer_booking_payment_details = $this->master_model->getRecord('return_customer_booking_payment_details');
        // print_r($return_customer_booking_payment_details); die;

        $fields = "booking_payment_details.*,qr_code_master.qr_code_image";
        $this->db->where('booking_payment_details.is_deleted','no');
        $this->db->where('booking_payment_details.enquiry_id',$iid);
        $this->db->join("qr_code_master", 'booking_payment_details.QR_holder_name=qr_code_master.id','left');
        $qr_image_details = $this->master_model->getRecord('booking_payment_details');
        // print_r($qr_image_details); die; 
           

        // $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['p_id']        = $p_id;
        $this->arr_view_data['p_date_id']        = $p_date_id;
        $this->arr_view_data['agent_id']        = $agent_id;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['enquiry']        = $enquiry;
        $this->arr_view_data['package_date']        = $package_date;
        $this->arr_view_data['qr_image_details']        = $qr_image_details;
        $this->arr_view_data['return_customer_booking_payment_details']        = $return_customer_booking_payment_details;
        $this->arr_view_data['booking_payment_details']        = $booking_payment_details;
        $this->arr_view_data['extra_services_details']        = $extra_services_details;
        $this->arr_view_data['booking_payment_details_all']        = $booking_payment_details_all;
        $this->arr_view_data['extra']        = $extra;
        $this->arr_view_data['extra_services']        = $extra_services;
        $this->arr_view_data['extra_services_deatils']        = $extra_services_deatils;
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
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);

    }


    public function sub_index($agent_id,$pid,$pdate_id)
     {
        // $agent_sess_name = $this->session->userdata('agent_name');
        // $iid = $this->session->userdata('agent_sess_id');

         $record = array();
         $fields = "final_booking.*,packages.id,packages.tour_title,package_date.id,package_date.journey_date,hotel.id,hotel.hotel_name,
         booking_payment_details.enquiry_id as enq,booking_payment_details.srs_image_name,all_traveller_info.first_name,all_traveller_info.middle_name,
         all_traveller_info.last_name,booking_payment_details.run_pending_amt";
         $this->db->where('final_booking.is_deleted','no');
         $this->db->where('final_booking.package_id',$pid);
         $this->db->where('final_booking.package_date_id',$pdate_id);
         $this->db->where('final_booking.agent_id',$agent_id);
         $this->db->where('all_traveller_info.for_credentials','yes');
         $this->db->where('final_booking.payment_confirmed_status','In Process');
         $this->db->join("packages", 'final_booking.package_id=packages.id','left');
         $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','left');
         $this->db->join("hotel", 'final_booking.hotel_name_id=hotel.id','left');
         $this->db->join("booking_payment_details", 'final_booking.enquiry_id=booking_payment_details.enquiry_id','right');
         $this->db->join("all_traveller_info", 'final_booking.enquiry_id=all_traveller_info.domestic_enquiry_id','right');
         $this->db->group_by('enquiry_id');
         $arr_data = $this->master_model->getRecords('final_booking',array('final_booking.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        foreach($arr_data  as $info){
            $agent_id = $info['agent_id'];
        }
        //  $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['agent_id']        = $agent_id;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_pending_amt'] = $this->module_pending_amt;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."sub_index";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
     }


     public function agent_index()
     {
        // $agent_sess_name = $this->session->userdata('agent_name');
        // $iid = $this->session->userdata('agent_sess_id');

         $record = array();
         $fields = "final_booking.*,packages.id,packages.tour_title,package_date.id,package_date.journey_date,hotel.id,hotel.hotel_name,
         booking_payment_details.enquiry_id as enq,booking_payment_details.srs_image_name,all_traveller_info.first_name,all_traveller_info.middle_name,
         all_traveller_info.last_name,booking_payment_details.run_pending_amt,agent.agent_name";
         $this->db->where('final_booking.is_deleted','no');
        //  $this->db->where('final_booking.package_date_id',$id);
         $this->db->where('all_traveller_info.for_credentials','yes');
         $this->db->where('final_booking.payment_confirmed_status','In Process');
         $this->db->join("packages", 'final_booking.package_id=packages.id','left');
         $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','left');
         $this->db->join("hotel", 'final_booking.hotel_name_id=hotel.id','left');
         $this->db->join("booking_payment_details", 'final_booking.enquiry_id=booking_payment_details.enquiry_id','right');
         $this->db->join("all_traveller_info", 'final_booking.enquiry_id=all_traveller_info.domestic_enquiry_id','right');
        //  $this->db->group_by('enquiry_id'); 
         $this->db->group_by('final_booking.agent_id');
         $this->db->join("agent", 'final_booking.agent_id=agent.id','right');
         $arr_data = $this->master_model->getRecords('final_booking',array('final_booking.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        //  $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_pending_amt'] = $this->module_pending_amt;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."agent_index";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
     }

     
    public function cust_otp()
    { 
        // echo 'hiiiii IN Controller'; die;
        // $agent_sess_name = $this->session->userdata('agent_name');
        // $id=$this->session->userdata('agent_sess_id');
        // print_r($id); die;

            $enquiry_id = $this->input->post('enquiry_id');
            $traveller_id = $this->input->post('traveller_id');
            $package_id = $this->input->post('package_id');
            $journey_date = $this->input->post('journey_date');
            $package_date_id = $this->input->post('package_date_id');
            $booking_payment_details_id = $this->input->post('booking_payment_details_id');
            // $booking_on = $this->input->post('booking_on');

            $arr_insert = array(
                'enquiry_id' => $enquiry_id,
                'package_id' => $package_id,
                'traveller_id' => $traveller_id,
                'package_date_id' => $package_date_id,
                'agent_id'   =>  $id
            );

            
            $this->db->where('is_deleted','no');
            $this->db->where('enquiry_id',$enquiry_id);
            $final_booking_details = $this->master_model->getRecord('final_booking');

            if(!empty($final_booking_details)){
                $arr_where     = array("enquiry_id" => $enquiry_id);
                $inserted_id = $this->master_model->updateRecord('final_booking',$arr_insert,$arr_where);
            }else{
             $inserted_id = $this->master_model->insertRecord('final_booking',$arr_insert,true);
             $insertid = $this->db->insert_id();
            }

            $arr_insert = array(
                'enquiry_id' => $enquiry_id,
                'package_id' => $package_id,
                'traveler_id' => $traveller_id,
                'package_date_id' => $package_date_id,
                'take_enquiry_by_agent_id'   =>  $id
            );
            $this->db->where('is_deleted','no');
            $this->db->where('confirm_booking.traveler_id',$traveller_id);
            $confirm_booking_details = $this->master_model->getRecord('confirm_booking');
            // print_r($confirm_booking_details); die;

            if(!empty($confirm_booking_details)){
                $arr_where     = array("traveler_id" => $traveller_id);
                $inserted_id = $this->master_model->updateRecord('confirm_booking',$arr_insert,$arr_where);
            }else{
             $inserted_id = $this->master_model->insertRecord('confirm_booking',$arr_insert,true);
             $insertid = $this->db->insert_id();
            }


                $arr_insert = array(
                    'enquiry_id' => $enquiry_id,
                    'package_id' => $package_id,
                    'traveller_id' => $traveller_id,
                    'package_date_id' => $package_date_id,
                    'booking_preview_status'   =>  'Done'
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
                

                
        if($inserted_id!=''){
           echo true;

       }else {
           echo false;
       }

    }

    public function cust_otp_back_btn()
    { 
        // echo 'hiiiii IN Controller'; die;
        // $agent_sess_name = $this->session->userdata('agent_name');
        // $id=$this->session->userdata('agent_sess_id');

            $enquiry_id = $this->input->post('enquiry_id');
            $traveller_id = $this->input->post('traveller_id');
            $package_id = $this->input->post('package_id');
            $journey_date = $this->input->post('journey_date');
            $package_date_id = $this->input->post('package_date_id');
            $booking_payment_details_id = $this->input->post('booking_payment_details_id');
            

                $arr_insert = array(
                    'enquiry_id' => $enquiry_id,
                    'package_id' => $package_id,
                    'traveller_id' => $traveller_id,
                    'package_date_id' => $package_date_id,
                    'booking_preview_status'   =>  'Done'
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
                

                
        if($inserted_id!=''){
           echo true;

       }else {
           echo false;
       }

    }

    
        
}