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

    input.largerCheckbox {
        width: 30px;
        height: 30px;
    }

    .text_center{
        text-align: center;
    }
    .text_center_web{
        text-align: -webkit-center;
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
              <a href="<?php echo $module_url_path; ?>/sub_index/<?php echo $p_date;?>"><button class="btn btn-primary">Back</button></a>
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
                
                <!--  -->

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



            <div class="card-body">
                <h5> Extra Services :</h5>
                <form id="approve_extra_services_admin" style="border: 1px solid #cdcdcd; padding: 15px;">
                    <?php  if(count($extra_services_details_data) > 0 ) 
                    { ?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th class="text_center">SN</th>
                        <th class="text_center">Services Name</th>
                        <th class="text_center">Approval</th>
                        <th class="text_center">Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                        
                        $i=1; 
                        foreach($extra_services_details_data as $info) 
                        { 
                        ?>
                        <tr>
                        <td><?php echo $i; ?></td>
                        <td class="text_center">
                        <?php 
                            echo $info['select_services'];
                            ?> 

                        </td>    
                        <td class="text_center">
                            <?php 
                                $quali1=array();
                                  $p = $info['is_approve'];
                                  $quali1 = explode(',',$p);
                                  // print_r($quali1); die;
                            ?>
                            <input type="checkbox" class="largerCheckbox" id="extra_services" name="is_approve[]" value="yes" <?php if(in_array('yes',$quali1)) {echo 'checked';}?>>
                            <label for="extra_services"> </label>
                            
                        </td>   
                        <td class="text_center_web">
                            <input type="hidden" class="form-control table_id" name="id[]" id="tble_id" value="<?php echo $info['id']; ?>">
                            <input type="text" style="width: 50%;" class="form-control row_set" name="service_cost[]" id="service_cost" value="<?php echo $info['service_cost']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </td>

                        </tr>
                        <?php $i++; } ?>
                        </tbody>
                        
                    </table>
                    <?php } ?>

                    <center><button type="button" class="btn btn-primary" id="approve_service" name="approve_service" style="width:10%;">Submit</button></center>
                </form>
            </div>

                <?php
                   foreach($booking_payment_details_data as $info) 
                   { 
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <h5>Payment Details :</h5>
                            
                            <table id="example2" class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Mobile Number</th>
                                    <td>
                                    <input readonly type="text" class="form-control" name="booking_tm_mobile_no" id="booking_tm_mobile_no" value="<?php echo $info['booking_tm_mobile_no']; ?>" minlength="10" maxlength="10" placeholder="Enter mobile number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required onkeyup="validate()">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Final Total</th>
                                    <?php $final_total = $total_hotel_amount + $seat_total_cost; ?>
                                    <td><input readonly type="text" class="form-control" name="final_amt" id="final_amt" placeholder="Final amount" value="<?php echo $final_total ?>" required></td>
                                    
                                </tr>

                                <tr>
                                    <th>Payment Type</th>
                                    <td>&nbsp;&nbsp;<input type="radio" disabled name="payment_type" id="payment_type" value="Advance" <?php if(isset($info['payment_type'])){if("Advance"==$info['payment_type']){echo "checked";}} ?>>&nbsp;&nbsp;Advance
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" disabled name="payment_type" id="payment_type" value="Part" <?php if(isset($info['payment_type'])){if("Part"==$info['payment_type']){echo "checked";}} ?>>&nbsp;&nbsp;Part
                                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" disabled name="payment_type" id="payment_type" value="Full" <?php if(isset($info['payment_type'])){if("Full"==$info['payment_type']){echo "checked";}} ?>>&nbsp;&nbsp;Full</td>
                                    
                                </tr>

                                <tr>
                                    <th>Booking Amount</th>
                                    <td>
                                    <input readonly type="text" class="form-control" name="booking_amt" id="booking_amt" value="<?php echo $info['booking_amt']; ?>" placeholder="Enter booking amount" required onkeyup="validate()">
                                    </td>
                                </tr>

                                <tr>
                                    <th>Pending Amount</th>
                                    <td>
                                    <input readonly type="text" class="form-control" name="pending_amt" id="pending_amt" value="<?php echo $info['pending_amt']; ?>" placeholder="Enter pending amount" required>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Payment Mode</th>
                                    <td>
                                    <select disabled class="select_css" name="select_transaction" id="select_transaction" onchange='account_details(this.value); 
                                        this.blur();'required="required">
                                        <option value="">Select Transaction</option>
                                        <option value="CASH" <?php if(isset($info['select_transaction'])){if('CASH' == $info['select_transaction']) {echo 'selected';}}?>>CASH</option>
                                        <option value="UPI" <?php if(isset($info['select_transaction'])){if('UPI' == $info['select_transaction']) {echo 'selected';}}?>>UPI</option>
                                        <option value="Cheque" <?php if(isset($info['select_transaction'])){if('Cheque' == $info['select_transaction']) {echo 'selected';}}?>>Cheque</option>
                                        <option value="Net Banking" <?php if(isset($info['select_transaction'])){if('Net Banking' == $info['select_transaction']) {echo 'selected';}}?>>Net Banking</option>
                                    </select>
                                    </td>
                                </tr>
                                
                                <?php if($info['upi_no']!= '') { ?> 
                                <tr id="upi_no_div">
                                    
                                    <th>UPI Payment Transaction Number</th>
                                    <td>
                                        <input readonly type="text" class="form-control" name="upi_no" id="upi_no" placeholder="Enter Transaction Number" value="<?php echo $info['upi_no']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </td>
                                </tr>
                                <?php } ?>
                                
                                <?php if($info['net_banking']!= '') { ?> 
                                <tr id="net_banking_tr">
                                    
                                    <th>Net Banking Transaction Number</th>
                                    <td>
                                        <input readonly type="text" class="form-control" name="net_banking" id="net_banking" value="<?php echo $info['net_banking']; ?>" placeholder="Enter Transaction Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </td>
                                </tr>
                                <?php } ?>

                            </table>

                            <?php if($info['cheque']!= '') { ?> 
                            <div class="" id="cheque_tr">
                                <div class="row cash_payment_div">
                                    <div class="col-md-6 mt-1">
                                        <h6 class="text-center">Cheque Number</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <input readonly type="text" class="form-control" name="cheque" id="cheque" value="<?php echo $info['cheque']; ?>" placeholder="Enter Cheque Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Bank Name</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input readonly type="text" class="form-control" name="bank_name" id="bank_name" value="<?php echo $info['bank_name']; ?>" placeholder="Enter Bank Name">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <h6 class="text-center">Drawn On Date</h6>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input readonly type="date" class="form-control" name="drawn_on_date" id="drawn_on_date" value="<?php echo $info['drawn_on_date']; ?>" placeholder="Select Date">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <?php if($info['total_cash_amt']>'0') { ?> 
                            <div class="row cash_payment_div" id="cash_tr">

                                    <div class="col-md-6">
                                        <h6 class="text-center">Particulars</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-center">Rupees</h6>
                                    </div>
                                
                                    <div class="col-md-2">
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
                                    </div>

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
                                    <label> </label>
                                    </div>
                                    <div class="col-md-4 mt-3 text-center">
                                        <h5>Total</h5>
                                    </div>
                                    <div class="col-md-1 mt-3">
                                        =
                                    </div>
                                    <div class="col-md-5 mt-2">
                                        <input readonly type="text" class="form-control" name="total_cash_amt" id="total_cash_amt" value="<?php echo $info['total_cash_amt']; ?>" placeholder="Total Cash" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" > 
                                    </div>
                                
                            </div>
                            <?php } ?>
                        </div>

                        <div class="col-md-3">

                        </div>
                    </div>


                    
                </div>
                <?php } ?>

                <!--  -->

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
  

