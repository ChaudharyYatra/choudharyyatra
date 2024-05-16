<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class International_package_iternary extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/international_package_iternary";
        $this->module_title       = "International Package Itinerary";
        $this->module_url_slug    = "international_package_iternary";
        $this->module_view_folder = "international_package_iternary/";    
        
	}

	public function index($id)
	{  
         $record = array();
        $fields = "international_package_iternary.*,international_packages.tour_title";
        $this->db->order_by('international_package_iternary.day_number','asc');
        $this->db->where('international_package_iternary.is_deleted','no');
        $this->db->where('international_package_iternary.package_id',$id);
        $this->db->join("international_packages", 'international_package_iternary.package_id=international_packages.id','left');
        $arr_data = $this->master_model->getRecords('international_package_iternary',array('international_package_iternary.is_deleted'=>'no'),$fields);

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
            $arr_data = $this->master_model->getRecords('international_packages');
        
        //  foreach($arr_data as $pdata)
        //     {
        //         $pid=$pdata['package_id'];
                 
        //     }
            if($this->input->post('submit'))
            {
                $total_days = $this->input->post('total_days');
                $day_number = $this->input->post('day_number');
                $iternary_desc = $this->input->post('iternary_desc');

                $count = count($iternary_desc);
                for($i=0;$i<$count;$i++)
                {
                    $day=$i+1;
                    $arr_insert = array(
                        'total_days'   =>   $_POST["total_days"],
                         'day_number'   =>   $_POST["day_number"][$i],
                        'iternary_desc'   =>   $_POST["iternary_desc"][$i],
                        'package_id' => $id,
                       
                    );
                    $inserted_id = $this->master_model->insertRecord('international_package_iternary',$arr_insert,true);
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
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $academic_years_data = $this->master_model->getRecords('academic_years');
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['id']        = $id;
        $this->arr_view_data['page_title']      = "Add ".$this->module_title;
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
            $arr_data = $this->master_model->getRecords('international_package_iternary');
            foreach($arr_data as $pdata)
            {
                $package_id=$pdata['package_id'];
                 
            }
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index/'.$package_id);
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
            
            if($this->master_model->updateRecord('international_package_iternary',$arr_update,array('id' => $id)))
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
        redirect($this->module_url_path.'/index/'.$package_id);   
    }

    
    // Delete
    
   public function delete($id)
    {
        
        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('international_package_iternary');
    
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
                 
            if($this->master_model->updateRecord('international_package_iternary',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('international_package_iternary');
           
            foreach($arr_data as $pdata)
            {
                $package_id=$pdata['package_id'];
                 
            }
            if($this->input->post('submit'))
            {
                $package_id = $package_id;
                $this->form_validation->set_rules('day_number', 'Day Number', 'required');
                $this->form_validation->set_rules('iternary_desc', 'Itinerary Description', 'required');
              
                if($this->form_validation->run() == TRUE)
                {
                
                $arr_update = array(
                        'day_number'   =>   $_POST["day_number"],
                        'iternary_desc'   =>   $_POST["iternary_desc"]
                    );
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('international_package_iternary',$arr_update,$arr_where);
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
            redirect($this->module_url_path.'/index/'.$package_id);
        }
      
        $this->arr_view_data['arr_data']        = $arr_data;
		$this->arr_view_data['id']        = $id;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
}