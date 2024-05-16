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
              <a href="<?php echo $module_url_path; ?>/add"><button class="btn btn-primary">Back</button></a>
              
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
                   foreach($tm_account_details as $tour_expenses_all_info) 
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
                    <th>Brank Name</th>
                    <td><?php echo $tour_expenses_all_info['bank_name']; ?></td>

                    <th>Account No.</th>
                    <td><?php echo $tour_expenses_all_info['account_no']; ?></td>

                    <th>Account Holder Name</th>
                    <td><?php echo $tour_expenses_all_info['acc_holder_nm']; ?></td>
                   </tr>

                   <tr>
                    <th>Branch Name</th>
                    <td><?php echo $tour_expenses_all_info['branch_name']; ?></td>

                    <th>Branch Code</th>
                    <td><?php echo $tour_expenses_all_info['branch_code']; ?></td>

                    <th>IFSC Code</th>
                    <td><?php echo $tour_expenses_all_info['ifsc_code']; ?></td>
                   </tr>

                   <tr>
                    <th>CIF No</th>
                    <td><?php echo $tour_expenses_all_info['cif_no']; ?></td>

                    <th>PAN No</th>
                    <td><?php echo $tour_expenses_all_info['pan_no']; ?></td>

                    <th>Aadhaar No</th>
                    <td><?php echo $tour_expenses_all_info['aadhaar_no']; ?></td>
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
