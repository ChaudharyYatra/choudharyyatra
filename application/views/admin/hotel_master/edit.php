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
              <form method="post" enctype="multipart/form-data">
              <div class="card-body">
                  <div class="container">
                    <div class="row"> 
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Hotel Name</label>
                            <input type="text" class="form-control" name="hotel_name" id="hotel_name" placeholder="Enter Name" required="required" value="<?php echo $info['hotel_name'] ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                        <label>Hotel Location</label>
                        <input type="text" class="form-control" name="hotel_location" id="hotel_location" placeholder="Enter Location" required="required" value="<?php echo $info['hotel_location'] ?>">
                        </div>
                        <div class="col-md-4">
                        <label>Hotel Address</label>
                        <textarea class="form-control" name="hotel_address" id="hotel_address" placeholder="Enter Hotel Address" required="required"><?php echo $info['hotel_address'] ?></textarea>
                      </div> 
                    </div> 
                    <br>
                    <div class="row">  
                      <div class="col-md-4">
                      <label>Hotel Mobile Number</label>
                      <input type="text" class="form-control" name="hotel_mobile_number" id="hotel_mobile_number" placeholder="Enter Mobile Number" minlength="10" maxlength="10" required="required" value="<?php echo $info['hotel_mobile_number'] ?>">

                      </div>
                      <div class="col-md-4">
                      <label>Hotel Email Address</label>
                      <input type="text" class="form-control" name="hotel_email_address" id="hotel_email_address" placeholder="Enter Address" required="required" value="<?php echo $info['hotel_email_address'] ?>">
                      </div>
                      <div class="col-md-4">
                      <label>Hotel Password</label>
                      <input type="text" class="form-control" name="hotel_password" id="hotel_password" placeholder="Enter Password" required="required" value="<?php echo $info['hotel_password'] ?>">
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
 
