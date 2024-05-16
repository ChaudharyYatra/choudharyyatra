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
                    <th>Academic Year</th>
                    <td><?php echo $info['year']; ?></td>
                      
                    <th>Package Title</th>
                    <td><?php echo $info['package_title']; ?></td>
                  </tr>

                  <tr>
                    <th>Tour Days</th>
                    <td><?php echo $info['tour_number_of_days']; ?></td>
                    
                    <th>Packages</th>
                    <td><?php 
                    $title=array();
                        $title = $temparray=explode(',',$info['package_id']);
                        $n=0;
                        $c=count($title);
                        for($i=0; $i<$c; $i++){
                           $id=$title[$i];
                           $no=$i+1;
                              $query=$this->db->query("SELECT tour_title FROM packages WHERE id='$id'");
                              $pack_data=$query->result_array();
                              echo $no.') '.$pack_data[$n]['tour_title'];
                              echo '<br>';
                        ?> 
                       <?php }
                     ?></td>
                  </tr>

                  <tr>
                     <th>Rating</th>
                    <td><?php echo $info['rating']; ?></td>
                    
                    <th>Image</th>
                    <td><img src="<?php echo base_url(); ?>uploads/package_mapping/<?php echo $info['image_name']; ?>" width="70px;" height="30px;" alt="Package Image"></td>
                  </tr>
                  
                   <tr>
                    <th>Cost</th>
                    <td>₹ <?php echo $info['cost']; ?></td>

                    <th>Description</th>
                    <td><?php echo $info['description']; ?></td>
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
