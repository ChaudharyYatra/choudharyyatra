<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tour_expences extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/tour_expences";
        $this->module_title       = "Tour Expences  ";
        $this->module_title_expences = "Tour Expences";
        $this->module_url_slug    = "tour_expences";
        $this->module_view_folder = "tour_expences/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $fields = "assign_expences_checker.*,supervision.supervision_name";
        $this->db->where('assign_expences_checker.is_deleted','no');
        $this->db->join("supervision", 'assign_expences_checker.tour_manager_name=supervision.id','left');
        $arr_data = $this->master_model->getRecords('assign_expences_checker',array('assign_expences_checker.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        // $fields = "tour_expenses.*,packages.tour_title,packages.tour_number,tour_manager.name";
        // $this->db->where('tour_expenses.is_deleted','no');
        // $this->db->where('tour_expenses.is_active','yes');
        // $this->db->group_by('tour_number');
        // $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
        // $this->db->join("tour_manager", 'tour_expenses.tour_manager_id=tour_manager.id','left');
        // $arr_data = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}

    public function assign_tours_to_tour_manager($id)
	{
                $id=base64_decode($id);

                $supervision_sess_name = $this->session->userdata('supervision_name');
                $iid = $this->session->userdata('supervision_sess_id');

                $fields = "assign_staff.*,packages.tour_number,packages.tour_title,packages.package_type,
                package_type.package_type,supervision.supervision_name,package_date.journey_date,package_date.id as did";
                $this->db->where('assign_staff.is_deleted','no');
                $this->db->where('assign_staff.name',$id);
                $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
                $this->db->where('packages.is_deleted','no');
                $this->db->where('packages.is_active','yes');
                $this->db->join("package_type", 'packages.package_type=package_type.id','left');
                $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
                $this->db->join("supervision", 'assign_staff.role_name=supervision.id','left');
                $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
                // print_r($arr_data); die;
                

                $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
                $this->arr_view_data['listing_page']    = 'yes';
                $this->arr_view_data['arr_data']        = $arr_data;
                $this->arr_view_data['page_title']      = $this->module_title." List";
                $this->arr_view_data['module_title']    = $this->module_title;
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."assign_tours_to_tour_manager";
                $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}

    public function tourwise_expences($id,$t_did)
	{
                $id=base64_decode($id);
                $t_did=base64_decode($t_did);

                $supervision_sess_name = $this->session->userdata('supervision_name');
                $iid = $this->session->userdata('supervision_sess_id');

                $fields = "tour_expenses.*,packages.tour_number,packages.tour_title,packages.package_type,package_date.journey_date,
                package_date.id as did,expense_type.expense_type_name,expense_category.expense_category";
                $this->db->where('tour_expenses.is_deleted','no');
                $this->db->where('tour_expenses.tour_manager_id',$id);
                $this->db->where('tour_expenses.package_date_id',$t_did);
                // $this->db->where('tour_expenses.hold','yes');
                $this->db->where('tour_expenses.hold','pending');
                $this->db->or_where('tour_expenses.hold','yes');
                

                $this->db->join("expense_type", 'tour_expenses.expense_type=expense_type.id','left');
                $this->db->join("expense_category", 'tour_expenses.expense_category_id=expense_category.id','left');
                $this->db->where('packages.is_deleted','no');
                $this->db->where('packages.is_active','yes');
                $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
                $this->db->join("package_date", 'tour_expenses.package_date_id=package_date.id','left');
                $this->db->join("add_more_tour_expenses", 'tour_expenses.id=add_more_tour_expenses.tour_expenses_id','left');
                $this->db->join("hotel_advance_payment", 'tour_expenses.package_id=hotel_advance_payment.tour_number','left');
                $this->db->where('tour_expenses.package_date_id',$t_did);
                $expences_details_data = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);
                // print_r($expences_data); die;
                
                

                $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
                $this->arr_view_data['listing_page']    = 'yes';
                $this->arr_view_data['expences_data']        = $expences_data;
                $this->arr_view_data['expences_details_data']        = $expences_details_data;
                $this->arr_view_data['page_title']      = $this->module_title_expences." List";
                $this->arr_view_data['module_title']    = $this->module_title_expences." List";
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."tourwise_expences";
                $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}

    public function tourwise_expences_details($id,$t_did,$pd_id,$tm_id)
	{
                $id=base64_decode($id);
                $t_did=base64_decode($t_did);
                $pd_id=base64_decode($pd_id);
                $tm_id=base64_decode($tm_id);

                $supervision_sess_name = $this->session->userdata('supervision_name');
                $iid = $this->session->userdata('supervision_sess_id');

                $record = array();
                $fields = "tour_expenses.*,add_more_tour_expenses.*,expense_type.expense_type_name,expense_category.expense_category,tour_expenses.id as t_expences_id,
                packages.tour_number,packages.tour_title,package_date.journey_date,hotel_advance_payment.advance_amt,expense_category.expense_category as exp_cat";
                $this->db->where('tour_expenses.is_deleted','no');
                $this->db->order_by('tour_expenses.id','desc');
                $this->db->where('tour_expenses.id',$t_did);
                $this->db->join("expense_type", 'tour_expenses.expense_type=expense_type.id','left');
                $this->db->join("expense_category", 'tour_expenses.expense_category_id=expense_category.id','left');
                $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
                $this->db->join("package_date", 'tour_expenses.package_date_id=package_date.id','left');
                $this->db->join("add_more_tour_expenses", 'tour_expenses.id=add_more_tour_expenses.tour_expenses_id','left');
                $this->db->join("hotel_advance_payment", 'tour_expenses.package_id=hotel_advance_payment.tour_number','left');
                $this->db->group_by('package_date.package_id');
                $tour_expenses_all = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);
                // print_r($tour_expenses_all); die;

                $record = array();
                $fields = "add_more_tour_expenses.*,expense_category.expense_category,,expense_type.expense_type_name";
                $this->db->where('add_more_tour_expenses.is_deleted','no');
                $this->db->where('add_more_tour_expenses.tour_expenses_id',$t_did);
                $this->db->join("expense_category", 'add_more_tour_expenses.product_name=expense_category.id','left');
                $this->db->join("expense_type", 'add_more_tour_expenses.expense_type=expense_type.id','left');
                $add_more_tour_expenses_all = $this->master_model->getRecords('add_more_tour_expenses',array('add_more_tour_expenses.is_deleted'=>'no'),$fields);
                // print_r($add_more_tour_expenses_all); die;
                

                $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
                $this->arr_view_data['listing_page']    = 'yes';
                $this->arr_view_data['tour_expenses_all']  = $tour_expenses_all;
                $this->arr_view_data['add_more_tour_expenses_all']  = $add_more_tour_expenses_all;
                $this->arr_view_data['tm_id']  = $tm_id;
                $this->arr_view_data['pd_id']  = $pd_id;
                $this->arr_view_data['page_title']      = $this->module_title_expences." List";
                $this->arr_view_data['module_title']    = $this->module_title_expences." List";
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."tourwise_expences_details";
                $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
	}



   
   
}