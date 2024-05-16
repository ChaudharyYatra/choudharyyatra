<?php 
//   Controller for: Contact_us page
// Author: Rupali patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        
        $this->arr_view_data = [];
	 }


    public function index()
     {    
        
        // if(isset($_POST['submit']))
        // {
        //         $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
    
        //         if($this->form_validation->run() == TRUE)
        //         {
        //             $mobile_number     = trim($this->input->post('mobile_number'));
    
        //             $arr_insert = array(
        //                 'mobile_number' => $mobile_number
        //             );
                    
        //             $inserted_id = $this->master_model->insertRecord('prospect_downloaded',$arr_insert,true);
                
        //         if($inserted_id > 0)
        //         {    
        //             $this->session->set_flashdata('success_message',"Added Successfully.");
        //             redirect(base_url().'download/index');
                    
        //         }
        //         else
        //         {
        //             $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
        //         }
        //         redirect(base_url().'download/index');
        //     }   
        // }

            $this->db->order_by('id','desc');
            $this->db->where('is_deleted','no');
            $arr_data = $this->master_model->getRecords('prospect_add');

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

            $record = array();
            $fields = "department.*";
            $this->db->where('department.is_active','yes');
            $this->db->where('department.is_deleted','no');
            $department_data = $this->master_model->getRecords('department','',$fields);
            // print_r($department_data); die;

        $data = array('middle_content' => 'download',
                'arr_data' => $arr_data,
                'packages_data' => $packages_data,
                'Aagent_data' => $Aagent_data,
                'agent_data' => $agent_data,
                'department_data' => $department_data,
                'media_source' => $media_source,
                'department_data' => $department_data,
                'website_basic_structure' => $website_basic_structure,
                'social_media_link' => $social_media_link,
                'page_title' => 'Download');
        $this->arr_view_data['page_title']     =  "Download";
        $this->arr_view_data['middle_content'] =  "download";
        $this->load->view('front/common_view',$data);
     }

     public function insertMobileNumber() {
        $mobileNumber = $this->input->post('mobile_number');
        $region_office_location = $this->input->post('region_office_location');
        
        // Insert $mobileNumber into your database
        $arr_insert = array(
            'mobile_number' => $mobileNumber,
            'region_office_location' => $region_office_location,
            'pdf_name' => 'prospect'
        );
        $inserted_id = $this->master_model->insertRecord('prospect_downloaded',$arr_insert,true);
        
        echo json_encode(array('success' => true));
    }

    public function downloadPDF() {

        // Retrieve the PDF filename from the database
        $this->db->where('is_deleted', 'no');
        $this->db->where('is_active','yes');
        $arr_data = $this->master_model->getRecords('prospect_add');
        // print_r($arr_data); die;
        
        if (!empty($arr_data)) {
            $arr_data_value = $arr_data[0]; // Get the first record or change the index as needed
            $pdfFilename = $arr_data_value['prospect_pdf']; // Get the PDF filename from the record
           
            // Construct the PDF file path
            $pdfPath = base_url('uploads/prospect_pdf/' . $pdfFilename);
            // print_r($pdfPath); die;
    
            // Check if the file exists
            if (file_exists($pdfPath)) {
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $pdfFilename . '"');
                readfile($pdfPath);
            } else {
                // Handle error: PDF file not found
            }
        } else {
            // Handle error: No records found in the database
        }
    }

    public function insertrateMobileNumber() {
        $mobileNumber = $this->input->post('mobile_number');
        $region_office_location = $this->input->post('region_office_location');
        // Insert $mobileNumber into your database
        $arr_insert = array(
            'mobile_number' => $mobileNumber,
            'region_office_location' => $region_office_location,
            'pdf_name' => 'rate_chart'
        );
        $inserted_id = $this->master_model->insertRecord('prospect_downloaded',$arr_insert,true);
        
        echo json_encode(array('success' => true));
    }

    public function downloadratePDF() {

        // Retrieve the PDF filename from the database
        $this->db->where('is_deleted', 'no');
        $this->db->where('is_active','yes');
        $arr_data = $this->master_model->getRecords('prospect_add');
        // print_r($arr_data); die;
        
        if (!empty($arr_data)) {
            $arr_data_value = $arr_data[0]; // Get the first record or change the index as needed
            $pdfFilename = $arr_data_value['rate_chart_pdf']; // Get the PDF filename from the record
           
            // Construct the PDF file path
            $pdfPath = base_url('uploads/rate_chart_pdf/' . $pdfFilename);
            // print_r($pdfPath); die;
    
            // Check if the file exists
            if (file_exists($pdfPath)) {
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $pdfFilename . '"');
                readfile($pdfPath);
            } else {
                // Handle error: PDF file not found
            }
        } else {
            // Handle error: No records found in the database
        }
    }
     


}