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
            <?php $this->load->view('tour_operation_manager/layout/tour_operation_manager_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" enctype="multipart/form-data" id="add_assign_staff">
                <div class="card-body" id="main_row">
                  <div class="row" >

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Select Tour Manager </label>
                        <select class="select_css" attr_name="role" name="tour_manager_name" id="tour_manager_name" required="required">
                        <option value="">select role</option>
                          <?php
                            foreach($tour_manager_name as $tour_manager_name_info){ 
                          ?>
                          <option value="<?php echo $tour_manager_name_info['id']; ?>"><?php echo $tour_manager_name_info['supervision_name']; ?></option>
                          <?php } ?>
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Select Expences Checker </label>
                        <select class="select_css" name="expences_checker_name" id="expences_checker_name" required="required">
                          <option value="">select name</option>
                          <?php
                            foreach($expences_checker_name as $expences_checker_name_info){ 
                          ?>
                          <option value="<?php echo $expences_checker_name_info['id']; ?>"><?php echo $expences_checker_name_info['expences_checker_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <!-- <input type="hidden" class="form-control" name="tour_manager_id" id="tour_manager_id" value="<?php //echo $id ?>"> -->
                    

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
