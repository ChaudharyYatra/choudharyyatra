<?php 
//   Controller for: home page
// Author: Rupali Patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_creation_iternary extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/tour_creation_iternary";
        $this->add_more_module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/add_more_tour_expenses";
        $this->module_url_tour_creation    =  base_url().$this->config->item('admin_panel_slug')."/tour_creation";
        $this->module_title       = "Tour creation iternary";
        $this->module_url_slug    = "tour_creation_iternary";
        $this->module_view_folder = "tour_creation_iternary/";

        $this->module_title_add_more       = "Add More Daily Tour Expenses";
        $this->module_url_slug_add_more    = "add_more_tour_expenses";
        $this->module_view_folder_add_more = "add_more_tour_expenses/";
        $this->arr_view_data = [];
	}

        public function index()
        {

            $record = array();
            $fields = "tour_creation_iternary.*,add_more_tour_creation_iternary.place_name,add_more_tour_creation_iternary.time,
            add_more_tour_creation_iternary.from_visit_time,add_more_tour_creation_iternary.to_visit_time,add_more_tour_creation_iternary.details,tour_creation.tour_title,citywise_place_master.place_name as city_place,district_table.district,
            add_more_tour_creation_iternary.id as tour_creation_addmore";
            $this->db->join("add_more_tour_creation_iternary", 'tour_creation_iternary.id=add_more_tour_creation_iternary.tour_creation_iternary_id','left');
            $this->db->join("tour_creation", 'tour_creation_iternary.package_id=tour_creation.id','left');
            $this->db->join("citywise_place_master", 'add_more_tour_creation_iternary.place_name=citywise_place_master.id','left');
            $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
            $tour_creation_iternary = $this->master_model->getRecords('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
        // print_r($arr_data_assign_staff); die;

        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['arr_data_assign_staff']        = $arr_data_assign_staff;
        $this->arr_view_data['tour_creation_iternary']        = $tour_creation_iternary;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_tour_creation'] = $this->module_url_tour_creation;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
        }

        public function all_expenses($pid,$pd_id)
        {
        $package_id=base64_decode($pid);
        $package_date_id=base64_decode($pd_id);

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

        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_expenses_all']        = $tour_expenses_all;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."all_expenses";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
        }

        public function add($id,$did)
        {  
            
        if($this->input->post('submit'))
        {
            // print_r($_REQUEST); die;
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

                $config['upload_path']   = './uploads/tour_creation_iternery_img/';
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
            
            $total_days = $this->input->post('total_days');
            $tour_number = $this->input->post('tour_number');
            $day_number = $this->input->post('day_number');
            $district = $this->input->post('district');
            $iternary_desc = $this->input->post('iternary_desc');
    
            $place_name = $this->input->post('place_name');
            $time = $this->input->post('time');
            $from_visit_time = $this->input->post('from_visit_time');
            $to_visit_time = $this->input->post('to_visit_time');
            $details = $this->input->post('details');
            $prev_id = $this->input->post('prev_id');

            $tour_creation_iternary = array();
            $fields = "tour_creation_iternary.*";
            // $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
            $this->db->where('tour_creation_iternary.district',$district);
            $this->db->where('tour_creation_iternary.package_id',$tour_number);
            $tour_creation_iternary_data = $this->master_model->getRecord('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
            $tour_creation_iternary_id= $tour_creation_iternary_data['id'];
            // print_r($tour_creation_iternary_data); die;

            if(empty($tour_creation_iternary_data))
            {
                $arr_insert = array(
                    'total_days'  => $total_days,
                    'package_id'  => $tour_number,
                    'day_number'  => $day_number,
                    'district'  => $district,
                    'image_name'  => $filename,
                    'iternary_desc'  => $iternary_desc
                    ); 
                $inserted_id = $this->master_model->insertRecord('tour_creation_iternary',$arr_insert,true);
                $current_tour_creation_id = $this->db->insert_id(); 
            }else{
                $arr_update = array(
                    'total_days'  => $total_days,
                    'package_id'  => $tour_number,
                    'day_number'  => $day_number,
                    'district'  => $district,
                    'image_name'  => $filename,
                    'iternary_desc'  => $iternary_desc
                    ); 

                    $arr_where = array("id" => $tour_creation_iternary_id);
                    $this->master_model->updateRecord('tour_creation_iternary',$arr_update,$arr_where);
                    $current_tour_creation_id = $tour_creation_iternary_id; 
            }
                // print_r($current_tour_expenses_id); die;
               
                $count = count($place_name);
                // echo $count; die;
                for($i=0;$i<$count;$i++)
                {
                    if($_POST["place_name"][$i]!=''){
                        if($prev_id[$i]=='')
                        {
                            $arr_insert = array(               
                                'place_name'  => $_POST["place_name"][$i],
                                'time'  => $_POST["time"][$i],
                                'from_visit_time'  => $_POST["from_visit_time"][$i],
                                'to_visit_time'  => $_POST["to_visit_time"][$i],
                                'details'  => $_POST["details"][$i],
                                'tour_creation_iternary_id'  => $current_tour_creation_id,
                                // 'district_id'  => $district,
                                // 'day_number'  => $day_number
                            ); 
                            $inserted_id = $this->master_model->insertRecord('add_more_tour_creation_iternary',$arr_insert,true);
                        }else{
                            $arr_update = array(               
                                'place_name'  => $_POST["place_name"][$i],
                                'time'  => $_POST["time"][$i],
                                'from_visit_time'  => $_POST["from_visit_time"][$i],
                                'to_visit_time'  => $_POST["to_visit_time"][$i],
                                'details'  => $_POST["details"][$i],
                                'tour_creation_iternary_id'  => $current_tour_creation_id,
                                // 'district_id'  => $district,
                                // 'day_number'  => $day_number
                            ); 
                            $arr_where = array("id" => $prev_id[$i]);
                            $inserted_id=$this->master_model->updateRecord('add_more_tour_creation_iternary',$arr_update,$arr_where);
                        }
                    }
                   
                }

                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    // redirect($this->module_url_path.'/index');
                    redirect($this->module_url_path.'/add/'.$id.'/'.$did);
                }
                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
            //  redirect($this->module_seat_type_room_type.'/add/'.$iid);
                redirect($this->module_url_path.'/index');
                redirect($this->module_url_path.'/add/'.$id.'/'.$did);
            // }   
        }   

        $record = array();
        $fields = "citywise_place_master.*,district_table.district";
        $this->db->join("district_table", 'citywise_place_master.select_district=district_table.id','left');
        $this->db->group_by('select_district'); 
        $district_data = $this->master_model->getRecords('citywise_place_master',array('citywise_place_master.is_deleted'=>'no'),$fields);

        $record = array();
        $fields = "tour_creation_iternary.*,add_more_tour_creation_iternary.place_name,add_more_tour_creation_iternary.time,
        add_more_tour_creation_iternary.from_visit_time,add_more_tour_creation_iternary.to_visit_time,add_more_tour_creation_iternary.details,tour_creation.tour_title,citywise_place_master.place_name as city_place,district_table.district,
        add_more_tour_creation_iternary.id as tour_creation_addmore";
        $this->db->where('add_more_tour_creation_iternary.is_deleted','no');
        $this->db->join("add_more_tour_creation_iternary", 'tour_creation_iternary.id=add_more_tour_creation_iternary.tour_creation_iternary_id','left');
        $this->db->join("tour_creation", 'tour_creation_iternary.package_id=tour_creation.id','left');
        $this->db->join("citywise_place_master", 'add_more_tour_creation_iternary.place_name=citywise_place_master.id','left');
        $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
        $tour_creation_iternary = $this->master_model->getRecords('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
        // print_r($tour_creation_iternary); die;

         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['id']        = $id;
         $this->arr_view_data['did']        = $did;
         $this->arr_view_data['district_data']        = $district_data;
         $this->arr_view_data['tour_creation_iternary']        = $tour_creation_iternary;
         $this->arr_view_data['module_url_tour_creation'] = $this->module_url_tour_creation;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function getplaces(){ 
        // POST data 
        // $all_b=array();
       $places_data = $this->input->post('did');
        // print_r($places_data); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('select_district',$places_data);   
                        $data = $this->master_model->getRecords('citywise_place_master');
        echo json_encode($data);
    }

    public function gettime(){ 
        // POST data 
        // $all_b=array();
       $time_data = $this->input->post('did');
        // print_r($time_data); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('id',$time_data);   
                        $data = $this->master_model->getRecords('citywise_place_master');
        echo json_encode($data);
    }


    public function edit($id,$pd_id)
        {  
            // $tid=base64_decode($id);
            $tour_expenses_id=base64_decode($id);
            // print_r($tour_expenses_id);
            $package_date_id=base64_decode($pd_id);
            // print_r($package_date_id); die;
            if ($tour_expenses_id=='') 
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path.'/index');
            }   
            else
            {   
                $this->db->where('id',$tour_expenses_id);
                $arr_data = $this->master_model->getRecords('tour_creation_iternary');
                
            }
            if($this->input->post('submit'))
            {
                // print_r($_REQUEST); die;
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
                    
                    $config['upload_path']   = './uploads/tour_creation_iternery_img/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
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
                        if($old_img_name!='') unlink('./uploads/tour_creation_iternery_img/'.$old_img_name);
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
                $total_days  = $this->input->post('total_days');
                $tour_number  = $this->input->post('tour_number'); 
                $day_number  = $this->input->post('day_number');
                $district  = $this->input->post('district');
                $iternary_desc  = $this->input->post('iternary_desc');

                $place_name  = $this->input->post('place_name');
                $time  = $this->input->post('time');
                $from_visit_time  = $this->input->post('from_visit_time');
                $to_visit_time  = $this->input->post('to_visit_time');
                $details  = $this->input->post('details');
                // print_r($details); die;

               
                
                $arr_update = array(
                'total_days' =>   $total_days,
                'package_id' =>   $tour_number,
                'day_number' =>   $day_number,
                'district' =>   $district,
                'image_name' =>   $filename,
                'iternary_desc' =>   $iternary_desc
                 );
                 
                $arr_where     = array("id" => $tour_expenses_id);
                $inserted_id = $this->master_model->updateRecord('tour_creation_iternary',$arr_update,$arr_where);

                    // if($tour_expenses_type == '0'){
                        $count = count($place_name);
                        // print_r($count); die;
                        for($i=0;$i<$count;$i++)
                        {
                        $arr_update = array(
                        'place_name'   =>   $_POST["place_name"][$i],
                        'time'   =>   $_POST["time"][$i],
                        'from_visit_time'   =>   $_POST["from_visit_time"][$i],
                        'to_visit_time'   =>   $_POST["to_visit_time"][$i],
                        'details'   =>   $_POST["details"][$i]
                        ); 
                        // print_r($arr_update); die;
                        $arr_where     = array("id" => $package_date_id[$i]);
                        $this->master_model->updateRecord('add_more_tour_creation_iternary',$arr_update,$arr_where);
                        }
                        
                    // }

                    $edit_place_name  = $this->input->post('edit_place_name');
                    $edit_time  = $this->input->post('edit_time');
                    $edit_from_visit_time  = $this->input->post('edit_from_visit_time');
                    $edit_to_visit_time  = $this->input->post('edit_to_visit_time');
                    $edit_details  = $this->input->post('edit_details');
                    $tour_creation_iternary_id  = $this->input->post('tour_creation_iternary_id');


                    if($edit_place_name != ''){
                    $count = count($edit_place_name);
                    // print_r($count); die;
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(
                    'place_name'   =>   $_POST["edit_place_name"][$i],
                    'time'   =>   $_POST["edit_time"][$i],
                    'edit_from_visit_time'   =>   $_POST["edit_from_visit_time"][$i],
                    'edit_to_visit_time'   =>   $_POST["edit_to_visit_time"][$i],
                    'details'   =>   $_POST["edit_details"][$i],
                    'tour_creation_iternary_id' => $tour_creation_iternary_id
                    
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_tour_creation_iternary',$arr_insert,true);
                    }
                }

                    if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Record Updated Successfully.");
                     redirect($this->module_url_path.'/add/'.$tour_number.'/'.$total_days);
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
                }   

                $record = array();
                $fields = "citywise_place_master.*,district_table.district";
                $this->db->join("district_table", 'citywise_place_master.select_district=district_table.id','left');
                $this->db->group_by('select_district'); 
                $district_data = $this->master_model->getRecords('citywise_place_master',array('citywise_place_master.is_deleted'=>'no'),$fields);

                $record = array();
                $fields = "tour_creation_iternary.*,add_more_tour_creation_iternary.place_name,add_more_tour_creation_iternary.time,
                add_more_tour_creation_iternary.from_visit_time,add_more_tour_creation_iternary.to_visit_time,add_more_tour_creation_iternary.details,tour_creation.tour_title,citywise_place_master.place_name as city_place,district_table.district as dis,
                add_more_tour_creation_iternary.id as tour_creation_addmore,district_table.id as dis_id,add_more_tour_creation_iternary.id as add_more_tour_creation_id";
                $this->db->where('add_more_tour_creation_iternary.is_deleted','no');
                $this->db->where('add_more_tour_creation_iternary.is_active','yes');
                $this->db->where('tour_creation_iternary.is_deleted','no');
                $this->db->where('tour_creation_iternary.is_active','yes');
                $this->db->join("add_more_tour_creation_iternary", 'tour_creation_iternary.id=add_more_tour_creation_iternary.tour_creation_iternary_id','left');
                $this->db->join("tour_creation", 'tour_creation_iternary.package_id=tour_creation.id','left');
                $this->db->join("citywise_place_master", 'add_more_tour_creation_iternary.place_name=citywise_place_master.id','left');
                $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
                $tour_creation_iternary = $this->master_model->getRecords('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
                // print_r($tour_creation_iternary); die;

                foreach($tour_creation_iternary as $tour_creation_iternary_info){
                $package_no = $tour_creation_iternary_info['package_id'];
                // print_r($package_no); die;
                $tour_days = $tour_creation_iternary_info['total_days'];
                 } 


                 $record = array();
                $fields = "tour_creation_iternary.*,add_more_tour_creation_iternary.place_name,add_more_tour_creation_iternary.time,
                add_more_tour_creation_iternary.from_visit_time,add_more_tour_creation_iternary.to_visit_time,add_more_tour_creation_iternary.details,tour_creation.tour_title,citywise_place_master.place_name as city_place,district_table.district as dis,
                add_more_tour_creation_iternary.id as tour_creation_addmore,district_table.id as dis_id,add_more_tour_creation_iternary.id as add_more_tour_creation_id";
                $this->db->where('add_more_tour_creation_iternary.is_deleted','no');
                $this->db->where('add_more_tour_creation_iternary.is_active','yes');
                $this->db->where('tour_creation_iternary.is_deleted','no');
                $this->db->where('tour_creation_iternary.is_active','yes');
                $this->db->join("add_more_tour_creation_iternary", 'tour_creation_iternary.id=add_more_tour_creation_iternary.tour_creation_iternary_id','left');
                $this->db->join("tour_creation", 'tour_creation_iternary.package_id=tour_creation.id','left');
                $this->db->join("citywise_place_master", 'add_more_tour_creation_iternary.place_name=citywise_place_master.id','left');
                $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
                $tour_creation_iternary_data = $this->master_model->getRecord('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
                // print_r($tour_creation_iternary); die;


                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $citywise_place_master = $this->master_model->getRecords('citywise_place_master');
                //  print_r($citywise_place_master); die;
                
         $this->arr_view_data['package_no']        = $package_no;
         $this->arr_view_data['tour_days']        = $tour_days;
         $this->arr_view_data['district_data']        = $district_data;
         $this->arr_view_data['tour_creation_iternary']        = $tour_creation_iternary;
         $this->arr_view_data['citywise_place_master']        = $citywise_place_master;
         $this->arr_view_data['tour_creation_iternary_data']        = $tour_creation_iternary_data;
         $this->arr_view_data['page_title']      = " Edit ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['add_more_module_url_path']    = $this->add_more_module_url_path;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        }

    public function add_more_delete()
    {
        $id  = $this->input->post('request_id');
        // print_r($id); die;
        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('add_more_tour_creation_iternary');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('add_more_tour_creation_iternary',$arr_update,$arr_where))
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

    public function details($id)
    {
        $tour_expenses_id=base64_decode($id);
 
        $record = array();
        $fields = "tour_creation_iternary.*,tour_creation.tour_title,district_table.district as dis,district_table.id as dis_id";
        $this->db->where('tour_creation_iternary.is_deleted','no');
        $this->db->where('tour_creation_iternary.id',$tour_expenses_id);
        // $this->db->join("add_more_tour_creation_iternary", 'tour_creation_iternary.id=add_more_tour_creation_iternary.tour_creation_iternary_id','left');
        $this->db->join("tour_creation", 'tour_creation_iternary.package_id=tour_creation.id','left');
        // $this->db->join("citywise_place_master", 'add_more_tour_creation_iternary.place_name=citywise_place_master.id','left');
        $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
        $tour_creation_iternary = $this->master_model->getRecords('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
        // print_r($tour_creation_iternary); die;
 
        $record = array();
        $fields = "tour_creation_iternary.*,add_more_tour_creation_iternary.place_name,add_more_tour_creation_iternary.time,
        add_more_tour_creation_iternary.from_visit_time,add_more_tour_creation_iternary.to_visit_time,add_more_tour_creation_iternary.details,tour_creation.tour_title,citywise_place_master.place_name as city_place,district_table.district as dis,
        add_more_tour_creation_iternary.id as tour_creation_addmore,district_table.id as dis_id,add_more_tour_creation_iternary.id as add_more_tour_creation_id";
        $this->db->where('tour_creation_iternary.is_deleted','no');
        $this->db->where('tour_creation_iternary.id',$tour_expenses_id);
        $this->db->join("add_more_tour_creation_iternary", 'tour_creation_iternary.id=add_more_tour_creation_iternary.tour_creation_iternary_id','left');
        $this->db->join("tour_creation", 'tour_creation_iternary.package_id=tour_creation.id','left');
        $this->db->join("citywise_place_master", 'add_more_tour_creation_iternary.place_name=citywise_place_master.id','left');
        $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
        $add_more_tour_creation_iternary = $this->master_model->getRecords('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
        // print_r($add_more_tour_creation_iternary); die;
 
        $record = array();
        $fields = "tour_creation_iternary.*,add_more_tour_creation_iternary.place_name,add_more_tour_creation_iternary.time,
        add_more_tour_creation_iternary.from_visit_time,add_more_tour_creation_iternary.to_visit_time,add_more_tour_creation_iternary.details,tour_creation.tour_title,citywise_place_master.place_name as city_place,district_table.district as dis,
        add_more_tour_creation_iternary.id as tour_creation_addmore,district_table.id as dis_id,add_more_tour_creation_iternary.id as add_more_tour_creation_id";
        $this->db->where('tour_creation_iternary.is_deleted','no');
        $this->db->where('tour_creation_iternary.id',$tour_expenses_id);
        $this->db->join("add_more_tour_creation_iternary", 'tour_creation_iternary.id=add_more_tour_creation_iternary.tour_creation_iternary_id','left');
        $this->db->join("tour_creation", 'tour_creation_iternary.package_id=tour_creation.id','left');
        $this->db->join("citywise_place_master", 'add_more_tour_creation_iternary.place_name=citywise_place_master.id','left');
        $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
        $add_tour_creation_iternary = $this->master_model->getRecord('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
        // print_r($add_more_tour_creation_iternary); die;
 
        $add_iternary_pack_id = $add_tour_creation_iternary['package_id'];
        $add_iternary_total_days = $add_tour_creation_iternary['total_days'];
        // print_r($add_tour_creation_iternary); die;
 
        $this->arr_view_data['tour_creation_iternary']        = $tour_creation_iternary;
        $this->arr_view_data['add_more_tour_creation_iternary']        = $add_more_tour_creation_iternary;
        $this->arr_view_data['add_iternary_pack_id']        = $add_iternary_pack_id;
        $this->arr_view_data['add_iternary_total_days']        = $add_iternary_total_days;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_tour_creation'] = $this->module_url_tour_creation;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function delete($tour_exp_id,$package_id,$total_days)
    {
        if($tour_exp_id!='')
        {   
        // echo $tour_exp_id;

            $this->db->where('id',$tour_exp_id);
            $arr_data = $this->master_model->getRecords('add_more_tour_creation_iternary');
            // print_r($arr_data); die;

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $tour_exp_id);
                 
            if($this->master_model->updateRecord('add_more_tour_creation_iternary',$arr_update,$arr_where))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
                redirect($this->module_url_path.'/add/'.$package_id.'/'.$total_days);
            }
            else
            {
                $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
                redirect($this->module_url_path.'/add/'.$package_id.'/'.$total_days);
            }
        }
        else
        {
            echo 'else';
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        // die;
        redirect($this->module_url_path.'/add/'.$package_id.'/'.$total_days);
    }
   


    




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


        public function tour_coast_details($id,$did)
        {  
 
            // $record = array();
            // $fields = "citywise_place_master.*,district_table.district";
            // $this->db->join("district_table", 'citywise_place_master.select_district=district_table.id','left');
            // $this->db->group_by('select_district'); 
            // $district_data = $this->master_model->getRecords('citywise_place_master',array('citywise_place_master.is_deleted'=>'no'),$fields);

            $record = array();
            $fields = "tour_creation_iternary.*,add_more_tour_creation_iternary.place_name,add_more_tour_creation_iternary.time,
            add_more_tour_creation_iternary.visit_time,add_more_tour_creation_iternary.details,tour_creation.tour_title,citywise_place_master.place_name as city_place,
            district_table.district,add_more_tour_creation_iternary.id as tour_creation_addmore, citywise_place_master.approximate_hall_rate,
            citywise_place_master.separate_room_rate,citywise_place_master.dharmshala_rate,citywise_place_master.state_tax,citywise_place_master.ticket_cost";
            $this->db->join("add_more_tour_creation_iternary", 'tour_creation_iternary.id=add_more_tour_creation_iternary.tour_creation_iternary_id','left');
            $this->db->join("tour_creation", 'tour_creation_iternary.package_id=tour_creation.id','left');
            $this->db->join("citywise_place_master", 'add_more_tour_creation_iternary.place_name=citywise_place_master.id','left');
            $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
            // $this->db->where('tour_creation_iternary.package_id',$id);
            $tour_creation_iternary = $this->master_model->getRecords('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
            // print_r($tour_creation_iternary); die;

            $this->arr_view_data['action'] = 'add';
            $this->arr_view_data['id'] = $id;
            $this->arr_view_data['did'] = $did;
            // $this->arr_view_data['district_data']        = $district_data;
            $this->arr_view_data['tour_creation_iternary']        = $tour_creation_iternary;
            $this->arr_view_data['page_title']      = " Add ".$this->module_title;
            $this->arr_view_data['module_title']    = $this->module_title;
            $this->arr_view_data['module_url_path'] = $this->module_url_path;
            $this->arr_view_data['middle_content']  = $this->module_view_folder."tour_coast_details";
            $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        }

public function fetch_day_data()  
        {  
                $tour_number_val=$this->input->post('tour_number_val');
                $day_number_val=$this->input->post('day_number_val');
                $district_val=$this->input->post('district_val');
             
                $record = array();
                $fields = "citywise_place_master.*,district_table.district";
                $this->db->join("district_table", 'citywise_place_master.select_district=district_table.id','left');
                $this->db->where('citywise_place_master.select_district',$district_val);
                // $this->db->group_by('select_district'); 
                $data['district_data'] = $this->master_model->getRecords('citywise_place_master',array('citywise_place_master.is_deleted'=>'no'),$fields);
        // print_r($district_data); die;

                $tour_creation_iternary = array();
                $fields = "tour_creation_iternary.*,add_more_tour_creation_iternary.place_name,add_more_tour_creation_iternary.time,
                add_more_tour_creation_iternary.visit_time,add_more_tour_creation_iternary.details,tour_creation.tour_title,citywise_place_master.place_name as city_place,
                add_more_tour_creation_iternary.id as tour_creation_addmore_id";
                $this->db->join("add_more_tour_creation_iternary", 'tour_creation_iternary.id=add_more_tour_creation_iternary.tour_creation_iternary_id','left');
                $this->db->join("tour_creation", 'tour_creation_iternary.package_id=tour_creation.id','left');
                $this->db->join("citywise_place_master", 'add_more_tour_creation_iternary.place_name=citywise_place_master.id','left');
                // $this->db->join("district_table", 'tour_creation_iternary.district=district_table.id','left');
                $this->db->where('tour_creation_iternary.package_id',$tour_number_val);
                $this->db->where('add_more_tour_creation_iternary.district_id',$district_val);
                $this->db->where('add_more_tour_creation_iternary.day_number',$day_number_val);
                $data['tour_creation_iternary'] = $this->master_model->getRecords('tour_creation_iternary',array('tour_creation_iternary.is_deleted'=>'no'),$fields);
                // print_r($tour_creation_iternary); die;
                echo json_encode($data);
        }

}