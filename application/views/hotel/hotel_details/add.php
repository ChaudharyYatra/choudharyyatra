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
              
              <form method="post" enctype="multipart/form-data" id="add_room">
                <div class="card-body">
                  <div class="row" id="main_row">

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Room Number</label><br>
                        <input class="form-control" type="text" name="room_number[]" id="room_number" required="required">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Floor Number</label><br>
                        <input class="form-control" type="text" name="floor_number[]" id="floor_number" required="required">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Room Type</label>
                        <select class="select_css row_set1" name="room_type[]" id="room_type" required="required">
                          <option value="">select room type</option>
                          <option value="AC">AC</option>
                          <option value="Non-AC">Non-AC</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Occupancy</label><br>
                        <input class="form-control" type="number" name="occupancy[]" id="occupancy" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Bed Type</label>
                        <select class="select_css row_set1" name="bed_type[]" id="bed_type" required="required">
                          <option value="">select bed type</option>
                          <option value="One Bed">One Bed</option>
                          <option value="Two Bed">Two Bed</option>
                          <option value="Three Bed">Three Bed</option>
                          <option value="Four Bed">Four Bed</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Price</label><br>
                        <input class="form-control" type="number" name="price[]" id="price" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                      </div>
                    </div>

                    <input class="form-control" type="hidden" name="assign[]" value="1">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Amenities</label><br>
                        
                          <input type="checkbox" name="amenities1[]" value="TV"> TV
                          &nbsp;&nbsp;<input type="checkbox" name="amenities1[]" value="WIFI">&nbsp;&nbsp; WIFI
                          &nbsp;&nbsp;<input type="checkbox" name="amenities1[]" value="Mini-Fridge">&nbsp;&nbsp; Mini-Fridge
                        
                      </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description</label><br>
                        <textarea class="form-control" name="description[]" id="description" required="required"></textarea>
                      </div>
                    </div>

                  </div>  
                  
       
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-success" name="add_more" value="add_more_room" id="add_more_room">Add More Room</button>
                  <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">Submit</button>
					        <a href="<?php echo $module_url_path; ?>/index"><button type="button" name="cancel_btn" class="btn btn-danger">Cancel</button></a>
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
