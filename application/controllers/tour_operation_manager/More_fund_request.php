<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class More_fund_request extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/more_fund_request";
        $this->module_title       = "Request More Fund to Tour Manager";
        // $this->module_title2       = "Hotel Advance Payment Details  ";
        $this->module_url_slug    = "more_fund_request";
        $this->module_view_folder = "more_fund_request/";    
        $this->load->library('upload');
	}
	

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $record = array();
        $fields = "tm_request_more_fund.*,packages.tour_title,packages.tour_number,package_type.package_type";
        $this->db->where('tm_request_more_fund.is_deleted','no');
        // $this->db->order_by('tm_request_more_fund.id','desc');
        $this->db->join("packages", 'tm_request_more_fund.tour_number=packages.id','left');
        $this->db->join("package_type", 'tm_request_more_fund.package_type=package_type.id','left');
        $arr_data = $this->master_model->getRecords('tm_request_more_fund',array('tm_request_more_fund.is_deleted'=>'no'),$fields);
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
            $this->form_validation->set_rules('approval_amt', 'approval_amt', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $approval_amt	  = $this->input->post('approval_amt');
                $tm_request_fund_id	  = $this->input->post('tm_request_fund_id');
               
                $today= date('Y-m-d');
                    $arr_update = array(
                        'tom_approval_amt'   =>   $approval_amt,
                        'tom_approval_date'   =>   $today

                    );
                    $arr_where     = array("id" => $tm_request_fund_id);
                    $inserted_id = $this->master_model->updateRecord('tm_request_more_fund',$arr_update,$arr_where);
                   
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message'," Approval Amount Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            
            }
       
        }


        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');  
        $package_type = $this->master_model->getRecords('package_type');

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['package_type']        = $package_type;
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
    
    public function delete($id)
    {

        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('hotel_advance_payment');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('hotel_advance_payment',$arr_update,$arr_where))
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

// =============================================

  //   Active/Inactive
public function active_inactive($id,$type)
{
  $id=base64_decode($id);
    if($id!='' && ($type == "yes" || $type == "no") )
    {   
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('tm_request_more_fund');
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
        
        if($this->master_model->updateRecord('tm_request_more_fund',$arr_update,array('id' => $id)))
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
// ===============================================

  public function get_package(){ 
    // POST data 
    // $all_b=array();
    $district_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('package_type',$district_data);   
                        $data = $this->master_model->getRecords('packages');
        echo json_encode($data);
    }

    public function get_hotel(){ 
        // POST data 
        // $all_b=array();
        $hotel_data = $this->input->post('did');
            // print_r($boarding_office_location); die;
                            $fields = "package_hotel.*,hotel.id,hotel.hotel_name";
                            $this->db->where('package_hotel.is_deleted','no');
                            $this->db->where('package_hotel.is_active','yes');
                            $this->db->where('package_hotel.package_id',$hotel_data);   
                            $this->db->join("hotel", 'package_hotel.hotel_name_id=hotel.id','left');
                            $data = $this->master_model->getRecords('package_hotel',array('package_hotel.is_deleted'=>'no'),$fields);
            echo json_encode($data);
        }


    public function getrolename(){ 
        // POST data 
        // $all_b=array();
        $getname = $this->input->post('did');
        // print_r($getname); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('role_type',$getname);   
                        $data = $this->master_model->getRecords('supervision');
        echo json_encode($data);
    }


    public function advance_pay_detail()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('hotel_advance_payment');
        // print_r($arr_data); die;

        $fields = "hotel_advance_pay_details.*,hotel_advance_payment.*,package_type.package_type,packages.tour_title,hotel.hotel_name";
        $this->db->where('hotel_advance_payment.is_deleted','no');
        $this->db->where('hotel_advance_pay_details.is_deleted','no');
        $this->db->where('hotel_advance_pay_details.send','yes');
        $this->db->join("package_type", 'hotel_advance_payment.package_type=package_type.id','left');
        $this->db->join("packages", 'hotel_advance_payment.tour_number=packages.id','left');
        $this->db->join("hotel", 'hotel_advance_payment.hotel_name=hotel.id','left');
        $this->db->join("hotel_advance_pay_details", 'hotel_advance_payment.id=hotel_advance_pay_details.advance_pay_req_id','left');
        $arr_data = $this->master_model->getRecords('hotel_advance_payment',array('hotel_advance_payment.is_deleted'=>'no'),$fields);


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title2." List";
        $this->arr_view_data['module_title2']    = $this->module_title2;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."advance_pay_detail";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
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