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
					          <th>Company Name</th>
                    <td><?php echo $info['company_name']; ?></td>

				            <th>Mobile Number</th>
                    <td><?php echo $info['mobile_number']; ?></td>
                  </tr>
                  
                  <tr>
                    <th>Email Address</th>
                    <td><?php echo $info['email_address']; ?></td>

                    <th>Company Address</th>
                    <td><?php echo $info['comp_address']; ?></td>
                  </tr>

                  <tr>
                    <th>GST Number</th>
                    <td><?php echo $info['gst_no']; ?></td>

                    <th>UPI Number</th>
                    <td><?php echo $info['upi_no']; ?></td>
                  </tr>

                  <tr>
                    <th>PAN Number</th>
                    <td><?php echo $info['pan_no']; ?></td>

                    <th>Bank Name</th>
                    <td><?php echo $info['bank_name']; ?></td>
                  </tr>

                  <tr>
                    <th>Account Number</th>
                    <td><?php echo $info['acc_no']; ?></td>

                    <th>Account Holder Name</th>
                    <td><?php echo $info['acc_holder_name']; ?></td>
                  </tr>

                  <tr>
                    <th>IFSC Code</th>
                    <td><?php echo $info['ifsc_code']; ?></td>

                    <th>MICR Code</th>
                    <td><?php echo $info['micr_code']; ?></td>
                  </tr>

                  <tr>
                    <th>Branch Name</th>
                    <td><?php echo $info['branch_name']; ?></td>
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
