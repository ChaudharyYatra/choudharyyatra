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
              <?php
                   foreach($agent_department as $agent_department_info) 
                   { 
                     ?>
              
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="booking_basic_info">
                <div class="card-body card-bg">
                      <div class="col-md-12">
                        <div class="row">
                          <?php
                          foreach($agent_booking_enquiry_data as $agent_booking_enquiry_data_info) 
                          { 
                            ?>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Mr / Mrs</label><br>
                              <select class="select_css" name="mrandmrs" id="mrandmrs">
                                <option value="">select Mr / Mrs</option>
                                <option value="Mr" <?php if(isset($agent_booking_enquiry_data_info['MrandMrs'])){if("Mr" == $agent_booking_enquiry_data_info['MrandMrs']) {echo 'selected';}}?>>Mr</option>
                                <option value="Mrs" <?php if(isset($agent_booking_enquiry_data_info['MrandMrs'])){if("Mrs" == $agent_booking_enquiry_data_info['MrandMrs']) {echo 'selected';}}?>>Mrs</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Surname</label>
                              <input type="text" class="form-control" name="surname" id="surname" placeholder="Enter surname" value="<?php echo $agent_booking_enquiry_data_info['last_name']; ?>">
                              <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_booking_enquiry_data_info['id']; ?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>First Name</label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name" value="<?php echo $agent_booking_enquiry_data_info['first_name']; ?>">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Middle Name</label>
                              <input type="text" class="form-control" name="middle_name" id="Last_name" placeholder="Enter middle name">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <!-- <?php
                            //foreach($agent_data as $agent_data_info) 
                            //{ 
                          ?> -->
                      
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Mobile number</label>
                              <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                              value="<?php echo $agent_booking_enquiry_data_info['mobile_number']; ?>">
                            </div>
                          </div>

                          <div class="col-md-5">
                            <div class="form-group">
                              <label>Media source</label><br>
                                <select class="select_css" name="media_source_name" id="media_source_name">
                                    <?php
                                      foreach($media_source_data as $media_source_info){ 
                                    ?>
                                    <!-- <option value=""><?php //echo $media_source_info['media_source_name']; ?></option> -->
                                    
                                      <option value="<?php echo $media_source_info['id']; ?>"><?php echo $media_source_info['media_source_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Gender </label> <br>
                              &nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="Male" <?php if(isset($agent_booking_enquiry_data_info['gender'])){if("Male" == $agent_booking_enquiry_data_info['gender']) {echo 'checked';}}?>>&nbsp;&nbsp;Male
                              &nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="Female" <?php if(isset($agent_booking_enquiry_data_info['gender'])){if("Female" == $agent_booking_enquiry_data_info['gender']) {echo 'checked';}}?>>&nbsp;&nbsp;Female <br>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    <div class="row">
                      <?php
                        foreach($agent_data as $agent_data_info) 
                        { 
                      ?>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Booking Office</label>
                          <input type="text" class="form-control" name="booking_office" id="booking_office" placeholder="Enter booking office" value="<?php echo $agent_data_info['booking_center']; ?>">
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Regional Office</label>
                          <input type="text" class="form-control" name="regional_office" id="regional_office" placeholder="Enter Regional office" value="<?php echo $agent_department_info['department']; ?>">
                        </div>
                      </div>
                      <?php } ?>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Enter Seat Count</label>
                          <input type="text" class="form-control" name="seat_count" id="seat_count" placeholder="Enter seat count" value="<?php echo $agent_department_info['seat_count']; ?>">
                        </div>
                      </div>
                    </div>
                    
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                  <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Book Now</button> 
                  <a href="<?php echo $module_inter_booking_enquiry; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
  

</body>
</html>
