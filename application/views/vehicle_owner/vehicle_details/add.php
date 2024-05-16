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
              <form method="post" enctype="multipart/form-data" id="add_vehicle_details">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Bus Type</label><br>
                          <select class="select_css" name="vehicle_bus_type" id="vehicle_bus_type">
                            <option value="">Select Bus Type</option>
                            <?php
                                   foreach($bus_type as $bus_type_info) 
                                   { 
                                ?>
                            <option value="<?php echo $bus_type_info['id']; ?>"><?php echo $bus_type_info['bus_type']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Vehicle Type</label>
                            <select class="select_css" name="vehicle_type" id="vehicle_type" required="required">
                                <option value="">Select Vehicle Type</option>
                                <?php
                                   foreach($vehicle_type as $vehicle_type_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $vehicle_type_info['id']; ?>"><?php echo $vehicle_type_info['vehicle_type_name']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Fuel Type</label><br>
                          <select class="select_css" name="fuel_type" id="fuel_type">
                          <option value="">Select Fuel Type</option>
                                <?php
                                  foreach($vehicle_fuel as $vehicle_fuel_info) 
                                  { 
                                ?>
                            <option value="<?php echo $vehicle_fuel_info['id'];?>"><?php echo $vehicle_fuel_info['vehicle_fuel_name'];?></option>
                                <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Vehicle Brand</label><br>
                          <select class="select_css" name="vehicle_brand" id="vehicle_brand">
                          <option value="">Select Vehicle Brand</option>
                                <?php
                                  foreach($vehicle_brand as $vehicle_brand_info) 
                                  { 
                                ?>
                            <option value="<?php echo $vehicle_brand_info['id'];?>"><?php echo $vehicle_brand_info['vehicle_brand_name'];?></option>
                                <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Seat Capacity</label>
                                <input type="text" class="form-control" name="seat_capacity" id="seat_capacity" placeholder="Enter Seat Capacity" required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                      </div>
                      
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                              <label>Insurance Number</label>
                              <input type="text" class="form-control" name="insurance_number" placeholder="Enter Insurance Number" required="required">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                              <label>Insurance Validity Date</label>
                              <input type="date" class="form-control" name="insurance_valid_date" placeholder="Enter Insurance Number" required="required">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Insurance Image</label><br>
                            <input type="file" name="insurance_image_name" id="insurance_image_name" accept="image/png, image/jpg, image/jpeg, image/pdf" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span><br>
                          </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label>Permit Number</label>
                                <input type="text" class="form-control" name="permit_number" placeholder="Enter Permit Number" required="required">
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <label>Permit Validity Date</label>
                            <input type="date" class="form-control" name="permit_valid_date" placeholder="Enter Insurance Number" required="required">
                            </div>
                          </div>
                        </div>
                      </div>

                      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Permit Image</label><br>
                            <input type="file" name="permit_image_name" id="permit_image_name" accept="image/png, image/jpg, image/jpeg, image/pdf" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>
                      
                      
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Air Conditioners</label><br>
                                &nbsp;&nbsp;<input type="radio" name="air_conditionar" id="air_conditionar" value="AC">&nbsp;&nbsp;AC
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="air_conditionar" id="air_conditionar" value="Non-AC">&nbsp;&nbsp;Non-AC <br>
                              </div>
                      </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>vehicle Model</label>
                                <input type="text" class="form-control" name="vehicle_model" id="vehicle_model" placeholder="Enter Vehicle Model" required="required">
                              </div>
                        </div>
                       <div class="col-md-6">
                              <div class="form-group">
                                <label>RTO Registration Number</label>
                                <input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="Enter Registration Number" required="required" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">
                              </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Luggage Carring Capacity(Kg)</label>
                            <input type="text" class="form-control" name="luggage_capacity" id="luggage_capacity" placeholder="Enter Luggage Capacitys" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Total kilometer(reading)</label>
                            <input type="text" class="form-control" name="total_kilometer" id="total_kilometer" placeholder="Enter total kilometer" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                          </div>
                        </div>
                        
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Vehicle Image(Front)</label><br>
                            <input type="file" name="vehicle_front_image" id="vehicle_front_image" accept="image/png, image/jpg, image/jpeg, image/pdf" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Vehicle Image(Back)</label><br>
                            <input type="file" name="vehicle_back_image" id="vehicle_back_image" accept="image/png, image/jpg, image/jpeg, image/pdf" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Vehicle Image(left)</label><br>
                            <input type="file" name="vehicle_left_image" id="vehicle_left_image" accept="image/png, image/jpg, image/jpeg, image/pdf" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Vehicle Image(right)</label><br>
                            <input type="file" name="vehicle_right_image" id="vehicle_right_image" accept="image/png, image/jpg, image/jpeg, image/pdf" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Vehicle Image(inside one)</label><br>
                            <input type="file" name="vehicle_insideone_image" id="vehicle_insideone_image" accept="image/png, image/jpg, image/jpeg, image/pdf" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Vehicle Image(inside two)</label><br>
                            <input type="file" name="vehicle_insidetwo_image" id="vehicle_insidetwo_image" accept="image/png, image/jpg, image/jpeg, image/pdf" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                          </div>
                      </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
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
