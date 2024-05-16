<style>
  .color_remove .form-control{
    color:gray !important;
  }
  .color_remove .select_css{
    color:#000 !important;
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
              <form method="post" enctype="multipart/form-data" id="add_agent">
                <div class="card-body">
                 <div class="row">
					            <div class="col-md-6">
                              <div class="form-group">
                                <label>Arrrange Id</label>
                                <input type="text" class="form-control" name="arrange_id" id="arrange_id" placeholder="Enter Arrange Id" required="required">
                                <span class="error"><?php echo form_error('arrange_id'); ?></span>
                              </div>
                      </div>
					              <div class="col-md-6">
                              <div class="form-group">
                                <label>Office Name</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter Office Name" required="required">
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
                                   <option value="<?php echo $department_info['id']; ?>"><?php echo $department_info['department']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Booking Centre</label>
                                <input type="text" class="form-control" name="booking_center" id="booking_center" placeholder="Enter Booking Centre Name" required="required">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Agent Name</label>
                                <input type="text" class="form-control" name="agent_name" id="agent_name" placeholder="Enter Agent Name"  oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                              </div>
                      </div>

                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Agent Mobile Number 1</label>
                                <input type="text" class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                              </div>
                        </div>
                       <div class="col-md-6">
                              <div class="form-group">
                                <label>Agent Mobile Number 2</label>
                                <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Agent Mobile Number 3</label>
                                <input type="text" class="form-control" name="mobile_number3" id="mobile_number3" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>Agent Landline Number</label>
                                <input type="text" class="form-control" name="landline_number" id="landline_number" placeholder="Enter 11 Digits Landline Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                              </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" value="" required="required">
                            <span id="email_result"></span>
                          </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Flat No.</label>
                            <input type="text" class="form-control" name="flat_no" id="flat_no" placeholder="Enter Flat No.">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Building / House Name</label>
                            <input type="text" class="form-control" name="building_house_nm" id="building_house_nm" placeholder="Enter Building / House Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Street Name</label>
                            <input type="text" class="form-control" name="street_name" id="street_name" placeholder="Enter Street Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Landmark</label>
                            <input type="text" class="form-control" name="landmark" id="landmark" placeholder="Enter Landmark">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group color_remove">
                                <label>select State</label>
                                <select class="select_css" name="agent_state" id="agent_state" required>

                                  <option value="">Select State</option>
                                    <?php foreach($state_data as $state_data_value){ ?> 
                                      <option value="<?php echo $state_data_value['id'];?>"><?php echo $state_data_value['state_name'];?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group color_remove">
                                <label>Select District</label>
                                <select class="select_css" name="agent_district" id="agent_district" required>

                                  <option value="">Select District</option>
                                       
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group color_remove">
                                <label>Select Taluka</label>
                                <select class="select_css" name="agent_taluka" id="agent_taluka" required>

                                  <option value="">Select Taluka</option> 

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group color_remove">
                            <label>City/Village Name</label>
                            <input type="text" class="form-control" name="agent_city" id="agent_city" placeholder="Enter City Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Logo Photo</label><br>
                            <input type="file" name="image_name" id="image_nam" required="required">
                            <br><span class="text-danger">Image height should be 530 & width should be 800.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                            <br>
                            <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 780 px To Maximum 820 px.</span>
                            <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 510 px To Maximum 550 px.</span>
                            <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <label>Logo photo</label>
                              <div class="form-group">
                                <input type="file" name="image_name" id="image_name" placeholder="Logo Photo">
                                <br><span class="text-danger">Image height should be 780 & width should be 510.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                            <br>
                          <span class="text-danger" id="logo_width" style="display:none;">Image Width should be Minimum 780 px To Maximum 820 px.</span></br>
                          <span class="text-danger" id="logo_height" style="display:none;">Image Height should be Minimum 510 px To Maximum 550 px.</span></br>
                          <span class="text-danger" id="logo_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                              </div>
                        </div> -->

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload QR Image</label><br>
                            <input type="file" name="qr_code" id="qr_code">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>UPI ID</label>
                              <input type="text" class="form-control" name="upi_id" id="upi_id" placeholder="Enter UPI ID" oninput="validateInput(event)">
                          </div>
                        </div>

                      <div class="col-md-6">
                              <div class="form-group color_remove">
                                <label>Registration Date</label>
                                <input type="date" class="form-control" name="registration_date" id="registration_date" placeholder="Select Date" >
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>GST Number</label>
                                <input type="text" class="form-control" name="GST_number" id="GST_number" placeholder="Enter GST Number" >
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>PAN Number</label>
                                <input type="text" class="form-control" name="pan_number" id="pan_number" placeholder="Enter PAN Number" >
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

                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th>Master's Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>Department</td>
                        
                        <td>"Department : Navigate here to include new department above the 'Department' option."</td>
                        <td>
                        <a href="<?php echo base_url(); ?>admin/department/index"><button type="button" class="btn btn-success" >Add</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td>State</td>
                        
                        <td>"State : Navigate here to include new State above the 'Select State' option."</td>
                        <td>
                        <a href="<?php echo base_url(); ?>admin/state/index"><button type="button" class="btn btn-success" >Add</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td>District</td>
                        
                        <td>"District : Navigate here to include new District above the 'Select District' option."</td>
                        <td>
                        <a href="<?php echo base_url(); ?>admin/district/index"><button type="button" class="btn btn-success" >Add</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Taluka</td>
                        
                        <td>"Taluka : Navigate here to include new Taluka above the 'Select Taluka' option."</td>
                        <td>
                        <a href="<?php echo base_url(); ?>admin/taluka/index"><button type="button" class="btn btn-success" >Add</button></a>
                        </td>
                    </tr>
      
                </table>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="btn_agent">Submit</button>
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
  

</body>
</html>
