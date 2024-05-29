<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_costing_details extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/vehicle_costing_details";
        $this->module_title       = "Vehicle Costing Details";
        $this->module_url_slug    = "vehicle_costing_details";
        $this->module_view_folder = "vehicle_costing_details/";
	}

	public function index($id)
	{  
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('state');

        $fields = "vehicle_costing_details.*,vehicle_type.vehicle_type_name,vehicle_costing_details.id as vehicle_costing_details_id,vehicle_costing_details.is_active as vehicle_costing_details_is_active";
        $this->db->where('vehicle_costing_details.is_deleted','no');  
        $this->db->where('tour_creation_id',$id);
        $this->db->join("vehicle_type", 'vehicle_costing_details.vehicle_type=vehicle_type.id','left');
        $arr_data = $this->master_model->getRecords('vehicle_costing_details',array('vehicle_costing_details.is_deleted'=>'no'),$fields);
        // print_r($arr_data);

        $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        // $this->db->where('tour_number_of_days',$did);
        $arr_data2 = $this->master_model->getRecords('tour_creation');

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data2']        = $arr_data2;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
    
    public function add($tour_creation_id)
    {   
        if($this->input->post('submit'))
        {
                $vehicle_type = $this->input->post('vehicle_type');
                $total_km = $this->input->post('total_km');
                $per_km_rate = $this->input->post('per_km_rate');
                $total_km_per_km_rate = $this->input->post('total_km_per_km_rate');

                $count = count($vehicle_type);
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'vehicle_type'   =>   $_POST["vehicle_type"][$i],
                        'total_km'   =>   $_POST["total_km"][$i],
                        'per_km_rate'   =>   $_POST["per_km_rate"][$i],
                        'total_km_per_km_rate'   =>   $_POST["total_km_per_km_rate"][$i],
                        'tour_creation_id'   =>   $tour_creation_id
                    ); 
                    $inserted_id = $this->master_model->insertRecord('vehicle_costing_details',$arr_insert,true);
                }
                    
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Vehicle Costing Details Added Successfully.");
                    redirect($this->module_url_path.'/index/'.$tour_creation_id);
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
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

        $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$tour_creation_id);
        $arr_data2 = $this->master_model->getRecords('tour_creation');
        // print_r($arr_data2); die;

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['country_name_data']    = $country_name_data;
        $this->arr_view_data['arr_data2']    = $arr_data2;
        $this->arr_view_data['vehicle_type']    = $vehicle_type;
        $this->arr_view_data['$tour_creation_id_encoded']    = $tour_creation_id_encoded;
        $this->arr_view_data['state_table']    = $state_table;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    
   
  // Active/Inactive
  
  public function active_inactive($tour_creation_id,$id,$type)
    {
        // print_r($tour_creation_id); die;
        if(is_numeric($id) && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('vehicle_costing_details');
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
            
            if($this->master_model->updateRecord('vehicle_costing_details',$arr_update,array('id' => $id)))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
                redirect($this->module_url_path.'/index/'.$tour_creation_id);
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
    public function delete($id,$tour_creation_id)
    {
        if($id!='')
        {   
            $arr_where = "(id = $id)";
            $arr_data = $this->master_model->getRecords('vehicle_costing_details');
            // print_r($arr_data); die;
            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            // $arr_where = array("id" => $id,"state_sigle_insert_id" => $id);
                 
            if($this->master_model->updateRecord('vehicle_costing_details',$arr_update,$arr_where))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
                redirect($this->module_url_path.'/index/'.$tour_creation_id); 
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
    
        // ====================================================
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
                    $arr_data = $this->master_model->getRecords('vehicle_costing_details');
                   
                    if($this->input->post('submit'))
                    { print_r('hiiii'); die;
                        $vehicle_type = $this->input->post('vehicle_type');
                        $total_km = $this->input->post('total_km');
                        $per_km_rate = $this->input->post('per_km_rate');
                        $total_km_per_km_rate = $this->input->post('total_km_per_km_rate');
                        // $vehicle_costing_details_id = $this->input->post('vehicle_costing_details_id');
                        // $tour_creation_id = $this->input->post('tour_creation_id');
         
                           $arr_update = array(
                            'vehicle_type'   =>   $vehicle_type,
                            'total_km'   =>   $total_km,
                            'per_km_rate'   =>   $per_km_rate,
                            'total_km_per_km_rate'   =>   $total_km_per_km_rate
                            );
                             $arr_where     = array("id" => $id);
                             $this->master_model->updateRecord('vehicle_cost_adding',$arr_update,$arr_where);
         
                            if($id > 0)
                            {
                                $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                                redirect($this->module_url_path.'/index/'.$tour_creation_id);
                            }
                            else
                            {
                                $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                            }
                            redirect($this->module_url_path.'/index');
                         
                    }
                }
                else
                {
                    $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                    redirect($this->module_url_path.'/index');
                }
                 
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $vehicle_type = $this->master_model->getRecords('vehicle_type');

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
                $this->db->where('id', $id);
                $vehicle_costing_details = $this->master_model->getRecords('vehicle_costing_details');
                // print_r($vehicle_costing_details);
                // die;
         
                $this->arr_view_data['arr_data']        = $arr_data;
                $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
                $this->arr_view_data['module_title']    = $this->module_title;
                $this->arr_view_data['vehicle_type']    = $vehicle_type;
                $this->arr_view_data['state_table_data']    = $state_table_data;
                $this->arr_view_data['vehicle_costing_details']    = $vehicle_costing_details;
                $this->arr_view_data['id']    = $id;
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
                $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
            }

    // public function edit($id)
    // {
        
    //     if ($id=='') 
    //     {
    //         $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //         redirect($this->module_url_path.'/index');
    //     }   
    //     if(is_numeric($id))
    //     {   
    //         $this->db->where('id',$id);
    //         $arr_data = $this->master_model->getRecords('vehicle_costing_details');
            
    //         if($this->input->post('submit'))
    //         {
    //             // print_r('hiiii'); die;
    //             $vehicle_type = $this->input->post('vehicle_type');
    //             $total_km = $this->input->post('total_km');
    //             $per_km_rate = $this->input->post('per_km_rate');
    //             $total_km_per_km_rate = $this->input->post('total_km_per_km_rate');
    //             // $vehicle_costing_details_id = $this->input->post('vehicle_costing_details_id');
    //             // $tour_creation_id = $this->input->post('tour_creation_id');

    //                 $arr_update_data = array(
    //                     'vehicle_type'   =>   $vehicle_type,
    //                     'total_km'   =>   $total_km,
    //                     'per_km_rate'   =>   $per_km_rate,
    //                     'total_km_per_km_rate'   =>   $total_km_per_km_rate
    //                 );
                    
    //                 $arr_where_data = array("id" => $id);
    //                 $inserted_id = $this->master_model->updateRecord('vehicle_costing_details',$arr_update_data,$arr_where_data);

    //                 if($inserted_id > 0)
    //                 {
    //                     $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
    //                 }
    //                 else
    //                 {
    //                     $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
    //                 }
    //                 redirect($this->module_url_path.'/index');
    //         }
    //     }
    //     else
    //     {
    //         $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //         redirect($this->module_url_path.'/index');
    //     }
    //     $this->db->order_by('id','desc');
    //     $this->db->where('is_deleted','no');
    //     $this->db->where('is_active','yes');
    //     $country_data = $this->master_model->getRecords('country');

    //     $this->db->order_by('id','desc');
    //     $this->db->where('is_deleted','no');
    //     $this->db->where('is_active','yes');
    //     $this->db->where('id', $id);
    //     $state_table_data = $this->master_model->getRecords('state_table');
    //     // print_r($state_table_data);
    //     // die;

    //     $this->db->order_by('id','desc');
    //     $this->db->where('is_deleted','no');
    //     $this->db->where('is_active','yes');
    //     $this->db->where('state_sigle_insert_id', $id);
    //     $state_table_add_more = $this->master_model->getRecords('state_table');
    //     // print_r($state_table_add_more);
    //     // die;

    //     $this->db->order_by('id','desc');
    //     $this->db->where('is_deleted','no');
    //     $this->db->where('is_active','yes');
    //     $this->db->where('id', $id);
    //     $vehicle_costing_details = $this->master_model->getRecords('vehicle_costing_details');
    //     // print_r($vehicle_costing_details);
    //     // die;

    //     $this->db->where('is_deleted','no');
    //     $this->db->where('is_active','yes');
    //     $vehicle_type = $this->master_model->getRecords('vehicle_type');

    //     $this->arr_view_data['arr_data']        = $arr_data;
    //     $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
    //     $this->arr_view_data['module_title']    = $this->module_title;
    //     $this->arr_view_data['country_data']    = $country_data;
    //     $this->arr_view_data['vehicle_type']    = $vehicle_type;
    //     $this->arr_view_data['vehicle_costing_details']    = $vehicle_costing_details;
    //     $this->arr_view_data['state_table_add_more']    = $state_table_add_more;
    //     $this->arr_view_data['state_table_data']    = $state_table_data;
    //     $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //     $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
    //     $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    // }

    // =========================================================================================

    public function add_more_delete()
    {
        $id  = $this->input->post('request_id');

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('vehicle_costing_details');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('vehicle_costing_details',$arr_update,$arr_where))
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