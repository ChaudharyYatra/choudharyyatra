<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class International_booking_enquiry extends CI_Controller{

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
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/international_booking_enquiry";
        $this->module_title       = "International Booking Enquiry";
        $this->module_url_slug    = "international_booking_enquiry";
        $this->module_view_folder = "international_booking_enquiry/";    
        $this->load->library('upload');
        $this->load->model('international_member');
	}

	public function index()
	{

        $record = array();
        $fields = "international_booking_enquiry.*,international_packages.tour_title,agent.agent_name,international_packages.tour_number";
        $this->db->order_by('international_booking_enquiry.id','desc');
        $this->db->where('international_booking_enquiry.is_deleted','no');
        $this->db->where('followup_status','no');
        $this->db->join("international_packages", 'international_booking_enquiry.package_id=international_packages.id','left');
        $this->db->join("agent", 'international_booking_enquiry.agent_id=agent.id','left');
        $arr_data = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);

        
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}

  public function active_inactive($id,$type)
    {
        if(is_numeric($id) && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');
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
            
            if($this->master_model->updateRecord('packages',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('international_booking_enquiry');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('international_booking_enquiry',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('package_date');
            // print_r($arr_data);
            // exit();
            if($this->input->post('submit'))
            {
                $package_id = $_POST["package_id"];
                $this->form_validation->set_rules('journey_date', 'Journey Date', 'required');
                $this->form_validation->set_rules('available_seats', 'Available Seats', 'required');
                $this->form_validation->set_rules('single_seat_cost', 'Single Seats', 'required');
                $this->form_validation->set_rules('twin_seat_cost', 'Single Seats', 'required');
                $this->form_validation->set_rules('three_four_sharing_cost', 'Single Seats', 'required');
                // $this->form_validation->set_rules('rating', 'Rating', 'required');
                // $this->form_validation->set_rules('cost', 'Cost', 'required');
                // $this->form_validation->set_rules('tour_number_of_days', 'Tour Number of Days', 'required');
                // $this->form_validation->set_rules('image_name','Package Image', 'callback_handle_upload[edit]');
                if($this->form_validation->run() == TRUE)
                {
                $arr_update = array(
                        'journey_date'   =>   $_POST["journey_date"],
                        'available_seats'   =>   $_POST["available_seats"],
                        'single_seat_cost'   =>   $_POST["single_seat_cost"],
                        'twin_seat_cost'   =>   $_POST["twin_seat_cost"],
                        'three_four_sharing_cost'   =>   $_POST["three_four_sharing_cost"],
                        //'package_id' => $_POST["package_id"],
                       
                    );
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('package_date',$arr_update,$arr_where);
                   // $inserted_id = $this->master_model->insertRecord('international_packages_dates',$arr_insert,true);
                
                
                    // $arr_where     = array("id" => $id);
                    // $this->master_model->updateRecord('international_packages',$arr_update,$arr_where);
                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index/'.$package_id);
                }   
            }
        }
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index/'.$id);
        }
        
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $academic_years_data = $this->master_model->getRecords('academic_years');
        
        // $this->arr_view_data['academic_years_data']        = $academic_years_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
    
    
    public function add_package_dates($id)
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
            //print_r($arr_data);
           // echo $id;
            //echo 'hhdhdkjs';
        
            if($this->input->post('submit'))
            {
                echo 'inner';
                // $this->form_validation->set_rules('journey_date', 'Journey Date', 'required');
                // $this->form_validation->set_rules('available_seats', 'Available Seats', 'required');
                // if($this->form_validation->run() == TRUE)
                // {
                 
                 //$package_id = $this->input->post('package_id');
                // $package_id='1';
                $journey_date  = $this->input->post('journey_date'); 
                $available_seats = $this->input->post('available_seats');
                $package_id = $this->input->post('package_id');
                // print_r($available_seats);
                // exit();

                    // $countarea = count($_POST["journey_date"]); 

                    // if($countarea > 0)  
                    // {  
                    //     for($i=0; $i<$countarea; $i++)  
                    //     {   
                    //         $inserted_id = $this->master_model->insertRecord('package_date',$arr_insert,true);
                    //             $sql = "INSERT INTO crops_product_area_details(crop_ins_id,prd_area,raw_seed_qty,moisture,small_seed_wt,sample_seed_wt,male_ps_unit,female_ps_unit,fs_cost,procurement_price,test_wt_seeds) VALUES('$last_id','".$_POST["prd_area"][$i]."','".$_POST["raw_seed_qty"][$i]."','".$_POST["moisture"][$i]."','".$_POST["small_seed_wt"][$i]."','".$_POST["sample_seed_wt"][$i]."','".$_POST["male_ps_unit"][$i]."','".$_POST["female_ps_unit"][$i]."','".$_POST["fs_cost"][$i]."','".$_POST["procurement_price"][$i]."','".$_POST["test_wt_seeds"][$i]."')";  
                    //                 $result11=mysqli_query($con, $sql);           
                    //     }        
                    // }




                $count = count($journey_date);
                //echo $count;
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'journey_date'   =>   $_POST["journey_date"][$i],
                        'available_seats'   =>   $_POST["available_seats"][$i],
                        'package_id' => $package_id,
                       
                    );
                    //print_r($arr_insert);
                    $inserted_id = $this->master_model->insertRecord('package_date',$arr_insert,true);
                    //echo $inserted_id;
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
                //}   
            }
           // exit();    
        }
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $academic_years_data = $this->master_model->getRecords('academic_years');
        
        //$this->arr_view_data['academic_years_data']        = $academic_years_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Add Package Dates ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add_package_dates";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    // Get Details of Package
    public function details($id)
    {
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
    
    
     public function import(){
        $data = array();
        $memData = array();
        
        // If import request is submitted
        if($this->input->post('submit')){
              
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            
        //     print_r($_REQUEST);
        //     die;
            // Validate submitted form data
            if($this->form_validation->run() == true){
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    $this->load->library('CSVReader');
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                //     print_r($csvData);
                //     die;
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
                        foreach($csvData as $row){ $rowCount++;
                            
                            // Prepare data for DB insertion
                            $memData = array(
                                'agent_id' => $row['agent_id'],
                                'first_name' => $row['first_name'],
                                'last_name' => $row['last_name'],
                                'email' => $row['email'],
                                'mobile_number' => $row['mobile_number'],
                                'gender' => $row['gender'],
                                'media_source_name' => $row['media_source_name'],
                                'package_id' => $row['package_id'],
                                'booking_date' => $row['booking_date'],
                                'followup_status' => $row['followup_status'],
                                'is_view' => $row['is_view'],
                                'is_deleted' => $row['is_deleted'],
                               // 'created_at' => $row['created_at'],
                            );
                            
                            // Check whether email already exists in the database
                        //     $con = array(
                        //         'where' => array(
                        //             'email' => $row['Email']
                        //         ),
                        //         'returnType' => 'count'
                        //     );
                        //     $prevCount = $this->member->getRows($con);
                            
                        //     if($prevCount > 0){
                        //         // Update member data
                        //         $condition = array('email' => $row['Email']);
                        //         $update = $this->member->update($memData, $condition);
                                
                        //         if($update){
                        //             $updateCount++;
                        //         }
                        //     }else{
                                // Insert member data
                                $insert = $this->international_member->insert($memData);
                                
                                if($insert){
                                    $insertCount++;
                                }
                            //}
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                }
            }else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }
        }
        //redirect('admin/ members');

//         $this->db->order_by('id','desc');
// $this->db->where('is_deleted','no');
// $academic_years_data = $this->master_model->getRecords('academic_years');

                $this->arr_view_data['action']          = 'add';
                // $this->arr_view_data['academic_years_data'] = $academic_years_data;
                $this->arr_view_data['page_title']      = " Add ".$this->module_title;
                $this->arr_view_data['module_title']    = $this->module_title;
                $this->arr_view_data['module_url_path'] = $this->module_url_path;
                $this->arr_view_data['middle_content']  = $this->module_view_folder."import_csv";
                $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }
   
   
   
}