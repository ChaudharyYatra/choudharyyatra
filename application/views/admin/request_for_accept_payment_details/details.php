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
                    <th>Mobile Number</th>
                    <th>Bank Name</th>
                    <th>Account Name</th>
                    <th>UPI App Name</th>
                    <th>UPI Id</th>
                    <th>Upload QR Image</th>
                    <th>Request Date</th>
                    <th>status</th>
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
					<td><?php echo $info['mobile_number'] ?></td>
					<td><?php echo $info['bank_name'] ?></td>
					<td><?php echo $info['account_number'] ?></td>
					<td><?php echo $info['payment_app_name'] ?></td>
					<td><?php echo $info['upi_id'] ?></td>
					<td><img src="<?php echo base_url(); ?>uploads/QR_code_image/<?php echo $info['qr_code_image']; ?>" width="80px;" height="70px;" alt="QR Image"></td>
					<td><?php echo date("d-m-Y",strtotime($info['qr_add_creat_date'])) ?></td>
					<td><?php if($info['status']=='no' && $info['reject_remark'] != ''){
                        echo 'Disapproved'; ?>
                    <?php } else if($info['status']=='yes'){  
                        echo 'Approved'; ?>
                    <?php } else{ 
                        echo 'Pending';?>
                    <?php } ?>
                    </td>
                    <td>
                    <?php 
                        if($info['status']=='no')
                          {
                        ?>
                        <!-- <a href="<?php //echo $module_url_path ?>/active_inactive/<?php //$aid=base64_encode($info['id']); 
                      //echo rtrim($aid, '=').'/'.$info['status']; ?>/<?php //$did=base64_encode($info['qr_add_more_id']); 
                      //echo rtrim($did, '=')?>"><button class="btn btn-success btn-sm">Approved</button></a> -->

                      <a href="<?php echo $module_url_path ?>/active_inactive/<?php echo $info['id'].'/'.$info['status']; ?>/<?php echo $info['qr_add_more_id']; ?>"><button class="btn btn-success btn-sm">Approved</button></a>
                                <?php } else { ?>
                                <a data-toggle="modal" data-target="#myModal<?php echo $i; ?>"><button class="btn btn-danger btn-sm">Disapproved</button></a>
                                <?php } ?>
                    </td>
                  </tr>

                  <!-- <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php //echo $i; ?>" class="enq_id" data-bs-whatever="Form" data-enq-id="<?php //echo $enq_id;?>"><button type="button" class="btn btn-primary btn-sm btn_follow take_followup_btn" class="dropdown-item">Take Followup</button> </a> -->
                  <!-- id="exampleModal<?php //echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" -->

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
                                <textarea class="form-control" name="reject_reason" id="reject_reason" required></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button> -->
                            <a onclick="return confirm('Are You Sure You Want To submit This Follow Up Record?')" href="<?php echo $module_url_path;?>/add"><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></a>
                          </div>
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
