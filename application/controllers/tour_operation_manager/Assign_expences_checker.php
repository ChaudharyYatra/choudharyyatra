<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assign_expences_checker extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/assign_expences_checker";
        $this->module_title       = "Assign Expences Checker";
        $this->module_url_slug    = "assign_expences_checker";
        $this->module_view_folder = "assign_expences_checker/";    
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
        $fields = "supervision.*";
        $this->db->where('supervision.is_deleted','no');
        $this->db->where('supervision.is_active','yes');
        $this->db->where('supervision.role_type','6');
        $arr_data = $this->master_model->getRecords('supervision',array('supervision.is_deleted'=>'no'),$fields);
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
	

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $fields = "assign_expences_checker.*,supervision.supervision_name,expences_checker_master.expences_checker_name";
        $this->db->where('assign_expences_checker.is_deleted','no');
        $this->db->join("supervision", 'assign_expences_checker.tour_manager_name=supervision.id','left');
        $this->db->join("expences_checker_master", 'assign_expences_checker.expences_checker_name=expences_checker_master.id','left');
        $this->db->group_by('tour_manager_name'); 
        $arr_data = $this->master_model->getRecords('assign_expences_checker',array('assign_expences_checker.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}
	
	
    public function add()
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');   

        if($this->input->post('submit'))
        {

            $this->form_validation->set_rules('tour_manager_name', 'tour_manager_name', 'required');
            $this->form_validation->set_rules('expences_checker_name', 'expences_checker_name', 'required');

            
            if($this->form_validation->run() == TRUE)
            {

                $tour_manager_name	  = $this->input->post('tour_manager_name'); 
                $expences_checker_name	  = $this->input->post('expences_checker_name');


                    $arr_insert = array(
                        'tour_manager_name'   =>   $tour_manager_name,
                        'expences_checker_name'   =>   $expences_checker_name
                    );

                    $this->db->where('tour_manager_name',$tour_manager_name);
                    $this->db->where('is_deleted','no');
                    $this->db->where('is_active','yes');
                    $assign_expences_checker_data = $this->master_model->getRecords('assign_expences_checker');

                    if(count($assign_expences_checker_data) > 0)
                    {
                    $this->session->set_flashdata('error_message',"For This Tour Manager Already Assign Expences Checker.");
                    redirect($this->module_url_path.'/add');
                    }

                    $inserted_id = $this->master_model->insertRecord('assign_expences_checker',$arr_insert,true);
                               
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            
            }
       
        }


        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');  
        // $this->db->where('role_type','6'); 
        
        // $tour_manager_name = $this->master_model->getRecords('supervision');

        $fields = "supervision.*,assign_staff.name,assign_staff.role_name";
        $this->db->where('supervision.is_deleted','no');
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('supervision.is_active','yes');  
        $this->db->where('assign_staff.is_active','yes'); 
        $this->db->where('supervision.role_type','6'); 
        // $this->db->where('assign_staff.role_name','6'); 
        $this->db->join("assign_staff", 'supervision.id=assign_staff.name','left');
        $this->db->group_by('assign_staff.name');
        $tour_manager_name = $this->master_model->getRecords('supervision',array('supervision.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');  
        $expences_checker_name = $this->master_model->getRecords('expences_checker_master');

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['tour_manager_name']        = $tour_manager_name;
        $this->arr_view_data['expences_checker_name']        = $expences_checker_name;
        $this->arr_view_data['iid']        = $iid;
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
            $arr_data = $this->master_model->getRecords('assign_expences_checker');
            // print_r($arr_data); die;
  
        
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('tour_manager_name', 'tour_manager_name', 'required');
                $this->form_validation->set_rules('expences_checker_name', 'expences_checker_name', 'required');
                
                
                if($this->form_validation->run() == TRUE)
                {
                    // print_r('hiiiiiiii'); die;
                    $tour_manager_name	  = $this->input->post('tour_manager_name'); 
                    $expences_checker_name	  = $this->input->post('expences_checker_name');
                
                    $this->db->where('tour_manager_name',$tour_manager_name);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $assign_expences_checker_data = $this->master_model->getRecords('assign_expences_checker');
                    // print_r('hiiiiiiii'); die;
                    if(count($assign_expences_checker_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"For This Tour Manager Already Assign Expences Checker.");
                        redirect($this->module_url_path.'/add');
                    }


                        $arr_update = array(
                            'tour_manager_name'   =>   $tour_manager_name,
                            'expences_checker_name'   =>   $expences_checker_name
                        );

                    
                        $arr_where     = array("id" => $id);
                        $this->master_model->updateRecord('assign_expences_checker',$arr_update,$arr_where);
                

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
        $this->db->where('role_type','6'); 
        $tour_manager_name = $this->master_model->getRecords('supervision');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');  
        $expences_checker_name = $this->master_model->getRecords('expences_checker_master');
        // print_r($package_type); die;

        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_manager_name']        = $tour_manager_name;
        $this->arr_view_data['expences_checker_name']        = $expences_checker_name;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
    }

    // Delete
    
    public function delete($id)
    {

        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('assign_expences_checker');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('assign_expences_checker',$arr_update,$arr_where))
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