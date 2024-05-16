<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About_us extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/about_us";
        $this->module_title       = "About Us";
        $this->module_url_slug    = "about_us";
        $this->module_view_folder = "about_us/";
	}

	public function index()
	{  
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('about_us');

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
    
    public function add()
    {   

        if($this->input->post('submit'))
        {
            $this->db->where('is_deleted','no');
            $arr_data = $this->master_model->getRecords('about_us');
            if(!empty($arr_data))
            {
                $this->session->set_flashdata('error_message'," Not Added. About Us are already added. You can add only one About Us.");
                redirect($this->module_url_path.'/index');
            }
            
            $this->form_validation->set_rules('about_us', 'About Us', 'required');
            $this->form_validation->set_rules('years_experiences', 'Years Experiences', 'required');
            $this->form_validation->set_rules('tour_packages', 'Tour Packages', 'required');
            $this->form_validation->set_rules('happy_customers', 'Happy Customers', 'required');
            $this->form_validation->set_rules('award_winning', 'Award Winning', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $about_us = $this->input->post('about_us');
                $years_experiences = $this->input->post('years_experiences'); 
                $tour_packages = $this->input->post('tour_packages'); 
                $happy_customers = $this->input->post('happy_customers'); 
                $award_winning = $this->input->post('award_winning');  
                
                $arr_insert = array(
                    'about_us'   =>   $about_us,
                    'years_experiences'   =>   $years_experiences,
                    'tour_packages'   =>   $tour_packages,
                    'happy_customers'   =>   $happy_customers,
                    'award_winning'   =>   $award_winning
                );
                
                $inserted_id = $this->master_model->insertRecord('about_us',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"About Us Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
        }

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('about_us');
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index');
            }   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['is_active'] = "no";
            }
            else
            {
                $arr_update['is_active'] = "yes";
            }
            
            if($this->master_model->updateRecord('about_us',$arr_update,array('id' => $id)))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
            }
            else
            {
             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
            }
        }
        else
        {
           $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');   
    }

    
    // Delete
    
    public function delete($id)
    {
        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('about_us');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            
            $arr_where = array("id" => $id);
                 
            if($this->master_model->deleteRecord('about_us',$arr_where))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
            }
            else
            {
                $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
            }
        }
        else
        {
           
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');  
    }
   
    // Edit - Get data for edit
    
    public function edit($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        else
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('about_us');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('about_us', 'About Us', 'required');
                $this->form_validation->set_rules('years_experiences', 'Years Experiences', 'required');
                $this->form_validation->set_rules('tour_packages', 'Tour Packages', 'required');
                $this->form_validation->set_rules('happy_customers', 'Happy Customers', 'required');
                $this->form_validation->set_rules('award_winning', 'Award Winning', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                   $about_us = trim($this->input->post('about_us'));
                   $years_experiences = trim($this->input->post('years_experiences'));
                   $tour_packages = trim($this->input->post('tour_packages'));
                   $happy_customers = trim($this->input->post('happy_customers'));
                   $award_winning = trim($this->input->post('award_winning'));
                   
                    $arr_update = array(
                        'about_us' => $about_us,
                        'years_experiences'   =>   $years_experiences,
                        'tour_packages'   =>   $tour_packages,
                        'happy_customers'   =>   $happy_customers,
                        'award_winning'   =>   $award_winning
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('about_us',$arr_update,$arr_where);
                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index');
                }   
            }
        }
         
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
}