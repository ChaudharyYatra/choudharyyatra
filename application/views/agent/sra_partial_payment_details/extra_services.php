
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
              <a href="<?php echo $module_url_path_add_sra; ?>/add"><button class="btn btn-primary">Back</button></a>
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
              <?php foreach($traveller_booking_info_header as $traveller_booking_info_value) 
                   {  ?>
                    <div class="row">
                    <div class="col-md-2">
                            <label>Tour No -</label>
                        </div>  
                        <div class="col-md-5">
                            <div><?php echo $traveller_booking_info_value['tour_number']; ?></div>
                        </div>
                        <div class="col-md-2">
                            <label>Customer Name -</label>
                        </div>
                        <div class="col-md-3">
                            <div><?php echo $traveller_booking_info_value['customer_name']; ?></div>
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
                            <label> Total Seat -</label>
                        </div>
                        <div class="col-md-1">
                            <div><?php echo $traveller_booking_info_value['total_seat']; ?></div>
                        </div>

                        <input type="hidden" class="form-control" name="sra_payment_id" id="sra_payment_id" value="<?php echo $traveller_booking_info_value['id']; ?>">
                        <input type="hidden" class="form-control" name="service_mobile_number" id="service_mobile_number" value="<?php echo $traveller_booking_info_value['mobile_number']; ?>">
                        <input type="hidden" class="form-control" name="academic_year" id="academic_year" value="<?php echo $traveller_booking_info_value['academic_year']; ?>">
                        <input type="hidden" class="form-control" name="sra_no" id="sra_no" value="<?php echo $traveller_booking_info_value['sra_no']; ?>">
                        <input type="hidden" class="form-control" name="package_date_id" id="package_date_id" value="<?php echo $traveller_booking_info_value['tour_date']; ?>">
                        <input type="hidden" class="form-control" name="sra_payment_id" id="sra_payment_id" value="<?php echo $traveller_booking_info_value['sra_payment_id']; ?>">
                        <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $traveller_booking_info_value['tour_number']; ?>">

                    </div>
                <?php } ?>
                
              </div>


                <input type="hidden" class="form-control" name="booking_payment_details_id" id="booking_payment_details_id" value="<?php if(isset($booking_payment_details)){echo $booking_payment_details['id'];} ?> ">
                <input type="hidden" class="form-control" name="return_customer_booking_payment_id" id="return_customer_booking_payment_id" value="<?php if(isset($return_customer_booking_payment_details)){echo $return_customer_booking_payment_details['id'];} ?>">
                <div class="card-body">
                    <div class="row">

                        <input type="hidden" class="form-control" name="add_on_services_payment" id="add_on_services_payment" required="required" value="2">

                        <div class="col-md-12 cash_payment_div" id="services_sub_main_tour_div1" >
                            <div class="form-group">
                                <table border="1" class="table table-bordered" id="services_table">
                                    <thead>
                                        <tr>
                                            <th>Extra Services</th>
                                            <th>Amount</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <tr>
                                            <td>
                                                <select class="select_css extra_services" name="sra_extra_services[]" id="sra_extra_services<?php echo $i;?>" required>
                                                    <option value="">Select </option>
                                                    <option value="Other_services">Other</option>
                                                    <?php
                                                        foreach($special_req_master as $special_req_master_data_value) 
                                                        {
                                                    ?>
                                                        <option value="<?php echo $special_req_master_data_value['id'];?>"><?php echo $special_req_master_data_value['service_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                                <input type="text" class="form-control mt-4" name="other_services[]" id="other_services" placeholder="Enter extra services name" value="" style="display: none;">
                                            </td>
                                            <td><input type="text" class="form-control services_quantity" name="services_quantity[]" id="services_quantity<?php echo $i;?>" placeholder="Enter quantity" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required></td>
                                            <td><textarea type="text" class="form-control services_remark" name="extra_services_remark[]" id="extra_services_remark<?php echo $i;?>" placeholder="Enter reamrk" required></textarea>
                                            <td>
                                                <button type="button" class="btn btn-primary" attr_add_id="1" name="submit" value="extra_services_add_more" id="extra_services_add_more">Add More</button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="card-footer">
                        <div class="col-md-2 mb-3" id="extra_services_submit_div">
                            <a href="<?php echo $module_url_path; ?>/extra_services_add"><button type="submit" class="btn btn-primary search_btn" name="extra_services_submit" value="submit" id="services_submit">submit</button></a>
                        </div>
                    </div>

                
            
                    <!-- /.card -->

                             
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
    }
    function show2(){
    document.getElementById('extra_services_div1').style.display = 'block';
    document.getElementById('extra_services_div2').style.display = 'block';
    }
</script>