<style>
  .btn{
    padding: 2px 5px !important;
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
                    <th>Vehicle RTO Registration No.</th>
                    <th>Vehicle Bus Type</th>
                    <th>Vehicle Name</th>
				            <th>Vehicle Fuel</th>
                    <th>Vehicle Brand</th>
                    <th>Seat Capacity</th>
                    <th>Vehicle Model</th>
                    <th>Status</th>
                    <!-- <th>Is Active?</th> -->
                    <th>Action</th>
                    <th>Action</th>
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
					          <td><?php echo $info['registration_number'] ?></td>
					          <td><?php echo $info['bus_type'] ?></td>
					          <td><?php echo $info['vehicle_type_name'] ?></td>
                    <td><?php echo $info['vehicle_fuel_name'] ?></td>
                    <td><?php echo $info['vehicle_brand_name'] ?></td>
                    <td><?php echo $info['seat_capacity'] ?></td>
                    <td><?php echo $info['vehicle_model'] ?></td>
                    <td>
                    <?php 
                    if($info['added_by']!='admin' || $info['added_by']=='owner')
                    { echo $info['status'];  
                      
                      } else{  echo 'Not Applicable'; 
                        
                    } ?>
                  
                  </td>
                    <td>

                        <?php 
                        if($info['added_by']!='admin' || $info['added_by']=='owner')
                        {
                        if($info['is_active']=='no' && $info['is_active']!='')
                          {
                        ?>

                        <?php if($info['document_checker_name']!=''){?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							          echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><button class="btn btn-primary">Approved</button></a>
                        <?php } else {?>
                          <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							          echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><button class="btn btn-primary" disabled>Approved</button></a>
                        <?php } ?>
                        <?php } 
                        else if($info['is_active']=='yes' && $info['is_active']!=''){
                          ?> 
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							          echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><button class="btn btn-primary" disabled>Disapproved</button> </a>
                        <?php } 
                        else if($info['is_active']=''){
                          ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
                        echo rtrim($aid, '=') ?>"><i class="fa fa-thumbs-up"></i> </a>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
                        echo rtrim($aid, '=') ?>"><i class="fa fa-thumbs-down"></i> </a>
                          <?php } 
                        //}else if($info['status']=='pending'){
                        ?>
                        
                        <br>
                        <a href="<?php echo $module_url_path;?>/details/<?php $aid=base64_encode($info['id']); echo rtrim($aid, '='); ?>
                      " ><button type="button" class="btn btn-primary mt-1">Documents</button></a> 
                        <?php }else if($info['added_by']!='owner' || $info['added_by']=='admin')
                        {
                          echo "Not Applicable";
                        }
                          ?>
                    </td>

                    <td>
                      
                    <?php if ($info['status'] == 'approved') { ?>
                        <a href="<?php echo $module_url_path; ?>/add_seat_preference/<?php $aid = base64_encode($info['id']); echo rtrim($aid, '='); ?>">
                            <button type="button" class="btn btn-primary">View</button>
                        </a>
                    <?php } else if ($info['added_by'] == 'admin') { ?>
                        <p>Not Applicable</p>
                    <?php } else { ?>
                        <a href="<?php echo $module_url_path; ?>/add_seat_preference/<?php $aid = base64_encode($info['id']); echo rtrim($aid, '='); ?>">
                            <button type="button" class="btn btn-primary" disabled>View</button>
                        </a>
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
