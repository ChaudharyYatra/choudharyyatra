<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class State extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/state";
        $this->module_title       = "State";
        $this->module_url_slug    = "state_master";
        $this->module_view_folder = "state_master/";
	}

	public function index()
	{  
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('state');

        $fields = "state_table.*,country.country_name";
        $this->db->order_by('state_table.country_id','asc');        
        $this->db->where('state_table.is_deleted','no');  
        $this->db->where('state_table.state_name !=', '');      
        $this->db->join("country", 'state_table.country_id=country.id','left');
        $arr_data = $this->master_model->getRecords('state_table',array('state_table.is_deleted'=>'no'),$fields);
        // print_r($arr_data);

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
            $this->form_validation->set_rules('state_name', 'State Name', 'required');
            $this->form_validation->set_rules('country_id', 'Country Name', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $state_name = $this->input->post('state_name');
                $country_id = $this->input->post('country_id');
                $state_permit_rate = $this->input->post('state_permit_rate');
                $all_india_permit_rate = $this->input->post('all_india_permit_rate');
                $daily_tax_rate = $this->input->post('daily_tax_rate');
                $weekly_tax_rate = $this->input->post('weekly_tax_rate');
                $monthly_tax_rate = $this->input->post('monthly_tax_rate');
                $yearly_tax_rate = $this->input->post('yearly_tax_rate');
                $arr_insert = array(
                    'state_name'   =>   $state_name,
                    'country_id'   =>   $country_id,
                    'state_permit_rate'   =>   $state_permit_rate,
                    'all_india_permit_rate'   =>   $all_india_permit_rate,
                    'daily_tax_rate'   =>   $daily_tax_rate,
                    'weekly_tax_rate'   =>   $weekly_tax_rate,
                    'monthly_tax_rate'   =>   $monthly_tax_rate,
                    'yearly_tax_rate'   =>   $yearly_tax_rate
                );
                

                $this->db->where('state_name',$state_name);
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $state_exist_data = $this->master_model->getRecords('state_table');
                if(count($state_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"State".$state_name." Already Exist.");
                    redirect($this->module_url_path.'/add');
                }
                
                $inserted_id = $this->master_model->insertRecord('state_table',$arr_insert,true);
                $insertid = $this->db->insert_id();


                $vehicle_type = $this->input->post('vehicle_type');
                $tax_amount = $this->input->post('tax_amount');
                $how_many_days = $this->input->post('how_many_days');

                $count = count($vehicle_type);
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'vehicle_type'   =>   $_POST["vehicle_type"][$i],
                        'tax_amount'   =>   $_POST["tax_amount"][$i],
                        'how_many_days'   =>   $_POST["how_many_days"][$i],
                        'state_sigle_insert_id'  => $insertid
                    ); 
                    $inserted_id = $this->master_model->insertRecord('state_table',$arr_insert,true);
                }
                    
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Vehicle Brand Added Successfully.");
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
        $vehicle_type = $this->master_model->getRecords('vehicle_type');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $state_table = $this->master_model->getRecords('state_table');

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['country_name_data']    = $country_name_data;
        $this->arr_view_data['vehicle_type']    = $vehicle_type;
        $this->arr_view_data['state_table']    = $state_table;
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
            $arr_data = $this->master_model->getRecords('state_table');
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
            
            if($this->master_model->updateRecord('state_table',$arr_update,array('id' => $id)))
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
        if($id!='')
        {   
            $arr_where = "(id = $id OR state_sigle_insert_id = $id)";
            $arr_data = $this->master_model->getRecords('state_table');
            // print_r($arr_data); die;

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            // $arr_where = array("id" => $id,"state_sigle_insert_id" => $id);
                 
            if($this->master_model->updateRecord('state_table',$arr_update,$arr_where))
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
    
    public function edit($id,$state_name)
    {
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $this->db->where('state_name',$state_name);
            $arr_data = $this->master_model->getRecords('state_table');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('state_name', 'Vehicle Brand', 'required');
                $this->form_validation->set_rules('country_id', 'Country Name', 'required');
                $this->form_validation->set_rules('state_permit_rate', 'state_permit_rate', 'required');
                $this->form_validation->set_rules('all_india_permit_rate', 'all_india_permit_rate', 'required');
                $this->form_validation->set_rules('daily_tax_rate', 'daily_tax_rate', 'required');
                $this->form_validation->set_rules('weekly_tax_rate', 'weekly_tax_rate', 'required');
                $this->form_validation->set_rules('monthly_tax_rate', 'monthly_tax_rate', 'required');
                $this->form_validation->set_rules('yearly_tax_rate', 'yearly_tax_rate', 'required');

                // $this->form_validation->set_rules('vehicle_type', 'vehicle_type', 'required');
                // $this->form_validation->set_rules('tax_amount', 'tax_amount', 'required');
                // $this->form_validation->set_rules('how_many_days', 'how_many_days', 'required');

                if($this->form_validation->run() == TRUE)
                {
                    $state_name = $this->input->post('state_name');
                    $country_id = $this->input->post('country_id');
                    $state_permit_rate = $this->input->post('state_permit_rate');
                    $all_india_permit_rate = $this->input->post('all_india_permit_rate');
                    $daily_tax_rate = $this->input->post('daily_tax_rate');
                    $weekly_tax_rate = $this->input->post('weekly_tax_rate');
                    $monthly_tax_rate = $this->input->post('monthly_tax_rate');
                    $yearly_tax_rate = $this->input->post('yearly_tax_rate');
                    $insert_single_add_more_id = $this->input->post('insert_single_add_more_id');
                    // print_r($insert_single_add_more_id); die;

                    $this->db->where('state_name',$state_name);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $bus_master_exist_data = $this->master_model->getRecords('state_table');

                    if(count($bus_master_exist_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"state".$state_name." Already Exist.");
                        redirect($this->module_url_path.'/add');
                    }

                    $arr_update_data = array(
                    'state_name'   =>   $state_name,
                    'country_id'   =>   $country_id,
                    'state_permit_rate'   =>   $state_permit_rate,
                    'all_india_permit_rate'   =>   $all_india_permit_rate,
                    'daily_tax_rate'   =>   $daily_tax_rate,
                    'weekly_tax_rate'   =>   $weekly_tax_rate,
                    'monthly_tax_rate'   =>   $monthly_tax_rate,
                    'yearly_tax_rate'   =>   $yearly_tax_rate
                    
                    );
                    $arr_where_data     = array("id" => $insert_single_add_more_id);
                    $inserted_id = $this->master_model->updateRecord('state_table',$arr_update_data,$arr_where_data);

                    $insert_add_more_id = $this->input->post('insert_add_more_id');
                    $vehicle_type = $this->input->post('vehicle_type');
                    $tax_amount = $this->input->post('tax_amount');
                    $how_many_days = $this->input->post('how_many_days');

                    $count = count($vehicle_type);
                    for($i=0;$i<$count;$i++)
                    {
                        $arr_insert = array(
                            'vehicle_type'   =>   $_POST["vehicle_type"][$i],
                            'tax_amount'   =>   $_POST["tax_amount"][$i],
                            'how_many_days'   =>   $_POST["how_many_days"][$i]
                        ); 
                        $arr_where     = array("id" => $insert_add_more_id);
                    $inserted_id  = $this->master_model->updateRecord('state_table',$arr_insert,$arr_where);
                    }



                    // $insert_add_more_id = $this->input->post('insert_add_more_id');
                    $edit_vehicle_type = $this->input->post('edit_vehicle_type');
                    $edit_tax_amount = $this->input->post('edit_tax_amount');
                    $edit_how_many_days = $this->input->post('edit_how_many_days');

                    if($edit_vehicle_type != ''){
                    $count = count($edit_vehicle_type);
                    // print_r($count); die;
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(
                        'vehicle_type'   =>   $_POST["edit_vehicle_type"][$i],
                        'tax_amount'   =>   $_POST["edit_tax_amount"][$i],
                        'how_many_days'   =>   $_POST["edit_how_many_days"][$i],
                        'state_sigle_insert_id' => $insert_single_add_more_id
                    
                    ); 
                    $inserted_id = $this->master_model->insertRecord('state_table',$arr_insert,true);
                    }
                }

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

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('id', $id);
        $state_table_data = $this->master_model->getRecords('state_table');
        // print_r($state_table_data);
        // die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('state_sigle_insert_id', $id);
        $state_table_add_more = $this->master_model->getRecords('state_table');
        // print_r($state_table_add_more);
        // die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $vehicle_type = $this->master_model->getRecords('vehicle_type');

        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['country_data']    = $country_data;
        $this->arr_view_data['vehicle_type']    = $vehicle_type;
        $this->arr_view_data['state_table_add_more']    = $state_table_add_more;
        $this->arr_view_data['state_table_data']    = $state_table_data;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


    public function add_more_delete()
    {
        $id  = $this->input->post('request_id');

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('state_table');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('state_table',$arr_update,$arr_where))
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

        return true; 
    }
   
}