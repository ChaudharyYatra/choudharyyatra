<style>
	table.dataTable{
		border-collapse: collapse !important;
	}
</style>

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
                <table id="example2" class="table table-bordered table-hover">
                  <tr>
					          <th>Arrange Id</th>
                    <td><?php echo $info['arrange_id']; ?></td>
					          <th>City Name</th>
                    <td><?php echo $info['city']; ?></td>
                    <th>Department</th>
                    <td><?php echo $info['department']; ?></td>

                  </tr>
                  
                  <tr>
					  
                    <th>Booking Centre</th>
                    <td><?php echo $info['booking_center']; ?></td>
                      
                    <th>Agent Name</th>
                    <td><?php echo $info['agent_name']; ?></td>
					  
                    <th>Agency Name</th>
                    <td><?php echo $info['fld_agency_name']; ?></td>

                  </tr>

                  <tr>
					  
                    <th>Email Address</th>
                    <td><?php echo $info['email']; ?></td>

                    <th>Password</th>
                    <td><?php echo $info['password']; ?></td>
					  
                    <th>Mobile Number 1</th>
                    <td><?php echo $info['mobile_number1']; ?></td>

                  </tr>

                  <tr>

                    <th>Mobile_number 2</th>
                    <td><?php echo $info['mobile_number2']; ?></td>

                    <th>PAN Card</th>
                    <td><?php echo $info['fld_pan_number']; ?></td>

                    <th>Office Address</th>
                    <td><?php echo $info['fld_office_address']; ?></td>

                  </tr>

                  <tr> 
                    
                    <th>Company GST Number</th>
                    <td><?php echo $info['fld_GST_number']; ?></td>

                    <th>Registration Date</th>
                    <td><?php echo $info['fld_registration_date']; ?></td>

                    <th>Photo</th>
                    <td><img src="<?php echo base_url(); ?>uploads/agent_photo/<?php echo $info['image_name']; ?>" width="20%;" height="20%;" alt="Agent Image"></td>

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
