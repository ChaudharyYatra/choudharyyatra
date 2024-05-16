<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Change_bus extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/change_bus";
        $this->module_replace_tm_request_bus    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/replace_tm_request_bus";
        $this->module_title       = "Change Bus";
        $this->module_url_slug    = "change_bus";
        $this->module_view_folder = "change_bus/";    
        $this->load->library('upload');
	}

    
	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('assign_staff');
        // print_r($arr_data); die;

        $fields = "request_to_tom_replace_bus.*,packages.tour_number,packages.tour_title,supervision.supervision_name,
        vehicle_owner.vehicle_owner_name,vehicle_details.registration_number";
        $this->db->where('request_to_tom_replace_bus.is_deleted','no');
        $this->db->join("packages", 'request_to_tom_replace_bus.package_id=packages.id','left');
        $this->db->join("supervision", 'request_to_tom_replace_bus.tour_manager_id=supervision.id','left');
        $this->db->join("vehicle_owner", 'request_to_tom_replace_bus.vehicle_owner_id=vehicle_owner.id','left');
        $this->db->join("vehicle_details", 'request_to_tom_replace_bus.vehicle_rto_registration=vehicle_details.id','left');
        $arr_data = $this->master_model->getRecords('request_to_tom_replace_bus',array('request_to_tom_replace_bus.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['id']        = $id;
        $this->arr_view_data['pid']        = $pid;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}
	
	
    public function add($bus_request_id,$pid,$did,$seat_no)
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');   
        
        // echo $pid;
        // echo $did;
        // echo $seat_no; die;
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('vehicle_owner_name', 'vehicle_owner_name', 'required');
            $this->form_validation->set_rules('rto_no', 'rto_no', 'required');
            $this->form_validation->set_rules('seat_capacity', 'seat_capacity', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $vehicle_owner_name	  = $this->input->post('vehicle_owner_name'); 
                $rto_no	  = $this->input->post('rto_no');
                $seat_capacity	  = $this->input->post('seat_capacity');
                $request_bus_id	  = $this->input->post('request_bus_id');

                    $arr_insert = array(
                        'vehicle_owner_id'   =>   $vehicle_owner_name,
                        'vehicle_rto_registration'   =>   $rto_no,
                        'seat_capacity'   =>   $seat_capacity,
                        'package_id'   =>   $pid,
                        'package_date_id'   =>   $did,
                        'request_to_tom_replace_bus_id'   =>   $request_bus_id
                    );

                    $inserted_id = $this->master_model->insertRecord('change_bus',$arr_insert,true);

                    $arr_update = array(
                        'status'   =>   'Approved'

                    );
                    $arr_where     = array("id" => $request_bus_id);
                    $inserted_id = $this->master_model->updateRecord('request_to_tom_replace_bus',$arr_update,$arr_where);
                
                               
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_replace_tm_request_bus.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_replace_tm_request_bus.'/index');
            
            }
       
        }

        $fields = "vehicle_owner.*,vehicle_details.registration_number";
        $this->db->where('vehicle_owner.is_deleted','no');
        $this->db->where('vehicle_owner.is_active','yes');  
        $this->db->where('vehicle_details.status','approved');  
        $this->db->join("vehicle_details", 'vehicle_owner.id=vehicle_details.vehicle_owner_id','left');
        $this->db->group_by('vehicle_owner.vehicle_owner_name');
        $vehicle_owner_data = $this->master_model->getRecords('vehicle_owner',array('vehicle_owner.is_deleted'=>'no'),$fields);
        // print_r($vehicle_owner_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['vehicle_owner_data']        = $vehicle_owner_data;
        $this->arr_view_data['seat_no']        = $seat_no;
        $this->arr_view_data['bus_request_id']        = $bus_request_id;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Assign Staff";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_replace_tm_request_bus'] = $this->module_replace_tm_request_bus;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
    }


   
    // Edit - Get data for edit
    
    public function edit($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');

		if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   

            $this->db->where('id',$id);
            $this->db->where('is_active','yes');
            $this->db->where('is_deleted','no');
            $arr_data = $this->master_model->getRecords('hotel_advance_payment');

            $this->db->where('id',$id);
            $this->db->where('is_active','yes');
            $this->db->where('is_deleted','no');
            $arr_data2 = $this->master_model->getRecord('hotel_advance_payment');

            $pk_id = $arr_data2['package_type'];
            $tour_id = $arr_data2['tour_number'];
            // print_r($pk_id); die;
  
        
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('package_type', 'package_type', 'required');
                $this->form_validation->set_rules('tour_number', 'tour_number', 'required');
                $this->form_validation->set_rules('hotel_name', 'hotel_name', 'required');
                $this->form_validation->set_rules('advance_amt', 'advance_amt', 'required');

                if($this->form_validation->run() == TRUE)
                {

                    $package_type	  = $this->input->post('package_type'); 
                    $tour_number	  = $this->input->post('tour_number');
                    $hotel_name	  = $this->input->post('hotel_name');
                    $advance_amt	  = $this->input->post('advance_amt');


                        $arr_update = array(
                            'package_type'   =>   $package_type,
                            'tour_number'   =>   $tour_number,
                            'hotel_name'   =>   $hotel_name,
                            'advance_amt'   =>   $advance_amt
                        );

                    
                        $arr_where     = array("id" => $id);
                        $this->master_model->updateRecord('hotel_advance_payment',$arr_update,$arr_where);
                

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
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');  
        $package_type = $this->master_model->getRecords('package_type');
        //  print_r($package_type); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');  
        $this->db->where('package_type',$pk_id);   
        $packages_data = $this->master_model->getRecords('packages');


        $fields = "package_hotel.*,hotel.id,hotel.hotel_name";
        $this->db->where('package_hotel.is_deleted','no');
        $this->db->where('package_hotel.is_active','yes');
        $this->db->where('package_hotel.package_id',$tour_id);   
        $this->db->join("hotel", 'package_hotel.hotel_name_id=hotel.id','left');
        $hotel_data = $this->master_model->getRecords('package_hotel',array('package_hotel.is_deleted'=>'no'),$fields);

        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data2']        = $arr_data2;
        $this->arr_view_data['package_type']        = $package_type;
        $this->arr_view_data['packages_data']        = $packages_data;
        $this->arr_view_data['hotel_data']        = $hotel_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
    }


    // Delete
    
    public function delete($id,$iid,$pid)
    {

        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('assign_staff');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('assign_staff',$arr_update,$arr_where))
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
        redirect($this->module_url_path.'/index/'.$iid.'/'.$pid);  
    }





