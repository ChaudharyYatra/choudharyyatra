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
                <a href="<?php echo $module_url_path; ?>/index/<?php echo $tour_creation_id; ?>/<?php echo $tour_day; ?>">
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
              <form method="post" enctype="multipart/form-data" id="add_vehicle_cost_adding">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          
                        </div>
                      </div>
                                      

                        <table class="table table-bordered" id="main_row_for_vehicle_cost_adding_master">
                        <colgroup>
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="hotel_room_rate">Vehicle Type</th>
                                <th class="hotel_room_rate">Per Km Rate</th>
                                <th class="hotel_room_rate">Action</th>
                            </tr>
                        </thead>
                        <tbody id="hotel_room_body">
                            <tr>
                                <td class="hotel_room_rate">
                                <select class="select_css" name="vehicle_type[]" id="vehicle_type" required="required">
                                    <option value="">Select vehicle type</option>
                                  <?php
                                    foreach($vehicle_type as $vehicle_type_info) 
                                    { 
                                  ?>
                                    <option value="<?php echo $vehicle_type_info['id'];?>"><?php echo $vehicle_type_info['vehicle_type_name'];?></option>
                                  <?php } ?>
                                </select>
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control" name="per_km_rate[]" id="per_km_rate" placeholder="Enter per km rate" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
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
                <button type="button" class="btn btn-success" name="submit" value="add_more_vehicle_cost_adding" id="add_more_vehicle_cost_adding">Add More</button>
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
				          <a href="<?php echo $module_url_path; ?>/index/<?php echo $tour_creation_id; ?>/<?php echo $tour_day; ?>"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button></a>
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
