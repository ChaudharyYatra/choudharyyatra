<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tm_account_details extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tm_account_details";
        $this->module_title       = "Tour Manager Account Details";
        $this->module_url_slug    = "tm_account_details";
        $this->module_view_folder = "tm_account_details/";    
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

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}
        
    
    public function add()
    {   
		$supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('bank_name', 'bank_name', 'required');
            $this->form_validation->set_rules('acc_no', 'acc_no', 'required');
            $this->form_validation->set_rules('acc_holder_nm', 'acc_holder_nm', 'required');
            $this->form_validation->set_rules('branch_name', 'branch_name', 'required');
            $this->form_validation->set_rules('branch_code', 'branch_code', 'required');
            $this->form_validation->set_rules('ifsc_code', 'ifsc_code', 'required');
            $this->form_validation->set_rules('cif_no', 'cif_no', 'required');
            $this->form_validation->set_rules('pan_no', 'pan_no', 'required');
            $this->form_validation->set_rules('aadhaar_no', 'aadhaar_no', 'required');

                $bank_name          = $this->input->post('bank_name'); 
                $acc_no             = $this->input->post('acc_no'); 
                $acc_holder_nm             = $this->input->post('acc_holder_nm');
                $branch_name             = $this->input->post('branch_name'); 
                $branch_code             = $this->input->post('branch_code'); 
                $ifsc_code             = $this->input->post('ifsc_code'); 
                $cif_no             = $this->input->post('cif_no'); 
                $pan_no             = $this->input->post('pan_no'); 
                $aadhaar_no             = $this->input->post('aadhaar_no');  
                $arr_insert = array(
                    'bank_name'   =>   $bank_name,
                    'account_no'        => $acc_no,
                    'acc_holder_nm'          => $acc_holder_nm,
                    'branch_name'          => $branch_name,
                    'branch_code'   =>   $branch_code,
                    'ifsc_code'        => $ifsc_code,
                    'cif_no'          => $cif_no,
                    'pan_no'          => $pan_no,
                    'aadhaar_no'          => $aadhaar_no,
                    'tour_manager_id'          => $iid

                );
                
                $inserted_id = $this->master_model->insertRecord('tm_account_details',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Tour Manager Account Details Added Successfully.");
                    redirect($this->module_url_path.'/add/.#bank_detail_alert.');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/add/.#bank_detail_alert.');
            
        }
        // print_r($package_type); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $tm_account_details = $this->master_model->getRecords('tm_account_details');
        // print_r($tm_account_details); die;  

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['tm_account_details'] = $tm_account_details;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

   
    // Delete
    
    public function delete($id)
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $id=base64_decode($id);
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('tm_account_details');
 
             if(empty($arr_data))
             {
                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                 redirect($this->module_url_path);
             }
             $arr_update = array('is_deleted' => 'yes');
             $arr_where = array("id" => $id);
                  
             if($this->master_model->updateRecord('tm_account_details',$arr_update,$arr_where))
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

    //  ===========================================

// Active/Inactive
  
public function active_inactive($id,$type)
{
    $id=base64_decode($id);
    if($id!='' && ($type == "yes" || $type == "no"))
    {   
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('tm_account_details');
        if(empty($arr_data))
        {
           $this->session->set_flashdata('error_message','Invalid Selection Of Record');
           redirect($this->module_url_path.'/add');
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
        
        if($this->master_model->updateRecord('tm_account_details',$arr_update,array('id' => $id)))
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
    redirect($this->module_url_path.'/add');   
}


    // ==================================================
   
    // Edit - Get data for edit
    
    public function edit($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');
        
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        else
        {   
            // $this->db->where('id',$id);
            // $arr_data = $this->master_model->getRecords('suggestion_module');
            if($this->input->post('submit'))
            {
                $bank_name          = $this->input->post('bank_name'); 
                $acc_no             = $this->input->post('acc_no'); 
                $acc_holder_nm             = $this->input->post('acc_holder_nm');
                $branch_name             = $this->input->post('branch_name'); 
                $branch_code             = $this->input->post('branch_code'); 
                $ifsc_code             = $this->input->post('ifsc_code'); 
                $cif_no             = $this->input->post('cif_no'); 
                $pan_no             = $this->input->post('pan_no'); 
                $aadhaar_no             = $this->input->post('aadhaar_no');  
                $arr_update = array(
                    'bank_name'   =>   $bank_name,
                    'account_no'        => $acc_no,
                    'acc_holder_nm'          => $acc_holder_nm,
                    'branch_name'          => $branch_name,
                    'branch_code'   =>   $branch_code,
                    'ifsc_code'        => $ifsc_code,
                    'cif_no'          => $cif_no,
                    'pan_no'          => $pan_no,
                    'aadhaar_no'          => $aadhaar_no
                );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('tm_account_details',$arr_update,$arr_where);
                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message'," Bank Account Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/add/.#acc_details.');
                
            }
        }
        

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('tm_account_details.id',$id);
        $tm_account_details = $this->master_model->getRecords('tm_account_details');
        // print_r($tm_account_details); die;  

        $this->arr_view_data['tm_account_details']        = $tm_account_details;
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

    public function details($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

		$tid=base64_decode($id);
        
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('tm_account_details.id',$tid);
        $tm_account_details = $this->master_model->getRecords('tm_account_details');
        // print_r($tm_account_details); die;  

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['tm_account_details']        = $tm_account_details;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

}