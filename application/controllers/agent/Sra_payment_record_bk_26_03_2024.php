<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sra_payment_record extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/sra_payment_record";
        $this->module_title       = "SRA Payment Record";
        $this->module_url_slug    = "sra_payment_record";
        $this->module_view_folder = "sra_payment_record/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $fields = "sra_payment.*,sra_booking_payment_details.booking_amt";
        // $this->db->order_by('id','ASC');
        $this->db->where('sra_booking_payment_details.is_deleted','no');
        $this->db->where('sra_payment.is_deleted','no');
        $this->db->join("sra_payment", 'sra_booking_payment_details.sra_payment_id=sra_payment.id','left');
        $arr_data = $this->master_model->getRecords('sra_booking_payment_details',array('sra_booking_payment_details.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
       
	}
}