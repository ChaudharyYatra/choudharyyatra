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
              <a href="<?php echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>
              
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
              
              <form method="post" enctype="multipart/form-data" id="add_train">
                <div class="card-body">
                  
                  <div class="row"> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Train Name</label>
                        <input type="text" class="form-control" name="train_name" id="train_name" placeholder="Enter Train Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Train Number</label>
                        <input type="text" class="form-control" name="train_number" id="train_number" placeholder="Enter Train Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Boarding Station Name</label>
                        <input type="text" class="form-control" name="train_boarding_station" id="train_boarding_station" placeholder="Enter Train Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Arrival Station Name</label>
                        <input type="text" class="form-control" name="train_arrival_station" id="train_arrival_station" placeholder="Enter Train Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Other Stations</label>
                          <textarea class="form-control" name="other_stations" id="other_stations" placeholder="Enter Othe Stations" required="required"></textarea>
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Train Coach</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select Coach" style="width: 100%;" name="train_coach[]" id="train_coach" required="required">
                            <option value="">Select Coach</option>
                            <option value="1">General</option>
                            <option value="2">Sleeper</option>
                            <option value="3">Second AC</option>
                            <option value="4">Third AC</option>
                        </select>
                      </div>
                    </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Running Days</label>
                          <select class="select2" multiple="multiple" data-placeholder="Select Days" style="width: 100%;" name="running_days[]" id="running_days" required="required">
                              <option value="">Select </option>
                              <option value="1">Sunday</option>
                              <option value="2">Monday</option>
                              <option value="3">Tuesday</option>
                              <option value="4">Wednesday</option>
                              <option value="5">Thursday</option>
                              <option value="6">Friday</option>
                              <option value="7">Saturday</option>
                          </select>
                        </div>
                      </div>
                  </div>
                 

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
  

