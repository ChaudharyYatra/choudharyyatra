<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class More_fund_request_acc extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('account')."account/more_fund_request_acc";
        $this->module_title       = "Request More Fund to Tour Manager";
        // $this->module_title2       = "Hotel Advance Payment Details  ";
        $this->module_url_slug    = "more_fund_request_acc";
        $this->module_view_folder = "more_fund_request_acc/";    
        $this->load->library('upload');
	}
	

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $record = array();
        $fields = "tm_request_more_fund.*,packages.tour_title,packages.tour_number,package_type.package_type,
        account_pay_details.payment_date,account_pay_details.payment_mode,account_pay_details.transaction_id,
        account_pay_details.transaction_amt,account_pay_details.image_name,tm_account_details.bank_name,
        tm_account_details.account_no,tm_account_details.acc_holder_nm,tm_account_details.branch_name,
        tm_account_details.branch_code,tm_account_details.ifsc_code,tm_account_details.cif_no,
        tm_account_details.pan_no,tm_account_details.aadhaar_no";
        $this->db->where('tm_request_more_fund.is_deleted','no');
        $this->db->where('tm_request_more_fund.Received_amt_status','no');
        $this->db->join("packages", 'tm_request_more_fund.tour_number=packages.id','left');
        $this->db->join("package_type", 'tm_request_more_fund.package_type=package_type.id','left');
        $this->db->join("account_pay_details", 'tm_request_more_fund.id=account_pay_details.tm_request_more_fund_id','left');
        $this->db->join("tm_account_details", 'tm_request_more_fund.Select_bank=tm_account_details.id','left');
        $arr_data = $this->master_model->getRecords('tm_request_more_fund',array('tm_request_more_fund.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['arr_data_details']        = $arr_data_details;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
       
	}
	
	
    public function account_pay_send()
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');   

        if($this->input->post('submit'))
        {  
            $this->form_validation->set_rules('payment_date', 'payment_date', 'required');
            $this->form_validation->set_rules('payment_mode', 'payment_mode', 'required');
            $this->form_validation->set_rules('transaction_id', 'transaction_id', 'required');
            
            if($this->form_validation->run() == TRUE)
            {

                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['image_name']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/index');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/more_fund_amt_account/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|pdf|PDF'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                if($file_name!="")
                {
                    $file_name = $this->upload->data();
                    $filename = $file_name_to_dispaly;
                }

                else
                {
                    $filename = $this->input->post('image_name',TRUE);
                }

                $payment_date	  = $this->input->post('payment_date'); 
                $payment_mode	  = $this->input->post('payment_mode');
                $transaction_id	  = $this->input->post('transaction_id');
                $transaction_amt	  = $this->input->post('transaction_amt');
                
                $tour_manager_id	  = $this->input->post('tour_manager_id');
                $tm_request_more_fund_id	  = $this->input->post('tm_request_more_fund_id');


                    $arr_insert = array(
                        'payment_date'   =>   $payment_date,
                        'payment_mode'   =>   $payment_mode,
                        'transaction_id'   =>   $transaction_id,
                        'transaction_amt'   =>   $transaction_amt,
                        'image_name'   =>   $filename,
                        'send'          => 'yes',
                        'tour_manager_id' => $tour_manager_id,
                        'tm_request_more_fund_id' => $tm_request_more_fund_id

                    );

                    $inserted_id = $this->master_model->insertRecord('account_pay_details',$arr_insert,true);

                    $arr_update = array(
                        'send'   =>   'yes' 
                    );
                
                    $arr_where     = array("id" => $tm_request_more_fund_id);
                    $this->master_model->updateRecord('tm_request_more_fund',  $arr_update,$arr_where);
                
                            
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