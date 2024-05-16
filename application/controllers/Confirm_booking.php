<?php 
//   Controller for: Confirm_booking page
// Author: Vivek patil
// Start Date: 25-08-2022
// last updated: 25-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm_booking extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        
        $this->arr_view_data = [];
	 }


	 
     public function index($id)
     {
        if ($id=='') 
        {
            redirect(base_url.'/home');
        }   

        if(is_numeric($id))
        {
            $this->db->where('id',$id);
            $confirm_booking_details = $this->master_model->getRecords('confirm_booking');
        }
        else
        {
            redirect(base_url().'home');
        }


         $data = array('middle_content' => 'confirmation',
						'confirm_booking_details'       => $confirm_booking_details,);
        $this->arr_view_data['page_title']     =  " Confirmation Page";
        $this->arr_view_data['middle_content'] =  "confirmation";
        $this->load->view('front/common_view',$data);
     }

     public function add($id)
     {    
        
        if(is_numeric($id))
        { 
            
                $arr_insert = array(
                    'traveler_id'       =>   '1',
                    'package_date_id'   => $id
                );
                
                $inserted_id = $this->master_model->insertRecord('confirm_booking',$arr_insert,true);
            
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Booking Confirmation Added Successfully.");
                    redirect(base_url().'confirm_booking/index');
                    
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect(base_url().'confirm_booking/index');
             
        }


}


}
