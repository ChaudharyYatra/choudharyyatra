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
              <!--<div class="card-header">-->
              <!--  <h3 class="card-title">Add Slider Content</h3>-->
              <!--</div>-->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Category Name</th>
                    <th>Rating</th>
                    <th>Cost</th>
                    <th>Description</th>
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
                    <td><?php echo $info['category_name'] ?></td>
                    <td><?php echo $info['rating'] ?></td>
                    <td><?php echo $info['cost'] ?></td>
                    <td><?php echo $info['description'] ?></td>
                    <td>
                      
                      <img src="<?php echo base_url(); ?>uploads/main_category/<?php echo $info['image_name']; ?>" width="70px;" height="30px;" alt="Slider Image">
                    </td>
                    <td>
                        <?php 
                        if($info['is_active']=='yes')
                          {
                        ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php echo $info['id'].'/'.$info['is_active']; ?>"><button class="btn btn-success btn-sm">YES</button></a>
                        <?php } else { ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php echo $info['id'].'/'.$info['is_active']; ?>"><button class="btn btn-danger btn-sm">NO</button> </a>
                        <?php } ?>
                    </td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <!--<a class="dropdown-item" href="#">View</a>-->
                          <button type="button" class="btn btn-default dropdown-item" data-toggle="modal" data-target="#modal-default">View</button>
                          <!--<a class="dropdown-item" href="#">Update</a>-->
                          <a href="<?php echo $module_url_path;?>/edit/<?php echo $info['id'];  ?>" ><button class="dropdown-item">Edit</button></a>
                          <a href="<?php echo $module_url_path;?>/delete/<?php echo $info['id']?>" onclick="return confirm_action(this,event,'Do you really want to delete this record?');"><button class="dropdown-item">Delete</button></a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  
                  
                  
                  
                 
      
      
      
                  <?php $i++; } ?>
                  </tbody>
                  
                </table>
                 <!--Modal For View Details-->
                  
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Slider Details</h4>
                        </div>
                        <div class="modal-body">
                          <table class="table table-bordered">
                                <tr>
                                  <td><strong>Title</strong></td>
                                  <td>Titl</td>
                                </tr>
                                <tr>
                                  <td><strong>Sub Title</strong></td>
                                  <td>sub ttl</td>
                                </tr>
                                <tr>
                                  <td><strong>Description</strong></td>
                                  <td>desc</td>
                                </tr>
                                <tr>
                                  <td><strong>Image</strong></td>
                                  <td><img src="1.png" alt="User Avatar" class="img-size-50"></td>
                                </tr>
                                <tr>
                                  <td><strong>Is Active ?</strong></td>
                                  <td><?php echo 'Yes'; ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div class="modal-footer justify-content-left">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
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
