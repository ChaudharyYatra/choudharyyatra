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
              <form method="post" enctype="multipart/form-data" id="add_websitestructure">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter contact number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location" id="location" placeholder="Enter location">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Enter email address">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Website Link</label>
                            <input type="text" class="form-control" name="website_link" id="website_link" placeholder="Enter website link">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Facebook Link</label>
                            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Enter Facebook link">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Youtube Link</label>
                            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Enter Twitter link">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Instagram Link</label>
                            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Enter Instagram">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>LinkedIn Link</label>
                            <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Enter LinkedIn link">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter Company Name">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Short Description</label>
                            <textarea class="form-control" name="short_description" id="short_description" placeholder="Enter short description" oninput="this.value = this.value.replace(/[^a-zA-Z. ]/g, '').replace(/(\..*)\./g, '$1');"></textarea>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Website Logo</label><br>
                            <input type="file" name="image_name" id="image_name_basic" accept="image/*">
                            <br>
                            <span class="text-danger">Image height should be 50 & width should be 216.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                            <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 200 px To Maximum 240 px.</span>
                    <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 40 px To Maximum 60 px.</span>
                    <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span><br>
                          </div>
                      </div> 
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Map Link</label><br>
                            <textarea type="text" class="form-control" name="map" id="map"></textarea>
                            <span class="text-danger">Please add Embed code</span><br>
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
