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
              <form method="post" enctype="multipart/form-data" id="add_places_master">
                <div class="card-body">
                  <div class="row">

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>State Name</label>
                            <select class="form-control" style="width: 100%;" name="state_name" id="state_name" required="required">
                                <option value="">Select State Name</option>
                                <?php
                                  foreach($state_data as $state_info) 
                                  { 
                                ?>
                                  <option value="<?php echo $state_info['id']; ?>"><?php echo $state_info['state_name']; ?></option>
                              <?php } ?>
                              </select>
                              <span class="error"><?php echo form_error('state_name'); ?></span>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Place Name</label>
                            <input type="text" class="form-control" name="place_name" id="place_name" placeholder="Enter Place Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Select Place Close Days</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select Place Close Days" style="width: 100%;" name="Select_close_days[]" id="Select_close_days" required="required">
                                <option value="">Select close days</option>
                                <option value="Sunady">Sunady</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday </option>
                                <option value="Thursday">Thursday </option>
                                <option value="Friday">Friday </option>
                                <option value="Saturday">Saturday</option>
                                
                              </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Place Description</label>
                            <textarea class="form-control" name="place_description" id="place_description" placeholder="Enter place description" required="required"></textarea>
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
