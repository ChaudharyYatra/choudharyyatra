<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_cancel extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];

        if($this->session->userdata('cust_sess_id')=="") 
        { 
                redirect(base_url().'home'); 
        }

        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
	 }

	 
     public function index($pid,$pd_id,$enquiry_id)
    {    
        $cust_sess_name = $this->session->userdata('cust_fname');
        $cust_sess_lname = $this->session->userdata('cust_lname');
        $id=$this->session->userdata('cust_sess_id');
        
        if(isset($_POST['submit']))
        {
                $this->form_validation->set_rules('tour_name', 'tour_name Name', 'required');
                $this->form_validation->set_rules('tour_date', 'tour_date', 'required');
                $this->form_validation->set_rules('reason', 'reason', 'required');
    
                if($this->form_validation->run() == TRUE)
                {
                    $tour_name        = $this->input->post('tour_name'); 
                    $tour_date         = $this->input->post('tour_date'); 
                    $reason  = trim($this->input->post('reason'));
                    $traveller_id  = trim($this->input->post('traveller_id'));
                    $agent_id  = trim($this->input->post('agent_id'));
                    // $package_id        = $id;
    
                    $arr_insert = array(
                        'package_id'     => $pid,
                        'package_date_id'     => $pd_id,
                        'traveler_id'     => $traveller_id,
                        'take_enquiry_by_agent_id'     => $agent_id,
                        'enquiry_id'    => $enquiry_id,
                        'tour_cancel_status'    => 'Request',
                        'reason'        =>$reason
                    );
                    
                    $inserted_id = $this->master_model->insertRecord('customer_cancel_tour',$arr_insert,true);
                
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Send Request To Agent Successfully.");
                    redirect(base_url().'customer_cancelled_tour/index');
                    
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect(base_url().'customer_cancelled_tour/index');
                }   
            }

            $fields = "confirm_booking.*,packages.tour_title,package_date.journey_date,agent.agent_name";
            $this->db->where('confirm_booking.is_deleted','no');
            $this->db->where('confirm_booking.is_active','yes');
            $this->db->where('confirm_booking.traveler_id',$id); //check session id & traverl id match
            $this->db->where('confirm_booking.package_id',$pid);
            $this->db->where('confirm_booking.package_date_id',$pd_id);
            $this->db->where('confirm_booking.enquiry_id',$enquiry_id);
            $this->db->join("packages", 'confirm_booking.package_id=packages.id','left');
            $this->db->join("package_date", 'confirm_booking.package_date_id=package_date.id','left');
            $this->db->join("agent", 'confirm_booking.take_enquiry_by_agent_id=agent.id','left');
            $tour_details = $this->master_model->getRecords('confirm_booking',array('confirm_booking.is_deleted'=>'no'),$fields);
            // print_r($tour_details); die;
        

            $fields = "customer_cancel_tour.*,packages.tour_title,package_date.journey_date,agent.agent_name";
            $this->db->where('customer_cancel_tour.is_deleted','no');
            $this->db->where('customer_cancel_tour.is_active','yes');
            $this->db->where('customer_cancel_tour.traveler_id',$id); //check session id & traverl id match
            $this->db->where('customer_cancel_tour.package_id',$pid);
            $this->db->where('customer_cancel_tour.package_date_id',$pd_id);
            $this->db->where('customer_cancel_tour.enquiry_id',$enquiry_id);
            $this->db->join("packages", 'customer_cancel_tour.package_id=packages.id','left');
            $this->db->join("package_date", 'customer_cancel_tour.package_date_id=package_date.id','left');
            $this->db->join("agent", 'customer_cancel_tour.take_enquiry_by_agent_id=agent.id','left');
            $tour_details_view = $this->master_model->getRecords('customer_cancel_tour',array('customer_cancel_tour.is_deleted'=>'no'),$fields);
            // print_r($tour_details_view); die;

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

            $data = array('middle_content' => 'tour_cancel',
                    'packages_data' => $packages_data,
                    'tour_details' => $tour_details,
                    'tour_details_view' => $tour_details_view,
                    'Aagent_data' => $Aagent_data,
                    'agent_data' => $agent_data,
                    'media_source' => $media_source,
                    'department_data' => $department_data,
                    'website_basic_structure' => $website_basic_structure,
                    'social_media_link' => $social_media_link,
                    'cust_sess_name'        => $cust_sess_name,
                        'cust_sess_lname'        => $cust_sess_lname,
                    'page_title' => 'Tour Cancel');
            $this->arr_view_data['page_title']     =  "Tour Cancel";
            $this->arr_view_data['middle_content'] =  "tour_cancel";
            $this->load->view('front/common_view',$data);
    }


	

}