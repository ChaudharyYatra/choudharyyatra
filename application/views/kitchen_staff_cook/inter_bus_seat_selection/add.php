<style>
    .card-bg{
        background-color: #F6F6F6;
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
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a> -->
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
              <form method="post" enctype="multipart/form-data" id="bus_seat_selection">
                <div class="card-body card-bg">
                  <div class="row">
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Seat Count</label>
                          <input type="text" class="form-control" name="seat_count" id="seat_count" placeholder="Enter seat count" value="<?php echo $booking_basic_info_data['seat_count']; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Select Tour</label>
                            <select class="select_css" name="tour_no" id="inter_tour_no">
                              <option value="">Select Tour</option>
                                <?php foreach($inter_packages_data_booking as $inter_packages_data_booking_value){ ?>  
                                  <option value="<?php echo $inter_packages_data_booking_value['id'];?>" <?php if($inter_packages_data_booking_value['id']==$inter_agent_booking_enquiry_data['package_id']){echo "selected";} ?>><?php echo $inter_packages_data_booking_value['tour_title'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Boarding Office Location</label>
                          <select class="select_css" name="boarding_office_location" id="inter_boarding_office_location">
                            <option value="">Select Boarding Office Location</option>
                              <?php foreach($boarding_office_location as $boarding_office_location_value){ ?> 
                                <option value="<?php echo $boarding_office_location_value['id'];?>"><?php echo $boarding_office_location_value['booking_center'];?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Select Tour Date</label>
                                <select class="select_css" name="tour_date" id="inter_tour_date">
                                  <option value="">Select Tour Date</option>
                                  <?php foreach($inter_add_journey_date as $inter_add_journey_date_value){ ?> 
                                      <option value="<?php echo $inter_add_journey_date_value['id'];?>"><?php echo $inter_add_journey_date_value['journey_date'];?></option>
                                  <?php } ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>hotel Type</label>
                              <select class="select_css" name="hotel_type" id="hotel_type">
                                <option value="">Select hotel type</option>
                                <?php foreach($hotel_type_info as $hotel_type_info_value){ ?> 
                                    <option value="<?php echo $hotel_type_info_value['id'];?>"><?php echo $hotel_type_info_value['hotel_type_name'];?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <!-- <div class="col-md-6">
                            <div class="form-group">
                              <label>hotel Type</label>
                              <input type="text" class="form-control" name="hotel_type" id="hotel_type" placeholder="Enter hotel type">
                            </div>
                          </div> -->

                          <?php
                          foreach($agent_booking_enquiry_data as $agent_booking_enquiry_data_info) 
                          { 
                            ?>
                            <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_booking_enquiry_data_info['id']; ?>">
                            <?php } ?>
                        </div>
                      </div>

                      <div class="form-group text-center">
                        <!-- <button type="submit" class="btn btn-success" name="check" value="check">check</button> -->
                      </div>


                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-3">
                          </div>
                          <div class="col-md-3">
                            <div class="form-group text-center">
                              <label>Seat Rates</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group text-center">
                              <label>Seat Counts</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group text-center">
                              <label>Costing</label>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group text-center">
                              <label>First Class</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="first_class_rate" id="first_class_rate" value="700" disabled>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="text" class="form-control inter_seatcount" name="first_class_count" id="first_class_count" onkeyup="firstclass() , totalamount_one()" placeholder="Enter seat count">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="number" class="form-control" name="first_class_costing" id="first_class_costing" readonly>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group text-center">
                              <label>Economy Class</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="economy_class_rate" id="economy_class_rate" value="500" disabled>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="text" class="form-control inter_seatcount" name="economy_class_count" id="economy_class_count" onkeyup="economyclass() ,totalamount_two()" placeholder="Enter seat count">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="number" class="form-control" name="economy_class_costing" id="economy_class_costing" readonly>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group text-center">
                              <label>General Class</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="general_class_rate" id="general_class_rate" value="400" disabled>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="text" class="form-control inter_seatcount" name="general_class_count" id="general_class_count" onkeyup="generalclass() ,totalamount_three()" placeholder="Enter seat count">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="number" class="form-control" name="general_class_costing" id="general_class_costing" readonly>
                            </div>
                          </div>

                          <div class="col-md-3">
                          </div>
                          <div class="col-md-3">
                          </div>
                          <div class="col-md-3">
                            <div class="form-group text-center">
                            <label>Total Costing</label>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input type="hidden" class="form-control" name="total_seatcount" id="total_seatcount" readonly>
                              <input type="number" class="form-control" name="total_costing" id="total_costing" readonly>
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                  <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now" id="booknow_submit">Book Now</button> 
                  <a href="<?php echo $module_inter_booking_enquiry; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
