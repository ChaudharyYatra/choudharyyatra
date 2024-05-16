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
              <form method="post" enctype="multipart/form-data" id="add_place_wise_stay_costing">
                <div class="card-body">
                  <div class="row">

                      <div class="col-md-6">
                            <div class="form-group">
                              <label>Country Name</label>
                              <select class="form-control" style="width: 100%;" name="country_name" id="country_name" required="required">
                                  <option value="">Select Country</option>
                                  <?php
                                    foreach($country_data as $country_info) 
                                    { 
                                  ?>
                                    <option value="<?php echo $country_info['id']; ?>"><?php echo $country_info['country_name']; ?></option>
                                <?php } ?>
                                </select>
                                
                            </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>State Name</label>
                            <select class="form-control" style="width: 100%;" name="state_name" id="state_name" required="required">
                                <option value="">Select State Name</option>
                                
                              </select>
                              
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Place Name</label>
                            <select class="form-control" style="width: 100%;" name="place_name" id="place_name" required="required">
                                <option value="">Select Place Name</option>
                                
                              </select>
                              
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Railway Name</label>
                            <input type="text" class="form-control" name="railway_name" id="railway_name" placeholder="Enter Airport Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                            <span class="error"><?php echo form_error('railway_name'); ?></span>
                          </div>
                      </div>

                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
