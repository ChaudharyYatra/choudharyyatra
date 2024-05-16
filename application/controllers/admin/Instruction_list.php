<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Instruction_list extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/instruction_list";
        $this->module_url_path_dates    =  base_url().$this->config->item('admin_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('admin_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('admin_panel_slug')."/domestic_package_review";
        $this->module_title       = "Instruction";
        $this->module_url_slug    = "instruction_list";
        $this->module_view_folder = "instruction_list/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $fields = "packages.*,package_type.package_type,package_type.id as pid, packages.id as pack_id";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
		$this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
// 
        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $tm_instraction = $this->master_model->getRecord('tm_instraction');
        // print_r($tm_instraction); die;

        // foreach($tm_instraction as $tm_instraction_data){
        //     $tm_instraction_tour_no =  $tm_instraction_data['tour_no'];
        // }

        // $this->arr_view_data['tm_instraction']        = $tm_instraction;

        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}
	
	
    public function add($id)
    {   
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');

            $this->db->where('tour_no',$id);
            $arr_data2 = $this->master_model->getRecords('tm_instraction_attachment');

                    

        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $arr_data = $this->master_model->getRecords('packages');

        $this->db->where('is_active','yes');
        $arr_data3 = $this->master_model->getRecord('tm_instraction');
        
        if($this->input->post('submit'))
        {

            $this->form_validation->set_rules('tour_number', 'tour number', 'required');
            $this->form_validation->set_rules('instraction[]', 'instraction', 'required');
            $this->form_validation->set_rules('priority[]', 'priority', 'required');

            
            if($this->form_validation->run() == TRUE)
            {

                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

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

                $config['upload_path']   = './uploads/tm_instraction/';
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


                $tour_no	  = $this->input->post('tour_no'); 
                $tour_number	  = $this->input->post('tour_number'); 
                $instraction	        = $this->input->post('instraction');
                $priority	        = $this->input->post('priority');

                $arr_insert = array(
                    'tour_no'   =>   $_POST["tour_no"],
                    'tour_number'   =>   $_POST["tour_number"],
                    'image_name	'   =>   $filename,
                );

                $inserted_id = $this->master_model->insertRecord('tm_instraction_attachment',$arr_insert,true);
                $insertid = $this->db->insert_id();
                
                $count = count($priority);
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'tour_no'   =>   $_POST["tour_no"],
                        'tour_number'   =>   $_POST["tour_number"],
                        'instraction'   => $_POST["instraction"][$i],
                        'priority'      => $_POST["priority"][$i],
                        'tm_instraction_attachment_id'         =>   $insertid
                        
                    );
                    
                    $inserted_id = $this->master_model->insertRecord('tm_instraction',$arr_insert,true);
                }

                $arr_update = array(
                    'instraction_status'      => 'yes'
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('packages',$arr_update,$arr_where);
                               
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
     }
     else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }



        $this->arr_view_data['action']          = 'add';
        // $this->arr_view_data['packages'] = $packages;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data2']        = $arr_data2;
        $this->arr_view_data['arr_data3']        = $arr_data3;
        $this->arr_view_data['page_title']      = " Add Instruction For Tour Manager";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

