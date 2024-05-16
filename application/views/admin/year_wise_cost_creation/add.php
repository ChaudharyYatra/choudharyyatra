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
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" id="add_year_wise_cost_creation">
                <div class="card-body">
                  <div class="row">

                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Slab Serial Number</label>
                        <input type="text" readonly class="form-control" name="slab_serial_number" id="slab_serial_number" placeholder="Enter Slab Serial Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $year_w_id; ?>"  required="required">
                      </div>
                  </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Travelling Year</label>
                            <select class="form-control" style="width: 100%;" name="travelling_year" id="travelling_year" required="required">
                                <option value="">Select Travelling Year</option>
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
                            <label>From Date</label>
                            <input type="date" class="form-control" name="from_date" id="from_date" placeholder="Enter From Dtae" required="required">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>To Date</label>
                            <input type="date" class="form-control" name="to_date" id="to_date" placeholder="Enter To Date" required="required">
                          </div>
                      </div>
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Count From Days</label>
                            <input type="text" class="form-control" name="from_days" id="from_days" placeholder="Enter Count From Days" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Count To Days</label>
                            <input type="text" class="form-control" name="to_days" id="to_days" placeholder="Enter Count To Days" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                          </div>
                      </div>

                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/add"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
