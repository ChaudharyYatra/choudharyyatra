<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company_information extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('account_panel_slug')."account/company_information";
        $this->module_title       = "Company Information";
        $this->module_url_slug    = "company_information";
        $this->module_view_folder = "company_information/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $fields = "company_information.*";
        $this->db->order_by('id','desc');
        $this->db->where('company_information.is_deleted','no');
        $arr_data = $this->master_model->getRecords('company_information',array('company_information.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
       
	}
	
	

    public function add()
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        if($this->input->post('submit'))
        {        
            $this->form_validation->set_rules('company_name', 'company_name', 'required');      
            $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');      
            $this->form_validation->set_rules('email_address', 'email_address', 'required');      
            $this->form_validation->set_rules('comp_address', 'comp_address', 'required');

            $this->form_validation->set_rules('gst_no', 'gst_no', 'required');      
            $this->form_validation->set_rules('upi_no', 'upi_no', 'required');      
            $this->form_validation->set_rules('pan_no', 'pan_no', 'required');   
            
            $this->form_validation->set_rules('bank_name', 'bank_name', 'required');      
            $this->form_validation->set_rules('acc_no', 'acc_no', 'required');      
            $this->form_validation->set_rules('acc_holder_name', 'acc_holder_name', 'required');      
            $this->form_validation->set_rules('ifsc_code', 'ifsc_code', 'required');      
            $this->form_validation->set_rules('micr_code', 'micr_code', 'required');      
            $this->form_validation->set_rules('branch_name', 'branch_name', 'required');      
            

            
            if($this->form_validation->run() == TRUE)
            {
                $company_name = $this->input->post('company_name');
                $mobile_number = $this->input->post('mobile_number');
                $email_address =$this->input->post('email_address');
                $comp_address =$this->input->post('comp_address');

                $gst_no =$this->input->post('gst_no');
                $upi_no =$this->input->post('upi_no');
                $pan_no =$this->input->post('pan_no');

                $bank_name =$this->input->post('bank_name');
                $acc_no =$this->input->post('acc_no');
                $acc_holder_name =$this->input->post('acc_holder_name');
                $ifsc_code =$this->input->post('ifsc_code');
                $micr_code =$this->input->post('micr_code');
                $branch_name =$this->input->post('branch_name');

                $arr_insert = array(               
                    'company_name'  => $company_name,
                    'mobile_number'  => $mobile_number,
                    'email_address'  => $email_address,
                    'comp_address'  => $comp_address,

                    'gst_no'  => $gst_no,
                    'upi_no'  => $upi_no,
                    'pan_no'  => $pan_no,

                    'bank_name'  => $bank_name,
                    'acc_no'  => $acc_no,
                    'acc_holder_name'  => $acc_holder_name,
                    'ifsc_code'  => $ifsc_code,
                    'micr_code'  => $micr_code,
                    'branch_name'  => $branch_name

                ); 
                                
                $inserted_id = $this->master_model->insertRecord('company_information',$arr_insert,true);
                               
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

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
    }

    
   
    
   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('company_information');
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
            
            if($this->master_model->updateRecord('company_information',$arr_update,array('id' => $id)))
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
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('company_information');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('company_name', 'company_name', 'required');      
                $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');      
                $this->form_validation->set_rules('email_address', 'email_address', 'required');      
                $this->form_validation->set_rules('comp_address', 'comp_address', 'required');

                $this->form_validation->set_rules('gst_no', 'gst_no', 'required');      
                $this->form_validation->set_rules('upi_no', 'upi_no', 'required');      
                $this->form_validation->set_rules('pan_no', 'pan_no', 'required');   
                
                $this->form_validation->set_rules('bank_name', 'bank_name', 'required');      
                $this->form_validation->set_rules('acc_no', 'acc_no', 'required');      
                $this->form_validation->set_rules('acc_holder_name', 'acc_holder_name', 'required');      
                $this->form_validation->set_rules('ifsc_code', 'ifsc_code', 'required');      
                $this->form_validation->set_rules('micr_code', 'micr_code', 'required');      
                $this->form_validation->set_rules('branch_name', 'branch_name', 'required');
                if($this->form_validation->run() == TRUE)
                {
                    $company_name = $this->input->post('company_name');
                    $mobile_number = $this->input->post('mobile_number');
                    $email_address =$this->input->post('email_address');
                    $comp_address =$this->input->post('comp_address');

                    $gst_no =$this->input->post('gst_no');
                    $upi_no =$this->input->post('upi_no');
                    $pan_no =$this->input->post('pan_no');

                    $bank_name =$this->input->post('bank_name');
                    $acc_no =$this->input->post('acc_no');
                    $acc_holder_name =$this->input->post('acc_holder_name');
                    $ifsc_code =$this->input->post('ifsc_code');
                    $micr_code =$this->input->post('micr_code');
                    $branch_name =$this->input->post('branch_name');
                    $arr_update = array(
                        'company_name'  => $company_name,
                        'mobile_number'  => $mobile_number,
                        'email_address'  => $email_address,
                        'comp_address'  => $comp_address,

                        'gst_no'  => $gst_no,
                        'upi_no'  => $upi_no,
                        'pan_no'  => $pan_no,

                        'bank_name'  => $bank_name,
                        'acc_no'  => $acc_no,
                        'acc_holder_name'  => $acc_holder_name,
                        'ifsc_code'  => $ifsc_code,
                        'micr_code'  => $micr_code,
                        'branch_name'  => $branch_name
                    );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('company_information',$arr_update,$arr_where);
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
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $qr_code_master_data = $this->master_model->getRecords('company_information');
        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['qr_code_master_data']   = $qr_code_master_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
    }

     
    public function delete($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('company_information');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('company_information',$arr_update,$arr_where))
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

    // Get Details of Package
    public function details($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "company_information.*";
        $this->db->where('company_information.id',$id);
        $arr_data = $this->master_model->getRecords('company_information',array('company_information.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
    }
   

}