// -- for if instruction added bt need to Add new instruction

    public function add_new_instruction($id)
    {   
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');

            $this->db->where('tour_no',$id);
            $arr_data2 = $this->master_model->getRecord('tm_instraction_attachment');

                    
            

        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $arr_data = $this->master_model->getRecords('packages');

        // $this->db->where('is_active','yes');
        $this->db->where('tour_no',$id);
        $arr_data3 = $this->master_model->getRecord('tm_instraction');
        
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('tour_number', 'tour number', 'required');
            $this->form_validation->set_rules('instraction[]', 'instraction', 'required');
            $this->form_validation->set_rules('priority[]', 'priority', 'required');

            
            if($this->form_validation->run() == TRUE)
            {


                $tour_no	  = $this->input->post('tour_no'); 
                $tour_number	  = $this->input->post('tour_number'); 
                $instraction	        = $this->input->post('instraction');
                $priority	        = $this->input->post('priority');

                $attchment_id	        = $this->input->post('attchment_id');

                
                $count = count($priority);
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'tour_no'   =>   $_POST["tour_no"],
                        'tour_number'   =>   $_POST["tour_number"],
                        'instraction'   => $_POST["instraction"][$i],
                        'priority'      => $_POST["priority"][$i],
                        'tm_instraction_attachment_id' =>  $_POST["attchment_id"]
                        
                    );
                    
                    $inserted_id = $this->master_model->insertRecord('tm_instraction',$arr_insert,true);
                }

                // $arr_update = array(
                //     'instraction_status'      => 'yes'
                // );
                
                //     $arr_where     = array("id" => $id);
                //     $this->master_model->updateRecord('packages',$arr_update,$arr_where);
                               
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
     }
     else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }



        $this->arr_view_data['action']          = 'add';
        // $this->arr_view_data['packages'] = $packages;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data2']        = $arr_data2;
        $this->arr_view_data['arr_data3']        = $arr_data3;
        $this->arr_view_data['page_title']      = " Add Instruction For Tour Manager";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add_new_instruction";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


   
    // Edit - Get data for edit
    
    public function edit($id)
    {
		if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('tour_no',$id);
            $this->db->where('is_active','yes');
            $arr_data_main = $this->master_model->getRecord('tm_instraction_attachment');
            // print_r($arr_data_main);
            //             die;

            $this->db->where('tour_no',$id);
            $this->db->where('is_active','yes');
            $this->db->where('is_deleted','no');
            $arr_data = $this->master_model->getRecords('tm_instraction');

            
            
            
        
            if($this->input->post('submit'))
            {
                // $this->form_validation->set_rules('tour_number', 'tour number', 'required');
                // $this->form_validation->set_rules('instraction[]', 'instraction', 'required');
                // $this->form_validation->set_rules('priority[]', 'priority', 'required');

                // if($this->form_validation->run() == TRUE)
                // {

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
                    
                    $config['upload_path']   = './uploads/tm_instraction/';
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
                        if($old_img_name!='') unlink('./uploads/tm_instraction/'.$old_img_name);
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


                $tour_no	  = $this->input->post('tour_no'); 
                $tour_number	  = $this->input->post('tour_number'); 
                $instraction	        = $this->input->post('instraction');
                $priority	        = $this->input->post('priority');

                $tm_intr_id	        = $this->input->post('tm_intr_id');
                $tm_intr_attachment_id	 = $this->input->post('tm_intr_attachment_id');

                $arr_update = array(
                    'tour_no'   =>   $_POST["tour_no"],
                    'tour_number'   =>   $_POST["tour_number"],
                    'image_name	'   =>   $filename
                );

                
                $arr_where     = array("id" => $tm_intr_attachment_id);
                $this->master_model->updateRecord('tm_instraction_attachment',$arr_update,$arr_where);
                
                if($priority !=''){
                $count = count($priority);
                for($i=0;$i<$count;$i++)
                {
                    $arr_update = array(
                        'tour_no'   =>   $_POST["tour_no"],
                        'tour_number'   =>   $_POST["tour_number"],
                        'instraction'   => $_POST["instraction"][$i],
                        'priority'      => $_POST["priority"][$i]
                    );

                
                    $arr_where     = array("id" => $tm_intr_id[$i]);
                    $this->master_model->updateRecord('tm_instraction',$arr_update,$arr_where);
                }
            }
                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index');
                
            // }
          }
        }
        
        $this->db->where('id',$id);
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $packages = $this->master_model->getRecords('packages');
        // print_r($packages); die;

        $this->db->where('tour_no',$id);
        $this->db->where('is_active','yes');
        $this->db->group_by('tour_no');
        $arr_data2 = $this->master_model->getRecords('tm_instraction');
        // print_r($arr_data2); die;

        $this->db->where('tour_no',$id);
        $this->db->where('is_active','yes');
        $this->db->group_by('tour_no');
        $arr_data3 = $this->master_model->getRecord('tm_instraction_attachment');
        // print_r($arr_data3); die;

        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data2']        = $arr_data2;
        $this->arr_view_data['arr_data3']        = $arr_data3;
        $this->arr_view_data['arr_data_main']        = $arr_data_main;
        $this->arr_view_data['packages']        = $packages;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function delete()
    {
        $id  = $this->input->post('request_id');

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('tm_instraction');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('tm_instraction',$arr_update,$arr_where))
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

        return true; 
    }



// ---------- for customer instruction add,edit,etc. --------------------------------------------------

