<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Suggestion_module extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/suggestion_module";
        $this->module_title       = "Suggestion Module to Company";
        $this->module_url_slug    = "suggestion_module";
        $this->module_view_folder = "suggestion_module/";    
        $this->load->library('upload');
	}

	public function index()
	{ 
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $record = array();
        $fields = "suggestion_module.*,packages.tour_title,packages.tour_number,package_type.package_type";
        $this->db->where('suggestion_module.is_deleted','no');
        $this->db->where('suggestion_module.tm_id',$id);
        $this->db->order_by('suggestion_module.id','desc');
        $this->db->join("packages", 'suggestion_module.tour_number=packages.id','left');
        $this->db->join("package_type", 'suggestion_module.package_type=package_type.id','left');
        $arr_data = $this->master_model->getRecords('suggestion_module',array('suggestion_module.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}
        
    
    public function add()
    {   
		$supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        if($this->input->post('submit'))
        {
            if($_FILES['image_name']['name']!=''){
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

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

                $config['upload_path']   = './uploads/suggestion_image/';
                $config['allowed_types'] = 'png|jpg|JPG|PNG|JPEG|jpeg|PDF|pdf'; 
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
              
            } 
            else{
               $filename  = '';
            }
// =========================================== upload photo 2 =========================================//
            if($_FILES['image_name_2']['name']!=''){
                $file_name     = $_FILES['image_name_2']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                $file_name = $_FILES['image_name_2'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','PDF','pdf');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['image_name_2']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/suggestion_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|pdf|PDF';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('image_name_2'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $new_img_filename = $file_name_to_dispaly_pdf;
                }
                else
                {
                    $new_img_filename = $this->input->post('image_name_2',TRUE);
                    
                }

            } 
            else{
               $new_img_filename  = '';
            }
// =================================================================================================//

// =========================================== upload photo 3 =========================================//
if($_FILES['image_name_3']['name']!=''){
$file_name     = $_FILES['image_name_3']['name'];

                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                $file_name = $_FILES['image_name_3'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['image_name_3']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

                $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/suggestion_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('image_name_3'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $inclusion_img_filename = $file_name_to_dispaly_pdf;
                }
                else
                {
                    $inclusion_img_filename = $this->input->post('image_name_3',TRUE);
                    
                }
            } 
            else{
               $inclusion_img_filename  = '';
            }
// =================================================================================================//

                $city            = $this->input->post('city'); 
                $other_city            = $this->input->post('other_city'); 
                $package_type            = $this->input->post('package_type'); 
                $description        = trim($this->input->post('description'));
                $priority      = trim($this->input->post('priority'));
                $tour_number      = trim($this->input->post('tour_number'));
                $arr_insert = array(
                    'city'   =>   $city,
                    'other_city'   =>   $other_city,
                    'package_type'   =>   $package_type,
                    'description'          => $description,
                    'priority'        => $priority,
                    'tour_number'        => $tour_number,
                    'tour_manager_id'        => $id,
                    'image_name'    => $filename,
                    'image_name_2'    => $new_img_filename,
                    'image_name_3'    => $inclusion_img_filename,
                    'tm_id'    => $id,
                    'status'            => 'pending'
                );
                
                $inserted_id = $this->master_model->insertRecord('suggestion_module',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Suggestion Record Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            
        }

        $this->db->where('is_deleted','no');
		$this->db->order_by('tour_number','ASC');
        $packages_data = $this->master_model->getRecords('packages');
        //  print_r($packages_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $package_type = $this->master_model->getRecords('package_type');
        // print_r($package_type); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $city = $this->master_model->getRecords('city');
        // print_r($package_type); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['packages_data']          = $packages_data;
        $this->arr_view_data['city']          = $city;
        $this->arr_view_data['package_type']          = $package_type;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

	  	$id=base64_decode($id);
        if($id!="" && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('suggestion_module');
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
            
            if($this->master_model->updateRecord('suggestion_module',$arr_update,array('id' => $id)))
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

    
    // Delete
    
    public function delete($id)
     {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');
         
        $id=base64_decode($id);
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('suggestion_module');
 
             if(empty($arr_data))
             {
                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                 redirect($this->module_url_path);
             }
             $arr_update = array('is_deleted' => 'yes');
             $arr_where = array("id" => $id);
                  
             if($this->master_model->updateRecord('suggestion_module',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('suggestion_module');
            if($this->input->post('submit'))
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
                    
                    $config['upload_path']   = './uploads/suggestion_image/';
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
                        if($old_img_name!='') unlink('./uploads/suggestion_image/'.$old_img_name);
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

                // =============================upload 1=============================================

                // =============================upload 2=============================================
                $old_new_name = $this->input->post('old_new_name');
                
                if(!empty($_FILES['image_name_2']) && $_FILES['image_name_2']['name'] !='')
                {
               $file_name     = $_FILES['image_name_2']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                $file_name = $_FILES['image_name_2'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['image_name_2']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/suggestion_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('image_name_2'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $new_img_filename = $file_name_to_dispaly_pdf;
                    if($old_new_name!='') unlink('./uploads/suggestion_image/'.$old_new_name);
                }
                else
                {
                    $new_img_filename = $this->input->post('image_name_2',TRUE);
                    
                }
            }
            else
            {
                $new_img_filename = $old_new_name;
                
            }
			
                // =============================upload 2=============================================
                // =============================upload 3============================================
                $old_inclusion_name = $this->input->post('old_inclusion_name');
                
            if(!empty($_FILES['image_name_3']) && $_FILES['image_name_3']['name'] !='')
            {
            
            $file_name     = $_FILES['image_name_3']['name']; 

            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

            $file_name = $_FILES['image_name_3'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

            if($file_name['name']!="")
            {
                
                $ext = explode('.',$_FILES['image_name_3']['name']); 
                $config['file_name'] = rand(1000,90000);

                if(!in_array($ext[1],$arr_extension))
                {
                    $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                }
            }   

            $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
        
            $config['upload_path']   = './uploads/suggestion_image/';
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
            $config['max_size']      = '10000';
            $config['file_name']     = $file_name_to_dispaly_pdf;
            $config['overwrite']     = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config); // Important
            
            if(!$this->upload->do_upload('image_name_3'))
            {  
                
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error_message',$this->upload->display_errors());
                redirect($this->module_url_path.'/edit/'.$id);
            }
            if($file_name['name']!="")
            {   
                $file_name = $this->upload->data();
                $inclusion_img_filename = $file_name_to_dispaly_pdf;
                if($old_inclusion_name!='') unlink('./uploads/suggestion_image/'.$old_inclusion_name);
            }
            else
            {
                $inclusion_img_filename = $this->input->post('image_name_3',TRUE);
                
            }
            }
            else
            {
                $inclusion_img_filename = $old_inclusion_name;
                
            }

                // =============================upload 3============================================

                
                $city            = $this->input->post('city'); 
                $other_city            = $this->input->post('other_city'); 
                $package_type            = $this->input->post('package_type'); 
                $description        = trim($this->input->post('description'));
                $priority      = trim($this->input->post('priority'));
                $tour_number      = trim($this->input->post('tour_number'));
                $arr_update = array(
                    'city'   =>   $city,
                    'other_city'   =>   $other_city,
                    'package_type'   =>   $package_type,
                    'description'          => $description,
                    'priority'        => $priority,
                    'tour_number'        => $tour_number,
                    'tour_manager_id'        => $id,
                    'image_name'    => $filename,
                    'image_name_2'    => $new_img_filename,
                    'image_name_3'    => $inclusion_img_filename,
                );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('suggestion_module',$arr_update,$arr_where);
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
		 $this->db->order_by('tour_number','ASC');
         $packages_data = $this->master_model->getRecords('packages');
        //  print_r($packages_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $suggestion_data = $this->master_model->getRecords('suggestion_module');
        //  print_r($suggestion_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $city = $this->master_model->getRecords('city');
        // print_r($package_type); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $package_type = $this->master_model->getRecords('package_type');
        // print_r($package_type); die;
        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['package_type']        = $package_type;
        $this->arr_view_data['city']        = $city;
        $this->arr_view_data['suggestion_data']        = $suggestion_data;
        $this->arr_view_data['packages_data']        = $packages_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

    //============

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
        
        $record = array();
        $fields = "suggestion_module.*,packages.tour_title,packages.tour_number,package_type.package_type,city.city_name";
        $this->db->where('suggestion_module.is_deleted','no');
        $this->db->where('suggestion_module.id',$id);
        $this->db->join("package_type", 'suggestion_module.package_type=package_type.id','left');
        $this->db->join("packages", 'suggestion_module.tour_number=packages.id','left');
        $this->db->join("city", 'suggestion_module.city=city.id','left');
        $arr_data = $this->master_model->getRecords('suggestion_module',array('suggestion_module.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

    public function get_package(){ 
        // POST data 
        // $all_b=array();
       $district_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('package_type',$district_data);   
                        $data = $this->master_model->getRecords('packages');
        echo json_encode($data);
    }

}