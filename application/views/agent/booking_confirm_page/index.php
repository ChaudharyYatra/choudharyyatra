<style>
    .cash_payment_div{
        border: 1px solid black;
        padding: 20px;
    }
    .card-image{
        height: 300px;
    }
    .button_css{
        margin-left:10px;
    } 
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1><?php //echo $module_title; ?></h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a> -->
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
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <!-- jquery validation -->
            <?php $this->load->view('agent/layout/agent_alert'); ?>
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                    <img src="<?php echo base_url(); ?>uploads/do_not_delete/Packages.png" class="card-img-top card-image" alt="Tour Image">
                    <div class="card-body">
                        <h2 class="mt-2">Booking Confirmed! 🎉✈️</h2>
                        <h5 class="mt-4">Your booking is confirmed. We will send your credentials to the provided mobile number and email address.</h5>
                    </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
            </div>

            <?php
                    foreach($agent_booking_enquiry_data as $agent_booking_enquiry_data_info) 
                    { 
                        $enquiry_id =  $agent_booking_enquiry_data_info['id'];
                    ?>
                        <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_booking_enquiry_data_info['id']; ?>">
                    <?php } ?>
            <div class="d-flex justify-content-center">
                <!-- <a href="<?php echo $module_booking_payment_details; ?>/index/<?php echo $enquiry_id; ?>"><button type="button" class="btn btn-primary mb-3 button_css" name="confirm_submit" id="confirm_submit">Procced for Receipt</button></a> -->
                <button type="button" class="btn btn-primary mb-3 button_css" data-toggle="modal" data-target="#confirmationModal">
                Proceed for Receipt
            </button>
            </div>

            <?php foreach($traveller_booking_info as $traveller_booking_info_value) 
              {  ?>
            <input type="hidden" class="form-control" name="package_date_id" id="package_date_id" value="<?php echo $traveller_booking_info_value['tour_date']; ?>">
            <input type="hidden" class="form-control" name="enquiry_id" id="enquiry_id" value="<?php echo $traveller_booking_info_value['domestic_enquiry_id']; ?>">
            <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $traveller_booking_info_value['pid']; ?>">
            <!-- <input readonly type="text" class="form-control" name="final_amt" id="final_amt" placeholder="Final amount" value="<?php echo $final_total ?>" required> -->
            <?php } ?>

            <?php  if(count($arr_data) > 0 ) 
              { ?>
                  <?php  
                  foreach($arr_data as $info) 
                  { 
                  ?>
                  <?php if($info['for_credentials']=='yes'){?>
                  <input type="hidden" class="form-control" name="traveller_id" id="traveller_id" value="<?php echo $info['id']; ?>">
                  <?php } ?>
                  <?php } ?>
              <?php } ?>

            <!-- Button to trigger the first modal -->
            
            <input type="hidden" class="form-control" name="booking_tm_mobile_no" id="booking_tm_mobile_no" minlength="10" maxlength="10" placeholder="Enter mobile number" value="<?php if(!empty($mob_no_booking_payment)){ echo $mob_no_booking_payment['booking_tm_mobile_no'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required onkeyup="validate()">

            
            <!-- First Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirmation Dialog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to proceed?</p>
                        </div>
                        <div class="modal-footer">
                            <!-- Open the second modal when clicking "No" -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#reasonModal">No</button>
                            <!-- Link to proceed if "Yes" is clicked -->
                            <a href="<?php echo $module_booking_payment_details; ?>/index/<?php echo $enquiry_id; ?>"><button type="button" class="btn btn-primary button_css" name="proceed_yes_submit" id="proceed_yes_submit">Yes</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Modal -->
            <div class="modal fade" id="reasonModal" tabindex="-1" role="dialog" aria-labelledby="reasonModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reasonModalLabel">Reason Dialog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="later_payment_reason">Please enter reason why traveler cannot proceed with Receipt:</label>
                            <textarea class="form-control select_css" name="later_payment_reason" id="later_payment_reason" required></textarea>
                            <input hidden type="radio" name="payment_now_later" id="payment_now_later" value="Later" checked>&nbsp;&nbsp;
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" name="reason_submit_button" value="submit_back" id="reason_submit_button">Submit & Proceed</button>
                            <!-- <button type="button" class="btn btn-success" id="submitReasonBtn">Submit</button> -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>


            
        </div>
        <div class="col-md-1"></div>

          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>





