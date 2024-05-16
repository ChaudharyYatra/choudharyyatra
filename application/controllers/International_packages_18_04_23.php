<?php 
//   Controller for: package page
// Author: Nandkishor Wagh
// Start Date: 05-09-2022
// last updated: 05-09-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class International_packages extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
	 }

    
//     public function packages_list($id)
//     {
        
//         if ($id=='') 
//         {
//             redirect(base_url().'/home');
//         }   

//         if(is_numeric($id))
//         {
//             // $where = array();
//             // $where_in_packages_ids = array();
           
//             //     	$package_id_list = $this->master_model->getSingleRecord('package_mapping',array('is_deleted'=>'no','is_active'=>'yes','id'=>$id),'group_concat(package_id) as package_ids');

//             //         if($package_id_list)
//             //         {
//             //         	$where_in_packages_ids = explode(',',$package_id_list['package_ids']);
//             //      	}
                 	
//             //         if(!empty($where_in_packages_ids))
//             //             {
//             //             	$this->db->where_in('id', $where_in_packages_ids);
//             //           	}
              	
//             $this->db->order_by('packages.id','desc');
//          	$where['packages.is_deleted'] = 'no';
//          	$where['packages.is_active'] = 'yes';
// 			$packages_data = $this->master_model->getRecords('packages', $where);
//         }
//         else
//         {
//             redirect(base_url().'home');
//         }
         
       
        
//         $data = array('middle_content' => 'packages_list',
// 						'packages_data'       => $packages_data,
// 						);
						
