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
              <a href="<?php echo $module_url_path; ?>/index/<?php echo $p_date_id ?>/<?php echo $p_id ?>"><button class="btn btn-primary">Back</button></a>
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
              <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>

              <form method="post" enctype="multipart/form-data" id="edit_assign_staff">
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Select role <span class="req_field">*</label>
                        <select class="select_css row_set1 role_name" attr_name="role" name="role_name[]" id="role_name" required="required">
                        <option value="">select role</option>
                          <?php
                            foreach($role_type as $role_type_info){ 
                          ?>
                          <option value="<?php echo $role_type_info['id']; ?>" <?php if($role_type_info['id']==$info['role_name']) { echo "selected"; } ?>><?php echo $role_type_info['role_name']; ?></option>
                          <?php } ?>
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name <span class="req_field">*</label>
                        <select class="select_css row_set1 name" name="name[]" id="name" required="required">
                          <option value="">select name</option>
                          <?php
                              foreach($supervision as $supervision_info) 
                              { 
                          ?>
                              <option value="<?php echo $supervision_info['id']; ?>" <?php if($supervision_info['id']==$info['name']) { echo "selected"; } ?>><?php echo $supervision_info['supervision_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <input type="hidden" class="form-control" name="package_id[]" id="package_id" value="<?php echo $info['package_id'] ?>">
                    <input type="hidden" class="form-control" name="package_date_id[]" id="package_date_id" value="<?php echo $info['package_date_id'] ?>">


                  </div>  
                  
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
                    
                    <a href="<?php echo $module_url_path; ?>/index/<?php echo $info['package_date_id'] ?>/<?php echo $info['package_id'] ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
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
  
