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
					          <th>Office Name</th>
                    <td><?php echo $info['city']; ?></td>
                    <th>Region Name</th>
                    <td><?php echo $info['department']; ?></td>

                  </tr>
                  
                  <tr>
					  
                    <th>Booking Centre</th>
                    <td><?php echo $info['booking_center']; ?></td>

                    <th>Mobile Number 1</th>
                    <td><?php echo $info['mobile_number1']; ?></td>
					  
                    <th>Email Address</th>
                    <td><?php echo $info['email']; ?></td>

                  </tr>

                  <tr>
					  
                    <th>Flat No.</th>
                    <td><?php echo $info['flat_no']; ?></td>
                      
                    <th>Building / House Name</th>
                    <td><?php echo $info['building_house_nm']; ?></td>
					  
                    <th>Street Name</th>
                    <td><?php echo $info['street_name']; ?></td>

                  </tr>

                  <tr>
					  
                    <th>Landmark</th>
                    <td><?php echo $info['landmark']; ?></td>
                      
                    <th>State</th>
                    <td><?php echo $info['state_name']; ?></td>
            
                    <th>District Name</th>
                    <td><?php echo $info['district']; ?></td>

                  </tr>

                  <tr>
					  
                    <th>Taluka</th>
                    <td><?php echo $info['taluka']; ?></td>

                    <th>City</th>
                    <td><?php echo $info['city_name']; ?></td>
            
                    <th>Mobile Number 2</th>
                    <td><?php echo $info['mobile_number2']; ?></td>

                  </tr>

                  <tr>

                    <th>Mobile_number 3</th>
                    <td><?php echo $info['fld_mobile_number3']; ?></td>
					  
                    <th>Password</th>
                    <td><?php echo $info['password']; ?></td>

                    <th></th>
                    <td></td>
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
