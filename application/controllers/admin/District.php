<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class District extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/district";
        $this->module_title       = "District Master";
        $this->module_url_slug    = "district";
        $this->module_view_folder = "district/";
	}

	public function index()
	{  
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('state');

        $fields = "district_table.*,country.country_name,state_table.state_name";
        $this->db->order_by('district_table.id','asc');        
        $this->db->where('district_table.is_deleted','no');        
        $this->db->join("country", 'district_table.country_id=country.id','left');
        $this->db->join("state_table", 'district_table.state_id=state_table.id','left');
        $arr_data = $this->master_model->getRecords('district_table',array('district_table.is_deleted'=>'no'),$fields);

        // $fields = "district_table.*,country.country_name,.state_table.state_name";
        // $this->db->order_by('district_table.id','asc');        
        // $this->db->where('district_table.is_deleted','no');        
        // $this->db->join("country", 'district_table.country_id=country.id','left');
        // $this->db->join("state_table", 'district_table.state_id=state_table.id','left');
        // $arr_data = $this->master_model->getRecords('district_table',array('district_table.is_deleted'=>'no'),$fields);

    $start = $this->input->post('start'); // Starting index of records
    $length = $this->input->post('length'); // Number of records per page
    $draw = $this->input->post('draw'); // DataTables draw counter

    // Fields you want to select 
    $fields = "district_table.*,country.country_name,state_table.state_name";
    $this->db->order_by('district_table.id', 'asc');
    $this->db->where('district_table.is_deleted', 'no');
    $this->db->join("country", 'district_table.country_id=country.id', 'left');
    $this->db->join("state_table", 'district_table.state_id=state_table.id', 'left');
    // Count the total number of records (without filtering)
    // $arr_data = $this->master_model->getRecords('district_table',array('district_table.is_deleted'=>'no'),$fields);
//    print_r($arr_data); die;
    $totalRecords = $this->db->count_all_results('district_table');
    // print_r($totalRecords); die;

    // Apply limit and offset for paging
    $this->db->select($fields);
    $this->db->order_by('district_table.id', 'asc');
    $this->db->where('district_table.is_deleted', 'no');
    $this->db->join("country", 'district_table.country_id=country.id', 'left');
    $this->db->join("state_table", 'district_table.state_id=state_table.id', 'left');
    $this->db->limit($length, $start);
    $arr_data = $this->db->get('district_table')->result_array();
    // print_r($arr_data); die;

    // print_r($arr_data); die;

    // Prepare the response for DataTables
    $response = array(
        "draw" => intval($draw),
        "recordsTotal" => $totalRecords, // Total records (without filtering)
        "recordsFiltered" => $totalRecords, // Total records (with filtering; same as total in this case)
        "data" => $arr_data, // Data for the current page
    );

    // Send the JSON response to DataTables
    // echo json_encode($response);

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
            $this->form_validation->set_rules('district', 'district', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $country_id = $this->input->post('country_id');
                $state_id = $this->input->post('state_id');
                $district = $this->input->post('district');
                $arr_insert = array(
                    'country_id'   =>   $country_id,
                    'state_id'   =>   $state_id,
                    'district'   =>   $district
                );

                $this->db->where('district',$district);
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $city_exist_data = $this->master_model->getRecords('district_table');
                if(count($city_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"district".$city_name." Already Exist.");
                    redirect($this->module_url_path.'/add');
                }
                
                $inserted_id = $this->master_model->insertRecord('district_table',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"District Added Successfully.");
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
            $arr_data = $this->master_model->getRecords('district_table');
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
            
            if($this->master_model->updateRecord('district_table',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('district_table');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }

            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('district_table',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('district_table');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('country_id', 'country id', 'required');
                $this->form_validation->set_rules('state_id', 'state id', 'required');
                $this->form_validation->set_rules('district', 'district name', 'required');

                if($this->form_validation->run() == TRUE)
                {
                    $country_id = $this->input->post('country_id');
                    $state_id = $this->input->post('state_id');
                    $district = $this->input->post('district');

                    $this->db->where('district',$district);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $city_exist_data = $this->master_model->getRecords('district_table');
                    if(count($city_exist_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"district".$district." Already Exist.");
                        redirect($this->module_url_path.'/add');
                    }

                   $arr_update = array(
                    'country_id'   =>   $country_id,
                    'state_id'   =>   $state_id,
                    'district'   =>   $district
                    
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('district_table',$arr_update,$arr_where);
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
        $city_arr_data = $this->master_model->getRecords('district_table');
        // print_r($city_arr_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $state_name_data = $this->master_model->getRecords('state_table');

        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['city_arr_data']        = $city_arr_data;
        $this->arr_view_data['state_name_data']        = $state_name_data;
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
   
}
