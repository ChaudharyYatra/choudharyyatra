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
            <?php $this->load->view('tour_operation_manager/layout/tour_operation_manager_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" enctype="multipart/form-data" id="add_hotel">
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Package Type</label><br>
                        <select class="select_css" name="package_type" id="package_type" required="required">
                        <option value="">Select package type</option>
                              <?php
                                foreach($package_type as $package_type_info) 
                                { 
                              ?>
                          <option value="<?php echo $package_type_info['id'];?>"><?php echo $package_type_info['package_type'];?></option>
                              <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tour No / Name</label>
                          <select class="form-control" name="tour_number" id="tour_number" onfocus='this.size=5;' onblur='this.size=1;' 
                                onchange='this.size=1; this.blur();' required="required">
                            <option value="">Select tour title</option>
                            
                          </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Hotel Name</label>
                          <select class="form-control" name="hotel_name" id="hotel_name" onfocus='this.size=5;' onblur='this.size=1;' 
                                onchange='this.size=1; this.blur();' required="required">
                            <option value="">Select hotel</option>
                            
                          </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Advance Payment Amount</label><br>
                        <input type="text" class="form-control" name="advance_amt" id="advance_amt" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>
                  
       
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">Submit</button>
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