<style>
    .card-bg{
        background-color: #F6F6F6;
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
                    <!-- <?php
                    //foreach($agent_booking_enquiry_data as $agent_booking_enquiry_data_info) 
                   // { 
                    ?> -->
                    <div class="col-md-12 text-center">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Enterd Seat Count</label> 
                                    <input type="text" class="form-control" name="seat_count" id="seat_count" placeholder="Enter seat count" value="<?php echo $agent_booking_enquiry_data['seat_count']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    
                            <input type="hidden" class="form-control" name="domestic_enquiry_id" id="domestic_enquiry_id" value="<?php echo $agent_booking_enquiry_data['id']; ?>">
                          <!-- <?php //} ?> -->
                    
                    <table class="table table-bordered" style="width:100%">
                        
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
                                // echo $count=count($arr_all_traveller); die;
                                if(!empty($arr_all_traveller)){
                                foreach($arr_all_traveller as $arr_all_traveller_info){ 
                                    // print_r($arr_all_traveller); die;
                                ?>
                            <tr>
                            <input type="hidden" class="form-control" name="traveller_info_id[]" id="traveller_info_id" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $arr_all_traveller_info['id']; ?>">

                                <td><select class="select_css" name="mrandmrs[]" id="mrandmrs">
                                    <option value="">select Mr / Mrs</option>
                                    <option value="Mr" <?php if(isset($arr_all_traveller_info['mr/mrs'])){if("Mr" == $arr_all_traveller_info['mr/mrs']) {echo 'selected';}}?>>Mr</option>
                                    <option value="Mrs" <?php if(isset($arr_all_traveller_info['mr/mrs'])){if("Mrs" == $arr_all_traveller_info['mr/mrs']) {echo 'selected';}}?>>Mrs</option>
                                </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="first_name[]" id="first_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $arr_all_traveller_info['first_name']; ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="middle_name[]" id="middle_name"  oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $arr_all_traveller_info['middle_name']; ?>">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="last_name[]" id="last_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $arr_all_traveller_info['last_name']; ?>">
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="dob[]" id="dob" max="<?php echo date("Y-m-d");?>" value="<?php echo $arr_all_traveller_info['dob']; ?>">
                                </td>
                                <td>
                                <select class="select_css" name="relation[]" id="relation">
                                    <option value="">Select</option>
                                    <?php
                                    foreach($relation_data as $relation_data_info){ 
                                    ?>
                                    <option value="<?php echo $relation_data_info['id']; ?>" <?php if(isset($arr_all_traveller_info['all_traveller_relation'])){if($relation_data_info['id'] == $arr_all_traveller_info['all_traveller_relation']) {echo 'selected';}}?>><?php echo $relation_data_info['relation']; ?></option>
                                    <?php } ?>
                                </select>
                                </td>
                                <td>
                                <input type="file" name="image_name[]" id="image_name" value="<?php if(!empty($seattype_roomtype['seperate_seat'])){echo $arr_all_traveller_info['image_name'];} ?>">
                                </td>
                            </tr>
                            <?php }
                            }else{
                                $seatcount=$agent_booking_enquiry_data['seat_count'];
                                for($i=0;$i<$seatcount;$i++)
                                    {
                                  ?>        
                                    <tr>
                                    <td><select class="select_css" name="mrandmrs[]" id="mrandmrs">
                                        <option value="">select Mr / Mrs</option>
                                        <option value="Mr" <?php if(isset($arr_all_traveller_info['mr/mrs'])){if("Mr" == $arr_all_traveller_info['mr/mrs']) {echo 'selected';}}?>>Mr</option>
                                        <option value="Mrs" <?php if(isset($arr_all_traveller_info['mr/mrs'])){if("Mrs" == $arr_all_traveller_info['mr/mrs']) {echo 'selected';}}?>>Mrs</option>
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
                                    <input type="file" name="image_name[]" id="image_name">
                                    </td>
                                </tr>
                                <?php 
                                }
                            } ?>
                            </tbody>
                            
                    </table>
                    
                    
                        <div class="row mt-5">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Flat No.</label>
                                <input type="text" class="form-control" name="flat_no" id="flat_no" placeholder="" value="<?php if($arr_all_traveller_addr){ echo $arr_all_traveller_addr['flat_no'];} ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Building / House Name</label>
                                <input type="text" class="form-control" name="building_house_nm" id="building_house_nm" placeholder="" value="<?php if($arr_all_traveller_addr){echo $arr_all_traveller_addr['building_house_nm'];} ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Street Name</label>
                                <input type="text" class="form-control" name="street_name" id="street_name" placeholder="" value="<?php if($arr_all_traveller_addr){echo $arr_all_traveller_addr['street_name'];} ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Landmark</label>
                                <input type="text" class="form-control" name="landmark" id="landmark" placeholder="" value="<?php if($arr_all_traveller_addr){echo $arr_all_traveller_addr['landmark'];} ?>">
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
                                                <option value="<?php echo $state_data_value['id'];?>" <?php if(isset($arr_all_traveller_addr['state_name'])){if($state_data_value['id'] == $arr_all_traveller_addr['state_name']) {echo 'selected';}}?>><?php echo $state_data_value['state'];?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select District</label>
                                    <select class="select_css" name="all_traveller_district" id="all_traveller_district">
                                        <option value="">Select District</option>
                                        <?php foreach($district_data as $district_data_value){ ?> 
                                            <option value="<?php echo $district_data_value['id'];?>" <?php if(isset($arr_all_traveller_addr['district_name'])){if($district_data_value['id'] == $arr_all_traveller_addr['district_name']) {echo 'selected';}}?>><?php echo $district_data_value['district'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Taluka</label>
                                    <select class="select_css" name="all_traveller_taluka" id="all_traveller_taluka">
                                        <option value="">Select Taluka</option>
                                           <?php foreach($taluka_data as $taluka_data_value){ ?> 
                                            <option value="<?php echo $taluka_data_value['id'];?>" <?php if(isset($arr_all_traveller_addr['taluka_name'])){if($taluka_data_value['id'] == $arr_all_traveller_addr['taluka_name']) {echo 'selected';}}?>><?php echo $taluka_data_value['Taluka'];?></option>
                                        <?php } ?> 
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>City Name</label>
                                <input type="text" class="form-control" name="all_traveller_city" id="all_traveller_city" placeholder="" value="<?php if($arr_all_traveller_addr){echo $arr_all_traveller_addr['city_name'];} ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>Pincode</label>
                                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="" value="<?php if($arr_all_traveller_addr){echo $arr_all_traveller_addr['pincode'];} ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>STD code </label>
                                <input type="text" class="form-control" name="std_code" id="std_code" placeholder="" value="<?php if($arr_all_traveller_addr){echo $arr_all_traveller_addr['std_code'];} ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>Alternate Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="" value="<?php if($arr_all_traveller_addr){echo $arr_all_traveller_addr['mobile_no'];} ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>Landline Number</label>
                                <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="" value="<?php if($arr_all_traveller_addr){echo $arr_all_traveller_addr['phone_no'];} ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>Email ID</label>
                                <input type="text" class="form-control" name="email_id" id="email_id" placeholder="" value="<?php if($arr_all_traveller_addr){echo $arr_all_traveller_addr['email_id'];} ?>">
                                </div>
                            </div>
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success" name="booknow_submit" value="submit">Submit</button> 
                        <a href="<?php echo $inter_seat_type_room_type; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
