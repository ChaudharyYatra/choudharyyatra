<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_sra_form extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/add_sra_form";
        $this->module_sra_booking_payment_details    =  base_url().$this->config->item('agent_panel_slug')."/sra_booking_payment_details";
        $this->module_url_path_dates    =  base_url().$this->config->item('agent_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('agent_panel_slug')."/package_iternary";
		$this->module_url_path_hotel    =  base_url().$this->config->item('agent_panel_slug')."/package_hotel";
		$this->sra_partial_payment_details    =  base_url().$this->config->item('agent_panel_slug')."/sra_partial_payment_details";
        $this->module_title       = "SRA Form";
        $this->module_url_slug    = "add_sra_form";
        $this->module_view_folder = "add_sra_form/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $fields = "packages.*,package_type.package_type,package_type.id as pid";
        $this->db->where('packages.is_deleted','no');
        // $this->db->where('packages.is_active','yes');
		$this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        // $this->db->where('is_active','yes');
        // $this->db->where('is_deleted','no');
        // $this->db->where('package_type','Special Limited Offer');
        // $package_type = $this->master_model->getRecords('packages');
        // // print_r($package_type); die;

        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_hotel'] = $this->module_url_path_hotel;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['package_type']        = $package_type;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
       
	}
	
    public function sra_send_otp()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

            // print_r($_REQUEST);
            // die;
            $sra_mobile_number = $this->input->post('mobile_number');
            $send_sra_no = $this->input->post('sra_no');

            $alphabet = '1234567890';
            $otp = str_shuffle($alphabet);
            $traveler_otp = substr($otp, 0, '6'); 

            $from_email='test@choudharyyatra.co.in';
            
            $authKey = "1207168241267288907";
            
        $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
        $senderId  = "CYCPLN";
        
        $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$sra_mobile_number&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
        
         $apiurl = str_replace(" ", '%20', $apiurl); 
            
            $ch = curl_init($apiurl);
                    $get_url = $apiurl;
                    curl_setopt($ch, CURLOPT_POST,0);
                    curl_setopt($ch, CURLOPT_URL, $get_url);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
                    curl_setopt($ch, CURLOPT_HEADER,0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $return_val = curl_exec($ch); 
               

            
                $arr_insert = array(
                    'mobile_number'   =>   $sra_mobile_number,
                    'sra_no'   =>   $send_sra_no,
                    'sra_confirm_otp'   =>   $traveler_otp
                );
                // print_r($arr_insert); die;
                $inserted_id = $this->master_model->insertRecord('sra_payment',$arr_insert,true);
        if($inserted_id!=''){   
           echo true;

       }else {
           echo false;
       }

    
    }

    public function sra_resend_otp()
    { 
        // echo 'hiiiii IN Controller'; die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');
            
            $sra_mobile_number = $this->input->post('mobile_number');
            $send_sra_no = $this->input->post('sra_no');

            $alphabet = '1234567890';
            $otp = str_shuffle($alphabet);
            $traveler_otp = substr($otp, 0, '6'); 

            $from_email='test@choudharyyatra.co.in';
            
            $authKey = "1207168241267288907";
            
        $message="Dear User, Thank you for booking the tour with us, Your OTP is $traveler_otp, Valid for 30 minutes. Please share with only Choudhary Yatra team. Regards,CYCPL Team.";
        $senderId  = "CYCPLN";
        
        $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$sra_mobile_number&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251580901563";
        
        $apiurl = str_replace(" ", '%20', $apiurl); 
            
            
            $ch = curl_init($apiurl);
                    $get_url = $apiurl;
                    curl_setopt($ch, CURLOPT_POST,0);
                    curl_setopt($ch, CURLOPT_URL, $get_url);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
                    curl_setopt($ch, CURLOPT_HEADER,0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $return_val = curl_exec($ch); 
            
            

                $arr_update = array(
                    'mobile_number'   =>   $sra_mobile_number,
                    'sra_no'   =>   $send_sra_no,
                    'sra_confirm_otp'   =>   $traveler_otp
                );
                // print_r($arr_update); die;

                $arr_where     = array("sra_no" => $send_sra_no);
                $enquiry_id = $this->master_model->updateRecord('sra_payment',$arr_update,$arr_where);
                
                if($enquiry_id!=''){
                    echo true;
                }else {
                    echo false;
                }
    }

	
    public function add()
    {   
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');
        
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('sra_no', ' sra_no', 'required');
            $this->form_validation->set_rules('tour_number', 'tour_number', 'required');
            $this->form_validation->set_rules('tour_date', 'tour_date', 'required');
            $this->form_validation->set_rules('customer_name', 'customer_name', 'required');
            $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
            $this->form_validation->set_rules('total_seat', 'total_seat', 'required');
            $this->form_validation->set_rules('total_sra_amt', 'total_srs_amt', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                // $this->db->where('is_active','yes');
                $SRANo_check = $this->master_model->getRecords('sra_booking_payment_details',array('is_deleted'=>'no','sra_no'=>trim($this->input->post('sra_no')),'academic_year'=>trim($this->input->post('academic_year'))));
                if(count($SRANo_check)==0){

                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

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

                $config['upload_path']   = './uploads/SRA_photo_pdf/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|PDF|pdf'; 
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

                $academic_year  = $this->input->post('academic_year'); 
                $sra_no  = $this->input->post('sra_no'); 
                $sra_date  = $this->input->post('sra_date'); 
                $tour_number        = trim($this->input->post('tour_number'));
                $tour_date        = trim($this->input->post('tour_date'));
                $customer_name = trim($this->input->post('customer_name'));
                $mobile_number = trim($this->input->post('mobile_number'));
                $total_seat = trim($this->input->post('total_seat'));
                $total_sra_amt = trim($this->input->post('total_sra_amt'));
                
                $arr_insert = array(
                    'agent_id' => $id,
                    'academic_year' => $academic_year,
                    'sra_no'   =>   $sra_no,
                    'sra_date'   =>   $sra_date,
                    'tour_number'          => $tour_number,
                    'tour_date'          => $tour_date,
                    'customer_name'          => $customer_name,
                    'mobile_number'          => $mobile_number,
                    'total_seat'          => $total_seat,
                    'total_sra_amt'          => $total_sra_amt,
                    'image_name'    => $filename
                );
                
                $inserted_id = $this->master_model->insertRecord('sra_payment',$arr_insert,true);
                // $inserted_id = $this->master_model->updateRecord('sra_payment',$arr_update,$arr_where);
                               
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_sra_booking_payment_details.'/index/'.$sra_no.'/'.$academic_year);
                }
                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');

            } 
            else{
                $this->session->set_flashdata('error_message',"SRA Number already exist. Please goto partial payment.");
            }  
        }
        
        }
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $academic_years_data = $this->master_model->getRecords('academic_years');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $package_type = $this->master_model->getRecords('package_type');
        // print_r($package_type); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $hotel_type_info = $this->master_model->getRecords('hotel_type');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $zone_info = $this->master_model->getRecords('zone_master');

         // $this->db->order_by('id','desc');
         $this->db->where('is_deleted','no');
         $this->db->where('is_active','yes');
        //  $this->db->where('tour_type',1);
         $packages_tour_type = $this->master_model->getRecords('packages');
        //  print_r($packages_tour_type); die;

        $this->db->where('is_deleted','no');
        // $this->db->where('extra_services_details.enquiry_id',$iid);
        // $this->db->group_by('extra_services');
        $special_req_master = $this->master_model->getRecords('special_req_master');
        // print_r($special_req_master); die;

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['special_req_master'] = $special_req_master;
        $this->arr_view_data['academic_years_data'] = $academic_years_data;
        $this->arr_view_data['package_type'] = $package_type;
        $this->arr_view_data['hotel_type_info'] = $hotel_type_info;
        $this->arr_view_data['zone_info'] = $zone_info;
        $this->arr_view_data['packages_tour_type'] = $packages_tour_type;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['sra_partial_payment_details'] = $this->sra_partial_payment_details;
        $this->arr_view_data['module_sra_booking_payment_details'] = $this->module_sra_booking_payment_details;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }

    public function get_tourdate(){ 
        // POST data 
        // $all_b=array();
       $today= date('Y-m-d');
       $sra_tour_number = $this->input->post('did');
        // print_r($sra_tour_number); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        // $this->db->where('bus_open_status','yes');
                        // $this->db->where('journey_date >=',$today);
                        $this->db->where('package_id',$sra_tour_number);
                        $data = $this->master_model->getRecords('package_date');
                        // print_r($data); die;
        echo json_encode($data);
    }

    public function partial_payment_data()  
    {  
        // print_r($_REQUEST); die;
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

            $academic_year=$this->input->post('academic_year');
            $tour_number=$this->input->post('tour_number');
            $tour_date=$this->input->post('tour_date');

            $sra_no=$this->input->post('sra_no');
            $mobile_number=$this->input->post('mobile_number');

            // $record = array();
            // $fields = "sra_payment.*,package_date.journey_date,academic_years.year,sra_payment.id as sra_pay_id,
            // sra_booking_payment_details.pending_amt,sum(sra_booking_payment_details.booking_amt) as abcamt";
            // $this->db->join("package_date", 'package_date.id=sra_payment.tour_date','right');
            // $this->db->join("academic_years", 'academic_years.id=sra_payment.academic_year','left');
            // $this->db->join("sra_booking_payment_details", 'sra_booking_payment_details.sra_payment_id=sra_payment.id','right');
            // // $this->db->where('sra_payment.academic_year', $academic_year);
            // $this->db->where('sra_payment.agent_id', $id);
            // if ($academic_year) {
            //     $this->db->where('sra_payment.academic_year', $academic_year);
            // }

            // $record = array();
            // $fields = "sra_payment.*,package_date.journey_date,academic_years.year,sra_payment.id as sra_pay_id,packages.tour_number as package_tour_number,
            // sra_booking_payment_details.pending_amt,sum(sra_booking_payment_details.booking_amt) as abcamt";
            // $this->db->join("package_date", 'package_date.id=sra_payment.tour_date','left');
            // $this->db->join("packages", 'packages.id=sra_payment.tour_number','left');
            // $this->db->join("academic_years", 'academic_years.id=sra_payment.academic_year','left');
            // $this->db->join("sra_booking_payment_details", 'sra_booking_payment_details.sra_payment_id=sra_payment.id','left');
            // // $this->db->where('sra_payment.academic_year', $academic_year);
            // $this->db->where('sra_payment.agent_id', $id);
            
            // if ($academic_year) {
            //     $this->db->where('sra_payment.academic_year', $academic_year);
            // }
            
            // $this->db->group_start();
            // $this->db->or_where('sra_payment.academic_year', $academic_year);
            // $this->db->or_where('sra_payment.tour_number', $tour_number);
            // $this->db->or_where('sra_payment.tour_date', $tour_date);
            // $this->db->or_where('sra_payment.sra_no', $sra_no);
            // // $this->db->or_where('sra_payment.mobile_number', $mobile_number);
            // $this->db->group_end();

            // // $this->db->group_by('sra_payment.id');
            // $this->db->group_by('sra_booking_payment_details.sra_payment_id');
        
            // $arr_data = $this->master_model->getRecords('sra_payment',array('sra_payment.is_deleted'=>'no'),$fields);
            // // $arr_data = $this->master_model->getRecords('sra_payment','',$fields);
            // // print_r($arr_data);
            // // die;
            // echo json_encode($arr_data);

            $record = array();
            $fields = "sra_payment.*,package_date.journey_date,academic_years.year,sra_payment.id as sra_pay_id,packages.tour_number as package_tour_number,
            sra_booking_payment_details.pending_amt,sum(sra_booking_payment_details.booking_amt) as abcamt";
            $this->db->join("package_date", 'package_date.id=sra_payment.tour_date','left');
            $this->db->join("packages", 'packages.id=sra_payment.tour_number','left');
            $this->db->join("academic_years", 'academic_years.id=sra_payment.academic_year','left');
            $this->db->join("sra_booking_payment_details", 'sra_booking_payment_details.sra_payment_id=sra_payment.id','left');
            $this->db->where('sra_payment.agent_id', $id);

            // Check if both academic year and sra_no are provided
            if ($academic_year && $sra_no) {
                $this->db->where('sra_payment.academic_year', $academic_year);
                $this->db->where('sra_payment.sra_no', $sra_no);
            }
            // Check if both academic year and tour_number are provided
            else if ($academic_year && $tour_number) {
                $this->db->where('sra_payment.academic_year', $academic_year);
                $this->db->where('packages.tour_number', $tour_number);
            }
            else if ($tour_number) {
                $this->db->where('packages.tour_number', $tour_number);
            }
            else if ($mobile_number) {
                $this->db->where('sra_payment.mobile_number', $mobile_number);
            }
            else {
                // General filtering logic
                if ($academic_year) {
                    $this->db->where('sra_payment.academic_year', $academic_year);
                }
                
                $this->db->group_start();
                $this->db->or_where('sra_payment.academic_year', $academic_year);
                $this->db->or_where('sra_payment.tour_number', $tour_number);
                $this->db->or_where('sra_payment.tour_date', $tour_date);
                $this->db->or_where('sra_payment.sra_no', $sra_no);
                $this->db->group_end();
            }

            $this->db->group_by('sra_booking_payment_details.sra_payment_id');

            $arr_data = $this->master_model->getRecords('sra_payment', array('sra_payment.is_deleted' => 'no'), $fields);
            echo json_encode($arr_data);
            
            // $record = array();
            // $this->db->where('academic_year',$academic_year);
            // $this->db->where('tour_number',$tour_number);
            // $this->db->where('tour_date',$tour_date);

            // $this->db->where('sra_no',$sra_no);
            // $this->db->where('mobile_number',$mobile_number);   
            // $arr_data = $this->master_model->getRecords('sra_payment');
            // // print_r($arr_data); die;
            // echo json_encode($arr_data);
    }


    public function extra_services_add()
        {  
            $agent_sess_name = $this->session->userdata('agent_name');
            $id=$this->session->userdata('agent_sess_id');

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $expense_type_data = $this->master_model->getRecords('expense_type');
            // print_r($expense_type_data); die;  

        if($this->input->post('extra_services_submit'))
        {
                $add_on_services_payment  = $this->input->post('add_on_services_payment');
                $service_sra_no  = $this->input->post('service_sra_no');
                $srrvice_tour_number  = $this->input->post('srrvice_tour_number');
                $service_tour_date  = $this->input->post('service_tour_date');
                $service_mobile_number  = $this->input->post('service_mobile_number');

                $sra_extra_services  = $this->input->post('sra_extra_services');
                $services_quantity  = $this->input->post('services_quantity');
               
                if($add_on_services_payment == '2'){
                $count = count($sra_extra_services);
                // print_r($count); die;
                for($i=0;$i<$count;$i++)
                {
                $arr_insert = array(
                'extra_services'   =>   $_POST["sra_extra_services"][$i],
                'services_amt'   =>   $_POST["services_quantity"][$i],
                'payment_type' => $add_on_services_payment,
                'sra_no' => $service_sra_no,
                'tour_number' => $srrvice_tour_number,
                'tour_date' => $service_tour_date,
                'mobile_number' => $service_mobile_number
                
                ); 
                $inserted_id = $this->master_model->insertRecord('sra_extra_services',$arr_insert,true);
                }
                }
                
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_url_path.'/add');
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                //  redirect($this->module_seat_type_room_type.'/add/'.$iid);
                 redirect($this->module_url_path.'/index');
                // }   
        }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
		$this->db->order_by('expense_category','ASC');
        $expense_category = $this->master_model->getRecords('expense_category');
        //  print_r($expense_category); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $measuring_unit = $this->master_model->getRecords('measuring_unit');
        //  print_r($measuring_unit); die;

        $record = array();
        $fields = "packages.*,package_date.journey_date,package_date.id as pd_id";
        $this->db->where('packages.is_deleted','no');
        // $this->db->order_by('packages.id','desc');
        $this->db->where('packages.id',$id);
        $this->db->where('package_date.id',$did);
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $packages_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($packages_data); die;
 
         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['expense_type_data']        = $expense_type_data;
         $this->arr_view_data['packages_data']        = $packages_data;
         $this->arr_view_data['expense_category']        = $expense_category;
         $this->arr_view_data['measuring_unit']        = $measuring_unit;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }


    
   
    
   
  // Active/Inactive
  public function active_inactive($id,$type)
    {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

	  	$id=base64_decode($id);
        if($id!="" && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');
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
            
            if($this->master_model->updateRecord('packages',$arr_update,array('id' => $id)))
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
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('packages',$arr_update,$arr_where))
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
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        else
        {   
            $this->db->where('id',$id);
            $this->db->where('is_active','yes');
            $arr_data = $this->master_model->getRecords('packages');
            // print_r($arr_data);
            // die;
            
            $this->db->where('is_active','yes');
            $this->db->where('is_deleted','no');
            $agent_data = $this->master_model->getRecords('agent');
            $this->arr_view_data['agent_data'] = $agent_data;
        
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
                // $this->form_validation->set_rules('tour_number', 'Tour Number', 'required');
                $this->form_validation->set_rules('tour_title', 'Tour Title', 'required');
                $this->form_validation->set_rules('rating', 'Rating', 'required');
                // $this->form_validation->set_rules('cost', 'Single Per Seat', 'required');
                $this->form_validation->set_rules('tour_number_of_days', 'Tour Number of Days', 'required');
                // $this->form_validation->set_rules('image_name','Package Image', 'callback_handle_upload[edit]');
                if($this->form_validation->run() == TRUE)
                {
                    $original_tour_number=$this->input->post('original_tour_number');

                    $this->db->where('is_active','yes');
                    $tourNo_check = $this->master_model->getRecords('packages',array('is_deleted'=>'no','tour_number'=>trim($this->input->post('tour_number')),'package_type'=>trim($this->input->post('package_type'))));
                    if(count($tourNo_check)==0 || $original_tour_number==$this->input->post('tour_number')){

                //  print_r($_REQUEST);
                //  echo 'aaaaaaaaaaaaaa';
                //  echo $_FILES['pdf_name']['name'];
                //  die;
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
                    
                    $config['upload_path']   = './uploads/packages/';
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
                        if($old_img_name!='') unlink('./uploads/packages/'.$old_img_name);
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

//============================================================================================================
               $old_pdf_name = $this->input->post('old_pdf_name');
            //    echo '1';
                
                if(!empty($_FILES['pdf_name']) && $_FILES['pdf_name']['name'] !='')
                {
               $file_name     = $_FILES['pdf_name']['name'];
                // echo  '<br>';
                // echo '2';
                $arr_extension = array('PDF','pdf');

                $file_name = $_FILES['pdf_name'];
                $arr_extension = array('PDF','pdf');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['pdf_name']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            //    echo  '<br>';
            //    echo '3';
                $config['upload_path']   = './uploads/package_daywise_program/';
                $config['allowed_types'] = 'PDF|pdf';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('pdf_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $pdf_filename = $file_name_to_dispaly_pdf;
                   // if($old_pdf_name!='') unlink('./uploads/packages/'.$old_pdf_name);
                }
                else
                {
                    $pdf_filename = $this->input->post('pdf_name',TRUE);
                    // echo  '<br>';
                    // echo '4';
                }
            }
            else
            {
                $pdf_filename = $old_pdf_name;
                // echo  '<br>';
                // echo '5';
            }
            // echo $pdf_filename;
            //    die;

            //============================================================================================================
            $old_new_name = $this->input->post('old_new_name');
                
                if(!empty($_FILES['package_full_image']) && $_FILES['package_full_image']['name'] !='')
                {
               $file_name     = $_FILES['package_full_image']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                $file_name = $_FILES['package_full_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['package_full_image']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/package_full_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('package_full_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $new_img_filename = $file_name_to_dispaly_pdf;
                    if($old_new_name!='') unlink('./uploads/package_full_image/'.$old_new_name);
                }
                else
                {
                    $new_img_filename = $this->input->post('package_full_image',TRUE);
                    
                }
            }
            else
            {
                $new_img_filename = $old_new_name;
                
            }
			
			// ===============
            $old_inclusion_name = $this->input->post('old_inclusion_name');
                
            if(!empty($_FILES['inclusion_img']) && $_FILES['inclusion_img']['name'] !='')
            {
            
            $file_name     = $_FILES['inclusion_img']['name']; 

            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            $file_name = $_FILES['inclusion_img'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            if($file_name['name']!="")
            {
                
                $ext = explode('.',$_FILES['inclusion_img']['name']); 
                $config['file_name'] = rand(1000,90000);

                if(!in_array($ext[1],$arr_extension))
                {
                    $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                }
            }   

            $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
        
            $config['upload_path']   = './uploads/inclusion_img/';
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
            $config['max_size']      = '10000';
            $config['file_name']     = $file_name_to_dispaly_pdf;
            $config['overwrite']     = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config); // Important
            
            if(!$this->upload->do_upload('inclusion_img'))
            {  
                
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error_message',$this->upload->display_errors());
                redirect($this->module_url_path.'/edit/'.$id);
            }
            if($file_name['name']!="")
            {   
                $file_name = $this->upload->data();
                $inclusion_img_filename = $file_name_to_dispaly_pdf;
            }
            else
            {
                $inclusion_img_filename = $this->input->post('inclusion_img',TRUE);
                
            }
            }
            else
            {
                $inclusion_img_filename = $old_inclusion_name;
                
            }

            // ===============

            $old_tc_name = $this->input->post('old_tc_name');
                
            if(!empty($_FILES['tc_img']) && $_FILES['tc_img']['name'] !='')
            {
            $file_name     = $_FILES['tc_img']['name'];

            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            $file_name = $_FILES['tc_img'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            if($file_name['name']!="")
            {
                $ext = explode('.',$_FILES['tc_img']['name']); 
                $config['file_name'] = rand(1000,90000);

                if(!in_array($ext[1],$arr_extension))
                {
                    $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                }
            }   

            $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
        
            $config['upload_path']   = './uploads/tc_img/';
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
            $config['max_size']      = '10000';
            $config['file_name']     = $file_name_to_dispaly_pdf;
            $config['overwrite']     = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config); // Important
            
            if(!$this->upload->do_upload('tc_img'))
            {  
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error_message',$this->upload->display_errors());
                redirect($this->module_url_path.'/edit/'.$id);
            }
            if($file_name['name']!="")
            {   
                $file_name = $this->upload->data();
                $tc_img_filename = $file_name_to_dispaly_pdf;
            }
            else
            {
                $tc_img_filename = $this->input->post('tc_img',TRUE);
                
            }
             }
            else
            {
                $tc_img_filename = $old_tc_name;
                
            }

                
                $academic_year  = $this->input->post('academic_year'); 
                $tour_number        = trim($this->input->post('tour_number'));
                $tour_title        = trim($this->input->post('tour_title'));
                $destinations = trim($this->input->post('destinations'));
                $rating = trim($this->input->post('rating'));
                $cost = trim($this->input->post('cost'));
                $tour_number_of_days = trim($this->input->post('tour_number_of_days'));
                $short_description = trim($this->input->post('short_description'));
                $full_description = trim($this->input->post('full_description'));      
                $boarding_office = implode(",", $this->input->post('boarding_office'));
                $package_type = trim($this->input->post('package_type'));
                $hotel_type = trim($this->input->post('hotel_type'));
                $zone_name = trim($this->input->post('zone_name'));
                $from_date = trim($this->input->post('from_date'));
                $to_date = trim($this->input->post('to_date'));
                $tour_type = trim($this->input->post('tour_type'));
                $main_tour_id = trim($this->input->post('main_tour_id'));


                $arr_update = array(
                    'academic_year'   =>   $academic_year,
                    'tour_number'          => $tour_number,
                    'tour_title'          => $tour_title,
                    'destinations'          => $destinations,
                    'rating'          => $rating,
                    'cost'          => $cost,
                    'tour_number_of_days'          => $tour_number_of_days,
                    'short_description'        => $short_description,
                    'full_description'        => $full_description,                    
                    'inclusion_img'        => $inclusion_img_filename,
                    'tc_img'        => $tc_img_filename,
                    'image_name'    => $filename,
                    'pdf_name'    => $pdf_filename,
                    'package_full_image'    => $new_img_filename,
                    'boarding_office'             => $boarding_office,
                    'package_type'             => $package_type,
                    'hotel_type'             => $hotel_type,
                    'zone_name'  => $zone_name,
                    'from_date'             => $from_date,
                    'to_date'  => $to_date,
                    'tour_type'  => $tour_type,
                    'main_tour_id'  => $main_tour_id
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('packages',$arr_update,$arr_where);
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
            
            else{
                $this->session->set_flashdata('error_message',"Tour Number already exist.");
            }  
            }
          }
        }
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $academic_years_data = $this->master_model->getRecords('academic_years');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $package_type = $this->master_model->getRecords('package_type');
        // print_r($package_type); die;

        // $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('tour_type',1);
        $packages_tour_type = $this->master_model->getRecords('packages');
        // print_r($packages_tour_type); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $hotel_type_info = $this->master_model->getRecords('hotel_type');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $zone_info = $this->master_model->getRecords('zone_master');
        
        $this->arr_view_data['academic_years_data']        = $academic_years_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['hotel_type_info']        = $hotel_type_info;
        $this->arr_view_data['zone_info']        = $zone_info;
        $this->arr_view_data['packages_tour_type'] = $packages_tour_type;
        $this->arr_view_data['package_type']        = $package_type;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }

    // Get Details of Package
    public function details($id){
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "packages.*,academic_years.year";
        $this->db->where('packages.id',$id);
        $this->db->join("academic_years", 'packages.academic_year=academic_years.id','left');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }

   
   
}