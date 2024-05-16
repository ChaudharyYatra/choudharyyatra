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
              <form method="post" enctype="multipart/form-data" id="edit_region_head">
                <div class="card-body">

                  <div class="row">

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Region</label>
                            <select class="form-control" style="width: 100%;" name="agent_region" id="agent_region" required="required">
                                <option value="">Select Region</option>
                                <?php
                                   foreach($department_data as $department_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $department_info['id']; ?>" <?php if($department_info['id']==$info['agent_region']) { echo "selected"; } ?>><?php echo $department_info['department']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Booking Center</label>
                            <select class="form-control" style="width: 100%;" name="agent_center" id="agent_center" required="required">
                                <option value="">Select Booking Center</option>
                                <?php
                                   foreach($agent_data as $agent_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $agent_info['id']; ?>" <?php if($agent_info['id']==$info['agent_center']) { echo "selected"; } ?>><?php echo $agent_info['booking_center']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" readonly class="form-control" name="mobile_number" id="mobile_number" value="<?php echo $info['mobile_number']; ?>" placeholder="Enter Mobile Number" required="required">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" readonly class="form-control" name="agent_name" id="agent_name" value="<?php echo $info['agent_name']; ?>" placeholder="Enter Agent Name" required="required">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password" value="<?php echo $info['password']; ?>" required="required">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="text" class="form-control" name="confirm_password" id="confirm_password" value="<?php echo $info['password']; ?>" placeholder="Enter Confirm Password" required="required">
                          </div>
                      </div>

                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
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
 
