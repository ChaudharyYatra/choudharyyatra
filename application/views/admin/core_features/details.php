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
                    <th>Feature one title</th>
                    <td><?php echo $info['feature_one_title']; ?></td>

                    <th>Feature one description</th>
                    <td><?php echo $info['feature_one_description']; ?></td>
                     
                  </tr>

                  <tr>
					   
                    <th>Feature two title</th>
                    <td><?php echo $info['feature_two_title']; ?></td>
                  <th>Feature two description</th>
                    <td><?php echo $info['feature_two_description']; ?></td>

                    
                  </tr>

                  <tr>
					  
                    <th>Feature three title</th>
                    <td><?php echo $info['feature_three_title']; ?></td>

                    <th>Feature three description</th>
                    <td><?php echo $info['feature_three_description']; ?></td>
					 
                  </tr>
					
					 <tr>
					
                    <th>Feature four title</th>
                    <td><?php echo $info['feature_four_title']; ?></td>

                    <th>Feature four description</th>
                    <td><?php echo $info['feature_four_description']; ?></td>
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
