<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prospect_add extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/prospect_add";
        $this->module_title       = "Prospect Add";
        $this->module_url_slug    = "prospect_add";
        $this->module_view_folder = "prospect_add/";    
        
	}

	public function index()
	{  
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('prospect_add');

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
    
    public function add()
    {   
       
        if($this->input->post('submit'))
        {
                
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('pdf','PDF');

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

                $config['upload_path']   = './uploads/prospect_pdf/';
                $config['allowed_types'] = 'pdf|PDF'; 
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
                    $filename = $this->input->post('prospect_pdf',TRUE);
                }

                // =---------------------------------------------------------------------------------------------

                $file_name2     = $_FILES['rate_chart_pdf']['name'];
                $arr_extension = array('pdf','PDF');

                if($file_name2!="")
                {               
                    $ext = explode('.',$_FILES['rate_chart_pdf']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/add');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name2);

                $config['upload_path']   = './uploads/rate_chart_pdf/';
                $config['allowed_types'] = 'pdf|PDF'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('rate_chart_pdf'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                if($file_name2!="")
                {
                    $file_name2 = $this->upload->data();
                    $filename2 = $file_name_to_dispaly;
                }

                else
                {
                    $filename2 = $this->input->post('prospect_pdf',TRUE);
                }
                
                $arr_insert = array(
                    'prospect_pdf'    => $filename,
                    'rate_chart_pdf'    => $filename2
                );
                
                $inserted_id = $this->master_model->insertRecord('prospect_add',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Prospect & Rate Chart Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
              
        }

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    

    
   
  // Active/Inactive
  
  public function active_inactive($id, $type)
{
    $id = base64_decode($id);

    if ($id != '' && ($type == "yes" || $type == "no")) {
        $this->db->where('id', $id);
        $arr_data = $this->master_model->getRecords('prospect_add');

        if (empty($arr_data)) {
            $this->session->set_flashdata('error_message', 'Invalid Selection Of Record');
            redirect($this->module_url_path . '/index');
        }

        $arr_update = array();

        if ($type == 'yes') {
            $arr_update['is_active'] = "no";
        } else {
            $arr_update['is_active'] = "yes";

            $this->db->where('id !=', $id); // Exclude the current record
            $this->db->update('prospect_add', array('is_active' => 'no'));
        }

        if ($this->master_model->updateRecord('prospect_add', $arr_update, array('id' => $id))) {
            $this->session->set_flashdata('success_message', $this->module_title . ' Updated Successfully.');
        } else {
            $this->session->set_flashdata('error_message', "Something Went Wrong While Updating The " . ucfirst($this->module_title) . ".");
        }
    } else {
        $this->session->set_flashdata('error_message', 'Invalid Selection Of Record');
    }

    redirect($this->module_url_path . '/index');
}

    
    // Delete
    
    public function delete($id)
    {
        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('prospect_add');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('prospect_add',$arr_update,$arr_where))
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
   
    // Edit - Get data for edit
    
    public function edit($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        else
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('prospect_add');
            if($this->input->post('submit'))
            {
                
                   
                   $old_img_name = $this->input->post('old_img_name');
                
                    if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                    {
                    $file_name     = $_FILES['image_name']['name'];
                    $arr_extension = array('pdf');

                    $file_name = $_FILES['image_name'];
                    $arr_extension = array('pdf');

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
                    
                    $config['upload_path']   = './uploads/prospect_pdf/';
                    $config['allowed_types'] = 'pdf';  
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
                        if($old_img_name!='') unlink('./uploads/prospect_pdf/'.$old_img_name);
                    }
                    else
                    {
                        $filename = $this->input->post('prospect_pdf',TRUE);
                    }
                }
                else
                {
                    $filename = $old_img_name;
                }

                // =----------------------------------------------------------------------------------------

                $old_img_name2 = $this->input->post('old_img_name2');
                
                    if(!empty($_FILES['rate_chart_pdf']) && $_FILES['rate_chart_pdf']['name'] !='')
                    {
                    $file_name2     = $_FILES['rate_chart_pdf']['name'];
                    $arr_extension = array('pdf');

                    $file_name2 = $_FILES['rate_chart_pdf'];
                    $arr_extension = array('pdf');

                    if($file_name2['name']!="")
                    {
                        $ext = explode('.',$_FILES['rate_chart_pdf']['name']); 
                        $config['file_name'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }   

                    $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name2['name']);
                    
                    $config['upload_path']   = './uploads/prospect_pdf/';
                    $config['allowed_types'] = 'pdf';  
                    $config['max_size']      = '10000';
                    $config['file_name']     = $file_name_to_dispaly;
                    $config['overwrite']     = TRUE;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
                    
                    if(!$this->upload->do_upload('rate_chart_pdf'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name2['name']!="")
                    {   
                        $file_name2 = $this->upload->data();
                        $filename2 = $file_name_to_dispaly;
                        if($old_img_name2!='') unlink('./uploads/prospect_pdf/'.$old_img_name2);
                    }
                    else
                    {
                        $filename2 = $this->input->post('prospect_pdf',TRUE);
                    }
                }
                else
                {
                    $filename2 = $old_img_name2;
                }
                
                    $arr_update = array(
                        'prospect_pdf'    => $filename,
                        'rate_chart_pdf'    => $filename2
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('prospect_add',$arr_update,$arr_where);
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
         
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
}