<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Other_tour_expences extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('expences_checker_sess_id')=="") 
        { 
                redirect(base_url().'expences_checker/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('expences_checker_panel_slug')."expences_checker/other_tour_expences";
        
        $this->module_url_path_tour_expenses    =  base_url().$this->config->item('expences_checker_panel_slug')."expences_checker/tour_expenses";
        
        $this->module_title       = "Other Tour Expences";
        $this->module_title_expences = "Expences";
        $this->module_url_slug    = "other_tour_expences";
        $this->module_view_folder = "other_tour_expences/";    
        $this->load->library('upload');
	}



        public function tourwise_expences()
	{
                // $id=base64_decode($id);
                // $t_did=base64_decode($t_did);

                $expences_checker_master_sess_name = $this->session->userdata('expences_checker_name');
                $iid = $this->session->userdata('expences_checker_sess_id');

                $fields = "tour_other_expenses.*,expense_type.expense_type_name,expense_category.expense_category,supervision.role_type,supervision.supervision_name";
                $this->db->where('tour_other_expenses.is_deleted','no');
                // $this->db->where('tour_other_expenses.tour_manager_id',$id);
                // $this->db->where('tour_expenses.package_date_id',$t_did);
                $this->db->join("supervision", 'tour_other_expenses.tour_manager_id=supervision.role_type','left');

                $this->db->join("expense_type", 'tour_other_expenses.expense_type=expense_type.id','left');
                $this->db->join("expense_category", 'tour_other_expenses.expense_category_id=expense_category.id','left');
                // $this->db->where('packages.is_deleted','no');
                // $this->db->where('packages.is_active','yes');
                // $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
                // $this->db->join("package_date", 'tour_expenses.package_date_id=package_date.id','left');
                $this->db->join("add_more_tour_other_expenses", 'tour_other_expenses.id=add_more_tour_other_expenses.tour_expenses_id','left');
                // $this->db->join("hotel_advance_payment", 'tour_expenses.package_id=hotel_advance_payment.tour_number','left');
                // $this->db->where('tour_expenses.package_date_id',$t_did);

                $this->db->group_by('add_more_tour_other_expenses.tour_expenses_id');
                $arr_data = $this->master_model->getRecords('tour_other_expenses',array('tour_other_expenses.is_deleted'=>'no'),$fields);
                // print_r($arr_data); die;
                

                // $this->db->where('tour_expenses.tour_manager_id',$id);
                $this->arr_view_data['listing_page']    = 'yes';
                $this->arr_view_data['arr_data']        = $arr_data;
                $this->arr_view_data['page_title']      = $this->module_title_expences." List";
                $this->arr_view_data['module_title']    = $this->module_title_expences." List";
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."tourwise_expences";
                $this->load->view('expences_checker/layout/expences_checker_combo',$this->arr_view_data);
       
	}
	

        public function tourwise_expences_details($id)
	{
                $id=base64_decode($id);
                // $t_did=base64_decode($t_did);
                // $pd_id=base64_decode($pd_id);
                // $tm_id=base64_decode($tm_id);

                $expences_checker_master_sess_name = $this->session->userdata('expences_checker_name');
                $iid = $this->session->userdata('expences_checker_sess_id');

                $record = array();
                $fields = "tour_other_expenses.*,add_more_tour_other_expenses.*,expense_type.expense_type_name,expense_category.expense_category,tour_other_expenses.id as t_expences_id,
                expense_category.expense_category as exp_cat";
                $this->db->where('tour_other_expenses.is_deleted','no');
                $this->db->order_by('tour_other_expenses.id','desc');
                $this->db->where('tour_other_expenses.id',$id);
                $this->db->join("expense_type", 'tour_other_expenses.expense_type=expense_type.id','left');
                $this->db->join("expense_category", 'tour_other_expenses.expense_category_id=expense_category.id','left');
                // $this->db->join("packages", 'tour_other_expenses.package_id=packages.id','left');
                // $this->db->join("package_date", 'tour_other_expenses.package_date_id=package_date.id','left');
                $this->db->join("add_more_tour_other_expenses", 'tour_other_expenses.id=add_more_tour_other_expenses.tour_expenses_id','left');
                // $this->db->join("hotel_advance_payment", 'tour_expenses.package_id=hotel_advance_payment.tour_number','left');
                // $this->db->group_by('package_date.package_id');
                $tour_expenses_all = $this->master_model->getRecords('tour_other_expenses',array('tour_other_expenses.is_deleted'=>'no'),$fields);
                // print_r($tour_expenses_all); die;

                $record = array();
                $fields = "add_more_tour_other_expenses.*,expense_category.expense_category,,expense_type.expense_type_name";
                $this->db->where('add_more_tour_other_expenses.is_deleted','no');
                $this->db->where('add_more_tour_other_expenses.tour_expenses_id',$id);
                $this->db->join("expense_category", 'add_more_tour_other_expenses.product_name=expense_category.id','left');
                $this->db->join("expense_type", 'add_more_tour_other_expenses.expense_type=expense_type.id','left');
                $add_more_tour_expenses_all = $this->master_model->getRecords('add_more_tour_other_expenses',array('add_more_tour_other_expenses.is_deleted'=>'no'),$fields);
                // print_r($add_more_tour_expenses_all); die;
                

                $this->arr_view_data['listing_page']    = 'yes';
                $this->arr_view_data['tour_expenses_all']  = $tour_expenses_all;
                $this->arr_view_data['add_more_tour_expenses_all']  = $add_more_tour_expenses_all;
                // $this->arr_view_data['tm_id']  = $tm_id;
                // $this->arr_view_data['pd_id']  = $pd_id;
                $this->arr_view_data['page_title']      = $this->module_title_expences." List";
                $this->arr_view_data['module_title']    = $this->module_title_expences." List";
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."tourwise_expences_details";
                $this->load->view('expences_checker/layout/expences_checker_combo',$this->arr_view_data);
	}


        public function get_approve(){ 

                $expences_checker_master_sess_name = $this->session->userdata('expences_checker_name');
                $iid = $this->session->userdata('expences_checker_sess_id');   
        
                $approve_id = $this->input->post('attr_approve'); 
                // $now_time =  date('Y-m-d H:i:s');
                
                        $arr_update = array(
                        'approval'  => 'yes',
                        'hold'  => 'no',
                        'hold_reason'  => ''
                        );
                        
                        $arr_where     = array("id" => $approve_id);
                        $this->master_model->updateRecord('tour_other_expenses',$arr_update,$arr_where);
        
                                // print_r($data); die;
                        $this->arr_view_data['expences_checker_master_sess_name'] = $expences_checker_master_sess_name;
        
                echo 'true';
        }

        public function get_hold(){ 

                $expences_checker_master_sess_name = $this->session->userdata('expences_checker_name');
                $iid = $this->session->userdata('expences_checker_sess_id'); 
                
                        $hold_id = $this->input->post('attr_hold'); 
                        $hold_reason = $this->input->post('hold_reason'); 
                // $now_time =  date('Y-m-d H:i:s');
                        
                        $arr_update = array(
                                'approval'  => 'no',
                                'hold'  => 'yes',
                                'hold_reason'  => $hold_reason
                                );
                        
                                $arr_where     = array("id" => $hold_id);
                                $this->master_model->updateRecord('tour_other_expenses',$arr_update,$arr_where);
                
                                // print_r($data); die;
                        $this->arr_view_data['expences_checker_master_sess_name'] = $expences_checker_master_sess_name;
                
                        echo 'true';
        }
   
   
}
