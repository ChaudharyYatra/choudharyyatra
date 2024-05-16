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
              <a href="<?php echo $module_url_path; ?>/change_password"><button class="btn btn-primary">Change Password</button></a>
              
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
                <table id="example" class="table table-bordered table-hover">
                  <tr>
                    <th>Custom Agent Name</th>
                    <td><?php echo $info['name']; ?></td>

                    <th>Email Address</th>
                    <td><?php echo $info['email']; ?></td>
                  </tr>
                  <tr>
                    <th>Mobile Number</th>
                    <td><?php echo $info['mobile_number1']; ?></td>

                    <th>Password</th>
                    <td><?php echo $info['password']; ?></td>
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
