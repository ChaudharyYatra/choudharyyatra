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
            <!--<ol class="breadcrumb float-sm-right">-->
            <!--  <a href="<?php //echo $module_url_path; ?>/index"><button class="btn btn-primary">List</button></a>-->
              
            <!--</ol>-->
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
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                 <div class="row" id="main_row">
                      
                    <div class="col-md-3">
                        <div class="form-group">
                      <label>Date:</label>
                          <div class="input-group">
                            <input type="date" name="journey_date" class="form-control" required min="<?php echo date("Y-m-d"); ?>" value="<?php echo $info['journey_date']; ?>"/>
                            <input type="hidden" class="form-control" name="package_id" placeholder="Enter Available Seats" value="<?php echo $info['package_id']; ?>" >
                          </div>
                        </div>
                     </div>

                     <div class="col-md-5">
                        <div class="form-group">
                          <label>Year Slot</label>
                          <select class="form-control" style="width: 100%;" name="year_slot[]" id="year_slot" required="required">
                              <option value="">Select Year Slot</option>
                              <option value="April to September" <?php if(isset($info['year_slot'])){if("April to September" == $info['year_slot']) {echo 'selected';}}?>>April to September</option>
                              <option value="October to March" <?php if(isset($info['year_slot'])){if("October to March" == $info['year_slot']) {echo 'selected';}}?>>October to March</option>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-2">
                              <div class="form-group">
                                <label>Single Seat Cost</label>
                                <input type="text" class="form-control" name="single_seat_cost" id="single_seat_cost" placeholder="Enter Single Seat Cost" value="<?php echo $info['single_seat_cost']; ?>" required>
                              </div>
                      </div>
                      <div class="col-md-2">
                              <div class="form-group">
                                <label>Twin Sharing Cost</label>
                                <input type="text" class="form-control" name="twin_seat_cost" id="twin_seat_cost" placeholder="Enter Twin Sharing Cost" value="<?php echo $info['twin_seat_cost']; ?>" required>
                              </div>
                      </div>
                      <div class="col-md-2">
                              <div class="form-group">
                                <label>3/4 Sharing Cost</label>
                                <input type="text" class="form-control" name="three_four_sharing_cost" id="three_four_sharing_cost" placeholder="Enter 3/4 Sharing Cost" value="<?php echo $info['three_four_sharing_cost']; ?>" required>
                              </div>
                      </div>    
                                          
              </div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary form-control" name="submit" value="submit" style="width:20%;">Submit</button>
                    <a href="<?php echo $module_url_path; ?>/index/<?php echo $info['package_id']; ?>"><button type="button" class="btn btn-danger" >Cancel</button></a>
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
 
</body>


</html>