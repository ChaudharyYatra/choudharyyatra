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
				  <th>Ledger Name</th>
                  <td><?php echo $info['ledger_name']; ?></td>

                  <th>Ledger Description</th>
                  <td><?php echo $info['ledger_description']; ?></td>

                  <th>Ledger Group</th>
                  <td><?php echo $info['ledger_group']; ?></td>
                  </tr>
                  <tr>
				  <th>Address</th>
                  <td><?php echo $info['ledger_address']; ?></td>

                  <th>Contact Information</th>
                  <td><?php echo $info['contact_information']; ?></td>

                  <th>Currency</th>
                  <td><?php echo $info['ledger_Currency']; ?></td>
                  </tr>
                  <tr>
				  <th>Bank Details</th>
                  <td><?php echo $info['ledger_bank_details']; ?></td>
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
