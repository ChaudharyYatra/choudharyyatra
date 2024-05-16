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
                    <th>Vehicle Bus Type</th>
                    <td><?php echo $info['bus_type']; ?></td>

                    <th>Vehicle Type</th>
                    <td><?php echo $info['vehicle_type_name']; ?></td>

                    <th>Fuel Type</th>
                    <td><?php echo $info['vehicle_fuel_name']; ?></td>
                      
                    
                  </tr>

                  <tr>
                  <th>Vehicle Brand</th>
                    <td><?php echo $info['vehicle_brand_name']; ?></td>

                  <th>Seat Capacity</th>
                    <td><?php echo $info['seat_capacity']; ?></td>

                    <th>Insurance Number</th>
                    <td><?php echo $info['insurance_number']; ?></td>

                    
                  </tr>

                  <tr>
                  <th>Insurance Validity Date</th>
                    <td><?php echo $info['insurance_valid_date']; ?></td>

                    
                  <th>Upload Insurance Image</th>
                    <td>
                      <?php if(!empty($info['insurance_image_name'])){ ?>
                      <img src="<?php echo base_url(); ?>uploads/insurance_photo/<?php echo $info['insurance_image_name']; ?>" width="50%">
                      <input type="hidden" name="old_insurance_img_name" id="old_insurance_img_name" value="<?php echo $info['insurance_image_name']; ?>">
                      <?php } ?>
                        <br>
                      <?php if(!empty($info['insurance_image_name'])){ ?>
                          <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/insurance_photo/<?php echo $info['insurance_image_name']; ?>">Download</a>
                          <input type="hidden" name="old_insurance_img_name" id="old_insurance_img_name" value="<?php if(!empty($info['insurance_image_name'])){echo $info['insurance_image_name'];}?>">
                      <?php } ?>
                      </td>
                    

                    <th>Permit Number</th>
                    <td><?php echo $info['permit_number']; ?></td>

                  </tr>

                  <tr>
                  <th>Permit Number</th>
                    <td><?php echo $info['permit_valid_date']; ?></td>

                  <th>Upload Permit Image</th>
                    <td><?php if(!empty($info['permit_image_name'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/permit_photo/<?php echo $info['permit_image_name']; ?>" width="30%">
                                        <input type="hidden" name="old_permit_img_name" id="old_permit_img_name" value="<?php echo $info['permit_image_name']; ?>">
                                        <?php } ?>
                                        <br>
                                        <?php if(!empty($info['permit_image_name'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/permit_photo/<?php echo $info['permit_image_name']; ?>">Download</a>
                                            <input type="hidden" name="old_permit_img_name" id="old_permit_img_name" value="<?php if(!empty($info['permit_image_name'])){echo $info['permit_image_name'];}?>">
                                        <?php } ?>
                                      </td>
                    
                    <th>Air Conditioners</th>
                    <td><?php echo $info['air_conditionar']; ?></td>
                    
                  </tr>

                  <tr>
                  <th>vehicle Model</th>
                    <td><?php echo $info['vehicle_model']; ?></td>
                    
                  <th>RTO Registration Number</th>
                    <td><?php echo $info['registration_number']; ?></td>
                    
                    <th>Luggage Carring Capacity(Kg)</th>
                    <td><?php echo $info['luggage_capacity']; ?></td>

                  
                     </tr>

                  <tr>
                  <th>Total kilometer(reading)</th>
                    <td><?php echo $info['total_kilometer']; ?></td>

                  <th>Vehicle Image(Front)</th>
                    <td><?php if(!empty($info['vehicle_front_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_front_image']; ?>" width="50%">
                                        <input type="hidden" name="old_vehicle_front_img_name" id="old_vehicle_front_img_name" value="<?php echo $info['vehicle_front_image']; ?>">
                                        <?php } ?>
                                        <br>
                                        <?php if(!empty($info['vehicle_front_image'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_front_image']; ?>">Download</a>
                                            <input type="hidden" name="old_vehicle_front_img_name" id="old_vehicle_front_img_name" value="<?php if(!empty($info['vehicle_front_image'])){echo $info['vehicle_front_image'];}?>">
                                        <?php } ?>
                                      </td>
                    
                    <th>Vehicle Image(Back)</th>
                    <td><?php if(!empty($info['vehicle_back_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_back_image']; ?>" width="50%">
                                        <input type="hidden" name="old_vehicle_back_img_name" id="old_vehicle_back_img_name" value="<?php echo $info['vehicle_back_image']; ?>">
                                        <?php } ?>
                                        <br>
                                        <?php if(!empty($info['vehicle_back_image'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_back_image']; ?>">Download</a>
                                            <input type="hidden" name="old_vehicle_back_img_name" id="old_vehicle_back_img_name" value="<?php if(!empty($info['vehicle_back_image'])){echo $info['vehicle_back_image'];}?>">
                                        <?php } ?>
                                      </td>
                 
                    </tr>

                  <tr>
                  <th>Vehicle Image(left)</th>
                    <td><?php if(!empty($info['vehicle_left_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_left_image']; ?>" width="50%">
                                        <input type="hidden" name="old_vehicle_left_img_name" id="old_vehicle_left_img_name" value="<?php echo $info['vehicle_left_image']; ?>">
                                        <?php } ?>
                                        <br>
                                        <?php if(!empty($info['vehicle_left_image'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_left_image']; ?>">Download</a>
                                            <input type="hidden" name="old_vehicle_left_img_name" id="old_vehicle_left_img_name" value="<?php if(!empty($info['vehicle_left_image'])){echo $info['vehicle_left_image'];}?>">
                                        <?php } ?>
                                      </td>

                    <th>Vehicle Image(inside two)</th>
                    <td><?php if(!empty($info['vehicle_insidetwo_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_insidetwo_image']; ?>" width="50%">
                                        <input type="hidden" name="old_vehicle_insidetwo_img_name" id="old_vehicle_insidetwo_img_name" value="<?php echo $info['vehicle_insidetwo_image']; ?>">
                                        <?php } ?>
                                        <br>
                                        <?php if(!empty($info['vehicle_insidetwo_image'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_insidetwo_image']; ?>">Download</a>
                                            <input type="hidden" name="old_vehicle_insidetwo_img_name" id="old_vehicle_insidetwo_img_name" value="<?php if(!empty($info['vehicle_insidetwo_image'])){echo $info['vehicle_insidetwo_image'];}?>">
                                        <?php } ?>
                                      </td>
                  
                    <th>Vehicle Image(right)</th>
                    <td><?php if(!empty($info['vehicle_right_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_right_image']; ?>" width="50%">
                                        <input type="hidden" name="old_vehicle_right_img_name" id="old_vehicle_right_img_name" value="<?php echo $info['vehicle_right_image']; ?>">
                                        <?php } ?>
                                        <br>
                                        <?php if(!empty($info['vehicle_right_image'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_right_image']; ?>">Download</a>
                                            <input type="hidden" name="old_vehicle_right_img_name" id="old_vehicle_right_img_name" value="<?php if(!empty($info['vehicle_right_image'])){echo $info['vehicle_right_image'];}?>">
                                        <?php } ?></td>
                    
                  
                  </tr>
                  <tr>
                  <th>Vehicle Image(inside one)</th>
                    <td><?php if(!empty($info['vehicle_insideone_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_insideone_image']; ?>" width="50%">
                                        <input type="hidden" name="old_vehicle_insideone_img_name" id="old_vehicle_insideone_img_name" value="<?php echo $info['vehicle_insideone_image']; ?>">
                                        <?php } ?>
                                        <br>
                                        <?php if(!empty($info['vehicle_insideone_image'])){ ?>
                                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/vehicle_photo/<?php echo $info['vehicle_insideone_image']; ?>">Download</a>
                                            <input type="hidden" name="old_vehicle_insideone_img_name" id="old_vehicle_insideone_img_name" value="<?php if(!empty($info['vehicle_insideone_image'])){echo $info['vehicle_insideone_image'];}?>">
                                        <?php } ?></td>
                  </tr>
                  </table>

                  <form method="post" enctype="multipart/form-data" id="document_checker" action="<?php echo $module_url_path; ?>/add">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                              <label> Document Checker Name</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <input type="text" class="form-control" name="document_checker_name" id="document_checker_name" value="<?php if(isset($info['document_checker_name'])){ echo $info['document_checker_name'];}?>" placeholder="Enter Document Checker Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                              <input type="hidden" class="form-control" name="vehicle_id" id="vehicle_id" value="<?php echo $info['id']; ?>" placeholder="Enter Document Checker Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>

                        <div class="col-md-6">
                          <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                          <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                        </div>
                      </div>

                    </div>
                    <!-- /.card-body -->
                    
                  </form>
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