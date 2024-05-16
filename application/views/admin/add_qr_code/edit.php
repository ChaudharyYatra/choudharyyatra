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
              <form method="post" enctype="multipart/form-data" id="edit_QR_code">
                <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter Full Name" value="<?php echo $info['full_name']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>
                      
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Role Name</label>
                            <select class="form-control" name="role_name" id="role_name" onchange='role_name_div(this.value);'>
                            <option value="">Select Role Name</option>
                            <option value="Other" <?php if(isset($info['Role_name'])){if("Other" == $info['Role_name']) {echo 'selected';}}?>>Other</option>
                            <?php foreach($role_type_data as $role_type_data_value){ ?> 
                                <!-- <option value="<?php //echo $role_type_data_value['id'];?>"><?php //echo $role_type_data_value['role_name'];?></option> -->
                                <option value="<?php echo $role_type_data_value['id'];?>" <?php if(isset($info['Role_name'])){if($role_type_data_value['id'] == $info['Role_name']) {echo 'selected';}}?>><?php echo $role_type_data_value['role_name'];?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <?php if($info['Role_name']!='Other'){?>
                    <div class="col-md-6" id="other_role_name" style='display:none;'>
                        <div class="form-group">
                        <label>Other role type</label>
                        <input type="text" class="form-control mealplan_css" name="other_role" id="other_role" placeholder="Enter role name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>
                    <?php } else{ ?>
                        <div class="col-md-6" id="other_role_name" style='display:block;'>
                        <div class="form-group">
                        <label>Other role type</label>
                        <input type="text" class="form-control mealplan_css" name="other_role" id="other_role" value="<?php echo $info['other_role_name'];?>" placeholder="Enter role name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="<?php echo $info['mobile_number'];?>" placeholder="Enter Mobile Number" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>

                    <div class="col-md-6">
                      <label>Is This A Company Account ?</label>
                      <div class="form-group">
                          <input type="radio" id="Yes" name="company_account_yes_no" value="Yes" <?php if(isset($info['company_account_yes_no'])){if($info['company_account_yes_no']=='Yes') {echo'checked';}}?>> &nbsp;
                          <label>Yes</label>  &nbsp; &nbsp; 
                          <input type="radio" id="No" name="company_account_yes_no" value="No" <?php if(isset($info['company_account_yes_no'])){if($info['company_account_yes_no']=='No') {echo'checked';}}?>> &nbsp;
                          <label>No</label><br>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nick Name</label>
                            <input type="text" class="form-control" name="nick_name" id="nick_name" placeholder="Enter Nick Name" value="<?php echo $info['nick_name'];?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bank Name</label>
                            <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Name" value="<?php echo $info['bank_name'];?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Account Number</label>
                            <input type="text" class="form-control" name="account_number" id="account_number" value="<?php echo $info['account_number'];?>" placeholder="Enter Account Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                      <label>UPI App Name</label>
                          <select class="form-control" name="upi_app_name" id="upi_app_name">
                          <option value="">Select App Name</option>
                          <?php foreach($upi_apps_name as $upi_apps_name_value){ ?> 
                              <option value="<?php echo $upi_apps_name_value['id'];?>" <?php if(isset($info['upi_app_name'])){if($upi_apps_name_value['id'] == $info['upi_app_name']) {echo 'selected';}}?>><?php echo $upi_apps_name_value['payment_app_name'];?></option>
                          <?php } ?>
                          </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>UPI ID</label>
                            <input type="text" class="form-control" name="upi_id" id="upi_id" placeholder="Enter UPI ID" value="<?php echo $info['upi_id']; ?>" oninput="this.value = this.value.replace(/[^a-zA-Z0-9@]/g, '');">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Upload QR Image</label><br>
                          <input type="file" name="image_name" id="image_nam">
                          <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                        </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Uploaded Image</label><br>
                        <?php if(!empty($info['qr_code_image'])){ ?>
                                  <img src="<?php echo base_url(); ?>uploads/QR_code_image/<?php echo $info['qr_code_image']; ?>" width="80%">
                                  <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['qr_code_image']; ?>">
                                  <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/QR_code_image/<?php echo $info['qr_code_image']; ?>">Download</a>
                                  <?php } ?>
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
