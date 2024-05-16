<?php 
//   Controller for: home page
// Author: Rupali Patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_expenses extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_expenses";
        $this->add_more_module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/add_more_tour_expenses";
        $this->module_title       = "Daily Tour Expenses";
        $this->module_url_slug    = "tour_expenses";
        $this->module_view_folder = "tour_expenses/";

        $this->module_title_add_more       = "Add More Daily Tour Expenses";
        $this->module_url_slug_add_more    = "add_more_tour_expenses";
        $this->module_view_folder_add_more = "add_more_tour_expenses/";
        $this->arr_view_data = [];
	}

        public function index()
        {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $fields = "tour_expenses.*,packages.tour_number,packages.tour_title,packages.package_type,
        package_type.package_type,package_date.journey_date,package_date.id as did";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('tour_expenses.tour_manager_id',$id);
        $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'tour_expenses.package_date_id=package_date.id','left');
        $this->db->join("assign_staff", 'tour_expenses.tour_manager_id=assign_staff.name','left');
        // $this->db->join("tour_expenses", 'assign_staff.package_id=tour_expenses.package_id','left');
        $this->db->group_by('tour_expenses.package_id');
        $this->db->group_by('tour_expenses.package_date_id');
        $arr_data_assign_staff = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);
        // print_r($arr_data_assign_staff); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data_assign_staff']        = $arr_data_assign_staff;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
        
        }

        public function all_expenses($pid,$pd_id)
        {
        $package_id=base64_decode($pid);
        $package_date_id=base64_decode($pd_id);

        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $record = array();
        $fields = "tour_expenses.*,expense_type.expense_type_name,expense_category.expense_category,
        packages.tour_number,packages.tour_title,package_date.journey_date,hotel_advance_payment.advance_amt,
        expense_category.expense_category as exp_cat,add_more_tour_expenses.id as add_more_id";
        $this->db->where('tour_expenses.is_deleted','no');
        $this->db->where('tour_expenses.package_id',$package_id);
        $this->db->where('tour_expenses.package_date_id',$package_date_id);
        $this->db->join("expense_type", 'tour_expenses.expense_type=expense_type.id','left');
        $this->db->join("expense_category", 'tour_expenses.expense_category_id=expense_category.id','left');
        $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
        $this->db->join("package_date", 'tour_expenses.package_date_id=package_date.id','left');
        $this->db->join("add_more_tour_expenses", 'tour_expenses.id=add_more_tour_expenses.tour_expenses_id','left');
        $this->db->join("hotel_advance_payment", 'tour_expenses.package_id=hotel_advance_payment.tour_number','left');
        $this->db->group_by('tour_expenses.id');
        $tour_expenses_all = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);
        // print_r($tour_expenses_all); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_expenses_all']        = $tour_expenses_all;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."all_expenses";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
        
        }

        public function add($id,$did)
        {  
            $id=base64_decode($id);
            $did=base64_decode($did);

            $supervision_sess_name = $this->session->userdata('supervision_name');
            $iid = $this->session->userdata('supervision_sess_id');

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $expense_type_data = $this->master_model->getRecords('expense_type');
            // print_r($expense_type_data); die;  

        if($this->input->post('submit'))
        {
            // ============================upload image 1====================
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

                $config['upload_path']   = './uploads/tour_expenses/';
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
            // ============================upload image 1====================
             // ============================upload image 2====================

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
            
                $config['upload_path']   = './uploads/tour_expenses/';
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
            // ==============================upload image 2===============================================================//

                $expense_type  = $this->input->post('expense_type');
                // print_r($expense_type); die;
                $expense_category  = $this->input->post('expense_category');
                $other_expense_category  = $this->input->post('other_expense_category');
                $expense_place  = $this->input->post('expense_place');
                $expense_date  = $this->input->post('expense_date');
                $bill_number  = $this->input->post('bill_number');
                $total_pax  = $this->input->post('total_pax');
                $expense_amt  = $this->input->post('expense_amt');
                // $expense_date  = $this->input->post('expense_date');
                $tour_expenses_remark  = $this->input->post('tour_expenses_remark');
                $tour_number  = $this->input->post('tour_number');
                $pax_type  = $this->input->post('pax_type');
                $tour_date  = $this->input->post('tour_date');

                $tour_expenses_type  = $this->input->post('tour_expenses_type');
                // print_r($tour_expenses_type); die;
                $product_name  = $this->input->post('product_name');
                // print_r($product_name);
                $measuring_unit  = $this->input->post('measuring_unit');
                $quantity  = $this->input->post('quantity');
                $rate  = $this->input->post('rate');
                // print_r($rate);
                $per_unit_rate  = $this->input->post('per_unit_rate');

                $expense_type_row  = $this->input->post('expense_type_row');
                $expense_category_row  = $this->input->post('expense_category_row');
                $other_name  = $this->input->post('other_name');
                $bill_date  = $this->input->post('bill_date');

                $arr_insert = array(
                    // 'product_name'   =>   $_POST["product_name"][$i],
                    // 'measuring_unit'   =>   $_POST["measuring_unit"][$i],
                    // 'quantity'   =>   $_POST["quantity"][$i],
                    // 'rate'   =>   $_POST["rate"][$i],
                    // 'per_unit_rate'   =>   $_POST["per_unit_rate"][$i],
                    'expense_type'   =>   $_POST["expense_type"],
                    'expense_category_id'   =>   $_POST["expense_category"],
                    'other_expense_category'   =>   $_POST["other_expense_category"],
                    'expense_place'   =>   $_POST["expense_place"],
                    'expense_date'   =>   $_POST["expense_date"],
                    'bill_number'   =>   $_POST["bill_number"],
                    'bill_date'   =>   $_POST["bill_date"],
                    'total_pax'   =>   $_POST["total_pax"],
                    'expense_amt'   =>   $_POST["expense_amt"],
                    // 'expense_date'   =>   $_POST["expense_date"],
                    'tour_expenses_remark'   =>   $_POST["tour_expenses_remark"],
                    'package_id'   =>   $_POST["tour_number"],
                    'pax_type'   =>   $_POST["pax_type"],
                    'package_date_id'   =>   $_POST["tour_date"],
                    'tour_expenses_type'   =>   $_POST["tour_expenses_type"],
                    
                    'image_name' => $filename,
                    'image_name_2' => $new_img_filename,
                    'tour_manager_id' => $iid
                    
                    ); 
                $inserted_id = $this->master_model->insertRecord('tour_expenses',$arr_insert,true);
                // $insert_id();
                $current_tour_expenses_id = $this->db->insert_id(); 
                // print_r($current_tour_expenses_id); die;
               
                if($tour_expenses_type == '0'){
                $count = count($product_name);
                // print_r($count); die;
                for($i=0;$i<$count;$i++)
                {
                $arr_insert = array(
                'expense_type'   =>   $_POST["expense_type_row"][$i],
                'expense_category_id'   =>   $_POST["expense_category_row"][$i],
                'other_name'   =>   $_POST["other_name"][$i],
                'product_name'   =>   $_POST["product_name"][$i],
                'measuring_unit'   =>   $_POST["measuring_unit"][$i],
                'quantity'   =>   $_POST["quantity"][$i],
                'rate'   =>   $_POST["rate"][$i],
                'per_unit_rate'   =>   $_POST["per_unit_rate"][$i],
                // 'expense_type'   =>   $_POST["expense_type"],
                // 'expense_category_id'   =>   $_POST["expense_category"],
                // 'other_expense_category'   =>   $_POST["other_expense_category"],
                // 'expense_place'   =>   $_POST["expense_place"],
                // 'expense_date'   =>   $_POST["expense_date"],
                // 'bill_number'   =>   $_POST["bill_number"],
                // 'total_pax'   =>   $_POST["total_pax"],
                // 'expense_amt'   =>   $_POST["expense_amt"],
                // 'expense_date'   =>   $_POST["expense_date"],
                // 'tour_expenses_remark'   =>   $_POST["tour_expenses_remark"],
                // 'package_id'   =>   $_POST["tour_number"],
                // 'pax_type'   =>   $_POST["pax_type"],
                // 'package_date_id'   =>   $_POST["tour_date"],
                // 'tour_expenses_type'   =>   $_POST["tour_expenses_type"],
                
                // 'image_name' => $filename,
                // 'image_name_2' => $new_img_filename,
                'tour_expenses_id' => $current_tour_expenses_id
                
                ); 
                $inserted_id = $this->master_model->insertRecord('add_more_tour_expenses',$arr_insert,true);
                }
                }
                         //sleep(2);
                // if()
                //          $arr_insert = array(
                //             'expense_type' =>   $expense_type,
                //             'expense_category_id' =>   $expense_category,
                //             'other_expense_category' =>   $other_expense_category,
                //             ); 
                // $this->master_model->insertRecord('expense_category',$arr_insert,true);

                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_url_path.'/index');
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                //  redirect($this->module_seat_type_room_type.'/add/'.$iid);
                 redirect($this->module_url_path.'/index');
                // }   
        }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
		$this->db->order_by('expense_category','ASC');
        $expense_category = $this->master_model->getRecords('expense_category');
        //  print_r($expense_category); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $measuring_unit = $this->master_model->getRecords('measuring_unit');
        //  print_r($measuring_unit); die;

        $record = array();
        $fields = "packages.*,package_date.journey_date,package_date.id as pd_id";
        $this->db->where('packages.is_deleted','no');
        // $this->db->order_by('packages.id','desc');
        $this->db->where('packages.id',$id);
        $this->db->where('package_date.id',$did);
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $packages_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($packages_data); die;
 
         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['expense_type_data']        = $expense_type_data;
         $this->arr_view_data['packages_data']        = $packages_data;
         $this->arr_view_data['expense_category']        = $expense_category;
         $this->arr_view_data['measuring_unit']        = $measuring_unit;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }



    public function edit($id,$pd_id,$pid)
        {  
            // echo $id; die;s
            $supervision_sess_name = $this->session->userdata('supervision_name');
            $iid = $this->session->userdata('supervision_sess_id');

            // $tid=base64_decode($id);
            $tour_expenses_id=base64_decode($id);
            $package_id=base64_decode($pid);
            $package_date_id=base64_decode($pd_id);

            if ($tour_expenses_id=='') 
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path.'/index');
            }   
            else
            {   
                $this->db->where('id',$tour_expenses_id);
                $arr_data = $this->master_model->getRecords('tour_expenses');
            }
            if($this->input->post('submit'))
            {
                // print_r($_REQUEST); die;
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
                    
                    $config['upload_path']   = './uploads/tour_expenses/';
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
            
                $config['upload_path']   = './uploads/tour_expenses/';
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
                    if($old_new_name!='') unlink('./uploads/tour_expenses/'.$old_new_name);
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

                $expense_type  = $this->input->post('expense_type');
                $expense_category  = $this->input->post('expense_category'); 
                $other_expense_category  = $this->input->post('other_expense_category');
                $expense_place  = $this->input->post('expense_place');
                $expense_date  = $this->input->post('expense_date');
                $bill_number  = $this->input->post('bill_number');
                $total_pax  = $this->input->post('total_pax');
                $expense_amt  = $this->input->post('expense_amt');
                // $expense_date  = $this->input->post('expense_date');
                $tour_expenses_remark  = $this->input->post('tour_expenses_remark');
                $pax_type  = $this->input->post('pax_type');
                // $tour_number  = $this->input->post('tour_number');

                $tour_expenses_type  = $this->input->post('tour_expenses_type');
                // print_r($tour_expenses_type); die;
                $product_name  = $this->input->post('product_name');
                // print_r($product_name);
                $measuring_unit  = $this->input->post('measuring_unit');
                $quantity  = $this->input->post('quantity');
                $rate  = $this->input->post('rate');
                // print_r($rate);
                $per_unit_rate  = $this->input->post('per_unit_rate');

                $add_more_tour_expenses_id  = $this->input->post('add_more_tour_expenses_id');
                // print_r($add_more_tour_expenses_id); die;

                $expense_type_row  = $this->input->post('expense_type_row');
                // print_r($expense_type_row); die;
                $expense_category_row  = $this->input->post('expense_category_row');
                $other_name  = $this->input->post('other_name');
                $bill_date  = $this->input->post('bill_date');
                $update_remark  = $this->input->post('update_remark');
                // print_r($add_more_expenses_id); die;
                
                $arr_update = array(
                'expense_type' =>   $expense_type,
                'expense_category_id' =>   $expense_category,
                'other_expense_category' =>   $other_expense_category,
                'expense_place' =>   $expense_place,
                'expense_date' =>   $expense_date,
                'bill_number' =>   $bill_number,
                'total_pax' =>   $total_pax,
                'expense_amt' =>   $expense_amt,
                'bill_date' =>   $bill_date,
                'tour_expenses_remark' =>   $tour_expenses_remark,
                'update_remark' =>   $update_remark,
                'image_name' =>   $filename,
                'image_name_2' =>   $new_img_filename,
                'pax_type' =>   $pax_type
                // 'package_date_id' =>   $tour_number

                 );
                 
                    $arr_where     = array("id" => $tour_expenses_id);
                    $inserted_id = $this->master_model->updateRecord('tour_expenses',$arr_update,$arr_where);

                    if($tour_expenses_type == '0'){
                        $count = count($expense_type_row);
                        // print_r($count); die;
                        for($i=0;$i<$count;$i++)
                        {
                        $arr_update = array(
                        'expense_type'   =>   $_POST["expense_type_row"][$i],
                        'expense_category_id'   =>   $_POST["expense_category_row"][$i],
                        'other_name'   =>   $_POST["other_name"][$i],
                        'product_name'   =>   $_POST["product_name"][$i],
                        'measuring_unit'   =>   $_POST["measuring_unit"][$i],
                        'quantity'   =>   $_POST["quantity"][$i],
                        'rate'   =>   $_POST["rate"][$i],
                        'per_unit_rate'   =>   $_POST["per_unit_rate"][$i]
                        ); 
                        // print_r($arr_update); die;
                        $arr_where     = array("id" => $add_more_tour_expenses_id[$i]);
                        $this->master_model->updateRecord('add_more_tour_expenses',$arr_update,$arr_where);
                        }
                        
                    }

                    $add_product_name  = $this->input->post('add_product_name');
                    $add_measuring_unit  = $this->input->post('add_measuring_unit');
                    $add_quantity  = $this->input->post('add_quantity');
                    $add_rate  = $this->input->post('add_rate');
                    $add_per_unit_rate  = $this->input->post('add_per_unit_rate');

                    $current_tour_expenses_id  = $this->input->post('add_more_tour_exp_id');

                    $add_expense_type_row  = $this->input->post('add_expense_type_row');
                    $add_expense_category_row  = $this->input->post('add_expense_category_row');
                    $add_other_name  = $this->input->post('add_other_name');
                    $add_bill_date  = $this->input->post('add_bill_date');
                    $add_update_remark  = $this->input->post('add_update_remark');

                    if($add_product_name != ''){
                    $count = count($add_product_name);
                    // print_r($count); die;
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(
                    'expense_type'   =>   $_POST["add_expense_type_row"][$i],
                    'expense_category_id'   =>   $_POST["add_expense_category_row"][$i],
                    'other_name'   =>   $_POST["add_other_name"][$i],
                    'product_name'   =>   $_POST["add_product_name"][$i],
                    'measuring_unit'   =>   $_POST["add_measuring_unit"][$i],
                    'quantity'   =>   $_POST["add_quantity"][$i],
                    'rate'   =>   $_POST["add_rate"][$i],
                    'per_unit_rate'   =>   $_POST["add_per_unit_rate"][$i],
                    'tour_expenses_id' => $current_tour_expenses_id
                    
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_tour_expenses',$arr_insert,true);
                    }
                }

                    if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Record Updated Successfully.");
                     redirect($this->module_url_path.'/all_expenses/'.$pid.'/'.$pd_id);
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
                }   

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $expense_type_data = $this->master_model->getRecords('expense_type');
        // print_r($expense_type_data); die;  

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        // $this->db->where('id',$id);
        $this->db->order_by('id','ASC');
        $expense_category_data = $this->master_model->getRecords('expense_category');
        // print_r($expense_category_data); die;  

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $measuring_unit = $this->master_model->getRecords('measuring_unit');
        //  print_r($measuring_unit); die;

        $record = array();
        $fields = "tour_expenses.*,expense_type.expense_type_name,expense_category.expense_category,
        packages.tour_number,packages.tour_title,package_date.journey_date";
        $this->db->where('tour_expenses.is_deleted','no');
        $this->db->order_by('tour_expenses.id','desc');
        $this->db->where('tour_expenses.id',$tour_expenses_id);
        $this->db->join("expense_type", 'tour_expenses.expense_type=expense_type.id','left');
        $this->db->join("expense_category", 'tour_expenses.expense_category_id=expense_category.id','left');
        $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
        $this->db->join("package_date", 'tour_expenses.package_date_id=package_date.id','left');
        $tour_expenses_all = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);
        // print_r($tour_expenses_all); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
		$this->db->order_by('expense_category','ASC');
        $expense_category = $this->master_model->getRecords('expense_category');
        //  print_r($expense_category); die;

        $this->db->where('is_deleted','no');
		$this->db->order_by('tour_number','ASC');
        $packages_data = $this->master_model->getRecords('packages');

        $this->db->where('is_deleted','no');
        $package_date = $this->master_model->getRecords('package_date');

        $record = array();
        $fields = "add_more_tour_expenses.*,add_more_tour_expenses.*,expense_category.expense_category";
        $this->db->where('add_more_tour_expenses.is_deleted','no');
        $this->db->where('add_more_tour_expenses.tour_expenses_id',$tour_expenses_id);
        $this->db->join("expense_category", 'add_more_tour_expenses.product_name=expense_category.id','left');
        $add_more_tour_expenses_all = $this->master_model->getRecords('add_more_tour_expenses',array('add_more_tour_expenses.is_deleted'=>'no'),$fields);

        $edit_data=count($add_more_tour_expenses_all);
        // print_r($edit_data); die;


         $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['packages_data'] = $packages_data;
         $this->arr_view_data['add_more_tour_expenses_all'] = $add_more_tour_expenses_all;
         $this->arr_view_data['edit_data'] = $edit_data;
         $this->arr_view_data['expense_category'] = $expense_category;
         $this->arr_view_data['package_date'] = $package_date;
         $this->arr_view_data['tour_expenses_all'] = $tour_expenses_all;
         $this->arr_view_data['expense_type_data'] = $expense_type_data;
         $this->arr_view_data['expense_category_data'] = $expense_category_data;
         $this->arr_view_data['measuring_unit'] = $measuring_unit;
         $this->arr_view_data['package_id']        = $package_id;
         $this->arr_view_data['package_date_id']        = $package_date_id;
         $this->arr_view_data['page_title']      = " Edit ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['add_more_module_url_path']    = $this->add_more_module_url_path;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
        }

    public function add_more_delete()
    {
        $id  = $this->input->post('request_id');

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('add_more_tour_expenses');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('add_more_tour_expenses',$arr_update,$arr_where))
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

    public function details($id,$pd_id,$pid)
    {
        $tour_expenses_id=base64_decode($id);
        $package_id=base64_decode($pid);
        $package_date_id=base64_decode($pd_id);

        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        $record = array();
        $fields = "tour_expenses.*,expense_type.expense_type_name,expense_category.expense_category,
        packages.tour_number,packages.tour_title,package_date.journey_date,hotel_advance_payment.advance_amt,expense_category.expense_category as exp_cat";
        $this->db->where('tour_expenses.is_deleted','no');
        $this->db->where('tour_expenses.id',$tour_expenses_id);
        $this->db->join("expense_type", 'tour_expenses.expense_type=expense_type.id','left');
        $this->db->join("expense_category", 'tour_expenses.expense_category_id=expense_category.id','left');
        $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
        $this->db->join("package_date", 'tour_expenses.package_date_id=package_date.id','left');
        $this->db->join("hotel_advance_payment", 'tour_expenses.package_id=hotel_advance_payment.tour_number','left');
        $tour_expenses_all = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);
        

        $record = array();
        $fields = "add_more_tour_expenses.*,expense_category.expense_category,expense_type.expense_type_name";
        $this->db->where('add_more_tour_expenses.is_deleted','no');
        $this->db->where('add_more_tour_expenses.tour_expenses_id',$tour_expenses_id);
        $this->db->join("expense_category", 'add_more_tour_expenses.product_name=expense_category.id','left');
        $this->db->join("expense_type", 'add_more_tour_expenses.expense_type=expense_type.id','left');
        $add_more_tour_expenses_all = $this->master_model->getRecords('add_more_tour_expenses',array('add_more_tour_expenses.is_deleted'=>'no'),$fields);
        // print_r($add_more_tour_expenses_all); die;
    

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['tour_expenses_all']        = $tour_expenses_all;
        $this->arr_view_data['add_more_tour_expenses_all']        = $add_more_tour_expenses_all;
        $this->arr_view_data['package_id']        = $package_id;
        $this->arr_view_data['package_date_id']        = $package_date_id;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

    public function delete($tour_exp_id)
    {
        if($tour_exp_id!='')
        {   
            $this->db->where('id',$tour_exp_id);
            $arr_data = $this->master_model->getRecords('tour_expenses');
            // print_r($arr_data); die;

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $tour_exp_id);
                 
            if($this->master_model->updateRecord('tour_expenses',$arr_update,$arr_where))
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
   


    // public function add_more_insert()
    //     {  
    //         // $id=base64_decode($id);
    //         // $did=base64_decode($did);

    //         $supervision_sess_name = $this->session->userdata('supervision_name');
    //         $iid = $this->session->userdata('supervision_sess_id');

    //         $this->db->where('is_deleted','no');
    //         $this->db->where('is_active','yes');
    //         $this->db->order_by('id','ASC');
    //         $expense_type_data = $this->master_model->getRecords('expense_type');
    //         // print_r($expense_type_data); die;  

    //     if($this->input->post('submit'))
    //     {
    //             // $expense_type  = $this->input->post('expense_type');
    //             // // print_r($expense_type); die;
    //             // $expense_category  = $this->input->post('expense_category');
    //             // $other_expense_category  = $this->input->post('other_expense_category');
    //             // $expense_place  = $this->input->post('expense_place');
    //             // $expense_date  = $this->input->post('expense_date');
    //             // $bill_number  = $this->input->post('bill_number');
    //             // $total_pax  = $this->input->post('total_pax');
    //             // $expense_amt  = $this->input->post('expense_amt');
    //             // $expense_date  = $this->input->post('expense_date');
    //             // $tour_expenses_remark  = $this->input->post('tour_expenses_remark');
    //             // $tour_number  = $this->input->post('tour_number');
    //             // $pax_type  = $this->input->post('pax_type');
    //             // $tour_date  = $this->input->post('tour_date');

    //             // $tour_expenses_type  = $this->input->post('tour_expenses_type');
    //             // print_r($tour_expenses_type); die;
    //             $product_name  = $this->input->post('product_name');
    //             // print_r($product_name);
    //             $measuring_unit  = $this->input->post('measuring_unit');
    //             $quantity  = $this->input->post('quantity');
    //             $rate  = $this->input->post('rate');
    //             // print_r($rate);
    //             $per_unit_rate  = $this->input->post('per_unit_rate');

    //             $current_tour_expenses_id  = $this->input->post('add_more_tour_exp_id');


    //             // if($tour_expenses_type == '0'){
    //             $count = count($product_name);
    //             // print_r($count); die;
    //             for($i=0;$i<$count;$i++)
    //             {
    //             $arr_insert = array(
    //             'product_name'   =>   $_POST["product_name"][$i],
    //             'measuring_unit'   =>   $_POST["measuring_unit"][$i],
    //             'quantity'   =>   $_POST["quantity"][$i],
    //             'rate'   =>   $_POST["rate"][$i],
    //             'per_unit_rate'   =>   $_POST["per_unit_rate"][$i],
    //             'tour_expenses_id' => $current_tour_expenses_id
                
    //             ); 
    //             $inserted_id = $this->master_model->insertRecord('add_more_tour_expenses',$arr_insert,true);
    //             }
    //             // }

    //             if($inserted_id > 0)
    //             {
    //                 $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
    //                 redirect($this->module_url_path.'/index');
    //             }
    //             else
    //             {
    //                 $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
    //             }
    //         //  redirect($this->module_seat_type_room_type.'/add/'.$iid);
    //             redirect($this->module_url_path.'/index');
    //         // }   
    //     }

    //     $this->db->where('is_deleted','no');
	// 	$this->db->order_by('expense_category','ASC');
    //     $expense_category = $this->master_model->getRecords('expense_category');
    //     //  print_r($expense_category); die;

    //     $record = array();
    //     $fields = "packages.*,package_date.journey_date,package_date.id as pd_id";
    //     $this->db->where('packages.is_deleted','no');
    //     // $this->db->order_by('packages.id','desc');
    //     $this->db->where('packages.id',$id);
    //     $this->db->where('package_date.id',$did);
    //     $this->db->join("package_date", 'packages.id=package_date.package_id','left');
    //     $packages_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
    //     // print_r($packages_data); die;
 
    //      $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
    //      $this->arr_view_data['action']          = 'add_more_insert';
    //      $this->arr_view_data['expense_type_data']        = $expense_type_data;
    //      $this->arr_view_data['packages_data']        = $packages_data;
    //      $this->arr_view_data['expense_category']        = $expense_category;
    //      $this->arr_view_data['page_title']      = " Add ".$this->module_title;
    //      $this->arr_view_data['module_title']    = $this->module_title;
    //      $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //      $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
    //      $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    // }




    public function get_category(){ 
        // POST data 
        // $all_b=array();
       $district_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('expense_type',$district_data);   
                        $data = $this->master_model->getRecords('expense_category');
        echo json_encode($data);
    }

    public function get_tour_date(){ 
        // POST data 
        // $all_b=array();
       $district_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('package_id',$district_data);   
                        $data = $this->master_model->getRecords('package_date');
        echo json_encode($data);
}


}