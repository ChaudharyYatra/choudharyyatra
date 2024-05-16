<style>
    .cash_payment_div{
        border: 1px solid black;
        padding: 20px;
    }
</style>

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

            <!-- <form method="post" action="<?php //echo base_url(); ?>agent/srs_form/edit" enctype="multipart/form-data" id="final_booking_preview"> -->
            <form method="post" action="<?php echo $module_url_path;?>/edit" enctype="multipart/form-data">
            <div class="card card-primary">
              <div class="card-header">
              <?php foreach($traveller_booking_info as $traveller_booking_info_value) 
                   {  ?>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Tour Details -</label>
                        </div>  
                        <div class="col-md-5">
                            <div><?php echo $traveller_booking_info_value['tour_number']; ?> - <?php echo $traveller_booking_info_value['tour_title']; ?></div>
                        </div>
                        <div class="col-md-2">
                            <label>Customer Name -</label>
                        </div>
                        <div class="col-md-3">
                            <div><?php echo $traveller_booking_info_value['first_name']; ?> <?php echo $traveller_booking_info_value['middle_name']; ?> <?php echo $traveller_booking_info_value['srname']; ?></div>
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
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-3">
                            <label> Total Travellers Count -</label>
                        </div>
                        <div class="col-md-1">
                            <div><?php echo $traveller_booking_info_value['seat_count']; ?></div>
                        </div>
                        <input type="hidden" class="form-control" name="hotel_name_id" id="hotel_name_id" value="<?php echo $traveller_booking_info_value['hotel_name_id']; ?>">
                        <input type="hidden" class="form-control" name="package_date_id" id="package_date_id" value="<?php echo $traveller_booking_info_value['tour_date']; ?>">
                        <input type="hidden" class="form-control" name="enquiry_id" id="enquiry_id" value="<?php echo $traveller_booking_info_value['domestic_enquiry_id']; ?>">
                        <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $traveller_booking_info_value['pid']; ?>">
                        <input type="hidden" class="form-control" name="journey_date" id="journey_date" value="<?php echo $traveller_booking_info_value['journey_date']; ?>">
                    
                        <!-- <input type="hidden" class="form-control" name="booking_ref_no" id="booking_ref_no" value=""> -->
                    </div>
                <?php } ?>
                
              </div>

                <input type="hidden" class="form-control" name="booking_payment_details_id" id="booking_payment_details_id" value="<?php if(isset($booking_payment_details)){echo $booking_payment_details['id'];} ?> ">
                <input type="hidden" class="form-control" name="return_customer_booking_payment_id" id="return_customer_booking_payment_id" value="<?php if(isset($return_customer_booking_payment_details)){echo $return_customer_booking_payment_details['id'];} ?>">

                
                

                <?php
                foreach($extra_services_details as $extra_services_details_value) 
                { 
                ?>
                <input type="hidden" class="form-control" name="extra_sevices_id" id="extra_sevices_id" value="<?php if(isset($extra_services_details_value)){echo $extra_services_details_value['id'];} ?>">
                <?php } ?>

                <div class="card-body extrax_services_div">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <?php 
                        foreach($arr_data as $info) 
                        { 
                            // print_r($info); die;
                        ?>
                        <?php if($info['for_credentials']=='yes'){?>
                        <input type="hidden" class="form-control" name="traveller_id" id="traveller_id" value="<?php echo $info['id']; ?>">
                        <label>Credentials give to this mobile number</label>
                        <input type="text" class="form-control" disabled name="crediential_mobile_no" id="crediential_mobile_no" value="<?php echo $info['mobile_number']; ?>">

                        <?php } }?>
                            <div class="">
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3" id="">
                        </div>
                        <div class="col-md-3" id="">
                        </div>
                        <div class="col-md-3 hide" id="">
                        </div>
                        <div class="col-md-3 hide" id="">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                            <?php 
                            foreach($arr_data as $info) 
                            { 
                                // print_r($info); die;
                            ?>
                            <?php if($info['for_credentials']=='yes'){?>
                            <input type="hidden" class="form-control" name="traveller_id" id="traveller_id" value="<?php echo $info['id']; ?>">
                            <?php } }?>
                                <div class="col-md-6">
                                    <h5> Booking Confirmation OTP</h5>
                                    <table id="example2" class="table table-bordered table-hover table-striped">
                                        <tr>
                                            <th><input type="text" class="form-control" name="booking_otp" id="booking_otp" placeholder="Enter OTP" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> 
                                            <p id="booking_least_count"></p>
                                            </th>
                                            
                                            <th><button type="button" class="btn btn-success" name="booking_submit" id="booking_confirm_submit" value="booking_submit" disabled>Verify OTP</button></th>
                                            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal_send" -->
                                            <!-- <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="enq_id" data-bs-whatever="Form" data-enq-id="<?php //echo $enq_id;?>"><button type="button" class="btn btn-primary btn-sm btn_follow take_followup_btn" class="dropdown-item">Take Followup</button> </a> -->
                                        </tr>
                                    </table>

                                    <div class="row justify-content-center">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-2">
                                                <center><button type="button" class="btn btn-warning mb-3" name="booking_confirm_back" id="booking_confirm_back" value="booking_confirm_back">Back</button></center>
                                            </div>
                                            <div class="col-md-3">
                                                <center><button type="button" class="btn btn-primary mb-3" name="booking_submit_otp" id="booking_submit_otp">Send OTP</button></center>
                                            </div>
                                            <div class="col-md-4 send_btn">
                                                <center><button type="button" class="btn btn-primary mb-3" name="booking_re_send_otp" id="booking_re_send_otp" disabled>Resend OTP</button></center>
                                            </div>
                                            <div class="col-md-1">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-3">
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
                <button type="submit" class="btn btn-warning" name="submit_back" value="submit_back" id="back-button_srs_form">Back</button>
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