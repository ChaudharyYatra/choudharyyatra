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
              <form method="post" enctype="multipart/form-data" id="add_hotel">
                <div class="card-body">
                 <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>State <span class="req_field">*</label>
                        <select class="select_css row_set1" name="state" id="state" required="required">
                        <option value="">select state</option>
                          <?php
                            foreach($state_data as $state_data_info){ 
                          ?>
                          <option value="<?php echo $state_data_info['id']; ?>"><?php echo $state_data_info['state_name']; ?></option>
                          <?php } ?>
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>City <span class="req_field">*</label>
                        <select class="select_css row_set1" name="city" id="city" required="required">
                          <option value="">select city</option>
                          
                        </select>
                      </div>
                    </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Hotel Name <span class="req_field">*</span></label>
                          <input type="text" class="form-control" name="hotel_name" id="hotel_name" placeholder="Enter Hotel Name"  oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mobile Number 1 <span class="req_field">*</span></label>
                          <input type="text" class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required" minlength="10" maxlength="10">
                        </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-group">
                              <label>Mobile Number 2 (Optional)</label>
                              <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10">
                            </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-group">
                              <label>Landline Number (Optional)</label>
                              <input type="text" class="form-control" name="landline" id="landline" placeholder="Enter 8 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" minlength="8" maxlength="8">
                            </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email Address <span class="req_field">*</span></label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" value="" required="required">
                          <span id="email_result"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Address <span class="req_field">*</span></label>
                          <textarea class="form-control" name="hotel_address" id="hotel_address" placeholder="Enter Supervision Name" required="required"></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Upload Photo 1 <span class="req_field">*</span></label><br>
                          <input type="file" name="image_name" id="image_name" required="required">
                          <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Upload Photo 2 (Optional)</label><br>
                          <input type="file" name="image_name2" id="image_name2">
                          <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Upload Photo 3 (Optional)</label><br>
                          <input type="file" name="image_name3" id="image_name3">
                          <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Password <span class="req_field">*</span></label>
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
                        <label>Confirm Password <span class="req_field">*</span></label>
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


<script>
  
  var password = document.getElementById("password"), 
  confirm_password = document.getElementById("confirm_pass");

  function validatePassword(){
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
