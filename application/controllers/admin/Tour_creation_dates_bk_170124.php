<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tour_creation_dates extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/tour_creation_dates";
        $this->module_title       = "Package Dates";
        $this->module_url_slug    = "tour_creation_dates";
        $this->module_view_folder = "tour_creation_dates/";    
        $this->load->library('upload');
	}

	public function index($id)
	{
        $record = array();
        $fields = "tour_creation_dates.*,tour_creation.tour_title";
        $this->db->order_by('tour_creation_dates.id','asc');
        $this->db->where('tour_creation.is_deleted','no');
        $this->db->where('tour_creation_dates.package_id',$id);
        $this->db->join("tour_creation", 'tour_creation_dates.package_id=tour_creation.id','left');
        $arr_data = $this->master_model->getRecords('tour_creation_dates',array('tour_creation_dates.is_deleted'=>'no'),$fields);
        
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
		$id=base64_decode($id);
        if($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        if($id!='')
        {   
            
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('tour_creation');
        
            if($this->input->post('submit'))
            {
                $package_title  = $this->input->post('package_title');
                $package_length = substr($package_title, 0, 3);
                $journey_date  = $this->input->post('journey_date'); 
                $year_slot = $this->input->post('year_slot');
                $package_id = $this->input->post('package_id');
                $single_seat_cost = $this->input->post('single_seat_cost');
                $twin_seat_cost = $this->input->post('twin_seat_cost');
                $three_four_sharing_cost = $this->input->post('three_four_sharing_cost');

                $count = count($journey_date);
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'journey_date'   =>   $_POST["journey_date"][$i],
                        'year_slot'   =>   $_POST["year_slot"][$i],
                        'single_seat_cost'   =>   $_POST["single_seat_cost"],
                        'twin_seat_cost'   =>   $_POST["twin_seat_cost"],
                        'three_four_sharing_cost'   =>   $_POST["three_four_sharing_cost"],
                        'package_id' => $package_id
                       
                    );
                    $inserted_id = $this->master_model->insertRecord('tour_creation_dates',$arr_insert,true);
                    // ------------------unique id created ---------------------------------------------------------
                    $insertid = $this->db->insert_id(); 

                    $package_unique_id = $package_id.'_'.$package_length.'_'.$journey_date[$i].'_'.$insertid;

                    $arr_update = array(
                        'package_unique_id'   =>   $package_unique_id
                    );
                    $arr_where = array("id" => $inserted_id);
                    $package_unique_inserted= $this->master_model->updateRecord('tour_creation_dates',$arr_update,$arr_where);
                    // -------------------unique id created ------------------------------------------------------------------
                }
                

                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index/'.$id);   
            }   
        }
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index/'.$id);
        }
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $academic_years_data = $this->master_model->getRecords('academic_years');

        $record = array();
        $fields = "tour_creation_dates.*,tour_creation.tour_title";
        $this->db->order_by('tour_creation_dates.id','asc');
        $this->db->where('tour_creation.is_deleted','no');
        $this->db->where('tour_creation_dates.package_id',$id);
        $this->db->join("tour_creation", 'tour_creation_dates.package_id=tour_creation.id','left');
        $this->db->group_by('tour_creation_dates.year_slot');
        $arr_data_dates = $this->master_model->getRecords('tour_creation_dates',array('tour_creation_dates.is_deleted'=>'no'),$fields);
        // print_r($arr_data_dates); die;

        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data_dates']        = $arr_data_dates;
        $this->arr_view_data['id']        = $id;
        $this->arr_view_data['page_title']      = "Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

  public function active_inactive($id,$type)
    {
        if(is_numeric($id) && ($type == "yes" || $type == "no") )
        {   
            
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('tour_creation_dates');
             foreach($arr_data as $pdata)
                {
                    $pid=$pdata['package_id'];
                }
            if(empty($arr_data))
            {
                
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index/'.$pid);
            }else{   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['is_active'] = "no";
            }
            else
            {
                $arr_update['is_active'] = "yes";
            }
            
            if($this->master_model->updateRecord('tour_creation_dates',$arr_update,array('id' => $id)))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
            }
            else
            {
             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
            }
            }    
        }
        else
        {
           $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index/'.$pid);   
    }

    
    // Delete
    
    public function delete($id)
    {
        
        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('tour_creation_dates');
    
            foreach($arr_data as $pdata)
                {
                    $pid=$pdata['package_id'];
                }
            if(empty($arr_data))
            {
                
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('tour_creation_dates',$arr_update,$arr_where))
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
        redirect($this->module_url_path.'/index/'.$pid);  
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
            $arr_data = $this->master_model->getRecords('tour_creation_dates');
           
            if($this->input->post('submit'))
            {
                $package_id = $_POST["package_id"];
                $this->form_validation->set_rules('journey_date', 'Journey Date', 'required');
                // $this->form_validation->set_rules('available_seats', 'Available Seats', 'required');
                $this->form_validation->set_rules('single_seat_cost', 'Single Seats', 'required');
                $this->form_validation->set_rules('twin_seat_cost', 'Single Seats', 'required');
                $this->form_validation->set_rules('three_four_sharing_cost', 'Single Seats', 'required');
              
                if($this->form_validation->run() == TRUE)
                {
                $arr_update = array(
                        'journey_date'   =>   $_POST["journey_date"],
                        // 'available_seats'   =>   $_POST["available_seats"],
                        'single_seat_cost'   =>   $_POST["single_seat_cost"],
                        'twin_seat_cost'   =>   $_POST["twin_seat_cost"],
                        'three_four_sharing_cost'   =>   $_POST["three_four_sharing_cost"],
                    );
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('tour_creation_dates',$arr_update,$arr_where);
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
            $arr_data = $this->master_model->getRecords('tour_creation');
           
            if($this->input->post('submit'))
            {
      
                $journey_date  = $this->input->post('journey_date'); 
                // $available_seats = $this->input->post('available_seats');
                $package_id = $this->input->post('package_id');
               
                $count = count($journey_date);
              
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'journey_date'   =>   $_POST["journey_date"][$i],
                        // 'available_seats'   =>   $_POST["available_seats"][$i],
                        'package_id' => $package_id,
                       
                    );
                   
                    $inserted_id = $this->master_model->insertRecord('tour_creation_dates',$arr_insert,true);
                   
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
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $academic_years_data = $this->master_model->getRecords('academic_years');
        
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
        
        $fields = "tour_creation.*,academic_years.year";
        $this->db->where('tour_creation.id',$id);
        $this->db->join("academic_years", 'tour_creation.academic_year=academic_years.id','left');
        $arr_data = $this->master_model->getRecords('tour_creation',array('tour_creation.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   

    public function get_slot(){ 
        // POST data 
        // $all_b=array();pid
       $state_data = $this->input->post('did');
       $package_id = $this->input->post('pid');
        // print_r($package_id); die;
        $record = array();
        $fields = "tour_creation_dates.*,tour_creation.tour_title";
        $this->db->order_by('tour_creation_dates.id','asc');
        $this->db->where('tour_creation.is_deleted','no');
        $this->db->where('tour_creation_dates.year_slot',$state_data);
        $this->db->where('tour_creation_dates.package_id',$package_id);
        $this->db->join("tour_creation", 'tour_creation_dates.package_id=tour_creation.id','left');
        $this->db->group_by('tour_creation_dates.year_slot');
        $data = $this->master_model->getRecords('tour_creation_dates',array('tour_creation_dates.is_deleted'=>'no'),$fields);
        // print_r($data); die;
        echo json_encode($data);
    }
   
}