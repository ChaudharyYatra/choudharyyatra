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
        $fields = "all_traveller_info.*";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$iid);
        $arr_data = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);
        
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

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['seat_type_room_type_data']        = $seat_type_room_type_data;
        $this->arr_view_data['bus_seat_book_data']        = $bus_seat_book_data;
        $this->arr_view_data['arr_package_info']        = $arr_package_info;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_back'] = $this->module_url_path_back;
        $this->arr_view_data['module_url_booking_process'] = $this->module_url_booking_process;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."booking_preview";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);

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
               
                $enquiry_id    = $this->input->post('enquiry_id'); 
                $hotel_name_id    = $this->input->post('hotel_name_id'); 
                $package_date_id    = $this->input->post('package_date_id'); 
                $package_id    = $this->input->post('package_id'); 
                $traveller_id    = $this->input->post('traveller_id'); 
                $today = date('y-m-d');
                
                $booking_reference_no = $enquiry_id.'_'.$package_id.'_'.$journey_date;

                $arr_insert = array(
                    'enquiry_id'   =>   $enquiry_id,
                    'hotel_name_id'   =>   $hotel_name_id,
                    'package_date_id'   =>   $package_date_id,
                    'package_id'   =>   $package_id,
                    'booking_date'   =>   $today,
                    'booking_reference_no'  =>  $booking_reference_no,
                    'traveller_id'  =>  $traveller_id,
                    'booking_status'   =>  'confirm'
                );
                
                $inserted_id = $this->master_model->insertRecord('final_booking',$arr_insert,true);

                $arr_update = array(
                    'booking_done'   =>   'yes'
                );
                $arr_where     = array("id" => $enquiry_id);
                $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);

                $arr_update = array(
                    'booking_reference_no'   =>   $booking_reference_no
                );
                $arr_where     = array("domestic_enquiry_id" => $enquiry_id);
                $this->master_model->updateRecord('all_traveller_info',$arr_update,$arr_where);

                $arr_update = array(
                    'booking_reference_no'   =>   $booking_reference_no
                );
                $arr_where     = array("domestic_enquiry_id" => $enquiry_id);
                $this->master_model->updateRecord('seat_type_room_type',$arr_update,$arr_where);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Final Booking Done Successfully.");
                    redirect($this->module_url_path_index);
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






}