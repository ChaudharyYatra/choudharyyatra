<?php 
//   Controller for: home page
// Author: Rupali patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_history extends CI_Controller {
	 
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
            $booking_history_details = $this->master_model->getRecords('booking_history');
        }
        else
        {
            redirect(base_url().'home');
        }

         $data = array('middle_content' => 'booking_history',
						'booking_history_details'       => $booking_history_details,);
        $this->arr_view_data['page_title']     =  " Booking History Page";
        $this->arr_view_data['middle_content'] =  "booking_history";
        $this->load->view('front/common_view',$data);
     }


}
