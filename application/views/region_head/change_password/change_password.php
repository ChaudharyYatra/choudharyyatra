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
            <?php $this->load->view('region_head/layout/region_head_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="changepassword">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                            <label>Old Password</label>
                              <div class="form-group input-group">
                                <input type="password" name="old_pass" id="old_pass" class="form-control" placeholder="Old Password" required>
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                  <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password1"></span>
                                  </div>
                                </div>
                              </div>
                      </div>

                      <div class="col-md-6">
                            <label>New Password</label>
                              <div class="form-group input-group">
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required>
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                  <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password2"></span>
                                  </div>
                                </div>
                              </div> 
                      </div>

                      <div class="col-md-6">
                            <label>Confirm New Password</label>
                              <div class="form-group input-group">
                                <input type="password" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="Confirm Password" onChange="checkPasswordMatch();" required>
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                  <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password"></span>
                                  </div>
                                </div> 
                              </div>
                      </div>
                      
              </div>
              <!-- <div class="registrationFormAlert" id="divCheckPasswordMatch"> -->
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					        <a href="<?php echo base_url(); ?>stationary/profile/index"><button type="button" class="btn btn-danger">Cancel</button></a>

                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <span class="registrationFormAlert" id="divCheckPasswordMatch"></span>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

<script>
  
  var password = document.getElementById("new_password"), 
      confirm_password = document.getElementById("confirm_pass");

  function validatePassword(){
    if(new_password.value != confirm_pass.value) {
      confirm_pass.setCustomValidity("New password & confirm pasword Don't Match");
    } else {
      confirm_pass.setCustomValidity('');
    }
  }

  new_password.onchange = validatePassword;
  confirm_pass.onkeyup = validatePassword;

</script>

<!-- Eye Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
$("body").on('click', '.toggle-password', function() {
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
$("body").on('click', '.toggle-password2', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#new_password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>

<script>
$("body").on('click', '.toggle-password1', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#old_pass");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>

  

</body>
</html>
