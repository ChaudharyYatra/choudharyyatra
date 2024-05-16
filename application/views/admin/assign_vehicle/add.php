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
              <form method="post" enctype="multipart/form-data"  id="assign_vehicle">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour Details</label>
                                <select class="form-control" name="tour_number" id="tour_number">
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
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bus Type</label><br>
                                  <select class="select_css" name="vehicle_bus_type" id="vehicle_bus_type">
                                      <option value="">Select Bus Type</option>
                                      <?php foreach($record_bus_type as $bus_type_data){ ?>
                                        <option value="<?php echo $bus_type_data['id'];?>"><?php echo $bus_type_data['bus_type'];?></option>
                                        <?php } ?>
                                  </select> 

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Vehicle RTO Registration No</label>
                            <select class="select_css" name="vehicle_rto_registration" id="vehicle_rto_registration" required="required">
                                <option value="">Select RTO Registration No</option>
                                
                                </select>
                            </div>
                        </div>
                        

                  <table id="example1" class="table table-bordered table-striped">
                    <tr>
                      <th>Master's Name</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                    <tr>
                      <td>Packages</td>
                      <td>"Tour Details: Navigate here to include new packages above the 'Tour Details' option."</td>
                      <td>
                      <a href="<?php echo base_url(); ?>admin/packages/index"><button type="button" class="btn btn-success" >Add</button></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Packages</td>
                      <td>"Tour Date: Navigate here to include new tour date above the 'Tour Date' option."</td>
                      <td>
                      <a href="<?php echo base_url(); ?>admin/packages/index"><button type="button" class="btn btn-success" >Add</button></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Bus Type</td>
                      <td>"Bus Type: Navigate here to include new bus type above the 'Bus Type' option."</td>
                      <td>
                      <a href="<?php echo base_url(); ?>admin/bus_type/index"><button type="button" class="btn btn-success" >Add</button></a>
                      </td>
                    </tr>
                  </table>
                  
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
