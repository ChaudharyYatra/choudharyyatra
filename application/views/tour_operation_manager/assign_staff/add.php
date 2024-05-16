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
              <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>/<?php echo $pid; ?>"><button class="btn btn-primary">Back</button></a>
              
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
            <?php $this->load->view('tour_operation_manager/layout/tour_operation_manager_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" enctype="multipart/form-data" id="add_assign_staff">
                <div class="card-body" id="main_row">
                  <div class="row" >

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Package Name </label>
                        <input type="text" readonly name="package_name" id="package_name" class="form-control" placeholder="Package Name" value="<?php echo $pid ?>-<?php echo $package_info ?>" required>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Package Date </label>
                        <input type="text" readonly name="package_date" id="package_date" class="form-control" placeholder="Package Date" value="<?php echo $package_date ?>" required>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Select Role </label>
                        <select class="select_css row_set1 role_name" attr_name="role" name="role_name[]" id="role_name" required="required">
                        <option value="">select role</option>
                          <?php
                            foreach($role_type as $role_type_info){ 
                          ?>
                          <option value="<?php echo $role_type_info['id']; ?>"><?php echo $role_type_info['role_name']; ?></option>
                          <?php } ?>
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name </label>
                        <select class="select_css row_set1 name" name="name[]" id="name" required="required">
                          <option value="">select name</option>
                        </select>
                      </div>
                    </div>

                    <input type="hidden" class="form-control" name="package_id[]" id="package_id" value="<?php echo $pid ?>">
                    <input type="hidden" class="form-control" name="package_date_id[]" id="package_date_id" value="<?php echo $id ?>">

                  </div>  
                  
       
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-success" name="add_more" value="add_more_staff" id="add_more_staff">Add More Staff</button>
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>/<?php echo $pid; ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
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
  

</body>
</html>
