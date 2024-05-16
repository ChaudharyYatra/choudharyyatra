<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Year_wise_cost_creation extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/year_wise_cost_creation";
        $this->module_url_path_list =  base_url().$this->config->item('admin_panel_slug')."/year_wise_cost_creation";
        $this->module_title       = "Year Wise Cost Creation";
        $this->module_url_slug    = "year_wise_cost_creation";
        $this->module_view_folder = "year_wise_cost_creation/";    
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
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','desc');
        $academic_years_data = $this->master_model->getRecord('year_wise_cost_creation');

        $year_wise_id = $academic_years_data['id'];
        $year_w_id = $year_wise_id + 1;
        // print_r($year_w_id); die;

       
        if($this->input->post('submit'))
        {
            
            $this->form_validation->set_rules('slab_serial_number', 'slab_serial_number', 'required');
            $this->form_validation->set_rules('travelling_year', 'travelling_year', 'required');
            $this->form_validation->set_rules('from_date', 'from_date', 'required');
            $this->form_validation->set_rules('to_date', 'to_date', 'required');
            $this->form_validation->set_rules('from_days', 'from_days', 'required');
            $this->form_validation->set_rules('to_days', 'to_days', 'required');
            
            if($this->form_validation->run() == TRUE)
            {

                $slab_serial_number = $this->input->post('slab_serial_number'); 
                $travelling_year = $this->input->post('travelling_year');  
                $from_date = $this->input->post('from_date');  
                $to_date = $this->input->post('to_date');  
                $from_days = $this->input->post('from_days');  
                $to_days = $this->input->post('to_days'); 

                $arr_insert = array(
                    'slab_serial_number'   =>   $slab_serial_number,
                    'travelling_year'   =>   $travelling_year,
                    'from_date'   =>   $from_date,
                    'to_date'   =>   $to_date,
                    'from_days'   =>   $from_days,
                    'to_days'   =>   $to_days
                );
                
                $inserted_id = $this->master_model->insertRecord('year_wise_cost_creation',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," year wise cost creation Added Successfully.");
                    redirect($this->module_url_path.'/add_bus_kilometer_rates');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/add_bus_kilometer_rates');
            }   
            
        
        }

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $academic_years_data = $this->master_model->getRecords('academic_years');


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['academic_years_data'] = $academic_years_data;
        $this->arr_view_data['year_w_id'] = $year_w_id;
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function add_bus_kilometer_rates()
    {   
       
        if($this->input->post('bus_submit'))
        {
            
            $this->form_validation->set_rules('bus_type_1', 'bus_type_1', 'required');
            $this->form_validation->set_rules('rate_1', 'rate_1', 'required');
            // $this->form_validation->set_rules('bus_type_2', 'bus_type_2', 'required');
            // $this->form_validation->set_rules('rate_2', 'rate_2', 'required');
            // $this->form_validation->set_rules('bus_type_3', 'bus_type_3', 'required');
            // $this->form_validation->set_rules('rate_3', 'rate_3', 'required');
            // $this->form_validation->set_rules('bus_type_4', 'bus_type_4', 'required');
            // $this->form_validation->set_rules('rate_4', 'rate_4', 'required');
            // $this->form_validation->set_rules('bus_type_5', 'bus_type_5', 'required');
            // $this->form_validation->set_rules('rate_5', 'rate_5', 'required');
            
            if($this->form_validation->run() == TRUE)
            {

                $bus_type_1 = $this->input->post('bus_type_1'); 
                $rate_1 = $this->input->post('rate_1'); 
                $bus_type_2 = $this->input->post('bus_type_2'); 
                $rate_2 = $this->input->post('rate_2');  
                $bus_type_3 = $this->input->post('bus_type_3'); 
                $rate_3 = $this->input->post('rate_3');
                $bus_type_4 = $this->input->post('bus_type_4'); 
                $rate_4 = $this->input->post('rate_4');
                $bus_type_5 = $this->input->post('bus_type_5'); 
                $rate_5 = $this->input->post('rate_5');

                $arr_insert = array(
                    'bus_type_1'   =>   $bus_type_1,
                    'rate_1'   =>   $rate_1,
                    'bus_type_2'   =>   $bus_type_2,
                    'rate_2'   =>   $rate_2,
                    'bus_type_3'   =>   $bus_type_3,
                    'rate_3'   =>   $rate_3,
                    'bus_type_4'   =>   $bus_type_4,
                    'rate_4'   =>   $rate_4,
                    'bus_type_5'   =>   $bus_type_5,
                    'rate_5'   =>   $rate_5
                );
                
                $inserted_id = $this->master_model->insertRecord('bus_kilometer_rates',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," add bus kilometer rates Added Successfully.");
                    redirect($this->module_url_path.'/add_office_maintainance');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/add_office_maintainance');
            }   
            
        
        }

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $bus_type_data = $this->master_model->getRecords('bus_type');


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['bus_type_data'] = $bus_type_data;
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add_bus_kilometer_rates";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function add_office_maintainance()
    {   
       
        if($this->input->post('office_submit'))
        {
            
            $this->form_validation->set_rules('standard', 'standard', 'required');
            $this->form_validation->set_rules('economy', 'economy', 'required');
            
            if($this->form_validation->run() == TRUE)
            {

                $standard = $this->input->post('standard'); 
                $economy = $this->input->post('economy');

                $arr_insert = array(
                    'standard'   =>   $standard,
                    'economy'   =>   $economy
                );
                
                $inserted_id = $this->master_model->insertRecord('office_maintainance',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," office maintainance Added Successfully.");
                    redirect($this->module_url_path.'/add');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/add');
            }   
            
        
        }



        $this->arr_view_data['action']          = 'add';
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add_office_maintainance";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }



   
}