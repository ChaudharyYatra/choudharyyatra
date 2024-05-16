<?php 
//   Controller for: home page
// Author: Mahesh Mhaske
// Start Date: 16-08-2022
// last updated: 16-08-2022
// dffsdfsf
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_enquiry extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('custom_agent_sess_id')=="") 
        { 
                redirect(base_url().'custom_tour_agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('custom_tour_agent_panel_slug')."custom_tour_agent/booking_enquiry";
        $this->module_url_path_domestic_followup    =  base_url().$this->config->item('custom_tour_agent_panel_slug')."custom_tour_agent/domestic_booking_enquiry_followup";
		$this->module_url_path_booking_basic_info    =  base_url().$this->config->item('custom_tour_agent_panel_slug')."/booking_basic_info";
        $this->module_title       = "Customized Booking Enquiry";
        $this->module_title_followup       = "Domestic Booking Enquiry Followup";
        $this->module_url_slug    = "booking_enquiry";
        $this->module_view_folder = "booking_enquiry/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
         $custom_agent_name = $this->session->userdata('custom_agent_name');
         $id=$this->session->userdata('custom_agent_sess_id');

        // $record = array();
        // $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number as tno,booking_enquiry.package_id as pid";
        // $this->db->order_by('booking_enquiry.created_at','desc');
        // $this->db->where('booking_enquiry.is_deleted','no');
        // $this->db->where('booking_enquiry.booking_process','no');
        // $this->db->where('booking_enquiry.agent_id',$id);
        // $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
        // $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        // $this->db->order_by("booking_enquiry.id", "desc");
        // // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
        // $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        // // print_r($arr_data); die;

        $record = array();
        $fields = "custom_domestic_booking_enquiry.*,packages.tour_title,packages.tour_number as tno,agent.agent_name,agent.booking_center";
        $this->db->where('custom_domestic_booking_enquiry.is_deleted','no');
        $this->db->order_by('custom_domestic_booking_enquiry.created_at','desc');
        $this->db->join("packages", 'custom_domestic_booking_enquiry.package_id=packages.id','left');
        $this->db->join("agent", 'custom_domestic_booking_enquiry.agent_id=agent.id','left');
        $arr_data = $this->master_model->getRecords('custom_domestic_booking_enquiry',array('custom_domestic_booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        $this->db->where('is_deleted','no');
        $this->db->where('status','approved');
        $followup_reason_data = $this->master_model->getRecords('followup_reason');
        
         $this->arr_view_data['followup_reason_data'] = $followup_reason_data;
         $this->arr_view_data['custom_agent_name']        = $custom_agent_name;
         $this->arr_view_data['module_url_path_domestic_followup'] = $this->module_url_path_domestic_followup;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_title_followup']    = $this->module_title_followup;
         $this->arr_view_data['module_url_path_booking_basic_info'] = $this->module_url_path_booking_basic_info;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('custom_tour_agent/layout/agent_combo',$this->arr_view_data);
        
     }

   public function add()
     {  
         $custom_agent_name = $this->session->userdata('custom_agent_name');
         $id=$this->session->userdata('custom_agent_sess_id');
         
        // $visitor_data=array();
        // $v_booking = $this->uri->segment(4);
        // if($v_booking !=''){
        //     $this->db->where('is_deleted','no');
        //     $this->db->where('id',$v_booking);
        //     $visitor_data = $this->master_model->getRecord('website_visitor_data');
        // }
        // print_r($visitor_data); die;

        $record = array();
        $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number as tno,booking_enquiry.package_id as pid";
        $this->db->order_by('booking_enquiry.created_at','desc');
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('booking_enquiry.booking_process','no');
        $this->db->where('booking_enquiry.agent_id',$id);
        $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
        $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        $this->db->order_by("booking_enquiry.id", "desc");
        // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
        $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
            
         if($this->input->post('submit'))
         {
            // print_r($_REQUEST); die;
            $this->form_validation->set_rules('full_name', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile_number1', 'Mobile Number 1', 'required');

            // $this->form_validation->set_rules('mobile_number2', 'Mobile Number 2', 'required');
            $this->form_validation->set_rules('checkin_date', 'checkin_date', 'required');
            $this->form_validation->set_rules('checkout_date', 'checkout_date', 'required');

            $this->form_validation->set_rules('no_of_nights', 'no_of_nights', 'required');
            $this->form_validation->set_rules('hotel_type[]', 'hotel_type', 'required');
            $this->form_validation->set_rules('no_of_couple', 'no_of_couple', 'required');

            $this->form_validation->set_rules('meal_plan', 'meal_plan', 'required');
            $this->form_validation->set_rules('total_adult', 'total_adult', 'required');
            $this->form_validation->set_rules('total_child_with_bed', 'total_child_with_bed', 'required');

            $this->form_validation->set_rules('total_child_without_bed', 'total_child_without_bed', 'required');
            $this->form_validation->set_rules('vehicle_type', 'vehicle_type', 'required');
            $this->form_validation->set_rules('pick_up_from', 'pick_up_from', 'required');

            $this->form_validation->set_rules('pickup_date', 'pickup_date', 'required');
            $this->form_validation->set_rules('pickup_time', 'pickup_time', 'required');
            $this->form_validation->set_rules('drop_to', 'drop_to', 'required');

            $this->form_validation->set_rules('drop_date', 'drop_date', 'required');
            $this->form_validation->set_rules('drop_time', 'drop_time', 'required');
            // $this->form_validation->set_rules('special_note', 'special_note', 'required');
            // $this->form_validation->set_rules('other_tour_name', 'enter destination name', 'required');
            $this->form_validation->set_rules('tour_number', 'tour_number', 'required');
             
             
             if($this->form_validation->run() == TRUE)
             { 
                $full_name        = $this->input->post('full_name'); 
                $email         = $this->input->post('email'); 
                $mobile_number1             = trim($this->input->post('mobile_number1'));

                $mobile_number2     = trim($this->input->post('mobile_number2'));
                $checkin_date            = $this->input->post('checkin_date');
                $checkout_date         = $this->input->post('checkout_date');

                $no_of_nights         = $this->input->post('no_of_nights');
                // $hotel_type     = $this->input->post('hotel_type');
                // $hotel_type_arr_data   		  = $hotel_type_data;
                $hotel_type_data=implode(',',$this->input->post('hotel_type'));

                $no_of_couple        = $this->input->post('no_of_couple'); 

                $meal_plan         = $this->input->post('meal_plan'); 
                $meal_plan_name         = $this->input->post('meal_plan_name'); 
                $total_adult             = $this->input->post('total_adult');
                $total_child_with_bed     = $this->input->post('total_child_with_bed');

                $total_child_without_bed            = $this->input->post('total_child_without_bed');
                $vehicle_type         = $this->input->post('vehicle_type');
                $other_vehicle_name         = $this->input->post('other_vehicle_name');
                $pick_up_from         = $this->input->post('pick_up_from');
                $other_pickup_from_name         = $this->input->post('other_pickup_from_name');

                $pickup_date        = $this->input->post('pickup_date'); 
                $pickup_time         = $this->input->post('pickup_time'); 
                $drop_to             = trim($this->input->post('drop_to'));
                $other_drop_to_name             = trim($this->input->post('other_drop_to_name'));
                
                $drop_date     = trim($this->input->post('drop_date'));
                $drop_time            = $this->input->post('drop_time');
                $special_note            = $this->input->post('special_note');
                $tour_number            = $this->input->post('tour_number');
                $other_tour_name         = $this->input->post('other_tour');

                 $arr_insert = array(
                        'full_name'    =>   $full_name,
                        'email'     => $email,
                        'mobile_number1'         => $mobile_number1,

                        'mobile_number2' => $mobile_number2,
                        'checkin_date'        => $checkin_date,
                        'checkout_date'     => $checkout_date,

                        'no_of_nights'    =>$no_of_nights,
                        'hotel_type'    =>$hotel_type_data,
						'no_of_couple'=>$no_of_couple,

                        'meal_plan'    =>$meal_plan,
                        'other_meal_plan'    =>$meal_plan_name,
                        'total_adult'    =>$total_adult,
						'total_child_with_bed'=>$total_child_with_bed,

                        'total_child_without_bed'    =>$total_child_without_bed,
                        'vehicle_type'    =>$vehicle_type,
                        'other_vehicle_name'    =>$other_vehicle_name,
						'pick_up_from'=>$pick_up_from,
						'other_pickup_from_name'=>$other_pickup_from_name,

                        'pickup_date'    =>$pickup_date,
                        'pickup_time'    =>$pickup_time,
						'drop_to'=>$drop_to,
						'other_drop_to_name'=>$other_drop_to_name,

                        'drop_date'    =>$drop_date,
                        'drop_time'    =>$drop_time,
						'special_note'=>$special_note,
                        'package_id'=>$tour_number,
                        'other_tour_name'    =>$other_tour_name,
                        'enquiry_from'=>"Custom Tour Agent"

                 );
                 
                $inserted_id = $this->master_model->insertRecord('custom_domestic_booking_enquiry',$arr_insert,true);

                $arr_insert = array(
                    'meal_plan_name'    =>$meal_plan_name,
                    'status'            => 'approved'
                );
                $inserted_id = $this->master_model->insertRecord('meal_plan',$arr_insert,true);

                $arr_insert = array(
                    'vehicle_type_name'    =>$other_vehicle_name,
                    'status'            => 'approved'
                );
                $inserted_id = $this->master_model->insertRecord('vehicle_type',$arr_insert,true);

                $arr_insert = array(
                    'pick_up_name'    =>$other_pickup_from_name,
                    'status'            => 'approved'
                );
                $inserted_id = $this->master_model->insertRecord('pick_up_from',$arr_insert,true);

                $arr_insert = array(
                    'drop_to_name'    =>$other_drop_to_name,
                    'status'            => 'approved'
                );
                $inserted_id = $this->master_model->insertRecord('drop_to',$arr_insert,true);
                
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_url_path.'/index');
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
         


         $this->db->where('is_deleted','no');
		 $this->db->order_by('tour_number','ASC');
         $this->db->where('package_type','3');
         $this->db->or_where('package_type','4');
         $this->db->or_where('package_type','7');
         $packages_data = $this->master_model->getRecords('packages');
        //  print_r($packages_data); die;
         
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['packages_data'] = $packages_data;

         $this->db->order_by('id','desc');
         $this->db->where('is_deleted','no');
         $booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');

         $this->db->where('is_deleted','no');
         $media_source_data = $this->master_model->getRecords('media_source');

         $this->db->where('is_deleted','no');
         $this->db->where('status','approved');
         $followup_reason_data = $this->master_model->getRecords('followup_reason');


         $this->db->where('is_deleted','no');
         $this->db->where('is_active','yes');
         $this->db->where('status','approved');
         $this->db->order_by('id','ASC');
         $meal_plan = $this->master_model->getRecords('meal_plan');
         // print_r($meal_plan); die;

         $this->db->where('is_deleted','no');
         $this->db->where('status','approved');
         $this->db->where('is_active','yes');
         $this->db->order_by('id','ASC');
         $vehicle_type = $this->master_model->getRecords('vehicle_type');
         // print_r($vehicle_type); die;

         $this->db->where('is_deleted','no');
         $this->db->where('is_active','yes');
         $this->db->where('status','approved');
         $this->db->order_by('id','ASC');
         $pick_up_from = $this->master_model->getRecords('pick_up_from');
         // print_r($pick_up_from); die;

         $this->db->where('is_deleted','no');
         $this->db->where('is_active','yes');
         $this->db->where('status','approved');
         $this->db->order_by('id','ASC');
         $drop_to = $this->master_model->getRecords('drop_to');
         // print_r($drop_to); die;

 
         $this->arr_view_data['custom_agent_name'] = $custom_agent_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['booking_enquiry_data'] = $booking_enquiry_data;
         $this->arr_view_data['media_source_data'] = $media_source_data;
         $this->arr_view_data['meal_plan'] = $meal_plan;
         $this->arr_view_data['pick_up_from'] = $pick_up_from;
         $this->arr_view_data['drop_to'] = $drop_to;
         $this->arr_view_data['vehicle_type'] = $vehicle_type;
         $this->arr_view_data['arr_data'] = $arr_data;
        //  $this->arr_view_data['visitor_data'] = $visitor_data;
         $this->arr_view_data['followup_reason_data'] = $followup_reason_data;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('custom_tour_agent/layout/agent_combo',$this->arr_view_data);
     }
  
     public function domestic_followup()
   {
        $custom_agent_name = $this->session->userdata('custom_agent_name');
        $id=$this->session->userdata('custom_agent_sess_id');
        
        if($this->input->post('submit'))
        {
               
            $this->form_validation->set_rules('follow_up_time', 'follow up time', 'required');
            $this->form_validation->set_rules('next_followup_date', 'next follow up time', 'required');
            $this->form_validation->set_rules('follow_up_comment', 'follow up comment', 'required');
            
            if($this->form_validation->run() == TRUE)
            { 
                $follow_up_time  = $this->input->post('follow_up_time'); 
                $next_followup_date  = $this->input->post('next_followup_date');
                $follow_up_comment  = $this->input->post('follow_up_comment'); 
                $enquiry_id  = $this->input->post('enquiry_id'); 
                $followup_reason  = $this->input->post('followup_reason'); 
                $current_date= date('Y-m-d');
                $arr_insert = array(
                    'follow_up_time'   =>   $follow_up_time, 
                    'next_followup_date'   =>   $next_followup_date, 
                    'follow_up_comment'   =>   $follow_up_comment,
                    'booking_enquiry_id'   =>   $enquiry_id,
                    'follow_up_date' => $current_date,
                    'followup_reason' => $followup_reason
                );
                
               $inserted_id = $this->master_model->insertRecord('custom_domestic_followup',$arr_insert,true);

                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$id);
                $this->db->order_by('id','DESC');
                $agent_data_email = $this->master_model->getRecord('agent');

                $this->db->where('is_deleted','no');
               //  $this->db->where('is_active','yes');
                $this->db->where('id',$enquiry_id);
                $booking_enquiry_data = $this->master_model->getRecord('booking_enquiry');

                $agent_email=$agent_data_email['email'];
                $agent_name=$agent_data_email['agent_name'];

                $user_email=$booking_enquiry_data['email'];
                $first_name=$booking_enquiry_data['first_name'];
                $last_name=$booking_enquiry_data['last_name'];

               $arr_update = array(
                   'followup_status'   =>   'yes'
               );
               $arr_where     = array("id" => $enquiry_id);
              $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);
                          
				$from_email='chaudharyyatra8@gmail.com';
                if($user_email !='')
                {
                  
                   $msg="<html>
                               <head>
                                   <style type='text/css'>
                                       body {font-family: Verdana, Geneva, sans-serif}
                                   </style>
                               </head>
                               <body background=".base_url()."uploads/email/email1.jpg>
                                   <h3>Dear&nbsp;".$first_name."&nbsp;".$last_name."</h3>
                                   <p>I hope this email finds you well. I am writing to follow up on your inquiry about a tour 
                                       booking with our travel agency.
                                   </p>
                                   <p>I wanted to know if you had any further questions or if you were ready to book the tour. 
                                       If you are ready to book, I can provide you with more details about the tour and the booking process.
                                   </p>
                                   <p>Please let me know if you have any questions or if you would like to proceed with booking your tour. 
                                       I look forward to hearing from you.</p>
                                   <p>Sincerely,</p>
                                   <h5>ChoudharyYatra Company</h5>
                               </body>
                               </html>";
                   // echo $msg;
                   $subject='Thank You For Enquiry';
                   //$this->send_mail($user_email,$from_email,$msg,$subject,$cc=null);
                   // die;
				}
				
				if($agent_email !='')
                {
                   $msg_email="<html>
                               <head>
                                   <style type='text/css'>
                                       body {font-family: Verdana, Geneva, sans-serif}
                                   </style>
                               </head>
                               <body background=".base_url()."uploads/email/email1.jpg>
                                   <h3>Dear&nbsp;".$agent_name."</h3>
                                   <p>I hope this message finds you well. I am writing to let you know that a new inquiry has been encountered in your account from a customer. We would 
                                       appreciate it if you could assist them with their travel-related needs.
                                   </p>
                                   <p>Please review the inquiry details and take the necessary action to resolve the inquiry. If you have any questions or need any additional information, please do 
                                       not hesitate to contact Head Office. 
                                   </p>
                                   <p>Thank you for your prompt attention to this matter.</p>
                                   <p>Sincerely,</p>
                                   <h5>ChoudharyYatra Company</h5>
                                   <a href=".base_url()."admin/login>Click Here</a>
                               </body>
                               </html>";
                               $subject_email=' New Enquiry from customer';
                  // $this->send_mail($agent_email,$from_email,$msg_email,$subject_email,$cc=null);
				}
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title_followup). " Added Successfully.");
                    redirect($this->module_url_path_domestic_followup.'/index/'.$enquiry_id);
                   
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }  
            else{
               redirect($this->module_url_path.'/index');
           } 
        


   }


     public function delete($id)
     {
        $custom_agent_name = $this->session->userdata('custom_agent_name');
         
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('custom_domestic_booking_enquiry');
 
             if(empty($arr_data))
             {
                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                 redirect($this->module_url_path);
             }
             $arr_update = array('is_deleted' => 'yes');
             $arr_where = array("id" => $id);
                  
             if($this->master_model->updateRecord('custom_domestic_booking_enquiry',$arr_update,$arr_where))
             {
                 $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
             }
             else
             {
                 $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
             }
         }
         else
         {
            
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
         }
         redirect($this->module_url_path.'/index');  

         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
     }

    // Edit

    public function edit($id)
    {
        $custom_agent_name = $this->session->userdata('custom_agent_name');
        // $id=$this->session->userdata('agent_sess_id');

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }  

        if(is_numeric($id))
        {   
            $record = array();
            $fields = "custom_domestic_booking_enquiry.*,meal_plan.meal_plan_name";
            $this->db->where('custom_domestic_booking_enquiry.is_deleted','no');
            $this->db->where('custom_domestic_booking_enquiry.id',$id);
            $this->db->join("meal_plan", 'custom_domestic_booking_enquiry.meal_plan=meal_plan.id','left');
            $arr_data = $this->master_model->getRecords('custom_domestic_booking_enquiry',array('custom_domestic_booking_enquiry.is_deleted'=>'no'),$fields);
            // print_r($arr_data); die;

            // $arr_data = $this->master_model->getRecords('custom_domestic_booking_enquiry');
            // print_r($arr_data); die;
            if($this->input->post('submit'))
            {

                $this->form_validation->set_rules('full_name', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile_number1', 'Mobile Number 1', 'required');

            // $this->form_validation->set_rules('mobile_number2', 'Mobile Number 2', 'required');
            $this->form_validation->set_rules('checkin_date', 'checkin_date', 'required');
            $this->form_validation->set_rules('checkout_date', 'checkout_date', 'required');

            $this->form_validation->set_rules('no_of_nights', 'no_of_nights', 'required');
            $this->form_validation->set_rules('hotel_type[]', 'hotel_type', 'required');
            $this->form_validation->set_rules('no_of_couple', 'no_of_couple', 'required');

            $this->form_validation->set_rules('meal_plan', 'meal_plan', 'required');
            $this->form_validation->set_rules('total_adult', 'total_adult', 'required');
            $this->form_validation->set_rules('total_child_with_bed', 'total_child_with_bed', 'required');

            $this->form_validation->set_rules('total_child_without_bed', 'total_child_without_bed', 'required');
            $this->form_validation->set_rules('vehicle_type', 'vehicle_type', 'required');
            $this->form_validation->set_rules('pick_up_from', 'pick_up_from', 'required');

            $this->form_validation->set_rules('pickup_date', 'pickup_date', 'required');
            $this->form_validation->set_rules('pickup_time', 'pickup_time', 'required');
            $this->form_validation->set_rules('drop_to', 'drop_to', 'required');

            $this->form_validation->set_rules('drop_date', 'drop_date', 'required');
            $this->form_validation->set_rules('drop_time', 'drop_time', 'required');
            // $this->form_validation->set_rules('special_note', 'special_note', 'required');
            if($this->input->post('tour_number')=='Other'){
            $this->form_validation->set_rules('other_tour', 'enter destination name', 'required');
            }
                
                if($this->form_validation->run() == TRUE)
                {
                $full_name        = $this->input->post('full_name'); 
                $email         = $this->input->post('email'); 
                $mobile_number1             = trim($this->input->post('mobile_number1'));

                $mobile_number2     = trim($this->input->post('mobile_number2'));
                $checkin_date            = $this->input->post('checkin_date');
                $checkout_date         = $this->input->post('checkout_date');

                $no_of_nights         = $this->input->post('no_of_nights');
                // $hotel_type     = $this->input->post('hotel_type');
                // $hotel_type_arr_data   		  = $hotel_type_data;
                $hotel_type_data=implode(',',$this->input->post('hotel_type'));

                $no_of_couple        = $this->input->post('no_of_couple'); 

                $meal_plan         = $this->input->post('meal_plan');
                $meal_plan_name         = $this->input->post('meal_plan_name'); 
                $total_adult             = $this->input->post('total_adult');
                $total_child_with_bed     = $this->input->post('total_child_with_bed');

                $total_child_without_bed            = $this->input->post('total_child_without_bed');
                $vehicle_type         = $this->input->post('vehicle_type');
                $other_vehicle_name         = $this->input->post('other_vehicle_name');
                $pick_up_from         = $this->input->post('pick_up_from');
                $other_pickup_from_name         = $this->input->post('other_pickup_from_name');

                $pickup_date        = $this->input->post('pickup_date'); 
                $pickup_time         = $this->input->post('pickup_time'); 
                $drop_to             = trim($this->input->post('drop_to'));
                $other_drop_to_name             = $this->input->post('other_drop_to_name');

                $drop_date     = trim($this->input->post('drop_date'));
                $drop_time            = $this->input->post('drop_time');
                $special_note            = $this->input->post('special_note');
                $tour_number            = $this->input->post('tour_number');
                $other_tour         = $this->input->post('other_tour');
                    

                    $arr_update = array(
                        'full_name'    =>   $full_name,
                        'email'     => $email,
                        'mobile_number1'         => $mobile_number1,

                        'mobile_number2' => $mobile_number2,
                        'checkin_date'        => $checkin_date,
                        'checkout_date'     => $checkout_date,

                        'no_of_nights'    =>$no_of_nights,
                        'hotel_type'    =>$hotel_type_data,
						'no_of_couple'=>$no_of_couple,

                        'meal_plan'    =>$meal_plan,
                        'other_meal_plan'    =>$meal_plan_name,
                        'total_adult'    =>$total_adult,
						'total_child_with_bed'=>$total_child_with_bed,

                        'total_child_without_bed'    =>$total_child_without_bed,
                        'vehicle_type'    =>$vehicle_type,
                        'other_vehicle_name'    =>$other_vehicle_name,
						'pick_up_from'=>$pick_up_from,
						'other_pickup_from_name'=>$other_pickup_from_name,

                        'pickup_date'    =>$pickup_date,
                        'pickup_time'    =>$pickup_time,
						'drop_to'=>$drop_to,
						'other_drop_to_name'=>$other_drop_to_name,

                        'drop_date'    =>$drop_date,
                        'drop_time'    =>$drop_time,
						'special_note'=>$special_note,
                        'package_id'=>$tour_number,
                        'other_tour_name'    =>$other_tour	
                    );
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('custom_domestic_booking_enquiry',$arr_update,$arr_where);

                    $arr_insert = array(
                        'meal_plan_name'    =>$meal_plan_name,
                        'status'            => 'approved'
                    );
                    $inserted_id = $this->master_model->insertRecord('meal_plan',$arr_insert,true);
    
                    $arr_insert = array(
                        'vehicle_type_name'    =>$other_vehicle_name,
                        'status'            => 'approved'
                    );
                    $inserted_id = $this->master_model->insertRecord('vehicle_type',$arr_insert,true);
    
                    $arr_insert = array(
                        'pick_up_name'    =>$other_pickup_from_name,
                        'status'            => 'approved'
                    );
                    $inserted_id = $this->master_model->insertRecord('pick_up_from',$arr_insert,true);
    
                    $arr_insert = array(
                        'drop_to_name'    =>$other_drop_to_name,
                        'status'            => 'approved'
                    );
                    $inserted_id = $this->master_model->insertRecord('drop_to',$arr_insert,true);
                    
                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index');
                }   
            }
        }
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $this->db->where('package_type','3');
         $this->db->or_where('package_type','4');
         $this->db->or_where('package_type','7');
        $packages_data = $this->master_model->getRecords('packages');
        // print_r($packages_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');

        $this->db->where('is_deleted','no');
        $media_source_data = $this->master_model->getRecords('media_source');

        $this->db->where('is_deleted','no');
         $this->db->where('status','approved');
         $this->db->where('is_active','yes');
         $this->db->order_by('id','ASC');
         $meal_plan = $this->master_model->getRecords('meal_plan');
         // print_r($meal_plan); die;

         $this->db->where('is_deleted','no');
         $this->db->where('status','approved');
         $this->db->where('is_active','yes');
         $this->db->order_by('id','ASC');
         $vehicle_type = $this->master_model->getRecords('vehicle_type');
         // print_r($vehicle_type); die;

         $this->db->where('is_deleted','no');
         $this->db->where('status','approved');
         $this->db->where('is_active','yes');
         $this->db->order_by('id','ASC');
         $pick_up_from = $this->master_model->getRecords('pick_up_from');
         // print_r($pick_up_from); die;

         $this->db->where('is_deleted','no');
         $this->db->where('status','approved');
         $this->db->where('is_active','yes');
         $this->db->order_by('id','ASC');
         $drop_to = $this->master_model->getRecords('drop_to');
         // print_r($drop_to); die;

        $this->arr_view_data['custom_agent_name']        = $custom_agent_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['packages_data']        = $packages_data;
        $this->arr_view_data['meal_plan'] = $meal_plan;
         $this->arr_view_data['pick_up_from'] = $pick_up_from;
         $this->arr_view_data['drop_to'] = $drop_to;
         $this->arr_view_data['vehicle_type'] = $vehicle_type;
        $this->arr_view_data['booking_enquiry_data'] = $booking_enquiry_data;
        $this->arr_view_data['media_source_data'] = $media_source_data;
        $this->arr_view_data['custom_agent_name'] = $custom_agent_name;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('custom_tour_agent/layout/agent_combo',$this->arr_view_data);
    }
	
	   public function send_mail($to_email,$from_email,$msg,$subject,$cc=null) {
         

        $this->load->library('email');
        $mail_config = array();
        $mail_config['smtp_host'] = 'smtp.gmail.com';
        $mail_config['smtp_port'] = '587';
        $mail_config['smtp_user'] = 'chaudharyyatra8@gmail.com';
        $mail_config['_smtp_auth'] = TRUE;
        $mail_config['smtp_pass'] = 'xmjhmjfqzaqyrlht';
        $mail_config['smtp_crypto'] = 'tls';
        $mail_config['protocol'] = 'smtp';
        $mail_config['mailtype'] = 'html';
        $mail_config['send_multipart'] = FALSE;
        $mail_config['charset'] = 'utf-8';
        $mail_config['wordwrap'] = TRUE;
        $this->email->initialize($mail_config);
        $this->email->set_newline("\r\n");
     
       //$from_email = "chaudharyyatra8@gmail.com";
      // $to_email = $to_email;
       //Load email library
       $this->email->from($from_email, 'Choudhary Yatra');
       $this->email->to($to_email);
       $this->email->subject($subject);
       $this->email->message($msg);
       //Send mail
       if($this->email->send())
       {
          //echo "send";
          $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
       }else{
          $this->email->print_debugger();
           echo $this->email->print_debugger(array('headers'));  
          echo "Eroor";
       }
   }


}