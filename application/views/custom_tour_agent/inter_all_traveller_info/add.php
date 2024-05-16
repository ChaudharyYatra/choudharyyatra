<style>
    .card-bg{
        background-color: #F6F6F6;
    }
    img{
        width:25% !important;
        height:25% !important;
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="all_traveller_info">
                    <?php
                    foreach($inter_booking_basic_info_data as $inter_booking_basic_info_data_value) 
                    { 
                    ?>
                    <div class="col-md-12 text-center">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Enter Seat Count</label> 
                                    <input type="text" class="form-control" name="seat_count" id="inter_seat_count_add" placeholder="Enter seat count" value="<?php echo $inter_booking_basic_info_data_value['seat_count']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                    foreach($agent_booking_enquiry_data as $agent_booking_enquiry_data_info) 
                    { 
                    ?>
                        <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_booking_enquiry_data_info['id']; ?>">
                    <?php } ?>
                    
                    <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $package_id['tour_no']; ?>">
                    
                    
                    <table class="table table-bordered" style="width:100%" id="inter_traveller_table_add">
                        
                        <colgroup>
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 20%;">
                            <col span="1" style="width: 20%;">
                            <col span="1" style="width: 20%;">
                            <col span="1" style="width: 0%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 10%;">
                        </colgroup>
                            <thead>
                                <tr style="background:#a19f9f; color:white;">
                                    <th style="width:17%;">Mr / Mrs</th>
                                    <th style="width:15%;">First name</th>
                                    <th style="width:15%;">Middle name</th>
                                    <th style="width:15%;">Last name</th>
                                    <th style="width:10%;">DOB</th>
                                    <th style="width:15%;">Relation</th>
                                    <th style="width:10%;">Upload Image</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    
                                <td><select class="select_css" name="mrandmrs[]" id="mrandmrs">
                                    <option value="">select Mr / Mrs</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="first_name[]" id="first_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="middle_name[]" id="middle_name"  oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="last_name[]" id="last_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="dob[]" id="dob" max="<?php echo date("Y-m-d");?>">
                                </td>
                                <td>
                                <select class="select_css" name="relation[]" id="relation">
                                    <option value="">Select</option>
                                    <?php
                                    foreach($relation_data as $relation_data_info){ 
                                    ?>
                                    <option value="<?php echo $relation_data_info['id']; ?>"><?php echo $relation_data_info['relation']; ?></option>
                                    <?php } ?>
                                </select>
                                </td>
                                <td>
                                    <input type="file" name="image_name[]" id="image_name1" onchange="encodeImgtoBase64traveller_img(this)" attr_id='1'>
                                    <input type="hidden" id="document_file_traveller_img1" name="document_file_traveller_img[]" value="">
                                    <div id="imagePreview_traveller_img1" class="mt-2 img_size_cast">
                                        <img src="<?php echo base_url(); ?>assets/uploads/inter_traveller/" width="100%" />
                                     </div>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                    

                    <div class="row mt-5">
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Flat No.</label>
                            <input type="text" class="form-control" name="flat_no" id="flat_no" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Building / House Name</label>
                            <input type="text" class="form-control" name="building_house_nm" id="building_house_nm" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Street Name</label>
                            <input type="text" class="form-control" name="street_name" id="street_name" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Landmark</label>
                            <input type="text" class="form-control" name="landmark" id="landmark" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>select State</label>
                                <select class="select_css" name="all_traveller_state" id="all_traveller_state">
                                        <option value="">Select State</option>
                                        <?php foreach($state_data as $state_data_value){ ?> 
                                            <option value="<?php echo $state_data_value['id'];?>"><?php echo $state_data_value['state'];?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select District</label>
                                <select class="select_css" name="all_traveller_district" id="all_traveller_district">
                                    <option value="">Select District</option>
                                    <!-- <?php //foreach($packages_data as $packages_data_value){ ?> 
                                        <option value="<?php //echo $packages_data_value['id'];?>"><?php //echo $packages_data_value['tour_number'];?></option>
                                    <?php //} ?> -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Taluka</label>
                                <select class="select_css" name="all_traveller_taluka" id="all_traveller_taluka">
                                    <option value="">Select Taluka</option>
                                    <!-- <?php //foreach($packages_data as $packages_data_value){ ?> 
                                        <option value="<?php //echo $packages_data_value['id'];?>"><?php //echo $packages_data_value['tour_number'];?></option>
                                    <?php //} ?> -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>City Name</label>
                            <input type="text" class="form-control" name="all_traveller_city" id="all_traveller_city" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Pincode</label>
                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>STD code </label>
                            <input type="text" class="form-control" name="std_code" id="std_code" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Email ID</label>
                            <input type="text" class="form-control" name="email_id" id="email_id" placeholder="" value="<?php //echo $agent_department_info['seat_count']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                        <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Book Now</button> 
                        <a href="<?php echo $module_inter_booking_enquiry; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
                    </div>
                </form>
                </div>
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
  

</body>
</html>
