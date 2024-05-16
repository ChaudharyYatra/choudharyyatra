<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Seat_checker extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/seat_checker";
        $this->module_url_path_booking_basic_info    =  base_url().$this->config->item('agent_panel_slug')."/booking_basic_info";
        $this->module_booking_enquiry   =  base_url().$this->config->item('agent_panel_slug')."/booking_enquiry";
        $this->module_title       = "Seat Details ";
        $this->module_url_slug    = "seat_checker";
        $this->module_view_folder = "seat_checker/";
        $this->arr_view_data = [];
	}


    public function index($iid="")
    {
       $agent_sess_name = $this->session->userdata('agent_name');
       $id = $this->session->userdata('agent_sess_id');
       $pack_id='';
       $pack_date_id='';
    //    $final_booked_data=array();


        $fields = "packages.*,bus_open.package_id,packages.id as package_id";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $this->db->group_by('bus_open.package_id');
        $this->db->join("bus_open", 'packages.id=bus_open.package_id','right');
        $packages_data_booking = $this->master_model->getRecords('packages');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');

        $final_booked_data=array();
        $temp_booking_data=array();
        $cart_temp_booking_data=array();
        $temp_hold_data=array();


        $bus_info=array();
        $p='yes';
        
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('pack_id', 'Package', 'required');
            $this->form_validation->set_rules('pack_date_id', 'Date', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $pack_id    = $this->input->post('pack_id'); 
                $pack_date_id    = $this->input->post('pack_date_id'); 

                $fields = "bus_seat_book.seat_orignal_id";
                $this->db->where('bus_seat_book.package_id',$pack_id);
                $this->db->where('bus_seat_book.is_book','yes');
                $this->db->where('bus_seat_book.tour_dates',$pack_date_id);
                $booked_seats_data = $this->master_model->getRecords('bus_seat_book','',$fields);
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
                foreach($temp_booked_seats_data as $temp_booked_data){
                    array_push($temp_booking_data, $temp_booked_data['seat_orignal_id']);
                }

                $fields = "bus_seat_book.*";
                $this->db->where('bus_seat_book.package_id',$pack_id);
                $this->db->where('bus_seat_book.agent_id',$id);
                $this->db->where('bus_seat_book.is_book','no');
                $this->db->where('bus_seat_book.tour_dates',$pack_date_id);
                $cart_temp_booked_seats_data = $this->master_model->getRecords('bus_seat_book','',$fields);
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
                foreach($temp_hold_seats_data as $seat_temp_hold_data){
                    array_push($temp_hold_data, $seat_temp_hold_data['seat_orignal_id']);
                }

                // print_r($temp_hold_data); die;

            $fields = "bus_open.*,vehicle_details.*,vehicle_seat_preference.total_seat_count,first_cls_seats,second_cls_seats,third_cls_seats,first_class_price,second_class_price,
                       third_class_price,window_class_price,vehicle_seat_preference.vehicle_id";
            $this->db->join("vehicle_details", 'vehicle_details.id=bus_open.vehicle_rto_registration','left');
            $this->db->join("vehicle_seat_preference", 'vehicle_seat_preference.vehicle_id=bus_open.vehicle_rto_registration','left');
            $this->db->where('package_id',$pack_id);
            $this->db->where('package_date_id',$pack_date_id );
            $bus_info = $this->master_model->getRecord('bus_open',array('bus_open.is_deleted'=>'no'),$fields);
            // print_r($bus_info); die;
            if($bus_info==''){
                $this->session->set_flashdata('error_message',"Bus is not open, Please cantact to admin.");
                $p='yes';
            }else{
                $p='no';
            }

            }
            else{
                $this->session->set_flashdata('error_message',"Please Select Tour Name & Tour Date.");
                $p='yes';
            }
        } 

        $this->arr_view_data['new_pack_id'] = $pack_id;
        $this->arr_view_data['new_pack_date_id'] = $pack_date_id;
        $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        $this->arr_view_data['listing_page'] = 'yes';
        $this->arr_view_data['final_booked_data'] = $final_booked_data;
        $this->arr_view_data['temp_booking_data'] = $temp_booking_data;
        $this->arr_view_data['cart_temp_booking_data'] = $cart_temp_booking_data;
        $this->arr_view_data['temp_hold_data'] = $temp_hold_data;
        $this->arr_view_data['bus_info'] = $bus_info;
        $this->arr_view_data['p'] = $p;
        $this->arr_view_data['packages_data_booking'] = $packages_data_booking;
        $this->arr_view_data['agent_booking_enquiry_data'] = $agent_booking_enquiry_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."check_seat";
        $this->arr_view_data['module_url_path_booking_basic_info'] = $this->module_url_path_booking_basic_info;
        $this->arr_view_data['module_booking_enquiry'] = $this->module_booking_enquiry;
        $this->load->view('agent/layout/agent_combo_seat_checker',$this->arr_view_data);
       
    }



     public function sub_index($id)
     {
        $agent_sess_name = $this->session->userdata('agent_name');
        $iid = $this->session->userdata('agent_sess_id');

         $record = array();
         $fields = "final_booking.*,packages.id,packages.tour_title,package_date.id,package_date.journey_date,hotel.id,hotel.hotel_name";
         $this->db->where('final_booking.is_deleted','no');
         $this->db->where('package_date_id',$id);
         $this->db->join("packages", 'final_booking.package_id=packages.id','left');
         $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','left');
         $this->db->join("hotel", 'final_booking.hotel_name_id=hotel.id','left');
         $arr_data = $this->master_model->getRecords('final_booking',array('final_booking.is_deleted'=>'no'),$fields);
        

         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."sub_index";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        
     }

    // Get Details 
    public function details($id)
    {
        $agent_sess_name = $this->session->userdata('agent_name');
        $iid = $this->session->userdata('agent_sess_id');   

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


        $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        $this->arr_view_data['p_date']        = $p_date;
        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['seat_type_room_type_data']        = $seat_type_room_type_data;
        $this->arr_view_data['bus_seat_book_data']        = $bus_seat_book_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
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