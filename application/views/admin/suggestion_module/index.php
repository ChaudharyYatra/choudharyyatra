
<style>
  .card_title {
    /* display: inline-block; */
    width: 50px;
    white-space: nowrap;
    overflow: hidden !important;
    text-overflow: ellipsis;
}
  </style>

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
                  <?php  if(count($suggestion_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>City</th>
                    <th>Other City Name</th>
                    <th>Tour Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Is Active?</th>
                    <th>Remark</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($suggestion_data as $info) 
                   { 
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $info['city_name'] ?></td>
                    <?php if($info['city']== 'Other'){?>
                    <td><?php echo $info['other_city'] ?></td>
                    <?php } else {?>
                      <td> <b>--</b> </td>
                    <?php } ?>
                    <td><?php echo $info['tour_number'] ?> - <?php echo $info['tour_title'] ?></td>
                    <td><?php echo mb_substr($info['description'], 0, 18) ?>...</td>
                    <td><?php echo $info['status'] ?></td>
                    <td>
                        <?php 
                        if($info['status']=='approved' || $info['status']=='rejected')
                        {
                        	
                        if($info['is_active']=='yes')
                          {
                        ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							            echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><i class="fa fa-thumbs-down"></i></a>
                        <?php } 
                        else { ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							            echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><i class="fa fa-thumbs-up"></i> </a>
                        <?php } 
                        }else if($info['status']=='pending'){
                        ?>
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							            echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><i class="fa fa-thumbs-down"></i></a> / 
                        <a href="<?php echo $module_url_path ?>/active_inactive/<?php $aid=base64_encode($info['id']); 
							            echo rtrim($aid, '=').'/'.$info['is_active']; ?>"><i class="fa fa-thumbs-up"></i> </a>
                        <?php } ?>
                    </td>
                        
                    <?php
                      if($info['admin_remark']==''){
                        ?>
                        <td>
                            <button type="button" class="btn btn-primary" name="remark" id="remark" data-toggle="modal" data-target="#exampleModal2_<?php echo $i; ?>">
                                Add Remark
                            </button>
                        </td>
                      <?php } else { ?>
                        <td class="card_title"><?php echo mb_substr($info['admin_remark'], 0, 18) ?>...</td>
                      <?php } ?>

                    
                    <td>
                          <a href="<?php echo $module_url_path;?>/details/<?php $aid=base64_encode($info['id']); 
					   echo rtrim($aid, '='); ?>" title="view"><i class="fas fa-eye" aria-hidden="true" style="color:black";></i></a> &nbsp;/&nbsp;
                          <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php $aid=base64_encode($info['id']); 
					   echo rtrim($aid, '='); ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
                          
                    </td>
                  </tr>

                  <!-- Modal -->
                <div class="modal fade" id="exampleModal2_<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Remark</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    <form method="post" action="<?php echo $module_url_path;?>/add_remark">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-12">
                                <label class="col-form-label">Follow Remark:</label>
                                <input type="hidden" name="suggestion_id" id="suggestion_id" value="<?php if(isset($info['id'])){ echo $info['id'];}?>">
                                <textarea class="form-control" name="admin_remark" id="admin_remark" required></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button> -->
                            <a onclick="return confirm('Are You Sure You Want To submit This Follow Up Record?')" href="<?php echo $module_url_path;?>/index/<?php echo $info['id']; ?>"><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></a>
                          </div>
                        </form>
                    </div>
                </div>
                </div>

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
