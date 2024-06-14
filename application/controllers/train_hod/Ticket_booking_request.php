<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_booking_request extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('train_hod_slug')."train_hod/ticket_booking_request";
        $this->module_sra_booking_payment_details    =  base_url().$this->config->item('train_hod_slug')."office_branch_staff/sra_booking_payment_details";
        $this->module_url_path_dates    =  base_url().$this->config->item('train_hod_slug')."office_branch_staff/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('train_hod_slug')."office_branch_staff/package_iternary";
		$this->module_url_path_hotel    =  base_url().$this->config->item('train_hod_slug')."office_branch_staff/package_hotel";
		$this->sra_partial_payment_details    =  base_url().$this->config->item('train_hod_slug')."office_branch_staff/sra_partial_payment_details";
        $this->module_title       = "Extra Services Booking";
        $this->module_url_slug    = "add_sra_form";
        $this->module_view_folder = "ticket_booking_request/";    
        $this->arr_view_data = [];
	 }


     public function index()
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');
         
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         $fields = "sra_extra_services.id as extra_id, sra_extra_services.sra_no,sra_extra_services.mobile_number,sra_extra_services.created_at,sra_payment.sra_no,
         sra_payment.customer_name,special_req_master.service_name";
         $this->db->where('ticket_status','new');         
         $this->db->join("sra_payment", 'sra_extra_services.sra_no=sra_payment.sra_no','left');
         $this->db->join("special_req_master", 'sra_extra_services.extra_services=special_req_master.id','left');
         $new_extra_services_data = $this->master_model->getRecords('sra_extra_services','',$fields);

        $fields = "supervision.*,role_type.role_name";
        $this->db->where('supervision.is_active','yes');
        $this->db->where('supervision.is_deleted','no');
        $this->db->where('supervision.user_type','Train Handler');
        $this->db->join("role_type", ' supervision.role_type=role_type.id','left');
        $handler_list = $this->master_model->getRecords('supervision',array('supervision.is_deleted'=>'no'),$fields); 

         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['new_extra_services_data']        = $new_extra_services_data;
         $this->arr_view_data['handler_list']        = $handler_list;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."ticket_booking_request_new";
         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->load->view('train_hod/layout/agent_combo',$this->arr_view_data);  
     }


     public function assign_handler()
     {   
                 $handler_id  = $this->input->post('handler_id');
                 $extra_service_id  = $this->input->post('extra_service_id');
               
                 $arr_update = array(
                     'assigned_handler' =>   $handler_id
                  );
                
                    $arr_where     = array("id" => $extra_service_id);
                    $this->master_model->updateRecord('sra_extra_services',$arr_update,$arr_where);
             
             if($this->db->affected_rows()>0)
             {
               echo true;
             }            
 
     }

     public function my_assigned_extra_services()
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');
         
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         $fields = "sra_extra_services.id as extra_id, sra_extra_services.sra_no,sra_extra_services.mobile_number,sra_extra_services.created_at,sra_payment.sra_no,
         sra_payment.customer_name,special_req_master.service_name";
         $this->db->where('ticket_status','new');         
         $this->db->where('assigned_handler',$id);         
         $this->db->join("sra_payment", 'sra_extra_services.sra_no=sra_payment.sra_no','left');
         $this->db->join("special_req_master", 'sra_extra_services.extra_services=special_req_master.id','left');
         $new_extra_services_data = $this->master_model->getRecords('sra_extra_services','',$fields);

         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['new_extra_services_data']        = $new_extra_services_data;
        //  $this->arr_view_data['handler_list']        = $handler_list;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."my_ticket_booking_request";
         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->load->view('train_hod/layout/agent_combo',$this->arr_view_data);  
     }

     public function add_booked_ticket_info($extra_service_id,$srano)
     {   
         $supervision_sess_name = $this->session->userdata('supervision_name');
         $id = $this->session->userdata('supervision_sess_id');
         
         if($this->input->post('submit'))
         {
            //  print_r($_REQUEST); die;/
             $this->form_validation->set_rules('ticket_status', ' Ticket Status', 'required');
             $this->form_validation->set_rules('orignal_ticket_cost', 'Ticket Amount', 'required');
             
             if($this->form_validation->run() == TRUE)
             {
                 // $this->db->where('is_active','yes');
                //  $SRANo_check = $this->master_model->getRecords('sra_booking_payment_details',array('is_deleted'=>'no','sra_no'=>trim($this->input->post('sra_no')),'academic_year'=>trim($this->input->post('academic_year'))));
                //  if(count($SRANo_check)==0){
 
                 $file_name     = $_FILES['ticket_photo']['name'];
                 $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                 if($file_name!="")
                 {               
                     $ext = explode('.',$_FILES['ticket_photo']['name']); 
                     $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];
 
                     if(!in_array($ext[1],$arr_extension))
                     {
                         $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                         redirect($this->module_url_path.'/add_booked_ticket_info'.'/'.$id.'/'.$srano);  
                     }
                 }
                 
                 $file_name_to_dispaly =  'ticket_'.$file_name;
 
                 $config['upload_path']   = './uploads/extra_services_booking_ticket/';
                 $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|PDF|pdf'; 
                 $config['max_size']      = '10000';
                 $config['file_name']     =  $file_name_to_dispaly;
                 $config['overwrite']     =  TRUE;
 
                 $this->load->library('upload',$config);
                 $this->upload->initialize($config); // Important
 
                 if(!$this->upload->do_upload('ticket_photo'))
                 {  
                     $data['error'] = $this->upload->display_errors();
                     $this->session->set_flashdata('error_message',$this->upload->display_errors());
                     print_r($_REQUEST);
                 die;   
                     redirect($this->module_url_path);  
                 }
 
                 if($file_name!="")
                 {
                     $file_name = $this->upload->data();
                     $filename = $file_name_to_dispaly;
                 }
 
                 else
                 {
                     $filename = $this->input->post('ticket_photo',TRUE);
                 }
 
                //  $id  = $this->input->post('extra_services_id'); 
                //  $srano  = $this->input->post('srano'); 
                 $ticket_status  = $this->input->post('ticket_status'); 
                 $orignal_ticket_cost  = $this->input->post('orignal_ticket_cost'); 
                 
                 $arr_update = array(
                    'ticket_status' =>   $ticket_status,
                    'orignal_ticket_cost' =>   $orignal_ticket_cost,
                    'ticket_photo' =>   $filename,
                 );
                 $arr_where= array("id" => $extra_service_id,
                                        "sra_no" => $srano);
                //     print_r($arr_where);
                //    die;
                $inserted_id=$this->master_model->updateRecord('sra_extra_services',$arr_update,$arr_where);
                   
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     // redirect($this->module_url_path.'/index/'.$sra_no.'/'.$academic_year);
                     redirect($this->module_url_path.'/my_assigned_booked_extra_services');
 
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/my_assigned_booked_extra_services');
 
            //  } 
            //  else{
            //      $this->session->set_flashdata('error_message',"SRA Number already exist. Please goto partial payment.");
            //  }  
         }
         
         }
         
 
         // $this->arr_view_data['supervision_role_name']        = $supervision_role_name;
         $this->arr_view_data['supervision_sess_name']        = $supervision_sess_name;
 
         $this->arr_view_data['action']          = 'add_booked_ticket_info';
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['extra_sevice_id']    = $extra_service_id;
         $this->arr_view_data['sra_no']    = $srano;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['sra_partial_payment_details'] = $this->sra_partial_payment_details;
         $this->arr_view_data['module_sra_booking_payment_details'] = $this->module_sra_booking_payment_details;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add_booked_ticket_info";
         $this->load->view('train_hod/layout/agent_combo',$this->arr_view_data);
     }
 

     public function my_assigned_booked_extra_services()
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');
         
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         $fields = "sra_extra_services.id as extra_id, sra_extra_services.sra_no,sra_extra_services.mobile_number,sra_extra_services.ticket_status,sra_payment.sra_no,
         sra_payment.customer_name,special_req_master.service_name,sra_extra_services.orignal_ticket_cost,sra_extra_services.ticket_photo";
         $this->db->where('ticket_status !=','new');         
         $this->db->where('assigned_handler',$id);         
         $this->db->join("sra_payment", 'sra_extra_services.sra_no=sra_payment.sra_no','left');
         $this->db->join("special_req_master", 'sra_extra_services.extra_services=special_req_master.id','left');
         $new_extra_services_data = $this->master_model->getRecords('sra_extra_services','',$fields);

         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['new_extra_services_data']        = $new_extra_services_data;
        //  $this->arr_view_data['handler_list']        = $handler_list;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."my_booked_ticket_request";
         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->load->view('train_hod/layout/agent_combo',$this->arr_view_data);  
     }
    


}


