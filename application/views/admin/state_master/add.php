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
              <form method="post" enctype="multipart/form-data" id="add_state">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                            <div class="form-group">
                              <label>Select Country</label>
                              <select class="form-control" style="width: 100%;" name="country_id" id="country_id" required="required">
                                  <option value="">Select Country Name</option>
                                  <?php
                                    foreach($country_name_data as $country_name_info) 
                                    { 
                                  ?>
                                    <option value="<?php echo $country_name_info['id']; ?>"><?php echo $country_name_info['country_name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                      </div>

                      <!-- <div class="col-md-6">
                        <div class="form-group">
                        <label>State</label>
                            <select class="form-control" name="state_name" id="state_name">
                            <option value="">Select State</option>
                            <?php //foreach($state_table as $state_table_value){ ?> 
                                <option value="<?php //echo $state_table_value['id'];?>"><?php //echo $state_table_value['state_name'];?></option>
                            <?php //} ?>
                            </select>
                        </div>
                      </div> -->

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" name="state_name" id="state_name" placeholder="Enter State Name" required="required">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                            <div class="form-group">
                              <label>State Permit Rate</label>
                              <input type="text" class="form-control" name="state_permit_rate" id="state_permit_rate" placeholder="Enter State Permit rate" required="required">
                            </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>All India Permit Rate</label>
                            <input type="text" class="form-control" name="all_india_permit_rate" id="all_india_permit_rate" placeholder="Enter All India Permit Rate" required="required">
                        </div>
                      </div>
                    </div>

                      <div class="row" id="main_row_tax_type">


                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Daily Tax Rate</label><br>
                            <input type="text" class="form-control" name="daily_tax_rate" id="daily_tax_rate" placeholder="Enter Daily Tax Rate" required="required">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Weekly Daily Tax Rate</label><br>
                            <input type="text" class="form-control" name="weekly_tax_rate" id="weekly_tax_rate" placeholder="Enter Weekly Tax Rate" required="required">
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Monthly Tax Rate</label><br>
                            <input type="text" class="form-control" name="monthly_tax_rate" id="monthly_tax_rate" placeholder="Enter Monthly Tax Rate" required="required">
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Yearly Tax Rate</label><br>
                            <input type="text" class="form-control" name="yearly_tax_rate" id="yearly_tax_rate" placeholder="Enter Yearly Tax Rate" required="required">
                          </div>
                        </div>
                                      

                        <table class="table table-bordered" id="main_row_for_state_master">
                        <colgroup>
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 5%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="hotel_room_rate">Vehicle type</th>
                                <th class="hotel_room_rate">Tax Amount</th>
                                <th class="hotel_room_rate">How Many Days</th>
                                <th class="hotel_room_rate">Action</th>
                            </tr>
                        </thead>
                        <tbody id="hotel_room_body">
                            <tr>
                                <td class="hotel_room_rate">
                                  <select class="form-control" name="vehicle_type[]" id="vehicle_type" required="required">
                                    <option value="">Select vehicle type</option>
                                    <?php foreach($vehicle_type as $vehicle_type_value){ ?> 
                                        <option value="<?php echo $vehicle_type_value['id'];?>"><?php echo $vehicle_type_value['vehicle_type_name'];?></option>
                                    <?php } ?>
                                  </select>
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="tax_amount[]" id="tax_amount" placeholder="Enter Tax Amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="how_many_days[]" id="how_many_days" placeholder="Enter Days" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                    <button type="button" class="btn btn-danger btn_remove" disabled>X</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                       
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="button" class="btn btn-success" name="submit" value="add_more_state" id="add_more_state">Add More</button>
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
				          <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button></a>
                </div>
              </form>
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
  

</body>
</html>
