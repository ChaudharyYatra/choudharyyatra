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
            <?php $this->load->view('stationary/layout/stationary_alert'); ?>
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
                 <div class="row">
					 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>User Name</label>
                          <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter Agent Name" required="required" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['user_name']; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mobile Number</label>
                          <input type="text" class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter 10 Digits Mobile Number" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php echo $info['mobile_number1']; ?>">
                        </div>
                        </div>
                       <!-- <div class="col-md-6">
                          <div class="form-group">
                            <label>Mobile Number 2</label>
                            <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter 10 Digits Mobile Number" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php //echo $info['mobile_number2']; ?>">
                          </div>
                        </div> -->
                        <!-- <div class="col-md-6">
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" id="email_edit" placeholder="Enter Email Address" value="<?php echo $info['email']; ?>" required>
                            <span id="email_result"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>PAN Card</label>
                            <input type="text" class="form-control" name="pan_card" id="pan_card" placeholder="Enter PAN Card" value="<?php echo $info['pan_card']; ?>" required>
                            <span id="email_result"></span>
                          </div>
                        </div> -->
                        <!-- <div class="col-md-6">
                          <div class="form-group">
                            <label>Company GST Number</label>
                            <input type="text" class="form-control" name="company_gst_number" id="company_gst_number" placeholder="Enter Company GST Number" value="<?php //echo $info['company_gst_number']; ?>" required>
                            <span id="email_result"></span>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Office Address</label>
                            <textarea type="email" class="form-control" name="office_address" id="office_address" placeholder="Enter Office Address" value="" required><?php //echo $info['office_address']; ?></textarea>
                            <span id="email_result"></span>
                          </div>
                        </div>-->
                        
                        
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="btn_agent">Submit</button>
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
  
