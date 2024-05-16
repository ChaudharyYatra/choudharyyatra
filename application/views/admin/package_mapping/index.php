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
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Package Title</th>
                    <th>Academic Year</th>
                    <th>Packages</th>
                    <th>Package Starting From Cost</th>
                    <th>Image</th>
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
                    <td><?php echo $info['package_title'] ?></td>
                    <td><?php echo $info['year'] ?></td>
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
                     ?>
                     </td>
                    <td>₹ <?php echo $info['cost'] ?></td>
                    <td>
                      <img src="<?php echo base_url(); ?>uploads/package_mapping/<?php echo $info['image_name']; ?>" width="70px;" height="30px;" alt="Package Image">
                    </td>
                    <td>
                        <?php 
                        if($info['is_active']=='yes')
                          {
                        ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php echo $info['id'].'/'.$info['is_active']; ?>">
                            <button class="btn btn-success btn-sm">YES</button></a>
                        <?php } else { ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php echo $info['id'].'/'.$info['is_active']; ?>"><button class="btn btn-danger btn-sm">NO</button> </a>
                        <?php } ?>
                        
                    </td>
                    <td>
                          <a href="<?php echo $module_url_path;?>/details/<?php echo $info['id'];  ?>" title="View"><i class="fas fa-eye" aria-hidden="true" style="color:black";></i></a> &nbsp;/&nbsp;
                          <a href="<?php echo $module_url_path;?>/edit/<?php echo $info['id'];  ?>" title="Update"><i class="fas fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp;
                          <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php echo $info['id']; ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
                        
                    </td>
                  </tr>
      
                  <?php $i++; } ?>
                  </tbody>
                </table>
               <?php } else
                {echo '<div class="alert alert-danger alert-dismissable">
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
