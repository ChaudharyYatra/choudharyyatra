<?php 
//   Controller for: home page
// Author: Rupali Patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class All_traveller_info extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/all_traveller_info";
        $this->module_seat_type_room_type    =  base_url().$this->config->item('agent_panel_slug')."/seat_type_room_type";
        $this->module_booking_enquiry    =  base_url().$this->config->item('agent_panel_slug')."/booking_enquiry";
        $this->module_title       = "All Traveller Info";
        $this->module_url_slug    = "all_traveller_info";
        $this->module_view_folder = "all_traveller_info/";
        $this->arr_view_data = [];
	 }

        public function index()
        {
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        //  $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        
        }


        public function add($iid="")
        {  
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');
         
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $agent_data = $this->master_model->getRecords('agent');
        // print_r($agent_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');
        // print_r($agent_booking_enquiry_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('tour_number','ASC');
        $packages_data_booking = $this->master_model->getRecords('packages');
        // print_r($packages_data_booking); die;   

        $this->db->where('is_deleted','no');
        $relation_data = $this->master_model->getRecords('relation');
        // print_r($relation_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $state_data = $this->master_model->getRecords('state_table');
        // print_r($state_data); die;   

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('booking_enquiry.id',$iid);
        $agent_booking_enquiry_data = $this->master_model->getRecords('booking_enquiry');
        // print_r($agent_booking_enquiry_data); die;

         if($this->input->post('submit'))
         {
            //   print_r($_REQUEST);
            //  $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
            //  $this->form_validation->set_rules('seat_count', 'seat count', 'required');
            //  $this->form_validation->set_rules('mrandmrs', 'mr and mrs', 'required');
            //  $this->form_validation->set_rules('first_name', 'first name', 'required');
            //  $this->form_validation->set_rules('middle_name', 'middle name', 'required');
            //  $this->form_validation->set_rules('last_name', 'last name', 'required');
            //  $this->form_validation->set_rules('dob', 'dob', 'required');
            //  $this->form_validation->set_rules('relation', 'relation', 'required');
            //  $this->form_validation->set_rules('image_name', 'image name', 'required');
            //  $this->form_validation->set_rules('flat_no', 'Flat no', 'required');
            //  $this->form_validation->set_rules('building_house_nm', 'building house name', 'required');
            //  $this->form_validation->set_rules('street_name', 'street name', 'required');
            //  $this->form_validation->set_rules('landmark', 'landmark', 'required');
            //  $this->form_validation->set_rules('all_traveller_state', 'all traveller state', 'required');
            //  $this->form_validation->set_rules('all_traveller_district', 'all traveller district', 'required');
            //  $this->form_validation->set_rules('all_traveller_taluka', 'all traveller taluka', 'required');
            //  $this->form_validation->set_rules('all_traveller_city', 'all traveller city', 'required');
            //  $this->form_validation->set_rules('pincode', 'pincode', 'required');
            //  $this->form_validation->set_rules('std_code', 'std code', 'required');
            //  $this->form_validation->set_rules('mobile_no', 'mobile no', 'required');
            //  $this->form_validation->set_rules('phone_no', 'phone no', 'required');
            //  $this->form_validation->set_rules('email_id', 'email id', 'required');
             
            //  if($this->form_validation->run() == TRUE)
            // { 
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','jpeg','JPG');

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

                $config['upload_path']   = './uploads/website_logo/';
                $config['allowed_types'] = 'png|jpg|jpeg|PNG|JPEG|JPG'; 
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

                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $seat_count  = $this->input->post('seat_count');
                $mrandmrs  = $this->input->post('mrandmrs');
                $first_name  = $this->input->post('first_name');
                $middle_name  = $this->input->post('middle_name');
                $last_name  = $this->input->post('last_name'); 
                $dob  = $this->input->post('dob'); 
                $relation  = $this->input->post('relation');
                $flat_no  = $this->input->post('flat_no');
                $building_house_nm  = $this->input->post('building_house_nm');
                $street_name  = $this->input->post('street_name');
                $landmark  = $this->input->post('landmark'); 
                $all_traveller_state  = $this->input->post('all_traveller_state'); 
                $all_traveller_district  = $this->input->post('all_traveller_district');
                $all_traveller_taluka  = $this->input->post('all_traveller_taluka');
                $all_traveller_city  = $this->input->post('all_traveller_city');
                $pincode  = $this->input->post('pincode'); 
                $std_code  = $this->input->post('std_code');
                $mobile_no  = $this->input->post('mobile_no');
                $phone_no  = $this->input->post('phone_no'); 
                $email_id  = $this->input->post('email_id');  
                 
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                $arr_insert = array(
                    'domestic_enquiry_id' =>   $domestic_enquiry_id,
                    'seat_count' =>   $seat_count,
                    'mr/mrs' =>   $mrandmrs,
                    'first_name'   =>   $first_name,
                    'middle_name'   =>   $middle_name,   
                    'last_name'    =>$last_name,
                    'dob'=>$dob,
                    'all_traveller_relation'=>$relation,
                    'image_name'          => $filename,
                    'flat_no' =>   $flat_no,
                    'building_house_nm'   =>   $building_house_nm,
                    'street_name'   =>   $street_name,   
                    'landmark'    =>$landmark,
                    'state_name'=>$all_traveller_state,
                    'district_name' =>   $all_traveller_district,
                    'taluka_name'   =>   $all_traveller_taluka,
                    'city_name'   =>   $all_traveller_city,   
                    'pincode'    =>$pincode,
                    'std_code'=>$std_code,
                    'mobile_no'   =>   $mobile_no,   
                    'phone_no'    =>$phone_no,
                    'email_id'=>$email_id 
                         
                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('all_traveller_info',$arr_insert,true);
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_booking_enquiry.'/index');
                 }
 
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
            // }   
         }

         if($this->input->post('booknow_submit'))
         {
            //  //print_r($_REQUEST);
            //  $this->form_validation->set_rules('domestic_enquiry_id', 'domestic_enquiry_id', 'required');
            //  $this->form_validation->set_rules('seat_count', 'seat count', 'required');
            //  $this->form_validation->set_rules('mrandmrs', 'mr and mrs', 'required');
            //  $this->form_validation->set_rules('first_name', 'first name', 'required');
            //  $this->form_validation->set_rules('middle_name', 'middle name', 'required');
            //  $this->form_validation->set_rules('last_name', 'last name', 'required');
            //  $this->form_validation->set_rules('dob', 'dob', 'required');
            //  $this->form_validation->set_rules('relation', 'relation', 'required');
            //  $this->form_validation->set_rules('image_name', 'image name', 'required');
            //  $this->form_validation->set_rules('flat_no', 'Flat no', 'required');
            //  $this->form_validation->set_rules('building_house_nm', 'building house name', 'required');
            //  $this->form_validation->set_rules('street_name', 'street name', 'required');
            //  $this->form_validation->set_rules('landmark', 'landmark', 'required');
            //  $this->form_validation->set_rules('all_traveller_state', 'all traveller state', 'required');
            //  $this->form_validation->set_rules('all_traveller_district', 'all traveller district', 'required');
            //  $this->form_validation->set_rules('all_traveller_taluka', 'all traveller taluka', 'required');
            //  $this->form_validation->set_rules('all_traveller_city', 'all traveller city', 'required');
            //  $this->form_validation->set_rules('pincode', 'pincode', 'required');
            //  $this->form_validation->set_rules('std_code', 'std code', 'required');
            //  $this->form_validation->set_rules('mobile_no', 'mobile no', 'required');
            //  $this->form_validation->set_rules('phone_no', 'phone no', 'required');
            //  $this->form_validation->set_rules('email_id', 'email id', 'required');
             
            //  if($this->form_validation->run() == TRUE)
            //  { 
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','jpeg','JPG');

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

                $config['upload_path']   = './uploads/website_logo/';
                $config['allowed_types'] = 'png|jpg|jpeg|PNG|JPEG|JPG'; 
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

                $domestic_enquiry_id  = $this->input->post('domestic_enquiry_id');
                $seat_count  = $this->input->post('seat_count');
                $mrandmrs  = $this->input->post('mrandmrs');
                $first_name  = $this->input->post('first_name');
                $middle_name  = $this->input->post('middle_name');
                $last_name  = $this->input->post('last_name'); 
                $dob  = $this->input->post('dob'); 
                $relation  = $this->input->post('relation');
                $flat_no  = $this->input->post('flat_no');
                $building_house_nm  = $this->input->post('building_house_nm');
                $street_name  = $this->input->post('street_name');
                $landmark  = $this->input->post('landmark'); 
                $all_traveller_state  = $this->input->post('all_traveller_state'); 
                $all_traveller_district  = $this->input->post('all_traveller_district');
                $all_traveller_taluka  = $this->input->post('all_traveller_taluka');
                $all_traveller_city  = $this->input->post('all_traveller_city');
                $pincode  = $this->input->post('pincode'); 
                $std_code  = $this->input->post('std_code');
                $mobile_no  = $this->input->post('mobile_no');
                $phone_no  = $this->input->post('phone_no'); 
                $email_id  = $this->input->post('email_id');  
                 
                //  $today=date("Y-m-d");
                //  $packages  = $this->input->post('packages'); 

                 $arr_insert = array(
                    'domestic_enquiry_id' =>   $domestic_enquiry_id,
                    'seat_count' =>   $seat_count,
                    'mr/mrs' =>   $mrandmrs,
                    'first_name'   =>   $first_name,
                    'middle_name'   =>   $middle_name,   
                    'last_name'    =>$last_name,
                    'dob'=>$dob,
                    'all_traveller_relation'=>$relation,
                    'image_name'          => $filename,
                    'flat_no' =>   $flat_no,
                    'building_house_nm'   =>   $building_house_nm,
                    'street_name'   =>   $street_name,   
                    'landmark'    =>$landmark,
                    'state_name'=>$all_traveller_state,
                    'district_name' =>   $all_traveller_district,
                    'taluka_name'   =>   $all_traveller_taluka,
                    'city_name'   =>   $all_traveller_city,   
                    'pincode'    =>$pincode,
                    'std_code'=>$std_code,
                    'mobile_no'   =>   $mobile_no,   
                    'phone_no'    =>$phone_no,
                    'email_id'=>$email_id 
                 );
                //  print_r($arr_insert); die;
                 $inserted_id = $this->master_model->insertRecord('all_traveller_info',$arr_insert,true);
                               
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_seat_type_room_type.'/add/'.$iid);
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
            //  }   
         }
 

        
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['agent_data']        = $agent_data;
         $this->arr_view_data['agent_booking_enquiry_data']        = $agent_booking_enquiry_data;   
         $this->arr_view_data['state_data']        = $state_data;
         $this->arr_view_data['relation_data']        = $relation_data;
         $this->arr_view_data['packages_data_booking']        = $packages_data_booking;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
     }

