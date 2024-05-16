<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Live_agents extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/live_agents";
        $this->module_title       = "Agent";
        $this->module_url_slug    = "live_agents";
        $this->module_view_folder = "live_agent/";    
        
	}

	public function index()
	{
        $fields = "live_agents.*,live_department.department";		
        $this->db->order_by('live_agents.arrange_id','asc');        
        $this->db->where('live_department.is_deleted','no');        
        $this->db->join("live_department", 'live_agents.department=live_department.id','left');
        $arr_data = $this->master_model->getRecords('live_agents',array('live_agents.is_deleted'=>'no'),$fields);

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
            $this->form_validation->set_rules('department', 'Department', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('booking_center', 'Booking Center', 'required');
            $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
            $this->form_validation->set_rules('mobile_number2', 'Mobile Number2', 'required');
           
            
            if($this->form_validation->run() == TRUE)
            {              
                $department  = $this->input->post('department');
				$arrange_id  = $this->input->post('arrange_id');
                $booking_center        = trim($this->input->post('booking_center'));
                $city        = trim($this->input->post('city'));
                $mobile_number1 = trim($this->input->post('mobile_number1'));
                $mobile_number2 = trim($this->input->post('mobile_number2'));

                $arr_insert = array(
                    'department'   =>   $department,
					'arrange_id'   =>   $arrange_id,
                    'city'   =>   $city,
                    'booking_center'          => $booking_center,
                    'mobile_number1'          => $mobile_number1,
                    'mobile_number2'          => $mobile_number2
                );
                
                $inserted_id = $this->master_model->insertRecord('live_agents',$arr_insert,true);
                               
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
        }

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $department_data = $this->master_model->getRecords('live_department');

        $this->arr_view_data['action']          = 'add';
       
        $this->arr_view_data['department_data'] = $department_data;
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
            $arr_data = $this->master_model->getRecords('live_agents');
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
            
            if($this->master_model->updateRecord('live_agents',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('live_agents');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('live_agents',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('live_agents');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('department', 'Department', 'required');
                $this->form_validation->set_rules('city', 'City', 'required');
                $this->form_validation->set_rules('booking_center', 'Booking Center Name', 'required');
                $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
                $this->form_validation->set_rules('mobile_number2', 'Mobile Number2', 'required');
                if($this->form_validation->run() == TRUE)
                {             
                              
                 $department  = $this->input->post('department');
				 $arrange_id  = $this->input->post('arrange_id');
                 $city  = $this->input->post('city');
                 $booking_center        = trim($this->input->post('booking_center'));
                 $mobile_number1 = trim($this->input->post('mobile_number1'));
                 $mobile_number2 = trim($this->input->post('mobile_number2'));
                
                $arr_update = array(
                    'department'   =>    $department,
					'arrange_id'   =>    $arrange_id,
                    'city'   =>    $city,
                    'booking_center'          => $booking_center,
                    'mobile_number1'          =>  $mobile_number1,
                    'mobile_number2'          => $mobile_number2
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('live_agents',$arr_update,$arr_where);
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
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $department_data = $this->master_model->getRecords('live_department');
        
        $this->arr_view_data['department_data']        = $department_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    // Get Details of Package
    public function details($id)
    {
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "live_agents.*,live_department.department";
        $this->db->where('live_agents.id',$id);
        $this->db->join("live_department", 'live_agents.department=live_department.id','left');
        $arr_data = $this->master_model->getRecords('live_agents',array('live_agents.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
   
}