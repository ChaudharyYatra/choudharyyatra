<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_qr_code extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/add_qr_code";
        $this->module_title       = "QR Code";
        $this->module_url_slug    = "add_qr_code";
        $this->module_view_folder = "add_qr_code/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $agent_sess_name = $this->session->userdata('agent_name');
        $id=$this->session->userdata('agent_sess_id');

        $fields = "qr_code_master.*,role_type.role_name,qr_code_add_more.mobile_number,qr_code_add_more.upi_id,
        qr_code_add_more.account_number,qr_code_add_more.bank_name,qr_code_add_more.company_account_yes_no,qr_code_add_more.qr_code_image,qr_code_add_more.upi_app_name,
        upi_apps_name.payment_app_name,qr_code_add_more.id as qr_add_more_id,qr_code_add_more.is_active as qr_code_is_active,qr_code_add_more.status,qr_code_add_more.reject_remark";
        $this->db->order_by('id','ASC');
        $this->db->where('qr_code_master.is_deleted','no');
        $this->db->where('qr_code_add_more.is_deleted','no');
        $this->db->where('qr_code_master.agent_id',$id);
        $this->db->where('qr_code_master.is_agent','Yes');
        $this->db->join("role_type", 'qr_code_master.role_name=role_type.id','left');
        $this->db->join("qr_code_add_more", 'qr_code_master.id=qr_code_add_more.qr_code_master_id','left');
        $this->db->join("upi_apps_name", 'qr_code_add_more.upi_app_name=upi_apps_name.id','left');
        $arr_data = $this->master_model->getRecords('qr_code_master',array('qr_code_master.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

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
                $full_name = $this->input->post('full_name');
                $role_name = $this->input->post('role_name');
                $other_role = $this->input->post('other_role');

                $nick_name = $this->input->post('nick_name');
                $mobile_number = $this->input->post('mobile_number');
                $upi_id = $this->input->post('upi_id');
                $account_number = $this->input->post('account_number');
                $bank_name = $this->input->post('bank_name');
                // $company_account_yes_no  = $this->input->post('company_account_yes_no');
                $upi_app_name = $this->input->post('upi_app_name');
                
                $arr_insert = array(
                    'full_name'   =>   $_POST["full_name"],
                    'is_agent'   => 'Yes',
                    'agent_id' => $id
                );
                $inserted_id = $this->master_model->insertRecord('qr_code_master',$arr_insert,true);
                $insertid = $this->db->insert_id();

                $count = count($upi_id);
                for($i=0;$i<$count;$i++)
                {
                    $company_name = '';
                    if (isset($_POST['company_account_yes_no'][$i])) {
                        $company_name = $_POST['company_account_yes_no'][$i];
                    }

                    $_FILES['file']['name']     = $_FILES['image_name']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['image_name']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['image_name']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['image_name']['size'][$i]; 
                     
                    $uploadPath = './uploads/QR_code_image/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'png|jpg|jpeg|PNG|JPEG|JPG';

                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 

                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                    }

                    $arr_insert = array(
                        'nick_name'   =>   $_POST["nick_name"][$i],
                        'mobile_number'   =>   $_POST["mobile_number"][$i],
                        'upi_id'   =>   $_POST["upi_id"][$i],
                        'account_number'   =>   $_POST["account_number"][$i],
                        'bank_name'   =>   $_POST["bank_name"][$i],
                        'company_account_yes_no'   => 'No',
                        'is_agent'   => 'Yes',
                        'upi_app_name'   =>   $_POST["upi_app_name"][$i],
                        'qr_code_image'   =>   $fileData['file_name'],
                        'qr_code_master_id'  => $insertid,
                        'status'  => 'no',
                        'agent_id' => $id
                    ); 
                                
                    $inserted_id = $this->master_model->insertRecord('qr_code_add_more',$arr_insert,true);
                }
                               
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
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $role_type_data = $this->master_model->getRecords('role_type');
        // // print_r($role_type_data); die;

        $this->db->order_by('id', 'desc');
        $this->db->where('is_deleted', 'no');
        $this->db->where('role_name !=', 'agent');
        $role_type_data = $this->master_model->getRecords('role_type');

        $this->db->order_by('id', 'desc');
        $this->db->where('is_deleted', 'no');
        $upi_apps_name = $this->master_model->getRecords('upi_apps_name');

        $this->db->order_by('id', 'desc');
        $this->db->where('is_deleted', 'no');
        $this->db->where('id',$id);
        $agent_name = $this->master_model->getRecord('agent');
        // print_r($agent_name); die;

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['agent_name'] = $agent_name;
        $this->arr_view_data['upi_apps_name'] = $upi_apps_name;
        $this->arr_view_data['role_type_data'] = $role_type_data;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }

  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $did=base64_decode($id);
    //   print_r($id); die;
        if($did!='' && ($type == "yes" || $type == "no"))
        {   
            $this->db->where('id',$did);
            $arr_data = $this->master_model->getRecords('qr_code_add_more');
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
            
            if($this->master_model->updateRecord('qr_code_add_more',$arr_update,array('id' => $did)))
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
    
    public function edit($id,$did)
    {
		$id=base64_decode($id);
		$qr_id=base64_decode($did);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        else
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('qr_code_master');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('full_name', 'full_name', 'required');
                // $this->form_validation->set_rules('image_name','Image', '');
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
                    
                    $config['upload_path']   = './uploads/QR_code_image/';
                    $config['allowed_types'] = 'png|jpg|jpeg|PNG|JPEG|JPG';
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
                        if($old_img_name!='') unlink('./uploads/QR_code_image/'.$old_img_name);
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
               
                
                $full_name = $this->input->post('full_name');
                $role_name = $this->input->post('role_name');
                $other_role = $this->input->post('other_role');

                $nick_name = $this->input->post('nick_name');
                $mobile_number = $this->input->post('mobile_number');
                $company_account_yes_no = $this->input->post('company_account_yes_no');
                $bank_name = $this->input->post('bank_name');
                $account_number = $this->input->post('account_number');
                $upi_app_name = $this->input->post('upi_app_name');
                $upi_id = $this->input->post('upi_id');

                    $arr_update = array(
                        'full_name'  => $full_name,
                        'role_name'  => $role_name,
                        'other_role_name'  => $other_role
                    );
                
                    $arr_where     = array("id" => $qr_id);
                    $this->master_model->updateRecord('qr_code_master',$arr_update,$arr_where);

                    $arr_update = array(
                        'nick_name'  => $nick_name,
                        'mobile_number'  => $mobile_number,
                        'company_account_yes_no'  => $company_account_yes_no,
                        'bank_name'  => $bank_name,
                        'account_number'      => $account_number,
                        'qr_code_image'      => $filename,
                        'upi_app_name'      => $upi_app_name,
                        'upi_id'  => $upi_id
                    );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('qr_code_add_more',$arr_update,$arr_where);
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
        
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $this->db->where('id',$id);
        // $qr_code_master_data = $this->master_model->getRecords('qr_code_master');

        $fields = "qr_code_master.*,role_type.role_name,qr_code_add_more.nick_name,qr_code_add_more.mobile_number,qr_code_add_more.upi_id,
        qr_code_add_more.account_number,qr_code_add_more.bank_name,qr_code_add_more.company_account_yes_no,qr_code_add_more.qr_code_image,qr_code_add_more.upi_app_name,
        upi_apps_name.payment_app_name,qr_code_add_more.id as qr_add_more_id,qr_code_add_more.is_active as qr_code_is_active";
        $this->db->order_by('id','desc');
        $this->db->where('qr_code_master.is_deleted','no');
        $this->db->where('qr_code_add_more.id',$id);
        $this->db->join("role_type", 'qr_code_master.role_name=role_type.id','left');
        $this->db->join("qr_code_add_more", 'qr_code_master.id=qr_code_add_more.qr_code_master_id','left');
        $this->db->join("upi_apps_name", 'qr_code_add_more.upi_app_name=upi_apps_name.id','left');
        $qr_code_master_data = $this->master_model->getRecords('qr_code_master',array('qr_code_master.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $role_type_data = $this->master_model->getRecords('role_type');

        $this->db->order_by('id', 'desc');
        $this->db->where('is_deleted', 'no');
        $upi_apps_name = $this->master_model->getRecords('upi_apps_name');
        
        $this->arr_view_data['upi_apps_name']   = $upi_apps_name;
        $this->arr_view_data['qr_code_master_data']   = $qr_code_master_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['role_type_data']        = $role_type_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    }

     
    public function delete($id)
    {
        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('qr_code_add_more');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('qr_code_add_more',$arr_update,$arr_where))
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
   

}