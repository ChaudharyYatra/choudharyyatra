<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_pay_amt_details extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('account')."account/account_pay_amt_details";
        $this->module_title       = "Requested pay amount from account";
        $this->module_url_slug    = "account_pay_amt_details";
        $this->module_view_folder = "account_pay_amt_details/";    
        $this->load->library('upload');
	}

	public function index()
	{ 
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $record = array();
        $fields = "tm_request_more_fund.*,packages.tour_title,packages.tour_number,package_type.package_type,
        account_pay_details.payment_date,account_pay_details.payment_mode,account_pay_details.transaction_id,account_pay_details.transaction_amt,
        account_pay_details.image_name,tm_account_details.bank_name,tm_account_details.account_no,
        tm_account_details.acc_holder_nm,tm_account_details.branch_name,tm_account_details.branch_code,
        tm_account_details.ifsc_code,tm_account_details.cif_no,tm_account_details.pan_no,tm_account_details.aadhaar_no,
        account_pay_details.id as acc_id";
        $this->db->where('tm_request_more_fund.is_deleted','no');
        $this->db->where('account_pay_details.Received_amt_status','yes');
        // $this->db->order_by('tm_request_more_fund.id','desc');
        $this->db->join("packages", 'tm_request_more_fund.tour_number=packages.id','left');
        $this->db->join("package_type", 'tm_request_more_fund.package_type=package_type.id','left');
        $this->db->join("account_pay_details", 'tm_request_more_fund.id=account_pay_details.tm_request_more_fund_id','left');
        $this->db->join("tm_account_details", 'tm_request_more_fund.Select_bank=tm_account_details.id','left');
        $arr_data = $this->master_model->getRecords('tm_request_more_fund',array('tm_request_more_fund.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['supervision_sess_name']        = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
       
	}
      

}