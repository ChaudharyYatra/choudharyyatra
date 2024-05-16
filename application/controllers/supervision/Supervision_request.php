<?php 
//   Controller for: 
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Supervision_request extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('supervision_panel_slug')."supervision/supervision_request";
        $this->module_title       = "Request ";
        $this->module_url_slug    = "supervision_request";
        $this->module_view_folder = "supervision_request/";
        $this->arr_view_data = [];
        date_default_timezone_set('Asia/Kolkata');
	 }

     public function index()
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        //  $record = array();
        //  $fields = "stationary_order.*,agent.agent_name,agent.booking_center,department.department";
        //  $this->db->order_by('stationary_order.created_at','desc');
        //  $this->db->where('stationary_order_details.order_status','requested');
        //  $this->db->where('stationary_order.received_status','no');
        //  $this->db->join("agent", 'stationary_order.agent_id=agent.id','left');
        //  $this->db->join("department", 'agent.department=department.id','left');
        //  $this->db->join("stationary_order_details", 'stationary_order_details.order_id=stationary_order.id','left');
        //  $this->db->group_by('stationary_order_details.order_id');
        //  $arr_data = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);
        
        $record = array();
        $fields = "request_code_number.*,stationary.stationary_name,agent.agent_name,agent.booking_center,supervision.supervision_name";
        $this->db->where('request_code_number.is_deleted','no');
        $this->db->where('request_code_number.status','no');
        $this->db->join("stationary", 'request_code_number.stationary_type=stationary.id','left');
        $this->db->join("agent", 'request_code_number.agent_id=agent.id','left');
        $this->db->join("supervision", 'request_code_number.superviser_id=supervision.id','left');
        $arr_data = $this->master_model->getRecords('request_code_number',array('request_code_number.is_deleted'=>'no'),$fields);

         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['iid'] = $iid;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('supervision/layout/supervision_combo',$this->arr_view_data);
        
     }

    // Get Details 
    public function details($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
       // $id = $this->session->userdata('supervision_sess_id');

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        $record = array();
        $fields = "request_code_number.*,stationary.stationary_name,agent.agent_name";
        $this->db->where('request_code_number.is_deleted','no');
        $this->db->where('request_code_number.id',$id);
        $this->db->join("stationary", 'request_code_number.stationary_type=stationary.id','left');
        $this->db->join("agent", 'request_code_number.agent_id=agent.id','left');
        $arr_data = $this->master_model->getRecords('request_code_number',array('request_code_number.is_deleted'=>'no'),$fields);
        
        $record = array();
        $fields = "request_code_number.*,agent.agent_name,agent.booking_center,department.department";
        $this->db->order_by('request_code_number.created_at','desc');
        $this->db->where('request_code_number.is_deleted','no');
        $this->db->where('request_code_number.id',$id);
        $this->db->join("agent", 'request_code_number.agent_id=agent.id','left');
        $this->db->join("department", 'agent.department=department.id','left');
        $arr_data_s_order = $this->master_model->getRecords('request_code_number',array('request_code_number.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data_s_order'] = $arr_data_s_order;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('supervision/layout/supervision_combo',$this->arr_view_data);
    }

    public function edit()
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        // $iid = $this->session->userdata('supervision_sess_id');  
                 
                if($this->input->post('send'))
                {
                    
                    $this->form_validation->set_rules('enter_code', 'enter code', 'required');
                    $this->form_validation->set_rules('sup_r_id', 'supervision request id', 'required');
                
                    if($this->form_validation->run() == TRUE)
                    {
                    $enter_code  = $this->input->post('enter_code'); 
                    $sup_r_id  = $this->input->post('sup_r_id'); 

                    $arr_update = array(
                    'enter_code'    => $enter_code,
                    'is_hold'       => 'no',
                    'superviser_id' => '0',
                    'status'        => 'yes'
                        
                    );
                    
                        $arr_where     = array("id" => $sup_r_id);
                        $this->master_model->updateRecord('request_code_number',$arr_update,$arr_where);
                        if($sup_r_id > 0)
                        {
                            $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                        }
                        else
                        {
                            $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                        }
                        redirect($this->module_url_path.'/index');
                    }   
                }
        
            
            $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
            // $this->arr_view_data['iid'] = $iid;
            // $this->arr_view_data['arr_data']        = $arr_data;
            $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
            $this->arr_view_data['module_title']    = $this->module_title;
            $this->arr_view_data['module_url_path'] = $this->module_url_path;
            $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
            $this->load->view('supervision/layout/supervision_combo',$this->arr_view_data);
        
    }


    public function get_modal_val(){ 

    $supervision_sess_name = $this->session->userdata('supervision_name');
    $id = $this->session->userdata('supervision_sess_id');  

    $req_id = $this->input->post('attrval'); 
    $now_time =  date('Y-m-d H:i:s');
        
            $arr_update = array(
                'is_hold'  => 'yes',
                'superviser_id' => $id,
                'hold_time'  => $now_time 
               );
            
                $arr_where     = array("id" => $req_id);
                $update_id=$this->master_model->updateRecord('request_code_number',$arr_update,$arr_where);
               if($update_id){
                        // print_r($data); die;
                $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;

       echo 'true';
               }else{
                echo 'false';
               }
    }

    public function update_hold_val(){ 

        
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');  
    
        // $req_id = $this->input->post('attrval'); 
        $record = array();
        $fields = "request_code_number.*,supervision.supervision_name";
        $this->db->where('request_code_number.is_deleted','no');
        $this->db->join("supervision", 'request_code_number.superviser_id=supervision.id','left');
        $arr_data = $this->master_model->getRecords('request_code_number',array('request_code_number.is_deleted'=>'no'),$fields);


        foreach($arr_data as $request_tbl_data){

        $get_req_id =$request_tbl_data['id'];

        $set_time =  date(strtotime(date('Y-m-d H:i:s'))) - date(strtotime($request_tbl_data['hold_time'])) ; 
        $get_right_time = floor($set_time)/(60);

            if( $get_right_time > '5'){

                $arr_update = array(
                    'is_hold'  => 'no',
                    'superviser_id' => '0'
                );
                
                    $arr_where     = array("id" => $get_req_id);
                    $this->master_model->updateRecord('request_code_number',$arr_update,$arr_where);

            }

        }

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
    
           echo 'true';
        }

        public function refresh_pg(){ 
            $supervision_sess_name = $this->session->userdata('supervision_name');
           $iid = $this->session->userdata('supervision_sess_id');  

            // $abc=$this->input->post('did');
            // echo 'Done refresh'; die;

            $record = array();
            $fields = "request_code_number.*,supervision.supervision_name";
            $this->db->where('request_code_number.is_deleted','no');
            // $this->db->where('request_code_number.is_hold','yes');
            // $this->db->where('request_code_number.superviser_id',$iid);
            // $this->db->where('request_code_number.id',$abc);
            $this->db->join("supervision", 'request_code_number.superviser_id=supervision.id','left');
            $arr_data = $this->master_model->getRecords('request_code_number',array('request_code_number.is_deleted'=>'no'),$fields);
       
    
            // if(!empty($arr_data)){
            //     echo 'true';
            // }else{

            //     echo 'false';
            // }

            echo json_encode($arr_data);
            
        }

        public function release_hold(){ 

            $supervision_sess_name = $this->session->userdata('supervision_name');
            $id = $this->session->userdata('supervision_sess_id');  
        
             $req_id = $this->input->post('attr_cancel_val'); 
            // $now_time =  date('Y-m-d H:i:s');
                
                    $arr_update = array(
                        'is_hold'  => 'no',
                        'superviser_id' => '0'
                       );
                    
                        $arr_where     = array("id" => $req_id);
                        $this->master_model->updateRecord('request_code_number',$arr_update,$arr_where);
        
                                // print_r($data); die;
                        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        
               echo 'true';
            }
        


}