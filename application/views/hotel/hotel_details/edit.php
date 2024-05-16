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
            <?php $this->load->view('hotel/layout/hotel_alert'); ?>
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

              <form method="post" enctype="multipart/form-data" id="edit_room">
                <div class="card-body">
                  <div class="row" id="main_row">

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Room Number</label><br>
                        <input class="form-control" type="text" name="room_number[]" id="room_number" value="<?php echo $info['room_number']; ?>" required="required">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Floor Number</label><br>
                        <input class="form-control" type="text" name="floor_number[]" id="floor_number" value="<?php echo $info['floor_number']; ?>" required="required">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Room Type</label>
                        <select class="select_css row_set1" name="room_type[]" id="room_type" required="required">
                          <option value="">select room type</option>
                          <option value="AC" <?php if(isset($info['room_type'])){if("AC" == $info['room_type']) {echo 'selected';}}?>>AC</option>
                          <option value="Non-AC" <?php if(isset($info['room_type'])){if("Non-AC" == $info['room_type']) {echo 'selected';}}?>>Non-AC</option>
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Occupancy</label><br>
                        <input class="form-control" type="number" name="occupancy[]" id="occupancy" value="<?php echo $info['occupancy']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Bed Type</label>
                        <select class="select_css row_set1" name="bed_type[]" id="bed_type" required="required">
                          <option value="">select bed type</option>
                          <option value="One Bed" <?php if(isset($info['bed_type'])){if("One Bed" == $info['bed_type']) {echo 'selected';}}?>>One Bed</option>
                          <option value="Two Bed" <?php if(isset($info['bed_type'])){if("Two Bed" == $info['bed_type']) {echo 'selected';}}?>>Two Bed</option>
                          <option value="Three Bed" <?php if(isset($info['bed_type'])){if("Three Bed" == $info['bed_type']) {echo 'selected';}}?>>Three Bed</option>
                          <option value="Four Bed" <?php if(isset($info['bed_type'])){if("Four Bed" == $info['bed_type']) {echo 'selected';}}?>>Four Bed</option>
                        
                        </select>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Price</label><br>
                        <input class="form-control" type="number" name="price[]" id="price" value="<?php echo $info['price']; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <input class="form-control" type="hidden" name="assign[]" value="1">

                    <div class="col-md-6">
                      <div class="form-group">
                        <?php 
                          $quali1=array();
                          $p = $info['amenities'];
                          $quali1 = explode(',',$p);
                          // print_r($quali1); die;
                        ?>
                        <label>Amenities</label><br>
                        
                          <input type="checkbox" name="amenities1[]" value="TV" <?php if(in_array('TV',$quali1)) {echo 'checked';}?>> TV
                          &nbsp;&nbsp;<input type="checkbox" name="amenities1[]" value="WIFI" <?php if(in_array('WIFI',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp; WIFI
                          &nbsp;&nbsp;<input type="checkbox" name="amenities1[]" value="Mini-Fridge" <?php if(in_array('Mini-Fridge',$quali1)) {echo 'checked';}?>>&nbsp;&nbsp; Mini-Fridge
                        
                      </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description</label><br>
                        <textarea class="form-control" name="description[]" id="description" required="required"><?php echo $info['description']; ?></textarea>
                      </div>
                    </div>

                  </div>  
                  
       
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" name="cancel_btn" class="btn btn-danger">Cancel</button></a>
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
  
