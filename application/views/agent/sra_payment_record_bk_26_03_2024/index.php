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
                    <th>SRA No</th>
                    <th>Customer Name</th>
                    <th>Tour No</th>
                    <th>Tour Date</th>
                    <th>Mobile Number</th>
                    <th>Paid Amount</th>
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
                    <td><?php echo $info['sra_no'] ?></td> 
                    <td><?php echo $info['customer_name'] ?></td> 
                    <td><?php echo $info['tour_number'] ?></td>
                    <td><?php echo $info['tour_date'] ?></td>
                    <td><?php echo $info['mobile_number'] ?></td>
                    <td><?php echo $info['booking_amt'] ?></td>
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
