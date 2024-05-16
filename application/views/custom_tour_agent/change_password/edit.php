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
               <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_profile">
                <div class="card-body">
                 <div class="row">
					 <div class="col-md-6">
                              <div class="form-group">
                                <label>Custom Agent Name</label>
                                <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Enter Admin Name" value="<?php echo $info['name']; ?>" required="required">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Enter Email Address" required="required" value="<?php echo $info['email']; ?>" required>
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number" required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['mobile_number1']; ?>" required>
                              </div>
                      </div>
                        
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="btn_agent">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
  
