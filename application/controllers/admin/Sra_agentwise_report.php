<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Sra_agentwise_report extends CI_Controller {
	 
	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }

        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/sra_agentwise_report";
        $this->module_sra_all_payment_details    =  base_url().$this->config->item('admin_panel_slug')."/sra_all_payment_details";
        $this->module_title       = "Agentwise SRA Report ";
        $this->module_url_slug    = "sra_agentwise_report";
        $this->module_view_folder = "sra_agentwise_report/";
        $this->arr_view_data = [];
	}

     public function index()
     {
        $fields = "sra_payment.*,sra_booking_payment_details.booking_amt,sra_booking_payment_details.payment_confirmed_status,academic_years.year,agent.agent_name";
        // $this->db->order_by('id','ASC');
        $this->db->where('sra_booking_payment_details.is_deleted','no');
        $this->db->where('sra_booking_payment_details.is_deleted','no');
        // $this->db->where('sra_booking_payment_details.agent_id',$iid);
        $this->db->join("sra_booking_payment_details", 'sra_booking_payment_details.sra_payment_id=sra_payment.id','left');
        $this->db->join("academic_years", 'academic_years.id=sra_booking_payment_details.academic_year','left');
        $this->db->join("agent", 'sra_payment.agent_id=agent.id','left');
        $this->db->group_by('sra_payment.agent_id');
        $arr_data = $this->master_model->getRecords('sra_payment',array('sra_payment.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        //  $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_sra_all_payment_details'] = $this->module_sra_all_payment_details;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
     }

    // Get Details 
    public function details($id)
    {
        // $agent_sess_name = $this->session->userdata('agent_name');
        // $iid = $this->session->userdata('agent_sess_id');   

		//  $id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        $record = array();
        $fields = "booking_basic_info.*,packages.id as pid,packages.tour_title,packages.tour_number,
        packages.tour_number,package_date.journey_date,package_hotel.package_id,package_hotel.hotel_name_id,
        package_date.id as p_date_id,booking_payment_details.package_id,booking_payment_details.package_date_id,booking_payment_details.agent_id";
        $this->db->where('booking_basic_info.is_deleted','no');
        $this->db->where('booking_payment_details.enquiry_id',$id);
        $this->db->join("packages", 'packages.id=booking_basic_info.tour_no','left');
        $this->db->join("package_date", 'package_date.id=booking_basic_info.tour_date','left');
        $this->db->join("package_hotel", 'package_hotel.package_id=packages.id','left');
        $this->db->join("booking_payment_details", 'booking_basic_info.domestic_enquiry_id=booking_payment_details.enquiry_id','left');
        $traveller_booking_info = $this->master_model->getRecords('booking_basic_info',array('booking_basic_info.is_deleted'=>'no'),$fields);

        // print_r($traveller_booking_info); die;
        foreach($traveller_booking_info  as $traveller_booking_pdate){
            $p_id = $traveller_booking_pdate['package_id'];
            $p_date_id = $traveller_booking_pdate['package_date_id'];
            $agent_id = $traveller_booking_pdate['agent_id'];
        }
        // print_r($p_date); die; 

        $record = array();
        $fields = "all_traveller_info.*";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('all_traveller_info.domestic_enquiry_id',$id);
        $arr_data = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);
        
        $record = array();
        $fields = "seat_type_room_type.*";
        $this->db->where('seat_type_room_type.is_deleted','no');
        $this->db->where('seat_type_room_type.domestic_enquiry_id',$id);
        $seat_type_room_type_data = $this->master_model->getRecords('seat_type_room_type',array('seat_type_room_type.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "bus_seat_book.*";
        $this->db->where('bus_seat_book.is_deleted','no');
        $this->db->where('bus_seat_book.enquiry_id',$id);
        $bus_seat_book_data = $this->master_model->getRecords('bus_seat_book',array('bus_seat_book.is_deleted'=>'no'),$fields);
        // print_r($bus_seat_book_data); die; 

        $record = array();
        $fields = "booking_payment_details.*";
        $this->db->where('booking_payment_details.is_deleted','no');
        $this->db->where('booking_payment_details.enquiry_id',$id);
        $booking_payment_details_data = $this->master_model->getRecords('booking_payment_details');
        // print_r($booking_payment_details_data); die; 


        // $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        $this->arr_view_data['booking_payment_details_data'] = $booking_payment_details_data;
        $this->arr_view_data['p_id']        = $p_id;
        $this->arr_view_data['p_date_id']        = $p_date_id;
        $this->arr_view_data['agent_id']        = $agent_id;
        $this->arr_view_data['traveller_booking_info']        = $traveller_booking_info;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['seat_type_room_type_data']        = $seat_type_room_type_data;
        $this->arr_view_data['bus_seat_book_data']        = $bus_seat_book_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


    public function edit()
    {
            if($this->input->post('submit_doc'))
            {
                if($_FILES['image_name']['name']!=''){

                $file_name     = $_FILES['image_name']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                $file_name = $_FILES['image_name'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','pdf','PDF');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['image_name']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

              $file_name_courier_receipt =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/srs_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_courier_receipt;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $new_img_filename = $file_name_courier_receipt;
                }
                else
                {
                    $new_img_filename = $this->input->post('image_name',TRUE);     
                }

            } 
            else{
                $new_img_filename  = '';
            }
            // ===============
            $enquiry_id  = $this->input->post('enquiry_id'); 
            $package_date_id  = $this->input->post('package_date_id'); 
            $srs_remark  = $this->input->post('srs_remark'); 

                $arr_update = array(
                    'srs_image_name'    => $new_img_filename,
                    'srs_remark'    => $srs_remark

                );
                    $arr_where     = array("enquiry_id" => $enquiry_id);
                    $inserted_id= $this->master_model->updateRecord('booking_payment_details',$arr_update,$arr_where);
                    if($inserted_id > 0)
                    {
                        $this->session->set_flashdata('success_message',"SRS Updated Successfully.");
                        redirect($this->module_url_path.'/sub_index/'.$package_date_id);
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index');

          
        }
        
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_payment_receipt'] = $this->module_url_path_payment_receipt;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }



}