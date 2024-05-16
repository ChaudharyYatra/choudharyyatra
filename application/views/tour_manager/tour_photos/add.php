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
              <form method="post" enctype="multipart/form-data" id="add_tour_photo">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                              <div class="form-group">
                                <label>Destinations</label>
                                <input type="text" class="form-control" name="destinations" id="destinations" placeholder="Enter Destinations" required="required">
                                <input type="hidden" class="form-control" name="package_id" placeholder="Enter Available Seats" value="<?php echo $info['id']; ?>" >
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Upload Image (One Image)</label><br>
                                <input type="file" name="image_name" id="image_name" required="required">
                                <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span><br>
                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Image (Two Image)</label><br>
                            <input type="file" name="image_name_two" id="image_name_two" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Image (Three Image)</label><br>
                            <input type="file" name="image_name_three" id="image_name_three" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                          </div>
                      </div>  
                    </div>

                    <b><span class="text-danger">Please Add Only Three Photos Of Particular Tour.</span></b>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="tour_photos_submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
