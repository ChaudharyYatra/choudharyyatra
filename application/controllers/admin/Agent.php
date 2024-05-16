<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agent extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/agent";
        $this->module_title       = "Agent";
        $this->module_url_slug    = "agent";
        $this->module_view_folder = "agent/";    
        $this->load->library('upload');
	}

	public function index()
	{	    
        $fields = "agent.*,department.department";
        $this->db->order_by('agent.arrange_id','asc');        
        $this->db->where('department.is_deleted','no');        
        $this->db->join("department", 'agent.department=department.id','left');
        $arr_data = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}

    public function add()
    {          
        if(isset($_POST['submit']))
        {
            $this->form_validation->set_rules('department', 'Department', 'required');
            $this->form_validation->set_rules('booking_center', 'Booking Center', 'required');
            $this->form_validation->set_rules('agent_name', 'Agent Name', 'required');
            $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $this->db->where('is_active','yes');
                $arrangeid_check = $this->master_model->getRecords('agent',array('is_deleted'=>'no','arrange_id'=>trim($this->input->post('arrange_id'))));
                if(count($arrangeid_check)==0){
                    
                    $file_name     = $_FILES['image_name']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');
    
                    if($file_name!="")
                    {               
                        $ext = explode('.',$_FILES['image_name']['name']); 
                        $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];
    
                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/add');  
                        }
                    }
                    $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);
    
                    $config['upload_path']   = './uploads/agent_photo/';
                    $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG'; 
                    $config['max_size']      = '10000';
                    $config['file_name']     =  $file_name_to_dispaly;
                    $config['overwrite']     =  TRUE;
    
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
    
                    if(!$this->upload->do_upload('image_name'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path);  
                    }
    
                    if($file_name!="")
                    {
                        $file_name = $this->upload->data();
                        $filename = $file_name_to_dispaly;
                    }
    
                    else
                    {
                        $filename = $this->input->post('image_name',TRUE);
                    }
    
            // -----------------------------------------------------------------------------
            if($_FILES['qr_code']['name']!=""){
                $file_name     = $_FILES['qr_code']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');
    
                    if($file_name!="")
                    {               
                        $ext = explode('.',$_FILES['qr_code']['name']); 
                        $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];
    
                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/add');  
                        }
                    }
                    $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);
    
                    $config['upload_path']   = './uploads/QR_code_image/';
                    $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG'; 
                    $config['max_size']      = '10000';
                    $config['file_name']     =  $file_name_to_dispaly;
                    $config['overwrite']     =  TRUE;
    
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
    
                    if(!$this->upload->do_upload('qr_code'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path);  
                    }
    
                    if($file_name!="")
                    {
                        $file_name = $this->upload->data();
                        $qr_img_filename = $file_name_to_dispaly;
                    }
    
                    else
                    {
                        $qr_img_filename = $this->input->post('qr_code',TRUE);
                    }
        }else{
                     $qr_img_filename = '';
            }
            
            // -----------------------------------------------------------------------------
                          
                $department  = $this->input->post('department'); 
				$arrange_id  = $this->input->post('arrange_id');
				$city       = trim($this->input->post('city'));
                $booking_center        = trim($this->input->post('booking_center'));
                $agent_name       = trim($this->input->post('agent_name'));
                $mobile_number1 = trim($this->input->post('mobile_number1'));
                $mobile_number2 = trim($this->input->post('mobile_number2'));
                $email = trim($this->input->post('email'));
               
				$password = trim($this->input->post('password'));
                $agency_name = $this->input->post('agency_name');
                $mobile_number3 = trim($this->input->post('mobile_number3'));
                $landline_number = trim($this->input->post('landline_number'));
                $registration_date = trim($this->input->post('registration_date'));
                $GST_number = trim($this->input->post('GST_number'));
                $pan_number = trim($this->input->post('pan_number'));

                $flat_no  = $this->input->post('flat_no');
                $building_house_nm  = $this->input->post('building_house_nm');
                $street_name  = $this->input->post('street_name');
                $landmark  = $this->input->post('landmark'); 

                $agent_state  = $this->input->post('agent_state');
                $agent_district  = $this->input->post('agent_district');
                $agent_taluka  = $this->input->post('agent_taluka');
                $agent_city  = $this->input->post('agent_city');
                $upi_id  = $this->input->post('upi_id');

                if($upi_id!='' || $qr_img_filename!=''){
                    $upi_id  = $this->input->post('upi_id');
                    $qr_img_filename = $file_name_to_dispaly;
                    $status = 'Approved';
                    }
                    else{
                        $upi_id  = $this->input->post('upi_id');
                        $qr_img_filename = '';
                        $status = 'Disapproved';
                    }

                $arr_insert = array(
                    'department'   =>   $department,
					'arrange_id'   =>   $arrange_id,
					'city'   =>   $city,
                    'booking_center'          => $booking_center,
                    'agent_name'          => $agent_name,
                    'mobile_number1'          => $mobile_number1,
                    'mobile_number2'          => $mobile_number2,
                    'email'          => $email,
                    'password'          => $password,

                    'fld_mobile_number3'          => $mobile_number3,
                    'fld_landline_number'          => $landline_number,
                    'fld_registration_date'          => $registration_date,
                    'fld_GST_number'          => $GST_number,
                    'fld_pan_number'          => $pan_number,
                    'image_name'    => $filename,

                    'flat_no' =>   $flat_no,
                    'building_house_nm'   =>   $building_house_nm,
                    'street_name'   =>   $street_name,   
                    'landmark'    =>$landmark,

                    'state_name'    =>$agent_state,
                    'district_name' =>   $agent_district,
                    'taluka_name'   =>   $agent_taluka,
                    'city_name'     =>   $agent_city,
                    'upi_id'     =>   $upi_id,
                    'qr_code_image'     =>   $qr_img_filename,
                    'status_of_QR_UPI'     => $status
                    
                );
                // print_r($arr_insert); die;
                // print_r($_REQUEST); die;
                $inserted_id = $this->master_model->insertRecord('agent',$arr_insert,true);

				$this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                
                 $admin_data_email = $this->master_model->getRecord('admin');
                 $admin_email=$admin_data_email['email'];
                 $admin_name=$admin_data_email['name'];
                               
                if($inserted_id > 0)
                {
					$from_email='chaudharyyatra8@gmail.com';
						$msg="<html>
									<head>
										<style type='text/css'>
											body {font-family: Verdana, Geneva, sans-serif}
										</style>
									</head>
									<body background=".base_url()."uploads/email/email1.jpg>
										<h3>Dear&nbsp;".$agent_name."</h3>
										<p>I hope this message finds you well. I am writing to let you know that your account created by admin.
                                        Your <h3>Userid:&nbsp;".$mobile_number1."&nbsp; Password:".$password."</h3>
										</p>
										<p>Please review your account and take the necessary action. If you have any questions or need any additional information, 
										please do not hesitate to contact Head Office. 
										</p>
										<p>Thank you for your prompt attention to this matter.</p>
										<p>Sincerely,</p>
										<h5>ChoudharyYatra Company</h5>
									</body>
									</html>";
						// echo $msg;  die;
						$subject='Thank You';
						// $this->send_mail($email,$from_email,$msg,$subject,$cc=null);
						// die;
						
						$msg_email="<html>
									<head>
										<style type='text/css'>
											body {font-family: Verdana, Geneva, sans-serif}
										</style>
									</head>
									<body background=".base_url()."uploads/email/email1.jpg>
										<h3>Dear&nbsp;".$admin_name."</h3>
										<p>I hope this message finds you well. I am writing to let you know that you created the new agent. 
										</p>
										<p>Agent account created sucessfully.
										</p>
										<p>Thank you for your prompt attention to this matter.</p>
										<p>Sincerely,</p>
										<h5>ChoudharyYatra Company</h5>
										<a href=".base_url()."admin/login>Click Here</a>
									</body>
									</html>";
									$subject_email=' New Agent Created';
						// $this->send_mail($admin_email,$from_email,$msg_email,$subject_email,$cc=null);
					
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }else{
                $this->session->set_flashdata('error_message',"Arrange Id already exist.");
            }    
            }   
        }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $state_data = $this->master_model->getRecords('state_table');
        // print_r($state_data); die;   


        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $department_data = $this->master_model->getRecords('department');

        $this->arr_view_data['action']          = 'add';       
        $this->arr_view_data['department_data'] = $department_data;
        $this->arr_view_data['state_data']        = $state_data;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
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
    
   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('agent');
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index');
            }   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['is_active'] = "no";
            }
            else
            {
                $arr_update['is_active'] = "yes";
            }
            
            if($this->master_model->updateRecord('agent',$arr_update,array('id' => $id)))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
            }
            else
            {
             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
            }
        }
        else
        {
           $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');   
    }

    
    // Delete
    
    public function delete($id)
    {
        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('agent');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('agent',$arr_update,$arr_where))
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
    }
   
    // Edit - Get data for edit
    
    public function edit($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }else{
           
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('agent');
            // print_r($arr_data); die;

            foreach($arr_data  as $arr_data_info){
                $state_id = $arr_data_info['state_name'];
                $district_id = $arr_data_info['taluka_name'];
            }

            if($this->input->post('submit'))
            {
				$this->form_validation->set_rules('department', 'Department', 'required');
				$this->form_validation->set_rules('booking_center', 'Booking Center', 'required');
				$this->form_validation->set_rules('agent_name', 'Agent Name', 'required');
				$this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
				$this->form_validation->set_rules('mobile_number2', 'Mobile Number2', 'required');
				$this->form_validation->set_rules('email', 'Email Address', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				
                if($this->form_validation->run() == TRUE)
                { 
                    $this->db->where('id!=',$id);
                    $arrangeid_check = $this->master_model->getRecords('agent',array('is_deleted'=>'no','arrange_id'=>trim($this->input->post('arrange_id'))));
                    if(count($arrangeid_check)==0){
                // -------------------------------------------------------------------------
                $old_img_name = $this->input->post('old_img_name');
                
                if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                {
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                $file_name = $_FILES['image_name'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['image_name']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

                $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                
                $config['upload_path']   = './uploads/agent_photo/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $filename = $file_name_to_dispaly;
                    if($old_img_name!='') unlink('./uploads/agent_photo/'.$old_img_name);
                }
                else
                {
                    $filename = $this->input->post('image_name',TRUE);
                }
            }
            else
            {
                $filename = $old_img_name;
            }

        //    ----------------------------------------------------------------------
        $old_tc_name = $this->input->post('old_qr_code_name');
                
        if(!empty($_FILES['qr_code']) && $_FILES['qr_code']['name'] !='')
        {
        $file_name     = $_FILES['qr_code']['name'];

        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        $file_name = $_FILES['qr_code'];
        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        if($file_name['name']!="")
        {
            $ext = explode('.',$_FILES['qr_code']['name']); 
            $config['file_name'] = rand(1000,90000);

            if(!in_array($ext[1],$arr_extension))
            {
                $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
            }
        }   

        $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
    
        $config['upload_path']   = './uploads/QR_code_image/';
        $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
        $config['max_size']      = '10000';
        $config['file_name']     = $file_name_to_dispaly_pdf;
        $config['overwrite']     = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config); // Important
        
        if(!$this->upload->do_upload('qr_code'))
        {  
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error_message',$this->upload->display_errors());
            redirect($this->module_url_path.'/edit/'.$id);
        }
        if($file_name['name']!="")
        {   
            $file_name = $this->upload->data();
            $qr_img_filename = $file_name_to_dispaly_pdf;
        }
        else
        {
            $qr_img_filename = $this->input->post('qr_code',TRUE);
            
        }
         }
        else
        {
            $qr_img_filename = $old_qr_code_name;
            
        }

        // ----------------------------------------------------------------------------
    //     $old_qr_code_name = $this->input->post('old_qr_code_name');
                
    //     if(!empty($_FILES['qr_code']) && $_FILES['qr_code']['name'] !='')
    //     {
    //     $file_name     = $_FILES['qr_code']['name'];
    //     $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

    //     $file_name = $_FILES['qr_code'];
    //     $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

    //     if($file_name['name']!="")
    //     {
    //         $ext = explode('.',$_FILES['qr_code']['name']); 
    //         $config['file_name'] = rand(1000,90000);

    //         if(!in_array($ext[1],$arr_extension))
    //         {
    //             $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
    //             redirect($this->module_url_path.'/edit/'.$id);
    //         }
    //     }   

    //     $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
        
    //     $config['upload_path']   = './uploads/QR_code_image/';
    //     $config['allowed_types'] = 'png|jpg|jpeg|PNG|JPEG|JPG';
    //     $config['max_size']      = '10000';
    //     $config['file_name']     = $file_name_to_dispaly;
    //     $config['overwrite']     = TRUE;
    //     $this->load->library('upload',$config);
    //     $this->upload->initialize($config); // Important
        
    //     if(!$this->upload->do_upload('qr_code'))
    //     {  
    //         $data['error'] = $this->upload->display_errors();
    //         $this->session->set_flashdata('error_message',$this->upload->display_errors());
    //         redirect($this->module_url_path.'/edit/'.$id);
    //     }
    //     if($file_name['name']!="")
    //     {   
    //         $file_name = $this->upload->data();
    //         $filename_qr_code = $file_name_to_dispaly;
    //         if($old_qr_code_name!='') unlink('./uploads/QR_code_image/'.$old_qr_code_name);
    //     }
    //     else
    //     {
    //         $filename_qr_code = $this->input->post('qr_code',TRUE);
    //     }
    // }
    // else
    // {
    //     $filename_qr_code = $old_qr_code_name;
    // }
   
        // --------------------------------------------------------------------------

                 $department  = $this->input->post('department'); 
			     $arrange_id  = $this->input->post('arrange_id'); 
				 $city  = $this->input->post('city'); 
                 $booking_center        = trim($this->input->post('booking_center'));
                 $agent_name    = trim($this->input->post('agent_name'));
                 $mobile_number1 = trim($this->input->post('mobile_number1'));
                 $mobile_number2 = trim($this->input->post('mobile_number2'));
                 $email = trim($this->input->post('email'));
                 //$password = password_hash(trim($this->input->post('password')),PASSWORD_DEFAULT);
				$password = trim($this->input->post('password'));

                $mobile_number3 = trim($this->input->post('mobile_number3'));
                $landline_number = trim($this->input->post('landline_number'));
                $registration_date = trim($this->input->post('registration_date'));
                $GST_number = trim($this->input->post('GST_number'));
                $pan_number = trim($this->input->post('pan_number'));

                $flat_no  = $this->input->post('flat_no');
                $building_house_nm  = $this->input->post('building_house_nm');
                $street_name  = $this->input->post('street_name');
                $landmark  = $this->input->post('landmark'); 

                $agent_state  = $this->input->post('agent_state'); 
                $agent_district  = $this->input->post('agent_district');
                $agent_taluka  = $this->input->post('agent_taluka');
                $agent_city  = $this->input->post('agent_city');
                $upi_id  = $this->input->post('upi_id');
                
                $arr_update = array(
                    'department'   =>    $department,
					'arrange_id'   =>    $arrange_id,
					'city'   =>    $city,
                    'booking_center'          => $booking_center,
                    'agent_name'          => $agent_name,
                    'mobile_number1'          =>  $mobile_number1,
                    'mobile_number2'          => $mobile_number2,
                    'email'          => $email,
                    'password'          => $password,

                    'fld_mobile_number3'          => $mobile_number3,
                    'fld_landline_number'          => $landline_number,
                    'fld_registration_date'          => $registration_date,
                    'fld_GST_number'          => $GST_number,
                    'fld_pan_number'          => $pan_number,

                    'flat_no' =>   $flat_no,
                    'building_house_nm'   =>   $building_house_nm,
                    'street_name'   =>   $street_name,   
                    'landmark'    =>$landmark,

                    'state_name'    =>$agent_state,
                    'district_name' =>   $agent_district,
                    'taluka_name'   =>   $agent_taluka,
                    'city_name'     =>   $agent_city,
                    'image_name'     =>   $filename,
                    'qr_code_image'     =>   $qr_img_filename,
                    'upi_id'     =>   $upi_id
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('agent',$arr_update,$arr_where);
                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index');
                }else{
                    $this->session->set_flashdata('error_message',"Arrange Id already exist.");
                } 
            
                }   
            }
        }


        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $state_data = $this->master_model->getRecords('state_table');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('id',$state_id);
        $this->db->order_by('id','ASC');
        $district_data = $this->master_model->getRecords('district_table');
        // print_r($district_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('id',$district_id);
        $this->db->order_by('id','ASC');
        $taluka_data = $this->master_model->getRecords('taluka_table');
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $department_data = $this->master_model->getRecords('department');
        
        $this->arr_view_data['department_data']        = $department_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['state_data']        = $state_data;
        $this->arr_view_data['district_data']        = $district_data;
        $this->arr_view_data['taluka_data']        = $taluka_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    // Get Details of Package
    public function details($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "agent.*,department.department,taluka_table.taluka,district_table.district,state_table.state_name";
        $this->db->where('agent.id',$id);
        $this->db->join("department", 'agent.department=department.id','left');
        $this->db->join("taluka_table", 'agent.taluka_name=taluka_table.id','left');
        $this->db->join("district_table", 'agent.district_name=district_table.id','left');
        $this->db->join("state_table", 'agent.state_name=state_table.id','left');
        $arr_data = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
	
	function check_email_add_avalibility()  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid email address</span></label>';  
           }  
           else  
           {  
               $email=$this->input->post('email');
                $this->db->where('email',$email);
                $arr_data = $this->master_model->getRecords('agent'); 
                $count=count($arr_data);
                if($count > 0)  
                {                     
                    echo true;
                }  
                else if($count == 0)
                {                     
                     echo false;
                }  
           }  
      }  
	
	
	
	function check_email_edit_avalibility()  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
               $email=$this->input->post('email');
               $agent_id=$this->input->post('agent_id');
               
                $this->db->where('id !=',$agent_id);
                $this->db->where('email',$email);
                $arr_data = $this->master_model->getRecords('agent');
             
                $count=count($arr_data);
                
              if($count > 0)
                {  
                     echo true;
                } 
                else if($count == 0)
                {   
                     echo false;
                }  
           }  
      }

      public function get_district(){ 
                // POST data 
                // $all_b=array();
            $district_data = $this->input->post('did');
                // print_r($boarding_office_location); die;
                                $this->db->where('is_deleted','no');
                                $this->db->where('is_active','yes');
                                $this->db->where('state_id',$district_data);   
                                $data = $this->master_model->getRecords('district_table');
                echo json_encode($data);
        }

        public function get_taluka(){ 
            
            // POST data 
            // $all_b=array();
        $taluka_data = $this->input->post('did');
            // print_r($taluka_data); die;
                            $this->db->where('is_deleted','no');
                            $this->db->where('is_active','yes');
                            $this->db->where('district_id',$taluka_data);   
                            $data = $this->master_model->getRecords('taluka_table');
                            // print_r($data); die;
            echo json_encode($data); 
        }


   
}