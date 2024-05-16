<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_operation extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/user_operation";
        $this->module_title       = "User Operation";
        $this->module_url_slug    = "user_operation";
        $this->module_view_folder = "user_operation/";    
        $this->load->library('upload');
	}

	public function index()
	{	    
        $fields = "supervision.*,role_type.role_name";
        // $this->db->order_by('agent.arrange_id','asc');        
        $this->db->where('supervision.is_deleted','no');        
        $this->db->join("role_type", 'supervision.role_type=role_type.id','left');
        $arr_data = $this->master_model->getRecords('supervision',array('supervision.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

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
        if(isset($_POST['submit']))
        {
            $this->form_validation->set_rules('role_type', 'role type', 'required');
            $this->form_validation->set_rules('supervision_name', 'supervision_name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required');
            $this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() == TRUE)
            {
            
                $role_type  = $this->input->post('role_type');
                $supervision_name  = trim($this->input->post('supervision_name'));
                $email = trim($this->input->post('email'));
                $mobile_number1 = trim($this->input->post('mobile_number1'));
                $mobile_number2 = trim($this->input->post('mobile_number2'));
				$password = trim($this->input->post('password'));

                $arr_insert = array(
                    'role_type' => $role_type,
                    'supervision_name' => $supervision_name,
                    'mobile_number1'   => $mobile_number1,
                    'mobile_number2'   => $mobile_number2,
                    'email'            => $email,
                    'password'         => $password
                );
                
                $inserted_id = $this->master_model->insertRecord('supervision',$arr_insert,true);
            }
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," User Operation Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }

                redirect($this->module_url_path.'/index');
            
        }   

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $role_type = $this->master_model->getRecords('role_type');

            $this->arr_view_data['action']          = 'add';       
            $this->arr_view_data['role_type']        = $role_type;
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
            $arr_data = $this->master_model->getRecords('supervision');
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
            
            if($this->master_model->updateRecord('supervision',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('supervision');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('supervision',$arr_update,$arr_where))
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
        }else{
           
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('supervision');
            if($this->input->post('submit'))
            {
				$this->form_validation->set_rules('supervision_name', 'supervision Name', 'required');
				$this->form_validation->set_rules('mobile_number1', 'Mobile Number1', 'required');
				$this->form_validation->set_rules('email', 'Email Address', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				
                if($this->form_validation->run() == TRUE)
                { 

                    $role_type  = $this->input->post('role_type');
                    $supervision_name    = trim($this->input->post('supervision_name'));
                    $mobile_number1 = trim($this->input->post('mobile_number1'));
                    $mobile_number2 = trim($this->input->post('mobile_number2'));
                    $email = trim($this->input->post('email'));
                    $password = trim($this->input->post('password'));
                
                $arr_update = array(
                    'role_type'          => $role_type,
                    'supervision_name'          => $supervision_name,
                    'mobile_number1'          =>  $mobile_number1,
                    'mobile_number2'          => $mobile_number2,
                    'email'          => $email,
                    'password'          => $password
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('supervision',$arr_update,$arr_where);
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
        $role_type = $this->master_model->getRecords('role_type');

        
        $this->arr_view_data['role_type']        = $role_type;
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
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "supervision.*";
        // $this->db->order_by('agent.arrange_id','asc');  
        $this->db->where('id',$id);        
        $this->db->where('supervision.is_deleted','no');        
        // $this->db->join("department", 'agent.department=department.id','left');
        $arr_data = $this->master_model->getRecords('supervision',array('supervision.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
    
	
   
}