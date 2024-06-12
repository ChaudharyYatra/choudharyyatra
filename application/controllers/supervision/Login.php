<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        
        $this->module_url_path    =  base_url().$this->config->item('supervision_panel_slug')."/all_login";
		$this->module_url_path_dashboard    =  base_url().$this->config->item('supervision_panel_slug')."supervision/dashboard";
		$this->module_url_path_dashboard_2    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/dashboard";
        $this->module_url_path_dashboard_account  =  base_url().$this->config->item('account_panel_slug')."account/dashboard";
        $this->module_url_path_dashboard_tour_manager  =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/dashboard";
        $this->module_url_path_dashboard_kitchen_staff_cook  =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/dashboard";

        $this->module_url_path_dashboard_expences_checker  =  base_url().$this->config->item('expences_checker_panel_slug')."expences_checker/dashboard";

        $this->module_url_path_dashboard_expences_add_master  =  base_url().$this->config->item('expences_add_master_panel_slug')."expences_add_master/dashboard";

        $this->module_url_path_dashboard_office_branch_staff  =  base_url().$this->config->item('office_branch_staff_panel_slug')."office_branch_staff/dashboard";
        $this->module_url_path_dashboard_train_hod  =  base_url().$this->config->item('train_hod_panel_slug')."train_hod/dashboard";
        $this->module_title       = "Login";
        $this->module_url_slug    = "login";
        $this->module_view_folder = "login/";
	}

    public function index()
    {   
        if($this->input->post('submit'))
        {
            // print_r($_REQUEST); die;
            // $this->form_validation->set_rules('email_login', 'Email Login', 'required');
            $this->form_validation->set_rules('mobile_number1', 'Mobile Number', 'required');
            $this->form_validation->set_rules('password', 'Password Login', 'required');
 
            if($this->form_validation->run() == TRUE)
            {
                // $Email_login = $this->input->post('email_login');
                $mobile_number1 = $this->input->post('mobile_number1');
                $password = $this->input->post('password');   
                
            //   $this->db->where('email',$Email_login);

              $record = array();
              $fields = "supervision.*,role_type.role_name";
              $this->db->where('supervision.mobile_number1',$mobile_number1);
              $this->db->where('supervision.password',$password);
              $this->db->where('supervision.is_active','yes');
              $this->db->where('supervision.is_deleted','no');
              $this->db->join("role_type", ' supervision.role_type=role_type.id','left');
              $arr_data = $this->master_model->getRecords('supervision',array('supervision.is_deleted'=>'no'),$fields); 
            //   print_r($arr_data); die;     
                     
                if(empty($arr_data))
                {    
                    $this->session->set_flashdata('error_message1',"Mobile Number Or Password Is Wrong.");
                }
                else
                {
                    foreach($arr_data as $supervision_data)
                    {
                        // print_r($supervision_data); die;
                        $this->session->set_userdata('supervision_role',$supervision_data['role_type']);
                        $this->session->set_userdata('supervision_role_name',$supervision_data['role_name']);
                        $this->session->set_userdata('supervision_mobile',$supervision_data['mobile_number1']);
                        $this->session->set_userdata('supervision_sess_id',$supervision_data['id']);
                        $this->session->set_userdata('supervision_name',$supervision_data['supervision_name']);
                    }
                    // echo $this->session->userdata['supervision_role']; die;
                    if($this->session->userdata['supervision_role']=='3'){
                      
                        redirect($this->module_url_path_dashboard.'/index');
                    } elseif($this->session->userdata['supervision_role']=='4'){
                        
                        redirect($this->module_url_path_dashboard_2.'/index');
                    }
                    elseif($this->session->userdata['supervision_role']=='5'){
                        
                        redirect($this->module_url_path_dashboard_account.'/index');
                    }
                    elseif($this->session->userdata['supervision_role']=='6'){
                        
                        redirect($this->module_url_path_dashboard_tour_manager.'/index');
                    }
                    elseif($this->session->userdata['supervision_role']=='7'){
                        
                        redirect($this->module_url_path_dashboard_kitchen_staff_cook.'/index');
                    }elseif($this->session->userdata['supervision_role']=='9'){
                        
                        redirect($this->module_url_path_dashboard_expences_checker.'/index');
                    }
                    elseif($this->session->userdata['supervision_role']=='10'){
                        
                        redirect($this->module_url_path_dashboard_expences_add_master.'/index');
                    }elseif($this->session->userdata['supervision_role']=='11'){
                        
                        redirect($this->module_url_path_dashboard_office_branch_staff.'/index');
                    }
                    elseif($this->session->userdata['supervision_role']=='12'){
                        
                        redirect($this->module_url_path_dashboard_train_hod.'/index');
                    }
                    
                }
            }   
        }

        $this->arr_view_data['action']          = 'login';
        $this->arr_view_data['page_title']      = " Login ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->load->view('supervision/login/index',$this->arr_view_data);
    }

    public function logout()
    {
        $this->session->unset_userdata('supervision_sess_id');
        $this->session->unset_userdata('supervision_role');
        $this->session->unset_userdata('supervision_role_name');
        $this->session->unset_userdata('supervision_mobile');
        $this->session->unset_userdata('supervision_email');
        $this->session->unset_userdata('supervision_name');
        $this->session->sess_destroy();
        redirect($this->module_url_path.'index');  
    }

   
}