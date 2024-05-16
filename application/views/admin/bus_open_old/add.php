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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour Details</label>
                                <select class="form-control" name="tour_number" id="tour_number" onchange='CheckColors(this.value); 
                                  this.blur();' onfocus='this.size=6;' onblur='this.size=1;'>
                                <option value="">Select tour title</option>
                                <?php foreach($packages_data as $packages_data_value){ ?> 
                                    <option value="<?php echo $packages_data_value['id'];?>"><?php echo $packages_data_value['tour_number'];?> -  <?php echo $packages_data_value['tour_title'];?></option>
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
                                      <!-- <option value="<?php //echo $add_journey_date_value['id'];?>" <?php //if($add_journey_date_value['id']==$booking_data['tour_date']){echo "selected";} ?>><?php //echo $add_journey_date_value['journey_date'];?></option> -->
                                      <!-- <option value="<?php //echo $add_journey_date_value['p_date_id'];?>" <?php //if(isset($booking_data['tour_date'])){if($add_journey_date_value['p_date_id'] == $booking_data['tour_date']) {echo 'selected';}}?>><?php //echo date('d-m-Y',strtotime($add_journey_date_value['journey_date']));?></option> -->
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bus Type</label><br>
                                <select class="select_css" name="vehicle_bus_type" id="vehicle_bus_type">
                                    <option value="">Select Bus Type</option>
                                    <option value="1*2">1*2</option>
                                    <option value="1*3">1*3</option>
                                    <option value="2*2">2*2</option>
                                    <option value="2*3">2*3</option>
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
                                    <option value="<?php echo $vehicle_details_info['id']; ?>"><?php echo $vehicle_details_info['registration_number']; ?> - <?php echo $vehicle_details_info['vehicle_owner_name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
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
