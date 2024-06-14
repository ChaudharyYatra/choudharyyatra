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
              <a href="<?php echo $module_url_final_booking_details; ?>/sub_index/<?php echo $p_id;?>/<?php echo $p_date_id;?>"><button class="btn btn-primary">Back</button></a>
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
                    <div class="col-md-3">
                            <label>Tour No -</label>
                        </div>  
                        <div class="col-md-4">
                            <div><?php echo $traveller_booking_info_value['tour_number']; ?></div>
                        </div>
                        <div class="col-md-2">
                            <label>Customer Name -</label>
                        </div>
                        <div class="col-md-3">
                            <div><?php echo $traveller_booking_info_value['customer_name']; ?></div>
                        </div>
                        <div class="col-md-3">  
                            <label>Tour Date -</label>
                        </div>
                        <div class="col-md-4">  
                            <div><?php echo date('d-m-Y', strtotime($traveller_booking_info_value['journey_date'])); ?></div>
                        </div>
                        <div class="col-md-2">
                            <label>Mobile No -</label>
                        </div>
                        <div class="col-md-3">
                            <div><?php echo $traveller_booking_info_value['mobile_number']; ?></div>
                        </div>
                        <div class="col-md-3">
                            <label>Total Final Amount -</label>
                        </div>
                        <div class="col-md-4">
                            <div><?php echo $total_amount; ?></div>
                        </div>
                        <div class="col-md-3">
                            <label> Total Seat -</label>
                        </div>
                        <div class="col-md-1">
                            <div><?php echo $traveller_booking_info_value['total_seat']; ?></div>
                        </div>

                        <div class="col-md-3">
                            <label>Total Paid Amount -</label>
                        </div>
                        <div class="col-md-4">
                            <div><?php echo $total_paid_amount; ?></div>
                        </div>
                        <div class="col-md-3">
                            <label>Total Remaining Amount -</label>
                        </div>
                        <div class="col-md-1">
                            <div><?php echo $total_remaining_amount; ?></div>
                        </div>
                        

                        <!-- <input type="hidden" class="form-control" name="academic_year" id="academic_year" value="<?php //echo $traveller_booking_info_value['academic_year']; ?>"> -->
                        <input type="hidden" class="form-control" name="academic_year" id="academic_year" value="<?php echo $traveller_booking_info_value['academic_year']; ?>">
                        <input type="text" class="form-control" name="sra_no" id="sra_no" value="<?php echo $traveller_booking_info_value['sra_no']; ?>">
                        <input type="hidden" class="form-control" name="package_date_id" id="package_date_id" value="<?php echo $traveller_booking_info_value['tour_date']; ?>">
                        <input type="hidden" class="form-control" name="sra_payment_id" id="sra_payment_id" value="<?php echo $traveller_booking_info_value['sra_payment_id']; ?>">
                        <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $traveller_booking_info_value['tour_number']; ?>">
                    
                        <!-- <input type="hidden" class="form-control" name="hotel_name_id" id="hotel_name_id" value="<?php //echo $traveller_booking_info_value['hotel_name_id']; ?>">
                        <input type="hidden" class="form-control" name="package_date_id" id="package_date_id" value="<?php //echo $traveller_booking_info_value['tour_date']; ?>">
                        <input type="hidden" class="form-control" name="enquiry_id" id="enquiry_id" value="<?php //echo $traveller_booking_info_value['domestic_enquiry_id']; ?>">
                        <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php //echo $traveller_booking_info_value['pid']; ?>">
                        <input type="hidden" class="form-control" name="journey_date" id="journey_date" value="<?php //echo $traveller_booking_info_value['journey_date']; ?>"> -->
                    
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

                <input type="hidden" class="form-control" name="booking_payment_details_id" id="booking_payment_details_id" value="<?php if(isset($booking_payment_details)){echo $booking_payment_details['id'];} ?> ">
                <input type="hidden" class="form-control" name="return_customer_booking_payment_id" id="return_customer_booking_payment_id" value="<?php if(isset($return_customer_booking_payment_details)){echo $return_customer_booking_payment_details['id'];} ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <h5>Final Payment Details :</h5>
                            
                            <table id="example2" class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Mobile Number For OTP</th>
                                    <td>
                                    <input type="text" class="form-control" name="booking_tm_mobile_no" id="booking_tm_mobile_no" minlength="10" maxlength="10" placeholder="Enter mobile number" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['booking_tm_mobile_no'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required onkeyup="validate()">
                                    <input type="hidden" class="form-control" name="inserted_id" id="inserted_id" value="">

                                    <input type="hidden" class="form-control" name="academic_year" id="academic_year" value="<?php echo $academic_year; ?>">
                                    <?php
                                    foreach($extra_services_booking_payment_details as $extra_services_booking_payment_details_value) 
                                    { 
                                    ?>
                                    <input type="hidden" class="form-control" name="extra_services_inserted_id[]" id="extra_services_inserted_id" value="<?php if(!empty($extra_services_booking_payment_details_value)){ echo $extra_services_booking_payment_details_value['id'];} ?>">
                                    <?php }?>
                                    <input type="hidden" class="form-control" name="mobile_no" id="mobile_no" minlength="10" maxlength="10" placeholder="Enter mobile number" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['booking_tm_mobile_no'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required onkeyup="validate()">
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
                                
                                <tr hidden>
                                    <th>Final Total</th>
                                    <td><input readonly type="text" class="form-control" name="final_amt" id="final_amt" placeholder="Final amount" value="<?php echo $traveller_booking_info_amt['final_amt']; ?>" required></td>
                                </tr>

                                <tr>
                                <th>Receipt Type</th>
                                <td>
                                &nbsp;&nbsp;&nbsp;<input type="radio" class="extra_services_class" name="receipt_type" id="sra" value="SRA" checked onchange='extra_service_receipt_type(this.value);'>&nbsp;&nbsp;SRA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" class="extra_services_class" name="receipt_type" id="extra_services" value="Extra Services" onchange='extra_service_receipt_type(this.value);'>&nbsp;&nbsp;Extra Services
                                </td>
                                </tr>
                                    
                                <tr id="booking_amount_tr">
                                    <th>Depositing Amount</th>
                                    <td>
                                    <input type="text" class="form-control" name="next_booking_amt" id="next_booking_amt" placeholder="Enter Next booking amount" required onkeyup="final_amt_not_greater()">
                                    <input type="text" class="form-control" name="next_extra_services_amt" id="next_extra_services_amt" placeholder="Enter ES booking amount" required onkeyup="extra_service_final_amt_greater()">
                                    </td>
                                </tr>
                                <!-- <tr id="extra_services_amount_tr" style='display:none;'>
                                    <th>Depositing Amount</th>
                                    <td>
                                    </td>
                                </tr> -->
                                <tr id="payment_type_tr" style='display:contents;'>
                                    <th>Payment Type</th>
                                    <td>&nbsp;&nbsp;&nbsp;<input type="radio" name="payment_type" id="payment_type_advance" value="Advance">&nbsp;&nbsp;Advance
                                    &nbsp;&nbsp;&nbsp;<input type="radio" name="payment_type" id="payment_type_part" value="Part">&nbsp;&nbsp;Part
                                    &nbsp;&nbsp;&nbsp;<input type="radio" name="payment_type" id="payment_type_full" value="Full">&nbsp;&nbsp;Full</td>
                                    
                                </tr>
                                <tr id="pending_amount_tr">
                                    <th>Pending Amount</th>
                                    <td>
                                    <input readonly type="text" class="form-control" name="pending_amt" id="result_box" placeholder="Enter pending amount" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['run_pending_amt'];} ?>">
                                    <input readonly type="hidden" class="form-control" name="updatepending_amt" id="updatepending_amt" placeholder="Enter pending amount" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['run_pending_amt'];} ?>">

                                    <input readonly type="hidden" class="form-control" name="old_pending_amt" id="old_pending_amt" placeholder="Enter pending amount" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['pending_amt'];} ?>">

                                    <!-- extra services pending amount-->
                                    <input readonly type="text" class="form-control" name="extra_service_pending_amt" id="extra_service_result_box" placeholder="Enter ES pending amount" value="<?php echo $updating_pending_amount_result; ?>">
                                    <input readonly type="hidden" class="form-control" name="extra_service_updatepending_amt" id="extra_service_updatepending_amt" placeholder="Enter ES pending amount" value="<?php echo $updating_pending_amount_result; ?>">

                                    <input readonly type="hidden" class="form-control" name="extra_service_old_pending_amt" id="extra_service_old_pending_amt" placeholder="Enter ES pending amount" value="<?php //if(!empty($booking_payment_details)){ echo $booking_payment_details['pending_amt'];} ?>">
                                    <!-- extra services pending amount-->
                                </td>
                                </tr>

                                <!-- <tr id="pending_amount_tr" style='display:table-row;'>
                                    <th>Pending Amount</th>
                                    <td>
                                    <input readonly type="text" class="form-control" name="result_box" id="result_box" placeholder="Enter pending amount" value="<?php //if(!empty($booking_payment_details)){ echo $booking_payment_details['run_pending_amt'];} ?>">
                                    </td>
                                </tr> -->

                                <!-- <tr>
                                    <th>Payment</th>
                                    <td>&nbsp;&nbsp;<input type="radio" name="payment_now_later" id="payment_now_later" onchange='payment_otp(this.value);' value="Now">&nbsp;&nbsp;Now
                                    </td>
                                </tr> -->
                                <!-- &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="payment_now_later" id="payment_now_later" onchange='payment_otp(this.value);' value="Later">&nbsp;&nbsp;Later -->

                                <tr id="other_payment_mode_tr">
                                    <th>Amount Receiving Mode</th>
                                    <td>
                                    <select class="select_css" name="select_transaction" id="select_transaction" onchange='sra_account_details_partial_payment(this.value); 
                                        this.blur();'required="required">
                                        <option value="">Select Transaction</option>
                                        <option value="CASH">CASH</option>
                                        <option value="UPI">UPI</option>
                                        <option value="QR Code">QR Code</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Net Banking">Net Banking</option>
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

                                <div class="" id="net_banking_tr" style='display:none;'>
                                    <div class="row cash_payment_div">
                                        <center><h4 class="mb-4">Amount Receiver Details</h4></center>

                                            <div class="col-md-6 mt-2">
                                                <h6 class="text-center">Payment Type</h6>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                            <!-- &nbsp;&nbsp;<input type="radio" name="gender" id="male" value="Male">&nbsp;&nbsp;Male
                                            &nbsp;&nbsp;<input type="radio" name="gender" id="female" value="Female">&nbsp;&nbsp;Female -->

                                            <input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_neft" onchange="sra_partial_netpayment_validate_final_payment()" value="NEFT">&nbsp;&nbsp;NEFT
                                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_rtgs" onchange="sra_partial_netpayment_validate_final_payment()" value="RTGS">&nbsp;&nbsp;RTGS
                                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_imps" onchange="sra_partial_netpayment_validate_final_payment()" value="IMPS">&nbsp;&nbsp;IMPS
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <h6 class="text-center">Account Number</h6>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <select class="select_css"  name="net_banking_acc_no" id="net_banking_acc_no" required="required" onchange="sra_partial_netbank_accno_validate_final_payment()">
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
                                                <input type="text" class="form-control" name="net_banking_acc_no" id="net_banking_acc_no" onkeyup="netbank_accno_validate_final_payment()" placeholder="Enter Account No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                            </div> -->

                                            <div class="col-md-6 mt-2">
                                                <h6 class="text-center">Account Holder Name</h6>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input type="text" readonly class="form-control" name="net_acc_holder_nm" id="net_acc_holder_nm" onkeyup="netbank_accno_holder_nm_validate_final_payment()" placeholder="Enter Account Holder Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <h6 class="text-center">Branch Name</h6>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input type="text" class="form-control" name="net_banking_branch_name" id="net_banking_branch_name" onkeyup="sra_partial_netbank_branch_nm_validate_final_payment()" placeholder="Enter Branch Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <h6 class="text-center">Bank Name</h6>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input readonly type="text" class="form-control" name="netbanking_bank_name" id="netbanking_bank_name" onkeyup="netbank_bank_nm_validate_final_payment()" placeholder="Enter Bank Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <h6 class="text-center">UTR / Transaction No.</h6>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input type="text" class="form-control" name="net_banking_utr_no" id="net_banking_utr_no" onkeyup="sra_partial_netbank_utr_no_validate_final_payment()" placeholder="Enter UTR No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <h6 class="text-center">Transaction Date</h6>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input type="date" class="form-control" name="netbanking_date" id="netbanking_date" onchange="sra_partial_netbank_date_validate_final_payment()" placeholder="">
                                            </div>

                                            <div class="col-md-6 mt-2" id="net_banking_reason" style='display:none;'>
                                            <h6 class="text-center">reason</h6>
                                            </div>
                                            <div class="col-md-6 mt-2" id="net_banking_input" style='display:none;'>
                                                <input type="text" class="form-control" name="net_banking_reason_1" id="net_banking_reason_1" onkeyup="sra_partial_booking_net_banking_reason_validate_final_payment()" placeholder="Enter Reason" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            

                                <div class="" id="upi_no_div" style='display:none;'>
                                    <div class="row cash_payment_div">
                                        <center><h4 class="mb-4">Amount Receiver Details</h4></center>
                                        <div class="col-md-5 mt-1">
                                            <h6 class="text-center float-right">UPI ID Holder Name</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="select_css"  name="select_upi_no" id="select_upi_no" required="required" onchange="sra_partial_transaction_upi_validate_final_payment()">
                                            <!-- onchange='upi_QR_details(this.value); this.blur();' -->
                                                <option value="">Select UPI ID Holder Name</option>
                                                <option class="self_upi" attr_self="self" value="self">Self</option>
                                                <?php
                                                    foreach($upi_qr_data as $upi_qr_data_value) 
                                                    { 
                                                ?>
                                                    <option class="self_upi" attr_other="other" value="<?php echo $upi_qr_data_value['id'];?>"><?php echo $upi_qr_data_value['full_name'];?>-<?php echo $upi_qr_data_value['nick_name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">UPI Code App Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <select class="select_css" name="upi_payment_type" id="upi_payment_type" onchange="sra_partial_payment_type_validate_final_payment()">
                                                <option value="">Select Transaction</option>

                                            </select>
                                            <input type="hidden" readonly class="form-control" name="company_acc_yes_no" id="company_acc_yes_no">
                                        </div>
                                        <!-- <div id="upi_no_reason_div" style='display:none;'> -->
                                            <!-- <div class="col-md-5 mt-2">
                                                <h6 class="text-center float-right">Payment Type</h6>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <select class="select_css" name="upi_payment_type" id="upi_payment_type" onchange="payment_type_validate_final_payment()">
                                                    <option value="">Select Transaction</option>
                                                    <option value="Google Pay">Google Pay</option>
                                                    <option value="BHIM App">BHIM App</option>
                                                    <option value="PhonePe">PhonePe</option>
                                                    <option value="Paytm">Paytm</option>
                                                    <option value="SBI pay">SBI pay</option>
                                                    <option value="Bank of Baroda UPI">Bank of Baroda UPI</option>
                                                </select>
                                            </div> -->

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
                                                <input type="date" class="form-control" onchange="sra_partial_transaction_date_upi_validate_final_payment()" max="<?php echo date("Y-m-d");?>" name="upi_transaction_date" id="upi_transaction_date" max="<?php echo date("Y-m-d");?>" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['upi_transaction_date'];}?>" placeholder="Transaction Date"> 
                                            </div>

                                            <div class="col-md-5 mt-2">
                                                <h6 class="text-center float-right">UTR / Transaction No.</h6>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <input type="text" class="form-control" name="upi_no" id="upi_no" onkeyup="sra_partial_utr_no_validate_final_payment()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                            </div>

                                            <div class="col-md-5 mt-2" id="upi_reason" style='display:none;'>
                                                <h6 class="text-center float-right">reason</h6>
                                            </div>
                                            <div class="col-md-6 mt-2" id="upi_reason_input" style='display:none;'>
                                                <input type="text" class="form-control" name="reason" id="reason" onkeyup="sra_partial_reason_validate_final_payment()" placeholder="Enter Reason" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            
                                <div class="" id="rq_div" style='display:none;'>
                                    <div class="row cash_payment_div">
                                        <center><h4 class="mb-4">Amount Receiver Details</h4></center>
                                        <div class="col-md-6 mt-1">
                                            <h6 class="text-center">QR Holder Name</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="select_css" name="select_qr_upi_no" id="select_qr_upi_no" required="required" onchange="sra_partial_qr_hoder_name_validate_final_payment()">
                                            <!-- onchange='upi_QR_details(this.value); this.blur();' -->
                                                <option value="">Select UPI ID Holder Name</option>
                                                <option value="Self" attr_self="self">Self</option>
                                                <?php
                                                    foreach($upi_qr_data as $upi_qr_data_value) 
                                                    { 
                                                ?>
                                                    <option value="<?php echo $upi_qr_data_value['id'];?>"><?php echo $upi_qr_data_value['full_name'];?>-<?php echo $upi_qr_data_value['nick_name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">QR Code App Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <select class="select_css" name="qr_payment_type" id="qr_payment_type" onchange="sra_partial_qr_payment_type_validate_final_payment()">
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
                                            <input type="date" class="form-control" onchange="sra_partial_qr_transaction_date_validate_final_payment()" max="<?php echo date("Y-m-d");?>" name="qr_transaction_date" id="qr_transaction_date" max="<?php echo date("Y-m-d");?>" value="<?php //if(!empty($booking_payment_details)){ echo $booking_payment_details['upi_transaction_date'];}?>" placeholder="Transaction Date"> 
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">UTR / Transaction No.</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="qr_upi_no" id="qr_upi_no" onkeyup="sra_partial_qr_utr_no_validate_final_payment()" placeholder="Enter Transaction Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-6 mt-2" id="qr_reason" style='display:none;'>
                                            <h6 class="text-center">reason</h6>
                                        </div>
                                        <div class="col-md-6 mt-2" id="qr_reason_input" style='display:none;'>
                                            <input type="text" class="form-control" name="qr_reason_1" id="qr_reason_1" onkeyup="sra_partial_booking_qr_reason_validate_final_payment()" placeholder="Enter Reason" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">QR code Image</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div name="qr_mode_code_image" id="qr_mode_code_image"></div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="" id="cheque_tr" style='display:none;'>
                                    <div class="row cash_payment_div">
                                        <center><h4 class="mb-4">Amount Receiver Details</h4></center>

                                        <div class="col-md-6 mt-1">
                                            <h6 class="text-center">Name On Cheque</h6>
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <select class="select_css"  name="name_on_cheque" id="name_on_cheque" required="required" onchange="sra_partial_cheque_name_validate_final_payment()">
                                            <!-- onchange='upi_QR_details(this.value); this.blur();' -->
                                                <option value="">Select Name On Cheque</option>
                                                <option value="self" attr_self="self">Self</option>
                                                <?php
                                                    foreach($upi_qr_data as $upi_qr_data_value) 
                                                    { 
                                                ?>
                                                    <option class="self_upi" value="<?php echo $upi_qr_data_value['id'];?>"><?php echo $upi_qr_data_value['full_name'];?>-<?php echo $upi_qr_data_value['nick_name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Bank Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <select class="select_css" name="cheque_bank_name" id="cheque_bank_name" onchange="sra_partial_cheque_bank_name_validate_final_payment()">
                                                <option value="">Select Transaction</option>

                                            </select>
                                        <input type="hidden" readonly class="form-control" name="cheque_company_acc_yes_no" id="cheque_company_acc_yes_no">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Cheque Bank Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="bank_name" id="bank_name" onkeyup="sra_partial_cheque_banknm_validate_final_payment()" placeholder="Enter Bank Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Cheque Number</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="cheque" id="cheque" onkeyup="sra_partial_cheque_no_validate_final_payment()" placeholder="Enter Cheque Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Drawn On Date</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="date" class="form-control" name="drawn_on_date" id="drawn_on_date" onchange="sra_partial_cheque_date_validate_final_payment()" placeholder="Select Date">
                                        </div>

                                        <div class="col-md-6 mt-2" id="cheque_reason" style='display:none;'>
                                            <h6 class="text-center">reason</h6>
                                        </div>
                                        <div class="col-md-6 mt-2" id="cheque_reason_input" style='display:none;'>
                                            <input type="text" class="form-control" name="cheque_reason_1" id="cheque_reason_1" onkeyup="sra_partial_booking_cheque_reason_validate_final_payment()" placeholder="Enter Reason" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>
                                        </div>
                                </div>


                            <div class="col-md-3">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
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
                        </div>
                    </div>

                    <?php 
                        if(!empty($extra_services_details_value)){?>
                            <div class="" id="extra_services_div" style='display:none;'>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8 mt-1 cash_payment_div">
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Extra Services Name</th>
                                            <th>Extra Services Amount</th>
                                            <th>Customer Depositing Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1;?>
                                        <?php  
                                        foreach($extra_services_details_value as $extra_services_details_value_info) 
                                        { 
                                            ?>
                                        <tr>
                                            <td><?php echo $extra_services_details_value_info['service_name'] ?></td>
                                            <td id="service_amt_value<?php echo $i; ?>"><?php echo $extra_services_details_value_info['services_amt'] ?></td>
                                            <td><input type="text" class="form-control customer_sending_amt_class" name="customer_sending_amt[]" id="customer_sending_amt<?php echo $i;?>" placeholder="Enter sending amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1'); updateSubmitButton();"></td>
                                        </tr>
                                        <?php } ?>
                                        <?php $i++; ?>
                                        </tbody>
                                        <h6 id="not_match_show_msg" style="color:red; text-align:center; display:none;">Please check Depositing Amount.</h6>
                                    </table> 
                                    </div> 
                                    <div class="col-md-2">
                                    </div>
                                </div>
                            </div>
                            <?php  } else{ ?>
                                <div class="row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-6 mt-1 cash_payment_div">
                                        <h6 style="color:red; text-align:center">Extra services not added</h6>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>
                            <?php } ?>

                    <div id="other_payment_mode_div">
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
                                            <th><button type="button" class="btn btn-success" name="sra_partial_pending_amt_payment_final_booking_submit" id="sra_partial_pending_amt_payment_final_booking_submit" value="submit" disabled>Verify OTP</button> </th>
                                        </tr>
                                    </table>
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <center><th><button type="button" class="btn btn-primary mb-3" name="sra_partial_pending_amt_submit_otp" id="sra_partial_pending_amt_submit_otp"  disabled>Send OTP</button></th></center>
                                        </div>
                                        <div class="col-md-4">
                                            <center><th><button type="button" class="btn btn-primary mb-3" name="sra_partial_pending_amt_re_send_otp" id="sra_partial_pending_amt_re_send_otp" disabled>Resend OTP</button></th></center>
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


                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <tr>
                                <th>Master's Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>Account details Other</td>
                                
                                <td>"UPI ID Holder Name,QR Holder Name,Name On Cheque,Account Number : Navigate here to include new account details above the 'Account details' option."</td>
                                <td>
                                <a href="<?php echo base_url(); ?>admin/add_qr_code/index"><button type="button" class="btn btn-success" >Add</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Account details Self</td>
                                <td>"UPI ID Holder Name,QR Holder Name,Name On Cheque,Account Number : Navigate here to include new account details above the 'Account details' option."</td>
                                <td>
                                <a href="<?php echo base_url(); ?>agent/add_qr_code/index"><button type="button" class="btn btn-success" >Add</button></a>
                                </td>
                            </tr>
                        </table>
                    </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>

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