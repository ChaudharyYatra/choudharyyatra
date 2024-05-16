<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Stationary_request extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('stationary_sess_id')=="") 
        { 
                redirect(base_url().'stationary/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('stationary_panel_slug')."stationary/stationary_request";
        $this->module_title       = "Stationary Requests";
        $this->inprocess_module_title       = "Stationary Inprocess Requests";
        $this->module_url_slug    = "stationary_request";
        $this->module_view_folder = "stationary_request/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
        $stationary_sess_name = $this->session->userdata('stationary_name');
        $id = $this->session->userdata('stationary_sess_id');

         $record = array();
         $fields = "stationary_order.*,agent.agent_name,agent.booking_center,department.department,agent.fld_agency_name,agent.fld_office_address";
         $this->db->order_by('stationary_order.created_at','desc');
         $this->db->where('stationary_order.order_status','requested');
         $this->db->where('stationary_order.received_status','no');
         $this->db->where('stationary_order.reject_status','no');
         $this->db->join("agent", 'stationary_order.agent_id=agent.id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $this->db->join("stationary_order_details", 'stationary_order_details.order_id=stationary_order.id','left');
         $this->db->group_by('stationary_order_details.order_id');
         $arr_data = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

         $this->arr_view_data['stationary_sess_name'] = $stationary_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('stationary/layout/stationary_combo',$this->arr_view_data);
        
     }

     public function inprocess()
     {
        $stationary_sess_name = $this->session->userdata('stationary_name');
        $id = $this->session->userdata('stationary_sess_id');

         $record = array();
         $fields = "stationary_order.*,agent.agent_name,agent.booking_center,department.department,agent.fld_agency_name,agent.fld_office_address";
         $this->db->order_by('stationary_order.created_at','desc');
         $this->db->where('stationary_order.order_status','inprocess');
         $this->db->where('stationary_order.received_status','no');
        //  $this->db->where('stationary_order.reject_status','no');
         $this->db->join("agent", 'stationary_order.agent_id=agent.id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $this->db->join("stationary_order_details", 'stationary_order_details.order_id=stationary_order.id','left');
         $this->db->group_by('stationary_order_details.order_id');
         $arr_data = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);
        

         $this->arr_view_data['stationary_sess_name'] = $stationary_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->inprocess_module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."inprocess";
         $this->load->view('stationary/layout/stationary_combo',$this->arr_view_data);
        
     }

    // Get Details 
    public function details($id)
    {
        $stationary_sess_name = $this->session->userdata('stationary_name');
       // $id = $this->session->userdata('stationary_sess_id');

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

         $record = array();
         $fields = "stationary_order_details.*,stationary_order_details.stationary_name as sta_id,stationary.stationary_name,
         stationary.series_yes_no,agent.agent_name,agent.booking_center,department.department,stationary.id as stid,stationary_order.reject_status";
         $this->db->order_by('stationary_order_details.created_at','desc');
         $this->db->where('stationary_order_details.is_deleted','no');
        //  $this->db->where('stationary_order_details.reject_status','no');
         $this->db->where('stationary_order_details.order_id',$id);
         $this->db->join("stationary", 'stationary_order_details.stationary_name=stationary.id','left');
         $this->db->join("agent", 'stationary_order_details.agent_id=agent.id','left');
         $this->db->join("stationary_order", 'agent.id=stationary_order.agent_id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $arr_data = $this->master_model->getRecords('stationary_order_details',array('stationary_order_details.is_deleted'=>'no'),$fields);

         $record = array();
         $fields = "stationary_order.*,agent.agent_name,agent.booking_center,department.department";
         $this->db->order_by('stationary_order.created_at','desc');
         $this->db->where('stationary_order.is_deleted','no');
         $this->db->where('stationary_order.id',$id);
         $this->db->join("agent", 'stationary_order.agent_id=agent.id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $arr_data_s_order = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);
        

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $courier_company_name_data = $this->master_model->getRecords('courier');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $academic_years_data = $this->master_model->getRecords('academic_years');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('series_yes_no','Yes');
        $from_series_data = $this->master_model->getRecords('stationary');
        
        $this->arr_view_data['stationary_sess_name'] = $stationary_sess_name;
        $this->arr_view_data['academic_years_data']  = $academic_years_data;
        $this->arr_view_data['from_series_data']  = $from_series_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data_s_order'] = $arr_data_s_order;
        $this->arr_view_data['courier_company_name_data'] = $courier_company_name_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('stationary/layout/stationary_combo',$this->arr_view_data);
    }

    public function reject()
    {
        $stationary_sess_name = $this->session->userdata('stationary_name');
        // $id = $this->session->userdata('stationary_sess_id');
                 
                if($this->input->post('reject_comment') !="")
                {
                    
                    // $this->form_validation->set_rules('reject_comment', 'reject comment', 'required');
                
                    // if($this->form_validation->run() == TRUE)
                    // {
                    $reject_comment  = $this->input->post('reject_comment'); 
                    $o_d_id  = $this->input->post('o_d_id'); 
                    $o_id  = $this->input->post('o_id'); 

                    $arr_update = array(
                    'reject_comment'    => $reject_comment,
                    'reject_status'     => 'yes'
                        
                    );
                    
                        $arr_where     = array("id" => $o_d_id);
                        $udata= $this->master_model->updateRecord('stationary_order_details',$arr_update,$arr_where);

                        $arr_update_order = array(
                            'reject_status'     => 'yes'
                                
                            );
                            
                                $arr_where_order     = array("id" => $o_id);
                                $udata = $this->master_model->updateRecord('stationary_order',$arr_update_order,$arr_where_order);
                        
                        if($udata)
                        {
                            echo 'true';
                        }
                        else
                        {
                            echo 'false';

                        }
                        die;
                    //}   
                }
        
            
               
        
    }


    public function send()
    {  
        $stationary_sess_name = $this->session->userdata('stationary_name');
        $id = $this->session->userdata('stationary_sess_id');
       
        if($this->input->post('o_id'))
        { 
                $send_qty  = $this->input->post('s_send'); 
                $s_id  = $this->input->post('so_id'); 
                $o_id  = $this->input->post('o_id'); 
                $send_status  = $this->input->post('send_status'); 
               $count = count($send_qty);
               $status_count = count($send_status);

               for($p=0; $p<$status_count; $p++)
               {
                if($send_status[$p] == 'accepted')
                {
                    $abcd='send';
                    break;
                }else if($send_status[$p] == 'rejected'){
                    $abcd='nosend';
                }
               
               }

    if($abcd=='send')
    {
                for($i=0;$i<$count;$i++)
                {
                    if($send_qty[$i]!=''){
                    $arr_update = array(
                        'send_qty'   =>    $send_qty[$i] 
                    );
                    $arr_where     = array("id" => $s_id[$i]);
                    $result = $this->master_model->updateRecord('stationary_order_details',$arr_update,$arr_where);

                    $this->db->where('id',$s_id[$i]);
                    $stationary_data = $this->master_model->getRecord('stationary_order_details');
                   $stationay_id=$stationary_data['stationary_name'];

                   $this->db->where('id',$stationay_id);
                    $stationary_data_all = $this->master_model->getRecord('stationary');
                   $stationay_qty=$stationary_data_all['stationary_quantity'];
                   $rqty=$stationay_qty-$send_qty[$i];

                   $arr_update1 = array(
                    'stationary_quantity'   =>    $rqty 
                );
                $arr_where1     = array("id" => $stationay_id);
                   $result = $this->master_model->updateRecord('stationary',$arr_update1,$arr_where1);
            }
                }    

                if($result=='true')
                {   
                   echo 'true';                  
                }
                else{
                    echo 'false';                  
                } 
                // echo 'abc';
                // die;
    }else if($abcd=='nosend')
    {
              
                    $arr_insert = array(
                        'order_status'        => 'Rejected'
                    );
                    $arr_where     = array("id" => $o_id);
                    // print_r($arr_where);
                    // die;
                    $result = $this->master_model->updateRecord('stationary_order',$arr_insert,$arr_where);

        if($result=='true')
        {   
           echo 'rejected';                  
        }
        else{
            echo 'false';                  
        } 
        // echo 'xyz';
        //          die;
    }
        }

  
    }

    public function save_details()
    {   
        $stationary_sess_name = $this->session->userdata('stationary_name');
        $id = $this->session->userdata('stationary_sess_id');
        
        // print_r($_REQUEST);
        // die;
       
        if($this->input->post('save_series'))
        {
                $academic_year  = $this->input->post('academic_year');
                $from_series  = $this->input->post('from_series');
                $remark  = $this->input->post('remark');
                $order_id  = $this->input->post('order_id');
                $order_d_id  = $this->input->post('order_d_id');
            

                $c=count($academic_year);
                for($i=0; $i<$c; $i++){

                    $arr_insert = array(
                        'academic_year'   =>   $academic_year[$i],
                        'from_series'   =>   $from_series[$i],
                        'remark'   =>   $remark[$i],
                        'order_id'   =>   $order_id,
                        'order_details_id'   => $order_d_id
                    );

                    $inserted_id = $this->master_model->insertRecord('stationary_series_details',$arr_insert,true);
					
					 $arr_update = array(
                        'is_sended'   =>   '1'
                    );
                    $arr_where     = array("id" => $from_series[$i]);
                    $result = $this->master_model->updateRecord('stationary_details',$arr_update,$arr_where);
                //}   
               
                $arr_insert = null;
                echo 'true';

            } 
           
        }else if($this->input->post('no_series'))
        {

                $academic_year  = $this->input->post('academic_year');
                $remark  = $this->input->post('remark');
                $order_id  = $this->input->post('order_id');
                $order_d_id  = $this->input->post('order_d_id');

                    $arr_insert = array(
                        'academic_year'   =>   $academic_year,
                        'remark'   =>   $remark,
                        'order_id'   =>   $order_id,
                        'order_details_id'   => $order_d_id
                    );

                    $inserted_id = $this->master_model->insertRecord('stationary_series_details',$arr_insert,true);

                $arr_insert = null;
                echo 'true';
        }else{
            echo 'false';
        }

    }

    public function check_stock()
    {  
        if($this->input->post('send_qty'))
        { 
                $send_qty  = $this->input->post('send_qty'); 
                $stationary_id  = $this->input->post('stationary_id');

                    $this->db->where('id',$stationary_id);
                    $stationary_data = $this->master_model->getRecord('stationary');
                   $stationay_qty=$stationary_data['stationary_quantity'];


                if($stationay_qty >= $send_qty)
                {   
                   echo 'true';                  
                }
                else{
                    echo 'false';                  
                } 
        }

  
    }


    public function send_receipt()
    {  
        $stationary_sess_name = $this->session->userdata('stationary_name');
        $id = $this->session->userdata('stationary_sess_id');

                    $this->db->where('is_active','yes');
                    $this->db->where('is_deleted','no');
                    $stationary_data = $this->master_model->getRecord('stationary_login');
		 			$stationary_user_name=$stationary_data['user_name'];
					$stationary_email=$stationary_data['stationary_email'];
        
        //  print_r($_REQUEST);
        // die;
        if($this->input->post('submit_doc'))
        {
            
          
                $file_name     = $_FILES['courier_receipt']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                $file_name = $_FILES['courier_receipt'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['courier_receipt']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

              $file_name_courier_receipt =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/courier_receipt/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_courier_receipt;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('courier_receipt'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $new_img_filename = $file_name_courier_receipt;
                }
                else
                {
                    $new_img_filename = $this->input->post('courier_receipt',TRUE);     
                }
              
               $courier_company_name  = $this->input->post('courier_company_name'); 
               
                $courier_comment        = $this->input->post('courier_comment');
                $dispatch_date        = $this->input->post('dispatch_date');
                $od_id        = $this->input->post('od_id');
                $order_detail_id = explode(",", $od_id );
                $o_id        = $this->input->post('o_id');
				$agent_id        = $this->input->post('agent_id');
                $today=date('Y-m-d');

               $count=count($order_detail_id);
                
                    $arr_insert = array(
                        'courier_company_name'   =>   $courier_company_name,
                        'courier_comment'          => $courier_comment,
                        'courier_receipt'    => $new_img_filename,
                        'dispatch_date'    => $dispatch_date,
                        'order_status'        => 'Inprocess'
                    );
                    $arr_where     = array("id" => $o_id);
                    $result = $this->master_model->updateRecord('stationary_order',$arr_insert,$arr_where);

                    $arr_update = array(
                        // 'order_status'=>'sended',
                        'is_sended'   =>   'yes'
                    );

                    for($i=0;$i<$count;$i++)
                {
                    $arr_where_od     = array("id" => $order_detail_id[$i]);
                    $result = $this->master_model->updateRecord('stationary_order_details',$arr_update,$arr_where_od);
                }    

                    $this->db->where('is_deleted','no');
                    $this->db->where('is_active','yes');
                    $this->db->where('id',$agent_id);
                    $this->db->order_by('id','DESC');
                    $agent_data_email = $this->master_model->getRecord('agent');
                    $agent_email=$agent_data_email['email'];
		 			$agent_name=$agent_data_email['agent_name'];

                     $this->db->where('is_deleted','no');
					$this->db->where('id',$o_id);
                     $stationary_order = $this->master_model->getRecord('stationary_order');
                     $stationary_order_no = $stationary_order['order_no'];
                    $stationary_courier_receipt = $stationary_order['courier_receipt'];
			
                     $receipt_img = base_url()."uploads/courier_receipt/".$stationary_courier_receipt;
                if($result > 0)
                {
                    $from_email='chaudharyyatra8@gmail.com';
					 $subject='Order Confirmation - #'.$stationary_order_no;
						$msg="<html>
									<head>
										<style type='text/css'>
											body {font-family: Verdana, Geneva, sans-serif}
										</style>
									</head>
									<body background=".base_url()."uploads/email/email1.jpg>
										<h3>Dear&nbsp;".$agent_name."</h3>
										<p>We are writing to confirm that we have send your order&nbsp;<b>".$stationary_order_no.".</b><br> 
										Thank you for choosing our Service for your Stationary purchase. We are thrilled to 
										have you as our valued Agent.</p>
										<h3>Order Details:</h3>
										<P><b>Order Number :&nbsp;</b>".$stationary_order_no."</p>
										<p><b>Order Date :&nbsp;</b>".$today."</p>
										<p>Your order is currently dispatched and will be received to you as soon as possible. 
										</p>
										<p>If you have any questions or concerns about your order,
										please do not hesitate to contact us. Our customer service team is always here to help.</p>
										<p>Thank you again for choosing our service. We look forward to serving you in the future.</p>
										<p>Best regards,</p>
										<h5>CoudharyYatra Company</h5>
										<a href=".base_url()."admin/login>Click Here To View Your Order</a>
                                        
									</body>
									</html>";
						 $img_url= base_url()."uploads/courier_receipt/".$stationary_courier_receipt;
						// $this->send_mail($agent_email,$from_email,$msg,$subject,$img_url); 
                        
                        // die;
					 
					 $subject_stationary='New Order From Agent - #'.$stationary_order_no;
					// $stationary_email='vivekpatilss23@gmail.com';
					 $msg_stationary="<html>
									<head>
										<style type='text/css'>
											body {font-family: Verdana, Geneva, sans-serif}
										</style>
									</head>
									<body background=".base_url()."uploads/email/email1.jpg>
										<h3>Dear&nbsp;".$stationary_user_name."</h3>
										<p>I hope this message finds you well. you send the order.</p>
										<h3>Order Details:</h3>
										<P><b>Order Number :&nbsp;</b>".$stationary_order_no."</p>
										<p><b>Order Date :&nbsp;</b>".$today."</p>
										<p>Please review the order details and take the necessary action to fulfill the order. If you have any 											questions or need any additional information,
										please do not hesitate to contact Head Office.</p>
										<p>Thank you for your prompt attention to this matter.</p>
										<p>Best regards,</p>
										<h5>CoudharyYatra Company</h5>
										<a href=".base_url()."stationary/login>Click Here To View Your Order</a>
									</body>
									</html>";
                    //  echo $msg;                
					//  $this->send_mail($stationary_email,$from_email,$msg_stationary,$subject_stationary,$img_url);
                    // die;
                    // print_r($_REQUEST);
                  
                    $this->session->set_flashdata('success_message'," Stationary Receipt Send Successfully.");
                    redirect($this->module_url_path.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
             

                redirect($this->module_url_path.'/index');
           // }   
        }

        // die;
        // redirect($this->module_url_path.'/index');
    }

    public function send_mail($to_email,$from_email,$msg,$subject,$img_file=null,$cc=null) {
       
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
      //  $this->email->attach($receipt_img);
     
       //$from_email = "chaudharyyatra8@gmail.com";
      // $to_email = $to_email;
       //Load email library
       $this->email->from($from_email, 'Choudhary Yatra');
       $this->email->to($to_email);
       $this->email->subject($subject);
       $this->email->message($msg);
		$this->email->attach($img_file);
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

    
        public function se()
        {
            $toemail='vivekpatilss23@gmail.com';
            $from_email='mhaskem01@gmail.com';
            $msg='testing mail';
            $subject='test';
            $this->sendemail($toemail,$from_email,$msg,$subject,$cc=null);
        }

    public function sendemail($email,$from_email,$msg,$subject,$cc=null)
    {
      $config['protocol'] = 'sendmail';
          $config['mailpath'] = '/usr/sbin/sendmail';
          $config['charset'] = 'iso-8859-1';
          $config['wordwrap']=TRUE;
          $config['mailtype'] = 'html';
  
          $this->email->initialize($config);
          $this->load->library('email');
          $this->email->from($from_email);
          $this->email->to($email);
  
          // $this->email->cc('mangeshgore787@gmail.com');
          // $this->email->bcc('maheshmhaske500@gmail.com');
          $this->email->subject($subject);
          $this->email->message($msg);
          if($this->email->send())
          {
              echo 'done';
              die;
          }else
          {
              echo 'no';
              die;
          }
    }

    

    public function get_series(){ 
        // POST data 
        $stationary_id = $this->input->post('stationary_id');
        
                // $this->db->where('is_deleted','no');
                 $this->db->where('is_sended','0');
                $this->db->where('stationary_id',$stationary_id);
                $data = $this->master_model->getRecords('stationary_details');
        // print_r($data);
        // die;
        echo json_encode($data); 
      }



}