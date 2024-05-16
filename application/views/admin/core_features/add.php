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
              <form method="post" enctype="multipart/form-data"  id="add_corefeature">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Feature one title</label>
                                <input type="text" class="form-control" name="feature_one_title" id="feature_one_title" placeholder="Enter feature one title upto 15 characters" maxlength="15" required="required">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Feature one description</label>
                                <textarea type="text" class="form-control" name="feature_one_description" id="feature_one_description" maxlength="55" placeholder="Enter feature one description upto 50 characters" required="required"></textarea>
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Feature two title</label>
                                <input type="text" class="form-control" name="feature_two_title" id="feature_two_title" placeholder="Enter feature two title upto 15 characters" maxlength="15" required="required">
                              </div>
                        </div>
                       <div class="col-md-6">
                              <div class="form-group">
                                <label>Feature two description</label>
                                <textarea type="text" class="form-control" name="feature_two_description" id="feature_two_description" maxlength="55" placeholder="Enter feature two description upto 50 characters" required="required"></textarea>
                              </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Feature three title</label>
                            <input type="text" class="form-control" name="feature_three_title" id="feature_three_title" placeholder="Enter feature three title upto 15 characters" maxlength="15" required="required">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Feature three description</label>
                            <textarea type="text" class="form-control" name="feature_three_description" id="feature_three_description" maxlength="55" placeholder="Enter feature three description upto 50 characters" required="required"></textarea>
                          </div>
                        </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Feature four title</label>
                            <input class="form-control" name="feature_four_title" id="feature_four_title" placeholder="Enter feature four title upto 15 characters" maxlength="15" required="required">
                          </div>
                      </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Feature four description</label>
                            <textarea class="form-control" name="feature_four_description" id="feature_four_description" maxlength="55" placeholder="Enter feature four description upto 50 characters" required="required"></textarea>
                          </div>
                      </div>
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
