<style>
  .mealplan_css{
            border: 1px solid red !important;
        }
  </style>
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
            <?php $this->load->view('tour_manager/layout/agent_alert'); ?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                      <form method="post" enctype="multipart/form-data" id="suugestion_add">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>City</label>
                                  <select class="form-control" name="city" id="city" onchange='citycheck(this.value); 
                                  this.blur();' onfocus='this.size=5;' onblur='this.size=1;' 
                                        onchange='this.size=1; this.blur();'>
                                    <option value="">Select city</option>
                                    <option value="Other">Other</option>
                                    <?php foreach($city as $city_info){ ?> 
                                        <option value="<?php echo $city_info['id'];?>"><?php echo $city_info['city_name'];?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                            </div>

                            <div class="col-md-6" id="other_city_div" style='display:none;'>
                              <div class="form-group">
                                <label>Enquiry destination name</label>
                                <input type="text" class="form-control mealplan_css" name="other_city" id="other_city" placeholder="Enter destination name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Package Type</label><br>
                                <select class="select_css" name="package_type" id="package_type">
                                <option value="">Select package type</option>
                                      <?php
                                        foreach($package_type as $package_type_info) 
                                        { 
                                      ?>
                                  <option value="<?php echo $package_type_info['id'];?>"><?php echo $package_type_info['package_type'];?></option>
                                      <?php } ?>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Tour No / Name</label>
                                  <select class="form-control" name="tour_number" id="tour_number" onfocus='this.size=5;' onblur='this.size=1;' 
                                        onchange='this.size=1; this.blur();'>
                                    <option value="">Select tour title</option>
                                    <!-- <option value="Other">Other</option> -->
                                    <!-- <?php //foreach($packages_data as $packages_data_value){ ?> 
                                        <option value="<?php //echo $packages_data_value['id'];?>"><?php //echo $packages_data_value['tour_number'];?> -  <?php //echo $packages_data_value['tour_title'];?></option>
                                    <?php //} ?> -->
                                  </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Priority</label><br>
                                    <select class="select_css" name="priority" id="priority">
                                    <option value="">select Priority</option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Photo/PDF</label>
                                    <input type="file" name="image_name" id="image_name">
                                    <br><span class="text-danger">Please select only PDF,JPG,PNG,JPEG,PDF format files.</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Upload Photo/PDF</label>
                                <input type="file" name="image_name_2" id="image_name_2">
                                <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Upload Photo/PDF</label>
                                <input type="file" name="image_name_3" id="image_name_3">
                                <br><span class="text-danger">Please select only JPG,PNG,JPEG,PDF format files.</span>
                              </div>
                          </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>What You Want To Suggest</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_slider">Submit</button>
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
 