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
              <form method="post" enctype="multipart/form-data" id="edit_serial_number">
                <div class="card-body">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Name/Model</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $info['product_name']; ?>" placeholder="Enter product name"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Description</label>
                            <input type="text" class="form-control" name="product_description" id="product_description" value="<?php echo $info['product_description']; ?>" placeholder="Enter product description"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Manufacturer</label>
                            <input type="text" class="form-control" name="manufacturer" id="manufacturer" value="<?php echo $info['manufacturer']; ?>" placeholder="Enter manufacturer" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Manufacturing Date</label>
                            <input type="date" class="form-control" name="manufacturing_date" id="manufacturing_date" value="<?php echo $info['manufacturing_date']; ?>" placeholder="Enter manufacturing date"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Purchase Date</label>
                            <input type="date" class="form-control" name="purchase_date" id="purchase_date" value="<?php echo $info['purchase_date']; ?>" placeholder="Enter purchase date"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Purchase Order Number</label>
                            <input type="text" class="form-control" name="purchase_order_no" id="purchase_order_no" value="<?php echo $info['purchase_order_no']; ?>" placeholder="Enter purchase order number"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Serial Number</label>
                            <input type="text" class="form-control" name="serial_number" id="serial_number" value="<?php echo $info['serial_number']; ?>" placeholder="Enter serial number"  required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Notes/Comments</label>
                            <input type="text" class="form-control" name="comments" id="comments" value="<?php echo $info['comments']; ?>" placeholder="Enter comments"  required="required">
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
