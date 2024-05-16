<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document Code Department| Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
 <img src="<?php echo base_url(); ?>uploads/do_not_delete/logo.png" alt="Chaudhary Yatra" style="width:40%;"></img>
<div class="login-box">
       <?php  if($this->session->flashdata('error_message1')!=''){ ?>
  <div class="alert alert-danger  alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true" id="sess_clo">&times;</button>
<h5><i class="icon fas fa-check"></i> Alert!</h5>
<?php echo $this->session->flashdata('error_message1'); ?>
</div>
  <?php
  }
  ?>
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h4>Login</h4>
    </div>
    <div class="card-body">

      <form method="post" onsubmit="return validateloginForms()">
          <div class="row">
            <div class="col-md-12 pb-3">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile_number1" id="mobile_number1" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                  <div class="input-group-append">
                  </div>
                </div>
                  <span class="text-danger float-left" id="mobile_number1_error" style="display:none;"></span>
            </div>
          </div>
            <div class="row">
              <div class="col-md-12 pb-3">
                <div class="input-group">
                  <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span toggle="#password-field" title="show password" class="fas fa-fw fa-eye-slash field_icon toggle-password"></span>
                    </div>
                  </div>
              </div> 
              <span class="text-danger float-left" id="passlogin_error" style="display:none"></span>
            
            </div>
          </div>
        
          <div class="row">
            <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
            </div>
          </div>
     

      <div class="social-auth-links text-center mt-2 mb-3">
      <button type="submit" class="btn btn-block btn-primary" name="submit" value="submit">Sign In</button>
      </div>
      </form>
      <!-- /.social-auth-links -->

      <!--<p class="mb-1">-->
      <!--  <a href="forgot-password.html">I forgot my password</a>-->
      <!--</p>-->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>

<script>
  function validateloginForms() 
{

  // $("#emaillogin_error").hide();
  $("#passlogin_error").hide();
  $("#mobile_number1_error").hide();
  
  var submiform='';

var mobile_number1 = $('#mobile_number1').val();
  if(mobile_number1 == '' || mobile_number1 ==null) 
  {
    $('#mobile_number1_error').text('Please enter mobile number.');
    $('#mobile_number1_error').show();
    submiform=false;
  }
  
  var Password = $('#password').val();
  if(Password == '' || Password ==null) 
  {
    $('#passlogin_error').text('Please enter password.');
    $('#passlogin_error').show();
    submiform=false;
  }

  // var Password = $('#password').val();
  // if (Password == '' || Password == null) {
  //   $('#passlogin_error').text('Please enter password.');
  //   $('#passlogin_error').show();
  //   submiform = false;
  // } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{6,15}$/.test(Password)) {
  //   $('#passlogin_error').text('Password must contain: ' +
  //     'At least one upper case letter, ' +
  //     'At least one lower case letter, ' +
  //     'At least one number, ' +
  //     'At least one special character, ' +
  //     'and be between 6-15 characters.');
  //   $('#passlogin_error').show();
  //   submiform = false;
  // }

  if(submiform==='')
  {
      return true;
  }
  else
  {
     return false; 
  }
  
  
}
setTimeout(function(){ $('.alert-dismissible').hide(); }, 3000);
</script>

<script>
$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
    $(this).attr("title", "Hide Password");
  } else {
    input.attr("type", "password");
    $(this).attr("title", "Show Password");
  }

});
</script>