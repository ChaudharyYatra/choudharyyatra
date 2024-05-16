<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_edit_req extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/profile_edit_req";
        $this->module_title       = "Profile Edit Req";
        $this->module_url_slug    = "profile_edit_req";
        $this->module_view_folder = "profile_edit_req/";    
        $this->load->library('upload');
	}

	public function index()
	{	    
        $fields = "agent_temp_tbl.*,department.department";
        // $this->db->order_by('agent.arrange_id','asc');        
        $this->db->where('department.is_deleted','no');    
        $this->db->where('agent_temp_tbl.profile_update_request','requested');      
        $this->db->join("department", 'agent_temp_tbl.department=department.id','left');
        $arr_data = $this->master_model->getRecords('agent_temp_tbl',array('agent_temp_tbl.is_deleted'=>'no'),$fields);

        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $arr_data = $this->master_model->getRecords('agent_temp_tbl');

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}

        // Get Details of Package

        public function details($id)
        {
			$id=base64_decode($id);
            if ($id=='') 
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path.'/index');
            }   
    
            if($id!='')
            {   
                $fields = "agent_temp_tbl.*,department.department";
                $this->db->where('agent_temp_tbl.id',$id);
                $this->db->where('agent_temp_tbl.profile_update_request','requested');
                $this->db->join("department", 'agent_temp_tbl.department=department.id','left');
                $arr_data = $this->master_model->getRecords('agent_temp_tbl',array('agent_temp_tbl.is_deleted'=>'no'),$fields);
                // print_r($arr_data); die;
                $profile_update_request=$arr_data[0]['profile_update_request'];
                //     print_r($profile_update_request); die;

            }
            else
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path.'/index');
            }
            
            $this->arr_view_data['arr_data']        = $arr_data;
            $this->arr_view_data['page_title']      = "Profile Update Request";
            $this->arr_view_data['module_title']    = $this->module_title;
            $this->arr_view_data['module_url_path'] = $this->module_url_path;
            $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
            $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        }

        // Approve

        public function approve()
        {
            $request_id  = $this->input->post('request_id');

            $fields = "agent_temp_tbl.*,department.department";
            $this->db->where('agent_temp_tbl.id',$request_id);
            $this->db->where('agent_temp_tbl.profile_update_request','requested');
            $this->db->join("department", 'agent_temp_tbl.department=department.id','left');
            $arr_data = $this->master_model->getRecord('agent_temp_tbl',array('agent_temp_tbl.is_deleted'=>'no'),$fields);
            // print_r($arr_data); die;

        //     print_r($arr_data); die;
                $city = $arr_data['city'];
                $agent_id = $arr_data['agent_id'];
                $booking_center = $arr_data['booking_center'];
                $agent_name = $arr_data['agent_name'];
                $mobile_number1 = $arr_data['mobile_number1'];
                $mobile_number2 = $arr_data['mobile_number2'];
                $email = $arr_data['email'];
                $fld_agency_name = $arr_data['fld_agency_name'];
                $fld_mobile_number3 = $arr_data['fld_mobile_number3'];
                $fld_landline_number = $arr_data['fld_landline_number'];
                $fld_office_address = $arr_data['fld_office_address'];
                $fld_registration_date = $arr_data['fld_registration_date'];
                $fld_GST_number = $arr_data['fld_GST_number'];
                $fld_pan_number = $arr_data['fld_pan_number'];
                $image_name = $arr_data['image_name'];
                $filename_qr_code = $arr_data['qr_code_image'];
                $upi_id = $arr_data['upi_id'];
            
                $arr_update = array(
                        'city'   =>    $city,
                        'booking_center'          => $booking_center,
                        'agent_name'          => $agent_name,
                        'mobile_number1'          =>  $mobile_number1,
                        'mobile_number2'          => $mobile_number2,
                        'email'          => $email,
                        'fld_agency_name'          => $fld_agency_name,
                        'fld_mobile_number3'          => $fld_mobile_number3,
                        'fld_landline_number'          => $fld_landline_number,
                        'fld_office_address'          => $fld_office_address,
                        'fld_registration_date'          => $fld_registration_date,
                        'fld_GST_number'          => $fld_GST_number,
                        'fld_pan_number'          => $fld_pan_number,
                        'image_name'          => $image_name,
                        'profile_update_request' => 'accepted',
                        'status_of_QR_UPI' => 'Approved',
                        'qr_code_image'          => $filename_qr_code,
                        'upi_id'          => $upi_id

                    );
                    
                        $arr_where     = array("id" => $agent_id);
                        $inserted_id = $this->master_model->updateRecord('agent',$arr_update,$arr_where);
            // --------------------------------------------------------------------------------------------------
                        if($inserted_id > 0)
                    {
                        $arr_update2 = array(
                                'profile_update_request' => 'accepted',
                                'status_of_QR_UPI' => 'Approved'
                        );
            
                     $arr_where2     = array("agent_temp_tbl.id" => $request_id);
                      $this->master_model->updateRecord('agent_temp_tbl',$arr_update2,$arr_where2);
                    }
            // --------------------------------------------------------------------------------------------------
                 return true;      
            
           
            }

   
}