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
              <form method="post" enctype="multipart/form-data" id="edit_place_wise_stay_costing">
                <div class="card-body">

                  <div class="row">

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>State Name</label>
                            <select class="form-control" style="width: 100%;" name="state_name" id="state_name" required="required">
                                <option value="">Select State Name</option>
                                <?php
                                   foreach($state_data as $state_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $state_info['id']; ?>" <?php if($state_info['id']==$info['state_name']) { echo "selected"; } ?>><?php echo $state_info['state_name']; ?></option>
                               <?php } ?>
                              </select>
                              
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Place Name</label>
                            <select class="form-control" style="width: 100%;" name="place_name" id="place_name" required="required">
                                <option value="">Select Place Name</option>
                                <?php
                                   foreach($places_master_data as $place_info) 
                                   { 
                                ?>
                                   <option value="<?php echo $place_info['id']; ?>" <?php if($place_info['id']==$info['place_name']) { echo "selected"; } ?>><?php echo $place_info['place_name']; ?></option>
                               <?php } ?>
                              </select>
                              <span class="error"><?php echo form_error('place_name'); ?></span>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Extra City Expences</label>
                            <input type="text" class="form-control" name="extra_city_expences" id="extra_city_expences" value="<?php echo $info['extra_city_expences']; ?>" placeholder="Enter Extra City Expences" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                          </div>
                      </div>
                      
                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Hotel Expences</label>
                            <input type="text" class="form-control" name="hotel_expences" id="hotel_expences" value="<?php echo $info['hotel_expences']; ?>" placeholder="Enter Hotel Expences" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Lodge Expences</label>
                            <input type="text" class="form-control" name="lodge_expences" id="lodge_expences" value="<?php echo $info['lodge_expences']; ?>" placeholder="Enter Lodge Expences" oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');" required="required">
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
 