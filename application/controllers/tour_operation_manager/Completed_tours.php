<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Completed_tours extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/completed_tours";
        $this->module_title       = "Expenses  ";
        $this->module_url_slug    = "completed_tours";
        $this->module_view_folder = "completed_tours/";    
        $this->load->library('upload');
	}

    public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('assign_staff');
        // print_r($arr_data); die;

        $fields = "packages.*,package_type.package_type,package_type.id as pid,package_date.journey_date";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
		$this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}


    public function expenses($id)
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        // print_r($arr_data); die;

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }

        $fields = "tour_expenses.*,packages.tour_title,packages.tour_number,tour_manager.name,expense_type.expense_type_name,expense_category.expense_category";
        $this->db->where('tour_expenses.is_deleted','no');
        $this->db->where('tour_expenses.is_active','yes');
        $this->db->where('packages.id',$id);
        $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
        $this->db->join("tour_manager", 'tour_expenses.tour_manager_id=tour_manager.id','left');
        $this->db->join("expense_type", 'tour_expenses.expense_type=expense_type.id','left');
        $this->db->join("expense_category", 'tour_expenses.expense_category_id=expense_category.id','left');
        $arr_data = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."expenses";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}
	
	


      // Active/Inactive
  
  public function active_inactive($id,$type)
  {

      if($id!='' && ($type == "yes" || $type == "no") )
      {   
          $this->db->where('id',$id);
          $arr_data = $this->master_model->getRecords('tour_expenses');
          
          if(empty($arr_data))
          {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
          }   

          $arr_update =  array();

          if($type == 'no')
          {
              $arr_update['approval'] = "yes";
          }
          else
          {
              $arr_update['approval'] = "no";
          }
          
          if($this->master_model->updateRecord('tour_expenses',$arr_update,array('id' => $id)))
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




    public function getrolename(){ 
        // POST data 
        // $all_b=array();
        $getname = $this->input->post('did');
        // print_r($getname); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('role_type',$getname);   
                        $data = $this->master_model->getRecords('supervision');
        echo json_encode($data);
    }


    public function get_approve(){ 

        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');  
    
         $approve_id = $this->input->post('attr_approve'); 
        // $now_time =  date('Y-m-d H:i:s');
            
                $arr_update = array(
                    'approval'  => 'yes',
                   );
                
                    $arr_where     = array("id" => $approve_id);
                    $this->master_model->updateRecord('tour_expenses',$arr_update,$arr_where);
    
                            // print_r($data); die;
                    $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
    
           echo 'true';
        }

        public function get_reject(){ 

            $supervision_sess_name = $this->session->userdata('supervision_name');
            $iid = $this->session->userdata('supervision_sess_id');  
        
             $reject_id = $this->input->post('attr_reject'); 
            // $now_time =  date('Y-m-d H:i:s');
                
                    $arr_update = array(
                        'reject'  => 'yes',
                       );
                    
                        $arr_where     = array("id" => $reject_id);
                        $this->master_model->updateRecord('tour_expenses',$arr_update,$arr_where);
        
                                // print_r($data); die;
                        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        
               echo 'true';
            }




   
   
}