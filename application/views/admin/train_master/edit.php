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
              <?php
                   foreach($arr_data as $info) 
                   { 
                     ?>
              <form method="post" enctype="multipart/form-data" id="edit_train">
              <div class="card-body">
                <div class="container">

                <div class="row"> 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Train Name</label>
                        <input type="text" class="form-control" name="train_name" id="train_name" placeholder="Enter Train Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required" value="<?php echo $info['train_name']; ?>">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Train Number</label>
                        <input type="text" class="form-control" name="train_number" id="train_number" value="<?php echo $info['train_number']; ?>" placeholder="Enter Train Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Boarding Station Name</label>
                        <input type="text" class="form-control" name="train_boarding_station" id="train_boarding_station" value="<?php echo $info['train_boarding_station']; ?>" placeholder="Enter Train Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Arrival Station Name</label>
                        <input type="text" class="form-control" name="train_arrival_station" id="train_arrival_station" value="<?php echo $info['train_arrival_station']; ?>" placeholder="Enter Train Name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Other Stations</label>
                          <textarea class="form-control" name="other_stations" id="other_stations" placeholder="Enter Othe Stations" required="required"><?php echo $info['other_stations']; ?></textarea>
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Train Coach</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select Coach" style="width: 100%;" name="train_coach[]" id="train_coach" required="required">
                            <option value="">Select Coach</option>
                            <?php
                              $title = explode(',',$info['train_coach']);
                              $c=count($title);
                                foreach($arr_data as $arr_info) 
                                { 
                                    for($i=0; $i<$c; $i++){
                                        $tid= $title[$i];
                                    }
                            ?>
                              <option value="1" <?php if(in_array('1', $title)) { echo "selected"; } ?>>General</option>
                              <option value="2" <?php if(in_array('2', $title)) { echo "selected"; } ?>>Sleeper</option>
                              <option value="3" <?php if(in_array('3', $title)) { echo "selected"; } ?>>Second AC</option>
                              <option value="4" <?php if(in_array('4', $title)) { echo "selected"; } ?>>Third AC</option>
                            <?php  } ?>
                        </select>
                      </div>
                    </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Running Days</label>
                          <select class="select2" multiple="multiple" data-placeholder="Select Days" style="width: 100%;" name="running_days[]" id="running_days" required="required">
                              <option value="">Select </option>
                              <?php
                                $title = explode(',',$info['running_days']);
                                $c=count($title);
                                  foreach($arr_data as $arr_info) 
                                  { 
                                      for($i=0; $i<$c; $i++){
                                          $tid= $title[$i];
                                      }
                              ?>
                                <option value="1" <?php if(in_array('1', $title)) { echo "selected"; } ?>>Sunday</option>
                                <option value="2" <?php if(in_array('2', $title)) { echo "selected"; } ?>>Monday</option>
                                <option value="3" <?php if(in_array('3', $title)) { echo "selected"; } ?>>Tuesday</option>
                                <option value="4" <?php if(in_array('4', $title)) { echo "selected"; } ?>>Wednesday</option>
                                <option value="5" <?php if(in_array('5', $title)) { echo "selected"; } ?>>Thursday</option>
                                <option value="6" <?php if(in_array('6', $title)) { echo "selected"; } ?>>Friday</option>
                                <option value="7" <?php if(in_array('7', $title)) { echo "selected"; } ?>>Saturday</option>
                              <?php  } ?>
                          </select>
                        </div>
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
 
