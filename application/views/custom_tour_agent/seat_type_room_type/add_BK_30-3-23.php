<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    .btn_follow{padding: 2px 8px;}
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
                                <div><?php echo $traveller_booking_info_value['journey_date']; ?></div>
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
                        </div>
                    <?php } ?>
                </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form method="post" enctype="multipart/form-data" id="seat_type_room_type">
                    <div class="card-body card-bg">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Enter Seat Count</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-3">
                                        <div class="form-group text-center">
                                        
                                            <input type="text" class="form-control" name="seat_count" id="seat_count" placeholder="Enter seat count" value="<?php echo $booking_basic_info_data['seat_count']; ?>" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                            
                                            <?php $enquiry_id =  $agent_all_travaller_info['domestic_enquiry_id']; ?>
                                            
                                            <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_all_travaller_info['domestic_enquiry_id']; ?>">

                                            <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $traveller_booking_info_value['tour_no']; ?>">

                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group text-center">
                                                    <label></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group text-center">
                                                    <label>Traveller Count</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group text-center">
                                                    <label>Seats Needed</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger">(Above 11year)</span>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>100% - Seperate Seat Needed </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control seattype_count" name="seperate_seat" id="seperate_seat" placeholder="Enter Adult Seates" onkeyup="adult_count()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_seperate_seat" id="total_seperate_seat" placeholder="seats needed" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger">(Above 5-11year)</span>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>90% - Child & Separate Seat Needed </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control seattype_count" name="child_seperate_seat" id="child_seperate_seat" placeholder="Enter Separate Child Seates" onkeyup="child_separate_count()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_child_seperate_seat" id="total_child_seperate_seat" placeholder="seats needed" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger">(Above 5-11year)</span>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>60% - 2 Child & Share One Seat </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control seattype_count" name="two_child_share_one_seat" id="two_child_share_one_seat" placeholder="Enter Shared Seats" onkeyup="child_share_count()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_two_child_share_one_seat" id="total_two_child_share_one_seat" placeholder="seats needed" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger">(Above 3-5year)</span>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>40% - Child & No Seat Needed </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control seattype_count" name="child_no_seat_needed" id="child_no_seat_needed" placeholder="Enter Child No Seats" onkeyup="child_noseat_count()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_child_no_seat_needed" id="total_child_no_seat_needed" placeholder="seats needed" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span class="text-danger">(Above 0-3year)</span>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>0% - Child & No Seat Needed </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control seattype_count" name="child_noo_seat_needed" id="child_noo_seat_needed" placeholder="Enter Child No Seats" onkeyup="child_no_seat_count()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_child_noo_seat_needed" id="total_child_noo_seat_needed" placeholder="seats needed" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Total</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_busseattype" id="total_busseattype" placeholder="Total traveller count" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_seat" id="total_seat" placeholder="Total seats needed" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>total amount</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_amt_seattype" id="total_amt_seattype" placeholder="" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                        </div> -->

                                    </div> 
                                </div>
                                <hr>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group text-center">
                                                    <label>Hotel/Dormitory Rate</label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group text-center">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group text-center">
                                                    <label>Amount</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group text-center">
                                                    <label>Adult</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group text-center">
                                                    <label>90%</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group text-center">
                                                    <label>60%</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group text-center">
                                                    <label>40%</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group text-center">
                                                    <label>0%</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group text-center">
                                                    <label></label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>1 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" readonly class="form-control" name="onebed_oneroom_cost" id="onebed_oneroom_cost" placeholder="Cost" value="<?php echo $arr_package_info['single_seat_cost']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate1" attr-per="<?php echo $arr_package_info['single_seat_cost']; ?>" name="onebed_oneroom_cost_adult" id="onebed_oneroom_cost_adult" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate1" attr-per="<?php $pcost = $arr_package_info['single_seat_cost']; $final_cost=$pcost*90/100; echo round($final_cost); ?>" name="onebed_oneroom_cost_90" id="onebed_oneroom_cost_90" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate1" attr-per="<?php $p_60_cost = $arr_package_info['single_seat_cost']; $final_60_cost=$p_60_cost*60/100; echo round($final_60_cost); ?>" name="onebed_oneroom_count_60" id="onebed_oneroom_count_60" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate1" attr-per="<?php $p_40_cost = $arr_package_info['single_seat_cost']; $final_40_cost=$p_40_cost*40/100; echo round($final_40_cost); ?>"  name="onebed_oneroom_40" id="onebed_oneroom_40" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate1" attr-per="<?php $p_40_cost = $arr_package_info['single_seat_cost']; $final_40_cost=$p_40_cost*0/100; echo round($final_40_cost); ?>" name="onebed_oneroom_0" id="onebed_oneroom_0" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control total_room_amt" name="total_onebed_oneroom" id="total_onebed_oneroom" placeholder="total amount" readonly>
                                                    <input type="number" hidden class="form-control" name="total_travaller_1" id="total_travaller_1" placeholder="total travaller">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>2 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" readonly class="form-control" name="twobed_oneroom_cost" id="twobed_oneroom_cost" placeholder="cost" value="<?php echo $arr_package_info['twin_seat_cost']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate2" attr-per="<?php echo $arr_package_info['twin_seat_cost']; ?>" name="twobed_oneroom_cost_adult" id="twobed_oneroom_cost_adult" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate2" attr-per="<?php $pcost = $arr_package_info['twin_seat_cost']; $final_cost=$pcost*90/100; echo round($final_cost); ?>" name="twobed_oneroom_count_90" id="twobed_oneroom_count_90" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate2" attr-per="<?php $p_60_cost = $arr_package_info['twin_seat_cost']; $final_60_cost=$p_60_cost*60/100; echo round($final_60_cost); ?>" name="twobed_oneroom_count_60" id="twobed_oneroom_count_60" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate2" attr-per="<?php $p_40_cost = $arr_package_info['twin_seat_cost']; $final_40_cost=$p_40_cost*40/100; echo round($final_40_cost); ?>" name="twobed_oneroom_count_40" id="twobed_oneroom_count_40" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate2" attr-per="<?php $p_40_cost = $arr_package_info['twin_seat_cost']; $final_40_cost=$p_40_cost*0/100; echo round($final_40_cost); ?>" name="twobed_oneroom_count_0" id="twobed_oneroom_count_0" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control total_room_amt" name="total_twobed_oneroom" id="total_twobed_oneroom" placeholder="total amount" readonly>
                                                    <input type="number" hidden class="form-control" name="total_travaller_2" id="total_travaller_2" placeholder="total travaller">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>3 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" readonly class="form-control" name="threebed_oneroom_cost" id="threebed_oneroom_cost" placeholder="cost" value="<?php echo $arr_package_info['three_four_sharing_cost']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate3" attr-per="<?php echo $arr_package_info['three_four_sharing_cost']; ?>" name="threebed_oneroom_cost_adult" id="threebed_oneroom_cost_adult" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate3" attr-per="<?php $pcost = $arr_package_info['three_four_sharing_cost']; $final_cost=$pcost*90/100; echo round($final_cost); ?>" name="threebed_oneroom_count_90" id="threebed_oneroom_count_90" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate3" attr-per="<?php $p_60_cost = $arr_package_info['three_four_sharing_cost']; $final_60_cost=$p_60_cost*60/100; echo round($final_60_cost); ?>" name="threebed_oneroom_count_60" id="threebed_oneroom_count_60" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate3" attr-per="<?php $p_40_cost = $arr_package_info['three_four_sharing_cost']; $final_40_cost=$p_40_cost*40/100; echo round($final_40_cost); ?>" name="threebed_oneroom_count_40" id="threebed_oneroom_count_40" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate3" attr-per="<?php $p_40_cost = $arr_package_info['three_four_sharing_cost']; $final_40_cost=$p_40_cost*0/100; echo round($final_40_cost); ?>" name="threebed_oneroom_count_0" id="threebed_oneroom_count_0" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control total_room_amt" name="total_threebed_oneroom" id="total_threebed_oneroom" placeholder="total amount" readonly>
                                                    <input type="number" hidden class="form-control" name="total_travaller_3" id="total_travaller_3" placeholder="total travaller">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>4 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" readonly class="form-control" name="fourbed_oneroom_cost" id="fourbed_oneroom_cost" placeholder="cost" value="<?php echo $arr_package_info['three_four_sharing_cost']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate4" attr-per="<?php echo $arr_package_info['three_four_sharing_cost']; ?>" name="fourbed_oneroom_cost_adult" id="fourbed_oneroom_cost_adult" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate4" attr-per="<?php $pcost = $arr_package_info['three_four_sharing_cost']; $final_cost=$pcost*90/100; echo round($final_cost); ?>" name="fourbed_oneroom_count_90" id="fourbed_oneroom_count_90" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate4" attr-per="<?php $p_60_cost = $arr_package_info['three_four_sharing_cost']; $final_60_cost=$p_60_cost*60/100; echo round($final_60_cost); ?>" name="fourbed_oneroom_count_60" id="fourbed_oneroom_count_60" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate4" attr-per="<?php $p_40_cost = $arr_package_info['three_four_sharing_cost']; $final_40_cost=$p_40_cost*40/100; echo round($final_40_cost); ?>" name="fourbed_oneroom_count_40" id="fourbed_oneroom_count_40" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control hotel_rate4" attr-per="<?php $p_40_cost = $arr_package_info['three_four_sharing_cost']; $final_40_cost=$p_40_cost*0/100; echo round($final_40_cost); ?>" name="fourbed_oneroom_count_0" id="fourbed_oneroom_count_0" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" readonly class="form-control total_room_amt" name="total_fourbed_oneroom" id="total_fourbed_oneroom" placeholder="total amount">
                                                    <input type="number" hidden class="form-control" name="total_travaller_4" id="total_travaller_4" placeholder="total travaller">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label></label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Total amount</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_hotel_amount" id="total_hotel_amount" placeholder="Final Amount" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                    <input type="number" hidden class="form-control" name="total_travaller_count" id="total_travaller_count" placeholder="total_travaller_count" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>total amount</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_amount_bedtype_roomtype" id="total_amount_bedtype_roomtype" placeholder="" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                        </div> -->

                                    </div> 
                                </div> 

                            </div>
                        </div>
                
                        <!-- /.card-body -->
                        <div class="footer text-center">
                        <!-- <a href="<?php //echo $module_url_path_bus_seat_sel; ?>"><button type="submit" class="btn btn-primary" name="submit" value="calculate">Calculate</button></a> -->
                        <!-- <a href="<?php //echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a> -->
                        </div>

                        <!-- <hr> -->

                        <!-- <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <label>Total Fare Amount</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <input type="number" class="form-control" name="total_fare_amount" id="total_fare_amount" placeholder="" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>    -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                            <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now" id="booknow_submit">Book Now</button> 
                            <a href="<?php echo $module_url_booking_process; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                        </div>
                    </div>
                </form>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
