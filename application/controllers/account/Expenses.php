<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Expenses extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('account_panel_slug')."account/expenses";
        $this->module_title       = "Expenses Information";
        $this->module_url_slug    = "expenses";
        $this->module_view_folder = "expenses/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $fields = "expenses_account.*,voucher_types.voucher_type,company_information.company_name,company_information.acc_no,
        add_more_expenses_account.particular_expenses,add_more_expenses_account.amount,add_more_expenses_account.expenses_account_id,add_more_expenses_account.id as add_exp_acc_id";
        $this->db->order_by('id','desc');
        $this->db->where('expenses_account.is_deleted','no');
        $this->db->join("voucher_types", 'expenses_account.voucher_type_id=voucher_types.id','left');
        $this->db->join("company_information", 'expenses_account.company_name_id=company_information.id','left');
        $this->db->join("add_more_expenses_account", 'expenses_account.id=add_more_expenses_account.expenses_account_id','left');
        $this->db->group_by('add_more_expenses_account.expenses_account_id');
        $arr_data = $this->master_model->getRecords('expenses_account',array('expenses_account.is_deleted'=>'no'),$fields);
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
            $this->form_validation->set_rules('voucher_type', 'voucher_type', 'required');  
            $this->form_validation->set_rules('company_name', 'company_name', 'required');   
            $this->form_validation->set_rules('account_no', 'account_no', 'required');      
            $this->form_validation->set_rules('expenses_details', 'expenses_details', 'required');      
            $this->form_validation->set_rules('tour_expenses_type', 'tour_expenses_type', 'required');  

            // $this->form_validation->set_rules('single_particular_expenses', 'single_particular_expenses', 'required');      
            // $this->form_validation->set_rules('single_total_amount', 'single_total_amount', 'required');  
            
            // // $this->form_validation->set_rules('multiple_total_amount', 'multiple_total_amount', 'required');  
            // $this->form_validation->set_rules('particular_expenses', 'particular_expenses', 'required');  
            // $this->form_validation->set_rules('amount', 'amount', 'required');  
            
            if($this->form_validation->run() == TRUE)
            {
                // print_r($_REQUEST); die;
                $voucher_type = $this->input->post('voucher_type');
                $company_name = $this->input->post('company_name');
                $account_no = $this->input->post('account_no');
                $expenses_details = $this->input->post('expenses_details');
                $tour_expenses_type = $this->input->post('tour_expenses_type');

                $single_particular_expenses = $this->input->post('single_particular_expenses');
                $single_total_amount = $this->input->post('single_total_amount');

                $multiple_total_amount = $this->input->post('multiple_total_amount');
                $particular_expenses = $this->input->post('particular_expenses');
                // print_r($particular_expenses); die;
                $amount = $this->input->post('amount');
      
                $arr_insert = array(               
                    'voucher_type_id'  => $voucher_type,
                    'company_name_id'  => $company_name,
                    'account_no_id'  => $account_no,
                    'expenses_details'  => $expenses_details,
                    'tour_expenses_type'  => $tour_expenses_type,
                    'single_particular_expenses'  => $single_particular_expenses,
                    'multiple_total_amount'  => $multiple_total_amount,
                    'single_total_amount'  => $single_total_amount
                ); 
                $inserted_id = $this->master_model->insertRecord('expenses_account',$arr_insert,true);
                $current_tour_expenses_id = $this->db->insert_id(); 

                if($tour_expenses_type == '0'){
                    $count = count($particular_expenses);
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(               
                        'particular_expenses'  => $_POST["particular_expenses"][$i],
                        'amount'  => $_POST["amount"][$i],
                        'expenses_account_id'  => $current_tour_expenses_id
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_expenses_account',$arr_insert,true);
                    }
                }

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

        $this->db->order_by('id','desc');
        $this->db->where('voucher_types.is_deleted','no');
        $voucher_types = $this->master_model->getRecords('voucher_types');
        // print_r($arr_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('company_information.is_deleted','no');
        $company_information = $this->master_model->getRecords('company_information');

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['voucher_types']        = $voucher_types;
        $this->arr_view_data['company_information']        = $company_information;
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
            $arr_data = $this->master_model->getRecords('expenses_account');
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
            
            if($this->master_model->updateRecord('expenses_account',$arr_update,array('id' => $id)))
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
        // print_r($id);
		// $c_id=base64_decode($c_id);
        // print_r($c_id); die;
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        else
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('expenses_account');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('voucher_type', 'voucher_type', 'required');      
                $this->form_validation->set_rules('company_name', 'company_name', 'required');      
                $this->form_validation->set_rules('account_no', 'account_no', 'required');  
                $this->form_validation->set_rules('expenses_details', 'expenses_details', 'required');
                 
               
                if($this->form_validation->run() == TRUE)
                {
                    $voucher_type = $this->input->post('voucher_type');
                    $company_name = $this->input->post('company_name');
                    $account_no = $this->input->post('account_no');
                    $expenses_details = $this->input->post('expenses_details');
                    $tour_expenses_type = $this->input->post('tour_expenses_type');

                    $single_particular_expenses = $this->input->post('single_particular_expenses');
                    $single_total_amount = $this->input->post('single_total_amount');

                    $particular_expenses = $this->input->post('particular_expenses');
                    $amount = $this->input->post('amount');
                    $multiple_total_amount = $this->input->post('multiple_total_amount');

                    $expenses_company_name_id = $this->input->post('expenses_company_name_id');
                    // print_r($expenses_company_name_id); die;
                    
                    $arr_update = array(
                        'voucher_type_id'  => $voucher_type,
                        'company_name_id'  => $company_name,
                        'account_no_id'  => $account_no,
                        'expenses_details'  => $expenses_details,
                        'tour_expenses_type'  => $tour_expenses_type,
                        'single_particular_expenses'  => $single_particular_expenses,
                        'single_total_amount'  => $single_total_amount,
                        'multiple_total_amount'  => $multiple_total_amount
                    );
                
                    $arr_where     = array("id" => $id);
                    $inserted_id = $this->master_model->updateRecord('expenses_account',$arr_update,$arr_where);

                    if($tour_expenses_type == '0'){
                        $count = count($particular_expenses);
                        // print_r($count); die;
                        for($i=0;$i<$count;$i++)
                        {
                        $arr_update = array(
                        'particular_expenses'   =>   $_POST["particular_expenses"][$i],
                        'amount'   =>   $_POST["amount"][$i]
                        ); 
                        // print_r($arr_update); die;
                        $arr_where     = array("id" => $expenses_company_name_id[$i]);
                        $inserted_id = $this->master_model->updateRecord('add_more_expenses_account',$arr_update,$arr_where);
                        }
                        
                    }

                    $edit_particular_expenses = $this->input->post('edit_particular_expenses');
                    $edit_amount = $this->input->post('edit_amount');
                    $add_more_expenses_id = $this->input->post('add_more_expenses_id');

                    if($edit_particular_expenses != ''){
                        $count = count($edit_particular_expenses);
                        // print_r($count); die;
                        for($i=0;$i<$count;$i++)
                        {
                        $arr_insert = array(
                        'particular_expenses'   =>   $_POST["edit_particular_expenses"][$i],
                        'amount'   =>   $_POST["edit_amount"][$i],
                        'expenses_account_id' => $add_more_expenses_id
                        
                        ); 
                        $inserted_id = $this->master_model->insertRecord('add_more_expenses_account',$arr_insert,true);
                        }
                    }

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
        $qr_code_master_data = $this->master_model->getRecords('group');

        $fields = "group.*";
        // $this->db->where('group.id',$id);
        $arr_data_group = $this->master_model->getRecords('group',array('group.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $fields = "expenses_account.*,voucher_types.voucher_type,company_information.company_name,company_information.acc_no";
        $this->db->order_by('id','desc');
        $this->db->where('expenses_account.id',$id);
        $this->db->where('expenses_account.is_deleted','no');
        $this->db->join("voucher_types", 'expenses_account.voucher_type_id=voucher_types.id','left');
        $this->db->join("company_information", 'expenses_account.company_name_id=company_information.id','left');
        $expenses_account = $this->master_model->getRecords('expenses_account',array('expenses_account.is_deleted'=>'no'),$fields);
        // print_r($expenses_account); die;

        // $fields = "expenses_account.*,voucher_types.voucher_type,company_information.company_name,company_information.acc_no,
        // add_more_expenses_account.particular_expenses,add_more_expenses_account.amount,add_more_expenses_account.expenses_account_id,add_more_expenses_account.id as add_expense_acc_id";
        // $this->db->order_by('id','desc');
        // $this->db->where('add_more_expenses_account.expenses_account_id',$id);
        // $this->db->where('expenses_account.is_deleted','no');
        // $this->db->join("voucher_types", 'expenses_account.voucher_type_id=voucher_types.id','left');
        // $this->db->join("company_information", 'expenses_account.company_name_id=company_information.id','left');
        // $this->db->join("add_more_expenses_account", 'expenses_account.id=add_more_expenses_account.expenses_account_id','left');
        // $multiple_expenses_account = $this->master_model->getRecords('expenses_account',array('expenses_account.is_deleted'=>'no'),$fields);
        // // print_r($multiple_expenses_account); die;

        $fields = "add_more_expenses_account.*";
        $this->db->order_by('id','desc');
        $this->db->where('add_more_expenses_account.is_deleted','no');
        $this->db->where('add_more_expenses_account.expenses_account_id',$id);
        $this->db->join("expenses_account", 'add_more_expenses_account.expenses_account_id=expenses_account.id','left');
        $multiple_expenses_account = $this->master_model->getRecords('add_more_expenses_account',array('add_more_expenses_account.is_deleted'=>'no'),$fields);
        // print_r($multiple_expenses_account); die;


        $this->db->order_by('id','desc');
        $this->db->where('voucher_types.is_deleted','no');
        $voucher_types = $this->master_model->getRecords('voucher_types');
        // print_r($arr_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('company_information.is_deleted','no');
        $company_information = $this->master_model->getRecords('company_information');
        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['qr_code_master_data']   = $qr_code_master_data;
        $this->arr_view_data['arr_data_group']        = $arr_data_group;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['expenses_account']        = $expenses_account;
        $this->arr_view_data['multiple_expenses_account']        = $multiple_expenses_account;
        $this->arr_view_data['voucher_types']        = $voucher_types;
        $this->arr_view_data['company_information']        = $company_information;
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
            $arr_data = $this->master_model->getRecords('expenses_account');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('expenses_account',$arr_update,$arr_where))
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
        
        $fields = "expenses_account.*,voucher_types.voucher_type,company_information.company_name,company_information.acc_no,
        add_more_expenses_account.particular_expenses,add_more_expenses_account.amount,add_more_expenses_account.expenses_account_id,add_more_expenses_account.id as add_exp_acc_id";
        $this->db->order_by('id','desc');
        $this->db->where('expenses_account.id',$id);
        $this->db->where('expenses_account.is_deleted','no');
        $this->db->join("voucher_types", 'expenses_account.voucher_type_id=voucher_types.id','left');
        $this->db->join("company_information", 'expenses_account.company_name_id=company_information.id','left');
        $this->db->join("add_more_expenses_account", 'expenses_account.id=add_more_expenses_account.expenses_account_id','left');
        $this->db->group_by('add_more_expenses_account.expenses_account_id');
        $arr_data = $this->master_model->getRecords('expenses_account',array('expenses_account.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $fields = "expenses_account.*,voucher_types.voucher_type,company_information.company_name,company_information.acc_no,
        add_more_expenses_account.particular_expenses,add_more_expenses_account.amount,add_more_expenses_account.expenses_account_id,add_more_expenses_account.id as add_exp_acc_id";
        $this->db->order_by('id','desc');
        $this->db->where('expenses_account.id',$id);
        $this->db->where('expenses_account.is_deleted','no');
        $this->db->join("voucher_types", 'expenses_account.voucher_type_id=voucher_types.id','left');
        $this->db->join("company_information", 'expenses_account.company_name_id=company_information.id','left');
        $this->db->join("add_more_expenses_account", 'expenses_account.id=add_more_expenses_account.expenses_account_id','left');
        // $this->db->group_by('add_more_expenses_account.expenses_account_id');
        $arr_data_details = $this->master_model->getRecords('expenses_account',array('expenses_account.is_deleted'=>'no'),$fields);
        // print_r($arr_data_details); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data_details']        = $arr_data_details;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
    }


    public function get_company_account_no(){

        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $did_upi = $this->input->post('did');
        
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->where('id',$did_upi);   
            $data = $this->master_model->getRecords('company_information');
            
            echo json_encode($data); 

        }


        public function add_more_delete()
        {
            $id  = $this->input->post('request_id');
            // print_r($id); die;
            if(is_numeric($id))
            {   
                $this->db->where('id',$id);
                $arr_data = $this->master_model->getRecords('add_more_expenses_account');

                if(empty($arr_data))
                {
                    $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                    redirect($this->module_url_path);
                }
                $arr_update = array('is_deleted' => 'yes');
                $arr_where = array("id" => $id);
                    
                if($this->master_model->updateRecord('add_more_expenses_account',$arr_update,$arr_where))
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

            return true; 
        }

}