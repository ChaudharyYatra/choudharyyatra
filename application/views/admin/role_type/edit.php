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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
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
              <form method="post" enctype="multipart/form-data" id="edit_role">
              <div class="card-body">
                  <div class="container">
                    <div class="row"> 
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" class="form-control" name="role_name" id="role_name" placeholder="Enter role name" required="required" value="<?php echo $info['role_name'] ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Is It Series Item <span class="req_field">*</span></label>
                          <div class="form-group">
                          <input type="radio" id="yes" name="for_booking_yes_no" value="yes" <?php if(isset($info['for_booking_yes_no'])){if("yes"==$info['for_booking_yes_no']){echo "checked";}} ?>> &nbsp;
                          <label>Yes</label>  &nbsp; &nbsp; 
                          <input type="radio" id="no" name="for_booking_yes_no" value="no" <?php if(isset($info['for_booking_yes_no'])){if("no"==$info['for_booking_yes_no']){echo "checked";}} ?>> &nbsp;
                          <label>No</label><br>
                      </div>
                    </div>
                    </div> 
                    <br>
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
 
