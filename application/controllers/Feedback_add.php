<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_add extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];

        if($this->session->userdata('cust_sess_id')=="") 
        { 
                redirect(base_url().'home'); 
        }

        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
	 }

	 
     public function index($id,$did)
     {
        $cust_sess_name = $this->session->userdata('cust_fname');
        $cust_sess_lname = $this->session->userdata('cust_lname');
        $iid=$this->session->userdata('cust_sess_id');

        $id=base64_decode($id);
        $did=base64_decode($did);
        
        if(isset($_POST['submit']))
        {
             $this->form_validation->set_rules('categories', 'categories', 'required');
             $this->form_validation->set_rules('rating', 'rating', 'required');
             
             if($this->form_validation->run() == TRUE)
             {
                
                // ==============================upload image one================================================
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['image_name']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/index');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/feedback_photo/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|pdf|PDF'; 
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

                // ==============================upload image one================================================
                
                 $categories        = $this->input->post('categories'); 
                 $rating         = $this->input->post('rating'); 
                 $message         = $this->input->post('message'); 
                 $traveller_id         = $this->input->post('traveller_id'); 
 
                 $arr_insert = array(
                     'category'    =>   $categories,
                     'rating'     => $rating,
                     'feedback'         => $message,
                     'image_name'         => $filename,
                     'package_id'         => $id,
                     'package_date_id'    => $did,
                     'traveller_id'    => $traveller_id

                 );
                //  print_r($arr_insert); die;
                $inserted_id = $this->master_model->insertRecord('customer_feedback',$arr_insert,true);
             
                if($inserted_id > 0)
                {    
                        $this->session->set_flashdata('success_message',"Added Successfully.");
                        redirect(base_url().'feedback/index');
                        
                }
                else
                {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect(base_url().'feedback/index');
         }   
     }

        $cust_sess_name = $this->session->userdata('cust_fname');
        $cust_sess_lname = $this->session->userdata('cust_lname');
        $id=$this->session->userdata('cust_sess_id');
        
        $where_in_packages_ids = array();
         
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('traveler_id',$id);
        $arr_data = $this->master_model->getRecords('customer_feedback');
        // print_r($arr_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('for_booking_yes_no','yes');
        $role_type = $this->master_model->getRecords('role_type');
        // print_r($role_type); die;

        $fields = "final_booking.*,packages.tour_title,package_date.journey_date";
        $this->db->where('final_booking.is_deleted','no');
        $this->db->where('final_booking.is_active','yes');
        $this->db->where('final_booking.traveller_id',$id); //check session id & traverl id match
        $this->db->join("packages", 'final_booking.package_id=packages.id','left');
        $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','left');
        $arr_data_tour_details = $this->master_model->getRecords('final_booking',array('final_booking.is_deleted'=>'no'),$fields);
        // print_r($arr_data_tour_details); die; 
                
         $data = array('middle_content' => 'feedback_add',
						'website_basic_structure'       => $website_basic_structure,
						'social_media_link'       => $social_media_link,
                        'arr_data'               => $arr_data,
                        'arr_data_tour_details'               => $arr_data_tour_details,
                        'cust_sess_name'        => $cust_sess_name,
                        'cust_sess_lname'        => $cust_sess_lname,
						'role_type'       => $role_type,
						'page_title'    => 'Feedback'
						);
        $this->arr_view_data['page_title']     =  "Feedback";
        $this->arr_view_data['middle_content'] =  "feedback_add";
        $this->load->view('front/common_view',$data);
     }

//      public function add()
//      {    
     
//      if(isset($_POST['submit']))
//      {
//              $this->form_validation->set_rules('categories', 'categories', 'required');
//              $this->form_validation->set_rules('rating', 'rating', 'required');
             
//              if($this->form_validation->run() == TRUE)
//              {
//                 // ==============================upload image one================================================
//                 $file_name     = $_FILES['image_name']['name'];
//                 $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

//                 if($file_name!="")
//                 {               
//                     $ext = explode('.',$_FILES['image_name']['name']); 
//                     $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

//                     if(!in_array($ext[1],$arr_extension))
//                     {
//                         $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
//                         redirect($this->module_url_path.'/index');  
//                     }
//                 }
//                 $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

//                 $config['upload_path']   = './uploads/feedback_photo/';
//                 $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|pdf|PDF'; 
//                 $config['max_size']      = '10000';
//                 $config['file_name']     =  $file_name_to_dispaly;
//                 $config['overwrite']     =  TRUE;

//                 $this->load->library('upload',$config);
//                 $this->upload->initialize($config); // Important

//                 if(!$this->upload->do_upload('image_name'))
//                 {  
//                     $data['error'] = $this->upload->display_errors();
//                     $this->session->set_flashdata('error_message',$this->upload->display_errors());
//                     redirect($this->module_url_path);  
//                 }

//                 if($file_name!="")
//                 {
//                     $file_name = $this->upload->data();
//                     $filename = $file_name_to_dispaly;
//                 }

//                 else
//                 {
//                     $filename = $this->input->post('image_name',TRUE);
//                 }

//                 // ==============================upload image one================================================
                
//                  $categories        = $this->input->post('categories'); 
//                  $rating         = $this->input->post('rating'); 
//                  $message         = $this->input->post('message'); 
 
//                  $arr_insert = array(
//                      'categories'    =>   $categories,
//                      'rating'     => $rating,
//                      'message'         => $message,
//                      'image_name'         => $filename
//                  );
                 
//                  $inserted_id = $this->master_model->insertRecord('customer_feedback',$arr_insert,true);
             
//                 if($inserted_id > 0)
//                 {    
//                         $this->session->set_flashdata('success_message',"Added Successfully.");
//                         redirect(base_url().'feedback/index');
                        
//                 }
//                 else
//                 {
//                         $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
//                 }
//                 redirect(base_url().'feedback/index');
//          }   
//      }

//          $this->db->order_by('packages.id','desc');
//          $where['packages.is_deleted'] = 'no';
//          $where['packages.is_active'] = 'yes';
//          $packages_data = $this->master_model->getRecords('packages');
         
//          $fields = "agent.*,department.department";
//          $this->db->where('department.is_deleted','no');
//          $this->db->where('department.is_active','yes');
//          $this->db->order_by('agent.id','ASC');
//          $this->db->join("department", 'agent.department=department.id','left');
//          $Aagent_data = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no','agent.is_active'=>'yes'),$fields);
         
//          $this->db->where('is_deleted','no');
//          $this->db->where('is_active','yes');
//          $this->db->order_by('id','ASC');
//          $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
         
//          $this->db->where('is_deleted','no');
//          $this->db->where('is_active','yes');
//          $this->db->order_by('id','ASC');
//          $department_data = $this->master_model->getRecords('department');
         
//          $this->db->where('is_deleted','no');
//          $this->db->where('is_active','yes');
//          $this->db->order_by('id','DESC');
//          $agent_data = $this->master_model->getRecords('agent');
         
//          $this->db->where('is_deleted','no');
//          $this->db->where('is_active','yes');
//          $this->db->order_by('id','ASC');
//          $social_media_link = $this->master_model->getRecords('social_media_link');
         
//          $this->db->where('is_deleted','no');
//          $this->db->where('is_active','yes');
//          $this->db->order_by('id','ASC');
//          $media_source = $this->master_model->getRecords('media_source');

//         $data = array('middle_content' => 'feedback_add',
//                 'packages_data' => $packages_data,
//                 'Aagent_data' => $Aagent_data,
//                 'agent_data' => $agent_data,
//                 'media_source' => $media_source,
//                 'department_data' => $department_data,
//                 'website_basic_structure' => $website_basic_structure,
//                 'social_media_link' => $social_media_link,
//                 'page_title' => 'Contact Us');
//         $this->arr_view_data['page_title']     =  "Feedback";
//         $this->arr_view_data['middle_content'] =  "feedback_add";
//         $this->load->view('front/common_view',$data);
//   }


	

}