<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assign_staff extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/assign_staff";
        $this->module_title       = "Assign Staff";
        $this->module_url_slug    = "assign_staff";
        $this->module_view_folder = "assign_staff/";    
        $this->load->library('upload');
	}

    public function main_index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('assign_staff');
        // print_r($arr_data); die;

        $record = array();
        $fields = "packages.*,packages.id as pid,final_booking.package_id,final_booking.package_date_id,package_date.id,package_date.journey_date,package_type.package_type,package_type.id,package_date.id as p_date_id,bus_open.package_id,bus_open.package_date_id,bus_open.bus_open_status";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->join("final_booking", 'final_booking.package_id=packages.id','right');
        $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','right');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("bus_open", 'package_date.id=bus_open.package_date_id and packages.id=bus_open.package_id','left');
        $this->db->where('bus_open.bus_open_status','yes');
        $this->db->group_by('final_booking.package_id','final_booking.package_date_id');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
    //    print_r($arr_data); die;


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."main_index";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}
	

	public function index($id,$pid)
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('assign_staff');
        // print_r($arr_data); die;

        $fields = "assign_staff.*,role_type.role_name,assign_staff.role_name as staff_role,supervision.supervision_name,vehicle_owner.vehicle_owner_name";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('package_date_id',$id);
        $this->db->where('package_id',$pid);
        $this->db->join("role_type", 'assign_staff.role_name=role_type.id','left');
        $this->db->join("supervision", 'assign_staff.name=supervision.id','left');
        $this->db->join("vehicle_owner", 'assign_staff.name=vehicle_owner.id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $record = array();
        $fields = "packages.*,packages.id as pid,final_booking.package_id,final_booking.package_date_id,package_date.id,package_date.journey_date,package_type.package_type,package_type.id,package_date.id as p_date_id,packages.id as pid";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('packages.id',$pid);
        $this->db->where('package_date.id',$id);
        $this->db->join("final_booking", 'final_booking.package_id=packages.id','right');
        $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','right');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $package_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        foreach($package_data as $package_data_info){
            $package_id = $package_data_info['pid'];
            $package_info = $package_data_info['tour_title'];
            $package_date = $package_data_info['journey_date'];
        }


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['package_info']        = $package_info;
        $this->arr_view_data['package_id']        = $package_id;
        $this->arr_view_data['package_date']        = $package_date;
        $this->arr_view_data['id']        = $id;
        $this->arr_view_data['pid']        = $pid;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}
	
	
    public function add($id,$pid)
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');   

        if($this->input->post('submit'))
        {

            $this->form_validation->set_rules('role_name[]', 'role name', 'required');
            $this->form_validation->set_rules('name[]', 'staff name', 'required');

            
            if($this->form_validation->run() == TRUE)
            {

                $role_name	  = $this->input->post('role_name'); 
                $name	  = $this->input->post('name');

                $package_id	  = $this->input->post('package_id');
                $package_date_id   = $this->input->post('package_date_id');

                $count = count($name);
                for($i=0;$i<$count;$i++)
                {

                    $arr_insert = array(
                        'role_name'   =>   $role_name[$i],
                        'name'   =>   $name[$i],
                        'package_id'   =>   $package_id[$i],
                        'package_date_id'   =>   $package_date_id[$i]
                    );

                    $inserted_id = $this->master_model->insertRecord('assign_staff',$arr_insert,true);

                
                    $record = array();
                    $fields = "assign_staff.*,role_type.role_name,supervision.supervision_name,supervision.mobile_number1,packages.tour_number,packages.tour_title,package_date.journey_date";
                    $this->db->where('assign_staff.is_deleted','no');
                    // $this->db->where('assign_staff.name',$iid);
                    $this->db->order_by('assign_staff.id','DESC');
                    $this->db->join("supervision", 'assign_staff.name=supervision.id','left');
                    $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
                    $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
                    $this->db->join("role_type", 'assign_staff.role_name=role_type.id','left');
                    $agent_data_email = $this->master_model->getRecord('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
                    // print_r($agent_data_email); die;
                    //  $agent_email=$agent_data_email['email'];{
                    if($agent_data_email['role_name']=='Tour Manager'){
                    $agent_name=$agent_data_email['supervision_name'];   
                    $mobileNumber=$agent_data_email['mobile_number1'];  
                    $tour_number= $agent_data_email['tour_number'];  
                    $tour_title= $agent_data_email['tour_title'];  
                    $tour_date= $agent_data_email['journey_date'];  
                    $from_email='test@choudharyyatra.co.in';
				  
				  	$authKey = "1207168241267288907";
				  	
                      
				    $message="Hi $agent_name, You have been allocated as the tour manager for the upcoming tour $tour_number - $tour_title on $tour_date. Please confirm your availability. Thank you, CYCPL Team.";
                    $senderId  = "CYCPLN";
                
                    $apiurl = "http://sms.sumagoinfotech.com/api/sendhttp.php?authkey=394685AG84OZGHLV0z6438e5e3P1&mobiles=$mobileNumber&message=$message&sender=CYCPLN&route=4&country=91&DLT_TE_ID=1207168251635131542";
                       
                    $apiurl = str_replace(" ", '%20', $apiurl);
                    
                   
                   $ch = curl_init($apiurl);
                			$get_url = $apiurl;
                			curl_setopt($ch, CURLOPT_POST,0);
                			curl_setopt($ch, CURLOPT_URL, $get_url);
                			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
                			curl_setopt($ch, CURLOPT_HEADER,0);
                			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                	$return_val = curl_exec($ch); 
                }
                }
                               
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/index/'.$id.'/'.$pid);
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index/'.$id.'/'.$pid);
            
            }
       
        }


        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');  
        $this->db->where('for_booking_yes_no','yes'); 
        $role_type = $this->master_model->getRecords('role_type');

        $record = array();
        $fields = "packages.*,final_booking.package_id,final_booking.package_date_id,package_date.id,package_date.journey_date,package_type.package_type,package_type.id,package_date.id as p_date_id,packages.id as pid";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('packages.id',$pid);
        $this->db->where('package_date.id',$id);
        $this->db->join("final_booking", 'final_booking.package_id=packages.id','right');
        $this->db->join("package_date", 'final_booking.package_date_id=package_date.id','right');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $package_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        
        foreach($package_data as $package_data_info){
            $package_info = $package_data_info['tour_title'];
            $package_date = $package_data_info['journey_date'];
        }

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['role_type']        = $role_type;
        $this->arr_view_data['package_data']     = $package_data;
        $this->arr_view_data['package_info']     = $package_info;
        $this->arr_view_data['package_date']     = $package_date;
        $this->arr_view_data['id']        = $id;
        $this->arr_view_data['pid']        = $pid;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Assign Staff";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
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
            $arr_data = $this->master_model->getRecords('assign_staff');
            // print_r($arr_data); die;

            foreach($arr_data  as $arr_data_info){
                $role_id = $arr_data_info['role_name'];
                
                $p_id = $arr_data_info['package_id'];
                $p_date_id = $arr_data_info['package_date_id'];
            }
  
        
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('role_name[]', 'role name', 'required');
                $this->form_validation->set_rules('name[]', 'staff name', 'required');

                if($this->form_validation->run() == TRUE)
                {

                    $role_name	  = $this->input->post('role_name'); 
                    $name	  = $this->input->post('name');

                    $count = count($name);
                    for($i=0;$i<$count;$i++)
                    {
                        $arr_update = array(
                                'role_name'   =>   $role_name[$i],
                                'name'   =>   $name[$i]
                        );

                    
                        $arr_where     = array("id" => $id);
                        $this->master_model->updateRecord('assign_staff',$arr_update,$arr_where);
                    }
                

                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index/'.$p_date_id.'/'.$p_id);
                
            }
          }
        }
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');  
        $this->db->where('for_booking_yes_no','yes'); 
        $role_type = $this->master_model->getRecords('role_type');
        //  print_r($packages_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('role_type',$role_id);
        $supervision = $this->master_model->getRecords('supervision');
        // print_r($package_type); die;

        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['p_id']        = $p_id;
        $this->arr_view_data['p_date_id']        = $p_date_id;
        $this->arr_view_data['supervision']        = $supervision;
        $this->arr_view_data['role_type']        = $role_type;
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


    public function getrolename(){ 
        // POST data 
        // $all_b=array();
        $getname = $this->input->post('did');
        // print_r($getname); die;
        if($getname!= '9'){
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('role_type',$getname);   
                        $data = $this->master_model->getRecords('supervision');
        }
        else{
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $data = $this->master_model->getRecords('vehicle_owner');
        }
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