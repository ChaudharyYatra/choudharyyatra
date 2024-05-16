<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Allocate_tour extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('hotel_sess_id')=="") 
        { 
                redirect(base_url().'hotel/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('hotel_panel_slug')."hotel/allocate_tour";
        $this->module_title       = "Allocated Tour ";
        $this->module_url_slug    = "allocate_tour";
        $this->module_view_folder = "allocate_tour/";
        $this->arr_view_data = [];
	}


    public function index()
    {
       $hotel_sess_name = $this->session->userdata('hotel_name');
       $id = $this->session->userdata('hotel_sess_id');

        $record = array();
        $fields = "packages.*,final_booking.package_id,final_booking.package_date_id,package_date.id,package_date.journey_date,packages.id as pid";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('final_booking.hotel_name_id',$id);
        $this->db->group_by('package_date.id','package.id'); 
        $this->db->join("final_booking", 'final_booking.package_id=packages.id','right');
        $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','right');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
    //    print_r($arr_data); die;

        $this->arr_view_data['hotel_sess_name'] = $hotel_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
       
    }

    public function allocate_room($id,$pid)
    {          
        $hotel_sess_name = $this->session->userdata('hotel_name');
        $iid = $this->session->userdata('hotel_sess_id');


        $arr_data = $this->master_model->getRecords('hotel_room');
        //  print_r($arr_data); die;

       $hotel_allocated_room_data = $this->master_model->getRecords('hotel_allocated_room');


        if(isset($_POST['submit']))
        {
            // $this->form_validation->set_rules('one_bed_AC[]', 'one_bed_AC', 'required');

            
                if(!empty($this->input->post('one_bed_AC'))){
                $one_bed_AC  = implode(',',$this->input->post('one_bed_AC')); 
                }else {
                    $one_bed_AC  ='';
                }
                
                if(!empty($this->input->post('two_bed_AC'))){
                $two_bed_AC  = implode(',',$this->input->post('two_bed_AC'));
                }else {
                    $two_bed_AC  ='';
                }

                if(!empty($this->input->post('three_bed_AC'))){
                $three_bed_AC  = implode(',',$this->input->post('three_bed_AC')); 
                }else {
                    $three_bed_AC  ='';
                }

                if(!empty($this->input->post('four_bed_AC'))){
                $four_bed_AC  = implode(',',$this->input->post('four_bed_AC')); 
                }else {
                    $four_bed_AC  ='';
                }

                if(!empty($this->input->post('one_bed_Non_AC'))){
                $one_bed_Non_AC  = implode(',',$this->input->post('one_bed_Non_AC')); 
                }else {
                    $one_bed_Non_AC  ='';
                }

                if(!empty($this->input->post('two_bed_Non_AC'))){
                $two_bed_Non_AC  = implode(',',$this->input->post('two_bed_Non_AC')); 
                }else {
                    $two_bed_Non_AC  ='';
                }

                if(!empty($this->input->post('three_bed_Non_AC'))){
                $three_bed_Non_AC  = implode(',',$this->input->post('three_bed_Non_AC')); 
                }else {
                    $three_bed_Non_AC  ='';
                }

                if(!empty($this->input->post('four_bed_Non_AC'))){
                $four_bed_Non_AC  = implode(',',$this->input->post('four_bed_Non_AC')); 
                }else {
                    $four_bed_Non_AC  ='';
                }


                $arr_insert = array(
                    'hotel_name_id' => $iid,
                    'package_date_id' => $id,
                    'package_id' => $pid,
                    'one_bed_AC'   =>   $one_bed_AC,
                    'two_bed_AC'   =>   $two_bed_AC,
                    'three_bed_AC'   =>   $three_bed_AC,
                    'four_bed_AC'   =>   $four_bed_AC,

                    'one_bed_Non_AC'   =>   $one_bed_Non_AC,
                    'two_bed_Non_AC'   =>   $two_bed_Non_AC,
                    'three_bed_Non_AC'   =>   $three_bed_Non_AC,
                    'four_bed_Non_AC'   =>   $four_bed_Non_AC
                );
                
                // $inserted_id = $this->master_model->insertRecord('hotel_allocated_room',$arr_insert,true);

                if(!empty($hotel_allocated_room_data)){
                    $arr_where     = array("package_date_id" => $id);
                    $arr_where_pid     = array("package_id" => $pid);
                    $inserted_id = $this->master_model->updateRecord('hotel_allocated_room',$arr_insert,$arr_where,$arr_where_pid);  
                    
                }else{
                        $inserted_id = $this->master_model->insertRecord('hotel_allocated_room',$arr_insert,true);
                    }
                    
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
 
               
        }


        $hotel_allocated_room_data = $this->master_model->getRecords('hotel_allocated_room');

        $this->arr_view_data['hotel_sess_name']        = $hotel_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['hotel_allocated_room_data'] = $hotel_allocated_room_data;
        $this->arr_view_data['action']          = 'add';       
        $this->arr_view_data['page_title']      = " Allocated room ";
        $this->arr_view_data['module_title']    = " Allocated room ";
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."allocate_room";
        $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
    }



}