<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Day_wise_tour_itinerary extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/day_wise_tour_itinerary";
        $this->module_url_path_list =  base_url().$this->config->item('admin_panel_slug')."/day_wise_tour_itinerary";
        $this->module_title       = "Day Wise Tour Itinerary";
        $this->module_url_slug    = "day_wise_tour_itinerary";
        $this->module_view_folder = "day_wise_tour_itinerary/";    
        // $this->load->library('upload');
	}

	public function index()
	{  
        


        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_list'] = $this->module_url_path_list;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
    
    public function add()
    {   
        // print_r($_REQUEST); die;
        if($this->input->post('submit'))
        {
            
             $this->form_validation->set_rules('tour_number', 'tour number', 'required');
            //  $this->form_validation->set_rules('tour_name', 'tour name', 'required');
            //  $this->form_validation->set_rules('tour_days', 'tour days', 'required');
            //  $this->form_validation->set_rules('day[]', 'day', 'required');
            //  $this->form_validation->set_rules('day_plan[]', 'day_plan', 'required');
            //  $this->form_validation->set_rules('reporting_time[]', 'reporting_time', 'required');
            //  $this->form_validation->set_rules('reporting_place[]', 'reporting_place', 'required');
            //  $this->form_validation->set_rules('extra_remarks[]', 'extra_remarks', 'required');
            //  $this->form_validation->set_rules('image_name[]', 'image_name', 'required');
            //  $this->form_validation->set_rules('flight_time[]', 'flight_time', 'required');
            //  $this->form_validation->set_rules('flight_airport[]', 'flight_airport', 'required');
            //  $this->form_validation->set_rules('train_time[]', 'train_time', 'required');
            //  $this->form_validation->set_rules('train_train[]', 'train_train', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                // print_r('hiiiiiiiiiiiiii'); die;
                

                $tour_number  = $this->input->post('tour_number');
                $tour_name  = $this->input->post('tour_name');
                $tour_days  = $this->input->post('tour_days');
                $day  = $this->input->post('day');
                $day_plan  = $this->input->post('day_plan');
                $reporting_time  = $this->input->post('reporting_time');
                $reporting_place  = $this->input->post('reporting_place'); 
                $extra_remarks  = $this->input->post('extra_remarks'); 
                $flight_time  = $this->input->post('flight_time');
                $flight_airport  = $this->input->post('flight_airport');
                $train_time  = $this->input->post('train_time');
                $train_train  = $this->input->post('train_train');

                $c=count($day);
            //    die;
                for($i=0; $i<$c; $i++){
                $arr_insert = array(
                    'tour_number' =>   $tour_number,
                    'tour_name' =>   $tour_name,
                    'tour_days' =>   $tour_days,
                    'day' =>   $day[$i],
                    'day_plan'   =>   $day_plan[$i],
                    'reporting_time'   =>   $reporting_time[$i],   
                    'reporting_place'    =>$reporting_place[$i],
                    'extra_remarks'=>$extra_remarks[$i],
                    'flight_airport'=>$flight_airport[$i],
                    'flight_time'=>$flight_time[$i],
                    'train_time'=>$train_time[$i],
                    'train_train'=>$train_train[$i],
                    // 'image_name'    => $filename[$i]
                         
                 );
                //  print_r($arr_insert); die;
                
                $inserted_id = $this->master_model->insertRecord('day_wise_tour_itinerary',$arr_insert,true);
            }  
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," Day Wise Tour Itinerary Added Successfully.");
                    redirect($this->module_url_path.'/add');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/add');
            }   
            
        
        }


        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $packages_data = $this->master_model->getRecords('packages');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $airport_data = $this->master_model->getRecords('airport_master');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $train_data = $this->master_model->getRecords('railway_master');


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['packages_data']        = $packages_data;   
        $this->arr_view_data['airport_data']        = $airport_data;  
        $this->arr_view_data['train_data']        = $train_data;  
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function getTourname(){ 
        // POST data 
        $tour_name = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$tour_name);
                $data = $this->master_model->getRecord('packages');
        // print_r($data); 
        echo json_encode($data); 
        
      }

      public function getTourdays_it(){ 
        // POST data 
        $tour_name = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$tour_name);
                $data = $this->master_model->getRecord('packages');
        // print_r($data); 
        echo json_encode($data); 
        
      }

      public function add_all()
      {   
        // print_r($_REQUEST); die;
       
          if($this->input->post('tour_number')!='')
          {
            // print_r('hiiiiiiiiiiiiiiiiiiiiiii'); die;
           
               $this->form_validation->set_rules('tour_number', 'tour number', 'required');
               $this->form_validation->set_rules('tour_name', 'tour name', 'required');
               $this->form_validation->set_rules('tour_days', 'tour days', 'required');
               $this->form_validation->set_rules('day[]', 'day', 'required');
            //    $this->form_validation->set_rules('day_plan[]', 'day_plan', 'required');
               $this->form_validation->set_rules('reporting_time[]', 'reporting_time', 'required');
               $this->form_validation->set_rules('reporting_place[]', 'reporting_place', 'required');
               $this->form_validation->set_rules('extra_remarks[]', 'extra_remarks', 'required');
               $this->form_validation->set_rules('image_name[]', 'image_name', 'required');
               $this->form_validation->set_rules('flight_time[]', 'flight_time', 'required');
               $this->form_validation->set_rules('flight_airport[]', 'flight_airport', 'required');
               $this->form_validation->set_rules('train_time[]', 'train_time', 'required');
               $this->form_validation->set_rules('train_train[]', 'train_train', 'required');
              
              if($this->form_validation->run() == TRUE)
              {
                // print_r($_REQUEST); 
                  $tour_number  = $this->input->post('tour_number');
                  $tour_name  = $this->input->post('tour_name');
                  $tour_days  = $this->input->post('tour_days');
                  $day  = $this->input->post('day');
                  $day_plan  = $this->input->post('day_plan');
                  $reporting_time  = $this->input->post('reporting_time');
                  $reporting_place  = $this->input->post('reporting_place'); 
                  $extra_remarks  = $this->input->post('extra_remarks'); 
                  $flight_time  = $this->input->post('flight_time');
                  $flight_airport  = $this->input->post('flight_airport');
                  $train_time  = $this->input->post('train_time');
                  $train_train  = $this->input->post('train_train');
                  $itinerary_image_name = $this->input->post('image_name');
                //   print_r($day_plan); die;
 
                 $c=count($day);
                //   die;
                  for($i=0; $i<$c; $i++){
                    // print_r('hiiiiii'); die;

            if($itinerary_image_name != '')

        {

            if(isset($itinerary_image_name[$i]) && !empty($itinerary_image_name[$i]))

            {

                $image_parts_traveller_img = explode(";base64,", $itinerary_image_name[$i]);

            } else {

                $image_parts_traveller_img = explode(";base64,", $itinerary_image_name[$i]);

            }      

            $image_base64_traveller_img = base64_decode($image_parts_traveller_img[1]);

            $image_type_aux_travellerimg = explode("image/", $image_parts_traveller_img[0]);

            if(count($image_type_aux_travellerimg)>1) {

                $image_type_traveller_img = $image_type_aux_travellerimg[1];

                $file_name_traveller_img = "traveller_img_".time().date("Ymd").$i;

            } else {

                $image_type_aux_travellerimg = explode("data:application/", $image_parts_traveller_img[0]);

                $image_type_traveller_img = $image_type_aux_travellerimg[1];

                $file_name_traveller_img = "traveller_img_".time().date("Ymd").$i;

            }

            $fname_traveller_img=$file_name_traveller_img.".".$image_type_traveller_img;

            $file_traveller_img = 'uploads/day_wise_itinerary/'.$file_name_traveller_img.".".$image_type_traveller_img;

            file_put_contents($file_traveller_img, $image_base64_traveller_img);

        }

                  $arr_insert = array(
                      'tour_number' =>   $tour_number,
                      'tour_name' =>   $tour_name,
                      'tour_days' =>   $tour_days,
                      'day' =>   $day[$i],
                      'day_plan'   =>   $day_plan[$i],
                      'reporting_time'   =>   $reporting_time[$i],   
                      'reporting_place'    =>$reporting_place[$i],
                      'extra_remarks'=>$extra_remarks[$i],
                      'flight_airport'=>$flight_airport[$i],
                      'flight_time'=>$flight_time[$i],
                      'train_time'=>$train_time[$i],
                      'train_train'=>$train_train[$i],
                      'image_name'=>$fname_traveller_img
                      
                   );
                   $inserted_id = $this->master_model->insertRecord('day_wise_tour_itinerary',$arr_insert,true);
                  
                  
              }  
            //   echo $inserted_id; die;
              
              if($this->db->affected_rows()>0)
              {
                echo true;
              }            
                
              }   
            //   die;
              
          
          }
  
      }


   
}