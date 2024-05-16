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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
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
              <form method="post" enctype="multipart/form-data" id="edit_websitestructure">
                <div class="card-body">
                 <div class="row">
                 <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter contact number" oninput="this.value = this.value.replace(/[^0-9()- ]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['contact_number']; ?>" >
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location" id="location" placeholder="Enter location"  value="<?php echo $info['location']; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Enter email address"  value="<?php echo $info['email']; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Website Link</label>
                            <input type="text" class="form-control" name="website_link" id="website_link" placeholder="Enter website link"  value="<?php echo $info['website_link']; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Facebook Link</label>
                            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Enter Facebook link"  value="<?php echo $info['facebook_link']; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Youtube Link</label>
                            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Enter Twitter link"  value="<?php echo $info['twitter_link']; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Instagram Link</label>
                            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Enter Instagram link"  value="<?php echo $info['instagram_link']; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>LinkedIn Link</label>
                            <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Enter LinkedIn link"  value="<?php echo $info['linkedin_link']; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');"  value="<?php echo $info['company_name']; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Short Description</label>
                            <textarea class="form-control" name="short_description" id="short_description" placeholder="Enter short description" oninput="this.value = this.value.replace(/[^a-zA-Z. ]/g, '').replace(/(\..*)\./g, '$1');"  value="<?php echo $info['short_description']; ?>"><?php echo $info['short_description']; ?> </textarea>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Website Logo</label><br>
                            <input type="file" name="image_name" id="image_name_basic" accept="image/*">
                            <br>
                            <span class="text-danger">Image height should be 50 & width should be 216.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                            <br>
                             <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 200 px To Maximum 240 px.</span>
                    <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 40 px To Maximum 60 px.</span>
                   
                          </div>
                          </div>
                      </div>  
                      <div class="col-md-2">
                          <div class="form-group">
                            <label>Uploaded Image</label><br>
                            <?php if(!empty($info['image_name'])){ ?>
                                      <img src="<?php echo base_url(); ?>uploads/website_logo/<?php echo $info['image_name']; ?>" width="50%">
                                      <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                                      <?php } ?>
                          </div>
                      </div>
                      
                      <div class="col-md-12">
                          <div class="form-group">
                            <label>Map Link</label>
                            <textarea class="form-control" name="map" id="map" placeholder="Enter Map link"  value="<?php echo $info['map']; ?>"><?php echo $info['map']; ?> </textarea>
                            <span class="text-danger">Please add Embed code</span>
                          </div>
                      </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
					          <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
                </div>
              </form>
              <?php } ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--<div class="col-md-6">-->

          <!--</div>-->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
