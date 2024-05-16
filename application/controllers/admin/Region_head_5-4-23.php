<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Region_head extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/region_head";
        $this->module_url_path_list =  base_url().$this->config->item('admin_panel_slug')."/regionwise_enq_list";
        $this->module_title       = "Region Head Master";
        $this->module_url_slug    = "region_head";
        $this->module_view_folder = "region_head/";    
        // $this->load->library('upload');
	}

	public function index()
	{  
        $fields = "region_head.*,agent.booking_center,agent.password as a_password,department.department,agent.id as a_id";
        $this->db->order_by('region_head.id','desc');        
        $this->db->where('department.is_deleted','no');        
        $this->db->join("department", 'region_head.agent_region=department.id','left');
        $this->db->join("agent", 'agent.id=region_head.agent_center','left');
        $arr_data = $this->master_model->getRecords('region_head',array('region_head.is_deleted'=>'no'),$fields);
        


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

        // $nabcons_emp_id = $this->session->userdata('nabcons_emp_id');
        // $user_role = $this->session->userdata('nabcons_user_role');
       
        if($this->input->post('submit'))
        {
            
            $this->form_validation->set_rules('agent_region', 'agent_region', 'required');
            $this->form_validation->set_rules('agent_center', 'agent_center', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
            $this->form_validation->set_rules('agent_name', 'agent_name', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $agent_region = $this->input->post('agent_region'); 
                $agent_center = $this->input->post('agent_center'); 
                $password = $this->input->post('password'); 
                $mobile_number = $this->input->post('mobile_number'); 
                $agent_name = $this->input->post('agent_name'); 

                $arr_insert = array(
                    'agent_region'   =>   $agent_region,
                    'agent_center'   =>   $agent_center,
                    'mobile_number'   =>   $mobile_number,
                    'agent_name'   =>   $agent_name,
                    'password'   =>   $password
                );
                
                $inserted_id = $this->master_model->insertRecord('region_head',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," Region Head Login Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
        }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $department_data = $this->master_model->getRecords('department');


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['department_data'] = $department_data;
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function getAgent(){ 
        // POST data 
        $agent_region = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('department',$agent_region);
                $data = $this->master_model->getRecords('agent');
        
        echo json_encode($data); 
      }

      public function getAgentno(){ 
        // POST data 
        $agent_center = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$agent_center);
                $data = $this->master_model->getRecord('agent');
        // print_r($data); 
        echo json_encode($data); 
        
      }


  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
        $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('region_head');
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
            
            if($this->master_model->updateRecord('region_head',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('region_head');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('region_head',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('region_head');
            // print_r($arr_data ); die;
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('agent_region', 'agent_region', 'required');
                $this->form_validation->set_rules('agent_center', 'agent_center', 'required');
                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
                $this->form_validation->set_rules('agent_name', 'agent_name', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                    $agent_region = $this->input->post('agent_region'); 
                    $agent_center = $this->input->post('agent_center'); 
                    $password = $this->input->post('password'); 
                    $mobile_number = $this->input->post('mobile_number'); 
                    $agent_name = $this->input->post('agent_name'); 
                    
                    
                    $arr_update = array(
                        'agent_region'   =>   $agent_region,
                        'agent_center'   =>   $agent_center,
                        'mobile_number'   =>   $mobile_number,
                        'agent_name'   =>   $agent_name,
                        'password'   =>   $password
                    );

                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('region_head',$arr_update,$arr_where);
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
       

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $department_data = $this->master_model->getRecords('department');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $agent_data = $this->master_model->getRecords('agent');
         
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['department_data'] = $department_data;
        $this->arr_view_data['agent_data'] = $agent_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
}