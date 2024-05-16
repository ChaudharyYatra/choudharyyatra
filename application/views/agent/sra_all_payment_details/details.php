<style>
    a {
    text-decoration: none !important;
    }
    .cash_payment_div{
        border: 1px solid red;
        padding: 10px;
    }

    .extrax_services_div{
        border: solid 1px #00000030;
        margin: 15px;
        padding: 10px;
    }

    .hide {
    display: none;
    }
    
    #least_count{
        font-weight:400;
        color:red;
    }
    #booking_least_count{
        font-weight:400;
        color:red;
    }

    #qr_code_image img{
        width:40%;
        height:40%;
    }
    #qr_mode_code_image img{
        width:100%;
        height:100%;
    }
    .enq_id{
        color:white;
    }
    .reason_css{
        background-color:rgba(0,0,0,.05) !important;
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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
            <div class="col-md-12">
            <!-- jquery validation -->
            <?php $this->load->view('agent/layout/agent_alert'); ?>

            <form method="post" enctype="multipart/form-data" id="final_booking_preview">

            <div class="card card-primary">
              <div class="card-header">
              <?php foreach($traveller_booking_info_header as $traveller_booking_info_value) 
                   {  ?>
                    <div class="row">
                    <div class="col-md-2">
                            <label>Tour No -</label>
                        </div>  
                        <div class="col-md-5">
                            <div><?php echo $traveller_booking_info_value['tour_number']; ?></div>
                        </div>
                        <div class="col-md-2">
                            <label>Customer Name -</label>
                        </div>
                        <div class="col-md-3">
                            <div><?php echo $traveller_booking_info_value['customer_name']; ?></div>
                        </div>
                        <div class="col-md-2">  
                            <label>Tour Date -</label>
                        </div>
                        <div class="col-md-5">  
                            <div><?php echo date('d-m-Y', strtotime($traveller_booking_info_value['journey_date'])); ?></div>
                        </div>
                        <div class="col-md-2">
                            <label>Mobile No -</label>
                        </div>
                        <div class="col-md-3">
                            <div><?php echo $traveller_booking_info_value['mobile_number']; ?></div>
                        </div>
                        <div class="col-md-2">
                          <label> Total Amount -</label>
                        </div>
                        <div class="col-md-3">
                          <div><?php echo $traveller_booking_info_value['total_sra_amt']; ?></div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <label> Total Seat -</label>
                        </div>
                        <div class="col-md-1">
                            <div><?php echo $traveller_booking_info_value['total_seat']; ?></div>
                        </div>
                        <input type="hidden" class="form-control" name="sra_no" id="sra_no" value="<?php echo $traveller_booking_info_value['sra_no']; ?>">
                        <input type="hidden" class="form-control" name="package_date_id" id="package_date_id" value="<?php echo $traveller_booking_info_value['tour_date']; ?>">
                        <input type="hidden" class="form-control" name="sra_payment_id" id="sra_payment_id" value="<?php echo $traveller_booking_info_value['id']; ?>">
                        <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $traveller_booking_info_value['tour_number']; ?>">
                        <!-- <input type="hidden" class="form-control" name="booking_ref_no" id="booking_ref_no" value=""> -->
                    </div>
              </div>
                <?php } ?>
                <input type="hidden" class="form-control" name="booking_payment_details_id" id="booking_payment_details_id" value="<?php if(isset($booking_payment_details)){echo $booking_payment_details['id'];} ?> ">
                <input type="hidden" class="form-control" name="return_customer_booking_payment_id" id="return_customer_booking_payment_id" value="<?php if(isset($return_customer_booking_payment_details)){echo $return_customer_booking_payment_details['id'];} ?>">
                <div class="card-body">
                    <?php  if(count($booking_payment_details_all) > 0 ) 
                    { ?>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>SN</th>
                        <th>Payment Date</th>
                        <th>Paid Amount</th>
                        <th>Pending Amount</th>
                        <th>Transaction Type</th>
                        <th>UPI No/Acc No</th>
                        <th>Payment Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                        
                        $i=1; 
                        foreach($booking_payment_details_all as $info) 
                        // print_r($info);
                        { 
                        ?>
                        <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo date("d-m-Y",strtotime($info['created_at'])) ?></td>
                        <td><?php echo $info['booking_amt'] ?></td>
                        <td><?php echo $info['pending_amt'] ?></td>
                        
                        <td>
                        <?php if($info['select_transaction']== 'CASH' || $info['select_transaction']== 'UPI' || $info['select_transaction']== 'QR Code' || $info['select_transaction']== 'Cheque' || $info['select_transaction']== 'Net Banking'){
                                echo $info['select_transaction']; ?> 
                        <?php }else{
                                echo $info['payment_now_later'] ?>
                        <?php } ?>
                        </td>
                        
                        <td>
                            <?php if($info['select_transaction'] == 'UPI'){
                            echo $info['UPI_transaction_no'];
                            ?>
                            <?php }else if($info['select_transaction'] == 'QR Code'){
                            echo $info['QR_transaction_no'];
                            ?>
                            <?php } else if($info['select_transaction'] == 'Cheque'){
                            echo $info['cheque'];    
                            ?>
                            <?php } else if($info['select_transaction'] == 'Net Banking'){
                            echo $info['net_banking_acc_no'];
                            ?>
                            <?php }else{
                            echo '-';
                            ?>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($info['payment_type']== 'Advance' || $info['payment_type']== 'Part' || $info['payment_type']== 'Full'){
                                echo $info['payment_type']; ?>
                            <?php } else{ 
                                echo $info['payment_reason']; ?>
                            <?php } ?>
                        </td>
                        </tr>
                        <?php $i++; } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>

                <!-- <div class="card-footer">
                <a href="<?php //echo $module_url_booking_process; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div> -->
              <!-- /.card-header -->
              <!-- form start -->
                
            
            <!-- /.card -->

                                            

                <!-- <div class="card-footer"> -->
                    <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button> -->
                    
                    <!-- <a onclick="return confirm('Are You Sure You Want Save This Record?')"><button type="submit" class="btn btn-warning" name="submit_back_preview" value="submit_back_preview" id="submit_back_preview">Back</button></a> -->
                    <!-- <a onclick="return confirm('Are You Sure You Want Save This Record?')" href="<?php //echo $module_url_path_back; ?>/add_bus/<?php //echo $enquiry_id; ?>"><button type="button" class="btn btn-warning" name="submit_back_preview" value="submit_back_preview" id="submit_back_preview">Back</button></a> -->
                    <!-- <a href="<?php //echo $module_url_path_back; ?>/add_bus/<?php //echo $enquiry_id; ?>/1"><button type="button" class="btn btn-warning" name="back_btn">Back</button></a> -->
                <!-- </div> -->
            </div>
            </form>
        </div>

            
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  

<!-- Modal -->
<div class="modal fade" id="exampleModal_send" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <?php foreach($traveller_booking_info as $traveller_booking_info_value) 
                    { ?>
                    <input type="hidden" class="form-control" name="enquiry_id" id="enquiry_id" value="<?php echo $traveller_booking_info_value['domestic_enquiry_id']?>">
                    <?php } ?>
                    <input type="file" name="image_name" id="image_nam">
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

<script>
    function show1(){
    document.getElementById('extra_services_div1').style.display = 'none';
    document.getElementById('extra_services_div2').style.display ='none';
    }
    function show2(){
    document.getElementById('extra_services_div1').style.display = 'block';
    document.getElementById('extra_services_div2').style.display = 'block';
    }
</script>