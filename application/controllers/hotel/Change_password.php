<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('hotel_sess_id')=="") 
        { 
                redirect(base_url().'hotel/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('hotel_panel_slug')."hotel/change_password";
        $this->module_url_path_logout    =  base_url().$this->config->item('hotel_panel_slug')."hotel/login";
        $this->module_title       = "Password Change";
        $this->module_url_slug    = "change_password";
        $this->module_view_folder = "change_password/";
        $this->arr_view_data = [];
	 }

    public function change_password()
     {
        $hotel_sess_name = $this->session->userdata('hotel_name');
        $iid=$this->session->userdata('hotel_sess_id'); 

        if($this->input->post('submit'))
             {
                $id=$this->session->userdata('hotel_sess_id');
                
                 $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
                 $this->form_validation->set_rules('new_password', 'New password', 'required');
                 $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');
                 if($this->form_validation->run() == TRUE)
                 {                  
                    $old_pass = trim($this->input->post('old_pass'));
                    $new_password = trim($this->input->post('new_password'));
                    $confirm_pass = trim($this->input->post('confirm_pass'));
 
                    $this->db->where('id',$id);
                    $arr_data = $this->master_model->getRecords('hotel');
                    
                    $existed_password = $arr_data[0]['password'];
                    
                    if($existed_password == $old_pass)
                    {
                         $arr_update = array(                       
                             'password' => $new_password
                         );
                         $arr_where     = array("id" => $id);
                         $this->master_model->updateRecord('hotel',$arr_update,$arr_where);


                     }
                     else
                         {
                             $this->session->set_flashdata('error_message',"Old Password is Wrong".".");
                         }
                     redirect($this->module_url_path_logout.'/logout');
                 }   
             }
       
         $this->arr_view_data['hotel_sess_name']        = $hotel_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';        
         $this->arr_view_data['page_title']      = $this->module_title." ";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['module_url_path_logout'] = $this->module_url_path_logout;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."change_password";
         $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
        
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