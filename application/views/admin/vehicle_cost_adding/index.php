<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $module_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <?php foreach($arr_data2 as $info2) { ?>
              <?php 
                $tour_creation_id_encoded = rtrim(base64_encode($info2['id']), "=");
                $tour_no_of_days_encoded = rtrim(base64_encode($info2['tour_number_of_days']), "=");
              ?>
              <input type="hidden" name="tour_creation_id" value="<?php echo $tour_creation_id_encoded; ?>">
              <input type="hidden" name="tour_no_of_days" value="<?php echo $tour_no_of_days_encoded; ?>">
              
            <?php } ?>

            <ol class="breadcrumb float-sm-right">
                <a href="<?php echo $module_url_path; ?>/add/<?php echo $tour_creation_id_encoded; ?>/<?php echo $tour_no_of_days_encoded; ?>">
                    <button class="btn btn-primary">Add</button>
                </a>
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
                    <th>Vehicle Role</th>
                    <th>Per Km Rate</th>
                    <th>Is Active?</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                     ?>
                  <tr>
                  
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['vehicle_type_name'] ?></td>
                    <td><?php echo $info['per_km_rate'] ?></td>
                    <td>
                        <?php 
                        if($info['vehicle_cost_adding_is_active']=='yes')
                          {
                        ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php echo $info['tour_creation_id'];?>/<?php echo $info['tour_no_of_days'];?>/<?php echo $info['vehicle_cost_adding_id'].'/'.$info['vehicle_cost_adding_is_active']; ?>"><button class="btn btn-success btn-sm">YES</button></a>
                        <?php } else { ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php echo $info['tour_creation_id'];?>/<?php echo $info['tour_no_of_days'];?>/<?php echo $info['vehicle_cost_adding_id'].'/'.$info['vehicle_cost_adding_is_active']; ?>"><button class="btn btn-danger btn-sm">NO</button> </a>
                        <?php } ?>
                    </td>
                    <td>
                          <a href="<?php echo $module_url_path;?>/edit/<?php echo $info['vehicle_cost_adding_id'];?>/<?php echo $info['tour_creation_id'];?>/<?php echo $info['tour_no_of_days'];?>" title="Edit"><i class="fa fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp;
                          <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php echo $info['vehicle_cost_adding_id']; ?>/<?php echo $info['tour_creation_id'];?>/<?php echo $info['tour_no_of_days'];?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
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