//         $this->arr_view_data['page_title']     =  "Packages List";
//         $this->load->view('front/common_view',$data);
//     }
    
    
    
    public function all_packages()
    {
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');       
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC'); 
        $international_packages = $this->master_model->getRecords('international_packages');

        $record = array();
        $fields = "international_packages.*,international_packages_dates.journey_date,international_packages_dates.single_seat_cost,international_packages_dates.twin_seat_cost,international_packages_dates.three_four_sharing_cost";
        $this->db->where('international_packages.is_deleted','no');
        $this->db->where('international_packages.is_active','yes');
        $this->db->join("international_packages_dates", 'international_packages.id=international_packages_dates.package_id','left');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->group_by('package_id');
        $international_packages_all = $this->master_model->getRecords('international_packages',array('international_packages.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "international_packages.*,international_packages_dates.*";
        $this->db->where('international_packages.is_deleted','no');
        $this->db->where('international_packages.is_active','yes');
        $this->db->join("international_packages_dates", 'international_packages.id=international_packages_dates.package_id','left');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        // $this->db->group_by('package_id');
        $international_packages_dates = $this->master_model->getRecords('international_packages',array('international_packages.is_deleted'=>'no'),$fields);
		
        // $this->db->order_by('tour_number','ASC');
        // $international_packages = $this->master_model->getRecords('international_packages');
        // $international_packages = $this->db->query("Select id, academic_year, tour_number, 
        // tour_title, destinations, rating, cost, tour_number_of_days, image_name, short_description, 
        // full_description, iternary, inclusion, terms_conditions, contact_us, is_deleted, is_active, created_at,
        // CAST(tour_number as INT)  as tour_number_new from international_packages order by tour_number_new asc");
        // $international_packages = $international_packages->result_array();
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
        $count= sizeof($international_packages);
         $data = array('middle_content' => 'all_international_packages',
						'international_packages'       => $international_packages,
                        'international_packages_all'       => $international_packages_all,
                        'international_packages_dates'       => $international_packages_dates,
                        'count'      => $count,
                        'page_title' => 'International Packages', 
                        'website_basic_structure' => $website_basic_structure,
                        'social_media_link' => $social_media_link,
                        );
						
        $this->arr_view_data['page_title']     =  "International Packages";
        $this->load->view('front/common_view',$data);
    }
    
    public function package_details($id)
    {
        if($id=='') 
        {
            redirect(base_url().'/home');
        }   

        if(is_numeric($id))
        {
            $this->db->where('id',$id);
            $package_details_data = $this->master_model->getRecords('packages');
            // $this->db->where('package_id',$id);
            // $package_date_details_data = $this->master_model->getRecords('international_packages_dates');
        }
        else
        {
            redirect(base_url().'home');
        }
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('package_id',$id);
        $package_date_details_data = $this->master_model->getRecords('package_date');
       
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
		$fields = "international_package_iternary.*,packages.tour_title";
        $this->db->order_by('international_package_iternary.day_number','asc');
        $this->db->where('international_package_iternary.is_deleted','no');
        $this->db->where('international_package_iternary.package_id',$id);
        $this->db->join("packages", 'international_package_iternary.package_id=packages.id','left');
        $package_iternary_data = $this->master_model->getRecords('international_package_iternary',array('international_package_iternary.is_deleted'=>'no'),$fields);
		
        $data = array('middle_content' => 'international_package_details',
						'package_details'       => $package_details_data,
						'package_date_details_data'       => $package_date_details_data,
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
					    'package_iternary_data'       => $package_iternary_data,
						'page_title'       => 'Package Details',
						);
						
        $this->arr_view_data['page_title']     =  "Package Details";
        $this->load->view('front/common_view',$data);
    }
    
	public function booking_enquiry($id)
    {
        
        if ($id=='') 
        {
            redirect(base_url.'/international_packages/all_packages');
        }   

        if(is_numeric($id))
        {


            $this->db->order_by('international_packages.id','desc');
            $where['international_packages.is_deleted'] = 'no';
            $where['international_packages.is_active'] = 'yes';
            $international_packages_data = $this->master_model->getRecords('international_packages');

            $fields = "agent.*,department.department";
            $this->db->where('department.is_deleted','no');
            $this->db->where('department.is_active','yes');
            $this->db->order_by('agent.id','ASC');
            $this->db->join("department", 'agent.department=department.id','left');
            $Aagent_data = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no','agent.is_active'=>'yes'),$fields);
            
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $website_basic_structure = $this->master_model->getRecords('website_basic_structure');

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $department_data = $this->master_model->getRecords('department');
            
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','DESC');
            $agent_data = $this->master_model->getRecords('agent');
            
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $social_media_link = $this->master_model->getRecords('social_media_link');

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $media_source = $this->master_model->getRecords('media_source');

            if(isset($_POST['submit']))
            {
                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('agent_id', 'Agent ID', 'required');
				$this->form_validation->set_rules('wp_mobile_number', 'Whatsapp Mobile Number', 'required');
    
                if($this->form_validation->run() == TRUE)
                {
                    $first_name        = $this->input->post('first_name'); 
                    $last_name         = $this->input->post('last_name'); 
                    $email             = trim($this->input->post('email'));
                    $mobile_number     = trim($this->input->post('mobile_number'));
                    $gender            = $this->input->post('gender');
                    $agent_id         = $this->input->post('agent_id');
                    $media_source_name         = $this->input->post('media_source_name');
					$wp_mobile_number     = trim($this->input->post('wp_mobile_number'));
                    $package_id        = $id;
    
                    $arr_insert = array(
                        'first_name'    =>   $first_name,
                        'last_name'     => $last_name,
                        'email'         => $email,
                        'mobile_number' => $mobile_number,
                        'gender'        => $gender,
                        'agent_id'     => $agent_id,
                        'media_source_name'    =>$media_source_name,
                        'package_id'    =>$id,
						'wp_mobile_number'=>$wp_mobile_number,
                    );
                    
                    $inserted_id = $this->master_model->insertRecord('international_booking_enquiry',$arr_insert,true);
                
                    $this->db->where('is_deleted','no');
                    $this->db->where('is_active','yes');
                    $this->db->where('id',$agent_id);
                    $this->db->order_by('id','DESC');
                    $agent_data_email = $this->master_model->getRecord('agent');
                    $agent_email=$agent_data_email['email'];
					$agent_name=$agent_data_email['agent_name'];

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
										<h3>Dear&nbsp;".$first_name."&nbsp;".$last_name."</h3>
										<p>I hope this message finds you well. I am writing to let you know that a new inquiry has been 											    
										encountered in your account from a customer. We would appreciate it if you could assist them with their travel-related needs.
										</p>
										<p>Please review the inquiry details and take the necessary action to resolve the inquiry. If you have any questions or need any additional information, 
										please do not hesitate to contact Head Office. 
										</p>
										<p>Thank you for your prompt attention to this matter.</p>
										<p>Sincerely,</p>
										<h5>CoudharyYatra Company</h5>
									</body>
									</html>";
						//echo $msg;
						$subject='Thank You For Enquiry';
						$this->send_mail($email,$from_email,$msg,$subject,$cc=null);
						//die;
						
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
										<h5>CoudharyYatra Company</h5>
										<a href=".base_url()."admin/login>Click Here</a>
									</body>
									</html>";
									$subject_email=' New Enquiry from customer';
						$this->send_mail($agent_email,$from_email,$msg_email,$subject_email,$cc=null);

                        $this->session->set_flashdata('success_message',"Enquiry Added Successfully.");
                        redirect(base_url().'international_packages/confirm_enquiry');
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                    }
                        redirect(base_url().'international_packages/booking_enquiry/'.$id);
                }   
            }

        }
        else
        {
            redirect(base_url().'home');
        }
         
       
        
        $data = array('middle_content' => 'international_booking_enquiry',
				 		'international_packages_data'       => $international_packages_data,
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
                        'agent_data'    => $Aagent_data,
                        'department_data' => $department_data,
                        'media_source' => $media_source,
                        'page_title'    => 'International Booking Enquiry',
						);
						
        $this->arr_view_data['page_title']     =  "Packages List";
        $this->load->view('front/common_view',$data);
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

	
    public function confirm_enquiry()
    {
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
        $fields = "agent.*,department.department";
        $this->db->where('department.is_deleted','no');
        $this->db->where('department.is_active','yes');
        $this->db->order_by('agent.id','ASC');
        $this->db->join("department", 'agent.department=department.id','left');
        $agents_list = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no','agent.is_active'=>'yes'),$fields);
            
        $data = array('middle_content' => 'international_booking_enquiry_confirm',
                        'page_title' => 'Thank You',
                        'website_basic_structure' => $website_basic_structure,
                        'agents_list' => $agents_list,
                        'social_media_link' => $social_media_link
						);
        $this->load->view('front/common_view',$data);
    }
    
    
    
    public function all_packages_asc()
    {
           
       $record = array();
        $fields = "international_packages.*,international_packages_dates.journey_date,international_packages_dates.single_seat_cost,international_packages_dates.twin_seat_cost,international_packages_dates.three_four_sharing_cost";
        $this->db->where('international_packages.is_deleted','no');
        $this->db->where('international_packages.is_active','yes');
        $this->db->join("international_packages_dates", 'international_packages.id=international_packages_dates.package_id','left');
        $this->db->order_by('international_packages.cost','ASC');
        $this->db->group_by('package_id');
        $international_packages_all = $this->master_model->getRecords('international_packages',array('international_packages.is_deleted'=>'no'),$fields);
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
         $data = array('middle_content' => 'all_international_packages',
                        'international_packages_all'       => $international_packages_all,
                        'website_basic_structure' => $website_basic_structure,
                        'social_media_link' => $social_media_link,
                        'page_title' => 'All Packages'
                        );
                        
        $this->arr_view_data['page_title']     =  "All Packages";
        $this->load->view('front/common_view',$data);
    } 
   
    public function all_packages_desc()
    {
         $record = array();
        $fields = "international_packages.*,international_packages_dates.journey_date,international_packages_dates.single_seat_cost,international_packages_dates.twin_seat_cost,international_packages_dates.three_four_sharing_cost";
        $this->db->where('international_packages.is_deleted','no');
        $this->db->where('international_packages.is_active','yes');
        $this->db->join("international_packages_dates", 'international_packages.id=international_packages_dates.package_id','left');
        $this->db->order_by('international_packages.cost','DESC');
        $this->db->group_by('package_id');
        $international_packages_all = $this->master_model->getRecords('international_packages',array('international_packages.is_deleted'=>'no'),$fields);
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
         $data = array('middle_content' => 'all_international_packages',
                        'international_packages_all'       => $international_packages_all,
                        'website_basic_structure' => $website_basic_structure,
                        'social_media_link' => $social_media_link,
                        'page_title' => 'All Packages'
                        );
                        
        $this->arr_view_data['page_title']     =  "All Packages";
        $this->load->view('front/common_view',$data);
    }

    public function agent_fetch_by_department_id()
    {
        
            if($this->input->post('dept_id'))
            {
                $arr_country = array();
				$id=$this->input->post('dept_id');
				$this->db->where('department',$id);
                $arr_agent  = $this->master_model->getRecords('agent');                
                return json_encode($arr_agent);
            }
    }
	
	public function international_package_review()
     {    
        
        if(isset($_POST['submit']))
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $package_id   = $this->input->post('package_id');
                $name         = $this->input->post('name');  
                $email        = trim($this->input->post('email'));
                $message      = trim($this->input->post('message'));

                $arr_insert = array(
                    'name'      =>  $name,
                    'email'     => $email,
                    'message'   => $message,
                    'package_id' => $package_id
                );
                
                $inserted_id = $this->master_model->insertRecord('international_package_review',$arr_insert,true);
            
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Send Successfully.");
                    redirect(base_url()."international_packages/package_details/".$package_id);
                    
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect(base_url()."international_packages/package_details/".$package_id);
            }   
        }
    }
	public function getAgent(){ 
    // POST data 
    $department_id = $this->input->post('did');
    
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->where('department',$department_id);
            $data = $this->master_model->getRecords('agent');
    
    echo json_encode($data); 
  }
}