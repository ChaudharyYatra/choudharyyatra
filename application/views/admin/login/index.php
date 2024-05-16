<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Log in</title>

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
  <!-- /.login-logo -->
   <?php  if($this->session->flashdata('error_message1')!=''){ ?>
  <div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true" id="sess_clo">&times;</button>
<h5><i class="icon fas fa-check"></i> Alert!</h5>
<?php echo $this->session->flashdata('error_message1'); ?>
</div>
  <?php
  }
  ?>
  
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <p class="h1"><b>Login</b></p>
    </div>
    <div class="card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->

      <form method="post" onsubmit="return validateloginForms()">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email Address" name="email_login" id="email_login">
          <div class="input-group-append">
            
          </div>
        </div>
        <p class="text-danger float-left" id="emaillogin_error" style="display:none"></p>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass_login" id="pass_login">
          <div class="input-group-append">
              <div class="input-group-text">
              <span toggle="#password-field" class="fas fa-fw fa-eye field_icon toggle-password" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Password"></span>
            </div>
          </div>
        </div>
        <p class="text-danger float-left" id="passlogin_error" style="display:none"></p>
        <!--<div class="row">-->
        <!--  <div class="col-8">-->
        <!--  </div>-->
        <!--</div>-->
     

      <div class="social-auth-links text-center mt-2 mb-3">
      <button type="submit" class="btn btn-block btn-primary" name="submit" value="submit">Sign In</button>
      </div>
      </form>
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
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
  $("#emaillogin_error").hide();
  $("#passlogin_error").hide();
  
  var submiform='';
  
 var email_login = $('#email_login').val();
  if (email_login == '' || email_login ==null) 
  {
    $('#emaillogin_error').text('Please enter email address.');
    $('#emaillogin_error').show();
    submiform=false;
  }
  else
  {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email_login)) 
        {
           $('#emaillogin_error').text('Please enter valid email address.');
            $('#emaillogin_error').show();
            submiform=false;
        }
        else if(email_login)
        {
          var email_split = email_login.split('@');
          var count = (email_split[1].match(/\./g) || []).length;
          if(count > 2)
          {
              $('#emaillogin_error').text('Please enter valid email address.');
              $('#emaillogin_error').show();
              submiform=false;
          }
        }
  }
  
  var pass_login = $('#pass_login').val();
  if(pass_login == '' || pass_login ==null) 
  {
    $('#passlogin_error').text('Please enter password.');
    $('#passlogin_error').show();
    submiform=false;
  }


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
  var input = $("#pass_login");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>
