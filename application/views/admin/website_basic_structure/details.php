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
                    <th>Contact Number</th>
                    <td><?php echo $info['contact_number']; ?></td>
                      
                    <th>location</th>
                    <td><?php echo $info['location']; ?></td>
                  </tr>

                  <tr>
                    <th>Email Address</th>
                    <td><?php echo $info['email']; ?></td>
                    
                    <th>Facebook</th>
                    <td><?php echo $info['facebook_link']; ?></td>
                  </tr>

                  <tr>
                    <th>Twitter</th>
                    <td><?php echo $info['twitter_link']; ?></td>
                    
                    <th>Instagram</th>
                    <td><?php echo $info['instagram_link']; ?></td>
                  </tr>

                  <tr>
                    <th>LinkedIn</th>
                    <td><?php echo $info['linkedin_link']; ?></td>
                    
                    <th>Company Name</th>
                    <td><?php echo $info['company_name']; ?></td>
                  </tr>

                  <tr>
                    <th>Short Description</th>
                    <td><?php echo $info['short_description']; ?></td>
                    
                    <th>Website Logo</th>
                    <td><img src="<?php echo base_url(); ?>uploads/website_logo/<?php echo $info['image_name']; ?>" width="70px;" height="30px;" alt="Website Logo"></td>
                  </tr>

                  <tr>
                     <th>Website Map</th>
                    <td><?php echo $info['map']; ?></td>
                  </tr>
                  </table>
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
