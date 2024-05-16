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
              <form method="post" enctype="multipart/form-data" id="edit_comp_info">
                <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="<?php echo $info['company_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>
                      
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number" value="<?php echo $info['mobile_number']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>GST Number</label>
                            <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="Enter GST Number" value="<?php echo $info['gst_no']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>UPI Number</label>
                            <input type="text" class="form-control" name="upi_no" id="upi_no" placeholder="Enter UPI Number" value="<?php echo $info['upi_no']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>PAN Number</label>
                            <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="Enter PAN Number" value="<?php echo $info['pan_no']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" name="email_address" id="email_address" placeholder="Enter Email Address" value="<?php echo $info['email_address']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Address</label>
                            <textarea class="form-control" name="comp_address" id="comp_address" placeholder="Enter Company Address"><?php echo $info['comp_address']; ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Account Details</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bank Name</label>
                            <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Name" value="<?php echo $info['bank_name']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Account Number</label>
                            <input type="text" class="form-control" name="acc_no" id="acc_no" placeholder="Enter Account Number" value="<?php echo $info['acc_no']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Account Holder Name</label>
                            <input type="text" class="form-control" name="acc_holder_name" id="acc_holder_name" placeholder="Enter Account Holder Name" value="<?php echo $info['acc_holder_name']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>IFSC Code</label>
                            <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" placeholder="Enter ifsc code" value="<?php echo $info['ifsc_code']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MICR Code</label>
                            <input type="text" class="form-control" name="micr_code" id="micr_code" placeholder="Enter MICR Code" value="<?php echo $info['micr_code']; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Enter Branch Name" value="<?php echo $info['branch_name']; ?>">
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
