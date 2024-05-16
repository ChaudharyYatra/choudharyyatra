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
                  <?php  if(count($driver_kilometer) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>City Name</th>
                    <th>Kilometer Update Photo</th>
                    <th>Is Active?</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($driver_kilometer as $info) 
                   { 
                    // print_r($info); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
					          <td><?php echo $info['city_name'] ?></td>
                    <td>                      
                      <img src="<?php echo base_url(); ?>uploads/driver_kilometer_update_photo/<?php echo $info['image_name']; ?>" width="70px;" height="30px;" alt="Slider Image">
                      <?php if(!empty($info['image_name'])){ ?>
                          <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/driver_kilometer_update_photo/<?php echo $info['image_name']; ?>">Download</a>
                          <input type="hidden" name="old_kilometer_image" id="old_kilometer_image" value="<?php if(!empty($info['image_name'])){echo $info['image_name'];}?>">
                      <?php } ?>
                    </td>
                    
                    <td>
                        <?php 
                        if($info['is_active']=='yes')
                          {
                        ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><button class="btn btn-success btn-sm">YES</button></a>
                        <?php } else { ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><button class="btn btn-danger btn-sm">NO</button> </a>
                        <?php } ?>
                    </td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <!-- <a href="<?php //echo $module_url_path;?>/details/<?php //$aid=base64_encode($info['id']); 
					                  //echo rtrim($aid, '='); ?>" ><button class="dropdown-item">View</button></a> -->
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
