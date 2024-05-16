<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    .btn_follow{padding: 2px 8px;};
</style>
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/bus_seat_design/css/jquery.seat-charts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bus_seat_design/css/style.css">

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

              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php $this->load->view('agent/layout/agent_alert'); ?>
        <div class="card card-primary">
              <div class="card-header">
                <?php foreach($tour_no_title as $tour_no_title_value) 
                   {  ?>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-3">
                            Customer Name -
                          </div>
                          <div class="col-md-3">
                            <?php echo $tour_no_title_value['first_name']; ?> <?php echo $tour_no_title_value['last_name']; ?>
                          </div>
                          <div class="col-md-3">
                            Total Travellers Count -
                          </div>
                          <div class="col-md-3">
                            <?php echo $tour_no_title_value['seat_count']; ?>
                          </div>

                          <div class="col-md-3">
                            Mobile No -
                          </div>
                          <div class="col-md-3">
                            <?php echo $tour_no_title_value['mobile_number']; ?>
                          </div>

                        </div>
                      </div>
                    </div>
                <?php } ?>
              </div>

      <div class="wrapper">
        <div class="container">
            <div class="row">
              <div class="grid-50">
                  <div id="seat-map">
                      <div class="front-indicator">Bus Seat Reservation</div>

                      <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_all_travaller_info['domestic_enquiry_id']; ?>">
                      <input type="hidden" class="form-control" name="is_main_page" id="is_main_page" value="yes">
                      
                      <?php foreach($traveller_booking_info as $traveller_booking_info_value) 
                        { 
                          ?>
                      <input type="hidden" class="form-control" name="total_seat_count" id="total_seat_count" value="<?php echo $agent_all_travaller_info['seat_count']; ?>">
                      <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $traveller_booking_info_value['tour_no']; ?>">
                      <input type="hidden" class="form-control" name="tour_dates" id="tour_dates" value="<?php echo $traveller_booking_info_value['tour_date']; ?>">
                      <?php }  ?>
                      
                      <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">From Front Row</h4>
                      <div id="bus-seat-map"></div>
                      <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">End of Seat Row</h4>
                  </div>
              </div>
                <div class="grid-50">
                  <div class="booking-details">

                      <form action="" method="post">
                      <input type="hidden" id="bdata" value='<?php print_r($bus_info); ?>'>
                   

                      <input type="hidden" id="booked_data" value='<?php print_r($final_booked_data); ?>'>
                      <script>
                      var booked_data=<?php echo json_encode($final_booked_data);?>;
                    </script> 

                  <input type="hidden" id="temp_booked_data" value='<?php print_r($temp_booking_data); ?>'>
                    <script>
                      var temp_booked_data=<?php echo json_encode($temp_booking_data);?>;
                    </script> 

                    <input type="hidden" id="cart_temp_booking_data" value='<?php print_r($cart_temp_booking_data); ?>'>
                    <script>
                      var cart_temp_booking_data=<?php echo json_encode($cart_temp_booking_data);?>;
                    </script> 

                    <input type="hidden" id="temp_hold_data" value='<?php print_r($temp_hold_data); ?>'>
                    <script>
                      var temp_hold_data=<?php echo json_encode($temp_hold_data);?>;
                    </script> 
                          <h2>Booking Details</h2>

                          <h3> Selected Seats (<span id="counter">0</span>):</h3>
                          <ul id="selected-seats"></ul>

                          <h2 id="total_amt">Total: <b>Rs. <span id="total">0</span>/-</b></h2>

                          <button type="button" id="hold_button">Hold Seats</button>

                      </form>

                      <div id="legend"></div>
                        <button id="reset-btn" type="button">Reset Bus Seat</button>
                      </div>
                  </div>
                </div>
              </div>
              <?php $enquiry_id =
                  $agent_all_travaller_info['domestic_enquiry_id']; ?>
                                            
                        <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_all_travaller_info[
                            'domestic_enquiry_id'
                        ]; ?>">
                        <input type="hidden" class="form-control" name="window_charges" id="window_charges" value="500">
              <div class="card-footer">
                <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button> -->
                <button type="button" class="btn btn-success booknow_submit" name="booknow_submit" value="Book Now" id="booknow_submit">Submit & Proceed</button> 
                <a href="<?php echo $module_url_path; ?>/add/<?php echo $enquiry_id; ?>/1"><button type="button" class="btn btn-warning submit_back" name="back_btn" id="submit_back">Back</button></a>
                <a href="<?php echo $module_url_booking_process; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
              </div>
    </div>














      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
