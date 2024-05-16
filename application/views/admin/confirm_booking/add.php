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
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Traveler Id </label>
                                <input type="text" class="form-control" name="traveler_id" id="traveler_id" placeholder="Enter Traveler Id" required="required">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Package Date Id</label>
                                <input type="text" class="form-control" name="package_date_id" id="Package_Date_Id" placeholder="Enter Package Date Id"  required="required">
                              </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Package Booked On</label>
                                <input type="text" class="form-control" name="package_booked_on" id="Package_Booked_On" placeholder="Enter Package Booked Date" required="required">
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
