<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hotel_details extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('hotel_sess_id')=="") 
        { 
                redirect(base_url().'hotel/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('hotel_panel_slug')."hotel/hotel_details";
        $this->module_title       = "Hotel Details";
        $this->module_url_slug    = "hotel_details";
        $this->module_view_folder = "hotel_details/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $hotel_sess_name = $this->session->userdata('hotel_name');
        $id=$this->session->userdata('hotel_sess_id'); 

        $fields = "hotel_room.*";
        $this->db->where('hotel_room.is_deleted','no');
        $this->db->where('hotel_id',$id);
        // $this->db->join("package_type", 'assign_staff.package_type=package_type.id','left');
        $arr_data = $this->master_model->getRecords('hotel_room',array('hotel_room.is_deleted'=>'no'),$fields);


        $this->arr_view_data['hotel_sess_name'] = $hotel_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
       
	}
	
	
    public function add()
    {   
        $hotel_sess_name = $this->session->userdata('hotel_name');
        $iid=$this->session->userdata('hotel_sess_id');  

        
        if($this->input->post('submit'))
        {

            $this->form_validation->set_rules('room_number[]', 'room number', 'required');
            $this->form_validation->set_rules('floor_number[]', 'floor number', 'required');
            $this->form_validation->set_rules('room_type[]', 'room type', 'required');
            $this->form_validation->set_rules('occupancy[]', 'occupancy', 'required');
            $this->form_validation->set_rules('bed_type[]', 'bed type', 'required');
            $this->form_validation->set_rules('price[]', 'price', 'required');
            // $this->form_validation->set_rules('amenities[]', 'amenities', 'required');
            $this->form_validation->set_rules('description[]', 'description', 'required');

            
            if($this->form_validation->run() == TRUE)
            {

                $room_number	  = $this->input->post('room_number'); 
                $floor_number	  = $this->input->post('floor_number');
                $room_type	  = $this->input->post('room_type'); 
                $occupancy = $this->input->post('occupancy');
                $bed_type          = $this->input->post('bed_type');
                $price	        = $this->input->post('price');
                // $amenities=$this->input->post('amenities');
                $description	        = $this->input->post('description');

                $assign = $this->input->post('assign');
          
                $count_assign = count($this->input->post('assign'));

                $count = count($room_number);
                for($i=0;$i<$count;$i++)
                {
                    $newvar =$i+1;
                    for($j=1;$j<=$count_assign;$j++)
                {

                    $check='amenities'.$newvar; 
                    $amenities=implode(',',$this->input->post($check));
                    
                } 
              
                    $arr_insert = array(
                        'room_number'   =>   $room_number[$i],
                        'floor_number'   =>   $floor_number[$i],
                        'room_type'   =>   $room_type[$i],
                        'occupancy'   =>   $occupancy[$i],
                        'bed_type'   =>   $bed_type[$i],
                        'price'   =>   $price[$i],
                        'amenities'   =>   $amenities,
                        'description'   =>   $description[$i],
                        'assign'   =>   $assign[$i],
                        'hotel_id'   =>   $iid
                    );
                   
                
                    $inserted_id = $this->master_model->insertRecord('hotel_room',$arr_insert,true);
                   
                
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
       
        }



        $this->arr_view_data['hotel_sess_name'] = $hotel_sess_name;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add Room";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
    }


   
    // Edit - Get data for edit
    
    public function edit($id)
    {
        $hotel_sess_name = $this->session->userdata('hotel_name');

		if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   

            $this->db->where('id',$id);
            $this->db->where('is_active','yes');
            $this->db->where('is_deleted','no');
            $arr_data = $this->master_model->getRecords('hotel_room');
  
        
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('room_number[]', 'room number', 'required');
                $this->form_validation->set_rules('floor_number[]', 'floor number', 'required');
                $this->form_validation->set_rules('room_type[]', 'room type', 'required');
                $this->form_validation->set_rules('occupancy[]', 'occupancy', 'required');
                $this->form_validation->set_rules('bed_type[]', 'bed type', 'required');
                $this->form_validation->set_rules('price[]', 'price', 'required');
                // $this->form_validation->set_rules('amenities[]', 'amenities', 'required');
                $this->form_validation->set_rules('description[]', 'description', 'required');

                if($this->form_validation->run() == TRUE)
                {

                    $room_number	  = $this->input->post('room_number'); 
                    $floor_number	  = $this->input->post('floor_number');
                    $room_type	  = $this->input->post('room_type'); 
                    $occupancy = $this->input->post('occupancy');
                    $bed_type          = $this->input->post('bed_type');
                    $price	        = $this->input->post('price');
                    // $amenities=$this->input->post('amenities');
                    $description	        = $this->input->post('description');
              
                    $count_assign = count($this->input->post('assign'));


                    $count = count($room_number);
                    for($i=0;$i<$count;$i++)
                    {
                        $newvar =$i+1;
                        for($j=1;$j<=$count_assign;$j++)
                    {
    
                        $check='amenities'.$newvar; 
                        $amenities=implode(',',$this->input->post($check));
                        
                    } 
                  
                        $arr_update = array(
                            'room_number'   =>   $room_number[$i],
                            'floor_number'   =>   $floor_number[$i],
                            'room_type'   =>   $room_type[$i],
                            'occupancy'   =>   $occupancy[$i],
                            'bed_type'   =>   $bed_type[$i],
                            'price'   =>   $price[$i],
                            'amenities'   =>   $amenities,
                            'description'   =>   $description[$i]
                        );
                    
                    
                        $arr_where     = array("id" => $id);
                        $this->master_model->updateRecord('hotel_room',$arr_update,$arr_where);
                    
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
        
        $this->db->where('is_deleted','no');
		$this->db->order_by('tour_number','ASC');
        $packages_data = $this->master_model->getRecords('packages');
        //  print_r($packages_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $package_type = $this->master_model->getRecords('package_type');
        // print_r($package_type); die;

        
        $this->arr_view_data['hotel_sess_name'] = $hotel_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['packages_data']        = $packages_data;
        $this->arr_view_data['package_type']        = $package_type;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
    }

    // Delete
    
    public function delete($id)
    {

        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('hotel_room');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('hotel_room',$arr_update,$arr_where))
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



      // Active/Inactive
  
  public function active_inactive($id,$type)
  {

      if($id!='' && ($type == "yes" || $type == "no") )
      {   
          $this->db->where('id',$id);
          $arr_data = $this->master_model->getRecords('hotel_room');
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
          
          if($this->master_model->updateRecord('hotel_room',$arr_update,array('id' => $id)))
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
        $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
    }



   
   
}