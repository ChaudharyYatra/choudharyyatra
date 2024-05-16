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
                    <th>Hotel Name</th>
                    <td><?php echo $info['hotel_name']; ?></td>
                    <th>Email</th>
                    <td><?php echo $info['email']; ?></td>
                    <th>Mobile Number 1</th>
                    <td><?php echo $info['mobile_number1']; ?></td>
                  </tr>
                  <tr>
                    <th>Mobile Number 2</th>
                    <td><?php echo $info['mobile_number2']; ?></td>
                    <th>Mobile Number 1</th>
                    <td><?php echo $info['mobile_number1']; ?></td>
                    <th>Landline</th>
                    <td><?php echo $info['landline']; ?></td>
                  </tr>

                  <tr>
                    <th>Hotel Address</th>
                    <td><?php echo $info['hotel_address']; ?></td>
                    <th></th>
                    <td></td>
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