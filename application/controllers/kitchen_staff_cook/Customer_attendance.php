<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_attendance extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
        $this->load->model("json_model");
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/customer_attendance";
        $this->module_url_tour_photos    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_photos";
		// $this->module_url_path_iternary    =  base_url().$this->config->item('tour_manager_panel_slug')."/package_iternary";
		// $this->module_url_path_review    =  base_url().$this->config->item('tour_manager_panel_slug')."/domestic_package_review";
        $this->module_title       = "Customer Attendance";
        $this->module_url_slug    = "customer_attendance";
        $this->module_view_folder = "customer_attendance/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id'); 

        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,packages.package_type,
        package_type.package_type,package_date.journey_date,package_date.id as did,
        supervision.supervision_name";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('assign_staff.name',$id);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
        $this->db->join("supervision", 'assign_staff.name=supervision.id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['module_url_tour_photos'] = $this->module_url_tour_photos;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}

    public function add($pid,$pdid,$d_day_id)
    {   
        
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $id=base64_decode($pid);
        $did=base64_decode($pdid);
        $day_id=($d_day_id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');
            // print_r($arr_data); die;

        if($this->input->post('submit'))
        {
            
            // $this->form_validation->set_rules('m_attendance', 'm_attendance', 'required');
            // $this->form_validation->set_rules('e_attendance', 'e_attendance', 'required');
            
            // if($this->form_validation->run() == TRUE)
            // {
               
                // echo($this->input->post('m_attendance'));die();
                $i=1;
                $m_attendance	  = $this->input->post('m_attendance'); 
                $e_attendance	  = $this->input->post('e_attendance'); 
                $traveller_id	  = $this->input->post('traveller_id');  
                
                

                $c=count($traveller_id);
              
                for($j=0; $j<$c; $j++){
                    $Data=array();
                $arr_insert = array(
                    'morning_attendance'   =>   $m_attendance[$j],
                    'evening_attendance'   =>   $e_attendance[$j],
                    
                );
                // print_r(json_encode($arr_insert));die;
                array_push($Data,json_encode($arr_insert));

                // print_r($xyz_arr_data); die;
                $arr_insert_data= array(
                    'traveller_id'   =>   $traveller_id[$j],
                    'package_id'   =>   $id,
                    'tour_manager_id'   =>   $iid,
                    'package_date_id'   =>   $did,
                    'day_id'   =>   $day_id,
                    'morning_attendance'=> $Data
                );
                // print_r($arr_insert_data); die;


                
                // $json_data['morning_attendance'] = json_encode($arr_insert);
                // print_r($json_data); die;
                // $return = $this->master_model-> insertRecord($json_data);
                // print_r($return); die;
                $inserted_id = $this->master_model->insertRecord('traveller_attendance',$arr_insert_data,true);
                // $inserted_id = $this->json_model->insert_json_in_db($json_data);
            }
                $i++;
                // print_r($arr_insert); die;
                
            

                if($inserted_id == true)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/add');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            
            // }
       
        }
     }
     else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }

        $fields = "assign_staff.*,packages.tour_number,packages.tour_number_of_days,packages.tour_title,packages.tour_number,packages.tour_title,package_date.journey_date";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('assign_staff.package_id',$id);
        $this->db->where('assign_staff.package_date_id',$did);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
        $tour_arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $fields = "all_traveller_info.*";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('booking_basic_info.tour_date',$did);
        $this->db->join("booking_basic_info", 'all_traveller_info.domestic_enquiry_id=booking_basic_info.domestic_enquiry_id','left');
        $arr_data = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_arr_data']        = $tour_arr_data;
        $this->arr_view_data['day_id']        = $day_id;
        $this->arr_view_data['page_title']      = "Traveller Attendance";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }
	
  
    // Get Details of Package
    public function take_attendance($id,$did)
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


        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_number_of_days,packages.tour_title";
        $this->db->where('asign_tour_manager.is_deleted','no');
        $this->db->where('asign_tour_manager.package_id',$id);
        $this->db->where('asign_tour_manager.package_date_id',$did);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_number_of_days,packages.tour_title,packages.tour_number,packages.tour_title,package_date.journey_date";
        $this->db->where('asign_tour_manager.is_deleted','no');
        $this->db->where('asign_tour_manager.package_id',$id);
        $this->db->where('asign_tour_manager.package_date_id',$did);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_date", 'asign_tour_manager.package_date_id=package_date.id','left');
        $tour_arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_arr_data']        = $tour_arr_data;
        $this->arr_view_data['page_title']      = $this->module_title."";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."take_attendance";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }
   
   
}