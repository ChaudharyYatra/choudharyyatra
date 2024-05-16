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
              <form method="post" enctype="multipart/form-data" id="edit_aboutus">
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                      <div class="form-group">
                        <label>Years Experiences</label>
                        <input type="text" class="form-control" name="years_experiences" id="years_experiences" placeholder="Enter Years Experiences" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['years_experiences']; ?>" required="required">
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Tour Packages</label>
                        <input type="text" class="form-control" name="tour_packages" id="tour_packages" placeholder="Enter Tour Packages" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['tour_packages']; ?>" required="required">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Happy Customers</label>
                        <input type="text" class="form-control" name="happy_customers" id="happy_customers" placeholder="Enter Happy Customers" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['happy_customers']; ?>" required="required">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Award Winning</label>
                        <input type="text" class="form-control" name="award_winning" id="award_winning" placeholder="Enter Award Winning" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $info['award_winning']; ?>" required="required">
                      </div>
                    </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Us</label>
                      <textarea class="form-control" name="about_us" id="full_description" placeholder="Enter Abot Us" required="required"><?php echo $info['about_us']; ?></textarea>
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
