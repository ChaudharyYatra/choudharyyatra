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
                    // print_r($info); die;
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
				          <th>Voucher Type</th>
                  <td><?php echo $info['voucher_type']; ?></td>

                  <th>Company Name</th>
                  <td><?php echo $info['company_name']; ?></td>

                  </tr>
                  <tr>
                  <th>Account Number</th>
                  <td><?php echo $info['account_no_id']; ?></td>

                  <th>Details</th>
                  <td><?php echo $info['expenses_details']; ?></td>
                  </tr>

                  <tr>
                  <?php if($info['tour_expenses_type'] == '1'){ ?>
                    <th>Amount</th>
                    <td><?php echo $info['single_total_amount']; ?></td>
                  <?php }else{ ?>
                    <th>Amount</th>
                    <td><?php echo $info['multiple_total_amount']; ?></td>
                  <?php }  ?>

                  <?php if($info['tour_expenses_type'] == '1'){ ?>
                      <th>Particular(for which expenses)</th>
                      <td> <?php echo $info['single_particular_expenses'];?> </td>
                  <!-- <?php //}else{ ?>
                      <th>Multiple Particular(for which expenses)</th>
                      <td> <?php //echo $info['particular_expenses'];?> </td> -->
                  <?php }  ?>
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


    <?php
    foreach($arr_data as $info) 
    { 
    // print_r($info); die;
    ?>
    <?php if($info['tour_expenses_type'] == '0')
    { ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Multiple Particular(for which expense)</th>
                    <th>Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                   $i=1; 
                   foreach($arr_data_details as $info)
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['particular_expenses'] ?></td>
                    <td><?php echo $info['amount'] ?></td>
                  </tr>
                  
                  <?php $i++; } ?>
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <?php } } ?>
  </div>
  

</body>
</html>
