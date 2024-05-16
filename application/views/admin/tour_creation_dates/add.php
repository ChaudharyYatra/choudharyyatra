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
              <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button class="btn btn-primary">Date List</button></a>
              
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
                   foreach($arr_data as $info) 
                   { 
                    // print_r($info); die;
                     ?>
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                        
                  <div class="row" id="main_row">
                      
                    <div class="col-md-5">
                        <div class="form-group">
                          <label>Date:</label>
                          <div class="input-group">
                            <input type="date" name="journey_date[]" id="datepicker" class="form-control" required/>
                            <input type="hidden" class="form-control" name="package_id" id="package_id" placeholder="Enter Available Seats" value="<?php echo $info['id']; ?>" >
                            <input type="hidden" class="form-control" name="package_title" placeholder="Enter Available Seats" value="<?php echo $info['tour_title']; ?>" >
                          </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                          <label>Year Slot</label>
                          <select class="form-control" style="width: 100%;" name="year_slot[]" id="year_slot" required="required">
                              <option value="">Select Year Slot</option>
                              <option value="April to September">April to September</option>
                              <option value="October to March">October to March</option>
                            </select>
                        </div>
                      </div>
                    
                        <!-- <div class="col-md-2">
                              <div class="form-group">
                                <label>Single Seat Cost</label>
                                <input type="text" class="form-control" name="single_seat_cost[]" id="available_seats" placeholder="Enter Single Seat Cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                              </div>
                            </div>
                      <div class="col-md-2">
                              <div class="form-group">
                                <label>Twin Sharing Cost</label>
                                <input type="text" class="form-control" name="twin_seat_cost[]" id="available_seats" placeholder="Enter Twin Sharing Cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                              </div>
                      </div>
                      <div class="col-md-2">
                              <div class="form-group">
                                <label>3/4 Sharing Cost</label>
                                <input type="text" class="form-control" name="three_four_sharing_cost[]" id="available_seats" placeholder="Enter 3/4 Sharing Cost" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                              </div>
                      </div> -->
                      <div class="col-md-2 mt-4">
                            <div class="form-group">
                                <label></label>
                                <button type="button" class="btn btn-primary" name="submit" value="add_more" id="add_more">Add More Dates</button>
                            </div>
                        </div> 
                      
                     
                  </div>

              <?php
                   //foreach($data as $arr_data_dates_info) 
                   //{ 
                     ?>
                <div class="card-body">
                  <div class="row" id="main_row1">
                        <div class="col-md-4">
                                <div class="form-group">
                                  <label>Single Seat Cost</label>
                                  <input type="text" class="form-control" name="single_seat_cost" id="single_seat_cost" placeholder="Enter Single Seat Cost" value="<?php //if(!empty($arr_data_dates_info)){echo $arr_data_dates_info['single_seat_cost'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                  <label>Twin Sharing Cost</label>
                                  <input type="text" class="form-control" name="twin_seat_cost" id="twin_seat_cost" placeholder="Enter Twin Sharing Cost" value="<?php //if(!empty($arr_data_dates_info)){echo $arr_data_dates_info['twin_seat_cost'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                  <label>3/4 Sharing Cost</label>
                                  <input type="text" class="form-control" name="three_four_sharing_cost" id="three_four_sharing_cost" placeholder="Enter 3/4 Sharing Cost" value="<?php //if(!empty($arr_data_dates_info)){echo $arr_data_dates_info['three_four_sharing_cost'];} ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
                    </div>
                     
                </div> 
              <?php //} ?>
              
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary form-control" name="submit" value="submit" style="width:10%;">Submit</button>
					          <a href="<?php echo $module_url_path; ?>/index/<?php echo $id; ?>"><button type="button" class="btn btn-danger" >Cancel</button></a>
                </div>
            </div>
              </form>
              <?php } ?>  
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
 
