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
                     ?>
              <form method="post" enctype="multipart/form-data" id="">
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
                          <option value="<?php echo $state_data_info['id']; ?>" <?php if($state_data_info['id']==$info['state']) { echo "selected"; } ?>><?php echo $state_data_info['state_name']; ?></option>
                          <?php } ?>
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>City <span class="req_field">*</label>
                        <select class="select_css row_set1" name="city" id="city" required="required">
                          <option value="">select city</option>
                          <?php
                              foreach($city_name_data as $city_name_info) 
                              { 
                          ?>
                              <option value="<?php echo $city_name_info['id']; ?>" <?php if($city_name_info['id']==$info['city']) { echo "selected"; } ?>><?php echo $city_name_info['district']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Hotel Name <span class="req_field">*</span></label>
                        <input type="text" class="form-control" name="hotel_name" id="hotel_name" placeholder="Enter Agent Name" required="required" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['hotel_name']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Mobile Number 1 <span class="req_field">*</span></label>
                        <input type="text" class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required" minlength="10" maxlength="10" value="<?php echo $info['mobile_number1']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Mobile Number 2 (Optional)</label>
                        <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter 10 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10" value="<?php echo $info['mobile_number2']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Landline Number (Optional)</label>
                        <input type="text" class="form-control" name="landline" id="landline" placeholder="Enter 8 Digits Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" minlength="8" maxlength="8" value="<?php echo $info['landline']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email Address <span class="req_field">*</span></label>
                        <input type="email" class="form-control" name="email" id="email_edit" placeholder="Enter Email Address" value="<?php echo $info['email']; ?>" required>
                        <span id="email_result"></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Address <span class="req_field">*</span></label>
                        <textarea class="form-control" name="hotel_address" id="hotel_address" placeholder="Enter Supervision Name" required="required"><?php echo $info['hotel_address']; ?></textarea>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Upload Photo 1</label><br>
                        <input type="file" name="image_name" id="image_name">
                        <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Uploaded Photo 1</label><br>
                        <?php if(!empty($info['image_name'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/hotel/<?php echo $info['image_name']; ?>" width="50%">
                          <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/hotel/<?php echo $info['image_name']; ?>">Download</a>
                            <input type="hidden" name="old_img_name" id="old_img_name" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Upload Photo 2</label><br>
                        <input type="file" name="image_name2" id="image_name2">
                        <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Uploaded Photo 2</label><br>
                        <?php if(!empty($info['image_name2'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/hotel/<?php echo $info['image_name2']; ?>" width="50%">
                          <input type="hidden" name="old_img_name2" id="old_img_name2" value="<?php echo $info['image_name2']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name2'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/hotel/<?php echo $info['image_name2']; ?>">Download</a>
                            <input type="hidden" name="old_img_name2" id="old_img_name2" value="<?php if(!empty($info['image_name2'])){echo $info['image_name2'];}?>">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Upload Photo 3</label><br>
                        <input type="file" name="image_name3" id="image_name3">
                        <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Uploaded Photo 3</label><br>
                        <?php if(!empty($info['image_name3'])){ ?>
                          <img src="<?php echo base_url(); ?>uploads/hotel/<?php echo $info['image_name3']; ?>" width="50%">
                          <input type="hidden" name="old_img_name3" id="old_img_name3" value="<?php echo $info['image_name3']; ?>">
                        <?php } ?>

                        <?php if(!empty($info['image_name3'])){ ?>
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/hotel/<?php echo $info['image_name3']; ?>">Download</a>
                            <input type="hidden" name="old_img_name3" id="old_img_name3" value="<?php if(!empty($info['image_name3'])){echo $info['image_name3'];}?>">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label>Password <span class="req_field">*</span></label>
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
                      <label>Confirm Password <span class="req_field">*</span></label>
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
  
