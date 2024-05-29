<style>
  .hide {
    display: none;
    }
  .search_btn{
    margin-top: 20px;
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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">Back</button></a>
              
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
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Which is payment type ?</label> <br>
                          <input type="radio" id="first_payment" name="payment_type" value="1" onclick="first_payment_main();" />
                          <label>First Payment</label> &nbsp;&nbsp;
                          <input type="radio" id="partially_payment" name="payment_type" value="0" onclick="partially_payment_sub();" />
                          <label>Partial Payment</label> &nbsp;&nbsp;
                          <!-- <input type="radio" id="add_on_services" name="payment_type" value="2" onclick="extra_services();" />
                          <label>Add On Services</label> <br> -->
                      </div>
                  </div>
              </div>
                    <!-- <div class="col-md-6">
                    </div> -->

                    <!--  firstly payment fields -->
                    <div id="firstly_submit_form" style="display:none;">
                    <form method="post" action="<?php echo base_url(); ?>agent/add_sra_form/add" enctype="multipart/form-data">
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Academic Year</label>
                            <select class="form-control" style="width: 100%;" name="academic_year" id="academic_year" required="required">
                                <option value="">Select Year</option>
                                <?php
                                  foreach($academic_years_data as $academic_years_info) 
                                  { 
                                ?>
                                  <option value="<?php echo $academic_years_info['id']; ?>"><?php echo $academic_years_info['year']; ?></option>
                              <?php } ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>SRA No</label>
                            <input type="text" class="form-control" name="sra_no" id="sra_no" placeholder="Enter SRA No" required="required">
                            <input type="hidden" class="form-control" name="firstly_payment" id="firstly_payment" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                              <div class="form-group">
                                <label>SRA Date</label>
                                <input type="date" class="form-control" name="sra_date" id="sra_date" placeholder="Enter SRA Date" required="required">
                              </div>
                        </div>
                        <div class="col-md-6" id="tour_number_div">
                          <div class="form-group">
                            <label>Tour Number - Name</label>
                            <select class="form-control" style="width: 100%;" name="tour_number" id="sra_tour_number" required="required">
                                <option value="">Select Tour</option>
                                <?php
                                  foreach($packages_tour_type as $packages_tour_type_info) 
                                  { 
                                ?>
                                  <option value="<?php echo $packages_tour_type_info['tour_number']; ?>"><?php echo $packages_tour_type_info['tour_number']; ?> - <?php echo $packages_tour_type_info['tour_title']; ?></option>
                              <?php } ?>
                              </select>
                          </div>
                        </div>

                        <!-- <div class="col-md-6" id="tour_number_div">
                            <div class="form-group">
                            <label>Tour Number</label>
                            <input type="text" class="form-control" name="tour_number" id="tour_number" placeholder="Enter Tour Number" required="required">
                            </div>
                        </div> -->

                        <div class="col-md-6" id="to_date_div">
                          <div class="form-group">
                            <label>Tour Date</label>
                            <select class="form-control" style="width: 100%;" name="tour_date" id="tour_date" required="required">
                                <option value="">Select Date</option>

                              </select>
                          </div>
                        </div>

                        <!-- <div class="col-md-6" id="to_date_div">
                              <div class="form-group">
                                <label>Tour Date</label>
                                <input type="date" class="form-control" name="tour_date" id="tour_date" placeholder="Enter Rating" required="required">
                              </div>
                        </div> -->

                        <div class="col-md-6" id="customer_name_div">
                            <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Enter customer name" required="required">
                            </div>
                        </div>

                        <div class="col-md-6" id="mobile_number_div">
                            <div class="form-group">
                            <label>Customer Mobile No.</label>
                            <input type="text" class="form-control" maxlength="10" minlength="10" name="mobile_number" id="mobile_number" placeholder="Enter mobile number" required="required">
                            </div>
                        </div>

                        <div class="col-md-6" id="total_seat_div">
                            <div class="form-group">
                            <label>Total Seat</label>
                            <input type="text" class="form-control" name="total_seat" id="total_seat" placeholder="Enter total seat" required="required">
                            </div>
                        </div>

                        <div class="col-md-6" id="total_srs_amt_div">
                            <div class="form-group">
                            <label>Total SRA Amount</label>
                            <input type="text" class="form-control" name="total_sra_amt" id="total_sra_amt" placeholder="Enter total SRA amount" required="required">
                            </div>
                        </div>

                        <div class="col-md-6" id="image_name_div">
                            <div class="form-group">
                            <label>SRA Upload Image / Pdf</label><br>
                            <input type="file" name="image_name" id="image_nam" required="required">
                            <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                            </div>
                        </div>

                        <div class="col-md-12" id="otp">

                        <table id="example1" class="table table-bordered table-striped">
                          <tr>
                            <th>Master's Name</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                          <tr>
                            <td>Academic Year</td>
                            <td>"Academic Year: Navigate here to include new academic above the 'Academic Year' option."</td>
                            <td>
                            <!-- <a href="<?php //echo base_url(); ?>admin/academic_year/index"><button type="button" class="btn btn-success" >Add</button></a> -->
                            <p>Contact to Admin</p>
                            </td>
                          </tr>
                          <tr>
                            <td>Packages</td>
                            <td>"Tour Number - Name: Navigate here to include new tour above the 'Tour Number - Name' option."</td>
                            <td>
                            <!-- <a href="<?php echo base_url(); ?>admin/packages/index"><button type="button" class="btn btn-success" >Add</button></a> -->
                            <p>Contact to Admin</p>
                            </td>
                          </tr>
                        </table>

                        <a href="<?php echo $module_url_path; ?>/add"><button type="submit" class="btn btn-success" name="submit" id="first_submit" value="submit">Submit</button></a>
                        </div>
                        <br><br>
                      </div>
                    </form>
                    </div>
                    <!--  firstly payment fields -->

                    <!--  Partially payment fields --> 
                    <div id="partially_submit_form" style="display:none;">
                      <form method="post" action="<?php echo base_url(); ?>agent/add_sra_form/add">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Academic Year</label>
                              <select class="form-control" style="width: 100%;" name="partially_academic_year" id="partially_academic_year" required="required">
                                  <option value="">Select Year</option>
                                  <?php
                                    foreach($academic_years_data as $academic_years_info) 
                                    { 
                                  ?>
                                    <option value="<?php echo $academic_years_info['id']; ?>"><?php echo $academic_years_info['year']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-6" id="tour_number_div">
                            <div class="form-group">
                              <label>Tour Number - Name</label>
                              <select class="form-control" style="width: 100%;" name="partially_tour_number" id="partially_tour_number" required="required">
                                  <option value="">Select Tour</option>
                                  <?php
                                    foreach($packages_tour_type as $packages_tour_type_info) 
                                    { 
                                  ?>
                                    <option value="<?php echo $packages_tour_type_info['tour_number']; ?>"><?php echo $packages_tour_type_info['tour_number']; ?> - <?php echo $packages_tour_type_info['tour_title']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                          </div>

                          <div class="col-md-6" id="to_date_div">
                            <div class="form-group">
                              <label>Tour Date</label>
                              <select class="form-control" style="width: 100%;" name="partially_tour_date" id="partially_tour_date" required="required">
                                  <option value="">Select Date</option>

                                </select>
                            </div>
                          </div>

                          <div class="col-md-6">
                              <div class="form-group">
                              <label>SRA No</label>
                              <input type="text" class="form-control" name="partially_sra_no" id="partially_sra_no" placeholder="Enter SRA No" required="required">
                              <input type="hidden" class="form-control" name="partially_payment" id="partially_payment" required="required" value="0">
                              </div>
                          </div>
                          <div class="col-md-6" id="mobile_number_div">
                              <div class="form-group">
                              <label>Customer Mobile No.</label>
                              <input type="hidden" id="sra_no_textbox">
                              <input type="text" class="form-control" maxlength="10" minlength="10" name="partially_mobile_number" id="partially_mobile_number" placeholder="Enter mobile number" required="required">
                              </div>
                          </div>
                          <div class="col-md-7 mb-3">
                              <button type="button" class="btn btn-primary search_btn" name="p_submit" value="submit" id="partially_submit">Search</button>
                          </div>

                          <div class="col-md-5 mb-3" id="div_partial_payment" style="display:none;">
                            <!-- <a href="<?php //echo $sra_partial_payment_details; ?>/index/"><button type="submit" class="btn btn-success search_btn" name="partial_payment" id="partial_payment" value="submit">Partial payment</button></a> -->
                            <a id="partial_payment_link">
                                <!-- <button type="button" class="btn btn-success search_btn" name="partial_payment" id="partial_payment" value="submit">Partial payment</button> -->
                            </a>
                          </div>
                        </div>
                      </form>
                    </div>
                      <!--  Partially payment fields -->

                      <!--  Add On Services fields -->
                      <div id="sevices_submit_form" style="display:none;">
                      <form method="post" action="<?php echo base_url(); ?>agent/add_sra_form/extra_services_add">
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                              <label>SRA No</label>
                              <input type="text" class="form-control" name="service_sra_no" id="service_sra_no" placeholder="Enter SRA No" required="required">
                              <input type="hidden" class="form-control" name="add_on_services_payment" id="add_on_services_payment" required="required" value="2">
                            </div>
                          </div>

                          <div class="col-md-6" id="sevices_tour_number_div">
                              <div class="form-group">
                              <label>Tour Number</label>
                              <input type="text" class="form-control" name="srrvice_tour_number" id="srrvice_tour_number" placeholder="Enter Tour Number" required="required">
                              </div>
                          </div>

                          <div class="col-md-6" id="services_to_date_div">
                                <div class="form-group">
                                  <label>Tour Date</label>
                                  <input type="date" class="form-control" name="service_tour_date" id="service_tour_date" placeholder="Enter Rating" required="required">
                                </div>
                          </div>

                          <div class="col-md-6" id="services_mobile_number_div">
                              <div class="form-group">
                              <label>Customer Mobile No.</label>
                              <input type="text" class="form-control" maxlength="10" minlength="10" name="service_mobile_number" id="service_mobile_number" placeholder="Enter mobile number" required="required">
                              </div>
                          </div>

                          <div class="col-md-12 cash_payment_div" id="services_sub_main_tour_div1" >
                              <div class="form-group">
                                  <table border="1" class="table table-bordered" id="services_table">
                                      <thead>
                                          <tr>
                                              <th>Extra Services</th>
                                              <th>Amount</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $i=1;?>
                                          <tr>
                                              <td>
                                                <select class="select_css extra_services" name="sra_extra_services[]" id="sra_extra_services<?php echo $i;?>" >
                                                    <option value="">Select </option>
                                                    <?php
                                                        foreach($special_req_master as $special_req_master_data_value) 
                                                        {
                                                    ?>
                                                        <option value="<?php echo $special_req_master_data_value['id'];?>"><?php echo $special_req_master_data_value['service_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                              </td>
                                              <td><input type="text" class="form-control services_quantity" name="services_quantity[]" id="services_quantity<?php echo $i;?>" placeholder="Enter quantity" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></td>
                                              <td>
                                                  <button type="button" class="btn btn-primary" attr_add_id="1" name="submit" value="extra_services_add_more" id="extra_services_add_more">Add More</button>
                                              </td>
                                          </tr>
                                          <?php $i++; ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                          <div class="col-md-2 mb-3" id="extra_services_submit_div">
                            <a href="<?php echo $module_url_path; ?>/extra_services_add"><button type="submit" class="btn btn-primary search_btn" name="extra_services_submit" value="submit" id="services_submit">submit</button></a>
                          </div>
                        </div>
                      </form>
                    
                    <!--  Add On Services fields -->

                      <!-- <div class="col-md-6">
                        <div class="form-group">
                          <label>Tour Type</label> <br>
                            <input type="radio" id="main_tour" name="tour_type" value="1" onclick="main();"/>
                                <label for="Yes" id="main_tour">Main Tour</label> &nbsp;&nbsp;
                            <input type="radio" id="sub_tour" name="tour_type" value="0" onclick="sub();"/>
                                <label for="No" id="sub_tour">Sub Tour</label> <br>
                        </div>
                      </div> -->
              </div>
                <!-- /.card-body -->
              <div id="partial_table" style="display:none;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>SN</th>
                    <th>Academic Year</th>
                    <th>SRA No</th>
                    <th>Tour No</th>
                    <th>Tour Date</th>
                    <th>Customer Name</th>
                    <th>Total Seat</th>
                    <th>Total SRA Amount</th>
                    <th>SRA Upload Image / Pdf</th>
                    <th>Partial Payment</th>
                    <th>Extra Services</th>
                  </tr>
                  </thead>
                  <tbody id="tid">
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  





