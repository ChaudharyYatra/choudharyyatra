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
              
              <form method="post" enctype="multipart/form-data" id="add_package">
                <div class="card-body">
                  <div class="row">

                      <?php
                        foreach($arr_data as $info) 
                        { 
                       ?>
                        <input type="hidden" readonly class="form-control" name="tour_no" id="tour_no" placeholder="Enter tour number" value="<?php echo $info['id'] ?>" required="required">
                      <?php } ?>

                    
                       
                        <input type="hidden" readonly class="form-control" name="attchment_id" id="attchment_id" value="<?php echo $arr_data3['cust_instraction_attachment_id'] ?>" required="required">
                    

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tour Number - Name</label><br>
                        <?php
                        foreach($arr_data as $info) 
                        { 
                       ?>
                        <input type="text" readonly class="form-control" name="tour_number" id="tour_number" placeholder="Enter tour number" value="<?php echo $info['tour_number'] ?> - <?php echo $info['tour_title'] ?>" required="required">
                        <?php } ?>
                      </div>
                    </div>
                 
                    <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label>Attachment</label><br>
                        <input type="file" name="image_name" id="image_name" required="required">
                        <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                      </div>
                    </div> -->

                  </div>  
                  
                  <div class="row" id="main_row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Enter Instruction Point</label><br>
                        <textarea type="text" class="form-control" name="instraction[]" id="instraction" placeholder="Enter Instraction" required="required"></textarea>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Select Priority</label><br>
                        <select class="form-control" name="priority[]" id="priority" required="required">
                        <option value="">Select</option>
                          <option value="high">High</option>
                          <option value="medium">Medium</option>
                          <option value="low">Low</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4 mt-4">
                      <div class="form-group">
                          <label></label>
                          <button type="button" class="btn btn-primary" name="submit" value="add_more" name="add_more_instraction" id="add_more_instraction">Add More Instruction Points</button>
                      </div>
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
