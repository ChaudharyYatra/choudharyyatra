
<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    img{
        width:25% !important;
        height:25% !important;
    }

    table{
        table-layout: fixed;
        display: block;
        overflow: auto;
    }
    .for_row_set .row_set{
        width:135px;

    }
    .for_row_set .row_set1{
        width:70px;

    }
    .mealplan_css{
            border: 1px solid red !important;
        }

    .cash_payment_div{
        border: 1px solid red;
        padding: 10px;
        margin-top:10px;
        margin-bottom:40px;
    }
    .add_more_css{
        margin-top:-14px;
        margin-bottom:-10px;
        margin-left:72%;    }

    .remove_color .form-control{
        color: black !important;
    }
    .remove_color .select_css{
        color: black !important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $module_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
            <div class="col-md-12">
            <!-- jquery validation -->
            <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card card-primary">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="add_tour_expenses">   
                    <div class="row">
                        <?php foreach($tour_creation as $tour_creation_info){ ?> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour No / Name</label>
                                <input readonly type="text" class="form-control" name="tour_number_1" id="tour_number_1" value="<?php if(!empty($tour_creation_info)){ echo $tour_creation_info['tour_number'];} ?> - <?php if(!empty($tour_creation_info)){ echo $tour_creation_info['tour_title'];} ?>">
                                <input type="hidden" class="form-control" name="tour_number" id="tour_number" value="<?php echo $tour_creation_info['id'];?>">
                            </div>
                        </div>
                        <?php } ?>

                        <?php foreach($add_more_day_to_day_data as $add_more_day_to_day_data_info){ ?> 
                        <div class="col-md-6">
                            <div class="form-group remove_color">
                                <label>Date</label>
                                <input type="date" class="form-control" name="current_date" id="current_date" value="<?php echo $add_more_day_to_day_data_info['current_day_date'];?>">
                                <input type="hidden" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $add_more_day_to_day_data_info['tour_id'];?>">
                            </div>
                        </div>
                        <?php }?>
                        <!-- <div class="col-md-6">
                            <div class="form-group remove_color">
                                <label>Activity Type</label>
                            </div>
                        </div> -->

                        <!-- <div class="col-md-6" id="sub_main_tour_div1" style='display:none;'>
                            <div class="form-group remove_color">
                                <label>Meals Type</label>
                                <select class="select_css" name="meals_type" id="meals_type" required>
                                    <option value="">Select Meals Type</option>
                                    <option value="Breakfast">Breakfast</option>
                                    <option value="Dinner">Dinner</option>
                                    <option value="Lunch">Lunch</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-6"></div>
                        <div class="col-md-12">
                            <?php foreach($day_to_day_data as $day_to_day_data_info){
                                if($day_to_day_data_info['meal_type'] == 'Breakfast'){ ?> 
                            <div class="form-group">
                            <label>Breakfast</label>
                                <table border="1" class="table table-bordered" id="table">
                                    <colgroup>
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 30%;">
                                        <col span="1" style="width: 20%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Activity Type</th>
                                            <th>Meals Type</th>
                                            <th>Start Time</th>
                                            <th>Menu</th>
                                            <th>End Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <tr>
                                            <!-- Activity type food type -->
                                            <td>
                                                <input readonly type="text" class="form-control quantity" name="breakfast_activity_type" id="breakfast_activity_type<?php echo $i;?>" value="<?php echo $day_to_day_data_info['daytoday_activity'];?>">
                                                <input readonly type="text" class="form-control quantity" name="breakfast_id" id="breakfast_id" value="<?php echo $day_to_day_data_info['daytoday_id'];?>">
                                                <!-- <select class="select_css" name="food_activity_type" id="food_activity_type">
                                                    <option value="">Select Activity Type</option>
                                                    <option value="Food">Food</option>
                                                    <option value="Travel">Travel</option>
                                                    <option value="Visit">Visit</option>
                                                </select> -->
                                            </td>
                                            <td>
                                                <input readonly type="text" class="form-control quantity" name="breakfast_meals_type" id="breakfast_meals_type<?php echo $i;?>" value="<?php echo $day_to_day_data_info['meal_type'];?>">  
                                            <!-- <select class="select_css" name="meals_type" id="meals_type" required>
                                                <option value="">Select Meals Type</option>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Dinner">Dinner</option>
                                                <option value="Lunch">Lunch</option>
                                            </select> -->
                                            </td>
                                            <td>
                                                <input type="time" class="form-control quantity" name="breakfast_start_time" id="breakfast_start_time<?php echo $i;?>" value="<?php echo $day_to_day_data_info['start_time'];?>">
                                            </td>
                                            <td>
                                                <select class="form-control select2" multiple="multiple" data-placeholder="Select food menu" name="breakfast_food_menu[]" id="breakfast_food_menu<?php echo $i;?>">
                                                    <option value="">Select Menu</option>

                                                    <?php
                                                $title = explode(',',$day_to_day_data_info['menu']);
                                                $c=count($title);
                                                    foreach($food_menu_master as $food_menu_master_value) 
                                                    { 
                                                        for($i=0; $i<$c; $i++){
                                                            $tid= $title[$i];
                                                        }
                                                ?>
                                                    <option value="<?php echo $food_menu_master_value['id']; ?>" <?php if(in_array($food_menu_master_value['id'], $title)) { echo "selected"; } ?>><?php echo $food_menu_master_value['food_menu_name']; ?></option>
                                                <?php  } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="time" class="form-control quantity" name="breakfast_end_time" id="breakfast_end_time<?php echo $i;?>"  value="<?php echo $day_to_day_data_info['end_time'];?>">
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } } ?>
                        </div>
                        
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <button type="button" class="btn btn-primary add_more_css" edit_travel_attr_add_id="0" name="submit" value="edit_travel_add_more" id="edit_travel_add_more">Add More</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <table border="1" class="table table-bordered" id="edit_table1">
                                    <colgroup>
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Activity Type</th>
                                            <th>Start Place</th>
                                            <th>Start Time</th>
                                            <th>Distance</th>
                                            <th>End Place</th>
                                            <th>End Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <tr>
                                        <?php foreach($multiple_day_to_day_data as $multiple_day_to_day_data_info){
                                              if($multiple_day_to_day_data_info['entry_after'] == 'Breakfast'){ ?> 
                                            <td>
                                                <!-- <input readonly type="text" class="form-control quantity" name="travel_activity_type" id="travel_activity_type<?php echo $i;?>" value="Travel"> -->
                                                <select class="select_css" name="travel_activity_type[]" id="travel_activity_type">
                                                    <option value="">Select Activity Type</option>
                                                    <!-- <option value="Food">Food</option> -->
                                                    <option value="Travel" <?php if(isset($multiple_day_to_day_data_info['activity_type'])){if("Travel" == $multiple_day_to_day_data_info['activity_type']) {echo 'selected';}}?>>Travel</option>
                                                    <option value="Visit" <?php if(isset($multiple_day_to_day_data_info['activity_type'])){if("Visit" == $multiple_day_to_day_data_info['activity_type']) {echo 'selected';}}?>>Visit</option>
                                                </select>

                                                <input readonly type="text" class="form-control quantity" name="addmore_breakfast_id[]" id="addmore_breakfast_id" value="<?php echo $multiple_day_to_day_data_info['add_daytoday_id'];?>">
                                                <input readonly type="text" class="form-control quantity" name="addmore_entry_after_breakfast[]" id="addmore_entry_after_breakfast" value="<?php echo $multiple_day_to_day_data_info['entry_after'];?>">

                                            </td>
                                            <td>
                                                <select class="select_css" name="travel_start_point[]" id="travel_start_point">
                                                    <option value="">Select start point</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($multiple_day_to_day_data_info['start_place'])){if($citywise_place_master_info['id'] == $multiple_day_to_day_data_info['start_place']) {echo 'selected';}}?>><?php echo $citywise_place_master_info['place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input type="time" class="form-control quantity" name="travel_start_time[]" id="travel_start_time<?php echo $i;?>" value="<?php echo $multiple_day_to_day_data_info['start_time'];?>"></td>
                                            <td><input type="text" class="form-control quantity" name="travel_distance[]" id="travel_distance<?php echo $i;?>" value="<?php echo $multiple_day_to_day_data_info['distance'];?>"></td>
                                            <td>
                                                <select class="select_css" name="travel_to_place[]" id="travel_to_place">
                                                    <option value="">Select To Place</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($multiple_day_to_day_data_info['end_place'])){if($citywise_place_master_info['id'] == $multiple_day_to_day_data_info['end_place']) {echo 'selected';}}?>><?php echo $citywise_place_master_info['place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input type="time" class="form-control quantity" name="travel_end_time[]" id="travel_end_time<?php echo $i;?>" value="<?php echo $multiple_day_to_day_data_info['end_time'];?>"></td>
                                            <td>
                                            <a title="delete"><button value="<?php echo $multiple_day_to_day_data_info['add_daytoday_id']; ?>" class="btn btn-danger breakfast_delete_add_more">Delete</button></a>
                                            </td>
                                            <!-- <td>
                                                <button type="button" class="btn btn-primary" travel_attr_add_id="1" name="submit" value="travel_add_more" id="travel_add_more">Add More</button>
                                            </td> -->
                                            
                                        </tr>
                                        <?php } } ?>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <?php foreach($day_to_day_data as $day_to_day_data_info){
                                if($day_to_day_data_info['meal_type'] == 'Lunch'){ ?> 
                            <div class="form-group">
                            <label>Lunch</label>
                                <table border="1" class="table table-bordered" id="table">
                                    <colgroup>
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 30%;">
                                        <col span="1" style="width: 20%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Activity Type</th>
                                            <th>Meals Type</th>
                                            <th>Start Time</th>
                                            <th>Menu</th>
                                            <th>End Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <tr>
                                            <!-- Activity type food type -->
                                            <td>
                                                <input readonly type="text" class="form-control quantity" name="lunch_activity_type" id="lunch_activity_type<?php echo $i;?>" value="<?php echo $day_to_day_data_info['daytoday_activity'];?>">
                                                <input readonly type="text" class="form-control quantity" name="lunch_id" id="lunch_id" value="<?php echo $day_to_day_data_info['daytoday_id'];?>">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="form-control quantity" name="lunch_meals_type" id="lunch_meals_type<?php echo $i;?>" value="<?php echo $day_to_day_data_info['meal_type'];?>">  
                                            </td>
                                            <td>
                                                <input type="time" class="form-control quantity" name="lunch_start_time" id="lunch_start_time<?php echo $i;?>" value="<?php echo $day_to_day_data_info['start_time'];?>">
                                            </td>
                                            <td>
                                                <select class="form-control select2" multiple="multiple" data-placeholder="Select food menu" name="lunch_food_menu[]" id="lunch_food_menu<?php echo $i;?>">
                                                    <option value="">Select Menu</option>
                                                    <?php
                                                $title = explode(',',$day_to_day_data_info['menu']);
                                                $c=count($title);
                                                    foreach($food_menu_master as $food_menu_master_value) 
                                                    { 
                                                        for($i=0; $i<$c; $i++){
                                                            $tid= $title[$i];
                                                        }
                                                ?>
                                                    <option value="<?php echo $food_menu_master_value['id']; ?>" <?php if(in_array($food_menu_master_value['id'], $title)) { echo "selected"; } ?>><?php echo $food_menu_master_value['food_menu_name']; ?></option>
                                                <?php  } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="time" class="form-control quantity" name="lunch_end_time" id="lunch_end_time<?php echo $i;?>" value="<?php echo $day_to_day_data_info['end_time'];?>">
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } }?>
                        </div>

                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <button type="button" class="btn btn-primary add_more_css" edit_visit_attr_add_id="0" name="submit" value="edit_visit_add_more" id="edit_visit_add_more">Add More</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <table border="1" class="table table-bordered" id="edit_table2">
                                    <colgroup>
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Activity Type</th>
                                            <th>Start Place</th>
                                            <th>Start Time</th>
                                            <th>Distance</th>
                                            <th>End Place</th>
                                            <th>End Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <tr>
                                        <?php foreach($multiple_day_to_day_data as $multiple_day_to_day_data_info){
                                              if($multiple_day_to_day_data_info['entry_after'] == 'Lunch'){ ?> 
                                        <td>
                                                <!-- <input readonly type="text" class="form-control quantity" name="travel_activity_type" id="travel_activity_type<?php echo $i;?>" value="Travel"> -->
                                                <select class="select_css" name="visit_activity_type[]" id="visit_activity_type">
                                                    <option value="">Select Activity Type</option>
                                                    <option value="Travel" <?php if(isset($multiple_day_to_day_data_info['activity_type'])){if("Travel" == $multiple_day_to_day_data_info['activity_type']) {echo 'selected';}}?>>Travel</option>
                                                    <option value="Visit" <?php if(isset($multiple_day_to_day_data_info['activity_type'])){if("Visit" == $multiple_day_to_day_data_info['activity_type']) {echo 'selected';}}?>>Visit</option>
                                                </select>


                                                <input readonly type="text" class="form-control quantity" name="addmore_lunch_id[]" id="addmore_lunch_id" value="<?php echo $multiple_day_to_day_data_info['add_daytoday_id'];?>">
                                                <input readonly type="text" class="form-control quantity" name="addmore_entry_after_lunch[]" id="addmore_entry_after_lunch" value="<?php echo $multiple_day_to_day_data_info['entry_after'];?>">
                                            </td>
                                            <td>
                                                <select class="select_css" name="visit_start_point[]" id="visit_start_point" >
                                                    <option value="">Select start point</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($multiple_day_to_day_data_info['start_place'])){if($citywise_place_master_info['id'] == $multiple_day_to_day_data_info['start_place']) {echo 'selected';}}?>><?php echo $citywise_place_master_info['place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input type="time" class="form-control quantity" name="visit_start_time[]" id="visit_start_time<?php echo $i;?>" value="<?php echo $multiple_day_to_day_data_info['start_time'];?>"></td>
                                            <td><input type="text" class="form-control quantity" name="visit_distance[]" id="visit_distance<?php echo $i;?>" value="<?php echo $multiple_day_to_day_data_info['distance'];?>"></td>
                                            <td>
                                                <select class="select_css" name="visit_to_place[]" id="visit_to_place">
                                                    <option value="">Select To Place</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($multiple_day_to_day_data_info['end_place'])){if($citywise_place_master_info['id'] == $multiple_day_to_day_data_info['end_place']) {echo 'selected';}}?>><?php echo $citywise_place_master_info['place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input type="time" class="form-control quantity" name="visit_end_time[]" id="visit_end_time<?php echo $i;?>" value="<?php echo $multiple_day_to_day_data_info['end_time'];?>"></td>
                                            <td>
                                            <a title="delete"><button value="<?php echo $multiple_day_to_day_data_info['add_daytoday_id']; ?>" class="btn btn-danger lunch_delete_add_more">Delete</button></a>
                                            </td>
                                            <!-- <td>
                                                <button type="button" class="btn btn-primary" visit_attr_add_id="1" name="submit" value="visit_add_more" id="visit_add_more">Add More</button>
                                            </td> -->
                                        </tr>
                                        <?php } } ?>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <?php foreach($day_to_day_data as $day_to_day_data_info){
                                if($day_to_day_data_info['meal_type'] == 'Dinner'){ ?> 
                            <div class="form-group">
                            <label>Dinner</label>
                                <table border="1" class="table table-bordered" id="table">
                                    <colgroup>
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 30%;">
                                        <col span="1" style="width: 20%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Activity Type</th>
                                            <th>Meals Type</th>
                                            <th>Start Time</th>
                                            <th>Menu</th>
                                            <th>End Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <tr>
                                            <!-- Activity type food type -->
                                            <td>
                                                <input readonly type="text" class="form-control quantity" name="dinner_activity_type" id="dinner_activity_type<?php echo $i;?>" value="<?php echo $day_to_day_data_info['daytoday_activity'];?>">
                                                <input readonly type="text" class="form-control quantity" name="dinner_id" id="dinner_id" value="<?php echo $day_to_day_data_info['daytoday_id'];?>">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="form-control quantity" name="dinner_meals_type" id="dinner_meals_type<?php echo $i;?>" value="<?php echo $day_to_day_data_info['meal_type'];?>">  
                                            </td>
                                            <td>
                                                <input type="time" class="form-control quantity" name="dinner_start_time" id="dinner_start_time<?php echo $i;?>" value="<?php echo $day_to_day_data_info['start_time'];?>">
                                            </td>
                                            <td>
                                                <select class="form-control select2" multiple="multiple" data-placeholder="Select food menu" name="dinner_food_menu[]" id="dinner_food_menu<?php echo $i;?>">
                                                    <option value="">Select Menu</option>
                                                    <?php
                                                $title = explode(',',$day_to_day_data_info['menu']);
                                                $c=count($title);
                                                    foreach($food_menu_master as $food_menu_master_value) 
                                                    { 
                                                        for($i=0; $i<$c; $i++){
                                                            $tid= $title[$i];
                                                        }
                                                ?>
                                                    <option value="<?php echo $food_menu_master_value['id']; ?>" <?php if(in_array($food_menu_master_value['id'], $title)) { echo "selected"; } ?>><?php echo $food_menu_master_value['food_menu_name']; ?></option>
                                                <?php  } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="time" class="form-control quantity" name="dinner_end_time" id="dinner_end_time<?php echo $i;?>" value="<?php echo $day_to_day_data_info['end_time'];?>">
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } } ?>
                        </div>


                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary add_more_css" edit_travel_visit_attr_add_id="0" name="submit" value="edit_travel_visit_add_more" id="edit_travel_visit_add_more">Add More</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <table border="1" class="table table-bordered" id="edit_table3">
                                    <colgroup>
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Activity Type</th>
                                            <th>Start Place</th>
                                            <th>Start Time</th>
                                            <th>Distance</th>
                                            <th>End Place</th>
                                            <th>End Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <tr>
                                        <?php foreach($multiple_day_to_day_data as $multiple_day_to_day_data_info){
                                              if($multiple_day_to_day_data_info['entry_after'] == 'Dinner'){ ?>
                                        <td>
                                                <!-- <input readonly type="text" class="form-control quantity" name="travel_activity_type" id="travel_activity_type<?php echo $i;?>" value="Travel"> -->
                                                <select class="select_css" name="travel_visit_activity_type[]" id="travel_visit_activity_type">
                                                    <option value="">Select Activity Type</option>
                                                    <option value="Travel" <?php if(isset($multiple_day_to_day_data_info['activity_type'])){if("Travel" == $multiple_day_to_day_data_info['activity_type']) {echo 'selected';}}?>>Travel</option>
                                                    <option value="Visit" <?php if(isset($multiple_day_to_day_data_info['activity_type'])){if("Visit" == $multiple_day_to_day_data_info['activity_type']) {echo 'selected';}}?>>Visit</option>
                                                </select>

                                                <input readonly type="text" class="form-control quantity" name="addmore_dinner_id[]" id="addmore_dinner_id" value="<?php echo $multiple_day_to_day_data_info['add_daytoday_id'];?>">
                                                <input readonly type="text" class="form-control quantity" name="addmore_entry_after_dinner[]" id="addmore_entry_after_dinner" value="<?php echo $multiple_day_to_day_data_info['entry_after'];?>">
                                            </td>
                                            <td>
                                                <select class="select_css" name="travel_visit_start_point[]" id="travel_visit_start_point" >
                                                    <option value="">Select start point</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($multiple_day_to_day_data_info['start_place'])){if($citywise_place_master_info['id'] == $multiple_day_to_day_data_info['start_place']) {echo 'selected';}}?>><?php echo $citywise_place_master_info['place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input type="time" class="form-control quantity" name="travel_visit_start_time[]" id="travel_visit_start_time<?php echo $i;?>" value="<?php echo $multiple_day_to_day_data_info['start_time'];?>"></td>
                                            <td><input type="text" class="form-control quantity" name="travel_visit_distance[]" id="travel_visit_distance<?php echo $i;?>" value="<?php echo $multiple_day_to_day_data_info['distance'];?>"></td>
                                            <td>
                                                <select class="select_css" name="travel_visit_to_place[]" id="travel_visit_to_place">
                                                    <option value="">Select To Place</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($multiple_day_to_day_data_info['end_place'])){if($citywise_place_master_info['id'] == $multiple_day_to_day_data_info['end_place']) {echo 'selected';}}?>><?php echo $citywise_place_master_info['place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input type="time" class="form-control quantity" name="travel_visit_end_time[]" id="travel_visit_end_time<?php echo $i;?>" value="<?php echo $multiple_day_to_day_data_info['end_time'];?>"></td>
                                            <td>
                                            <a title="delete"><button value="<?php echo $multiple_day_to_day_data_info['add_daytoday_id']; ?>" class="btn btn-danger dinner_delete_add_more">Delete</button></a>
                                            </td>
                                            <!-- <td>
                                                <button type="button" class="btn btn-primary" travel_visit_attr_add_id="1" name="submit" value="travel_visit_add_more" id="travel_visit_add_more">Add More</button>
                                            </td> -->
                                        </tr>
                                        <?php } } ?>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                        <!-- <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Submit & Proceed</button>  -->
                        <!-- <a href="<?php //echo $module_booking_basic_info; ?>/add/<?php //echo $enquiry_id;?>/1"><button type="button" class="btn btn-warning" name="back_btn">Back</button></a> -->
                        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                    </div>
                </form>
                
                </div>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
<!-- tour expenses in that single and multiple click script-->
<script>
    function sub(){
    document.getElementById('sub_main_tour_div1').style.display = 'block';
    document.getElementById('expenses_head_div').style.display = 'none';
    document.getElementById('sub_expenses_head_div').style.display = 'none';
    }
    function main(){
    document.getElementById('sub_main_tour_div1').style.display = 'none';
    document.getElementById('expenses_head_div').style.display = 'block';
    document.getElementById('sub_expenses_head_div').style.display = 'block';
    document.getElementById('expense_type').value = "";
    document.getElementById('expense_category').value = "";
    }
</script>
<!-- tour expenses in that single and multiple click script-->

