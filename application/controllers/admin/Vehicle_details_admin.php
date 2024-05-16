<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_details_admin extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/vehicle_details_admin";
        $this->module_url_path_dates    =  base_url().$this->config->item('admin_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('admin_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('admin_panel_slug')."/domestic_package_review";
        $this->module_title       = "Vehicle Details";
        $this->module_url_slug    = "vehicle_details_admin";
        $this->module_view_folder = "vehicle_details_admin/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $id = $this->session->userdata('vehicle_owner_sess_id');

        $fields = "vehicle_details_dummy.*,vehicle_type.vehicle_type_name,vehicle_fuel.vehicle_fuel_name,vehicle_brand.vehicle_brand_name,
        bus_type.bus_type";
        $this->db->where('vehicle_details_dummy.is_deleted','no');
        $this->db->where('vehicle_details_dummy.added_by','admin');
        $this->db->join("vehicle_type", 'vehicle_details_dummy.vehicle_type=vehicle_type.id','left');
        $this->db->join("vehicle_fuel", 'vehicle_details_dummy.fuel_type=vehicle_fuel.id','left');
        $this->db->join("vehicle_brand", 'vehicle_details_dummy.vehicle_brand=vehicle_brand.id','left');
        $this->db->join("bus_type", 'vehicle_details_dummy.vehicle_bus_type=bus_type.id','left');
        $arr_data = $this->master_model->getRecords('vehicle_details_dummy',array('vehicle_details_dummy.is_deleted'=>'no'),$fields);

        $this->arr_view_data['vehicle_ssession_owner_name']= $vehicle_ssession_owner_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
	

   
//   Active/Inactive
public function active_inactive($id,$type)
{
//   $id=base64_decode($id);
    if($id!='' && ($type == "yes" || $type == "no") )
    {   
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('vehicle_details');
        // print_r($arr_data);
        // die;
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
        
        if($this->master_model->updateRecord('vehicle_details',$arr_update,array('id' => $id)))
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


public function add_seat_preference($id) {
    $vehicle_ssession_owner_name = $this->session->userdata("vehicle_ssession_owner_name");
    $owenwr_id = $this->session->userdata("vehicle_owner_sess_id");
    $vehicle_id = base64_decode($id);

   

    $this->db->where('is_active','yes');
    $this->db->where('is_deleted','no');
    $this->db->where('vehicle_details_dummy.id',$vehicle_id);
    $vehicle_details_data = $this->master_model->getRecord('vehicle_details_dummy');
    
    $fields = "vehicle_seat_preference_dummy.*,vehicle_details_dummy.id as vehicle_id,vehicle_seat_preference_dummy.id as vpreference_id";
    $this->db->where('vehicle_seat_preference_dummy.is_active','yes');
    $this->db->where('vehicle_seat_preference_dummy.is_deleted','no');
    $this->db->where('vehicle_seat_preference_dummy.vehicle_id',$vehicle_id);
    $this->db->join("vehicle_details_dummy", 'vehicle_details_dummy.id=vehicle_seat_preference_dummy.vehicle_id','left');
    $seat_preference_data = $this->master_model->getRecord("vehicle_seat_preference_dummy", "", $fields);

    $selected_seats=array();

    if ($this->input->post("submit")) {
        
            $first_cls_seats_check = $this->input->post("first_cls_seats[]");
           if(!empty($first_cls_seats_check)){
            $first_cls_seats = implode(',',$first_cls_seats_check);
            $first_class_price = $this->input->post("first_class_price");
           }else{
            $first_cls_seats='';
            $first_class_price='';
           }

           $second_cls_seats_check = $this->input->post("second_cls_seats[]");
           if(!empty($second_cls_seats_check)){
            $second_cls_seats = implode(',',$second_cls_seats_check);
            $second_class_price = $this->input->post("second_class_price");
           }else{
            $second_cls_seats='';
            $second_class_price='';
           }

           $third_cls_seats_check = $this->input->post("third_cls_seats[]");
           if(!empty($third_cls_seats_check)){
            $third_cls_seats = implode(',',$third_cls_seats_check);
            $third_class_price = $this->input->post("third_class_price");
           }else{
            $third_cls_seats='';
            $third_class_price='';
           }

           $fourth_cls_seats_check = $this->input->post("fourth_cls_seats[]");
           if(!empty($fourth_cls_seats_check)){
            $fourth_cls_seats = implode(',',$fourth_cls_seats_check);
            $fourth_class_price = $this->input->post("fourth_class_price");
           }else{
            $fourth_cls_seats='';
            $fourth_class_price='';
           }

           $admin_hold_seats_check = $this->input->post("admin_hold_seats[]");
           if(!empty($admin_hold_seats_check)){
            $admin_hold_seats = implode(',',$admin_hold_seats_check);
           }else{
            $admin_hold_seats='';
           }

         
            $vehicle_id = $this->input->post("vehicle_id");
            $seat_capacity = $this->input->post("seat_capacity");
            $vpreference_id = $this->input->post("vpreference_id");
            $window_class_price = $this->input->post("window_class_price");

            $arr_insert = [
                "first_cls_seats" => $first_cls_seats,
                'first_class_price'=>$first_class_price,
                 "second_cls_seats" => $second_cls_seats,
                  "second_class_price" => $second_class_price,
                "third_cls_seats" => $third_cls_seats,
                  "third_class_price" => $third_class_price,
                  'window_class_price'=>$window_class_price,
                  "fourth_cls_seats" => $fourth_cls_seats,
                  'fourth_class_price'=>$fourth_class_price,
                  'admin_hold_seats'=>$admin_hold_seats,
                  'vehicle_id'=>$vehicle_id,
                  'total_seat_count'=>$seat_capacity,
                  ];

                  if(empty($seat_preference_data)){
                $inserted_id = $this->master_model->insertRecord("vehicle_seat_preference_dummy", $arr_insert, true,);
                  }else{
                    $arr_where     = array("id" => $vpreference_id);
                    $inserted_id =$this->master_model->updateRecord('vehicle_seat_preference_dummy',$arr_insert,$arr_where);
                  }
                  
            if ($inserted_id > 0) {
                $this->session->set_flashdata("success_message", ucfirst($this->module_title) . " Added Successfully.",);
                redirect($this->module_url_path . "/add_seat_preference/".$id);
            } else {
                $this->session->set_flashdata("error_message", "Something Went Wrong While Adding The " . ucfirst($this->module_title) . ".",);
            }
            redirect($this->module_url_path . "/add_seat_preference/".$id);
        // }
    }
    $this->arr_view_data["action"] = "add";
    $this->arr_view_data["page_title"] = " Add " . $this->module_title;
    $this->arr_view_data["page_title"] = " Add " . $this->module_title;
    $this->arr_view_data["module_title"] = $this->module_title;
    $this->arr_view_data['vehicle_details_data']        = $vehicle_details_data;
    $this->arr_view_data['seat_preference_data']        = $seat_preference_data;
    $this->arr_view_data['selected_seats']        = $selected_seats;

    $this->arr_view_data["module_url_path"] = $this->module_url_path;
    $this->arr_view_data["middle_content"] = $this->module_view_folder . "add_seat_preference";
    $this->load->view("admin/layout/admin_combo", $this->arr_view_data);
}

// Get Details of Package
public function details($id)
{
    $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
    $iid = $this->session->userdata('vehicle_owner_sess_id');

    $id=base64_decode($id);
    if ($id=='') 
    {
        $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        redirect($this->module_url_path.'/index');
    }   
    
    $this->db->order_by('id','ASC');
    $this->db->where('is_deleted','no');
    $this->db->where('is_active','yes');
    $vehicle_type = $this->master_model->getRecords('vehicle_type');

    $this->db->order_by('id','ASC');
    $this->db->where('is_deleted','no');
    $vehicle_fuel = $this->master_model->getRecords('vehicle_fuel');
    // print_r($package_type); die;

    $this->db->order_by('id','ASC');
    $this->db->where('is_deleted','no');
    $vehicle_brand = $this->master_model->getRecords('vehicle_brand');

    $fields = "vehicle_details.*,vehicle_type.vehicle_type_name,vehicle_fuel.vehicle_fuel_name,vehicle_brand.vehicle_brand_name,
    bus_type.bus_type";
    $this->db->where('vehicle_details.is_deleted','no');
    $this->db->where('vehicle_details.id',$id);
    $this->db->join("vehicle_type", 'vehicle_details.vehicle_type=vehicle_type.id','left');
    $this->db->join("vehicle_fuel", 'vehicle_details.fuel_type=vehicle_fuel.id','left');
    $this->db->join("vehicle_brand", 'vehicle_details.vehicle_brand=vehicle_brand.id','left');
    $this->db->join("bus_type", 'vehicle_details.vehicle_bus_type=bus_type.id','left');
    $arr_data = $this->master_model->getRecords('vehicle_details',array('vehicle_details.is_deleted'=>'no'),$fields);
    // print_r($arr_data); die;
    
    $this->arr_view_data['vehicle_ssession_owner_name']        = $vehicle_ssession_owner_name;
    $this->arr_view_data['vehicle_type']        = $vehicle_type;
    $this->arr_view_data['vehicle_fuel']        = $vehicle_fuel;
    $this->arr_view_data['vehicle_brand']        = $vehicle_brand;
    $this->arr_view_data['arr_data']        = $arr_data;
    $this->arr_view_data['page_title']      = $this->module_title." ";
    $this->arr_view_data['module_title']    = $this->module_title;
    $this->arr_view_data['module_url_path'] = $this->module_url_path;
    $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
    $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
}

 // Edit - Get data for edit
    
 public function add()
 {   
     $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
     $id = $this->session->userdata('vehicle_owner_sess_id');

     if($this->input->post('submit'))
     {
         $this->form_validation->set_rules('vehicle_bus_type', 'vehicle_bus_type', 'required');
         $this->form_validation->set_rules('vehicle_type', 'vehicle_type', 'required');
         $this->form_validation->set_rules('seat_capacity', 'seat_capacity', 'required');
         
         if($this->form_validation->run() == TRUE)
         {
            

             $vehicle_bus_type  = $this->input->post('vehicle_bus_type'); 
             $vehicle_type  = $this->input->post('vehicle_type'); 
             $seat_capacity = trim($this->input->post('seat_capacity'));
             $air_conditionar = trim($this->input->post('air_conditionar'));
             
             $arr_insert = array(
                 'vehicle_bus_type'   =>   $vehicle_bus_type,
                 'vehicle_type'   =>   $vehicle_type,
                 'seat_capacity'          => $seat_capacity,
                 'air_conditionar'          => $air_conditionar,
                 'status'                  => 'pending',
                 'added_by' => 'admin'
             );
             
             $inserted_id = $this->master_model->insertRecord('vehicle_details_dummy',$arr_insert,true);
                            
             if($inserted_id > 0)
             {
                 $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully. <br> Now visit choudhary yatra office with your original document and one xerox copy.");
                 redirect($this->module_url_path.'/index');
             }

             else
             {
                 $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
             }
             redirect($this->module_url_path.'/index');
         
     }
    
     }

     $this->db->order_by('id','ASC');
     $this->db->where('is_deleted','no');
     $this->db->where('is_active','yes');
     $bus_type = $this->master_model->getRecords('bus_type');

     $this->db->order_by('id','ASC');
     $this->db->where('is_deleted','no');
     $this->db->where('is_active','yes');
     $vehicle_type = $this->master_model->getRecords('vehicle_type');

     $this->db->order_by('id','ASC');
     $this->db->where('is_deleted','no');
     $vehicle_fuel = $this->master_model->getRecords('vehicle_fuel');
     // print_r($package_type); die;

     $this->db->order_by('id','ASC');
     $this->db->where('is_deleted','no');
     $vehicle_brand = $this->master_model->getRecords('vehicle_brand');

     $this->db->order_by('id','desc');
     $this->db->where('is_deleted','no');
     $this->db->where('is_active','yes');
     $zone_info = $this->master_model->getRecords('zone_master');

     
     $this->arr_view_data['vehicle_ssession_owner_name'] = $vehicle_ssession_owner_name;
     $this->arr_view_data['action']          = 'add';
     $this->arr_view_data['vehicle_type'] = $vehicle_type;
     $this->arr_view_data['vehicle_fuel'] = $vehicle_fuel;
     $this->arr_view_data['bus_type'] = $bus_type;
     $this->arr_view_data['vehicle_brand'] = $vehicle_brand;
     $this->arr_view_data['zone_info'] = $zone_info;
     $this->arr_view_data['page_title']      = " Add ".$this->module_title;
     $this->arr_view_data['module_title']    = $this->module_title;
     $this->arr_view_data['module_url_path'] = $this->module_url_path;
     $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
     $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
 }
   
   
}