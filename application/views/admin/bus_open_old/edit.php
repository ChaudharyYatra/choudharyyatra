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
              <form method="post" enctype="multipart/form-data"  id="add_corefeature">
                <div class="card-body">
                    <div class="row">
                    <?php foreach($arr_data as $info){ ?> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour Details</label>
                                <select class="form-control" name="tour_number" id="tour_number" onchange='CheckColors(this.value); 
                                  this.blur();' onfocus='this.size=6;' onblur='this.size=1;'>
                                <option value="">Select tour title</option>
                                <?php foreach($packages_data as $packages_data_value){ ?> 
                                    <option value="<?php echo $packages_data_value['id'];?>" <?php if(isset($info['package_id'])){if($packages_data_value['id'] == $info['package_id']) {echo 'selected';}}?> ><?php echo $packages_data_value['tour_number'];?> - <?php echo $packages_data_value['tour_title'];?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Tour Date</label>
                                <select class="select_css" name="tour_date" id="tour_date">
                                  <option value="">Select Tour Date</option>
                                  <?php foreach($add_journey_date as $add_journey_date_value){ ?> 
                                    <option value="<?php echo $add_journey_date_value['p_date_id'];?>" <?php if(isset($info['package_date_id'])){if($add_journey_date_value['p_date_id'] == $info['package_date_id']) {echo 'selected';}}?> ><?php echo $add_journey_date_value['journey_date'];?></option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Bus Type</label><br>
                            <select class="select_css" name="vehicle_bus_type" id="vehicle_bus_type">
                              <option value="">Select Bus Type</option>
                              <option value="1*2" <?php if(isset($info['vehicle_bus_type'])){if("1*2" == $info['vehicle_bus_type']) {echo 'selected';}}?>>1*2</option>
                              <option value="1*3" <?php if(isset($info['vehicle_bus_type'])){if("1*3" == $info['vehicle_bus_type']) {echo 'selected';}}?>>1*3</option>
                              <option value="2*2" <?php if(isset($info['vehicle_bus_type'])){if("2*2" == $info['vehicle_bus_type']) {echo 'selected';}}?>>2*2</option>
                              <option value="2*3" <?php if(isset($info['vehicle_bus_type'])){if("2*3" == $info['vehicle_bus_type']) {echo 'selected';}}?>>2*3</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Vehicle RTO Registration No</label>
                            <select class="select_css" name="vehicle_rto_registration" id="vehicle_rto_registration" required="required">
                                <option value="">Select RTO Registration No</option>
                                <?php
                                    foreach($vehicle_details as $vehicle_details_info) 
                                    { 
                                ?>
                                    <option value="<?php echo $vehicle_details_info['id'];?>" <?php if(isset($info['vehicle_rto_registration'])){if($vehicle_details_info['id'] == $info['vehicle_rto_registration']) {echo 'selected';}}?> ><?php echo $vehicle_details_info['registration_number'];?> - <?php echo $vehicle_details_info['vehicle_owner_name'];?></option>

                                    <!-- <option value="<?php //echo $vehicle_details_info['id']; ?>"><?php //echo $vehicle_details_info['registration_number']; ?> - <?php //echo $vehicle_details_info['vehicle_owner_name']; ?></option> -->
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                      <?php } ?>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button> <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
