<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_details extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/vehicle_details";
        $this->module_url_path_dates    =  base_url().$this->config->item('admin_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('admin_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('admin_panel_slug')."/domestic_package_review";
        $this->module_title       = "Vehicle Details";
        $this->module_url_slug    = "vehicle_details";
        $this->module_view_folder = "vehicle_details/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $id = $this->session->userdata('vehicle_owner_sess_id');

        $fields = "vehicle_details.*,vehicle_type.vehicle_type_name,vehicle_fuel.vehicle_fuel_name,vehicle_brand.vehicle_brand_name";
        $this->db->where('vehicle_details.is_deleted','no');
        $this->db->join("vehicle_type", 'vehicle_details.vehicle_type=vehicle_type.id','left');
        $this->db->join("vehicle_fuel", 'vehicle_details.fuel_type=vehicle_fuel.id','left');
        $this->db->join("vehicle_brand", 'vehicle_details.vehicle_brand=vehicle_brand.id','left');
        $arr_data = $this->master_model->getRecords('vehicle_details',array('vehicle_details.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

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
  $id=base64_decode($id);
    if($id!='' && ($type == "yes" || $type == "no") )
    {   
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('vehicle_details');
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

    $this->db->where('vehicle_details.id',$vehicle_id);

    $vehicle_details_data = $this->master_model->getRecord('vehicle_details');



    $fields = "vehicle_seat_preference.*,vehicle_details.id as vehicle_id,vehicle_seat_preference.id as vpreference_id";

    $this->db->where('vehicle_seat_preference.is_active','yes');

    $this->db->where('vehicle_seat_preference.is_deleted','no');

    $this->db->where('vehicle_seat_preference.vehicle_id',$vehicle_id);

    $this->db->join("vehicle_details", 'vehicle_details.id=vehicle_seat_preference.vehicle_id','left');

    // $seat_preference_data = $this->master_model->getRecord('vehicle_seat_preference');

    $seat_preference_data = $this->master_model->getRecord("vehicle_seat_preference", "", $fields);

    // print_r($seat_preference_data); die;



    $selected_seats=array();



    if ($this->input->post("submit")) {

        // $this->form_validation->set_rules("first_cls_seats", "Seat", "required");

        // $this->form_validation->set_rules("seat_number[]", "Seat Number", "required");

        // $this->form_validation->set_rules("price", "Price", "required");



       



        // if ($this->form_validation->run() == true) {

           

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

                  'vehicle_id'=>$vehicle_id,

                  'total_seat_count'=>$seat_capacity,

                  ];



                  if(empty($seat_preference_data)){

                $inserted_id = $this->master_model->insertRecord("vehicle_seat_preference", $arr_insert, true);

                
                  }else{

                    $arr_where     = array("id" => $vpreference_id);

                    $inserted_id =$this->master_model->updateRecord('vehicle_seat_preference',$arr_insert,$arr_where);

                  }

                 

            if ($inserted_id > 0) {

                $this->session->set_flashdata("success_message", ucfirst($this->module_title) . " Added Successfully.");

                redirect($this->module_url_path . "/add_seat_preference/".$id);

            } else {

                $this->session->set_flashdata("error_message", "Something Went Wrong While Adding The " . ucfirst($this->module_title) . ".");

            }

            redirect($this->module_url_path . "/add_seat_preference/".$id);

        // }

    }

    // $this->arr_view_data["vehicle_ssession_owner_name"] = $vehicle_ssession_owner_name;

    // print_r($vehicle_details_data); die;
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

   
}