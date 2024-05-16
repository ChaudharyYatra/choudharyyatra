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
            <div class="col-md-12">
            <!-- jquery validation -->
            <?php $this->load->view('agent/layout/agent_alert'); ?>

            <form method="post" action="<?php echo base_url(); ?>agent/booking_preview/add" enctype="multipart/form-data" id="final_booking_preview">

            <div class="card card-primary">
                <div class="card-header">
                <?php foreach($traveller_booking_info as $traveller_booking_info_value) 
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
                            <div><?php echo date('d-m-Y', strtotime($traveller_booking_info_value['tour_date'])); ?></div>
                        </div>
                        <div class="col-md-2">
                            <label>Mobile No -</label>
                        </div>
                        <div class="col-md-3">
                            <div><?php echo $traveller_booking_info_value['mobile_number']; ?></div>
                        </div>
                        <div class="col-md-7">
                        </div>
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
                <?php } ?>
                
              </div>
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

                    <?php  if(count($bus_seat_book_data) > 0 ) 
                    { ?>
                        <?php  
                        
                        $i=1; 
                        $seat_total_cost=0;
                        foreach($bus_seat_book_data as $info) 
                        { 
                            $enquiry_id = $info['enquiry_id']; 
                        ?>
                        <?php $i++;
                        $seat_total_cost+=$info['seat_price'];
                    } ?>
                        
                            <?php $seat_total_cost = $seat_total_cost; ?>
                    <?php } ?>

                    <?php
                    foreach($seat_type_room_type_data as $seat_type_room_type_info) 
                    { 
                    ?>
                    <?php } ?>

                    <?php
                    foreach($seat_type_room_type_data as $info) 
                    { 
                    ?>
                        <?php $total_hotel_amount = $info['total_hotel_amount']; ?>

                    <?php } ?>

                <?php
                foreach($extra_services_details as $extra_services_details_value) 
                { 
                ?>
                <input type="hidden" class="form-control" name="extra_sevices_id" id="extra_sevices_id" value="<?php if(isset($extra_services_details_value)){echo $extra_services_details_value['id'];} ?>">
                <?php } ?>

                


                <input type="hidden" class="form-control" name="sra_booking_payment_details_id" id="sra_booking_payment_details_id" value="<?php if(isset($booking_payment_details)){echo $booking_payment_details['id'];} ?> ">
                <input type="hidden" class="form-control" name="return_customer_booking_payment_id" id="return_customer_booking_payment_id" value="<?php if(isset($return_customer_booking_payment_details)){echo $return_customer_booking_payment_details['id'];} ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <h5>Final Payment Details :</h5>
                            
                            <table id="example2" class="table table-bordered table-hover table-striped">
                            <?php foreach($traveller_booking_info as $traveller_booking_info_value) 
                            {  ?>
                                <tr>
                                    <th>Mobile Number For OTP</th>
                                    <td>
                                    <input type="text" class="form-control" name="sra_booking_tm_mobile_no" id="sra_booking_tm_mobile_no" minlength="10" maxlength="10" placeholder="Enter mobile number" value="<?php if(!empty($traveller_booking_info_value)){ echo $traveller_booking_info_value['mobile_number'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required onkeyup="mobile_number()">
                                    </td>
                                </tr>

                                <tr style="display:none;">
                                    <th>Mobile Number</th>
                                    <td>
                                    <input type="text" class="form-control" name="mobile_no" id="mobile_no" minlength="10" maxlength="10" placeholder="Enter mobile number" value="<?php if(!empty($traveller_booking_info_value)){ echo $traveller_booking_info_value['mobile_number'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required onkeyup="validate()">
                                    </td>
                                </tr>

                                <tr id="relation_row" style="display:none;">
                                    <th>Relation</th>
                                    <td>
                                    <select class="select_css" name="relation" id="relation" onkeyup="validate()">
                                        <option value="">Select</option>
                                        <?php
                                        foreach($relation_data as $relation_data_info){ 
                                        ?>
                                        <option value="<?php echo $relation_data_info['id'];?>" <?php if(isset($all_traveller_info_value['all_traveller_relation'])){if($relation_data_info['id'] == $all_traveller_info_value['all_traveller_relation']) {echo 'selected';}}?>><?php echo $relation_data_info['relation'];?></option>
                                        
                                        <?php } ?>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="relation" id="relation"  placeholder="Enter relation" required onkeyup="validate()"> -->
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Final Total</th>
                                    <?php //$final_total = $total_hotel_amount + $seat_total_cost; ?>
                                    <td><input readonly type="text" class="form-control" name="final_amt" id="final_amt" placeholder="Final amount" value="<?php echo $traveller_booking_info_value['total_sra_amt']; ?>" required></td>
                                </tr>
                                <?php } ?>
                                <tr id="payment_type_tr" style='display:contents;'>
                                    <th>Payment Type</th>
                                    <td>&nbsp;&nbsp;&nbsp;<input type="radio" name="payment_type" id="payment_type_advance" value="Advance" <?php if(!empty($booking_payment_details['payment_type'])){if("Advance" == $booking_payment_details['payment_type']) {echo 'checked';}}?>>&nbsp;&nbsp;Advance
                                    &nbsp;&nbsp;&nbsp;<input type="radio" name="payment_type" id="payment_type_part" value="Part" <?php if(!empty($booking_payment_details['payment_type'])){if("Part" == $booking_payment_details['payment_type']) {echo 'checked';}}?>>&nbsp;&nbsp;Part
                                    &nbsp;&nbsp;&nbsp;<input type="radio" name="payment_type" id="payment_type_full" value="Full" <?php if(!empty($booking_payment_details['payment_type'])){if("Full" == $booking_payment_details['payment_type']) {echo 'checked';}}?>>&nbsp;&nbsp;Full</td>
                                    
                                </tr>

                                <tr id="booking_amount_tr" style='display:table-row;'>
                                    <th>Depositing Amount</th>
                                    <td>
                                    <input type="text" class="form-control" name="booking_amt" id="booking_amt" placeholder="Enter booking amount" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['booking_amt'];} ?>" required onkeyup="sra_booking_amt_not_greater()">
                                    </td>
                                </tr>

                                <tr id="pending_amount_tr" style='display:table-row;'>
                                    <th>Pending Amount</th>
                                    <td>
                                    <input readonly type="text" class="form-control" name="pending_amt" id="pending_amt" placeholder="Enter pending amount" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['pending_amt'];} ?>">
                                    </td>
                                </tr>

                                <tr style='display:none;'>
                                    <th>Payment</th>
                                    <td>&nbsp;&nbsp;<input type="radio" checked name="payment_now_later" id="payment_now_later" onchange='payment_otp(this.value);' value="Now">&nbsp;&nbsp;Now
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="payment_now_later" id="payment_now_later" onchange='payment_otp(this.value);' value="Later">&nbsp;&nbsp;Later
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <th>Amount Receiving Mode</th>
                                    <td>
                                    <select class="select_css" name="select_transaction" id="select_transaction" onchange='account_details(this.value); 
                                        this.blur();'required="required">
                                        <option value="">Select Transaction</option>
                                        <option value="CASH" <?php if(!empty($booking_payment_details['select_transaction'])){if("CASH" == $booking_payment_details['select_transaction']) {echo 'selected';}}?>>CASH</option>
                                        <option value="UPI" <?php if(!empty($booking_payment_details['select_transaction'])){if("UPI" == $booking_payment_details['select_transaction']) {echo 'selected';}}?>>UPI</option>
                                        <option value="QR Code" <?php if(!empty($booking_payment_details['select_transaction'])){if("QR Code" == $booking_payment_details['select_transaction']) {echo 'selected';}}?>>QR Code</option>
                                        <option value="Cheque" <?php if(!empty($booking_payment_details['select_transaction'])){if("Cheque" == $booking_payment_details['select_transaction']) {echo 'selected';}}?>>Cheque</option>
                                        <option value="Net Banking" <?php if(!empty($booking_payment_details['select_transaction'])){if("Net Banking" == $booking_payment_details['select_transaction']) {echo 'selected';}}?>>Net Banking</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr></tr>

                                <tr id="give_reason_tr" style='display:none;'>
                                    <th>Give Reason</th>
                                    <td><textarea class="form-control select_css" name="later_payment_reason" id="later_payment_reason" onkeyup="later_reason(this);"> </textarea></td>
                                </tr>
                                
                                
                            </table>

                            <div id="give_reson_submit" style='display:none;'>
                            <center><button type="button" class="btn btn-success" name="reason_submit_button" value="submit_back" id="reason_submit_button" disabled>Submit & Proceed</button></center>
                            </div>

                            <?php if(isset($booking_payment_details['select_transaction']) && $booking_payment_details['select_transaction']=='Net Banking'){?>
                                <div class="" id="net_banking_tr">
                                <div class="row cash_payment_div">
                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Payment Type</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                        <!-- &nbsp;&nbsp;<input type="radio" name="gender" id="male" value="Male">&nbsp;&nbsp;Male
                                        &nbsp;&nbsp;<input type="radio" name="gender" id="female" value="Female">&nbsp;&nbsp;Female -->

                                        <input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_neft" onchange="netpayment_validate()" value="NEFT"  <?php if(!empty($booking_payment_details['netbanking_payment_type'])){if("NEFT" == $booking_payment_details['netbanking_payment_type']) {echo 'checked';}}?>>&nbsp;&nbsp;NEFT
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_rtgs" onchange="netpayment_validate()" value="RTGS" <?php if(!empty($booking_payment_details['netbanking_payment_type'])){if("RTGS" == $booking_payment_details['netbanking_payment_type']) {echo 'checked';}}?>>&nbsp;&nbsp;RTGS
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_imps" onchange="netpayment_validate()" value="IMPS"  <?php if(!empty($booking_payment_details['netbanking_payment_type'])){if("IMPS" == $booking_payment_details['netbanking_payment_type']) {echo 'checked';}}?>>&nbsp;&nbsp;IMPS
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Account Number</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_banking_acc_no" id="net_banking_acc_no" onkeyup="netbank_accno_validate()" placeholder="Enter Account No" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['net_banking_acc_no'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Account Holder Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_acc_holder_nm" id="net_acc_holder_nm" onkeyup="netbank_accno_holder_nm_validate()" placeholder="Enter Account Holder Name" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['net_banking_acc_holder_nm'];}?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Branch Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_banking_branch_name" id="net_banking_branch_name" onkeyup="netbank_branch_nm_validate()" placeholder="Enter Branch Name" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['net_banking_branch_name'];}?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">UTR / Transaction No.</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_banking_utr_no" id="net_banking_utr_no" onkeyup="netbank_utr_no_validate()" placeholder="Enter UTR No" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['net_banking'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Bank Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="netbanking_bank_name" id="netbanking_bank_name" onkeyup="netbank_bank_nm_validate()" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['netbanking_bank_name'];}?>" placeholder="Enter Bank Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Transaction Date</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="date" class="form-control" max="<?php echo date("Y-m-d");?>" name="netbanking_date" id="netbanking_date" onchange="netbank_date_validate()" placeholder="" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['netbanking_date'];}?>">
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <?php } else { ?>
                                <div class="" id="net_banking_tr" style='display:none;'>
                                <div class="row cash_payment_div">
                                        <center><h4 class="mb-4">Amount Receiver Details</h4></center>
                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Payment Type</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                        <!-- &nbsp;&nbsp;<input type="radio" name="gender" id="male" value="Male">&nbsp;&nbsp;Male
                                        &nbsp;&nbsp;<input type="radio" name="gender" id="female" value="Female">&nbsp;&nbsp;Female -->

                                        <input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_neft" onchange="sra_first_netpayment_validate()" value="NEFT">&nbsp;&nbsp;NEFT
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_rtgs" onchange="sra_first_netpayment_validate()" value="RTGS">&nbsp;&nbsp;RTGS
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_imps" onchange="sra_first_netpayment_validate()" value="IMPS">&nbsp;&nbsp;IMPS
                                        </div>

                                        <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Account Number</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <select class="select_css"  name="net_banking_acc_no" id="net_banking_acc_no" required="required" onchange="sra_first_netbank_accno_validate()">
                                            <!-- onchange='upi_QR_details(this.value); this.blur();' -->
                                                <option value="">Select Account Number</option>
                                                
                                                <?php
                                                    foreach($upi_qr__add_more_data as $upi_qr__add_more_data_value) 
                                                    { 
                                                ?>
                                                    <option class="self_upi" attr_other="other" attr_qr_master_id="<?php echo $upi_qr__add_more_data_value['qr_code_master_id'];?>" value="<?php echo $upi_qr__add_more_data_value['id'];?>"><?php echo $upi_qr__add_more_data_value['account_number'];?></option>
                                                <?php } ?>
                                            </select>

                                            <input type="hidden" readonly class="form-control" name="net_banking_company_acc_yes_no" id="net_banking_company_acc_yes_no">
                                        </div>

                                        <!-- <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Account Number</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_banking_acc_no" id="net_banking_acc_no" onkeyup="netbank_accno_validate()" placeholder="Enter Account No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div> -->

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Account Holder Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" readonly class="form-control" name="net_acc_holder_nm" id="net_acc_holder_nm" placeholder="Enter Account Holder Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Branch Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_banking_branch_name" id="net_banking_branch_name" onkeyup="sra_first_netbank_branch_nm_validate()" placeholder="Enter Branch Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Bank Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" readonly class="form-control" name="netbanking_bank_name" id="netbanking_bank_name" placeholder="Enter Bank Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">UTR / Transaction No.</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_banking_utr_no" id="net_banking_utr_no" onkeyup="sra_first_netbank_utr_no_validate()" placeholder="Enter UTR No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Transaction Date</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="date" class="form-control" name="netbanking_date" id="netbanking_date" max="<?php echo date("Y-m-d");?>" onchange="sra_first_netbank_date_validate()" placeholder="">
                                        </div>

                                        <div class="col-md-6 mt-2" id="net_banking_reason" style='display:none;'>
                                            <h6 class="text-center">reason</h6>
                                        </div>
                                        <div class="col-md-6 mt-2" id="net_banking_input" style='display:none;'>
                                            <input type="text" class="form-control" name="net_banking_reason_1" id="net_banking_reason_1" onkeyup="sra_first_booking_net_banking_reason_validate()" placeholder="Enter Reason" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <?php } ?>
                            

                            <?php if(isset($booking_payment_details['select_transaction']) &&$booking_payment_details['select_transaction'] == 'UPI'){?>
                                <div class="" id="upi_no_div">
                                <div class="row cash_payment_div">
                                    <div class="col-md-5 mt-1">
                                        <h6 class="text-center float-right">UPI ID Holder Name</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="select_css"  name="select_upi_no" id="select_upi_no" required="required" onchange="transaction_upi_validate()">
                                        <!-- onchange='upi_QR_details(this.value); this.blur();' -->
                                            <option value="">Select UPI ID Holder Name</option>
                                            <option class="self_upi" attr_self="self" value="Self">Self</option>
                                            <?php
                                                foreach($upi_qr_data as $upi_qr_data_value) 
                                                { 
                                            ?>
                                                <option class="self_upi" attr_other="other" value="<?php echo $upi_qr_data_value['id'];?>" <?php if(!empty($booking_payment_details['UPI_holder_name'])){if($upi_qr_data_value['id'] == $booking_payment_details['UPI_holder_name']) {echo 'selected';}}?>><?php echo $upi_qr_data_value['full_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <!-- <div id="upi_no_reason_div" style='display:none;'> -->
                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">Payment Type</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <select class="select_css" name="upi_payment_type" id="upi_payment_type" onchange="payment_type_validate()">
                                                <option value="">Select Transaction</option>
                                                <option value="Google Pay" <?php if(!empty($booking_payment_details['upi_payment_type'])){if("Google Pay" == $booking_payment_details['upi_payment_type']) {echo 'selected';}}?>>Google Pay</option>
                                                <option value="BHIM App" <?php if(!empty($booking_payment_details['upi_payment_type'])){if("BHIM App" == $booking_payment_details['upi_payment_type']) {echo 'selected';}}?>>BHIM App</option>
                                                <option value="PhonePe" <?php if(!empty($booking_payment_details['upi_payment_type'])){if("PhonePe" == $booking_payment_details['upi_payment_type']) {echo 'selected';}}?>>PhonePe</option>
                                                <option value="Paytm" <?php if(!empty($booking_payment_details['upi_payment_type'])){if("Paytm" == $booking_payment_details['upi_payment_type']) {echo 'selected';}}?>>Paytm</option>
                                                <option value="SBI pay" <?php if(!empty($booking_payment_details['upi_payment_type'])){if("SBI pay" == $booking_payment_details['upi_payment_type']) {echo 'selected';}}?>>SBI pay</option>
                                                <option value="Bank of Baroda UPI" <?php if(!empty($booking_payment_details['upi_payment_type'])){if("Bank of Baroda UPI" == $booking_payment_details['upi_payment_type']) {echo 'selected';}}?>>Bank of Baroda UPI</option>
                                            </select>
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">UPI ID Number</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" readonly class="form-control" name="self_upi_no" id="self_upi_no" placeholder="Enter Self UPI ID" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['upi_no'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">UTR / Transaction No.</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="upi_no" id="upi_no" onkeyup="utr_no_validate()" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['UPI_transaction_no'];}?>" placeholder="Enter Transaction Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">reason</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="reason" id="reason" onkeyup="reason_validate()" placeholder="Enter Reason" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['UPI_reason'];}?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <?php } else{ ?>
                            <div class="" id="upi_no_div" style='display:none;'>
                                <div class="row cash_payment_div">
                                    <center><h4 class="mb-4">Amount Receiver Details</h4></center>
                                    <div class="col-md-5 mt-1">
                                        <h6 class="text-center float-right">UPI ID Holder Name</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="select_css"  name="select_upi_no" id="select_upi_no" required="required" onchange="sra_first_transaction_upi_validate()">
                                        <!-- onchange='upi_QR_details(this.value); this.blur();' -->
                                            <option value="">Select UPI ID Holder Name</option>
                                            <!-- value="<?php //echo $upi_qr_master_id;?>" -->
                                            <option class="self_upi" attr_self="self" value="self">Self</option>
                                            <?php
                                                foreach($upi_qr_data as $upi_qr_data_value) 
                                                { 
                                            ?>
                                                <option class="self_upi" attr_other="other" value="<?php echo $upi_qr_data_value['id'];?>"><?php echo $upi_qr_data_value['full_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <!-- <div id="upi_no_reason_div" style='display:none;'> -->
                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">Payment Type</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <select class="select_css" name="upi_payment_type" id="upi_payment_type" onchange="sra_first_payment_type_validate()">
                                                <option value="">Select Transaction</option>
                                                <!-- Dynamic options will be added here using JavaScript -->
                                            </select>
                                            <input type="hidden" readonly class="form-control" name="company_acc_yes_no" id="company_acc_yes_no">
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">UPI ID Number</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" readonly class="form-control" name="self_upi_no" id="self_upi_no" placeholder="Enter Self UPI ID" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">Transaction Date</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="date" class="form-control" onchange="sra_first_transaction_date_upi_validate()" max="<?php echo date("Y-m-d");?>" name="upi_transaction_date" id="upi_transaction_date" max="<?php echo date("Y-m-d");?>" placeholder="Transaction Date"> 
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">UTR / Transaction No.</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="upi_no" id="upi_no" onkeyup="sra_first_utr_no_validate()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-5 mt-2" id="upi_reason" style='display:none;'>
                                            <h6 class="text-center float-right">reason</h6>
                                        </div>
                                        <div class="col-md-6 mt-2" id="upi_reason_input" style='display:none;'>
                                            <input type="text" class="form-control" name="reason" id="reason" onkeyup="sra_first_booking_upi_reason_validate()" placeholder="Enter Reason" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <?php } ?>


                            <?php if(isset($booking_payment_details['select_transaction']) && $booking_payment_details['select_transaction'] == 'QR Code'){?>
                            <div class="" id="rq_div">
                                <div class="row cash_payment_div">
                                    <div class="col-md-6 mt-1">
                                        <h6 class="text-center">UPI ID Holder Name</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="select_css" name="select_qr_upi_no" id="select_qr_upi_no" required="required" onchange="qr_hoder_name_validate()">
                                        <!-- onchange='upi_QR_details(this.value); this.blur();' -->
                                            <option value="">Select UPI ID Holder Name</option>
                                            <option value="Self">Self</option>
                                            <?php
                                                foreach($upi_qr_data as $upi_qr_data_value) 
                                                { 
                                            ?>
                                                <option value="<?php echo $upi_qr_data_value['id'];?>" <?php if(!empty($booking_payment_details['QR_holder_name'])){if($upi_qr_data_value['id'] == $booking_payment_details['QR_holder_name']) {echo 'selected';}}?>><?php echo $upi_qr_data_value['full_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Mobile Number</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" name="qr_mobile_number" id="qr_mobile_number" onkeyup="qr_mobile_no_validate()" placeholder="Enter Mobile Number" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['QR_mobile_number'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Payment Type</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <select class="select_css" name="qr_payment_type" id="qr_payment_type" onchange="qr_payment_type_validate()">
                                            <option value="">Select Transaction</option>
                                            <option value="Google Pay" <?php if(!empty($booking_payment_details['QR_payment_type'])){if("Google Pay" == $booking_payment_details['QR_payment_type']) {echo 'selected';}}?>>Google Pay</option>
                                            <option value="BHIM App" <?php if(!empty($booking_payment_details['QR_payment_type'])){if("BHIM App" == $booking_payment_details['QR_payment_type']) {echo 'selected';}}?>>BHIM App</option>
                                            <option value="PhonePe" <?php if(!empty($booking_payment_details['QR_payment_type'])){if("PhonePe" == $booking_payment_details['QR_payment_type']) {echo 'selected';}}?>>PhonePe</option>
                                            <option value="Paytm" <?php if(!empty($booking_payment_details['QR_payment_type'])){if("Paytm" == $booking_payment_details['QR_payment_type']) {echo 'selected';}}?>>Paytm</option>
                                            <option value="SBI pay" <?php if(!empty($booking_payment_details['QR_payment_type'])){if("SBI pay" == $booking_payment_details['QR_payment_type']) {echo 'selected';}}?>>SBI pay</option>
                                            <option value="Bank of Baroda UPI" <?php if(!empty($booking_payment_details['QR_payment_type'])){if("Bank of Baroda UPI" == $booking_payment_details['QR_payment_type']) {echo 'selected';}}?>>Bank of Baroda UPI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">UTR / Transaction No.</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" name="qr_upi_no" id="qr_upi_no" onkeyup="qr_utr_no_validate()" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['QR_transaction_no'];}?>" placeholder="Enter Transaction Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>


                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">QR code Image</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div name="qr_mode_code_image" id="qr_mode_code_image">

                                        <?php if(!empty($qr_image_details['qr_code_image'])){ ?>
                                        <img src="<?php echo base_url(); ?>uploads/QR_code_image/<?php echo $qr_image_details['qr_code_image']; ?>" width="80%">
                                        <input type="hidden" name="old_img_name" id="old_img_name" value="<?php echo $qr_image_details['qr_code_image']; ?>">
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="" id="rq_div" style='display:none;'>
                                <div class="row cash_payment_div">
                                    <center><h4 class="mb-4">Amount Receiver Details</h4></center>
                                    <div class="col-md-6 mt-1">
                                        <h6 class="text-center">QR Holder Name</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="select_css" name="select_qr_upi_no" id="select_qr_upi_no" required="required" onchange="sra_first_qr_hoder_name_validate()">
                                        <!-- onchange='upi_QR_details(this.value); this.blur();' -->
                                            <option value="">Select UPI ID Holder Name</option>
                                            <option value="self" attr_self="self">Self</option>
                                            <?php
                                                foreach($upi_qr_data as $upi_qr_data_value) 
                                                { 
                                            ?>
                                                <option value="<?php echo $upi_qr_data_value['id'];?>"><?php echo $upi_qr_data_value['full_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    
                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">QR Code App Name</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <select class="select_css" name="qr_payment_type" id="qr_payment_type" onchange="sra_first_qr_payment_type_validate()">
                                            <option value="">Select Transaction</option>

                                        </select>
                                        <input type="hidden" readonly class="form-control" name="qr_company_acc_yes_no" id="qr_company_acc_yes_no">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Mobile Number</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input readonly type="text" class="form-control" name="qr_mobile_number" id="qr_mobile_number" onkeyup="qr_mobile_no_validate()" placeholder="Enter Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Transaction Date</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="date" class="form-control" onchange="sra_first_qr_transaction_date_validate()" max="<?php echo date("Y-m-d");?>" name="qr_transaction_date" id="qr_transaction_date" max="<?php echo date("Y-m-d");?>" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['upi_transaction_date'];}?>" placeholder="Transaction Date"> 
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">UTR / Transaction No.</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" name="qr_upi_no" id="qr_upi_no" onkeyup="sra_first_qr_utr_no_validate()" placeholder="Enter Transaction Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>

                                    <div class="col-md-6 mt-2" id="qr_reason" style='display:none;'>
                                            <h6 class="text-center">reason</h6>
                                    </div>
                                    <div class="col-md-6 mt-2" id="qr_reason_input" style='display:none;'>
                                        <input type="text" class="form-control" name="qr_reason_1" id="qr_reason_1" onkeyup="sra_first_booking_qr_reason_validate()" placeholder="Enter Reason" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">QR code Image</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div name="qr_mode_code_image" id="qr_mode_code_image"></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                            <?php if(isset($booking_payment_details['select_transaction']) && $booking_payment_details['select_transaction'] == 'Cheque'){?>
                                <div class="" id="cheque_tr">
                                <div class="row cash_payment_div">
                                    <div class="col-md-6 mt-1">
                                        <h6 class="text-center">Cheque Number</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="cheque" id="cheque" onkeyup="cheque_no_validate()" placeholder="Enter Cheque Number" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cheque'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Bank Name</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" name="bank_name" id="bank_name" onkeyup="cheque_banknm_validate()" placeholder="Enter Bank Name" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['bank_name'];}?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Drawn On Date</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="date" class="form-control" name="drawn_on_date" id="drawn_on_date" onchange="cheque_date_validate()" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['drawn_on_date'];}?>" placeholder="Select Date">
                                    </div>
                                </div>
                            </div>
                            <?php } else{ ?>
                            <div class="" id="cheque_tr" style='display:none;'>
                                <div class="row cash_payment_div">
                                <center><h4 class="mb-4">Amount Receiver Details</h4></center>

                                    <div class="col-md-6 mt-1">
                                        <h6 class="text-center">Name On Cheque</h6>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <select class="select_css"  name="name_on_cheque" id="name_on_cheque" required="required" onchange="sra_first_cheque_name_validate()">
                                        <!-- onchange='upi_QR_details(this.value); this.blur();' -->
                                            <option value="">Select Name On Cheque</option>
                                            <option value="self" attr_self="self">Self</option>
                                            <?php
                                                foreach($upi_qr_data as $upi_qr_data_value) 
                                                { 
                                            ?>
                                                <option class="self_upi" value="<?php echo $upi_qr_data_value['id'];?>"><?php echo $upi_qr_data_value['full_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Bank Name</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <select class="select_css" name="cheque_bank_name" id="cheque_bank_name" onchange="sra_first_cheque_bank_name_validate()">
                                            <option value="">Select Transaction</option>

                                        </select>
                                        <input type="hidden" readonly class="form-control" name="cheque_company_acc_yes_no" id="cheque_company_acc_yes_no">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Cheque Bank Name</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" name="bank_name" id="bank_name" onkeyup="sra_first_cheque_banknm_validate()" placeholder="Enter Bank Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Cheque Number</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" name="cheque" id="cheque" onkeyup="sra_first_cheque_no_validate()" placeholder="Enter Cheque Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Drawn On Date</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="date" class="form-control" name="drawn_on_date" id="drawn_on_date" onchange="sra_first_cheque_date_validate()" placeholder="Select Date">
                                    </div>

                                    <div class="col-md-6 mt-2" id="cheque_reason" style='display:none;'>
                                            <h6 class="text-center">reason</h6>
                                    </div>
                                    <div class="col-md-6 mt-2" id="cheque_reason_input" style='display:none;'>
                                        <input type="text" class="form-control" name="cheque_reason_1" id="cheque_reason_1" onkeyup="sra_first_booking_cheque_reason_validate()" placeholder="Enter Reason" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="col-md-3">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <?php if(isset($booking_payment_details['select_transaction']) && $booking_payment_details['select_transaction'] == 'CASH'){?>
                            <div class="row" id="cash_tr">
                            <div class="col-md-6">
                                <div class="row cash_payment_div">
                                        <div class="col-md-12">
                                            <h6 class="text-center">Payment From customer</h6>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <h6 class="text-center">Particulars</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-center">Rupees</h6>
                                        </div>
                                    
                                        <!-- <div class="col-md-2">
                                            <label id="amt_cash">2000 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="2000" name="cash_2000" id="cash_2000" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_2000" id="total_cash_2000" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div> -->

                                        <div class="col-md-2">
                                        <label>500 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="500" name="cash_500" id="cash_500" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cash_500'];}?>" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_500" id="total_cash_500" placeholder="Enter Rupees" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_500'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>200 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="200" name="cash_200" id="cash_200" placeholder="Enter Particulars" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cash_200'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_200" id="total_cash_200" placeholder="Enter Rupees" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_200'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>100 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="100" name="cash_100" id="cash_100" placeholder="Enter Particulars" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cash_100'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_100" id="total_cash_100" placeholder="Enter Rupees" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_100'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>50 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="50" name="cash_50" id="cash_50" placeholder="Enter Particulars" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cash_50'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_50" id="total_cash_50" placeholder="Enter Rupees" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_50'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>20 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="20" name="cash_20" id="cash_20" placeholder="Enter Particulars" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cash_20'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_20" id="total_cash_20" placeholder="Enter Rupees" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_20'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>10 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="10" name="cash_10" id="cash_10" placeholder="Enter Particulars" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cash_10'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_10" id="total_cash_10" placeholder="Enter Rupees" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_10'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>5 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="5" name="cash_5" id="cash_5" placeholder="Enter Particulars" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cash_5'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_5" id="total_cash_5" placeholder="Enter Rupees" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_5'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>2 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="2" name="cash_2" id="cash_2" placeholder="Enter Particulars" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cash_2'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_2" id="total_cash_2" placeholder="Enter Rupees" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_2'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>1 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="1" name="cash_1" id="cash_1" placeholder="Enter Particulars" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['cash_1'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_1" id="total_cash_1" placeholder="Enter Rupees" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_1'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label> </label>
                                        </div>
                                        <div class="col-md-4 mt-3 text-center">
                                            <h5>Total</h5>
                                        </div>
                                        <div class="col-md-1 mt-3">
                                            =
                                        </div>
                                        <div class="col-md-5 mt-2">
                                            <input readonly type="text" class="form-control" name="total_cash_amt" id="total_cash_amt" placeholder="Total Cash" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['total_cash_amt'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="row cash_payment_div">
                                        <div class="col-md-12">
                                            <h6 class="text-center">Return to customer</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-center">Particulars</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-center">Rupees</h6>
                                        </div>

                                        <div class="col-md-2">
                                        <label>500 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="500" name="return_cash_500" id="return_cash_500" placeholder="Enter Particulars" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_cash_500'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_500" id="return_total_cash_500" placeholder="Enter Rupees" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_500'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>200 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="200" name="return_cash_200" id="return_cash_200" placeholder="Enter Particulars" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_cash_200'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_200" id="return_total_cash_200" placeholder="Enter Rupees" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_200'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>100 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="100" name="return_cash_100" id="return_cash_100" placeholder="Enter Particulars" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_cash_100'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_100" id="return_total_cash_100" placeholder="Enter Rupees" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_100'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>50 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="50" name="return_cash_50" id="return_cash_50" placeholder="Enter Particulars" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_cash_50'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_50" id="return_total_cash_50" placeholder="Enter Rupees" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_50'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>20 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="20" name="return_cash_20" id="return_cash_20" placeholder="Enter Particulars" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_cash_20'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_20" id="return_total_cash_20" placeholder="Enter Rupees" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_20'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>10 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="10" name="return_cash_10" id="return_cash_10" placeholder="Enter Particulars" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_cash_10'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_10" id="return_total_cash_10" placeholder="Enter Rupees" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_10'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>5 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="5" name="return_cash_5" id="return_cash_5" placeholder="Enter Particulars" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_cash_5'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_5" id="return_total_cash_5" placeholder="Enter Rupees" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_5'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>2 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="2" name="return_cash_2" id="return_cash_2" placeholder="Enter Particulars" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_cash_2'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_2" id="return_total_cash_2" placeholder="Enter Rupees" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_2'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>1 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="1" name="return_cash_1" id="return_cash_1" placeholder="Enter Particulars" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_cash_1'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_1" id="return_total_cash_1" placeholder="Enter Rupees" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_1'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label> </label>
                                        </div>
                                        <div class="col-md-4 mt-3 text-center">
                                            <h5>Total</h5>
                                        </div>
                                        <div class="col-md-1 mt-3">
                                            =
                                        </div>
                                        <div class="col-md-5 mt-2">
                                            <input readonly type="text" class="form-control" name="return_total_cash_amt" id="return_total_cash_amt" placeholder="Total Cash" value="<?php if(!empty($return_customer_booking_payment_details)){ echo $return_customer_booking_payment_details['return_total_cash_amt'];}?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="row" id="cash_tr" style='display:none;'>
                            <div class="col-md-6">
                                <div class="row cash_payment_div">
                                        <div class="col-md-12">
                                            <h6 class="text-center">Payment From customer</h6>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <h6 class="text-center">Particulars</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-center">Rupees</h6>
                                        </div>
                                    
                                        <!-- <div class="col-md-2">
                                            <label id="amt_cash">2000 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="2000" name="cash_2000" id="cash_2000" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_2000" id="total_cash_2000" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div> -->

                                        <div class="col-md-2">
                                        <label>500 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="500" name="cash_500" id="cash_500" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_500" id="total_cash_500" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>200 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="200" name="cash_200" id="cash_200" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_200" id="total_cash_200" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>100 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="100" name="cash_100" id="cash_100" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_100" id="total_cash_100" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>50 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="50" name="cash_50" id="cash_50" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_50" id="total_cash_50" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>20 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="20" name="cash_20" id="cash_20" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_20" id="total_cash_20" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>10 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="10" name="cash_10" id="cash_10" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_10" id="total_cash_10" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>5 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="5" name="cash_5" id="cash_5" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_5" id="total_cash_5" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>2 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="2" name="cash_2" id="cash_2" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_2" id="total_cash_2" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>1 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control data_amt" attr-amt="1" name="cash_1" id="cash_1" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="total_cash_1" id="total_cash_1" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label> </label>
                                        </div>
                                        <div class="col-md-4 mt-3 text-center">
                                            <h5>Total</h5>
                                        </div>
                                        <div class="col-md-1 mt-3">
                                            =
                                        </div>
                                        <div class="col-md-5 mt-2">
                                            <input readonly type="text" class="form-control" name="total_cash_amt" id="total_cash_amt" placeholder="Total Cash" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="row cash_payment_div">
                                        <div class="col-md-12">
                                            <h6 class="text-center">Return to customer</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-center">Particulars</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-center">Rupees</h6>
                                        </div>

                                        <div class="col-md-2">
                                        <label>500 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="500" name="return_cash_500" id="return_cash_500" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_500" id="return_total_cash_500" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>200 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="200" name="return_cash_200" id="return_cash_200" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_200" id="return_total_cash_200" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>100 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="100" name="return_cash_100" id="return_cash_100" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_100" id="return_total_cash_100" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>50 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="50" name="return_cash_50" id="return_cash_50" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_50" id="return_total_cash_50" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>20 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="20" name="return_cash_20" id="return_cash_20" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_20" id="return_total_cash_20" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>10 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="10" name="return_cash_10" id="return_cash_10" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_10" id="return_total_cash_10" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>5 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="5" name="return_cash_5" id="return_cash_5" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_5" id="return_total_cash_5" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>2 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="2" name="return_cash_2" id="return_cash_2" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_2" id="return_total_cash_2" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label>1 x </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control return_data_amt" return-attr-amt="1" name="return_cash_1" id="return_cash_1" placeholder="Enter Particulars" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>
                                        <div class="col-md-1">
                                            =
                                        </div>
                                        <div class="col-md-5">
                                            <input readonly type="text" class="form-control" name="return_total_cash_1" id="return_total_cash_1" placeholder="Enter Rupees" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>

                                        <div class="col-md-2">
                                        <label> </label>
                                        </div>
                                        <div class="col-md-4 mt-3 text-center">
                                            <h5>Total</h5>
                                        </div>
                                        <div class="col-md-1 mt-3">
                                            =
                                        </div>
                                        <div class="col-md-5 mt-2">
                                            <input readonly type="text" class="form-control" name="return_total_cash_amt" id="return_total_cash_amt" placeholder="Total Cash" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                        </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                    <div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <h5>Payment Confirmation OTP</h5>
                                    <table id="example2" class="table table-bordered table-hover table-striped">
                                        <tr>
                                            <th><input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> 
                                            <p id="least_count"></p>
                                            </th>
                                            <th><button type="button" class="btn btn-success" name="submit" id="sra_payment_final_booking_submit" value="submit" disabled>Verify OTP</button> </th>
                                        </tr>
                                    </table>
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <center><th><button type="button" class="btn btn-primary mb-3" name="sra_submit_otp" id="sra_submit_otp"  disabled>Send OTP</button></th></center>
                                        </div>
                                        <div class="col-md-4">
                                            <center><th><button type="button" class="btn btn-primary mb-3" name="sra_re_send_otp" id="sra_re_send_otp" disabled>Resend OTP</button></th></center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <!-- <div class="col-md-6">
                                    <h5> Booking Confirmation OTP</h5>
                                    <table id="example2" class="table table-bordered table-hover table-striped">
                                        <tr>
                                            <th><input type="text" class="form-control" name="booking_otp" id="booking_otp" placeholder="Enter OTP" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> 
                                            <p id="booking_least_count"></p>
                                        </th>
                                            
                                            <th><button type="button" class="btn btn-success" name="booking_submit" id="booking_confirm_submit" value="booking_submit" disabled>Verify OTP</button></th>
                                        </tr>
                                    </table>
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <center><th><button type="button" class="btn btn-primary mb-3" name="booking_submit_otp" id="booking_submit_otp"  disabled>Send OTP</button></th></center>
                                        </div>
                                        <div class="col-md-4">
                                            <center><th><button type="button" class="btn btn-primary mb-3" name="booking_re_send_otp" id="booking_re_send_otp" disabled>Resend OTP</button></th></center>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                            </div>
                            </div>
                        </div>
                    </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        
                        <div class="col-md-3">

                        </div>
                    </div>
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