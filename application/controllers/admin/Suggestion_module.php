<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Suggestion_module extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/suggestion_module";
        $this->module_title       = "Suggestion Module From Tour Manager";
        $this->module_url_slug    = "suggestion_module";
        $this->module_view_folder = "suggestion_module/";    
        // $this->load->library('upload');
	}

	public function index()
	{  
       
        // $name = $this->session->userdata('name');
        // $chy_admin_id = $this->session->userdata('chy_admin_id');

        $record = array();
        $fields = "suggestion_module.*,packages.tour_title,packages.tour_number,city.city_name";
        $this->db->order_by('suggestion_module.id','desc');
        $this->db->where('suggestion_module.is_deleted','no');
        $this->db->join("packages", 'suggestion_module.tour_number=packages.id','left');
        $this->db->join("city", 'suggestion_module.city=city.id','left');
        $suggestion_data = $this->master_model->getRecords('suggestion_module',array('suggestion_module.is_deleted'=>'no'),$fields);
        // print_r($suggestion_data); die;

        // $this->arr_view_data['name']       = $name;
        // $this->arr_view_data['front_id']        = $front_id;
        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['suggestion_data']        = $suggestion_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
    
    public function details($id)
    {
        // $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        // $iid = $this->session->userdata('tour_manager_sess_id'); 

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $record = array();
        $fields = "suggestion_module.*,packages.tour_title,packages.tour_number,package_type.package_type,city.city_name";
        $this->db->where('suggestion_module.is_deleted','no');
        $this->db->where('suggestion_module.id',$id);
        $this->db->join("package_type", 'suggestion_module.package_type=package_type.id','left');
        $this->db->join("city", 'suggestion_module.city=city.id','left');
        $this->db->join("packages", 'suggestion_module.tour_number=packages.id','left');
        $arr_data = $this->master_model->getRecords('suggestion_module',array('suggestion_module.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        // $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
    public function add_remark()
    {
         if($this->input->post('submit'))
         {
             $this->form_validation->set_rules('admin_remark', 'admin_remark', 'required');
             
             if($this->form_validation->run() == TRUE)
             { 
                
                 $suggestion_id  = $this->input->post('suggestion_id');
                 $admin_remark  = $this->input->post('admin_remark'); 
                 
                 $arr_update = array(
                     
                     'admin_remark'   =>   $admin_remark
                 );
                 $arr_where     = array("id" => $suggestion_id);
                $inserted_id = $this->master_model->updateRecord('suggestion_module',$arr_update,$arr_where);
 
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
             else{
                redirect($this->module_url_path.'/index');
            } 
         
 
 
    }
   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('suggestion_module');
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index');
            }   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['is_active'] = "no";
                $arr_update['status'] = "rejected";
            }
            else
            {
                $arr_update['is_active'] = "yes";
                $arr_update['status'] = "approved";
            }
            
            if($this->master_model->updateRecord('suggestion_module',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('suggestion_module');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('suggestion_module',$arr_update,$arr_where))
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
    
    // public function edit($id)
    // {
    //     $custom_agent_name = $this->session->userdata('custom_agent_name');
    //     $front_id = $this->session->userdata('custom_agent_sess_id');

	// 	$id=base64_decode($id);
    //     if ($id=='') 
    //     {
    //         $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //         redirect($this->module_url_path.'/index');
    //     }   

    //     else
    //     {   
    //         $this->db->where('id',$id);
    //         $arr_data = $this->master_model->getRecords('drop_to');
    //         if($this->input->post('submit'))
    //         {
    //             $this->form_validation->set_rules('drop_to_name', 'drop_to_name', 'required');
                
    //             if($this->form_validation->run() == TRUE)
    //             {
    //                $drop_to_name = trim($this->input->post('drop_to_name'));
                   
    //                 $this->db->where('drop_to_name',$drop_to_name);
    //                 $this->db->where('id!='.$id);
    //                 $this->db->where('is_deleted','no');
    //                 $drop_to_name_exist_data = $this->master_model->getRecords('drop_to');
    //                 if(count($drop_to_name_exist_data) > 0)
    //                 {
    //                     $this->session->set_flashdata('error_message',"Drop To From ".$drop_to_name." Already Exist.");
    //                     redirect($this->module_url_path.'/add');
    //                 }
                    
                    
    //                 $arr_update = array(
    //                     'drop_to_name' => $drop_to_name
    //                 );
    //                 $arr_where     = array("id" => $id);
    //                $this->master_model->updateRecord('drop_to',$arr_update,$arr_where);
    //                 if($id > 0)
    //                 {
    //                     $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
    //                 }
    //                 else
    //                 {
    //                     $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
    //                 }
    //                 redirect($this->module_url_path.'/index');
    //             }   
    //         }
    //     }
    //     $this->arr_view_data['custom_agent_name']        = $custom_agent_name;
    //     $this->arr_view_data['arr_data']        = $arr_data;
    //     $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
    //     $this->arr_view_data['module_title']    = $this->module_title;
    //     $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //     $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
    //     $this->load->view('custom_tour_agent/layout/agent_combo',$this->arr_view_data);
    // }
   
}