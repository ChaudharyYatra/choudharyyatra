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
          <?php foreach($arr_data2 as $info2) { ?>
              <?php
                $tour_creation_id_encoded = $info2['id'];
              ?>
              <input type="hidden" name="tour_creation_id" value="<?php echo $tour_creation_id_encoded; ?>">
             
            <?php } ?>
 
            <ol class="breadcrumb float-sm-right">
                <a href="<?php echo $module_url_path; ?>/index/<?php echo $tour_creation_id_encoded; ?>">
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
              <form method="post" enctype="multipart/form-data" id="add_vehicle_costing_details">
                <div class="card-body">
                      <div class="row" id="main_row_tax_type">
                        <table class="table table-bordered" id="main_row_vehicle_costing_details">
                        <colgroup>
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 5%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="hotel_room_rate">Vehicle type</th>
                                <th class="hotel_room_rate">Enter Total Km</th>
                                <th class="hotel_room_rate">Enter Per Km Rate</th>
                                <th class="hotel_room_rate">Total</th>
                                <th class="hotel_room_rate">Action</th>
                            </tr>
                        </thead>
                        <tbody id="vehicle_costing_details_body">
                            <tr>
                                <td class="hotel_room_rate">
                                  <select class="form-control" name="vehicle_type[]" id="vehicle_type" required="required">
                                    <option value="">Select vehicle type</option>
                                    <?php foreach($vehicle_type as $vehicle_type_value){ ?> 
                                        <option value="<?php echo $vehicle_type_value['id'];?>"><?php echo $vehicle_type_value['vehicle_type_name'];?></option>
                                    <?php } ?>
                                  </select>
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control total_km" name="total_km[]" id="total_km" placeholder="Enter total km" oninput="validateNumber(this)" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control per_km_rate" name="per_km_rate[]" id="per_km_rate" placeholder="Enter per km rate" oninput="validateNumber(this)" required="required">
                                </td>
                                <td class="hotel_room_rate">
                                  <input type="text" class="form-control total" name="total_km_per_km_rate[]" id="total_km_per_km_rate" placeholder="Enter total calculation" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required">
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
                <button type="button" class="btn btn-success" name="submit" value="add_more_vehicle_costing_details" id="add_more_vehicle_costing_details">Add More</button>
                  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
				          <a href="<?php echo $module_url_path; ?>/index/<?php echo $tour_creation_id_encoded; ?>"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button></a>
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
