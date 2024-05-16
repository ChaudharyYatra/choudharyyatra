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
                <h3 class="card-title"><?php echo $page_title; ?></h3>
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
                                            <input type="text" class="form-control" name="seat_count" id="seat_count" placeholder="Enter seat count" value="<?php echo $inter_booking_basic_info_data['seat_count']; ?>" readonly>
                                        </div>
                                    </div>
                                    
                                    <?php
                                    foreach($agent_booking_enquiry_data as $agent_booking_enquiry_data_info) 
                                    { 
                                    ?>
                                        <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_booking_enquiry_data_info['id']; ?>">

                                    <?php }?>
                                    
                                    <div class="col-md-3">
                                        <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $package_id['tour_no']; ?>">
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group text-center">
                                                    <label>Bus Seats Type Selection</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>100% - Seperate Seat Needed  <span class="btn btn-danger btn-sm btn_follow ms-4" id="first_per_count"><?php echo $arr_package_info['cost']; ?></span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_seattype_count" name="seperate_seat" id="seperate_seat" placeholder="seat count" onkeyup="Seperate_Seat_Needed() , Seperate_Seat_Needed_total() ,total_bus_seat_type_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_seperate_seat" id="total_seperate_seat" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>90% - Child & Separate Seat Needed  <span class="btn btn-danger btn-sm btn_follow" id="second_per_count"><?php $pcost = $arr_package_info['cost']; $final_cost=$pcost*90/100; echo round($final_cost);?></span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_seattype_count" name="child_seperate_seat" id="child_seperate_seat" placeholder="seat count" onkeyup="Child_Separate_Seat_Needed() , Child_Separate_Seat_Needed_total() ,total_bus_seat_type_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_child_seperate_seat" id="total_child_seperate_seat" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>60% - 2 Child & Share One Seat  <span class="btn btn-danger btn-sm btn_follow ms-4" id="three_per_count"><?php $pcost = $arr_package_info['cost']; $final_cost=$pcost*60/100; echo round($final_cost);?></span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_seattype_count" name="two_child_share_one_seat" id="two_child_share_one_seat" placeholder="seat count" onkeyup="Child_Share_One_Seat() , Child_Share_One_Seat_total() ,total_bus_seat_type_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_two_child_share_one_seat" id="total_two_child_share_one_seat" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>40% - Child & No Seat Needed  <span class="btn btn-danger btn-sm btn_follow ms-4" id="four_per_count"><?php $pcost = $arr_package_info['cost']; $final_cost=$pcost*40/100; echo round($final_cost);?></span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_seattype_count" name="child_no_seat_needed" id="child_no_seat_needed" placeholder="seat count" onkeyup="Child_No_Seat_Needed() , Child_No_Seat_Needed_total() ,total_bus_seat_type_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_child_no_seat_needed" id="total_child_no_seat_needed" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>total seat count</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_busseattype" id="total_busseattype" placeholder="" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
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
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group text-center">
                                                    <label>Bed Type & Room Type Selection</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>1 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="onebed_oneroom_cost" id="onebed_oneroom_cost" placeholder="cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_b_r_count" name="onebed_oneroom_count" id="onebed_oneroom_count" placeholder="count" onkeyup="one_bed_one_room() , one_bed_one_room_amt() ,total_bustype_roomtype_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_onebed_oneroom" id="total_onebed_oneroom" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>2 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="twobed_oneroom_cost" id="twobed_oneroom_cost" placeholder="cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_b_r_count" name="twobed_oneroom_count" id="twobed_oneroom_count" placeholder="count" onkeyup="two_bed_one_room() , two_bed_one_room_amt(),total_bustype_roomtype_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_twobed_oneroom" id="total_twobed_oneroom" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>3 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="threebed_oneroom_cost" id="threebed_oneroom_cost" placeholder="cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_b_r_count" name="threebed_oneroom_count" id="threebed_oneroom_count" placeholder="count" onkeyup="three_bed_one_room() , three_bed_one_room_amt() ,total_bustype_roomtype_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_threebed_oneroom" id="total_threebed_oneroom" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>4 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="fourbed_oneroom_cost" id="fourbed_oneroom_cost" placeholder="cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_b_r_count" name="fourbed_oneroom_count" id="fourbed_oneroom_count" placeholder="count" onkeyup="four_bed_one_room() , four_bed_one_room_amt() ,total_bustype_roomtype_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_fourbed_oneroom" id="total_fourbed_oneroom" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>5 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="fivebed_oneroom_cost" id="fivebed_oneroom_cost" placeholder="cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_b_r_count" name="fivebed_oneroom_count" id="fivebed_oneroom_count" placeholder="count" onkeyup="five_bed_one_room() , five_bed_one_room_amt() ,total_bustype_roomtype_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_fivebed_oneroom" id="total_fivebed_oneroom" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>6 Bed - One Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="sixbed_oneroom_cost" id="sixbed_oneroom_cost" placeholder="cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_b_r_count" name="sixbed_oneroom_count" id="sixbed_oneroom_count" placeholder="count" onkeyup="six_bed_one_room() , six_bed_one_room_amt() ,total_bustype_roomtype_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_sixbed_oneroom" id="total_sixbed_oneroom" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Shared Common Room</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="shared_common_room_cost" id="shared_common_room_cost" placeholder="cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control inter_b_r_count" name="shared_common_room_count" id="shared_common_room_count" placeholder="count" onkeyup="shared_common_room() , shared_common_room_amt() ,total_bustype_roomtype_selection()" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_shared_common_room" id="total_shared_common_room" placeholder="total count" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>total seat count</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="total_seat_bedtype_roomtype" id="total_seat_bedtype_roomtype" placeholder="" readonly oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
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
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                
                        <!-- /.card-body -->
                        <div class="footer text-center">
                        <!-- <a href="<?php //echo $module_url_path_bus_seat_sel; ?>"><button type="submit" class="btn btn-primary" name="submit" value="calculate">Calculate</button></a> -->
                        <!-- <a href="<?php //echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a> -->
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <label>Total Fare Amount</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <input type="number" class="form-control" name="total_fare_amount" id="total_fare_amount" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>   
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                            <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now" id="inter_booknow_submit">Book Now</button> 
                            <a href="<?php echo $module_inter_booking_enquiry; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
