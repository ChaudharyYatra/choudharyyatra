<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    .btn_follow{padding: 2px 8px;}
    
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

              <div class="col-md-12">
              
                <form method="post" enctype="multipart/form-data" id="bus_seat_selection">
                <input type="hidden" class="form-control" name="is_main_page" id="is_main_page" value="no">
                <input type="hidden" class="form-control" name="btn_disabled" id="btn_disabled" value="<?php echo $p;?>">
                <input type="hidden" class="form-control" name="enquiry_seat_count" id="enquiry_seat_count" value="<?php echo $agent_booking_enquiry_data['seat_count'];?>">
                <input type="hidden" class="form-control" name="new_pack_id" id="new_pack_id" value="<?php print_r($new_pack_id);?>">
                <input type="hidden" class="form-control" name="new_pack_date_id" id="new_pack_date_id" value="<?php echo $new_pack_date_id;?>">
                <input type="hidden" id="bdata" value='<?php print_r($bus_info); ?>'>
                    

                      <input type="hidden" id="booked_data" value='<?php print_r($final_booked_data); ?>'>
                      <script>
                      var booked_data=<?php echo json_encode($final_booked_data);?>;
                    </script> 
                         
                         <input type="hidden" id="temp_booked_data" value='<?php print_r($temp_booking_data); ?>'>
                    <script>
                      var temp_booked_data=<?php echo json_encode($temp_booking_data);?>;
                    </script> 
              </div> 

                <div class="card-body card-bg">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">

                        <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_booking_enquiry_data['id']; ?>">
                        <!-- <?php //} ?> -->
                        <div class="col-md-1">
                          <div class="form-group">
                          
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Select Tour</label>
                            
                            <select class="select_css" name="pack_id" id="pack_id">
                              <option value="">Select Tour</option>
                                <?php foreach($packages_data_booking as $packages_data_booking){ ?>  

                                  <?php if(count($tour_no_title) == 1){ ?>
                                    <?php foreach($tour_no_title as $tour_no_title_info){ ?>
                                    <option value="<?php echo $packages_data_booking['package_id'];?>" <?php if($packages_data_booking['package_id']==$tour_no_title_info['package_id']){
                                    echo "selected";} ?>><?php echo $packages_data_booking['tour_title'];?></option>
                                    <?php } ?>
                                  <?php } else{?>
                                    <option value="<?php echo $packages_data_booking['package_id'];?>" <?php if($packages_data_booking['package_id']==$new_pack_id){
                                    echo "selected";} ?>><?php echo $packages_data_booking['tour_title'];?></option>
                                  <?php } ?>

                                <?php } ?>
                            </select>

                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Select Date</label>
                              <select class="select_css" name="pack_date_id" id="pack_date_id">
                                <option value="">Select Date</option>
                              </select>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <button type="submit" class="btn btn-success mt-4" name="submit" value="Search" id="search" style="margin-top: 24% !important;">Search </button> 
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                          
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <a href="<?php echo $module_booking_enquiry; ?>/add/<?php echo $agent_booking_enquiry_data['id']; ?>"><button type="button" class="btn btn-warning mt-4" id="booking_back" >Back</button></a>
                            <a href="<?php echo $module_booking_enquiry; ?>/index"><button type="button" class="btn btn-danger mt-4" >Cancel</button></a>
                            <button type="button" id="booking_start" class="btn btn-primary btn-md mt-4" class="dropdown-item"><a style="color: #fff;text-decoration: none;" href="<?php echo $module_url_path_booking_basic_info;?>/add/<?php echo $agent_booking_enquiry_data['id']; ?>">Booking</a></button>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <!-- <div class="grid-50">
                  <div id="seat-map">
                      <div class="front-indicator">Bus Seat Reservation</div>
                      <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">From Front Row</h4>
                      <div id="bus-seat-map" class="no_click"></div>
                      <h4 class="text-muted fw-bold text-center" style="padding-left:3em; margin:.5em">End of Seat Row</h4>
                  </div>
              </div> -->

              <div class="grid-50">
                  <div id="seat-map">
                      <div class="front-indicator">Bus Seat Reservation</div>

                      <!-- <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_all_travaller_info['domestic_enquiry_id']; ?>"> -->
                      <input type="hidden" class="form-control" name="is_main_page" id="is_main_page" value="yes">
                      
                     
                      
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

                    <input type="hidden" id="temp_hold_data" value='<?php print_r($temp_booking_data_id); ?>'>
                    <script>
                      var temp_booking_data_id=<?php echo json_encode($temp_booking_data_id);?>;
                    </script>

                    <input type="hidden" id="admin_hold_data" value='<?php print_r($admin_hold_data); ?>'>
                    <script>
                      var admin_hold_data=<?php echo json_encode($admin_hold_data);?>;
                    </script>

                    
                          <h2>Booking Details</h2>

                          <h3> Selected Seats (<span id="counter">0</span>):</h3>
                          <ul id="selected-seats"></ul>

                          <h2 id="total_amt">Total: <b>Rs. <span id="total">0</span>/-</b></h2>

                          <!-- <button type="button" id="hold_button">Hold Seats</button> -->

                      </form>

                      <div id="legend"></div>
                        <button id="reset-btn" type="button">Reset Bus Seat</button>
                      </div>
                  </div>
                </div>

            </div>
            
             
      </div>
      </div>














      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
