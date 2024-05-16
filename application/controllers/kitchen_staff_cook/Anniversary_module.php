<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Anniversary_module extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/anniversary_module";
        $this->module_title       = "Anniversary Module";
        $this->module_url_slug    = "anniversary_module";
        $this->module_view_folder = "anniversary_module/";    
        $this->load->library('upload');
	}

	public function index()
	{ 
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

        $record = array();
        $fields = "asign_tour_manager.*,all_traveller_info.anniversary_date,all_traveller_info.mobile_number,all_traveller_info.first_name,all_traveller_info.middle_name,all_traveller_info.last_name,all_traveller_info.age";
        $this->db->where('asign_tour_manager.is_deleted','no');
        $this->db->join("all_traveller_info", 'asign_tour_manager.package_id=all_traveller_info.package_id','left');
        $arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}
        
    
    // public function add()
    // {   
	// 	$tour_manager_sess_name = $this->session->userdata('tour_manager_name');
    //     $id = $this->session->userdata('tour_manager_sess_id'); 

    //     if($this->input->post('submit'))
    //     {
    //             $file_name     = $_FILES['image_name']['name'];
    //             $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

    //             if($file_name!="")
    //             {               
    //                 $ext = explode('.',$_FILES['image_name']['name']); 
    //                 $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

    //                 if(!in_array($ext[1],$arr_extension))
    //                 {
    //                     $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
    //                     redirect($this->module_url_path.'/add');  
    //                 }
    //             }
    //             $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

    //             $config['upload_path']   = './uploads/suggestion_image/';
    //             $config['allowed_types'] = 'png|jpg|JPG|PNG|JPEG|jpeg|PDF|pdf'; 
    //             $config['max_size']      = '10000';
    //             $config['file_name']     =  $file_name_to_dispaly;
    //             $config['overwrite']     =  TRUE;

    //             $this->load->library('upload',$config);
    //             $this->upload->initialize($config); // Important

    //             if(!$this->upload->do_upload('image_name'))
    //             {  
    //                 $data['error'] = $this->upload->display_errors();
    //                 $this->session->set_flashdata('error_message',$this->upload->display_errors());
    //                 redirect($this->module_url_path);  
    //             }

    //             if($file_name!="")
    //             {
    //                 $file_name = $this->upload->data();
    //                 $filename = $file_name_to_dispaly;
    //             }
    //             else
    //             {
    //                 $filename = $this->input->post('image_name',TRUE);
    //             }
              
    //             $title            = $this->input->post('title'); 
    //             $description        = trim($this->input->post('description'));
    //             $priority      = trim($this->input->post('priority'));
    //             $tour_number      = trim($this->input->post('tour_number'));
    //             $arr_insert = array(
    //                 'title'   =>   $title,
    //                 'description'          => $description,
    //                 'priority'        => $priority,
    //                 'tour_number'        => $tour_number,
    //                 'tour_manager_id'        => $id,
    //                 'image_name'    => $filename,
    //                 'status'            => 'pending'
    //             );
                
    //             $inserted_id = $this->master_model->insertRecord('suggestion_module',$arr_insert,true);
                               
    //             if($inserted_id > 0)
    //             {    
    //                 $this->session->set_flashdata('success_message',"Suggestion Image Added Successfully.");
    //                 redirect($this->module_url_path.'/index');
    //             }
    //             else
    //             {
    //                 $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
    //             }
    //             redirect($this->module_url_path.'/index');
            
    //     }

    //     $this->db->where('is_deleted','no');
	// 	 $this->db->order_by('tour_number','ASC');
    //      $packages_data = $this->master_model->getRecords('packages');
    //     //  print_r($packages_data); die;

    //     $this->arr_view_data['tour_manager_sess_name']          = $tour_manager_sess_name;
    //     $this->arr_view_data['packages_data']          = $packages_data;
    //     $this->arr_view_data['action']          = 'add';
    //     $this->arr_view_data['page_title']      = " Add ".$this->module_title;
    //     $this->arr_view_data['module_title']    = $this->module_title;
    //     $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //     $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
    //     $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    // }

    


    
   
  // Active/Inactive
  
//   public function active_inactive($id,$type)
//     {
//         $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
//         $iid = $this->session->userdata('tour_manager_sess_id'); 

// 	  	$id=base64_decode($id);
//         if($id!="" && ($type == "yes" || $type == "no") )
//         {   
//             $this->db->where('id',$id);
//             $arr_data = $this->master_model->getRecords('suggestion_module');
//             if(empty($arr_data))
//             {
//                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//                redirect($this->module_url_path.'/index');
//             }   

//             $arr_update =  array();

//             if($type == 'yes')
//             {
//                 $arr_update['is_active'] = "no";
//             }
//             else
//             {
//                 $arr_update['is_active'] = "yes";
//             }
            
