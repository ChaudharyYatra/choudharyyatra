
<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    /* img{
        width:25% !important;
        height:25% !important;
    } */

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
        margin-top:30px;
    }

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
            <?php
            // Encrypt variables
            $encrypted_id = rtrim(base64_encode($id), '=');
            $encrypted_no_of_days = rtrim(base64_encode($no_of_days), '=');
            ?>
            <a href="<?php echo $day_to_day_program_module; ?>/take_days/<?php echo $encrypted_id; ?>/<?php echo $encrypted_no_of_days; ?>"><button class="btn btn-primary">Back</button></a>
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
                                <input readonly type="text" class="form-control" name="tour_number" id="tour_number" value="<?php if(!empty($tour_creation_info)){ echo $tour_creation_info['tour_number'];} ?> - <?php if(!empty($tour_creation_info)){ echo $tour_creation_info['tour_title'];} ?>">
                                <input type="hidden" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $tour_creation_info['id'];?>">
                            </div>
                        </div>
                        <?php } ?>

                        
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Total Ticket Cost</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_ticket_cost_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Total Munciple Tax</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_municipal_amt_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Parking Cost</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_parking_cost_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>State Permit Cost</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_state_permit_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Daily Tax</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $all_final_costing['total_daily_tax_final'];?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Per Person KM Rates</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $total_km_rate_per_person;?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Staff Salary</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $staff_day_salary;?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Grocery Cost Per Person</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $grocery_cost_per_person;?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Total Final Amount</label>
                                    <input readonly type="text" class="form-control" name="tour_creation_id" id="tour_creation_id" value="<?php echo $total_all_final_cost;?>">
                                </div>
                            </div>
                        

                        <?php foreach($add_more_day_to_day_program as $add_more_day_to_day_program_info){
                            if($add_more_day_to_day_program_info['meal_type'] == 'Breakfast'){ ?> 
                        <div class="col-md-6"></div>
                        <div class="col-md-12">
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
                                                <input readonly type="text" class="form-control quantity" name="activity_type[]" id="activity_type<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['activity_type'];?>">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="form-control quantity" name="meals_type[]" id="meals_type<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['meal_type'];?>">  
                                            </td>
                                            <td>
                                                <input readonly type="time" class="form-control quantity" name="start_time[]" id="start_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['start_time'];?>">
                                            </td>
                                            <td>
                                                <select class="form-control select2" disabled multiple="multiple" data-placeholder="Select food menu" name="breakfast_food_menu[]" id="breakfast_food_menu<?php echo $i;?>">
                                                    <option value="">Select Menu</option>

                                                    <?php
                                                        $title = explode(',',$add_more_day_to_day_program_info['food_menu']);
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
                                                <input readonly type="time" class="form-control quantity" name="end_time[]" id="end_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['end_time'];?>">
                                            </td>
                                            <input readonly type="hidden" class="form-control" name="start_point[]" id="start_point" value="">
                                            <input type="hidden" class="form-control" name="travel_distance[]" id="travel_distance">
                                            <input type="hidden" class="form-control" name="to_place[]" id="to_place">
                                            <input type="hidden" class="form-control" name="lunch_food_menu[]" id="lunch_food_menu" value="">
                                            <input type="hidden" class="form-control" name="dinner_food_menu[]" id="dinner_food_menu" value="">
                                            <!-- <input type="hidden" class="form-control" name="lunch_food_menu[]" id="lunch_food_menu" value="">
                                            <input type="hidden" class="form-control" name="dinner_food_menu[]" id="dinner_food_menu" value=""> -->
                                            <input type="hidden" class="form-control" name="start_district[]" id="start_district">
                                            <input type="hidden" class="form-control" name="end_district[]" id="end_district">
                                        </tr>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } } ?>

                        <div class="col-md-12">
                            <div class="form-group">
                                <table border="1" class="table table-bordered" id="table1">
                                    <colgroup>
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Activity Type</th>
                                            <th>Start district</th>
                                            <th>Start Place</th>
                                            <th>Start Time</th>
                                            <th>Distance</th>
                                            <th>End district</th>
                                            <th>End Place</th>
                                            <th>End Time</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach($add_more_day_to_day_program as $add_more_day_to_day_program_info){
                                            if($add_more_day_to_day_program_info['meal_type'] == 'after_breakfast'){ ?>
                                        <tr>
                                            <td>
                                                <!-- <select class="select_css" name="activity_type[]" id="activity_type">
                                                    <option value="">Select Activity Type</option> -->
                                                    <input readonly class="form-control" type="text" value="<?php echo $add_more_day_to_day_program_info['activity_type'];?>">
                                                <!-- </select> -->
                                            </td>
                                            <td>
                                                <select disabled class="select_css district" name="start_district[]" id="start_district" attr_district="district" required="required">
                                                    <option value="">Select </option>

                                                    <?php 
                                                        foreach ($district_data as $district_info) { 
                                                            ?>
                                                            <option value="<?php echo $district_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_district'])){if($district_info['id'] == $add_more_day_to_day_program_info['start_district']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['start_district_name'];?></option>
                                                        <?php } ?>

                                                    
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="select_css" name="start_point[]" id="start_point">
                                                    <option value="">Select start point</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <!-- <option value="<?php //echo $citywise_place_master_info['id'];?>"><?php //echo $citywise_place_master_info['place_name'];?></option> -->
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_place'])){if($citywise_place_master_info['id'] == $add_more_day_to_day_program_info['start_place']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['start_place_name'];?></option>
                                                        <?php } ?>
                                                </select>
                                            </td>
                                            <td><input disabled type="time" class="form-control quantity" name="start_time[]" id="start_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['start_time'];?>"></td>
                                            <td><input disabled type="text" class="form-control quantity" name="travel_distance[]" id="travel_distance<?php echo $i;?>"  value="<?php echo $add_more_day_to_day_program_info['distance'];?>"></td>
                                            <td>
                                                <select disabled class="select_css district" name="end_district[]" id="end_district" attr_district="end_district" required="required">
                                                    <option value="">Select </option>
                                                    <?php
                                                    foreach($district_data as $district_info){ 
                                                    ?>
                                                    <!-- <option value="<?php //echo $district_info['id'];?>"><?php //echo $district_info['district']; ?></option> -->
                                                    <option value="<?php echo $district_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_district'])){if($district_info['id'] == $add_more_day_to_day_program_info['start_district']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['end_district_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="select_css" name="to_place[]" id="to_place">
                                                    <option value="">Select To Place</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_place'])){if($citywise_place_master_info['id'] == $add_more_day_to_day_program_info['start_place']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['end_place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input disabled type="time" class="form-control quantity" name="end_time[]" id="end_time<?php echo $i;?>"  value="<?php echo $add_more_day_to_day_program_info['end_time'];?>"></td>
                                            <!-- <td>
                                                <button type="button" class="btn btn-primary" travel_attr_add_id="1" name="submit" value="travel_add_more" id="travel_add_more">Add More</button>
                                            </td> -->
                                            <input readonly type="hidden" class="form-control quantity" name="meals_type[]" id="meals_type" value="">  
                                            <!-- <input readonly type="hidden" class="form-control" name="food_menu[]" id="food_menu" value="">   -->
                                            <input type="hidden" class="form-control" name="lunch_food_menu[]" id="lunch_food_menu" value="">
                                            <input type="hidden" class="form-control" name="dinner_food_menu[]" id="dinner_food_menu" value="">
                                            <input type="hidden" class="form-control" name="breakfast_food_menu[]" id="breakfast_food_menu" value="">
                                            <?php } } ?>
                                        </tr>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php foreach($add_more_day_to_day_program as $add_more_day_to_day_program_info){
                            if($add_more_day_to_day_program_info['meal_type'] == 'Lunch'){ ?> 
                        <div class="col-md-12">
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
                                                <input readonly type="text" class="form-control quantity" name="activity_type[]" id="activity_type<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['activity_type'];?>">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="form-control quantity" name="meals_type[]" id="meals_type<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['meal_type'];?>">  
                                            </td>
                                            <td>
                                                <input readonly type="time" class="form-control quantity" name="start_time[]" id="start_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['start_time'];?>">
                                            </td>
                                            <td>
                                                <select disabled class="form-control select2" multiple="multiple" data-placeholder="Select food menu" name="lunch_food_menu[]" id="lunch_food_menu<?php echo $i;?>">
                                                    <option value="">Select Menu</option>
                                                    <?php
                                                        $title = explode(',',$add_more_day_to_day_program_info['food_menu']);
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
                                                <input readonly type="time" class="form-control quantity" name="end_time[]" id="end_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['end_time'];?>">
                                            </td>
                                            <input readonly type="hidden" class="form-control" name="start_point[]" id="start_point" value="">
                                            <input type="hidden" class="form-control" name="travel_distance[]" id="travel_distance">
                                            <input type="hidden" class="form-control" name="to_place[]" id="to_place">
                                            <input type="hidden" class="form-control" name="breakfast_food_menu[]" id="breakfast_food_menu" value="">
                                            <input type="hidden" class="form-control" name="dinner_food_menu[]" id="dinner_food_menu" value="">

                                            <input type="hidden" class="form-control" name="start_district[]" id="start_district">
                                            <input type="hidden" class="form-control" name="end_district[]" id="end_district">
                                        </tr>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } } ?>

                        <div class="col-md-12">
                            <div class="form-group">
                                <table border="1" class="table table-bordered" id="table2">
                                    <colgroup>
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Activity Type</th>
                                            <th>Start district</th>
                                            <th>Start Place</th>
                                            <th>Start Time</th>
                                            <th>Distance</th>
                                            <th>End district</th>
                                            <th>End Place</th>
                                            <th>End Time</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach($add_more_day_to_day_program as $add_more_day_to_day_program_info){
                                            if($add_more_day_to_day_program_info['meal_type'] == 'after_lunch'){ ?>
                                        <tr>
                                            <td>
                                            <input readonly class="form-control" type="text" value="<?php echo $add_more_day_to_day_program_info['activity_type'];?>">

                                            </td>
                                            <td>
                                                <select disabled class="select_css district" name="start_district[]" id="start_district" attr_district="district" required="required">
                                                    <option value="">Select </option>
                                                    <?php
                                                    foreach($district_data as $district_info){ 
                                                    ?>
                                                    <option value="<?php echo $district_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_district'])){if($district_info['id'] == $add_more_day_to_day_program_info['start_district']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['start_district_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="select_css" name="start_point[]" id="start_point" >
                                                    <option value="">Select start point</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_place'])){if($citywise_place_master_info['id'] == $add_more_day_to_day_program_info['start_place']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['start_place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input disabled type="time" class="form-control quantity" name="start_time[]" id="start_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['start_time'];?>"></td>
                                            <td><input disabled type="text" class="form-control quantity" name="travel_distance[]" id="travel_distance<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['distance'];?>"></td>
                                            <td>
                                                <select disabled class="select_css district" name="end_district[]" id="end_district" attr_district="end_district" required="required">
                                                    <option value="">Select </option>
                                                    <?php
                                                    foreach($district_data as $district_info){ 
                                                    ?>
                                                    <option value="<?php echo $district_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_district'])){if($district_info['id'] == $add_more_day_to_day_program_info['start_district']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['end_district_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="select_css" name="to_place[]" id="to_place">
                                                    <option value="">Select To Place</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_place'])){if($citywise_place_master_info['id'] == $add_more_day_to_day_program_info['start_place']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['end_place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input disabled type="time" class="form-control quantity" name="end_time[]" id="end_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['end_time'];?>"></td>
                                            <!-- <td>
                                                <button type="button" class="btn btn-primary" visit_attr_add_id="1" name="submit" value="visit_add_more" id="visit_add_more">Add More</button>
                                            </td> -->
                                            <input readonly type="hidden" class="form-control quantity" name="meals_type[]" id="meals_type" value="">  
                                            <!-- <input readonly type="hidden" class="form-control" name="food_menu[]" id="food_menu" value="">   -->
                                            <input type="hidden" class="form-control" name="lunch_food_menu[]" id="lunch_food_menu" value="">
                                            <input type="hidden" class="form-control" name="dinner_food_menu[]" id="dinner_food_menu" value="">
                                            <input type="hidden" class="form-control" name="breakfast_food_menu[]" id="breakfast_food_menu" value="">
                                        </tr>
                                        <?php } } ?>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <?php foreach($add_more_day_to_day_program as $add_more_day_to_day_program_info){
                            if($add_more_day_to_day_program_info['meal_type'] == 'Dinner'){ ?> 
                        <div class="col-md-12">
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
                                                <input readonly type="text" class="form-control quantity" name="activity_type[]" id="activity_type<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['activity_type'];?>">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="form-control quantity" name="meals_type[]" id="meals_type<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['meal_type'];?>">  
                                            </td>
                                            <td>
                                                <input readonly type="time" class="form-control quantity" name="start_time[]" id="start_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['start_time'];?>">
                                            </td>
                                            <td>
                                                <select disabled class="form-control select2" multiple="multiple" data-placeholder="Select food menu" name="dinner_food_menu[]" id="dinner_food_menu<?php echo $i;?>">
                                                    <option value="">Select Menu</option>
                                                    <?php
                                                        $title = explode(',',$add_more_day_to_day_program_info['food_menu']);
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
                                                <input readonly type="time" class="form-control quantity" name="end_time[]" id="end_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['end_time'];?>">
                                            </td>
                                            <input readonly type="hidden" class="form-control" name="start_point[]" id="start_point" value="">
                                            <input type="hidden" class="form-control" name="travel_distance[]" id="travel_distance">
                                            <input type="hidden" class="form-control" name="to_place[]" id="to_place">
                                            <input type="hidden" class="form-control" name="breakfast_food_menu[]" id="breakfast_food_menu" value="">
                                            <input type="hidden" class="form-control" name="lunch_food_menu[]" id="lunch_food_menu" value="">

                                            <input type="hidden" class="form-control" name="start_district[]" id="start_district">
                                            <input type="hidden" class="form-control" name="end_district[]" id="end_district">
                                        </tr>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } } ?>

                        <div class="col-md-12">
                            <div class="form-group">
                                <table border="1" class="table table-bordered" id="table3">
                                    <colgroup>
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 15%;">
                                        <col span="1" style="width: 20%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 15%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Activity Type</th>
                                            <th>Start district</th>
                                            <th>Start Place</th>
                                            <th>Start Time</th>
                                            <th>Distance</th>
                                            <th>End district</th>
                                            <th>End Place</th>
                                            <th>End Time</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach($add_more_day_to_day_program as $add_more_day_to_day_program_info){
                                            if($add_more_day_to_day_program_info['meal_type'] == 'after_dinner'){ ?>
                                        <tr>
                                            <td>
                                            <input readonly class="form-control" type="text" value="<?php echo $add_more_day_to_day_program_info['activity_type'];?>">

                                            </td>
                                            <td>
                                                <select disabled class="select_css district" name="start_district[]" id="start_district" attr_district="district" required="required">
                                                    <option value="">Select </option>
                                                    <?php
                                                    foreach($district_data as $district_info){ 
                                                    ?>
                                                    <option value="<?php echo $district_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_district'])){if($district_info['id'] == $add_more_day_to_day_program_info['start_district']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['start_district_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="select_css" name="start_point[]" id="start_point" >
                                                    <option value="">Select start point</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_place'])){if($citywise_place_master_info['id'] == $add_more_day_to_day_program_info['start_place']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['start_place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input disabled type="time" class="form-control quantity" name="start_time[]" id="start_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['start_time'];?>"></td>
                                            <td><input disabled type="text" class="form-control quantity" name="travel_distance[]" id="travel_distance<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['distance'];?>"></td>
                                            <td>
                                                <select disabled class="select_css district" name="end_district[]" id="end_district" attr_district="end_district" required="required">
                                                    <option value="">Select </option>
                                                    <?php
                                                    foreach($district_data as $district_info){ 
                                                    ?>
                                                    <option value="<?php echo $district_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_district'])){if($district_info['id'] == $add_more_day_to_day_program_info['start_district']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['end_district_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="select_css" name="to_place[]" id="to_place">
                                                    <option value="">Select To Place</option>
                                                    <?php foreach($citywise_place_master as $citywise_place_master_info){ ?> 
                                                        <option value="<?php echo $citywise_place_master_info['id'];?>" <?php if(isset($add_more_day_to_day_program_info['start_place'])){if($citywise_place_master_info['id'] == $add_more_day_to_day_program_info['start_place']) {echo 'selected';}}?>><?php echo $add_more_day_to_day_program_info['end_place_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input disabled type="time" class="form-control quantity" name="end_time[]" id="end_time<?php echo $i;?>" value="<?php echo $add_more_day_to_day_program_info['end_time'];?>"></td>
                                            <!-- <td>
                                                <button type="button" class="btn btn-primary" travel_visit_attr_add_id="1" name="submit" value="travel_visit_add_more" id="travel_visit_add_more">Add More</button>
                                            </td> -->
                                            <input readonly type="hidden" class="form-control quantity" name="meals_type[]" id="meals_type" value="">  
                                            <!-- <input readonly type="hidden" class="form-control" name="food_menu[]" id="food_menu" value="">  -->
                                            <input type="hidden" class="form-control" name="lunch_food_menu[]" id="lunch_food_menu" value="">
                                            <input type="hidden" class="form-control" name="dinner_food_menu[]" id="dinner_food_menu" value="">
                                            <input type="hidden" class="form-control" name="breakfast_food_menu[]" id="breakfast_food_menu" value=""> 
                                        </tr>
                                        <?php } } ?>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                        <a href="<?php //echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                    </div> -->
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
  


