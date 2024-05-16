<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?></h1>
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
          <div class="col-md-12 col-sm-12">
            <!-- jquery validation -->
            <?php $this->load->view('admin/layout/admin_alert'); ?>
            <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <table id="" class="table table-bordered table-hover">
                  <tr>
				          <th>Product Name/Model</th>
                  <td><?php echo $info['product_name']; ?></td>

                  <th>Product Description</th>
                  <td><?php echo $info['product_description'] ?></td>
                  </tr>

                  <tr>
				          <th>Manufacturer</th>
                  <td><?php echo $info['manufacturer']; ?></td>

                  <th>Manufacturing Date</th>
                  <td><?php echo date("d-m-Y",strtotime($info['manufacturing_date'])); ?></td>
                  </tr>

                  <tr>
				          <th>Purchase Date</th>
                  <td><?php echo date("d-m-Y",strtotime($info['purchase_date'])); ?></td>

                  <th>Purchase Order Number</th>
                  <td><?php echo $info['purchase_order_no'] ?></td>
                  </tr>

                  <tr>
                  <th>Serial Number</th>
                  <td><?php echo $info['serial_number'] ?></td>

                  <th>Notes/Comments</th>
                  <td><?php echo $info['comments'] ?></td>
                  </tr>

                  </table>
              </div>
              
        <br>
        <div class="row">


            </div>
            <?php } ?>
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
