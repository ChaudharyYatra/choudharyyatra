<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class International_packages_dates extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/international_packages_dates";
        $this->module_title       = "International Package Date";
        $this->module_url_slug    = "international_packages_dates";
        $this->module_view_folder = "international_packages_dates/";    
        $this->load->library('upload');
	}

	public function index($id)
	{
        $record = array();
        $fields = "international_packages_dates.*,international_packages.tour_title";
        $this->db->order_by('international_packages_dates.id','desc');
        $this->db->where('international_packages.is_deleted','no');
        $this->db->where('international_packages_dates.package_id',$id);
        $this->db->join("international_packages", 'international_packages_dates.package_id=international_packages.id','left');
        $arr_data = $this->master_model->getRecords('international_packages_dates',array('international_packages_dates.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Lists";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}
	
    public function add($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        if($id!="")
        {   
            
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('international_packages');
            
            if($this->input->post('submit'))
            {
                $journey_date  = $this->input->post('journey_date'); 
                $available_seats = $this->input->post('available_seats');
                $package_id = $this->input->post('package_id');

                $count = count($journey_date);
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'journey_date'   =>   $_POST["journey_date"][$i],
                        'available_seats'   =>   $_POST["available_seats"][$i],
                        'single_seat_cost'   =>   $_POST["single_seat_cost"],
                        'twin_seat_cost'   =>   $_POST["twin_seat_cost"],
                        'three_four_sharing_cost'   =>   $_POST["three_four_sharing_cost"],
                        'package_id' => $package_id,
                       
                    );
                    $inserted_id = $this->master_model->insertRecord('international_packages_dates',$arr_insert,true);
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
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['id']              = $id;
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
            $arr_data = $this->master_model->getRecords('international_packages_dates');
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
            
            if($this->master_model->updateRecord('international_packages_dates',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('international_packages_dates');
            
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
                 
            if($this->master_model->updateRecord('international_packages_dates',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('international_packages_dates');
           
            if($this->input->post('submit'))
            {
                $package_id = $_POST["package_id"];
                $this->form_validation->set_rules('journey_date', 'Journey Date', 'required');
                $this->form_validation->set_rules('available_seats', 'Available Seats', 'required');
                $this->form_validation->set_rules('single_seat_cost', 'Single Seats', 'required');
                $this->form_validation->set_rules('twin_seat_cost', 'Single Seats', 'required');
                $this->form_validation->set_rules('three_four_sharing_cost', 'Single Seats', 'required');
               
                if($this->form_validation->run() == TRUE)
                {
                $arr_update = array(
                        'journey_date'   =>   $_POST["journey_date"],
                        'available_seats'   =>   $_POST["available_seats"],
                        'single_seat_cost'   =>   $_POST["single_seat_cost"],
                        'twin_seat_cost'   =>   $_POST["twin_seat_cost"],
                        'three_four_sharing_cost'   =>   $_POST["three_four_sharing_cost"],
                    );
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('international_packages_dates',$arr_update,$arr_where);
                 
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
            redirect($this->module_url_path.'/index');
        }
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $academic_years_data = $this->master_model->getRecords('academic_years');
        
        $this->arr_view_data['academic_years_data']        = $academic_years_data;
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
            $arr_data = $this->master_model->getRecords('international_packages');
           
            if($this->input->post('submit'))
            {
             
                $journey_date  = $this->input->post('journey_date'); 
                $available_seats = $this->input->post('available_seats');
                $package_id = $this->input->post('package_id');
               
                $count = count($journey_date);
             
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'journey_date'   =>   $_POST["journey_date"][$i],
                        'available_seats'   =>   $_POST["available_seats"][$i],
                        'package_id' => $package_id,
                       
                    );
                   
                    $inserted_id = $this->master_model->insertRecord('international_packages_dates',$arr_insert,true);
                   
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
        
        $fields = "international_packages.*,academic_years.year";
        $this->db->where('international_packages.id',$id);
        $this->db->join("academic_years", 'international_packages.academic_year=academic_years.id','left');
        $arr_data = $this->master_model->getRecords('international_packages',array('international_packages.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
   
}