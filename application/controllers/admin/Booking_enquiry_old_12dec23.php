<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking_enquiry extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/booking_enquiry";
        $this->module_title       = "Booking Enquiry";
        $this->module_url_slug    = "booking_enquiry";
        $this->module_view_folder = "booking_enquiry/";    
        $this->load->library('upload');
        // $this->load->model('member');
	}

	public function index()
	{
                $record = array();
                $fields = "booking_enquiry.*,packages.tour_title,agent.agent_name,packages.tour_number";
                $this->db->order_by('booking_enquiry.created_at','desc');
                $this->db->where('booking_enquiry.is_deleted','no');
                $this->db->where('followup_status','no');
                $this->db->where('booking_process','no');
                $this->db->join("packages", 'booking_enquiry.package_id=packages.id','left');
                $this->db->join("agent", 'booking_enquiry.agent_id=agent.id','left');
                $arr_data = $this->master_model->getRecords('booking_enquiry',array('booking_enquiry.is_deleted'=>'no'),$fields);
        

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
	
	
	public function import(){
                $data = array();
                $memData = array();
                
                // If import request is submitted
                if($this->input->post('submit')){
                      
                    // Form field validation rules
                    $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
                    
                //     print_r($_REQUEST);
                //     die;
                    // Validate submitted form data
                    if($this->form_validation->run() == true){
                        $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                        
                        // If file uploaded
                        if(is_uploaded_file($_FILES['file']['tmp_name'])){
                            // Load CSV reader library
                            $this->load->library('CSVReader');
                            
                            // Parse data from CSV file
                            $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                        //     print_r($csvData);
                        //     die;
                            // Insert/update CSV data into database
                            if(!empty($csvData)){
                                foreach($csvData as $row){ 
                                    $rowCount++;
                                    
                                    // Prepare data for DB insertion
                                    $memData = array(
                                        'agent_id' => $row['agent_id'],
                                        'first_name' => $row['first_name'],
                                        'last_name' => $row['last_name'],
                                        'email' => $row['email'],
                                        'mobile_number' => $row['mobile_number'],
                                        'gender' => $row['gender'],
                                        'media_source_name' => $row['media_source_name'],
                                        'package_id' => $row['package_id'],
                                        'booking_date' => $row['booking_date'],
                                        'followup_status' => $row['followup_status'],
                                        'is_view' => $row['is_view'],
                                        'is_deleted' => $row['is_deleted'],
                                       // 'created_at' => $row['created_at'],
                                    );
                                    
                                        $insert = $this->member->insert($memData);
                                        
                                        if($insert){
                                            $insertCount++;
                                        }
                                        
                                        $this->db->where('is_deleted','no');
                                        $this->db->where('is_active','yes');
                                        $this->db->where('id',$row['agent_id']);
                                        $this->db->order_by('id','DESC');
                                        $agent_data_email = $this->master_model->getRecord('agent');
                                        $agent_email=$agent_data_email['email'];
                                        $agent_name=$agent_data_email['agent_name'];
                                        
                                        $from_email='chaudharyyatra8@gmail.com';
                                    if($row['email']!=''){
                                        
                                        
                                        $msg="<html>
                                            <head>
                                                <style type='text/css'>
                                                    body {font-family: Verdana, Geneva, sans-serif}
                                                </style>
                                            </head>
                                            <body background=".base_url()."uploads/email/email1.jpg>
                                                <h3>Dear&nbsp;".$row['first_name']."&nbsp;".$row['last_name']."</h3>
                                                <p>I hope this message finds you well. I am writing to let you know that a new inquiry has been 											    
                                                encountered in your account from a customer. We would appreciate it if you could assist them with their travel-related needs.
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
                                $subject='Thank You For Enquiry';
                                // $this->send_mail($row['email'],$from_email,$msg,$subject,$cc=null);
                                // die;
                            }
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
                                        // echo $msg;
                                        $subject_email=' New Enquiry from customer';
                                        // $this->send_mail($agent_email,$from_email,$msg_email,$subject_email,$cc=null);
                                        // die;
                                    }
                                
                                // Status message with imported data count
                                $notAddCount = ($rowCount - ($insertCount + $updateCount));
                                $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                                $this->session->set_userdata('success_msg', $successMsg);
                            }

                            // ================================================
                            $arr_insert = array(
                                'enquiry_from'    =>'Bulk'
                            );
                            
                           $inserted_id = $this->master_model->insertRecord('booking_enquiry',$arr_insert,true);

                            // ================================================
                            if($successMsg > 0)
                            {    
                                $this->session->set_flashdata('success_message',"csv file Added Successfully.");
                                redirect($this->module_url_path.'/import');
                            }
                            else
                            {
                                $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                            }
                            redirect($this->module_url_path.'/import');
                        }else{
                            $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                        }
                    }else{
                        $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
                    }
                }
                //redirect('admin/ members');

        //         $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $academic_years_data = $this->master_model->getRecords('academic_years');

                        $this->arr_view_data['action']          = 'add';
                        // $this->arr_view_data['academic_years_data'] = $academic_years_data;
                        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
                        $this->arr_view_data['module_title']    = $this->module_title;
                        $this->arr_view_data['module_url_path'] = $this->module_url_path;
                        $this->arr_view_data['middle_content']  = $this->module_view_folder."import_csv";
                        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
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


            public function file_check($str){
                $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
                if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
                    $mime = get_mime_by_extension($_FILES['file']['name']);
                    $fileAr = explode('.', $_FILES['file']['name']);
                    $ext = end($fileAr);
                    if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                        return true;
                    }else{
                        $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                        return false;
                    }
                }else{
                    $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
                    return false;
                }
            }





}