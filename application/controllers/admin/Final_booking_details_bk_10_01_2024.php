<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Final_booking_details extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/final_booking_details";
        $this->module_title       = "Final Booking Details ";
        $this->module_url_slug    = "final_booking_details";
        $this->module_view_folder = "final_booking_details/";
        $this->arr_view_data = [];
	 }

     public function index()
     {

        $record = array();
        $fields = "packages.*,final_booking.package_id,final_booking.package_date_id,package_date.id,package_date.journey_date";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->group_by('package_date.id','package.id'); 
        $this->db->join("final_booking", 'final_booking.package_id=packages.id','right');
        $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','right');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
    //    print_r($arr_data); die;

         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
     }


     public function sub_index()
     {

         $record = array();
         $fields = "final_booking.*,packages.id,packages.tour_title,package_date.id,package_date.journey_date,hotel.id,hotel.hotel_name";
         $this->db->where('final_booking.is_deleted','no');
         $this->db->join("packages", 'final_booking.package_id=packages.id','left');
         $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','left');
         $this->db->join("hotel", 'final_booking.hotel_name_id=hotel.id','left');
         $arr_data = $this->master_model->getRecords('final_booking',array('final_booking.is_deleted'=>'no'),$fields);
        

         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."sub_index";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
     }

    // Get Details 
    public function details($id)
    {
        // echo $id;
		//  $id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        $record = array();
        $fields = "booking_basic_info.*,packages.id as pid,packages.tour_title,packages.tour_number,packages.tour_number,package_date.journey_date,package_hotel.package_id,package_hotel.hotel_name_id,package_date.id as p_date_id";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('domestic_enquiry_id',$id);
        $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');
        $this->db->join("package_date", 'package_date.id=booking_basic_info.tour_date','left');
        $this->db->join("package_hotel", 'package_hotel.package_id=packages.id','left');
        $traveller_booking_info = $this->master_model->getRecords('booking_basic_info',array('booking_basic_info.is_deleted'=>'no'),$fields);

        foreach($traveller_booking_info  as $traveller_booking_pdate){
            $p_date = $traveller_booking_pdate['p_date_id'];
        }
        // print_r($p_date); die; 

        $record = array();
        $fields = "all_traveller_info.*";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$id);
        $arr_data = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);
        
        $record = array();
        $fields = "seat_type_room_type.*";
        $this->db->where('seat_type_room_type.is_deleted','no');
        $this->db->where('seat_type_room_type.domestic_enquiry_id',$id);
        $seat_type_room_type_data = $this->master_model->getRecords('seat_type_room_type',array('seat_type_room_type.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "bus_seat_book.*";
        $this->db->where('bus_seat_book.is_deleted','no');
        $this->db->where('bus_seat_book.enquiry_id',$id);
        $bus_seat_book_data = $this->master_model->getRecords('bus_seat_book',array('bus_seat_book.is_deleted'=>'no'),$fields);
        // print_r($bus_seat_book_data); die; 

        $record = array();
        $fields = "booking_payment_details.*";
        $this->db->where('booking_payment_details.is_deleted','no');
        $this->db->where('booking_payment_details.enquiry_id',$id);
        $booking_payment_details_data = $this->master_model->getRecords('booking_payment_details',array('booking_payment_details.is_deleted'=>'no'),$fields);
        // print_r($bus_seat_book_data); die; 

        $record = array();
        $fields = "extra_services_details.*";
        $this->db->where('extra_services_details.is_deleted','no');
        $this->db->where('extra_services_details.enquiry_id',$id);
        // $this->db->group_by('extra_services'); 
        $extra_services_details_data = $this->master_model->getRecords('extra_services_details',array('extra_services_details.is_deleted'=>'no'),$fields);
        // print_r($extra_services_details_data); die;

        // $record = array();
        // $fields = "approve_extra_services.*";
        // $this->db->where('approve_extra_services.is_deleted','no');
        // $this->db->where('approve_extra_services.enquiry_id',$id);
        // $approve_extra_services_data = $this->master_model->getRecords('approve_extra_services',array('approve_extra_services.is_deleted'=>'no'),$fields);
        // print_r($approve_extra_services_data); die;
        // foreach($approve_extra_services_data as $approve_extra_services_data_info){
        //     $cost = $approve_extra_services_data_info['service_cost'];
        // }
        // print_r($cost); die;

        $record = array();
        $fields = "special_req_master.*";
        $this->db->where('special_req_master.is_deleted','no');
        $this->db->where('special_req_master.is_active','yes');
        $special_req_master_data = $this->master_model->getRecords('special_req_master',array('special_req_master.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;


        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['p_date']        = $p_date;
        $this->arr_view_data['seat_type_room_type_data']        = $seat_type_room_type_data;
        $this->arr_view_data['bus_seat_book_data']        = $bus_seat_book_data;
        $this->arr_view_data['booking_payment_details_data'] = $booking_payment_details_data;
        $this->arr_view_data['extra_services_details_data'] = $extra_services_details_data;
        // $this->arr_view_data['approve_extra_services_data'] = $approve_extra_services_data;
        $this->arr_view_data['special_req_master_data'] = $special_req_master_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function approve_extra_services()
    {   
       
                $id = $this->input->post('id'); 
                $enquiry_id = $this->input->post('enquiry_id'); 
                $package_id = $this->input->post('package_id'); 
                $package_date_id = $this->input->post('package_date_id'); 
 
                $is_approve = $this->input->post('is_approve');  
                $service_cost = $this->input->post('service_cost'); 

                $count = count($is_approve);
                for($i=0;$i<$count;$i++)
                {
                    $arr_update = array(
                        'is_approve'   =>   $_POST["is_approve"][$i],
                        'service_cost' =>   $_POST["service_cost"][$i]
                    );
                    // print_r($arr_update); die;
                    $arr_where     = array("id" => $id[$i]);
                    $this->master_model->updateRecord('extra_services_details',$arr_update,$arr_where);
                    //  $this->master_model->insertRecord('extra_services_details',$arr_update,true);
                }

                if($enquiry_id!=''){
                    echo true;

                }else {
                    echo false;
                }
            
        
    }


}