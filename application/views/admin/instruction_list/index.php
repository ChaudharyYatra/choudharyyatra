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
              <!-- <a href="<?php //echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a> -->
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <?php $this->load->view('admin/layout/admin_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <?php  if(count($arr_data) > 0 ) 
                { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Package Type</th>
					          <th>Tour Number</th>
                    <th>Tour Title</th>
                    <th>Package Cost</th>
                    <th>For Tour Manager</th>
                    <th>For Customer</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['package_type'] ?></td>
					          <td><?php echo $info['tour_number'] ?></td>
                    <td><?php echo $info['tour_title'] ?></td>
                      <?php if($info['cost']== 0) {?>
                    <td> On Demand </td>
                      <?php } else{
                        ?>
                    <td><?php echo $info['cost'] ?></td>
                      <?php }?>
                    <td>
                      <!-- <a href="<?php //echo $module_url_path;?>/add/<?php //echo $info['id']; ?>" title="Update"><button class="btn btn-primary">Add</button></a> -->
                      <?php if($info['instraction_status']== 'no') { ?>
                        <a href="<?php echo $module_url_path;?>/add/<?php echo $info['id']; ?>" title="Add"><button class="btn btn-primary">Add</button></a>
                      <?php } else{ ?>
                        <a href="<?php echo $module_url_path;?>/edit/<?php echo $info['id']; ?>" title="Update"><button class="btn btn-primary">Update</button></a>
                      <?php } ?>
                    </td>
                    <td>
                      <!-- <a href="<?php //echo $module_url_path;?>/add_for_customer/<?php //echo $info['id']; ?>" title="Add"><button class="btn btn-primary">Add</button></a> -->
                      <?php if($info['cust_instraction_status']== 'no') { ?>
                        <a href="<?php echo $module_url_path;?>/add_for_cust/<?php echo $info['id']; ?>" title="Add"><button class="btn btn-primary">Add</button></a>
                      <?php } else{ ?>
                        <a href="<?php echo $module_url_path;?>/edit_for_cust/<?php echo $info['id']; ?>" title="Update"><button class="btn btn-primary">Update</button></a>
                      <?php } ?>
                    </td>
                    
                    
                  </tr>
                  
                  <?php $i++; } ?>
                  
                  </tbody>
                  
                </table>
                <?php } else
                { echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <b>Alert!</b>
                Sorry No records available
                </div>' ; } ?>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
