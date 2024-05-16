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
              <form method="post" enctype="multipart/form-data" id="edit_kilometer_update">
                <div class="card-body">
                 <div class="row">
                  <?php
                    foreach($driver_kilometer as $info) 
                    { 
                      ?>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Select City</label>
                            <select class="select_css" name="city_id" id="city_id">
                                <option value="">Select City Name</option>
                                <?php
                                   foreach($city_info as $city_name_info) 
                                   {  
                                ?>
                                   <option value="<?php echo $city_name_info['id'];?>" <?php if(isset($info['city_id'])){if($city_name_info['id'] == $info['city_id']) {echo 'selected';}}?>><?php echo $city_name_info['city_name'];?></option>
                                <?php } ?>
                                <?php  
                                foreach($arr_data as $info) 
                                { 
                                  ?>
                                  <input type="hidden" class="form-control" name="driver_id" id="driver_id" placeholder="Enter From date" value="<?php echo $info["id"]; ?>" required>
                                <?php } ?>
                                </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Upload licence Image(front)</label><br>
                            <input type="file" name="kilometer_image" id="kilometer_image" >
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Uploaded Image</label><br>
                              <?php if(!empty($info['image_name'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_kilometer_update_photo/<?php echo $info['image_name']; ?>" width="50%">
                                        <input type="hidden" name="old_kilometer_image" id="old_kilometer_image" value="<?php echo $info['image_name']; ?>">
                                        <?php } ?><br>
                              <?php if(!empty($info['image_name'])){ ?>
                                  <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/driver_kilometer_update_photo/<?php echo $info['image_name']; ?>">Download</a>
                                  <input type="hidden" name="old_kilometer_image" id="old_kilometer_image" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                              <?php } ?>
                            </div>
                        </div>
              </div>
              <?php } ?>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
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
    // alert('hiiiiiiiiii')
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
