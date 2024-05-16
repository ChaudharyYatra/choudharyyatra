<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tour_details_data extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/tour_details_data";
        $this->module_url_path_list =  base_url().$this->config->item('admin_panel_slug')."/tour_details_data";
        $this->module_title       = "Tour Details";
        $this->module_url_slug    = "tour_details_data";
        $this->module_view_folder = "tour_details_data/";    
        // $this->load->library('upload');
	}

	public function index()
	{  

        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('tour_details_data');

        
        $record = array();
        $fields = "tour_details_data.*,packages.id,packages.tour_number as tno,tour_details_data.id as tour_d_id";
        $this->db->order_by('tour_details_data.id','desc');
        $this->db->where('tour_details_data.is_deleted','no');
        $this->db->join("packages", 'tour_details_data.tour_number=packages.id','left');
        $arr_data = $this->master_model->getRecords('tour_details_data',array('tour_details_data.is_deleted'=>'no'),$fields);


        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
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
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
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

    public function getTourname(){ 
        // POST data 
        $tour_name = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$tour_name);
                $data = $this->master_model->getRecord('packages');
        // print_r($data); 
        echo json_encode($data); 
        
      }

      public function getTourdays(){ 
        // POST data 
        $tour_name = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$tour_name);
                $data = $this->master_model->getRecord('packages');
        // print_r($data); 
        echo json_encode($data); 
        
      }


        // Active/Inactive
  
  public function active_inactive($id,$type)
  {
      if(is_numeric($id) && ($type == "yes" || $type == "no") )
      {   
          $this->db->where('id',$id);
          $arr_data = $this->master_model->getRecords('tour_details_data');
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
          
          if($this->master_model->updateRecord('tour_details_data',$arr_update,array('id' => $id)))
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
          
          if(is_numeric($id))
          {   
              $this->db->where('id',$id);
              $arr_data = $this->master_model->getRecords('tour_details_data');
  
              if(empty($arr_data))
              {
                  $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                  redirect($this->module_url_path);
              }
              $arr_update = array('is_deleted' => 'yes');
              $arr_where = array("id" => $id);
                   
              if($this->master_model->updateRecord('tour_details_data',$arr_update,$arr_where))
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
	//    $id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        else
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('tour_details_data');
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

                    $arr_update = array(
                        'tour_number'   =>   $tour_number,
                        'tour_name'   =>   $tour_name,
                        'tour_days'   =>   $tour_days,
                        'tour_start_date'   =>   $tour_start_date,
                        'tour_end_date'   =>   $tour_end_date,
                        'inclusion'   =>   $inclusion,
                        'terms_conditions'   =>   $terms_conditions
                    );

                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('tour_details_data',$arr_update,$arr_where);
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

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $packages_data = $this->master_model->getRecords('packages');
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['packages_data']        = $packages_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


   
}