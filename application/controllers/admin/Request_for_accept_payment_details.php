<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Request_for_accept_payment_details extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/request_for_accept_payment_details";
        $this->module_url_path_dates    =  base_url().$this->config->item('admin_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('admin_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('admin_panel_slug')."/domestic_package_review";
        $this->module_title       = "Request From Agent For Payment Details";
        $this->module_url_slug    = "request_for_accept_payment_details";
        $this->module_view_folder = "request_for_accept_payment_details/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $fields = "qr_code_master.*,role_type.role_name,qr_code_add_more.mobile_number,qr_code_add_more.upi_id,
        qr_code_add_more.account_number,qr_code_add_more.bank_name,qr_code_add_more.company_account_yes_no,qr_code_add_more.qr_code_image,qr_code_add_more.upi_app_name,
        upi_apps_name.payment_app_name,qr_code_add_more.id as qr_add_more_id,qr_code_add_more.is_active as qr_code_is_active,qr_code_add_more.status";
        $this->db->order_by('id','ASC');
        $this->db->where('qr_code_master.is_deleted','no');
        $this->db->where('qr_code_add_more.is_deleted','no');
        // $this->db->where('qr_code_master.agent_id',$id);
        $this->db->where('qr_code_master.is_agent','Yes');
        $this->db->join("role_type", 'qr_code_master.role_name=role_type.id','left');
        $this->db->join("qr_code_add_more", 'qr_code_master.id=qr_code_add_more.qr_code_master_id','left');
        $this->db->join("upi_apps_name", 'qr_code_add_more.upi_app_name=upi_apps_name.id','left');
        $this->db->group_by('qr_code_master.agent_id');
        $arr_data = $this->master_model->getRecords('qr_code_master',array('qr_code_master.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title."";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}
	

   
//   Active/Inactive
public function active_inactive($id,$type,$did)
{
//   $id=base64_decode($iid);
//   $did=base64_decode($did);
    if($id!='' && ($type == "yes" || $type == "no") )
    {   
        $this->db->where('id',$did);
        // $this->db->where('qr_code_master_id',$iid);
        $arr_data = $this->master_model->getRecords('qr_code_add_more');
        if(empty($arr_data))
        {
           $this->session->set_flashdata('error_message','Invalid Selection Of Record');
           redirect($this->module_url_path.'/index');
        }   

        $arr_update =  array();

        if($type == 'no')
        {
            // $arr_update['is_active'] = "no";
            $arr_update['status'] = "yes";
        }
        else
        {
            // $arr_update['is_active'] = "yes"; 
            $arr_update['status'] = "no";
        }
        
        if($this->master_model->updateRecord('qr_code_add_more',$arr_update,array('id' => $did)))
        {
            $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
            redirect($this->module_url_path.'/details/'.$id);
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
    redirect($this->module_url_path.'/details/'.$id);   
}


// Get Details of Package
public function details($id)
{
    // $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
    // $iid = $this->session->userdata('vehicle_owner_sess_id');

    // $id=base64_decode($did);
    if ($id=='') 
    {
        $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        redirect($this->module_url_path.'/index');
    }   

    $fields = "qr_code_master.*,role_type.role_name,qr_code_add_more.mobile_number,qr_code_add_more.upi_id,
    qr_code_add_more.account_number,qr_code_add_more.bank_name,qr_code_add_more.company_account_yes_no,qr_code_add_more.qr_code_image,qr_code_add_more.upi_app_name,
    upi_apps_name.payment_app_name,qr_code_add_more.id as qr_add_more_id,qr_code_add_more.is_active as qr_code_is_active,qr_code_add_more.status,qr_code_add_more.created_at as qr_add_creat_date,qr_code_add_more.reject_remark";
    $this->db->order_by('id','ASC');
    $this->db->where('qr_code_master.is_deleted','no');
    $this->db->where('qr_code_add_more.is_deleted','no');
    $this->db->where('qr_code_add_more.is_active','yes');
    $this->db->where('qr_code_add_more.qr_code_master_id',$id);
    $this->db->where('qr_code_master.is_agent','Yes');
    $this->db->join("role_type", 'qr_code_master.role_name=role_type.id','left');
    $this->db->join("qr_code_add_more", 'qr_code_master.id=qr_code_add_more.qr_code_master_id','left');
    $this->db->join("upi_apps_name", 'qr_code_add_more.upi_app_name=upi_apps_name.id','left');
    // $this->db->group_by('qr_code_master.agent_id');
    $arr_data = $this->master_model->getRecords('qr_code_master',array('qr_code_master.is_deleted'=>'no'),$fields);
    // print_r($arr_data); die;
    
    // $this->arr_view_data['vehicle_ssession_owner_name']        = $vehicle_ssession_owner_name;
    $this->arr_view_data['arr_data']        = $arr_data;
    $this->arr_view_data['page_title']      = $this->module_title."";
    $this->arr_view_data['module_title']    = $this->module_title;
    $this->arr_view_data['module_url_path'] = $this->module_url_path;
    $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
    $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
}


public function add()
{
    if($this->input->post('submit'))
    {
        $reject_reason = $this->input->post('reject_reason');
        $qr_add_more_id = $this->input->post('qr_add_more_id');
        $qr_id = $this->input->post('qr_id');
        // print_r($qr_id); die;

        $arr_update = array(
            'reject_remark' => $reject_reason,
            'status' => 'no'
        );
        // print_r($arr_update); die;
        $arr_where     = array("id" => $qr_add_more_id);
        $inserted = $this->master_model->updateRecord('qr_code_add_more',$arr_update,$arr_where);
    
        if($inserted > 0){
        $this->session->set_flashdata('success_message'," Reason Added Successfully.");
        redirect($this->module_url_path.'/details/'.$qr_id);
        }  
        else{
            $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
            redirect($this->module_url_path.'/details/'.$qr_id);
        } 
    }
}

 // Edit - Get data for edit
    
//  public function add()
//  {
//     // $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
//     // $iid = $this->session->userdata('vehicle_owner_sess_id');

//         if($this->input->post('submit'))
//          {
//             // print_r($_REQUEST); die;
//              $this->form_validation->set_rules('reject_remark', 'reject_remark', 'required');
             
//              if($this->form_validation->run() == TRUE)
//              {
//                 $reject_remark = trim($this->input->post('reject_remark'));
//                 $qr_add_more_id = trim($this->input->post('qr_add_more_id'));
                
//                 $arr_update = array(
//                      'reject_remark' => $reject_remark,
//                  );
//                  $arr_where     = array("id" => $qr_add_more_id);
//                 $inserted = $this->master_model->updateRecord('qr_code_add_more',$arr_update,$arr_where);
//                  if($inserted > 0)
//                  {
//                      $this->session->set_flashdata('success_message',"Reason Added Successfully.");
//                  }
//                  else
//                  {
//                      $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
//                  }
//                  redirect($this->module_url_path.'/index');
//              }   
//          }
      
//     // //  $this->arr_view_data['arr_data']        = $arr_data;
//     //  $this->arr_view_data['page_title']      = "add".$this->module_title;
//     //  $this->arr_view_data['module_title']    = $this->module_title;
//     //  $this->arr_view_data['module_url_path'] = $this->module_url_path;
//     //  $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
//     //  $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
//  }
   
   
}