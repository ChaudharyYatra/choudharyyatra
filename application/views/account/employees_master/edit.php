<style>
  .mealplan_css{
            border: 1px solid red !important;
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
                   foreach($qr_code_master_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_employees_master">
                <div class="card-body">
                    <div class="row">
                        <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Employee ID</label>
                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="<?php //echo $info['mrp_system_name']; ?>" placeholder="Enter employee id"  required="required">
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo $info['full_name']; ?>" placeholder="Enter full name"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label><br>
                            <input type="radio"  name="gender" id="gender" value="Male" <?php if(isset($info['gender'])){if($info['gender']=='Male') {echo'checked';}}?>>&nbsp;&nbsp;Male&nbsp;&nbsp;
                            <input type="radio"  name="gender" id="gender" value="Female" <?php if(isset($info['gender'])){if($info['gender']=='Female') {echo'checked';}}?>>&nbsp;&nbsp;Female<br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="employee_dob" id="employee_dob" value="<?php echo $info['employee_dob']; ?>" placeholder="Enter employee dob"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="employee_address" id="employee_address" placeholder="Enter employee address"  required="required"><?php echo $info['employee_address']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Position/Job Title</label>
                            <input type="text" class="form-control" name="employee_position" id="employee_position" value="<?php echo $info['employee_position']; ?>" placeholder="Enter employee position"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Notes/Comments</label>
                            <input type="text" class="form-control" name="comments" id="comments" value="<?php echo $info['comments']; ?>" placeholder="Enter comments"  required="required">
                        </div>
                    </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
  

</body>
</html>
