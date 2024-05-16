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
              
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-12">
                          <div class="form-group text-center">
                              <label><h3>Boarding Expenses Master</h3></label>
                          </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group text-center">
                              <label><h5>From Seat</h5></label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group text-center">
                              <label><h5>To Seat</h5></label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group text-center">
                              <label><h5>Rates</h5></label>
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_1" id="from_seat_1" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat1" id="to_seat1" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates1" id="rates1" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_2" id="from_seat_2" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat2" id="to_seat2" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates2" id="rates2" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_3" id="from_seat_3" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat3" id="to_seat3" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates3" id="rates3" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_4" id="from_seat_4" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat4" id="to_seat4" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates4" id="rates4" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_5" id="from_seat_5" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat5" id="to_seat5" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates5" id="rates5" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_6" id="from_seat_6" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat6" id="to_seat6" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates6" id="rates6" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_7" id="from_seat_7" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat7" id="to_seat7" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates7" id="rates7" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_8" id="from_seat_8" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat8" id="to_seat8" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates8" id="rates8" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_9" id="from_seat_9" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat9" id="to_seat9" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates9" id="rates9" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="from_seat_10" id="from_seat_10" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="text" class="form-control" name="to_seat10" id="to_seat10" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" class="form-control" name="rates10" id="rates10" placeholder="">
                          </div>
                        </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                  <a href="<?php echo $module_url_path; ?>/index"><button type="button" class="btn btn-danger">Cancel</button></a>
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
