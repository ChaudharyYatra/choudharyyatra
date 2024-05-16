<style>
  .color_remove .form-control{
    color:gray !important;
  }
  .color_remove .select_css{
    color:gray !important;
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
               <?php
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_agent">
                <div class="card-body">
                 <div class="row">
					            <div class="col-md-6">
                              <div class="form-group">
                                <label>Arrange Id</label>
                                <input type="text" class="form-control" name="arrange_id" id="arrange_id" value="<?php echo $info['arrange_id']; ?>" placeholder="Enter Arrange Id" required="required">
                              </div>
                      </div>
					            <div class="col-md-6">
                              <div class="form-group">
                                <label>Office Name</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter Office Name" value="<?php echo $info['city']; ?>" required="required">
                              </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group color_remove">
                            <label>Region Name</label>
                            <select class="form-control" style="width: 100%;" name="department" id="department" required="required">
                                <option value="">Select Region</option>
                                <?php
                                   foreach($department_data as $department_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $department_info['id']; ?>" <?php if($department_info['id']==$info['department']) { echo "selected"; } ?>><?php echo $department_info['department']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Booking Centre</label>
                                <input type="text" class="form-control" name="booking_center" id="booking_center" placeholder="Enter Booking Centre Name" required="required" value="<?php echo $info['booking_center']; ?>" required>
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Agent Name</label>
                                <input type="text" class="form-control" name="agent_name" id="agent_name" placeholder="Enter Agent Name" required="required" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['agent_name']; ?>" required>
                              </div>
                      </div>

                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile Number 1</label>
                                <input type="text" class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php echo $info['mobile_number1']; ?>">
                              </div>
                        </div>
                       <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile Number 2</label>
                                <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php echo $info['mobile_number2']; ?>">
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Agent Mobile Number 3</label>
                                <input type="text" class="form-control" name="mobile_number3" id="mobile_number3" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['fld_mobile_number3']; ?>" >
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Agent Landline Number</label>
                                <input type="text" class="form-control" name="landline_number" id="landline_number" placeholder="Enter 10 Digits Landline Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['fld_landline_number']; ?>" >
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" id="email_edit" placeholder="Enter Email Address" value="<?php echo $info['email']; ?>" required>
                                <span id="email_result"></span>
                              </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Flat No.</label>
                            <input type="text" class="form-control" name="flat_no" id="flat_no" placeholder="Enter Flat No." value="<?php if($info){ echo $info['flat_no'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Building / House Name</label>
                            <input type="text" class="form-control" name="building_house_nm" id="building_house_nm" placeholder="Enter Building / House Name" value="<?php if($info){echo $info['building_house_nm'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Street Name</label>
                            <input type="text" class="form-control" name="street_name" id="street_name" placeholder="Enter Street Name" value="<?php if($info){echo $info['street_name'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Landmark</label>
                            <input type="text" class="form-control" name="landmark" id="landmark" placeholder="Enter Landmark" value="<?php if($info){echo $info['landmark'];} ?>">
                          </div>
                        </div>

                        <div class="col-md-3">
                                <div class="form-group color_remove">
                                    <label>select State</label>
                                    <select class="select_css" name="agent_state" id="agent_state" required>
                                            <option value="">Select State</option>
                                            <?php foreach($state_data as $state_data_value){ ?> 
                                                <option value="<?php echo $state_data_value['id'];?>" <?php if(isset($info['state_name'])){if($state_data_value['id'] == $info['state_name']) {echo 'selected';}}?>><?php echo $state_data_value['state_name'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group color_remove">
                                    <label>Select District</label>
                                    <select class="select_css" name="agent_district" id="agent_district" required>
                                        <option value="">Select District</option>
                                        <?php foreach($district_data as $district_data_value){ ?> 
                                            <option value="<?php echo $district_data_value['id'];?>" <?php if(isset($info['district_name'])){if($district_data_value['id'] == $info['district_name']) {echo 'selected';}}?>><?php echo $district_data_value['district'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group color_remove">
                                    <label>Select Taluka</label>
                                    <select class="select_css" name="agent_taluka" id="agent_taluka" required>
                                        <option value="">Select Taluka</option>
                                           <?php foreach($taluka_data as $taluka_data_value){ ?> 
                                            <option value="<?php echo $taluka_data_value['id'];?>" <?php if(isset($info['taluka_name'])){if($taluka_data_value['id'] == $info['taluka_name']) {echo 'selected';}}?>><?php echo $taluka_data_value['taluka'];?></option>
                                        <?php } ?> 
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group color_remove">
                                <label>City/Village Name</label>
                                <input type="text" class="form-control" name="agent_city" id="agent_city" placeholder="Enter City Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['city_name']; ?>" required>
                              </div>
                            </div>
                        
                        <!-- <div class="col-md-6">
                            <label>Logo photo</label>
                              <div class="form-group">
                                <input type="file" name="logo_photo" id="logo_photo" placeholder="Logo Photo" >
                              </div>
                        </div> -->

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Logo Photo</label><br>
                            <input type="file" name="image_name" id="image_name_package">
                            <br><span class="text-danger">Image height should be 530 & width should be 800.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                             <br>
                            <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 780 px To Maximum 820 px.</span>
                            <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 510 px To Maximum 550 px.</span>
                            <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                        </div>
                      
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Uploaded Image</label><br>
                          <?php if(!empty($info['image_name'])){ ?>
                                    <img src="<?php echo base_url(); ?>uploads/agent_photo/<?php echo $info['image_name']; ?>" width="80%">
                                    <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                                    <?php } ?>
                        </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload QR Image</label><br>
                            <input type="file" name="qr_code" id="qr_code">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                             <br>
                            <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 780 px To Maximum 820 px.</span>
                            <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 510 px To Maximum 550 px.</span>
                            <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                        </div>
                      
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Uploaded Image</label><br>
                          <?php if(!empty($info['qr_code_image'])){ ?>
                                    <img src="<?php echo base_url(); ?>uploads/QR_code_image/<?php echo $info['qr_code_image']; ?>" width="80%">
                                    <input type="hidden" name="old_qr_code_name" id="old_qr_code_name" value="<?php echo $info['qr_code_image']; ?>">
                                    <?php } ?>
                        </div>
                      </div>

                        <!-- <div class="col-md-4">
                            <div class="form-group">
                              <label>Upload QR Image</label><br>
                              <input type="file" name="qr_code" id="qr_code">
                              <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                            </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Image</label><br>
                            <?php //if(!empty($info['qr_code_image'])){ ?>
                                      <img src="<?php //echo base_url(); ?>uploads/QR_code_image/<?php //echo $info['qr_code_image']; ?>" width="80%">
                                      <input type="hidden" name="old_qr_code_name" id="old_qr_code_name" value="<?php //echo $info['qr_code_image']; ?>">
                                      <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php //echo base_url(); ?>uploads/QR_code_image/<?php //echo $info['qr_code_image']; ?>">Download</a>
                                      <?php //} ?>
                          </div>
                        </div> -->

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>UPI ID</label>
                              <input type="text" class="form-control" name="upi_id" id="upi_id" placeholder="Enter UPI ID" value="<?php echo $info['upi_id']; ?>" oninput="validateInput(event)">
                          </div>
                        </div>

                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" id="email_edit" placeholder="Enter Email Address" value="<?php echo $info['email']; ?>" required>
                                <span id="email_result"></span>
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group color_remove">
                                <label>Registration Date</label>
                                <input type="date" class="form-control" name="registration_date" id="registration_date" placeholder="Select Date" value="<?php echo $info['fld_registration_date']; ?>" >
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>GST Number</label>
                                <input type="text" class="form-control" name="GST_number" id="GST_number" placeholder="Enter GST Number" value="<?php echo $info['fld_GST_number']; ?>" >
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>PAN Number</label>
                                <input type="text" class="form-control" name="pan_number" id="pan_number" placeholder="Enter PAN Number" value="<?php echo $info['fld_pan_number']; ?>" >
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
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="btn_agent">Submit</button>
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
  
  var password = document.getElementById("pass_login"), 
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

<script>
function validateInput(event) {
    // Get the current input value
    let inputValue = event.target.value;

    // Replace any characters that are not numbers, alphabets, or @ with an empty string
    let sanitizedValue = inputValue.replace(/[^a-zA-Z0-9@]/g, '');

    // Update the input field value with the sanitized value
    event.target.value = sanitizedValue;
}
</script>
  
