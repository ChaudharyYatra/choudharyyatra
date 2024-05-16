<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class All_general_enquiry extends CI_Controller{

        public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/all_general_enquiry";
        $this->module_url_path_domestic_followup    =  base_url().$this->config->item('agent_panel_slug')."/all_general_enquiry_followup";
	    $this->module_url_path_booking_basic_info    =  base_url().$this->config->item('agent_panel_slug')."/booking_basic_info";


        $this->module_title       = "Booking Enquiry";
        $this->general_module_title       = "General Enquiry";
        $this->module_url_slug    = "all_general_enquiry";
        $this->module_view_folder = "all_general_enquiry/";    
        $this->load->library('upload');
        // $this->load->model('member');
	}

	public function index()
	{
        $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');
        // $region_id = $this->session->userdata('region_head_region');
        // region means department
        

        $record = array();
        $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number,agent.department";
        // $this->db->order_by('booking_enquiry.created_at','desc');
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('followup_status','no');
        $this->db->where('booking_process','no');
        // $this->db->where('agent.department',$region_id);
        $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
        $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
        $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);

        $this->db->where('is_deleted','no');
        $this->db->where('status','approved');
        $followup_reason_data = $this->master_model->getRecords('followup_reason');
        

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
	}



        public function general_enquiry()
        {
            $agent_sess_name = $this->session->userdata('agent_name');
            $id=$this->session->userdata('agent_sess_id');
            $region_head_id=$this->session->userdata('region_head');

                // $region_id = $this->session->userdata('region_head_region');
            date_default_timezone_set('Asia/Kolkata');
             $twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-24 hours'));

   
           $record = array();
           $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number as tno,booking_enquiry.package_id as pid";
           $this->db->order_by('booking_enquiry.created_at','desc');
           $this->db->where('booking_enquiry.is_deleted','no');
           $this->db->where('agent.department',$region_head_id);
           $this->db->where('booking_enquiry.followup_status','no');
           $this->db->where('booking_enquiry.booking_process','no');
           $this->db->where('booking_enquiry.not_interested','yes');

           $this->db->where('booking_enquiry.i_got_it','no');

           $this->db->where('booking_enquiry.created_at <', $twentyFourHoursAgo);
           $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
           $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
           $this->db->order_by("booking_enquiry.id", "desc");
           $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
//    print_r($arr_data);
//    die;
   
           $this->db->where('is_deleted','no');
           $this->db->where('status','approved');
           $followup_reason_data = $this->master_model->getRecords('followup_reason');

           $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
           $this->arr_view_data['module_url_path_domestic_followup']        = $this->module_url_path_domestic_followup;
           $this->arr_view_data['module_url_path_booking_basic_info']        = $this->module_url_path_booking_basic_info;
           $this->arr_view_data['listing_page']    = 'yes';
           $this->arr_view_data['arr_data']        = $arr_data;
           $this->arr_view_data['followup_reason_data']        = $followup_reason_data;
           $this->arr_view_data['page_title']      = $this->general_module_title." List";
           $this->arr_view_data['module_title']    = $this->module_title;
           $this->arr_view_data['module_url_path'] = $this->module_url_path;
           $this->arr_view_data['middle_content']  = $this->module_view_folder."general_enquiry";
           $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
           
        }

        public function domestic_followup()
        {
            $agent_sess_name = $this->session->userdata('agent_name');
            $id=$this->session->userdata('agent_sess_id');
            // echo '<br>';
             
             if($this->input->post('submit'))
             {
                    // print_r($_REQUEST);
                    // die;
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
                         'followup_reason' => $followup_reason,
                         'ftaken_by'=> $id
                     );
                     
                    $inserted_id = $this->master_model->insertRecord('domestic_followup',$arr_insert,true);
     
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
                        'followup_status'   =>   'yes',
                        'ftaken_by'=> $id
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
                         $this->session->set_flashdata('success_message',ucfirst($this->general_module_title). " Followup Added Successfully.");
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
	
}