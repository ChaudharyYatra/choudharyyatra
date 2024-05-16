<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Package_creation extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/package_creation";
        $this->module_url_path_list =  base_url().$this->config->item('admin_panel_slug')."/package_creation";
        $this->module_title       = "Package Creation";
        $this->module_url_slug    = "package_creation";
        $this->module_view_folder = "package_creation/";    
        // $this->load->library('upload');
	}

	public function index()
	{  
        


        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_list'] = $this->module_url_path_list;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
    
    public function add()
    {   
       
        if($this->input->post('submit'))
        {
            
            $this->form_validation->set_rules('tour_number', 'tour_number', 'required');
            $this->form_validation->set_rules('tour_name', 'tour_name', 'required');
            $this->form_validation->set_rules('tour_days', 'tour_days', 'required');
            $this->form_validation->set_rules('tour_start_date', 'tour_start_date', 'required');
            $this->form_validation->set_rules('tour_end_date', 'tour_end_date', 'required');
            $this->form_validation->set_rules('inclusion', 'inclusion', 'required');
            $this->form_validation->set_rules('terms_conditions', 'terms_conditions', 'required');
            
            if($this->form_validation->run() == TRUE)
            {

                $tour_number = $this->input->post('tour_number'); 
                $tour_name = $this->input->post('tour_name');  
                $tour_days = $this->input->post('tour_days');  
                $tour_start_date = $this->input->post('tour_start_date');  
                $tour_end_date = $this->input->post('tour_end_date');  
                $inclusion = $this->input->post('inclusion'); 
                $terms_conditions = $this->input->post('terms_conditions'); 

                $arr_insert = array(
                    'tour_number'   =>   $tour_number,
                    'tour_name'   =>   $tour_name,
                    'tour_days'   =>   $tour_days,
                    'tour_start_date'   =>   $tour_start_date,
                    'tour_end_date'   =>   $tour_end_date,
                    'inclusion'   =>   $inclusion,
                    'terms_conditions'   =>   $terms_conditions
                );
                
                $inserted_id = $this->master_model->insertRecord('tour_details_data',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," Tour Details Data Added Successfully.");
                    redirect($this->module_url_path.'/add');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/add');
            }   
            
        
        }

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $packages_data = $this->master_model->getRecords('packages');


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['packages_data'] = $packages_data;
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

   
}