//      public function get_district(){ 
//         // POST data 
//         $all_b=array();
//        $district_data = $this->input->post('did');
        
//                         $this->db->where('is_deleted','no');
//                         $this->db->where('is_active','yes');
//                         $this->db->where('id',$boarding_office_location);
//                         $data = $this->master_model->getRecord('packages');
//                         $boarding = $data['boarding_office'];
//                         $ids = explode(',', $boarding);
//                         // print_r($ids); die;
//                         $count=sizeof($ids);
                       
//                         for($i=0; $i<$count; $i++)
//                         {
//                              $p=$ids[$i];   
//                             $this->db->where('is_deleted','no');
//                             $this->db->where('is_active','yes');
//                             $this->db->where('id',$p);
//                             $data1 = $this->master_model->getRecord('agent');
//                            // print_r($data1);
//                             //$bname=$data1;   
//                             array_push($all_b,$data1);
                             
//                         }
//                         //print_r($all_b); die;
                        
//         echo json_encode($all_b); 
//   }

  public function get_district(){ 
        // POST data 
        // $all_b=array();
       $district_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('id',$district_data);   
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
                    $this->db->where('id',$taluka_data);   
                    $data = $this->master_model->getRecords('taluka_table');
                    // print_r($data); die;
    echo json_encode($data); 
}

}