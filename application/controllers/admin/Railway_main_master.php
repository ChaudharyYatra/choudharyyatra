<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Railway_main_master extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/railway_main_master";
        $this->module_title       = "Railway Main Master";
        $this->module_url_slug    = "railway_main_master";
        $this->module_view_folder = "railway_main_master/";
	}

	public function index()
	{  
        // $fields = "vehicle_cost_adding.*,vehicle_type.*,vehicle_cost_adding.id as vehicle_cost_adding_id,vehicle_cost_adding.is_active as vehicle_cost_adding_is_active";
        // $this->db->where('vehicle_cost_adding.is_deleted','no');
        // $this->db->where('vehicle_cost_adding.tour_creation_id',$id);
        // $this->db->join("vehicle_type", 'vehicle_cost_adding.vehicle_type=vehicle_type.id','left');
        // $arr_data = $this->master_model->getRecords('vehicle_cost_adding',array('vehicle_cost_adding.is_deleted'=>'no'),$fields);

        // $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $this->db->group_by('railway_main_master.train_no,railway_main_master.train_name');
        $arr_data = $this->master_model->getRecords('railway_main_master');
        // print_r($arr_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['arr_data2']        = $arr_data2;
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
                $train_no = $this->input->post('train_no');
                $train_name = $this->input->post('train_name');
                $train_start_from = $this->input->post('train_start_from');
                $train_date = $this->input->post('train_date');
                $train_type = implode(",", $this->input->post('train_type'));
                $running_days = implode(",", $this->input->post('running_days'));

                $place_name = $this->input->post('place_name');
                $arrival_time = $this->input->post('arrival_time');
                $departure_time = $this->input->post('departure_time');
                $day = $this->input->post('day');
                $kilometer = $this->input->post('kilometer');

                $arr_insert = array(
                    'train_no'   =>   $train_no,
                    'train_name'   =>   $train_name,
                    'train_start_from'   =>   $train_start_from,
                    'train_date'   =>   $train_date,
                    'train_type'   =>   $train_type,
                    'running_days'   =>   $running_days
                ); 
                $inserted_id = $this->master_model->insertRecord('railway_main_master',$arr_insert,true);
                $railway_main_master_id = $this->db->insert_id(); 

                $count = count($place_name);
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'place_name'   =>   $_POST["place_name"][$i],
                        'arrival_time'   =>   $_POST["arrival_time"][$i],
                        'departure_time'   =>   $_POST["departure_time"][$i],
                        'day'   =>   $_POST["day"][$i],
                        'kilometer'   =>   $_POST["kilometer"][$i],
                        'railway_main_master_insert_id'   =>   $railway_main_master_id
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_railway_main_master',$arr_insert,true);
                }
                    
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Railway Main Master Added Successfully.");
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
        $vehicle_type = $this->master_model->getRecords('vehicle_type');


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['vehicle_type']    = $vehicle_type;
        // $this->arr_view_data['tour_creation_id']    = $tour_creation_id;
        // $this->arr_view_data['tour_day']    = $tour_day;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


    // Active/Inactive
  public function active_inactive($id,$type)
  {
        $id=base64_decode($id);
      if($id!="" && ($type == "yes" || $type == "no") )
      {   
          $this->db->where('id',$id);
          $arr_data = $this->master_model->getRecords('railway_main_master');
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
          
          if($this->master_model->updateRecord('railway_main_master',$arr_update,array('id' => $id)))
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

   

    public function delete($id)
    {
        $decode_id=base64_decode($id);
        if($decode_id!='')
        {   
            $this->db->where('id',$decode_id);
            $arr_data = $this->master_model->getRecords('railway_main_master');
            // print_r($arr_data); die;

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $decode_id);
                 
            if($this->master_model->updateRecord('railway_main_master',$arr_update,$arr_where))
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
        // print_r($train_no); die;
        $decode_id=base64_decode($id);

        // print_r($decode_train_no); 
        // print_r($decode_train_name); die;

        if ($decode_id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($decode_id))
        {   
            $this->db->where('id',$decode_id);
            $this->db->group_by('railway_main_master.train_no,railway_main_master.train_name');
            $arr_data = $this->master_model->getRecords('railway_main_master');

            $this->db->where('railway_main_master_insert_id',$decode_id);
            $arr_data2 = $this->master_model->getRecords('add_more_railway_main_master');
            
            if($this->input->post('submit'))
            {
                $train_no = $this->input->post('train_no');
                $train_name = $this->input->post('train_name');
                $train_start_from = $this->input->post('train_start_from');
                $train_date = $this->input->post('train_date');
                $train_type = implode(",", $this->input->post('train_type'));
                $running_days = implode(",", $this->input->post('running_days'));

                $place_name = $this->input->post('place_name');
                $arrival_time = $this->input->post('arrival_time');
                $departure_time = $this->input->post('departure_time');
                $day = $this->input->post('day');
                $kilometer = $this->input->post('kilometer');

                $add_more_railway_main_master_id = $this->input->post('add_more_railway_main_master_id');
                // print_r($add_more_railway_main_master_id);

                    $arr_update = array(
                        'train_no'   =>   $train_no,
                        'train_name'   =>   $train_name,
                        'train_start_from'   =>   $train_start_from,
                        'train_date'   =>   $train_date,
                        'train_type'   =>   $train_type,
                        'running_days'   =>   $running_days
                    ); 
                    // print_r($decode_train_name); die;
                    $arr_where     = array("id" => $decode_id);
                    $inserted_id = $this->master_model->updateRecord('railway_main_master',$arr_update,$arr_where);

                $count = count($place_name);
                for($i=0;$i<$count;$i++)
                {
                    $arr_update = array(
                        'place_name'   =>   $_POST["place_name"][$i],
                        'arrival_time'   =>   $_POST["arrival_time"][$i],
                        'departure_time'   =>   $_POST["departure_time"][$i],
                        'day'   =>   $_POST["day"][$i],
                        'kilometer'   =>   $_POST["kilometer"][$i]
                    ); 
                    // print_r($decode_train_name); die;
                    $arr_where     = array("id" => $add_more_railway_main_master_id[$i]);
                    $inserted_id = $this->master_model->updateRecord('add_more_railway_main_master',$arr_update,$arr_where);
                }

                $add_place_name = $this->input->post('add_place_name');
                $add_arrival_time = $this->input->post('add_arrival_time');
                $add_departure_time = $this->input->post('add_departure_time');
                $add_day = $this->input->post('add_day');
                $add_kilometer = $this->input->post('add_kilometer');
                $railway_main_master_id = $this->input->post('railway_main_master_id');

                    $count = count($add_place_name);
                    // print_r($count); die;
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(
                    'place_name'   =>   $_POST["add_place_name"][$i],
                    'arrival_time'   =>   $_POST["add_arrival_time"][$i],
                    'departure_time'   =>   $_POST["add_departure_time"][$i],
                    'day'   =>   $_POST["add_day"][$i],
                    'kilometer'   =>   $_POST["add_kilometer"][$i],
                    'railway_main_master_insert_id' => $railway_main_master_id
                    
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_railway_main_master',$arr_insert,true);
                    }
                    if($inserted_id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                        redirect($this->module_url_path.'/index');
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
         
        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $vehicle_type = $this->master_model->getRecords('vehicle_type');


        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data2']        = $arr_data2;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        // $this->arr_view_data['vehicle_type']    = $vehicle_type;
        // $this->arr_view_data['id']    = $id;
        // $this->arr_view_data['tour_creation_id']    = $tour_creation_id;
        // $this->arr_view_data['role_type_id']    = $role_type_id;
        // $this->arr_view_data['tour_no_of_days']    = $tour_no_of_days;
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