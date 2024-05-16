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
                    <th>Driver Name</th>
                    <td><?php echo $info['driver_name']; ?></td>

                    <th>Mobile Number 1</th>
                    <td><?php echo $info['mobile_number1']; ?></td>
                      
                    <th>Mobile Number 2</th>
                    <td><?php echo $info['mobile_number2']; ?></td>
                  </tr>

                  <tr>
                    <th>Years Of Experience</th>
                    <td><?php echo $info['year_experience']; ?></td>

                    <th>Marital status</th>
                    <td><?php echo $info['marital_status']; ?></td>

                    <th>Licence Type</th>
                    <td><?php echo $info['licence_type']; ?></td>
                  </tr>

                  <tr>
                    <th>Upload licence Image(front)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/driver_licence_image/<?php echo $info['licence_image_front']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                    
                    <th>Upload licence Image(back)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/driver_licence_image/<?php echo $info['licence_image_back']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                  
                    <th>Upload Aadhaar Image(front)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/driver_aadhaar_image/<?php echo $info['aadhaar_image_front']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                </tr>

                  <tr>
                    <th>Upload Aadhaar Image(back)</th>
                    <td><img src="<?php echo base_url(); ?>uploads/driver_aadhaar_image/<?php echo $info['aadhaar_image_back']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                    
                    <th>Upload Profile Image</th>
                    <td><img src="<?php echo base_url(); ?>uploads/driver_profile_image/<?php echo $info['profile_image']; ?>" width="70px;" height="30px;" alt="Slider Image"></td>
                 
                    <th>Address</th>
                    <td><?php echo $info['address']; ?></td>
                </tr>

                <tr>
                    <th>Password</th>
                    <td><?php echo $info['password']; ?></td>
                    
                    <th>Confirm Password</th>
                    <td><?php echo $info['password']; ?></td>
                 
                    <th></th>
                    <td></td>
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