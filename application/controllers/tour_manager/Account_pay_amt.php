<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_pay_amt extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/account_pay_amt";
        $this->module_title       = "Requested pay amount from account";
        $this->module_url_slug    = "account_pay_amt";
        $this->module_view_folder = "account_pay_amt/";    
        $this->load->library('upload');
	}

	public function index()
	{ 
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id'); 

        $record = array();
        $fields = "tm_request_more_fund.*,packages.tour_title,packages.tour_number,package_type.package_type,
        account_pay_details.payment_date,account_pay_details.payment_mode,account_pay_details.transaction_id,account_pay_details.transaction_amt,
        account_pay_details.image_name,account_pay_details.id as acc_id,account_pay_details.send as account_send,tm_account_details.bank_name,tm_account_details.account_no,
        tm_account_details.acc_holder_nm,tm_account_details.branch_name,tm_account_details.branch_code,
        tm_account_details.ifsc_code,tm_account_details.cif_no,tm_account_details.pan_no,tm_account_details.aadhaar_no";
        $this->db->where('tm_request_more_fund.is_deleted','no');
        $this->db->where('account_pay_details.send','yes');
        // $this->db->order_by('tm_request_more_fund.id','desc');
        $this->db->join("packages", 'tm_request_more_fund.tour_number=packages.id','left');
        $this->db->join("package_type", 'tm_request_more_fund.package_type=package_type.id','left');
        $this->db->join("account_pay_details", 'tm_request_more_fund.id=account_pay_details.tm_request_more_fund_id','left');
        $this->db->join("tm_account_details", 'tm_request_more_fund.Select_bank=tm_account_details.id','left');
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



        public function received_amt_from_acc()
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');   

        if($this->input->post('submit'))
        {  
            $this->form_validation->set_rules('received_amt_from_account', 'received_amt_from_account', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $received_amt_from_account	  = $this->input->post('received_amt_from_account'); 
                $account_pay_id	  = $this->input->post('account_pay_id'); 
                $tm_request_more_fund_id	  = $this->input->post('tm_request_more_fund_id'); 
                
                    $arr_update = array(
                        'received_amt_from_acc'   =>   $received_amt_from_account,
                        'Received_amt_status'          => 'yes',

                    );
                    $arr_where     = array("id" => $account_pay_id);
                    $inserted_id = $this->master_model->updateRecord('account_pay_details',$arr_update,$arr_where);

                    $arr_update = array(
                        'received_amt_from_acc'   =>   $received_amt_from_account,
                        'Received_amt_status'   =>   'yes' 
                    );
                
                    $arr_where     = array("id" => $tm_request_more_fund_id);
                    $this->master_model->updateRecord('tm_request_more_fund',$arr_update,$arr_where);
                
                            
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
        $this->arr_view_data['page_title']      = " Hotel Adavance Payment";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
    }
       
}