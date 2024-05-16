<?php 
//   Controller for: home page
// Author: Vivek Patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_code_number extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/request_code_number";
        $this->module_title       = "Request Code Number";
        $this->module_url_slug    = "request_code_number";
        $this->module_view_folder = "request_code_number/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');

        $record = array();
        $fields = "request_code_number.*,stationary.stationary_name";
        $this->db->where('request_code_number.is_deleted','no');
        $this->db->join("stationary", 'request_code_number.stationary_type=stationary.id','left');
        $arr_data = $this->master_model->getRecords('request_code_number',array('request_code_number.is_deleted'=>'no'),$fields);


        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('request_code_number');
        
        //  $this->arr_view_data['followup_reason_data'] = $followup_reason_data;
         $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
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

            $this->form_validation->set_rules('stationary_type', 'stationary_type', 'required');
            
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['image_name']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/add');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/stationary_request_code/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG'; 
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

                // -----------------
                if($_FILES['image_name2']['name']!=''){

                    $file_name2    = $_FILES['image_name2']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                    if($file_name2!="")
                    {               
                        $ext = explode('.',$_FILES['image_name2']['name']); 
                        $config['file_name2']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/add');  
                        }
                    }
                    $file_name2_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name2);

                    $config['upload_path']   = './uploads/stationary_request_code2/';
                    $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG'; 
                    $config['max_size']      = '10000';
                    $config['file_name2']     =  $file_name2_to_dispaly;
                    $config['overwrite']     =  TRUE;

                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important

                    if(!$this->upload->do_upload('image_name2'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path);  
                    }

                    if($file_name2!="")
                    {
                        $file_name2 = $this->upload->data();
                        $filename2 = $file_name2_to_dispaly;
                    }

                    else
                    {
                        $filename2 = $this->input->post('image_name2',TRUE);
                    }
                } 
                else{
                    $filename2  = '';
                }

                // -----------------
                if($_FILES['image_name3']['name']!=''){

                    $file_name3     = $_FILES['image_name3']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                    if($file_name3!="")
                    {               
                        $ext = explode('.',$_FILES['image_name3']['name']); 
                        $config['file_name3']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/add');  
                        }
                    }
                    $file_name3_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name3);

                    $config['upload_path']   = './uploads/stationary_request_code3/';
                    $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG'; 
                    $config['max_size']      = '10000';
                    $config['file_name3']     =  $file_name3_to_dispaly;
                    $config['overwrite']     =  TRUE;

                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important

                    if(!$this->upload->do_upload('image_name3'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path);  
                    }

                    if($file_name3!="")
                    {
                        $file_name3 = $this->upload->data();
                        $filename3 = $file_name3_to_dispaly;
                    }

                    else
                    {
                        $filename3 = $this->input->post('image_name3',TRUE);
                    }
                }
                else{
                    $filename3  = '';
                }
             
             
             if($this->form_validation->run() == TRUE)
             { 

                 $stationary_type  = $this->input->post('stationary_type');
                 $stationary_remark  = $this->input->post('stationary_remark');

                 $arr_insert = array(
                     'stationary_type'   =>   $stationary_type,
                     'image_name'    => $filename,
                     'image_name2'    => $filename2,
                     'image_name3'    => $filename3,
                     'stationary_remark' => $stationary_remark,
                     'agent_id' => $id


                 );
                 
                $inserted_id = $this->master_model->insertRecord('request_code_number',$arr_insert,true);

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

             $this->db->where('is_deleted','no');
             $this->db->where('is_active','yes');
             $stationary_data = $this->master_model->getRecords('stationary');

                // $this->arr_view_data['arr_data']        = $arr_data;
                $this->arr_view_data['stationary_data']        = $stationary_data;
                $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
                $this->arr_view_data['page_title']      = "Add ".$this->module_title;
                $this->arr_view_data['module_title']    = $this->module_title;
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
                $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        }




     public function delete($id)
     {
        $agent_sess_name = $this->session->userdata('agent_name');
         
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('request_code_number');
 
             if(empty($arr_data))
             {
                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                 redirect($this->module_url_path);
             }
             $arr_update = array('is_deleted' => 'yes');
             $arr_where = array("id" => $id);
                  
             if($this->master_model->updateRecord('request_code_number',$arr_update,$arr_where))
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

         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
     }

    // Edit

    public function edit($id)
    {
        $agent_sess_name = $this->session->userdata('agent_name');
        // $id=$this->session->userdata('agent_sess_id');

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }  

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('request_code_number');

            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('stationary_type', 'stationary_type', 'required');
                //  $this->form_validation->set_rules('image_name', 'image_name', 'required');

                if($this->form_validation->run() == TRUE)
                {
                    $old_img_name = $this->input->post('old_img_name');
                
                    if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                    {
                    $file_name     = $_FILES['image_name']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name = $_FILES['image_name'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                    if($file_name['name']!="")
                    {
                        $ext = explode('.',$_FILES['image_name']['name']); 
                        $config['file_name'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }   

                    $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                    
                    $config['upload_path']   = './uploads/stationary_request_code/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                    $config['max_size']      = '10000';
                    $config['file_name']     = $file_name_to_dispaly;
                    $config['overwrite']     = TRUE;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
                    
                    if(!$this->upload->do_upload('image_name'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name['name']!="")
                    {   
                        $file_name = $this->upload->data();
                        $filename = $file_name_to_dispaly;
                        if($old_img_name!='') unlink('./uploads/stationary_request_code/'.$old_img_name);
                    }
                    else
                    {
                        $filename = $this->input->post('image_name',TRUE);
                    }
                    }
                    else
                    {
                        $filename = $old_img_name;
                    }
                    
                }

                // ---------------------------
                if($_FILES['image_name2']['name']!=''){
                    $old_img_name2 = $this->input->post('old_img_name2');
                
                    if(!empty($_FILES['image_name2']) && $_FILES['image_name2']['name'] !='')
                    {
                    $file_name2     = $_FILES['image_name2']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name2 = $_FILES['image_name2'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                    if($file_name2['name']!="")
                    {
                        $ext = explode('.',$_FILES['image_name2']['name']); 
                        $config['file_name2'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }   

                    $file_name2_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name2['name']);
                    
                    $config['upload_path']   = './uploads/stationary_request_code2/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                    $config['max_size']      = '10000';
                    $config['file_name2']     = $file_name2_to_dispaly;
                    $config['overwrite']     = TRUE;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
                    
                    if(!$this->upload->do_upload('image_name2'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name2['name']!="")
                    {   
                        $file_name2 = $this->upload->data();
                        $filename2 = $file_name2_to_dispaly;
                        if($old_img_name2!='') unlink('./uploads/stationary_request_code2/'.$old_img_name2);
                    }
                    else
                    {
                        $filename2 = $this->input->post('image_name2',TRUE);
                    }
                    }
                    else
                    {
                        $filename2 = $old_img_name2;
                    }
                } 
                else{
                    $filename2  = '';
                }

                    // ---------------------------
                if($_FILES['image_name3']['name']!=''){
                    $old_img_name3 = $this->input->post('old_img_name3');
                
                    if(!empty($_FILES['image_name3']) && $_FILES['image_name3']['name'] !='')
                    {
                    $file_name3     = $_FILES['image_name3']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name3 = $_FILES['image_name3'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                    if($file_name3['name']!="")
                    {
                        $ext = explode('.',$_FILES['image_name3']['name']); 
                        $config['file_name3'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }   

                    $file_name3_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name3['name']);
                    
                    $config['upload_path']   = './uploads/stationary_request_code3/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                    $config['max_size']      = '10000';
                    $config['file_name3']     = $file_name3_to_dispaly;
                    $config['overwrite']     = TRUE;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
                    
                    if(!$this->upload->do_upload('image_name3'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name3['name']!="")
                    {   
                        $file_name3 = $this->upload->data();
                        $filename3 = $file_name3_to_dispaly;
                        if($old_img_name3!='') unlink('./uploads/stationary_request_code3/'.$old_img_name3);
                    }
                    else
                    {
                        $filename3 = $this->input->post('image_name3',TRUE);
                    }
                    }
                    else
                    {
                        $filename3 = $old_img_name3;
                    }
                } 
                else{
                    $filename3  = '';
                }
                    
                    


                    $stationary_type  = $this->input->post('stationary_type');
                    $stationary_remark  = $this->input->post('stationary_remark');
                    
                    
                    $arr_update = array(
                        'stationary_type'   =>   $stationary_type,
                        'image_name'    => $filename,
                        'image_name2'    => $filename2,
                        'image_name3'    => $filename3,
                        'stationary_remark' => $stationary_remark,
                        
                    );
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('request_code_number',$arr_update,$arr_where);
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

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $stationary_data = $this->master_model->getRecords('stationary');

            $this->arr_view_data['arr_data']        = $arr_data;
            $this->arr_view_data['stationary_data']        = $stationary_data;
            $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
            $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
            $this->arr_view_data['module_title']    = $this->module_title;
            $this->arr_view_data['module_url_path'] = $this->module_url_path;
            $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
            $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        }
        

         
        
    }
	
	   


