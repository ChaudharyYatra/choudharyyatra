
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
              <a href="<?php echo $module_url_path; ?>/sub_index/<?php echo $agent_id;?>/<?php echo $p_id;?>/<?php echo $p_date_id;?>"><button class="btn btn-primary">Back</button></a>
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
            <?php $this->load->view('admin/layout/admin_alert'); ?>

           

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
                        
                    
                    </div>
                <?php } ?>
              </div>

                <div class="card-body">
                    <?php  if(count($arr_data) > 0 ) 
                    { ?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Age</th>
                        <th>Anniversary Date</th>
                        <th>Mobile Number</th>
                        <th>Relation</th>
                        <th>Image</th>
                        <th>Aadhar Card image</th>
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
                        <td><?php echo $info['mr/mrs'] ?> <?php echo $info['first_name'] ?> <?php echo $info['middle_name'] ?> <?php echo $info['last_name'] ?></td>
                        <td>
                            <?php if($info['dob']=='0000-00-00') { ?>
                                NA
                            <?php } else{ ?>
                                <?php echo date("d-m-Y",strtotime($info['dob'])) ?>
                            <?php }?>
                        </td>
                        <td><?php echo $info['age'] ?></td>
                        <td>
                            <?php if($info['anniversary_date']=='0000-00-00') { ?>
                                NA
                            <?php } else{ ?>
                                <?php echo date("d-m-Y",strtotime($info['anniversary_date'])) ?>
                            <?php }?>
                        </td>
                        <td><?php echo $info['mobile_number'] ?></td>
                        <td><?php echo $info['all_traveller_relation'] ?></td>
                        <td>
                            <img src="<?php echo base_url(); ?>uploads/traveller/<?php echo $info['image_name']; ?>" width="70px;" height="30px;" alt="Image">
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/traveller/<?php echo $info['image_name']; ?>">Download</a>
                        </td>
                        <td>
                            <img src="<?php echo base_url(); ?>uploads/traveller_aadhar/<?php echo $info['aadhar_image_name']; ?>" width="70px;" height="30px;" alt="Image">
                            <a class="btn-link pull-right text-center" download="" target="_blank" href="<?php echo base_url(); ?>uploads/traveller_aadhar/<?php echo $info['aadhar_image_name']; ?>">Download</a>
                        </td>

                        </tr>
                        <?php $i++; } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <h5>Seat Details :</h5>
                            <?php
                            foreach($seat_type_room_type_data as $info) 
                            { 
                            ?>
                            <table id="example2" class="table table-bordered table-hover table-striped">

                                <?php if($info['seperate_seat']!='' && $info['total_seperate_seat']!='') { ?>
                                <tr>
                                    <th>Seperate Seat</th>
                                    <td><?php echo $info['seperate_seat']; ?></td>
                                </tr>
                                <?php } ?>

                                <?php if($info['child_seperate_seat']!='' && $info['total_child_seperate_seat']!='') { ?>
                                <tr>
                                    <th>Child Seperate Seat</th>
                                    <td><?php echo $info['child_seperate_seat']; ?></td>
                                </tr>
                                <?php } ?>

                                <?php if($info['two_child_share_one_seat']!='' && $info['total_two_child_share_one_seat']!='') { ?>
                                <tr>
                                    <th>Two Child Share One Seat</th>
                                    <td><?php echo $info['two_child_share_one_seat']; ?></td>
                                </tr>
                                <?php } ?>

                                <?php if($info['child_no_seat_needed']!='' && $info['total_child_no_seat_needed']!='') { ?>
                                <tr>
                                    <th>Child No Seat Needed</th>
                                    <td><?php echo $info['child_no_seat_needed']; ?></td>
                                </tr>
                                <?php } ?>

                                <?php if($info['child_noo_seat_needed']!='' && $info['total_child_noo_seat_needed']!='') { ?>
                                <tr>
                                    <th>Child No Seat Needed</th>
                                    <td><?php echo $info['child_noo_seat_needed']; ?></td>
                                </tr>
                                <?php } ?>

                                <tr>
                                    <th>Total Seats</th>
                                    <td><?php echo $info['total_busseattype']; ?></td>
                                </tr>

                            </table>
                            <?php } ?>

                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                    
                </div>

                <div class="card-body">
                    <?php  if(count($bus_seat_book_data) > 0 ) 
                    { ?>
                    <h5>Bus Seat Details :</h5>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>SN</th>
                        <th>seat_id</th>
                        <th>seat_type</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                        
                        $i=1; 
                        foreach($bus_seat_book_data as $info) 
                        { 
                            $enquiry_id = $info['enquiry_id']; 
                        ?>
                        <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $info['seat_id'] ?></td>
                        <td><?php echo $info['seat_type'] ?></td>

                        </tr>
                        <?php $i++; } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>

                <div class="card-body">
                    <h5>Hotel Details :</h5>
                    <?php
                    foreach($seat_type_room_type_data as $info) 
                    { 
                    ?>
                    <table id="example2" class="table table-bordered table-hover table-striped">
                        <tr>
                            <?php if($info['total_allocated_rooms_1']!='') { ?>
                            <th>One bed room</th>
                            <td><?php echo $info['total_allocated_rooms_1']; ?></td>
                            <?php } ?>

                            <?php if($info['total_allocated_rooms_2']!='') { ?>
                            <th>Two bed room</th>
                            <td><?php echo $info['total_allocated_rooms_2']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php if($info['total_allocated_rooms_3']!='') { ?>
                            <th>Two bed & one mattress room</th>
                            <td><?php echo $info['total_allocated_rooms_3']; ?></td>
                            <?php } ?>

                            <?php if($info['total_allocated_rooms_4']!='') { ?>
                            <th>Three bed & two mattress room</th>
                            <td><?php echo $info['total_allocated_rooms_4']; ?></td>
                            <?php } ?>
                        </tr>

                    </table>
                    <?php } ?>
                </div>

                <div class="card-body">
                    <?php  if(count($bus_seat_book_data) > 0 ) 
                    { ?>
                    <h5>Bus Seat Details :</h5>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>SN</th>
                        <th>seat_id</th>
                        <th>seat_type</th>
                        <th>Seat Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                        
                        $i=1; 
                        $seat_total_cost=0;
                        foreach($bus_seat_book_data as $info) 
                        { 
                            $enquiry_id = $info['enquiry_id']; 
                        ?>
                        <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $info['seat_id'] ?></td>
                        <td><?php echo $info['seat_type'] ?></td>
                        <td><?php echo $info['seat_price'] ?></td>

                        </tr>
                        <?php $i++;
                        $seat_total_cost+=$info['seat_price'];
                    } ?>
                        <tr>
                            <th>Total Seat Extra Cost</th>
                            <td></td>
                            <td></td>
                            <td><b><?php echo $seat_total_cost; ?></b></td>
                            <?php $seat_total_cost = $seat_total_cost; ?>
                        </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>

                <div class="card-body">
                    <h5> Details :</h5>
                    <?php
                    foreach($seat_type_room_type_data as $info) 
                    { 
                    ?>
                    <table id="example2" class="table table-bordered table-hover table-striped">
                        <tr style="border-bottom: 2px solid;">
                            <th>SN</th>
                            <th>Room Type</th>
                            <th>Adult</th>
                            <th>90%</th>
                            <th>60%</th>
                            <th>40%</th>
                            <th>0%</th>
                            <th>Total</th>

                        </tr>
                        
                        <?php if($info['total_onebed_oneroom']!= '') { ?>   
                        <tr>
                            <th>1</th>

                            <td>1 Bed - One Room</td>
                            <?php if($info['onebed_oneroom_cost_adult']!= '') { ?>
                            <td><?php echo $info['onebed_oneroom_cost_adult']; ?> * <?php echo $info['onebed_oneroom_cost']; ?> = <b><?php echo $multiplication_1 = $info['onebed_oneroom_cost_adult']*$info['onebed_oneroom_cost']; ?></b></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <td Readonly></td>

                            <td Readonly></td>

                            <?php if($info['onebed_oneroom_40']!= '') { ?>
                            <td><?php $h=100; $fourty=40; $ans=$info['onebed_oneroom_cost']/$h*$fourty; echo $info['onebed_oneroom_40']; ?>*<?php echo $ans; ?>=<?php echo $multiplication_40 = $info['onebed_oneroom_40']*$ans; ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['onebed_oneroom_0']!= '') { ?>
                            <td><?php echo $info['onebed_oneroom_0']; ?></td>
                            <?php } else{ ?>
                            <td>0</td>
                            <?php } ?>

                            <td>
                                <?php if($info['total_onebed_oneroom']!= '') { ?>
                                <?php echo $info['total_onebed_oneroom']; ?>
                                <?php } else{ ?>
                                    0
                                <?php } ?>
                            </td>
                            
                        </tr>
                        <?php } ?>
                    
                        <?php if($info['total_twobed_oneroom']!= '') { ?>    
                        <tr>
                            <th>2</th>

                            <td>2 Bed - One Room</td>
                            <?php if($info['twobed_oneroom_cost_adult']!= '') { ?>
                            <td><?php echo $info['twobed_oneroom_cost_adult']; ?>*<?php echo $info['twobed_oneroom_cost']; ?>=<?php echo $multiplication_2 = $info['twobed_oneroom_cost_adult']*$info['twobed_oneroom_cost'] ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['twobed_oneroom_count_90']!= '') { ?>
                            <td><?php $h=100; $ninety=90; $ans=$info['twobed_oneroom_cost']/$h*$ninety; echo $info['twobed_oneroom_count_90']; ?>*<?php echo $ans; ?>=<?php echo $multiplication_2 = $info['twobed_oneroom_count_90']*$ans; ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['twobed_oneroom_count_60']!= '') { ?>
                            <td><?php $h=100; $sixty=60; $ans=$info['twobed_oneroom_cost']/$h*$sixty; echo $info['twobed_oneroom_count_60']; ?>*<?php echo $ans; ?>=<?php echo $multiplication_2 = $info['twobed_oneroom_count_60']*$ans; ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['twobed_oneroom_count_40']!= '') { ?>
                            <td><?php $h=100; $fourty=40; $ans=$info['twobed_oneroom_cost']/$h*$fourty; echo $info['twobed_oneroom_count_40']; ?>*<?php echo $ans; ?>=<?php echo $multiplication_2 = $info['twobed_oneroom_count_40']*$ans; ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['twobed_oneroom_count_0']!= '') { ?>
                            <td><?php echo $info['twobed_oneroom_count_0']; ?></td>
                            <?php } else{ ?>
                            <td>0</td>
                            <?php } ?>

                            <td>
                                <?php if($info['total_twobed_oneroom']!= '') { ?>
                                <?php echo $info['total_twobed_oneroom']; ?>
                                <?php } else{ ?>
                                0
                                <?php } ?>
                            </td>

                        </tr>
                        <?php } ?>         
                               
                        <?php if($info['total_threebed_oneroom']!= '') { ?>
                        <tr>
                            <th>3</th>

                            <td>3 Bed - One Room</td>
                            <?php if($info['threebed_oneroom_cost_adult']!= '') { ?>
                            <td><?php echo $info['threebed_oneroom_cost_adult']; ?>*<?php echo $info['threebed_oneroom_cost']; ?>=<?php echo $multiplication_2 = $info['threebed_oneroom_cost_adult']*$info['threebed_oneroom_cost'] ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['threebed_oneroom_count_90']!= '') { ?>
                            <td><?php $h=100; $ninety=90; $ans=$info['threebed_oneroom_cost']/$h*$ninety; echo $info['threebed_oneroom_count_90']; ?>*<?php echo $ans ?>=<?php echo $multiplication_2 = $info['threebed_oneroom_count_90']*$ans; ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['threebed_oneroom_count_60']!= '') { ?>
                            <td><?php $h=100; $sixty=60; $ans=$info['threebed_oneroom_cost']/$h*$sixty; echo $info['threebed_oneroom_count_60']; ?>*<?php echo $ans ?>=<?php echo $multiplication_2 = $info['threebed_oneroom_count_60']*$ans; ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['threebed_oneroom_count_40']!= '') { ?>
                            <td><?php $h=100; $fourty=40; $ans=$info['threebed_oneroom_cost']/$h*$fourty; echo $info['threebed_oneroom_count_40']; ?>*<?php echo $ans ?>=<?php echo $multiplication_2 = $info['threebed_oneroom_count_40']*$ans; ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['threebed_oneroom_count_0']!= '') { ?>
                            <td><?php echo $info['threebed_oneroom_count_0']; ?></td>
                            <?php } else{ ?>
                            <td>0</td>
                            <?php } ?>

                            <td>
                                <?php if($info['total_threebed_oneroom']!= '') { ?>
                                <?php echo $info['total_threebed_oneroom']; ?>
                                <?php } else{ ?>
                                0
                                <?php } ?>
                            </td>

                        </tr>
                        <?php } ?>       
                        <?php if($info['total_fourbed_oneroom']!= '') { ?>         
                        <tr>
                            <th>4</th>

                            <td>4 Bed - One Room</td>
                            <?php if($info['fourbed_oneroom_cost_adult']!= '') { ?>
                            <td><?php echo $info['fourbed_oneroom_cost_adult']; ?>*<?php echo $info['fourbed_oneroom_cost']; ?>=<?php echo $multiplication_2 = $info['fourbed_oneroom_cost_adult']*$info['fourbed_oneroom_cost'] ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['fourbed_oneroom_count_90']!= '') { ?>
                            <td><?php $h=100; $ninety=90; $ans=$info['fourbed_oneroom_cost']/$h*$ninety; echo $info['fourbed_oneroom_count_90']; ?>*<?php echo $ans ?>=<?php echo $multiplication_2 = $info['fourbed_oneroom_count_90']*$ans ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['fourbed_oneroom_count_60']!= '') { ?>
                            <td><?php $h=100; $sixty=60; $ans=$info['fourbed_oneroom_cost']/$h*$sixty; echo $info['fourbed_oneroom_count_60']; ?>*<?php echo $ans ?>=<?php echo $multiplication_2 = $info['fourbed_oneroom_count_60']*$ans ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['fourbed_oneroom_count_40']!= '') { ?>
                            <td><?php $h=100; $fourty=40; $ans=$info['fourbed_oneroom_cost']/$h*$fourty; echo $info['fourbed_oneroom_count_40']; ?>*<?php echo $ans ?>=<?php echo $multiplication_2 = $info['fourbed_oneroom_count_40']*$ans ?></td>
                            <?php } else{ ?>
                            <td>NA</td>
                            <?php } ?>

                            <?php if($info['fourbed_oneroom_count_0']!= '') { ?>
                            <td><?php echo $info['fourbed_oneroom_count_0']; ?></td>
                            <?php } else{ ?>
                            <td>0</td>
                            <?php } ?>

                            <td>
                                <?php if($info['total_fourbed_oneroom']!= '') { ?>
                                <?php echo $info['total_fourbed_oneroom']; ?>
                                <?php } else{ ?>
                                0
                                <?php } ?>
                            </td>

                        </tr>
                        <?php } ?>                 
                        <tr>
                            <th></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Total</th>
                            <th><?php echo $info['total_hotel_amount']; ?></th>
                            <?php $total_hotel_amount = $info['total_hotel_amount']; ?>
                        </tr>

                    </table>
                    <?php } ?>
                </div>


                <?php
                   foreach($booking_payment_details_data as $info) 
                   { 
                    // print_r($booking_payment_details_data);
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <h5>Final Payment Details :</h5>
                            
                            <table id="example2" class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Mobile Number</th>
                                    <td>
                                    <input readonly type="tel" class="form-control" name="booking_tm_mobile_no" id="booking_tm_mobile_no" minlength="10" maxlength="10" placeholder="Enter mobile number" value="<?php if(!empty($info)){ echo $info['booking_tm_mobile_no'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required onkeyup="validate()">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Final Total</th>
                                    <?php $final_total = $total_hotel_amount + $seat_total_cost; ?>
                                    <td><input readonly type="text" class="form-control" name="final_amt" id="final_amt" placeholder="Final amount" value="<?php echo $final_total ?>" required></td>
                                    
                                </tr>
                                <?php if($info['payment_now_later']!== 'Later'){?>
                                <tr id="payment_type_tr" style='display:contents;'>
                                    <th>Payment Type</th>
                                    <td>&nbsp;&nbsp;&nbsp;<input type="radio" name="payment_type" id="payment_type" value="Advance" <?php if(!empty($booking_payment_details['payment_type'])){if("Advance" == $booking_payment_details['payment_type']) {echo 'checked';}}?>>&nbsp;&nbsp;Advance
                                    &nbsp;&nbsp;&nbsp;<input type="radio" name="payment_type" id="payment_type" value="Part" <?php if(!empty($booking_payment_details['payment_type'])){if("Part" == $booking_payment_details['payment_type']) {echo 'checked';}}?>>&nbsp;&nbsp;Part
                                    &nbsp;&nbsp;&nbsp;<input type="radio" name="payment_type" id="payment_type" value="Full" <?php if(!empty($booking_payment_details['payment_type'])){if("Full" == $booking_payment_details['payment_type']) {echo 'checked';}}?>>&nbsp;&nbsp;Full</td>
                                    
                                </tr>
                                
                                <tr id="booking_amount_tr" style='display:table-row;'>
                                    <th>Booking Amount</th>
                                    <td>
                                    <input type="text" class="form-control" name="booking_amt" id="booking_amt" placeholder="Enter booking amount" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['booking_amt'];} ?>" required onkeyup="validate()">
                                    </td>
                                </tr>

                                <tr id="pending_amount_tr" style='display:table-row;'>
                                    <th>Pending Amount</th>
                                    <td>
                                    <input readonly type="text" class="form-control" name="pending_amt" id="pending_amt" placeholder="Enter pending amount" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['pending_amt'];} ?>">
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th>Payment</th>
                                    <td>&nbsp;&nbsp;<input disabled type="radio" name="payment_now_later" id="payment_now_later" onchange='payment_otp(this.value);' value="Now" <?php if(!empty($info['payment_now_later'])){if("Now" == $info['payment_now_later']) {echo 'checked';}}?>>&nbsp;&nbsp;Now
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="radio" name="payment_now_later" id="payment_now_later" onchange='payment_otp(this.value);' value="Later" <?php if(!empty($info['payment_now_later'])){if("Later" == $info['payment_now_later']) {echo 'checked';}}?>>&nbsp;&nbsp;Later
                                    </td>
                                    
                                </tr>

                                <tr id="other_payment_mode_tr" style='display:none;'>
                                    <th>Payment Mode</th>
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

                                <?php if($info['payment_now_later']== 'Later'){?>
                                <tr>
                                    <th>Give Reason</th>
                                    <td><textarea disabled class="form-control select_css" name="later_payment_reason" id="later_payment_reason" onkeyup="later_reason(this);"><?php if(!empty($info)){ echo $info['payment_reason'];} ?> </textarea></td>
                                </tr>
                                <?php } ?>
                                
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
                                            <h6 class="text-center">UTR No</h6>
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
                                            <input type="date" class="form-control" name="netbanking_date" id="netbanking_date" onchange="netbank_date_validate()" placeholder="" value="<?php if(!empty($booking_payment_details)){ echo $booking_payment_details['netbanking_date'];}?>">
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <?php } else { ?>
                                <div class="" id="net_banking_tr" style='display:none;'>
                                <div class="row cash_payment_div">
                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Payment Type</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                        <!-- &nbsp;&nbsp;<input type="radio" name="gender" id="male" value="Male">&nbsp;&nbsp;Male
                                        &nbsp;&nbsp;<input type="radio" name="gender" id="female" value="Female">&nbsp;&nbsp;Female -->

                                        <input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_neft" onchange="netpayment_validate()" value="NEFT">&nbsp;&nbsp;NEFT
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_rtgs" onchange="netpayment_validate()" value="RTGS">&nbsp;&nbsp;RTGS
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="netbanking_payment_type" id="netbanking_payment_type_imps" onchange="netpayment_validate()" value="IMPS">&nbsp;&nbsp;IMPS
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Account Number</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_banking_acc_no" id="net_banking_acc_no" onkeyup="netbank_accno_validate()" placeholder="Enter Account No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Account Holder Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_acc_holder_nm" id="net_acc_holder_nm" onkeyup="netbank_accno_holder_nm_validate()" placeholder="Enter Account Holder Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Branch Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_banking_branch_name" id="net_banking_branch_name" onkeyup="netbank_branch_nm_validate()" placeholder="Enter Branch Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">UTR No</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="net_banking_utr_no" id="net_banking_utr_no" onkeyup="netbank_utr_no_validate()" placeholder="Enter UTR No" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Bank Name</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="netbanking_bank_name" id="netbanking_bank_name" onkeyup="netbank_bank_nm_validate()" placeholder="Enter Bank Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <h6 class="text-center">Transaction Date</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="date" class="form-control" name="netbanking_date" id="netbanking_date" onchange="netbank_date_validate()" placeholder="">
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
                                            <h6 class="text-center float-right">UTR No</h6>
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
                                                <option class="self_upi" attr_other="other" value="<?php echo $upi_qr_data_value['id'];?>"><?php echo $upi_qr_data_value['full_name'];?></option>
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
                                                <option value="Google Pay">Google Pay</option>
                                                <option value="BHIM App">BHIM App</option>
                                                <option value="PhonePe">PhonePe</option>
                                                <option value="Paytm">Paytm</option>
                                                <option value="SBI pay">SBI pay</option>
                                                <option value="Bank of Baroda UPI">Bank of Baroda UPI</option>
                                            </select>
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">UPI ID Number</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" readonly class="form-control" name="self_upi_no" id="self_upi_no" placeholder="Enter Self UPI ID" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">UTR No</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="upi_no" id="upi_no" onkeyup="utr_no_validate()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                        </div>

                                        <div class="col-md-5 mt-2">
                                            <h6 class="text-center float-right">reason</h6>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input type="text" class="form-control" name="reason" id="reason" onkeyup="reason_validate()" placeholder="Enter Reason" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
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
                                        <h6 class="text-center">UTR No</h6>
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
                                    <div class="col-md-6 mt-1">
                                        <h6 class="text-center">QR Holder Name</h6>
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
                                                <option value="<?php echo $upi_qr_data_value['id'];?>"><?php echo $upi_qr_data_value['full_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Mobile Number</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" name="qr_mobile_number" id="qr_mobile_number" onkeyup="qr_mobile_no_validate()" placeholder="Enter Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Payment Type</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <select class="select_css" name="qr_payment_type" id="qr_payment_type" onchange="qr_payment_type_validate()">
                                            <option value="">Select Transaction</option>
                                            <option value="Google Pay">Google Pay</option>
                                            <option value="BHIM App">BHIM App</option>
                                            <option value="PhonePe">PhonePe</option>
                                            <option value="Paytm">Paytm</option>
                                            <option value="SBI pay">SBI pay</option>
                                            <option value="Bank of Baroda UPI">Bank of Baroda UPI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">UTR No</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" name="qr_upi_no" id="qr_upi_no" onkeyup="qr_utr_no_validate()" placeholder="Enter Transaction Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
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
                                    <div class="col-md-6 mt-1">
                                        <h6 class="text-center">Cheque Number</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="cheque" id="cheque" onkeyup="cheque_no_validate()" placeholder="Enter Cheque Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Bank Name</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="text" class="form-control" name="bank_name" id="bank_name" onkeyup="cheque_banknm_validate()" placeholder="Enter Bank Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Drawn On Date</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input type="date" class="form-control" name="drawn_on_date" id="drawn_on_date" onchange="cheque_date_validate()" placeholder="Select Date">
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

                    <div id="other_payment_mode_div" style='display:none;'>
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
                                            <th><button type="button" class="btn btn-success" name="submit" id="payment_final_booking_submit" value="submit" disabled>Verify OTP</button> </th>
                                        </tr>
                                    </table>
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <center><th><button type="button" class="btn btn-primary mb-3" name="submit_otp" id="submit_otp"  disabled>Send OTP</button></th></center>
                                        </div>
                                        <div class="col-md-4">
                                            <center><th><button type="button" class="btn btn-primary mb-3" name="re_send_otp" id="re_send_otp" disabled>Resend OTP</button></th></center>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
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
                <?php } ?>

              <!-- /.card-header -->
              <!-- form start -->
                
            </div>
            <!-- /.card -->

                                            
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
  

