<?php 
//   Controller for: home page
// Author: Vivek Patil
// Start Date: 21-12-2022
// last updated: 

defined('BASEPATH') OR exit('No direct script access allowed');

class Stationary_order extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/stationary_order";
        $this->module_title       = "Stationary Order";
        $this->module_url_slug    = "stationary_order";
        $this->module_view_folder = "stationary_order/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');

         $record = array();
         $fields = "stationary_order.*,stationary.stationary_name";
         $this->db->order_by('stationary_order.created_at','desc');
         $this->db->where('stationary_order.is_deleted','no');
         $this->db->where('stationary_order.agent_id',$id);
        // $this->db->join("stationary", 'stationary_order.stationary_name=stationary.id','left');
         $arr_data = $this->master_model->getRecords('stationary_order',array('stationary_order.is_deleted'=>'no'),$fields);

        //  $this->db->where('is_deleted','no');
        //  $arr_data = $this->master_model->getRecords('stationary_order');
        

         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        
     }

     public function add()
     {  
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');
         
         if($this->input->post('submit'))
         {
                 
                 $stationary_name  = $this->input->post('stationary_name'); 
                 $stationary_qty         = $this->input->post('stationary_qty'); 

                 $count = count($stationary_name);
                 for($i=0;$i<$count;$i++)
                 {
                    $arr_insert = array(
                        'agent_id' =>   $id,
                        'stationary_name'   =>  $_POST["$stationary_name"][$i],   
                        'stationary_qty'    =>  $_POST["$stationary_qty"][$i]           
                    );
                    
                    $inserted_id = $this->master_model->insertRecord('stationary_order',$arr_insert,true);
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
 
         $this->db->where('is_deleted','no');
         //  $this->db->where('stationary_id',$i);
          $arry_data = $this->master_model->getRecords('stationary_order');


         $this->db->where('is_deleted','no');
        //  $this->db->where('stationary_id',$i);
         $stationary_data = $this->master_model->getRecords('stationary');
        
 
         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['arry_data'] = $arry_data;
         $this->arr_view_data['stationary_data'] = $stationary_data;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
     }



}