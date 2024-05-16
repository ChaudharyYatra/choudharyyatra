<?php 
//   Controller for: Contact_us page
// Author: Rupali patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        
        $this->arr_view_data = [];
	 }


    public function index()
     {    
        
        if(isset($_POST['submit']))
        {
                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('agent_id', 'Agent ID', 'required');
				$this->form_validation->set_rules('wp_mobile_number', 'Whatsapp Mobile Number', 'required');
				$this->form_validation->set_rules('tour_number', 'tour number', 'required');
                $this->form_validation->set_rules('message', 'message', 'required');
    
                if($this->form_validation->run() == TRUE)
                {
                    $first_name        = $this->input->post('first_name'); 
                    $last_name         = $this->input->post('last_name'); 
                    $email             = trim($this->input->post('email'));
                    $mobile_number     = trim($this->input->post('mobile_number'));
                    $gender            = $this->input->post('gender');
                    $agent_id          = $this->input->post('agent_id');
                    $media_source_name = $this->input->post('media_source_name');
					$wp_mobile_number  = trim($this->input->post('wp_mobile_number'));
                    $tour_number  = trim($this->input->post('tour_number'));
                    $other_tour_name  = trim($this->input->post('other_tour_name'));
                    $message  = trim($this->input->post('message'));
                    // $package_id        = $id;
    
                    $arr_insert = array(
                        'first_name'    =>   $first_name,
                        'last_name'     => $last_name,
                        'email'         => $email,
                        'mobile_number' => $mobile_number,
                        'gender'        => $gender,
                        'agent_id'     => $agent_id,
                        // 'package_id'    =>$id,
                        'media_source_name'    =>$media_source_name,
						'wp_mobile_number'=>$wp_mobile_number,
                        'package_id'=>$tour_number,
                        'other_tour_name'=>$other_tour_name,
                        'message'=>$message,
                        'enquiry_from'=>'contact us'
                    );
                    
                    $inserted_id = $this->master_model->insertRecord('booking_enquiry',$arr_insert,true);
                
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Added Successfully.");
                    redirect(base_url().'contact_us/index');
                    
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect(base_url().'contact_us/index');
            }   
        }

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

        $data = array('middle_content' => 'contact_us',
                'packages_data' => $packages_data,
                'Aagent_data' => $Aagent_data,
                'agent_data' => $agent_data,
                'media_source' => $media_source,
                'department_data' => $department_data,
                'website_basic_structure' => $website_basic_structure,
                'social_media_link' => $social_media_link,
                'page_title' => 'Contact Us');
        $this->arr_view_data['page_title']     =  "Contact Page";
        $this->arr_view_data['middle_content'] =  "contact_us";
        $this->load->view('front/common_view',$data);
     }


}