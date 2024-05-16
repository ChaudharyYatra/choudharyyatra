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
              <form method="post" enctype="multipart/form-data" id="add_bookingenquiry">
                <div class="card-body">
                 <div class="row">
					            <div class="col-md-6">
                        <div class="form-group">
                          <label>Title</label><br>
                          <select class="select_css" name="mrandmrs" id="mrandmrs">
                            <option value="">select Title</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>First name</label>
                          <input type="text" class="form-control" name="first_name" id="first_name" value="<?php if(!empty($visitor_data)){ echo $visitor_data['first_name'];} ?>" placeholder="Enter First Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Last name</label>
                          <input type="text" class="form-control" name="last_name" id="last_name" value="<?php if(!empty($visitor_data)){ echo $visitor_data['last_name'];} ?>" placeholder="Enter Last Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile number</label>
                                <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="<?php if(!empty($visitor_data)){ echo $visitor_data['mobile_number'];} ?>" placeholder="Enter Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
					            <div class="col-md-6">
                              <div class="form-group">
                                <label>Whatsapp Mobile number</label>
                                <input type="text" class="form-control" name="wp_mobile_number" id="wp_mobile_number" placeholder="Enter Whatsapp Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="email_address" id="email_address" value="<?php if(!empty($visitor_data)){ echo $visitor_data['email'];} ?>" placeholder="Enter Email Address" pattern="^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Gender </label> <br>
                                &nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="Male">&nbsp;&nbsp;Male
                                &nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="Female">&nbsp;&nbsp;Female <br>
                              </div>
                      </div>
                      <!-- <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour number</label>
                                <input type="text" class="form-control" name="tour_number" id="tour_number" placeholder="Enter Tour Number">
                              </div>
                      </div> -->
					 
					                  <div class="col-md-6">
                              <div class="form-group">
                                <label>Media source</label>
                                  <select class="form-control niceSelect" name="media_source_name" id="media_source_name" onfocus='this.size=3;' onblur='this.size=1;' 
                                        onchange='this.size=1; this.blur();'>
                                      <option value="">Select media source</option>
                                      <?php
                                        foreach($media_source_data as $media_source_info){ 
                                      ?>
                                        <option value="<?php echo $media_source_info['id']; ?>"><?php echo $media_source_info['media_source_name']; ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                            </div>
					 
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour number</label>
                                  <select class="form-control" name="tour_number" id="tour_number" onchange='CheckColors(this.value); 
                                  this.blur();' onfocus='this.size=6;' onblur='this.size=1;'>
                                    <option value="">Select tour title</option>
                                    <option value="Other">Other</option>
                                    <?php foreach($packages_data as $packages_data_value){ ?> 
                                        <option value="<?php echo $packages_data_value['id'];?>"><?php echo $packages_data_value['tour_number'];?> -  <?php echo $packages_data_value['tour_title'];?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                            </div>
					 
					 <div class="col-md-6" id="other_tour_name_div" style='display:none;'>
                              <div class="form-group">
                                <label>Enquiry destination name</label>
                                <input type="text" class="form-control" name="other_tour_name" id="other_tour_name" placeholder="Enter destination name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
					 <div class="col-md-6">
                        <div class="form-group">
                          <label>Enter Seat Count</label>
                          <input type="text" class="form-control" name="enq_seat_count" id="enq_seat_count" value="<?php if(!empty($visitor_data)){ echo $visitor_data['total_seat'];} ?>" placeholder="Enter seat count" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                      </div>
                      
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                  <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Submit & Proceed</button> 
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
