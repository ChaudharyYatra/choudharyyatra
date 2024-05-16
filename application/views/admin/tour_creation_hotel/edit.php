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
                  foreach($package_hotel_data as $info) 
                  { 
                     ?>
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row" id="main_row">
                    
                    </div>
                    
                 <div class="row" id="main_row">
                      <div class="col-md-2">
                              <div class="form-group">
                                <label>Day Number</label>
                                <input type="text" class="form-control" name="day_number" id="day_number" value="<?php echo $info['day_number'];?>" placeholder="Enter Day Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                              </div>
                      </div>

                      <div class="col-md-2">
                          <div class="form-group">
                              <label>Select State</label>
                              <select class="form-control state_id" style="width: 100%;" name="state_id" id="state_id" required="required">
                                  <option value="">Select State Name</option>
                                  <?php
                                  foreach($state_name_data as $state_name_info) 
                                  {  
                                  ?>
                                  <option value="<?php echo $state_name_info['id'];?>" <?php if(isset($info['state_id'])){if($state_name_info['id'] == $info['state_id']) {echo 'selected';}}?>><?php echo $state_name_info['state_name'];?></option>
                                <?php } ?>
                              </select>
                          </div>
                      </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Select City</label>
                            <select class="form-control city_id" style="width: 100%;" name="city_id" id="city_id" required="required">
                                <option value="">Select City Name</option>
                                <?php
                                   foreach($city_name_data as $city_name_info) 
                                   {  
                                ?>
                                   <option value="<?php echo $city_name_info['id'];?>" <?php if(isset($info['city_id'])){if($city_name_info['id'] == $info['city_id']) {echo 'selected';}}?>><?php echo $city_name_info['city_name'];?></option>
                                <?php } ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Select Hotel</label>
                            <select class="form-control" style="width: 100%;" name="hotel_name_id" id="hotel_name_id" required="required">
                                <option value="">Select Hotel Name</option>
                                <?php
                                   foreach($hotel_name_data as $hotel_name_info) 
                                   {  
                                ?>
                                   <option value="<?php echo $hotel_name_info['id'];?>" <?php if(isset($info['hotel_name_id'])){if($hotel_name_info['id'] == $info['hotel_name_id']) {echo 'selected';}}?>><?php echo $hotel_name_info['hotel_name'];?></option>
                               <?php } ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Short Description</label>
                            <textarea class="form-control" name="short_description" id="short_description" placeholder="Enter Short Description" required="required"><?php echo $info['short_description'];?></textarea>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="form-group">
                            <label>Action</label>
                              <input type="checkbox" class="form-control" name="in_travel" id="in_travel" value="Travel" <?php if($info['in_travel']!='') {echo 'checked';}?>>&nbsp;&nbsp; Travel
                          </div>
                        </div>
              </div>
              <div id="newFields"></div>
              
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

