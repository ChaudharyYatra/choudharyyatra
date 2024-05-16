
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
            <?php $this->load->view('hotel/layout/hotel_alert'); ?>

           

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
                                    <td><?php echo $info['total_seat']; ?></td>
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
  

