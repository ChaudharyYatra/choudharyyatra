<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_change_password extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('cust_sess_id')=="") 
        { 
                redirect(base_url().'home'); 
        }
        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
        $this->module_url_path    =  base_url().$this->config->item('traveler_front_id')."customer_change_password";
        $this->module_title       = "Change Password";
        $this->module_title2      = "Profile";
        $this->module_url_slug    = "profile";
        $this->module_view_folder = "customer_change_password/";
        $this->arr_view_data = [];
	 }

    
    public function change_password()
     {
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

        $fields = "final_booking.*,packages.tour_title,package_date.journey_date";
        $this->db->where('final_booking.is_deleted','no');
        $this->db->where('final_booking.is_active','yes');
        $this->db->where('final_booking.traveller_id',$id); //check session id & traverl id match
        $this->db->join("packages", 'final_booking.package_id=packages.id','left');
        $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','left');
        // $this->db->join("all_traveller_info", 'final_booking.booking_reference_no=all_traveller_info.booking_reference_no','left');
        $arr_data_tour_details = $this->master_model->getRecords('final_booking',array('final_booking.is_deleted'=>'no'),$fields);
        // print_r($arr_data_tour_details); die;      

        if($this->input->post('submit'))
             {
                $cust_sess_name = $this->session->userdata('cust_fname');
                $cust_sess_lname = $this->session->userdata('cust_lname');
                $id=$this->session->userdata('cust_sess_id');


                 $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
                 $this->form_validation->set_rules('new_password', 'New password', 'required');
                 $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');
                 if($this->form_validation->run() == TRUE)
                 {                  
                    $old_pass = trim($this->input->post('old_pass'));
                    $new_password = trim($this->input->post('new_password'));
                    $confirm_pass = trim($this->input->post('confirm_pass'));
 
                    $this->db->where('id',$id);
                    $arr_data = $this->master_model->getRecords('all_traveller_info');
                    // print_r($arr_data); die;
                    
                    $existed_password = $arr_data[0]['password'];
                    
                    if($existed_password == $old_pass)
                    {
                         $arr_update = array(                       
                             'password' => $new_password                            
                         );
                         $arr_where     = array("id" => $id);
                         $this->master_model->updateRecord('all_traveller_info',$arr_update,$arr_where);
                         


                         if ($id > 0) {
                            $this->session->set_flashdata('success_message', " Password Change Successfully.");
                        } else {
                            $this->session->set_flashdata('error_message', "Something Went Wrong While Updating The " . ucfirst($this->module_title) . ".");
                        }
                    } else {
                        $this->session->set_flashdata('error_message', "Old Password is Wrong.");
                    }
 
                     redirect($this->module_url_path.'/change_password');
                 }   
             }
                
         
         $data = array('middle_content' => 'customer_change_password',
                        'website_basic_structure'       => $website_basic_structure,
                        'social_media_link'       => $social_media_link,
                        'arr_data'               => $arr_data,
                        'arr_data_tour_details'               => $arr_data_tour_details,
                        'cust_sess_name'        => $cust_sess_name,
                        'cust_sess_lname'        => $cust_sess_lname,
                        'page_title'    => 'Customer Change Password'
                        );
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['page_title']     =  "Customer Change Password";
        $this->arr_view_data['middle_content'] =  "customer_change_password";
        $this->load->view('front/common_view',$data);


        // $this->arr_view_data['action']          = 'website_visitor_data';
        // $this->arr_view_data['website_basic_structure'] = $website_basic_structure;
        // $this->arr_view_data['social_media_link'] = $social_media_link;
        // $this->arr_view_data['arr_data'] = $arr_data;
        // $this->arr_view_data['arr_data_tour_details'] = $arr_data_tour_details;
        // $this->arr_view_data['cust_sess_name'] = $cust_sess_name;
        // $this->arr_view_data['cust_sess_lname'] = $cust_sess_lname;
        // $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        // $this->arr_view_data['module_title']    = $this->module_title;
        // $this->arr_view_data['module_url_path'] = $this->module_url_path;
        // $this->arr_view_data['middle_content']  = $this->module_view_folder."customer_change_password";
        // $this->load->view('front/common_view',$this->arr_view_data);
     }

    //  public function index()
    //  {
    //      $id=$this->session->userdata('chy_admin_id');
    //      if ($id=='') 
    //      {
    //          $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //          redirect($this->module_url_path.'/index');
    //      }   
         
         
    //      $this->db->where('id',$id);         
    //      $arr_data = $this->master_model->getRecords('admin');
         
    //      $this->arr_view_data['arr_data']        = $arr_data;
    //      $this->arr_view_data['page_title']      = "Profile";
    //      $this->arr_view_data['module_title']    = "Profile";
    //      $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //      $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
    //      $this->load->view('front/common_view',$this->arr_view_data);
    //  }

    


}