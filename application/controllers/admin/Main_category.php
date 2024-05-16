<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_category extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table

	   
        // $this->user_id            =  $this->session->userdata('nabcons_id');
        // $this->name               =  $this->session->userdata('nabcons_username');
        // $this->ip                 =  $this->input->ip_address();
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/main_category";
        $this->module_title       = "Main Category";
        $this->module_url_slug    = "main_category";
        $this->module_view_folder = "main_category/";    
        $this->load->library('upload');
	}

	public function index()
	{
	    //$user_role = $this->session->userdata('nabcons_user_role');
        //$front_id = $this->session->userdata('nabcons_emp_id');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('main_category');

        // $this->arr_view_data['user_role']       = $user_role;
        // $this->arr_view_data['front_id']        = $front_id;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}
        
     function handle_upload($type,$secondval)
    {
              
            if($secondval=="add")
            {
                if (isset($_FILES['image_name']) && !empty($_FILES['image_name']['name']))
                {
                    $except = array("png","jpg");

                    if (!preg_match('/\.('.implode('|', $except).')$/', $_FILES['image_name']['name']))
                    {
                      $this->form_validation->set_message('handle_upload','Please Upload PNG/JPG File.');
                     return false;  
                    }
                    
                    
                }
                else
                {
                    $this->form_validation->set_message('handle_upload', $this->module_title." Image  Is Required. ");
                    return false;
                 }

 
            }
            else
            {  
                if (isset($_FILES['image_name']) && !empty($_FILES['image_name']['name']))
                {
                    
                       $except = array("png","jpg");

                        if (!preg_match('/\.('.implode('|', $except).')$/', $_FILES['image_name']['name']))
                        {
                          $this->form_validation->set_message('handle_upload','Please Upload PNG/JPG File.');
                         return false;  
                        }
                        
                    
                } 
                 
            }
      }


    public function add()
    {   

        // $nabcons_emp_id = $this->session->userdata('nabcons_emp_id');
        // $user_role = $this->session->userdata('nabcons_user_role');
       
        if($this->input->post('submit'))
        {
            
            // $language  = $this->input->post('language'); 

            $this->form_validation->set_rules('category_name', 'Category Name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('rating', 'Rating', 'required');
            $this->form_validation->set_rules('cost', 'Cost', 'required');
            

            // if($language=='both' or $language=='english')
            // {
            //     $this->form_validation->set_rules('name_english', 'English Title','trim|required|max_length[255]');
            //     $this->form_validation->set_rules('description_english', 'English Description', 'trim|required');
            // }
            // if($language=='both' or $language=='hindi')
            // {
            //     $this->form_validation->set_rules('name_hindi', 'Hindi Title', 'trim|required|max_length[255]');
            //     $this->form_validation->set_rules('description_hindi', 'Hindi description', 'trim|required');
            // }
            // $this->form_validation->set_rules('blog_date', 'Blog Date', 'trim|required');
            
            if($this->form_validation->run() == TRUE)
            {
                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG');

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

                $config['upload_path']   = './uploads/main_category/';
                $config['allowed_types'] = 'png|jpg'; 
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
              
                $category_name  = $this->input->post('category_name'); 
                $rating        = trim($this->input->post('rating'));
                $cost        = trim($this->input->post('cost'));
                $description = trim($this->input->post('description'));
                $arr_insert = array(
                    'category_name'   =>   $category_name,
                    'rating'          => $rating,
                    'cost'          => $cost,
                    'description'        => $description,
                    'image_name'    => $filename,
                );
                
                $inserted_id = $this->master_model->insertRecord('main_category',$arr_insert,true);
                               
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',"Main Category Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }

                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
        }

        //$img_id = $this->master_model->next_id("id", "nabcons_blogs");
        //$this->arr_view_data['img']          = $img_id;

        $this->arr_view_data['action']          = 'add';
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    

    

    

    
   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
        if(is_numeric($id) && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('sliders');
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
            
            if($this->master_model->updateRecord('sliders',$arr_update,array('id' => $id)))
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
        
        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('sliders');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('sliders',$arr_update,$arr_where))
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
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('sliders');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('sub_title', 'Sub Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
                if($this->form_validation->run() == TRUE)
                {
                // 	 $old_img_name = $this->input->post('old_img_name');
                //     if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                //     {
                //     $file_name     = $_FILES['image_name']['name'];
                //     $arr_extension = array('png','jpg','JPEG','PNG');

                   
                   // print_r($_FILES['new_img_name']);die;
                    // $file_name = $_FILES['image_name'];
                    // $arr_extension = array('png','jpg');

                    // if($file_name['name']!="")
                    // {
                    //     $ext = explode('.',$_FILES['image_name']['name']); 
                    //     $config['file_name'] = rand(1000,90000);

                    //     if(!in_array($ext[1],$arr_extension))
                    //     {
                    //         $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    //         redirect($this->module_url_path.'/edit/'.$id);
                    //     }
                    // }   

                    //$file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                    
                    //print_r($file_name_to_dispaly);
                    //print_r($file_name);die;
                   
                    // $config['upload_path']   = './uploads/banner/';
                    // $config['allowed_types'] = 'JPEG|PNG|png|jpg';  
                    // $config['max_size']      = '10000';
                    // $config['file_name']     = $file_name_to_dispaly;
                    // $config['overwrite']     = TRUE;
                    // $this->load->library('upload',$config);
                    // $this->upload->initialize($config); // Important
                    
                    // if(!$this->upload->do_upload('image_name'))
                    // {  
                    //     $data['error'] = $this->upload->display_errors();
                    //     $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    //      redirect($this->module_url_path.'/edit/'.$id);
                    // }
                    // if($file_name['name']!="")
                    // {   
                    //     $file_name = $this->upload->data();
                    //     $filename = $file_name_to_dispaly;
                    // }

                    // else
                    // {
                    //     $filename = $this->input->post('image_name',TRUE);
                    // }
                // }
                // else
                // {
                //     $filename = $old_img_name;
                // }
                
                   $title = trim($this->input->post('title'));
                   $sub_title = trim($this->input->post('sub_title'));
                   $description = trim($this->input->post('description'));
                  
                    $arr_update = array(
                        // 'image_name'    => $filename,
                        'title' => $title,
                        'sub_title' => $sub_title,
                        'description' => $description,
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('sliders',$arr_update,$arr_where);
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
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }
         
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    //============
    public function upload($id){

        // 5 minutes execution time
        @set_time_limit(5 * 60);

        $targetDir = "uploads/blog/Image_Gallery";
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
            chmod($targetDir, 0777);
        }

        // Settings
        $targetDir = "uploads/blog/Image_Gallery/" . $id . '/'; 
        //$targetDir = 'uploads';
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        // Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
            chmod($targetDir, 0777);
        }

        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }

        $filePath = $targetDir . '/' . $fileName;

        $this->session->userdata('filename', $fileName);
        $this->session->userdata('filpath', $filePath);

        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;

        // Remove old temp files    
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . '/' . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}.part") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }   

        // Open temp file
        if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {    
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        // Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off 
            rename("{$filePath}.part", $filePath);
        }

        // Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

    }

    public function removeImg($imgId){
        //$where = "img_id = ".$img_id;
        $this->db->where("id = ".$imgId);
        $image_info = $this->master_model->getRecords("nabcons_blogs");

        $filePathArr = explode('/', $_REQUEST['file_path']);

        $last_element = end($filePathArr);

        $data = str_replace($last_element,"",$image_info[0]['file_name']);
        
        $data = str_replace("||", "|", $data);

        if (!empty($_REQUEST['file_path'])) {
            if (unlink($_REQUEST['file_path'])) { 
                echo "1"; 
                
                $update_data = array(
                    'file_name' => $data
                );
                $this->master_model->updateRecord("nabcons_blogs",$update_data,array('id'=>$imgId)); 
            } else {
                echo "0";
            }
        } else {
          echo "2";
        }
    }
}