//             if($this->master_model->updateRecord('suggestion_module',$arr_update,array('id' => $id)))
//             {
//                 $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
//             }
//             else
//             {
//              $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
//             }
//         }
//         else
//         {
//            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//         }
//         redirect($this->module_url_path.'/index');   
//     }

    
    // Delete
    
    // public function delete($id)
    //  {
    //     $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
    //     $iid = $this->session->userdata('tour_manager_sess_id'); 
         
    //     $id=base64_decode($id);
    //      if(is_numeric($id))
    //      {   
    //          $this->db->where('id',$id);
    //          $arr_data = $this->master_model->getRecords('suggestion_module');
 
    //          if(empty($arr_data))
    //          {
    //              $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //              redirect($this->module_url_path);
    //          }
    //          $arr_update = array('is_deleted' => 'yes');
    //          $arr_where = array("id" => $id);
                  
    //          if($this->master_model->updateRecord('suggestion_module',$arr_update,$arr_where))
    //          {
    //              $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
    //          }
    //          else
    //          {
    //              $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
    //          }
    //      }
    //      else
    //      {
            
    //             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //      }
    //      redirect($this->module_url_path.'/index');  

    //  }

   
    // Edit - Get data for edit
    
    // public function edit($id)
    // {
    //     $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
    //     $iid = $this->session->userdata('tour_manager_sess_id'); 
        
	// 	$id=base64_decode($id);
    //     if ($id=='') 
    //     {
    //         $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //         redirect($this->module_url_path.'/index');
    //     }   
    //     else
    //     {   
    //         $this->db->where('id',$id);
    //         $arr_data = $this->master_model->getRecords('suggestion_module');
    //         if($this->input->post('submit'))
    //         {
    //             	 $old_img_name = $this->input->post('old_img_name');
    //                 if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
    //                 {
    //                 $file_name     = $_FILES['image_name']['name'];
    //                 $arr_extension = array('png','jpg','jpeg','JPEG','PNG','JPG','PDF','pdf');

    //                 $file_name = $_FILES['image_name'];
    //                 $arr_extension = array('png','jpg','jpeg','JPEG','PNG','JPG','PDF','pdf');

    //                 if($file_name['name']!="")
    //                 {
    //                     $ext = explode('.',$_FILES['image_name']['name']); 
    //                     $config['file_name'] = rand(1000,90000);

    //                     if(!in_array($ext[1],$arr_extension))
    //                     {
    //                         $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
    //                         redirect($this->module_url_path.'/edit/'.$id);
    //                     }
    //                 }   

    //                 $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                    
    //                 $config['upload_path']   = './uploads/suggestion_image/';
    //                 $config['allowed_types'] = 'JPEG|PNG|JPG|png|jpg|jpeg|PDF|pdf';  
    //                 $config['max_size']      = '10000';
    //                 $config['file_name']     = $file_name_to_dispaly;
    //                 $config['overwrite']     = TRUE;
    //                 $this->load->library('upload',$config);
    //                 $this->upload->initialize($config); // Important
                    
    //                 if(!$this->upload->do_upload('image_name'))
    //                 {  
    //                     $data['error'] = $this->upload->display_errors();
    //                     $this->session->set_flashdata('error_message',$this->upload->display_errors());
    //                      redirect($this->module_url_path.'/edit/'.$id);
    //                 }
    //                 if($file_name['name']!="")
    //                 {   
    //                     $file_name = $this->upload->data();
    //                     $filename = $file_name_to_dispaly;
    //                     if($old_img_name!='') unlink('./uploads/suggestion_image/'.$old_img_name);
    //                 }

    //                 else
    //                 {
    //                     $filename = $this->input->post('image_name',TRUE);
    //                 }
    //             }
    //             else
    //             {
    //                 $filename = $old_img_name;
    //             }
                
    //                 $title            = $this->input->post('title'); 
    //                 $description        = trim($this->input->post('description'));
    //                 $priority      = trim($this->input->post('priority'));
    //                 $tour_number      = trim($this->input->post('tour_number'));
    //                 $arr_update = array(
    //                 'title'   =>   $title,
    //                 'description'          => $description,
    //                 'priority'        => $priority,
    //                 'tour_number'        => $tour_number,
    //                 // 'tour_manager_id'        => $id,
    //                 'image_name'    => $filename
    //                 );
    //                 $arr_where     = array("id" => $id);
    //                $this->master_model->updateRecord('suggestion_module',$arr_update,$arr_where);
    //                 if($id > 0)
    //                 {
    //                     $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
    //                 }
    //                 else
    //                 {
    //                     $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
    //                 }
    //                 redirect($this->module_url_path.'/index');
                
    //         }
    //     }
        
    //     $this->db->where('is_deleted','no');
	// 	 $this->db->order_by('tour_number','ASC');
    //      $packages_data = $this->master_model->getRecords('packages');
    //     //  print_r($packages_data); die;

    //     $this->db->where('is_deleted','no');
    //     $this->db->where('id',$id);
    //     $suggestion_data = $this->master_model->getRecords('suggestion_module');
    //     //  print_r($suggestion_data); die;
        
    //     $this->arr_view_data['arr_data']        = $arr_data;
    //     $this->arr_view_data['suggestion_data']        = $suggestion_data;
    //     $this->arr_view_data['packages_data']        = $packages_data;
    //     $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
    //     $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
    //     $this->arr_view_data['module_title']    = $this->module_title;
    //     $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //     $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
    //     $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    // }

    //============

    // public function details($id)
    // {
    //     $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
    //     $iid = $this->session->userdata('tour_manager_sess_id'); 

	// 	$id=base64_decode($id);
    //     if ($id=='') 
    //     {
    //         $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //         redirect($this->module_url_path.'/index');
    //     }   
        
    //     $record = array();
    //     $fields = "suggestion_module.*,packages.tour_title,packages.tour_number";
    //     $this->db->where('suggestion_module.is_deleted','no');
    //     $this->db->where('suggestion_module.id',$id);
    //     $this->db->join("packages", 'suggestion_module.tour_number=packages.id','left');
    //     $arr_data = $this->master_model->getRecords('suggestion_module',array('suggestion_module.is_deleted'=>'no'),$fields);
    //     // print_r($arr_data); die;
        
    //     $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
    //     $this->arr_view_data['arr_data']        = $arr_data;
    //     $this->arr_view_data['page_title']      = $this->module_title." Details ";
    //     $this->arr_view_data['module_title']    = $this->module_title;
    //     $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //     $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
    //     $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    // }
   
}