<?php 
//   Controller for: home page

defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_details extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('hotel_sess_id')=="") 
        { 
                redirect(base_url().'hotel/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('hotel_panel_slug')."/hotel_details";
        $this->module_title       = "Hotel Details";
        $this->module_url_slug    = "hotel_details";
        $this->module_view_folder = "hotel_details/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
         $hotel_sess_name = $this->session->userdata('hotel_name');
         $id=$this->session->userdata('hotel_sess_id');
        //  $record = array();
        //  $fields = "hotel_details.*,hotel.*,packages.tour_title,packages.tour_number";
        //  $this->db->order_by('hotel_details.created_at','desc');
        //  $this->db->where('hotel.is_deleted','no');
        //  $this->db->where('hotel.is_active','yes');
        //  $this->db->where('hotel_details.hotel_id',$id);
        //  $this->db->join("hotel", 'hotel.id=hotel_details.hotel_id','left');
        //  $this->db->join("packages", 'packages.id=hotel_details.package_id','left'); ,$fields[from down line]
         $arr_data = $this->master_model->getRecords('hotel_master',array('hotel_master.is_deleted'=>'no'));
         
         $this->arr_view_data['hotel_sess_name']        = $hotel_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
        
     }

    //  public function delete($id)
    //  {
         
    //      if(is_numeric($id))
    //      {   
    //          $this->db->where('id',$id);
    //          $arr_data = $this->master_model->getRecords('hotel_enquiry');
 
    //          if(empty($arr_data))
    //          {
    //              $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //              redirect($this->module_url_path);
    //          }
    //          $arr_update = array('is_deleted' => 'yes');
    //          $arr_where = array("id" => $id);
                  
    //          if($this->master_model->updateRecord('hotel_enquiry',$arr_update,$arr_where))
    //          {
    //              $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
    //          }
    //          else
    //          {
    //              $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
    //          }
    //      }
    //      else
    //      {
            
    //             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //      }
    //      redirect($this->module_url_path.'/index');  
    //  }


}