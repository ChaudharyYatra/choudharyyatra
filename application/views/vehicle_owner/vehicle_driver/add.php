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
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="add_vehicle_driver">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Driver Name</label>
                                <input type="text" class="form-control" name="driver_name" id="driver_name" placeholder="Enter Driver Name" required="required" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>

                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile Number 1</label>
                                <input type="text" class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                              </div>
                        </div>

                       <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile Number 2</label>
                                <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                              </div>
                        </div>

                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Years Of Experience</label>
                                <input type="text" class="form-control" name="year_experience" placeholder="Enter Year Experience" required="required">
                              </div>
                        </div>

                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Pan Card No.</label>
                                <input type="text" class="form-control" name="pancard_no" placeholder="Enter Pan Card No" required="required">
                              </div>
                        </div>

                        <div class="col-md-6">
                              <div class="form-group">
                                <label>GST No. (Optional)</label>
                                <input type="text" class="form-control" name="gst_no" placeholder="Enter GST No">
                              </div>
                        </div>
                      
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Marital status</label><br>
                                &nbsp;&nbsp;<input type="radio" name="marital_status" id="marital_status" value="Married">&nbsp;&nbsp;Married
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="marital_status" id="marital_status" value="Unmarried">&nbsp;&nbsp;Unmarried <br>
                              </div>
                      </div>

                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Licence Type</label><br>
                                  <input type="checkbox" class="" name="licence_type[]" id="licence_type" value="Permanent Driving License">&nbsp;&nbsp;Permanent Driving License
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Licence Type</label><br>
                                    <input type="checkbox" name="licence_type[]" id="licence_type" value="Commercial Driving License">&nbsp;&nbsp; Commercial Driving License
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Licence Valid Date</label>
                                <input type="date" class="form-control" name="licence_valid_date" placeholder="Enter License valid Date" required="required">
                              </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload licence Image(front)</label><br>
                            <input type="file" name="licence_image_front" id="licence_image_front" required="required" accept="image/png, image/jpg, image/jpeg, image/pdf">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload licence Image(back)</label><br>
                            <input type="file" name="licence_image_back" id="licence_image_back" required="required" accept="image/png, image/jpg, image/jpeg, image/pdf">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Aadhaar Image(front)</label><br>
                            <input type="file" name="aadhaar_image_front" id="aadhaar_image_front" required="required" accept="image/png, image/jpg, image/jpeg, image/pdf">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Aadhaar Image(back)</label><br>
                            <input type="file" name="aadhaar_image_back" id="aadhaar_image_back" required="required" accept="image/png, image/jpg, image/jpeg, image/pdf">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Profile Image</label><br>
                            <input type="file" name="profile_image" id="profile_image" required="required" accept="image/png, image/jpg, image/jpeg, image/pdf">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                            <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter Address"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <label>Password</label>
                            <div class="form-group input-group">
                            
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password"></span>
                                </div>
                            </div> 
                            </div>
                        </div>
                         <div class="col-md-6">
                            <label>Confirm Password</label>
                                <div class="form-group input-group">
                                
                                <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="Enter Confirm Password" value="" required="required">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password2"></span>
                                    </div>
                                </div>
                                </div>
                        </div>

              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
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
  

  <script>
  
  var password = document.getElementById("password"), 
  confirm_password = document.getElementById("confirm_pass");

  function validatePassword(){
    // alert('hiiiiiiiiii')
    if(password.value != confirm_pass.value) {
      confirm_pass.setCustomValidity("New password & confirm pasword Don't Match");
    } else {
      confirm_pass.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_pass.onkeyup = validatePassword;

</script>

<!-- Eye Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>

<script>
$("body").on('click', '.toggle-password2', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#confirm_pass");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>
  

</body>
</html>
