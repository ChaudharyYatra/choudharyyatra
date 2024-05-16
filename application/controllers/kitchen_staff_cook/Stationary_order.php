<?php 
//   Controller for: home page
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Stationary_order extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/stationary_order";
        $this->module_title       = "Stationary Order";
        $this->module_url_slug    = "stationary_order";
        $this->module_view_folder = "stationary_order/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');

         $record = array();
         $fields = "stationary_order.*";
         $this->db->order_by('stationary_order.created_at','desc');
         $this->db->where('stationary_order.is_deleted','no');
         $this->db->where('stationary_order.received_status','no');
         $this->db->where('stationary_order.agent_id',$id);
        //  $this->db->join("stationary", 'stationary_order_details.stationary_name=stationary.id','left');
         $arr_data = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);

        //  $this->db->where('is_deleted','no');
        //  $arr_data = $this->master_model->getRecords('stationary_order');
        

         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
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
		 
		 $this->db->where('is_deleted','no');
                    $this->db->where('is_active','yes');
                    $this->db->where('id',$id);
                    $this->db->order_by('id','DESC');
                    $agent_data_email = $this->master_model->getRecord('agent');
                    $agent_email=$agent_data_email['email'];
		 			$agent_name=$agent_data_email['agent_name'];
		 
		 			$this->db->where('is_active','yes');
                    $this->db->where('is_deleted','no');
                    $stationary_data = $this->master_model->getRecord('stationary_login');
		 			$stationary_user_name=$stationary_data['user_name'];
         
         if($this->input->post('submit'))
         {
                 
                 $stationary_name  = $this->input->post('stationary_name'); 
                 $stationary_qty         = $this->input->post('stationary_qty'); 
                 $stationary_order_desc        = $this->input->post('order_desc');
				$today=date('Y-m-d');
                 $arr_insert = array(
                    'agent_id' =>   $id,
                    'order_status' => 'Requested',
                    'order_desc' => $stationary_order_desc
                );
                $inserted_id = $this->master_model->insertRecord('stationary_order',$arr_insert,true);
               $insertid = $this->db->insert_id();
            
            $s_order_no = 'CYCORD_'.$id.'_'.$insertid;
                $arr_update = array(
                    'order_no'   =>   $s_order_no,   
                );
                $arr_where     = array("id" => $insertid);
                $this->master_model->updateRecord('stationary_order',$arr_update,$arr_where);

                 $count = count($stationary_name);
                 for($i=0;$i<$count;$i++)
                 {
                    $arr_insert = array(
                        'agent_id' =>   $id,
                        'stationary_name'   =>  $_POST["stationary_name"][$i],   
                        'stationary_qty'    =>  $_POST["stationary_qty"][$i],
                        'order_id'         =>   $insertid,
                        'order_status'    => 'requested'
                    );
                    
                    $inserted_id = $this->master_model->insertRecord('stationary_order_details',$arr_insert,true);
                }               
                 if($inserted_id > 0)
                 {
					 $from_email='chaudharyyatra8@gmail.com';
					 $subject='Order Confirmation - #'.$s_order_no;
						$msg="<html>
									<head>
										<style type='text/css'>
											body {font-family: Verdana, Geneva, sans-serif}
										</style>
									</head>
									<body background=".base_url()."uploads/email/email1.jpg>
										<h3>Dear&nbsp;".$agent_name."</h3>
										<p>We are writing to confirm that we have received your order&nbsp;<b>".$s_order_no.".</b><br> 
										Thank you for choosing our Service for your Stationary purchase. We are thrilled to 
										have you as our valued Agent.</p>
										<h3>Order Details:</h3>
										<P><b>Order Number :&nbsp;</b>".$s_order_no."</p>
										<p><b>Order Date :&nbsp;</b>".$today."</p>
										<p>Your order is currently being processed and will be shipped to you as soon as possible. 
										We will send you a shipping confirmation email with tracking 
										information once your order has been dispatched.</p>
										<p>If you have any questions or concerns about your order,
										please do not hesitate to contact us. Our customer service team is always here to help.</p>
										<p>Thank you again for choosing our service. We look forward to serving you in the future.</p>
										<p>Best regards,</p>
										<h5>CoudharyYatra Company</h5>
										<a href=".base_url()."admin/login>Click Here To View Your Order</a>
									</body>
									</html>";
						//echo $msg;
						
						// $this->send_mail($agent_email,$from_email,$msg,$subject,$cc=null);
					 
					 $subject_stationary='New Order From Agent - #'.$s_order_no;
					 $stationary_email='vivekpatilss23@gmail.com';
					 $msg_stationary="<html>
									<head>
										<style type='text/css'>
											body {font-family: Verdana, Geneva, sans-serif}
										</style>
									</head>
									<body background=".base_url()."uploads/email/email1.jpg>
										<h3>Dear&nbsp;".$stationary_user_name."</h3>
										<p>I hope this message finds you well. I am writing to let you know that a new order has been 													encountered in your account from a Agent. 
										We would appreciate it if you could assist them with their order-related needs.</p>
										<h3>Order Details:</h3>
										<P><b>Order Number :&nbsp;</b>".$s_order_no."</p>
										<p><b>Order Date :&nbsp;</b>".$today."</p>
										<p>Please review the order details and take the necessary action to fulfill the order. If you have any 											questions or need any additional information,
										please do not hesitate to contact Head Office.</p>
										<p>Thank you for your prompt attention to this matter.</p>
										<p>Best regards,</p>
										<h5>CoudharyYatra Company</h5>
										<a href=".base_url()."stationary/login>Click Here To View Your Order</a>
									</body>
									</html>";
					//  $this->send_mail($stationary_email,$from_email,$msg_stationary,$subject_stationary,$cc=null);
					 
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)."Added Successfully.");
                     redirect($this->module_url_path.'/index');
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
             }   
 
         $this->db->where('is_deleted','no');
         //  $this->db->where('stationary_id',$i);
          $arry_data = $this->master_model->getRecords('stationary_order_details');

          $this->db->where('is_deleted','no');
          //  $this->db->where('stationary_id',$i);
           $arry_data = $this->master_model->getRecords('stationary_order');


         $this->db->where('is_deleted','no');
        //  $this->db->where('stationary_id',$i);
         $stationary_data = $this->master_model->getRecords('stationary');
        
 
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['arry_data'] = $arry_data;
         $this->arr_view_data['stationary_data'] = $stationary_data;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
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

         // Get Details 
    public function details($id)
    {
        $agent_sess_name = $this->session->userdata('agent_name');
        //  $id=$this->session->userdata('agent_sess_id');

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        $record = array();
         $fields = "stationary_order_details.*,stationary.stationary_name,agent.agent_name,agent.booking_center,department.department";
         $this->db->order_by('stationary_order_details.created_at','desc');
         $this->db->where('stationary_order_details.is_deleted','no');
         $this->db->where('stationary_order_details.order_id',$id);
         $this->db->join("stationary", 'stationary_order_details.stationary_name=stationary.id','left');
         $this->db->join("agent", 'stationary_order_details.agent_id=agent.id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $arr_data = $this->master_model->getRecords('stationary_order_details',array('stationary_order_details.is_deleted'=>'no'),$fields);
        
        
        $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }
    
    
public function received()
    {  
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $stationary_data = $this->master_model->getRecord('stationary_login');
        $stationary_user_name=$stationary_data['user_name'];
        
        if($this->input->post('submit'))
        { 
               
            $this->form_validation->set_rules('received_qty[]', 'Enter Send Quantity', 'required');
            
            if($this->form_validation->run() == TRUE)
            { 
                $received_qty  = $this->input->post('received_qty'); 
                $s_id  = $this->input->post('s_id'); 
                $o_id  = $this->input->post('o_id'); 
            
                $count = count($received_qty);
              
                for($i=0;$i<$count;$i++)
                {
                    $arr_update = array(
                        'received_qty'   =>    $_POST["received_qty"][$i],
                        'received_status'   =>    'yes',    
                        'order_status'   =>    'completed' 
                    );
                    $arr_where     = array("id" => $s_id[$i]);
                    $inserted_id = $this->master_model->updateRecord('stationary_order_details',$arr_update,$arr_where);
                }    

                $arr_update_order = array(
                    'received_status'   =>    'yes',    
                    'order_status'   =>    'completed' 
                );
                $arr_where_order     = array("id" => $o_id);
                $update_id = $this->master_model->updateRecord('stationary_order',$arr_update_order,$arr_where_order);


                    $this->db->where('is_deleted','no');
                    $this->db->where('is_active','yes');
                    $this->db->where('id',$id);
                    $this->db->order_by('id','DESC');
                    $agent_data_email = $this->master_model->getRecord('agent');
                    $agent_email=$agent_data_email['email'];
		 			$agent_name=$agent_data_email['agent_name'];

                     $this->db->where('is_deleted','no');
                    //  $this->db->where('id',$od_id);
                     $stationary_order = $this->master_model->getRecord('stationary_order');
                     $stationary_order_no = $stationary_order['order_no'];
                     $stationary_order_date = $stationary_order['created_at'];

                if($inserted_id > 0)
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
										<p>We are writing to confirm that we have receive my order&nbsp;<b>".$stationary_order_no.".</b><br> 
										Thank you for choosing our Service for your Stationary purchase. We are thrilled to 
										have you as our valued Agent.</p>
										<h3>Order Details:</h3>
										<P><b>Order Number :&nbsp;</b>".$stationary_order_no."</p>
										<p><b>Order Date :&nbsp;</b>".$stationary_order_date."</p>
										<p>Your order is currently dispatched and will be received to you as soon as possible. 
										</p>
										<p>If you have any questions or concerns about your order,
										please do not hesitate to contact us. Our customer service team is always here to help.</p>
										<p>Thank you again for choosing our service. We look forward to serving you in the future.</p>
										<p>Best regards,</p>
										<h5>CoudharyYatra Company</h5>
										<a href=".base_url()."admin/login>Click Here To View Your Order</a>
                                        <img src=".base_url()."uploads/courier_receipt/".$stationary_courier_receipt."></img>
									</body>
									</html>";
						// echo $msg;
						// die;
						// $this->send_mail($agent_email,$from_email,$msg,$subject,$cc=null); 
                        
                        // die;
					 
					 $subject_stationary='New Order From Agent - #'.$stationary_order_no;
					 $stationary_email='vivekpatilss23@gmail.com';
					 $msg_stationary="<html>
									<head>
										<style type='text/css'>
											body {font-family: Verdana, Geneva, sans-serif}
										</style>
									</head>
									<body background=".base_url()."uploads/email/email1.jpg>
										<h3>Dear&nbsp;".$stationary_user_name."</h3>
										<p>I hope this message finds you well. receive order to agent.</p>
										<h3>Order Details:</h3>
										<P><b>Order Number :&nbsp;</b>".$stationary_order_no."</p>
										<p><b>Order Date :&nbsp;</b>".$stationary_order_date."</p>
										<p>Please review the order details and take the necessary action to fulfill the order. If you have any 											questions or need any additional information,
										please do not hesitate to contact Head Office.</p>
										<p>Thank you for your prompt attention to this matter.</p>
										<p>Best regards,</p>
										<h5>CoudharyYatra Company</h5>
										<a href=".base_url()."stationary/login>Click Here To View Your Order</a>
									</body>
									</html>";
                    //  echo $msg;                
					//  $this->send_mail($stationary_email,$from_email,$msg_stationary,$subject_stationary,$cc=null);
                    // die;

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
        $arr_data = $this->master_model->getRecords('stationary_order_details');


        $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        // $this->arr_view_data['action']          = 'details';
        $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['stationary_order_details'] = $stationary_order_details;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }

    public function completed()
    {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $record = array();
        $fields = "stationary_order.*";
        $this->db->order_by('stationary_order.created_at','desc');
        $this->db->where('stationary_order.is_deleted','no');
        $this->db->where('stationary_order.received_status','yes');
        $this->db->where('stationary_order.agent_id',$id);
       //  $this->db->join("stationary", 'stationary_order_details.stationary_name=stationary.id','left');
        $arr_data = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);

       //  $this->db->where('is_deleted','no');
       //  $arr_data = $this->master_model->getRecords('stationary_order');
       

        $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
       
    }
    
    
    
    public function se()
{
    $toemail='maheshmhaske500@gmail.com';
    $from_email='kingviveksh@gmail.com';
    $msg='testing mail';
    $subject='test';
    $this->sendemail($toemail,$from_email,$msg,$subject,$cc=null);
}

    
    public function sendemail($email,$from_email,$msg,$subject,$cc=null)
            {
            //SMTP & mail configuration
        // $config = array(
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'ssl://smtp.sumagosolutions.in',
        //     'smtp_port' => 465,
        //     'smtp_user' => 'maheshmhaske500@gmail.com',
        //     'smtp_pass' => 'Mahesh@2309',
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8'
        // );
        
        $config['protocol'] = 'sendmail';
        $config['mailPath'] = '/usr/sbin/sendmail';
        $config['charset']  = 'iso-8859-1';
        $config['wordWrap'] = true;

        $this->email->initialize($config);
        // print_r($config);
        // die;
       // $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        
        //Email content
        $htmlContent = '<h1>Sending email via SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';
        
        $this->email->to('kingviveksh@gmail.com');
        $this->email->from('mhaskem01@gmail.com');
        $this->email->subject('How to send email via SMTP server in CodeIgniter');
        $this->email->message($htmlContent);
       // print_r($this->email);
        //Send email
        echo 'okkkk';
        print_r($this->email->send());
        
}



}