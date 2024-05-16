<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agent_percentage extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/agent_percentage";
        $this->module_title       = "Agent Percentage";
        $this->module_url_slug    = "agent_percentage";
        $this->module_view_folder = "agent_percentage/";
	}

	public function index()
	{  
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('agent_percentage');

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
            $this->form_validation->set_rules('from_amt', 'From Amount', 'required');
            $this->form_validation->set_rules('to_amt', 'To Amount', 'required');
            $this->form_validation->set_rules('from_date', 'From Date', 'required|is_unique[agent_percentage.from_date]');
            $this->form_validation->set_rules('to_date', 'To Date', 'required|is_unique[agent_percentage.to_date]');
            $this->form_validation->set_rules('agent_percentage', 'Agent Percentage', 'required');
            $this->form_validation->set_message('is_unique', '%s is already exists');
            
            if($this->form_validation->run() == TRUE)
            {
                $from_amt = $this->input->post('from_amt');
                $to_amt = $this->input->post('to_amt'); 
                $from_date = $this->input->post('from_date');
                $to_date = $this->input->post('to_date'); 
                $agent_percentage = $this->input->post('agent_percentage');
                $arr_insert = array(
                    'from_amt'   =>   $from_amt,
                    'to_amt'   =>   $to_amt,   
                    'from_date'   =>   $from_date,
                    'to_date'   =>   $to_date,    
                    'agent_percentage'   =>   $agent_percentage
                );
                
                $inserted_id = $this->master_model->insertRecord('agent_percentage',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Agent Percentage Added Successfully.");
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
        if(is_numeric($id) && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('agent_percentage');
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
            
            if($this->master_model->updateRecord('agent_percentage',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('agent_percentage');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('agent_percentage',$arr_update,$arr_where))
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
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('agent_percentage');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('from_amt', 'From Amount', 'required');
                $this->form_validation->set_rules('to_amt', 'To Amount', 'required');
                $this->form_validation->set_rules('from_date', 'From Date', 'required');
                $this->form_validation->set_rules('to_date', 'To Date', 'required');
                $this->form_validation->set_rules('agent_percentage', 'Agent Percentage', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                   $from_amt = trim($this->input->post('from_amt'));
                   $to_amt = trim($this->input->post('to_amt'));
                   $from_date = trim($this->input->post('from_date'));
                   $to_date = trim($this->input->post('to_date'));
                   $agent_percentage = trim($this->input->post('agent_percentage'));
                    $arr_update = array(
                        'from_amt' => $from_amt,
                        'to_amt'   =>   $to_amt,
                        'from_date' => $from_date,
                        'to_date'   =>   $to_date,
                        'agent_percentage' => $agent_percentage
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('agent_percentage',$arr_update,$arr_where);
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
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }
         
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
}