<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?></h1>
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
          <div class="col-md-12 col-sm-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <?php
                   foreach($vehicle_owner as $info) 
                   { 
                     ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <tr>
                    <th>Full Name</th>
                    <td><?php echo $info['vehicle_owner_name']; ?></td>

                    <th>Mobile Number 1</th>
                    <td><?php echo $info['mobile_number1']; ?></td>
                      
                    <th>Mobile Number 2</th>
                    <td><?php echo $info['mobile_number2']; ?></td>
                  </tr>

                  <tr>
                  <th>Email Address</th>
                    <td><?php echo $info['email']; ?></td>

                    
                    <th>Home Address</th>
                    <td><?php echo $info['home_address']; ?></td>
                    
                  
                    <th>Office Address</th>
                    <td><?php echo $info['office_address']; ?></td>
                    
                  </tr>

                  <tr>
                    <th>Profile photo</th>
                    <td><?php if(!empty($info['profile_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_owner_profile/<?php echo $info['profile_image']; ?>" width="50%">
                                        <input type="hidden" name="old_image_name" id="old_image_name" value="<?php echo $info['profile_image']; ?>">
                                        <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/vehicle_owner_profile/<?php echo $info['profile_image']; ?>">Download</a>
                                        <?php } ?>
                      </td>

                      <th>Aadhar Card(Front Photo)</th>
                    <td><?php if(!empty($info['aadhar_front_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_owner_aadhar_img/<?php echo $info['aadhar_front_image']; ?>" width="50%">
                                        <input type="hidden" name="old_aadhar_front_image" id="old_aadhar_front_image" value="<?php echo $info['aadhar_front_image']; ?>">
                                        <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/vehicle_owner_aadhar_img/<?php echo $info['aadhar_front_image']; ?>">Download</a>
                                        <?php } ?>
                      </td>

                    <th>Aadhar Card(Back Photo)</th>
                    <td><?php if(!empty($info['aadhar_back_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_owner_aadhar_img/<?php echo $info['aadhar_back_image']; ?>" width="50%">
                                        <input type="hidden" name="old_aadhar_back_image" id="old_aadhar_back_image" value="<?php echo $info['aadhar_back_image']; ?>">
                                        <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/vehicle_owner_aadhar_img/<?php echo $info['aadhar_back_image']; ?>">Download</a>
                                        <?php } ?>
                      </td>

                  </tr>

                  <tr>
                  <th>Password</th>
                    <td><?php echo $info['password']; ?></td>

                    <th></th>
                    <td></td>

                    <th></th>
                    <td></td>
                  </tr>

                  </table>
              </div>
              
        
            <?php } ?>
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