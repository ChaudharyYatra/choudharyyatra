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
                  <?php  if(count($arr_data) > 0 ) 
              { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <!-- <th>Full Name</th> -->
                    <!-- <th>Role Name</th>
                    <th>Other Role Name</th> -->
                    <th>Mobile Number</th>
                    <th>Bank Name</th>
                    <th>Account Number</th>
                    <th>UPI App Name</th>
                    <th>UPI Id</th>
                    <!-- <th>Is Active?</th> -->
                    <th>Status</th>
                    <th>Reject Reason</th>
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
                    <td><?php echo $info['mobile_number'] ?></td> 
                    <td><?php echo $info['bank_name'] ?></td>
                    <td><?php echo $info['account_number'] ?></td>
                    <td><?php echo $info['payment_app_name'] ?></td>
                    <td><?php echo $info['upi_id'] ?></td>
                    <!-- <td>
                      <img src="<?php //echo base_url(); ?>uploads/QR_code_image/<?php //echo $info['qr_code_image']; ?>" width="90px;" height="60px;" alt="Image"><br>
                      <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php //echo base_url(); ?>uploads/QR_code_image/<?php //echo $info['qr_code_image']; ?>">Download</a>
                    </td> -->

                    <!-- <td>
                        <?php 
                        //if($info['qr_code_is_active']=='yes')
                          //{
                        ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //$aid=base64_encode($info['qr_add_more_id']); 
							            //echo rtrim($aid, '=').'/'.$info['qr_code_is_active']; ?>"><button class="btn btn-success btn-sm">YES</button></a>
                        <?php //} else { ?>
                        <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //$aid=base64_encode($info['qr_add_more_id']); 
							            //echo rtrim($aid, '=').'/'.$info['qr_code_is_active']; ?>"><button class="btn btn-danger btn-sm">NO</button> </a>
                        <?php //} ?>
                    </td> -->

                    <td><?php if($info['status']=='no' && $info['reject_remark'] != ''){
                        echo 'Disapproved'; ?>
                    <?php } else if($info['status']=='yes'){  
                        echo 'Approved'; ?>
                    <?php } else{ 
                        echo 'Pending';?>
                    <?php } ?>
                    </td>
                    
                    <td><?php 
                    if($info['status'] == 'no' && $info['reject_remark'] != ''){ 
                       ?>
                    <a data-toggle="modal" data-target="#myModal<?php echo $i; ?>"><button class="btn btn-primary btn-sm">view</button></a>
                    <?php }else if($info['status'] == 'yes'){
                      echo '--'; ?>
                    <?php } else{ 
                      echo '--';?>
                    <?php } ?>
                    </td>

                    <td>
                          <a href="<?php echo $module_url_path;?>/edit/<?php $aid=base64_encode($info['qr_add_more_id']); 
					   echo rtrim($aid, '='); ?>/<?php $did=base64_encode($info['id']); 
             echo rtrim($did, '='); ?>" title="Update"><i class="fas fa-edit" aria-hidden="true" style="color:blue";></i></a> &nbsp;/&nbsp;
                          <a onclick="return confirm('Are You Sure You Want To Delete This Record?')" href="<?php echo $module_url_path;?>/delete/<?php $aid=base64_encode($info['qr_add_more_id']); 
					   echo rtrim($aid, '='); ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true" style="color:red";></i></a>
                    </td>
                  </tr>
                  

                  <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reject Reason</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="<?php echo $module_url_path;?>/add">
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-12">
                                <label class="col-form-label">Reason Remark:</label>
                                <input type="hidden" class="form-control" name="qr_id" id="qr_id" value="<?php echo $info['id'] ?>">
                                <input type="hidden" class="form-control" name="qr_add_more_id" id="qr_add_more_id" value="<?php echo $info['qr_add_more_id'] ?>">
                                <textarea readonly class="form-control" name="reject_reason" id="reject_reason" required><?php echo $info['reject_remark'] ?></textarea>
                              </div>
                            </div>
                          </div>
                          <!-- <div class="modal-footer"> -->
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button> -->
                            <!-- <a onclick="return confirm('Are You Sure You Want To submit This Follow Up Record?')" href="<?php //echo $module_url_path;?>/add"><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></a> -->
                          <!-- </div> -->
                        </form>
                      </div>
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
