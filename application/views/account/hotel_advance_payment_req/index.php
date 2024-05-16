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
              <?php $this->load->view('tour_operation_manager/layout/tour_operation_manager_alert'); ?>
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <?php  if(count($arr_data) > 0 ) 
                { ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>package_type</th>
                    <th>tour_number</th>
                    <th>hotel_name</th>
                    <th>advance_amt</th>
                    <!-- <th>Is Active?</th> -->
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
                    <td><?php echo $info['package_type'] ?></td>
                    <td><?php echo $info['tour_title'] ?></td>
                    <td><?php echo $info['hotel_name'] ?></td>
                    <td><?php echo $info['advance_amt'] ?></td>


                    <td>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $i; ?>" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm" class="dropdown-item">Send</button> </a>
                    </td>
                    
                    
                  </tr>

                  <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Payment Send Details</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="<?php echo $module_url_path;?>/advance_pay_send" enctype="multipart/form-data">
                            <div class="col-md-12">
                              <div class="row">
                                <input type="hidden" class="form-control" name="advance_pay_req_id" id="advance_pay_req_id" value="<?php echo $info['id']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Payment Date:</label> 
                                  <input type="date" class="form-control" name="payment_date" id="payment_date" max="<?php echo date("Y-m-d"); ?>" required>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Payment Mode</label>
                                    <div class="input-group">
                                        <select class="form-control niceSelect" name="payment_mode" id="payment_mode" onfocus='this.size=4;' onblur='this.size=1;' 
                                            onchange='this.size=1; this.blur();' required="required">
                                            <option value="">Select payment mode</option>
                                            <option value="UPI">UPI</option>
                                            <option value="CASH">CASH</option>
                                            <option value="NEFT">NEFT</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Transaction Id:</label> 
                                  <input type="text" class="form-control" name="transaction_id" id="transaction_id" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>

                                <div class="col-md-7">
                                  <div class="form-group">
                                    <label>Upload Image</label><br>
                                    <input type="file" name="image_name" id="image_name">
                                  </div>
                                </div>
                              


                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a onclick="return confirm('Are You Sure You Want To send ?')" href="<?php echo $module_url_path;?>/advance_pay_send/"><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></a>
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
