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
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="add_changepassword">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                        <label>Old Password</label>
                        <div class="form-group input-group">
                          <input type="password" name="old_pass" id="old_pass" class="form-control" placeholder="Old Password" required><br>
                          <div class="input-group-append">
                            <div class="input-group-text">
                            <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password1"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="col-md-6">
                            <label>Old Password</label>
                            <div class="form-group mb-2">
                                <input type="password" name="old_pass" class="form-control" id="lpass" placeholder="Password">
                                <i id="toggler"class="far fa-eye" style="position: absolute;right: 50px;top: 48%;transform: translateY(-50%);cursor: pointer;"></i></span>
                            </div>
                      </div> -->

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
					        <a href="<?php echo base_url(); ?>agent/profile/index"><button type="button" class="btn btn-danger">Cancel</button></a>

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
  
  
<!-- Modal -->
<div class="modal fade" id="agent_change_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" class="danger">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Do you want to Change Password ?
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
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

<script>
    var password = document.getElementById('lpass');
    var toggler = document.getElementById('toggler');
        showHidePassword = () => {
        if (password.type == 'password') {
        password.setAttribute('type', 'text');
        toggler.classList.add('fa-eye-slash');
        } 
        else {
        toggler.classList.remove('fa-eye-slash');
        password.setAttribute('type', 'password');
        }
    };
    toggler.addEventListener('click', showHidePassword);
  </script>

  

</body>
</html>
