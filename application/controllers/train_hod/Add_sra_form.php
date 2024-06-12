<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_sra_form extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('office_branch_staff_panel_slug')."office_branch_staff/add_sra_form";
        $this->module_sra_booking_payment_details    =  base_url().$this->config->item('office_branch_staff_panel_slug')."office_branch_staff/sra_booking_payment_details";
        $this->module_url_path_dates    =  base_url().$this->config->item('office_branch_staff_panel_slug')."office_branch_staff/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('office_branch_staff_panel_slug')."office_branch_staff/package_iternary";
		$this->module_url_path_hotel    =  base_url().$this->config->item('office_branch_staff_panel_slug')."office_branch_staff/package_hotel";
		$this->sra_partial_payment_details    =  base_url().$this->config->item('office_branch_staff_panel_slug')."office_branch_staff/sra_partial_payment_details";
        $this->module_title       = "SRA Form";
        $this->module_url_slug    = "add_sra_form";
        $this->module_view_folder = "add_sra_form/";    
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
         
         
         $this->db->where('id',$id);         
         $arr_data2 = $this->master_model->getRecords('supervision');


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
         $this->arr_view_data['arr_data2']        = $arr_data2;
         // $this->arr_view_data['package_type']        = $package_type;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('office_branch_staff/layout/agent_combo',$this->arr_view_data);
         
         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
     }


     public function add()
     {   
        // print_r('hiiiiiiiiiiiiiiiiiii'); die;
         $supervision_sess_name = $this->session->userdata('supervision_name');
         $id = $this->session->userdata('supervision_sess_id');
         // $supervision_role = $this->session->userdata('supervision_role');
         // $supervision_role_name = $this->session->userdata('supervision_role_name');
         
         if($this->input->post('submit'))
         {
            //  print_r($_REQUEST); die;/
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
 
                 $department_id  = $this->input->post('department_id'); 
                 $booking_center  = $this->input->post('booking_center'); 
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
                     'agent_id' => '',
                     'office_branch_staff_id' => $id,
                     'department_id' => $department_id,
                     'booking_center' => $booking_center,
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
                 // die;
                 $inserted_id = $this->master_model->insertRecord('sra_payment',$arr_insert,true);
                 // $inserted_id = $this->master_model->updateRecord('sra_payment',$arr_update,$arr_where);
                   
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     // redirect($this->module_url_path.'/index/'.$sra_no.'/'.$academic_year);
                     redirect($this->module_url_path.'/add');
 
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/add');
 
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
 
         $this->db->where('is_deleted','no');
         $this->db->where('is_active','yes');
         $this->db->order_by('id','ASC');
         $department_data = $this->master_model->getRecords('department');
 
         // $this->arr_view_data['supervision_role_name']        = $supervision_role_name;
         $this->arr_view_data['supervision_sess_name']        = $supervision_sess_name;
 
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['special_req_master'] = $special_req_master;
         $this->arr_view_data['academic_years_data'] = $academic_years_data;
         $this->arr_view_data['package_type'] = $package_type;
         $this->arr_view_data['department_data'] = $department_data;
         $this->arr_view_data['hotel_type_info'] = $hotel_type_info;
         $this->arr_view_data['zone_info'] = $zone_info;
         $this->arr_view_data['packages_tour_type'] = $packages_tour_type;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['sra_partial_payment_details'] = $this->sra_partial_payment_details;
         $this->arr_view_data['module_sra_booking_payment_details'] = $this->module_sra_booking_payment_details;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('office_branch_staff/layout/agent_combo',$this->arr_view_data);
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


     public function getbooking_center(){ 
        $department_id = $this->input->post('did');
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('department',$department_id);
                $data = $this->master_model->getRecords('agent');
        
        echo json_encode($data); 
      }
    


}


