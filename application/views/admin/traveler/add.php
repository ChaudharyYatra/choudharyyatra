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
              <form method="post" enctype="multipart/form-data" onsubmit="return validateregForms()">
                <div class="card-body">
                 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" ?>
                          <span class="text-danger float-left" id="firstname_error" style="display:none"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" ?>
                          <span class="text-danger float-left" id="lastname_error" style="display:none"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email Address</label>
                          <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Enter Email" ?>
                          <span class="text-danger float-left" id="emailid_error" style="display:none"></span>
                        </div>
                        </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mobile Number</label>
                          <input type="text" class="form-control" pattern="[789][0-9]{9}" name="phoneno" id="phoneno" placeholder="Enter Mobile No." maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" ?>
                          <span class="text-danger float-left" id="phoneno_error" style="display:none"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" ?>
                            <span class="text-danger float-left" id="password_error" style="display:none"></span>
                          </div>
                      </div>
                        
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
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
