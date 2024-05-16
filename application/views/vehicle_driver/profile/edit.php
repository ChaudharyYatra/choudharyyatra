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
              <form method="post" enctype="multipart/form-data" id="edit_agentprofile">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                              <div class="form-group">
                                <label>Driver Name</label>
                                <input type="text" class="form-control" name="driver_name" id="driver_name" placeholder="Enter Driver Name" required="required" value="<?php echo $info['driver_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
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
                                <label>Years Of Experience</label>
                                <input type="text" class="form-control" name="year_experience" placeholder="Enter Year Experience" required="required" value="<?php echo $info['year_experience']; ?>">
                              </div>
                        </div>
                        
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Marital status</label><br>
                                &nbsp;&nbsp;<input type="radio" name="marital_status" id="marital_status" value="Married" <?php if(isset($info['marital_status'])){if($info['marital_status']=='Married') {echo'checked';}}?>>&nbsp;&nbsp;Married
                                    &nbsp;&nbsp;<input type="radio" name="marital_status" id="marital_status" value="Unmarried" <?php if(isset($info['marital_status'])){if($info['marital_status']=='Unmarried') {echo'checked';}}?>>&nbsp;&nbsp;Unmarried <br>
                              </div>
                      </div>

                      <div class="col-md-6">
                              <div class="form-group">
                                <?php 
                                $quali1=array();
                                  $p = $info['licence_type'];
                                  $quali1 = explode(',',$p);
                                  // print_r($quali1); die;
                                ?>
                                <label>Licence Type
                                  <?php ?>
                                </label><br>
                                            <input type="checkbox" class="" name="licence_type[]" id="licence_type" value="Permanent Driving License" <?php if(in_array('Permanent Driving License',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp;Permanent Driving License
                                &nbsp;&nbsp;<input type="checkbox" name="licence_type[]" id="licence_type" value="Commercial Driving License" <?php if(in_array('Commercial Driving License',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp; Commercial Driving License
                              </div>
                      </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload licence Image(front)</label><br>
                            <input type="file" name="licence_image_front" id="licence_image_front" >
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Uploaded Image</label><br>
                              <?php if(!empty($info['licence_image_front'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_licence_image/<?php echo $info['licence_image_front']; ?>" width="50%">
                                        <input type="hidden" name="old_licence_front_img_name" id="old_licence_front_img_name" value="<?php echo $info['licence_image_front']; ?>">
                                        <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload licence Image(back)</label><br>
                            <input type="file" name="licence_image_back" id="licence_image_back">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Uploaded Image</label><br>
                              <?php if(!empty($info['licence_image_back'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_licence_image/<?php echo $info['licence_image_back']; ?>" width="50%">
                                        <input type="hidden" name="old_licence_back_img_name" id="old_licence_back_img_name" value="<?php echo $info['licence_image_back']; ?>">
                                        <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload Aadhaar Image(front)</label><br>
                            <input type="file" name="aadhaar_image_front" id="aadhaar_image_front">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Uploaded Image</label><br>
                              <?php if(!empty($info['aadhaar_image_front'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_aadhaar_image/<?php echo $info['aadhaar_image_front']; ?>" width="50%">
                                        <input type="hidden" name="old_aadhaar_front_img_name" id="old_aadhaar_front_img_name" value="<?php echo $info['aadhaar_image_front']; ?>">
                                        <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload Aadhaar Image(back)</label><br>
                            <input type="file" name="aadhaar_image_back" id="aadhaar_image_back">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Uploaded Image</label><br>
                              <?php if(!empty($info['aadhaar_image_back'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_aadhaar_image/<?php echo $info['aadhaar_image_back']; ?>" width="50%">
                                        <input type="hidden" name="old_aadhaar_back_img_name" id="old_aadhaar_front_img_name" value="<?php echo $info['aadhaar_image_back']; ?>">
                                        <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload Profile Image</label><br>
                            <input type="file" name="profile_image" id="profile_image">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Uploaded Image</label><br>
                              <?php if(!empty($info['profile_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_profile_image/<?php echo $info['profile_image']; ?>" width="50%">
                                        <input type="hidden" name="old_profile_img_name" id="old_profile_img_name" value="<?php echo $info['profile_image']; ?>">
                                        <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Address</label>
                            <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter Address"><?php echo $info['address']; ?></textarea>
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