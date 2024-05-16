<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assign_vehicle extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
	
        
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/assign_vehicle";
        $this->module_title       = "Assign Vehicle To Tour";
        $this->module_url_slug    = "assign_vehicle";
        $this->module_view_folder = "assign_vehicle/";    
	}

	public function index()
	{  
        $record = array();
        $fields = "bus_open.*,packages.tour_number,packages.tour_title,package_date.journey_date,
        vehicle_details.registration_number,vehicle_owner.vehicle_owner_name,bus_type.bus_type";
        $this->db->order_by('bus_open.id','desc');
        $this->db->where('bus_open.is_deleted','no');
        $this->db->where('bus_open.is_active','yes');
        $this->db->where('bus_open.vehicle_rto_registration !=','');
        $this->db->join("packages", 'bus_open.package_id=packages.id','left');
        $this->db->join("package_date", 'bus_open.package_date_id=package_date.id','left');
        $this->db->join("vehicle_details", 'bus_open.vehicle_rto_registration=vehicle_details.id','left');
        $this->db->join("vehicle_owner", 'vehicle_details.vehicle_owner_id=vehicle_owner.id','left');
        $this->db->join("bus_type", 'bus_open.vehicle_bus_type=bus_type.id','left');
        $arr_data = $this->master_model->getRecords('bus_open',array('bus_open.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

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
            $this->form_validation->set_rules('tour_number', 'tour_number', 'required');
            $this->form_validation->set_rules('tour_date', 'tour_date', 'required');
            $this->form_validation->set_rules('vehicle_bus_type', 'vehicle_bus_type', 'required');
            $this->form_validation->set_rules('vehicle_rto_registration', 'vehicle_rto_registration', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $tour_number = $this->input->post('tour_number');
                $tour_date = $this->input->post('tour_date');
                $vehicle_bus_type = $this->input->post('vehicle_bus_type');
                $vehicle_rto_registration = $this->input->post('vehicle_rto_registration');
                
                // $arr_insert = array(
                //     'package_id'   =>   $tour_number,
                //     'package_date_id'   =>   $tour_date,
                //     'vehicle_bus_type'   =>   $vehicle_bus_type,
                //     'vehicle_rto_registration'   =>   $vehicle_rto_registration,
                //     'bus_open_status'   =>   'yes'
                // );
                // $inserted_id = $this->master_model->insertRecord('assign_vehicle',$arr_insert,true);

                $arr_update = array(
                    // 'vehicle_bus_type'   =>   $vehicle_bus_type,
                    'vehicle_rto_registration'   =>   $vehicle_rto_registration
                );
                $arr_where     = array('package_id'   =>   $tour_number,
                                        'vehicle_bus_type'   =>   $vehicle_bus_type,
                                       'package_date_id'   =>   $tour_date,);
               $this->master_model->updateRecord('bus_open',$arr_update,$arr_where);

                $arr_update = array(
                    'bus_open_status'   =>  'yes'
                );
                $arr_where     = array("id" => $vehicle_rto_registration);
                $id=$this->master_model->updateRecord('vehicle_details',$arr_update,$arr_where);
                               
                if($id > 0)
                {    
                    $this->session->set_flashdata('success_message'," Tour Wise Bus Open Added Successfully.");
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
    $this->db->order_by('tour_number','ASC');
    $packages_data = $this->master_model->getRecords('packages');

    $record = array();
    $fields = "packages.*,package_date.journey_date,package_date.id as p_date_id";
    $this->db->where('packages.is_deleted','no');
    $this->db->join("package_date", 'packages.id=package_date.package_id','left');
    $add_journey_date = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);

    $record_bus_type = array();
    $fields = "bus_type.*";
    $this->db->where('bus_type.is_deleted','no');
    // $this->db->join("package_date", 'packages.id=package_date.package_id','left');
    $record_bus_type = $this->master_model->getRecords('bus_type',array('bus_type.is_deleted'=>'no'),$fields);
    // print_r($record_bus_type);
    // die;

    $record = array();
    $fields = "vehicle_details_dummy.*,vehicle_owner.id as vid,vehicle_owner.vehicle_owner_name";
    $this->db->order_by('vehicle_details_dummy.id','ASC');
    $this->db->where('vehicle_details_dummy.is_deleted','no'); 
    $this->db->where('vehicle_details_dummy.is_active','yes');
    $this->db->where('vehicle_details_dummy.added_by !=','admin');
    $this->db->where('vehicle_details_dummy.status','approved');
    $this->db->join("vehicle_owner", 'vehicle_details_dummy.vehicle_owner_id=vehicle_owner.id','left');
    $vehicle_details = $this->master_model->getRecords('vehicle_details_dummy',array('vehicle_details_dummy.is_deleted'=>'no'),$fields);

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['packages_data'] = $packages_data;
        $this->arr_view_data['record_bus_type'] = $record_bus_type;
        $this->arr_view_data['add_journey_date'] = $add_journey_date;
        $this->arr_view_data['vehicle_details'] = $vehicle_details;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	    $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no"))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('bus_open');
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
            
            if($this->master_model->updateRecord('bus_open',$arr_update,array('id' => $id)))
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
             $arr_data = $this->master_model->getRecords('bus_open');
 
             if(empty($arr_data))
             {
                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                 redirect($this->module_url_path);
             }
             $arr_update = array('is_deleted' => 'yes');
             $arr_where = array("id" => $id);
                  
             if($this->master_model->updateRecord('bus_open',$arr_update,$arr_where))
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
            // $this->db->where('id',$id);
            // $arr_data = $this->master_model->getRecords('bus_open');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('tour_number', 'tour_number', 'required');
                $this->form_validation->set_rules('tour_date', 'tour_date', 'required');
                $this->form_validation->set_rules('vehicle_bus_type', 'vehicle_bus_type', 'required');
                $this->form_validation->set_rules('vehicle_rto_registration', 'vehicle_rto_registration', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                    $tour_number = $this->input->post('tour_number');
                    $tour_date = $this->input->post('tour_date');
                    $vehicle_bus_type = $this->input->post('vehicle_bus_type');
                    $vehicle_rto_registration = $this->input->post('vehicle_rto_registration');
                   
                    $arr_update = array(
                        // 'vehicle_bus_type'   =>   $vehicle_bus_type,
                        'vehicle_rto_registration'   =>   $vehicle_rto_registration
                    );
                    $arr_where     = array('package_id'   =>   $tour_number,
                                            'vehicle_bus_type'   =>   $vehicle_bus_type,
                                           'package_date_id'   =>   $tour_date,);
                   $this->master_model->updateRecord('bus_open',$arr_update,$arr_where);
    
                    $arr_update2 = array(
                        'bus_open_status'   =>  'yes'
                    );
                    $arr_where2     = array("id" => $vehicle_rto_registration);
                    $id=$this->master_model->updateRecord('vehicle_details',$arr_update2,$arr_where2);

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

        $record = array();
        $fields = "bus_open.*,packages.tour_number,packages.tour_title,package_date.journey_date,vehicle_details.registration_number";
        $this->db->order_by('bus_open.id','desc');
        $this->db->where('bus_open.is_deleted','no');
        $this->db->where('bus_open.is_active','yes');
        $this->db->where('bus_open.id',$id);
        $this->db->join("packages", 'bus_open.package_id=packages.id','left');
        $this->db->join("package_date", 'bus_open.package_date_id=package_date.id','left');
        $this->db->join("vehicle_details", 'bus_open.vehicle_rto_registration=vehicle_details.id','left');
        $arr_data = $this->master_model->getRecords('bus_open',array('bus_open.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->db->where('is_deleted','no');
        $this->db->order_by('tour_number','ASC');
        $packages_data = $this->master_model->getRecords('packages');
        //  print_r($packages_data); die;

        $record_bus_type = array();
        $fields = "bus_type.*";
        $this->db->where('bus_type.is_deleted','no');
        // $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $record_bus_type = $this->master_model->getRecords('bus_type',array('bus_type.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "packages.*,package_date.journey_date,package_date.id as p_date_id";
        $this->db->where('packages.is_deleted','no');
        // $this->db->where('packages.id',$package_id);
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $add_journey_date = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($add_journey_date); die;
        
        $record = array();
        $fields = "vehicle_details.*,vehicle_owner.id as vid,vehicle_owner.vehicle_owner_name";
        $this->db->order_by('vehicle_details.id','ASC');
        $this->db->where('vehicle_details.is_deleted','no'); 
        $this->db->where('vehicle_details.is_active','yes');
        $this->db->where('vehicle_details.status','approved');
        $this->db->join("vehicle_owner", 'vehicle_details.vehicle_owner_id=vehicle_owner.id','left');
        $vehicle_details = $this->master_model->getRecords('vehicle_details',array('vehicle_details.is_deleted'=>'no'),$fields);
        // print_r($vehicle_details); die; 
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['packages_data']        = $packages_data;
        $this->arr_view_data['add_journey_date']        = $add_journey_date;
        $this->arr_view_data['vehicle_details']        = $vehicle_details;
        $this->arr_view_data['record_bus_type']        = $record_bus_type;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function add_seat_preference($id) {
        $vehicle_ssession_owner_name = $this->session->userdata("vehicle_ssession_owner_name");
        $owenwr_id = $this->session->userdata("vehicle_owner_sess_id");
        $bus_open_id = base64_decode($id);
    
       
    
        $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $this->db->where('bus_open.id',$bus_open_id);
        $vehicle_details_data = $this->master_model->getRecord('bus_open');
        $bus_open_type=$vehicle_details_data['vehicle_bus_type'];
        // print_r($vehicle_details_data);
    
        // $fields = "vehicle_seat_preference.*,vehicle_details.id as vehicle_id,vehicle_seat_preference.id as vpreference_id";
        // $this->db->where('vehicle_seat_preference.is_active','yes');
        // $this->db->where('vehicle_seat_preference.is_deleted','no');
        // $this->db->where('vehicle_seat_preference.vehicle_bus_type',$bus_open_type);
        // // $this->db->join("vehicle_details", 'vehicle_details.id=vehicle_seat_preference.vehicle_id','left');
        // $seat_preference_data = $this->master_model->getRecord("vehicle_seat_preference", "", $fields);

        $fields = "vehicle_details.*";
        $this->db->where('vehicle_details.is_active','yes');
        $this->db->where('vehicle_details.is_deleted','no');
        $this->db->where('vehicle_details.vehicle_bus_type',$bus_open_type);
        $vehicle_details_data = $this->master_model->getRecord("vehicle_details", "", $fields);
        // print_r($seat_preference_data);
        // die;
        $seat_preference_data=array();
    
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
    
                    //   if(empty($seat_preference_data)){
                    $inserted_id = $this->master_model->insertRecord("vehicle_seat_preference", $arr_insert, true,);
                    //   }else{
                    //     $arr_where     = array("id" => $vpreference_id);
                    //     $inserted_id =$this->master_model->updateRecord('vehicle_seat_preference',$arr_insert,$arr_where);
                    //   }
                      
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

    public function get_rtonumber(){ 
       $vehicle_bus_type_id = $this->input->post('vehicle_bus_type_id');
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('added_by !=','admin');
                        $this->db->where('vehicle_details.vehicle_bus_type',$vehicle_bus_type_id);   
                        $data = $this->master_model->getRecords('vehicle_details');
                        // print_r($data);
        echo json_encode($data);
    }
   
}