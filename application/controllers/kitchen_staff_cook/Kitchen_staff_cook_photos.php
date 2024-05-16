<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kitchen_staff_cook_photos extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/kitchen_staff_cook_photos";
        $this->module_url_path_assign_tour    =  base_url().$this->config->item('kitchen_staff_cook_panel_slug')."kitchen_staff_cook/asign_tour_to_manager";
        $this->module_title       = "Kitchen Menu Photos";
        $this->module_url_slug    = "kitchen_staff_cook_photos";
        $this->module_view_folder = "kitchen_staff_cook_photos/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $fields = "kitchen_staff_cook_photos.*,packages.tour_title,packages.tour_number,package_date.journey_date,
        package_date.id as did";
        $this->db->where('kitchen_staff_cook_photos.is_deleted','no');
        $this->db->where('kitchen_staff_cook_photos.kitchen_staff_id',$id);
        $this->db->join("packages", 'kitchen_staff_cook_photos.package_id=packages.id','left');
        $this->db->join("package_date", 'kitchen_staff_cook_photos.package_date_id=package_date.id','left');
        $arr_data = $this->master_model->getRecords('kitchen_staff_cook_photos',array('kitchen_staff_cook_photos.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        // $fields = "tour_photos.*,packages.tour_title,packages.tour_number,package_date.journey_date,
        // package_date.id as did";
        // $this->db->where('tour_photos.is_deleted','no');
        // $this->db->where('tour_photos.tour_manager_id',$id);
        // $this->db->join("packages", 'tour_photos.package_id=packages.id','left');
        // // $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        // $arr_data = $this->master_model->getRecords('tour_photos',array('tour_photos.is_deleted'=>'no'),$fields);
        // // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('kitchen_staff_cook/layout/agent_combo',$this->arr_view_data);
       
	}
	
	
    public function add($id,$did)
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id'); 

        $id=base64_decode($id);
        $did=base64_decode($did);
        if ($id=='') 
        {
            
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if($id!='')
        {   
            // echo 'hiiiiiiiiiii' ; die;
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');
            // print_r($arr_data); die;

        if($this->input->post('submit'))
        {
            // print_r($_REQUEST); die;
            $this->form_validation->set_rules('tour_days', 'tour_days', 'required');
            // $this->form_validation->set_rules('image_name', 'image_name', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                
                // ==============================upload image one================================================
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['image_name']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/index');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/Kitchen_menu_photos/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|pdf|PDF'; 
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

                // ==============================upload image one================================================

                // ==============================upload image two================================================
                $file_name     = $_FILES['image_name_two']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['image_name_two']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/index');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/Kitchen_menu_photos/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|pdf|PDF'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('image_name_two'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                if($file_name!="")
                {
                    $file_name = $this->upload->data();
                    $image_two_filename = $file_name_to_dispaly;
                }

                else
                {
                    $image_two_filename = $this->input->post('image_name_two',TRUE);
                }

                // ==============================upload image two================================================

                $tour_days	  = $this->input->post('tour_days'); 
                $menu_type	  = $this->input->post('menu_type'); 
                $menu_name	  = $this->input->post('menu_name'); 

                $arr_insert = array(
                    'tour_days'   =>   $tour_days,
                    'menu_type'   =>   $menu_type,
                    'menu_name'   =>   $menu_name,
                    'image_name	'   =>   $filename,
                    'image_name_two	'   =>   $image_two_filename,
                    'package_id	'   =>   $id,
                    'kitchen_staff_id'   =>   $iid,
                    'package_date_id'   =>   $did

                );
                // print_r($arr_insert); die;

                $this->db->where('tour_days',$tour_days);
                $this->db->where('menu_type',$menu_type);
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $department_exist_data = $this->master_model->getRecords('kitchen_staff_cook_photos');
                if(count($department_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"Menu ".$menu_type." Already Exist.");
                    redirect($this->module_url_path_assign_tour.'/index');
                }

                $inserted_id = $this->master_model->insertRecord('kitchen_staff_cook_photos',$arr_insert,true);
                

                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                    redirect($this->module_url_path.'/index');
                }
                
            
            }
       
        }
     }
     else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = " Add Instruction For Kitchen Menu";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_assign_tour'] = $this->module_url_path_assign_tour;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('kitchen_staff_cook/layout/agent_combo',$this->arr_view_data);
    }


    // Edit - Get data for edit
    
    public function edit($tid,$id,$did)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $tid=base64_decode($tid);
        $id=base64_decode($id);
        $did=base64_decode($did);
        // $did=base64_decode($did);
		if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if($id!='')
        {   
            if($this->input->post('submit'))
            {
                // print_r($_REQUEST); die;
                $this->form_validation->set_rules('tour_days', 'tour_days', 'required');

                if($this->form_validation->run() == TRUE)
                {
// -------------------------------------upload image 1----------------------------------------------------------------
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
                    
                    $config['upload_path']   = './uploads/Kitchen_menu_photos/';
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
                        if($old_img_name!='') unlink('./uploads/Kitchen_menu_photos/'.$old_img_name);
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
// -------------------------------------upload image 1----------------------------------------------------------------

// -------------------------------------upload image 2----------------------------------------------------------------
$old_img_name_two = $this->input->post('old_img_name_two');
                
if(!empty($_FILES['image_name_two']) && $_FILES['image_name_two']['name'] !='')
{
$file_name     = $_FILES['image_name_two']['name'];
$arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

$file_name = $_FILES['image_name_two'];
$arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

if($file_name['name']!="")
{
    $ext = explode('.',$_FILES['image_name_two']['name']); 
    $config['file_name'] = rand(1000,90000);

    if(!in_array($ext[1],$arr_extension))
    {
        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
        redirect($this->module_url_path.'/edit/'.$id);
    }
}   

$file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);

$config['upload_path']   = './uploads/Kitchen_menu_photos/';
$config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
$config['max_size']      = '10000';
$config['file_name']     = $file_name_to_dispaly;
$config['overwrite']     = TRUE;
$this->load->library('upload',$config);
$this->upload->initialize($config); // Important

if(!$this->upload->do_upload('image_name_two'))
{  
    $data['error'] = $this->upload->display_errors();
    $this->session->set_flashdata('error_message',$this->upload->display_errors());
    redirect($this->module_url_path.'/edit/'.$id);
}
if($file_name['name']!="")
{   
    $file_name = $this->upload->data();
    $img_name_two_filename = $file_name_to_dispaly;
    if($old_img_name_two!='') unlink('./uploads/Kitchen_menu_photos/'.$old_img_name_two);
}
else
{
    $img_name_two_filename = $this->input->post('image_name_two',TRUE);
}
}
else
{
$img_name_two_filename = $old_img_name_two;
}
// -------------------------------------upload image 2----------------------------------------------------------------

                $tour_days	  = $this->input->post('tour_days'); 
                $menu_type	  = $this->input->post('menu_type'); 
                $menu_name	  = $this->input->post('menu_name'); 

                $arr_update = array(
                    'tour_days'   =>   $tour_days,
                    'menu_type'   =>   $menu_type,
                    'menu_name'   =>   $menu_name,
                    'image_name'   =>   $filename,
                    'image_name_two'   =>   $img_name_two_filename
                );

                // print_r($arr_update); die;
                $arr_where     = array("id" => $tid);
                $inserted_id = $this->master_model->updateRecord('kitchen_staff_cook_photos',$arr_update,$arr_where);
                // print_r($inserted_id); die;
                    if($inserted_id > 0)
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
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }
        
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('packages');
        // print_r($arr_data); die;

        $fields = "kitchen_staff_cook_photos.*,packages.tour_number_of_days";
        $this->db->where('package_date_id',$did);
        $this->db->where('package_id',$id);
        $this->db->where('kitchen_staff_cook_photos.id',$tid);
        $this->db->where('kitchen_staff_cook_photos.is_active','yes');
        $this->db->where('kitchen_staff_cook_photos.is_deleted','no');
        $this->db->join("packages", 'kitchen_staff_cook_photos.package_id=packages.id','left');
        $kitchen_staff_data = $this->master_model->getRecords('kitchen_staff_cook_photos',array('kitchen_staff_cook_photos.is_deleted'=>'no'),$fields);
        // print_r($kitchen_staff_data); die;
    
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['kitchen_staff_data']        = $kitchen_staff_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('kitchen_staff_cook/layout/agent_combo',$this->arr_view_data);
    }

    // Delete
    
    public function delete($id)
    {
        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('kitchen_staff_cook_photos');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('kitchen_staff_cook_photos',$arr_update,$arr_where))
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
   


// =================================================================
// Active/Inactive
public function active_inactive($id,$type)
{
      $id=base64_decode($id);
    if($id!="" && ($type == "yes" || $type == "no") )
    {   
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('kitchen_staff_cook_photos');
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
        
        if($this->master_model->updateRecord('kitchen_staff_cook_photos',$arr_update,array('id' => $id)))
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

   
}