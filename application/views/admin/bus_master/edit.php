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
              <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Bus Number</label>
                    </div>

                    <div class="col-md-4">
                      <label>Bus Seat Count</label>
                    </div>
                    
                    <div class="col-md-4">
                    <label>Bus Type</label> :  
                    </div>

                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                    <input type="text" class="form-control" name="bus_number" id="department" placeholder="Enter Bus Number" required="required" value="<?php echo $info['bus_number']; ?>">

                    </div>
                    <div class="col-md-4">
                    <input type="text" class="form-control" name="bus_seat_count" id="department" placeholder="Enter Bus Seat Count" required="required" value="<?php echo $info['bus_seat_count']; ?>">

                    </div>
                    
                    <div class="col-md-4">
                      &nbsp;<input type="radio" id="bus_type_ac" name="bus_type" value="AC" <?php if(isset($info['bus_type'])){if($info['bus_type']=='AC') {echo'checked';}}?> required>&nbsp; AC 
                      &nbsp;&nbsp;&nbsp;<input type="radio" id="bus_type_non_ac" name="bus_type" value="Non-AC" <?php if(isset($info['bus_type'])){if($info['bus_type']=='Non-AC') {echo'checked';}}?> required>&nbsp; Non-AC 
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					<a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
