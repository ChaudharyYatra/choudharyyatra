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

            <form method="post" enctype="multipart/form-data" id="final_booking_preview">

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
                        <!-- <input type="hidden" class="form-control" name="booking_on" id="booking_on" value="<?php //echo $booking_payment_details['created_at']; ?>"> -->
                    
                        <!-- <input type="hidden" class="form-control" name="booking_ref_no" id="booking_ref_no" value=""> -->
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
                        <?php if($info['for_credentials']=='yes'){?>
                        <input type="hidden" class="form-control" name="traveller_id" id="traveller_id" value="<?php echo $info['id']; ?>">
                        <?php } ?>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $info['courtesy_titles_name'] ?>. <?php echo $info['first_name'] ?> <?php echo $info['middle_name'] ?> <?php echo $info['last_name'] ?></td>
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
                        <td><?php echo $info['relation'] ?></td>
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
                                <tr>
                                    <th style="font-size:20px;">Seat Type</th>
                                    <th style="font-size:20px;">Seat Count</th>
                                </tr>
                                <tr>
                                    <th>Seperate Seat</th>
                                    <td><?php echo $info['seperate_seat']; ?></td>
                                </tr>
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
                    <h5>Extra Services Details :</h5>
                    <table class="table table-bordered">
                        <tr >
                            <th>Do You Want Extra Services ? </th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="radio" id="extra_services_yes" name="extra_services" class="extra_services_yes_no" value="yes" onclick="show2();" <?php if(!empty($extra_services['extra_services'])){if("yes" == $extra_services['extra_services']) {echo 'checked';}}?>/>
                                <label for="Yes" id="extra_services_yes">Yes</label> &nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input disabled type="radio" id="extra_services_no" name="extra_services" class="extra_services_yes_no" value="no" onclick="show1();" <?php if(!empty($extra_services['extra_services'])){if("no" == $extra_services['extra_services']) {echo 'checked';}}?>/>
                                <label for="No" id="extra_services_no">No</label></th>
                        </tr>
                    </table>
                    <?php 
                        if($extra_services['extra_services']=='yes'){
                        ?>
                    
                    <table id="example2" class="table table-bordered table-hover table-striped">
                        <tr style="border-bottom: 2px solid;">
                            <th>SN</th>
                            <th>Services Name</th>
                            <th>Other Services Name</th>
                        </tr>
                        <?php
                    $i=1;
                    foreach($extra_services_deatils as $extra_services_deatils_info) 
                    { 
                        // print_r($extra_services_deatils); die;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php if($extra_services_deatils_info['select_services'] == 'Other'){
                                echo $extra_services_deatils_info['select_services'];
                                }else {
                                echo $extra_services_deatils_info['service_name'];
                                }  ?>
                                </td>
                            <td><?php if($extra_services_deatils_info['select_services'] == 'Other'){
                                echo $extra_services_deatils_info['other_services'];
                                }else {
                                    echo '-';
                                    } ?></td>
                        </tr>
                        <?php $i++; } ?>
                    </table>
                    
                    <?php } ?>

                </div>

                <div class="card-body">
                    <h5>Hotel Details :</h5>
                    <?php
                    foreach($seat_type_room_type_data as $seat_type_room_type_info) 
                    { 
                    ?>
                    <table id="example2" class="table table-bordered table-hover table-striped">
                        <tr style="border-bottom: 2px solid;">
                            <th>Room Type</th>
                            <th>Booked Room</th>
                        </tr>
                        <tr>
                            <?php if($seat_type_room_type_info['total_allocated_rooms_1']!= '') { ?>
                            <td>1 Bed - One Room</td>
                            <td><?php echo $seat_type_room_type_info['total_allocated_rooms_1']; ?></td>
                            <?php }  ?>
                        </tr>
                        <tr>
                            <?php if($seat_type_room_type_info['total_allocated_rooms_2']!= '') { ?>
                            <td>2 Bed - One Room</td>
                            <td><?php echo $seat_type_room_type_info['total_allocated_rooms_2']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php if($seat_type_room_type_info['total_allocated_rooms_3']!= '') { ?>
                            <td>3 Bed - One Room</td>
                            <td><?php echo $seat_type_room_type_info['total_allocated_rooms_3']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php if($seat_type_room_type_info['total_allocated_rooms_4']!= '') { ?>
                            <td>4 Bed - One Room</td>
                            <td><?php echo $seat_type_room_type_info['total_allocated_rooms_4']; ?></td>
                            <?php } ?>
                        </tr>
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

                            <?php $total = $seat_total_cost + $total_hotel_amount ;?>

                            <input type="hidden" value="<?php echo $total;?>" name="total_amt" id="total_amt">
                    </table>
                    <?php } ?>
                </div>

                <div class="card-footer">
                <button type="submit" class="btn btn-warning" name="submit_back" value="submit_back" id="back-button_booking_preview">Back</button>
                <button type="button" class="btn btn-success" name="submit_next" id="submit_next">Next</button>
                <a href="<?php echo $module_url_booking_process; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
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