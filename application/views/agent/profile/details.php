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
          <?php $this->load->view('agent/layout/agent_alert'); ?>
            <!-- jquery validation -->
            
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
              <table id="" class="table table-bordered">
              <tr>
                    <th>Agent Name</th>
                    <td><?php echo $info['agent_name']; ?></td>
                    <th>City Name</th>
                    <td><?php echo $info['city']; ?></td>
                    <th>Booking Center Name</th>
                    <td><?php echo $info['booking_center']; ?></td>
                  </tr>
                  <tr>
                    <th>Email Address</th>
                    <td><?php echo $info['email']; ?></td>
                    <th>Mobile Number 1</th>
                    <td><?php echo $info['mobile_number1']; ?></td>
                    <th>Mobile Number 2</th>
                    <td><?php echo $info['mobile_number2']; ?></td>
                  </tr>

                  <tr>
                    <th>Company GST Number</th>
                    <td><?php echo $info['fld_GST_number']; ?></td>
                    <th>PAN Card</th>
                    <td><?php echo $info['fld_pan_number']; ?></td>
                    <th>Flat No.</th>
                    <td><?php echo $info['flat_no']; ?></td>
                  </tr>

                  <tr>
                      
                    <th>Building / House Name</th>
                    <td><?php echo $info['building_house_nm']; ?></td>
					  
                    <th>Street Name</th>
                    <td><?php echo $info['street_name']; ?></td>

                    <th>Landmark</th>
                    <td><?php echo $info['landmark']; ?></td>

                  </tr>

                  <tr>
                      
                    <th>State</th>
                    <td><?php echo $info['state_name']; ?></td>
            
                    <th>District Name</th>
                    <td><?php echo $info['district']; ?></td>

                    <th>Taluka</th>
                    <td><?php echo $info['taluka']; ?></td>

                  </tr>

                  <tr>

                    <th>City</th>
                    <td><?php echo $info['city_name']; ?></td>
                    
                    <th>Registration Date</th>
                    <td><?php echo $info['fld_registration_date']; ?></td>
                    
                    <th>Photo</th>
                    <td><img src="<?php echo base_url(); ?>uploads/agent_photo/<?php echo $info['image_name']; ?>" width="40%;" height="40%;" alt="Agent Image"></td>

                    <th>QR Image Photo</th>
                    <td><img src="<?php echo base_url(); ?>uploads/QR_code_image/<?php echo $info['qr_code_image']; ?>" width="40%;" height="40%;" alt="QR Image"></td>
                  </tr>
                  <tr>
                    <th>UPI ID</th>
                    <td><?php echo $info['upi_id']; ?></td>
                  </tr>

                </table>
                
              </div>
              
        <br>
        <div class="row">
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <a href="<?php echo $module_url_path; ?>/edit/<?php echo $info['id']; ?>"><button class="btn btn-primary">Edit Profile</button></a>
              </ol>
          </div>
        
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