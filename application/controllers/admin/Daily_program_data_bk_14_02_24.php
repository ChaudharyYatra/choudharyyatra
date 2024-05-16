<?php 
//   Controller for: home page
// Author: Rupali Patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Daily_program_data extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/daily_program_data";
        $this->add_more_module_url_path    =  base_url().$this->config->item('admin_panel_slug')."add_more_tour_expenses";
        $this->day_to_day_program_module    =  base_url().$this->config->item('admin_panel_slug')."/day_to_day_program";
        $this->module_title       = "Daily Program Data";
        $this->module_url_slug    = "daily_program_data";
        $this->module_view_folder = "daily_program_data/";

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
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
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
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        
        }

        public function add($pid,$c_no_of_days,$day)
        {  
            $id=base64_decode($pid);
            $no_of_days=base64_decode($c_no_of_days);

        if($this->input->post('submit'))
        {

                $tour_number_1  = $this->input->post('tour_number_1');
                $current_date  = $this->input->post('current_date');

                //breakfast
                $breakfast_activity_type  = $this->input->post('breakfast_activity_type');
                $breakfast_meals_type  = $this->input->post('breakfast_meals_type');
                $breakfast_start_time  = $this->input->post('breakfast_start_time');
                $breakfast_food_menu = implode(",", $this->input->post('breakfast_food_menu')); 
                $breakfast_end_time  = $this->input->post('breakfast_end_time');

                //add more 
                $travel_activity_type  = $this->input->post('travel_activity_type');
                $travel_start_point  = $this->input->post('travel_start_point');
                $travel_start_time  = $this->input->post('travel_start_time');
                $travel_distance  = $this->input->post('travel_distance');
                $travel_to_place  = $this->input->post('travel_to_place');
                $travel_end_time  = $this->input->post('travel_end_time');

                //Lunch
                $lunch_activity_type  = $this->input->post('lunch_activity_type');
                $lunch_meals_type  = $this->input->post('lunch_meals_type');
                $lunch_start_time  = $this->input->post('lunch_start_time');
                // $lunch_food_menu  = $this->input->post('lunch_food_menu');
                $lunch_food_menu = implode(",", $this->input->post('lunch_food_menu')); 
                $lunch_end_time  = $this->input->post('lunch_end_time');

                //add_more
                $visit_activity_type  = $this->input->post('visit_activity_type');
                $visit_start_point  = $this->input->post('visit_start_point');
                $visit_start_time  = $this->input->post('visit_start_time');
                $visit_distance  = $this->input->post('visit_distance');
                $visit_to_place  = $this->input->post('visit_to_place');
                $visit_end_time  = $this->input->post('visit_end_time');

                //Dinner
                $dinner_activity_type  = $this->input->post('dinner_activity_type');
                $dinner_meals_type  = $this->input->post('dinner_meals_type');
                $dinner_start_time  = $this->input->post('dinner_start_time');
                // $dinner_food_menu  = $this->input->post('dinner_food_menu');
                $dinner_food_menu = implode(",", $this->input->post('dinner_food_menu')); 
                $dinner_end_time  = $this->input->post('dinner_end_time');

                //add_more
                $travel_visit_activity_type  = $this->input->post('travel_visit_activity_type');
                $travel_visit_start_point  = $this->input->post('travel_visit_start_point');
                $travel_visit_start_time  = $this->input->post('travel_visit_start_time');
                $travel_visit_distance  = $this->input->post('travel_visit_distance');
                $travel_visit_to_place  = $this->input->post('travel_visit_to_place');
                $travel_visit_end_time  = $this->input->post('travel_visit_end_time');

                $arr_insert = array(
                    'package_id'   =>   $tour_number_1,
                    'current_day_date'   =>   $current_date,
                    'activity_type'   =>   $breakfast_activity_type,
                    'meal_type'   =>   $breakfast_meals_type,
                    'start_time'   =>   $breakfast_start_time,
                    'menu'   =>   $breakfast_food_menu,
                    'end_time'   =>   $breakfast_end_time,
                    'day_no'   =>   $day,
                    'tour_creation_id' => $id
                    ); 
                $inserted_id = $this->master_model->insertRecord('day_to_day_program',$arr_insert,true);
                $day_today_program_id = $this->db->insert_id(); 
                $arr_insert = array(
                    'package_id'   =>   $tour_number_1,
                    'current_day_date'   =>   $current_date,
                    'activity_type'   =>   $lunch_activity_type,
                    'meal_type'   =>   $lunch_meals_type,
                    'start_time'   =>   $lunch_start_time,
                    'menu'   =>   $lunch_food_menu,
                    'end_time'   =>   $lunch_end_time,
                    'day_no'   =>   $day,
                    'tour_creation_id' => $id
                    ); 
                $inserted_id = $this->master_model->insertRecord('day_to_day_program',$arr_insert,true);
                $day_today_program_id_2 = $this->db->insert_id(); 
                $arr_insert = array(
                    'package_id'   =>   $tour_number_1,
                    'current_day_date'   =>   $current_date,
                    'activity_type'   =>   $dinner_activity_type,
                    'meal_type'   =>   $dinner_meals_type,
                    'start_time'   =>   $dinner_start_time,
                    'menu'   =>   $dinner_food_menu,
                    'end_time'   =>   $dinner_end_time,
                    'day_no'   =>   $day,
                    'tour_creation_id' => $id
                    ); 
                $inserted_id = $this->master_model->insertRecord('day_to_day_program',$arr_insert,true);
                // $insert_id();
                $day_today_program_id_3 = $this->db->insert_id(); 
                // print_r($current_tour_expenses_id); die;
               
                if($travel_start_point != ''){
                $count = count($travel_activity_type);
                // print_r($count); die;
                for($i=0;$i<$count;$i++)
                {
                $arr_insert = array(
                'activity_type'   =>   $_POST["travel_activity_type"][$i],
                'start_place'   =>   $_POST["travel_start_point"][$i],
                'start_time'   =>   $_POST["travel_start_time"][$i],
                'distance'   =>   $_POST["travel_distance"][$i],
                'end_place'   =>   $_POST["travel_to_place"][$i],
                'end_time'   =>   $_POST["travel_end_time"][$i],
                'entry_after' => 'Breakfast',
                'day_no'   =>   $day,
                'day_to_day_program_id' => $day_today_program_id
                ); 
                $inserted_id = $this->master_model->insertRecord('add_more_day_to_day_program',$arr_insert,true);
                }
                }

                if($visit_start_point != ''){
                    $count = count($visit_activity_type);
                    // print_r($count); die;
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(
                    'activity_type'   =>   $_POST["visit_activity_type"][$i],
                    'start_place'   =>   $_POST["visit_start_point"][$i],
                    'start_time'   =>   $_POST["visit_start_time"][$i],
                    'distance'   =>   $_POST["visit_distance"][$i],
                    'end_place'   =>   $_POST["visit_to_place"][$i],
                    'end_time'   =>   $_POST["visit_end_time"][$i],
                    'entry_after' => 'Lunch',
                    'day_no'   =>   $day,
                    'day_to_day_program_id' => $day_today_program_id_2
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_day_to_day_program',$arr_insert,true);
                    }  
                }
                if($travel_visit_activity_type != ''){
                    $count = count($travel_visit_activity_type);
                    // print_r($count); die;
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(
                    'activity_type'   =>   $_POST["travel_visit_activity_type"][$i],
                    'start_place'   =>   $_POST["travel_visit_start_point"][$i],
                    'start_time'   =>   $_POST["travel_visit_start_time"][$i],
                    'distance'   =>   $_POST["travel_visit_distance"][$i],
                    'end_place'   =>   $_POST["travel_visit_to_place"][$i],
                    'end_time'   =>   $_POST["travel_visit_end_time"][$i],
                    'entry_after' => 'Dinner',
                    'day_no'   =>   $day,
                    'day_to_day_program_id' => $day_today_program_id_3
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_day_to_day_program',$arr_insert,true);
                    }  
                }
                   

                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    //  redirect($this->module_url_path.'/add/'.);
                     redirect($this->module_url_path.'/add/'.$pid.'/'.$c_no_of_days.'/'.$day);
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
		$this->db->order_by('food_menu_name','ASC');
        $food_menu_master = $this->master_model->getRecords('food_menu_master');
        //  print_r($food_menu_master); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');    
        $this->db->where('id',$id);
        $this->db->where('tour_number_of_days',$no_of_days);
        $tour_creation = $this->master_model->getRecords('tour_creation');
        //  print_r($tour_creation); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $citywise_place_master = $this->master_model->getRecords('citywise_place_master');
        //  print_r($citywise_place_master); die;

        //  $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['tour_creation']        = $tour_creation;
         $this->arr_view_data['food_menu_master']        = $food_menu_master;
         $this->arr_view_data['citywise_place_master']        = $citywise_place_master;
        //  $this->arr_view_data['expense_type_data']        = $expense_type_data;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }



    public function edit($pid,$c_no_of_days,$day)
        {  
            // echo $id; die;
            // $supervision_sess_name = $this->session->userdata('supervision_name');
            // $iid = $this->session->userdata('supervision_sess_id');

            // $tid=base64_decode($id);
            $id=base64_decode($pid);
            $no_of_days=base64_decode($c_no_of_days);

            if($id=='') 
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path.'/index');
            }   
            else
            {   
                $this->db->where('id',$id);
                $arr_data = $this->master_model->getRecords('tour_creation');
            }
            if($this->input->post('submit'))
            {
                $tour_number_1  = $this->input->post('tour_number_1');
                $current_date  = $this->input->post('current_date');
                $tour_creation_id  = $this->input->post('tour_creation_id');

                //breakfast
                $breakfast_id  = $this->input->post('breakfast_id');
                $breakfast_activity_type  = $this->input->post('breakfast_activity_type');
                $breakfast_meals_type  = $this->input->post('breakfast_meals_type');
                $breakfast_start_time  = $this->input->post('breakfast_start_time');
                $breakfast_food_menu = implode(",", $this->input->post('breakfast_food_menu')); 
                $breakfast_end_time  = $this->input->post('breakfast_end_time');

                //add more 
                $addmore_breakfast_id  = $this->input->post('addmore_breakfast_id');
                $addmore_entry_after_breakfast  = $this->input->post('addmore_entry_after_breakfast');
                $travel_activity_type  = $this->input->post('travel_activity_type');
                $travel_start_point  = $this->input->post('travel_start_point');
                $travel_start_time  = $this->input->post('travel_start_time');
                $travel_distance  = $this->input->post('travel_distance');
                $travel_to_place  = $this->input->post('travel_to_place');
                $travel_end_time  = $this->input->post('travel_end_time');

                //Lunch
                $lunch_id  = $this->input->post('lunch_id');
                $lunch_activity_type  = $this->input->post('lunch_activity_type');
                $lunch_meals_type  = $this->input->post('lunch_meals_type');
                $lunch_start_time  = $this->input->post('lunch_start_time');
                $lunch_food_menu = implode(",", $this->input->post('lunch_food_menu')); 
                $lunch_end_time  = $this->input->post('lunch_end_time');

                //add_more
                $addmore_lunch_id  = $this->input->post('addmore_lunch_id');
                $addmore_entry_after_lunch  = $this->input->post('addmore_entry_after_lunch');
                $visit_activity_type  = $this->input->post('visit_activity_type');
                $visit_start_point  = $this->input->post('visit_start_point');
                $visit_start_time  = $this->input->post('visit_start_time');
                $visit_distance  = $this->input->post('visit_distance');
                $visit_to_place  = $this->input->post('visit_to_place');
                $visit_end_time  = $this->input->post('visit_end_time');

                //Dinner
                $dinner_id  = $this->input->post('dinner_id');
                $dinner_activity_type  = $this->input->post('dinner_activity_type');
                $dinner_meals_type  = $this->input->post('dinner_meals_type');
                $dinner_start_time  = $this->input->post('dinner_start_time');
                $dinner_food_menu = implode(",", $this->input->post('dinner_food_menu')); 
                $dinner_end_time  = $this->input->post('dinner_end_time');

                //add_more
                $addmore_dinner_id  = $this->input->post('addmore_dinner_id');
                $addmore_entry_after_dinner  = $this->input->post('addmore_entry_after_dinner');
                $travel_visit_activity_type  = $this->input->post('travel_visit_activity_type');
                $travel_visit_start_point  = $this->input->post('travel_visit_start_point');
                $travel_visit_start_time  = $this->input->post('travel_visit_start_time');
                $travel_visit_distance  = $this->input->post('travel_visit_distance');
                $travel_visit_to_place  = $this->input->post('travel_visit_to_place');
                $travel_visit_end_time  = $this->input->post('travel_visit_end_time');

                // ======================== breakfast lunch  dinner ====================================
                $arr_update = array(
                'current_day_date' =>   $current_date
                );
                $arr_where     = array("tour_creation_id" => $tour_creation_id);
                $inserted_id = $this->master_model->updateRecord('day_to_day_program',$arr_update,$arr_where);

                if($breakfast_meals_type == 'Breakfast'){
                $arr_update = array(
                    'activity_type' =>   $breakfast_activity_type,
                    'meal_type' =>   $breakfast_meals_type,
                    'start_time' =>   $breakfast_start_time,
                    'menu' =>   $breakfast_food_menu,
                    'end_time' =>   $breakfast_end_time
                    );
                    $arr_where     = array("id" => $breakfast_id);
                $inserted_id = $this->master_model->updateRecord('day_to_day_program',$arr_update,$arr_where);
                }

                if($breakfast_meals_type == 'Lunch'){
                $arr_update = array(
                    'activity_type' =>   $lunch_activity_type,
                    'meal_type' =>   $lunch_meals_type,
                    'start_time' =>   $lunch_start_time,
                    'menu' =>   $lunch_food_menu,
                    'end_time' =>   $lunch_end_time
                    );
                    $arr_where     = array("id" => $lunch_id);
                $inserted_id = $this->master_model->updateRecord('day_to_day_program',$arr_update,$arr_where);
                }

                if($breakfast_meals_type == 'Dinner'){
                $arr_update = array(
                    'activity_type' =>   $dinner_activity_type,
                    'meal_type' =>   $dinner_meals_type,
                    'start_time' =>   $dinner_start_time,
                    'menu' =>   $dinner_food_menu,
                    'end_time' =>   $dinner_end_time
                    );
                    $arr_where     = array("id" => $dinner_id);
                $inserted_id = $this->master_model->updateRecord('day_to_day_program',$arr_update,$arr_where);
                }

                // ======================== breakfast lunch  dinner ====================================

                // ========================= edit existing add more breakfast lunch  dinner ==============================
                    if($addmore_entry_after_breakfast == 'Breakfast'){
                        $count = count($travel_activity_type);
                        // print_r($count); die;
                        for($i=0;$i<$count;$i++)
                        {
                        $arr_update = array(
                        'activity_type'   =>   $_POST["travel_activity_type"][$i],
                        'start_place'   =>   $_POST["travel_start_point"][$i],
                        'start_time'   =>   $_POST["travel_start_time"][$i],
                        'distance'   =>   $_POST["travel_distance"][$i],
                        'end_place'   =>   $_POST["travel_to_place"][$i],
                        'end_time'   =>   $_POST["travel_end_time"][$i]
                        ); 
                        // print_r($arr_update); die;
                        $arr_where     = array("id" => $addmore_breakfast_id[$i]);
                        $this->master_model->updateRecord('add_more_day_to_day_program',$arr_update,$arr_where);
                        }
                        
                    }
                    //=====================================================
                    if($addmore_entry_after_lunch == 'Lunch'){
                        $count = count($visit_activity_type);
                        // print_r($count); die;
                        for($i=0;$i<$count;$i++)
                        {
                        $arr_update = array(
                        'activity_type'   =>   $_POST["visit_activity_type"][$i],
                        'start_place'   =>   $_POST["visit_start_point"][$i],
                        'start_time'   =>   $_POST["visit_start_time"][$i],
                        'distance'   =>   $_POST["visit_distance"][$i],
                        'end_place'   =>   $_POST["visit_to_place"][$i],
                        'end_time'   =>   $_POST["visit_end_time"][$i]
                        ); 
                        // print_r($arr_update); die;
                        $arr_where     = array("id" => $addmore_lunch_id[$i]);
                        $this->master_model->updateRecord('add_more_day_to_day_program',$arr_update,$arr_where);
                        }
                        
                    }
                    //=====================================================
                    if($addmore_entry_after_dinner == 'Dinner'){
                        $count = count($travel_visit_activity_type);
                        // print_r($count); die;
                        for($i=0;$i<$count;$i++)
                        {
                        $arr_update = array(
                        'activity_type'   =>   $_POST["travel_visit_activity_type"][$i],
                        'start_place'   =>   $_POST["travel_visit_start_point"][$i],
                        'start_time'   =>   $_POST["travel_visit_start_time"][$i],
                        'distance'   =>   $_POST["travel_visit_distance"][$i],
                        'end_place'   =>   $_POST["travel_visit_to_place"][$i],
                        'end_time'   =>   $_POST["travel_visit_end_time"][$i]
                        ); 
                        // print_r($arr_update); die;
                        $arr_where     = array("id" => $addmore_dinner_id[$i]);
                        $this->master_model->updateRecord('add_more_day_to_day_program',$arr_update,$arr_where);
                        }
                        
                    }

                    // ========================= edit existing add more  breakfast lunch  dinner ==============================

                    // ========================= insert new record add more  breakfast lunch  dinner ==============================
                    
                    
                // footer add more
                $edit_travel_activity_type  = $this->input->post('edit_travel_activity_type');
                $edit_travel_start_point  = $this->input->post('edit_travel_start_point');
                $edit_travel_start_time  = $this->input->post('edit_travel_start_time');
                $edit_travel_distance  = $this->input->post('edit_travel_distance');
                $edit_travel_to_place  = $this->input->post('edit_travel_to_place');
                $edit_travel_end_time  = $this->input->post('edit_travel_end_time');

                // footer add more
                $edit_visit_activity_type  = $this->input->post('edit_visit_activity_type');
                $edit_visit_start_point  = $this->input->post('edit_visit_start_point');
                $edit_visit_start_time  = $this->input->post('edit_visit_start_time');
                $edit_visit_distance  = $this->input->post('edit_visit_distance');
                $edit_visit_to_place  = $this->input->post('edit_visit_to_place');
                $edit_visit_end_time  = $this->input->post('edit_visit_end_time');

                // footer add_more
                $edit_travel_visit_activity_type  = $this->input->post('edit_travel_visit_activity_type');
                $edit_travel_visit_start_point  = $this->input->post('edit_travel_visit_start_point');
                $edit_travel_visit_start_time  = $this->input->post('edit_travel_visit_start_time');
                $edit_travel_visit_distance  = $this->input->post('edit_travel_visit_distance');
                $edit_travel_visit_to_place  = $this->input->post('edit_travel_visit_to_place');
                $edit_travel_visit_end_time  = $this->input->post('edit_travel_visit_end_time');

                    if($edit_travel_activity_type != ''){
                    $count = count($edit_travel_activity_type);
                    // print_r($count); die;
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(
                    'activity_type'   =>   $_POST["edit_travel_activity_type"][$i],
                    'start_place'   =>   $_POST["edit_travel_start_point"][$i],
                    'start_time'   =>   $_POST["edit_travel_start_time"][$i],
                    'distance'   =>   $_POST["edit_travel_distance"][$i],
                    'end_place'   =>   $_POST["edit_travel_to_place"][$i],
                    'end_time'   =>   $_POST["edit_travel_end_time"][$i]
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_day_to_day_program',$arr_insert,true);
                    }
                }   

                if($edit_visit_activity_type != ''){
                    $count = count($edit_visit_activity_type);
                    // print_r($count); die;
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(
                    'activity_type'   =>   $_POST["edit_visit_activity_type"][$i],
                    'start_place'   =>   $_POST["edit_visit_start_point"][$i],
                    'start_time'   =>   $_POST["edit_visit_start_time"][$i],
                    'distance'   =>   $_POST["edit_visit_distance"][$i],
                    'end_place'   =>   $_POST["edit_visit_to_place"][$i],
                    'end_time'   =>   $_POST["edit_visit_end_time"][$i]
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_day_to_day_program',$arr_insert,true);
                    }
                }   

                if($edit_travel_visit_activity_type != ''){
                    $count = count($edit_travel_visit_activity_type);
                    // print_r($count); die;
                    for($i=0;$i<$count;$i++)
                    {
                    $arr_insert = array(
                    'activity_type'   =>   $_POST["edit_travel_visit_activity_type"][$i],
                    'start_place'   =>   $_POST["edit_travel_visit_start_point"][$i],
                    'start_time'   =>   $_POST["edit_travel_visit_start_time"][$i],
                    'distance'   =>   $_POST["edit_travel_visit_distance"][$i],
                    'end_place'   =>   $_POST["edit_travel_visit_to_place"][$i],
                    'end_time'   =>   $_POST["edit_travel_visit_end_time"][$i]
                    ); 
                    $inserted_id = $this->master_model->insertRecord('add_more_day_to_day_program',$arr_insert,true);
                    }
                }   
                // ========================= insert new record add more  breakfast lunch  dinner ==============================

                    if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Record Updated Successfully.");
                     redirect($this->day_to_day_program_module.'/take_days/'.$pid.'/'.$c_no_of_days);
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
        $this->db->where('tour_expenses.id',$id);
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
        $this->db->where('add_more_tour_expenses.tour_expenses_id',$id);
        $this->db->join("expense_category", 'add_more_tour_expenses.product_name=expense_category.id','left');
        $add_more_tour_expenses_all = $this->master_model->getRecords('add_more_tour_expenses',array('add_more_tour_expenses.is_deleted'=>'no'),$fields);

        $edit_data=count($add_more_tour_expenses_all);
        // print_r($edit_data); die;


        // =======================================================================
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');    
        $this->db->where('id',$id);
        $this->db->where('tour_number_of_days',$no_of_days);
        $tour_creation = $this->master_model->getRecords('tour_creation');
        //  print_r($tour_creation); die;

        $fields = "tour_creation.*,day_to_day_program.*,add_more_day_to_day_program.*,day_to_day_program.id as daytoday_id,add_more_day_to_day_program.id as add_daytoday_id,
        day_to_day_program.activity_type as daytoday_activity";
        $this->db->where('tour_creation.is_deleted','no');
        $this->db->where('tour_creation.id',$id);
        $this->db->where('tour_creation.tour_number_of_days',$no_of_days);
        $this->db->join("day_to_day_program", 'tour_creation.id=day_to_day_program.tour_creation_id','left');
        $this->db->join("add_more_day_to_day_program", 'day_to_day_program.id=add_more_day_to_day_program.day_to_day_program_id','left');
        $this->db->group_by('day_to_day_program.meal_type');
        $day_to_day_data = $this->master_model->getRecords('tour_creation',array('tour_creation.is_deleted'=>'no'),$fields);
        // print_r($day_to_day_data); die;

        $fields = "tour_creation.*,day_to_day_program.*,add_more_day_to_day_program.*,day_to_day_program.id as daytoday_id,add_more_day_to_day_program.id as add_daytoday_id,
        tour_creation.id as tour_id";
        $this->db->where('tour_creation.is_deleted','no');
        $this->db->where('tour_creation.id',$id);
        $this->db->where('tour_creation.tour_number_of_days',$no_of_days);
        $this->db->join("day_to_day_program", 'tour_creation.id=day_to_day_program.tour_creation_id','left');
        $this->db->join("add_more_day_to_day_program", 'day_to_day_program.id=add_more_day_to_day_program.day_to_day_program_id','left');
        $this->db->group_by('tour_creation.id');
        $add_more_day_to_day_data = $this->master_model->getRecords('tour_creation',array('tour_creation.is_deleted'=>'no'),$fields);
        // print_r($add_more_day_to_day_data); die;


        $fields = "tour_creation.*,day_to_day_program.*,add_more_day_to_day_program.*,day_to_day_program.id as daytoday_id,add_more_day_to_day_program.id as add_daytoday_id";
        $this->db->where('tour_creation.is_deleted','no');
        $this->db->where('add_more_day_to_day_program.is_deleted','no');
        $this->db->where('tour_creation.id',$id);
        $this->db->where('tour_creation.tour_number_of_days',$no_of_days);
        $this->db->join("day_to_day_program", 'tour_creation.id=day_to_day_program.tour_creation_id','left');
        $this->db->join("add_more_day_to_day_program", 'day_to_day_program.id=add_more_day_to_day_program.day_to_day_program_id','left');
        $multiple_day_to_day_data = $this->master_model->getRecords('tour_creation',array('tour_creation.is_deleted'=>'no'),$fields);
        // print_r($multiple_day_to_day_data);die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
		$this->db->order_by('food_menu_name','ASC');
        $food_menu_master = $this->master_model->getRecords('food_menu_master');
        //  print_r($food_menu_master); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $citywise_place_master = $this->master_model->getRecords('citywise_place_master');
        //  print_r($citywise_place_master); die;

        //  $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
         $this->arr_view_data['packages_data'] = $packages_data;
         $this->arr_view_data['add_more_tour_expenses_all'] = $add_more_tour_expenses_all;
         $this->arr_view_data['edit_data'] = $edit_data;
        //  $this->arr_view_data['breakfast_day_to_day_data'] = $breakfast_day_to_day_data;
         $this->arr_view_data['expense_category'] = $expense_category;
         $this->arr_view_data['package_date'] = $package_date;
         $this->arr_view_data['tour_creation'] = $tour_creation;
         $this->arr_view_data['citywise_place_master'] = $citywise_place_master;
         $this->arr_view_data['day_to_day_data'] = $day_to_day_data;
         $this->arr_view_data['multiple_day_to_day_data'] = $multiple_day_to_day_data;
         $this->arr_view_data['add_more_day_to_day_data'] = $add_more_day_to_day_data;
         $this->arr_view_data['food_menu_master'] = $food_menu_master;
         $this->arr_view_data['tour_expenses_all'] = $tour_expenses_all;
         $this->arr_view_data['expense_type_data'] = $expense_type_data;
         $this->arr_view_data['expense_category_data'] = $expense_category_data;
         $this->arr_view_data['measuring_unit'] = $measuring_unit;
        //  $this->arr_view_data['package_id']        = $package_id;
        //  $this->arr_view_data['package_date_id']        = $package_date_id;
         $this->arr_view_data['page_title']      = " Edit ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['add_more_module_url_path']    = $this->add_more_module_url_path;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['day_to_day_program_module'] = $this->day_to_day_program_module;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
        }

    public function breakfast_add_more_delete()
    {
        $id  = $this->input->post('request_id');

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('add_more_day_to_day_program');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('add_more_day_to_day_program',$arr_update,$arr_where))
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

    public function lunch_add_more_delete()
    {
        $id  = $this->input->post('request_id');

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('add_more_day_to_day_program');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('add_more_day_to_day_program',$arr_update,$arr_where))
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

    public function dinner_add_more_delete()
    {
        $id  = $this->input->post('request_id');

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('add_more_day_to_day_program');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('add_more_day_to_day_program',$arr_update,$arr_where))
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
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
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