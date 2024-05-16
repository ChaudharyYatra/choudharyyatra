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
              <form method="post" enctype="multipart/form-data" id="add_package">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Academic Year</label>
                            <select class="form-control" style="width: 100%;" name="academic_year" id="academic_year" required="required">
                                <option value="">Select Year</option>
                                <?php
                                   foreach($academic_years_data as $academic_years_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $academic_years_info['id']; ?>"><?php echo $academic_years_info['year']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour Number</label>
                                <input type="text" class="form-control" name="tour_number" id="tour_number" placeholder="Enter Tour Number" oninput="this.value = this.value.replace(/[^0-9a-zA-Z]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour Title</label>
                                <input type="text" class="form-control" name="tour_title" id="tour_title" placeholder="Enter Tour Title" required="required">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Destinations</label>
                                <input type="text" class="form-control" name="destinations" id="destinations" placeholder="Enter Destinations" required="required">
                              </div>
                        </div>
                       <div class="col-md-6">
                              <div class="form-group">
                                <label>Rating</label>
                                <input type="number" class="form-control" name="rating" id="rating" placeholder="Enter Rating" min="1" max="5" required="required">
                              </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Package Starting From Cost</label>
                            <input type="text" class="form-control" name="cost" id="cost" placeholder="Enter Cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tour Number of Days</label>
                            <input type="text" class="form-control" name="tour_number_of_days" id="tour_number_of_days" placeholder="Enter Tour Number of Days" oninput="this.value = this.value.replace(/[^0-9a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                          </div>
                        </div>
                  
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Image</label><br>
                            <input type="file" name="image_name" id="image_nam" required="required">
                            <br><span class="text-danger">Image height should be 530 & width should be 800.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                            <br>
                    <span class="text-danger" id="img_width" style="display:none;">Image Width should be Minimum 780 px To Maximum 820 px.</span>
                    <span class="text-danger" id="img_height" style="display:none;">Image Height should be Minimum 510 px To Maximum 550 px.</span>
                    <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Itinerary PDF</label><br>
                            <input type="file" name="pdf_name" id="pdf_name_package" accept="application/pdf" required="required">
                            <br><span class="text-danger">PDF size should be less than 2MB.</span>
                            <br><span class="text-danger">Please upload only PDF files.</span>
                            <br><span class="text-danger" id="pdf_format" style="display:none;">You selected wrong file format.</span>
                            
                          </div>
                      </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Short Description</label>
                            <textarea class="form-control" name="short_description" id="short_description" placeholder="Enter Short Description" required="required"></textarea>
                            <span class="text-danger">Please enter upto 70 characters</span><br>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Upload Image</label><br>
                            <input type="file" name="package_full_image" id="full_image_name" required="required">
                            <br><span class="text-danger">Image height should be 605 & width should be 1920.</span>
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG format files.</span>
                            <br>
                    <span class="text-danger" id="full_img_width" style="display:none;">Image Width should be Minimum 1919 px To Maximum 1922 px.</span>
                    <span class="text-danger" id="full_img_height" style="display:none;">Image Height should be Minimum 600 px To Maximum 605 px.</span>
                    <span class="text-danger" id="full_img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                          </div>
                      </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Full Description / Overview</label>
                            <textarea class="form-control" name="full_description" id="full_description" placeholder="Enter Full Description" required="required"></textarea>
                          </div>
                      </div>
                                           
                       <div class="col-md-6">
                          <div class="form-group">
                            <label>Inclusion</label>
                            <textarea class="form-control" name="inclusion" id="inclusion" placeholder="Enter Inclusion" required="required"></textarea>
                          </div>
                      </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Terms & Conditions</label>
                            <textarea class="form-control" name="terms_conditions" id="terms_conditions" placeholder="Enter Terms & Conditions" required="required"></textarea>
                          </div>
                      </div>
                      
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Us</label>
                            <textarea class="form-control" name="contact_us" id="contact_us" placeholder="Enter Contact Us" required="required"></textarea>
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
