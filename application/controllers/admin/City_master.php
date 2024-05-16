<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class City_master extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/city_master";
        $this->module_title       = "City Master";
        $this->module_url_slug    = "city_master";
        $this->module_view_folder = "city_master/";
	}

	public function index()
	{  
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('state');

        $fields = "city.*,country.country_name,.state_table.state_name,district_table.district";
        $this->db->order_by('city.id','asc');        
        $this->db->where('city.is_deleted','no');        
        $this->db->join("country", 'city.country_id=country.id','left');
        $this->db->join("state_table", 'city.state_id=state_table.id','left');
        $this->db->join("district_table", 'city.district_id=district_table.id','left');
        $arr_data = $this->master_model->getRecords('city',array('city.is_deleted'=>'no'),$fields);

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
            $this->form_validation->set_rules('country_id', 'country id', 'required');
            $this->form_validation->set_rules('state_id', 'state id', 'required');
            $this->form_validation->set_rules('city_name', 'city name', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $country_id = $this->input->post('country_id');
                $state_id = $this->input->post('state_id');
                $district_id = $this->input->post('district_id');
                $city_name = $this->input->post('city_name');
                $arr_insert = array(
                    'country_id'   =>   $country_id,
                    'state_id'   =>   $state_id,
                    'district_id'   =>   $district_id,
                    'city_name'   =>   $city_name
                    
                );
                

                $this->db->where('city_name',$city_name);
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $city_exist_data = $this->master_model->getRecords('city');

                if(count($city_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"City".$city_name." Already Exist.");
                    redirect($this->module_url_path.'/add');
                }
                
                $inserted_id = $this->master_model->insertRecord('city',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"City Added Successfully.");
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
        $country_name_data = $this->master_model->getRecords('country');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $state_name_data = $this->master_model->getRecords('state_table');

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['country_name_data']    = $country_name_data;
        $this->arr_view_data['state_name_data']    = $state_name_data;
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
            $arr_data = $this->master_model->getRecords('city');
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
            
            if($this->master_model->updateRecord('city',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('city');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }

            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('city',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('city');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('country_id', 'country id', 'required');
                $this->form_validation->set_rules('state_id', 'state id', 'required');
                $this->form_validation->set_rules('city_name', 'city name', 'required');

                if($this->form_validation->run() == TRUE)
                {
                    $country_id = $this->input->post('country_id');
                    $state_id = $this->input->post('state_id');
                    $district_id = $this->input->post('district_id');
                    $city_name = $this->input->post('city_name');

                   $this->db->where('city_name',$city_name);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $city_exist_data = $this->master_model->getRecords('city');
                    if(count($city_exist_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"City".$city_name." Already Exist.");
                        redirect($this->module_url_path.'/add');
                    }

                   $arr_update = array(
                    'country_id'   =>   $country_id,
                    'state_id'   =>   $state_id,
                    'district_id'   =>   $district_id,
                    'city_name'   =>   $city_name
                    
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('city',$arr_update,$arr_where);
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
        $this->db->where('is_active','yes');
        $country_data = $this->master_model->getRecords('country');
        // print_r($country_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('id',$id);
        $city_arr_data = $this->master_model->getRecords('city');
        // print_r($city_arr_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $state_name_data = $this->master_model->getRecords('state_table');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $district_name_data = $this->master_model->getRecords('district_table');

        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['city_arr_data']        = $city_arr_data;
        $this->arr_view_data['state_name_data']        = $state_name_data;
        $this->arr_view_data['district_name_data']        = $district_name_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['country_data']    = $country_data;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function get_state(){ 
        // POST data 
        // $all_b=array();
       $state_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('country_id',$state_data);   
                        $data = $this->master_model->getRecords('state_table');
        echo json_encode($data);
    }

    public function get_district(){ 
        // POST data 
        // $all_b=array();
       $state_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('state_id',$state_data);   
                        $data = $this->master_model->getRecords('district_table');
        echo json_encode($data);
    }
   
}