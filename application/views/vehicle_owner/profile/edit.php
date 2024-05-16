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
            <!-- <ol class="breadcrumb float-sm-right">
              <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
            </ol> -->
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
            <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
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
              <form method="post" enctype="multipart/form-data" id="edit_vehicle_owner">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                            <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="vehicle_owner_name" id="vehicle_owner_name" placeholder="Enter vehicle owner Name" value="<?php echo $info['vehicle_owner_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                            </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile Number 1</label>
                                <input type="text" class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter 10 Digits Mobile Number" value="<?php echo $info['mobile_number1']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                              </div>
                        </div>
                       <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile Number 2</label>
                                <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter 10 Digits Mobile Number" value="<?php echo $info['mobile_number2']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" required="required" value="<?php echo $info['email']; ?>">
								                <span id="email_result"></span>
                              </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Aadhar Card(Front Photo)</label><br>
                            <input type="file" name="aadhar_front_image" id="aadhar_front_image">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>
                      
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Uploaded Image</label><br>
                                <?php if(!empty($info['aadhar_front_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_owner_aadhar_img/<?php echo $info['aadhar_front_image']; ?>" width="50%">
                                        <input type="hidden" name="old_aadhar_front_image" id="old_aadhar_front_image" value="<?php echo $info['aadhar_front_image']; ?>">
                                        <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Aadhar Card(Back Photo)</label><br>
                            <input type="file" name="aadhar_back_image" id="aadhar_back_image">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>
                      
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Uploaded Image</label><br>
                                <?php if(!empty($info['aadhar_back_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_owner_aadhar_img/<?php echo $info['aadhar_back_image']; ?>" width="50%">
                                        <input type="hidden" name="old_aadhar_back_image" id="old_aadhar_back_image" value="<?php echo $info['aadhar_back_image']; ?>">
                                        <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Profile Photo</label><br>
                            <input type="file" name="image_name" id="image_name">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>
                      
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Uploaded Image</label><br>
                                <?php if(!empty($info['profile_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_owner_profile/<?php echo $info['profile_image']; ?>" width="50%">
                                        <input type="hidden" name="old_image_name" id="old_image_name" value="<?php echo $info['profile_image']; ?>">
                                        <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Home Address</label>
                                <textarea class="form-control" name="home_address" id="home_address" placeholder="Enter Home Address"><?php echo $info['home_address']; ?></textarea>
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Office Address</label>
                                <textarea class="form-control" name="office_address" id="office_address" placeholder="Enter Office Address"><?php echo $info['office_address']; ?></textarea>
                              </div>
                        </div>
                      <div class="col-md-6">
                            <label>Password</label>
                              <div class="form-group input-group">
                                
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="<?php echo $info['password']; ?>" required>
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
                                
                                <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="Enter Confirm Password" value="<?php echo $info['password']; ?>" required>
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
                  <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="btn_agent">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
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