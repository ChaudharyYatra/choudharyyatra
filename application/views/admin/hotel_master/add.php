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
              
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                    <div class="row"> 
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="hotel_name" id="hotel_name" placeholder="Enter Name" required="required">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="hotel_location" id="hotel_location" placeholder="Enter Location" required="required">
                          </div>
                        </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mobile Number</label>
                          <input type="text" class="form-control" name="hotel_mobile_number" id="hotel_mobile_number" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mobile Number 2</label>
                          <input type="text" class="form-control" name="hotel_mobile_number" id="hotel_mobile_number2" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Landline Number</label>
                          <input type="text" class="form-control" name="hotel_landline_number" id="hotel_landline_number" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Landline Number 2</label>
                          <input type="text" class="form-control" name="hotel_landline_number" id="hotel_landline_number2" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Contact person</label>
                          <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Enter Contact Person Name" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email Address</label>
                          <input type="text" class="form-control" name="hotel_email_address" id="hotel_email_address" placeholder="Enter Address" required="required">
                        </div>
                      </div>
                      <div class="col-md-3">
                          <label>Type</label>
                          <div class="form-group">
                            &nbsp;<input type="radio" id="h_type" name="h_type" value="Hotel" required>&nbsp; Hotel 
                            &nbsp;&nbsp;&nbsp;<input type="radio" id="h_type" name="h_bus_type" value="Dharmashala" required>&nbsp; Dharmashala 
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label>Facility</label>
                        <div class="form-group">
                          &nbsp;<input type="checkbox" id="facility_ac" name="facility_ac" value="AC">&nbsp; AC
                          &nbsp;&nbsp;&nbsp;<input type="checkbox" id="facility_non_ac" name="facility_non_ac" value="Non-AC">&nbsp; Non-AC
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label>Payment Mode</label>
                        <div class="form-group"> 
                          &nbsp;<input type="checkbox" id="payment_mode_online" name="payment_mode_online" value="Online">&nbsp; Online
                          &nbsp;&nbsp;&nbsp;<input type="checkbox" id="payment_mode_cash" name="payment_mode_cash" value="Cash">&nbsp; Cash
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label>Class</label>
                        <div class="form-group"> 
                          &nbsp;<input type="radio" id="class_e" name="class_e" value="Economic" required>&nbsp; Economic 
                          &nbsp;&nbsp;&nbsp;<input type="radio" id="class_s" name="class_s" value="Standard" required>&nbsp; Standard 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label>Select State</label>
                        <div class="form-group"> 
                          <select name="state" id="state">
                            <option value="">Select State</option>
                            <option value="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <label>Select City</label>
                        <div class="form-group"> 
                          <select name="city" id="city">
                            <option value="">Select City</option>
                            <option value="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Address</label>
                        <div class="form-group"> 
                          <textarea class="form-control" name="hotel_address" id="hotel_address" placeholder="Enter Hotel Address" required="required"></textarea>
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <label>Upload Photo</label>
                        <div class="form-group">
                          <input type="file" name="hotel_photo" id="hotel_photo" placeholder="Upload Photo" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Password</label>
                        <div class="form-group">
                          <input type="text" class="form-control" name="hotel_password" id="hotel_password" placeholder="Enter Password" required="required">
                        </div>
                      </div>
                   
                 

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
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
