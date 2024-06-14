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
                    <th>Kitchen Staff Name</th>
                    <td><?php echo $info['supervision_name']; ?></td>
                    <th>Email Address</th>
                    <td><?php echo $info['email']; ?></td>
                    <th>Contact Number</th>
                    <td><?php echo $info['mobile_number1']; ?></td>
                  </tr>
                  <!-- <tr>
                    <th>Email Address</th>
                    <td><?php //echo $info['email']; ?></td>
                    <th>Mobile Number 1</th>
                    <td><?php //echo $info['mobile_number1']; ?></td>
                    <th>Mobile Number 2</th>
                    <td><?php //echo $info['mobile_number2']; ?></td>
                  </tr>

                  <tr>
                    <th>Company GST Number</th>
                    <td><?php //echo $info['fld_GST_number']; ?></td>
                    <th>PAN Card</th>
                    <td><?php //echo $info['fld_pan_number']; ?></td>
                    <th>Office Address</th>
                    <td><?php //echo $info['fld_office_address']; ?></td>
                  </tr> -->

                  <!-- <tr>
                    <th>Registration Date</th>
                    <td><?php //echo $info['fld_registration_date']; ?></td>
                    <th> </th>
                    <td> </td>
                    <th>Photo</th>
                    <td><img src="<?php //echo base_url(); ?>uploads/agent_photo/<?php //echo $info['image_name']; ?>" width="20%;" height="20%;" alt="Agent Image"></td>
                  </tr> -->

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