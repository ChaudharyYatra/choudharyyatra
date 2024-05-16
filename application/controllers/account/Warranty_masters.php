<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Warranty_masters extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
            redirect(base_url().'supervision/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('account_panel_slug')."account/warranty_masters";
        $this->module_title       = "Warranty Masters Information";
        $this->module_url_slug    = "warranty_masters";
        $this->module_view_folder = "warranty_masters/";     
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $fields = "warranty_masters.*";
        $this->db->order_by('id','desc');
        $this->db->where('warranty_masters.is_deleted','no');
        $arr_data = $this->master_model->getRecords('warranty_masters',array('warranty_masters.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
       
	}

    public function add()
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        if($this->input->post('submit'))
        {        
            $this->form_validation->set_rules('warranty_title', 'warranty_title', 'required');      
            $this->form_validation->set_rules('warranty_description', 'warranty_description', 'required');      
            $this->form_validation->set_rules('warranty_type', 'warranty_type', 'required');    
            $this->form_validation->set_rules('warranty_duration', 'warranty_duration', 'required'); 
            $this->form_validation->set_rules('warranty_start_date', 'warranty_start_date', 'required');      
            $this->form_validation->set_rules('warranty_end_date', 'warranty_end_date', 'required');      
            $this->form_validation->set_rules('comments', 'comments', 'required');        
            
            if($this->form_validation->run() == TRUE)
            {
                $warranty_title = $this->input->post('warranty_title');
                $warranty_description = $this->input->post('warranty_description');
                $warranty_type = $this->input->post('warranty_type');
                $warranty_duration = $this->input->post('warranty_duration');
                $warranty_start_date = $this->input->post('warranty_start_date');
                $warranty_end_date = $this->input->post('warranty_end_date');
                $comments = $this->input->post('comments');
                $arr_insert = array(               
                    'warranty_title	'  => $warranty_title,
                    'warranty_description'  => $warranty_description,
                    'warranty_type'  => $warranty_type,
                    'warranty_duration'  => $warranty_duration,
                    'warranty_start_date	'  => $warranty_start_date,
                    'warranty_end_date'  => $warranty_end_date,
                    'comments'  => $comments
                ); 
                                
                $inserted_id = $this->master_model->insertRecord('warranty_masters',$arr_insert,true);
                               
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
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
    }

    
   
    
   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('warranty_masters');
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index');
            }   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['is_active'] = "no";
            }
            else
            {
                $arr_update['is_active'] = "yes";
            }
            
            if($this->master_model->updateRecord('warranty_masters',$arr_update,array('id' => $id)))
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


    // Edit - Get data for edit
    
    public function edit($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        else
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('warranty_masters');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('warranty_title', 'warranty_title', 'required');      
                $this->form_validation->set_rules('warranty_description', 'warranty_description', 'required');      
                $this->form_validation->set_rules('warranty_type', 'warranty_type', 'required');    
                $this->form_validation->set_rules('warranty_duration', 'warranty_duration', 'required'); 
                $this->form_validation->set_rules('warranty_start_date', 'warranty_start_date', 'required');      
                $this->form_validation->set_rules('warranty_end_date', 'warranty_end_date', 'required');      
                $this->form_validation->set_rules('comments', 'comments', 'required');             
               
                if($this->form_validation->run() == TRUE)
                {
                    $warranty_title = $this->input->post('warranty_title');
                    $warranty_description = $this->input->post('warranty_description');
                    $warranty_type = $this->input->post('warranty_type');
                    $warranty_duration = $this->input->post('warranty_duration');
                    $warranty_start_date = $this->input->post('warranty_start_date');
                    $warranty_end_date = $this->input->post('warranty_end_date');
                    $comments = $this->input->post('comments');
                    
                    $arr_update = array(
                        'warranty_title	'  => $warranty_title,
                        'warranty_description'  => $warranty_description,
                        'warranty_type'  => $warranty_type,
                        'warranty_duration'  => $warranty_duration,
                        'warranty_start_date	'  => $warranty_start_date,
                        'warranty_end_date'  => $warranty_end_date,
                        'comments'  => $comments
                    );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('warranty_masters',$arr_update,$arr_where);
                    if($id > 0)
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
        }
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $qr_code_master_data = $this->master_model->getRecords('warranty_masters');
        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['qr_code_master_data']   = $qr_code_master_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
    }

     
    public function delete($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('warranty_masters');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('warranty_masters',$arr_update,$arr_where))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
            }
            else
            {
                $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
            }
        }
        else
        {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');  
    }

    // Get Details of Package
    public function details($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "warranty_masters.*";
        $this->db->where('warranty_masters.id',$id);
        $arr_data = $this->master_model->getRecords('warranty_masters',array('warranty_masters.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
    }
   

}