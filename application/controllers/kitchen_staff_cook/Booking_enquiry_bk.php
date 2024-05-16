<?php 
//   Controller for: home page
// Author: Mahesh Mhaske
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_enquiry extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/booking_enquiry";
        $this->module_url_path_domestic_followup    =  base_url().$this->config->item('agent_panel_slug')."/domestic_booking_enquiry_followup";
        $this->module_title       = "Booking Enquiry";
        $this->module_url_slug    = "booking_enquiry";
        $this->module_view_folder = "booking_enquiry/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');

        //  $record = array();
        //  $fields = "booking_enquiry.*,agent.*,packages.tour_title,packages.tour_number,booking_enquiry.created_at as c_date";
        //  $this->db->order_by('booking_enquiry.created_at','desc');
        //  $this->db->where('agent.is_deleted','no');
        //  $this->db->where('agent.is_active','yes');
        //  $this->db->where('booking_enquiry.agent_id',$id);
        //  $this->db->join("agent", 'agent.id=booking_enquiry.agent_id','left');
        //  $this->db->join("packages", 'packages.id=booking_enquiry.package_id','left');
        //  $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number";
        $this->db->order_by('booking_enquiry.created_at','desc');
        $this->db->where('booking_enquiry.is_deleted','no');
        $this->db->where('booking_enquiry.agent_id',$id);
        $this->db->join("packages", 'booking_enquiry.package_id=packages.tour_number','left');
        $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
        // $this->db->join("domestic_followup", 'booking_enquiry.id=domestic_followup.booking_enquiry_id','left');
        $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        
         
         $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
         $this->arr_view_data['module_url_path_domestic_followup'] = $this->module_url_path_domestic_followup;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        
     }

     public function add()
     {  
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');
         
         if($this->input->post('submit'))
         {
                
             $this->form_validation->set_rules('first_name', 'first_name', 'required');
             $this->form_validation->set_rules('last_name', 'last_name', 'required');
             $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
             $this->form_validation->set_rules('email_address', 'email_address', 'required');
             $this->form_validation->set_rules('gender', 'gender', 'required');
             $this->form_validation->set_rules('tour_number', 'tour_number', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                 $first_name  = $this->input->post('first_name'); 
                 $last_name  = $this->input->post('last_name'); 
                 $mobile_number  = $this->input->post('mobile_number'); 
                 $email_address  = $this->input->post('email_address'); 
                 $gender  = $this->input->post('gender'); 
                 $tour_number  = $this->input->post('tour_number'); 
                 $media_source_name         = $this->input->post('media_source_name');
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                    'agent_id' =>   $id,
                     'first_name'   =>   $first_name,   
                     'last_name'   =>   $last_name, 
                     'mobile_number'   =>   $mobile_number, 
                     'email'   =>   $email_address, 
                     'gender'   =>   $gender, 
                     'package_id'   =>   $tour_number,   
                     'media_source_name'    =>$media_source_name           
                 );
                 
                 $inserted_id = $this->master_model->insertRecord('booking_enquiry',$arr_insert,true);
                                
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)."Added Successfully.");
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
         $packages_data = $this->master_model->getRecords('packages');
         
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['packages_data'] = $packages_data;

         $this->db->order_by('id','desc');
         $this->db->where('is_deleted','no');
         $booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');

         $this->db->where('is_deleted','no');
         $media_source_data = $this->master_model->getRecords('media_source');
 
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['booking_enquiry_data'] = $booking_enquiry_data;
         $this->arr_view_data['media_source_data'] = $media_source_data;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
     }


     public function domestic_followup()
    {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');
         
         if($this->input->post('submit'))
         {
                
             $this->form_validation->set_rules('follow_up_date', 'follow up date', 'required');
             $this->form_validation->set_rules('follow_up_time', 'follow up time', 'required');
             $this->form_validation->set_rules('next_followup_date', 'next follow up time', 'required');
             $this->form_validation->set_rules('follow_up_comment', 'follow up comment', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                 $follow_up_date  = $this->input->post('follow_up_date'); 
                 $follow_up_time  = $this->input->post('follow_up_time'); 
                 $next_followup_date  = $this->input->post('next_followup_date');
                 $follow_up_comment  = $this->input->post('follow_up_comment'); 
                 $enquiry_id  = $this->input->post('enquiry_id'); 
                 $arr_insert = array(
                     'follow_up_date'   =>   $follow_up_date,   
                     'follow_up_time'   =>   $follow_up_time, 
                     'next_followup_date'   =>   $next_followup_date, 
                     'follow_up_comment'   =>   $follow_up_comment,
                     'booking_enquiry_id'   =>   $enquiry_id 
                 );
                 
                $inserted_id = $this->master_model->insertRecord('domestic_followup',$arr_insert,true);

                $arr_update = array(
                    'followup_status'   =>   'yes'
                );
                $arr_where     = array("id" => $enquiry_id);
               $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);
                            
                 if($inserted_id > 0)
                 {
                    //  $this->session->set_flashdata('success_message',ucfirst($this->module_title)."Added Successfully.");
                    //  redirect($this->module_url_path_domestic_followup.'/index');
                    $this->db->order_by('id','desc');
                    $this->db->where('is_deleted','no');

                    $domestic_followup_data = $this->master_model->getRecords('domestic_followup');
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)."Added Successfully.");
                    $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
                    $this->arr_view_data['action']          = 'add';
                    $this->arr_view_data['domestic_followup_data'] = $domestic_followup_data;
                    $this->arr_view_data['page_title']      = " Add ".$this->module_title;
                    $this->arr_view_data['module_title']    = $this->module_title;
                    $this->arr_view_data['module_url_path'] = $this->module_url_path;
                    $this->arr_view_data['module_url_path_domestic_followup'] = $this->module_url_path_domestic_followup;
                    $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
                    $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
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
 

        //  $this->db->where('is_deleted','no');
		//  $this->db->order_by('tour_number','ASC');
        //  $packages_data = $this->master_model->getRecords('packages');
         
        //  $this->arr_view_data['action']          = 'add';
        //  $this->arr_view_data['packages_data'] = $packages_data;

        //  $this->db->order_by('id','desc');
        //  $this->db->where('is_deleted','no');

        //  $domestic_followup_data = $this->master_model->getRecords('domestic_followup');
         
        //  $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        //  $this->arr_view_data['action']          = 'add';
        //  $this->arr_view_data['domestic_followup_data'] = $domestic_followup_data;
        //  $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        //  $this->arr_view_data['module_title']    = $this->module_title;
        //  $this->arr_view_data['module_url_path'] = $this->module_url_path;
        //  $this->arr_view_data['module_url_path_domestic_followup'] = $this->module_url_path_domestic_followup;
        //  $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        //  $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }


     public function delete($id)
     {
        $agent_sess_name = $this->session->userdata('agent_name');
         
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('booking_enquiry');
 
             if(empty($arr_data))
             {
                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                 redirect($this->module_url_path);
             }
             $arr_update = array('is_deleted' => 'yes');
             $arr_where = array("id" => $id);
                  
             if($this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where))
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
        $agent_sess_name = $this->session->userdata('agent_name');
        // $id=$this->session->userdata('agent_sess_id');

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }  

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('booking_enquiry');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('first_name', 'first_name', 'required');
                $this->form_validation->set_rules('last_name', 'last_name', 'required');
                $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
                $this->form_validation->set_rules('email_address', 'email_address', 'required');
                $this->form_validation->set_rules('gender', 'gender', 'required');
                // $this->form_validation->set_rules('packages', 'packages', 'required');
                $this->form_validation->set_rules('tour_number', 'tour_number', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                    $first_name  = $this->input->post('first_name'); 
                    $last_name  = $this->input->post('last_name'); 
                    $mobile_number  = $this->input->post('mobile_number'); 
                    $email_address  = $this->input->post('email_address'); 
                    $gender  = $this->input->post('gender'); 
                    // $packages  = $this->input->post('packages'); 
                    $tour_number  = $this->input->post('tour_number'); 
                    $media_source_name         = $this->input->post('media_source_name');
                    
                    $arr_update = array(
                        'first_name'   =>   $first_name,   
                        'last_name'   =>   $last_name, 
                        'mobile_number'   =>   $mobile_number, 
                        'email'   =>   $email_address, 
                        'gender'   =>   $gender, 
                        'package_id'   =>   $tour_number,
                        'media_source_name'    =>$media_source_name
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('booking_enquiry',$arr_update,$arr_where);
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
        $packages_data = $this->master_model->getRecords('packages');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');

        $this->db->where('is_deleted','no');
        $media_source_data = $this->master_model->getRecords('media_source');

         
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['packages_data']        = $packages_data;
        $this->arr_view_data['booking_enquiry_data'] = $booking_enquiry_data;
        $this->arr_view_data['media_source_data'] = $media_source_data;
        $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }


}