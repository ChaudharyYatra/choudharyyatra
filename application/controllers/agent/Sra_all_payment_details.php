<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sra_all_payment_details extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/sra_all_payment_details";
        $this->module_title       = "SRA particular customer Record";
        $this->module_url_slug    = "sra_all_payment_details";
        $this->module_view_folder = "sra_all_payment_details/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $agent_sess_name = $this->session->userdata('agent_name');
        $iid = $this->session->userdata('agent_sess_id');
       // print_r($iid); die;

        $fields = "sra_payment.*,package_date.journey_date,sra_booking_payment_details.booking_amt,sra_booking_payment_details.payment_confirmed_status,academic_years.year";
        // $this->db->order_by('id','ASC');
        $this->db->where('sra_booking_payment_details.is_deleted','no');
        $this->db->where('sra_booking_payment_details.is_deleted','no');
        $this->db->where('sra_booking_payment_details.agent_id',$iid);
        $this->db->join("sra_booking_payment_details", 'sra_booking_payment_details.sra_payment_id=sra_payment.id','left');
        $this->db->join("academic_years", 'academic_years.id=sra_booking_payment_details.academic_year','left');
        $this->db->join("package_date", 'package_date.id=sra_payment.tour_date','left');
        // $this->db->group_by('sra_booking_payment_details.academic_year');
        $arr_data = $this->master_model->getRecords('sra_payment',array('sra_payment.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        // $this->arr_view_data['module_pending_amt'] = $this->module_pending_amt;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
       
	}
	
	
    public function details($sra_no,$sra_pay_id,$academic_year)
    {
       $agent_sess_name = $this->session->userdata('agent_name');
       $iid = $this->session->userdata('agent_sess_id');
       // print_r($iid); die;

        $record = array();
        $fields = "sra_payment.*,package_date.journey_date,sra_payment.id as sra_payment_id";
        $this->db->where('sra_payment.is_deleted','no');
        $this->db->where('sra_payment.is_active','yes');
        $this->db->join("package_date", 'package_date.id=sra_payment.tour_date','left');
        $this->db->group_start();
        $this->db->where('sra_payment.sra_no', $sra_no);
        $this->db->where('sra_payment.academic_year', $academic_year);
        $this->db->group_end();
        $traveller_booking_info_header = $this->master_model->getRecords('sra_payment','',$fields);

//        $this->db->where('is_deleted','no');
//        $this->db->where('is_active','yes');
//        $this->db->where('sra_no',$sra_no);
//        $traveller_booking_info_header = $this->master_model->getRecords('sra_payment');

       $this->db->where('is_deleted','no');
        $this->db->where('sra_booking_payment_details.sra_payment_id',$sra_pay_id);
        $booking_payment_details_all = $this->master_model->getRecords('sra_booking_payment_details');
        // print_r($booking_payment_details_all); die;

        $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['traveller_booking_info_header']        = $traveller_booking_info_header;
        $this->arr_view_data['booking_payment_details_all']        = $booking_payment_details_all;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        // $this->arr_view_data['module_pending_amt'] = $this->module_pending_amt;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
       
    }


}