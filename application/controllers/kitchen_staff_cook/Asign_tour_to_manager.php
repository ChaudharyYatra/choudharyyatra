<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asign_tour_to_manager extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/asign_tour_to_manager";
        $this->module_url_path_instruction    =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/instruction_module";
        $this->module_url_kitchen_staff_cook_photos    =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/kitchen_staff_cook_photos";
		$this->module_url_path_tour_expenses    =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/tour_expenses";
		$this->module_url_path_request_more_fund   =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/tm_request_more_fund";
		$this->module_url_path_customer_feedback   =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/customer_feedback";
        $this->module_back   =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/asign_tour_to_manager";
        $this->module_title       = "Asign Tour";
        $this->module_url_slug    = "asign_tour_to_manager";
        $this->module_view_folder = "asign_tour_to_manager/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,packages.package_type,
        package_type.package_type,supervision.supervision_name,package_date.journey_date,package_date.id as did";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('assign_staff.name',$id);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
        $this->db->join("supervision", 'assign_staff.role_name=supervision.id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['module_url_kitchen_staff_cook_photos'] = $this->module_url_kitchen_staff_cook_photos;
        $this->arr_view_data['module_url_path_customer_feedback'] = $this->module_url_path_customer_feedback;
        $this->arr_view_data['module_url_path_instruction'] = $this->module_url_path_instruction;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_tour_expenses'] = $this->module_url_path_tour_expenses;
        $this->arr_view_data['module_url_path_request_more_fund'] = $this->module_url_path_request_more_fund;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('kitchen_staff_cook/layout/agent_combo',$this->arr_view_data);
       
	}
	
  // Active/Inactive
  public function active_inactive($id,$type)
    {
	  	$id=base64_decode($id);
        if($id!="" && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('asign_tour_manager');
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
            
            if($this->master_model->updateRecord('asign_tour_manager',$arr_update,array('id' => $id)))
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
  
   
    // Get Details of Package
    public function iternary_details($id,$did)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

		$id=base64_decode($id);
        $did=base64_decode($did);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        // $this->db->where('is_deleted','no');
        // $this->db->where('package_date.id',$id);
        // $packages_data = $this->master_model->getRecords('package_date');
        
        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,package_date.journey_date,package_date.id";
        $this->db->where('assign_staff.is_deleted','no');
        // $this->db->where('asign_tour_manager.is_active','yes');
        $this->db->where('assign_staff.id',$id);
        $this->db->where('package_date.id',$did);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $package_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($package_data); die;

        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,package_iternary.day_number,package_iternary.iternary_desc,package_iternary.image_name";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('package_iternary.is_active','yes');
        $this->db->where('assign_staff.id',$id);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_iternary", 'packages.id=package_iternary.package_id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['package_data']        = $package_data;
        $this->arr_view_data['page_title']      = $this->module_title." Iternary Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."iternary_details";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

    public function allocate_hotel($id)
    { 
        $id=base64_decode($id);
        
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $fields = "package_hotel.*,hotel.hotel_name";
        $this->db->where('package_hotel.package_id',$id);
        $this->db->join("hotel", 'package_hotel.hotel_name_id=hotel.id','left');
        $arr_data = $this->master_model->getRecords('package_hotel',array('package_hotel.is_deleted'=>'no'),$fields);


        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = " Allocated hotels ";
        $this->arr_view_data['module_title']    = " Allocated hotels ";
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."allocate_hotel";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);

    }

    // public function allocate_room($id)
    // {          
    //     $supervision_sess_name = $this->session->userdata('supervision_name');
    //     $iid = $this->session->userdata('supervision_sess_id');

    //     $fields = "hotel_allocated_room.*,hotel_room.hotel_id";
    //     $this->db->where('hotel_allocated_room.package_id',$id);
    //     $this->db->group_by('hotel_allocated_room.hotel_name_id'); 
    //     $this->db->join("hotel_room", 'hotel_allocated_room.hotel_name_id=hotel_room.hotel_id','left');
    //     $hotel_allocated_room_data = $this->master_model->getRecord('hotel_allocated_room',array('hotel_allocated_room.is_deleted'=>'no'),$fields);

    //     // $hotel_allocated_room_data = $this->master_model->getRecords('hotel_allocated_room');

    //     $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
    //     $this->arr_view_data['hotel_allocated_room_data'] = $hotel_allocated_room_data;
    //     $this->arr_view_data['action']          = 'add';       
    //     $this->arr_view_data['page_title']      = " Add ".$this->module_title;
    //     $this->arr_view_data['module_title']    = $this->module_title;
    //     $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //     $this->arr_view_data['middle_content']  = $this->module_view_folder."allocate_room";
    //     $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    // }

    public function allocate_room($aid)
    {          
        $id=base64_decode($aid);
        
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $fields = "all_traveller_info.*,seat_type_room_type.*,all_traveller_info.id as traveller_id";
        $this->db->where('all_traveller_info.package_id',$id);
        $this->db->where('all_traveller_info.for_credentials','yes');
        // $this->db->group_by('hotel_allocated_room.hotel_name_id'); 
        $this->db->join("seat_type_room_type", 'all_traveller_info.booking_reference_no=seat_type_room_type.booking_reference_no','left');
        $arr_data = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);


        $fields = "hotel_allocated_room.*,hotel_room.hotel_id";
        $this->db->where('hotel_allocated_room.package_id',$id);
        $this->db->group_by('hotel_allocated_room.hotel_name_id'); 
        $this->db->join("hotel_room", 'hotel_allocated_room.hotel_name_id=hotel_room.hotel_id','left');
        $hotel_allocated_room_data = $this->master_model->getRecords('hotel_allocated_room',array('hotel_allocated_room.is_deleted'=>'no'),$fields);


        
        if($this->input->post('submit'))
        {
            // print_r($_REQUEST); 

            $traveller_id  = $this->input->post('traveller_id');

            $count_allocate_rooms = $this->input->post('allocate_rooms');
            
            $count=count($traveller_id);
                for($i=0; $i<$count; $i++){

                    $allocate_rooms=implode(',',$count_allocate_rooms[$i]);
                    
                    $arr_insert = array(
                        'traveller_id'   =>   $traveller_id[$i],
                        'allocate_rooms'   =>   $allocate_rooms
                    );

                    $inserted_id = $this->master_model->insertRecord('allocate_room_to_traveller',$arr_insert,true);  
                    // print_r($inserted_id); die;
                // echo 'true';

            }
             

            if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_back.'/allocate_hotel/'.$aid);
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }

                 redirect($this->module_url_path.'/index');
        }

        // print_r($_REQUEST); die;
        // print_r($hotel_allocated_room_data); die;
        $all_room_data=array();

        foreach($hotel_allocated_room_data as $hotel_allocated_room_data_info){
            $one_bed_AC_data = $hotel_allocated_room_data_info['one_bed_AC'];
            $one_bed_AC_data_info = explode(',',$one_bed_AC_data);
            if(!empty($one_bed_AC_data_info)){
                foreach($one_bed_AC_data_info as $key =>$one_bed_AC_data_room){
                    array_push($all_room_data,$one_bed_AC_data_room);
                }
            }
            

            $two_bed_AC_data = $hotel_allocated_room_data_info['two_bed_AC'];
            $two_bed_AC_data_info = explode(',',$two_bed_AC_data);
            foreach($two_bed_AC_data_info as $two_bed_AC_data_data_room){
                array_push($all_room_data,$two_bed_AC_data_data_room);
            }
            

            $three_bed_AC_data = $hotel_allocated_room_data_info['three_bed_AC'];
            $three_bed_AC_data_info = explode(',',$three_bed_AC_data);

            $three_bed_AC_count=count($three_bed_AC_data_info);
                for($j=0;$j<$three_bed_AC_count;$j++){
                    if($three_bed_AC_data_info[$j]!='')
                    {
                        array_push($all_room_data,$three_bed_AC_data_info[$j]);
                    }
                }
            

            $four_bed_AC_data = $hotel_allocated_room_data_info['four_bed_AC'];
            $four_bed_AC_data_info = explode(',',$four_bed_AC_data);

            $four_bed_AC_count=count($four_bed_AC_data_info);
            for($j=0;$j<$four_bed_AC_count;$j++){
                if($four_bed_AC_data_info[$j]!='')
                {
                    array_push($all_room_data,$four_bed_AC_data_info[$j]);
                }
            }
            

            $one_bed_Non_AC_data = $hotel_allocated_room_data_info['one_bed_Non_AC'];
            $one_bed_Non_AC_data_info = explode(',',$one_bed_Non_AC_data);
            foreach($one_bed_Non_AC_data_info as $one_bed_Non_AC_data_room){
                array_push($all_room_data,$one_bed_Non_AC_data_room);
            }
            
            
            $two_bed_Non_AC_data = $hotel_allocated_room_data_info['two_bed_Non_AC'];
            $two_bed_Non_AC_data_info = explode(',',$two_bed_Non_AC_data);
            foreach($two_bed_Non_AC_data_info as $two_bed_Non_AC_data_room){
                array_push($all_room_data,$two_bed_Non_AC_data_room);
            }
            

            $three_bed_Non_AC_data = $hotel_allocated_room_data_info['three_bed_Non_AC'];
            $three_bed_Non_AC_data_info = explode(',',$three_bed_Non_AC_data);

            $dcouhnt1=count($three_bed_Non_AC_data_info);
                for($j=0;$j<$dcouhnt1;$j++){
                    if($three_bed_Non_AC_data_info[$j]!='')
                    {
                        array_push($all_room_data,$three_bed_Non_AC_data_info[$j]);
                    }
                }

            

            $four_bed_Non_AC_data = $hotel_allocated_room_data_info['four_bed_Non_AC'];
            // print_r($four_bed_Non_AC_data);
            $four_bed_Non_AC_data_info = explode(',',$four_bed_Non_AC_data);
            $dcouhnt=count($four_bed_Non_AC_data_info);
                for($i=0;$i<$dcouhnt;$i++){
                    if($four_bed_Non_AC_data_info[$i]>0)
                    {
                        array_push($all_room_data,$four_bed_Non_AC_data_info[$i]);
                    }
                }
                // foreach($four_bed_Non_AC_data_info as $four_bed_Non_AC_data_room){
                //     array_push($all_room_data,$four_bed_Non_AC_data_room);
                // }
           
            

        }
        // print_r($all_room_data); die;
        

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['all_room_data'] = $all_room_data;
        $this->arr_view_data['arr_data'] = $arr_data;
        $this->arr_view_data['hotel_allocated_room_data'] = $hotel_allocated_room_data;
        $this->arr_view_data['action']          = 'add';       
        $this->arr_view_data['page_title']      = " Allocate Room ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."allocate_room";
        $this->load->view('kitchen_staff_cook/layout/agent_combo',$this->arr_view_data);
    }

   
   
}