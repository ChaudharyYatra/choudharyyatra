<?php 
//   Controller for: home page
// Author: Vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Fixed_customized_enquiries extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/fixed_customized_enquiries";
        $this->module_url_path_followup    =  base_url().$this->config->item('agent_panel_slug')."/custom_followup_booking_enquiry";
        $this->module_title       = "Custom Booking Enquiry";
        $this->module_title_followup = "Domestic Booking Enquiry Followup";
        $this->module_url_slug    = "fixed_customized_enquiries";
        $this->module_view_folder = "fixed_customized_enquiries/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $record = array();
        $fields = "custom_domestic_booking_enquiry.*,packages.tour_title,packages.tour_number as tno,agent.id,custom_domestic_booking_enquiry.id as ceid";
        $this->db->where('custom_domestic_booking_enquiry.is_deleted','no');
        $this->db->where('agent.id',$id);
        $this->db->join("agent", 'custom_domestic_booking_enquiry.agent_id=agent.id','left');
        $this->db->join("packages", 'custom_domestic_booking_enquiry.package_id=packages.id','left');
        $arr_data = $this->master_model->getRecords('custom_domestic_booking_enquiry',array('custom_domestic_booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        
        $this->db->where('is_deleted','no');
        $this->db->where('status','approved');
        $followup_reason_data = $this->master_model->getRecords('followup_reason');
        
         $this->arr_view_data['followup_reason_data'] = $followup_reason_data;
         $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_url_path_followup'] = $this->module_url_path_followup;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);

        
     }

    public function add()
     {  
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');
         
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

        $fields = "agent.*";
        $this->db->where('agent.id',$id);
        // $this->db->join("packages", 'custom_domestic_booking_enquiry.package_id=packages.id','left');
        $agent_data = $this->master_model->getRecord('agent',array('agent.is_deleted'=>'no'),$fields);
        // print_r($agent_data); die;
            
         if($this->input->post('submit'))
         {
            // print_r($_REQUEST); die;
            $this->form_validation->set_rules('full_name', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile_number1', 'Mobile Number 1', 'required');
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
            $this->form_validation->set_rules('tour_number', 'tour_number', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
               
                $agent_id        = $this->input->post('agent_id'); 
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
                $other_tour_name         = $this->input->post('other_tour_name');

                 $arr_insert = array(
                        'agent_id'    =>   $agent_id,
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
                        'enquiry_from'=>"Agent"
                        

                 );
                 
                $inserted_id = $this->master_model->insertRecord('custom_domestic_booking_enquiry',$arr_insert,true);

                $arr_insert = array(
                    'meal_plan_name'    =>$meal_plan_name,
                    'status'            => 'pending'
                );
                $inserted_id = $this->master_model->insertRecord('meal_plan',$arr_insert,true);

                $arr_insert = array(
                    'vehicle_type_name'    =>$other_vehicle_name,
                    'status'            => 'pending'
                );
                $inserted_id = $this->master_model->insertRecord('vehicle_type',$arr_insert,true);

                $arr_insert = array(
                    'pick_up_name'    =>$other_pickup_from_name,
                    'status'            => 'pending'
                );
                $inserted_id = $this->master_model->insertRecord('pick_up_from',$arr_insert,true);

                $arr_insert = array(
                    'drop_to_name'    =>$other_drop_to_name,
                    'status'            => 'pending'
                );
                $inserted_id = $this->master_model->insertRecord('drop_to',$arr_insert,true);

                if($inserted_id >0){
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_url_path.'/index');
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
         
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
         $this->db->where('is_active','yes');
            $this->db->where('status','approved');
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
         
 
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['booking_enquiry_data'] = $booking_enquiry_data;
         $this->arr_view_data['media_source_data'] = $media_source_data;
         $this->arr_view_data['meal_plan'] = $meal_plan;
         $this->arr_view_data['pick_up_from'] = $pick_up_from;
         $this->arr_view_data['drop_to'] = $drop_to;
         $this->arr_view_data['vehicle_type'] = $vehicle_type;
         $this->arr_view_data['arr_data'] = $arr_data;
         $this->arr_view_data['agent_data']        = $agent_data;
         $this->arr_view_data['followup_reason_data'] = $followup_reason_data;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
     }
     
  
    
     // Get Details of Package
    public function details($eid)
    {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');
        
		// $id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $record = array();
        $fields = "custom_domestic_booking_enquiry.*,packages.tour_title,packages.tour_number as tno,agent.id,meal_plan.meal_plan_name,vehicle_type.vehicle_type_name,pick_up_from.pick_up_name,drop_to.drop_to_name";
        $this->db->where('custom_domestic_booking_enquiry.is_deleted','no');
        $this->db->where('custom_domestic_booking_enquiry.id',$eid);
        $this->db->join("agent", 'custom_domestic_booking_enquiry.agent_id=agent.id','left');
        $this->db->join("packages", 'custom_domestic_booking_enquiry.package_id=packages.id','left');
        $this->db->join("meal_plan", 'custom_domestic_booking_enquiry.meal_plan=meal_plan.id','left');
        $this->db->join("vehicle_type", 'custom_domestic_booking_enquiry.vehicle_type=vehicle_type.id','left');
        $this->db->join("pick_up_from", 'custom_domestic_booking_enquiry.pick_up_from=pick_up_from.id','left');
        $this->db->join("drop_to", 'custom_domestic_booking_enquiry.drop_to=drop_to.id','left');   
        $arr_data = $this->master_model->getRecords('custom_domestic_booking_enquiry',array('custom_domestic_booking_enquiry.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        
        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }


    
    // Edit
	
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