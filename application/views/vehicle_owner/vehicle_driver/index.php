<style>
  .btn_color{
    text-decoration:none;
    color:white;
  }
</style>
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
              <a href="<?php echo $module_url_path; ?>/add"><button class="btn btn-primary">Add</button></a>
              
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
                  <?php  if(count($vehicle_driver) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Driver Name</th>
				    <th>Mobile Number 1</th>
                    <th>Mobile Number 2</th>
                    <th>Years Of Experience</th>
                    <th>Marital status</th>
                    <th>Licence Type</th>
                    <th>Status</th>
                    <th>Is Active?</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($vehicle_driver as $info) 
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
					<td><?php echo $info['driver_name'] ?></td>
                    <td><?php echo $info['mobile_number1'] ?></td>
                    <td><?php echo $info['mobile_number2'] ?></td>
                    <td><?php echo $info['year_experience'] ?></td>
                    <td><?php echo $info['marital_status'] ?></td>
                    <td><?php echo $info['licence_type'] ?></td>
                    <td><?php echo $info['status'] ?></td>
                    <td>
                        <?php 
                        if($info['is_active']=='yes')
                          {
                        ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><button class="btn btn-success btn-sm">YES</button></a>
                        <?php } else if($info['status']= 'pending' && $info['status']= 'rejected'){ ?>
                          <button class="btn btn-danger btn-sm" disabled><a class="btn_color" href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							echo rtrim($aid, '=').'/'.$info['is_active']; ?>">NO </a></button>
                        <?php } else if($info['status']= 'approved'){ ?>
                          <a class="btn_color" href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><button class="btn btn-danger btn-sm">NO</a></button> 
                        <?php } ?>
                    </td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a href="<?php echo $module_url_path;?>/details/<?php $aid=base64_encode($info['id']); 
					                  echo rtrim($aid, '='); ?>" ><button class="dropdown-item">View</button></a>
                          <a href="<?php echo $module_url_path;?>/edit/<?php $aid=base64_encode($info['id']); 
					                  echo rtrim($aid, '='); ?>" ><button class="dropdown-item">Edit</button></a>
                          <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php $aid=base64_encode($info['id']); 
					                  echo rtrim($aid, '='); ?>" title="Delete"><button class="dropdown-item">Delete</button></a>
                        </div>
                      </div>
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
