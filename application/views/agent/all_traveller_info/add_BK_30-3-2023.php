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
                
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="all_traveller_info">
                    <?php
                    foreach($booking_basic_info_data as $booking_basic_info_data_value) 
                    { 
                    ?>
                    <div class="col-md-12 text-center">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <!-- <label>Traveller Count</label>  -->
                                    <input type="hidden" class="form-control" name="seat_count" id="seat_count_add" placeholder="Enter seat count" value="<?php $tcount=$booking_basic_info_data_value['seat_count']; echo $booking_basic_info_data_value['seat_count']; ?>" readonly>
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
                        $enquiry_id =  $agent_booking_enquiry_data_info['id'];
                    ?>
                        <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_booking_enquiry_data_info['id']; ?>">
                    <?php } ?>

                          
                        <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $package_id['tour_no']; ?>">
                        
                    <table class="table table-bordered" style="width:100%" id="traveller_table_add">
                        
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
                                <?php 
                                if(!empty($all_traveller_info)){
                                    foreach($all_traveller_info as $all_traveller_info_value) 
                                    {
                                        // print_r($all_traveller_info_value); die;
                                ?>
                            <tr>
                            <input type="hidden" class="form-control" name="travaller_info_id[]" id="travaller_info_id" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['id'];} ?>">
                                    
                                <td><select class="select_css" name="mrandmrs[]" id="mrandmrs">
                                        <option value="">select Mr / Mrs</option>
                                        <option value="Mr" <?php if(isset($all_traveller_info_value['mr/mrs'])){if("Mr" == $all_traveller_info_value['mr/mrs']) {echo 'selected';}}?>>Mr</option>
                                        <option value="Mrs" <?php if(isset($all_traveller_info_value['mr/mrs'])){if("Mrs" == $all_traveller_info_value['mr/mrs']) {echo 'selected';}}?>>Mrs</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="first_name[]" id="first_name" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['first_name'];} ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="middle_name[]" id="middle_name" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['middle_name'];} ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="last_name[]" id="last_name" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['last_name'];} ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="dob[]" id="dob" max="<?php echo date("Y-m-d");?>" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['dob'];} ?>">
                                </td>
                                <td>
                                <select class="select_css" name="relation[]" id="relation">
                                    <option value="">Select</option>
                                    <?php
                                    foreach($relation_data as $relation_data_info){ 
                                    ?>
                                    <!-- <option value="<?php //echo $relation_data_info['id']; ?>"><?php //echo $relation_data_info['relation']; ?></option> -->
                                    <option value="<?php echo $relation_data_info['id'];?>" <?php if(isset($all_traveller_info_value['all_traveller_relation'])){if($relation_data_info['id'] == $all_traveller_info_value['all_traveller_relation']) {echo 'selected';}}?>><?php echo $relation_data_info['relation'];?></option>
                                    
                                    <?php } ?>
                                </select>
                                </td>
                                <td>
                                    <input type="file" name="image_name[]" id="image_name1" onchange="encodeImgtoBase64traveller_img(this)" attr_id='1'>
                                    <input type="hidden" id="document_file_traveller_img1" name="document_file_traveller_img[]" 
                                    value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['img_encoded'];} ?>">
                                    <div id="imagePreview_traveller_img1" class="mt-2 img_size_cast">
                                        <img src="<?php echo base_url(); ?>uploads/traveller/<?php echo $all_traveller_info_value['image_name'];?>" width="100%" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['image_name'];} ?>"/>
                                     </div>
                                </td>
                            </tr>
                        <?php 
                                    }
                        }
                        else{
                            for($i=1; $i<=$tcount; $i++){
                                $img_count=$i+1;
                            ?>
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
                                    <input type="text" class="form-control" name="middle_name[]" id="middle_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
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
                                <!-- <td>
                                    <input type="file" name="image_name[]" id="image_name1" onchange="encodeImgtoBase64traveller_img(this)" attr_id='1'>
                                    <input type="hidden" id="document_file_traveller_img1" name="document_file_traveller_img[]" value="">
                                    <div id="imagePreview_traveller_img1" class="mt-2 img_size_cast">
                                        <img src="<?php //echo base_url(); ?>assets/uploads/traveller/" width="100%"/>
                                     </div>
                                </td> -->
                                <td>
                                    <input type="file" name="image_name[]" id="image_name<?php echo $img_count;?>" onchange="encodeImgtoBase64traveller_img(this)" attr_id="<?php echo $img_count;?>">
                                    <input type="hidden" id="document_file_traveller_img<?php echo $img_count;?>" name="document_file_traveller_img[]"
                                        value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['img_encoded'];} ?>">
                                        <div id="imagePreview_traveller_img<?php echo $img_count;?>" class="mt-2 img_size_cast">
                                            <img src="<?php echo base_url(); ?>uploads/traveller/" width="100%" />
                                        </div>
                                    </td>
                            </tr>
                            
                            <?php
                            } 
                        }
                        ?>
                        
                            </tbody>
                    </table>
                    

                    <div class="row mt-5">
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Flat No.</label>
                            <!-- <input type="text" class="form-control" name="flat_no" id="flat_no" placeholder=""> -->
                            <input type="text" class="form-control" name="flat_no" id="flat_no" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['flat_no'];} ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Building / House Name</label>
                            <!-- <input type="text" class="form-control" name="building_house_nm" id="building_house_nm" placeholder=""> -->
                            <input type="text" class="form-control" name="building_house_nm" id="building_house_nm" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['building_house_nm'];} ?>">
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Street Name</label>
                            <!-- <input type="text" class="form-control" name="street_name" id="street_name" placeholder=""> -->
                            <input type="text" class="form-control" name="street_name" id="street_name" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['street_name'];} ?>">
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            <label>Landmark</label>
                            <!-- <input type="text" class="form-control" name="landmark" id="landmark" placeholder=""> -->
                            <input type="text" class="form-control" name="landmark" id="landmark" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['landmark'];} ?>">
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>select State</label>
                                <select class="select_css" name="all_traveller_state" id="all_traveller_state">
                                    <?php 
                                    if(!empty($all_traveller_info)){
                                    ?>
                                        <option value="">Select State</option>
                                        <?php foreach($state_data as $state_data_value){ ?> 
                                            <option value="<?php echo $state_data_value['id'];?>" <?php if($state_data_value['id']==$all_traveller_info_value['state_name']){echo "selected";} ?>><?php echo $state_data_value['state'];?></option>
                                            <?php } ?>
                                    <?php }
                                    else{
                                        ?>
                                        <option value="">Select State</option>
                                        <?php foreach($state_data as $state_data_value){ ?> 
                                            <option value="<?php echo $state_data_value['id'];?>"><?php echo $state_data_value['state'];?></option>
                                            <?php } ?>
                                    <?php 
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select District</label>
                                <select class="select_css" name="all_traveller_district" id="all_traveller_district">
                                    <?php 
                                    if(!empty($all_traveller_info)){
                                    ?>
                                        <option value="">Select District</option>
                                        <?php foreach($district_data as $district_data_value){ ?> 
                                        <option value="<?php echo $district_data_value['id'];?>" <?php if($district_data_value['id']==$all_traveller_info_value['district_name']){echo "selected";} ?>><?php echo $district_data_value['district'];?></option>
                                        <?php } ?>

                                    <?php }
                                    else{
                                        ?>
                                    <option value="">Select District</option>
                                    <!-- <?php //foreach($district_data as $district_data_value){ ?> 
                                        <option value="<?php //echo $district_data_value['id'];?>" ><?php //echo $district_data_value['district'];?></option>
                                        <?php //} ?> -->
                                    <?php 
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Taluka</label>
                                <select class="select_css" name="all_traveller_taluka" id="all_traveller_taluka">
                                    <?php 
                                    if(!empty($all_traveller_info)){
                                    ?>
                                    <option value="">Select Taluka</option>
                                    <?php foreach($taluka_data as $taluka_data_value){ ?> 
                                        <option value="<?php echo $taluka_data_value['id'];?>" <?php if($taluka_data_value['id']==$all_traveller_info_value['taluka_name']){echo "selected";} ?>><?php echo $taluka_data_value['Taluka'];?></option>
                                    <?php } ?>

                                    <?php }
                                    else{
                                        ?>

                                    <option value="">Select Taluka</option>
                                    <!-- <?php //foreach($taluka_data as $taluka_data_value){ ?> 
                                        <option value="<?php //echo $taluka_data_value['id'];?>"><?php //echo $taluka_data_value['Taluka'];?></option>
                                    <?php //} ?>  -->
                                    <?php 
                                    }?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>City Name</label>
                            <!-- <input type="text" class="form-control" name="all_traveller_city" id="all_traveller_city" placeholder="" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');"> -->
                            <input type="text" class="form-control" name="all_traveller_city" id="all_traveller_city" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['city_name'];} ?>" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Pincode</label>
                            <!-- <input type="text" class="form-control" name="pincode" id="pincode" placeholder="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> -->
                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['pincode'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>STD code </label>
                            <!-- <input type="text" class="form-control" name="std_code" id="std_code" placeholder="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> -->
                            <input type="text" class="form-control" name="std_code" id="std_code" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['std_code'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Alternate Mobile Number</label>
                            <!-- <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> -->
                            <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['mobile_no'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Landline Number</label>
                            <!-- <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> -->
                            <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['phone_no'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Email ID</label>
                            <!-- <input type="text" class="form-control" name="email_id" id="email_id" placeholder=""> -->
                            <input type="text" class="form-control" name="email_id" id="email_id" placeholder="" value="<?php if(!empty($all_traveller_info_value)){ echo $all_traveller_info_value['email_id'];} ?>">
                        </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save & Close</button>
                        <button type="submit" class="btn btn-success" name="booknow_submit" value="Book Now">Submit & Proceed</button> 
                        <a href="<?php echo $module_booking_basic_info; ?>/add/<?php echo $enquiry_id;?>/1"><button type="button" class="btn btn-warning" name="back_btn">Back</button></a>
                        <a href="<?php echo $domestic_booking_process; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
