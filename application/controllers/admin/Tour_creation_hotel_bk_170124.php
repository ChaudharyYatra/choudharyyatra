<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tour_creation_hotel extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/tour_creation_hotel";
        $this->module_title       = "Tour Creation Hotel";
        $this->module_url_slug    = "tour_creation_hotel";
        $this->module_view_folder = "tour_creation_hotel/";    
        
	}

	public function index($id)
	{  
        $record = array();
        $fields = "tour_creation_hotel.*,tour_creation.tour_title,state.state_name,city.city_name,hotel.hotel_name";
        // $this->db->order_by('package_iternary.day_number','asc');
        $this->db->where('tour_creation_hotel.is_deleted','no');
        $this->db->where('tour_creation_hotel.package_id',$id);
        $this->db->join("tour_creation", 'tour_creation_hotel.package_id=tour_creation.id','left');
        $this->db->join("state", 'tour_creation_hotel.state_id=state.id','left');
        $this->db->join("city", 'tour_creation_hotel.city_id=city.id','left');
        $this->db->join("hotel", 'tour_creation_hotel.hotel_name_id=hotel.id','left');
        $arr_data = $this->master_model->getRecords('tour_creation_hotel',array('tour_creation_hotel.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

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
            $arr_data = $this->master_model->getRecords('tour_creation_hotel');
        
            if($this->input->post('submit'))
            {
               
                $total_days_hotel = $this->input->post('total_days_hotel');
                $day_number = $this->input->post('day_number');
                $state_id = $this->input->post('state_id');
                $city_id = $this->input->post('city_id');
                $hotel_name_id = $this->input->post('hotel_name_id');
                $short_description = $this->input->post('short_description');
                $travel_yes = $this->input->post('travel_yes');
                // print_r($_REQUEST); die;

                $count = count($short_description);
                if($count!= ''){
                for($i=0;$i<$count;$i++)
                {
                    $arr_insert = array(
                        'total_days_hotel'   =>   $_POST["total_days_hotel"],
                        'day_number'   =>   $_POST["day_number"][$i],
                        'state_id'   =>   $_POST["state_id"][$i],
                        'city_id'   =>   $_POST["city_id"][$i],
                        'hotel_name_id'   =>   $_POST["hotel_name_id"][$i],
                        'short_description'   =>   $_POST["short_description"][$i],
                        'in_travel'   =>   $_POST["travel_yes"][$i],
                        'package_id' => $id,
                        
                    );
                    // print_r($arr_insert); die;
                    $inserted_id = $this->master_model->insertRecord('tour_creation_hotel',$arr_insert,true);
                    
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
                    redirect($this->module_url_path.'/index/'.$id);   
            }   
        }
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $state_name_data = $this->master_model->getRecords('state');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $city_name_data = $this->master_model->getRecords('city');
        // print_r($city_name_data); die;
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['state_name_data']        = $state_name_data;
        $this->arr_view_data['city_name_data']        = $city_name_data;
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
            $arr_data = $this->master_model->getRecords('tour_creation_hotel');
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
            
            if($this->master_model->updateRecord('tour_creation_hotel',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('tour_creation_hotel');
    
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
                 
            if($this->master_model->updateRecord('tour_creation_hotel',$arr_update,$arr_where))
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
            $arr_data = $this->master_model->getRecords('tour_creation_hotel');
           
            foreach($arr_data as $pdata)
            {
                $package_id=$pdata['package_id'];
                 
            }
            if($this->input->post('submit'))
            {
                
                // $package_id = $package_id;               
                // $this->form_validation->set_rules('day_number', 'Day Number', 'required');
                // $this->form_validation->set_rules('short_description', 'Short Description', 'required');
              
                // if($this->form_validation->run() == TRUE)
                // {
                    // print_r($_REQUEST); die;
                    $arr_update = array(                    
                        'day_number'   =>   $_POST["day_number"],
                        'state_id'   =>   $_POST["state_id"],
                        'city_id'   =>   $_POST["city_id"],
                        'hotel_name_id'   =>   $_POST["hotel_name_id"],
                        'short_description'   =>   $_POST["short_description"],
                        'in_travel'   =>   $_POST["in_travel"],
                    );
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('tour_creation_hotel',$arr_update,$arr_where);
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
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index/'.$package_id);
        }
      
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $state_name_data = $this->master_model->getRecords('state');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $city_name_data = $this->master_model->getRecords('city');
        // print_r($city_name_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $hotel_name_data = $this->master_model->getRecords('hotel');
        // print_r($city_name_data); die;

        $record = array();
        $fields = "tour_creation_hotel.*,tour_creation.tour_title,state.state_name,city.city_name,hotel.hotel_name";
        // $this->db->order_by('package_iternary.day_number','asc');
        $this->db->where('tour_creation_hotel.is_deleted','no');
        $this->db->where('tour_creation_hotel.id',$id);
        $this->db->join("tour_creation", 'tour_creation_hotel.package_id=tour_creation.id','left');
        $this->db->join("state", 'tour_creation_hotel.state_id=state.id','left');
        $this->db->join("city", 'tour_creation_hotel.city_id=city.id','left');
        $this->db->join("hotel", 'tour_creation_hotel.hotel_name_id=hotel.id','left');
        $package_hotel_data = $this->master_model->getRecords('tour_creation_hotel',array('tour_creation_hotel.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['package_hotel_data']        = $package_hotel_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['hotel_name_data']        = $hotel_name_data;
        $this->arr_view_data['state_name_data']        = $state_name_data;
        $this->arr_view_data['city_name_data']        = $city_name_data;
		$this->arr_view_data['id']        = $id;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }


    public function get_city(){ 
        // POST data 
        // $all_b=array();
       $city_data = $this->input->post('did');
        // print_r($city_data); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('state_id',$city_data);   
                        $data = $this->master_model->getRecords('city');
        echo json_encode($data);
    }

    public function get_hotel_name(){ 
        // POST data 
        // $all_b=array();
       $hotel_data = $this->input->post('did');
        // print_r($city_data); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('city',$hotel_data);   
                        $data = $this->master_model->getRecords('hotel');
        echo json_encode($data);
    }

}