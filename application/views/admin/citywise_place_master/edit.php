<style>
  .if_ticket_yes_div {
      display: none; /* Hide the div by default */
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
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="add_citywise_place_master">
                <div class="card-body">
                  
                  <div class="row"> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Select District</label>
                        <select class="select_css" name="select_district" id="select_district" required="required">
                        <option value="">Select </option>
                              <?php
                                foreach($district_table as $district_table_info) 
                                { 
                              ?>
                          <option value="<?php echo $district_table_info['id'];?>" <?php if(isset($info['select_district'])){if($district_table_info['id'] == $info['select_district']) {echo 'selected';}}?>><?php echo $district_table_info['district'];?></option>
                              <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Approximate Hall Rate</label>
                        <input type="text" class="form-control" name="approximate_hall_rate" id="approximate_hall_rate" value="<?php echo $info['approximate_hall_rate']; ?>" placeholder="Enter enter amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Separate Room Rate</label>
                        <input type="text" class="form-control" name="separate_room_rate" id="separate_room_rate" value="<?php echo $info['separate_room_rate']; ?>" placeholder="Enter enter amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Dharmshala Rate</label>
                        <input type="text" class="form-control" name="dharmshala_rate" id="dharmshala_rate" value="<?php echo $info['dharmshala_rate']; ?>" placeholder="Enter enter amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>State Tax</label>
                        <input type="text" class="form-control" name="state_tax" id="state_tax" value="<?php echo $info['state_tax']; ?>" placeholder="Enter tax amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      
                    </div>

                  </div>

                  <hr>

                  <div class="row" id="main_row"> 

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Place Name</label>
                        <input type="text" class="form-control" name="Place_name[]" id="Place_name" value="<?php echo $info['place_name']; ?>" placeholder="Enter Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Opening Time</label>
                        <input type="time" class="form-control" name="opening_time[]" id="opening_time" value="<?php echo $info['opening_time']; ?>" placeholder="Enter opening time" required="required">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Closing Time</label>
                        <input type="time" class="form-control" name="closing_time[]" id="closing_time" value="<?php echo $info['closing_time']; ?>" placeholder="Enter closing time" required="required">
                      </div>
                    </div>
                      
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Open Days</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select Days" style="width: 100%;" name="open_days[]" id="open_days" required="required">
                          <?php
                            $title = explode(',',$info['open_days']);
                            $c=count($title);
                              foreach($arr_data as $arr_info) 
                              { 
                                  for($i=0; $i<$c; $i++){
                                      $tid= $title[$i];
                                  }
                          ?>
                            <option value="1" <?php if(in_array('1', $title)) { echo "selected"; } ?>>Sunday</option>
                            <option value="2" <?php if(in_array('2', $title)) { echo "selected"; } ?>>Monday</option>
                            <option value="3" <?php if(in_array('3', $title)) { echo "selected"; } ?>>Tuesday</option>
                            <option value="4" <?php if(in_array('4', $title)) { echo "selected"; } ?>>Wednesday</option>
                            <option value="5" <?php if(in_array('5', $title)) { echo "selected"; } ?>>Thursday</option>
                            <option value="6" <?php if(in_array('6', $title)) { echo "selected"; } ?>>Friday</option>
                            <option value="7" <?php if(in_array('7', $title)) { echo "selected"; } ?>>Saturday</option>
                          <?php  } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Required Time will it take to see this place</label>
                        <input type="text" class="form-control" name="req_time[]" id="req_time" value="<?php echo $info['req_time']; ?>" placeholder="Enter time" required="required">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label>Is It Entry Ticket Cost </span></label>
                      <div class="form-group">
                          <input type="radio" id="Yes" name="ticket_yes_no[]" value="Yes" <?php if(isset($info['ticket_yes_no'])){if("Yes"==$info['ticket_yes_no']){echo "checked";}} ?>> &nbsp;
                          <label>Yes</label>  &nbsp; &nbsp; 
                          <input type="radio" id="No" name="ticket_yes_no[]" value="No" <?php if(isset($info['ticket_yes_no'])){if("No"==$info['ticket_yes_no']){echo "checked";}} ?>> &nbsp;
                          <label>No</label><br>
                      </div>
                    </div>
                    <?php if($info['ticket_yes_no'] == 'Yes') { ?>
                    <div class="col-md-4 if_ticket_yes_div">
                      <div class="form-group">
                          <label>Enter Ticket Cost </span></label>
                          <input type="text" class="form-control if_ticket_yes_no" name="ticket_cost[]" id="ticket_cost" value="<?php echo $info['ticket_cost']; ?>" placeholder="Enter cost" required="required" />
                      </div>
                    </div>
                    <?php } else { ?>

                    <div class="col-md-4 if_ticket_yes_div">
                        <div class="form-group">
                            <label>Enter Ticket Cost</label>
                            <input type="text" class="form-control if_ticket_yes_no" name="ticket_cost[]" id="ticket_cost" value="<?php echo $info['ticket_cost']; ?>" placeholder="Enter cost" required="required" />
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Allowed Vehicle Types</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select Vehicle Types" style="width: 100%;" name="allow_vehicle_types[]" id="allow_vehicle_types" required="required">
                            <option value="">Select types</option>
                            <?php
                              $title = explode(',',$info['allow_vehicle_types']);
                              $c=count($title);
                                foreach($vehicle_type as $vehicle_type_info) 
                                { 
                                    for($i=0; $i<$c; $i++){
                                        $tid= $title[$i];
                                    }
                              ?>
                                <option value="<?php echo $vehicle_type_info['id']; ?>" <?php if(in_array($vehicle_type_info['id'], $title)) { echo "selected"; } ?>><?php echo $vehicle_type_info['vehicle_type_name']; ?></option>
                            <?php  } ?>

                          </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Enter Nearest Railway Station Name</label>
                        <input type="text" class="form-control" name="railway_station_name[]" id="railway_station_name" value="<?php echo $info['railway_station_name']; ?>" placeholder="Enter Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                  </div>
                 

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-success" name="add_more" value="add_more_place" id="add_more_place">Add More Place</button>
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
              </form>
              <?php } ?>
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
 
  <script>
    // Get the radio buttons and the div to show/hide
    var yesRadio = document.getElementById('Yes');
    var noRadio = document.getElementById('No');
    var ticketCostInput = document.getElementById('ticket_cost');
    var ticketCostDiv = document.querySelector('.if_ticket_yes_div');

    // Add event listeners to the radio buttons
    yesRadio.addEventListener('change', function () {
        ticketCostDiv.style.display = this.checked ? 'block' : 'none';
    });

    noRadio.addEventListener('change', function () {
        ticketCostDiv.style.display = this.checked ? 'none' : 'block';
        ticketCostInput.value = ''; // Clear the value when "No" is selected
    });

    // Set the initial display based on the default checked radio button
    ticketCostDiv.style.display = yesRadio.checked ? 'block' : 'none';
</script>