//   public function get_package(){ 
//     // POST data 
//     // $all_b=array();
//     $district_data = $this->input->post('did');
//         // print_r($boarding_office_location); die;
//                         $this->db->where('is_deleted','no');
//                         $this->db->where('is_active','yes');
//                         $this->db->where('package_type',$district_data);   
//                         $data = $this->master_model->getRecords('packages');
//         echo json_encode($data);
//     }


    public function get_change_bus(){ 
        // POST data 
        // $all_b=array();
        $getname = $this->input->post('did');
        // $seat_no = $this->input->post('seat');
        // print_r($seat_no); die;
                $fields = "vehicle_details.*,vehicle_owner.id as vid";
                $this->db->where('vehicle_details.is_deleted','no');
                $this->db->where('vehicle_details.is_active','yes');
                $this->db->where('vehicle_details.bus_open_status','no');
                $this->db->where('vehicle_details.vehicle_owner_id',$getname);   
                // $this->db->where('vehicle_details.seat_capacity',$seat_no);   
                $this->db->join("vehicle_owner", 'vehicle_details.vehicle_owner_id=vehicle_owner.id','left');
                $data = $this->master_model->getRecords('vehicle_details',array('vehicle_details.is_deleted'=>'no'),$fields);
                // $data = $this->master_model->getRecords('vehicle_details');
                // print_r($data); die;
                // $fields = "vehicle_details.*";
                // $this->db->where('vehicle_details.is_deleted','no');
                // $this->db->where('vehicle_details.is_active','yes');
                // $this->db->where('bus_open.bus_open_status','no');
                // $this->db->where('vehicle_details.bus_open_status','no');
                // $this->db->where('vehicle_owner.id',$getname); 
                // $this->db->where('vehicle_details.seat_capacity',$seat_no); 
                // $this->db->join("bus_open", 'vehicle_details.id=bus_open.vehicle_rto_registration','left');
                // $this->db->join("vehicle_owner", 'vehicle_details.vehicle_owner_id=vehicle_owner.id','left');
                // $data = $this->master_model->getRecords('vehicle_details',array('vehicle_details.is_deleted'=>'no'),$fields);
                // print_r($data); die;
        echo json_encode($data);
    }

    public function get_change_bus_seat(){ 
        // POST data 
        // $all_b=array();
        $getname_seat = $this->input->post('did');
        // $seat_no = $this->input->post('seat');
        // print_r($getname_seat); die;
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('vehicle_details.id',$getname_seat);  
        $data = $this->master_model->getRecords('vehicle_details');
// print_r($data); die;
        echo json_encode($data);
    }



// =======================================================================================================
    // Get Details of Package
    public function details($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "packages.*,academic_years.year";
        $this->db->where('packages.id',$id);
        $this->db->join("academic_years", 'packages.academic_year=academic_years.id','left');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
    }



   
   
}