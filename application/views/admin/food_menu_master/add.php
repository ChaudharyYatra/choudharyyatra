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
              <form method="post" enctype="multipart/form-data" id="add_state">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                          <div class="form-group">
                            <label>Select food type</label>
                            <select class="form-control" style="width: 100%;" name="food_type" id="food_type" required="required">
                                <option value="">Select food type</option>
                                <?php
                                   foreach($food_type as $food_type_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $food_type_info['id']; ?>"><?php echo $food_type_info['food_type_name']; ?></option>
                               <?php } ?>
                              </select>
                          </div>
                      </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Food Menu Name</label>
                            <input type="text" class="form-control" name="food_menu_name" id="food_menu_name" placeholder="Enter food Menu Name">
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
				  <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button></a>
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
