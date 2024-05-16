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
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Region</label>
                            <select class="form-control" style="width: 100%;" name="department" id="department" required="required">
                                <option value="">Select Region</option>
                                <?php
                                   foreach($department_data as $department_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $department_info['id']; ?>"><?php echo $department_info['department']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Booking Centre</label>
                                <input type="text" class="form-control" name="booking_center" id="booking_center" placeholder="Enter Booking Centre Name" required="required">
                              </div>
                      </div>
                      
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>City Name</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City Name" required="required">
                              </div>
                      </div>
                     
                      <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile Number 1</label>
                                <input type="text" class="form-control" name="mobile_number1" id="mobile_number1" placeholder="Enter 10 Digits Mobile Number" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                              </div>
                        </div>
                       <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile Number 2</label>
                                <input type="text" class="form-control" name="mobile_number2" id="mobile_number2" placeholder="Enter Phone Number" required="required">
                              </div>
                        </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
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
