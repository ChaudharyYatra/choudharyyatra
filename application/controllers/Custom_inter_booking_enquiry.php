<?php 
//   Controller for: package page
// Author: Nandkishor Wagh
// Start Date: 05-09-2022
// last updated: 05-09-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_inter_booking_enquiry extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
	 }
    
    public function all_packages()
    {
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');       
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC'); 
        $international_packages = $this->master_model->getRecords('packages');
		//print_r($international_packages); die;

        $record = array();
        $fields = 	"packages.*,package_date.journey_date,package_date.single_seat_cost,package_date.twin_seat_cost,package_date.three_four_sharing_cost";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('package_type','4');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->group_by('package_id');
        $international_packages_all = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "packages.*,package_date.*";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        // $this->db->group_by('package_id');
        $international_packages_dates = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
		
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
    
    public function all_custom_international_packages()
    {
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');    
        $this->db->where('package_type','Custom International Package');   
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC'); 
        $international_packages = $this->master_model->getRecords('packages');
		//print_r($international_packages); die;

        $record = array();
        $fields = 	"packages.*,package_date.journey_date,package_date.single_seat_cost,package_date.twin_seat_cost,package_date.three_four_sharing_cost";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('package_type','4');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->group_by('package_id');
        $international_packages_all = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($international_packages_all); die;

        $record = array();
        $fields = "packages.*,package_date.*";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        // $this->db->group_by('package_id');
        $international_packages_dates = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
		
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
         $data = array('middle_content' => 'all_custom_international_packages',
						'international_packages'       => $international_packages,
                        'international_packages_all'       => $international_packages_all,
                        'international_packages_dates'       => $international_packages_dates,
                        'count'      => $count,
                        'page_title' => 'International Packages', 
                        'website_basic_structure' => $website_basic_structure,
                        'social_media_link' => $social_media_link,
                        );
						
        $this->arr_view_data['page_title']     =  "Custom International Packages";
        $this->load->view('front/common_view',$data);
    }
    

    public function custom_inter_package_details($id)
    {
        if($id=='') 
        {
            redirect(base_url().'/home');
        }   

        if(is_numeric($id))
        {
            $this->db->where('id',$id);
            $package_details_data = $this->master_model->getRecords('packages');
			//print_r($package_details_data); die;
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
        
		$fields = "package_iternary.*,packages.tour_title";
        $this->db->order_by('package_iternary.day_number','asc');
        $this->db->where('package_iternary.is_deleted','no');
        $this->db->where('package_iternary.package_id',$id);
        $this->db->join("packages", 'package_iternary.package_id=packages.id','left');
        $package_iternary_data = $this->master_model->getRecords('package_iternary',array('package_iternary.is_deleted'=>'no'),$fields);
		
        $data = array('middle_content' => 'custom_inter_package_details',
						'package_details'       => $package_details_data,
						'package_date_details_data'       => $package_date_details_data,
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
					    'package_iternary_data'       => $package_iternary_data,
						'page_title'       => 'Customized International Package Details',
						);
						
        $this->arr_view_data['page_title']     =  "Package Details";
        $this->load->view('front/common_view',$data);
    }
    
	public function custom_international_booking_enquiry($id)
    {
        
        if ($id=='') 
        {
            redirect(base_url.'/packages/all_packages');
        }   

        if(is_numeric($id))
        {     	
            $this->db->order_by('packages.id','desc');
         	$where['packages.is_deleted'] = 'no';
         	$where['packages.is_active'] = 'yes';
			$packages_data = $this->master_model->getRecords('packages');
            
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

            $this->db->where('is_deleted','no');
            $this->db->where('status','approved');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $meal_plan = $this->master_model->getRecords('meal_plan');
            // print_r($meal_plan); die;

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $vehicle_type = $this->master_model->getRecords('vehicle_type');
            // print_r($vehicle_type); die;

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $pick_up_from = $this->master_model->getRecords('pick_up_from');
            // print_r($pick_up_from); die;

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $drop_to = $this->master_model->getRecords('drop_to');
            // print_r($drop_to); die;

            if(isset($_POST['submit']))
            {
                $this->form_validation->set_rules('full_name', 'Full Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('mobile_number1', 'Mobile Number 1', 'required');

                // $this->form_validation->set_rules('mobile_number2', 'Mobile Number 2', 'required');
                $this->form_validation->set_rules('checkin_date', 'checkin_date', 'required');
                $this->form_validation->set_rules('checkout_date', 'checkout_date', 'required');

				$this->form_validation->set_rules('no_of_nights', 'no_of_nights', 'required');
                $this->form_validation->set_rules('hotel_type[]', 'hotel_type', 'required');
                $this->form_validation->set_rules('no_of_couple', 'no_of_couple', 'required');

                $this->form_validation->set_rules('meal_plan', 'meal_plan', 'required');
                $this->form_validation->set_rules('total_adult', 'total_adult', 'required');
                $this->form_validation->set_rules('total_child_with_bed', 'total_child_with_bed', 'required');

                $this->form_validation->set_rules('total_child_without_bed', 'total_child_without_bed', 'required');
                $this->form_validation->set_rules('vehicle_type', 'vehicle_type', 'required');
				$this->form_validation->set_rules('pick_up_from', 'pick_up_from', 'required');

                $this->form_validation->set_rules('pickup_date', 'pickup_date', 'required');
                $this->form_validation->set_rules('pickup_time', 'pickup_time', 'required');
                $this->form_validation->set_rules('drop_to', 'drop_to', 'required');

                $this->form_validation->set_rules('drop_date', 'drop_date', 'required');
                $this->form_validation->set_rules('drop_time', 'drop_time', 'required');
                // $this->form_validation->set_rules('special_note', 'special_note', 'required');
              
    
                
                if($this->form_validation->run() == TRUE)
                {
                    $full_name        = $this->input->post('full_name'); 
                    $email         = $this->input->post('email'); 
                    $mobile_number1             = trim($this->input->post('mobile_number1'));

                    $mobile_number2     = trim($this->input->post('mobile_number2'));
                    $checkin_date            = $this->input->post('checkin_date');
                    $checkout_date         = $this->input->post('checkout_date');

                    $no_of_nights         = $this->input->post('no_of_nights');
					// $hotel_type     = $this->input->post('hotel_type');
                    // $hotel_type_arr_data   		  = $hotel_type_data;
                    $hotel_type_data=implode(',',$this->input->post('hotel_type'));

                    $no_of_couple        = $this->input->post('no_of_couple'); 

                    $meal_plan         = $this->input->post('meal_plan'); 
                    $meal_plan_name         = $this->input->post('meal_plan_name'); 
                    $total_adult             = $this->input->post('total_adult');
                    $total_child_with_bed     = $this->input->post('total_child_with_bed');

                    $total_child_without_bed            = $this->input->post('total_child_without_bed');
                    $vehicle_type         = $this->input->post('vehicle_type');
                    $other_vehicle_name         = $this->input->post('other_vehicle_name');
                    $pick_up_from         = $this->input->post('pick_up_from');
                    $other_pickup_from_name         = $this->input->post('other_pickup_from_name');

                    $pickup_date        = $this->input->post('pickup_date'); 
                    $pickup_time         = $this->input->post('pickup_time'); 
                    $drop_to             = $this->input->post('drop_to');
                    $other_drop_to_name             = $this->input->post('other_drop_to_name');
                    
                    $drop_date     = trim($this->input->post('drop_date'));
                    $drop_time            = $this->input->post('drop_time');
                    $special_note            = $this->input->post('special_note');
                    $package_id        = $id;
                   
    
                    $arr_insert = array(
                        'full_name'    =>   $full_name,
                        'email'     => $email,
                        'mobile_number1'         => $mobile_number1,

                        'mobile_number2' => $mobile_number2,
                        'checkin_date'        => $checkin_date,
                        'checkout_date'     => $checkout_date,

                        'no_of_nights'    =>$no_of_nights,
                        'hotel_type'    =>$hotel_type_data,
						'no_of_couple'=>$no_of_couple,

                        'meal_plan'    =>$meal_plan,
                        'other_meal_plan'    =>$meal_plan_name,
                        'total_adult'    =>$total_adult,
						'total_child_with_bed'=>$total_child_with_bed,

                        'total_child_without_bed'    =>$total_child_without_bed,
                        'vehicle_type'    =>$vehicle_type,
                        'other_vehicle_name'    =>$other_vehicle_name,
						'pick_up_from'=>$pick_up_from,
						'other_pickup_from_name'=>$other_pickup_from_name,

                        'pickup_date'    =>$pickup_date,
                        'pickup_time'    =>$pickup_time,
						'drop_to'=>$drop_to,
						'other_drop_to_name'=>$other_drop_to_name,

                        'drop_date'    =>$drop_date,
                        'drop_time'    =>$drop_time,
						'special_note'=>$special_note,
                        'package_id'=>$package_id,
                        'enquiry_from'=>"Website",
                        'Package_type'=>"Custom International Enquiry"
                        

                    );
                    
                    $inserted_id = $this->master_model->insertRecord('custom_domestic_booking_enquiry',$arr_insert,true);
                    
                    $arr_insert = array(
                        'meal_plan_name'    =>$meal_plan_name,
                        'status'            => 'pending'
                    );
                    $inserted_id = $this->master_model->insertRecord('meal_plan',$arr_insert,true);

                    $arr_insert = array(
                        'vehicle_type_name'    =>$other_vehicle_name,
                        'status'            => 'pending'
                    );
                    $inserted_id = $this->master_model->insertRecord('vehicle_type',$arr_insert,true);

                    $arr_insert = array(
                        'pick_up_name'    =>$other_pickup_from_name,
                        'status'            => 'pending'
                    );
                    $inserted_id = $this->master_model->insertRecord('pick_up_from',$arr_insert,true);

                    $arr_insert = array(
                        'drop_to_name'    =>$other_drop_to_name,
                        'status'            => 'pending'
                    );
                    $inserted_id = $this->master_model->insertRecord('drop_to',$arr_insert,true);
                    
                    // $this->db->where('is_deleted','no');
                    // $this->db->where('is_active','yes');
                    // $this->db->where('id',$agent_id);
                    // $this->db->order_by('id','DESC');
                    // $agent_data_email = $this->master_model->getRecord('agent');
                    // $agent_email=$agent_data_email['email'];
					// $agent_name=$agent_data_email['agent_name'];
                    
                
                    // if($inserted_id > 0)
                    // {    
					// 	$from_email='chaudharyyatra8@gmail.com';
					// 	$msg="<html>
					// 				<head>
					// 					<style type='text/css'>
					// 						body {font-family: Verdana, Geneva, sans-serif}
					// 					</style>
					// 				</head>
					// 				<body background=".base_url()."uploads/email/email1.jpg>
					// 					<h3>Dear&nbsp;".$first_name."&nbsp;".$last_name."</h3>
					// 					<p>We are so glad to welcome you as a customer of <b>Choudhary Yatra Company Pvt. 
					// 						Ltd.</b> We hope that you will have an unforgettable and amazing journey with us.
					// 					</p>
					// 					<p>Our team of experienced professionals is ready to provide you with the best 
					// 						possible service. We are committed to making your travel experience enjoyable 
					// 						and hassle-free. Our staff is available to answer any questions you have 
					// 						and to provide assistance.</p>
					// 					<p>We look forward to being your travel partner with you for many years to come.</p>
					// 					<p>Sincerely,</p>
					// 					<h5>ChoudharyYatra Company</h5>
					// 				</body>
					// 				</html>";
					// 	//echo $msg;
					// 	$subject='Thank You For Enquiry';
					// 	$this->send_mail($email,$from_email,$msg,$subject,$cc=null);
					// 	//die;
						
					// 	$msg_email="<html>
					// 				<head>
					// 					<style type='text/css'>
					// 						body {font-family: Verdana, Geneva, sans-serif}
					// 					</style>
					// 				</head>
					// 				<body background=".base_url()."uploads/email/email1.jpg>
					// 					<h3>Dear&nbsp;".$agent_name."</h3>
					// 					<p>I hope this message finds you well. I am writing to let you know that a new inquiry has been encountered in your account from a customer. We would 
                    //                         appreciate it if you could assist them with their travel-related needs.
					// 					</p>
					// 					<p>Please review the inquiry details and take the necessary action to resolve the inquiry. If you have any questions or need any additional information, please do 
                    //                         not hesitate to contact Head Office. 
					// 					</p>
					// 					<p>Thank you for your prompt attention to this matter.</p>
					// 					<p>Sincerely,</p>
					// 					<h5>ChoudharyYatra Company</h5>
					// 					<a href=".base_url()."admin/login>Click Here</a>
					// 				</body>
					// 				</html>";
					// 				$subject_email=' New Enquiry from customer';
					// 	$this->send_mail($agent_email,$from_email,$msg_email,$subject_email,$cc=null);
						
                        $this->session->set_flashdata('success_message',"Enquiry Added Successfully.");
                        redirect(base_url().'custom_domestic_booking_enquiry/custom_booking_enquiry_confirm');
                        
                    // }
                    // else
                    // {
                    //     $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                    // }
                    //     redirect(base_url().'packages/booking_enquiry/'.$id);
                }   
            }

        }
        else
        {
            redirect(base_url().'home');
        }
         
       
        
        $data = array('middle_content' => 'custom_inter_booking_enquiry',
						'packages_data'       => $packages_data,
						'meal_plan'       => $meal_plan,
						'vehicle_type'       => $vehicle_type,
						'drop_to'       => $drop_to,
						'pick_up_from'       => $pick_up_from,
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
                        'agent_data'    => $Aagent_data,
                        'department_data' => $department_data,
                        'media_source' => $media_source,
                        'page_title'    => 'Customized International Booking Enquiry',
						);
						
        $this->arr_view_data['page_title']     =  "Packages List";
        // $this->arr_view_data['module_url_path'] = $this->module_url_path;
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