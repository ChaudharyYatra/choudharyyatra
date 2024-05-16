<style>
  .mealplan_css{
            border: 1px solid red !important;
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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
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
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="custom_add_bookingenquiry">
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Full Name</label><br>
                          <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter full name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" pattern="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$">
                        </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile number </label>
                                <input type="text"  class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter mobile number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
					            <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile number(optional)</label>
                                <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter mobile number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour number</label>
                                  <select class="form-control niceSelect" name="tour_number" id="tour_number" onchange='tour_title(this.value); 
                                  this.blur();' onfocus='this.size=6;' onblur='this.size=1;'>
                                    <option value="">Select tour title</option>
                                    <option value="Other">Other</option>
                                    <?php foreach($packages_data as $packages_data_value){ ?> 
                                        <option value="<?php echo $packages_data_value['id'];?>"><?php echo $packages_data_value['tour_number'];?> -  <?php echo $packages_data_value['tour_title'];?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                      </div>
                      <div class="col-md-6" id="other_tour_div" style='display:none;'>
                              <div class="form-group">
                                <label>Enquiry destination name</label>
                                <input type="text" class="form-control mealplan_css" name="other_tour" id="other_tour" placeholder="Enter destination name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Checkin Date</label>
                                <input type="text" class="form-control checkin_date" autocomplete="off" placeholder="" name="checkin_date" id="checkin_date">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Checkout Date</label>
                                <input type="text" class="form-control checkout_date" autocomplete="off" placeholder="" name="checkout_date" id="checkout_date">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>No Of Nights</label>
                                <input type="text" class="form-control no_of_nights" name="no_of_nights" id="no_of_nights">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Hotel Type</label><br>
                                            <input type="checkbox" class="selectall" name="hotel_type[]" id="hotel_type" value="All Hotels">&nbsp;&nbsp;All Hotels
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="2 STAR">&nbsp;&nbsp; 2 STAR
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="3 STAR">&nbsp;&nbsp; 3 STAR
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="4 STAR">&nbsp;&nbsp; 4 STAR
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="5 STAR">&nbsp;&nbsp; 5 STAR <br>
                                            <input type="checkbox" name="hotel_type[]" id="hotel_type" value="HOMESTAYS WITHOUT POOL">&nbsp;&nbsp;HOMESTAYS WITHOUT POOL
                                &nbsp;&nbsp;<input type="checkbox" name="hotel_type[]" id="hotel_type" value="BEACH PROPERTIES">&nbsp;&nbsp; BEACH PROPERTIES<br>
                                            <input type="checkbox" name="hotel_type[]" id="hotel_type" value="DELUXE COTTAGES">&nbsp;&nbsp;DELUXE COTTAGES<br>
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>No Of Couple </label> <br>
                                <input type="text" class="form-control" name="no_of_couple" id="no_of_couple" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
                      
					 
					                  <div class="col-md-6">
                              <div class="form-group">
                                <label>Meal Plan</label>
                                  <select class="form-control niceSelect" name="meal_plan" id="meal_plan" onchange='Mealplan(this.value); 
                                  this.blur();' onfocus='this.size=6;' onblur='this.size=1;'>
                                      <option value="">Select Meal Plan</option>
                                      <option value="Other">Other</option>
                                      <?php foreach($meal_plan as $meal_plan_info){ ?> 
                                          <option value="<?php echo $meal_plan_info['id'];?>"><?php echo $meal_plan_info['meal_plan_name'];?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-6" id="other_meal_plan_div" style='display:none;'>
                                <div class="form-group">
                                    <label>Other Meal Plan Name</label>
                                    <input type="text" class="form-control mealplan_css" name="meal_plan_name" id="meal_plan_name" placeholder="Enter meal plan name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>


                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Total Adult</label>
                                <input type="text" class="form-control" name="total_adult" id="total_adult" placeholder="">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Total Child With Bed</label>
                                <input type="text" class="form-control" name="total_child_with_bed" id="total_child_with_bed" placeholder="">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Total Child Without Bed</label>
                                <input type="text" class="form-control" name="total_child_without_bed" id="total_child_without_bed" placeholder="">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Select Vehicle Type</label>
                                <select class="form-control niceSelect" name="vehicle_type" id="vehicle_type" onchange='Vehicle(this.value); 
                                                            this.blur();' onfocus='this.size=3;' onblur='this.size=1;' 
                                        >
                                    <option value="">Select vehicle type</option>
                                    <option value="Other">Other</option>
                                    <?php foreach($vehicle_type as $vehicle_type_info){ ?> 
                                        <option value="<?php echo $vehicle_type_info['id'];?>"><?php echo $vehicle_type_info['vehicle_type_name'];?></option>
                                    <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6" id="other_vehicle_type_div" style='display:none;'>
                                <div class="form-group">
                                    <label>Other Vehicle Name</label>
                                    <input type="text" class="form-control mealplan_css" name="other_vehicle_name" id="other_vehicle_name" placeholder="Enter vehicle name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Pick Up From</label>
                                <select class="form-control niceSelect" name="pick_up_from" id="pick_up_from" onchange='Pickupfrom(this.value); 
                                                            this.blur();' onfocus='this.size=3;' onblur='this.size=1;' 
                                        >
                                  <option value="">Select Pick Up From</option>
                                  <option value="Other">Other</option>
                                  <?php foreach($pick_up_from as $pick_up_from_info){ ?> 
                                      <option value="<?php echo $pick_up_from_info['id'];?>"><?php echo $pick_up_from_info['pick_up_name'];?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6" id="other_pickup_from_div" style='display:none;'>
                                <div class="form-group">
                                    <label>Other Pick Up From Name</label>
                                    <input type="text" class="form-control mealplan_css" name="other_pickup_from_name" id="other_pickup_from_name" placeholder="Enter Pick Up name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>


                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Pickup Allo. Date</label>
                                <input type="date" class="form-control" name="pickup_date" id="pickup_date" min="<?php echo date("Y-m-d"); ?>">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Pick Up Time</label>
                                <input type="time" class="form-control" name="pickup_time" id="pickup_time">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Drop to</label>
                                <select class="form-control niceSelect" name="drop_to" id="drop_to" onchange='dropto(this.value); 
                                                            this.blur();' onfocus='this.size=3;' onblur='this.size=1;' 
                                        >
                                    <option value="">Select Drop To</option>
                                    <option value="Other">Other</option>
                                    <?php foreach($drop_to as $drop_to_info){ ?> 
                                        <option value="<?php echo $drop_to_info['id'];?>"><?php echo $drop_to_info['drop_to_name'];?></option>
                                    <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6" id="other_dropto_div" style='display:none;'>
                                <div class="form-group">
                                    <label>Other Drop To Name</label>
                                    <input type="text" class="form-control mealplan_css" name="other_drop_to_name" id="other_drop_to_name" placeholder="Enter Drop To Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Drop Allocation Date</label>
                                <input type="date" class="form-control" name="drop_date" id="drop_date" min="<?php echo date("Y-m-d"); ?>">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Drop Time</label>
                                <input type="time" class="form-control" name="drop_time" id="drop_time">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Describe Your Visit Places & Special Notes</label>
                                <textarea type="text" class="form-control" name="special_note" id="special_note" placeholder="Enter Special Note"></textarea>
                              </div>
                            </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                  <!-- <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Submit & Proceed</button>  -->
                  <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
