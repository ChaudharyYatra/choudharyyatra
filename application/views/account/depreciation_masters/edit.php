<style>
  .mealplan_css{
            border: 1px solid red !important;
        }
</style>
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
                   foreach($qr_code_master_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_depreciation_master">
                <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Asset Name</label>
                            <input type="text" class="form-control" name="asset_name" id="asset_name" value="<?php echo $info['asset_name']; ?>" placeholder="Enter asset name"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Depreciation Rate</label>
                            <input type="text" class="form-control" name="depreciation_rate" id="depreciation_rate" value="<?php echo $info['depreciation_rate']; ?>" placeholder="Enter depreciation rate" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Depreciation Start Date</label>
                            <input type="date" class="form-control" name="depreciation_start_date" id="depreciation_start_date" value="<?php echo $info['depreciation_start_date']; ?>" placeholder="Enter depreciation start date" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Depreciation End Date</label>
                            <input type="date" class="form-control" name="depreciation_end_date" id="depreciation_end_date" value="<?php echo $info['depreciation_end_date']; ?>" placeholder="Enter depreciation end date"  required="required">
                        </div>
                    </div>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
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
  

</body>
</html>
