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
              <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
            <div class="card">
              <!--<div class="card-header">-->
              <!--  <h3 class="card-title">Add Slider Content</h3>-->
              <!--</div>-->
              <!-- /.card-header -->
              <div class="card-body">
                  <?php  
                  if(count($arr_data) > 0 ) 
                   {
                       ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SN</th>
                    <th>Package Type</th>
                    <th>Tour No / Name</th>
                    <th>Request Amount For More Fund</th>
                    <th>Approved / Disapproved</th>
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
                    <td><?php echo $info['package_type'] ?></td>
                    <td><?php echo $info['tour_number'] ?> - <?php echo $info['tour_title'] ?></td>
                    <td><?php echo $info['more_fund_amt'] ?></td>
                    <td><?php echo $info['status'] ?></td>

                    <?php if($info['status']== 'approved' && $info['Received_amt_status']== 'no'){?>
                      <td>
                      <a data-bs-toggle="modal" data-bs-target="#exampleModalone<?php echo $i; ?>" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm" class="dropdown-item">View details</button> </a>
                      </td>
                    <?php } else { ?>
                      <td>
                      <a data-bs-toggle="modal" data-bs-target="#exampleModalone<?php echo $i; ?>" data-bs-whatever="Form"><button type="button" class="btn btn-primary btn-sm" class="dropdown-item">Completed</button> </a>
                      </td>
                    <?php } ?>

                    
                    
                  </tr>

                  <div class="modal fade" id="exampleModalone<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Payment Send Details</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="<?php echo $module_url_path;?>/received_amt_from_acc" enctype="multipart/form-data">
                            <div class="col-md-12">
                              <div class="row">
                                <input type="hidden" class="form-control" name="tour_manager_id" id="tour_manager_id" value="<?php echo $info['tour_manager_id']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                <input type="hidden" class="form-control" name="tm_request_more_fund_id" id="tm_request_more_fund_id" value="<?php echo $info['id']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                <input type="hidden" class="form-control" name="account_pay_id" id="account_pay_id" value="<?php echo $info['acc_id']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Payment Date:</label> 
                                  <input type="date" readonly class="form-control" name="payment_date" id="payment_date" value="<?php echo $info['payment_date']; ?>" max="<?php echo date("Y-m-d"); ?>" required>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Payment Mode</label>
                                  <input type="text" class="form-control" name="payment_mode" id="payment_mode" readonly value="<?php echo $info['select_transaction']; ?>">
                                </div>

                                <?php if($info['select_transaction']=='UPI'){?>
                                  <div class="col-md-6" id="upi_no_div" style='display:block;'>
                                      <div class="form-group">
                                          <label>UPI No</label>
                                          <input type="text" readonly class="form-control" name="upi_no" id="upi_no" value="<?php echo $info['upi_no'];?>" placeholder="Enter UPI No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($info['select_transaction']=='Mobile Number'){?>
                                  <div class="col-md-6" id="mob_no_div" style='display:block;'>
                                      <div class="form-group">
                                          <label>Mobile No</label>
                                          <input type="text" readonly class="form-control" name="mob_no" id="mob_no" value="<?php echo $info['mob_no'];?>" placeholder="Enter Mob No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                      </div>
                                  </div>
                                <?php } ?>

                                <?php if($info['select_transaction']=='Bank Transfer'){?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Brank Name</label>
                                        <input type="text" readonly class="form-control" name="bank_name" id="bank_name" placeholder="Enter Bank Name" value="<?php echo $info['bank_name'];?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account No.</label>
                                        <input type="text" readonly class="form-control" name="acc_no" id="acc_no" placeholder="Enter Account No" value="<?php echo $info['account_no'];?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Holder Name</label>
                                        <input type="text" readonly class="form-control" name="acc_holder_nm" id="acc_holder_nm" value="<?php echo $info['acc_holder_nm'];?>" placeholder="Enter Account Holder Name">
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch Name</label>
                                        <input type="text" readonly class="form-control" name="branch_name" id="branch_name" value="<?php echo $info['branch_name'];?>" placeholder="Enter Branch Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch Code</label>
                                        <input type="text" readonly class="form-control" name="branch_code" id="branch_code" value="<?php echo $info['branch_code'];?>" placeholder="Enter Branch Code">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>IFSC Code</label>
                                        <input type="text" readonly class="form-control" name="ifsc_code" id="ifsc_code" value="<?php echo $info['ifsc_code'];?>" placeholder="Enter ifsc Code">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CIF No</label>
                                        <input type="text" readonly class="form-control" name="cif_no" id="cif_no" value="<?php echo $info['cif_no'];?>" placeholder="Enter cif_no">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PAN No</label>
                                        <input type="text" readonly class="form-control" name="pan_no" id="pan_no" value="<?php echo $info['pan_no'];?>" placeholder="Enter Pan Card No">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Aadhaar No</label>
                                        <input type="text" readonly class="form-control" name="aadhaar_no" id="aadhaar_no" value="<?php echo $info['aadhaar_no'];?>" placeholder="Enter Aadhaar No">
                                    </div>
                                </div>
                                  <?php } ?>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Transaction Id:</label> 
                                  <input type="text" readonly class="form-control" name="transaction_id" id="transaction_id" value="<?php echo $info['transaction_id'];?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Transaction Amount</label> 
                                  <input type="text" readonly class="form-control" name="transaction_amt" id="transaction_amt" value="<?php echo $info['transaction_amt'];?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>

                                <!-- <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Upload Image</label><br>
                                    <input type="file" name="image_name" id="image_name">
                                  </div>
                                </div> -->

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Uploaded Image</label><br>
                                    <?php if(!empty($info['image_name'])){ ?>
                                      <img src="<?php echo base_url(); ?>uploads/more_fund_amt_account/<?php echo $info['image_name']; ?>" width="30%">
                                      <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $info['image_name']; ?>">
                                    <?php } ?>
                                    <br>
                                    <?php if(!empty($info['image_name'])){ ?>
                                    <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/more_fund_amt_account/<?php echo $info['image_name']; ?>">Download</a>
                                    <?php } ?>
                                  </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label class="col-form-label">Received Amount From Accountant</label> 
                                  <input type="text" readonly class="form-control" name="received_amt_from_account" id="received_amt_from_account" value="<?php echo $info['received_amt_from_acc']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                                
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <!-- <a onclick="return confirm('Are You Sure You Want To send ?')" href="<?php //echo $module_url_path;?>/advance_pay_send/"><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></a> -->
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
