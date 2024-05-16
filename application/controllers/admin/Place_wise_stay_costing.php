<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Place_wise_stay_costing extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/place_wise_stay_costing";
        $this->module_url_path_list =  base_url().$this->config->item('admin_panel_slug')."/place_wise_stay_costing";
        $this->module_title       = "Place Wise Stay Costing";
        $this->module_url_slug    = "place_wise_stay_costing";
        $this->module_view_folder = "place_wise_stay_costing/";    
        // $this->load->library('upload');
	}

	public function index()
	{  
        $fields = "place_wise_stay_costing.*,state.state_name,places_master.place_name";
        $this->db->order_by('place_wise_stay_costing.id','desc');        
        $this->db->where('place_wise_stay_costing.is_deleted','no');        
        $this->db->join("state", 'place_wise_stay_costing.state_name=state.id','left');
        $this->db->join("places_master", 'place_wise_stay_costing.place_name=places_master.id','left');
        $arr_data = $this->master_model->getRecords('place_wise_stay_costing',array('place_wise_stay_costing.is_deleted'=>'no'),$fields);
        


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
            
            $this->form_validation->set_rules('state_name', 'state_name', 'required');
            $this->form_validation->set_rules('place_name', 'place_name', 'required');
            $this->form_validation->set_rules('extra_city_expences', 'extra_city_expences', 'required');
            $this->form_validation->set_rules('hotel_expences', 'hotel_expences', 'required');
            $this->form_validation->set_rules('lodge_expences', 'lodge_expences', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $this->db->where('is_active','yes');
                $place_wise_stay_costing_check = $this->master_model->getRecords('place_wise_stay_costing',array('is_deleted'=>'no','place_name'=>trim($this->input->post('place_name'))));
                if(count($place_wise_stay_costing_check)==0){

                $state_name = $this->input->post('state_name'); 
                $place_name = $this->input->post('place_name');  
                $extra_city_expences = $this->input->post('extra_city_expences');  
                $hotel_expences = $this->input->post('hotel_expences');  
                $lodge_expences = $this->input->post('lodge_expences');  

                $arr_insert = array(
                    'state_name'   =>   $state_name,
                    'place_name'   =>   $place_name,
                    'extra_city_expences'   =>   $extra_city_expences,
                    'hotel_expences'   =>   $hotel_expences,
                    'lodge_expences'   =>   $lodge_expences
                );
                
                $inserted_id = $this->master_model->insertRecord('place_wise_stay_costing',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," place wise stay costing Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
            else{
                $this->session->set_flashdata('error_message'," This place already exist.");
            }  
        }
        }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $state_data = $this->master_model->getRecords('state');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $places_master_data = $this->master_model->getRecords('places_master');


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['state_data'] = $state_data;
        $this->arr_view_data['places_master_data'] = $places_master_data;
        //$this->arr_view_data['user_role']       = $user_role; 
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
            $arr_data = $this->master_model->getRecords('place_wise_stay_costing');
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
            
            if($this->master_model->updateRecord('place_wise_stay_costing',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('place_wise_stay_costing');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('place_wise_stay_costing',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('place_wise_stay_costing');
            // print_r($arr_data ); die;
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('state_name', 'state_name', 'required');
                $this->form_validation->set_rules('place_name', 'place_name', 'required');
                $this->form_validation->set_rules('extra_city_expences', 'extra_city_expences', 'required');
                $this->form_validation->set_rules('hotel_expences', 'hotel_expences', 'required');
                $this->form_validation->set_rules('lodge_expences', 'lodge_expences', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                    $this->db->where('id!=',$id);
                    $this->db->where('is_active','yes');
                    $place_wise_stay_costing_check = $this->master_model->getRecords('place_wise_stay_costing',array('is_deleted'=>'no','place_name'=>trim($this->input->post('place_name'))));
                    if(count($place_wise_stay_costing_check)==0){

                    $state_name = $this->input->post('state_name'); 
                    $place_name = $this->input->post('place_name'); 
                    $extra_city_expences = $this->input->post('extra_city_expences');  
                    $hotel_expences = $this->input->post('hotel_expences');  
                    $lodge_expences = $this->input->post('lodge_expences');
                    
                    
                    $arr_update = array(
                        'state_name'   =>   $state_name,
                        'place_name'   =>   $place_name,
                        'extra_city_expences'   =>   $extra_city_expences,
                        'hotel_expences'   =>   $hotel_expences,
                        'lodge_expences'   =>   $lodge_expences
                    );

                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('place_wise_stay_costing',$arr_update,$arr_where);
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
                else{
                    $this->session->set_flashdata('error_message'," This place already exist.");
                }  
                }
            }
        }
       

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $state_data = $this->master_model->getRecords('state');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $places_master_data = $this->master_model->getRecords('places_master');
         
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['state_data'] = $state_data;
        $this->arr_view_data['places_master_data'] = $places_master_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function getplace(){ 
        // POST data 
        $place_name = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('state_name',$place_name);
                $data = $this->master_model->getRecords('places_master');
        
        echo json_encode($data); 
      }
   
}