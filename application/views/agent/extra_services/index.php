<style>
    .cash_payment_div{
        border: 1px solid black;
        padding: 20px;
    }
    .mealplan_css{
            border: 1px solid red !important;
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
            <form method="post" enctype="multipart/form-data" id="extra_services">
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
                            $enq = $info['domestic_enquiry_id'];
                            ?>
                            <?php if($info['for_credentials']=='yes'){?>
                            <input type="hidden" class="form-control" name="traveller_id" id="traveller_id" value="<?php echo $info['id']; ?>">
                            <label hidden>Credentials give to this mobile number</label>
                            <input type="hidden" class="form-control" disabled name="crediential_mobile_no" id="crediential_mobile_no" value="<?php echo $info['mobile_number']; ?>">

                            <?php } }?>
                            <div class="mt-3">
                                <label for="coupon_question">Do You Want Extra Services ?</label>
                            
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="extra_services_yes" name="extra_services" class="extra_services_yes_no" value="yes" onclick="show2();" <?php if(!empty($extra_services['extra_services'])){if("yes" == $extra_services['extra_services']) {echo 'checked';}}?>/>
                                    <label for="Yes" id="extra_services_yes">Yes</label> &nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="extra_services_no" name="extra_services" class="extra_services_yes_no" value="no" onclick="show1();" <?php if(!empty($extra_services['extra_services'])){if("no" == $extra_services['extra_services']) {echo 'checked';}}?>/>
                                    <label for="No" id="extra_services_no">No</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                        </div>
                        <?php 
                         if(!empty($extra_services['extra_services']) && $extra_services['extra_services'] == 'yes'){
                            // print_r('fsgfsgdfggsgf');
                            ?>
                        <div class="col-md-3" id="extra_services_div1">
                            <label>Services Name-Cost</label>
                        </div>  
                        <div class="col-md-3" id="extra_services_div2">
                            <div class="form-group">
                                <select class="select2" multiple="multiple" data-placeholder="Select Services" style="width: 100%;" name="select_services[]" id="select_services">
                                <option value="">Select Services</option>
                                <?php
                                    foreach($extra_services_details as $extra_services_details_value) 
                                    {
                                ?>
                                <option value="Other" <?php if(isset($extra_services_details_value['select_services'])){if("Other" == $extra_services_details_value['select_services']) {echo 'selected';}}?>>Other</option>
                                <?php } ?>
                                <?php
                                foreach ($special_req_master_data as $special_req_master_data_value) {
                                    $selected = in_array($special_req_master_data_value['id'], array_column($extra, 'select_services')) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $special_req_master_data_value['id']; ?>" <?php echo $selected; ?>><?php echo $special_req_master_data_value['service_name']; ?></option>
                                <?php } ?>
                                <!-- <?php
                                    //foreach($special_req_master_data as $special_req_master_data_value) 
                                    //{ 
                                ?>
                                    <option value="<?php //echo $special_req_master_data_value['id'];?>" <?php //if(!empty($extra['select_services'])){if($special_req_master_data_value['id'] == $extra['select_services']) {echo 'selected';}}?>><?php //echo $special_req_master_data_value['service_name'];?></option>
                                <?php //} ?> -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            
                        </div>
                        <?php
                            foreach($extra_services_details as $extra_services_details_value) 
                            {
                                // print_r($extra_services_details); die;
                                if($extra_services_details_value['select_services'] == 'Other'){
                        ?>
                        <div class="col-md-3">
                            <div id="other_service_div">
                            <label>Other Services Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control mealplan_css" name="other_services" id="other_services" placeholder="Enter services name" value="<?php echo $extra_services_details_value['other_services']; ?>">
                                    </div>
                            </div>
                        </div>
                        <?php }} ?>
                        <?php } else {
                            // print_r('nnnnnnnnnnnnnnnnn');
                            ?>
                            <div class="col-md-3 hide" id="extra_services_div1">
                            <label>Services Name-Cost</label>
                        </div>
                        <div class="col-md-3 hide" id="extra_services_div2">
                            <div class="form-group">
                            <!-- onchange='tour_title(this.value); this.blur();' -->
                                <select class="select2" multiple="multiple" data-placeholder="Select Services" style="width: 100%;" name="select_services[]" id="select_services">
                                <option value="">Select Services</option>
                                <option value="Other">Other</option>
                                <?php
                                    foreach($special_req_master_data as $special_req_master_data_value) 
                                    {
                                ?>
                                    <option value="<?php echo $special_req_master_data_value['id'];?>"><?php echo $special_req_master_data_value['service_name'];?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                        </div>
                                        
                        <div class="col-md-3">
                            <div id="other_service_div">
                            <label>Other Services Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control mealplan_css" name="other_services" id="other_services" placeholder="Enter services name">
                                    </div>
                            </div>
                            <?php } ?>
                        </div>
                        </div>
                            
                        
                </div>


                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button> -->
                    <!-- <button type="button" class="btn btn-success booknow_submit" name="extra_services" value="Submit & Proceed" id="extra_services">Submit & Proceed</button> -->
                    <button type="button" class="btn btn-success" name="booking_submit" id="extra_service_submit" value="booking_submit">Submit & Proceed</button>
                    <button type="button" class="btn btn-warning" name="extra_submit_back" value="submit_back" id="back_button_extra_services">Back</button>
                    <a href="<?php echo $module_url_booking_process; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
                <!-- <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="row justify-content-center">
                                            <div class="col-md-5">
                                                <center><th><button type="button" class="btn btn-primary mb-3" name="booking_submit_otp" id="booking_submit_otp">Submit / Send OTP</button></th></center>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->


                
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
    document.getElementById('other_service_div').style.display ='none';
    }
    function show2(){
    document.getElementById('extra_services_div1').style.display = 'block';
    document.getElementById('extra_services_div2').style.display = 'block';
    // document.getElementById('other_service_div').style.display ='block';
    }
</script>