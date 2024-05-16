<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Core_features extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table

	   
        // $this->user_id            =  $this->session->userdata('nabcons_id');
        // $this->name               =  $this->session->userdata('nabcons_username');
        // $this->ip                 =  $this->input->ip_address();
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/core_features";
        $this->module_title       = "Core Features";
        $this->module_url_slug    = "core_features";
        $this->module_view_folder = "core_features/";    
        $this->load->library('upload');
	}

	public function index()
	{
	    //$user_role = $this->session->userdata('nabcons_user_role');
        //$front_id = $this->session->userdata('nabcons_emp_id');
        
        
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('core_features');
        
        // $this->arr_view_data['user_role']       = $user_role;
        // $this->arr_view_data['front_id']        = $front_id;
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

        // $nabcons_emp_id = $this->session->userdata('nabcons_emp_id');
        // $user_role = $this->session->userdata('nabcons_user_role');
       
        if($this->input->post('submit'))
        {
            $this->db->where('is_deleted','no');
            $arr_data = $this->master_model->getRecords('core_features');
            if(!empty($arr_data))
            {
                $this->session->set_flashdata('error_message'," Not Added. Core Features are already added. You can add only one Core Features.");
                redirect($this->module_url_path.'/index');
            }
                
            $this->form_validation->set_rules('feature_one_title', 'Feature One Title', 'required');
            $this->form_validation->set_rules('feature_one_description', 'Feature One Description', 'required');
            $this->form_validation->set_rules('feature_two_title', 'Feature Two Title', 'required');
            $this->form_validation->set_rules('feature_two_description', 'Feature Two Description', 'required');
            $this->form_validation->set_rules('feature_three_title', 'Feature Three Title', 'required');
            $this->form_validation->set_rules('feature_three_description', 'Feature Three Description', 'required');
            $this->form_validation->set_rules('feature_four_title', 'Feature Four Title', 'required');
            $this->form_validation->set_rules('feature_four_description', 'Feature Four Description', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $Feature_one_title  = $this->input->post('feature_one_title'); 
                $Feature_one_description        = trim($this->input->post('feature_one_description'));
                $Feature_two_title        = trim($this->input->post('feature_two_title'));
                $Feature_two_description = trim($this->input->post('feature_two_description'));
                $Feature_three_title = trim($this->input->post('feature_three_title'));
                $Feature_three_description = trim($this->input->post('feature_three_description'));
                $Feature_four_title = trim($this->input->post('feature_four_title'));
                $Feature_four_description = trim($this->input->post('feature_four_description'));
                $arr_insert = array(
                    'feature_one_title'   =>   $Feature_one_title,
                    'feature_one_description'          => $Feature_one_description,
                    'feature_two_title'          => $Feature_two_title,
                    'feature_two_description'          => $Feature_two_description,
                    'feature_three_title'          => $Feature_three_title,
                    'feature_three_description'          => $Feature_three_description,
                    'feature_four_title'          => $Feature_four_title,
                    'feature_four_description'        => $Feature_four_description                    
                );
                
                $inserted_id = $this->master_model->insertRecord('core_features',$arr_insert,true);
                               
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

        //$img_id = $this->master_model->next_id("id", "nabcons_blogs");
        //$this->arr_view_data['img']          = $img_id;
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $core_features_data = $this->master_model->getRecords('core_features');

        $this->arr_view_data['action']          = 'add';
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['core_features_data'] = $core_features_data;
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
            $arr_data = $this->master_model->getRecords('core_features');
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
            
            if($this->master_model->updateRecord('core_features',$arr_update,array('id' => $id)))
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
                $arr_data = $this->master_model->getRecords('core_features');
    
                if(empty($arr_data))
                {
                    $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                    redirect($this->module_url_path);
                }
                $arr_update = array('is_deleted' => 'yes');
                $arr_where = array("id" => $id);
                     
                if($this->master_model->updateRecord('core_features',$arr_update,$arr_where))
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
                $arr_data = $this->master_model->getRecords('core_features');
                if($this->input->post('submit'))
                {
                    $this->form_validation->set_rules('feature_one_title', 'Feature One Title', 'required');
                    $this->form_validation->set_rules('feature_one_description', 'Feature One Description', 'required');
                    $this->form_validation->set_rules('feature_two_title', 'Feature Two Title', 'required');
                    $this->form_validation->set_rules('feature_two_description', 'Feature Two Description', 'required');
                    $this->form_validation->set_rules('feature_three_title', 'Feature Three Title', 'required');
                    $this->form_validation->set_rules('feature_three_description', 'Feature Three Description', 'required');
                    $this->form_validation->set_rules('feature_four_title', 'Feature Four Title', 'required');
                    $this->form_validation->set_rules('feature_four_description', 'Feature Four Description', 'required');
                    
                   
                    
                    $feature_one_title  = $this->input->post('feature_one_title'); 
                    $feature_one_description        = trim($this->input->post('feature_one_description'));
                    $feature_two_title        = trim($this->input->post('feature_two_title'));
                    $feature_two_description = trim($this->input->post('feature_two_description'));
                    $feature_three_title = trim($this->input->post('feature_three_title'));
                    $feature_three_description = trim($this->input->post('feature_three_description'));
                    $feature_four_title = trim($this->input->post('feature_four_title'));
                    $feature_four_description = trim($this->input->post('feature_four_description'));
                    $arr_update = array(
                        'feature_one_title'          =>   $feature_one_title,
                        'feature_one_description'    => $feature_one_description,
                        'feature_two_title'          => $feature_two_title,
                        'feature_two_description'    => $feature_two_description,
                        'feature_three_title'         => $feature_three_title,
                        'feature_three_description'   => $feature_three_description,
                        'feature_four_title'          => $feature_four_title,
                        'feature_four_description'    => $feature_four_description
                    );
                    
                        $arr_where     = array("id" => $id);
                        $this->master_model->updateRecord('core_features',$arr_update,$arr_where);
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
          
            
            $this->db->order_by('id','desc');
            $this->db->where('is_deleted','no');
            $core_features_data = $this->master_model->getRecords('core_features');
            
            $this->arr_view_data['core_features_data']     = $core_features_data;
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
            
            $fields = "core_features.*";
            $arr_data = $this->master_model->getRecords('core_features',array('core_features.is_deleted'=>'no','core_features.id'=>$id),$fields);
            
            $this->arr_view_data['arr_data']        = $arr_data;
            $this->arr_view_data['page_title']      = $this->module_title." Details ";
            $this->arr_view_data['module_title']    = $this->module_title;
            $this->arr_view_data['module_url_path'] = $this->module_url_path;
            $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
            $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        }
    
   
}