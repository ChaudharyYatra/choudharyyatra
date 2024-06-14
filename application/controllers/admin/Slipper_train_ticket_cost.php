<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slipper_train_ticket_cost extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/slipper_train_ticket_cost";
        $this->module_title       = "Slipper Train Ticket Cost";
        $this->module_url_slug    = "slipper_train_ticket_cost";
        $this->module_view_folder = "slipper_train_ticket_cost/";
	}

	public function index($id,$did)
	{  
        $id=base64_decode($id);
        $did=base64_decode($did);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        } 

        $fields = "slipper_train_ticket_cost.*,railway_main_master.*,slipper_train_ticket_cost.id as slipper_train_ticket_cost_id,slipper_train_ticket_cost.is_active as slipper_train_ticket_cost_is_active";
        $this->db->where('slipper_train_ticket_cost.is_deleted','no');
        $this->db->where('slipper_train_ticket_cost.tour_creation_id',$id);
        $this->db->join("railway_main_master", 'slipper_train_ticket_cost.train_name_number=railway_main_master.id','left');
        $arr_data = $this->master_model->getRecords('slipper_train_ticket_cost',array('slipper_train_ticket_cost.is_deleted'=>'no'),$fields);

        // print_r($arr_data); die;
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $this->db->where('tour_creation_id',$id);
        // $arr_data = $this->master_model->getRecords('vehicle_cost_adding');

        // print_r($arr_data);

        $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $this->db->where('tour_number_of_days',$did);
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
    
    public function add($tour_creation_id,$tour_day)
    {   

        if($this->input->post('submit'))
        {

            $tour_cre_id=base64_decode($tour_creation_id);
            // print_r($tour_creation_id);
            $tour_days=base64_decode($tour_day);
            // print_r($tour_day);
            
                $train_name_number = $this->input->post('train_name_number');
                $slipper_ticket_cost = $this->input->post('slipper_ticket_cost');

                $count = count($train_name_number);
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'tour_creation_id'   =>   $tour_cre_id,
                        'tour_no_of_days'   =>   $tour_days,
                        'train_name_number'   =>   $_POST["train_name_number"][$i],
                        'slipper_ticket_cost'   =>   $_POST["slipper_ticket_cost"][$i]
                    ); 
                    $inserted_id = $this->master_model->insertRecord('slipper_train_ticket_cost',$arr_insert,true);
                }
                    
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Slipper train ticket cost Added Successfully.");
                    redirect($this->module_url_path.'/index/'.$tour_creation_id.'/'.$tour_day);
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            
        }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $railway_main_master = $this->master_model->getRecords('railway_main_master');
        // print_r($railway_main_master); die;


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['railway_main_master']    = $railway_main_master;
        $this->arr_view_data['tour_creation_id']    = $tour_creation_id;
        $this->arr_view_data['tour_day']    = $tour_day;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


    public function active_inactive($tour_creation_id,$tour_day,$id,$type)
    {
        $encoded_tour_creation_id = rtrim(base64_encode($tour_creation_id), '=');
        $encoded_tour_no_of_days = rtrim(base64_encode($tour_day), '=');

        if(is_numeric($id) && ($type == "yes" || $type == "no") )
        {  
            // print_r($id); die;
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('slipper_train_ticket_cost');
            // print_r($arr_data); die;
            
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
            // print_r($arr_update); die;
            // if($this->master_model->updateRecord('vehicle_cost_adding',$arr_update,array('id' => $id)))
            if($this->master_model->updateRecord('slipper_train_ticket_cost', $arr_update, array('slipper_train_ticket_cost.id' => $id)))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
                redirect($this->module_url_path.'/index/'.$encoded_tour_creation_id.'/'.$encoded_tour_no_of_days);
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
    public function delete($id,$tour_creation_id,$tour_day)
    {
        $encoded_tour_creation_id = rtrim(base64_encode($tour_creation_id), '=');
        $encoded_tour_no_of_days = rtrim(base64_encode($tour_day), '=');
        // print_r($id); die;
        if($id!='')
        {  
            $arr_where = "(id = $id)";
            $arr_data = $this->master_model->getRecords('slipper_train_ticket_cost');
            // print_r($arr_data); die;
            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            // $arr_where = array("id" => $id,"state_sigle_insert_id" => $id);
                 
            if($this->master_model->updateRecord('slipper_train_ticket_cost',$arr_update,$arr_where))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
                redirect($this->module_url_path.'/index/'.$encoded_tour_creation_id.'/'.$encoded_tour_no_of_days);
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

    public function edit($id,$tour_creation_id,$tour_no_of_days)
    {
        $encoded_tour_creation_id = rtrim(base64_encode($tour_creation_id), '=');
        $encoded_tour_no_of_days = rtrim(base64_encode($tour_no_of_days), '=');

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('slipper_train_ticket_cost');
            
            if($this->input->post('submit'))
            {
                
                    
                $train_name_number = $this->input->post('train_name_number');
                $slipper_ticket_cost = $this->input->post('slipper_ticket_cost');

                   $arr_update = array(
                        'train_name_number'   =>   $train_name_number,
                        'slipper_ticket_cost'   =>  $slipper_ticket_cost
                    );
                     $arr_where     = array("id" => $id);
                     $this->master_model->updateRecord('slipper_train_ticket_cost',$arr_update,$arr_where);

                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                        redirect($this->module_url_path.'/index/'.$encoded_tour_creation_id.'/'.$encoded_tour_no_of_days);
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
        $railway_main_master = $this->master_model->getRecords('railway_main_master');
        // print_r($railway_main_master); die;


        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['railway_main_master']    = $railway_main_master;
        $this->arr_view_data['id']    = $id;
        $this->arr_view_data['tour_creation_id']    = $tour_creation_id;
        // $this->arr_view_data['role_type_id']    = $role_type_id;
        $this->arr_view_data['tour_no_of_days']    = $tour_no_of_days;
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