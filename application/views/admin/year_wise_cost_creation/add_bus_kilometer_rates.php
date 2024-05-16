<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bus Per Kilometer Rates</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a> -->
              
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
                <h3 class="card-title">Add -Bus Per Kilometer Rates</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" enctype="multipart/form-data" id="add_bus_kilometer_rates">
                <div class="card-body">
                    <div class="row"> 
                        <!-- <div class="col-md-12">
                          <div class="form-group text-center">
                              <label><h3>Bus Per Kilometer Rates</h3></label>
                          </div>
                        </div> -->
                    </div>
                    <div class="row"> 
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5">
                          <div class="form-group text-center">
                              <label><h5>Bus Type</h5></label>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group text-center">
                              <label><h5>Rate</h5></label>
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <select class="form-control" style="width: 100%;" name="bus_type_1" id="bus_type_1" required>
                                  <option value="">Select Bus Type</option>
                                    <?php
                                      foreach($bus_type_data as $bus_type_info) 
                                      { 
                                    ?>
                                  <option value="<?php echo $bus_type_info['id']; ?>"><?php echo $bus_type_info['ac_non_ac']; ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" class="form-control" name="bus_type_1" id="bus_type_1" placeholder=""> -->
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rate_1" id="rate_1" placeholder="Enter Rate" required>
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                          <select class="form-control" style="width: 100%;" name="bus_type_2" id="bus_type_2">
                                  <option value="">Select Bus Type</option>
                                    <?php
                                      foreach($bus_type_data as $bus_type_info) 
                                      { 
                                    ?>
                                  <option value="<?php echo $bus_type_info['id']; ?>"><?php echo $bus_type_info['ac_non_ac']; ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" class="form-control" name="bus_type_2" id="bus_type_2" placeholder=""> -->
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rate_2" id="rate_2" placeholder="Enter Rate">
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                          <select class="form-control" style="width: 100%;" name="bus_type_3" id="bus_type_3">
                                  <option value="">Select Bus Type</option>
                                    <?php
                                      foreach($bus_type_data as $bus_type_info) 
                                      { 
                                    ?>
                                  <option value="<?php echo $bus_type_info['id']; ?>"><?php echo $bus_type_info['ac_non_ac']; ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" class="form-control" name="bus_type_3" id="bus_type_3" placeholder=""> -->
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rate_3" id="rate_3" placeholder="Enter Rate">
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                          <select class="form-control" style="width: 100%;" name="bus_type_4" id="bus_type_4">
                                  <option value="">Select Bus Type</option>
                                    <?php
                                      foreach($bus_type_data as $bus_type_info) 
                                      { 
                                    ?>
                                  <option value="<?php echo $bus_type_info['id']; ?>"><?php echo $bus_type_info['ac_non_ac']; ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" class="form-control" name="bus_type_4" id="bus_type_4" placeholder=""> -->
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rate_4" id="rate_4" placeholder="Enter Rate">
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                          <select class="form-control" style="width: 100%;" name="bus_type_5" id="bus_type_5">
                                  <option value="">Select Bus Type</option>
                                    <?php
                                      foreach($bus_type_data as $bus_type_info) 
                                      { 
                                    ?>
                                  <option value="<?php echo $bus_type_info['id']; ?>"><?php echo $bus_type_info['ac_non_ac']; ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" class="form-control" name="bus_type_5" id="bus_type_5" placeholder=""> -->
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rate_5" id="rate_5" placeholder="Enter Rate">
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                        </div>

                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="bus_submit" value="submit">Submit</button>
                  <a href="<?php echo $module_url_path; ?>/add_bus_kilometer_rates"><button type="button" class="btn btn-danger">Cancel</button></a>
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
