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
              <?php
                   foreach($state_table_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_state">
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                          <div class="form-group">
                            <label>Country</label>
                            <select class="form-control" style="width: 100%;" name="country_id" id="country_id" required="required">
                                <option value="">Select Country</option>
                                <?php
                                   foreach($country_data as $hotel_type_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $hotel_type_info['id']; ?>" <?php if($hotel_type_info['id']==$info['country_id']) { echo "selected"; } ?>><?php echo $hotel_type_info['country_name']; ?></option>
                               <?php } ?>
                              </select>

                              <input type="hidden" class="form-control" name="insert_single_add_more_id" id="insert_single_add_more_id" value="<?php echo $info['id']; ?>" placeholder="Enter Tax Amount">
                          </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>State </label>
                          <input type="text" class="form-control" name="state_name" id="state_name" placeholder="Enter State Name" required="required" value="<?php echo $info['state_name']; ?>">
                      </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-6">
                            <div class="form-group">
                              <label>State Permit Rate</label>
                              <input type="text" class="form-control" name="state_permit_rate" id="state_permit_rate" placeholder="Enter State Permit rate" value="<?php echo $info['state_permit_rate']; ?>" required="required">
                            </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>All India Permit Rate</label>
                            <input type="text" class="form-control" name="all_india_permit_rate" id="all_india_permit_rate" placeholder="Enter All India Permit Rate" value="<?php echo $info['all_india_permit_rate']; ?>" required="required">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Daily Tax Rate</label><br>
                        <input type="text" class="form-control" name="daily_tax_rate" id="daily_tax_rate" placeholder="Enter Daily Tax Rate" value="<?php echo $info['daily_tax_rate']; ?>" required="required">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Weekly Daily Tax Rate</label><br>
                        <input type="text" class="form-control" name="weekly_tax_rate" id="weekly_tax_rate" placeholder="Enter Weekly Tax Rate" value="<?php echo $info['weekly_tax_rate']; ?>" required="required">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Monthly Tax Rate</label><br>
                        <input type="text" class="form-control" name="monthly_tax_rate" id="monthly_tax_rate" placeholder="Enter Monthly Tax Rate" value="<?php echo $info['monthly_tax_rate']; ?>" required="required">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Yearly Tax Rate</label><br>
                        <input type="text" class="form-control" name="yearly_tax_rate" id="yearly_tax_rate" placeholder="Enter Yearly Tax Rate" value="<?php echo $info['yearly_tax_rate']; ?>" required="required">
                      </div>
                      </div>
                    </div>
                    <?php } ?>

                    
                    <table class="table table-bordered" id="edit_main_row_for_state_master">
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
                        <?php
                        foreach($state_table_add_more as $info) 
                        { 
                          ?>
                            <tr>
                                <td class="hotel_room_rate">
                                <select class="form-control" name="vehicle_type[]" id="vehicle_type" required="required">
                                  <option value="">Select vehicle type</option>
                                  <?php foreach($vehicle_type as $vehicle_type_value){ ?> 
                                    <option value="<?php echo $vehicle_type_value['id']; ?>" <?php if($vehicle_type_value['id']==$info['vehicle_type']) { echo "selected"; } ?>><?php echo $vehicle_type_value['vehicle_type_name']; ?></option>
                                  <?php } ?>
                                  </select>

                                  <input type="hidden" class="form-control" name="insert_add_more_id" id="insert_add_more_id" value="<?php echo $info['id']; ?>" placeholder="Enter Tax Amount">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="tax_amount[]" id="tax_amount" value="<?php echo $info['tax_amount']; ?>" placeholder="Enter Tax Amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                <input type="text" class="form-control" name="how_many_days[]" id="how_many_days" value="<?php echo $info['how_many_days']; ?>" placeholder="Enter Days" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <a href="<?php echo $module_url_path;?>/add_more_delete/<?php echo $info['id']; ?>" title="delete"><button value="<?php echo $info['id']; ?>" class="btn btn-primary state_delete_instruction">Delete</button></a>
                                </td>
                            </tr>
                            <?php } ?>  
                        </tbody>
                    </table>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-success" name="submit" value="edit_add_more_state" id="edit_add_more_state">Add More</button>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

</body>
</html>