public function add_for_cust($id)
{   
    if ($id=='') 
    {
        $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        redirect($this->module_url_path.'/index');
    }   

    if(is_numeric($id))
    {   
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('packages');

        $this->db->where('tour_no',$id);
        $arr_data2 = $this->master_model->getRecords('tm_instraction_attachment');

                

    // $this->db->order_by('id','desc');
    // $this->db->where('is_deleted','no');
    // $this->db->where('is_active','yes');
    // $arr_data = $this->master_model->getRecords('packages');

    $this->db->where('is_active','yes');
    $arr_data3 = $this->master_model->getRecord('tm_instraction');
    
    if($this->input->post('submit'))
    {

        $this->form_validation->set_rules('tour_number', 'tour number', 'required');
        $this->form_validation->set_rules('instraction[]', 'instraction', 'required');
        $this->form_validation->set_rules('priority[]', 'priority', 'required');

        
        if($this->form_validation->run() == TRUE)
        {

            $file_name     = $_FILES['image_name']['name'];
            $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

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

            $config['upload_path']   = './uploads/cust_instraction/';
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


            $tour_no	  = $this->input->post('tour_no'); 
            $tour_number	  = $this->input->post('tour_number'); 
            $instraction	        = $this->input->post('instraction');
            $priority	        = $this->input->post('priority');

            $arr_insert = array(
                'tour_no'   =>   $_POST["tour_no"],
                'tour_number'   =>   $_POST["tour_number"],
                'image_name	'   =>   $filename,
            );

            $inserted_id = $this->master_model->insertRecord('cust_instraction_attachment',$arr_insert,true);
            $insertid = $this->db->insert_id();
            
            $count = count($priority);
            for($i=0;$i<$count;$i++)
            {
                $arr_insert = array(
                    'tour_no'   =>   $_POST["tour_no"],
                    'tour_number'   =>   $_POST["tour_number"],
                    'instraction'   => $_POST["instraction"][$i],
                    'priority'      => $_POST["priority"][$i],
                    'cust_instraction_attachment_id' =>   $insertid
                    
                );
                
                $inserted_id = $this->master_model->insertRecord('cust_instraction',$arr_insert,true);
            }

            $arr_update = array(
                'cust_instraction_status'      => 'yes'
            );
            
                $arr_where     = array("id" => $id);
                $this->master_model->updateRecord('packages',$arr_update,$arr_where);
                           
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
 }
 else
    {
        $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        redirect($this->module_url_path.'/index');
    }



    $this->arr_view_data['action']          = 'add';
    // $this->arr_view_data['packages'] = $packages;
    $this->arr_view_data['arr_data']        = $arr_data;
    $this->arr_view_data['arr_data2']        = $arr_data2;
    $this->arr_view_data['arr_data3']        = $arr_data3;
    $this->arr_view_data['page_title']      = " Add Instruction For Customer";
    $this->arr_view_data['module_title']    = $this->module_title;
    $this->arr_view_data['module_url_path'] = $this->module_url_path;
    $this->arr_view_data['middle_content']  = $this->module_view_folder."add_for_cust";
    $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
}


// -- for if instruction added bt need to Add new instruction

    public function add_new_cust_instruction($id)
    {   
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');

            $this->db->where('tour_no',$id);
            $arr_data2 = $this->master_model->getRecord('cust_instraction_attachment');

                    

        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $this->db->where('is_active','yes');
        // $arr_data = $this->master_model->getRecords('packages');

        // $this->db->where('is_active','yes');
        $this->db->where('tour_no',$id);
        $arr_data3 = $this->master_model->getRecord('cust_instraction');
        
        if($this->input->post('submit'))
        {

            $this->form_validation->set_rules('tour_number', 'tour number', 'required');
            $this->form_validation->set_rules('instraction[]', 'instraction', 'required');
            $this->form_validation->set_rules('priority[]', 'priority', 'required');

            
            if($this->form_validation->run() == TRUE)
            {


                $tour_no	  = $this->input->post('tour_no'); 
                $tour_number	  = $this->input->post('tour_number'); 
                $instraction	        = $this->input->post('instraction');
                $priority	        = $this->input->post('priority');

                $attchment_id	        = $this->input->post('attchment_id');

                
                $count = count($priority);
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'tour_no'   =>   $_POST["tour_no"],
                        'tour_number'   =>   $_POST["tour_number"],
                        'instraction'   => $_POST["instraction"][$i],
                        'priority'      => $_POST["priority"][$i],
                        'cust_instraction_attachment_id' =>  $_POST["attchment_id"]
                        
                    );
                    
                    $inserted_id = $this->master_model->insertRecord('cust_instraction',$arr_insert,true);
                }

                // $arr_update = array(
                //     'instraction_status'      => 'yes'
                // );
                
                //     $arr_where     = array("id" => $id);
                //     $this->master_model->updateRecord('packages',$arr_update,$arr_where);
                            
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
     }
     else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }



        $this->arr_view_data['action']          = 'add';
        // $this->arr_view_data['packages'] = $packages;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data2']        = $arr_data2;
        $this->arr_view_data['arr_data3']        = $arr_data3;
        $this->arr_view_data['page_title']      = " Add Instruction Customer";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add_new_cust_instruction";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


    // Edit - Get data for edit
    
    public function edit_for_cust($id)
    {
		if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('tour_no',$id);
            $this->db->where('is_active','yes');
            $arr_data_main = $this->master_model->getRecord('cust_instraction_attachment');
            // print_r($arr_data_main);
            //             die;

            $this->db->where('tour_no',$id);
            $this->db->where('is_active','yes');
            $this->db->where('is_deleted','no');
            $arr_data = $this->master_model->getRecords('cust_instraction');

            
            
            
        
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('tour_number', 'tour number', 'required');
                $this->form_validation->set_rules('instraction[]', 'instraction', 'required');
                $this->form_validation->set_rules('priority[]', 'priority', 'required');

                if($this->form_validation->run() == TRUE)
                {

                //  print_r($_REQUEST);

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
                    
                    $config['upload_path']   = './uploads/cust_instraction/';
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
                        if($old_img_name!='') unlink('./uploads/cust_instraction/'.$old_img_name);
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


                $tour_no	  = $this->input->post('tour_no'); 
                $tour_number	  = $this->input->post('tour_number'); 
                $instraction	        = $this->input->post('instraction');
                $priority	        = $this->input->post('priority');

                $cust_intr_id	        = $this->input->post('cust_intr_id');
                $cust_intr_attachment_id	 = $this->input->post('cust_intr_attachment_id');

                $arr_update = array(
                    'tour_no'   =>   $_POST["tour_no"],
                    'tour_number'   =>   $_POST["tour_number"],
                    'image_name	'   =>   $filename
                );

            
                $arr_where     = array("id" => $cust_intr_attachment_id);
                $this->master_model->updateRecord('cust_instraction_attachment',$arr_update,$arr_where);
                
                $count = count($priority);
                for($i=0;$i<$count;$i++)
                {
                    $arr_update = array(
                        'tour_no'   =>   $_POST["tour_no"],
                        'tour_number'   =>   $_POST["tour_number"],
                        'instraction'   => $_POST["instraction"][$i],
                        'priority'      => $_POST["priority"][$i]
                    );

                
                    $arr_where     = array("id" => $cust_intr_id[$i]);
                    $this->master_model->updateRecord('cust_instraction',$arr_update,$arr_where);
                }
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
        
        $this->db->where('id',$id);
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $packages = $this->master_model->getRecords('packages');
        // print_r($packages); die;

        $this->db->where('tour_no',$id);
        $this->db->where('is_active','yes');
        $this->db->group_by('tour_no');
        $arr_data2 = $this->master_model->getRecords('cust_instraction');

        $this->db->where('tour_no',$id);
        $this->db->where('is_active','yes');
        $this->db->group_by('tour_no');
        $arr_data3 = $this->master_model->getRecord('cust_instraction_attachment');

        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data2']        = $arr_data2;
        $this->arr_view_data['arr_data3']        = $arr_data3;
        $this->arr_view_data['arr_data_main']        = $arr_data_main;
        $this->arr_view_data['packages']        = $packages;
        $this->arr_view_data['page_title']      = "Edit Customer ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit_for_cust";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


    public function cust_instraction_delete()
    {
        $id  = $this->input->post('request_id');

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('cust_instraction');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }

            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('cust_instraction',$arr_update,$arr_where))
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

        return true; 
    }




// =======================================================================================================
    // Get Details of Package
    public function details($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "packages.*,academic_years.year";
        $this->db->where('packages.id',$id);
        $this->db->join("academic_years", 'packages.academic_year=academic_years.id','left');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
   
}