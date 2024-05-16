<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Stationary_request extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('stationary_sess_id')=="") 
        { 
                redirect(base_url().'stationary/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('stationary_panel_slug')."/stationary_request";
        $this->module_title       = "Stationary Request ";
        $this->module_url_slug    = "stationary_request";
        $this->module_view_folder = "stationary_request/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
        $stationary_sess_name = $this->session->userdata('stationary_name');
        $id = $this->session->userdata('stationary_sess_id');

         $record = array();
         $fields = "stationary_order.*,agent.agent_name,agent.booking_center,department.department";
         $this->db->order_by('stationary_order.created_at','desc');
         $this->db->where('stationary_order.is_deleted','no');
         $this->db->where('stationary_order_details.order_status','requested');
         $this->db->where('stationary_order.received_status','no');
         $this->db->join("agent", 'stationary_order.agent_id=agent.id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $this->db->join("stationary_order_details", 'stationary_order_details.order_id=stationary_order.id','left');
         $this->db->group_by('stationary_order_details.order_id');
         $arr_data = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);
        

         $this->arr_view_data['stationary_sess_name'] = $stationary_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('stationary/layout/stationary_combo',$this->arr_view_data);
        
     }

    // Get Details 
    public function details($id)
    {
        $stationary_sess_name = $this->session->userdata('stationary_name');
       // $id = $this->session->userdata('stationary_sess_id');

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        $record = array();
         $fields = "stationary_order_details.*,stationary.stationary_name,agent.agent_name,agent.booking_center,department.department";
         $this->db->order_by('stationary_order_details.created_at','desc');
         $this->db->where('stationary_order_details.is_deleted','no');
         $this->db->where('stationary_order_details.order_id',$id);
         $this->db->join("stationary", 'stationary_order_details.stationary_name=stationary.id','left');
         $this->db->join("agent", 'stationary_order_details.agent_id=agent.id','left');
         $this->db->join("department", 'agent.department=department.id','left');
         $arr_data = $this->master_model->getRecords('stationary_order_details',array('stationary_order_details.is_deleted'=>'no'),$fields);
        

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $courier_company_name_data = $this->master_model->getRecords('courier');
        
        $this->arr_view_data['stationary_sess_name'] = $stationary_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['courier_company_name_data'] = $courier_company_name_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('stationary/layout/stationary_combo',$this->arr_view_data);
    }

    public function send()
    {  
        $stationary_sess_name = $this->session->userdata('stationary_name');
        $id = $this->session->userdata('stationary_sess_id');
        
        if($this->input->post('submit'))
        { 
               
            $this->form_validation->set_rules('send_qty[]', 'Enter Send Quantity', 'required');
            
            if($this->form_validation->run() == TRUE)
            { 
                $send_qty  = $this->input->post('send_qty'); 
                $s_id  = $this->input->post('s_id'); 
                $o_id  = $this->input->post('o_id'); 
            
                $count = count($send_qty);
              
                for($i=0;$i<$count;$i++)
                {
                   $qty = $_POST["send_qty"][$i];
                    if($qty=='Not in stock'){
                        $arr_update2 = array(
                            'order_status'   =>    'reject'   
                        );
                        $arr_where2     = array("id" => $s_id[$i]);
                        $inserted_id = $this->master_model->updateRecord('stationary_order_details_temp',$arr_update2,$arr_where2);
                    
                    }
                    $arr_update = array(
                        'send_qty'   =>    $_POST["send_qty"][$i] 
                    );
                    $arr_where     = array("id" => $s_id[$i]);
                    $inserted_id = $this->master_model->updateRecord('stationary_order_details_temp',$arr_update,$arr_where);
                }    

                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)."Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
        }


        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('stationary_order_details_temp');


        $this->arr_view_data['stationary_sess_name'] = $stationary_sess_name;
        // $this->arr_view_data['action']          = 'details';
        $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['stationary_order_details'] = $stationary_order_details;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('stationary/layout/stationary_combo',$this->arr_view_data);
    }



}