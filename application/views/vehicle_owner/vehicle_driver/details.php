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
                   foreach($arr_data as $info) 
                   { 
                     ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <div class="card-body">
                <table id="" class="table table-bordered table-hover">
                  <tr>
                    <th>Driver Name</th>
                    <td><?php echo $info['driver_name']; ?></td>

                    <th>Mobile Number 1</th>
                    <td><?php echo $info['mobile_number1']; ?></td>
                      
                    <th>Mobile Number 2</th>
                    <td><?php echo $info['mobile_number2']; ?></td>
                  </tr>

                  <tr>
                    <th>Years Of Experience</th>
                    <td><?php echo $info['year_experience']; ?></td>

                    <th>Pan Card No.</th>
                    <td><?php echo $info['pan_card_no']; ?></td>

                    <th>GST No. (Optional)</th>
                    <td><?php echo $info['gst_no']; ?></td>
                  </tr>

                  <tr>
                    <th>Marital status</th>
                    <td><?php echo $info['marital_status']; ?></td>

                    <th>Licence Type</th>
                    <td><?php echo $info['licence_type']; ?></td>

                    <th>Upload licence Image(front)</th>
                    <td><?php if(!empty($info['licence_image_front'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_licence_image/<?php echo $info['licence_image_front']; ?>" width="50%">
                                        <input type="hidden" name="old_licence_front_img_name" id="old_licence_front_img_name" value="<?php echo $info['licence_image_front']; ?>">
                                        <?php } ?>

                                        <?php if(!empty($info['licence_image_front'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/driver_licence_image/<?php echo $info['licence_image_front']; ?>">Download</a>
                                            <input type="hidden" name="old_licence_front_img_name" id="old_licence_front_img_name" value="<?php if(!empty($info['licence_image_front'])){echo $info['licence_image_front'];}?>">
                                        <?php } ?>
                                      </td>
                    
                    
                </tr>

                  <tr>
                  <th>Upload licence Image(back)</th>
                    <td><?php if(!empty($info['licence_image_back'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_licence_image/<?php echo $info['licence_image_back']; ?>" width="50%">
                                        <input type="hidden" name="old_licence_back_img_name" id="old_licence_back_img_name" value="<?php echo $info['licence_image_back']; ?>">
                                        <?php } ?>

                                        <?php if(!empty($info['licence_image_back'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/driver_licence_image/<?php echo $info['licence_image_back']; ?>">Download</a>
                                            <input type="hidden" name="old_licence_back_img_name" id="old_licence_back_img_name" value="<?php if(!empty($info['licence_image_back'])){echo $info['licence_image_back'];}?>">
                                        <?php } ?>
                                      </td>
                  
                    <th>Upload Aadhaar Image(front)</th>
                    <td><?php if(!empty($info['aadhaar_image_front'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_aadhaar_image/<?php echo $info['aadhaar_image_front']; ?>" width="50%">
                                        <input type="hidden" name="old_aadhaar_front_img_name" id="old_aadhaar_front_img_name" value="<?php echo $info['aadhaar_image_front']; ?>">
                                        <?php } ?>


                                        <?php if(!empty($info['aadhaar_image_front'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/driver_aadhaar_image/<?php echo $info['aadhaar_image_front']; ?>">Download</a>
                                            <input type="hidden" name="old_aadhaar_front_img_name" id="old_aadhaar_front_img_name" value="<?php if(!empty($info['aadhaar_image_front'])){echo $info['aadhaar_image_front'];}?>">
                                        <?php } ?>
                                      </td>

                    <th>Upload Aadhaar Image(back)</th>
                    <td><?php if(!empty($info['aadhaar_image_back'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_aadhaar_image/<?php echo $info['aadhaar_image_back']; ?>" width="50%">
                                        <input type="hidden" name="old_aadhaar_back_img_name" id="old_aadhaar_front_img_name" value="<?php echo $info['aadhaar_image_back']; ?>">
                                        <?php } ?>

                                        <?php if(!empty($info['aadhaar_image_back'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/driver_aadhaar_image/<?php echo $info['aadhaar_image_back']; ?>">Download</a>
                                            <input type="hidden" name="old_aadhaar_back_img_name" id="old_aadhaar_back_img_name" value="<?php if(!empty($info['aadhaar_image_back'])){echo $info['aadhaar_image_back'];}?>">
                                        <?php } ?>
                                      </td>
                    
                    
                </tr>
                <tr>
                    <th>Upload Profile Image</th>
                    <td><?php if(!empty($info['profile_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/driver_profile_image/<?php echo $info['profile_image']; ?>" width="50%">
                                        <input type="hidden" name="old_profile_img_name" id="old_profile_img_name" value="<?php echo $info['profile_image']; ?>">
                                        <?php } ?>

                                        <?php if(!empty($info['profile_image'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/driver_profile_image/<?php echo $info['profile_image']; ?>">Download</a>
                                            <input type="hidden" name="old_profile_img_name" id="old_profile_img_name" value="<?php if(!empty($info['profile_image'])){echo $info['profile_image'];}?>">
                                        <?php } ?>
                                      </td>
                 
                    <th>Address</th>
                    <td><?php echo $info['address']; ?></td>

                    <th>Licence Valid Date</th>
                    <td><?php echo $info['licence_valid_date']; ?></td>
                </tr>
                </table>
              </div>
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