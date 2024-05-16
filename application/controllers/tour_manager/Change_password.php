<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/change_password";
        $this->module_title       = "Password Change";
        $this->module_url_slug    = "change_password";
        $this->module_view_folder = "change_password/";
        $this->arr_view_data = [];
	 }

public function change_password()
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        if($this->input->post('submit'))
             {
                 $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
                 $this->form_validation->set_rules('new_password', 'New password', 'required');
                 $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');
                 if($this->form_validation->run() == TRUE)
                 {                  
                    $old_pass = trim($this->input->post('old_pass'));
                    $new_password = trim($this->input->post('new_password'));
                    $confirm_pass = trim($this->input->post('confirm_pass'));
 
                    $this->db->where('id',$id);
                    $arr_data = $this->master_model->getRecords('supervision');
                    
                    $existed_password = $arr_data[0]['password'];
                    
                    if($existed_password == $old_pass)
                    {
                         $arr_update = array(                       
                             'password' => $new_password,
                             'password_change' => 'yes',
                         );
                         $arr_where     = array("id" => $id);
                         $this->master_model->updateRecord('supervision',$arr_update,$arr_where);

                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('id',$id);
                        $this->db->order_by('id','DESC');
                        $agent_data_email = $this->master_model->getRecord('supervision');
                        $agent_email=$agent_data_email['email'];
                        $agent_name=$agent_data_email['agent_name'];

                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        //  $this->db->where('id',$id);
                        $admin_data_email = $this->master_model->getRecord('admin');
                        $admin_email=$admin_data_email['email'];
                        $admin_name=$admin_data_email['name'];

                         if($id > 0)
                         {
                            $from_email='chaudharyyatra8@gmail.com';
						$msg="<html>
									<head>
										<style type='text/css'>
											body {font-family: Verdana, Geneva, sans-serif}
										</style>
									</head>
									<body background=".base_url()."uploads/email/email1.jpg>
										<h3>Dear&nbsp;".$admin_name."</h3>
										<p>I hope this message finds you well. I am writing to let you know that your agent &nbsp;".$agent_name." has change password of his agent panel.
										</p>
										<p>Please review the inquiry details and take the necessary action to resolve the inquiry. If you have any questions or need any additional information, 
										please do not hesitate to contact Head Office. 
										</p>
										<p>Thank you for your prompt attention to this matter.</p>
										<p>Sincerely,</p>
										<h5>ChoudharyYatra Company</h5>
									</body>
									</html>";
						// echo $msg;
						$subject='Password Change Sucessfully';
						// $this->send_mail($admin_email,$from_email,$msg,$subject,$cc=null);
						// die;
						
						$msg_email="<html>
									<head>
										<style type='text/css'>
											body {font-family: Verdana, Geneva, sans-serif}
										</style>
									</head>
									<body background=".base_url()."uploads/email/email1.jpg>
										<h3>Dear&nbsp;".$agent_name."</h3>
										<p>I hope this message finds you well. I am writing to let you know that your password change sucessfully.
										</p>
										<p>Please check your new password by login and take the necessary action to resolve the inquiry. If you have any questions or need any additional information, please do 
                                            not hesitate to contact Head Office. 
										</p>
										<p>Thank you for your prompt attention to this matter.</p>
										<p>Sincerely,</p>
										<h5>ChoudharyYatra Company</h5>
										<a href=".base_url()."agent/login>Click Here</a>
									</body>
									</html>";
									$subject_email=' Password change by agent';
						// $this->send_mail($agent_email,$from_email,$msg_email,$subject_email,$cc=null);

                             $this->session->set_flashdata('success_message',$this->module_title." Successfully.");
                             redirect(base_url('supervision/login/logout'));
                         }
                         else
                         {
                             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                         }
                     }
                     else
                         {
                             $this->session->set_flashdata('error_message',"Old Password is Wrong".".");
                         }
                     redirect($this->module_url_path.'/change_password');
                 }   
             }
             $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';        
         $this->arr_view_data['page_title']      = $this->module_title." ";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."change_password";
         $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
        
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

     public function index()
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         
         $this->db->where('id',$id);         
         $arr_data = $this->master_model->getRecords('supervision');

         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = "Details";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
     }
    


}