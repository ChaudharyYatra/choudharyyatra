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
                <a href="<?php echo $module_url_path; ?>/index">
                    <button class="btn btn-primary">Back</button>
                </a>
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
              <form method="post" enctype="multipart/form-data" id="edit_railway_main_master">
                <div class="card-body">
                <?php
                        foreach($arr_data as $info) 
                        { 
                      ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Train No</label>
                                <input type="text" class="form-control" name="train_no" id="train_no" value="<?php echo $info['train_no']; ?>" placeholder="Enter train number" required="required">
                                <input type="hidden" class="form-control" name="railway_main_master_id" id="railway_main_master_id" value="<?php echo $info['id']; ?>" placeholder="Enter train number" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Train Name</label>
                                <input type="text" class="form-control" name="train_name" id="train_name" value="<?php echo $info['train_name']; ?>" placeholder="Enter train name" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter By</label>
                                <input type="text" class="form-control" name="train_start_from" id="train_start_from" value="<?php echo $info['train_start_from']; ?>" placeholder="Enter train start from" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Date</label>
                                <input type="date" class="form-control" name="train_date" id="train_date" value="<?php echo $info['train_date']; ?>" placeholder="date" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Train Type</label>
                            <select class="select11" multiple="multiple" data-placeholder="Select Train Type" style="width: 100%;" name="train_type[]" id="train_type" required="required">
                                <option value="">Select </option>
                                <option value="1" <?php if(isset($info['train_type']) && in_array('1', explode(',', $info['train_type']))) {echo 'selected';}?>>Pantry Car</option>
                                <option value="2" <?php if(isset($info['train_type']) && in_array('2', explode(',', $info['train_type']))) {echo 'selected';}?>>Sleeper</option>
                                <option value="3" <?php if(isset($info['train_type']) && in_array('3', explode(',', $info['train_type']))) {echo 'selected';}?>>1 AC</option>
                                <option value="4" <?php if(isset($info['train_type']) && in_array('4', explode(',', $info['train_type']))) {echo 'selected';}?>>2 AC</option>
                                <option value="5" <?php if(isset($info['train_type']) && in_array('5', explode(',', $info['train_type']))) {echo 'selected';}?>>3 AC</option>
                                <option value="6" <?php if(isset($info['train_type']) && in_array('6', explode(',', $info['train_type']))) {echo 'selected';}?>>Chair Car</option>
                                <option value="7" <?php if(isset($info['train_type']) && in_array('7', explode(',', $info['train_type']))) {echo 'selected';}?>>Ac Chair Car</option>
                                <option value="8" <?php if(isset($info['train_type']) && in_array('8', explode(',', $info['train_type']))) {echo 'selected';}?>>Tatkal</option>
                                <option value="9" <?php if(isset($info['train_type']) && in_array('9', explode(',', $info['train_type']))) {echo 'selected';}?>>All</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Running Days</label>
                            <select class="select22" multiple="multiple" data-placeholder="Select Days" style="width: 100%;" name="running_days[]" id="running_days" required="required">
                                <option value="">Select </option>
                                <option value="1" <?php if(isset($info['running_days']) && in_array('1', explode(',', $info['running_days']))) {echo 'selected';}?>>Sunday</option>
                                <option value="2" <?php if(isset($info['running_days']) && in_array('2', explode(',', $info['running_days']))) {echo 'selected';}?>>Monday</option>
                                <option value="3" <?php if(isset($info['running_days']) && in_array('3', explode(',', $info['running_days']))) {echo 'selected';}?>>Tuesday</option>
                                <option value="4" <?php if(isset($info['running_days']) && in_array('4', explode(',', $info['running_days']))) {echo 'selected';}?>>Wednesday</option>
                                <option value="5" <?php if(isset($info['running_days']) && in_array('5', explode(',', $info['running_days']))) {echo 'selected';}?>>Thursday</option>
                                <option value="6" <?php if(isset($info['running_days']) && in_array('6', explode(',', $info['running_days']))) {echo 'selected';}?>>Friday</option>
                                <option value="7" <?php if(isset($info['running_days']) && in_array('7', explode(',', $info['running_days']))) {echo 'selected';}?>>Saturday</option>
                                <option value="8" <?php if(isset($info['running_days']) && in_array('8', explode(',', $info['running_days']))) {echo 'selected';}?>>All</option>
                            </select>
                          </div>
                        </div>
                          <?php } ?>
                                      
                        <table class="table table-bordered" id="main_row_railway">
                        <colgroup>
                            <col span="1" style="width: 50%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 10%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="hotel_room_rate">Place Name</th>
                                <th class="hotel_room_rate">Arrival Time</th>
                                <th class="hotel_room_rate">Departure Time</th>
                                <th class="hotel_room_rate">Day</th>
                                <th class="hotel_room_rate">Kilometer</th>
                            </tr>
                        </thead>
                        <tbody id="hotel_room_body">
                        <?php
                          foreach($arr_data2 as $info) 
                          { 
                            // print_r($info); die;
                        ?>
                            <tr>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="place_name[]" id="place_name" value="<?php echo $info['place_name']; ?>" placeholder="Enter place name" required="required">
                                  <input type="hidden" class="form-control" name="add_more_railway_main_master_id[]" id="add_more_railway_main_master_id" value="<?php echo $info['id']; ?>" placeholder="Enter place name" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="time" class="form-control" name="arrival_time[]" id="arrival_time" value="<?php echo $info['arrival_time']; ?>" placeholder="Enter arrival time" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="time" class="form-control" name="departure_time[]" id="departure_time" value="<?php echo $info['departure_time']; ?>" placeholder="Enter departure time" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="day[]" id="day" value="<?php echo $info['day']; ?>" placeholder="Enter day" required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="kilometer[]" id="kilometer" value="<?php echo $info['kilometer']; ?>" placeholder="Enter kilometer" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                    <button type="button" class="btn btn-danger btn_remove" disabled>X</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    
                </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="button" class="btn btn-success" name="submit" value="edit_more_railway_main_master" id="edit_more_railway_main_master">Add More</button>
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
