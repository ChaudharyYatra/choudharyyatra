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
              <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_state">
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                          <div class="form-group">
                            <label>Country</label>
                            <select class="form-control" style="width: 100%;" name="country_id" id="country_id" required="required">
                                <option value="">Select Country</option>
                                <?php
                                   foreach($country_data as $hotel_type_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $hotel_type_info['id']; ?>" <?php if($hotel_type_info['id']==$info['country_id']) { echo "selected"; } ?>><?php echo $hotel_type_info['country_name']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label>State </label>
                        <input type="text" class="form-control" name="state_name" id="state_name" placeholder="Enter State Name" required="required" value="<?php echo $info['state_name']; ?>">
                    </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button></a>
                </div>
              </form>
              <?php } ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
