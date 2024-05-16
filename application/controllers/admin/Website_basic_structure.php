<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Website_basic_structure extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/website_basic_structure";
        $this->module_title       = "Website Basic Structure";
        $this->module_url_slug    = "website_basic_structure";
        $this->module_view_folder = "website_basic_structure/";    
        $this->load->library('upload');
	}

	public function index()
	{
	  
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('website_basic_structure');
        
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
            
            $this->db->where('is_deleted','no');
            $arr_data = $this->master_model->getRecords('website_basic_structure');
            if(!empty($arr_data))
            {
                $this->session->set_flashdata('error_message'," Not Added. Website Basic Structure are already added. You can add only one Website Basic Structure.");
                redirect($this->module_url_path.'/index');
            }
            
            $this->form_validation->set_rules('contact_number', 'Contact Number', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('email_address', 'Email Address', 'required');
            $this->form_validation->set_rules('website_link', 'Website Link', 'required');
            $this->form_validation->set_rules('facebook', 'Facebook Link', 'required');
            $this->form_validation->set_rules('twitter', 'Twitter Link', 'required');
            $this->form_validation->set_rules('instagram', 'Instagram Link', 'required');
            $this->form_validation->set_rules('linkedin', 'Linkedin Link', 'required');
            $this->form_validation->set_rules('company_name', 'Company Name', 'required');
            $this->form_validation->set_rules('short_description', 'Short Description', 'required');       
            
            if($this->form_validation->run() == TRUE)
            {
                
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','jpeg','JPG');

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

                $config['upload_path']   = './uploads/website_logo/';
                $config['allowed_types'] = 'png|jpg|jpeg|PNG|JPEG|JPG'; 
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
              
                $Short_description        = trim($this->input->post('short_description'));
                $Contact_number        = trim($this->input->post('contact_number'));
                $Location = trim($this->input->post('location'));
                $Email_address = trim($this->input->post('email_address'));
                $Website_link = trim($this->input->post('website_link'));
                $Facebook_link = trim($this->input->post('facebook'));
                $Twitter_link = trim($this->input->post('twitter'));
                $Instagram_link = trim($this->input->post('instagram'));
                $Linkedin_link = trim($this->input->post('linkedin'));
                $Company_name= trim($this->input->post('company_name'));
                $map= trim($this->input->post('map'));
                $arr_insert = array(                    
                    'short_description'          => $Short_description,
                    'contact_number'          => $Contact_number,
                    'location'          => $Location,
                    'email'          => $Email_address,
                    'website_link'  => $Website_link,
                    'facebook_link'  => $Facebook_link,
                    'twitter_link'  => $Twitter_link,
                    'instagram_link'  => $Instagram_link,
                    'linkedin_link'  => $Linkedin_link,
                    'company_name'  => $Company_name,
                    'map'  => $map,
                    'image_name'          => $filename
                );
                                
                $inserted_id = $this->master_model->insertRecord('website_basic_structure',$arr_insert,true);
                               
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
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $academic_years_data = $this->master_model->getRecords('website_basic_structure');

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['academic_years_data'] = $academic_years_data;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    
   
    
   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('website_basic_structure');
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
            
            if($this->master_model->updateRecord('website_basic_structure',$arr_update,array('id' => $id)))
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
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        else
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('website_basic_structure');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('contact_number', 'Contact Number', 'required');
                $this->form_validation->set_rules('location', 'Location', 'required');
                $this->form_validation->set_rules('email_address', 'Email Address', 'required');
                $this->form_validation->set_rules('website_link', 'Website Link', 'required');
                $this->form_validation->set_rules('facebook', 'facebook Link', 'required');
                $this->form_validation->set_rules('twitter', 'twitter Link', 'required');
                $this->form_validation->set_rules('instagram', 'instagram Link', 'required');
                $this->form_validation->set_rules('linkedin', 'linkedin Link', 'required');
                $this->form_validation->set_rules('company_name', 'company_name', 'required');
                $this->form_validation->set_rules('short_description', 'Short Description', 'required');
                // $this->form_validation->set_rules('image_name','Website Logo', 'callback_handle_upload[edit]');
                if($this->form_validation->run() == TRUE)
                {
                 
                 $old_img_name = $this->input->post('old_img_name');
                
                    if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                    {
                    $file_name     = $_FILES['image_name']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                    $file_name = $_FILES['image_name'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

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
                    
                    $config['upload_path']   = './uploads/website_logo/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|jpeg|JPG';  
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
                        if($old_img_name!='') unlink('./uploads/website_logo/'.$old_img_name);
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
               
                
                $Contact_number  = $this->input->post('contact_number'); 
                $Location        = trim($this->input->post('location'));
                $Email_address        = trim($this->input->post('email_address'));
                $Website_link = trim($this->input->post('website_link'));
                $Facebook_link = trim($this->input->post('facebook'));
                $Twitter_link = trim($this->input->post('twitter'));
                $Instagram_link = trim($this->input->post('instagram'));
                $Linkedin_link = trim($this->input->post('linkedin'));
                $Company_name = trim($this->input->post('company_name'));
                $Short_description = trim($this->input->post('short_description'));
                $map = trim($this->input->post('map'));
                $arr_update = array(
                    'contact_number'   =>   $Contact_number,
                    'location'          => $Location,
                    'email'          => $Email_address,
                    'website_link'          => $Website_link,
                    'facebook_link'          => $Facebook_link,
                    'twitter_link'          => $Twitter_link,
                    'instagram_link'          => $Instagram_link,
                    'linkedin_link'          => $Linkedin_link,
                    'company_name'          => $Company_name,
                    'short_description'          => $Short_description,
                    'map'          => $map,
                    'image_name'    => $filename
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('website_basic_structure',$arr_update,$arr_where);
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
        $website_basic_structure_data = $this->master_model->getRecords('website_basic_structure');
        
        $this->arr_view_data['website_basic_structure_data']   = $website_basic_structure_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

     // Delete
    
     public function delete($id)
     {
         $id=base64_decode($id);
         if($id!='')
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('website_basic_structure');
 
             if(empty($arr_data))
             {
                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                 redirect($this->module_url_path);
             }
             $arr_update = array('is_deleted' => 'yes');
             $arr_where = array("id" => $id);
                  
             if($this->master_model->updateRecord('website_basic_structure',$arr_update,$arr_where))
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
     
     // Details
     public function details($id)
     {
		 $id=base64_decode($id);
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         $fields = "website_basic_structure.*";
         $arr_data = $this->master_model->getRecords('website_basic_structure',array('website_basic_structure.is_deleted'=>'no','website_basic_structure.id'=>$id),$fields);
         
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." Details ";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
     }

}