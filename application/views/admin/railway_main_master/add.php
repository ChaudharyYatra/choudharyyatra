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
              <form method="post" enctype="multipart/form-data" id="add_railway_main_master">


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Train No</label>
                                <input type="text" class="form-control" name="train_no" id="train_no" placeholder="Enter train number" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Train Name</label>
                                <input type="text" class="form-control" name="train_name" id="train_name" placeholder="Enter train name" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter By</label>
                                <input type="text" class="form-control" name="train_start_from" id="train_start_from" placeholder="Enter train start from" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enter Date</label>
                                <input type="date" class="form-control" name="train_date" id="train_date" placeholder="date" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Train Type</label>
                            <select class="select11" multiple="multiple" data-placeholder="Select Train Type" style="width: 100%;" name="train_type[]" id="train_type" required="required">
                                <option value="">Select </option>
                                <option value="1">Pantry Car</option>
                                <option value="2">Sleeper</option>
                                <option value="3">1 AC</option>
                                <option value="4">2 AC</option>
                                <option value="5">3 AC</option>
                                <option value="6">Chair Car</option>
                                <option value="7">Ac Chair Car</option>
                                <option value="8">Tatkal</option>
                                <option value="9">All</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Running Days</label>
                            <select class="select22" multiple="multiple" data-placeholder="Select Days" style="width: 100%;" name="running_days[]" id="running_days" required="required">
                                <option value="">Select </option>
                                <option value="1">Sunday</option>
                                <option value="2">Monday</option>
                                <option value="3">Tuesday</option>
                                <option value="4">Wednesday</option>
                                <option value="5">Thursday</option>
                                <option value="6">Friday</option>
                                <option value="7">Saturday</option>
                                <option value="8">All</option>
                            </select>
                          </div>
                        </div>
                      
                                      
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
                            <tr>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="place_name[]" id="place_name" placeholder="Enter place name" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="time" class="form-control" name="arrival_time[]" id="arrival_time" placeholder="Enter arrival time" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="time" class="form-control" name="departure_time[]" id="departure_time" placeholder="Enter departure time" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="day[]" id="day" placeholder="Enter day" required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="kilometer[]" id="kilometer" placeholder="Enter kilometer" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
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
                <button type="button" class="btn btn-success" name="submit" value="add_more_railway_main_master" id="add_more_railway_main_master">Add More</button>
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
