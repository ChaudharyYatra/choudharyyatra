
<style>
  .btn_css{
    padding:5px;
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
              <a href="<?php echo $module_url_path; ?>/index/<?php echo $agent_id;?>"><button class="btn btn-primary">Back</button></a>
              
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
                    <th>Traveller Name</th>
                    <th>Package Name</th>
                    <th>Package Date</th>
                    <th>Booking Date</th>
                    <th>Booking Reference No</th>
                    <th>Booking Payment Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  
                  
                   $i=1; 
                   foreach($arr_data as $info) 
                   { 
                    // print_r($arr_data); die;
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $info['first_name'] ?> <?php echo $info['middle_name'] ?> <?php echo $info['last_name'] ?></td>
                    <td><?php echo $info['tour_title'] ?></td>
                    <td><?php echo date("d-m-Y",strtotime($info['journey_date'])); ?></td>
                    <td><?php echo date("d-m-Y",strtotime($info['booking_date'])); ?></td>
                    <td><?php echo $info['booking_reference_no'] ?></td>
                    <td><?php echo $info['payment_confirmed_status'] ?></td>
                    

                    <td>
                    <a href="<?php echo $module_url_path;?>/details/<?php echo $info['enquiry_id']; ?>" ><button type="button" class="btn btn-primary btn_css">View</button></a>
                    <!-- <a href="<?php //echo $module_pay_pending_amt;?>/index/<?php //echo $info['enquiry_id']; ?>" ><button type="button" class="btn btn-primary btn_css mt-1">Payment</button></a> -->
                    </td>
                  </tr>
                  

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal_send<?php echo $info['enquiry_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <form method="post" action="<?php echo $module_url_path;?>/edit" enctype="multipart/form-data">

                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">SRS form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                    <label>Upload SRS Image / PDF</label><br>
                                    <input type="hidden" class="form-control" name="enquiry_id" id="enquiry_id" value="<?php echo $info['enquiry_id']?>">
                                    <input type="hidden" class="form-control" name="package_date_id" id="package_date_id" value="<?php echo $info['package_date_id']?>">
                                    
                                    <input type="file" name="image_name" id="image_nam" required>
                                    <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                                    <br>
                                    <span class="text-danger" id="img_size" style="display:none;">Image Size Should Be Less Than 2 MB.</span>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <label class="col-form-label">Comment:</label>
                                  <textarea class="form-control" name="srs_remark" id="srs_remark"></textarea>
                                  
                                </div>
                              </div>
                            </div>
                            <!-- <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit" name="submit" value="send">Send</button>
                            </div> -->
                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary d-flex justify-content-center" id="submit_doc" name="submit_doc" value="send">Send</button>
                      </div>
                    </div>

                    </form>
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



    

 
  
  